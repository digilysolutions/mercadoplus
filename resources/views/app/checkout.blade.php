@extends('layouts.app')
@section('header-title')
    Isla de la Juventud -checkout
@endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-orange-mobile" href="/">Inicio</a>
                    <a class="breadcrumb-item text-orange-mobile" href="shop.html">Tienda</a>
                    <span class="breadcrumb-item text-dark-mobile active ">Enviar Pedido</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Checkout Start -->
    <div class="container-fluid">
        <form method="POST" action="{{ route('products.orderpurchase') }}" id="orderpurchase"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="row px-xl-5">
                <div class="col-lg-8">

                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">¿Quién
                            hace
                            el pedido? </span></h5>
                    <h6> Información de la persona</h6>
                    <div class="bg-light p-30 mb-5">
                        <div class="col-md-12 form-group">

                            <input name="name" id="name" class="form-control" type="text"
                                placeholder="Tu Nombre">
                        </div>
                        <div class="col-md-12 form-group">

                            <input name="phone" id="phone" class="form-control" type="text" placeholder="Whatsapp">
                            <em class="comment-text">Escribe el número correctamente. Este será el número que utilice si es
                                necesario contactarte.</em>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="checkbox" id="pagoCheckbox"> <label> ¿Otra persona realiza el pago?</label>
                        </div>

                        <div id="extraInputs" class="inputs-ocultos col-md-12 form-group">
                            <input name="name_other_person" id="name_other_person" type="text" class="form-control"
                                placeholder="Nombre de la persona que realiza el pago" />
                            </br>
                            <input name="phone_other_person" id="phone_other_person" type="text" class="form-control"
                                placeholder="Número de whatsapp de la pesona que realiza el pago" />
                            <em class="comment-text">Escribe el número correctamente. Este será el número que utilice si es
                                necesario contactarte.</em>
                        </div>

                    </div>
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">¿Quién
                            recibe el pedido?</span></h5>
                    <h6> Información de la persona</h6>
                    <div class="bg-light p-30 mb-5">
                        <div class="col-md-12 form-group">
                            <input name="name_receives_purchase" id="name_receives_purchase" class="form-control"
                                type="text" placeholder="Nombre">
                            <em class="comment-text">El nombre de la persona que recibe el pedido.</em>
                        </div>
                        <div class="col-md-12 form-group">

                            <input name="phone_receives_purchase" id="phone_receives_purchase" class="form-control"
                                type="text" placeholder="Whatsapp">
                            <em class="comment-text">El número del celular de la persona que recibe el pedido.</em>
                        </div>
                        <div class="col-md-12 form-group">

                            <input class="form-control" type="text" placeholder="Teléfono Fijo">
                            <em class="comment-text">El número de teléfono de la persona que recibe el pedido.</em>
                        </div>

                    </div>
                    <div class="bg-light p-30 mb-5">
                        <div class="col-md-12 form-group">
                            <input name="is_delivery" type="checkbox" id="is-deliveryZone"
                                @if ($deliveryZone != null) checked @endif>
                            <label> Quiero Domicilio</label>
                        </div>
                    </div>
                    <div id="deliverySection" style="display: @if ($deliveryZone != null) block @else none @endif;">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span
                                class="bg-secondary pr-3">¿Dónde
                                hacemos la entregamos?</span></h5>
                        <h6>Dirección</h6>
                        <div class="bg-light p-30 mb-5">
                            <h6>Cuba / Isla de la Juventud</h6>
                            <div class="col-md-12 form-group">
                                <label>Poblado</label>
                                <select name="deliveryzona_id" class="custom-select" id="deliverySelect">
                                    @foreach ($deliveryZones as $zone)
                                        <option value="{{ $zone['id'] }}" data-price="{{ $zone['price'] }}"
                                            @if ($deliveryZone != null && $zone['id'] == $deliveryZone['id']) selected @endif>
                                            {{ $zone['location']['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Dirección Exacta</label>
                                <textarea name="address" class="form-control" type="text" placeholder=""></textarea>
                                <em class="comment-text">La dirección donde se entregará el pedido.</em>
                            </div>
                        </div>
                    </div>

                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">¿Quieres
                            aclararnos algo?</span></h5>
                    <h6>Información adicional </h6>
                    <div class="bg-light p-30 mb-5">
                        <div class="col-md-12 form-group">

                            <textarea name="additional_information" class="form-control" type="text" placeholder="Ej: Frente a la ponchera"></textarea>
                            <em class="comment-text">Información adicional sobre su pedido o dirección.</em>

                        </div>

                    </div>

                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Orden
                            de
                            Compra</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h5 class="section-title text-orange-mobile position-relative text-uppercase mb-3">Moneda: <span
                                    id="currency-checkout" class=" pr-3">{{ $currency }}</span></h5>
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-3">Cantidad</h6>
                                <h6 class="mb-3">Productos</h6>
                                <h6 class="mb-3">Precio</h6>
                            </div>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach ($cart as $product)
                                <div class="d-flex justify-content-between">
                                    <p id="product-quantity-{{ $product['id'] }}">{{ $product['quantity'] }}</p>
                                    <p>{{ $product['name'] }}</p>
                                    <p id="product-checkout-{{ $product['id'] }}">
                                        ${{ $product['sale_price'] * $product['quantity'] }}</p>
                                </div>
                                @php
                                    $subtotal += $product['sale_price'] * $product['quantity'];
                                @endphp
                            @endforeach


                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6 id="subtotalValue">${{ $subtotal }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Descuento</h6>
                                <h6 class="font-weight-medium">$0</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Domicilio</h6>
                                <h6 id="deliveryValue" class="font-weight-medium"> $<span id="deliveryPrice">
                                        @if ($deliveryZone != null)
                                            {{ $deliveryZone['price'] }}
                                        @else
                                            0
                                        @endif
                                    </span>
                                </h6>
                            </div>
                        </div>
                        @php
                            $delivery = 0;
                            if ($deliveryZone != null) {
                                $delivery = $deliveryZone['price'];
                            }
                            $total = $subtotal + $delivery;
                        @endphp
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5 id="totalValue">${{ $total }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span
                                class="bg-secondary pr-3">Pedido
                                por Whatsapp</span></h5>
                        <div class="bg-light p-30">

                            <button type="submit" class="btn btn-block btn-primary font-weight-bold py-3">Enviar
                                Orden de Compra</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <!-- Checkout End -->
@endsection

@section('js')
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        function updateorder() {
console.log('entre');

            $.ajax({
                url: '/cart/infoCart', // Asegúrate de que esta ruta retorne un JSON  
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                   
                    $('#currency-checkout').text(data.currency);
                    var subtotal_checkout = 0;
                    $.each(data.products, function(index, item) {
                        var price_product_incheckout = item.sale_price;
                        var quantity_product_incheckout = item.quantity;
                        var subtotal_product_incheckout = price_product_incheckout *
                            quantity_product_incheckout;
                            subtotal_checkout +=subtotal_product_incheckout;
                        $('#product-checkout-' + item.id).text('$' + subtotal_product_incheckout.toFixed(2));
                        $('#product-quantity-' + item.id).text(quantity_product_incheckout);
                        console.log(quantity_product_incheckout);


                        /* $('.sale-price-' + item.id).text('$' + sale_price);
                         $('.total-price-row-' + item.id).text('$' + subtotal_price);*/
                    });
                    var totalValue =  subtotal_checkout +   parseFloat($('#deliveryValue').text().replace(/[$,]/g, '').trim());
                    $('#subtotalValue').text('$' + subtotal_checkout.toFixed(2));
                    $('#totalValue').text('$' + totalValue.toFixed(2)); 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error al actualizar el carrito:', textStatus, errorThrown);
                }
            });
        }

        $(document).ready(function() {
            // Establecer el estado inicial de la sección de entrega  
            toggleDeliveryFields();

            // Función para mostrar u ocultar la sección de entrega  
            $('#is-deliveryZone').change(function() {
                toggleDeliveryFields();
            });

            function toggleDeliveryFields() {
                const deliverySection = $('#deliverySection');


                // Mostrar o ocultar la sección de entrega según el estado del checkbox  
                if ($('#is-deliveryZone').is(':checked')) {
                    deliverySection.show();
                    var deliveryPrice = parseFloat($('#deliverySelect').find('option:selected').data('price'));
                    calcTotal(deliveryPrice);
                } else {
                    deliverySection.hide();
                    calcTotal(0);
                }
            }
        });

        function calcTotal(deliveryPrice) {
            // Obtener el subtotal
            var subtotal = parseFloat($('#subtotalValue').text().replace('$', ''));

            // Calcular el nuevo total
            var total = subtotal + deliveryPrice;

            // Actualizar los valores en el HTML
            $('#deliveryPrice').text(deliveryPrice.toFixed(2));
            $('#totalValue').text('$' + total.toFixed(2));
        }
        $('#deliverySelect').change(function() {
            // Obtener el precio de entrega de la opción seleccionada
            var deliveryPrice = parseFloat($(this).find('option:selected').data('price'));
            calcTotal(deliveryPrice);
           

        });

        function enviarOrden() {
            const numero = "58205054";
            const mensaje = `
🛒 *Orden de Compra*
Número de Orden: *m525pl7w33*

📝 *Detalle del Pedido:*
Cantidad | Producto                     | Precio  
1        | Shein Bikini Azul            | $150    
1        | Lavadora Semiautomática      | $150    
1        | Premier Sandwichera          | $150    
1        | Shein Bikini                 | $150    
1        | Televisor Full HD 43"        | $150    

💰 *Resumen de la Orden:*
Subtotal: $750  
Descuento: -$5  
Domicilio: $10  
Total: $755  

📦 *Información del Pedido:*
Nombre del Comprador: Yasniel Reyes
Nombre del Receptor: Yasniel Reyes 

📞 *Contacto:*
[Logo de la Empresa]
Puedes ver el detalle de tu pedido en el siguiente enlace: 
https://mercadoplus.digilysolutions.com/
        `.trim();

            const mensajeEncoded = encodeURIComponent(mensaje);
            const url = `https://wa.me/${numero}?text=${mensajeEncoded}`;

            window.open(url, '_blank');
        }
    </script>
@endsection
