


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Mercado PLUS | Registrarse</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
      <link rel="stylesheet" href="{{ asset('css/backend-plugin.min.css') }} ">
      <link rel="stylesheet" href="{{ asset('css/backend.css?v=1.0.0') }} ">
      <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">  </head>
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
                                 <h2 class="mb-2">Registrarse</h2>
                                 <p>Crea tu cuenta.</p>
                                 <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="name" class="floating-input form-control @error('name') is-invalid @enderror" type="text" placeholder=" " value="{{old('name')}}" required autofocus autocomplete="name">
                                             <label>Nombre  *</label>
                                             <div class="help-block with-errors"></div>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="lastname" class="floating-input form-control @error('lastname') is-invalid @enderror" type="text" placeholder=" " required>
                                             <label>Apellidos *</label>
                                             <div class="help-block with-errors"></div>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="email" class="floating-input form-control @error('email') is-invalid @enderror" type="email" placeholder=" " required>
                                             <label>Correo *</label>
                                             <div class="help-block with-errors"></div>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="phone" class="floating-input form-control @error('phone') is-invalid @enderror" type="text" placeholder=" ">
                                             <label>Teléfono</label>
                                             <div class="help-block with-errors"></div>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="password" class="floating-input form-control @error('password') is-invalid @enderror" type="password" placeholder=" " required>
                                             <label>Contraseña *</label>
                                             <div class="help-block with-errors"></div>

                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input name="password_confirmation" class="floating-input form-control @error('password_confirmation') is-invalid @enderror" type="password" placeholder=" " required>
                                             <label>Confirmar Contraseña *</label>
                                             <div class="help-block with-errors"></div>

                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Registrarse</button>
                                    <p class="mt-3">
                                        ¿Ya tienes una cuenta?" <a href="{{ route('login') }}" class="text-primary">Iniciar sesión</a>
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
    <script src=" {{ asset('js/backend-bundle.min.js') }}"></script>

    <!-- Table Treeview JavaScript -->
    <script src="{{ asset('js/table-treeview.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script src="{{ asset('js/customizer.js') }}"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="{{ asset('js/chart-custom.js') }}"></script>

    <!-- app JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
