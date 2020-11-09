<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ env('APP_NAME') }}</title>

        {{-- Bootstrap CSS CDN --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        {{-- Font Awesome 5 --}}
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

        @stack('styles')
    </head>
    <body>
        <div class="wrapper">
            <nav id="sidebar">

                <div class="sidebar-header">
                    <h3>{{ env('APP_NAME') }}</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>{{ auth()->user()->name }}</p>
                    <span>{{ auth()->user()->getRoleDisplayName() }}</span>
                    <li class="active">
                        <a href="{{ route('dashboard') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#postsSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="fas fa-copy"></i>
                            Blog
                        </a>
                        <ul class="collapse list-unstyled" id="postsSubmenu">
                            @can('view', new App\Models\Post)
                                <li>
                                    <a href="{{ route('admin.posts.index') }}">
                                        <i class="fas fa-eye"></i>
                                        Ver publicaciones
                                    </a>
                                </li>
                            @endcan
						    @can('create', new App\Models\Post)
                                <li class="d-flex">
                                    @if(request()->is('admin/posts/*'))
                                    <a href="{{ route('admin.posts.create') }}">
                                        <i class="nav-icon far fa-file-signature"></i>
                                        Crear una publicación
                                    </a>
                                    @else
                                    <a href="!#" data-toggle="modal" data-target="#createPostModal">
                                        <i class="nav-icon far fa-file-signature"></i>
                                        Crear una publicación
                                    </a>
                                    @endif
                                </li>
                            @endcan
                        </ul>
                    </li>
                    
                    @can('view', new App\Models\User)
                        <li>
                            <a href="#usersSubmenu" data-toggle="collapse" aria-expanded="false">
                                <i class="nav-icon fas fa-users"></i>
                                Usuarios
                            </a>
                            <ul class="collapse list-unstyled" id="usersSubmenu">
                                <li>
                                    <a href="{{ route('admin.users.index') }}">
                                        <i class="far fa-eye"></i>
                                        Ver usuarios
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.users.create') }}">
                                        <i class="fa fa-user-plus"></i>Crear un usuario
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('admin.users.show', auth()->user()) }}"><i class="fas fa-user"></i>Perfil</a>
                        </li>
                    @endcan
    				@can('view', new \Spatie\Permission\Models\Role)
                        <li>
                            <a href="{{ route('admin.roles.index') }}"><i class="fas fa-user-cog"></i> Roles</a>
                        </li>
                    @endcan
				    @can('view', new \Spatie\Permission\Models\Permission)
                    <li>
                        <a href="{{ route('admin.permissions.index') }}"><i class="fas fa-user-shield"></i> Permisos</a>
                    </li>
                    @endcan
                </ul>

                <ul class="list-unstyled CTAs">
                    <li><a href="#" class="download">SPA</a></li>
                    <li><a href="#" class="article">Cerrar sesión</a></li>
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content" class="m-4">

                {{-- <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                            </button>
                        </div>

                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Sitio web</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Mi perfil</a></li>
                                        <li><a href="#">Opciones</a></li>
                                        <li><a href="#">Ayuda</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                                <li><a href="#"><i class="fas fa-bell"></i></a></li>
                                <li><a href="#"><i class="fas fa-comment"></i></a></li>
                            </ul>
                            <form class="navbar-form navbar-right">
                                <input type="text" class="form-control" placeholder="Buscar...">
                            </form>
                        </div>
                    </div>
                </nav> --}}
                
                
                {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="glyphicon glyphicon-align-left"></i>
                    </button>
                    
                    <div class="navbar">   
                        <form class="form-inline d-none d-lg-block">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>

                        <ul class="navbar-nav d-none d-lg-block">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Sitio web <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi perfil</a>
                                    <a class="dropdown-item" href="#">Opciones</a>
                                    <a class="dropdown-item" href="#">Ayuda</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </nav> --}}

                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                        <i class="fas fa-align-left"></i>
                    </button>
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <form class="form-inline ml-auto">
                            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>

                        <ul class="navbar-nav ml-auto mr-5"> 

                            <li class="nav-item active">
                                <a class="nav-link" href="#">Sitio web <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>{{ auth()->user()->name }}</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarUserDropdown">
                                    <a class="dropdown-item" href="#">Ver perfil</a>
                                    <a class="dropdown-item" href="#">Opciones</a>
                                    <a class="dropdown-item" href="#">Ayuda</a>
                                <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                                </div>
                            </li>                            
                        </ul>
                        
               
                    </div>
                </nav>
                @yield('content')

                @unless(request()->is('admin/posts/*'))
                    @include('admin.posts.create')
                @endunless
            </div>
        </div>

        <!-- jQuery CDN -->
         {{-- <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script> --}}
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

         <!-- Bootstrap Js CDN -->
         {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         
         @stack('scripts')

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>

    </body>
</html>
