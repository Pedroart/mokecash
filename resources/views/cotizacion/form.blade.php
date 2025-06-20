<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="tienda_id" class="form-label">{{ __('Tienda Id') }}</label>
            <input type="text" name="tienda_id" class="form-control @error('tienda_id') is-invalid @enderror" value="{{ old('tienda_id', $cotizacion?->tienda_id) }}" id="tienda_id" placeholder="Tienda Id">
            {!! $errors->first('tienda_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="vendedor_id" class="form-label">{{ __('Vendedor Id') }}</label>
            <input type="text" name="vendedor_id" class="form-control @error('vendedor_id') is-invalid @enderror" value="{{ old('vendedor_id', $cotizacion?->vendedor_id) }}" id="vendedor_id" placeholder="Vendedor Id">
            {!! $errors->first('vendedor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="producto_id" class="form-label">{{ __('Producto Id') }}</label>
            <input type="text" name="producto_id" class="form-control @error('producto_id') is-invalid @enderror" value="{{ old('producto_id', $cotizacion?->producto_id) }}" id="producto_id" placeholder="Producto Id">
            {!! $errors->first('producto_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="dni_cliente" class="form-label">{{ __('Dni Cliente') }}</label>
            <input type="text" name="dni_cliente" class="form-control @error('dni_cliente') is-invalid @enderror" value="{{ old('dni_cliente', $cotizacion?->dni_cliente) }}" id="dni_cliente" placeholder="Dni Cliente">
            {!! $errors->first('dni_cliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_cliente" class="form-label">{{ __('Nombre Cliente') }}</label>
            <input type="text" name="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror" value="{{ old('nombre_cliente', $cotizacion?->nombre_cliente) }}" id="nombre_cliente" placeholder="Nombre Cliente">
            {!! $errors->first('nombre_cliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $cotizacion?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cuotas" class="form-label">{{ __('Cuotas') }}</label>
            <input type="text" name="cuotas" class="form-control @error('cuotas') is-invalid @enderror" value="{{ old('cuotas', $cotizacion?->cuotas) }}" id="cuotas" placeholder="Cuotas">
            {!! $errors->first('cuotas', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto" class="form-label">{{ __('Monto') }}</label>
            <input type="text" name="monto" class="form-control @error('monto') is-invalid @enderror" value="{{ old('monto', $cotizacion?->monto) }}" id="monto" placeholder="Monto">
            {!! $errors->first('monto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto_financiado" class="form-label">{{ __('Monto Financiado') }}</label>
            <input type="text" name="monto_financiado" class="form-control @error('monto_financiado') is-invalid @enderror" value="{{ old('monto_financiado', $cotizacion?->monto_financiado) }}" id="monto_financiado" placeholder="Monto Financiado">
            {!! $errors->first('monto_financiado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="estatus" class="form-label">{{ __('Estatus') }}</label>
            <input type="text" name="estatus" class="form-control @error('estatus') is-invalid @enderror" value="{{ old('estatus', $cotizacion?->estatus) }}" id="estatus" placeholder="Estatus">
            {!! $errors->first('estatus', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="ip_origen" class="form-label">{{ __('Ip Origen') }}</label>
            <input type="text" name="ip_origen" class="form-control @error('ip_origen') is-invalid @enderror" value="{{ old('ip_origen', $cotizacion?->ip_origen) }}" id="ip_origen" placeholder="Ip Origen">
            {!! $errors->first('ip_origen', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>