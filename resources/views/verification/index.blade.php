@extends('layouts.app')

@section('content')

<body>


<div class="container mt-4">

    <div class="d-flex justify-content-between">

        <h2>Asset Verification</h2>

        <a href="/verification/create"
           class="btn btn-primary">

            New Verification

        </a>

    </div>

    <hr>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>No</th>
                <th>Name</th>
                <th>Date</th>
                <th>Verified By</th>
                <th>Total Scanned</th>

            </tr>

        </thead>

        <tbody>

            @foreach($sessions as $session)

            <tr>

                <td>{{ $session->verification_no }}</td>

                <td>{{ $session->verification_name }}</td>

                <td>{{ $session->verification_date }}</td>

                <td>{{ $session->verified_by }}</td>

                <td>{{ $session->total_scanned }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</body>
@endsection