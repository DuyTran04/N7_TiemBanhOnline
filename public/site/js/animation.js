document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Add to cart animation
    const addToCartSuccess = (productId) => {
        // Show success message with animation
        const successMessage = document.createElement('div');
        successMessage.className = 'add-to-cart-success';
        successMessage.innerHTML = '<i class="fas fa-check-circle"></i> Sản phẩm đã được thêm vào giỏ hàng!';
        document.body.appendChild(successMessage);
        
        // Get product position and cart position
        const productElement = document.getElementById('add-to-cart-btn' + productId);
        if (!productElement) return;
        
        const productRect = productElement.getBoundingClientRect();
        
        const cartIcon = document.querySelector('.nav-link[title="cart"]');
        if (!cartIcon) return;
        
        const cartRect = cartIcon.getBoundingClientRect();
        
        // Create flying item
        const flyingItem = document.createElement('div');
        flyingItem.className = 'flying-item';
        flyingItem.style.top = productRect.top + 'px';
        flyingItem.style.left = productRect.left + 'px';
        document.body.appendChild(flyingItem);
        
        // Animate flying item
        setTimeout(() => {
            flyingItem.style.top = cartRect.top + 'px';
            flyingItem.style.left = cartRect.left + 'px';
            flyingItem.style.opacity = '0';
            flyingItem.style.transform = 'scale(0.3)';
            
            // Remove flying item after animation
            setTimeout(() => {
                document.body.removeChild(flyingItem);
            }, 500);
            
            // Shake cart icon
            cartIcon.classList.add('shake-animation');
            setTimeout(() => {
                cartIcon.classList.remove('shake-animation');
            }, 500);
        }, 10);
        
        // Remove success message after a delay
        setTimeout(() => {
            successMessage.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(successMessage);
            }, 500);
        }, 2000);
    };
    
    // Expose the function to global scope for use in AJAX callbacks
    window.addToCartSuccess = addToCartSuccess;
    
    // Animate elements when they come into view
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('show');
            }
        });
    };
    
    // Add animate-on-scroll class to elements that should animate
    const addAnimationClasses = () => {
        // Product blocks
        const productBlocks = document.querySelectorAll('#pro-list li, #new-pro-list li');
        productBlocks.forEach((block, index) => {
            block.classList.add('animate-on-scroll');
            block.style.transitionDelay = (index * 0.1) + 's';
        });
        
        // Sections
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            section.classList.add('animate-on-scroll');
        });
        
        // Section titles
        const titles = document.querySelectorAll('.block-title, .block-motto');
        titles.forEach(title => {
            title.classList.add('animate-on-scroll');
        });
    };
    
    // Initialize animations
    addAnimationClasses();
    animateOnScroll();
    
    // Listen for scroll events
    window.addEventListener('scroll', animateOnScroll);
    
    // Image hover effect
    const productImages = document.querySelectorAll('.pro-img img, .new-pro-img img');
    productImages.forEach(img => {
        img.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        img.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // Enhance forms with animations
    const formInputs = document.querySelectorAll('input, textarea, select');
    formInputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.classList.add('input-focused');
        });
        
        input.addEventListener('blur', function() {
            if (this.value === '') {
                this.parentElement.classList.remove('input-focused');
            }
        });
        
        // Initial check for pre-filled inputs
        if (input.value !== '') {
            input.parentElement.classList.add('input-focused');
        }
    });
});

// Modify the original AJAX function to include animation
const originalOnAddToCartAjax = window.onAddToCartAjax;
window.onAddToCartAjax = function(productId) {
    // Call the original function if it exists
    if (typeof originalOnAddToCartAjax === 'function') {
        originalOnAddToCartAjax(productId);
    }
    
    // Add animation
    if (typeof window.addToCartSuccess === 'function') {
        window.addToCartSuccess(productId);
    }
};