<?php

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $username = $_POST["uid"];
    $date = $_POST["date"];
    $body = $_POST["message"];

    require_once 'dbh.php';
    require_once 'functions.php';

}

function setPosts($conn) {
    if (isset($_POST['commentSubmit'])) {
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "INSERT INTO posts (uid, date, message) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);

        header("location: Ellicott.php");

    }
}

function getPosts($conn) {
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='comment-box'><p>";
                echo $row['uid']."<br>";
                echo $row['date']."<br>";
                echo $row['message'];
                echo "</p>";
            if (isset($_SESSION['useruid'])) {
                if ($_SESSION['useruid'] == $row['uid']) {
                    echo "<form class='delete-form' method='POST' action='".deletePosts($conn)."'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <button type='submit' name='commentDelete'>Delete</button>
                    </form>
                
                    <form class='edit-form' method='POST' action='editPosts.php'>
                        <input type='hidden' name='cid' value='".$row['cid']."'>
                        <input type='hidden' name='uid' value='".$row['uid']."'>
                        <input type='hidden' name='date' value='".$row['date']."'>
                        <input type='hidden' name='message' value='".$row['message']."'>
                        <button>Edit</button>
                    </form>";
                }
            }
            echo "</div>";
        } 
    }
}

function editPosts($conn) {
    if (isset($_POST['commentSubmit'])) {
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];

        $sql = "UPDATE posts SET message='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);

        header("location: Ellicott.php");

    }
}

function deletePosts($conn) {
    if (isset($_POST['commentDelete'])) {
        $cid = $_POST['cid'];

        $sql = "DELETE FROM comments WHERE cid='$cid'";
        $result = $conn->query($sql);

        header("location: Ellicott.php");
    }
}
?>