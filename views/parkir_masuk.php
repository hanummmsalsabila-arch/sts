<!DOCTYPE html>
<html>
<head><title>Parkir Masuk</title></head>
<body style="font-family: Arial;">
    <?php include 'menu.php'; ?>
    <h2>Data Parkir Masuk</h2>
    <form method="POST" action="index.php?mod=parkir&act=simpan_masuk">
        <table>
            <tr>
                <td>Nomor Plat</td>
                <td><input type="text" name="nomor_plat" required placeholder="L 1234 AB"></td>
            </tr>
            <tr>
                <td>Jenis Kendaraan</td>
                <td>
                    <select name="jenis_kendaraan" required>
                        <option value="roda 2">Roda 2</option>
                        <option value="roda 4">Roda 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="simpan">Simpan Transaksi</button></td>
            </tr>
        </table>
    </form>
</body>
</html>