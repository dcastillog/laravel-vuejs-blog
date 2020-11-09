  
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
		<img src="{{ asset('img/AdminLTELogo.png') }}"
			alt="AdminLTE Logo"
			class="brand-image img-circle elevation-3"
			style="opacity: .8">
		<span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ auth()->user()->name }}</a>
			</div>
			<span>{{ auth()->user()->getRoleDisplayName() }}</span>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
				<li class="nav-header">NAVEGACIÓN</li>
				<li class="nav-item">
					<a href="{{ route('dashboard') }}" class="nav-link">
					<i class="nav-icon fas fa-home"></i>
					<p>Inicio</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Blog
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						@can('view', new App\Models\Post)
							<li class="nav-item">
								<a href="{{ route('admin.posts.index') }}" class="nav-link">
									<i class="nav-icon far fa-eye"></i>
									<p>Ver todo los posts</p>
								</a>
							</li>
						@endcan
						@can('create', new App\Models\Post)
							<li class="nav-item">
								@if(request()->is('admin/posts/*'))
									<a href="{{ route('admin.posts.index', '#create') }}" class="nav-link">
										<i class="nav-icon far fa-edit"></i>
										<p>Crear un post</p>
									</a>
								@else
									<a href="!#" class="nav-link" data-toggle="modal" data-target="#createPostModal">
										<i class="nav-icon far fa-plus"></i>
										<p>Crear un post</p>
									</a>
								@endif
							</li>
						@endcan
					</ul>				
				</li>
				@can('view', new App\Models\User)
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
							<p>
								Usuarios
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('admin.users.index') }}" class="nav-link">
									<i class="nav-icon far fa-eye"></i>
									<p>Ver todo los usuarios</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('admin.users.create') }}" class="nav-link">
									<i class="fa fa-user-plus pr-3"></i>Crear un usuario
								</a>
							</li>
						</ul>
					</li>
				@else
					<li class="nav-item">
						<a href="{{ route('admin.users.show', auth()->user()) }}" class="nav-link">
						<i class="nav-icon fas fa-user"></i>
						<p>Perfil</p>
						</a>
					</li>
				@endcan
				@can('view', new \Spatie\Permission\Models\Role)
					<li class="nav-item">
						<a href="{{ route('admin.roles.index') }}" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>Roles</p>
						</a>
					</li>
				@endcan
				@can('view', new \Spatie\Permission\Models\Permission)
					<li class="nav-item">
						<a href="{{ route('admin.permissions.index') }}" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>Permisos</p>
						</a>
					</li>
				@endcan
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
    <!-- /.sidebar -->
</aside>