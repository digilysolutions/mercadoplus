
$(document).ready(function() {              

    $('.yes-delete-model').on('click', function() {      
        var id = $(this).data('id');        
        $.ajax({
            url: '/admin/models/' +
            id, // Asegúrate de que esta ruta esté correcta
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteModal_'+id).modal('hide'); // Cerrar el modal
                window.location.href = '/admin/models';

            },
            error: function() {
                alert('Error al eliminar modelo.');
            }
        });
    });


});