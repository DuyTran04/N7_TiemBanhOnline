<?php

class ChatbotModel extends BaseModel
{
    const TABLE = 'chatbot_intents';
    
    /**
     * Lấy tất cả câu trả lời
     * 
     * @param array $select Các cột cần chọn
     * @param array $orderBys Điều kiện sắp xếp
     * @param int $limit Giới hạn kết quả
     * @return array
     */
    public function getAll($select = ['*'], $orderBys = [], $limit = 15)
    {
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    /**
     * Lấy câu trả lời dựa trên tag
     * 
     * @param string $tag Tag cần tìm
     * @return array|null
     */
    public function findByTag($tag)
    {
        $tag = $this->escapeString($tag);
        $sql = "SELECT * FROM " . self::TABLE . " WHERE tag = '" . $tag . "'";
        return $this->getFirstByQuery($sql);
    }

    /**
     * Lưu trữ cuộc trò chuyện
     * 
     * @param string $sessionId ID phiên
     * @param string $userMessage Tin nhắn của người dùng
     * @param string $botResponse Phản hồi của bot
     * @param string|null $context Ngữ cảnh cuộc trò chuyện
     * @return mixed
     */
    public function saveConversation($sessionId, $userMessage, $botResponse, $context = null)
    {
        $data = [
            'session_id' => $this->escapeString($sessionId),
            'user_message' => $this->escapeString($userMessage),
            'bot_response' => $this->escapeString($botResponse),
            'context' => $this->escapeString($context)
        ];
        
        $sql = "INSERT INTO chatbot_conversations (session_id, user_message, bot_response, context, created_at) 
                VALUES ('{$data['session_id']}', '{$data['user_message']}', '{$data['bot_response']}', '{$data['context']}', NOW())";
        
        return $this->_query($sql);
    }
    
    /**
     * Tìm câu trả lời phù hợp với câu hỏi và context
     * 
     * @param string $query Câu hỏi của người dùng
     * @param string $sessionId ID phiên
     * @param string|null $currentContext Ngữ cảnh hiện tại
     * @return array Phản hồi và ngữ cảnh mới
     */
    public function findResponseForQuery($query, $sessionId, $currentContext = null)
    {
        // Convert query to lowercase and remove punctuation
        $query = mb_strtolower($query, 'UTF-8');
        $query = trim(preg_replace('/[^\p{L}\p{N}\s]/u', '', $query));
        
        // Special handling for product search context
        if ($currentContext == 'search_products_context') {
            // If in search context, directly search products with the input keyword
            $searchResult = $this->searchProducts($query);
            
            // Save conversation
            $this->saveConversation($sessionId, $query, $searchResult, null);
            
            return [
                'response' => $searchResult,
                'context' => null  // Reset context after search
            ];
        }
        
        // Get all intents from DB
        $sql = "SELECT * FROM " . self::TABLE;
        
        // If there's a current context, prioritize intents with matching context
        if ($currentContext) {
            $currentContext = $this->escapeString($currentContext);
            $sql .= " WHERE context_required = '$currentContext' OR context_required IS NULL ORDER BY context_required DESC";
        }
        
        $intents = $this->getByQuery($sql);
        
        // Find best matching intent
        $bestMatch = null;
        $bestScore = 0;
        $newContext = null;
        $isDynamic = false;
        
        foreach ($intents as $intent) {
            $patterns = explode(',', $intent['patterns']);
            
            foreach ($patterns as $pattern) {
                $pattern = trim($pattern);
                if (empty($pattern)) continue;
                
                // Calculate similarity score between query and pattern
                $score = $this->calculateSimilarity($query, $pattern);
                
                if ($score > $bestScore) {
                    $bestScore = $score;
                    $bestMatch = $intent;
                    $newContext = $intent['context_set'];
                    $isDynamic = $intent['is_dynamic'] == 1;
                }
            }
        }
        
        // If similarity score > 0.6, return the response
        if ($bestScore > 0.6 && $bestMatch) {
            // If it's a dynamic intent, call the processing function
            if ($isDynamic) {
                $dynamicResult = $this->processDynamicIntent($bestMatch['tag'], $query, $sessionId);
                if ($dynamicResult) {
                    $this->saveConversation($sessionId, $query, $dynamicResult, $newContext);
                    return [
                        'response' => $dynamicResult,
                        'context' => $newContext
                    ];
                }
            }
            
            // Get a random response
            $responses = explode('|', $bestMatch['responses']);
            $response = $responses[array_rand($responses)];
            
            // Save conversation
            $this->saveConversation($sessionId, $query, $response, $newContext);
            
            return [
                'response' => $response,
                'context' => $newContext
            ];
        }
        
        // No suitable response found
        $defaultResponse = "Xin lỗi, tôi không hiểu câu hỏi của bạn. Bạn có thể hỏi về sản phẩm, giao hàng, thanh toán hoặc địa chỉ cửa hàng.";
        $this->saveConversation($sessionId, $query, $defaultResponse, null);
        
        return [
            'response' => $defaultResponse,
            'context' => null
        ];
    }
    
    /**
     * Tính độ tương đồng giữa câu hỏi và pattern
     * 
     * @param string $query Câu hỏi của người dùng
     * @param string $pattern Mẫu intent
     * @return float Điểm tương đồng
     */
    private function calculateSimilarity($query, $pattern)
    {
        // If query contains pattern
        if (mb_stripos($query, $pattern) !== false) {
            return 0.8;
        }
        
        // Split words in query and pattern
        $queryWords = explode(' ', $query);
        $patternWords = explode(' ', $pattern);
        
        // Count matching words
        $matchCount = 0;
        foreach ($queryWords as $word) {
            if (in_array($word, $patternWords)) {
                $matchCount++;
            }
        }
        
        // Calculate match ratio
        if (count($queryWords) > 0) {
            return $matchCount / count($queryWords);
        }
        
        return 0;
    }
    
    /**
     * Xử lý các intent động
     * 
     * @param string $tag Tag của intent
     * @param string $query Câu hỏi của người dùng
     * @param string $sessionId ID phiên
     * @return string|null Phản hồi
     */
    private function processDynamicIntent($tag, $query, $sessionId)
    {
        switch ($tag) {
            case 'yes_view_products':
                return $this->getRecentProducts();
                
            case 'search_query':
                // If in search context and received a keyword
                return $this->searchProducts($query);
                
            case 'order_status':
                // If logged in, return order status
                if (isset($_SESSION['user'])) {
                    return $this->getOrderStatus($_SESSION['user']['id']);
                } else {
                    return "Bạn cần đăng nhập để xem trạng thái đơn hàng. Bạn có thể đăng nhập bằng cách nhấp vào nút Đăng nhập ở góc trên cùng.";
                }
                
            case 'product_recommendation':
                // Recommend products based on history if logged in
                if (isset($_SESSION['user'])) {
                    return $this->recommendProducts($_SESSION['user']['id']);
                } else {
                    return $this->getRecentProducts(); // If not logged in, show latest products
                }
                
            case 'product_detail':
                // Process product detail request
                return $this->getProductDetail($query);
                
            default:
                // Check in dynamic_functions table
                $tag = $this->escapeString($tag);
                $sql = "SELECT * FROM chatbot_dynamic_functions WHERE tag = '$tag'";
                $dynamicFunc = $this->getFirstByQuery($sql);
                
                if ($dynamicFunc) {
                    // Call corresponding function
                    $functionName = $dynamicFunc['function_name'];
                    if (method_exists($this, $functionName)) {
                        return $this->$functionName($query);
                    }
                }
                
                return null;
        }
    }

    /**
     * Trích xuất từ khóa từ câu hỏi
     * 
     * @param string $query Câu hỏi của người dùng
     * @return string Từ khóa đã trích xuất
     */
    private function extractKeyword($query)
    {
        // Stop words, unimportant words
        $stopWords = ['tôi', 'muốn', 'tìm', 'kiếm', 'có', 'không', 'cho', 'bánh', 'loại', 'về', 'là'];
        
        $words = explode(' ', $query);
        $keywords = [];
        
        foreach ($words as $word) {
            if (!in_array(mb_strtolower($word, 'UTF-8'), $stopWords) && mb_strlen($word, 'UTF-8') > 2) {
                $keywords[] = $word;
            }
        }
        
        return implode(' ', $keywords);
    }
    
    /**
     * Lấy các sản phẩm mới nhất
     * 
     * @return string Danh sách sản phẩm đã định dạng
     */
    private function getRecentProducts()
    {
        $this->loadModel('ProductModel');
        $productModel = new ProductModel;
        
        $products = $productModel->getProducts(5);
        
        if (empty($products)) {
            return "Hiện tại chưa có sản phẩm mới.";
        }
        
        $response = "Đây là các sản phẩm mới nhất của chúng tôi:\n";
        
        foreach ($products as $index => $product) {
            $response .= ($index + 1) . ". " . $product['name'] . " - $" . number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') . "\n";
        }
        
        $response .= "\nBạn có thể xem chi tiết các sản phẩm trong mục Sản phẩm.";
        
        return $response;
    }

    /**
     * Lấy thông tin chi tiết sản phẩm
     * 
     * @param string $productName Tên sản phẩm cần tìm
     * @return string Chi tiết sản phẩm đã định dạng
     */
    private function getProductDetail($productName)
    {
        $this->loadModel('ProductModel');
        $productModel = new ProductModel;
        
        $productName = $this->escapeString($productName);
        $sql = "SELECT * FROM product WHERE name LIKE '%" . $productName . "%' LIMIT 1";
        $product = $this->getFirstByQuery($sql);
        
        if (!$product) {
            return "Xin lỗi, tôi không tìm thấy thông tin chi tiết về sản phẩm '$productName'.";
        }
        
        $response = "Chi tiết sản phẩm " . $product['name'] . ":\n\n";
        $response .= "- Giá: $" . number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') . "\n";
        
        if ($product['sale_price'] > 0 && $product['sale_price'] < $product['price']) {
            $discount = round((1 - $product['sale_price'] / $product['price']) * 100);
            $response .= "- Giảm giá: " . $discount . "% (Giá gốc: $" . number_format($product['price'], 2, '.', '') . ")\n";
        }
        
        $response .= "- Mô tả: " . $product['description'] . "\n";
        $response .= "- Xuất xứ: " . $product['origin'] . "\n";
        $response .= "- Trạng thái: " . ($product['status'] == 1 ? "Còn hàng" : "Hết hàng") . "\n\n";
        
        $response .= "Bạn có thể xem chi tiết và đặt hàng tại trang sản phẩm. Bạn có muốn thêm sản phẩm này vào giỏ hàng không?";
        
        return $response;
    }
    
    /**
     * Tìm kiếm sản phẩm theo từ khóa
     * 
     * @param string $keyword Từ khóa tìm kiếm
     * @return string Kết quả tìm kiếm đã định dạng
     */
    private function searchProducts($keyword)
    {
        if (empty($keyword)) {
            return "Vui lòng cung cấp từ khóa tìm kiếm.";
        }
        
        $this->loadModel('ProductModel');
        $productModel = new ProductModel;
        
        // Improve search by searching for individual keywords
        $keywords = explode(' ', trim($keyword));
        $foundAnyProduct = false;
        $products = [];

        // Try searching with the entire phrase first
        $firstSearch = $productModel->searchProduct($keyword)->getData(5)->data;
        if (!empty($firstSearch)) {
            $products = $firstSearch;
            $foundAnyProduct = true;
        } else {
            // If not found, try each keyword individually
            foreach ($keywords as $word) {
                if (mb_strlen($word, 'UTF-8') < 3) continue; // Skip words that are too short
            
                $searchResult = $productModel->searchProduct($word)->getData(5)->data;
                if (!empty($searchResult)) {
                    foreach ($searchResult as $product) {
                        // Check if product already exists in the list
                        $exists = false;
                        foreach ($products as $existingProduct) {
                            if ($existingProduct['id'] == $product['id']) {
                                $exists = true;
                                break;
                            }
                        }

                        if (!$exists) {
                            $products[] = $product;
                            $foundAnyProduct = true;
                            
                            // Limit the number of products
                            if (count($products) >= 5) break;
                        }
                    }
                }

                // If we have enough products, stop searching
                if (count($products) >= 5) break;
            }
        }

        // If still nothing found, try a more fuzzy search
        if (!$foundAnyProduct) {
            $keyword = $this->escapeString($keyword);
            $sql = "SELECT * FROM product WHERE name LIKE '%" . $keyword . "%' LIMIT 5";
            $fuzzyResults = $this->getByQuery($sql);
            
            if (!empty($fuzzyResults)) {
                $products = $fuzzyResults;
                $foundAnyProduct = true;
            }
        }

        if (!$foundAnyProduct) {
            return "Xin lỗi, tôi không tìm thấy sản phẩm nào phù hợp với từ khóa '$keyword'. Bạn có thể thử từ khóa khác hoặc xem toàn bộ sản phẩm của chúng tôi tại mục Sản phẩm.";
        }
        
        $response = "Kết quả tìm kiếm cho '$keyword':\n";
        
        foreach ($products as $index => $product) {
            $response .= ($index + 1) . ". " . $product['name'] . " - $" . number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') . "\n";
        }
        
        $response .= "\nBạn có thể nhấp vào tên sản phẩm để xem chi tiết hoặc hỏi tôi thêm thông tin về sản phẩm.";
        
        return $response;
    }
    
    /**
     * Lấy trạng thái đơn hàng gần nhất
     * 
     * @param int $userId ID người dùng
     * @return string Trạng thái đơn hàng đã định dạng
     */
    private function getOrderStatus($userId)
    {
        $this->loadModel('OrderModel');
        $orderModel = new OrderModel;
        
        $userId = intval($userId);
        $orders = $orderModel->getAllOrdersByAccountId($userId)->getData(3)->data;
        
        if (empty($orders)) {
            return "Bạn chưa có đơn hàng nào.";
        }
        
        $response = "Đây là thông tin về 3 đơn hàng gần đây của bạn:\n";
        
        foreach ($orders as $order) {
            $status = "";
            switch ($order['status']) {
                case 0:
                    $status = "Đã giao hàng";
                    break;
                case 1:
                    $status = "Đang xử lý";
                    break;
                case 2:
                    $status = "Đang vận chuyển";
                    break;
                case 3:
                    $status = "Đã hủy";
                    break;
                default:
                    $status = "Không xác định";
            }
            
            $total = number_format(($order['total']) * (1 - $order['coupon']) + 2, 2, '.', '');
            
            $response .= "- Đơn hàng #" . $order['id'] . " (" . $order['created_at'] . "): " . $status . " - $" . $total . "\n";
        }
        
        $response .= "\nBạn có thể xem chi tiết đơn hàng trong mục Lịch sử đặt hàng.";
        
        return $response;
    }
    
    /**
     * Gợi ý sản phẩm dựa trên lịch sử đơn hàng
     * 
     * @param int $userId ID người dùng
     * @return string Đề xuất sản phẩm đã định dạng
     */
    private function recommendProducts($userId)
    {
        $this->loadModel('OrderModel');
        $orderModel = new OrderModel;
        
        $this->loadModel('ProductModel');
        $productModel = new ProductModel;
        
        // Get products from recent orders
        $userId = intval($userId);
        $orders = $orderModel->getAllOrdersByAccountId($userId)->getData(1)->data;
        
        if (empty($orders)) {
            return $this->getRecentProducts();
        }
        
        $orderId = $orders[0]['id'];
        $orderProducts = $orderModel->getAllProductsInOrderById($orderId);
        
        if (empty($orderProducts)) {
            return $this->getRecentProducts();
        }
        
        // Get categories of purchased products
        $categoryIds = [];
        foreach ($orderProducts as $product) {
            if (!in_array($product['category_id'], $categoryIds)) {
                $categoryIds[] = $product['category_id'];
            }
        }
        
        // Recommend products from the same categories
        $recommendProducts = [];
        foreach ($categoryIds as $categoryId) {
            $catProducts = $productModel->getByCategoryId($categoryId);
            foreach ($catProducts as $product) {
                if (count($recommendProducts) >= 5) break;
                
                // Only add products not yet purchased
                $alreadyBought = false;
                foreach ($orderProducts as $orderProduct) {
                    if ($orderProduct['id'] == $product['id']) {
                        $alreadyBought = true;
                        break;
                    }
                }
                
                if (!$alreadyBought) {
                    $recommendProducts[] = $product;
                }
            }
        }
        
        if (empty($recommendProducts)) {
            return $this->getRecentProducts();
        }
        
        $response = "Dựa trên lịch sử mua hàng của bạn, chúng tôi gợi ý những sản phẩm sau:\n";
        
        foreach ($recommendProducts as $index => $product) {
            $response .= ($index + 1) . ". " . $product['name'] . " - $" . number_format($product['sale_price'] > 0 ? $product['sale_price'] : $product['price'], 2, '.', '') . "\n";
        }
        
        return $response;
    }
    
    /**
     * Load model theo tên
     * 
     * @param string $modelName Tên model cần load
     */
    private function loadModel($modelName)
    {
        require_once('./Application/Models/' . $modelName . '.php');
    }
    
    /**
     * Xử lý chuỗi để tránh SQL injection
     * 
     * @param string|null $string Chuỗi cần xử lý
     * @return string|null Chuỗi đã xử lý
     */
    private function escapeString($string)
    {
        if ($string === null) {
            return null;
        }
        return addslashes($string);
    }
    
    /**
     * Tạo intent mới
     * 
     * @param array $data Dữ liệu intent
     * @return mixed
     */
    public function createIntent($data)
    {
        return $this->create(self::TABLE, $data);
    }

    /**
     * Cập nhật intent
     * 
     * @param int $id ID intent
     * @param array $data Dữ liệu intent cập nhật
     * @return mixed
     */
    public function updateIntent($id, $data)
    {
        return $this->update(self::TABLE, $id, $data);
    }

    /**
     * Xóa intent
     * 
     * @param int $id ID intent
     * @return mixed
     */
    public function deleteIntent($id)
    {
        return $this->delete(self::TABLE, $id);
    }

    /**
     * Tìm intent theo ID
     * 
     * @param int $id ID intent
     * @return array|null
     */
    public function findById($id)
    {
        return $this->find(self::TABLE, ['*'], $id);
    }
}