@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Warehouse</h2>
    <form action="{{ route('warehouses.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Warehouse Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" required>
        </div>
        <!-- <div class="mb-3">
            <label class="form-label">Manager Name</label>
            <input type="text" name="manager_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" required>
        </div> -->
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
