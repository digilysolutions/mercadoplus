
<div class="container-fluid bg-dark mb-30">
    <div class="row px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
          <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px" aria-expanded="true">
            <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Todos</h6>
            <i class="fa fa-angle-down text-dark"></i>
          </a>
          <nav class="position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light collapse" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
            <div class="navbar-nav w-100">

              @foreach ( $menuCategories as $category)
              <a href="{{ url('/products-categories/' . $category['id']) }}" class="nav-item nav-link">{{ $category['name'] }}</a>
              @endforeach


            </div>
          </nav>
        </div>
        <div class="col-lg-8">
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
            <a href="index.html" class="text-decoration-none d-block d-lg-none">
              <span class="h1 text-uppercase text-dark bg-light-mobile px-2">MERCADO</span>
              <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">+</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
              <div class="navbar-nav mr-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Ofertas del Día</a>
                <a href="shop.html" class="nav-item nav-link">Servicio al Cliente</a>
                <a href="shop.html" class="nav-item nav-link"> Tienda</a>

                <a href="contact.html" class="nav-item nav-link">Contacto</a>
              </div>

              <div class="top-cart-block">
                <div class="top-cart-info" id="cart-info">
                    <a href="javascript:void(0);" class="text-secundary top-cart-info-count" id="item-count">0 productos</a>
                    <a href="javascript:void(0);" class="top-cart-info-value" id="total-price">$0.00</a>
                </div>
                <i class="fa fa-shopping-cart mt-3"></i>

                <div class="top-cart-content-wrapper" id="cart-content" style="display: none;">
                  <div class="top-cart-content">
                      <div class="slimScrollDiv" style="position: relative; overflow: hidden; height: 100%;">
                          <ul class="scroller" id="cart-items-list" style="height: 100%; overflow: auto;">
                              <!-- Los items del carrito se añadirán aquí desde jQuery -->
                          </ul>
                      </div>
                      <div class="text-right">
                          <a href="{{ route('cart.showCart') }}" class="btn btn-info">Ver Pedido</a>
                          <a id="complete-purchase" href="{{ route('product.checkout', ['iddomicilio' => 0]) }}" class="btn btn-primary">Finalizar compra</a>
                      </div>
                  </div>
              </div>
            </div>
            </div>
          </nav>
        </div>
      </div>
</div>
