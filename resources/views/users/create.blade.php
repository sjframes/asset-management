@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold mb-1">Add User</h1>
        <p class="text-muted mb-0">
            Create a new system user
        </p>
    </div>

    @if ($errors->any())

<div class="alert alert-danger">

    <strong>Error!</strong>

    <ul class="mb-0">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

    <a href="/users" class="btn btn-dark">
        ← Back
    </a>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">
        

        <form action="{{ route('users.store') }}" method="POST">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Employee ID</label>
                    <input type="text"
                           name="employee_id"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Department</label>
                    <input type="text"
                           name="department"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Designation</label>
                    <input type="text"
                           name="designation"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text"
                           name="phone"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Role</label>

                    <select name="role"
                            class="form-control">

                        <option value="user">User</option>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>

                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>

                    <select name="status"
                            class="form-control">

                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>

                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Confirm Password</label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

            </div>

            <div class="text-end mt-3">

                <button type="submit"
                        class="btn btn-primary px-4">
                    Save User
                </button>

            </div>

        </form>

    </div>

</div>

@endsection