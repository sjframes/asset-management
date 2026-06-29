@extends('layouts.app')

@section('content')
<body>

<div class="container mt-5">

    <div class="glass-card p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold mb-1">Add Asset</h1>
            <p class="text-muted mb-0">
                Register a new company asset
            </p>
        </div>

        <a href="/assets" class="btn btn-dark">
            ← Back
        </a>

    </div>

<form method="POST" action="/assets">
    @csrf

    <div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Asset Code</label>
        <input type="text" name="asset_code" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">QR Value</label>
        <input type="text" name="qr_value" class="form-control">
    </div>

</div>

    <div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Asset Name</label>
        <input type="text" name="asset_name" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Category</label>
        <select name="category" class="form-select">
    <option value="">Select Category</option>
    <option>Desktop</option>
    <option>Laptop</option>
    <option>Printer</option>
    <option>Scanner</option>
    <option>UPS</option>
    <option>Network Device</option>
    <option>Furniture</option>
    <option>Accessories</option>
    <option>AC</option>
    <option>Generator</option>
    <option>Mannequine</option>
    <option>Battery</option>
    <option>Mobile</option>
    <option>Speaker</option>
    <option>Punching Machine</option>
    <option>Vehicle</option>
    <option>Water Dispenser</option>
    <option>Other</option>
</select>
    </div>

</div>

    <div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Model</label>
        <input type="text" name="model" class="form-control">
    </div>

</div>

    <div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Device Name</label>
        <input type="text" name="device_name" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Serial No</label>
        <input type="text" name="serial_no" class="form-control">
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Device ID</label>
        <input type="text" name="device_id" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Quantity</label>
        <input type="text" name="quantity" class="form-control">
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Remarks</label>
        <input type="text" name="remarks" class="form-control">
    </div>

</div>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Floor No</label>
        <input type="text" name="floor_no" class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Department</label>
        <select name="department" class="form-select">
            <option value="">Select Department</option>
            <option>MD OFFICE</option>
            <option>ACCOUNTS</option>
            <option>HR</option>
            <option>PROJECT & IT</option>
            <option>MARKETING</option>
            <option>PURCHASE</option>
            <option>SOCIAL MEDIA</option>
            <option>SALES</option>
            <option>OPERATIONS</option>
            <option>ADMINISTRATION</option>
            <option>WAREHOUSE</option>
        </select>
    </div>

    <div class="row mt-4">

    <h5 class="mb-3">
        Purchase Details
    </h5>

    <div class="col-md-6 mb-3">
        <label>Purchase Date</label>
        <input type="date"
               name="purchase_date"
               class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Purchase Cost (₹)</label>
        <input type="number"
               step="0.01"
               name="purchase_cost"
               class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Supplier / Vendor</label>
        <input type="text"
               name="supplier"
               class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label>Invoice Number</label>
        <input type="text"
               name="invoice_no"
               class="form-control">
    </div>

</div>

</div>

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="Available">Available</option>
        <option value="Issued">Issued</option>
        <option value="Under Repair">Under Repair</option>
        <option value="Damaged">Damaged</option>
        <option value="Disposed">Disposed</option>
    </select>
</div>

    <div class="text-end mt-4">

    <a href="/assets"
       class="btn btn-light px-4">
        Cancel
    </a>

    <button type="submit"
            class="btn btn-primary px-5">
        Save Asset
    </button>

</div>

</form>
</div>

</body>
@endsection