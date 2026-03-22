<?php

include "includes/auth/header.php";

$books = getAllBooks($dbh);
?>

<div class="container">
    <!-- Book Form -->
    <div class="card">
        <form id="bookForm" action="actions/create.php" method="post">
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
                        <td data-label="Title"><?= $book['title'] ?? '' ?></td>
                        <td data-label="Author"><?= $book['author'] ?? '' ?></td>
                        <td data-label="Genre"><?= $book['genre'] ?? '' ?></td>
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