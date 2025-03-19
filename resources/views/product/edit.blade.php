@extends('layouts.app-admin')

@section('title-header-admin')
    {{ __('Update') }} Product
@endsection

@section('css')
    <style>
        .ql-container {
            height: 150px;
            /* Cambia esto a la altura deseada */
            border: 1px solid #ccc;
            /* Agrega un borde si lo deseas */
        }

        .ql-editor {
            min-height: 250px;
            /* Establece la altura mínima del editor */
            max-height: 300px;
            /* Establece la altura máxima del editor */
            overflow-y: auto;
            /* Agrega desplazamiento vertical si el contenido excede la altura */
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .image-container {
            position: relative;
            /* Para posicionar el icono de eliminación */
        }

        .gallery img {
            width: 100px;
            /* Ancho de la miniatura */
            height: 100px;
            /* Alto de la miniatura */
            object-fit: cover;
            /* Mantiene proporciones de la imagen */
            border: 1px solid #ccc;
            /* Borde para darle estilo */
            border-radius: 5px;
            /* Bordes redondeados */
        }

        .remove-image {
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            color: red;
            font-size: 20px;
            background: white;
            border-radius: 50%;
            padding: 2px 5px;
        }

        .action-links {
            margin-top: 20px;
            /* Espacio superior para los links */
        }

        .hidden {
            display: none;
            /* Clase para ocultar elementos */
        }

        #image-input {
            display: none;
            /* Esconde el input directamente */
        }


        .sugerencia.existente {
            color: red;
            /* Cambia esto al color que quieras */
        }

        .etiqueta {
            display: inline-block;
            background: #ddd;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
        }

        #etiqueta-suggestions {
            background-color: white;
            /* Fondo blanco para las sugerencias */
            border: 1px solid #ccc;
            /* Borde opcional */
            max-height: 200px;
            /* Altura máxima */
            overflow-y: auto;
            /* Desplazamiento vertical si hay muchas sugerencias */
            position: absolute;
            /* Para posicionarse correctamente */
            z-index: 1000;

            /* Asegurarte de que esté encima de otros elementos */
        }

        .sugerencia {
            padding: 10px;
            /* Espaciado interno */
            cursor: pointer;
            /* Cambiar el cursor al pasar el mouse */
        }

        .sugerencia:hover {
            background-color: #f0f0f0;
            /* Color de fondo al pasar el mouse */
        }

        .sugerencia.existente {
            font-weight: bold;
            /* Cambia el estilo si la etiqueta ya está seleccionada */
            background-color: #e0e0e0;
            /* Fondo diferente para etiquetas existentes */
        }
    </style>
@endsection
@section('content-admin')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Product</span>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                     @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif<div class="card-body bg-white">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data" data-toggle="validator">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('product.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        let termsId = [];
        $(document).ready(function() {
            // Establecer la fecha mínima para el campo "Desde"
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); // Enero es 0!
            var yyyy = today.getFullYear();
            today = yyyy + '-' + mm + '-' + dd;

            $('tr[data-id="2"]').show();



            $('#start_date_discounted_price').attr('min', today); // Asignar la fecha mínima al input "Desde"
            $('#end_date_discounted_price').attr('min', today); // Asignar la fecha mínima al input "Desde"
            $('#expiration_date').attr('min', today);
            $('#schedule-link').on('click', function(e) {
                e.preventDefault(); // Evita que el enlace recargue la página
                $('#date-fields').show(); // Muestra los campos de fecha
                $('#schedule-link').hide();
            });


            // Al cambiar la fecha de inicio, actualiza la fecha mínima para la fecha final
            $('#start_date_discounted_price').on('change', function() {
                var startDate = $(this).val();
                if (startDate) {
                    $('#end_date_discounted_price').attr('min',
                        startDate); // Establece la fecha mínima de "Hasta" como la fecha de "Desde"
                    $('#end_date_discounted_price').val(
                        ''); // Limpiar el campo de fecha 'Hasta' si se está rellenando
                }
                // Deshabilitar fechas posteriores a "Hasta"
                updateStartDateMax();
            });

            // Función para actualizar la fecha máxima de "Desde"
            function updateStartDateMax() {
                var endDate = $('#end_date_discounted_price').val();
                if (endDate) {
                    $('#start_date_discounted_price').attr('max',
                        endDate); // Deshabilitar fechas posteriores a "Hasta"
                } else {
                    // Si no hay fecha final seleccionada, elimina la restricción
                    $('#start_date_discounted_price').removeAttr('max');
                }
            }
            // Validación de las fechas
            $('#start_date_discounted_price, #end_date_discounted_price').on('change', function() {
                var startDate = $('#start_date_discounted_price').val();
                var endDate = $('#end_date_discounted_price').val();

                // Validar que la fecha de inicio no sea mayor que la de fin
                if (startDate && endDate && startDate > endDate) {
                    alert("La fecha 'Desde' no puede ser mayor que la fecha 'Hasta'.");
                    $('#end_date_discounted_price').val(''); // Limpiar la fecha 'Hasta' si no es válida
                }
            });

            $('#cancel-link').on('click', function(e) {
                e.preventDefault(); // Evita que el enlace recargue la página
                $('#date-fields').hide(); // Oculta los campos de fecha
                $('#schedule-link').show();
                // Opcionalmente puedes limpiar los campos de fecha
                $('#start_date_discounted_price').val('');
                $('#end_date_discounted_price').val('');
            });


            // Función para validar precios
            function validatePrices() {
                const purchasePrice = parseFloat($('#purchase_price').val());
                const salePrice = parseFloat($('#sale_price').val());
                const discountedPrice = parseFloat($('#discounted_price').val());
                const $warningMessage = $('#warning_message');

                // Ocultar el mensaje de advertencia inicialmente
                $warningMessage.hide();

                let warningText = '';

                // Validar el precio rebajado
                if (!isNaN(purchasePrice) && !isNaN(discountedPrice) && discountedPrice < purchasePrice) {
                    warningText +=
                        "Advertencia: El precio rebajado es menor que el precio de compra. <strong>Esto podría llevar a una pérdida de dinero.</strong><br>";
                }

                // Validar el precio de venta
                if (!isNaN(purchasePrice) && !isNaN(salePrice) && salePrice < purchasePrice) {
                    warningText +=
                        "Advertencia: El precio de venta es menor que el precio de compra. <strong>Esto no es viable.</strong><br>";
                }

                // Mostrar mensaje de advertencia si hay algún aviso
                if (warningText) {
                    $('#warning_message_text').html(warningText);
                    $warningMessage.show(); // Muestra el mensaje de advertencia
                }
            }

            // Agregar eventos de blur a los campos de entrada
            $('#purchase_price, #sale_price, #discounted_price').on('blur', validatePrices);

        });

        $(document).ready(function() {
            $('#enable_stock').change(function() {
                if ($(this).is(':checked')) {
                    $('#inventory-management').show();
                } else {
                    $('#inventory-management').hide();

                    // Limpiar los campos
                    $('#quantity_available').val(''); // Limpiar campo de cantidad
                    $('#minimum-stock').val(''); // Limpiar campo de mínimo en stock
                    $('input[name="customRadio-1"]').prop('checked', false); // Desmarcar todos los radios
                    $('#customRadio8').prop('checked', true); // Volver a marcar "Permitir" por defecto
                }
            });
        });

        $(document).ready(function() {

            let termNames = {}; // Objeto para almacenar ID y nombres de términos
            let termsId = []; // Inicializa termsId aquí para que esté global

            // Manejar el cambio en el select de atributos
            $('#attribute').change(function() {
                let attributeId = $(this).val();
                let termsSelect = $('#termsSelect'); // Asegúrate de tener el selector correcto

                // Limpiar terms select
                termsSelect.empty();
                if (attributeId) {
                    // Hacer una solicitud AJAX para obtener los términos del atributo seleccionado
                    $.ajax({
                        url: '/admin/terms/attribute/' + attributeId,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Limpia el objeto termNames antes de llenarlo
                            termNames = {}; // No redefinir, solo reiniciar

                            // Limpia el select antes de llenarlo
                            termsSelect.empty();

                            // Llenar los términos en el select
                            $.each(data.terms, function(key, term) {
                                termNames[term.id] = term
                                    .name; // Almacena el ID y el nombre
                                termsSelect.append(
                                    $('<option></option>').val(term.id).text(term
                                        .name)
                                );
                            });

                            console.log(termNames);
                        },
                        error: function(xhr) {
                            alert("Error al obtener términos.");
                            console.error('Error al obtener términos:', xhr);
                        }
                    });
                }
            });

            // Agregar los términos seleccionados a la lista
            $('#add-terms').click(function() {
                let selectedTerms = $('#termsSelect').val();
                let attributeId = $('#attribute').val();
                let attributeName = $('#attribute option:selected').text();

                console.log(termNames);
                console.log(selectedTerms);

                if (selectedTerms.length > 0) {
                    let termsList = selectedTerms.map(termId => {
                        termsId.push(termId); // Asegúrate de que esto esté en el lugar correcto

                        let termName = termNames[
                            termId]; // Obtén el nombre del término usando el ID

                        // Manejar caso de `undefined`
                        if (!termName) {
                            return `<span class="term" data-term-id="${termId}">Nombre no disponible</span>`;
                        }

                        return `<span class="term" data-term-id="${termId}">${termName}</span>`;
                    }).join(', ');

                    let attributeHtml = `
            <div class="attributeId-row">
                <hr>
                <div class="attribute-row d-flex justify-content-between" data-attribute-id="${attributeId}">
                    <div>
                        <strong>${attributeName}:</strong> ${termsList}
                    </div>
                    <div>
                        <a href="#" class="remove-attribute" style="margin-left: 10px; color:red;">Eliminar</a>
                    </div>
                </div>
            </div>
        `;

                    $('#terms_id').val(termsId.join(',')); // Unir los IDs en una cadena separada por comas
                    $('#termsSelect').empty(); // Limpiar terms select
                    $('#attribute option[value="' + attributeId + '"]').prop('disabled', true);
                    $('.attributes-list').append(attributeHtml);

                    console.info(termsId);
                } else {
                    alert('Por favor, selecciona al menos un término.');
                }
            });

            $('#expiration_date').change(function() {
                // Obtener la fecha seleccionada
                const selectedDate = new Date($(this).val());
                const currentDate = new Date();

                // Calcular la diferencia
                const diffTime = selectedDate - currentDate;
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)); // Días
                const diffMonths = Math.floor(diffDays / 30); // Aproximación en meses
                const diffYears = Math.floor(diffDays / 365); // Aproximación en años

                // Determinar el tipo de periodo
                let periodValue;
                let periodType;

                if (diffDays <= 0) {
                    periodValue = 0;
                    periodType = "expirado";
                } else if (diffYears > 0) {
                    periodValue = diffYears;
                    periodType = "años";
                } else if (diffMonths > 0) {
                    periodValue = diffMonths;
                    periodType = "meses";
                } else {
                    periodValue = diffDays;
                    periodType = "días";
                }

                // Mostrar el resultado en los campos
                $('#expiry_period').val(periodValue);
                //Campo oculto para enviar por el form
                $('#expiry_period_hidden').val(periodValue);

                $('#expiry_period_type').val(periodType);
                //Campo oculto para enviar por el form
                $('#expiry_period_type_hidden').val(periodType);

            });

            // Manejo del envío del formulario
            $('#expiry-form').submit(function(e) {
                e.preventDefault(); // Prevenir la acción predeterminada
                const expirationDate = $('#expiration_date').val();
                const expiryPeriod = $('#expiry_period').val();
                const expiryPeriodType = $('#expiry_period_type').val();

                // Colocar lógica aquí para enviar los datos al servidor (ej. usando AJAX)
                // Este es solo un ejemplo. Debe adaptarse a tu backend en Laravel.

                console.log({
                    expiration_date: expirationDate,
                    expiry_period: expiryPeriod,
                    expiry_period_type: expiryPeriodType
                });

                // Aquí se podría hacer una llamada AJAX a un controlador de Laravel para guardar los datos en la BD.
            });

            //Iamgene pro defecto
            // Define la ruta que deseas utilizar
            var path_image = 'admin/images/upload/no-picture.jpg'; // Esta es la ruta de la imagen

            // Obtiene el protocolo (http o https) y el hostname
            var protocol = window.location.protocol; // Protocolo (http: o https:)
            var domain = window.location.hostname; // Nombre del dominio (127.0.0.1)
            var port = window.location.port; // Puerto (4000)

            // Si el puerto está vacío, omitimos el :puerto en la URL final
            var fullUrl = protocol + '//' + domain + (port ? ':' + port : '') + '/' + path_image;

            $('#uploadImageLink').click(function(e) {
                e.preventDefault();
                $('#outstanding_image').click(); // Dispara el clic en el input de archivo
            });

            // Event handler para la carga de la imagen
            $('#outstanding_image').change(function() {
                const file = this.files[0]; // Obtener el archivo
                if (file) {
                    const reader = new FileReader(); // Creador de objeto FileReader
                    reader.onload = function(e) {
                        $('#image-preview').attr('src', e.target.result).show(); // Muestra la imagen
                        $('#imageOptions')
                            .show(); // Muestra las opciones para eliminar o cambiar la imagen
                        $('#uploadImageLink').hide();
                    };
                    reader.readAsDataURL(file); // Lee el archivo como URL de datos
                }
            });

            // Manejar el enlace de eliminar imagen
            $('#removeImageLink').click(function(e) {
                e.preventDefault();
                $('#image-preview').attr('src', fullUrl).show(); // Muestra la imagen
                $('#imageOptions').hide(); // Ocultar las opciones
                $('#outstanding_image').val(''); // Limpiar el campo de entrada de archivo
                $('#uploadImageLink').show();
            });

            // Manejar el enlace de cambiar imagen
            $('#changeImageLink').click(function(e) {
                e.preventDefault();
                $('#outstanding_image').click(); // Reabrir el diálogo de carga
            });
        });


        // Manejar el click en el botón de eliminar atributo
        $(document).on('click', '.remove-attribute', function(e) {
            e
                .preventDefault();
            // Obtener el elemento padre y el ID del atributo
            let attributeRow = $(this).closest('.attribute-row'); // Selecciona la fila del atributo
            let attributeId = attributeRow.data('attribute-id'); // Obtener el ID del atributo de la fila

            // Obtener los IDs de términos de esa fila
            let termsToRemove = [];
            attributeRow.find('.term').each(function() {
                termsToRemove.push($(this).data('term-id').toString()); // Convertir a cadena
            });

            // Eliminar solo el elemento de la fila específica
            attributeRow.closest('.attributeId-row').remove(); // Elimina la fila contenedora completa

            // Volver a habilitar el atributo correspondiente
            $('#attribute option[value="' + attributeId + '"]').prop('disabled', false);

            // Eliminar términos de termsId
            termsId = termsId.filter(termId => !termsToRemove.includes(termId)); // Comparar cadenas
            console.info(termsId);
            // Actualizar el campo oculto con los nuevos IDs de términos
            $('#terms_id').val(termsId.join(',')); // Unir los IDs en una cadena separada por comas

        });



        //Galeria de imagenes
        $(document).ready(function() {
            let imageUrls = [];

            // Mostrar el selector de archivos al hacer clic en el enlace
            $('#add-images-link').on('click', function(e) {
                e.preventDefault();
                $('#image-input').click();
            });

            // Al cambiar el input (cuando se seleccionan archivos)
            $('#image-input').on('change', function() {
                const files = this.files;

                // Iterar sobre los archivos seleccionados
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];

                    // Comprobar que sea un archivo de imagen
                    if (file.type.startsWith('image/')) {
                        const imgUrl = URL.createObjectURL(file);
                        const fileName = file.name; // Obtener el nombre del archivo

                        // Verificar si la imagen ya está en la lista comparando los nombres de archivo
                        if (!imageUrls.some(url => url.fileName === fileName)) {
                            imageUrls.push({
                                url: imgUrl,
                                fileName
                            }); // Guardar la imagen con el nombre del archivo

                            // Añadir la miniatura de la imagen a la galería
                            $('#image-gallery').append(`
                                <div class="image-container">
                                    <span class="remove-image" title="Eliminar Imagen">&times;</span>
                                    <img src="${imgUrl}" alt="Imagen de Producto">
                                </div>
                            `);
                        } else {
                            alert('Esta imagen ya está en la galería.');
                        }
                    }
                }

                // Ocultar el enlace para añadir imágenes y mostrar "Añadir más imágenes"
                $('#add-images-link').hide();
                $('#add-more-images').removeClass('hidden');
                $('#remove-all-images').removeClass('hidden');

                // Limpiar el input
                $(this).val('');
            });

            // Al hacer clic en "Añadir más imágenes"
            $('#add-more-images').on('click', function(e) {
                e.preventDefault();
                $('#image-input').click();
            });

            // Eliminar una imagen específica
            $('#image-gallery').on('click', '.remove-image', function() {
                const imgElement = $(this).siblings('img');
                const imgUrl = imgElement.attr('src');

                // Eliminar la URL de la lista
                imageUrls = imageUrls.filter(obj => obj.url !== imgUrl);

                // Eliminar la imagen del DOM
                $(this).parent('.image-container').remove();

                // Si no hay imágenes, mostrar el enlace de "Añadir imágenes a la galería"
                if (imageUrls.length === 0) {
                    $('#add-images-link').show();
                    $('#add-more-images').addClass('hidden');
                    $('#remove-all-images').addClass('hidden');
                }
            });

            // Eliminar todas las imágenes
            $('#remove-all-images').on('click', function() {
                imageUrls = [];
                $('#image-gallery').empty();

                // Mostrar el enlace para añadir imágenes
                $('#add-images-link').show();
                $('#add-more-images').addClass('hidden');
                $(this).addClass('hidden');
            });
        });


        //Etiquetas
        $(document).ready(function() {
            let etiquetasSeleccionadas = [];

            function mostrarEtiquetas() {
                $('#etiquetas-seleccionadas').empty();
                etiquetasSeleccionadas.forEach(function(etiqueta) {
                    console.info(etiqueta);
                    $('#etiquetas-seleccionadas').append(`
            <button type="button" class="btn mb-1 bg-warning-light eliminar-etiqueta" data-nombre="${etiqueta.name}">
                ${etiqueta.name} <span style="cursor:pointer; margin-left: 5px;" class="badge badge-warning ml-2">&times;</span>

            </button>
        `);
                });
                // Actualiza el campo oculto con la lista de etiquetas seleccionadas
                // $('#tag_id').val(etiquetasSeleccionadas.join(','));
                $('#tag_id').val(etiquetasSeleccionadas.map(e => e.name).join(','));
            }

            $('#etiqueta-input').on('input', function() {
                const query = $(this).val();
                if (query.length > 0) {
                    $.get('/admin/searchTags/tags', {
                        name: query
                    }, function(data) {
                        $('#etiqueta-suggestions').empty();

                        data.forEach(function(etiqueta) {
                            // Verificando si la etiqueta ya está seleccionada
                            const existe = etiquetasSeleccionadas.some(e => e.name ===
                                etiqueta.name);

                            $('#etiqueta-suggestions').append(`
                    <div class="sugerencia${existe ? ' existente' : ''}" data-id="${etiqueta['id']}" data-nombre="${etiqueta['name']}">
                        ${etiqueta['name']}
                    </div>
                `);
                        });
                    }).fail(function(xhr, status, error) {
                        console.error("Error en la búsqueda de etiquetas:", status, error);
                    });
                } else {
                    $('#etiqueta-suggestions').empty();
                }
            });

            $('#etiqueta-suggestions').on('click', '.sugerencia', function() {
                const nombreEtiqueta = $(this).data('nombre');
                const idEtiqueta = $(this).data('id');

                // Comprobar si la etiqueta ya se encuentra en el array
                const existeEtiqueta = etiquetasSeleccionadas.some(etiqueta => etiqueta.name ===
                    nombreEtiqueta);

                if (!existeEtiqueta) {
                    etiquetasSeleccionadas.push({
                        id: idEtiqueta,
                        name: nombreEtiqueta
                    });
                } else {
                    console.log(`La etiqueta '${nombreEtiqueta}' ya está seleccionada.`);
                }

                $('#etiqueta-input').val(''); // Limpiar el input de búsqueda
                $('#etiqueta-suggestions').empty(); // Limpiar las sugerencias
                mostrarEtiquetas(); // Mostrar etiquetas seleccionadas
            });


            $('#etiquetas-seleccionadas').on('click', '.eliminar-etiqueta', function() {
                const nombreEtiqueta = $(this).data('nombre');

                etiquetasSeleccionadas = etiquetasSeleccionadas.filter(e => e.name !== nombreEtiqueta);
                console.info(etiquetasSeleccionadas);
                mostrarEtiquetas();
            });

            $('#add-button').on('click', function() {
                const inputText = $('#etiqueta-input').val();
                const etiquetas = inputText.split(',').map(e => e.trim()).filter(e => e.length > 0);
                console.log(etiquetas);

                // Aquí se añade directamente las etiquetas sin hacer la petición AJAX
                etiquetas.forEach(etiqueta => {
                    // Se asegura de que la etiqueta no esté ya seleccionada
                    if (!etiquetasSeleccionadas.some(selected => selected.name === etiqueta)) {
                        etiquetasSeleccionadas.push({
                            id: etiquetasSeleccionadas.length +
                            1, // Genera un ID único basado en el tamaño actual
                            name: etiqueta
                        });
                    }
                });

                // Muestra las etiquetas actualizadas
                mostrarEtiquetas();

                // Limpia el campo de entrada
                $('#etiqueta-input').val('');
                $('#etiqueta-suggestions').empty();
            });

            /* $('#add-button').on('click', function() {
                 const inputText = $('#etiqueta-input').val();
                 const etiquetas = inputText.split(',').map(e => e.trim()).filter(e => e.length > 0);

                 $.ajax({
                     url: "/admin/tags/add",
                     type: 'POST',
                     data: {
                         name: etiquetas,
                         _token: $('meta[name="csrf-token"]').attr('content')
                     },
                     success: function(response) {
                         console.info(response['data']);

                         response['data'].forEach(tag => {
                             if (!etiquetasSeleccionadas.some(selected => selected.id ===
                                     tag.id)) {
                                 etiquetasSeleccionadas.push({
                                     id: tag.id,
                                     name: tag.name
                                 });
                             }
                         });
                         mostrarEtiquetas();
                     },
                     error: function(xhr) {
                         alert('Error al guardar las etiquetas. Intenta de nuevo.');
                     }
                 });

                 $('#etiqueta-input').val('');
                 $('#etiqueta-suggestions').empty();
             });*/
        });


        $(document).ready(function() {
            $('#new-category-product form').on('submit', function(e) {
                e.preventDefault(); // Evitar la acción de envío del formulario

                // Obtener datos del formulario
                const formData = $(this).serialize(); // Serializa los datos del formulario

                $.ajax({
                    url: '/admin/storeCategoryName/productcategories', // La URL de la acción del formulario
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Si la categoría se guarda correctamente
                        if (response.success) {

                            // Inserta la nueva categoría en la lista
                            const newCategory = `<div class="checkbox">
                            <input type="checkbox" class="checkbox-input" id="category-${response.category.data.id}" name="categories[]" value="${response.category['id']}" checked>
                            <label for="category-${response.category.data.id}">${response.category.data.name}</label>
                        </div>`;
                            $('#categories-list').append(
                                newCategory
                            ); // Asumiendo que tienes un contenedor con este ID para la lista de categorías
                            // Cerrar el modal
                            $('#new-category-product').modal('hide');
                            // Limpiar el campo de entrada
                            $('#nameCategory').val('');


                        } else {
                            // Manejar el error aquí
                            alert('Error al guardar la categoría: ' + response.message);
                        }
                    },
                    error: function(xhr) {
                        // Manejar el error de AJAX aquí
                        alert('Hubo un error en la solicitud: ' + xhr.responseText);
                    }
                });
            });
        });

        $(document).ready(function() {

            const addModelEndpoint = '/admin/model/add '; // Cambia por la URL correcta para agregar un modelo

            $('#brand').change(function() {
                $('#add-model-container').show();
                // Obtiene los modelos de la opción seleccionada
                const models = $(this).find(':selected').data('models');
                // Limpia el select de modelos primero
                $('#model').empty().append(
                    '<option value="" disabled selected>Selecciona un modelo</option>');

                // Verifica si hay modelos disponibles
                if (models && models.length > 0) {
                    // Itera a través de los modelos y los agrega al select de modelos
                    models.forEach(function(model) {
                        $('#model').append(`<option value="${model.id}">${model.name}</option>`);
                    });
                } else {
                    // Si no hay modelos, puedes optar por dejar solo el valor por defecto
                    $('#model').append('<option value="" disabled>No hay modelos disponibles</option>');
                }
            });

            // Manejo de la acción de agregar un nuevo modelo
            $('#addModelBand').on('click', function(e) {
                e.preventDefault(); // Detiene el envío del formulario

                const newModelName = $('#newModel').val();
                const brandId = $('#brand').val();


                // Realiza una solicitud AJAX para agregar el nuevo modelo
                $.ajax({
                    url: addModelEndpoint, // asegúrate de que esta URL sea igual a la ruta definida
                    type: 'POST',
                    data: {
                        name: newModelName,
                        brand_id: brandId,
                        _token: $('meta[name="csrf-token"]').attr(
                            'content') // Asegúrate de tener el token CSRF
                    },
                    success: function(data) {

                        // Cierra el modal
                        $('#addModelModal').modal('hide');

                        // Añade el nuevo modelo al select
                        const modelSelect = $('#model');
                        modelSelect.append(
                            `<option value="${data.model.data.id}">${data.model.data.name}</option>`
                        );
                        modelSelect.val(data.model.data.id); // Selecciona el nuevo modelo

                        // Limpia el campo de nuevo modelo
                        $('#newModel').val('');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al agregar el modelo:', error);
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('includes/admin/script.js') }}"></script>
@endsection

