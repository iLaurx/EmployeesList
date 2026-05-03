<?php
// Iniciar la sesión para poder acceder a las variables
session_start();
// Validamos si existe la variable para evitar errores (por si entran directo)
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
$nombre = isset($_SESSION['nombreUser']) ? $_SESSION['nombreUser'] : 'Usuario';
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido al Sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menu.php'; ?>
    <div class="contenedor-bienvenida">
        <h1>Hola, bienvenido al sistema.</h1>
        <h2><?php echo $nombre; ?></h2>
        
        <p style="margin-top: 30px; color: #666;">Has iniciado sesión correctamente.</p>
    </div>
</body>
</html>