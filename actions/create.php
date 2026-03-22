<?php
session_start();
require '../config/database.php';
require '../includes/functions.php';
require '../includes/helper_functions.php';

echo trimmingInput('title');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    /**
     * used trim() function to remove white spaces or tabs 
     * and then use the null coalescing operator ?? 
     * to ensure that it will default to empty string
     * */
    $user_id = trimmingInput('user_id');
    $title = trimmingInput('title');
    $author = trimmingInput('author');
    $genre = trimmingInput('genre');
    $year = trimmingInput('year');

    /**
     * check of empty input
     */
    // if (empty($title) || empty($author)) {
    //     echo "Title and author is required";
    //     exit;
    // }
    if (!isEmpty([$title, $author])) {
        echo "Title and author is required!";
        exit;
    }

    /**
     * check for the length title and author
     * title should not exceed 60 char and not less than 3 char
     * and author should not exceed 40 and not less than 3 char
     */
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

    /**
     * insert to the database using pdo
     * The Pattern You Should Memorize
     * This is your new mental model:
     * $stmt = $dbh->prepare("SQL QUERY WITH ?");
     * $stmt->execute([$value1, $value2]);
     * $result = $stmt->fetch(); // or fetchAll()
     */
    try {
        $stmt = $dbh->prepare("INSERT INTO books (user_id, title, author, genre, year) VALUES (?,?,?,?,?)");
        $stmt->execute([$user_id, $title, $author, $genre, $year]);

        redirect();
    } catch (\Throwable $th) {
        //throw $th;
        die("Upload Error: " . $e->getMessage());
    }
}

// redirect();
