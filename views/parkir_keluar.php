<!DOCTYPE html>
<html>
<head><title>Parkir Keluar</title></head>
<body style="font-family: Arial;">
    <?php include 'menu.php'; ?>
    <h2>Pencarian Kendaraan Keluar</h2>
    <form method="POST" action="index.php?mod=parkir&act=keluar">
        Cari Nomor Plat: 
        <input type="text" name="nomor_plat" required>
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    
    <?php if (isset($hasil_cari)): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr><th>No Plat</th><th>Jenis</th><th>Waktu Masuk</th><th>Aksi</th></tr>
            <?php 
            if (mysqli_num_rows($hasil_cari) > 0) {
                while ($row = mysqli_fetch_assoc($hasil_cari)) {
                    echo "<tr>
                        <td>{$row['nomor_plat']}</td><td>{$row['jenis_kendaraan']}</td><td>{$row['waktu_masuk']}</td>
                        <td>
                            <form method='POST' action='index.php?mod=parkir&act=proses_keluar'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' name='keluar'>Proses Keluar</button>
                            </form>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Data tidak ditemukan / Sudah Keluar</td></tr>";
            }
            ?>
        </table>
    <?php endif; ?>
</body>
</html>