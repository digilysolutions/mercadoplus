<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="warehouse_id" class="form-label">{{ __('Warehouse Id') }}</label>
            <input type="text" name="warehouse_id" class="form-control @error('warehouse_id') is-invalid @enderror" value="{{ old('warehouse_id', $stock?->warehouse_id) }}" id="warehouse_id" placeholder="Warehouse Id">
            {!! $errors->first('warehouse_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity_available" class="form-label">{{ __('Quantity Available') }}</label>
            <input type="text" name="quantity_available" class="form-control @error('quantity_available') is-invalid @enderror" value="{{ old('quantity_available', $stock?->quantity_available) }}" id="quantity_available" placeholder="Quantity Available">
            {!! $errors->first('quantity_available', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="minimum_quantity" class="form-label">{{ __('Minimum Quantity') }}</label>
            <input type="text" name="minimum_quantity" class="form-control @error('minimum_quantity') is-invalid @enderror" value="{{ old('minimum_quantity', $stock?->minimum_quantity) }}" id="minimum_quantity" placeholder="Minimum Quantity">
            {!! $errors->first('minimum_quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="maximum_quantity" class="form-label">{{ __('Maximum Quantity') }}</label>
            <input type="text" name="maximum_quantity" class="form-control @error('maximum_quantity') is-invalid @enderror" value="{{ old('maximum_quantity', $stock?->maximum_quantity) }}" id="maximum_quantity" placeholder="Maximum Quantity">
            {!! $errors->first('maximum_quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="product_id" class="form-label">{{ __('Product Id') }}</label>
            <input type="text" name="product_id" class="form-control @error('product_id') is-invalid @enderror" value="{{ old('product_id', $stock?->product_id) }}" id="product_id" placeholder="Product Id">
            {!! $errors->first('product_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="taxs_rates_id" class="form-label">{{ __('Taxs Rates Id') }}</label>
            <input type="text" name="taxs_rates_id" class="form-control @error('taxs_rates_id') is-invalid @enderror" value="{{ old('taxs_rates_id', $stock?->taxs_rates_id) }}" id="taxs_rates_id" placeholder="Taxs Rates Id">
            {!! $errors->first('taxs_rates_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $stock?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="enable_discounts_by_quantities" class="form-label">{{ __('Enable Discounts By Quantities') }}</label>
            <input type="text" name="enable_discounts_by_quantities" class="form-control @error('enable_discounts_by_quantities') is-invalid @enderror" value="{{ old('enable_discounts_by_quantities', $stock?->enable_discounts_by_quantities) }}" id="enable_discounts_by_quantities" placeholder="Enable Discounts By Quantities">
            {!! $errors->first('enable_discounts_by_quantities', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="enable_discounts_by_weights" class="form-label">{{ __('Enable Discounts By Weights') }}</label>
            <input type="text" name="enable_discounts_by_weights" class="form-control @error('enable_discounts_by_weights') is-invalid @enderror" value="{{ old('enable_discounts_by_weights', $stock?->enable_discounts_by_weights) }}" id="enable_discounts_by_weights" placeholder="Enable Discounts By Weights">
            {!! $errors->first('enable_discounts_by_weights', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="enable_discounts_by_expiration_dates" class="form-label">{{ __('Enable Discounts By Expiration Dates') }}</label>
            <input type="text" name="enable_discounts_by_expiration_dates" class="form-control @error('enable_discounts_by_expiration_dates') is-invalid @enderror" value="{{ old('enable_discounts_by_expiration_dates', $stock?->enable_discounts_by_expiration_dates) }}" id="enable_discounts_by_expiration_dates" placeholder="Enable Discounts By Expiration Dates">
            {!! $errors->first('enable_discounts_by_expiration_dates', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="enable_discounts_by_discounts_by_important_dates" class="form-label">{{ __('Enable Discounts By Discounts By Important Dates') }}</label>
            <input type="text" name="enable_discounts_by_discounts_by_important_dates" class="form-control @error('enable_discounts_by_discounts_by_important_dates') is-invalid @enderror" value="{{ old('enable_discounts_by_discounts_by_important_dates', $stock?->enable_discounts_by_discounts_by_important_dates) }}" id="enable_discounts_by_discounts_by_important_dates" placeholder="Enable Discounts By Discounts By Important Dates">
            {!! $errors->first('enable_discounts_by_discounts_by_important_dates', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discounts_by_quantities_id" class="form-label">{{ __('Discounts By Quantities Id') }}</label>
            <input type="text" name="discounts_by_quantities_id" class="form-control @error('discounts_by_quantities_id') is-invalid @enderror" value="{{ old('discounts_by_quantities_id', $stock?->discounts_by_quantities_id) }}" id="discounts_by_quantities_id" placeholder="Discounts By Quantities Id">
            {!! $errors->first('discounts_by_quantities_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discounts_by_weights_id" class="form-label">{{ __('Discounts By Weights Id') }}</label>
            <input type="text" name="discounts_by_weights_id" class="form-control @error('discounts_by_weights_id') is-invalid @enderror" value="{{ old('discounts_by_weights_id', $stock?->discounts_by_weights_id) }}" id="discounts_by_weights_id" placeholder="Discounts By Weights Id">
            {!! $errors->first('discounts_by_weights_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discounts_by_expiration_dates_id" class="form-label">{{ __('Discounts By Expiration Dates Id') }}</label>
            <input type="text" name="discounts_by_expiration_dates_id" class="form-control @error('discounts_by_expiration_dates_id') is-invalid @enderror" value="{{ old('discounts_by_expiration_dates_id', $stock?->discounts_by_expiration_dates_id) }}" id="discounts_by_expiration_dates_id" placeholder="Discounts By Expiration Dates Id">
            {!! $errors->first('discounts_by_expiration_dates_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="discounts_by_discounts_by_important_dates_id" class="form-label">{{ __('Discounts By Discounts By Important Dates Id') }}</label>
            <input type="text" name="discounts_by_discounts_by_important_dates_id" class="form-control @error('discounts_by_discounts_by_important_dates_id') is-invalid @enderror" value="{{ old('discounts_by_discounts_by_important_dates_id', $stock?->discounts_by_discounts_by_important_dates_id) }}" id="discounts_by_discounts_by_important_dates_id" placeholder="Discounts By Discounts By Important Dates Id">
            {!! $errors->first('discounts_by_discounts_by_important_dates_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
