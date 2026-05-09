<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Alta de Promociones</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_promociones.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>

<br><br>
<div class="contenedor-lista">
    <div class="titulo">Alta de Promociones</div>

    <form id="formPromocion" name="formPromocion" enctype="multipart/form-data">
        <label>Nombre de la Promoción:</label><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label>Foto (Banner):</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>

        <input type="button" value="Enviar" onclick="validarEdicion();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="promociones_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>
</body>
</html>