<?php
session_start();
include "database.php";


$sql = "SELECT * FROM books ORDER BY id DESC";
$stmt = mysqli_query($conn, $sql);

$books = [];
while ($rows = mysqli_fetch_assoc($stmt)) {
    $books[] = $rows;
}

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
        <h1>📚 Book Collection</h1>
        <p>Simple CRUD interface</p>

        <!-- Book Form -->
        <div class="card">
            <form id="bookForm" action="create.php" method="post">
                <input type="hidden" id="bookId" />

                <div class="form-row">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Book Title" />
                    <input
                        type="text"
                        name="author"
                        id="author"
                        placeholder="Author" />
                </div>

                <div class="form-row">
                    <input type="text" name="genre" id="genre" placeholder="Genre" />
                    <input type="number" name="year" id="year" placeholder="Year" />
                </div>

                <button class="btn-primary" type="submit" id="submitBtn">
                    Save Book
                </button>
            </form>
        </div>
        <!-- Book List -->
        <div class="card">
            <p>
                <?= $_SESSION['message'] ?? '';
                session_unset(); ?>
            </p>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="bookTable">
                    <?php
                    foreach ($books as $book) {
                    ?>
                        <tr>
                            <td data-label="Title"><?= $book['title'] ?></td>
                            <td data-label="Author"><?= $book['author'] ?></td>
                            <td data-label="Genre"><?= $book['genre'] ?></td>
                            <td data-label="Year"><?= $book['year'] ?></td>
                            <td data-label="Actions">
                                <button onclick=""><a href="edit.php?id=<?= $book['id'] ?>">Edit</a></button>
                                <button><a href="delete.php?id=<?= $book['id'] ?>">Delete</a></button>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>