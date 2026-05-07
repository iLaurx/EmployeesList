
function eliminarProducto(id) {
    if (confirm("¿Estás seguro de eliminar este producto?")) {
        $.ajax({
            url: 'productos_eliminar.php',
            type: 'POST',
            data: {id: id},
            success: function(res) {
                if (res == 1) {
                    $('#fila-' + id).fadeOut(500, function() {
                        $(this).remove();
                    });
                }
            }
        });
    }
}