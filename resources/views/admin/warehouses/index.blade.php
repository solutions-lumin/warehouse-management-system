@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Warehouses</h2>
    <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Create Warehouse</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Manager</th>
                <th>Contact</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warehouses as $warehouse)
            <tr>
                <td>{{ $warehouse->name }}</td>
                <td>{{ $warehouse->location }}</td>
                <td>{{ $warehouse->manager_name }}</td>
                <td>{{ $warehouse->contact }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
