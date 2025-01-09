<?php
include 'database.php'; 
$db = new Database();   

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $db->hapus_data($id);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
    } else {
        echo "<script>alert('Data gagal dihapus!');</script>";
    }

    echo "<script>window.location.href = 'tampil.php';</script>";
} else {
    echo "<script>alert('ID tidak ditemukan!');</script>";
    echo "<script>window.location.href = 'tampil.php';</script>";
}
?>
