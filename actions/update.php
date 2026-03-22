<?php
session_start();
require "../config/database.php";
require "../includes/functions.php";

$id = $_REQUEST['id'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $user_id = trim($_POST['user_id'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $year = trim($_POST['year'] ?? '');

    /**
     * check of empty input
     */
    if (empty($title) || empty($author)) {
        echo "Title and author is required";
        exit;
    }

    if (strlen($title) > 60) {
        echo "The title is too long. It should not exceed 60 characters";
        exit;
    }
    if (strlen($title) < 3) {
        echo "The title is too short. It should not be less than 3 characters";
        exit;
    }
    if (strlen($author) > 40) {
        echo "The author is too long. It should not exceed 40 characters";
        exit;
    }
    if (strlen($author) < 3) {
        echo "The author is too short. It should not be less than 3 characters";
        exit;
    }
    try {
        //code...
        $stmt = $dbh->prepare("UPDATE books SET title=?, author=?, genre=?, year=? WHERE id=? AND user_id=?");
        $stmt->execute([$title, $author, $genre, $year, $id, $user_id]);

        redirect();
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }

    echo "Book update succesfully";
}

redirect();
