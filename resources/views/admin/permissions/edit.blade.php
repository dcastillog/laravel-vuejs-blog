@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @include('partials.validation-messages')
                <form method="POST" action="{{ route('admin.permissions.update', $permission) }}" class="form-horizontal">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Identificador</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="{{ old('name', $permission->name) }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" name="display_name" class="form-control" placeholder="Nombre" value="{{ old('display_name', $permission->display_name) }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block">Actualizar permiso</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection