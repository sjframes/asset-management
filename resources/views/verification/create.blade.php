@extends('layouts.app')

@section('content')

<body>


<div class="container mt-4">

<h2>Start Verification</h2>

<hr>

<form method="POST"
      action="/verification/start">

@csrf

<div class="mb-3">

<label>Verification Name</label>

<input type="text"
       name="verification_name"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Date</label>

<input type="date"
       name="verification_date"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Verified By</label>

<input type="text"
       name="verified_by"
       class="form-control"
       required>

</div>

<div class="mb-3">

<label>Remarks</label>

<textarea
name="remarks"
class="form-control"></textarea>

</div>

<button class="btn btn-success">

Start Verification

</button>

</form>

</div>

</body>
@endsection