<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
require "funciones/conecta.php";
$con = conecta();

$sql = "SELECT * FROM clientes WHERE eliminado = 0";
$res = $con->query($sql);
?>
<!DOCTYPE html>
<head>
    <title>Listado de Clientes</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/elimina_clientes.js"></script>
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>
<div class="contenedor-lista">
    <div class="titulo">Listado de Clientes</div>

    <div class="contenedor-alta">
        <a href="clientes_alta.php" class="btn-alta">Nuevo Cliente</a>
    </div>
    <br>

    <div class="fila cabecera">
        <div class="col-id">ID</div>
        <div class="col-nombre">Nombre Completo</div>
        <div class="col-correo">Correo</div>
        <div class="colpr-accion">Ver</div>
        <div class="colpr-accion">Editar</div>
        <div class="colpr-accion">Eliminar</div>
    </div>

    <?php
    while($row = $res->fetch_array()) {
        $id         = $row["id"];
        $nombreComp = $row["nombre"] . " " . $row["apellidos"];
        $correo     = $row["correo"];
    ?>
        <div class="fila" id="fila<?php echo $id; ?>">
            <div class="col-id"><?php echo $id; ?></div>
            <div class="col-nombre"><?php echo $nombreComp; ?></div>
            <div class="col-correo"><?php echo $correo; ?></div>

        <div class="colpr-accion"> 
            <a href="clientes_detalle.php?id=<?php echo $id; ?>" class="btn-ver">Ver</a>
        </div>
        <div class="colpr-accion">
            <a href="clientes_editar.php?id=<?php echo $id; ?>" class="btn-editar">Editar</a>
        </div>
        <div class="colpr-accion">
            <input type="button" value="Eliminar" onclick="eliminarCliente(<?php echo $id; ?>);">
        </div>
        </div>
    <?php } ?>

</div>

</body>
</html>