@extends('layouts.app')

@section('content')

<body>
<div class="container mt-5">

    <h2>Scan Asset</h2>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">← Go Back</a>

    <div class="card p-4">

        <label class="form-label">Scan QR Code</label>

        <input
    type="text"
    id="qrInput"
    class="form-control"
    placeholder="Scan Asset QR"
    autocomplete="off"
    autofocus>

    </div>

</div>

<script>

document.getElementById('qrInput')
.addEventListener('keydown', function(e){

    if(e.key === 'Enter'){

        e.preventDefault();

        let qrData = this.value.trim();

        let assetCode = qrData.split(' ')[0];

        if(assetCode !== ''){

            window.location =
                '/scan-lookup/' +
                encodeURIComponent(assetCode);
        }
    }
});

window.addEventListener('pageshow', function(){

    let input = document.getElementById('qrInput');

    input.value = '';

    input.focus();
});

</script>

</body>
@endsection