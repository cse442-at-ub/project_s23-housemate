<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email_username = $_POST["Username:"];
  $password = $_POST["Password:"];

  // Step 1: Connect to the database
  $db_servername = "oceanus.cse.buffalo.edu:3306 ";
  $db_username = "rsdevara";
  $db_password = "50304342";
  $db_name = "ocse442_2023_spring_team_n_db";

  $conn = mysqli_connect($db_servername, $db_username, $db_password, $db_name);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Step 2: Query the database to find a matching user
  $sql = "SELECT * FROM users WHERE (email = ? OR username = ?)";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "ss", $email_username, $email_username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user["password"])) {
    // Step 3: Start a session and redirect to the home page
    $_SESSION["user_id"] = $user["id"];
    header("Location: index.html");
    exit;
  } else {
    // Step 4: Display an error message
    echo "Invalid email/username or password.";
    header("Location: login_logout.html");
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
?>