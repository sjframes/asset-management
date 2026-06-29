@extends('layouts.app')

@section('content')

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

@if(session('error'))

<div class="alert alert-danger alert-dismissible fade show">

    {{ session('error') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

@if(session('success'))

<div class="alert alert-success alert-dismissible fade show">

    {{ session('success') }}

    <button type="button"
            class="btn-close"
            data-bs-dismiss="alert">
    </button>

</div>

@endif

<h1 class="mb-2">Users Management</h1>

<p class="text-muted mb-4">
    Manage system users and permissions.
</p>

<div class="row mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Total Users</h6>
                <h2>{{ $users->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Active Users</h6>
                <h2>{{ $users->where('status','active')->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Inactive Users</h6>
                <h2>{{ $users->where('status','inactive')->count() }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <h6>Admins</h6>
                <h2>{{ $users->where('role','admin')->count() }}</h2>
            </div>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">Users</h5>

        <a href="/users/create" class="btn btn-primary">
            + Add User
        </a>

    </div>

    <div class="card-body">

        <table class="table">

            <thead>
                <tr>
                    <th>User</th>
                    <th>Name</th>
                    <th>Employee ID</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th width="180">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($users as $user)

                <tr>
                    <td>
    <div class="d-flex align-items-center gap-2">
        <div class="profile-avatar">
            {{ strtoupper(substr($user->name,0,1)) }}
        </div>
    </div>
</td>

                    <td>{{ $user->name }}</td>

                    <td>{{ $user->employee_id }}</td>

                    <td>{{ $user->department }}</td>

                    <td>{{ ucfirst($user->role) }}</td>

                    <td>
                        <span class="badge bg-success">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>
                    <td>
    @if($user->last_login)
    {{ \Carbon\Carbon::parse($user->last_login)->diffForHumans() }}
@else
    Never
@endif
</td>

                    <td>

                        <a href="{{ route('users.edit', $user->id) }}"
   class="btn btn-warning btn-sm">
    Edit
</a>

<form action="{{ route('users.reset-password', $user->id) }}"
      method="POST"
      style="display:inline;">

    @csrf

</form>

       @if($user->role != 'admin')

<form action="{{ route('users.destroy', $user->id) }}"
      method="POST"
      style="display:inline;">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="btn btn-danger btn-sm"
            onclick="return confirm('Delete this user?')">

        Delete

    </button>

</form>

@endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection