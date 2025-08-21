
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
            <h1 class="mb-3 text-center">Profile Page</h1>

            <hr>

            <ul class="list-group">
                <li class="list-group-item"><strong>Nama :</strong> {{ $name }}</li>
                <li class="list-group-item"><strong>Kelas :</strong> {{ $class }}</li>
                <li class="list-group-item"><strong>Jurusan :</strong> {{ $major }}</li>
            </ul>
    </div>

</body>
</html>
