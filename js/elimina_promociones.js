function eliminarPromocion(id) {
    if (confirm("¿Estás seguro de eliminar esta promoción?")) {
        $.ajax({
            url: 'promociones_eliminar.php',
            type: 'POST',
            data: { id: id },
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