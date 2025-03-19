<div class="row padding-1 p-1">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Zona<span style="color: #FF9770 !important;">*</span></label>
                <select id="location_id" name="location_id" class="form-control" required>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}" @if ($deliveryZone->location_id == $location->id) selected @endif>
                            {{ $location->name }} </option>
                    @endforeach

                </select>

                <div class="help-block with-errors">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label>Precio</label>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="number" class="form-control" name="price" id="price"
                    value="{{ old('price', $deliveryZone?->price) }}">

            </div>
        </div>

        <div class="col-md-6">
            <label>Tiempo de entrega</label>
            <div class="input-group mb-4">
                <input type="number" class="form-control delivery_time" name="delivery_time" id="delivery_time"
                    min="0" value="{{ old('price', $deliveryZone?->delivery_time) }}">
            </div>
        </div>
        <div class="col-md-6">
            <label>Unidad de tiempo</label>
            <div class="input-group mb-4">
                <select class="form-control time_unit" id="time_unit" class="form-control" name="time_unit">
                    <option value="">-- Seleccione --</option>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="checkbox">
                <label><input id="is_activated" name="is_activated" class="mr-2" type="checkbox"
                        checked>Activado</label>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
