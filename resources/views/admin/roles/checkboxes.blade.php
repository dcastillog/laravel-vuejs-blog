@foreach($roles as $role) <!--Se usa esta forma porque roles ya es un array--->
    <div class="form-check">
        <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
        <label class="form-check-label">{{ $role->name }}</label><br>
        <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
    </div>
@endforeach