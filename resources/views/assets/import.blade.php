<!DOCTYPE html>
<html>
<head>
    <title>Import Assets</title>
</head>
<body>

<h1>Import Assets Excel</h1>

<form action="/assets/import"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <input type="file" name="file">

    <button type="submit">
        Import Excel
    </button>

</form>

</body>
</html>