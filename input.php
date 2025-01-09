<?php
include 'database.php';
$db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center">Tambah User</h1>

    <form action="proses.php?aksi=tambah" method="post">
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="prodi">Prodi:</label>
            <input type="text" name="prodi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fakultas">Fakultas:</label>
            <input type="text" name="fakultas" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
