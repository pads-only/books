<?php
include "database.php";

$id = $_REQUEST['id'];

//select data from database using the id
$sql = "SELECT * FROM books WHERE id=$id";
$stmt = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($stmt);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Book Collection</title>
</head>

<body>
    <div class="container">
        <h1>📚 Edit Book</h1>

        <!-- Book Form -->
        <div class="card">
            <form id="bookForm" action="update.php?id=<?= $result['id'] ?>" method="post">
                <input type="hidden" id="bookId" />

                <div class="form-row">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Book Title"
                        value="<?= $result["title"] ?>" />
                    <input
                        type="text"
                        name="author"
                        id="author"
                        placeholder="Author"
                        value="<?= $result["author"] ?>" />
                </div>

                <div class="form-row">
                    <input type="text" name="genre" id="genre" placeholder="Genre" value="<?= $result["genre"] ?>" />
                    <input type="number" name="year" id="year" placeholder="Year" value="<?= $result["year"] ?>" />
                </div>

                <button class="btn-primary" type="submit" id="submitBtn">
                    Update Book
                </button>
            </form>
        </div>