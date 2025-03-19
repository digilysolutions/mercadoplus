@extends('layouts.app-admin')

@section('title-header-admin')
    {{ $product->name ?? __('Show') . ' ' . __('Product') }}
@endsection
@section('css')
    <style>
        .estrella {
            font-size: 30px;
            color: #d45805;
            transition: color 0.3s, transform 0.3s;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .estrella.pintada {
            color: #d45805;
            /* Color cuando está pintada */
        }

        .estrella.mitad {
            background: linear-gradient(to right, #d45805 50%, gray 50%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            width: 30px;
            overflow: hidden;
        }

        .double-strikethrough {
            text-decoration-line: line-through;
            /* Tachar */
            text-decoration-style: double;
            /* Estilo doble */
            text-decoration-color: rgb(134, 134, 134);
            /* Color tachado */
            font-size: 16px;
        }
    </style>

    <!-- Link de Slick CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />

    <!-- Link de Slick Theme CSS (opcional) -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- jQuery (Slick depende de jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script de Slick -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
@endsection
@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card car-transparent">
                    <div class="card-body p-0">

                        <div class="profile-image position-relative">
                            <img src="{{ asset('img/upload/show-product.webp') }}" class="img-fluid rounded w-100"
                                alt="profile-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-sm-0 px-3">
            <div class="col-lg-4 ">

                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="profile-img position-relative">
                                <img src="{{ $product->outstanding_image }}" class="img-fluid rounded s"
                                    alt="profile-image">
                            </div>

                        </div>
                        <small> <a style="float: right" href="{{ route('products.show-list', $product->id) }}">Mostrar otra
                                vista</a></small>
                        <div class="ml-3">
                            <h4 class="mb-1">{{ $product->name }} </h4>


                            @if (isset($product->sku) && $product->sku != null)
                                <p class="mb-2">sku: {{ $product->sku }}</p>
                            @endif
                        </div>
                        <p>

                        <div class="estrellas align-items-center justify-content-center text-center" id="estrellas">
                            @for ($index = 0; $index < $product->averageRating; $index++)
                                <span class="estrella" data-valor="{{ $index }}">☆</span>
                            @endfor


                        </div>
                        </p>
                        @if (isset($product->description_small) && $product->description_small != null)
                            <p>
                                {{ $product->description_small }}
                            </p>
                        @endif

                        <p><strong>Categoría:</strong>
                            @foreach ($categoryCounts as $categoryCount)
                                <a href="{{ route('product-categories.show', $categoryCount['id']) }}"
                                    class="btn mb-1 bg-primary-light">
                                    {{ $categoryCount['category'] }}
                                    <span class="badge badge-primary ml-5">{{ $categoryCount['product_count'] }}
                                        productos</span>
                                </a>
                            @endforeach
                        </p>
                        <ul class="list-inline p-0 m-0">

                            @if (isset($product->code_currency_default) && $product->code_currency_default !== null)
                                <li class="mb-2">
                                    <div class="d-flex align-items-center">

                                        <p class="mb-0"><i class="ri-arrow-right-s-line"></i><strong>Moneda:</strong>
                                            @foreach ($product->categories as $category)
                                                <span
                                                    class="mt-2 badge badge-primary">{{ $category->code_currency_default }}
                                                </span>
                                            @endforeach
                                        </p>
                                    </div>
                                </li>
                            @endif
                            @if (isset($product->brand) && $product->brand !== null)
                                <li class="mb-2">
                                    <div class="d-flex align-items-center">

                                        <p class="mb-0"><i class="ri-arrow-right-s-line"></i><strong>Marca:</strong>
                                            {{ $product->brand->name }}</p>
                                    </div>
                                </li>
                            @endif

                            @if (isset($product->modelProduct) && $product->modelProduct !== null)
                                <li class="mb-2">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0"><i class="ri-arrow-right-s-line"></i><strong>Modelo:</strong>
                                            {{ $product->modelProduct->name }}</p>
                                    </div>
                                </li>
                            @endif
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0"><i class="ri-arrow-right-s-line"></i><strong>Unidad:</strong>
                                        {{ $product->unit->name ?? 'No tiene unidad asignada.' }}</p>
                                </div>
                            </li>
                            <li class="mb-2">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0"><i class="ri-arrow-right-s-line"></i><strong>Creado:</strong>
                                        {{ $product->created_at ?? '' }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card card-block card-stretch card-height">
                    <div class="card-body">
                        <ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab" role="tablist">
                            @if (isset($product->description) && $product->description != null)
                                <li class="nav-item">
                                    <a id="view-btn" class="nav-link show active" data-toggle="pill" href="#profile5"
                                        role="tab" aria-selected="false">Descripción</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#profile2" role="tab"
                                    aria-selected="false">Información</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#profile3" role="tab"
                                    aria-selected="false">Comentarios</a>
                            </li>



                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#profile4" role="tab"
                                    aria-selected="false">Detalles</a>
                            </li>


                        </ul>
                        <div class="profile-content tab-content ">
                            <div id="profile5" class="tab-pane fade active show">
                                <p>{{ $product->description }}</p>

                            </div>
                            <div id="profile2" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card card-block card-stretch">
                                            <div class="card-body p-3">
                                                <div class="row align-items-center text-center py-2">
                                                    <div class="profile-info col-xl-4 col-lg-6">
                                                        <div class="profile-icon icon m-auto rounded bg-warning">
                                                            <i class="ri-shopping-bag-line"></i>
                                                            <svg class="svg-icon" width="22" height="22"
                                                                viewBox="0 0 36 48" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">

                                                            </svg>
                                                        </div>


                                                        <h5 class="mb-2 mt-3 icon-text-warning">
                                                            ${{ $product->purchase_price ?? 0 }}</h5>

                                                        <p class="mb-0">Compra</p>
                                                    </div>
                                                    <div class="profile-info col-xl-4 col-lg-6">
                                                        <div class="profile-icon icon m-auto rounded bg-info">
                                                            <i class="ri-price-tag-line"></i>
                                                            <svg class="svg-icon" width="22" height="22"
                                                                viewBox="0 0 60 48" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">

                                                            </svg>
                                                        </div>

                                                        @if ($product->currentPrice > 0)
                                                            <h5 class="mb-2 mt-3 icon-text-info">
                                                                ${{ $product->discounted_price }}
                                                                <span
                                                                    class="double-strikethrough  text-muted">${{ $product->sale_price }}</span>

                                                            </h5>
                                                        @else
                                                            <h5 class="mb-2 mt-3 icon-text-info">
                                                                ${{ $product->sale_price ?? 0 }}</h5>
                                                        @endif
                                                        <p class="mb-0">Venta</p>
                                                    </div>
                                                    <div class="profile-info col-xl-4 col-lg-6">
                                                        <div class="profile-icon icon m-auto rounded bg-danger">
                                                            <i class="ri-wallet-3-line"></i>
                                                            <svg class="svg-icon" width="22" height="22"
                                                                viewBox="0 0 48 48" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">

                                                            </svg>
                                                        </div>
                                                        <h5 class="mb-2 mt-3 icon-text-danger">
                                                            ${{ isset($product->sale_price) && isset($product->purchase_price) && $product->sale_price - $product->purchase_price > 0 ? $product->sale_price - $product->purchase_price : 0 }}
                                                        </h5>
                                                        <p class="mb-0">Ganancia</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="card card-block card-stretch card-height">
                                                    <div
                                                        class="card-header d-flex align-items-center justify-content-between">
                                                        <div class="header-title">
                                                            <h4 class="card-title">Imágenes</h4>
                                                        </div>

                                                    </div>
                                                    <div class="card-body">
                                                        @if (isset($product->images) && $product->images != null)
                                                            <ul class="list-unstyled row top-product mb-0">
                                                                @foreach ($product->images as $image)
                                                                    <li class="col-lg-3">
                                                                        <div
                                                                            class="card card-block card-stretch card-height mb-0">
                                                                            <div class="card-body">
                                                                                <div class=" rounded">
                                                                                    <img src="{{ $image->path_image }}"
                                                                                        class="style-img img-fluid m-auto p-3"
                                                                                        alt="image">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                No tiene galería de imágenes
                                                        @endif


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div id="profile3" class="tab-pane fade">
                                <div
                                    class="profile-line m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0 w-100">
                                        @foreach (collect($product->reviews)->take(3) as $review)
                                            <li>
                                                <div class="row align-items-top">
                                                    <div class="col-md-3">
                                                        <h6 class="mb-2">{{ $review->date }}</h6>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="media profile-media align-items-top">
                                                            <div class="profile-dots border-primary mt-1"></div>
                                                            <div class="ml-4">
                                                                <h6 class=" mb-1">
                                                                    {{ substr($review->comment, 0, 40) }}...</h6>
                                                                <i class="mb-0 font-size-14">Por:
                                                                    {{ $review->writer->first_name }}
                                                                    {{ $review->writerlast_name }}
                                                                    @if ($review->product_id == null)
                                                                        <label
                                                                            class="mt-2 badge border border-primary text-primary mt-2">
                                                                            Negocio</label>
                                                                    @else
                                                                        <label
                                                                            class="mt-2 badge border border-secondary text-secondary mt-2">
                                                                            Producto</label>
                                                                    @endif
                                                                </i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach


                                    </ul>

                                </div>
                                <a class="right-ic btn btn-primary btn-block position-relative p-2"
                                    href="{{ route('reviews.index') }}" role="button">
                                    Ver Todos
                                </a>
                            </div>
                            <div id="profile4" class="tab-pane fade">
                                <div class="row">
                                    @if (isset($product->tags) && $product->tags != null)
                                        <div class="col-lg-6 ">
                                            <div class="ml-3">
                                                <h4 class="mb-1">Etiquetas</h4>
                                                @foreach ($product->tags as $tag)
                                                    <span class="mt-2 badge badge-primary">{{ $tag->name }} </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if ($groupedTerms != null)
                                        <div class="col-lg-6 ">
                                            <div class="ml-3">
                                                <h4 class="mb-1">Términos</h4>
                                                @foreach ($groupedTerms as $attribute => $terms)
                                                    <strong class="ml-3">{{ $attribute }}:</strong>
                                                    @foreach ($terms as $term)
                                                        <span class="mt-2 badge badge-primary"> {{ $term }}
                                                        </span>
                                                    @endforeach
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if (isset($product->currencies) && $product->currencies != null)
                                        <div class="col-lg-6 ">
                                            <div class="ml-3">
                                                <h4 class="mb-1">Monedas</h4>
                                                @foreach ($product->categories as $category)
                                                    <span
                                                        class="mt-2 badge badge-primary">{{ $category->code_currency_default }}
                                                    </span>
                                                @endforeach
                                            </div>

                                        </div>
                                    @endif
                                    @if (isset($product->enable_delivery) && $product->enable_delivery != null)
                                        <div class="col-lg-6 ">
                                            <div class="ml-3">
                                                <h4 class="mt-5">Domicilio <span>
                                                        @if ($product->enable_delivery)
                                                            Si
                                                        @else
                                                            No
                                                        @endif
                                                    </span> </h4>

                                                @foreach ($product->deliveryZones as $deliveryZone)
                                                    <button type="button" class="btn mb-1 bg-primary-light">
                                                        {{ $deliveryZone->location->name }} <span
                                                            class="badge badge-primary ml-5">${{ $deliveryZone->price }}</span>
                                                    </button>
                                                @endforeach

                                            </div>
                                        </div>

                                        @if ($product->currentPrice > 0)
                                            <div class="col-lg-6 ">
                                                <div class="ml-3 pt-5">
                                                    <h4 class="mb-1">Pecio Rebajado</h4>
                                                    <div class=" mb-1">
                                                        <strong>Desde:</strong>{{ \Carbon\Carbon::parse($product->start_date_discounted_price)->format('d/m/Y') }}
                                                    </div>
                                                    <div class=" mb-1"><strong>Hasta:</strong>
                                                        {{ \Carbon\Carbon::parse($product->end_date_discounted_price)->format('d/m/Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function pintarEstrellas(puntuacion) {
            const estrellas = document.querySelectorAll('#estrellas .estrella');
            estrellas.forEach(estrella => {
                const valor = parseFloat(estrella.getAttribute('data-valor'));
                estrella.classList.remove('pintada', 'mitad'); // Limpiar clases anteriores

                if (valor <= puntuacion) {
                    estrella.classList.add('pintada');
                } else if (valor - 0.5 === puntuacion) {
                    estrella.classList.add('mitad');
                }
            });
        }

        pintarEstrellas(puntuacionActual);
    </script>
@endsection
