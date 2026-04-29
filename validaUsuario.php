<?php
//validaUsuario.php
session_start();
require "funciones/conecta.php";
$con = conecta();

$correo = $_REQUEST['correo'];
$pass   = md5($_REQUEST['pass']);

// Si en tu base de datos tienes la columna 'status', deberías agregar "AND status = 1"
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
    
    // Creación de sesiones (Esto cubre parte de la TAREA 2)
    $_SESSION['idUser']      = $id;
    $_SESSION['nombreUser']  = $nombre;
    $_SESSION['correoUser']  = $correo;
    
    // AVISAR A AJAX QUE EL USUARIO EXISTE
    echo "1";
} else {
    // AVISAR A AJAX QUE NO EXISTE O DATOS INCORRECTOS
    echo "0";
}
?>