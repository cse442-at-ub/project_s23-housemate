<?php
    
    session_start();
    include 'dbh.php';
    include 'functions.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Housemate</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <main>

    <div class="header">
      <div class="inner_header">
        <div class="logo_container">
          <a href="index.php">House<span>mate</span></a>
        </div>


        <?php
        if (isset($_SESSION["useruid"])) {
          echo "<ul class=\"navigation\">";
          echo "<a><li>Hello " . $_SESSION["useruid"] . "!</li></a>";
          echo "<a href=\"profile.php\"><li>Profile</li></a>";
          echo "<a href=\"logout.php\"><li>Logout</li></a>";
          echo "</ul>";
        }
        else {
          echo "<ul class=\"navigation\">";
          echo "<a href=\"login_logout.html\"><li>Login</li></a>";
          echo "</ul>";
        }
      ?>
    </div>

    <div class="themeContainer" style="text-align: center; padding-top: 5vh;">
        <h2>Select a theme</h2 style="color: black;">
        <div class="colorPalette" style="text-align: center; ">
          <div class="light" style="border-style: solid; background-color: white; width: 200px; height: 100px; display: inline-block; padding-right: 0; padding-left: 0;">Light</div>
          <div class="dark" style="border-style: solid; border-color: black; color: white; background-color: black; width: 200px; height: 100px; display: inline-block; padding-right: 0; padding-left: 0;">Dark</div>
          <div class="blue" style="border-style: solid; border-color: black; color: white; background-color: blue; width: 200px; height: 100px; display: inline-block; padding-right: 0; padding-left: 0;">Blue</div>
          <div class="red" style="border-style: solid; background-color: red; width: 200px; height: 100px; display: inline-block; padding-right: 0; padding-left: 0;">Red</div>
          <div class="green" style="border-style: solid; background-color: green; width: 200px; height: 100px; display: inline-block; padding-right: 0; padding-left: 0;" >Green</div>
        </div>
      </div>

      <div class="whitebox" style="text-align: center; padding-top: 5vh;">
			<div><!--div for 5a -->
				<a style="padding: 4vw;" href="change_pass.html"> Change Password </a>
				<a style="padding: 4vw;" href="profile_pic.php"> Profile Picture </a>
			</div>
		</div>

      <?php

          echo "<form class='delete-account' method='POST' action='".deleteAccount($conn)."'>
                  <input type='hidden' name='userid' value='".$_SESSION['userid']."'>
                  <button type='submit' name='accountDelete'>Delete Account</button>
              </form>";
      
      ?>

    </main>

  </body>
</html>