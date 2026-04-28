<?php
require "funciones/conecta.php";
$con = conecta();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consultar datos actuales
$sql = "SELECT * FROM usuarios WHERE id = $id AND eliminado = 0";
$res = $con->query($sql);
$row = $res->fetch_array();

if (!$row) { header("Location: empleados_lista.php"); exit; } 
?>

<html>
<head>
    <title>Edición de Empleados</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_editar.js"></script>
</head>
<body>

<div class="contenedor-lista">
    <div class="titulo">Edición de Empleados</div>

    <form id="formEdit" name="formEdit">
        <input type="hidden" name="id" id="id_emp" value="<?php echo $id; ?>">

        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre']; ?>"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo $row['apellidos']; ?>"><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" id="correo" value="<?php echo $row['correo']; ?>">
        <div id="error-correo" style="display:inline; color:red; margin-left:10px;"></div><br><br>

        <label>Password (dejar en blanco para no cambiar):</label><br>
        <input type="password" name="pass" id="pass"><br><br>

        <label>Rol:</label><br>
        <select name="rol" id="rol">
            <option value="1" <?php if($row['rol'] == 1) echo 'selected'; ?>>Gerente</option>
            <option value="2" <?php if($row['rol'] == 2) echo 'selected'; ?>>Ejecutivo</option>
        </select><br><br>

        <label>Foto:</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>

        <input type="button" value="Guardar Cambios" onclick="validarEdicion();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="empleados_lista.php" class="btn-regresar">Regresar</a>
    </div>

</div>
</body>
</html>