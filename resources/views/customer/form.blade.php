<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="person_id" class="form-label">{{ __('Person Id') }}</label>
            <input type="text" name="person_id" class="form-control @error('person_id') is-invalid @enderror" value="{{ old('person_id', $customer?->person_id) }}" id="person_id" placeholder="Person Id">
            {!! $errors->first('person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_statuses_message" class="form-label">{{ __('Person Statuses Message') }}</label>
            <input type="text" name="person_statuses_message" class="form-control @error('person_statuses_message') is-invalid @enderror" value="{{ old('person_statuses_message', $customer?->person_statuses_message) }}" id="person_statuses_message" placeholder="Person Statuses Message">
            {!! $errors->first('person_statuses_message', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="billing_address_id" class="form-label">{{ __('Billingaddress Id') }}</label>
            <input type="text" name="billingAddress_id" class="form-control @error('billingAddress_id') is-invalid @enderror" value="{{ old('billingAddress_id', $customer?->billingAddress_id) }}" id="billing_address_id" placeholder="Billingaddress Id">
            {!! $errors->first('billingAddress_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="shipping_address_id" class="form-label">{{ __('Shippingaddress Id') }}</label>
            <input type="text" name="shippingAddress_id" class="form-control @error('shippingAddress_id') is-invalid @enderror" value="{{ old('shippingAddress_id', $customer?->shippingAddress_id) }}" id="shipping_address_id" placeholder="Shippingaddress Id">
            {!! $errors->first('shippingAddress_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="credit_card_number" class="form-label">{{ __('Creditcardnumber') }}</label>
            <input type="text" name="creditCardNumber" class="form-control @error('creditCardNumber') is-invalid @enderror" value="{{ old('creditCardNumber', $customer?->creditCardNumber) }}" id="credit_card_number" placeholder="Creditcardnumber">
            {!! $errors->first('creditCardNumber', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="credit_card_expiration_date" class="form-label">{{ __('Creditcardexpirationdate') }}</label>
            <input type="text" name="creditCardExpirationDate" class="form-control @error('creditCardExpirationDate') is-invalid @enderror" value="{{ old('creditCardExpirationDate', $customer?->creditCardExpirationDate) }}" id="credit_card_expiration_date" placeholder="Creditcardexpirationdate">
            {!! $errors->first('creditCardExpirationDate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="credit_limit" class="form-label">{{ __('Creditlimit') }}</label>
            <input type="text" name="creditLimit" class="form-control @error('creditLimit') is-invalid @enderror" value="{{ old('creditLimit', $customer?->creditLimit) }}" id="credit_limit" placeholder="Creditlimit">
            {!! $errors->first('creditLimit', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_activated" class="form-label">{{ __('Is Activated') }}</label>
            <input type="text" name="is_activated" class="form-control @error('is_activated') is-invalid @enderror" value="{{ old('is_activated', $customer?->is_activated) }}" id="is_activated" placeholder="Is Activated">
            {!! $errors->first('is_activated', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
