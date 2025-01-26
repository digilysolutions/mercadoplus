@extends('layouts.app-admin')
@section('title-header-admin')
    Adicionar persona
@endsection

@section('content-admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Vertical Wizard</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <ul id="top-tabbar-vertical" class="p-0">
                                    <li class="active" id="personal">
                                        <a href="javascript:void();">
                                            <i class="ri-lock-unlock-line text-primary"></i><span>Personal</span>
                                        </a>
                                    </li>
                                    <li id="contact" class="">
                                        <a href="javascript:void();">
                                            <i class="fas fa-phone-alt text-danger"></i><span>Contacto</span>
                                        </a>
                                    </li>
                                    <li id="official">
                                        <a href="javascript:void();">
                                            <i class="fas fa-user-circle text-success"></i><span
                                                id="selected_person_type">Tipo de persona</span>
                                        </a>
                                    </li>
                                    <li id="payment">
                                        <a href="javascript:void();">
                                            <i class="ri-check-fill text-warning"></i><span>Comprobar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <form id="form-wizard3" data-toggle="validator" class="text-center"
                                    action="{{ route('person.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- fieldsets -->
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="mb-4">Información Personal:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="fname">Nombre: *</label>
                                                        <input type="text" class="form-control" id="first_name"
                                                            name="first_name" placeholder="Nombre" />


                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lname">Apellidos: </label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            name="last_name" placeholder="Apellidos" />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dob">Estado Civil:</label>
                                                        <div class="form-group">
                                                            <select class="form-control " id="marital_status"
                                                                name="marital_status">
                                                                <option value="" selected>Seleccione su
                                                                    estado civil</option>
                                                                <option value="soltero">Soltero</option>
                                                                <option value="casado">Casado</option>
                                                                <option value="divorciado">Divorciado</option>
                                                                <option value="viudo">Viudo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dob">Grupo Sanguíneo:</label>
                                                        <div class="form-group">
                                                            <select class="form-control " id="blood_group"
                                                                name="blood_group">
                                                                <option value="" selected>Seleccione su grupo
                                                                    sanguíneo</option>
                                                                <option value="A+">A+</option>
                                                                <option value="A-">A-</option>
                                                                <option value="B+">B+</option>
                                                                <option value="B-">B-</option>
                                                                <option value="AB+">AB+</option>
                                                                <option value="AB-">AB-</option>
                                                                <option value="O+">O+</option>
                                                                <option value="O-">O-</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sexo: </label>
                                                        <div class="form-check">
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadio1" name="gender"
                                                                    value="Femenino" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio1">
                                                                    Femenino</label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" id="customRadio2" name="gender"
                                                                    value="Masculino" class="custom-control-input">
                                                                <label class="custom-control-label" for="customRadio2">
                                                                    Masculino</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="dob">Tipo de persona: *</label>
                                                        <div class="form-group">
                                                            <select class="form-control " id="type" name="type">
                                                                <option value="" disabled>Seleccione tipo de persona
                                                                </option>
                                                                <option value="CEO">CEO</option>
                                                                <option value="Cliente" selected>Cliente</option>
                                                                <option value="Empleado">Empleado</option>
                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button id="next1" type="button" name="next"
                                            class="btn btn-primary  action-button float-right next" value="Next"
                                            disabled>Siguiente</button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="mb-4">Información de contacto:</h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="mobile">Número de Celular: *</label>
                                                        <input type="tel" class="form-control" id="mobile"
                                                            name="mobile" placeholder="Número de Celular"
                                                            pattern="[0-9]{0,10}" />

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Correo: </label>
                                                        <input type="email" class="form-control" id="email"
                                                            name="email" placeholder="Correo Electrónico" />
                                                    </div>
                                                </div>


                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="phone">Teléfono:</label>
                                                        <input type="tel" class="form-control" id="phone"
                                                            name="phone" placeholder="Número de teléfono"
                                                            pattern="[0-9]{0,10}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="alternate_number">Número alternativo:</label>
                                                        <input type="tel" class="form-control" id="alternate_number"
                                                            name="alternate_number" placeholder="Número alternativo"
                                                            pattern="[0-9]{0,10}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="family_number">Número de familia:</label>
                                                        <input type="tel" class="form-control" id="family_number"
                                                            name="family_number" placeholder="Número de una familia"
                                                            pattern="[0-9]{0,10}" />
                                                    </div>
                                                </div>



                                                <div class="col-md-12" id="new-location-fields">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4 class="mb-4">Dirección: </h4>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5 class="mb-4">Municipio Isla de la Juventud</h5>
                                                            <input type="hidden" id="municipality_id"
                                                                name="municipality_id" value="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="location_name">Nombre: *</label>
                                                            <input type="text" class="form-control" id="location_name"
                                                                name="location_name"
                                                                placeholder="Nombre de la localidad" />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="city">Ciudad: </label>
                                                            <input type="text" class="form-control" id="city"
                                                                name="city" placeholder="Ciudad" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="address">Dirección: </label>
                                                            <textarea type="text" class="form-control" id="address" name="address" placeholder="Dirección"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="zip_code">Código Postal: </label>
                                                            <input type="number" class="form-control" id="zip_code"
                                                                name="zip_code" placeholder="Código Postal" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="description">Descripción:</label>
                                                            <textarea type="text" class="form-control" id="description" name="description"
                                                                placeholder="Descripción de la Localidad"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="landmark">Referencia:</label>
                                                            <textarea type="text" class="form-control" id="landmark" name="landmark" placeholder="Punto de referencia"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <button id="next2" type="button" name="next"
                                            class="btn btn-primary next action-button float-right"
                                            value="Next">Next</button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3"
                                            value="Previous">Atrás</button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="mb-4">Información de <span
                                                            id="selected_info_person_type">persona</span></h3>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!---CEO --->
                                                <div id="" class="ceo_fields additional_field col-md-12"
                                                    style="display: none;">
                                                    <div class="form-group">
                                                        <label for="location">Seleccionar negocio: </label>
                                                        <select id="business_id" name="business_id" class="form-control">
                                                            <option value="" selected>Seleccione un
                                                                negocio</option>
                                                            @foreach ($businesses as $business)
                                                                <option value="{{ $business['id'] }}">
                                                                    {{ $business['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div id="" class=" ceo_fields additional_field col-md-12"
                                                    style="display: none;">
                                                    <div class="form-group">
                                                        <label for="person_statuses_message">Mensaje de estado :</label>
                                                        <textarea type="text" class="form-control" id="person_statuses_message" name="person_statuses_message"
                                                            placeholder="Mensaje de estado"></textarea>
                                                    </div>
                                                </div>




                                                <!---Cliente --->
                                                <div id="" class=" col-md-12">

                                                    <div class="col-md-12">
                                                        <div
                                                            class="row client_fields_select custom-control custom-switch custom-switch-color custom-control-inline">
                                                            <input type="checkbox"
                                                                class="custom-control-input bg-success location_shippingAddress_IsContact"
                                                                id="customSwitch02"
                                                                name="location_shippingAddress_IsContact">
                                                            <label class="custom-control-label" for="customSwitch02">
                                                                La
                                                                misma de contacto</label>
                                                        </div>
                                                        <div class="client_fields additional_field col-md-12"
                                                            id="new-location-fields">
                                                            <div class="form-group">
                                                                <h4 class="mb-4"> Dirección para envío o entrega del
                                                                    producto
                                                                </h4>

                                                            </div>

                                                            <div class="client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <h4 class="mb-4">Municipio Isla de la Juventud</h4>
                                                                </div>
                                                            </div>
                                                            <div class="additional_field client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <label for="shippingAddress_name">Nombre: *</label>
                                                                    <input type="text" class="form-control"
                                                                        id="shippingAddress_name"
                                                                        name="shippingAddress_name"
                                                                        placeholder="Nombre de la localidad" />
                                                                </div>
                                                            </div>
                                                            <div class="additional_field client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <label for="city">Ciudad: </label>
                                                                    <input type="text" class="form-control"
                                                                        id="shippingAddress_city"
                                                                        name="shippingAddress_city"
                                                                        placeholder="Ciudad" />
                                                                </div>
                                                            </div>
                                                            <div class="additional_field client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <label for="shippingAddress_address">Dirección:
                                                                    </label>
                                                                    <textarea type="text" class="form-control" id="shippingAddress_address" name="shippingAddress_address"
                                                                        placeholder="Dirección"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="additional_field client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <label for="zip_code">Código Postal: </label>
                                                                    <input type="number" class="form-control"
                                                                        id="shippingAddress_zip_code"
                                                                        name="shippingAddress_zip_code"
                                                                        placeholder="Código Postal" />
                                                                </div>
                                                            </div>
                                                            <div class="additional_field client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="shippingAddress_description">Descripción:</label>
                                                                    <textarea type="text" class="form-control" id="shippingAddress_description" name="shippingAddress_description"
                                                                        placeholder="Descripción de la Localidad"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="additional_field client_fields col-md-12">
                                                                <div class="form-group">
                                                                    <label
                                                                        for="shippingAddress_landmark">Referencia:</label>
                                                                    <textarea type="text" class="form-control" id="shippingAddress_landmark" name="landmark"
                                                                        placeholder="Punto de referencia"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!---Empleado --->
                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <div class="crm-profile-img-edit position-relative">
                                                            <img class="crm-profile-pic rounded avatar-100"
                                                                src="{{ asset('admin/images/upload/no-picture.jpg') }}"
                                                                alt="profile-pic" id="image-preview">
                                                            <div class="crm-p-image bg-primary">
                                                                <i class="las la-pen upload-button"></i>
                                                                <input id="path_image" name="path_image"
                                                                    class="file-upload" type="file" accept="image/*">
                                                            </div>
                                                        </div>
                                                        <div class="img-extension mt-3">
                                                            <div class="d-inline-block align-items-center">
                                                                <span>Solo</span>
                                                                <span class="text-secondary">.jpg /</span>
                                                                <span class="text-secondary">.png /</span>
                                                                <span class="text-secondary">.jpeg /</span>
                                                                <span class="text-secondary">.webp /</span>
                                                                <span>Permitido</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <label for="location">Seleccionar negocio: </label>
                                                        <select id="business_employee_id" name="business_employee_id"
                                                            class="form-control">
                                                            <option value="" selected>Seleccione un
                                                                negocio</option>
                                                            @foreach ($businesses as $business)
                                                                <option value="{{ $business['id'] }}">
                                                                    {{ $business['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <label for="email_business">Correo electrónico: </label>
                                                        <input type="email" class="form-control" id="email_business"
                                                            name="email_business"
                                                            placeholder="Correo electrónico del negocio" />
                                                    </div>
                                                </div>
                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <label for="jobTitle">Puesto de trabajo: </label>
                                                        <input type="text" class="form-control" id="jobTitle"
                                                            name="jobTitle"
                                                            placeholder="Título del trabajo o puesto del empleado" />
                                                    </div>
                                                </div>
                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <label for="department">Departamento: </label>
                                                        <input type="text" class="form-control" id="department"
                                                            name="department"
                                                            placeholder="Departamento o área de trabajo " />
                                                    </div>
                                                </div>
                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <label for="role">Función: </label>
                                                        <input type="text" class="form-control" id="role"
                                                            name="role"
                                                            placeholder="Función que desempeña el empleado " />
                                                    </div>
                                                </div>
                                                <div id="" class="employee_fields additional_field col-md-12">
                                                    <div class="form-group">
                                                        <label for="role">Salario: </label>
                                                        <input type="number" class="form-control" id="salary"
                                                            name="salary" placeholder="Salario o sueldo del empleado" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <button id="submit_end_btn" type="button" name="next"
                                            class="btn btn-primary next action-button float-right"
                                            value="siguiente">Siguiente</button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3"
                                            value="Previous">Atrás</button>
                                    </fieldset>
                                    <fieldset>
                                        <div class="form-card text-left">
                                            <div class="row">

                                                <div id="result" class="col-md-6">
                                                    <h4>Datos Personales</h4>
                                                    <p><strong>Nombre:</strong> <span class="data_first_name"></span></p>
                                                    <p><strong>Apellidos:</strong><span class="data_lastName"></span></p>
                                                    <p><strong>Estado Civil:</strong> <span
                                                            class="data_maritalStatus"></span></p>
                                                    <p><strong>Grupo Sanguíneo:</strong><span
                                                            class="data_bloodGroup"></span> </p>
                                                    <p><strong>Sexo:</strong><span class="data_gender"></span> </p>
                                                    <p><strong>Tipo de persona:</strong><span
                                                            class="data_personType"></span> </p>
                                                    <div id="result" class="ceo_fields additional_field  col-md-12 ">
                                                        <h4>Datos CEO</h4>
                                                        <p><strong>Negocio:</strong><span
                                                                class="data_business_owner"></span>
                                                        </p>
                                                        <p><strong>Mensaje de estado:</strong><span
                                                                class="data_person_statuses_message"></span> </p>
                                                    </div>
                                                    <div id="result" class="employee_fields additional_fieldcol-md-12">
                                                        <h4>Datos del empleado</h4>
                                                        <div class="crm-profile-img-edit position-relative">
                                                            <img class="crm-profile-pic rounded avatar-100"
                                                                src="{{ asset('admin/images/upload/no-picture.jpg') }}"
                                                                alt="profile-pic" id="data_image">

                                                        </div>
                                                        <p><strong>Negocio:</strong><span
                                                                class="data_business_employee_id"></span> </p>
                                                        <p><strong>Correo:</strong><span
                                                                class="data_email_business"></span>
                                                        </p>
                                                        <p><strong>Puesto de trabajo:</strong><span
                                                                class="data_jobTitle"></span> </p>
                                                        <p><strong>Departamento:</strong><span
                                                                class="data_department"></span>
                                                        </p>
                                                        <p><strong>Función:</strong><span class="data_role"></span>
                                                        </p>
                                                        <p><strong>Salario:</strong><span class="data_salary"></span> </p>
                                                    </div>
                                                    <div id="result" class="client_fields additional_field  col-md-12">
                                                        <h4>Dirección para envío del producto al cliente</h4>
                                                        <p><strong>Municipio:</strong><span class="">Isla de la
                                                                Juventud</span> </p>
                                                        <p><strong>Nombre Localidad:</strong><span
                                                                class="data_shippingAddress_name"></span> </p>
                                                        <p><strong>Ciudad:</strong><span
                                                                class="data_shippingAddress_city"></span> </p>
                                                        <p><strong>Dirección:</strong><span
                                                                class="data_shippingAddress_address"></span> </p>
                                                        <p><strong>Código Postal:</strong><span
                                                                class="data_shippingAddress_zip_code"></span>
                                                        </p>
                                                        <p><strong>Descripción:</strong><span
                                                                class="data_shippingAddress_description"></span>
                                                        </p>
                                                        <p><strong>Punto de referencia:</strong><span
                                                                class="data_shippingAddress_landmark"></span> </p>
                                                    </div>
                                                </div>

                                                <div id="result" class="col-md-6">
                                                    <h4>Datos de contacto</h4>
                                                    <p><strong>Número de Celular:</strong><span class="data_mobile"></span>
                                                    </p>
                                                    <p><strong>Correo:</strong><span class="data_email"></span> </p>
                                                    <p><strong>Teléfono:</strong><span class="data_phone"></span> </p>
                                                    <p><strong>Número alternativo:</strong><span
                                                            class="data_alternate_number"></span> </p>
                                                    <p><strong>Número de familia:</strong><span
                                                            class="data_family_number"></span> </p>
                                                    <p><strong>Municipio:</strong><span class="">Isla de la
                                                            Juventud</span> </p>
                                                    <p><strong>Nombre Localidad:</strong><span
                                                            class="data_location_name"></span> </p>
                                                    <p><strong>Ciudad:</strong><span class="data_city"></span> </p>
                                                    <p><strong>Dirección:</strong><span class="data_address"></span> </p>
                                                    <p><strong>Código Postal:</strong><span class="data_zip_code"></span>
                                                    </p>
                                                    <p><strong>Descripción:</strong><span class="data_description"></span>
                                                    </p>
                                                    <p><strong>Punto de referencia:</strong><span
                                                            class="data_landmark"></span> </p>
                                                </div>



                                            </div>
                                        </div>
                                        <button type="submit" name="next"
                                            class="btn btn-primary float-right">Enviar</button>
                                        <button type="button" name="previous"
                                            class="btn btn-dark previous action-button-previous float-right mr-3"
                                            value="Previous">Atrás</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('includes/admin/script.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.ceo_fields').hide();
            $('.client_fields').show();
            $('.client_fields_select').show();
            $('.employee_fields').hide();
            $('#selected_person_type').text('Cliente');

            $('#first_name').addClass('is-invalid');
            let allFilled = true;

            // Iterar sobre cada campo requerido
            /* $('#form-wizard3 [required]').each(function() {
                 // Comprobar si el campo está vacío
                 if ($(this).val().trim() === '') {
                     allFilled = false; // Si algún campo está vacío, cambiar a false
                     $(this).addClass('is-invalid'); // Añade clase de error
                 }
             });*/

            // Evento para validar los campos cuando se escribe

            $('#first_name').on('input', function() {
                // Si el campo no está vacío, activa el botón, de lo contrario lo desactiva
                if ($(this).val().trim() !== '' && $('#type').val().trim() !== '') {
                    $('#next1').prop('disabled', false);
                    $('#first_name').removeClass('is-invalid'); // Remueve la clase de error
                    $('#next2').prop('disabled', true);
                    $('#mobile').addClass('is-invalid');
                    $('#location_name').addClass('is-invalid');
                } else {
                    $('#next1').prop('disabled', true);
                    $('#first_name').addClass('is-invalid'); // Añade clase de error
                }
            });

            $('#mobile, #location_name').on('input', validateNext2);

            function validateNext2() {
                // Comprobar si ambos campos están llenos
              // const mobileFilled = $('#mobile').val().trim() !== '';
                const mobileInput = $('#mobile').val().trim();
                const mobileFilled = mobileInput !== '' && !isNaN(mobileInput);
                const localNameFilled = $('#location_name').val().trim() !== '';
                if (mobileFilled) {
                    $('#mobile').removeClass('is-invalid');
                } else {
                    $('#mobile').addClass('is-invalid');
                }
                if (localNameFilled) {
                    $('#location_name').removeClass('is-invalid');
                } else {
                    $('#location_name').addClass('is-invalid');
                }
                // Activar o desactivar el botón según la validación
                $('#next2').prop('disabled', !(mobileFilled && localNameFilled));

                if ((mobileFilled && localNameFilled)) {
                    $('#submit_end_btn').prop('disabled', true);
                    var typeSelect = $('#selected_person_type').text();
                    if (typeSelect === 'CEO') {
                        $("#business_id").addClass('is-invalid');
                        $("#shippingAddress_name").removeClass('is-invalid');
                        $("#business_employee_id").removeClass('is-invalid');
                    } else if (typeSelect === 'Cliente') {
                        $("#shippingAddress_name").addClass('is-invalid');
                        $("#business_id").removeClass('is-invalid');
                        $("#business_employee_id").removeClass('is-invalid');
                    } else if (typeSelect === 'Empleado') {
                        $("#business_employee_id").addClass('is-invalid');
                        $("#shippingAddress_name").removeClass('is-invalid');
                        $("#business_id").removeClass('is-invalid');
                    }
                    $('#submit_end_btn').prop('disabled', true);
                }
            }
            $('#business_id').on('input', function() {
                if ($(this).val().trim() !== '') {
                    $('#submit_end_btn').prop('disabled', false);
                    $('#business_id').removeClass('is-invalid')
                } else {
                    $('#submit_end_btn').prop('disabled', true);
                    $('#business_id').addClass('is-invalid'); // Añade clase de error
                }
            });
            $('#shippingAddress_name').on('input', function() {

                if ($(this).val().trim() !== '') {
                    $('#submit_end_btn').prop('disabled', false);
                    $('#shippingAddress_name').removeClass('is-invalid')
                } else {
                    $('#submit_end_btn').prop('disabled', true);
                    $('#shippingAddress_name').addClass('is-invalid'); // Añade clase de error
                }
            });
            $('#business_employee_id').on('input', function() {
                if ($(this).val().trim() !== '') {
                    $('#submit_end_btn').prop('disabled', false);
                    $('#business_employee_id').removeClass('is-invalid')
                } else {
                    $('#submit_end_btn').prop('disabled', true);
                    $('#business_employee_id').addClass('is-invalid'); // Añade clase de error
                }
            });


            // Manejar el evento change del checkbox
            $(".location_shippingAddress_IsContact").change(function() {
                if (!$(this).is(':checked')) {
                    $('.client_fields').show();
                    $("#shippingAddress_name").addClass('is-invalid');
                    $('#submit_end_btn').prop('disabled', true);
                } else {
                    $('.client_fields').hide();
                    $("#shippingAddress_name").removeClass('is-invalid');
                    $('#submit_end_btn').prop('disabled', false);
                }
            });



            $('#type').change(function() {
                const selectedType = $(this).val();

                // Actualizar el texto del span
                $('#selected_person_type').text(selectedType);
                $('#selected_info_person_type').text(selectedType);

                // Limpiar los campos adicionales
                $('.additional_fields').empty();

                // Mostrar campos adicionales según el tipo de persona  
                if (selectedType === 'CEO') {
                    $('.ceo_fields').show();
                    $('.client_fields').hide();
                    $('.employee_fields').hide();
                    $('.client_fields_select').hide();

                } else if (selectedType === 'Cliente') {
                    $('.client_fields').show();
                    $('.client_fields_select').show();
                    $('.ceo_fields').hide();
                    $('.employee_fields').hide();
                    // $("#shippingAddress_name").addClass('is-invalid');
                    // $("#business_id").removeClass('is-invalid');
                    // $("#business_employee_id").removeClass('is-invalid');
                } else if (selectedType === 'Empleado') {
                    $('.employee_fields').show();
                    $('.client_fields').hide();
                    $('.ceo_fields').hide();
                    $('.client_fields_select').hide();
                    // $("#shippingAddress_name").removeClass('is-invalid');
                    //  $("#business_id").removeClass('is-invalid');
                    // $("#business_employee_id").attr("required", true);
                    // $("#business_employee_id").addClass('is-invalid');

                }
            });

        });

        document.getElementById('submit_end_btn').addEventListener('click', function() {
            // Obtener los valores de los campos
            const firstName = $('#first_name').val();
            const lastName = $('#last_name').val();
            const maritalStatus = $('#marital_status option:selected').text();
            const bloodGroup = $('#blood_group option:selected').text();
            const gender = $('input[name="gender"]:checked').length ? $('input[name="gender"]:checked').val() :
                "No seleccionado";
            const personType = $('#type option:selected').text();

            const mobile = $('#mobile').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const alternate_number = $('#alternate_number').val();
            const family_number = $('#family_number').val();
            const location_name = $('#location_name').val();
            const city = $('#city').val();
            const address = $('#address').val();
            const zip_code = $('#zip_code').val();
            const description = $('#description').val();
            const landmark = $('#landmark').val();

            const shippingAddress_name = $('#shippingAddress_name').val();
            const shippingAddress_city = $('#shippingAddress_city').val();
            const shippingAddress_address = $('#shippingAddress_address').val();
            const shippingAddress_zip_code = $('#shippingAddress_zip_code').val();
            const shippingAddress_description = $('#shippingAddress_description').val();
            const shippingAddress_landmark = $('#shippingAddress_landmark').val();

            const business_employee_id = $('#business_employee_id').val();
            const email_business = $('#email_business').val();
            const jobTitle = $('#jobTitle').val();
            const department = $('#department').val();
            const role = $('#role').val();
            const salary = $('#salary').val();

            const business = $('#business_id option:selected').val();
            const person_statuses_message = $('#person_statuses_message').val();


            const imageSrc = $('#image-preview').attr('src');

            // Asignar el src a la segunda imagen
            $('#data_image').attr('src', imageSrc);


            $('.data_first_name').text(firstName);
            $('.data_lastName').text(lastName);
            $('.data_maritalStatus').text(maritalStatus);
            $('.data_bloodGroup').text(bloodGroup);
            $('.data_gender').text(gender);
            $('.data_personType').text(personType);

            $('.data_mobile').text(mobile);
            $('.data_email').text(email);
            $('.data_phone').text(phone);
            $('.data_alternate_number').text(alternate_number);
            $('.data_family_number').text(family_number);
            $('.data_location_name').text(location_name);
            $('.data_city').text(city);
            $('.data_address').text(address);
            $('.data_zip_code').text(zip_code);
            $('.data_description').text(description);
            $('.data_landmark').text(landmark);

            $('.data_shippingAddress_name').text(shippingAddress_name);
            $('.data_shippingAddress_city').text(shippingAddress_city);
            $('.data_shippingAddress_address').text(shippingAddress_address);
            $('.data_shippingAddress_zip_code').text(shippingAddress_zip_code);
            $('.data_shippingAddress_landmark').text(shippingAddress_landmark);
            $('.data_shippingAddress_description').text(shippingAddress_description);

            $('.data_business_employee_id').text(business_employee_id);
            $('.data_email_business').text(email_business);
            $('.data_jobTitle').text(jobTitle);
            $('.data_department').text(department);
            $('.data_role').text(role);
            $('.data_salary').text(salary);
            $('.data_business_owner').text(business);
            $('.data_person_statuses_message').text(person_statuses_message);








            // Formatear los datos para mostrar
            /* let displayHtml = `
            <p><strong>Nombre:</strong> ${firstName}</p>
            <p><strong>Apellidos:</strong> ${lastName}</p>
            <p><strong>Estado Civil:</strong> ${maritalStatus}</p>
            <p><strong>Grupo Sanguíneo:</strong> ${bloodGroup}</p>
            <p><strong>Sexo:</strong> ${gender}</p>
            <p><strong>Tipo de persona:</strong> ${personType}</p>
        `;
                                                                                                                                                                                                        */
            // Mostrar los datos en el área de resultados
            // document.getElementById('display_area').innerHTML = displayHtml;
        });
    </script>
@endsection
