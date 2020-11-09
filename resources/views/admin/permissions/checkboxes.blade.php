@foreach($permissions as $id => $name) <!--Se usa esta forma porque permisos ya es un array--->
    <div class="form-check">
        <input class="form-check-input" name="permissions[]" type="checkbox" 
            value="{{ $name }}" 
            {{ $model->permissions->contains($id) {{-- Verifica que la colecciones seleccionada sean igual al que se muestra y las selecciona--}}
                || collect(old('permissions'))->contains($name)
                ? 'checked' : '' }}
            >
        <label class="form-check-label">{{ $name }}</label>
    </div>
@endforeach