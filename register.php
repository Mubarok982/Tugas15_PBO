<?php
include 'database.php';
$db = new Database(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $npm = $_POST['npm'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];

    // Query untuk menambah data
    $query = "INSERT INTO users (nama_lengkap, npm, username, password, prodi, fakultas) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("ssssss", $nama_lengkap, $npm, $username, $password, $prodi, $fakultas);

    if ($stmt->execute()) {
        header("Location: tampil.php");
        exit();
    } else {
        echo "Error: " . $db->conn->error;
    }
}
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
    <form method="POST">
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
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
</body>
</html>
