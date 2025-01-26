<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                <i class="ri-menu-line wrapper-menu"></i>
                <a href="backend/index.html" class="header-logo">
                    <img src="{{ $business_logo }}" class="img-fluid rounded-normal" alt="logo">
                    <h5 class="logo-title ml-3">{{ $business_name }}</h5>

                </a>
            </div>

            <div class="d-flex align-items-center">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">
                        <li class="nav-item nav-icon dropdown">
                            <a type="button" class=" mr-4 btn btn-link search-toggle dropdown-toggle" id="dropdownMenuButton2"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ri-add-line"></i>Añadir</a>

                            <div class="iq-sub-dropdown dropdown-menu position-left" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="px-3 pt-0 pb-0 sub-card">
                                            <a href="#" class="btn-link mt-2">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="media-body ml-3">
                                                        <div class="align-items-center">
                                                            <h6 class="mb-0">Productos</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#"  data-toggle="modal" data-target="#new-category" class="btn-link mt-2">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="media-body ml-3">
                                                        <div class="align-items-center">
                                                            <h6 class="mb-0">Categoría</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#"  data-toggle="modal" data-target="#new-unit" class="btn-link mt-2">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="media-body ml-3">
                                                        <div class="align-items-center">
                                                            <h6 class="mb-0">Unidad</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="btn-link mt-2">
                                                <div class="media align-items-center cust-card py-3 ">
                                                    <div class="media-body ml-3">
                                                        <div class=" align-items-center">
                                                            <h6 class="mb-0">Orden de Compra</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="btn-link mt-2">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="media-body ml-3">
                                                        <div class="align-items-center">
                                                            <h6 class="mb-0">Localidad</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-pie-chart-line"></i> Online: 3

                            </a>

                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-shopping-cart-line"></i>
                                <span class="badge badge-primary badge-card">5</span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu position-left" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="cust-title p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">Ventas del día</h5>
                                                <a class="badge badge-primary badge-card" href="#">3</a>
                                            </div>
                                        </div>
                                        <div class="px-3 pt-0 pb-0 sub-card">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('admin/images/user/01.jpg') }}" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Emma Watson</h6>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('admin/images/user/02.jpg') }}" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Ashlynn Franci</h6>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small"
                                                            src="{{ asset('admin/images/user/03.jpg') }}" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Kianna Carder</h6>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                            role="button">
                                            Ver Todos
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item nav-icon search-content">
                            <a href="#" class="search-toggle rounded" id="dropdownSearch" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ri-search-line"></i>
                            </a>
                            <div class="iq-search-bar iq-sub-dropdown dropdown-menu " aria-labelledby="dropdownSearch">
                                <form action="#" class="searchbox p-2">
                                    <div class="form-group mb-0 position-relative">
                                        <input type="text" class="text search-input font-size-12"
                                            placeholder="type here to search...">
                                        <a href="#" class="search-link"><i class="las la-search"></i></a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-user-line"></i>
                                <span class="badge badge-primary badge-card">3</span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu position-left" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="cust-title p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h5 class="mb-0">Nuevos Clientes</h5>
                                                <a class="badge badge-primary badge-card" href="#">3</a>
                                            </div>
                                        </div>
                                        <div class="px-3 pt-0 pb-0 sub-card">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">

                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Emma Watson</h6>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">

                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Ashlynn Franci</h6>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3">

                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h6 class="mb-0">Kianna Carder</h6>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="right-ic btn btn-primary btn-block position-relative p-2" href="#"
                                            role="button">
                                            Ver todos
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="d-flex align-items-center">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-list align-items-center">

                        <li>

                                <button type="button" class="mt-2 mr-4 btn btn-secondary"><i class="ri-bill-fill"></i>POS</button>
                        </li>

                        <li class="nav-item nav-icon dropdown caption-content mr-4 ml-4">
                            <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton4"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('admin/images/user/1.png') }}" class="img-fluid rounded" alt="user">
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 text-center">
                                        <div class="media-body profile-detail text-center">
                                            <img src="{{ asset('admin/images/page-img/profile-bg.jpg') }}" alt="profile-bg"
                                                class="rounded-top img-fluid mb-4">
                                            <img src="{{ asset('admin/images/user/1.png') }}" alt="profile-img"
                                                class="rounded profile-img img-fluid avatar-70">
                                        </div>
                                        <div class="p-3">
                                            <h5 class="mb-1">JoanDuo@property.com</h5>
                                            <p class="mb-0">Since 10 march, 2020</p>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <a href="app/user-profile.html" class="btn border mr-2">Profile</a>
                                                <a href="auth-sign-in.html" class="btn border">Sign Out</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    </div>

     <!---- Modl para Adicinar la categoria -->
    
   


