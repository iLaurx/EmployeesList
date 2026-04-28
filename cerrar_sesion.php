<?php
//cerrar_sesion.ph
session_start();
session_destroy();
header("Location: index.php")
?>