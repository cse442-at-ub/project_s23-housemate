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
        "how do you file your taxes": "You should check that on google",
        "how big is the moon": "Its pretty Big",
        "how many cms in an inch": "You should Know that",
        "create account":"index.html",
        "default": "I'm sorry, I don't understand,\n I have listed some FAQ's:\n\nQ) How do I see the reviews?\nA) You can see the reviews of each housing on their respective housing pages.\n Q) How do I select my University\n A) You can look up your university on the home page after signing in\n\n Here are some links to different pages:\n<a href='create_account.html'> Create Account</a>\n<a href='login_logout.html'>Login Page</a>\n<a href='index.php'>Home Page</a>"
    };
    message = message.toLowerCase();
    var response = responses[message]||responses["default"];
    var chatlog = document.getElementById("chatlog");
    var responseElement = document.createElement("div");
    responseElement.className = "chatbot-message";
    responseElement.innerHTML = response;
    chatlog.appendChild(responseElement);
}

function openChatbot() {
    document.getElementById("chatbotPopup").style.display = "block";
}

function closeChatbot() {
    document.getElementById("chatbotPopup").style.display = "none";
}
