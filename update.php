<?php
session_start();
include "database.php";

$method = $_SERVER['REQUEST_METHOD'];
$id = $_REQUEST['id'];

if ($method === "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    //validate inputs
    if (empty($title) || empty($author) || empty($genre)) {
        echo "All fields are required";
    }

    #slq 
    $sql = "UPDATE books SET title='$title', author='$author', genre='$year', year='$year' WHERE id='$id'";
    $stmt = mysqli_query($conn, $sql);

    $_SESSION['message'] = "Book update succesfully";
    header("location: index.php");
}
