<?php
require "../../config/database.php";
require "../../includes/functions.php";
require "../../includes/helper_functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $fname = trimmingInput('fname');
    $lname = trimmingInput('lname');
    $email = trimmingInput('email');
    $password = trimmingInput('password');
    $con_pass = trimmingInput('confirm_password');

    /**
     * check of empty input
     */
    if (isEmpty([$fname, $lname, $email, $password, $con_pass])) {
        echo "All fields is required";
        exit;
    }

    /**
     * check for lenght
     */
    if (strlen($fname) > 30) {
        echo "The first name is too long. It should not exceed 30 characters";
        exit;
    }
    if (strlen($fname) < 3) {
        echo "The first name is too short. It should not be less than 3 characters";
        exit;
    }
    if (strlen($lname) > 30) {
        echo "The last name is too long. It should not exceed 30 characters";
        exit;
    }
    if (strlen($lname) < 3) {
        echo "The last name is too short. It should not be less than 3 characters";
        exit;
    }
    if (strlen($password) < 8) {
        echo "The password is too short. It should not be less than 8 characters";
        exit;
    }

    /**
     * check if the password matches
     */
    if ($password != $con_pass) {
        echo "Password does not match";
        exit;
    }

    /**
     * hash password with password_hashed with Argon2id
     * 👉 Why Argon2id?
     * Winner of the Password Hashing Competition
     * Resistant to GPU attacks
     * Memory-hard (harder to brute-force)
     */
    $hash = password_hash($password, PASSWORD_ARGON2ID);

    /**
     * check if the email is a valid email
     */
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
        exit;
    }

    /**
     * check if the user email already exist
     */
    if (getUserByEmail($dbh, $email)) {
        echo "Email already exist";
        exit;
    }


    /**
     * insert to database 
     */
    try {
        $stmt = $dbh->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?,?,?,?)");
        $stmt->execute([$fname, $lname, $email, $hash]);

        header("location: ../../login.php");
        exit;
    } catch (PDOException $e) {
        die("Error registering account" . $e->getMessage());
    }
}
