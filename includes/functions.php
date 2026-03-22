<?php

//select all books from database
function getAllBooks($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM books ORDER BY id DESC");
    $stmt->execute();
    $books = $stmt->fetchAll();
    return $books;
}

function getBooksById($dbh, $id, $user_id)
{
    $stmt = $dbh->prepare("SELECT * FROM books WHERE id=? AND user_id=?");
    $stmt->execute([$id, $user_id]);
    $book = $stmt->fetch();
    return $book;
}

function getBooksByUserId($dbh, $user_id)
{
    $stmt = $dbh->prepare("SELECT * FROM books WHERE user_id=?");
    $stmt->execute([$user_id]);
    $book = $stmt->fetchAll();
    return $book;
}

function getUserByEmail($dbh, $email)
{
    $stmt = $dbh->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    return $user;
}

function getUserById($dbh, $id)
{
    $stmt = $dbh->prepare("SELECT * FROM users WHERE user_id=?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();
    return $user;
}

function redirect()
{
    header("location: ../index.php");
    exit;
}
