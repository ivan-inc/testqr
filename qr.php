<?php

$name = md5("https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.testqr.ru/decode.php?id=". $id ."%2F&choe=UTF-8");

$id = htmlspecialchars($_GET['id']);
$img = imagecreatefrompng("https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.testqr.ru/decode.php?id=". $id ."%2F&choe=UTF-8");
//header('Content-type: image/png');
imagejpeg($img, 'cache/'.$name.'.jpeg');
imagepng($img, 'cache/'.$name.'.png');
imagedestroy($img);
$img = new Imagick('cache/'.$name.'.jpeg');
$img->setImageFormat('pdf');
$img->writeImages('cache/'.$name.'.pdf', true);

echo "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.testqr.ru/decode.php?id=". $id ."%2F&choe=UTF-8\"/>";
echo "<br><a href='cache/".$name.".jpeg'>Сохранить в JPEG</a><br>
<a href='cache/".$name.".png'>Сохранить в PNG</a><br>
<a href='cache/".$name.".pdf'>Сохранить в PDF</a>";



