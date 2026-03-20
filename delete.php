<?php
session_start();
include "database.php";

$id = $_REQUEST['id'];

$sql = 'DELETE FROM books WHERE id=?';
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['message'] = "Book has been deleted";
    header("location: index.php");
}
