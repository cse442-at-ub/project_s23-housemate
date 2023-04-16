<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  require_once 'functions.php';
  require_once 'dbh.php';
  $email = $_POST["email"];

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
        // Check if the uploaded file is a JPEG image
        if($check["mime"] == "image/jpeg") {
          // Read the contents of the uploaded file
          $imageData = file_get_contents($_FILES["fileToUpload"]["tmp_name"]);
    
          // Convert the image data into a medium BLOB
          //$mediumBlob = imagecreatefromstring($imageData);
          //ob_start();
          //imagejpeg($mediumBlob, NULL, 50); // Change the quality as desired (0-100)
          //$imageData = ob_get_contents();
          //ob_end_clean();
    
          // Upload the medium BLOB to MySQL
          updatePicture($conn, $email, $imageData);

  } 
}else {
    header("location: profile.html");

    echo "File is not an image.";
    $uploadOk = 0;
  }

}
?>
