<?php
session_start();
require "../config/database.php";
require "../includes/functions.php";

$id = $_REQUEST['id'];
$user_id = $_SESSION['user_id'];
try {
    $stmt = $dbh->prepare("DELETE FROM books WHERE id=? AND user_id=?");
    $stmt->execute([$id, $user_id]);
    redirect();
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
