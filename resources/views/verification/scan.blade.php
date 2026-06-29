@extends('layouts.app')

@section('content')

<body>


<div class="container-fluid mt-3">

    <div class="card mb-3">

        <div class="card-body">

            <div class="row">

                <div class="col-md-3">
                    <strong>Verification No</strong><br>
                    {{ $session->verification_no }}
                </div>

                <div class="col-md-3">
                    <strong>Date</strong><br>
                    {{ $session->verification_date }}
                </div>

                <div class="col-md-3">
                    <strong>Verified By</strong><br>
                    {{ $session->verified_by }}
                </div>

                <div>
    <strong>Status</strong><br>

    @if($session->status == 'Completed')
        <span class="badge bg-success">
            Completed
        </span>
    @else
        <span class="badge bg-warning text-dark">
            Draft
        </span>
    @endif
</div>

                <div class="col-md-3">
                    <strong>Total Scanned</strong><br>
                    {{ $session->total_scanned }}
                </div>

                <form action="/verification/{{ $session->id }}/finalize"
      method="POST"
      class="mt-3">

    @csrf

    <button type="submit"
            class="btn btn-success">

        Save Verification

    </button>

</form>

            </div>

        </div>

    </div>

    <form method="POST"
          action="/verification/scan-asset/{{ $session->id }}">

        @csrf

        <input
            type="text"
            name="qr_code"
            id="qr_code"
            class="form-control scan-box mb-3"
            placeholder="Scan Asset QR Here"
            autofocus>

    </form>

    <div class="card">

        <div class="card-header">

            Verified Assets

        </div>

        <div class="card-body p-0">

            <table class="table table-bordered mb-0">

                <thead class="table-dark">

                <tr>

                    <th>Asset Code</th>

                    <th>Asset Name</th>

                    <th>Employee</th>

                    <th>Department</th>

                    <th>Status</th>

                    <th>Scan Time</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @foreach($items as $item)

                <tr>

                    <td>{{ $item->asset_code }}</td>

                    <td>{{ $item->asset_name }}</td>

                    <td>{{ $item->employee_name }}</td>

                    <td>{{ $item->department }}</td>

                    <td>

                        <span class="badge bg-success">
                            {{ $item->status }}
                        </span>

                    </td>

                    <td>{{ $item->scan_time }}</td>

                    <td>

    <a href="/verification/item/{{ $item->id }}/edit"
       class="btn btn-sm btn-primary">

       Edit

    </a>

</td>

                </tr>

                @endforeach

                </tbody>

            </table>

            <div class="mt-3 d-flex gap-2">

    <a href="/verification/{{ $session->id }}/save"
       class="btn btn-success">

       Save Verification

    </a>

    <a href="/verification/{{ $session->id }}/pdf"
       class="btn btn-danger">

       Export PDF

    </a>

    <a href="/verification/{{ $session->id }}/excel"
       class="btn btn-primary">

       Export Excel

    </a>

    <a href="/verification/{{ $session->id }}/finish"
       class="btn btn-dark">

       Finish Verification

    </a>

</div>

        </div>

    </div>

</div>

<script>

window.onload = function(){

    document
        .getElementById('qr_code')
        .focus();

};

</script>

</body>
@endsection