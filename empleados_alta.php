<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<head>
    <title>Alta de Empleados</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_alta.js"></script>
</head>
<body>
<?php include 'menu.php'; ?>
 
<br><br>
<div class="contenedor-lista">
    <div class="titulo">Alta de Empleados</div>

    <!--Formulario para dar de alta-->
    <form id="formAlta" name="formAlta" enctype="multipart/form-data">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label>Apellidos:</label><br>
        <input type="text" name="apellidos" id="apellidos"><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" id="correo"><br><br>
        <div id="error-correo" style="display:inline; color:red; margin-left:10px;"></div><br><br>

        <label>Password:</label><br>
        <input type="password" name="pass" id="pass"><br><br>

        <label>Rol:</label><br>
        <select name="rol" id="rol">
            <option value="0">Selecciona...</option>
            <option value="1">Gerente</option>
            <option value="2">Ejecutivo</option>
        </select><br><br>

        <label>Foto:</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>

        <!--Se manda a validar con la funcion validarFormulario()-->
        <input type="button" value="Enviar" onclick="validarFormulario();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <!--Boton para regresar al listado-->
        <a href="empleados_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>
</body>
</html>