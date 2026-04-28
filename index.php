<?php
// validaUsuario.php
session_start();
require "funciones/conecta.php";
$con = conecta();

$correo = $_REQUEST['correo'];
$pass   = md5($_REQUEST['pass']);

$sql = "SELECT *
        FROM empleados
        WHERE eliminado = 0
        AND correo = '$correo'
        AND pass = '$pass'";

$res = $con->query($sql);
$num = $res->num_rows;

if ($num == 1) {
    $row     = $res->fetch_array();
    $id      = $row["id"];
    $nombre  = $row["nombre"].' '.$row["apellidos"];
    $correo  = $row["correo"];
    
    $_SESSION['idUser']      = $id;
    $_SESSION['nombreUser']  = $nombre;
}
?>