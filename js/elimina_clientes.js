function eliminarCliente(id) {
    if (confirm("¿Estás seguro de eliminar este cliente?")) {
        $.ajax({
            url: 'clientes_eliminar.php',
            type: 'POST',
            data: { id: id },
            success: function(res) {
                if (res.trim() === "1") {
                    $('#fila' + id).fadeOut();
                } else {
                    alert("Error al eliminar al cliente.");
                }
            }
        });
    }
}