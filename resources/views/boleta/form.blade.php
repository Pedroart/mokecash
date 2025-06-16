<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="serie" class="form-label">{{ __('Serie') }}</label>
            <input type="text" name="serie" class="form-control @error('serie') is-invalid @enderror" value="{{ old('serie', $boleta?->serie) }}" id="serie" placeholder="Serie">
            {!! $errors->first('serie', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero" class="form-label">{{ __('Numero') }}</label>
            <input type="text" name="numero" class="form-control @error('numero') is-invalid @enderror" value="{{ old('numero', $boleta?->numero) }}" id="numero" placeholder="Numero">
            {!! $errors->first('numero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="numero_boleta_completo" class="form-label">{{ __('Numero Boleta Completo') }}</label>
            <input type="text" name="numero_boleta_completo" class="form-control @error('numero_boleta_completo') is-invalid @enderror" value="{{ old('numero_boleta_completo', $boleta?->numero_boleta_completo) }}" id="numero_boleta_completo" placeholder="Numero Boleta Completo">
            {!! $errors->first('numero_boleta_completo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_emision" class="form-label">{{ __('Fecha Emision') }}</label>
            <input type="text" name="fecha_emision" class="form-control @error('fecha_emision') is-invalid @enderror" value="{{ old('fecha_emision', $boleta?->fecha_emision) }}" id="fecha_emision" placeholder="Fecha Emision">
            {!! $errors->first('fecha_emision', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_vencimiento" class="form-label">{{ __('Fecha Vencimiento') }}</label>
            <input type="text" name="fecha_vencimiento" class="form-control @error('fecha_vencimiento') is-invalid @enderror" value="{{ old('fecha_vencimiento', $boleta?->fecha_vencimiento) }}" id="fecha_vencimiento" placeholder="Fecha Vencimiento">
            {!! $errors->first('fecha_vencimiento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="moneda" class="form-label">{{ __('Moneda') }}</label>
            <input type="text" name="moneda" class="form-control @error('moneda') is-invalid @enderror" value="{{ old('moneda', $boleta?->moneda) }}" id="moneda" placeholder="Moneda">
            {!! $errors->first('moneda', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_operacion" class="form-label">{{ __('Tipo Operacion') }}</label>
            <input type="text" name="tipo_operacion" class="form-control @error('tipo_operacion') is-invalid @enderror" value="{{ old('tipo_operacion', $boleta?->tipo_operacion) }}" id="tipo_operacion" placeholder="Tipo Operacion">
            {!! $errors->first('tipo_operacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cajero" class="form-label">{{ __('Cajero') }}</label>
            <input type="text" name="cajero" class="form-control @error('cajero') is-invalid @enderror" value="{{ old('cajero', $boleta?->cajero) }}" id="cajero" placeholder="Cajero">
            {!! $errors->first('cajero', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empresa_nombre" class="form-label">{{ __('Empresa Nombre') }}</label>
            <input type="text" name="empresa_nombre" class="form-control @error('empresa_nombre') is-invalid @enderror" value="{{ old('empresa_nombre', $boleta?->empresa_nombre) }}" id="empresa_nombre" placeholder="Empresa Nombre">
            {!! $errors->first('empresa_nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empresa_ruc" class="form-label">{{ __('Empresa Ruc') }}</label>
            <input type="text" name="empresa_ruc" class="form-control @error('empresa_ruc') is-invalid @enderror" value="{{ old('empresa_ruc', $boleta?->empresa_ruc) }}" id="empresa_ruc" placeholder="Empresa Ruc">
            {!! $errors->first('empresa_ruc', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="empresa_direccion" class="form-label">{{ __('Empresa Direccion') }}</label>
            <input type="text" name="empresa_direccion" class="form-control @error('empresa_direccion') is-invalid @enderror" value="{{ old('empresa_direccion', $boleta?->empresa_direccion) }}" id="empresa_direccion" placeholder="Empresa Direccion">
            {!! $errors->first('empresa_direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente_tipo_documento" class="form-label">{{ __('Cliente Tipo Documento') }}</label>
            <input type="text" name="cliente_tipo_documento" class="form-control @error('cliente_tipo_documento') is-invalid @enderror" value="{{ old('cliente_tipo_documento', $boleta?->cliente_tipo_documento) }}" id="cliente_tipo_documento" placeholder="Cliente Tipo Documento">
            {!! $errors->first('cliente_tipo_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente_numero_documento" class="form-label">{{ __('Cliente Numero Documento') }}</label>
            <input type="text" name="cliente_numero_documento" class="form-control @error('cliente_numero_documento') is-invalid @enderror" value="{{ old('cliente_numero_documento', $boleta?->cliente_numero_documento) }}" id="cliente_numero_documento" placeholder="Cliente Numero Documento">
            {!! $errors->first('cliente_numero_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente_denominacion" class="form-label">{{ __('Cliente Denominacion') }}</label>
            <input type="text" name="cliente_denominacion" class="form-control @error('cliente_denominacion') is-invalid @enderror" value="{{ old('cliente_denominacion', $boleta?->cliente_denominacion) }}" id="cliente_denominacion" placeholder="Cliente Denominacion">
            {!! $errors->first('cliente_denominacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cliente_direccion" class="form-label">{{ __('Cliente Direccion') }}</label>
            <input type="text" name="cliente_direccion" class="form-control @error('cliente_direccion') is-invalid @enderror" value="{{ old('cliente_direccion', $boleta?->cliente_direccion) }}" id="cliente_direccion" placeholder="Cliente Direccion">
            {!! $errors->first('cliente_direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_gravada" class="form-label">{{ __('Total Gravada') }}</label>
            <input type="text" name="total_gravada" class="form-control @error('total_gravada') is-invalid @enderror" value="{{ old('total_gravada', $boleta?->total_gravada) }}" id="total_gravada" placeholder="Total Gravada">
            {!! $errors->first('total_gravada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="total_igv" class="form-label">{{ __('Total Igv') }}</label>
            <input type="text" name="total_igv" class="form-control @error('total_igv') is-invalid @enderror" value="{{ old('total_igv', $boleta?->total_igv) }}" id="total_igv" placeholder="Total Igv">
            {!! $errors->first('total_igv', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="importe_total" class="form-label">{{ __('Importe Total') }}</label>
            <input type="text" name="importe_total" class="form-control @error('importe_total') is-invalid @enderror" value="{{ old('importe_total', $boleta?->importe_total) }}" id="importe_total" placeholder="Importe Total">
            {!! $errors->first('importe_total', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="importe_letras" class="form-label">{{ __('Importe Letras') }}</label>
            <input type="text" name="importe_letras" class="form-control @error('importe_letras') is-invalid @enderror" value="{{ old('importe_letras', $boleta?->importe_letras) }}" id="importe_letras" placeholder="Importe Letras">
            {!! $errors->first('importe_letras', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="metodo_pago" class="form-label">{{ __('Metodo Pago') }}</label>
            <input type="text" name="metodo_pago" class="form-control @error('metodo_pago') is-invalid @enderror" value="{{ old('metodo_pago', $boleta?->metodo_pago) }}" id="metodo_pago" placeholder="Metodo Pago">
            {!! $errors->first('metodo_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="monto_pagado" class="form-label">{{ __('Monto Pagado') }}</label>
            <input type="text" name="monto_pagado" class="form-control @error('monto_pagado') is-invalid @enderror" value="{{ old('monto_pagado', $boleta?->monto_pagado) }}" id="monto_pagado" placeholder="Monto Pagado">
            {!! $errors->first('monto_pagado', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cambio" class="form-label">{{ __('Cambio') }}</label>
            <input type="text" name="cambio" class="form-control @error('cambio') is-invalid @enderror" value="{{ old('cambio', $boleta?->cambio) }}" id="cambio" placeholder="Cambio">
            {!! $errors->first('cambio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="api_hash" class="form-label">{{ __('Api Hash') }}</label>
            <input type="text" name="api_hash" class="form-control @error('api_hash') is-invalid @enderror" value="{{ old('api_hash', $boleta?->api_hash) }}" id="api_hash" placeholder="Api Hash">
            {!! $errors->first('api_hash', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="xml_url" class="form-label">{{ __('Xml Url') }}</label>
            <input type="text" name="xml_url" class="form-control @error('xml_url') is-invalid @enderror" value="{{ old('xml_url', $boleta?->xml_url) }}" id="xml_url" placeholder="Xml Url">
            {!! $errors->first('xml_url', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cdr_url" class="form-label">{{ __('Cdr Url') }}</label>
            <input type="text" name="cdr_url" class="form-control @error('cdr_url') is-invalid @enderror" value="{{ old('cdr_url', $boleta?->cdr_url) }}" id="cdr_url" placeholder="Cdr Url">
            {!! $errors->first('cdr_url', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="qr_code_path" class="form-label">{{ __('Qr Code Path') }}</label>
            <input type="text" name="qr_code_path" class="form-control @error('qr_code_path') is-invalid @enderror" value="{{ old('qr_code_path', $boleta?->qr_code_path) }}" id="qr_code_path" placeholder="Qr Code Path">
            {!! $errors->first('qr_code_path', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sunat_resolucion" class="form-label">{{ __('Sunat Resolucion') }}</label>
            <input type="text" name="sunat_resolucion" class="form-control @error('sunat_resolucion') is-invalid @enderror" value="{{ old('sunat_resolucion', $boleta?->sunat_resolucion) }}" id="sunat_resolucion" placeholder="Sunat Resolucion">
            {!! $errors->first('sunat_resolucion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>