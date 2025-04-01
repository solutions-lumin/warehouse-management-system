@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Roles</h2>
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create Role</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <tr>
            <th>Role Name</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>{{ implode(', ', $role->permissions->pluck('name')->toArray()) }}</td>
            <td>
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection