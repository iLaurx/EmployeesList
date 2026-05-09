<?php
// Validamos si la sesión está iniciada, si no, el nombre es genérico
$nombreUser = isset($_SESSION['nombreUser']) ? $_SESSION['nombreUser'] : 'USUARIO';
?>
<nav class="navegacion">
    <a href="bienvenido.php">INICIO</a>
    <a href="empleados_lista.php">EMPLEADOS</a>
    <a href="productos_lista.php">PRODUCTOS</a>
    <a href="clientes_lista.php">CLIENTES</a>
    <a href="promociones_lista.php">PROMOCIONES</a>
    <a href="#">PEDIDOS</a>
    
    <span style="color: #4CAF50; font-weight: bold; margin-right: 15px;">BIENVENIDO <?php echo strtoupper($nombreUser); ?></span>
    <a href="cerrar_sesion.php" style="color: #ff4d4d;">CERRAR SESIÓN</a>
</nav>