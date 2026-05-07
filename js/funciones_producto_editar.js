function validarEdicionProducto() {
    var nombre      = $('#nombre').val();
    var codigo      = $('#codigo').val();
    var descripcion = $('#descripcion').val();
    var costo       = $('#costo').val();
    var stock       = $('#stock').val();
    var id          = $('#id_prod').val();

    // Validar campos
    if (nombre == "" || codigo == "" || descripcion == "" || costo == "" || stock == "") {
        $('#error-campos').html("Faltan campos por llenar");
        setTimeout(function() { $('#error-campos').html(""); }, 5000);
        return;
    }

    // AJAX para validar que el código no exista en OTRO producto
    $.ajax({
        url: 'productos_verifica_codigo.php',
        type: 'post',
        data: { codigo: codigo, id: id },
        success: function(res) {
            if (res > 0) {
                $('#error-codigo').html("El código " + codigo + " ya existe.");
                setTimeout(function() { $('#error-codigo').html(""); }, 5000);
            } else {
                enviarDatosProductoActualizados();
            }
        }
    });
}

function enviarDatosProductoActualizados() {
    var form = $('#formEdit')[0];
    var data = new FormData(form);

    $.ajax({
        url: 'productos_salva.php',
        type: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        success: function(res) {
            if (res.trim() == "1") {
                window.location.href = "productos_lista.php";
            } else {
                alert("Error al actualizar el producto");
            }
        }
    });
}