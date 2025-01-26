
$(document).ready(function() {

    $('#categoryForm').on('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario

        // Recoger datos del formulario
        const formData = {
            name: $('#name_category').val(),
            short_code: $('#short_code').val(),
            category_parent: $('#category_parent').val(),
            description: $('#description_category').val(),
            path_image: $('#picture-category').val(),
            is_activated: $('#is_activated').val(),
           // _token: $('input[name="_token"]').val(), // Agregar el token CSRF
        };
        // Realizar la solicitud AJAX
        $.ajax({
            url: 'https://api.digilysolutions.com/api/productcategories',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
               // $('#message').removeClass('alert-danger').addClass('alert-success').text('Categoría creada exitosamente.').show();
                // Opcionalmente, puedes limpiar el formulario
                $('#categoryForm')[0].reset();
            }
        });
    });
});
