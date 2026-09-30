<?php
class AuthModel {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function cekLogin($username, $password) {
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($this->conn, $query);
        return mysqli_num_rows($result) > 0;
    }
}
?>