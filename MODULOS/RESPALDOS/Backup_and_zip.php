<?php
include "Connet.php";
$day=date("d");
$mont=date("m");
$year=date("Y");
$hora=date("H-i-s");
$fecha=$day.'_'.$mont.'_'.$year;
$DataBASE=$fecha."_(".$hora."_hrs).sql";
$namezip="Backup_del_Sistema_RCS.zip";



function agregar_zip($dir, $zip) {
//verificamos si $dir es un directorio
if (is_dir($dir)) {
//abrimos el directorio y lo asignamos a $da
if ($da = opendir($dir)) {
//leemos del directorio hasta que termine
while (($archivo = readdir($da)) !== false) {
/*Si es un directorio imprimimos la ruta
* y llamamos recursivamente esta función
* para que verifique dentro del nuevo directorio
* por mas directorios o archivos
*/
if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {
//echo "<strong>Creando directorio: $dir$archivo</strong><br/>";
agregar_zip($dir . $archivo . "/", $zip);

/*si encuentra un archivo imprimimos la ruta donde se encuentra
* y agregamos el archivo al zip junto con su ruta 
*/
} elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
//echo "Agregando archivo: $dir$archivo <br/>";
$zip->addFile($dir . $archivo, $dir . $archivo);
}
}
//cerramos el directorio abierto en el momento
closedir($da);
}
}
}


function crear_Backup($namezip){
    //creamos una instancia de ZipArchive
$zip = new ZipArchive();

/*directorio a comprimir
* la barra inclinada al final es importante
* la ruta debe ser relativa no absoluta
*/
$dir = '../../';

//ruta donde guardar los archivos zip, ya debe existir
$rutaFinal = "zip";

if(!file_exists($rutaFinal)){
mkdir($rutaFinal);
}


$archivoZip = $namezip;

if (file_exists($rutaFinal. "/" . $archivoZip)) {
unlink($rutaFinal. "/" . $archivoZip);
}

if ($zip->open($archivoZip, ZIPARCHIVE::CREATE) === true) {
agregar_zip($dir, $zip);
$zip->close();

rename($archivoZip, "$rutaFinal/$archivoZip");


if (file_exists($rutaFinal. "/" . $archivoZip)) {


}
}
}








crear_Backup($namezip);



?>