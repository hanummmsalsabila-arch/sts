<?php
session_start();
// Atur zona waktu ke WIB
date_default_timezone_set('Asia/Jakarta');

include_once 'config/database.php';
include_once 'models/AuthModel.php';
include_once 'models/ParkirModel.php';
include_once 'controllers/AuthController.php';
include_once 'controllers/ParkirController.php';

$db = (new Database())->getConnection();

$mod = isset($_GET['mod']) ? $_GET['mod'] : 'auth';
$act = isset($_GET['act']) ? $_GET['act'] : 'index';

if ($mod == 'auth') {
    $auth = new AuthController($db);
    if ($act == 'login') { $auth->login(); }
    elseif ($act == 'logout') { $auth->logout(); }
    else { $auth->index(); }
} elseif ($mod == 'parkir') {
    // Cek apakah admin sudah login
    if (!isset($_SESSION['admin'])) {
        header("Location: index.php?mod=auth&act=index");
        exit;
    }
    
    // Inisialisasi controller parkir
    $parkir = new ParkirController($db);
    
    // Routing menu parkir
    if ($act == 'dashboard') { $parkir->dashboard(); }
    elseif ($act == 'masuk') { $parkir->masuk(); }
    elseif ($act == 'simpan_masuk') { $parkir->simpan_masuk(); }
    elseif ($act == 'keluar') { $parkir->keluar(); }
    elseif ($act == 'proses_keluar') { $parkir->proses_keluar(); }
    elseif ($act == 'laporan') { $parkir->laporan(); }
    elseif ($act == 'export') { $parkir->export(); }
    elseif ($act == 'cetak_pdf') { $parkir->cetak_pdf(); }
}
?>