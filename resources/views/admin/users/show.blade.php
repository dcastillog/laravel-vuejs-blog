@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                    src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            @if($user->roles->count())
                                <p class="text-muted text-center">{{ $user->getRoleNames()->implode(', ') }}</p>
                            @endif

                            <p class="text-muted text-center">{{ $user->email }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Publicaciones</b> <a class="float-right">{{ $user->posts->count() }}</a>
                                </li>
                            </ul>

                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>  
               <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Publicaciones</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                            <li class="nav-item"><a class="nav-link" href="#roles-permissions" data-toggle="tab">Roles y Permisos</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    @forelse($user->posts as $post)
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="{{ asset('img/user1-128x128.jpg') }}" alt="user image">
                                                <span class="username">
                                                    <a href="#">{{ $user->name }}</a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly - {{ $post->published_at->format('d/m/y') }}</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <a href="{{ route('posts.show', $post) }}" style="color: black;">
                                                <p>
                                                    {{ $post->excerpt }}
                                                </p>
                                            </a>
                                            <p>
                                                <span class="float-right">
                                                    <a href="#" class="link-black text-sm">
                                                        <i class="far fa-comments mr-1"></i> Comentarios (5)
                                                    </a>
                                                </span>
                                            </p>
                                            <input class="form-control form-control-sm" type="text" placeholder="Comentar">
                                        </div>
                                    @empty
                                        <small class="text-muted">No tiene ninguna publicación</small>
                                    @endforelse    
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                    @foreach($user->posts->sortByDesc('published_at') as $post)
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                {{ $post->published_at->format('d-M-y') }}
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-file bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">{{ $post->title }}</a></h3>

                                                <div class="timeline-body">
                                                    {{ $post->excerpt }}
                                                </div>
                                                <div class="timeline-footer">
                                                    <div class="row">
                                                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">Ver publicación</a>
                                                        <form method="POST" action="{{ route('admin.posts.destroy', $post) }}">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" onclick="return confirm('¿Estás seguro de borrar esta publicación?')" class="btn btn-danger btn-sm">Eliminar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                    @endforeach
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                        3 Jan. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                            <img src="http://placehold.it/150x100" alt="...">
                                        </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="roles-permissions">
                                    <!-- Roles Permissions Box-->
                                    <div class="card card-primary">
                                        @forelse($user->roles as $role)
                                            <div class="card-body">
                                                <strong><i class="fas fa-pencil-alt mr-1"></i>{{ $role->name }}</strong>
                                                @if( $role->permissions->count() )
                                                    <p class="text-muted">Permisos: {{ $role->permissions->pluck('name')->implode(', ') }}</p>
                                                @endif
                                            </div>
                                            <!-- /.card-body -->
                                        @empty
                                            <small class="text-muted">No tiene roles asignados</small>
                                        @endforelse
                                    </div>
                                    <!-- /.card -->

                                    <strong>Permisos adicionales: </strong>                                        
                                    @forelse($user->permissions as $permission)
                                        <p>{{ $permission->name }}</p>
                                    @empty
                                        <small class="text-muted">No tiene permisos adicionales</small>
                                    @endforelse  
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->
@endsection