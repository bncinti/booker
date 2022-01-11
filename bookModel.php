<?php

include_once('mariadb.php');
include_once('book.php');

class BookModel{
    public static function getbooks(){
        $books = array();
        $conn = Mariadb::connectDb();
        $sql = "select * from books";
        if ($res = $conn->query($sql)){
            while(($row = $res->fetch_assoc()) !==null){
                $book = new Book();
                $book->id = $row['id'];
                $book->title = $row['title'];
                $book->writer = $row['writer'];
                array_push($books, $book);
            }
        }else {
            error_log('Hiba! A lekérdezés sikertelen,');
        }
        $conn->close();
        return $books;
    }
}