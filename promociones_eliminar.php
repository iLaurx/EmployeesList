<?php
// empleados_eliminar.php
require "funciones/conecta.php";
$con = conecta();

$id = $_POST['id'];

// Hacemos el UPDATE
$sql = "UPDATE promociones SET eliminado = 1 WHERE id = $id";
$res = $con->query($sql);

// Regresamos la bandera (1 si fue exitoso)
if ($res) {
    echo 1;
} else {
    echo 0;
}
?>