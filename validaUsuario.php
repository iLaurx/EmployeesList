<?php
session_start();
require "funciones/conecta.php";
$con = conecta();

$correo = $_REQUEST['correo'];
$pass_md5 = md5($_REQUEST['pass']);

$sql = "SELECT * FROM usuarios 
        WHERE correo = '$correo' 
        AND pass = '$pass_md5' 
        AND eliminado = 0 
        AND status = 1";

$res = $con->query($sql);

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