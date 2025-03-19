<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mercado PLUS | login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/upload/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/remixicon.css') }}">
</head>
<body>

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
                                        <p>Inicia sesión para mantenerte conectado.</p>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" type="email" name="email" placeholder=" " required autofocus autocomplete="username" />
                                                        <label>Correo</label>
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="floating-label form-group">
                                                        <input class="floating-input form-control" name="password" type="password" placeholder=" " required autocomplete="current-password" />
                                                        <label>Contraseña</label>
                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="custom-control custom-checkbox mb-3">
                                                        <input type="checkbox" class="custom-control-input" name="remember" id="customCheck1">
                                                        <label class="custom-control-label control-label-1" for="customCheck1">Recuérdame</label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    @if (Route::has('password.request'))
                                                        <a href="{{ route('password.request') }}" class="text-primary float-right">¿Olvidaste tu Contraseña?</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                            <p class="mt-3">
                                                Crear una Cuenta <a href="{{ route('register') }}" class="text-primary">Regístrate</a>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-5 content-right">
                                    <img src="{{ asset('img/login/01.png') }}" class="img-fluid image-right" alt="">
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
