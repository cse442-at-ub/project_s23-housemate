<?php

$serverName = "oceanus.cse.buffalo.edu";
$dbUserName = "yuanjiex";
$dbPassword = "LOLgtfo66@%";
$dbName = "cse442_2023_spring_team_n_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>