// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get chatbot elements using the IDs and classes from chatbot.blade.php
    const chatbotInput = document.getElementById('chatbot-input');
    const chatbotSend = document.getElementById('chatbot-send');
    const chatbotMessages = document.getElementById('chatbot-messages');
    
    console.log("Chat.js loaded successfully");
    console.log("Input element:", chatbotInput);
    console.log("Send button:", chatbotSend);
    console.log("Messages container:", chatbotMessages);
    
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
    if (chatbotSend) {
        chatbotSend.addEventListener('click', sendMessage);
        console.log("Click event listener added to send button");
    }

    // Send message on Enter key
    if (chatbotInput) {
        chatbotInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
        console.log("Enter key event listener added to input field");
    }
});
