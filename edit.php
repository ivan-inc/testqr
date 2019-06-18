<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Cервис временно не работает...<br>Администрация уже работает.");

$id = htmlspecialchars($_GET['id']);
// выполняем операции с базой данных
$query ="SELECT * FROM qrtable WHERE id=". $id;
$result = mysqli_query($link, $query) or die("Поздравляю... уронил сервис...<br>Начинай сначала.");
if($result) {

    $row = $result->fetch_assoc();
    /* удаление выборки */
    $result->free();

    echo "<form action=\"update.php\" method=\"post\">
 <p>Название QR кода: <input type=\"text\" name=\"name\" value=\"". $row['name'] ."\"/></p>
 <p>Параметр City: <input type=\"text\" name=\"city\" value=\"". $row['p1'] ."\"/></p>
 <p>Параметр Campaign: <input type=\"text\" name=\"campaign\" value=\"". $row['p2'] ."\"/></p>
 <p>Параметр Source: <input type=\"text\" name=\"source\" value=\"". $row['p3'] ."\"/></p>
 <p>Параметр Product: <input type=\"text\" name=\"product\" value=\"". $row['p4'] ."\"/></p>
 <input style='display: none' type=\"text\" name=\"id\" value=\"". $row['id'] ."\"/>
 <p><input type=\"submit\" /></p>
</form>";
}

// закрываем подключение
mysqli_close($link);