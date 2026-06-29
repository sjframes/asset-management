@extends('layouts.app')

@section('content')

<div class="container-fluid mt-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">Edit Asset</h1>
        <p class="text-muted mb-0">
            Update asset information and purchase details
        </p>
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left me-2"></i>
        Back
    </a>
</div>

<form method="POST" action="/assets/{{ $asset->id }}">
    @csrf
    @method('PUT')

    <div class="row">

        <!-- LEFT COLUMN -->
        <div class="col-lg-8">

            <!-- Asset Information -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        Asset Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Asset Code</label>
                            <input type="text"
                                name="asset_code"
                                class="form-control"
                                value="{{ $asset->asset_code }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>QR Value</label>
                            <input type="text"
                                name="qr_value"
                                class="form-control"
                                value="{{ $asset->qr_value }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Asset Name</label>
                            <input type="text"
                                name="asset_name"
                                class="form-control"
                                value="{{ $asset->asset_name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Category</label>
                            <select name="category" class="form-select">

    <option value="">Select Category</option>

    <option value="Desktop" {{ $asset->category == 'Desktop' ? 'selected' : '' }}>
        Desktop
    </option>

    <option value="Laptop" {{ $asset->category == 'Laptop' ? 'selected' : '' }}>
        Laptop
    </option>

    <option value="Printer" {{ $asset->category == 'Printer' ? 'selected' : '' }}>
        Printer
    </option>

    <option value="Scanner" {{ $asset->category == 'Scanner' ? 'selected' : '' }}>
        Scanner
    </option>

    <option value="Mobile" {{ $asset->category == 'Mobile' ? 'selected' : '' }}>
        Mobile
    </option>

    <option value="Network Device" {{ $asset->category == 'Network Device' ? 'selected' : '' }}>
        Network Device
    </option>

    <option value="Furniture" {{ $asset->category == 'Furniture' ? 'selected' : '' }}>
        Furniture
    </option>

    <option value="Accessories" {{ $asset->category == 'Accessories' ? 'selected' : '' }}>
        Accessories
    </option>

    <option value="AC" {{ $asset->category == 'AC' ? 'selected' : '' }}>
        AC
    </option>

    <option value="Generator" {{ $asset->category == 'Generator' ? 'selected' : '' }}>
        Generator
    </option>

    <option value="Mannequine" {{ $asset->category == 'Mannequine' ? 'selected' : '' }}>
        Mannequine
    </option>

    <option value="Battery" {{ $asset->category == 'Battery' ? 'selected' : '' }}>
        Battery
    </option>

    <option value="Mobile" {{ $asset->category == 'Mobile' ? 'selected' : '' }}>
        Mobile
    </option>

    <option value="Speaker" {{ $asset->category == 'Speaker' ? 'selected' : '' }}>
        Speaker
    </option>

    <option value="Punching Machine" {{ $asset->category == 'Punching Machine' ? 'selected' : '' }}>
        Punching Machine
    </option>

    <option value="Vehicle" {{ $asset->category == 'Vehicle' ? 'selected' : '' }}>
        Vehicle
    </option>

    <option value="Water Dispenser" {{ $asset->category == 'Water Dispenser' ? 'selected' : '' }}>
        Water Dispenser
    </option>

    <option value="Other" {{ $asset->category == 'Other' ? 'selected' : '' }}>
        Other
    </option>

</select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Brand</label>
                            <input type="text"
                                name="brand"
                                class="form-control"
                                value="{{ $asset->brand }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Model</label>
                            <input type="text"
                                name="model"
                                class="form-control"
                                value="{{ $asset->model }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Device Name</label>
                            <input type="text"
                                name="device_name"
                                class="form-control"
                                value="{{ $asset->device_name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Device ID</label>
                            <input type="text"
                                name="device_id"
                                class="form-control"
                                value="{{ $asset->device_id }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Serial Number</label>
                            <input type="text"
                                name="serial_no"
                                class="form-control"
                                value="{{ $asset->serial_no }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Quantity</label>
                            <input type="number"
                                name="quantity"
                                class="form-control"
                                value="{{ $asset->quantity }}">
                        </div>

                    </div>

                </div>
            </div>

            <!-- Assignment Information -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        Assignment Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label>Department</label>
                            <select name="department" class="form-select">

    <option value="">Select Department</option>

    <option value="MD OFFICE" {{ $asset->department == 'MD OFFICE' ? 'selected' : '' }}>
        MD OFFICE
    </option>

    <option value="ACCOUNTS" {{ $asset->department == 'ACCOUNTS' ? 'selected' : '' }}>
        ACCOUNTS
    </option>

    <option value="HR" {{ $asset->department == 'HR' ? 'selected' : '' }}>
        HR
    </option>

    <option value="SALES" {{ $asset->department == 'SALES' ? 'selected' : '' }}>
        SALES
    </option>

    <option value="MARKETING" {{ $asset->department == 'MARKETING' ? 'selected' : '' }}>
        MARKETING
    </option>

    <option value="PURCHASE" {{ $asset->department == 'PURCHASE' ? 'selected' : '' }}>
        PURCHASE
    </option>

    <option value="WAREHOUSE" {{ $asset->department == 'WAREHOUSE' ? 'selected' : '' }}>
        WAREHOUSE
    </option>

    <option value="OPERATIONS" {{ $asset->department == 'OPERATIONS' ? 'selected' : '' }}>
        OPERATIONS
    </option>

    <option value="IT" {{ $asset->department == 'PROJECT & IT' ? 'selected' : '' }}>
        PROJECT & IT
    </option>

    <option value="IT" {{ $asset->department == 'SOCIAL MEDIA' ? 'selected' : '' }}>
        SOCIAL MEDIA
    </option>

    <option value="IT" {{ $asset->department == 'ADMINISTRATION' ? 'selected' : '' }}>
        ADMINISTRATION
    </option>

</select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Location</label>
                            <input type="text"
                                name="location"
                                class="form-control"
                                value="{{ $asset->location }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Floor No</label>
                            <input type="text"
                                name="floor_no"
                                class="form-control"
                                value="{{ $asset->floor_no }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status</label>

                            <select name="status" class="form-select">

                                <option value="Available">Available</option>
                                <option value="Issued">Issued</option>
                                <option value="Under Repair">Under Repair</option>
                                <option value="Damaged">Damaged</option>
                                <option value="Disposed">Disposed</option>

                            </select>
                        </div>

                    </div>

                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">
                        Purchase Information
                    </h5>
                </div>

                <div class="card-body">

                    <div class="mb-3">
                        <label>Purchase Date</label>
                        <input type="date"
                            name="purchase_date"
                            class="form-control"
                            value="{{ $asset->purchase_date }}">
                    </div>

                    <div class="mb-3">
                        <label>Purchase Cost</label>
                        <input type="number"
                            step="0.01"
                            name="purchase_cost"
                            class="form-control"
                            value="{{ $asset->purchase_cost }}">
                    </div>

                    <div class="mb-3">
                        <label>Supplier</label>
                        <input type="text"
                            name="supplier"
                            class="form-control"
                            value="{{ $asset->supplier }}">
                    </div>

                    <div class="mb-3">
                        <label>Invoice Number</label>
                        <input type="text"
                            name="invoice_no"
                            class="form-control"
                            value="{{ $asset->invoice_no }}">
                    </div>

                </div>
            </div>

            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body text-center">

                    <h6 class="text-muted">
                        Asset Status
                    </h6>

                    <span class="badge bg-success fs-6 px-3 py-2">
                        {{ $asset->status }}
                    </span>

                </div>
            </div>

        </div>

    </div>

    <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary px-4">
            Update Asset
        </button>
    </div>

</form>
```

</div>

@endsection
