<div class="mb-3">
    <label for="nombre" class="form-label">Nombre del Producto</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio (S/)</label>
    <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ old('precio', $producto->precio ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
</div>
