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
        
        <?php

            echo "<form class='delete-account' method='POST' action='".deleteAccount($conn)."'>
                    <input type='hidden' name='userid' value='".$_SESSION['userid']."'>
                    <button type='submit' name='accountDelete'>Delete Account</button>
                </form>";
        
        ?>

    </main>

  </body>
</html>