@extends('layouts.app')

@section('content')

<body>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-1">

    <div class="mb-4">
    <h1 class="fw-bold display-6 mb-1">
        Asset History
    </h1>

    <p class="text-muted">
        Track all asset movements, issues and returns.
    </p>
</div>

<a href="/assets" class="btn btn-dark">
            ← Back
        </a>

    </div>

<div class="glass-card p-4">

    <h4 class="mb-4">
        Asset History Records
    </h4>

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>Asset</th>
                <th>Employee</th>
                <th>Department</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

        @if($issues->count() == 0)
<tr>
    <td colspan="6" class="text-center py-5 text-muted">
        No history records found.
    </td>
</tr>
@endif

        @foreach($issues as $issue)

            <tr>
                <td>{{ $issue->asset->asset_name }}</td>
                <td>{{ $issue->employee_name }}</td>
                <td>{{ $issue->department }}</td>
                <td>{{ $issue->issue_date }}</td>
                <td>{{ $issue->return_date }}</td>
                <td>{{ $issue->status }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>
    </div>

</div>

</body>
@endsection