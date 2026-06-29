@extends('layouts.app')

@section('content')

<body>


<div class="container mt-5">


    <div class="mb-4">
    <h2 class="fw-bold mb-1">
        Dashboard
    </h2>

    <p class="text-muted mb-0">
        Welcome back, {{ auth()->user()?->name ?? 'Admin' }}!
        Here's what's happening today.
    </p>


</div>


    <div class="row g-4 mb-4">

        <div class="col-lg-2 col-md-4">
    <div class="card kpi-card bg-primary shadow-lg border-0 card-hover text-white">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <small class="text-uppercase">Total Assets</small>
                <div class="kpi-value">{{ $totalAssets }}</div>
            </div>

            <i class="bi bi-box-seam kpi-icon"></i>
        </div>
    </div>
</div>

        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card bg-success text-white">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <small class="text-uppercase">Available</small>
            <div class="kpi-value">{{ $availableAssets }}</div>
        </div>

        <i class="bi bi-check-circle-fill kpi-icon"></i>
    </div>
</div>
        </div>

        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card bg-warning text-dark">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <small class="text-uppercase">Issued</small>
            <div class="kpi-value">{{ $issuedAssets }}</div>
        </div>

        <i class="bi bi-person-badge-fill kpi-icon"></i>
    </div>
</div>
        </div>

        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card bg-info text-white">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <small class="text-uppercase">Under Repair</small>
            <div class="kpi-value">{{ $repairAssets }}</div>
        </div>

        <i class="bi bi-tools kpi-icon"></i>
    </div>
</div>
        </div>

        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card bg-danger text-white">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <small class="text-uppercase">Damaged</small>
            <div class="kpi-value">{{ $damagedAssets }}</div>
        </div>

        <i class="bi bi-exclamation-triangle-fill kpi-icon"></i>
    </div>
</div>
        </div>

        <div class="col-lg-2 col-md-4">
            <div class="card kpi-card bg-dark text-white">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <small class="text-uppercase">Disposed</small>
            <div class="kpi-value">{{ $disposedAssets }}</div>
        </div>

        <i class="bi bi-trash-fill kpi-icon"></i>
    </div>
</div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">

    <div class="card border-0 shadow-sm h-100">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <small class="text-muted">
                        Total Asset Value
                    </small>

                    <h3 class="fw-bold mt-2">
                        ₹ {{ number_format($totalAssetValue, 2) }}
                    </h3>

                </div>

                <div class="fs-1 text-success">
                    <i class="fa-solid fa-indian-rupee-sign"></i>
                </div>

            </div>

        </div>

    </div>

</div>

    </div>

    <div class="row mt-4">

    <div class="col-lg-2 col-md-4">
        <a href="/assets/create" class="btn btn-primary w-100">
            <i class="fa-solid fa-plus"></i>
            Add Asset
        </a>
    </div>

    <div class="col-lg-2 col-md-4">
        <a href="/issues/create" class="btn btn-warning w-100">
            <i class="fa-solid fa-arrow-right"></i>
            Issue Asset
        </a>
    </div>

    <div class="col-lg-2 col-md-4">
        <a href="/scan" class="btn btn-success w-100">
            <i class="fa-solid fa-qrcode"></i>
            Scan Asset
        </a>
    </div>

    <div class="col-lg-2 col-md-4">
    <a href="/verification/create"
   class="btn btn-info w-100">
   <i class="fa-solid fa-clipboard-check"></i>
   Asset Verification
</a>
</div>

    <div class="col-lg-2 col-md-4">
        <a href="/history" class="btn btn-dark w-100">
            <i class="fa-solid fa-clock-rotate-left"></i>
            View History
        </a>
    </div>

</div>

<div class="card glass-card mt-4">

    <div class="card-header bg-white border-0 py-3">
    <h5 class="mb-0">
        <i class="bi bi-clock-history me-2"></i>
        Recent Activities
    </h5>
</div>

    <div class="card-body p-4">

        <table class="table table-hover align-middle">

            <thead class="table-dark">
                <tr>
                    <th>Employee</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            @foreach($recentActivities as $item)

            <tr>
                <td>
    <strong>{{ $item->employee_name }}</strong>
</td>
                <td>

@if($item->status == 'Active')
    <span class="badge bg-success">Active</span>

@elseif($item->status == 'Transferred')
    <span class="badge bg-warning text-dark">Transferred</span>

@elseif($item->status == 'Returned')
    <span class="badge bg-info">Returned</span>

@else
    <span class="badge bg-secondary">
        {{ $item->status }}
    </span>
@endif

</td>
                <td>
    {{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y h:i A') }}
</td>
            </tr>

            @endforeach

            </tbody>

        </table>

    </div>
    
</div>

<div class="row mt-4">

    <div class="col-lg-4 mb-4">
        <div class="card glass-card h-100">
            <div class="card-body">
                <h5 class="fw-bold">Assets By Status</h5>

                <canvas id="statusChart" height="220"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card glass-card h-100">
            <div class="card-body">
                <h5 class="fw-bold">Assets By Category</h5>

                <canvas id="categoryChart" height="220"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card glass-card h-100">
            <div class="card-body">
                <h5 class="fw-bold">Assets By Department</h5>

                <canvas id="departmentChart" height="220"></canvas>
            </div>
        </div>
    </div>

</div>



</div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('statusChart'), {
    type: 'doughnut',
    data: {
        labels: [
            'Available',
            'Issued',
            'Under Repair',
            'Damaged',
            'Disposed'
        ],
        datasets: [{
            data: [
                {{ $availableAssets }},
                {{ $issuedAssets }},
                {{ $repairAssets }},
                {{ $damagedAssets }},
                {{ $disposedAssets }}
            ]
        }]
    }
});

new Chart(document.getElementById('categoryChart'), {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($categorySummary->pluck('category')) !!},
        datasets: [{
            data: {!! json_encode($categorySummary->pluck('total')) !!}
        }]
    }
});

new Chart(document.getElementById('departmentChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($departmentSummary->pluck('department')) !!},
        datasets: [{
            label: 'Assets',
            data: {!! json_encode($departmentSummary->pluck('total')) !!}
        }]
    }
});

</script>

</body>
@endsection