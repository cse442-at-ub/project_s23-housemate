<?php

if (isset($_POST["submit"])) {

    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $mail =  $_POST["email"];
    require_once 'dbh.php';
    require_once 'functions.php';

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: change_pass.html?error=passwordsdontmatch");
        exit();
    }

    updatePassword($conn, $mail, $pwd);
}
else {
    header("location: change_pass.html");
}
?>