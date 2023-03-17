<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["Email:"];
  $username = $_POST["Username:"];
  $password = crypt($_POST["Password:"], PASSWORD_DEFAULT); // Hash the password for security
  $confirm_password = $_POST["Confirm password:"];

  if (empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
    echo "Please fill in all fields.";
    exit;
  } else if ($password != $confirm_password) {
    echo "Passwords do not match.";
    exit;
  }

  // Step 1: Connect to the database
  $db_servername = "oceanus.cse.buffalo.edu:3306 ";
  $db_username = "rsdevara";
  $db_password = "50304342";
  $db_name = "ocse442_2023_spring_team_n_db";

  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";

  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sss", $email, $username, $password);

  if (mysqli_stmt_execute($stmt)) {
    // Account created successfully, redirect to the account_created.html page
    header("Location: account_created.html");
    exit;
  } else {
    // Account creation failed, display an error message
    echo "Error: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
 
}
?>