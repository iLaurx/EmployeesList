function validarEdicion() {
    var nombre    = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var correo    = $('#correo').val();
    var id        = $('#id').val();

    if (nombre == "" || apellidos == "" || correo == "") {
        $('#error-campos').html("Faltan campos por llenar");
        setTimeout(function() { $('#error-campos').html(""); }, 5000);
        return;
    }

    $.ajax({
        url: 'clientes_verifica_correo.php',
        type: 'POST',
        data: { correo: correo, id: id },
        success: function(res) {
            if (res.trim() === "1") {
                $('#error-correo').html("El correo " + correo + " ya existe.");
                setTimeout(function() { $('#error-correo').html(""); }, 5000);
            } else {
                enviarDatosActualizados();
            }
        }
    });
}

function enviarDatosActualizados() {
    var form = $('#formEdit')[0];
    var data = new FormData(form);

    $.ajax({
        url: 'clientes_salva.php',
        type: 'POST',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function(res) {
            if (res.trim() === "1") {
                window.location.href = "clientes_lista.php";
            } else {
                alert("Error al actualizar");
            }
        }
    });
}