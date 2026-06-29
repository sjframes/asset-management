@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold mb-1">
            Activity Logs
        </h1>

        <p class="text-muted mb-0">
            System audit trail and user activities
        </p>
    </div>

</div>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($logs as $log)

                    <tr>

                        <td>{{ $log->id }}</td>

                        <td>
                            {{ $log->user_name }}
                        </td>

                        <td>

                            @if($log->action == 'Create User')
                                <span class="badge bg-success">
                                    {{ $log->action }}
                                </span>

                            @elseif($log->action == 'Update User')
                                <span class="badge bg-primary">
                                    {{ $log->action }}
                                </span>

                            @elseif($log->action == 'Delete User')
                                <span class="badge bg-danger">
                                    {{ $log->action }}
                                </span>

                            @elseif($log->action == 'Reset Password')
                                <span class="badge bg-warning text-dark">
                                    {{ $log->action }}
                                </span>

                            @else
                                <span class="badge bg-secondary">
                                    {{ $log->action }}
                                </span>
                            @endif

                        </td>

                        <td>
                            {{ $log->description }}
                        </td>

                        <td>
                            {{ $log->created_at->format('d M Y h:i A') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            No activity found
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection