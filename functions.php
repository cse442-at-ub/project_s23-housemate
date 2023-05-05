<?php
function getUtility($conn,$housingId) {
    $sql = "SELECT * FROM utility WHERE housingId='$housingId'";
    $result = $conn->query($sql);
    
    
    while ($row = $result->fetch_assoc()) {

        echo "<div class='box'>
            <h10>'".$row['userUid']."'</h2>
            <br>
            <h10>Wifi Included: '".$row['wifi_Inc']."'</h10> 
            <br>  
            <h10>Wifi Quality: '".$row['wifiQuality']."'</h10>   
            <br>
            <h10>Air conditioning Included: '".$row['aircon_Inc']."'</h10> 
            <br>  
            <h10>Air conditioning Quality: '".$row['airconQuality']."'</h10> 
            <br>  
            <h10>Water Included: '".$row['water_Inc']."'</h10> 
            <br>  
            <h10>Water Quality: '".$row['water_Quality']."'</h10> 
            <br> 
            <h10>Electricity Included: '".$row['elec_Inc']."'</h10> 
            <br>
            <h10>Electricity Quality: '".$row['elecQuality']."'</h10> 
            <br>  
            <h10>Exercise Facility Included: '".$row['ex_Inc']."'</h10> 
            <br> 
            <h10>Exercise Facility Quality: '".$row['exQuality']."'</h10> 
            <br>
            <h10>Additional Comments: '".$row['comment']."'</h10> 
            <br>
            <br>
        ";
    }
}
function setUtil($conn, $housingId, $userId){
    if (isset($_POST['Submit'])) {
        $wifi_Inc = isset($_POST['attribute1']) ? $_POST['attribute1'] : "";
        (int)$wifiQuality = $_POST['attribute2'];
        $aircon_Inc = isset($_POST['attribute3']) ? $_POST['attribute3'] : "";
        (int)$airconQuality = $_POST['attribute4'];
        $elec_Inc = isset($_POST['attribute5']) ? $_POST['attribute5'] : "";
        (int)$elecQuality = $_POST['attribute6'];
        $water_Inc = isset($_POST['attribute7']) ? $_POST['attribute7'] : "";
        (int)$waterQuality = $_POST['attribute8'];
        $ex_Inc = isset($_POST['attribute9']) ? $_POST['attribute9'] : "";
        (int)$exQuality = $_POST['attribute10'];
        $comment = $_POST['message'];
        $sql = 'INSERT INTO utility (housingId, userUid, wifi_Inc, wifiQuality, aircon_Inc,airconQuality,water_Inc,water_Quality,elec_Inc,elecQuality,ex_Inc,exQuality,comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)';
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $error = mysqli_error($conn);
            echo "Error: $error";
            //header("location: profile_pic.html");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssssssssssss",$housingId,$userId, $wifi_Inc, $wifiQuality, $aircon_Inc,$airconQuality,$water_Inc,$waterQuality,$elec_Inc,$elecQuality,$ex_Inc,$exQuality,$comment);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo '<script language="javascript">window.location.href ="masterUtilitySelect.php?housingId='.$housingId.'"</script>';
    }
}
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
function updatePassword($conn, $email, $pwd) {
    $sql = "UPDATE users SET usersPwd = ? WHERE usersEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: create_account.html?=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: account_created.php?error=none");
    exit();
}
function updatePicture($conn, $userUid, $image) {
    $sql = "UPDATE users SET userImage = ? WHERE usersUid = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile_pic.html");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $image, $userUid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

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