<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
require "funciones/conecta.php";
$con = conecta();

$id_get = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id_get AND eliminado = 0";
$res = $con->query($sql);

if ($row = $res->fetch_array()) {
    $id         = $row["id"];
    $nombre     = $row["nombre"];
    $apellidos  = $row["apellidos"];
    $correo     = $row["correo"];
    $status_txt = ($row['status'] == 1) ? "Activo" : "Inactivo";
} else {
    header("Location: clientes_lista.php");
    exit;
}
?>
<!DOCTYPE html>
<head>
    <title>Detalle de Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>
<div class="card">
    <div class="titulo">Detalle del Cliente</div>
    
    <div class="info-contenedor">
        <div class="label">Nombre:</div>
        <div class="valor"><?php echo $nombre . " " . $apellidos; ?></div>
    </div>
    <div class="info-contenedor">
        <div class="label">Correo:</div>
        <div class="valor"><?php echo $correo; ?></div>
    </div>
    <div class="info-contenedor">
        <div class="label">Estatus:</div>
        <div class="valor"><?php echo $status_txt; ?></div>
    </div>
    <br><br>
    <div class="contenedor-alta" style="text-align: center;">
        <a href="clientes_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>


</body>
</html>