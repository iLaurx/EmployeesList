function validarProducto() {
    var nombre = $('#nombre').val();
    var codigo = $('#codigo').val();
    var desc   = $('#descripcion').val();
    var costo  = $('#costo').val();
    var stock  = $('#stock').val();
    var foto   = $('#archivo')[0].files.length;

    if (nombre=="" || codigo=="" || desc=="" || costo=="" || stock=="" || foto==0) {
        $('#mensaje').html("Error: Todos los campos son obligatorios");
        return;
    }

    // Verificar código duplicado
    $.ajax({
        url: 'productos_verifica_codigo.php',
        type: 'POST',
        data: {codigo: codigo},
        success: function(existe) {
            if (existe == "1") {
                $('#mensaje').html("Error: El código " + codigo + " ya existe.");
            } else {
                document.forma01.submit();
            }
        }
    });
}