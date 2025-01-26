var quantity = 0;
var cartItems = [];
var productIdDetails =0;
var cantProduct=0;
var exists =false;
    function changeCurrency(currency, productId) {

        const currencyElements = document.querySelectorAll('.selectedCurrency')
        currencyElements.forEach(element => {
            element.innerText = currency;
        });


        // Ahora puedes hacer tu solicitud AJAX para obtener los precios en la nueva moneda
        $.ajax({
            url: '/exchangerate/' + currency,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
               
                var products = response.latestProducts.products;
                products.forEach(function(product) {
                    console.log(product); // Para cada producto

                    var productId = product.id; // ID del producto

                    // Asegúrate de convertir a número si no lo son
                    var sale_price = parseFloat(product.sale_price) ||
                        0; // Si no es un número, usa 0
                    var discounted_price = parseFloat(product.discounted_price) ||
                        null; // Convertir a número o null

                    // Formatear los precios a 2 decimales
                    var formatted_sale_price = sale_price.toFixed(2);
                    var formatted_discounted_price = discounted_price !== null ?
                        discounted_price
                        .toFixed(2) : null;

                    // Cambiar el valor de todas las etiquetas con la clase `product_{productId}`
                    $('.product_' + productId).html(
                        `$${formatted_discounted_price !== null ? formatted_discounted_price : formatted_sale_price}`
                    ); // Cambia el contenido de la etiqueta de precio

                    // Cambiar el precio original (con <del>)
                    if (formatted_discounted_price !== null) {
                        $('.product_' + productId + '.sale-price').html(
                            `<del>$${formatted_sale_price}</del>`
                        ); // Cambia el contenido de la etiqueta de precio original
                    } else {
                        $('.product_' + productId + '.sale-price').html(
                            ''); // Limpiar si no hay precio descontado
                    }
                });
                $('.name_currencyDetailsProduct').text(  currency);
                currency
                updateCartDisplay(response.cart);
            },
            error: function(xhr, status, error) {
                console.error('Error al cambiar la moneda:', error);
            }
        });
        if (typeof updateOrder === 'function') {
            updateOrder();
        } else {
                  console.log('updateOrder no está definida.');
        }
        if (typeof upateTableCart === 'function') {
            upateTableCart();
         } else {
               console.log('updateCart no está definida.');
         }
        


    }


    function addCartItems(idItems) {

        // Lógica para actualizar la interfaz del carrito
        const item = cartItems.find(item => item.id === idItems);
        if (item) {
            item.quantity++;
            alert('2.1');
            addProductCart(idItems, 1);
        }
    }

    function removeProductToCart(button,idProduct) {
        removeProductCart(button,idProduct,1);
    }
    function addProductToCart(idProduct) {
        addProductCart(idProduct, 1);

    }
    function addProductCart(productId, quantity) {
        console.log("respuestas", [productId, quantity]);
        $.ajax({
            url: '/cart/add',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                let items = response;
                let exists = false;
                let productQuantity = 0;
    
                // Iterar sobre cada clave del objeto
                $.each(items, function(key, item) {
                    // Comparar el "id" del item con el "id" pasado por parámetro
                    if (item.id === productId) {
                        productQuantity = item.quantity;
                        exists = true;
                    }
                });
    
                console.log(response);
                console.log(response.message);
                existsProduct(exists, productQuantity);
                updateCartDisplay(response);
                console.log("Pase");
            },
            error: function(xhr) {
                // Manejar el error
                let message = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Error desconocido';
                console.error('Error:', message);
                alert(message);  // O muestra un mensaje al usuario
            }
        });
    }
    function removeProductCart(button, productId, quantity) {

        $.ajax({
            url: '/cart/remove',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                const items = response;
                quantity = 0;
                 exists = false;
                // Iterar sobre cada clave del objeto
                $.each(items, function(key, item) {
                    // Comparar el "id" del item con el "id" pasado por parámetro
                    if (item.id === productId) {
                        quantity = item.quantity;
                        exists = true;
                    }
                });
                remeveRow(productId,quantity);
                existsProduct(exists,quantity);
                updateCartDisplay(response);
            }
        });
    }
    function remeveRow(productId,quantity)
    {
        if(quantity===0)
            {
                var row = $('tr:has(button[data-id="' + productId + '"])');
                row.remove();
            }
    }
    function updateCartDisplay(products) {
        //Obtener el id del items
        cartItems = [];
        $.each(products, function(key, value) {

            quantity = parseInt(value.quantity, 10);
            cartItems.push({
                id: value.id,
                outstanding_image: value.outstanding_image,
                name: value.name,
                sale_price: value.sale_price,
                quantity: quantity
            });
        });
        if (typeof updateCart === 'function') {
            updateCart();
         } else {
               console.log('updateCart no está definida.');
         }
        
        
    }
    function updateCart() {
        $('#item-count').text(cartItems.reduce((sum, item) => sum + item.quantity, 0) + ' productos');
        let total = 0;
        var cantProduct =cartItems.reduce((sum, item) => sum + item.quantity, 0);

        $('#cart-items-list').empty();
        if (cartItems.length === 0) {
            $('#cart-content').hide(); // Ocultar contenido si está vacío
        } else {
            cartItems.forEach(item => {
                if (productIdDetails == item.id) {
                    $("#quantity-input").val(item.quantity);
                }
                $("#quantity-input-"+item.id).val(item.quantity);
                var totalProduct = parseFloat(item.sale_price) * parseFloat(item.quantity);

                total += totalProduct;
                $('#cart-items-list').append(`
            <li>
                <img src="${item.outstanding_image}"  width="37" height="34">
                <span class="cart-content-count">x ${item.quantity}</span>
                <strong>${item.name}</strong>
                <em width="37">$${parseFloat(item.sale_price).toFixed(2)}</em>
                <button class="remove-item" data-id="${item.id}">x</button>
                <button class=" mt-2 increase-quantity" data-id="${item.id}">+</button>
                <button class="mt-2  decrease-quantity" data-id="${item.id}">-</button>
            </li>
        `);
            });
        }
        var deliveryPriceText = $('#price-delivery').text();
        var deliveryPriceValue = parseFloat(deliveryPriceText.replace('$', '').trim());
        var subtotal = total;
        var totalPrice = subtotal+deliveryPriceValue;

        $("#subtotal-price-product").html(`$${subtotal.toFixed(2) }`);
        $("#total-price-show-product").html(`$${totalPrice.toFixed(2) }`);
        $('#total-price').text('$' + total.toFixed(2));
        $('#cart-content').show();
        if (typeof updateOrder === 'function') {
           updateOrder();
        } else {
              console.log('updateOrder no está definida.');
        }
       
    }

    function existsProduct(exists, quantity)
    {
        if (exists) {
            $("#add-to-cart").hide(); // Oculta el botón de añadir al carrito
            $("#pedido_compra").show();
            $(".input-group")
                .show(); // Muestra los botones para manejar la cantidad
            $("#quantity-input").val(quantity); // Muestra la cantidad inicial
        } else {
            $("#add-to-cart").show(); // Muestra el botón de añadir al carrito
            $("#pedido_compra").hide();
            $(".input-group")
                .hide(); // Oculta los botones para manejar la cantidad

        }
    }

 $(document).ready(function() {
    $('.container-fluid.pb-5').each(function() {
        // 'this' se refiere al elemento actual dentro del bucle
        productIdDetails = $(this).attr('id'); // Obtener el valor del atributo 'id'
    });
    let productInCart = false; // Cambia a false si el producto no está en el carrito
    $("#add-to-cart").hide();
    $(".input-group").hide();

console.log(productIdDetails);

$.ajax({
    url: '/cart/exitProduct/' + productIdDetails,
    method: 'GET',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

        var exists = response['exists'];
        quantity = response['quantity'];
        console.log(exists);
        console.log(quantity);
        existsProduct(exists,quantity);
    },
    error: function(xhr, status, error) {
        console.error('Error:', error);
    }

});
});
$('#add-to-cart').click(function() {

    const productId = $(this).data('id');
    addProductCart(productId, 1);

});


updateCart();
