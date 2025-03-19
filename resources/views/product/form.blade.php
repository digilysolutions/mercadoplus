<div class="row padding-1 p-1">
    <div class="container-fluid">
        <div class="row">

            <div class="col-xl-8 col-lg-7 bg-color-white">

                <div class="shadow-lg  shadow-showcase">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Añadir un nuevo producto</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nombre *</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Entrar nombre del producto"
                                            data-errors="Por favor, nombre del producto." required
                                            value="{{ old('name', $product?->name) }}">
                                        <div class="invalid-feedback">Por favor, introduce el nombre del producto.</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Descripción del producto</label>
                                        <textarea class="form-control" name="description" id="description" rows="3"> {{ old('description', $product?->description) }}</textarea>

                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="iq-email-list">
                                                    <div class="iq-email-ui nav flex-column nav-pills">

                                                        <li class="nav-link active" role="tab" data-toggle="pill"
                                                            href="#mail-starred" aria-selected="true"><a
                                                                href="#"><i class="ri-star-line"></i>General</a>
                                                        </li>
                                                        <li class="nav-link" role="tab" data-toggle="pill"
                                                            href="#mail-snoozed" aria-selected="false"><a
                                                                href="#"><i
                                                                    class="ri-time-line"></i>Inventario</a></li>
                                                        <li class="nav-link" role="tab" data-toggle="pill"
                                                            href="#mail-draft" aria-selected="false"><a
                                                                href="#"><i
                                                                    class="ri-file-list-2-line"></i>Envío</a></li>
                                                        <li class="nav-link" role="tab" data-toggle="pill"
                                                            href="#mail-trash"><a href="#"><i
                                                                    class="ri-delete-bin-line"></i>Atributos </a></li>
                                                        <li class="nav-link" role="tab" data-toggle="pill"
                                                            href="#mail-important"><a href="#"><i
                                                                    class="ri-bookmark-line"></i>Otros datos</a></li>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 mail-box-detail">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="">
                                                <div class=" p-3">
                                                    <h5>Datos del producto</h5>
                                                </div>
                                                <div class="iq-email-listbox">
                                                    <div class="tab-content">

                                                        <div class="tab-pane fade active show" id="mail-starred"
                                                            role="tabpanel">
                                                            <div class="col-md-12">
                                                                <div class="checkbox mr-2 pt-2">
                                                                    <label><input class="mr-2" id="is_activated"
                                                                            name="is_activated" type="checkbox">Producto
                                                                        Activado</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="brand">Selecciona una Marca</label>
                                                                    <div class="col-sm-8">
                                                                        <select id="brand" name="brand_id"
                                                                            class="form-control">
                                                                            <option value="" disabled selected>
                                                                                Selecciona una marca</option>
                                                                            @foreach ($brands as $brand)
                                                                                <option value="{{ $brand->id }}"
                                                                                    @if ($brand->id == $product->brand_id) selected @endif
                                                                                    data-models="{{ json_encode($brand->modelProducts) }}">
                                                                                    {{ $brand->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="model">Selecciona un Modelo:</label>
                                                                    <div class="col-sm-8">
                                                                        <select id="model" name="model_id"
                                                                            class="form-control" name="model">
                                                                            <option value="" disabled selected>
                                                                                Selecciona un modelo</option>
                                                                            <!-- Los modelos se cargarán aquí -->
                                                                            @if ($product)
                                                                                <option
                                                                                    value="{{ $product->model_id }}"
                                                                                    selected>
                                                                                    {{ $product->modelProduct?->name }}
                                                                                </option>
                                                                            @endif
                                                                        </select>
                                                                        <div id="add-model-container"
                                                                            style="display: none;">
                                                                            <a href="#" id="addNewModel"
                                                                                data-toggle="modal"
                                                                                data-target="#addModelModal">+ Añadir
                                                                                nuevo modelo</a>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <!-- Modal para agregar nuevo modelo -->
                                                                <div class="modal fade" id="addModelModal"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="addModelModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="addModelModalLabel">Añadir
                                                                                    Nuevo Modelo</h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>

                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="newModel">Nombre
                                                                                        del Modelo</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="newModel"
                                                                                        placeholder="Ingresa el nombre del modelo">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal">Cerrar</button>
                                                                                <button id="addModelBand"
                                                                                    type="button"
                                                                                    class="btn btn-primary">Guardar
                                                                                    Modelo</button>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="normal-price">Precio de compra ($)</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="purchase_price" name="purchase_price"
                                                                            placeholder=""
                                                                            value="{{ old('purchase_price', $product?->purchase_price) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="normal-price">Precio de venta ($)</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="sale_price" name="sale_price"
                                                                            placeholder=""
                                                                            value="{{ old('sale_price', $product?->sale_price) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="discount-price">Precio rebajado
                                                                        ($)</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="discounted_price"
                                                                            name="discounted_price" placeholder=""
                                                                            value="{{ old('discounted_price', $product?->discounted_price) }}">
                                                                        <a href="#"
                                                                            id="schedule-link">Programar</a>
                                                                    </div>
                                                                    <div id="warning_message" style="display: none;"
                                                                        class="alert alert-warning" role="alert">
                                                                        <div class="iq-alert-icon">
                                                                            <i class="ri-alert-line"></i>
                                                                        </div>
                                                                        <div id="warning_message_text"
                                                                            class="iq-alert-text"> </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Inputs para las fechas, inicialmente ocultos -->
                                                            <div id="date-fields" style="display: none;"
                                                                class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-5 align-self-center"
                                                                        for="start_date_discounted_price">Fechas del
                                                                        precio
                                                                        rebajado</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="date" class="form-control"
                                                                            id="start_date_discounted_price"
                                                                            name="start_date_discounted_price"
                                                                            min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                                                            value="{{ old('expiration_date', $product?->start_date_discounted_price ? \Carbon\Carbon::parse($product->start_date_discounted_price)->toDateString() : '') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-5 align-self-center"
                                                                        for="end-date"></label>
                                                                    <div class="col-sm-7">
                                                                        <input type="date" class="form-control"
                                                                            id="end_date_discounted_price"
                                                                            name="end_date_discounted_price"
                                                                            min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                                                            value="{{ old('expiration_date', $product?->end_date_discounted_price ? \Carbon\Carbon::parse($product->end_date_discounted_price)->toDateString() : '') }}">
                                                                        <a href="#"
                                                                            id="cancel-link">Cancelar</a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="mail-snoozed" role="tabpanel">
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="normal-price">SKU</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" class="form-control"
                                                                            id="sku" name="sku"
                                                                            placeholder=""
                                                                            value="{{ old('sku', $product?->sku ?: 0) }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="discount-price">Código de barra
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            id="discount-price" name=""
                                                                            placeholder="" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="discount-price">Gestión de
                                                                        inventario</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="checkbox d-inline-block mr-3">
                                                                            <input type="checkbox"
                                                                                class="checkbox-input"
                                                                                id="enable_stock" name="enable_stock"
                                                                                value="{{ old('enable_stock', $product->enable_stock ?? false) ? 'checked' : '' }}">
                                                                            <label for="checkbox1">Hacer seguimiento de
                                                                                la cantidad</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div id="inventory-management" style="display:none;">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="control-label col-sm-4 align-self-center"
                                                                            for="quantity">Cantidad</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control"
                                                                                id="quantity_available"
                                                                                name="quantity_available"
                                                                                placeholder="" min="0"
                                                                                value="{{ old('quantity_available', ($product->stocks()->max('quantity_available')) ?: '0') }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="control-label col-sm-4 align-self-center"
                                                                            for="discount-price">¿Permitir
                                                                            reservas?</label>
                                                                        <div class="col-sm-8">
                                                                            <div class="checkbox d-inline-block mr-3">
                                                                                <input type="checkbox"
                                                                                    class="checkbox-input"
                                                                                    id="enable_reservation"
                                                                                    name="enable_reservation">
                                                                                <label for="checkbox1">Permitir, pero
                                                                                    se avisará al cliente</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="control-label col-sm-4 align-self-center"
                                                                            for="minimum-stock">Mínimo en stock</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="number" class="form-control"
                                                                                id="minimum-stock"
                                                                                name="minimum_quantity" placeholder=""
                                                                                min="0"
                                                                                value="{{ old('minimum_quantity', ($product->stocks()->max('minimum_quantity')) ?: '0') }}" >
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade " id="mail-draft" role="tabpanel">

                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-3 align-self-center"
                                                                        for="reservas">Localidades</label>
                                                                    <div class="col-sm-9">
                                                                        <select id="multiple" name="deliveryZones[]"
                                                                            data-placeholder="Seleccione las localidades para el envío"
                                                                            class="form-control" multiple="multiple"
                                                                            style="width: 100%">
                                                                            @foreach ($deliveryZones as $deliveryZone)
                                                                                <option
                                                                                    value="{{ $deliveryZone->location->id }}"
                                                                                    @foreach ($product->deliveryZones as $pdeliveryZone)
                                                                                    @if ($pdeliveryZone->location->id == $deliveryZone->location->id)
                                                                                        selected
                                                                                    @endif @endforeach>
                                                                                    {{ $deliveryZone->location->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </div>




                                                        <div class="tab-pane fade" id="mail-trash" role="tabpanel">
                                                            <div class="col-sm-12">
                                                                <div class="card card-block">
                                                                    <div class="card-body">
                                                                        <div class="align-items-center">
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="control-label col-sm-4 align-self-center"
                                                                                    for="attribute">Selecciona un
                                                                                    Atributo</label>
                                                                                <div class="col-sm-8">
                                                                                    <select id="attribute"
                                                                                        class="form-control">
                                                                                        <option value="" disabled
                                                                                            selected>Selecciona un
                                                                                            atributo</option>
                                                                                        @foreach ($attributes as $attribute)
                                                                                            <option
                                                                                                value="{{ $attribute->id }}">
                                                                                                {{ $attribute->name }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label
                                                                                    class="control-label col-sm-4 align-self-center"
                                                                                    for="terms">Selecciona los
                                                                                    Términos:</label>
                                                                                <div class="col-sm-8">
                                                                                    <select id="termsSelect"
                                                                                        class="form-control"
                                                                                        name="terms[]" multiple>
                                                                                        <!-- Los términos se cargarán aquí -->
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <button id="add-terms" type="button"
                                                                                class="btn btn-primary">
                                                                                <i class="ri-add-fill"><span
                                                                                        class="">Adicionar
                                                                                        Términos</span></i>
                                                                            </button>
                                                                        </div>
                                                                        <div class="attributes-list mt-3">
                                                                            <!-- Aquí se agregarán las líneas de atributos y términos -->
                                                                        </div>
                                                                        <!-- Campo oculto que almacenará la cadena de etiquetas seleccionadas -->
                                                                        <input type="hidden" name="terms_id"
                                                                            id="terms_id" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <div class="tab-pane fade" id="mail-important"
                                                            role="tabpanel">

                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="attribute">Tienda</label>
                                                                    <div class="col-sm-8">
                                                                        <select id="attribute" class="form-control"
                                                                            disabled>
                                                                            <option value="" disabled selected>
                                                                                Elegir tienda</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="minimum-stock">Máximo en stock</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="number" class="form-control"
                                                                            id="max-stock" placeholder=""
                                                                            min="0"
                                                                            name="maximum_quantity"
                                                                            value="{{ old('maximum_quantity', ($product->stocks()->max('maximum_quantity')) ?: '0') }}"

                                                                          >

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="minimum-stock">Unidad de medida</label>
                                                                    <div class="col-sm-8">
                                                                        <select id="brand" name="unit_id"
                                                                            class="form-control">
                                                                            <option value="" disabled selected>
                                                                                Selecciona unidad de medida</option>
                                                                            @foreach ($units as $unit)
                                                                                <option value="{{ $unit->id }}">
                                                                                    {{ $unit->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="control-label col-sm-4 align-self-center"
                                                                        for="expiration_date">Fecha de
                                                                        expiración</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="date" class="form-control"
                                                                            id="expiration_date"
                                                                            name="expiration_date"
                                                                            min="{{ \Carbon\Carbon::today()->toDateString() }}"
                                                                            value="{{ old('expiration_date', $product?->expiration_date ? \Carbon\Carbon::parse($product->expiration_date)->toDateString() : '') }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label"
                                                                            for="expiry_period">Periodo de
                                                                            Expiración</label>
                                                                        <input type="text" class="form-control"
                                                                            id="expiry_period" name="expiry_period"
                                                                            value="{{ old('expiry_period', $product?->expiry_period) }}"
                                                                            disabled>

                                                                        <!-- Input oculto para enviar el valor -->
                                                                        <input type="hidden"
                                                                            id="expiry_period_hidden"
                                                                            name="expiry_period"
                                                                            value="{{ old('expiry_period', $product?->expiry_period) }}">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label"
                                                                            for="expiry_period_type">Tipo de
                                                                            Periodo</label>
                                                                        <input type="text" class="form-control"
                                                                            id="expiry_period_type"
                                                                            name="expiry_period_type"
                                                                            value="{{ old('expiry_period_type', $product?->expiry_period_type) }}"
                                                                            disabled>

                                                                        <!-- Input oculto para enviar el valor -->
                                                                        <input type="hidden"
                                                                            id="expiry_period_type_hidden"
                                                                            name="expiry_period_type"
                                                                            value="{{ old('expiry_period_type', $product?->expiry_period_type) }}">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripción corta del producto</label>
                                    <textarea class="form-control" name="description_small" id="description_small" rows="3">{{ old('description_small', $product?->description_small) }}</textarea>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-4 col-lg-5">
                <div class="shadow-lg  shadow-showcase">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table id="tree-table-1"
                                        class="table table-hover table-bordered iq-bg-white tree">

                                        <tbody>
                                            <tr data-id="1" data-parent="0" data-level="1">
                                                <td data-column="name" class="glyphicon-chevron-right">
                                                    <strong>Publicar</strong>
                                                </td>
                                            </tr>
                                            <tr data-id="2" data-parent="1" data-level="1">
                                                <td>
                                                    <button type="submit" class="btn btn-primary"> 
                                                        @if(isset($product) && $product->exists) 
                                                        Actualizar Producto 
                                                    @else 
                                                        Adicionar Producto 
                                                    @endif</button>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table id="tree-table-3"
                                        class="table table-hover table-bordered iq-bg-white tree">

                                        <tbody>
                                            <tr data-id="1" data-parent="0" data-level="1">
                                                <td data-column="name" class="glyphicon-chevron-right">
                                                    <strong>Imagen del
                                                        producto</strong>
                                                </td>
                                            </tr>
                                            <tr data-id="2" data-parent="1" data-level="2" style="">
                                                <td>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="crm-profile-img-edit position-relative">
                                                                <img class="crm-profile-pic rounded avatar-100"
                                                                    src="{{ old('outstanding_image', asset($product->outstanding_image ?? 'admin/images/upload/no-picture.jpg')) }}"
                                                                    alt="profile-pic" id="image-preview">
                                                                <input id="outstanding_image" name="outstanding_image"
                                                                    class="file-upload" type="file"
                                                                    accept="image/*" value=" {{ old('outstanding_image', $product?->outstanding_image) }}">

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
                                                    <a href="#" id="uploadImageLink"> Establecer imagen del
                                                        producto</a>

                                                    <div id="imageOptions" style="display:none;">
                                                        <a href="#" id="removeImageLink">Eliminar imagen</a>
                                                        <span> o </span>
                                                        <a href="#" id="changeImageLink">Escoger otra imagen</a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table id="tree-table-6"
                                        class="table table-hover table-bordered iq-bg-white tree">

                                        <tbody>
                                            <tr data-id="1" data-parent="0" data-level="1">
                                                <td data-column="name" class="glyphicon-chevron-right">
                                                    <strong>Galería
                                                        del producto
                                                    </strong>
                                                </td>
                                            </tr>
                                            <tr data-id="2" data-parent="1" data-level="2" style="">


                                                <td>
                                                    <!-- Enlace para añadir imágenes -->
                                                    <a href="#" id="add-images-link">Añadir imágenes a la
                                                        galería del producto</a>
                                                    <input type="file" id="image-input" multiple accept="image/*">

                                                    <!-- Galería de imágenes -->
                                                    <div class="gallery" id="image-gallery"></div>

                                                    <!-- Enlaces para acciones -->
                                                    <div class="action-links">
                                                        <a href="#" id="add-more-images" class="hidden">Añadir
                                                            más imágenes</a>
                                                        <hr>
                                                        <a href="#" id="remove-all-images"
                                                            class="hidden">Eliminar todas las imágenes</a>

                                                    </div>
                                                </td>



                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table id="tree-table-5"
                                        class="table table-hover table-bordered iq-bg-white tree">

                                        <tbody>
                                            <tr data-id="1" data-parent="0" data-level="1">
                                                <td data-column="name" class="glyphicon-chevron-right">
                                                    <strong>Etiquetas del
                                                        producto</strong>
                                                </td>
                                            </tr>
                                            <tr data-id="2" data-parent="1" data-level="2" style="">
                                                <td>
                                                    <div class="input-group">
                                                        <input id="etiqueta-input" type="text"
                                                            class="form-control"
                                                            placeholder="Escriba y busque etiquetas...">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-primary" type="button"
                                                                id="add-button">Añadir</button>
                                                        </div>
                                                    </div>

                                                    <p class="mb-0">
                                                        <small> Separar etiquetas con comas</small>
                                                    </p>

                                                    <div id="etiqueta-suggestions"></div>
                                                    <div id="etiquetas-seleccionadas">

                                                    </div>
                                                    <!-- Campo oculto que almacenará la cadena de etiquetas seleccionadas -->
                                                    <input type="hidden" name="tag_id" id="tag_id"
                                                        value="" />
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="table-responsive">
                                    <table id="tree-table-4"
                                        class="table table-hover table-bordered iq-bg-white tree">

                                        <tbody>
                                            <tr data-id="1" data-parent="0" data-level="1">
                                                <td data-column="name" class="glyphicon-chevron-right">
                                                    <strong>Categorías del
                                                        producto *</strong>
                                                </td>
                                            </tr>
                                            <tr data-id="2" data-parent="1" data-level="2" style="">
                                                <td>
                                                    @foreach ($categories as $category)
                                                        <div class="radio">
                                                            <input type="radio" class="radio-input"
                                                                id="category_{{ $category->id }}" name="category_id"
                                                                value="{{ $category->id }}" required
                                                                @if ($product && $product->categories->contains($category->id)) checked @endif>
                                                            <label
                                                                for="category_{{ $category->id }}">{{ $category->name }}</label>
                                                        </div>
                                                    @endforeach
                                                    <div id="categories-list"></div>

                                                    <a href="#" data-toggle="modal"
                                                        data-target="#new-category-product">+ Añadir nueva
                                                        categoría</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>
