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
    $sql = "SELECT * FROM usuarios WHERE id = $id AND eliminado = 0";
    $res = $con->query($sql);
    $row = $res->fetch_assoc();

    // Si no existe el usuario o está eliminado, regresamos a la lista
    if (!$row) {
        header("Location: empleados_lista.php");
        exit;
    }
} else {
    header("Location: empleados_lista.php");
    exit;
}

// Preparamos las variables para mostrar (Traducción de valores)
$nombreCompleto = $row['nombre'] . " " . $row['apellidos'];
$correo         = $row['correo'];
$rol            = ($row['rol'] == 1) ? "Gerente" : "Ejecutivo";
$status         = ($row['status'] == 1) ? "Activo" : "Inactivo";
?>

<head>
    <title>Detalle de Empleado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'menu.php'; ?>
<a href="empleados_lista.php" style="display: inline-block; margin: 10px 0; padding: 5px 10px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px;">Regresar al Listado</a>
<br><br>

<div class="card">
    <div class="titulo">Detalle del Empleado</div>

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
        <div class="valor"><?php echo $nombreCompleto; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">Correo:</div>
        <div class="valor"><?php echo $correo; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">Rol:</div>
        <div class="valor"><?php echo $rol; ?></div>
    </div>

    <div class="info-contenedor">
        <div class="label">Status:</div>
        <div class="valor"><?php echo $status; ?></div>
    </div>

    <a href="empleados_lista.php" class="btn-regresar">Regresar al listado</a>
</div>

</body>
</html>