<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if (emptyInputSignup($email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: create_account.html?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: create_account.html?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: create_account.html?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: create_account.html?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username, $email) !== false) {
        header("location: create_account.html?error=usernametaken");
        exit();
    }

    createUser($conn, $email, $username, $pwd);
    
}
else {
    header("location: create_account.html");
}
?>