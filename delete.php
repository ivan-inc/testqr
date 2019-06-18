<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Cервис временно не работает...<br>Администрация уже работает.");

$id = htmlspecialchars($_GET['id']);
// выполняем операции с базой данных
$query = 'DELETE FROM qrtable WHERE id="'. $id .'" LIMIT 1';
$result = mysqli_query($link, $query) or die("Поздравляю... уронил сервис...<br>Начинай сначала.");
if($result) {
    echo "QR код успешно удален.";
} else {
    echo "Поздравляю... уронил сервис...<br>Начинай сначала.";
}

// закрываем подключение
mysqli_close($link);