<?php
include_once 'database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($nama_lengkap, $npm, $username, $password, $prodi, $fakultas) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (nama_lengkap, npm, username, password, prodi, fakultas) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("ssssss", $nama_lengkap, $npm, $username, $password_hash, $prodi, $fakultas);
        $stmt->execute();
        $stmt->close();
    }

    // Login user
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getAllUsers() {
        $query = "SELECT * FROM users";
        $result = $this->db->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    public function updateUser($id, $nama_lengkap, $npm, $username, $prodi, $fakultas) {
        $query = "UPDATE users SET nama_lengkap = ?, npm = ?, username = ?, prodi = ?, fakultas = ? WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("sssssi", $nama_lengkap, $npm, $username, $prodi, $fakultas, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE id = ?";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
