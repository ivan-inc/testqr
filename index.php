<?php
require_once 'config.php'; // подключаем скрипт

// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Cервис временно не работает...<br>Администрация уже работает.");

// выполняем операции с базой данных
$query ="SELECT * FROM qrtable";
$result = mysqli_query($link, $query) or die("Поздравляю... уронил сервис...<br>Начинай сначала.");
if($result) {
    echo "  <table border=\"1\">
   <caption>Таблица QR кодов</caption> <a href='new.php'>Добавить новый QR код</a>
   <tr>
    <th>Название</th>
    <th>Дата создания</th>
    <th>Набор параметров</th>
    <th>Количество переходов</th>
    <th>Действие</th>
   </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>". $row["name"] ."</td><td>". $row["date"] ."</td><td>city=". $row["p1"] ."<br>campaign=". $row["p2"] ."
<br>source=". $row["p3"] ."<br>product=". $row["p4"] ."</td>
<td>". $row["count"] ."</td><td><a href='qr.php?id=". $row["id"] ."'>Просмотр</a>
<br><a href='edit.php?id=". $row["id"] ."'>Изменить</a>
<br><a href='delete.php?id=". $row["id"] ."'>Удалить</a></td></tr>";
    }
    echo"</table>";

} else {
    echo "Что-то случилось...<br>Начни сначала.";
}


/* удаление выборки */
$result->free();
// закрываем подключение
mysqli_close($link);