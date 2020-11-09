@extends('admin.layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endpush

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Crear publicación</h1>
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
<div class="row">
    
    <form method="POST" action="{{ route('admin.posts.update',$post) }}">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-md-8 pr-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Título de la publicación</label>
                            <input 
                                name="title" 
                                id="title" 
                                type="text" 
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}"
                                value="{{ old('title', $post->title) }}"
                                > 
                            {!! $errors->first('title', '<span class="error invalid-feedback">:message</span>') !!} 
                        </div>
                    </div>
                    <div class="card-body pad">
                        <div class="form-group">
                            <label for="body">Contenido de la publicación</label>
                            <div class="mb-0">
                                <textarea class="textarea {{ $errors->has('body') ? 'is-invalid' : ''}}" 
                                    id="summernote"
                                    name="body"
                                    placeholder="Place some text here"
                                    style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                >{{ old('body', $post->body) }}</textarea>
                                {{-- {!! $errors->first('body', '<span class="error invalid-feedback">:message</span>') !!}  --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="iframe">Contenido embebido (IFrame)</label>
                            <div class="mb-0">
                                <textarea class="form-control {{ $errors->has('iframe') ? 'is-invalid' : ''}}" 
                                    id="iframe"
                                    name="iframe"
                                    placeholder="Place some text here"
                                >{{ old('iframe', $post->iframe) }}</textarea>
                                {!! $errors->first('iframe', '<span class="error invalid-feedback">:message</span>') !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pr-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Fecha de publicación:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <div class="input-group-addon">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input 
                                    type="text" 
                                    name="published_at" 
                                    id="published_at" 
                                    class="form-control"
                                    autocomplete="off"
                                    value="{{ old('published_at', $post->published_at ? $post->published_at->format('m/d/Y') : null) }}"
                                >
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="excerpt">Extracto</label>
                            <textarea 
                                class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : ''}}" 
                                name="excerpt" 
                                id="excerpt" 
                                rows="3"
                            >{{ old('excerpt', $post->excerpt) }}</textarea>    
                            {!! $errors->first('excerpt', '<span class="error invalid-feedback">:message</span>') !!} 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="dropzone"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Categorías</label>
                                <select name="category_id" id="category_id" class="form-control select2 {{ $errors->has('category_id') ? 'is-invalid' : ''}}">
                                    <option value="" >Seleccione una categoría</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}    
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('category_id', '<span class="error invalid-feedback">:message</span>') !!} 
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Etiquetas</label>
                                <select name="tags[]" class="select2 {{ $errors->has('category') ? 'is-invalid' : ''}}"" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ collect(old('tags', $post->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}    
                                        >{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('tags', '<span class="error invalid-feedback">:message</span>') !!} 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto mb-5">
                            <button type="submit" class="btn btn-block bg-gradient-primary">GUARDAR PUBLICACIÓN</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </form>

    @if($post->photos->count())
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach($post->photos as $photo)
                        <div class="col-md-1">
                            <form method="POST" action="{{ route('admin.photos.destroy', $photo) }}">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-xs" style="position: absolute;"><i class="fa fa-times"></i></button>
                                <img class="img-fluid" src="{{ url($photo->url) }}">
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    
</div>

@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js" integrity="sha512-+cXPhsJzyjNGFm5zE+KPEX4Vr/1AbqCUuzAS8Cy5AfLEWm9+UI9OySleqLiSQOQ5Oa2UrzaeAOijhvV/M4apyQ==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous"></script>
    <script>

        $(document).ready(function (){
            $('#summernote').summernote({
                height: 200
            });
            
            $('.select2').select2({
				theme: 'classic',
				tags: true
            });
        
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'mm/dd/yyyy',
            }); 
            // $(".dropzone").dropzone({
            //     url: '/admin/posts/{{ $post->id }}/photos',
            //     maxFilesSize: 2,
            //     acceptedFiles: "image/*",
            //     paramName: 'photo',
            //     headers: {
            //         'X-CSRF-TOKEN': '@csrf'
            //     },
            //     dictDefaultMessage: 'Arrastra las fotos para subirlas'
            // });

        })
        
        var myDropzone = new Dropzone('.dropzone',{
            url: '/admin/posts/{{ $post->slug }}/photos',
            acceptedFiles: "image/*",
            maxFilesSize: 2,
            paramName: 'photo',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dictDefaultMessage: 'Arrastra las fotos para subirlas'
            });

        myDropzone.on('error', function(file, res){
            var msg = res.errors.photo[0];
            console.log(msg);
            $('.dz-error-message:last > span').text(msg);
        });
        
        Dropzone.autoDiscover = false;

    </script>
@endpush