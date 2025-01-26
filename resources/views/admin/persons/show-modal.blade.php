<div class="modal fade" id="personShowModal{{ $person['id'] }}" tabindex="-1" role="dialog"
    aria-labelledby="personModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="personModalLabel">Detalles de la
                    Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card card-block p-card">
                                <div class="profile-box">
                                    <div class="profile-card rounded">
                                        <img src="@if ($person['type'] == 'Empleado') {{ asset($person['path_image']) }} @else /admin/images/upload/no-picture.jpg @endif "
                                            alt="profile-bg" class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                                        <h3 class="font-600 text-white text-center mb-0">{{ $person['first_name'] }}
                                        </h3>
                                        <p class="text-white text-center mb-5">{{ $person['type'] }}</p>
                                    </div>
                                    <div class="pro-content rounded">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="p-icon mr-3">
                                                <i class="las la-user"></i>
                                            </div>
                                            <p class="mb-0 eml">{{ $person['first_name'] }} {{ $person['last_name'] }}
                                            </p>
                                        </div>

                                        <div class="d-flex align-items-center mb-3">
                                            <div class="p-icon bg-success mr-3">
                                                <i class="las la-mobile"></i>
                                            </div>
                                            <p class="mb-0">{{ $person['contact']['mobile'] }}</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="p-icon mr-3">
                                                <i class="las la-envelope-open-text"></i>
                                            </div>
                                            <p class="mb-0 eml">{{ $person['contact']['email'] }}</p>
                                        </div>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="p-icon  bg-danger mr-3">
                                                <i class="las la-map-marked"></i>
                                            </div>
                                            <p class="mb-0">{{ $person['contact']['location']['name'] ?? 'Ubicación no disponible' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card card-block mb-3">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title mb-0">Sobre Mi</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5 class="mb-2">Datos Personales</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3"><i
                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Sexo:</strong>
                                                    {{ $person['gender'] }}</li>
                                                <li class="mb-3"><i
                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Estado
                                                        Civil:</strong>
                                                    {{ $person['marital_status'] }} </li>
                                                <li class="mb-3"><i
                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Grupo
                                                        Sanguíne:</strong>
                                                    {{ $person['blood_group'] }}</li>
                                                <li class="mb-3"><i
                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Teléfono:</strong>
                                                    {{ $person['contact']['phone'] }}</li>
                                                <li class="mb-3"><i
                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Fecha
                                                        Creado:</strong>
                                                    {{ \Carbon\Carbon::parse($person['contact']['person']['created_at'])->format('d/m/Y') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <h5 class="mb-2 ">Dirección</h5>
                                            <ul class="list-unstyled mb-0">
                                                <li class="mb-3">
                                                    {{ $person['contact']['location']['address'] ?? "No disponible" }}</li>
                                                <li class="mb-3">
                                                    {{ $person['contact']['location']['name'] ?? "No disponible"}} </li>
                                                <li class="mb-3">CP: {{ $person['contact']['location']['zip_code']?? "No disponible" }}
                                                </li>
                                                <li class="mb-3">
                                                    {{ $person['contact']['location']['municipality_name']?? "No disponible"}} </li>
                                                <li class="mb-3">
                                                    {{ $person['contact']['location']['province_name'] ?? "No disponible"}} /
                                                    {{ $person['contact']['location']['country_name'] ?? "No disponible"}}</li>
                                                <li class="mb-3 "><span
                                                        class="mt-3 badge border border-warning text-warning mt-3">
                                                        Referecia:{{ $person['contact']['location']['landmark']?? "No disponible" }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (
                                $person['type'] == 'Empleado' ||
                                    $person['type'] == 'Cliente' ||
                                    $person['type'] == 'CEO' ||
                                    $person['type'] == 'Proveedor')
                                <div class="card-body">

                                    <h5 class="mb-2 ">Datos del {{ $person['type'] }}</h5>
                                    <div class="row">

                                        <div class="card card-block card-stretch">
                                            <div class="card-body p-3">
                                                <div class="row align-items-center  py-2">

                                                    @if ($person['type'] == 'Proveedor')
                                                        Proveedor
                                                    @endif
                                                    @if ($person['type'] == 'CEO')
                                                        <div class="card-body">
                                                            <div class="d-flex  mb-3">

                                                                <div class="ml-3">
                                                                    <h4 class="mb-1" id="name">
                                                                        {{ $person['person_status']['name'] }} </h4>
                                                                    <p class="mb-2">
                                                                        {{ $person['person_status']['description'] }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                            <ul class="list-unstyled mb-0">
                                                                @foreach ($person['businesses'] as $business)
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div
                                                                            class="basic-drop-shadow p-4 shadow-showcase ">
                                                                            <div class="profile-img position-relative">
                                                                                <img src="  {{ $business['logo'] }}"
                                                                                    class="img-fluid rounded avatar-110"
                                                                                    alt="profile-image">
                                                                            </div>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Empresa:</strong>
                                                                                {{ $business['name'] }}</li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Sector:</strong>
                                                                                {{ $business['industry'] }}</li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Sitio
                                                                                    Web:</strong>
                                                                                {{ $business['website'] }}</li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Descripción:</strong>
                                                                                {{ $business['description'] }}</li>

                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if ($person['type'] == 'Cliente')
                                                        <div class="card-body">
                                                            <div class="d-flex  mb-3">

                                                                <div class="ml-3">
                                                                    <h4 class="mb-1" id="name">
                                                                        {{ $person['person_status']['name'] }} </h4>
                                                                    <p class="mb-2">
                                                                        {{ $person['person_status']['description'] }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                            <ul class="list-unstyled mb-0">


                                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                                    <div
                                                                        class="basic-drop-shadow p-4 shadow-showcase ">

                                                                        <div class="row">

                                                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                                                <h5 class="mb-2 ">Dirección para la
                                                                                    faturación</h5>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>
                                                                                    {{ $person['billingAddress']['address'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['billingAddress']['name'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['billingAddress']['zip_code'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['billingAddress']['city'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['billingAddress']['landmark'] }}
                                                                                </li>
                                                                            </div>

                                                                            <div class="col-sm-12 col-md-12 col-lg-6">
                                                                                <h5 class="mb-2 ">Dirección de envío de compra</h5>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>
                                                                                    {{ $person['shippingAddress']['address'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['shippingAddress']['name'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['shippingAddress']['zip_code'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['shippingAddress']['city'] }}
                                                                                </li>
                                                                                <li class="mb-3"><i
                                                                                        class="fa fa-check-circle text-primary fa-lg mr-2"></i>{{ $person['shippingAddress']['landmark'] }}
                                                                                </li>
                                                                            </div>
                                                                        </div>





                                                                    </div>
                                                                </div>

                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if ($person['type'] == 'Empleado')
                                                        <div class="card-body">
                                                            <div class="d-flex  mb-3">
                                                                <div class="profile-img position-relative">
                                                                    <img src="  {{ $person['path_image'] }}"
                                                                        class="img-fluid rounded avatar-110"
                                                                        alt="profile-image">
                                                                </div>
                                                                <div class="ml-3">
                                                                    <h4 class="mb-1" id="name">
                                                                        {{ $person['person_status']['name'] }} </h4>
                                                                    <p class="mb-2">
                                                                        {{ $person['person_status']['description'] }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                            <ul class="list-unstyled mb-0">
                                                                @foreach ($person['businesses'] as $business)
                                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                                        <div
                                                                            class="basic-drop-shadow p-4 shadow-showcase ">
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Empresa:</strong>
                                                                                {{ $business['name'] }}</li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Fecha
                                                                                    de Contratación:</strong>
                                                                                {{ $business['hireDate'] }}
                                                                            </li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Departamento:</strong>
                                                                                {{ $business['department'] }}
                                                                            </li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Puesto
                                                                                    de trabajo:</strong>
                                                                                {{ $business['jobTitle'] }}
                                                                            </li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i><strong>Salario:</strong>
                                                                                ${{ $business['salary'] }}
                                                                            </li>
                                                                            <li class="mb-3"><i
                                                                                    class="fa fa-check-circle text-primary fa-lg mr-2"></i>
                                                                                {{ $business['role'] }}
                                                                            </li>
                                                                        </div>
                                                                    </div>
                                                                @endforeach


                                                            </ul>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
