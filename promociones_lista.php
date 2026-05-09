<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
require "funciones/conecta.php";
$con = conecta();

// Consultar promociones que no estén eliminadas
$sql = "SELECT * FROM promociones WHERE eliminado = 0";
$res = $con->query($sql);
?>
<!DOCTYPE html>
<head>
    <title>Listado de Promociones</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/elimina_promociones.js"></script>
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>
<div class="contenedor-lista">
    <div class="titulo">Listado de Promociones</div>

    <div class="contenedor-alta">
        <a href="promociones_alta.php" class="btn-alta">Nueva Promoción</a>
    </div>
    <br>

    <div class="fila cabecera">
        <div class="colpr-id">ID</div>
        <div class="colpr-nombre">Nombre de la Promoción</div>
        <div class="colpr-status">Estatus</div>
        <div class="colpr-accion">Ver</div>
        <div class="colpr-accion">Editar</div>
        <div class="colpr-accion">Eliminar</div>
    </div>

    <?php
    while($row = $res->fetch_array()) {
        $id             = $row["id"];
        $nombre         = $row["nombre"];
        $status_txt = ($row['status'] == 1) ? "Activo" : "Inactivo";
    ?>

        <div class="fila" id="fila-<?php echo $id; ?>">
            <div class="colpr-id"><?php echo $id; ?></div>
            <div class="colpr-nombre"><?php echo $nombre; ?></div>
            <div class="colpr-status"><?php echo $status_txt; ?></div>
            <div class="colpr-accion"> 
                <a href="promociones_detalle.php?id=<?php echo $id; ?>" class="btn-ver">Ver</a>
            </div>
            <div class="colpr-accion">
                <a href="promociones_editar.php?id=<?php echo $id; ?>" class="btn-editar">Editar</a>
            </div>
            <div class="colpr-accion">
                <input type="button" value="Eliminar" onclick="eliminarPromocion(<?php echo $id; ?>);">
            </div>

        </div>
    <?php } ?>

</div>

</body>
</html>