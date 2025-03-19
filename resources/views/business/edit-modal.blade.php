<div class="modal fade" id="edit-business" tabindex="-1" role="dialog" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <form method="POST" action="{{ route('businesses.update', $business->id) }}" id="editCategoryForm"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar información del Negocio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-body">
                                <ul class="d-flex nav nav-pills mb-3 text-center profile-tab" id="profile-pills-tab"
                                    role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="pill" href="#negocio"
                                            role="tab" aria-selected="false">Mi Negocio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#contacto" role="tab"
                                            aria-selected="false">Contacto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#monedas" role="tab"
                                            aria-selected="false">Monedas</a>
                                    </li>

                                </ul>


                                <div class="profile-content tab-content">
                                    <div id="negocio" class="tab-pane fade active show">
                                        <div class="row">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <div class="crm-profile-img-edit position-relative">
                                                                <img class="crm-profile-pic rounded avatar-100"
                                                                    src="{{ $business->logo }}"
                                                                    alt="profile-pic" id="image-preview{{ $business->id }}">
                                                                <div class="crm-p-image bg-primary">
                                                                    <i class="las la-pen upload-button"></i>
                                                                    <input id="logo" name="logo" class="file-upload"  onchange="load_change_image(event,'image-preview{{ $business->id }}')"
                                                                        type="file" accept="image/*">
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


                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nombre</label>
                                                            <input type="text" id="name" name="name"
                                                                value="{{ $business->name }}" class="form-control"
                                                                placeholder="Entrar nombre de Negocio" required="">
                                                            <div class="help-block with-errors"></div>
                                                            <div class="form-group">
                                                                <label>Sector</label>
                                                                <input type="text" id="industry" name="industry"
                                                                    class="form-control"
                                                                    placeholder="Sector que pertenece"
                                                                    value="{{ $business->industry }}">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Tu sitio web</label>
                                                            <div class="input-group mb-2">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"
                                                                        id="basic-addon3">https://sitioweb.com/</span>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    id="website" name="website"
                                                                    aria-describedby="basic-addon3"
                                                                    value="{{ $business->website }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Descripción</label>
                                                            <textarea class="form-control" id="description" name="description" rows="4">{{ $business->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>
                                                                <input id="is_activated" name="is_activated"
                                                                    class="mr-2" type="checkbox"
                                                                    @if ($business->is_activated == 1) checked @endif>
                                                                Activado
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div id="contacto" class="tab-pane fade">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Celular</label>
                                                                <input type="text" id="mobile" name="mobile"
                                                                    value="{{ $business->contact->mobile }}"
                                                                    class="form-control"
                                                                    placeholder="Entrar número de celular">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Teléfono fijo</label>
                                                                <input type="text" id="phone" name="phone"
                                                                    class="form-control"
                                                                    placeholder="Entrar teléfono fijo"
                                                                    value="{{ $business->contact->phone }}">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Correo</label>
                                                                <input type="text" id="contact_email"
                                                                    name="contact_email"
                                                                    value="{{ $business->contact->email }}"
                                                                    class="form-control"
                                                                    placeholder="Entrar correo electrónico">
                                                                <div class="help-block with-errors"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Dirección</label>
                                                            <div class="card card-block card-stretch">
                                                                <div class="card-body p-3">
                                                                    <div class="row align-items-center py-2">
                                                                        <div class="col-md-6">
                                                                            <label>País:
                                                                                {{ $business?->contact->location?->municipality?->province->country?->name }}</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label>Municipio:
                                                                                {{ $business?->contact->location?->city }}</label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Localidad</label>
                                                                                <input type="text"
                                                                                    id="location_name"
                                                                                    name="location_name"
                                                                                    value="{{ $business->contact->location?->name }}"
                                                                                    class="form-control">
                                                                                <div class="help-block with-errors">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Código Postal</label>
                                                                                <input type="text" id="zip_code"
                                                                                    name="zip_code"
                                                                                    value="{{ $business->contact->location?->zip_code }}"
                                                                                    class="form-control">
                                                                                <div class="help-block with-errors">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Dirección</label>
                                                                                <input type="text" id="address"
                                                                                    name="address"
                                                                                    value="{{ $business->contact->location?->address }}"
                                                                                    class="form-control">
                                                                                <div class="help-block with-errors">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Punto de referencia</label>
                                                                                <input type="text" id="landmark"
                                                                                    name="landmark"
                                                                                    value="{{ $business->contact->location?->landmark }}"
                                                                                    class="form-control">
                                                                                <div class="help-block with-errors">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Descripción</label>
                                                                                <textarea class="form-control" id="location_description" name="location_description" rows="4">{{ $business->description }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="monedas" class="tab-pane fade">
                                        <div class="row">
                                            <div class="card card-block card-stretch">
                                                <div class="card-body p-3">
                                                    <div class="row align-items-center text-center">
                                                        @foreach ($countries_currencies as $countrycurrency)
                                                            <div class="profile-info col-xl-3 col-lg-6">
                                                                <div
                                                                    class="badge
                                                                     @if ($countrycurrency->code_currency_default) badge-danger
                                                                      @php $defualt_currency = 1; $name_defualt_currency = $countrycurrency->currency->code ; @endphp badge-danger @else badge-light @endif
                                                                   ">
                                                                    {{ $countrycurrency->currency->code }}</div>

                                                                <h5 class="mb-2 mt-3 icon-text-warning">
                                                                    {{ $countrycurrency->currency->symbol }}{{ $countrycurrency->exchange_rate }}
                                                                </h5>
                                                                <p class="mb-0">

                                                                </p>
                                                            </div>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>

    </div>
</div>
