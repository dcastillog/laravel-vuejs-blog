@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                @include('partials.validation-messages')
                <form method="POST" action="{{ route('admin.roles.update', $role) }}" class="form-horizontal">
                    @method('PUT')
                    @include('admin.roles.form')
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block">Crear rol</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection