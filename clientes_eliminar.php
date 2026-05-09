<?php
require "funciones/conecta.php";
$con = conecta();

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;

if ($id > 0) {
    $sql = "UPDATE clientes SET eliminado = 1 WHERE id = $id";
    $res = $con->query($sql);
    echo ($res) ? "1" : "0";
} else {
    echo "0";
}
?>