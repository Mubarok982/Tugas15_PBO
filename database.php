<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_pbo";  
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
    public function close() {
        $this->conn->close();
    }

    public function tampil_data() {
        $result = $this->conn->query("SELECT * FROM users");  

        $hasil = [];
        
        while ($row = $result->fetch_assoc()) {
            $hasil[] = $row;
        }

        return $hasil;  
    }
    public function get_user($id) {
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    
    public function hapus_data($id) {
        $query = "DELETE FROM users WHERE id = '$id'";
        $result = $this->conn->query($query);
    
        return $result;
    }
    
  
}
?>
