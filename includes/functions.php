<?php

//select all books from database
function getAllBooks($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM books ORDER BY id DESC");
    $stmt->execute();
    $books = $stmt->fetchAll();
    return $books;
}
function getBooksById($dbh, $id)
{
    $stmt = $dbh->prepare("SELECT * FROM books WHERE id=?");
    $stmt->execute([$id]);
    $book = $stmt->fetch();
    return $book;
}
function getUserByEmail($dbh, $email)
{
    $stmt = $dbh->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    return $user;
}

function redirect()
{
    header("location: ../index.php");
    exit;
}
