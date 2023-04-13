function sendMessage() {
    var userinput = document.getElementById("userinput");
    var chatlog = document.getElementById("chatlog");

    var userMessage = userinput.value;
    var botMessage = "Bot: " + getResponse(userMessage);

    var newMessage = document.createElement("p");
    newMessage.textContent = "You: " + userMessage;
    chatlog.appendChild(newMessage);

    var newBotMessage = document.createElement("p");
    newBotMessage.textContent = botMessage;
    chatlog.appendChild(newBotMessage);

    userinput.value = "";
    chatlog.scrollTop = chatlog.scrollHeight;
}

function getResponse(message) {
    var responses = {
        "hello": "Hi there!",
        "how are you?": "I'm doing well, thank you!",
        "goodbye": "Goodbye!",
        "default": "I'm sorry, I don't understand."
    };

    message = message.toLowerCase();

    return responses[message] || responses["default"];
}

function openChatbot() {
    document.getElementById("chatbotPopup").style.display = "block";
}

function closeChatbot() {
    document.getElementById("chatbotPopup").style.display = "none";
}
