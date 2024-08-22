@extends('admin.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Detail</h6>
    </div>
    <div class="card-body">
        <form action="/user/data/update/{{ $user->id }}" method="POST">
            @csrf
            @method('patch')
            <!-- Register as -->
            <div class="form-group">
                <label for="role" class="form-label mr-2">Register as</label>
                <select class="form-select" name="role">
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="artist" {{ $user->role == 'artist' ? 'selected' : '' }}>Artist</option>
                    <option value="art_enthusiast" {{ $user->role == 'art_enthusiast' ? 'selected' : '' }}>Art Enthusiast</option>
                </select>
            </div>
            <!-- Full Name -->
            <div class="form-group mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input value="{{ $user->fullname }}" type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" required>
            </div>
            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="{{ $user->email }}" type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required>
            </div>
            <!-- Phone Number -->
            <div class="form-group mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input value="{{ $user->phone }}" type="text" class="form-control" name="phone" id="phone">
            </div>
            <!-- Address -->
            <div class="form-group mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" placeholder="">{{ $user->address }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4 text-center">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection