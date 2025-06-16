<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="boleta_id" class="form-label">{{ __('Boleta Id') }}</label>
            <input type="text" name="boleta_id" class="form-control @error('boleta_id') is-invalid @enderror" value="{{ old('boleta_id', $boletaitem?->boleta_id) }}" id="boleta_id" placeholder="Boleta Id">
            {!! $errors->first('boleta_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sku" class="form-label">{{ __('Sku') }}</label>
            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $boletaitem?->sku) }}" id="sku" placeholder="Sku">
            {!! $errors->first('sku', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $boletaitem?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="unidad_de_medida" class="form-label">{{ __('Unidad De Medida') }}</label>
            <input type="text" name="unidad_de_medida" class="form-control @error('unidad_de_medida') is-invalid @enderror" value="{{ old('unidad_de_medida', $boletaitem?->unidad_de_medida) }}" id="unidad_de_medida" placeholder="Unidad De Medida">
            {!! $errors->first('unidad_de_medida', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cantidad" class="form-label">{{ __('Cantidad') }}</label>
            <input type="text" name="cantidad" class="form-control @error('cantidad') is-invalid @enderror" value="{{ old('cantidad', $boletaitem?->cantidad) }}" id="cantidad" placeholder="Cantidad">
            {!! $errors->first('cantidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="valor_unitario" class="form-label">{{ __('Valor Unitario') }}</label>
            <input type="text" name="valor_unitario" class="form-control @error('valor_unitario') is-invalid @enderror" value="{{ old('valor_unitario', $boletaitem?->valor_unitario) }}" id="valor_unitario" placeholder="Valor Unitario">
            {!! $errors->first('valor_unitario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio_unitario_con_igv" class="form-label">{{ __('Precio Unitario Con Igv') }}</label>
            <input type="text" name="precio_unitario_con_igv" class="form-control @error('precio_unitario_con_igv') is-invalid @enderror" value="{{ old('precio_unitario_con_igv', $boletaitem?->precio_unitario_con_igv) }}" id="precio_unitario_con_igv" placeholder="Precio Unitario Con Igv">
            {!! $errors->first('precio_unitario_con_igv', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_tipo_afectacion_igv" class="form-label">{{ __('Codigo Tipo Afectacion Igv') }}</label>
            <input type="text" name="codigo_tipo_afectacion_igv" class="form-control @error('codigo_tipo_afectacion_igv') is-invalid @enderror" value="{{ old('codigo_tipo_afectacion_igv', $boletaitem?->codigo_tipo_afectacion_igv) }}" id="codigo_tipo_afectacion_igv" placeholder="Codigo Tipo Afectacion Igv">
            {!! $errors->first('codigo_tipo_afectacion_igv', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="porcentaje_igv" class="form-label">{{ __('Porcentaje Igv') }}</label>
            <input type="text" name="porcentaje_igv" class="form-control @error('porcentaje_igv') is-invalid @enderror" value="{{ old('porcentaje_igv', $boletaitem?->porcentaje_igv) }}" id="porcentaje_igv" placeholder="Porcentaje Igv">
            {!! $errors->first('porcentaje_igv', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descuento_item" class="form-label">{{ __('Descuento Item') }}</label>
            <input type="text" name="descuento_item" class="form-control @error('descuento_item') is-invalid @enderror" value="{{ old('descuento_item', $boletaitem?->descuento_item) }}" id="descuento_item" placeholder="Descuento Item">
            {!! $errors->first('descuento_item', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_item" class="form-label">{{ __('Total Item') }}</label>
            <input type="text" name="total_item" class="form-control @error('total_item') is-invalid @enderror" value="{{ old('total_item', $boletaitem?->total_item) }}" id="total_item" placeholder="Total Item">
            {!! $errors->first('total_item', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>