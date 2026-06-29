@extends('layouts.app')

@section('content')

<body>


<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Asset History</h1>

    <div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">
            ← Back
        </a>

        <a href="{{ url('/assets') }}" class="btn btn-primary">
            Assets
        </a>
    </div>
</div>

    <div class="card mb-3">
        <div class="card-body">

            <h4>{{ $asset->asset_name }}</h4>

            <p>
                Asset Code:
                {{ $asset->asset_code }}
            </p>

            <p>
                Status:
                {{ $asset->status }}
            </p>

        </div>
    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Employee</th>
                <th>Department</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>

        <tbody>

        @foreach($issues as $issue)

            <tr>
                <td>{{ $issue->employee_name }}</td>
                <td>{{ $issue->department }}</td>
                <td>{{ $issue->issue_date }}</td>
                <td>{{ $issue->return_date }}</td>
                <td>{{ $issue->status }}</td>
                <td>{{ $issue->remarks }}</td>
            </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
@endsection