<?php
//salva_archivo.php

//cachar variables
$nombre_real      = $_FILES['archivo']['name'];
$archivo_temporal = $_FILES['archivo']['tmp_name'];

//Obtener extension
$arreglo    = explode(".", $nombre_real); //explode = split in python
$len        = count($arreglo);
$pos        = $len - 1;
$extension  = $arreglo[$pos];

//carpeta para guardar archivos
$carpeta = "archivos/";

//Obtener nombre
$encriptado   = md5_file($archivo_temporal);
$nuevo_nombre = "$encriptado.$extension";

echo "Nombre real:      $nombre_real <br>";
echo "Archivo temporal: $archivo_temporal <br>";
echo "Extension:        $extension <br>";
echo "Nuevo nombre:     $nuevo_nombre <br>";

copy($archivo_temporal, $carpeta.$nuevo_nombre);
?>