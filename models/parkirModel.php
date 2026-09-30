<?php
class ParkirModel {
    private $conn;
    public function __construct($db) { $this->conn = $db; }

    public function simpanMasuk($plat, $jenis, $waktu) {
        $query = "INSERT INTO parkir (nomor_plat, jenis_kendaraan, waktu_masuk, status) 
                  VALUES ('$plat', '$jenis', '$waktu', 'parkir')";
        return mysqli_query($this->conn, $query);
    }

    public function cariKendaraan($plat) {
        $query = "SELECT * FROM parkir WHERE nomor_plat LIKE '%$plat%' AND status='parkir'";
        return mysqli_query($this->conn, $query);
    }

    public function getKendaraanById($id) {
        $query = "SELECT * FROM parkir WHERE id='$id'";
        return mysqli_fetch_assoc(mysqli_query($this->conn, $query));
    }

    public function updateKeluar($id, $waktu_keluar, $total_bayar) {
        $query = "UPDATE parkir SET waktu_keluar='$waktu_keluar', status='selesai', total_bayar='$total_bayar' WHERE id='$id'";
        return mysqli_query($this->conn, $query);
    }

    public function getAllData() {
        $query = "SELECT * FROM parkir ORDER BY id DESC";
        return mysqli_query($this->conn, $query);
    }
}
?>