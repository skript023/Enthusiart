@extends('admin.layouts.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add User</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User</h6>
    </div>
    <div class="card-body">
        <form action="/user/add" method="POST">
            @csrf
            <!-- Register as -->
            <div class="form-group">
                <label for="role" class="form-label mr-2">Register as</label>
                <select class="form-select" name="role">
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="artist">Artist</option>
                    <option value="art_enthusiast">Art Enthusiast</option>
                </select>
            </div>
            <!-- Full Name -->
            <div class="form-group mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Enter full name" required>
            </div>
            <!-- Email -->
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" required>
            </div>
            <!-- Password -->
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
            </div>
            {{--  <!-- Phone Number -->
            <div class="form-group mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="+62xxxxxxxxxxx">
            </div>
            <!-- Address -->
            <div class="form-group mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" placeholder=""></textarea>
            </div>  --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-4 text-center">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection