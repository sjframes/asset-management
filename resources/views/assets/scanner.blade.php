@extends('layouts.app')

@section('content')

<body>


<div class="container mt-5">

    <h2>Scan Asset QR Code</h2>

    <div id="reader" style="width:500px;"></div>

</div>

<script>
function onScanSuccess(decodedText, decodedResult)
{
    window.location.href = "/qr/" + decodedText;
}

let html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    {
        fps: 10,
        qrbox: 250
    }
);

html5QrcodeScanner.render(onScanSuccess);
</script>

</body>
@endsection