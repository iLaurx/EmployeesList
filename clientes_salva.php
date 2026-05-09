<?php
require "funciones/conecta.php";
$con = conecta();

$id        = isset($_POST['id']) ? intval($_POST['id']) : 0;
$nombre    = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$correo    = $_POST['correo'];
$pass      = $_POST['pass'];

if ($id > 0) { // === EDICIÓN ===
    $sql = "UPDATE clientes SET nombre='$nombre', apellidos='$apellidos', correo='$correo'";
    if ($pass != "") {
        $pass_md5 = md5($pass);
        $sql .= ", pass='$pass_md5'";
    }
    $sql .= " WHERE id = $id";
} else { // === ALTA ===
    $pass_md5 = md5($pass);
    $sql = "INSERT INTO clientes (nombre, apellidos, correo, pass) 
            VALUES ('$nombre', '$apellidos', '$correo', '$pass_md5')";
}

$res = $con->query($sql);
echo ($res) ? "1" : "0";
?>