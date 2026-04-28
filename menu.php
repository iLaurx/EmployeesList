<?php
session_start();
$nombreUser = $_SESSION['nombreUser'];
?>
<table border="1" width="100%">
    <tr>
        <td>Bienvenido <?php echo $nombreUser;?></td>
        <td><a href="bienvenido.php">Inicio</a></td>
        <td><a href="empleados_lista.php">Empleados</a></td>
        <td><a href="empleados_lista.php">Productos</a></td>
        <td><a href="cerrar_sesion.php">Salir</a></td>
    </tr>
</table>