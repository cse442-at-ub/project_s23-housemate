<?php

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if (emptyInputLogin($email, $pwd) !== false) {
        header("location: login_logout.html?error=emptyinput");
        exit();
    }

    loginUser($conn , $email, $pwd);
}
else {
    header("location: login_logout.html");
    exit();
}



?>