<?php
session_start();
require "../config/database.php";
require "../includes/functions.php";

$id = $_REQUEST['id'];

try {
    $stmt = $dbh->prepare("DELETE FROM books WHERE id=?");
    $stmt->execute([$id]);
    redirect();
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
