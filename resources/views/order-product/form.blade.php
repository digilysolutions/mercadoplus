<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="order_id" class="form-label">{{ __('Order Id') }}</label>
            <input type="text" name="order_id" class="form-control @error('order_id') is-invalid @enderror" value="{{ old('order_id', $orderProduct?->order_id) }}" id="order_id" placeholder="Order Id">
            {!! $errors->first('order_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="person_id" class="form-label">{{ __('Person Id') }}</label>
            <input type="text" name="person_id" class="form-control @error('person_id') is-invalid @enderror" value="{{ old('person_id', $orderProduct?->person_id) }}" id="person_id" placeholder="Person Id">
            {!! $errors->first('person_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $orderProduct?->price) }}" id="price" placeholder="Price">
            {!! $errors->first('price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="quantity" class="form-label">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $orderProduct?->quantity) }}" id="quantity" placeholder="Quantity">
            {!! $errors->first('quantity', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_price" class="form-label">{{ __('Total Price') }}</label>
            <input type="text" name="total_price" class="form-control @error('total_price') is-invalid @enderror" value="{{ old('total_price', $orderProduct?->total_price) }}" id="total_price" placeholder="Total Price">
            {!! $errors->first('total_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="subtotal_price" class="form-label">{{ __('Subtotal Price') }}</label>
            <input type="text" name="subtotal_price" class="form-control @error('subtotal_price') is-invalid @enderror" value="{{ old('subtotal_price', $orderProduct?->subtotal_price) }}" id="subtotal_price" placeholder="Subtotal Price">
            {!! $errors->first('subtotal_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="price_discount" class="form-label">{{ __('Price Discount') }}</label>
            <input type="text" name="price_discount" class="form-control @error('price_discount') is-invalid @enderror" value="{{ old('price_discount', $orderProduct?->price_discount) }}" id="price_discount" placeholder="Price Discount">
            {!! $errors->first('price_discount', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>
