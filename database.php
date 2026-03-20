<?php

$host = 'localhost';
$db_name = 'book_collection';
$user = 'root';
$password = "";

$conn = mysqli_connect($host, $user, $password, $db_name);

if (!$conn) {
    echo "Unable to connect to database" . mysqli_connect_errno();
}
