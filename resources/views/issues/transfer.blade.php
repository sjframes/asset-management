@extends('layouts.app')

@section('content')

<body>


<div class="container mt-4">

    <h2>Transfer Asset</h2>

    <form action="/issues/{{ $issue->id }}/transfer" method="POST">
    @csrf

        <div class="mb-3">
            <label>Asset</label>
            <input type="text"
                   class="form-control"
                   value="{{ $issue->asset->asset_code }} - {{ $issue->asset->asset_name }}"
                   readonly>
        </div>

        <div class="mb-3">
            <label>Current Employee</label>
            <input type="text"
                   class="form-control"
                   value="{{ $issue->employee_name }}"
                   readonly>
        </div>

        <div class="mb-3">
            <label>New Employee Name</label>
            <input type="text"
                   class="form-control"
                   name="employee_name">
        </div>

        <div class="mb-3">
            <label>New Employee ID</label>
            <input type="text"
                   class="form-control"
                   name="employee_id">
        </div>

        <div class="mb-3">
            <label>Department</label>
            <input type="text"
                   class="form-control"
                   name="department">
        </div>

        <button class="btn btn-warning">
            Transfer Asset
        </button>

    </form>

</div>

</body>
@endsection