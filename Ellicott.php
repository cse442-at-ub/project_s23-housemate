<?php
	session_start();

  date_default_timezone_set('America/New_York');
  include 'dbh.php';
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
  <body>
    <main>
      
        <div class="header">
          <div class="inner_header">
            <div class="logo_container">
              <a href="index.php">House<span>mate</span></a>
            </div>
          </div>
        </div>

        <div class="housing_title">
          <h1>Ellicott Complex</h1>
          <a href="https://www.buffalo.edu/campusliving/find-your-home/where-can-i-live/residence-halls/ellicott-complex.html">Learn more</a>
        </div>
        

        <!-- Slideshow container -->
        <div class="slideshow-container fade">

          <!-- Full images with numbers and message Info -->
          <div class="Containers">
            <div class="MessageInfo">1 / 3</div>
            <img src="ellicott1.jpg" style="width:100%">
          </div>

          <div class="Containers">
            <div class="MessageInfo">2 / 3</div>
            <img src="ellicott2.jpg" style="width:100%">
          </div>

          <div class="Containers">
            <div class="MessageInfo">3 / 3</div>
            <img src="ellicott3.jpg" style="width:100%">
          </div>

          <!-- Back and forward buttons -->
          <a class="Back" onclick="plusSlides(-1)">&#10094;</a>
          <a class="forward" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The circles/dots -->
        <div style="text-align:center">
          <span class="dots" onclick="currentSlide(1)"></span>
          <span class="dots" onclick="currentSlide(2)"></span>
          <span class="dots" onclick="currentSlide(3)"></span>
        </div>

        
        <?php
        echo "<form method='POST' action'".setComments($conn)."'>
                <input type='hidden' name='uid' value='".$_SESSION["useruid"]."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message'></textarea><br>
                <button type='submit' name='commentSubmit'>Comment</button>
              </form>";
        
        getComments($conn);
        
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