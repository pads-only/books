<?php
session_start();
include "config/database.php";
require "includes/functions.php";

$books = getAllBooks($dbh);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Book Collection</title>
</head>

<body>