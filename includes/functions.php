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
