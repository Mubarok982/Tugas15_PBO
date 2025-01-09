<?php
include 'database.php';
$db = new Database();

$id = $_GET['id'];
$user = $db->get_user($id); // Ambil data berdasarkan ID

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'];
    $npm = $_POST['npm'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Enkripsi password
    $prodi = $_POST['prodi'];
    $fakultas = $_POST['fakultas'];

    // Query untuk update data
    $query = "UPDATE users SET nama_lengkap = ?, npm = ?, username = ?, password = ?, prodi = ?, fakultas = ? WHERE id = ?";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("ssssssi", $nama_lengkap, $npm, $username, $password, $prodi, $fakultas, $id);

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
    <title>Edit User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fc; 
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        h1 {
            color: #007bff; 
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff; 
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; 
        }

        .form-control {
            border: 1px solid #ced4da; 
        }

        .form-group {
            margin-bottom: 1.5rem; 
        }
    </style>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Edit User</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $user['nama_lengkap']; ?>" required>
        </div>
        <div class="form-group">
            <label for="npm">NPM:</label>
            <input type="text" name="npm" class="form-control" value="<?php echo $user['npm']; ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" class="form-control" value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="prodi">Prodi:</label>
            <input type="text" name="prodi" class="form-control" value="<?php echo $user['prodi']; ?>" required>
        </div>
        <div class="form-group">
            <label for="fakultas">Fakultas:</label>
            <input type="text" name="fakultas" class="form-control" value="<?php echo $user['fakultas']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
    </form>
</div>
</body>
</html>
