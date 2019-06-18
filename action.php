<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к БД
$link = mysqli_connect($host, $user, $password, $database)
or die("Cервис временно не работает...<br>Администрация уже работает.");

$name = htmlspecialchars($_POST['name']); //название qr кода
$date = date("d.m.Y"); //дата создания
$p1 = htmlspecialchars($_POST['city']); //параметр city
$p2 = htmlspecialchars($_POST['campaign']); //параметр campaign
$p3 = htmlspecialchars($_POST['source']); //параметр source
$p4 = htmlspecialchars($_POST['product']); //параметр product

if(!empty($name) && !empty($p1) && !empty($p2) && !empty($p3)&& !empty($p4)) {
    // выполняем операции с базой данных
    $sql = 'INSERT INTO qrtable (name, date, p1, p2, p3, p4) VALUES ("' . $name . '", "' . $date . '", "' . $p1 . '", 
"' . $p2 . '", "' . $p3 . '", "' . $p4 . '")';

    if (mysqli_query($link, $sql)) {
        echo "Вы успешно зарегистрировали QR код.<br><a href='index.php'>Перейти на главную станицу</a>";
    } else {
        echo "Поздравляю... уронил сервис...<br>Начинай сначала.";
    }
} else {
    header('Refresh: 2; url=https://horder.ru/test/new.php');
    echo "Вы заполнили не все поля.<br>Ожидайте.";
}

// закрываем соединение с БД
mysqli_close($link);
?>