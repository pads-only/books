<?php
$host = 'localhost';
$db_name = 'book_collection';
$user = 'root';
$password = "";

try {
    $dbh = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, /// shows the error properly
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //fetch result as assoc array
        PDO::ATTR_EMULATE_PREPARES => false, // use real prepared statement
    ]);
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
