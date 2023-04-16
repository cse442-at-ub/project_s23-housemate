<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Housemate</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="chatbot.js"></script>
</head>
<body>
	<header>
		<nav>
			<div class="navbar-left">
				<a href="#">Home</a>
			</div>
			<div class="navbar-center">
				<h1>Housemate</h1>
			</div>
      		<div class="navbar-right">
				<a href="desktop.html">Login</a>
				<a href="logout.php">Logout</a>
				<a href="profile.html">Profile</a>
				<a href="forum.php">forum</a>

			</div>
		</nav>
	</header>
	<main>
		<div class="container">
			<div class="grey-box">
        	<div class="text">
					<p> Find Your University</p>
				</div>
				<div class="dropdown">
					<button class="dropbtn">Select your University</button>
					<div class="dropdown-content">
						<a href="NothCampus.html">  University At Buffalo- North Campus  </a>
            			<a href="SouthCampus.html">  University At Buffalo- South Campus  </a>
					</div>
				</div>
			</div>
			<div class="image-box">
				<img src="pic.jpg" alt="placeholder image">
			</div>
		</div>
		
		<div class="chatbot-popup" id="chatbotPopup">
		<div class="chatbot-popup-content">
			<div class="chatbot-header">
				<h3>Chatbot</h3>
				<button class="close-button" onclick="closeChatbot()">&times;</button>
			</div>
			<div class="chatbot-body" id="chatlog">
			</div>
			<div class="chatbot-footer">
				<input type="text" id="userinput" placeholder="Type your message..." />
				<button onclick="sendMessage()">Send</button>
			</div>
		</div>
	</div>

	</main>
</body>
</html>
