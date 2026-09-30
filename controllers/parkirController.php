<?php
class ParkirController {
    private $model;
    public function __construct($db) {
        $this->model = new ParkirModel($db);
    }

    public function dashboard() { include 'views/dashboard.php'; }
    public function masuk() { include 'views/parkir_masuk.php'; }
    
    public function simpan_masuk() {
        if (isset($_POST['simpan'])) {
            $plat = $_POST['nomor_plat'];
            $jenis = $_POST['jenis_kendaraan'];
            $waktu = date('Y-m-d H:i:s');
            if ($this->model->simpanMasuk($plat, $jenis, $waktu)) {
                echo "<script>alert('Penyimpanan sukses! Kendaraan berhasil didata.'); window.location='index.php?mod=parkir&act=masuk';</script>";
            }
        }
    }

    public function keluar() {
        $hasil_cari = null;
        if (isset($_POST['cari'])) {
            $hasil_cari = $this->model->cariKendaraan($_POST['nomor_plat']);
        }
        include 'views/parkir_keluar.php';
    }

    public function proses_keluar() {
        if (isset($_POST['keluar'])) {
            $id = $_POST['id'];
            $data = $this->model->getKendaraanById($id);
            
            $waktu_masuk_ts = strtotime($data['waktu_masuk']);
            $waktu_keluar_ts = time();
            $waktu_keluar_db = date('Y-m-d H:i:s');
            
            $selisih_detik = $waktu_keluar_ts - $waktu_masuk_ts;
            $jam_parkir = ceil($selisih_detik / 3600);
            if ($jam_parkir < 1) $jam_parkir = 1;
            
            $tarif_awal = ($data['jenis_kendaraan'] == 'roda 2') ? 2000 : 5000;
            $biaya_tambahan = 0;
            if ($jam_parkir > 2) {
                $biaya_tambahan = ($jam_parkir - 2) * 1000;
            }
            $total_bayar = $tarif_awal + $biaya_tambahan;

            $this->model->updateKeluar($id, $waktu_keluar_db, $total_bayar);
            
            echo "<script>
                alert('KENDARAAN KELUAR! \\nPlat: ".$data['nomor_plat']." \\nLama Parkir: $jam_parkir Jam \\nTOTAL BAYAR: Rp. ".number_format($total_bayar,0,',','.')."');
                window.location='index.php?mod=parkir&act=keluar';
            </script>";
        }
    }

    public function laporan() {
        $data_parkir = $this->model->getAllData();
        include 'views/laporan.php';
    }

    public function export() {
        header("Content-type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=Laporan_Parkir.xls");
        $data_parkir = $this->model->getAllData();
        echo "<table border='1'><tr><th>ID</th><th>Plat</th><th>Jenis</th><th>Masuk</th><th>Keluar</th><th>Status</th><th>Bayar</th></tr>";
        while ($row = mysqli_fetch_assoc($data_parkir)) {
            echo "<tr><td>{$row['id']}</td><td>{$row['nomor_plat']}</td><td>{$row['jenis_kendaraan']}</td><td>{$row['waktu_masuk']}</td><td>{$row['waktu_keluar']}</td><td>{$row['status']}</td><td>{$row['total_bayar']}</td></tr>";
        }
        echo "</table>";
    }

    public function cetak_pdf() {
        $data_parkir = $this->model->getAllData();
        include 'views/cetak_pdf.php';
    }
}
?>