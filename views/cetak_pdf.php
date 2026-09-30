<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Parkir</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h2 { text-align: center; color: #333; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; }
        th { background-color: #ffc107; -webkit-print-color-adjust: exact; color-adjust: exact; }
    </style>
</head>
<body onload="window.print();">
    <h2>Laporan Rekapitulasi Parkir Harian</h2>
    <table>
        <tr>
            <th>ID</th><th>No Plat</th><th>Jenis Kendaraan</th><th>Waktu Masuk</th><th>Waktu Keluar</th><th>Status</th><th>Total Bayar</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($data_parkir)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nomor_plat']; ?></td>
            <td><?php echo $row['jenis_kendaraan']; ?></td>
            <td><?php echo $row['waktu_masuk']; ?></td>
            <td><?php echo $row['waktu_keluar'] ? $row['waktu_keluar'] : '-'; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php echo $row['total_bayar'] ? 'Rp. '.number_format($row['total_bayar'],0,',','.') : '-'; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>