<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к БД
$link = mysqli_connect($host, $user, $password, $database)
or die("Cервис временно не работает...<br>Администрация уже работает.");

$name = htmlspecialchars($_POST['name']); //название qr кода
$p1 = htmlspecialchars($_POST['city']); //параметр city
$p2 = htmlspecialchars($_POST['campaign']); //параметр campaign
$p3 = htmlspecialchars($_POST['source']); //параметр source
$p4 = htmlspecialchars($_POST['product']); //параметр product
$id = htmlspecialchars($_POST['id']); //параметр id


// выполняем операции с базой данных
$query = 'UPDATE qrtable SET name="'. $name .'", p1="'. $p1 .'", p2="'. $p2 .'", 
p3="'. $p3 .'", p4="'. $p4 .'" WHERE id="'. $id .'"';

if (mysqli_query($link, $query)) {
    echo "Вы успешно отредактировали QR код.<br>Подождите, сейчас вы будете переадресованы на целевой ресурс.";
    sleep('5'); // Искуственное ожидание 5 секунд
    //header('Location: http://testqr/index.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($link);
    echo "Поздравляю... уронил сервис...<br>Начинай сначала.";
}

// закрываем соединение с БД
mysqli_close($link);




?>