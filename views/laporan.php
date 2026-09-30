<!DOCTYPE html>
<html>
<head><title>Laporan Parkir</title></head>
<body style="font-family: Arial;">
    <?php include 'menu.php'; ?>
    <div style="margin-bottom: 20px;">
        <a href="index.php?mod=parkir&act=export" class="btn" style="background:#4CAF50;">Unduh Data (Spreadsheet)</a>
        <a href="index.php?mod=parkir&act=cetak_pdf" target="_blank" class="btn" style="background:#f44336;">Cetak PDF</a>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" width="100%">
        <tr>
            <th>ID</th><th>Plat</th><th>Jenis</th><th>Masuk</th><th>Keluar</th><th>Status</th><th>Total Bayar</th>
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