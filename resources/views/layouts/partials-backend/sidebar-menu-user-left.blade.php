<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="/" class="header-logo">
            <img src="{{ asset('img/23.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
            <h5 class="logo-title light-logo ml-3">Plataforma</h5>

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
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="3" x2="9" y2="21"></line>
                          </svg>
                        <span class="ml-4">Escritorio</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="#membresia" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                          </svg>
                        <span class="ml-4">Membresía</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>


                    <ul id="membresia" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        @if ( $user->person->student->membership!==null)


                        <li class="{{ request()->is('memberships*') ? 'active' : '' }}">
                            <a href="{{ route('memberships.show', $user->person->student->membership_id) }}">
                                <i class="las la-minus"></i><span>Detalles de Membresía</span>
                            </a>

                        </li>
                        @endif
                        <li class="{{ request()->is('study-centers/*') ? 'active' : '' }}">
                            <a href="{{ route('study_centers.remembership', $user->person->student->id) }}">
                                <i class="las la-minus"></i><span>Renovar Membresía</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('membership-histories*') ? 'active' : '' }}">
                            <a href="{{ route('membership_histories_user', $user->id) }}">
                                <i class="las la-minus"></i><span>Histórico de membresía</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class=" ">
                    <a href="#tutores" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                          </svg>
                        <span class="ml-4">Tutores</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="tutores" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">

                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Solicitar Tutor</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('tutors*') ? 'active' : '' }}">
                            <a href="{{ route('tutors.indexToStudyCenter', $user->person->student->id) }}">
                                <i class="las la-minus"></i><span>Tutores Asignados  </span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="">
                    <a href="#items" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                          </svg>
                        <span class="ml-4">Resolver Items</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="items" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Exámenes Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="#examenes" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="2" ry="2"></rect>
                            <path d="M16 2v4a2 2 0 0 0 2 2H22"></path>
                            <line x1="13" y1="11" x2="22" y2="11"></line>
                          </svg>
                        <span class="ml-4">Realizar Exámenes</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="examenes" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Prueba PISA</span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                            <a href="{{ route('study-centers.index') }}">
                                <i class="las la-minus"></i><span>Exámenes Diagnóstico </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" ">
                    <a href="#progreso" class="collapsed" data-toggle="collapse" aria-expanded="false">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 2a10 10 0 0 1 0 20"></path>
                            <path d="M12 6v6l4 2"></path>
                          </svg>
                        <span class="ml-4">Progreso en Plataforma</span>
                        <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="10 15 15 20 20 15"></polyline>
                            <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                        </svg>
                    </a>
                    <ul id="progreso" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li>
                            <a href="#items_resueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                <span class="ml-4">ITEMS Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="items_resueltos" class="iq-submenu collapse" data-parent="#progreso">
                                <li class="{{ request()->is('items*') ? 'active' : '' }}">
                                    <a href="{{ route('items.index', ['name' => 'Resueltos: Prueba PISa']) }}">
                                        <i class="las la-minus"></i><span>Prueba PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('items*') ? 'active' : '' }}">
                                    <a href="{{ route('items.index', ['name' => 'Resueltos: Prueba Nacionales']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('items*') ? 'active' : '' }}">
                                    <a href="{{ route('items.index', ['name' => 'Resueltos: Pruebas Diagnóstico']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#items_noresueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                  </svg>
                                <span class="ml-4">ITEMS No Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="items_noresueltos" class="iq-submenu collapse" data-parent="#progreso">
                                <li class="{{ request()->is('items/No*') ? 'active' : '' }}">
                                    <a href="{{ route('items.index', ['name' => 'No Resueltos: Prueba PISA']) }}}">
                                        <i class="las la-minus"></i><span>Pruebas PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('items/No*') ? 'active' : '' }}">
                                    <a href="{{ route('items.index', ['name' => 'No Resueltos: Pruebas Nacionales']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('items/No*') ? 'active' : '' }}">
                                    <a href="{{ route('items.index', ['name' => 'No Resueltos: Prueba Diagnóstico']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#examenes_resueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                  </svg>
                                <span class="ml-4">Exámenes Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="examenes_resueltos" class="iq-submenu collapse" data-parent="#items">
                                <li class="{{ request()->is('examens*') ? 'active' : '' }}">
                                    <a href="{{ route('examens.index', ['name' => 'Examenes Resueltos: Pruebas PISA']) }}">
                                        <i class="las la-minus"></i><span>Prueba PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('examens*') ? 'active' : '' }}">
                                    <a href="{{ route('examens.index', ['name' => 'Examenes Resueltos: Pruebas Nacionales']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales </span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('examens*') ? 'active' : '' }}">
                                    <a href="{{ route('examens.index', ['name' => 'Examenes Resueltos: Pruebas Diagnóstico']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#examenes_noresueltos" class="collapsed" data-toggle="collapse" aria-expanded="false">
                                <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                  </svg>
                                <span class="ml-4">Exámenes No Resueltos</span>
                                <svg class="svg-icon iq-arrow-right arrow-active" width="20" height="20"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="10 15 15 20 20 15"></polyline>
                                    <path d="M4 4h7a4 4 0 0 1 4 4v12"></path>
                                </svg>
                            </a>
                            <ul id="examenes_noresueltos" class="iq-submenu collapse" data-parent="#progreso">
                                <li class="{{ request()->is('examens*') ? 'active' : '' }}">
                                    <a href="{{ route('examens.index', ['name' => 'Examenes No Resueltos: Pruebas PISA']) }}">
                                        <i class="las la-minus"></i><span>Pruebas PISA</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('examens*') ? 'active' : '' }}">
                                    <a href="{{ route('examens.index', ['name' => 'Examenes No Resueltos: Pruebas Nacionales']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Nacionales</span>
                                    </a>
                                </li>
                                <li class="{{ request()->is('examens*') ? 'active' : '' }}">
                                    <a href="{{ route('examens.index', ['name' => 'Examenes No Resueltos: Pruebas Diagnóstico']) }}">
                                        <i class="las la-minus"></i><span>Pruebas Diagnóstico</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('user*') ? 'active' : '' }}">
                            <a href="{{ route('user.time') }}">
                                <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 2 L12 22 M4 12 L20 12" />
                                    <circle cx="12" cy="12" r="8"></circle>
                                  </svg>
                               <span  class="ml-4">Tiempo en Plataforma </span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                    <a href="{{ route('study-centers.index') }}">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9"></polyline>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                            <rect x="6" y="14" width="12" height="8"></rect>
                          </svg>
                        <span class="ml-4">Imprimir Reporte</span>
                    </a>
                </li>
                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                    <a href="{{ route('study-centers.index') }}">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="3" x2="16" y2="7"></line>
                            <line x1="8" y1="3" x2="8" y2="7"></line>
                            <line x1="3" y1="11" x2="21" y2="11"></line>
                          </svg>
                        <span class="ml-4">Solicitar Certificado</span>
                    </a>
                </li>
                <li class="{{ request()->is('study-centers*') ? 'active' : '' }}">
                    <a href="{{ route('study-centers.index') }}">
                        <svg class="svg-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9 9c0-1.5 1-2.5 2-2.5s2 1 2 2c0 1-1 1.5-1 2h-1"></path>
                            <line x1="12" y1="16" x2="12" y2="16"></line>
                        </svg>
                        <span class="ml-4">Solicitar Ayuda</span>
                    </a>
                </li>

            </ul>
        </nav>
        <div id="sidebar-bottom" class="position-relative sidebar-bottom">
            <div class="card border-none">
                <div class="card-body p-0">
                    <div class="sidebarbottom-content">
                        <div class="image"><a href="https://fundacionmagistral.org/"> <img
                                    src="{{ asset('admin/images/page-img/42.png') }}" class="img-fluid"
                                    alt="side-bkg"></a></div>
                        <h6 class="mt-4 px-4 body-title">Educación de calidad para un futuro brillante</h6>
                        <a href="https://fundacionmagistral.org/" type="button"
                            class="btn sidebar-bottom-btn mt-4">Mercado PLUS</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3"></div>
    </div>


</div>
