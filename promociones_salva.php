<?php
require "funciones/conecta.php";
$con = conecta();

// Recibimos el ID (si viene de editar es mayor a 0, si es alta sera 0 o no existira
$id     = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nombre = $_POST['nombre'];

// Procesa la imagen SOLO si se selecciono un archivo
$archivo_n = "";
if (isset($_FILES['archivo']) && $_FILES['archivo']['name'] != "") {
    $file_name = $_FILES['archivo']['name'];
    $file_tmp  = $_FILES['archivo']['tmp_name'];
    $ext       = pathinfo($file_name, PATHINFO_EXTENSION);
    $enc       = md5_file($file_tmp);
    $archivo_n = "$enc.$ext";
    copy($file_tmp, "archivos/$archivo_n");
}

//  Logica para Guardar o Editar
if ($id > 0) { 
    // === EDICION ===
    if ($archivo_n != "") {
        $sql = "UPDATE promociones SET nombre='$nombre', archivo='$archivo_n' WHERE id = $id";
    } else {
        $sql = "UPDATE promociones SET nombre='$nombre' WHERE id = $id";
    }
} else { 
    // === ALTA ===
    $sql = "INSERT INTO promociones (nombre, archivo) VALUES ('$nombre', '$archivo_n')";
}

$res = $con->query($sql);

if ($res) {
    echo "1";
} else {
    echo "0";
}
?>