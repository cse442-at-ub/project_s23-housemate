<?php
	session_start();

  date_default_timezone_set('America/New_York');
  include 'dbh.php';
  include 'post.php';

?>

<!DOCTYPE html>
<link rel="stylesheet" href="style. css" />
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
	<title>Create Account</title>
</head>
	<body>

		<div class="mini-navbar">
			<h3>Housemate Forum</h3>
		</div>  <!--div for mini-navbar is closed  -->
		<div class="blue-navbar"></div> 
		

        <?php

if (isset($_SESSION['useruid'])) {
  echo "<form method='POST' action'".setPosts($conn)."'>
        <input type='hidden' name='uid' value='".$_SESSION["useruid"]."'>
        <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
        <textarea name='message'></textarea><br>
        <button type='submit' name='commentSubmit'>Comment</button>
      </form>";
}


getPosts($conn);

?>
		<a href="desktop.html">back</a>





</body>
</html>