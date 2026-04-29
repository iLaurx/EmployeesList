<?php
session_start();
require "funciones/conecta.php";
$con = conecta();

$correo = $_REQUEST['correo'];
$pass_md5 = md5($_REQUEST['pass']);

// Quité "AND status = 1" para evitar que choque si no tienes esa columna.
// Con "eliminado = 0" suele ser suficiente para saber que está activo.
$sql = "SELECT * FROM usuarios 
        WHERE correo = '$correo' 
        AND pass = '$pass_md5' 
        AND eliminado = 0";

$res = $con->query($sql);

// Esto te dirá si hay un error de sintaxis o falta una columna en tu tabla
if (!$res) {
    echo "Error de MySQL: " . $con->error;
    exit;
}

if ($res->num_rows == 1) {
    $row = $res->fetch_array();
    $_SESSION['idUser']     = $row["id"];
    $_SESSION['nombreUser'] = $row["nombre"].' '.$row["apellidos"];
    $_SESSION['correoUser'] = $row["correo"];
    
    echo "1"; 
} else {
    echo "0"; 
}
?>