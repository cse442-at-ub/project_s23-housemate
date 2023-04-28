<?php
$serverName = "oceanus.cse.buffalo.edu";
$dbUserName = "varenmeh";
$dbPassword = "50366238";
$dbName = "cse442_2023_spring_team_n_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (isset($_POST['rating'])) {
  $rating = intval($_POST['rating']);
  $post_id = intval($_POST['post_id']);
  $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

  // Check if user has already rated this post
  $sql = "SELECT rating FROM ratings WHERE user_id = $user_id AND post_id = $post_id";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $old_rating = $row['rating'];

    // If the user's new rating is the same as the old rating, do nothing
    if ($rating === $old_rating) {
      echo "You have already rated this post with $rating stars.";
      exit();
    }

    // If the user's new rating is different from the old rating, update the rating
    $sql = "UPDATE ratings SET rating = $rating WHERE user_id = $user_id AND post_id = $post_id";
    if (mysqli_query($conn, $sql)) {
      echo "Your rating for this post has been updated to $rating stars.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  } else {
    // Insert new rating
    $sql = "INSERT INTO ratings (post_id, user_id, rating) VALUES ($post_id, $user_id, $rating)";
    if (mysqli_query($conn, $sql)) {
      echo "Thank you for rating this post with $rating stars.";
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

  // Update the average rating for the post
  $sql = "SELECT AVG(rating) AS average_rating FROM ratings WHERE post_id = $post_id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $average_rating = $row['average_rating'];
  $sql = "UPDATE post1 SET average_rating = $average_rating WHERE id = $post_id";
  if (mysqli_query($conn, $sql)) {
    echo " The post's average rating has been updated to $average_rating stars.";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  if ($user_id == 0) {
    $user_id = mysqli_insert_id($conn);
    $_SESSION['user_id'] = $user_id;
  }
}

mysqli_close($conn);
?>
