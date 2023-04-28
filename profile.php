<?php

  include 'dbh.php';
  include 'functions.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected theme ID from the form submission
    $theme_id = $_POST['theme'];

    // Store the selected theme ID in a session variable
    session_start();
    $_SESSION['theme_id'] = $theme_id;

    // Redirect the user back to the same page to avoid resubmitting the form
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }

  // Start the session
  session_start();

  // Retrieve the theme ID from the session variable
  if (isset($_SESSION['theme_id'])) {
    $theme_id = $_SESSION['theme_id'];
  } else {
    // If the theme ID isn't set in the session, use a default value
    $theme_id = 1;
  }

  // Query the colorPalette table to retrieve the selected theme
  $sql = "SELECT * FROM colorPalette WHERE id = '$theme_id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Retrieve the theme colors from the database
    $row = $result->fetch_assoc();
    $_SESSION['p_color'] = $row['p_color'];
    $_SESSION['s_color'] = $row['s_color'];
    
  }
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
  <?php
    echo "<body style=' background-color: ".$_SESSION['p_color'].";'>";
  ?>
    <main>

    <?php
    echo '<div class="header" style="background-color: '.$_SESSION['s_color'].';">
      <div class="inner_header" style="background-color: '.$_SESSION['s_color'].';">
        <div class="logo_container" style="background-color: '.$_SESSION['s_color'].';">
          <a style="background-color: '.$_SESSION['s_color'].'; color: '.$_SESSION['p_color'].';" href="index.php">House<span style="background-color: '.$_SESSION['s_color'].';">mate</span></a>
        </div>';


        
        if (isset($_SESSION["useruid"])) {
          echo "<ul style='background-color: ".$_SESSION['s_color'].";' class=\"navigation\">";
          echo "<a style='background-color: ".$_SESSION['s_color']."; color: '><li style='background-color: ".$_SESSION['s_color']."; color: ".$_SESSION['p_color'].";'>Hello " . $_SESSION["useruid"] . "!</li></a>";
          echo "<a style='background-color: ".$_SESSION['s_color']."; color: ' href=\"profile.php\"><li style='background-color: ".$_SESSION['s_color']."; color: ".$_SESSION['p_color'].";'>Profile</li></a>";
          echo "<a style='background-color: ".$_SESSION['s_color']."; ' href=\"logout.php\"><li style='background-color: ".$_SESSION['s_color']."; color: ".$_SESSION['p_color'].";'>Logout</li></a>";
          echo "</ul>";
        }
        else {
          echo "<ul class=\"navigation\">";
          echo "<a href=\"login_logout.html\"><li>Login</li></a>";
          echo "</ul>";
        }
      ?>
    </div>

    <form class='colorSelect' method="POST">
      <?php
        echo '<label style="color: '.$_SESSION['s_color'].'" for="theme">Select a color theme:</label>'; ?>
      <select name="theme" id="theme">

        <?php
          $sql = "SELECT * FROM colorPalette";
          $result = $conn->query($sql);
          
          echo '<div class="themeContainer" style="text-align: center; padding-top: 5vh;">
                      <h2>Select a theme</h2 style="color: black;">
                      <div class="colorPalette" style="text-align: center; ">';
          
          while ($row = $result->fetch_assoc()) {
              echo '<option value=' . $row['id'] . ' class="light" style="border-style: solid; border-color: black; color: '.$row['s_color'].'; background-color: '.$row['p_color'].'; width: 200px; height: 100px; display: inline-block; margin: 5px;">  '.$row['p_color'].' </option>';
          }
                            
          echo '</div>
              </div>';
        
      echo "</select>
      <button style='background-color: ".$_SESSION['s_color']."; color: ".$_SESSION['p_color']."' type=\"submit\">Save</button>";
      ?>
    </form>
    <!--
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
      -->
<!--
      <div class="whitebox" style="text-align: center; padding-top: 5vh;">
			<div><\!--div for 5a --\>
				<a style="padding: 4vw;" href="change_pass.html"> Change Password </a>
				<a style="padding: 4vw;" href="profile_pic.php"> Profile Picture </a>
			</div>
		</div>
    -->

      <?php

          echo "<form class='delete-account' method='POST' action='".deleteAccount($conn)."'>
                  <input type='hidden' name='userid' value='".$_SESSION['userid']."'>
                  <button style='background-color: ".$_SESSION['s_color']."; color: ".$_SESSION['p_color']."' type='submit' name='accountDelete'>Delete Account</button>
              </form>";
      
      ?>

    </main>

  </body>
</html>