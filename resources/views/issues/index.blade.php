@extends('layouts.app')

@section('content')

<body>

<div class="d-flex justify-content-between align-items-center mb-1">
    <div class="mb-4">
    <h1 class="fw-bold display-6 mb-1">
        Issued Assets
    </h1>

    <p class="text-muted">
        Track and manage all issued company assets.
    </p>
</div>
<a href="/assets" class="btn btn-dark">
            ← Back
        </a>

    </div>

<div class="row mb-4">

    <div class="col-md-3">
        <div class="kpi-card bg-primary text-white p-4 d-flex justify-content-between align-items-center">
            <div>
    <h6>Total Issued</h6>
    <h1>{{ $issues->count() }}</h1>
</div>

<i class="bi bi-box-seam fs-1 opacity-75"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="kpi-card bg-success text-white p-4 d-flex justify-content-between align-items-center">
            <div>
    <h6>Active</h6>
    <h1>{{ $issues->where('status','Issued')->count() }}</h1>
</div>

<i class="bi bi-check-circle fs-1 opacity-75"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="kpi-card bg-warning text-dark p-4 d-flex justify-content-between align-items-center">
            <div>
    <h6>Returned</h6>
    <h1>{{ $issues->where('status','Returned')->count() }}</h1>
</div>

<i class="bi bi-arrow-return-left fs-1 text-dark opacity-50"></i>
        </div>
    </div>

    <div class="col-md-3">
        <div class="kpi-card bg-danger text-white p-4 d-flex justify-content-between align-items-center">
            <div>
    <h6>Overdue</h6>
    <h1>0</h1>
</div>

<i class="bi bi-exclamation-triangle fs-1 text-white opacity-50"></i>
        </div>
    </div>

</div>

<div class="glass-card p-4">

<div class="d-flex justify-content-between align-items-center mb-4">

    <h4 class="mb-0">
        Issued Assets List
    </h4>

    <span class="badge bg-primary">
        {{ $issues->count() ?? 0 }} Records
    </span>

</div>

    <table class="table table-hover align-middle">

        <thead>
            <tr>
                <th>Asset</th>
                <th>Employee</th>
                <th>Department</th>
                <th>Issue Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        @if($issues->count() == 0)

<tr>
    <td colspan="5" class="text-center py-5 text-muted">
        No issued assets found.
    </td>
</tr>

@endif

        @foreach($issues as $issue)

        <tr>

            <td>
                {{ $issue->asset->asset_name ?? 'N/A' }}
            </td>

            <td>
                {{ $issue->employee_name }}
            </td>

            <td>
                {{ $issue->department }}
            </td>

            <td>
                {{ $issue->issue_date }}
            </td>

            <td>
                <a href="/issues/{{ $issue->id }}/transfer"
   class="btn btn-warning btn-sm">
   Transfer
</a>

                <form action="/issues/{{ $issue->id }}/return" method="POST" style="display:inline;">
    @csrf
    <button type="submit"
        class="btn btn-success btn-sm"
        onclick="return confirm('Are you sure you want to return this asset?')">
        Return
    </button>
</form>

            </td>

        </tr>


        @endforeach

        </tbody>

    </table>
    </div>

</div>

</body>
@endsection