<?php

function emptyInputSignup($email, $username, $pwd, $pwdRepeat) {
    $result;

    if (empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}
function isStrongPassword($username, $password) {
    $hasUppercase = preg_match('/[A-Z]/', $password);
    $hasLowercase = preg_match('/[a-z]/', $password);
    $hasNumber = preg_match('/\d/', $password);
    $hasUsername = !$username || !preg_match('/' . preg_quote($username, '/') . '/i', $password);
    $hasSpecialChar = preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password);
    $isStrong = $hasUppercase && $hasLowercase && $hasNumber && $hasSpecialChar && strlen($password) >= 8 && $hasUsername;
    return $isStrong;
}

function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: create_account.html?=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES (?, ? , ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: create_account.html?=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: account_created.php?error=none");
    exit();
}
function updatePassword($conn, $email, $username, $pwd) {
    $sql = "UPDATE users SET usersPwd = ? WHERE usersEmail = ? AND usersUid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: create_account.html?=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "sss", $hashedPwd, $email, $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: account_created.php?error=none");
    exit();
}
function updatePicture($conn, $userUid, $image) {
    $sql = "UPDATE users SET userImage = ? WHERE usersEmail = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile_pic.html");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $image, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: desktop.html");
    exit();
}
function getPicture($conn) {
    $sql = "SELECT userImage FROM users WHERE usersUid = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile_pic.html");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["useruid"]);
    $result = $conn->query($sql);
    return $result;
}
function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}
function loginUSer($conn, $email, $pwd) {
    $uidExists = uidExists($conn, $email, $email);

    if ($uidExists === false) {
        header("location: login_logout?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: login_logout?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: index.php");
        exit();
    }
}

function deleteAccount($conn) {
    if (isset($_POST['accountDelete'])) {
        $userid = $_POST['userid'];

        $sql = "DELETE FROM users WHERE usersId='$userid'";
        $result = $conn->query($sql);

        session_start();
        session_unset();
        session_destroy();

        header("location: index.php");
        exit();
    }
}


?>