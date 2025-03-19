<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="/" class="header-logo">
            <img src="{{ asset('img/logo-mplus.png') }}" class="img-fluid rounded-normal light-logo"
                alt="logo">
            <h5 class="logo-title light-logo ml-3"></h5>

        </a>

        <div class="iq-menu-bt-sidebar ml-0">
            <i class="las la-bars wrapper-menu"></i>

        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="">
                    <a href="{{ route('admin.dashboard') }}" class="svg-icon">
                        <svg class="svg-icon" id="icon-desktop" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="15" rx="2" ry="2"></rect>
                            <line x1="8" y1="20" x2="16" y2="20"></line>
                            <line x1="12" y1="20" x2="12" y2="23"></line>
                        </svg>
                        <span class="ml-4">Escritorio</span>
                    </a>
                </li>
                <li class="{{ request()->is('products*') ? 'active' : '' }}">
                    <a href="#product" class="collapsed" data-toggle="collapse"
                        aria-expanded="{{ request()->is('products*') ? 'true' : 'false' }}">
                        <svg class="svg-icon" id="p-dash14" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        <span class="ml-4">Productos</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="product" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('admin/products*') ? 'active' : '' }}">
                            <a href="{{ route('products.index') }}" class="submenu-link">
                                <i class="las la-minus"></i><span>Todos los productos</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/products/create') ? 'active' : '' }}">
                            <a href="{{ route('products.create') }}">
                                <i class="las la-minus"></i><span>Añadir nuevo</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/product-categories*') ? 'active' : '' }}">
                            <a href="{{ route('product-categories.index') }}" class="submenu-link">
                                <i class="las la-minus"></i><span>Categorías</span>
                            </a>

                        </li>
                        <li class="{{ request()->is('admin/tags*') ? 'active' : '' }}">
                            <a href="{{ route('tags.index') }}" class="submenu-link">
                                <i class="las la-minus"></i><span>Etiquetas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/attributes-models*') ? 'active' : '' }}">
                            <a href="{{ route('attributes-models.index') }}">
                                <i class="las la-minus"></i><span>Atributos</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/terms*') ? 'active' : '' }}">
                            <a href="{{ route('terms.index') }}">
                                <i class="las la-minus"></i><span>Términos</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/brands*') ? 'active' : '' }}">
                            <a href="{{ route('brands.index') }}" class="submenu-link">
                                <i class="las la-minus"></i><span>Marcas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/model-products*') ? 'active' : '' }}">
                            <a href="{{ route('model-products.index') }}" class="submenu-link">
                                <i class="las la-minus"></i><span>Modelos</span>
                            </a>
                        </li>


                        <li class="{{ request()->is('admin/units*') ? 'active' : '' }}">
                            <a href="{{ route('units.index') }}" class="submenu-link">
                                <i class="las la-minus"></i><span>Unidades</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/unit-bases*') ? 'active' : '' }}">
                            <a href="{{ route('unit-bases.index') }}">
                                <i class="las la-minus"></i><span>Unidades Base</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/ratings*') ? 'active' : '' }}">
                            <a href="{{ route('ratings.index') }}">
                                <i class="las la-minus"></i><span>Valoraciones</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="{{ request()->is('admin/reviews*') ? 'active' : '' }}">
                    <a href="{{ route('reviews.index') }}">
                        <svg class="svg-icon iq-comment" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="-5 0 30 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15c0 2-1 3-3 3H6l-4 4v-4H3c-2 0-3-1-3-3V6c0-2 1-3 3-3h15c2 0 3 1 3 3v9z">
                            </path>
                        </svg>
                        <span class="ml-4">Comentarios</span>
                    </a>
                </li>
                <li class="{{ request()->is('admin/orders*') ? 'active' : '' }}">
                    <a href="#" class="collapsed" data-toggle="collapse" aria-expanded="false">
                    <svg class="svg-icon" id="p-dash2" width="20" height="20"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <span class="ml-4">Ventas</span>
                    </a>
                </li>

                <li class=" ">
                    <a href="#ajuste" class="collapsed" data-toggle="collapse" aria-expanded="false">

                        <svg class="svg-icon" id="p-dash19" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z">
                            </path>
                        </svg>
                        <span class="ml-4">Ajustes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="ajuste" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li class="{{ request()->is('admin/businesses*') ? 'active' : '' }}">
                            <a href="{{ route('businesses.index') }}">
                                <i class="las la-minus"></i><span>Mi Negocio</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/locations*') ? 'active' : '' }}">
                            <a href="{{ route('locations.index') }}">
                                <i class="las la-minus"></i><span>Zonas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/currencies*') ? 'active' : '' }}">
                            <a href="{{ route('currencies.index') }}">

                                <i class="las la-minus"></i><span>Monedas</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('admin/country-currencies*') ? 'active' : '' }}">
                            <a href="{{ route('country-currencies.index') }}">

                                <i class="las la-minus"></i><span>Tasa de Cambio</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" ">
                    <a href="#return" class="collapsed" data-toggle="collapse" aria-expanded="false">

                        <svg class="svg-icon" id="p-dash6" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="4 14 10 14 10 20"></polyline>
                            <polyline points="20 10 14 10 14 4"></polyline>
                            <line x1="14" y1="10" x2="21" y2="3"></line>
                            <line x1="3" y1="21" x2="10" y2="14"></line>
                        </svg>
                        <span class="ml-4">Mensajería</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="return" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('admin/delivery-zones*') ? 'active' : '' }}">
                            <a href="{{ route('delivery-zones.index') }}">
                                <i class="las la-minus"></i><span>Zona</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="{{ request()->is('admin/people') ? 'active' : '' }}">
                    <a href="{{ route('people.index') }}">
                        <svg class="svg-icon" id="p-dash8" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="ml-4">Personas</span>
                    </a>
                </li>


                <li class="">
                    <a href="backend/page-report.html" class="">
                        <svg class="svg-icon" id="p-dash7" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span class="ml-4">Reportes</span>
                    </a>
                    <ul id="reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    </ul>
                </li>
                <li class=" ">
                    <a href="#sale" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" id="p-dash4" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                        </svg>
                        <span class="ml-4">Estadísticas</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="sale" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="">
                            <a href="backend/page-list-sale.html">
                                <i class="las la-minus"></i><span>List Sale</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="backend/page-add-sale.html">
                                <i class="las la-minus"></i><span>Add Sale</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class=" ">

                        <form method="POST" action="/logout">
                            @csrf
                            <button class="btn btn-outline-link rounded-pill mt-2" type="submit"><i class="ri-lock-fill"></i>Cerrar
                                Sesión</button>

                        </form>


                </li>
            </ul>
        </nav>

        <div class="p-3"></div>
    </div>


</div>
