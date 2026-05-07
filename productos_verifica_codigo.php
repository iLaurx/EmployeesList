<?php
require "funciones/conecta.php";
$con = conecta();

$codigo = $_REQUEST['codigo'];
$id     = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;

$sql = "SELECT id FROM productos WHERE codigo = '$codigo' AND eliminado = 0";
if ($id > 0) {
    $sql .= " AND id <> $id";
}

$res = $con->query($sql);
$num = $res->num_rows;

echo ($num > 0) ? "1" : "0"; // 1 si ya existe, 0 si está libre
?>