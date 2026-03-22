<?php
session_start();
require "../../config/database.php";
require "../../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    /**
     * check of empty input
     */
    if (empty($email) || empty($password)) {
        echo "All fields is required";
        exit;
    }

    /**
     * check if given email exist
     */
    $user = getUserByEmail($dbh, $email);
    if (!$user) {
        echo "Email not found";
        exit;
    }
    if (!password_verify($password, $user['password'])) {
        echo "Incorrect credentials";
        exit;
    }

    $_SESSION['user_id'] = $user['user_id'];
    header("location: ../../dashboard.php");
    exit;
}
