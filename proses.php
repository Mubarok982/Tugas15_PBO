<?php
include 'database.php'; // Memasukkan file database
$db = new Database();

if ($_GET['aksi'] == 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data user berdasarkan username
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah username ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect ke halaman tampil.php setelah login berhasil
            header("Location: tampil.php");
            exit();
        } else {
            // Jika password salah
            echo "<script>alert('Password salah!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        // Jika username tidak ditemukan
        echo "<script>alert('Username tidak ditemukan!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
}
?>
