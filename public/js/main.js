// Asegúrate de que el script se ejecute después de que el DOM esté cargado  
document.addEventListener('DOMContentLoaded', function() {  
    const pagoCheckbox = document.getElementById('pagoCheckbox');  
    const extraInputs = document.getElementById('extraInputs');  

    // Verificar que el checkbox y los inputs existen  
    if (pagoCheckbox && extraInputs) {  
        // Evento que se activa al cambiar el estado del checkbox  
        pagoCheckbox.addEventListener('change', function() {  
            if (this.checked) {  
                extraInputs.classList.remove('inputs-ocultos');  
                extraInputs.classList.add('inputs-visible');  
            } else {  
                extraInputs.classList.remove('inputs-visible');  
                extraInputs.classList.add('inputs-ocultos');  
            }  
        });  
    } else {  
        console.error('No se encontraron los elementos en el DOM.');  
    }  
});  

(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });

    let cantidadTotal = 0;

    $('#cart_add').on('click', function () {      
       
            cantidadTotal++;
            document.getElementById('cantidadCarrito').textContent = cantidadTotal;
    });

    $('#cart_remove').on('click', function () {             
       
      if(cantidadTotal>0 )
      {          
        cantidadTotal--;
      }        
    document.getElementById('cantidadCarrito').textContent = cantidadTotal;
});
 /*          
$('.dropdown-item').on('click', function() {
    var currency = $(this).text().trim(); // Obtiene el texto del botón que fue clicado
           /const currencyElements = document.querySelectorAll('#selectedCurrency');
           
            console.log(currency);
            currencyElements.forEach(element => {
                element.innerText = currency; // Actualiza el texto del elemento
                console.log(element);
            });
           
            $.ajax({
                url: '/exchangerate/' + currency, // URL a donde se hará la solicitud
                method: 'GET', // Método HTTP
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Token CSRF
                },
                success: function(response) {
                    console.log('Productos recibidos:', response);
                    var products = response.products; // Asegúrate de que esta ruta sea correcta
                  // Para depurar
                    products.forEach(function(product) {
                        console.log(product); // Para cada producto
            
                        var productId = product.id; // ID del producto
                        
                        // Asegúrate de convertir a número si no lo son
                        var sale_price = parseFloat(product.sale_price) || 0; // Si no es un número, usa 0
                        var discounted_price = parseFloat(product.discounted_price) || null; // Convertir a número o null
                        
                        // Formatear los precios a 2 decimales
                        var formatted_sale_price = sale_price.toFixed(2);
                        var formatted_discounted_price = discounted_price !== null ? discounted_price.toFixed(2) : null;
            
                        // Cambiar el valor de todas las etiquetas con la clase `product_{productId}`
                        $('.product_' + productId).html(`$${formatted_discounted_price !== null ? formatted_discounted_price : formatted_sale_price}`); // Cambia el contenido de la etiqueta de precio
            
                        // Cambiar el precio original (con <del>)
                        if (formatted_discounted_price !== null) {
                            $('.product_' + productId + '.sale-price').html(`<del>$${formatted_sale_price}</del>`); // Cambia el contenido de la etiqueta de precio original
                        } else {
                            $('.product_' + productId + '.sale-price').html(''); // Limpiar si no hay precio descontado
                        }
                    });
                    
                    console.log('Cambio de moneda realizado:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error al cambiar la moneda:', error);
                }
            });
});
*/
     
    
})(jQuery);
document.addEventListener('DOMContentLoaded', function() {
    const contenedoresEstrellas = document.querySelectorAll('.estrellas');

    contenedoresEstrellas.forEach(contenedor => {
        const estrellas = contenedor.querySelectorAll('.estrella');

        estrellas.forEach(estrella => {
            estrella.addEventListener('click', function() {
                // Cambiar el carácter de las estrellas según la selección
                const valor = parseInt(this.getAttribute('data-valor'));

                // Cambiar todas las estrellas a vacías y llenas según la selección
                estrellas.forEach((e, index) => {
                    e.innerHTML = (index < valor) ? '&#9733;' : '&#9734;'; // Llenos hasta la estrella seleccionada
                });
            });

            estrella.addEventListener('mouseover', function() {
                // Cambiar todas las estrellas a vacías y llenas según la estrella bajo el mouse
                const valor = parseInt(this.getAttribute('data-valor'));
                estrellas.forEach((e, index) => {
                    e.innerHTML = (index < valor) ? '&#9733;' : '&#9734;'; // Mostrar el efecto de hover
                });
            });

            estrella.addEventListener('mouseout', function() {
                // Aquí no revertimos la selección, solo el efecto de hover.
                // Esto dejará las estrellas llenas permanentemente si se han seleccionado.
                // No se agrega ningún código aquí para revertir el estado.
            });
        });
    });
    // Capturar el checkbox y los inputs

});

