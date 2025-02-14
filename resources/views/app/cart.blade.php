@extends('layouts.app')
@section('header-title')
    Isla de la Juventud
@endsection
@section('css')
    <style>
        .button-group {
            position: relative;
            display: flex;
            align-items: stretch;
            width: 100%;
            flex-direction: row;
        }
    </style>
@endsection



@section('content')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-orange-mobile" href="/">Inicio</a>
                    <a class="breadcrumb-item text-orange-mobile" href="/shop">Tienda</a>
                    <span class="breadcrumb-item text-dark-mobile active ">Carrito de Compra</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table id="productsCart" class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Productos</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @php
                        $total = 0;
                        $subtotal = 0;
                    @endphp
                    @foreach ($products as $product)
                        <tr class="text-dark-mobile product-row">
                            <td class="text-left product-name"><img src="{{ $product['outstanding_image'] }}" alt=""
                                    style="width: 50px;">
                                {{ $product['name'] }}</td>
                            <td class="align-middle product-sale-price sale-price-{{ $product['id'] }} ">$
                                {{ $product['sale_price'] }}</td>
                            <td class="align-middle">
                                <div class="button-group quantity mr-3" style="width: 130px; ">
                                    <div class="input-group-btn">
                                        <button
                                            onclick="minusProductToCart(this,{{ $product['id'] }},{{ $product['quantity'] }})"
                                            data-id="{{ $product['id'] }}" class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input id="quantity-input-{{ $product['id'] }}" type="text"
                                        class="form-control bg-secondary border-0 text-center product-quantity-update"
                                        value="{{ $product['quantity'] }}"
                                        onchange="updateTotalPrice({{ $product['id'] }})">
                                    <div class="input-group-btn">
                                        <button onclick="addProductToCart({{ $product['id'] }})"
                                            class="btn btn-primary btn-plus ">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle total-price-row-{{ $product['id'] }} total-price-product">
                                ${{ $product['sale_price'] * $product['quantity'] }}</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"
                                    onclick="removeProductCart(this, {{ $product['id'] }},0) "><i
                                        class="fa fa-times"></i></button>
                            </td>
                        </tr>
                        @php
                            $subtotal += $product['sale_price'] * $product['quantity']; // Acumula el subtotal
                        @endphp
                    @endforeach

                    @php
                        $total = $subtotal; // Aquí se puede ajustar si necesitas sumar impuestos, envíos, etc.
                    @endphp
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">

            <div class="form-group">
                <h5>Domicilio </h5>

                <select id="delivery-zone-select" name="type" class="selectpicker form-control" data-style="py-0"
                    tabindex="null">
                    <option value="0">Seleccione la zona para el domicilio</option>
                    @foreach ($deliveryZones as $deliveryZone)
                        <option data-price="{{ $deliveryZone['price'] }}" value="{{ $deliveryZone['id'] }}">
                            {{ $deliveryZone['location']['name'] }}</option>
                    @endforeach


                </select>

            </div>



            <div class="bg-light p-30">
                <div class="border-bottom ">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 id="subtotal-price-product">${{ $subtotal }} </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Domicilio</h6>
                        <h6 class="font-weight-medium" id="price-delivery">$0</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 id="total-price-show-product">{{ $total }}</h5>
                    </div>
                    <a id="checkout-button" href="{{ route('product.checkout', ['iddomicilio' => 0]) }}"
                        class="btn btn-block btn-primary font-weight-bold my-3 py-3">Finalizar Compra</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection

@section('js')
    <script src="{{ asset('includes/app/cart.js') }}"></script>
    <script>

        function minusProductToCart(button, productId, quantity) {
            removeProductToCart(button, productId);

            $('total-price-row').text();

        }

        $(document).ready(function() {

            // Obtenemos el subtotal inicial (puedes cambiarlo por el valor actual que necesites)
            var subtotal = parseFloat("{{ $subtotal }}");
            var deliveryPrice = 0;

            $('.btn-plus, .btn-minus').on('click', function() {
                // Obtener el elemento más cercano al botón que fue clicado
                var quantityInput = $(this).closest('tr').find('.product-quantity-update');

                if (quantityInput.length === 0) {
                    console.error('No se encontró el elemento con la clase product-quantity-update');
                    return;
                }

                var priceProduct = $(this).closest('tr').find('.product-sale-price').text().replace('$', '')
                    .trim();
                var priceFloat = parseFloat(priceProduct);

                if (isNaN(priceFloat)) {
                    console.error('Precio no es un número');
                    return;
                }

                var quantity = quantityInput.val();
                if (quantity === '') {
                    quantity = 0;
                }
                quantity = parseFloat(quantity);

                // Obtener el elemento total-price-product
                var totalPriceProduct = $(this).closest('tr').find('.total-price-product');

                if (totalPriceProduct.length === 0) {
                    console.error('No se encontró el elemento con la clase total-price-product');
                    return;
                }

                var newPrice = priceFloat * quantity;
                // Actualizar el contenido del td con el nuevo precio formateado
                totalPriceProduct.html('$' + newPrice.toFixed(
                    2)); // Formatear a 2 decimales y agregar signo de dólar


            });


            // Manejar el cambio en el select
            $('#delivery-zone-select').change(function() {

                var selectedId = $(this).val();

                var url = "{{ route('product.checkout', ':id') }}".replace(':id', selectedId);
                $('#checkout-button').attr('href', url);
                $('#complete-purchase').attr('href', url);
                subtotal = $('#subtotal-price-product').text();
                subtotal = subtotal.replace('$', '').trim();

                // Obtener el precio de domicilios de la opción seleccionada
                var selectedOption = $(this).find("option:selected");
                var price = parseFloat(selectedOption.data('price'));

                // Verificamos que el precio no sea NaN (Not a Number) antes de realizar la suma
                if (!isNaN(price)) {
                    deliveryPrice = price; // Asignamos el precio al costo de domicilio
                } else {
                    deliveryPrice = 0; // Si no hay opción válida, aseguramos que sea 0
                }

                // Actualizamos el precio de domicilio en la vista
                $('.bg-light .d-flex.justify-content-between:contains("Domicilio") h6:last').text(
                    `$${deliveryPrice.toFixed(2)}`);

                // Calculamos el nuevo total
                var subtotalFloat = parseFloat(subtotal);
                if (!isNaN(subtotalFloat)) {
                    var total = subtotalFloat + deliveryPrice;

                    // Actualizamos el total en la vista
                    $('.bg-light .d-flex.justify-content-between:contains("Total") h5:last').text(
                        `$${total.toFixed(2)}`);
                } else {
                    console.error("No se pudo convertir subtotal a número.");
                }
            });

        });

        function upateTableCart() {

            $.ajax({
                url: '/cart/infoCart', // Asegúrate de que esta ruta retorne un JSON
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $.each(data.products, function(index, item) {
                        var quantity = $('#quantity-input-' + item.id).val();
                        var sale_price =item.sale_price;
                        var subtotal_price =sale_price* quantity;

                        $('.sale-price-' + item.id).text('$' + sale_price);
                        $('.total-price-row-' + item.id).text('$' + subtotal_price);
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error al actualizar el carrito:', textStatus, errorThrown);
                }
            });
        }
    </script>
@endsection
