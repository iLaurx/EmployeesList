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
    <title>Alta de Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_clientes.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
 
<br><br>
<div class="contenedor-lista">
    <div class="titulo">Alta de Clientes</div>

    <form id="formAlta" name="formAlta">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" id="apellidos"><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" id="correo"><br><br>
        <div id="error-correo" style="display:inline; color:red; margin-left:10px;"></div><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="pass" id="pass"><br><br>

        <input type="button" value="Enviar" onclick="validarCliente();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="clientes_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>
</body>
</html>