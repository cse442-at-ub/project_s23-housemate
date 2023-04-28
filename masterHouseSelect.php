<?php
	session_start();

  date_default_timezone_set('America/New_York');
  include 'dbh.php';
  include 'getHousing.php';
  include 'comments.php';

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
        
        
        <?php

        $_SESSION['housingName'] = $_GET['housingName'];
        getHousing($conn, $_SESSION['housingName']);

        if (isset($_SESSION['useruid'])) {
          echo "<form method='POST' action'".setComments($conn, $_SESSION['housingName'])."'>
                <input type='hidden' name='uid' value='".$_SESSION["useruid"]."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='commentSubmit'>Comment</button>
              </form>";
        }
        
        getComments($conn, $_SESSION['housingName']);
        
        ?>

    </main>
    <script>

var slidePosition = 1;
      SlideShow(slidePosition);

      // forward/Back controls
      function plusSlides(n) {
        SlideShow(slidePosition += n);
      }

      //  images controls
      function currentSlide(n) {
        SlideShow(slidePosition = n);
      }

      function SlideShow(n) {
        var i;
        var slides = document.getElementsByClassName("Containers");
        var circles = document.getElementsByClassName("dots");
        if (n > slides.length) {slidePosition = 1}
        if (n < 1) {slidePosition = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < circles.length; i++) {
            circles[i].className = circles[i].className.replace(" enable", "");
        }
        slides[slidePosition-1].style.display = "block";
        circles[slidePosition-1].className += " enable";
      } 

    </script>
  </body>
</html>