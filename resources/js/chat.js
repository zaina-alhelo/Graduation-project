// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add CSS styles for chat scrolling
    function addChatStyles() {
        const styleElement = document.createElement('style');
        styleElement.textContent = `
            .chatbot-messages {
                overflow-y: auto;
                scrollbar-width: thin;
                scroll-behavior: smooth;
                -webkit-overflow-scrolling: touch; /* For better scroll on iOS */
            }
            
            /* Optional: Improve scrollbar appearance */
            .chatbot-messages::-webkit-scrollbar {
                width: 6px;
            }
            
            .chatbot-messages::-webkit-scrollbar-thumb {
                background-color: rgba(0, 0, 0, 0.2);
                border-radius: 3px;
            }
        `;
        document.head.appendChild(styleElement);
    }
    
    // Apply the styles immediately
    addChatStyles();
    
    // Get chatbot elements using the IDs and classes from chatbot.blade.php
    const chatbotInput = document.getElementById('chatbot-input');
    const chatbotSend = document.getElementById('chatbot-send');
    const chatbotMessages = document.getElementById('chatbot-messages');
    
    // Function to send message
    function sendMessage() {
        const message = chatbotInput.value.trim();
        if (message !== '') {
            // Add user message to chat
            const userMessageDiv = document.createElement('div');
            userMessageDiv.className = 'message user';
            
            const messagePara = document.createElement('p');
            messagePara.textContent = message;
            userMessageDiv.appendChild(messagePara);
            
            chatbotMessages.appendChild(userMessageDiv);

            // Clear input
            chatbotInput.value = '';

            // Simulate bot response (you can replace this with actual API call)
            setTimeout(function() {
                const botMessageDiv = document.createElement('div');
                botMessageDiv.className = 'message bot';
                
                const botMessagePara = document.createElement('p');
                botMessagePara.textContent = "I'm here to help with your eye health questions. Could you please provide more details?";
                botMessageDiv.appendChild(botMessagePara);
                
                chatbotMessages.appendChild(botMessageDiv);
                
                // Auto scroll to bottom
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }, 1000);
        }
    }

    // Send message on button click
    chatbotSend.addEventListener('click', sendMessage);

    // Send message on Enter key
    chatbotInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});