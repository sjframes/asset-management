@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="mb-0">{{ $asset->asset_name }}</h1>
            <small class="text-muted">
                Asset Code: {{ $asset->asset_code }}
            </small>
        </div>

        <div>
            <a href="{{ route('assets.edit', $asset->id) }}"
               class="btn btn-primary">
                Edit Asset
            </a>

            <a href="{{ route('assets.index') }}"
               class="btn btn-secondary">
                Back
            </a>
        </div>

    </div>

    <div class="row">

        <div class="col-md-8">

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header">
                    <strong>Asset Information</strong>
                </div>

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th width="250">Asset Code</th>
                            <td>{{ $asset->asset_code }}</td>
                        </tr>

                        <tr>
                            <th>Asset Name</th>
                            <td>{{ $asset->asset_name }}</td>
                        </tr>

                        <tr>
                            <th>Category</th>
                            <td>{{ $asset->category }}</td>
                        </tr>

                        <tr>
                            <th>Brand</th>
                            <td>{{ $asset->brand }}</td>
                        </tr>

                        <tr>
                            <th>Model</th>
                            <td>{{ $asset->model }}</td>
                        </tr>

                        <tr>
                            <th>Serial Number</th>
                            <td>{{ $asset->serial_no }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $asset->status }}</td>
                        </tr>

                    </table>

                </div>

            </div>

            <div class="card shadow-sm border-0">

                <div class="card-header">
                    <strong>Assignment Information</strong>
                </div>

                <div class="card-body">

                    <table class="table">

                        <tr>
                            <th width="250">Assigned To</th>
                            <td>{{ $asset->assigned_to }}</td>
                        </tr>

                        <tr>
                            <th>Department</th>
                            <td>{{ $asset->department }}</td>
                        </tr>

                        <tr>
                            <th>Location</th>
                            <td>{{ $asset->location }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow-sm border-0 mb-4">

                <div class="card-header">
                    <strong>Purchase Information</strong>
                </div>

                <div class="card-body">

                    <p>
                        <strong>Purchase Date:</strong><br>
                        {{ $asset->purchase_date }}
                    </p>

                    <p>
                        <strong>Invoice No:</strong><br>
                        {{ $asset->invoice_no }}
                    </p>

                    <p>
                        <strong>Purchase Cost:</strong><br>
                        ₹{{ $asset->purchase_cost }}
                    </p>

                    <p>
                        <strong>Supplier:</strong><br>
                        {{ $asset->supplier }}
                    </p>

                </div>

            </div>

            <div class="card shadow-sm border-0">

                <div class="card-header">
                    <strong>QR Information</strong>
                </div>

                <div class="card-body">

                    <p>
                        <strong>QR Value</strong>
                    </p>

                    <div class="bg-light p-3 rounded">
                        {{ $asset->qr_value }}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection