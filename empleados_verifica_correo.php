<?php
require "funciones/conecta.php";
$con = conecta();

$correo = $_POST['correo'];
$id     = isset($_POST['id']) ? $_POST['id'] : 0;

// Si es ALTA, el id es 0, busca en todos.
// Si es EDICIÓN, busca el correo pero IGNORA al usuario que estamos editando.
$sql = "SELECT id FROM usuarios WHERE correo = '$correo' AND id != $id AND eliminado = 0";

$res = $con->query($sql);
$num = $res->num_rows;

echo $num; 
?>