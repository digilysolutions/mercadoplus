
$(document).ready(function() {              

    $('.yes-delete-tag').on('click', function() {      
        var id = $(this).data('id');  
       
        $.ajax({
            url: '/admin/tags/' +
            id, // Asegúrate de que esta ruta esté correcta
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert("Etqiueta eliminada satsifactoriamente");
                $('#deleteModal_'+id).modal('hide'); // Cerrar el modal
                window.location.href = '/admin/tags';

            },
            error: function() {
                alert('Error al eliminar la etiqueta.');
            }
        });
    });


});