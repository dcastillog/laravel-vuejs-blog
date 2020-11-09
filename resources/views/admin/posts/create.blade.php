<!-- Modal -->
<form method="POST" action="{{ route('admin.posts.store', '#create') }}">
    @csrf
    <div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostLabel">Crear una nueva publicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input 
                        name="title" 
                        id="post-title" 
                        type="text"
                        placeholder="Título de la publicación" 
                        class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}"
                        value="{{ old('title') }}"
                        > 
                    {!! $errors->first('title', '<span class="error invalid-feedback">:message</span>') !!} 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Crear publicación</button>
            </div>
        </div>
    </div>
</form>

@push('scripts')

<script>
    if( window.location.hash === '#create'){
        $('#createPostModal').modal('show');
    }

    $('#createPostModal').on('hide.bs.modal', function(){
        window.location.hash = '#'
    })
    
    // El evento shown se dispara despues de mostrar modal 
    $('#createPostModal').on('shown.bs.modal', function(){
        $('#post-title').focus();
        window.location.hash = '#create'
    });
</script>

@endpush