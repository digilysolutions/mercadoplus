<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="temporary_id" class="form-label">{{ __('Temporary Id') }}</label>
            <input type="text" name="temporary_id" class="form-control @error('temporary_id') is-invalid @enderror" value="{{ old('temporary_id', $order?->temporary_id) }}" id="temporary_id" placeholder="Temporary Id">
            {!! $errors->first('temporary_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_id" class="form-label">{{ __('Person Id') }}</label>
            <input type="text" name="person_id" class="form-control @error('person_id') is-invalid @enderror" value="{{ old('person_id', $order?->person_id) }}" id="person_id" placeholder="Person Id">
            {!! $errors->first('person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purchase_person_id" class="form-label">{{ __('Purchase Person Id') }}</label>
            <input type="text" name="purchase_person_id" class="form-control @error('purchase_person_id') is-invalid @enderror" value="{{ old('purchase_person_id', $order?->purchase_person_id) }}" id="purchase_person_id" placeholder="Purchase Person Id">
            {!! $errors->first('purchase_person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery_person_id" class="form-label">{{ __('Delivery Person Id') }}</label>
            <input type="text" name="delivery_person_id" class="form-control @error('delivery_person_id') is-invalid @enderror" value="{{ old('delivery_person_id', $order?->delivery_person_id) }}" id="delivery_person_id" placeholder="Delivery Person Id">
            {!! $errors->first('delivery_person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="status_id" class="form-label">{{ __('Status Id') }}</label>
            <input type="text" name="status_id" class="form-control @error('status_id') is-invalid @enderror" value="{{ old('status_id', $order?->status_id) }}" id="status_id" placeholder="Status Id">
            {!! $errors->first('status_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="subtotal_amount" class="form-label">{{ __('Subtotal Amount') }}</label>
            <input type="text" name="subtotal_amount" class="form-control @error('subtotal_amount') is-invalid @enderror" value="{{ old('subtotal_amount', $order?->subtotal_amount) }}" id="subtotal_amount" placeholder="Subtotal Amount">
            {!! $errors->first('subtotal_amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_amount" class="form-label">{{ __('Total Amount') }}</label>
            <input type="text" name="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount', $order?->total_amount) }}" id="total_amount" placeholder="Total Amount">
            {!! $errors->first('total_amount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="currency" class="form-label">{{ __('Currency') }}</label>
            <input type="text" name="currency" class="form-control @error('currency') is-invalid @enderror" value="{{ old('currency', $order?->currency) }}" id="currency" placeholder="Currency">
            {!! $errors->first('currency', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="exchange_rate" class="form-label">{{ __('Exchange Rate') }}</label>
            <input type="text" name="exchange_rate" class="form-control @error('exchange_rate') is-invalid @enderror" value="{{ old('exchange_rate', $order?->exchange_rate) }}" id="exchange_rate" placeholder="Exchange Rate">
            {!! $errors->first('exchange_rate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $order?->address) }}" id="address" placeholder="Address">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="home_delivery" class="form-label">{{ __('Home Delivery') }}</label>
            <input type="text" name="home_delivery" class="form-control @error('home_delivery') is-invalid @enderror" value="{{ old('home_delivery', $order?->home_delivery) }}" id="home_delivery" placeholder="Home Delivery">
            {!! $errors->first('home_delivery', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery_fee" class="form-label">{{ __('Delivery Fee') }}</label>
            <input type="text" name="delivery_fee" class="form-control @error('delivery_fee') is-invalid @enderror" value="{{ old('delivery_fee', $order?->delivery_fee) }}" id="delivery_fee" placeholder="Delivery Fee">
            {!! $errors->first('delivery_fee', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="purchase_date" class="form-label">{{ __('Purchase Date') }}</label>
            <input type="text" name="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date', $order?->purchase_date) }}" id="purchase_date" placeholder="Purchase Date">
            {!! $errors->first('purchase_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery_date" class="form-label">{{ __('Delivery Date') }}</label>
            <input type="text" name="delivery_date" class="form-control @error('delivery_date') is-invalid @enderror" value="{{ old('delivery_date', $order?->delivery_date) }}" id="delivery_date" placeholder="Delivery Date">
            {!! $errors->first('delivery_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="delivery_time" class="form-label">{{ __('Delivery Time') }}</label>
            <input type="text" name="delivery_time" class="form-control @error('delivery_time') is-invalid @enderror" value="{{ old('delivery_time', $order?->delivery_time) }}" id="delivery_time" placeholder="Delivery Time">
            {!! $errors->first('delivery_time', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="time_unit" class="form-label">{{ __('Time Unit') }}</label>
            <input type="text" name="time_unit" class="form-control @error('time_unit') is-invalid @enderror" value="{{ old('time_unit', $order?->time_unit) }}" id="time_unit" placeholder="Time Unit">
            {!! $errors->first('time_unit', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
