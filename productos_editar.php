<?php

session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}

require "funciones/conecta.php";
$con = conecta();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar datos actuales
$sql = "SELECT * FROM productos WHERE id = $id AND eliminado = 0";
$res = $con->query($sql);
$row = $res->fetch_array();

if (!$row) { header("Location: productos_lista.php"); exit; } 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edición de Productos</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_producto_editar.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
 
<br><br>
<div class="contenedor-lista">
    <div class="titulo">Edición de Productos</div>

    <form id="formEdit" name="formEdit">
        <input type="hidden" name="id" id="id_prod" value="<?php echo $id; ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>"><br><br>

        <label>Codigo:</label><br>
        <input type="text" name="codigo" id="codigo" value="<?php echo $row['codigo']; ?>"><br><br>

        <div id="error-codigo" style="display:inline; color:red; margin-left:10px;"></div><br><br>


        <label>Descripcion:</label><br>
        <input type="text" name="descripcion" id="descripcion" value="<?php echo $row['descripcion']; ?>"><br><br>

        <label>Costo:</label><br>
        <input type="text" name="costo" id="costo" value="<?php echo $row['costo']; ?>"><br><br>

        <label>Stock:</label><br>
        <input type="text" name="stock" id="stock" value="<?php echo $row['stock']; ?>"><br><br>


        <label>Foto:</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>

        <input type="button" value="Guardar Cambios" onclick="validarEdicionProducto();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="productos_lista.php" class="btn-regresar">Regresar</a>
    </div>

</div>
</body>
</html>