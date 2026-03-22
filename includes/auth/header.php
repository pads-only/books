<?php
session_start();
date_default_timezone_set('UTC');
session_regenerate_id(true);
require "config/database.php";
require "includes/functions.php";

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}

$user = getUserById($dbh, $_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - Book Collection</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    .navbar {
        background: var(--card);
        border-bottom: 1px solid var(--border);
        padding: 12px 16px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .nav-left {
        font-weight: 600;
        font-size: 18px;
    }

    .nav-right {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .nav-right a {
        text-decoration: none;
    }

    .nav-right button {
        width: 100%;
    }

    /* Mobile adjustments */
    @media (max-width: 600px) {
        .navbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .nav-right {
            width: 100%;
            flex-direction: column;
        }

        .nav-right a {
            width: 100%;
        }
    }
</style>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="nav-left">📚Book Collection</div>
        <div class="nav-right">
            <a href="dashboard.php">Home</a>
            <a href="index.php">Upload Book</a>
            <a href="logout.php"><button class="btn-danger">Logout</button></a>
        </div>
    </div>
    <div class="container">