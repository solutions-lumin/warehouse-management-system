@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Role</h2>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Role Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>

        <h4>Select Permissions:</h4>
        <div class="mb-3">
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-warning">Update Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
