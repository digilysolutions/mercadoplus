
$(document).ready(function() {              

    $('.yes-delete-term').on('click', function() {      
        var id = $(this).data('id');        
        $.ajax({
            url: '/admin/terms/' +
            id, // Asegúrate de que esta ruta esté correcta
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteModal_'+id).modal('hide'); // Cerrar el modal
                window.location.href = '/admin/terms';

            },
            error: function() {
                alert('Error al eliminar termino.');
            }
        });
    });

});
$(document).ready(function() {              
    $('.yes-delete-attribute-term').on('click', function() {      
        var id = $(this).data('id');  
        var fullId = $('.yes-delete-attribute-term').attr('id');

        // Eliminar el prefijo "attributeTermId_"
        var actualId = fullId.replace('attributeTermId_', '');
       
        $.ajax({
            url: '/admin/terms/' +
            id, // Asegúrate de que esta ruta esté correcta
            method: 'delete',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#deleteModal_'+id).modal('hide'); // Cerrar el modal
                window.location.href = '/admin/terms/attribute/'+ actualId;

            },
            error: function() {
                alert('Error al eliminar término.');
            }
        });
    });
});