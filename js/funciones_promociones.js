function validarEdicion() {
    var nombre = $('#nombre').val();
    if (nombre == "") {
        $('#error-campos').html("Faltan campos por llenar");
        setTimeout(function() { $('#error-campos').html(""); }, 5000);
        return;
    }

    enviarDatosActualizados();
}

function enviarDatosActualizados() {
    var form = $('#formPromocion')[0];
    var data = new FormData(form); 

    $.ajax({
        url: 'promociones_salva.php',
        type: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        success: function(res) {
            if (res.trim() == "1") {
                window.location.href = "promociones_lista.php";
            } else {
                alert("Error al actualizar");
            }
        }
    });
}