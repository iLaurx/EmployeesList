function validarLogin() {
    var correo = $('#correo').val();
    var pass = $('#pass').val();

    // Validar campos llenos y mostrar mensaje
    if (correo === "" || pass === "") {
        $('#mensaje').html("Error: Faltan campos por llenar");
        setTimeout(function() {
            $('#mensaje').html("");
        }, 5000);
        return false;
    }

    // Mandar información mediante AJAX
    $.ajax({
        url: 'validaUsuario.php',
        type: 'POST',
        data: {
            correo: correo,
            pass: pass
        },
        success: function(respuesta) {
            // Se recibe la bandera
            if (respuesta.trim() === "1") {
                // Si existe, redirect a bienvenido.php
                window.location.href = 'bienvenido.php';
            } else {
                // Si no existe, mostrar mensaje de error
                $('#mensaje').html("Datos incorrectos. El usuario no existe, está inactivo o fue eliminado.");
                setTimeout(function() {
                    $('#mensaje').html("");
                }, 5000);
            }
        },
        error: function() {
            $('#mensaje').html("Error de conexión con el servidor.");
        }
    });
}