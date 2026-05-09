<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
require "funciones/conecta.php";
$con = conecta();

$id = $_GET['id'];

// Consultar los datos de la promoción
$sql = "SELECT * FROM promociones WHERE id = $id AND eliminado = 0";
$res = $con->query($sql);

if ($row = $res->fetch_array()) {
    $id         = $row["id"];
    $nombre     = $row["nombre"];
    $archivo    = $row["archivo"];
    $status_txt = ($row['status'] == 1) ? "Activo" : "Inactivo";
} else {
    // Si no existe la promoción o fue eliminada, redirigir al listado
    header("Location: promociones_lista.php");
    exit;
}
?>
<!DOCTYPE html>
<head>
    <title>Detalle de Promoción</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>

<div class="card">
    <div class="titulo">Detalle de la Promoción</div>
    <div class="info-contenedor">
        <div class="label">Foto</div>
        
        <div class="valor">
            <?php if ($archivo != ""): ?>
                <img src="archivos/<?php echo $archivo; ?>" alt="Banner Promo" style="max-width: 200px; border-radius: 8px;">
            <?php else: ?>
                <span>Sin foto</span>
        <?php endif; ?>
        </div>
    </div>

    <div class="info-contenedor">
        <div class="label">Nombre:</div>
        <div class="valor"><?php echo $nombre; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">Estatus:</div>
        <div class="valor"><?php echo $status_txt; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">ID:</div>
        <div class="valor"><?php echo $id; ?></div>
    </div>

    <br><br>
    <div class="contenedor-alta" style="text-align: center;">
        <a href="promociones_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
    </div>
</div>

</body>
</html>