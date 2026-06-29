@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold mb-1">Edit User</h1>
        <p class="text-muted mb-0">
            Update user information
        </p>
    </div>

    <a href="/users" class="btn btn-dark">
        ← Back
    </a>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <form action="{{ route('users.update', $user->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label>Name</label>
                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Username</label>
                    <input type="text"
                           value="{{ $user->username }}"
                           class="form-control"
                           readonly>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Employee ID</label>
                    <input type="text"
                           name="employee_id"
                           value="{{ $user->employee_id }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Department</label>
                    <input type="text"
                           name="department"
                           value="{{ $user->department }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Designation</label>
                    <input type="text"
                           name="designation"
                           value="{{ $user->designation }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone</label>
                    <input type="text"
                           name="phone"
                           value="{{ $user->phone }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Role</label>

                    <select name="role" class="form-control">

                        <option value="admin"
                            {{ $user->role == 'admin' ? 'selected' : '' }}>
                            Admin
                        </option>

                        <option value="manager"
                            {{ $user->role == 'manager' ? 'selected' : '' }}>
                            Manager
                        </option>

                        <option value="user"
                            {{ $user->role == 'user' ? 'selected' : '' }}>
                            User
                        </option>

                    </select>

                </div>

                <div class="col-md-6 mb-3">
                    <label>Status</label>

                    <select name="status" class="form-control">

                        <option value="active"
                            {{ $user->status == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive"
                            {{ $user->status == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                </div>

            </div>

            <div class="text-end">

                <button type="submit"
                        class="btn btn-primary">
                    Update User
                </button>

            </div>

        </form>

        <form action="{{ route('users.reset-password', $user->id) }}"
      method="POST"
      class="d-inline">

    @csrf

    <button type="submit"
        class="btn btn-info btn-sm"
        onclick="return confirm('Reset password for this user?')">

        Reset Password

    </button>

</form>

    </div>

</div>

@endsection