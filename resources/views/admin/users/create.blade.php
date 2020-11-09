@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @include('partials.validation-messages')
                <form method="POST" action="{{ route('admin.users.store') }}" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputName" placeholder="Nombre" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        @include('admin.roles.checkboxes')
                    </div>
                    <div class="form-group">
                        <label>Permisos</label>
                        @include('admin.permissions.checkboxes', ['model' => $user])
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block">Crear usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection