<?php
    session_start();

error_reporting(0);
require_once 'dbh.php';
require_once 'functions.php';
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {

    $userUid = $_SESSION["useruid"];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $filetype = $_FILES["uploadfile"]["type"];
    $filesize = $_FILES["uploadfile"]["size"];
    echo "$filesize"; 
    echo "$filename"; 

    $email = $_SESSION['username'];
    $base64 = base64_encode(file_get_contents($tempname));
    echo "File uploaded successfully."; 

    $sql = "UPDATE users SET userImage = ? WHERE usersUid = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile_pic.html");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $base64, $userUid);
    if(!mysqli_stmt_execute($stmt)){
    $error = mysqli_error($conn);
    echo "Error: $error";
    }
    mysqli_stmt_close($stmt);    
}
?>
 
<!DOCTYPE html>
<html>
 
<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
 
<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>

            Email:<br>  
					<input type="email" name="email"><br>    
                            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    <?php 
$sql = "SELECT userImage FROM users WHERE usersUid = ? ";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $_SESSION["useruid"]);
$result = $conn->query($sql);
mysqli_stmt_close($stmt);    
?>

    <div class="gallery"> 
        <?php ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result); ?>" /> 
        <?php  ?> 
    </div> 
</body>
 
</html>