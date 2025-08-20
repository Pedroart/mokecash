<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="tienda_id" class="form-label">{{ __('Tienda Id') }}</label>
            <input type="text" name="tienda_id" class="form-control @error('tienda_id') is-invalid @enderror" value="{{ old('tienda_id', $seleccionesUsuario?->tienda_id) }}" id="tienda_id" placeholder="Tienda Id">
            {!! $errors->first('tienda_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="vendedor_id" class="form-label">{{ __('Vendedor Id') }}</label>
            <input type="text" name="vendedor_id" class="form-control @error('vendedor_id') is-invalid @enderror" value="{{ old('vendedor_id', $seleccionesUsuario?->vendedor_id) }}" id="vendedor_id" placeholder="Vendedor Id">
            {!! $errors->first('vendedor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="dni_cliente" class="form-label">{{ __('Dni Cliente') }}</label>
            <input type="text" name="dni_cliente" class="form-control @error('dni_cliente') is-invalid @enderror" value="{{ old('dni_cliente', $seleccionesUsuario?->dni_cliente) }}" id="dni_cliente" placeholder="Dni Cliente">
            {!! $errors->first('dni_cliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_cliente" class="form-label">{{ __('Nombre Cliente') }}</label>
            <input type="text" name="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror" value="{{ old('nombre_cliente', $seleccionesUsuario?->nombre_cliente) }}" id="nombre_cliente" placeholder="Nombre Cliente">
            {!! $errors->first('nombre_cliente', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="linea_credito" class="form-label">{{ __('Linea Credito') }}</label>
            <input type="text" name="linea_credito" class="form-control @error('linea_credito') is-invalid @enderror" value="{{ old('linea_credito', $seleccionesUsuario?->linea_credito) }}" id="linea_credito" placeholder="Linea Credito">
            {!! $errors->first('linea_credito', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="producto_id" class="form-label">{{ __('Producto Id') }}</label>
            <input type="text" name="producto_id" class="form-control @error('producto_id') is-invalid @enderror" value="{{ old('producto_id', $seleccionesUsuario?->producto_id) }}" id="producto_id" placeholder="Producto Id">
            {!! $errors->first('producto_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $seleccionesUsuario?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>