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


        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
         <ul class="dropdown-menu">
         <?php 
           echo '<li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=0">Governers Complex</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=1">Greiner Hall</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=2">Ellicott Complex</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=3">Hadley Apartments</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=4">South Lake Village Apartments</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=5">Flickinger Court Apartments</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=6">Creekside Village Apartments</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=7">Flint Village Apartments</a></li>
           <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=8">Collegiate Village</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=9">Axis 360</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=10">Goodyear Hall</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=11">Clement Hall</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=12">Bengal Hall</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=13">Neumann Hall</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=14">Bishop Hall</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=15">Towers Hall</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=16">Moore Complex</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=17">STAC</a></li>
            <li><a class="dropdown-item" href="masterUtilitySelect.php?housingId=18">Campus Walk NY</a></li>';
         ?>
       </ul>
    </div>



    </main>

  </body>
</html>