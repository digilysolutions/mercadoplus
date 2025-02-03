<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">Mercado PLUS</h5>
            <p class="mb-4">
                Mercado Plus, es un equipo en la Isla de la Juventud dedicado a ofrecer una amplia variedad de productos
                que satisfacen las necesidades y gustos de nuestra comunidad
            </p>
            <p class="mb-2">
                <i class="fa fa-map-marker-alt text-primary mr-3"></i>Micro 70,
                Nueva Gerona, Isla de la Juventud
            </p>
            <p class="mb-2">
                <i class="fa fa-envelope text-primary mr-3"></i>mercadoplus@digilysolutions.com
            </p>
            <p class="mb-0">
                <i class="fa fa-phone-alt text-primary mr-3 "></i><a class="text-primary" href="tel:5353947137">+53
                    53947137</a>
            </p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Categorías</h5>
                    <div class="d-flex flex-column justify-content-start" id="categoryListFooterContainer">
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Que tenemos</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Servicio al
                            Cliente</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Oferta del
                            Día</a>
                        <a class="text-secondary mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Tienda</a>
                        <a class="text-secondary mb-2" href="contact.html"><i
                                class="fa fa-angle-right mr-2"></i>Contacto</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">Catálogos</h5>
                    <p>Suscríbise para obtener el catálogo de productos</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Introduce su número de celular" />
                            <div class="input-group-append">
                                <button class="btn btn-primary">Obtener catálogo</button>
                            </div>
                        </div>
                    </form>
                    <h6 class="text-secondary text-uppercase mt-4 mb-3">Síguenos</h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, 0.1) !important">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">Mercado PLUS.</a> Todos los derechos reservados.
                <a class="text-primary" href="https://digilysolutions.com">LY Digi-Solutions</a>
            </p>
        </div>
    </div>
</div>
<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script type="module" src="{{ asset('includes/api.js') }}"></script>
<script type="module" src="{{ asset('includes/main.js') }}"></script>
<script src="{{ asset('includes/app/cart.js') }}"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/cart/productExchangeRate', // Cambia esta URL según corresponda a tu caso
            method: 'GET',
            success: function(response) {
                updateCartDisplay(response);
            },
            error: function(err) {
                console.error('Error al obtener el carrito:', err);
            } // Asegúrate de que esta llave tenga una coma antes, esta es la corrección
        });
        const cartContent = $('.top-cart-content');
        // Asegurarse de que el carrito no se muestre al abrir la página
        cartContent.hide(); // Asegura que el carrito esté oculto al cargar la página.

        // Muestra el carrito al pasar el cursor
        $('#cart-info, .fa-shopping-cart, .top-cart-content, .top-cart-block').hover(function(e) {
            if (cartItems.length != 0) {
                e.stopPropagation();
                cartContent.show();
            }
        });

        // Manejo del clic para mantener el carrito visible
        $('#cart-info, .fa-shopping-cart').click(function(e) {
            e.stopPropagation(); // Evitar que el clic cierre el carrito
            const cartContent = $('#cart-content');
            if (cartItems.length != 0) {
                // Alternar visibilidad
                if (cartContent.is(':visible')) {
                    cartContent.hide(); // Si ya está visible, entonces oculta
                } else {
                    cartContent.show(); // Si no, mostrarlo
                    // Actualiza el carrito al mostrar
                    cartContent.stop(true, true).fadeIn(100); // Mostrar el contenido del carrito
                }
            }
        });

        // Cierra el carrito si se hace clic en cualquier parte de la página fuera del carrito
        $(document).click(function() {
            if (cartContent.is(':visible')) {
                cartContent.fadeOut(200); // Oculta el carrito al hacer clic fuera
            }
        });
        //adicionar producto
        $(document).on('click', '.addcart', function() {
            console.log("sss");
            const productId = $(this).data('id');
            addProductCart(productId, 1);
        });

        $(document).on('click', '.increase-quantity', function() {
            const id = $(this).data('id');
            addCartItems(id);
        });

        $(document).on('click', '.remove-item', function() {
            const id = $(this).data('id');
            cartItems = cartItems.filter(item => item.id !== id);
            removeProductCart(null, id, 0);

        });

        $(document).on('click', '.decrease-quantity', function() {
            const id = $(this).data('id');
            const item = cartItems.find(item => item.id === id);
            if (item && item.quantity > 1) {
                item.quantity--;
            } else {
                cartItems = cartItems.filter(item => item.id !== id)
            }
            removeProductCart(null, id, 1);
        });
    });
</script>
