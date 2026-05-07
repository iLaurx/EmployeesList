<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Productos</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_productos_alta.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
 
<br><br>
<div class="contenedor-lista">
    <div class="titulo">Alta de Productos</div>

    <form id="formAlta" name="formAlta" enctype="multipart/form-data">
        <label>Nombre del Producto:</label><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label>Código:</label><br>
        <input type="text" name="codigo" id="codigo"><br><br>
        <div id="error-codigo" style="display:inline; color:red; margin-left:10px;"></div><br><br>

        <label>Descripción:</label><br>
        <textarea name="descripcion" id="descripcion" rows="4" cols="50" style="resize:none;"></textarea><br><br>

        <label>Costo ($):</label><br>
        <input type="number" step="0.01" name="costo" id="costo"><br><br>

        <label>Stock (Existencia):</label><br>
        <input type="number" name="stock" id="stock"><br><br>

        <label>Imagen del Producto:</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>

        <input type="button" value="Enviar" onclick="validarFormularioProducto();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="productos_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>
</body>
</html>