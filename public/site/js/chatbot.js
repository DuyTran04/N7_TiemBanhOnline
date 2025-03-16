document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const chatbotIcon = document.getElementById('chatbot-icon');
    const chatbotBox = document.getElementById('chatbot-box');
    const chatbotClose = document.getElementById('chatbot-close');
    const chatbotMessages = document.getElementById('chatbot-messages');
    const chatbotInput = document.getElementById('chatbot-input-field');
    const chatbotSend = document.getElementById('chatbot-send');
    
    // Variables
    let isTyping = false;
    let currentContext = null;
    
    // Functions
    function toggleChatbot() {
        if (chatbotBox.style.display === 'flex') {
            chatbotBox.style.display = 'none';
            chatbotIcon.classList.remove('animate-bounce');
        } else {
            chatbotBox.style.display = 'flex';
            chatbotInput.focus();
            
            // Notify with bounce animation after closing
            setTimeout(() => {
                if (chatbotBox.style.display !== 'flex') {
                    chatbotIcon.classList.add('animate-bounce');
                }
            }, 10000);
        }
    }
    
    function addMessage(message, isUser = false) {
        const messageElement = document.createElement('div');
        messageElement.classList.add('chatbot-message');
        messageElement.classList.add(isUser ? 'user' : 'bot');
        
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const time = `${hours}:${minutes}`;
        
        // Format message with line breaks and make product names clickable
        let formattedMessage = message.replace(/\n/g, '<br>');
        
        // Tạo liên kết cho tên sản phẩm trong kết quả tìm kiếm
        if (!isUser && message.includes('Kết quả tìm kiếm cho')) {
            formattedMessage = formattedMessage.replace(/(\d+)\.\s+(.*?)\s+-\s+\$([\d.]+)/g, function(match, index, name, price) {
                return `${index}. <a href="./?controller=product&action=search&product_name=${encodeURIComponent(name)}" class="product-link">${name}</a> - $${price}`;
            });
        }
        
        messageElement.innerHTML = `
            <div class="message-bubble">${formattedMessage}</div>
            <div class="message-time">Hôm nay, ${time}</div>
        `;
        
        chatbotMessages.appendChild(messageElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        
        // Thêm event listener cho các liên kết sản phẩm
        const productLinks = messageElement.querySelectorAll('.product-link');
        productLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const productName = this.textContent;
                window.location.href = this.href;
            });
        });
    }
    
    function showTypingIndicator() {
        if (isTyping) return;
        
        isTyping = true;
        
        const typingElement = document.createElement('div');
        typingElement.classList.add('chatbot-message', 'bot', 'typing-indicator');
        
        typingElement.innerHTML = `
            <div class="message-bubble">
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
            </div>
        `;
        
        chatbotMessages.appendChild(typingElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        
        return typingElement;
    }
    
    function removeTypingIndicator(element) {
        if (element && element.parentNode) {
            element.parentNode.removeChild(element);
        }
        isTyping = false;
    }
    
    function sendMessage() {
        const message = chatbotInput.value.trim();
        
        if (message === '') return;
        
        // Add user message
        addMessage(message, true);
        
        // Clear input
        chatbotInput.value = '';
        
        // Show typing indicator
        const typingIndicator = showTypingIndicator();
        
        // Send request to server
        const xhr = new XMLHttpRequest();
        xhr.open('POST', './?controller=chatbot&action=processMessage', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xhr.onload = function() {
            // Calculate typing delay based on response length
            const typingDelay = Math.min(1000 + Math.floor(Math.random() * 1000), 3000);
            
            // Remove typing indicator after delay
            setTimeout(() => {
                removeTypingIndicator(typingIndicator);
                
                // Process response
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        
                        addMessage(response.response);
                        
                        // Update current context
                        currentContext = response.context;
                        
                    } catch (e) {
                        addMessage('Có lỗi xảy ra. Vui lòng thử lại sau.');
                    }
                } else {
                    addMessage('Có lỗi xảy ra. Vui lòng thử lại sau.');
                }
            }, typingDelay);
        };
        
        xhr.onerror = function() {
            removeTypingIndicator(typingIndicator);
            addMessage('Có lỗi kết nối. Vui lòng kiểm tra kết nối mạng và thử lại.');
        };
        
        xhr.send('message=' + encodeURIComponent(message) + '&context=' + encodeURIComponent(currentContext || ''));
    }

    function addProductResult(product) {
        const productElement = document.createElement('div');
        productElement.classList.add('chatbot-product');
        
        productElement.innerHTML = `
            <img src="./public/uploads/${product.image}" alt="${product.name}" class="product-image">
            <div class="product-info">
                <h4>${product.name}</h4>
                <p class="product-price">$${product.price}</p>
                <a href="./?controller=product&action=productDetail&id=${product.id}" class="view-product-btn">Xem chi tiết</a>
            </div>
        `;
        
        chatbotMessages.appendChild(productElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
    
    // Suggest buttons for quick responses
    function addSuggestionButtons() {
        const suggestions = [
            'Sản phẩm mới nhất',
            'Tìm bánh kem',
            'Tình trạng đơn hàng',
            'Gợi ý bánh cho tôi'
        ];
        
        const suggestionsElement = document.createElement('div');
        suggestionsElement.classList.add('chatbot-suggestions');
        
        suggestions.forEach(suggestion => {
            const button = document.createElement('button');
            button.classList.add('suggestion-btn');
            button.textContent = suggestion;
            button.addEventListener('click', () => {
                chatbotInput.value = suggestion;
                sendMessage();
            });
            
            suggestionsElement.appendChild(button);
        });
        
        chatbotMessages.appendChild(suggestionsElement);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
    
    // Event Listeners
    chatbotIcon.addEventListener('click', toggleChatbot);
    chatbotClose.addEventListener('click', toggleChatbot);
    
    chatbotSend.addEventListener('click', sendMessage);
    
    chatbotInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
    
    // Add suggestion buttons after welcome message
    setTimeout(() => {
        addSuggestionButtons();
    }, 1000);
    
    // Notify user with bouncing icon after 10 seconds
    setTimeout(() => {
        if (chatbotBox.style.display !== 'flex') {
            chatbotIcon.classList.add('animate-bounce');
        }
    }, 10000);
});