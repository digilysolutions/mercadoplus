<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials-frontend.header')
     <link href="{{ asset('css/style-shop.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body>


    <div class="whatsapp-button">
        <a href="https://wa.me/5353947137?text=Hola%20Quiero%20saber%20más%20sobre%20tu%20servicio!" target="_blank">
            <img src="{{ asset('img/whatsapp.svg') }}" alt="WhatsApp" />
        </a>
    </div>
    <!-- Topbar Start -->
    @include('layouts.partials-frontend.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('layouts.partials-frontend.navbar')
    <!-- Navbar End -->

    @yield('content')


        <!-- Footer Start -->
        @include('layouts.partials-frontend.footer')
        <!-- Footer End -->

        @yield('js')

</body>

</html>
