<!doctype html>
<html lang="en">

<head>
    @include('layouts.partials-backend.header-admin')

<body class=" color-light ">
    @php
        $user = auth()->user(); // O simplemente $user que pasaste desde el controlador

    @endphp
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->


    <!-- Wrapper Start -->
    <div class="wrapper">
        @if ($user)
            @if ($user?->role == 'Centro Educativo')
                @include('layouts.partials-backend.sidebar-menu-study-center-left')
            @elseif ($user?->role == 'Usuario')
                @include('layouts.partials-backend.sidebar-menu-user-left')
            @else
                @include('layouts.partials-backend.sidebar-menu-left')
            @endif
            @include('layouts.partials-backend.top-navbar')
        @endif
        <div class="modal fade" id="new-order" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">New Order</h4>
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label class="mb-2">Email</label>
                                    <input type="text" class="form-control" placeholder="Enter Name or Email">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-page">

            @yield('content-admin')
        </div>
    </div>
    <!-- Wrapper End-->


    @include('layouts.partials-backend.footer-admin')
    @yield('js')
</body>

</html>
