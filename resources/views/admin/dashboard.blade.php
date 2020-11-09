@extends('admin.layouts.app')

@section('content-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
    <div class="container-fluid">
        <h5 class="mb-2">Info Box</h5>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-olive"><i class="far fa-file"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Publicaciones</span>
                        <span class="info-box-number">{{ $postQty }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection