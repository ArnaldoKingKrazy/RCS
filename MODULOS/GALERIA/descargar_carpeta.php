<?php 
$carpeta=$_POST['carpeta'];
$namezip=$carpeta;



function agregar_zipz($dir, $zip,$carpeta) {
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
echo"<script>muestra_texto_descarga('Creando directorio: $dir$archivo');</script>";
agregar_zip($dir . $archivo . "/", $zip);

/*si encuentra un archivo imprimimos la ruta donde se encuentra
* y agregamos el archivo al zip junto con su ruta 
*/
} elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {

$zip->addFile($dir . $archivo, $dir . $archivo);
}
}
//cerramos el directorio abierto en el momento
closedir($da);
}
}
$boton_comprimido='<a href="MODULOS/GALERIA/Downloads_admin/'.$carpeta.'.zip" onclick="" class="btn btn-secondary sombra ver-bordes border-info"><i class="bi bi-download me-1 text-md"></i>Descargar '.$carpeta.'.zip</a>';
echo"<script>muestra_texto_descarga('$boton_comprimido');</script>";
}


function crear_Backupz($namezip){
    //creamos una instancia de ZipArchive
$zip = new ZipArchive();

/*directorio a comprimir
* la barra inclinada al final es importante
* la ruta debe ser relativa no absoluta
*/

	$dir = 'CARPETAS/'.$namezip.'/';	


//ruta donde guardar los archivos zip, ya debe existir
$rutaFinal = "Downloads_admin";

if(!file_exists($rutaFinal)){
mkdir($rutaFinal);
}


$archivoZip = $namezip;

if (file_exists($rutaFinal. "/" . $archivoZip)) {
unlink($rutaFinal. "/" . $archivoZip);
}

if ($zip->open($archivoZip, ZIPARCHIVE::CREATE) === true) {
agregar_zipz($dir, $zip,$namezip);
$zip->close();

rename($archivoZip, "$rutaFinal/$archivoZip".".zip");


if (file_exists($rutaFinal. "/" . $archivoZip)) {


}
}
}

crear_Backupz($namezip);

 ?>