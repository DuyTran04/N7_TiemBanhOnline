<?php

class ChatbotController extends BaseController
{
    protected $chatbotModel;

    public function __construct()
    {
        $this->loadModel('ChatbotModel');
        $this->chatbotModel = new ChatbotModel;
    }

    /**
     * Hàm xử lý yêu cầu AJAX từ chatbot
     */
    public function processMessage()
    {
        // Kiểm tra nếu có dữ liệu POST gửi lên
        if (isset($_POST['message'])) {
            $userMessage = trim($_POST['message']);
            
            // Nếu tin nhắn rỗng
            if (empty($userMessage)) {
                echo json_encode([
                    'response' => 'Vui lòng nhập câu hỏi của bạn.',
                    'context' => null
                ]);
                return;
            }
            
            // Tạo hoặc lấy session ID để theo dõi cuộc trò chuyện
            $sessionId = $this->getSessionId();
            
            // Lấy context hiện tại
            $currentContext = isset($_POST['context']) ? $_POST['context'] : null;
            
            // Tìm câu trả lời phù hợp
            $result = $this->chatbotModel->findResponseForQuery($userMessage, $sessionId, $currentContext);
            
            // Trả về câu trả lời dạng JSON
            echo json_encode([
                'response' => $result['response'],
                'context' => $result['context']
            ]);
        } else {
            echo json_encode([
                'response' => 'Có lỗi xảy ra. Vui lòng thử lại.',
                'context' => null
            ]);
        }
    }
    
    /**
     * Tạo hoặc lấy session ID
     */
    private function getSessionId()
    {
        if (!isset($_SESSION['chatbot_session_id'])) {
            $_SESSION['chatbot_session_id'] = uniqid('chat_', true);
        }
        
        return $_SESSION['chatbot_session_id'];
    }
}