<?php
require "funciones/conecta.php";
$con = conecta();

$sql = "SELECT * FROM usuarios WHERE eliminado = 0";
$res = $con->query($sql);
$num = $res->num_rows;
?>

<head>
    <title>Lista de Empleados</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js" ></script>
    <script src="js/elimina_empleados.js"></script>
</head>
<body>

<div class="contenedor-lista">
    <div class="titulo">Lista de empleados (<?php echo $num; ?>)</div>
    <div class="contenedor-alta">
        <a href="empleados_alta.php" class="btn-alta">Crear nuevo registro</a>
    </div>

    <div class="fila cabecera">
        <div class="col-id">ID</div>
        <div class="col-nombre">Nombre completo</div>
        <div class="col-correo">Correo</div>
        <div class="col-rol">Rol</div>
        <div class="col-accion">Ver</div>
        <div class="col-accion">Editar</div>
        <div class="col-accion">Eliminar</div>
    </div>

    <?php
    while($row = $res->fetch_array()) {
        $id         = $row["id"];
        $nombre     = $row["nombre"];
        $apellidos  = $row["apellidos"];
        $correo     = $row["correo"];
        $rol        = $row["rol"];

        //Concatenacion para mostrar nombre completo
        $nombre_completo = $nombre . ' ' . $apellidos;
    ?>
    <div class="fila" id="fila-<?php echo $id; ?>">
            <div class="col-id"><?php echo $id; ?></div>
            <div class="col-nombre"><?php echo $nombre_completo; ?></div>
            <div class="col-correo"><?php echo $correo; ?></div>
            <div class="col-rol">
                <?php 
                $rol_num = $row['rol']; 
                
                if ($rol_num == 1) {
                    echo "Gerente";
                } elseif ($rol_num == 2) {
                    echo "Ejecutivo";
                } else {
                    echo "No asignado";
                }
                ?>
            </div>
            
            <div class="col-accion">
                <a href="empleados_detalle.php?id=<?php echo $id; ?>" class=" btn-ver">Ver</a>
            </div>
            <div class="col-accion">
                <a href="empleados_editar.php?id=<?php echo $id; ?>" class="btn-editar">Editar</a>
            </div>
            <div class="col-accion">
                <input type="button" value="Eliminar" onclick="eliminarEmpleado(<?php echo $id; ?>);" />
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>