<?php
require "funciones/conecta.php";
$con = conecta();

$id        = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nombre    = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo    = $_POST['correo'];
$rol       = $_POST['rol'];
$pass      = $_POST['pass'];

// --- LÓGICA DE ARCHIVO ---
$archivo_n = "";
if (isset($_FILES['archivo']) && $_FILES['archivo']['name'] != "") {
    $nombre_real      = $_FILES['archivo']['name'];
    $archivo_temporal = $_FILES['archivo']['tmp_name'];
    $extension        = pathinfo($nombre_real, PATHINFO_EXTENSION);
    $carpeta          = "archivos/";
    $encriptado       = md5_file($archivo_temporal);
    $archivo_n        = "$encriptado.$extension";
    copy($archivo_temporal, $carpeta.$archivo_n);
}

if ($id > 0) {
    // --- UPDATE ---
    $sql = "UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol='$rol'";
    
    if (!empty($pass)) {
        $pass_enc = md5($pass);
        $sql .= ", password='$pass_enc'";
    }
    // Solo si se subió una foto nueva, la actualizamos
    if ($archivo_n != "") {
        $sql .= ", archivo='$archivo_n'";
    }
    
    $sql .= " WHERE id = $id";
} else {
    // --- INSERT ---
    $pass_enc = md5($pass);
    $sql = "INSERT INTO usuarios (nombre, apellidos, correo, password, rol, archivo) 
            VALUES ('$nombre', '$apellidos', '$correo', '$pass_enc', '$rol', '$archivo_n')";
}

$res = $con->query($sql);
echo ($res) ? 1 : 0;
?>