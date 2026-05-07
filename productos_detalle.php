<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}

require "funciones/conecta.php";
$con = conecta();

// Recibimos el ID y lo limpiamos para evitar errores
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Consulta para obtener los datos del empleado específico
    $sql = "SELECT * FROM productos WHERE id = $id AND eliminado = 0";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();

    // Si no existe el producto o está eliminado, regresamos a la lista
    if (!$row) {
        header("Location: productos_lista.php");
        exit;
    }
} else {
    header("Location: productos_lista.php");
    exit;
}

// Preparamos las variables para mostrar (Traducción de valores)
$nombre         = $row['nombre'];
$codigo         = $row['codigo'];
$descripcion    = $row['descripcion'];
$costo          = $row['costo'];
$stock          = $row['stock'];
?>

<head>
    <title>Detalle de Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>
 
<br><br>

<div class="card">
    <div class="titulo">Detalle del Producto</div>

    <div class="info-contenedor">
        <div class="label">Foto:</div>
        <div class="valor">
            <?php if($row['archivo']): ?>
                <img src="archivos/<?php echo $row['archivo']; ?>" style="max-width: 200px; border-radius: 8px;">
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
        <div class="label">Descripcion:</div>
        <div class="valor"><?php echo $descripcion; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">Costo:</div>
        <div class="valor"><?php echo $costo; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">Stock:</div>
        <div class="valor"><?php echo $stock; ?></div>
    </div>

    <a href="productos_lista.php" class="btn-regresar">Regresar al listado</a>
</div>

</body>
</html>