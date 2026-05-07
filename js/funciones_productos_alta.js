function validarFormularioProducto() {
    var nombre      = $('#nombre').val();
    var codigo      = $('#codigo').val();
    var descripcion = $('#descripcion').val();
    var costo       = $('#costo').val();
    var stock       = $('#stock').val();
    var archivo     = $('#archivo').val();

    // Validar campos vacíos
    if (nombre === "" || codigo === "" || descripcion === "" || costo === "" || stock === "") {
        $('#error-campos').html("Error: Faltan campos por llenar.");
        setTimeout(function() {
            $('#error-campos').html("");
        }, 5000);
        return false;
    }

    // AJAX para validar que el código no esté duplicado
    $.ajax({
        url: 'productos_verifica_codigo.php',
        type: 'POST',
        data: { codigo: codigo },
        success: function(existe) {
            if (existe.trim() === "1") {
                $('#error-codigo').html("El código de producto ya existe.");
                setTimeout(function() {
                    $('#error-codigo').html("");
                }, 5000);
            } else {
                // Si el código está libre, enviamos los datos usando FormData para soportar la imagen
                var form = $('#formAlta')[0];
                var data = new FormData(form);

                $.ajax({
                    url: 'productos_salva.php',
                    type: 'POST',
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(respuesta) {
                        if (respuesta.trim() === "1") {
                            // Redirección al listado tras guardar con éxito
                            window.location.href = 'productos_lista.php';
                        } else {
                            $('#error-campos').html("Error al intentar guardar el producto.");
                        }
                    }
                });
            }
        },
        error: function() {
            $('#error-campos').html("Error de conexión al verificar el código.");
        }
    });
}