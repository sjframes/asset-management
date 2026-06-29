@extends('layouts.app')

@section('content')

<body>
<div class="container mt-4">
    <div class="card">

        <div class="card-header">
            Asset Details
        </div>

        <div class="card-body">

            <h3>{{ $asset->asset_name }}</h3>

            <div class="mb-3">

    <a href="{{ url()->previous() }}" class="btn btn-secondary">← Go Back</a>

<a href="{{ route('assets.index') }}" class="btn btn-primary">Assets</a>

<a href="{{ route('assets.history', $asset->id) }}" class="btn btn-info">History</a>

<a href="{{ route('assets.edit', $asset->id) }}" class="btn btn-warning">
    Edit Asset
</a>

</div>

            <table class="table">

                <tr>
                    <th>Asset Code</th>
                    <td>{{ $asset->asset_code }}</td>
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
                    <th>Department</th>
                    <td>{{ $asset->department }}</td>
                </tr>

                <tr>
                    <th>Location</th>
                    <td>{{ $asset->location }}</td>
                </tr>

                <tr>
                    <th>Status</th>
                    <td>{{ $asset->status }}</td>
                </tr>

                @if($currentIssue)

<tr>
    <th>Current Holder</th>
    <td>{{ $currentIssue->employee_name }}</td>
</tr>

<tr>
    <th>Employee ID</th>
    <td>{{ $currentIssue->employee_id }}</td>
</tr>

<tr>
    <th>Department</th>
    <td>{{ $currentIssue->department }}</td>
</tr>

@endif

            </table>

        </div>

    </div>

</div>

</body>
@endsection