<?php
include "includes/auth/header.php";

$id = $_REQUEST['id'];

// $book = getBooksById($dbh, $id);
$book = getBooksById($dbh, $id, $_SESSION['user_id']);

if (!$book) {
    echo "book not found";
    exit;
}

?>
<h1>📚 Edit Book</h1>

<!-- Book Form -->
<div class="card">
    <form id="bookForm" action="actions/update.php?id=<?= $book['id'] ?>" method="post">
        <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>" />

        <div class="form-row">
            <input
                type="text"
                name="title"
                id="title"
                placeholder="Book Title"
                value="<?= $book["title"] ?>" />
            <input
                type="text"
                name="author"
                id="author"
                placeholder="Author"
                value="<?= $book["author"] ?>" />
        </div>

        <div class="form-row">
            <input type="text" name="genre" id="genre" placeholder="Genre" value="<?= $book["genre"] ?>" />
            <input type="number" name="year" id="year" placeholder="Year" value="<?= $book["year"] ?>" />
        </div>

        <button class="btn-primary" type="submit" id="submitBtn">
            Update Book
        </button>
        <a href="index.php">
            <button class="btn-secondary" type="button">
                Cancel
            </button>
        </a>
    </form>
</div>

<?php
include "includes/auth/footer.php"; ?>