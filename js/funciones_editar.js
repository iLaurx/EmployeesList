function validarEdicion() {
    var nombre = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var correo = $('#correo').val();
    var rol = $('#rol').val();
    var id = $('#id_emp').val();

    if (nombre == "" || apellidos == "" || correo == "" || rol == "0") {
        $('#error-campos').html("Faltan campos por llenar");
        setTimeout(function() { $('#error-campos').html(""); }, 5000);
        return;
    }

    $.ajax({
        url: 'empleados_verifica_correo.php',
        type: 'post',
        data: { correo: correo, id: id },
        success: function(res) {
            if (res > 0) {
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
    var data = new FormData(form); // Captura todo, incluyendo la foto si existe

    $.ajax({
        url: 'empleados_salva.php',
        type: 'POST',
        data: data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        success: function(res) {
            if (res == 1) {
                window.location.href = "empleados_lista.php";
            } else {
                alert("Error al actualizar");
            }
        }
    });
}