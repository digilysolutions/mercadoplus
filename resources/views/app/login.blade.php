<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mercado Plus | Entrar</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/upload/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/remixicon.css') }}">
    <style>
        .separador {
            border: none;
            /* Eliminar el borde predeterminado */
            height: 2px;
            /* Altura de la línea */
            background-color: rgb(228, 228, 228);
            /* Color de la línea */
            margin-top: 20px;
            margin-bottom: 40px;
            /* Espacio arriba y abajo de la línea */
        }

        .divider {
            position: relative;
            margin: 20px 0;
            text-align: center;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 80%;
            height: 1px;
            background: #ccc;
            z-index: 0;
        }

        .divider::before {
            right: 10%;
            margin-right: 10px;
        }

        .divider::after {
            left: 2%;
            margin-left: 10px;
        }

        .divider span {
            position: relative;
            z-index: 1;
            background: #fff;
            /* Color de fondo para ocultar la línea */
            padding: 0 5px;
            /* Espaciado alrededor del texto */
        }
    </style>
</head>

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">
                                            <h2 class="mb-2">Iniciar Sesión</h2>
                                            <p>Inicia sesión para mantenerte conectado.

                                            </p>
                                            <a href="{{ route('login.google') }}"
                                                class="d-flex align-items-center mb-4 card-total-sale text-center">
                                                <div class="icon ">
                                                    <img src="{{ asset('img/google.png') }}" class="img-fluid"
                                                        alt="image">
                                                </div>

                                                <h3 class="mt-2 ml-2">Google</h4>

                                            </a>
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" type="text"
                                                                name="email" placeholder=" ">
                                                            <label>Número de celular</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input class="floating-input form-control" name="password"
                                                                type="password" placeholder=" ">
                                                            <label>Contraseña</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                name="remember" id="customCheck1">
                                                            <label class="custom-control-label control-label-1"
                                                                for="customCheck1">Recuérdame</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="auth-recoverpw.html"
                                                            class="text-primary float-right">¿Olvidaste tu
                                                            Contraseña?</a>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                                <p class="mt-3">
                                                    Crear una Cuenta <a href="auth-sign-up.html"
                                                        class="text-primary">Regístrate</a>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="{{ asset('img/login/01.png') }}" class="img-fluid image-right"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Backend Bundle JavaScript -->
    <script src="{{ asset('js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('admin/js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('admin/js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('admin/js/chart-custom.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
