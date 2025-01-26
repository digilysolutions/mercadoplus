<meta charset="utf-8" />
<title>Mercado PLUS - @yield('header-title')</title>

<!-- Favicon -->
<link href="{{ asset('img/upload/favicon.png') }}" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

<!-- Libraries Stylesheet -->
<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('css/style.css') }}" rel="stylesheet" />
<style>
    

    .slimScrollDiv {
        position: relative;
        height: 250px;
        /* Altura fija para el área de desplazamiento */
        overflow: hidden;
        /* Oculta el desbordamiento */
    }

    .scroller {
        height: 100%;
        /* Asegura que ocupe todo el espacio disponible */
        overflow-y: auto;
        /* Permite el desplazamiento vertical */
    }

    .slimeScrollBar,
    .slimScrollRail {
        display: block;
        /* Asegúrate de que estas barras se muestren */
    }

    .text-right {
        text-align: right;
        /* Alinea el texto a la derecha */
    }
</style>
