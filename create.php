<?php
session_start();
include 'database.php';


$method = $_SERVER['REQUEST_METHOD'];

if ($method === "POST") {

    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $year = $_POST['year'];

    //validate inputs
    if (empty($title) || empty($author) || empty($genre)) {
        echo "All fields are required";
    }

    //insert to database
    $sql = "INSERT INTO books (title, author, genre, year) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssi", $title, $author, $genre, $year);

    if (mysqli_stmt_execute($stmt)) {
        header("location: index.php");
        $_SESSION['message'] = "Book added successfully";
    }
} else {
    header("location: index.php");
    exit;
}
