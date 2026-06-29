@extends('layouts.app')

@section('content')

<body>

<!-- Page Header -->
 <div class="d-flex justify-content-between align-items-center mb-1">
<div class="mb-4">
    <h1 class="fw-bold">Assets</h1>
    <p class="text-muted">
        Manage and track all registered assets.
    </p>
</div>
<a href="/assets" class="btn btn-dark">
            ← Back
        </a>

    </div>

<!-- Search Card -->


<!-- KPI Cards -->
<div class="row mb-4">

    <div class="col-md-3">
        <div class="card kpi-card bg-primary text-white">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Total Assets</small>
                    <div class="kpi-value">
                        {{ $assets->count() }}
                    </div>
                </div>

                <i class="bi bi-box-seam kpi-icon"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card kpi-card bg-success text-white">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Available</small>
                    <div class="kpi-value">
                        {{ $assets->where('status','Available')->count() }}
                    </div>
                </div>

                <i class="bi bi-check-circle kpi-icon"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card kpi-card bg-warning text-dark">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Issued</small>
                    <div class="kpi-value">
                        {{ $assets->where('status','Issued')->count() }}
                    </div>
                </div>

                <i class="bi bi-person-badge kpi-icon"></i>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card kpi-card bg-danger text-white">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>Damaged</small>
                    <div class="kpi-value">
                        {{ $assets->where('status','Damaged')->count() }}
                    </div>
                </div>

                <i class="bi bi-exclamation-triangle kpi-icon"></i>
            </div>
        </div>
    </div>

</div>

<!-- Action Buttons -->
<div class="row mb-4">

    <div class="col-md-3">
        <a href="/assets/create"
           class="btn btn-primary w-100 py-3">
            + Add Asset
        </a>
    </div>

    <div class="col-md-3">
        <a href="/issues/create"
           class="btn btn-warning w-100 py-3">
            Issue Asset
        </a>
    </div>

    <div class="col-md-3">
        <a href="/verification/create"
           class="btn btn-info w-100 py-3">
            Asset Verification
        </a>
    </div>

    <div class="col-md-3">
        <a href="/history"
           class="btn btn-dark w-100 py-3">
            View History
        </a>
    </div>

</div>

<!-- Assets Table -->
<div class="glass-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4 class="mb-0">
            Assets List
        </h4>

        <span class="badge bg-primary">
            {{ $assets->count() }} Assets
        </span>

    </div>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Asset Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Serial No</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th width="250">Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($assets as $asset)

                <tr>

                    <td>{{ $asset->id }}</td>

                    <td>
                        <strong>
                            {{ $asset->asset_name }}
                        </strong>
                    </td>

                    <td>{{ $asset->brand }}</td>

                    <td>{{ $asset->model }}</td>

                    <td>{{ $asset->serial_no }}</td>

                    <td>{{ $asset->department }}</td>

                    <td>

                        @if($asset->status=='Available')
                            <span class="badge bg-success">
                                Available
                            </span>

                        @elseif($asset->status=='Issued')
                            <span class="badge bg-warning text-dark">
                                Issued
                            </span>

                        @elseif($asset->status=='Under Repair')
                            <span class="badge bg-info">
                                Under Repair
                            </span>

                        @elseif($asset->status=='Damaged')
                            <span class="badge bg-danger">
                                Damaged
                            </span>

                        @elseif($asset->status=='Disposed')
                            <span class="badge bg-dark">
                                Disposed
                            </span>
                        @endif

                    </td>

                    <td>

                        @if($asset->status=='Available')
                        <a href="/issues/create?asset_id={{ $asset->id }}"
                           class="btn btn-primary btn-sm">
                           Issue
                        </a>
                        @endif

                        <a href="/assets/{{ $asset->id }}/history"
                           class="btn btn-info btn-sm">
                           History
                        </a>

                        <a href="/assets/{{ $asset->id }}/edit"
                           class="btn btn-warning btn-sm">
                           Edit
                        </a>

                        <form
                            action="/assets/{{ $asset->id }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this asset?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8" class="text-center py-4">
                        No Assets Found
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
@endsection