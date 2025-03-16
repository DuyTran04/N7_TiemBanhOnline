<div class="chatbot-container">
    <div class="chatbot-icon" id="chatbot-icon">
        <i class="fas fa-comments"></i>
    </div>
    
    <div class="chatbot-box" id="chatbot-box">
        <div class="chatbot-header">
            <div class="chatbot-title">
                <img src="./public/site/img/bakery-icon.png" alt="Chatbot Icon">
                <span>Tiệm Bánh AI Assistant</span>
            </div>
            <div class="chatbot-close" id="chatbot-close">
                <i class="fas fa-times"></i>
            </div>
        </div>
        
        <div class="chatbot-messages" id="chatbot-messages">
            <div class="chatbot-message bot">
                <div class="message-bubble">
                    Xin chào! Tôi là AI Assistant của Tiệm Bánh. Tôi có thể giúp bạn tìm kiếm sản phẩm, kiểm tra đơn hàng, hoặc trả lời các câu hỏi về cửa hàng. Bạn cần giúp đỡ gì?
                </div>
                <div class="message-time">Hôm nay, <?= date('H:i') ?></div>
            </div>
        </div>
        
        <div class="chatbot-input">
            <input type="text" id="chatbot-input-field" placeholder="Nhập câu hỏi của bạn...">
            <button id="chatbot-send">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>