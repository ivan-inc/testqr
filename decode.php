<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Cервис временно не работает...<br>Администрация уже работает.");

$id = htmlspecialchars($_GET['id']);
// выполняем операции с базой данных
$query = 'SELECT id, p3 FROM qrtable WHERE id="'. (int)$id .'" LIMIT 1';
$result = mysqli_query($link, $query) or die("Поздравляю... уронил сервис...<br>Начинай сначала.");
if($result) {
    $row = $result->fetch_assoc();
    $query = 'UPDATE qrtable SET count = count+1 WHERE id="'. $row["id"] .'"';
    $result = mysqli_query($link, $query);
    header('Refresh: 5; url=https://horder.ru/');
    echo 'Ожидайте, идёт перенаправление на основной ресурс.';




} else {
    echo "Поздравляю... уронил сервис...<br>Начинай сначала.";
}

// закрываем подключение
mysqli_close($link);