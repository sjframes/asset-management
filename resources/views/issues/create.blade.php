@extends('layouts.app')

@section('content')

<body>

<div class="container mt-4">

    <div class="glass-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold mb-1">Issue Asset</h1>
            <p class="text-muted mb-0">
                Assign company assets to employees
            </p>
        </div>

        <a href="/issues" class="btn btn-dark">
            ← Back
        </a>

    </div>

    <form action="/issues/store" method="POST">
    @csrf

        @if($selectedAsset)

<div class="card shadow-sm border-0 mb-4 asset-card">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-start">

            <div>

                <small class="text-muted fw-semibold">
                    Selected Asset
                </small>

                <h2 class="fw-bold mt-2 mb-1">
                    {{ $selectedAsset->asset_name }}
                </h2>

                <div class="text-muted">
                    Asset Code :
                    <strong>{{ $selectedAsset->asset_code }}</strong>
                </div>

            </div>

            <div>

                @if($selectedAsset->status=="Available")

                    <span class="badge bg-success fs-6 px-3 py-2">
                        Available
                    </span>

                @elseif($selectedAsset->status=="Issued")

                    <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                        Issued
                    </span>

                @elseif($selectedAsset->status=="Under Repair")

                    <span class="badge bg-info fs-6 px-3 py-2">
                        Under Repair
                    </span>

                @elseif($selectedAsset->status=="Damaged")

                    <span class="badge bg-danger fs-6 px-3 py-2">
                        Damaged
                    </span>

                @endif

            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-3">
                <small class="text-muted">Category</small>
                <div class="fw-semibold">
                    {{ $selectedAsset->category }}
                </div>
            </div>

            <div class="col-md-3">
                <small class="text-muted">Department</small>
                <div class="fw-semibold">
                    {{ $selectedAsset->department }}
                </div>
            </div>

            <div class="col-md-3">
                <small class="text-muted">Brand</small>
                <div class="fw-semibold">
                    {{ $selectedAsset->brand }}
                </div>
            </div>

            <div class="col-md-3">
                <small class="text-muted">Model</small>
                <div class="fw-semibold">
                    {{ $selectedAsset->model }}
                </div>
            </div>

        </div>

    </div>

</div>

@else

<div class="mb-3">

    <label class="form-label">Select Asset</label>

    <select name="asset_id" class="form-select">

        <option value="">Choose Asset</option>

        @foreach($assets as $asset)

            <option value="{{ $asset->id }}">
                {{ $asset->asset_code }} - {{ $asset->asset_name }}
            </option>

        @endforeach

    </select>

</div>

@endif

<div class="row">
        <div class="col-md-6 mb-3">
            <label>Employee Name</label>
            <input type="text" name="employee_name" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Employee ID</label>
            <input type="text" name="employee_id" class="form-control">
        </div>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label>Department</label>
            <select name="department" class="form-select">
    <option value="">Select Department</option>
    <option>MD OFFICE</option>
    <option>Accounts</option>
    <option>HR</option>
    <option>IT</option>
    <option>Marketing</option>
    <option>Purchase</option>
    <option>Sales</option>
    <option>Warehouse</option>
</select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Issue Date</label>
            <input type="date" name="issue_date" class="form-control">
        </div>
        </div>

        <div class="row">
        <div class="col-md-6 mb-3">
            <label>Expected Return Date</label>
            <input type="date" name="expected_return" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control"></textarea>
        </div>
        </div>

        <div class="text-end mt-4">

    <a href="/issues"
       class="btn btn-light px-4">
        Cancel
    </a>

    <button
        type="submit"
        class="btn btn-primary px-5">
        Issue Asset
    </button>

</div>

    </form>

</div>

</body>
@endsection