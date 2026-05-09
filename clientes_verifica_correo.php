<?php
require "funciones/conecta.php";
$con = conecta();

$correo = $_REQUEST['correo'];
$id     = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

$sql = "SELECT id FROM clientes WHERE correo = '$correo' AND eliminado = 0";
if ($id > 0) {
    $sql .= " AND id <> $id";
}

$res = $con->query($sql);
$num = $res->num_rows;

echo ($num > 0) ? "1" : "0";
?>