@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h2 class="mb-4">
        Search Results
    </h2>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <h5>
                Search Term:
                <span class="text-primary">
                    "{{ $query }}"
                </span>
            </h5>

        </div>
    </div>

    {{-- Assets --}}

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header">
            <strong>Assets Found ({{ $assets->count() }})</strong>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Asset Code</th>
                        <th>Asset Name</th>
                        <th>Serial No</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($assets as $asset)

                    <tr>
                        <td>
                            <a href="{{ route('assets.details', $asset->id) }}">
                                {{ $asset->asset_code }}
                            </a>
                        </td>
                        <td>{{ $asset->asset_name }}</td>
                        <td>{{ $asset->serial_no }}</td>
                        <td>{{ $asset->status }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            No Assets Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Users --}}

    <div class="card shadow-sm border-0">

        <div class="card-header">
            <strong>Users Found ({{ $users->count() }})</strong>
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Department</th>
                        <th>Role</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($users as $user)

                    <tr>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                {{ $user->name }}
                            </a>
                        </td>
                        <td>{{ $user->employee_id }}</td>
                        <td>{{ $user->department }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center">
                            No Users Found
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection