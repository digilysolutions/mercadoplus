@section('css')

@endsection
 <div class="container-fluid">
    <div class="row bg-secondary py-1 px-xl-5">
      <div class="col-lg-6 d-none d-lg-block">
        <div class="d-inline-flex align-items-center h-100">

          <a class="text-body mr-3" href="">FAQs</a>
        </div>
      </div>
      <div class="col-lg-6  text-right">
        <div class="d-inline-flex align-items-center">
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-sm btn-light dropdown-toggle"
              data-toggle="dropdown">
              <i class="fas fa-user icon-header"></i>

            </button>


            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" type="button">Entrar</button>
              <button class="dropdown-item" type="button">Registrarse</button>
            </div>
          </div>

          <div class="btn-group mx-2">
            <div class="btn-group mx-2">
          <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown"><i class="fas fa-money-bill icon-header"></i> <strong class="selectedCurrency">{{ $currency }}</strong></button>
          <div class="dropdown-menu dropdown-menu-right">
            @foreach ($countryCurrencies as $countryCurrency)
              <button class="dropdown-item" type="button" onclick="changeCurrency('{{ $countryCurrency['currency']['code'] }}')"><strong>{{ $countryCurrency['currency']['code'] }}</strong></button>
              @endforeach
      </div>

          </div>



          </div>
        </div>
        <div class="col-lg-12 d-block d-lg-none  text-center">

            <div class="top-cart-block ">
                <div class="top-cart-info" id="cart-info">
                    <a href="javascript:void(0);" class="text-secundary top-cart-info-count" id="item-count">0 productos</a>
                    <a href="javascript:void(0);" class="top-cart-info-value" id="total-price">$0.00</a>
                </div>


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
    </div>
    <div
      class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
      <div class="col-lg-4">
        <a href="/" class="text-decoration-none">
            <span class="h1 text-uppercase text-primary bg-dark px-2"
            >Mercado</span
          >
          <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1"
            >PLUS</span
          >
        </a>
      </div>
      <div class="col-lg-4 col-6 text-left">
        <form action="">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Buscar Productos" />
            <div class="input-group-append">
              <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
              </span>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4 col-6 text-right">
        <p class="m-0">Servicio al Cliente</p>
        <h5 class="m-0"><a href="tel:5353947137"><i class="fas fa-mobile"></i> +53 53947137</a></h5>
      </div>
    </div>
  </div>
