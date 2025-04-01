@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Role</h2>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Role Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <h4>Select Permissions:</h4>
        <div class="mb-3">
            @foreach($permissions as $permission)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                    <label class="form-check-label">{{ $permission->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-success">Create Role</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection