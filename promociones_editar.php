<?php
session_start();
if (!isset($_SESSION['idUser'])) {
    header("Location: index.php");
    exit;
}
require "funciones/conecta.php";
$con = conecta();

$id_get = $_GET['id'];

// Consultar los datos actuales de la promoción
$sql = "SELECT * FROM promociones WHERE id = $id_get AND eliminado = 0";
$res = $con->query($sql);

// Metemos todas las variables en el mismo bloque
if ($row = $res->fetch_array()) {
    $id         = $row["id"];
    $nombre     = $row["nombre"];
    $archivo    = $row["archivo"];
    $status_txt = ($row['status'] == 1) ? "Activo" : "Inactivo";
} else {
    header("Location: promociones_lista.php");
    exit;
}
?>
<!DOCTYPE html>
<head>
    <title>Editar Promoción</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-4.0.0.min.js"></script>
    <script src="js/funciones_promociones.js"></script>
</head>
<body>

<?php include 'menu.php'; ?>

<br><br>
<div class="contenedor-lista">
    <div class="titulo">Editar Promoción</div>

    <form id="formPromocion" name="formPromocion" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

        <label>Nombre de la Promoción:</label><br>
        <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"><br><br>

        <label>Banner Actual:</label><br>
        <?php if ($archivo != ""): ?>
            <img src="archivos/<?php echo $archivo; ?>" width="150" style="border-radius: 5px; margin-bottom: 10px;"><br>
        <?php endif; ?>
        
        <label>Cambiar Foto (Opcional):</label><br>
        <input type="file" id="archivo" name="archivo"><br><br>

        <input type="button" value="Actualizar" onclick="validarEdicion();">
        <div id="error-campos" style="color:red; margin-top:10px;"></div>
    </form>

    <div class="contenedor-alta">
        <a href="promociones_lista.php" class="btn-regresar">Regresar al listado</a>
    </div>
</div>

</body>
</html>