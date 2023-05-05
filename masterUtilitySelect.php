<?php
	session_start();

  date_default_timezone_set('America/New_York');
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
              echo "<a><li>Welcome " . $_SESSION["useruid"] . "!</li></a>";
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
        
        
        <?php

        $_SESSION['housingId'] = $_GET['housingId'];
         
        
        if (isset($_SESSION['useruid'])) {
          echo "<form action='".setUtil($conn, $_SESSION['housingId'], $_SESSION["useruid"])."' method='post'>
          <label for='wifi_Inc'>Wifi Included?:</label>
          <input type='radio' name='attribute1' value='yes'> Yes
          <input type='radio' name='attribute1' value='no'> No
          
          <br>
          
          <label for='wifiQuality'>Wifi Quality:</label>
          <input type='number' name='attribute2' min='1' max='5'>

          <br>
          
          <label for='aircon_Inc'>Air Conditioning Included?:</label>
          <input type='radio' name='attribute3' value='yes'> Yes
          <input type='radio' name='attribute3' value='no'> No
          
          
          
          <br>
          
          <label for='airconQuality'>AirConditioning Quality:</label>
          <input type='number' name= 'attribute4' min='1' max='5'>
          
          <br>
          <label for='elec_Inc'>Electricity Included?:</label>
          <input type='radio' name='attribute5' value='yes'> Yes
          <input type='radio' name='attribute5' value='no'> No
          
          
          
          <br>
          
          <label for='elecQuality'>Electricity Quality:</label>
          <input type='number' name= 'attribute6' min='1' max='5'>
          <br>

          <label for='water_Inc'>Water Included?:</label>
          <input type='radio' name='attribute7' value='yes'> Yes
          <input type='radio' name='attribute7' value='no'> No
          
          
          
          <br>
          
          <label for='waterQuality'>Water Quality:</label>
          <input type='number' name= 'attribute8' min='1' max='5'>
          <br>

          <label for='ex_Inc'>Exercise Facility Included?:</label>
          <input type='radio' name='attribute9' value='yes'> Yes
          <input type='radio' name='attribute9' value='no'> No
          
          
          
          <br>
          
          <label for='exQuality'>>Exercise Facility:</label>
          <input type='number' name= 'attribute10' min='1' max='5'>
          <br>
          <textarea name='message'></textarea><br>
          <br>
          <button type='submit' name='Submit'></button>
          </form>";
        }
        
        getUtility($conn, $_SESSION['housingId']);

        ?>

    </main>
    
  </body>
</html>