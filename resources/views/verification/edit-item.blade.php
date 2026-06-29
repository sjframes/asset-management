@extends('layouts.app')

@section('content')

<body>


<div class="container mt-4">

<h3>Edit Verification Item</h3>

<form method="POST"
      action="/verification/item/{{ $item->id }}/update">

@csrf

<div class="mb-3">

<label>Employee Name</label>

<input
type="text"
name="employee_name"
class="form-control"
value="{{ $item->employee_name }}">

</div>

<div class="mb-3">

<label>Department</label>

<input
type="text"
name="department"
class="form-control"
value="{{ $item->department }}">

</div>

<button class="btn btn-success">

Save Verification Data

</button>

</form>

</div>

</body>
@endsection