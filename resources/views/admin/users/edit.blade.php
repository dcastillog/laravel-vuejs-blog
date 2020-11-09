@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if($errors->any())
                        <ul class="list-group">
                            @foreach ($errors->all() as $error )
                                <li class="list-group-item list-group-item-danger">
                                    {{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="form-horizontal">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="Nombre" value="{{ old('name', $user->name) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email', $user->email) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" placeholder="Ingrese contraseña">
                                <span class="help-block">Dejar en blanco si no quieres cambiar la contraseña</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Confirmar contraseña</label>
                            <div class="col-sm-10">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar la contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Actualizar usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @role('Admin')  <!--Laravel Permission - Solo se mostrará a los tipo Admin--> 
                        <form method="POST" action="{{ route('admin.users.roles.update', $user) }}">
                            @csrf @method('PUT')
                            @foreach($roles as $role) <!--Se usa esta forma porque roles ya es un array--->
                                <div class="form-check">
                                    <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $role->name }}</label><br>
                                    <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
                                </div>
                            @endforeach
                            <button class="btn btn-primary btn-block">Actualizar roles</button>
                        </form>
                    @else <!--Si No es Admin solo muestra los roles asignado --->
                        <ul class="list-group">
                            @forelse($user->roles as $role)
                                <li class="list-group-item">{{ $role->name }}</li>
                            @empty
                                <li class="list-group-item">No tiene roles asignados</li>
                            @endforelse
                        </ul>
                    @endrole
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    @role('Admin')
                        <form method="POST" action="{{ route('admin.users.permissions.update', $user) }}">
                            @csrf @method('PUT')
                            @include('admin.permissions.checkboxes', ['model' => $user])
                            <button class="btn btn-primary btn-block">Actualizar permisos</button>
                        </form>
                    @else
                        <ul class="list-group">
                            @forelse($user->permissions as $permission)
                                <li class="list-group-item">{{ $permission->name }}</li>
                            @empty
                                <li class="list-group-item">No tiene permisos asignados</li>
                            @endforelse
                        </ul>
                    @endrole
                </div>
            </div>
        </div>
    </div>
@endsection