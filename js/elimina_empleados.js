function eliminarEmpleado(id) {
    if (confirm("¿De verdad deseas eliminar este registro?")) {
        $.ajax({
            url: 'empleados_eliminar.php',
            type: 'post',
            dataType: 'text',
            data: {id: id},
            success: function(res) {
                if (res == 1) {
                    // Borrar la fila con jQuery
                    $('#fila-' + id).fadeOut(500, function() {
                        $(this).remove();
                    });
                } else {
                    alert("Error al eliminar el registro.");
                }
            },
            error: function() {
                alert("Error de conexión al servidor.");
            }
        });
    }
}