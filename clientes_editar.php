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
    $id        = $row["id"];
    $nombre    = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo    = $row["correo"];
} else {
    header("Location: clientes_lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_clientes_editar.js"></script>
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>
<div class="contenedor-lista">
    <div class="titulo">Editar Cliente</div>

    <form id="formEdit" name="formEdit">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>"><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" id="correo" value="<?php echo $correo; ?>"><br><br>
        <div id="error-correo" style="display:inline; color:red; margin-left:10px;"></div><br><br>

        <label>Contraseña (Opcional, dejar vacía para no cambiar):</label><br>
        <input type="password" name="pass" id="pass"><br><br>

        <input type="button" value="Actualizar" onclick="validarEdicion();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="clientes_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>

</body>
</html>