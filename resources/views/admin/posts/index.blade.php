@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Publicaciones</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Publicaciones</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white">
                    <div class="row d-flex justify-content-between">
                        <h3 class="card-title pl-2">Listado de Publicaciones</h3>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createPostModal">
                            <i class="fa fa-plus pr-3"></i>CREAR PUBLICACIÓN
                        </button>
                    </div>
                </div>
            </div>    

            <!-- /.card-header -->
            <div class="card-body">
                <table id="posts-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Extracto</th>
                            <th>Acciones</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->excerpt }}</td>
                                <td>
                                    <router-link :to="{name: 'posts.show', params: {slug: {{ $post->slug }}}" class="btn btn-sm btn-default"><i class="fa fa-eye"></i></router-link>
                                    <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Estás seguro de borrar esta publicación?')"
                                        >
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Extracto</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(function () {
            $('#posts-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
