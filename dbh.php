<?php

$serverName = "localhost:3306";
$dbUserName = "raghav";
$dbPassword = "d";
$dbName = "cse442_2023_spring_team_n_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>