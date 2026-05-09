function validarCliente() {
    var nombre    = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var correo    = $('#correo').val();
    var pass      = $('#pass').val();

    if (nombre === "" || apellidos === "" || correo === "" || pass === "") {
        $('#error-campos').html("Error: Todos los campos son obligatorios.");
        setTimeout(function() { $('#error-campos').html(""); }, 5000);
        return false;
    }

    // AJAX para verificar correo duplicado
    $.ajax({
        url: 'clientes_verifica_correo.php',
        type: 'POST',
        data: { correo: correo },
        success: function(existe) {
            if (existe.trim() === "1") {
                $('#error-correo').html("El correo " + correo + " ya está registrado.");
                setTimeout(function() { $('#error-correo').html(""); }, 5000);
            } else {
                var form = $('#formAlta')[0];
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
                            window.location.href = 'clientes_lista.php';
                        } else {
                            $('#error-campos').html("Error al intentar guardar el cliente.");
                        }
                    }
                });
            }
        }
    });
}