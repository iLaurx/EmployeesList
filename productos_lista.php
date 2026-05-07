<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
require "funciones/conecta.php";
$con = conecta();

$sql = "SELECT * FROM productos WHERE eliminado = 0";
$res = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/elimina_productos.js"></script>
</head>

<body>
<?php include 'menu.php'; ?>
<div class="contenedor-lista">
    <div class="titulo">Lista de Productos</div>
    <div class="contenedor-alta">
        <a href="productos_alta.php" class="btn-alta">Crear nuevo producto</a>
    </div>

    <div class="fila cabecera">
        <div class="colp-id">ID</div>
        <div class="colp-nombre">Nombre</div>
        <div class="colp-codigo">Codigo</div>
        <div class="colp-descripcion">Descripcion</div>
        <div class="colp-costo">Costo</div>
        <div class="colp-stock">Stock</div>
        <div class="colp-accion">Ver</div>
        <div class="colp-accion">Editar</div>
        <div class="colp-accion">Eliminar</div>
    </div>
    <?php
    while($row = $res->fetch_array()) {
        $id             = $row["id"];
        $nombre         = $row["nombre"];
        $codigo         = $row["codigo"];
        $descripcion    = $row["descripcion"];
        $costo          = $row["costo"];
        $stock          = $row["stock"];
    ?>
    <div class="fila" id="fila-<?php echo $id; ?>">
        <div class="colp-id"><?php echo $id; ?></div>
        <div class="colp-nombre"><?php echo $nombre; ?></div>
        <div class="colp-codigo"><?php echo $codigo; ?></div>
        <div class="colp-descripcion"><?php echo $descripcion; ?></div>
        <div class="colp-costo"><?php echo $costo; ?></div>
        <div class="colp-stock"><?php echo $stock ?></div>
        
        <div class="col-accion">
            <a href="productos_detalle.php?id=<?php echo $id; ?>" class=" btn-ver">Ver</a>
        </div>
        <div class="col-accion">
            <a href="productos_editar.php?id=<?php echo $id; ?>" class="btn-editar">Editar</a>
        </div>
        <div class="col-accion">
            <input type="button" value="Eliminar" onclick="eliminarProducto(<?php echo $id; ?>);" />
        </div>
    </div>
    <?php } ?>
</div>

</body>


</html>