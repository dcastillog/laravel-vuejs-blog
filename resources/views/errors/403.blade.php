@extends('layouts.app')

@section('content')
    <h3>Página no autorizada</h3>
    <p>{{ $exception->getMessage() }}</p>
    <p><a href={{ url()->previous() }}></a>Regresar</p>
@endsection