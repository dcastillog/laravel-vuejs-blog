@csrf
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Identificador</label>
    <div class="col-sm-10">
        @if($role->exists)
            <input class="form-control" value="{{ old('name') }}" disabled>
        @else
            <input type="text" class="form-control" placeholder="Nombre" value="{{ old('name', $role->name) }}">
        @endif
    </div>
</div>
<div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
        <input type="text" name="display_name" class="form-control" placeholder="Nombre" value="{{ old('display_name', $role->display_name) }}">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Guard</label>
    <div class="col-sm-10">
        <select name="guard_name">
            @foreach(config('auth.guards') as $guardName => $guard) <!--Obtiene los guard del archivo config/auth.php--> 
                <option 
                    {{ old('guard_name', $role->guard_name) === $guardName ? 'selected' : '' }} 
                    value="{{ $guardName }}">{{ $guardName }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>Permisos</label>
    @include('admin.permissions.checkboxes', ['model' => $role])
</div>