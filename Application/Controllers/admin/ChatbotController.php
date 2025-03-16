<?php

class ChatbotController extends BaseController
{
    protected $chatbotModel;
    protected $message;

    public function __construct()
    {
        $this->loadModel('ChatbotModel');
        $this->chatbotModel = new ChatbotModel;
    }

    /**
     * Hiển thị danh sách intent
     */
    public function index()
    {
        $intents = $this->chatbotModel->getAll();
        
        return $this->view('admin.chatbot.index', [
            'intents' => $intents
        ]);
    }

    /**
     * Hiển thị form tạo intent mới
     */
    public function create()
    {
        return $this->view('admin.chatbot.create');
    }

    /**
     * Lưu intent mới
     */
    public function store()
    {
        $data = [
            'tag' => $_POST['tag'],
            'patterns' => $_POST['patterns'],
            'responses' => $_POST['responses'],
            'context_required' => !empty($_POST['context_required']) ? $_POST['context_required'] : null,
            'context_set' => !empty($_POST['context_set']) ? $_POST['context_set'] : null,
            'is_dynamic' => isset($_POST['is_dynamic']) ? 1 : 0
        ];

        // Kiểm tra tag đã tồn tại chưa
        $existingIntent = $this->chatbotModel->findByTag($data['tag']);
        if ($existingIntent) {
            $this->message['error'] = 'Tag này đã tồn tại';
            return $this->view('admin.chatbot.create', [
                'message' => $this->message
            ]);
        }

        // Lưu intent mới
        $this->chatbotModel->createIntent($data);
        $this->message['success'] = 'Thêm mới intent thành công';
        
        return $this->view('admin.chatbot.create', [
            'message' => $this->message
        ]);
    }

    /**
     * Hiển thị form sửa intent
     */
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $intent = $this->chatbotModel->findById($id);

        return $this->view('admin.chatbot.edit', [
            'intent' => $intent
        ]);
    }

    /**
     * Cập nhật intent
     */
    public function update()
    {
        $id = $_GET['id'] ?? null;
        $data = [
            'tag' => $_POST['tag'],
            'patterns' => $_POST['patterns'],
            'responses' => $_POST['responses'],
            'context_required' => !empty($_POST['context_required']) ? $_POST['context_required'] : null,
            'context_set' => !empty($_POST['context_set']) ? $_POST['context_set'] : null,
            'is_dynamic' => isset($_POST['is_dynamic']) ? 1 : 0,
            'updated_at' => date("Y-m-d", time())
        ];

        // Kiểm tra tag đã tồn tại chưa (nếu đã thay đổi tag)
        $intent = $this->chatbotModel->findById($id);
        if ($intent['tag'] != $data['tag']) {
            $existingIntent = $this->chatbotModel->findByTag($data['tag']);
            if ($existingIntent) {
                $this->message['error'] = 'Tag này đã tồn tại';
                return $this->view('admin.chatbot.edit', [
                    'message' => $this->message,
                    'intent' => $intent
                ]);
            }
        }

        // Cập nhật intent
        $this->chatbotModel->updateIntent($id, $data);
        $this->message['success'] = 'Cập nhật intent thành công';
        
        $intent = $this->chatbotModel->findById($id);
        return $this->view('admin.chatbot.edit', [
            'message' => $this->message,
            'intent' => $intent
        ]);
    }

    /**
     * Xóa intent
     */
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        
        if ($id && is_numeric($id)) {
            $this->chatbotModel->deleteIntent($id);
            $this->message['success'] = 'Xóa intent thành công';
        }
        
        header('location: ./?module=admin&controller=chatbot');
    }
    
    /**
     * Xem lịch sử trò chuyện
     */
    public function conversationHistory()
    {
        $sql = "SELECT * FROM chatbot_conversations ORDER BY created_at DESC LIMIT 100";
        $conversations = $this->chatbotModel->getByQuery($sql);
        
        return $this->view('admin.chatbot.history', [
            'conversations' => $conversations
        ]);
    }
}