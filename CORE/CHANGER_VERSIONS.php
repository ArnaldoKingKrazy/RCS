<?php //archivo escribir.php
$text="?v";
$ran_id = rand(time(), 10000000);
$text=$text.$ran_id;

$file = fopen("VERSIONES.php", "w");

fwrite($file, $text . PHP_EOL);// escribe una linea se puede usar mas de uno

fclose($file);

?>