<?php

if (isset($_POST["submit"])) {

    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: change_pass.html?error=passwordsdontmatch");
        exit();
    }

    updatePassword($conn, $email, $username, $pwd);
    header("location: profile.html");
}
else {
    header("location: change_pass.html");
}
?>