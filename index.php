<?php

include "includes/auth/header.php";

$books = getBooksByUserId($dbh, $_SESSION['user_id']);
?>

<div class="container">
    <!-- Book Form -->
    <div class="card">
        <form id="bookForm" action="actions/create.php" method="post">
            <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" />

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
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Date of upload</th>
                    <th>Year Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="bookTable">
                <?php
                foreach ($books as $book) {
                    $date = date_create($book['created_at']);
                ?>
                    <tr>
                        <td data-label="Title"><?= $book['title'] ?? '' ?></td>
                        <td data-label="Author"><?= $book['author'] ?? '' ?></td>
                        <td data-label="Genre"><?= $book['genre'] ?? '' ?></td>
                        <td data-label="Genre"><?= date_format($date, "M. j, Y") ?? '' ?></td>
                        <td data-label="Year"><?= $book['year'] ?? '' ?></td>
                        <td data-label="Actions">
                            <a href="edit.php?id=<?= $book['id'] ?>"><button>Edit</button></a>
                            <a id="link" href="actions/delete.php?id=<?= $book['id'] ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "includes/auth/footer.php"; ?>