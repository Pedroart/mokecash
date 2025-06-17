<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="cotizacion_id" class="form-label">{{ __('Cotizacion Id') }}</label>
            <input type="text" name="cotizacion_id" class="form-control @error('cotizacion_id') is-invalid @enderror" value="{{ old('cotizacion_id', $cotizacionProducto?->cotizacion_id) }}" id="cotizacion_id" placeholder="Cotizacion Id">
            {!! $errors->first('cotizacion_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="producto_id" class="form-label">{{ __('Producto Id') }}</label>
            <input type="text" name="producto_id" class="form-control @error('producto_id') is-invalid @enderror" value="{{ old('producto_id', $cotizacionProducto?->producto_id) }}" id="producto_id" placeholder="Producto Id">
            {!! $errors->first('producto_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imei" class="form-label">{{ __('Imei') }}</label>
            <input type="text" name="imei" class="form-control @error('imei') is-invalid @enderror" value="{{ old('imei', $cotizacionProducto?->imei) }}" id="imei" placeholder="Imei">
            {!! $errors->first('imei', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>