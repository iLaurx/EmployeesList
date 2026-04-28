$(document).ready(function() {
    $('#correo').on('blur', function() {
        var correo = $(this).val();
        if (correo != "") {
            $.ajax({
                url: 'empleados_verifica_correo.php',
                type: 'post',
                data: {correo: correo},
                success: function(res) {
                    if (res > 0) {
                        $('#error-correo').html('El correo ' + correo + ' ya existe.');
                        setTimeout(function() { $('#error-correo').html(''); }, 5000);
                        $('#correo').val('');
                    }
                }
            });
        }
    });
});

function validarFormulario() {
    var nombre    = $('#nombre').val();
    var apellidos = $('#apellidos').val();
    var correo    = $('#correo').val();
    var pass      = $('#pass').val();
    var rol       = $('#rol').val();
    var archivo   = $('#archivo').val(); // Capturamos el valor del input file

    // Validar campos llenos + la FOTO (que es obligatoria en alta)
    if (nombre == "" || apellidos == "" || correo == "" || pass == "" || rol == "0" || archivo == "") {
        $('#error-campos').html('Faltan campos por llenar (incluyendo la foto)');
        setTimeout(function() { $('#error-campos').html(''); }, 5000);
    } else {
        // Usamos FormData para enviar el archivo
        var form = $('#formAlta')[0];
        var data = new FormData(form);

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
                    alert("Error al insertar registro.");
                }
            }
        });
    }
}