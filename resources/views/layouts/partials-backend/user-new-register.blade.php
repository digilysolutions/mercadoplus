@if ($user?->role == 'Administrador')
<li class="nav-item nav-icon dropdown">
    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ri-user-line"></i>
        <span class="badge badge-primary badge-card">3</span>
    </a>
    <div class="iq-sub-dropdown dropdown-menu position-left"
        aria-labelledby="dropdownMenuButton2">
        <div class="card shadow-none m-0">
            <div class="card-body p-0 ">
                <div class="cust-title p-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Usuarios registrados.</h5>
                        <a class="badge badge-primary badge-card" href="#">3</a>
                    </div>
                </div>
                <div class="px-3 pt-0 pb-0 sub-card">
                    <a href="#" class="iq-sub-card">
                        <div class="media align-items-center cust-card py-3 border-bottom">

                            <div class="media-body ml-3">
                                <div
                                    class="d-flex align-items-center justify-content-between">
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
                                <div
                                    class="d-flex align-items-center justify-content-between">
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
                                <div
                                    class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Kianna Carder</h6>
                                    <small class="text-dark"><b>11 : 21 pm</b></small>
                                </div>
                                <small class="mb-0">Lorem ipsum dolor sit amet</small>
                            </div>
                        </div>
                    </a>
                </div>
                <a class="right-ic btn btn-primary btn-block position-relative p-2"
                    href="" role="button">
                    Ver todos
                </a>
            </div>
        </div>
    </div>
</li>
@endif
