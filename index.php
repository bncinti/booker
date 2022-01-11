<?php

include_once('bookModel.php');

$data = BookModel::getBooks();

//print_r($data);

echo file_get_contents('templates/head.html');

$rowtpl = file_get_contents('templates/row.html');

$content = '';
foreach($data as $book) {
    $row = $rowtpl;
    $row = str_replace('{id}', $book->id, $row);
    $row = str_replace('{title}', $book->title, $row);
    $row = str_replace('{writer}', $book->writer, $row);
    $content = $content . $row;
}

$page = file_get_contents('templates/index.html');
$page = str_replace('{content}', $content, $page);
echo $page;

echo file_get_contents('templates/foot.html');