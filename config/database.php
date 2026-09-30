<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "db_parkir";
    public $conn;

    public function getConnection() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conn) {
            die("Koneksi Error: " . mysqli_connect_error());
        }
        return $this->conn;
    }
}
?>