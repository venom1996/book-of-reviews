<?php

$dblocation = "192.168.0.7";
$dbuser = "root";
$dbname="books";
$dbpasswd = "1234";
$post_table = "post";
$error = "Заполните отзыв!";


$dbz = mysqli_connect($dblocation,$dbuser,$dbpasswd,$dbname) or die("Ошибка соединения с базой данных");

//Кодировка БД
$dbz->set_charset("utf8");

?>