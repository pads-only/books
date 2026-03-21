<?php
session_start();
include "config/database.php";

$id = $_REQUEST['id'];

try {
    $stmt = $dbh->prepare("DELETE FROM books WHERE id=?");
    $stmt->execute([$id]);
    header("location: index.php");
    exit;
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
