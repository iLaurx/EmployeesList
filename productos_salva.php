<?php
require "funciones/conecta.php";
$con = conecta();

// Evitamos errores de índice si 'id' no viene definido en la petición
$id      = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nombre  = $_POST['nombre'];
$codigo  = $_POST['codigo'];
$desc    = $_POST['descripcion'];
$costo   = $_POST['costo'];
$stock   = $_POST['stock'];

// Lógica de imagen
$archivo_n = "";
if (isset($_FILES['archivo']) && $_FILES['archivo']['name'] != "") {
    $file_name = $_FILES['archivo']['name'];
    $file_tmp  = $_FILES['archivo']['tmp_name'];
    $ext       = pathinfo($file_name, PATHINFO_EXTENSION);
    $enc       = md5_file($file_tmp);
    $archivo_n = "$enc.$ext";
    copy($file_tmp, "archivos/$archivo_n");
}

if ($id > 0) { // Editar
    $sql = "UPDATE productos SET nombre='$nombre', codigo='$codigo', descripcion='$desc', costo='$costo', stock='$stock'";
    if ($archivo_n != "") { $sql .= ", archivo='$archivo_n'"; }
    $sql .= " WHERE id = $id";
} else { // Alta
    $sql = "INSERT INTO productos (nombre, codigo, descripcion, costo, stock, archivo) 
            VALUES ('$nombre', '$codigo', '$desc', '$costo', '$stock', '$archivo_n')";
}

$res = $con->query($sql);

// Retornamos 1 si la consulta fue exitosa para que funciones_productos_alta.js redirija
if ($res) {
    echo "1";
} else {
    echo "0";
}
?>