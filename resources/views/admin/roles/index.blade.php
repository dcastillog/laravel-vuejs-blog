@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>DataTables</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">DataTables</li>
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
                <div class="card-header">
                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>
                @can('create', $roles->first())
                    <div class="d-flex justify-content-end pr-3">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus pr-3"></i>CREAR ROL
                        </a>
                    </div>
                @endcan
            </div>    

            

            <!-- /.card-header -->
            <div class="card-body">
                <table id="roles-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Guard</th>
                            <th>Permisos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->display_name }}</td>
                                <td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td>
                                    @can('update', $role)
                                        <a href="{{ route('admin.roles.edit', $role)}}" class="btn btn-sm btn-info"><i class="fas fa-pencil-alt"></i></a>
                                    @endcan
                                    @can('delete')
                                        @if($role->id !== 1)
                                            <form method="POST" action="{{ route('admin.roles.destroy', $role) }}" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Estás seguro de borrar este rol?')"
                                                ><i class="fa fa-times"></i></button>
                                            </form>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Guard</th>
                            <th>Permisos</th>
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
            $('#roles-table').DataTable({
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
