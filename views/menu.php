<style>
    body { font-family: 'Segoe UI', Tahoma, Arial, sans-serif; background-color: #fffde7; color: #333; 
    margin: 0; padding: 20px; }
    h2 { color: #f79641; border-bottom: 2px solid #ffe082; padding-bottom: 10px; margin-top: 0; }
    .menu { background-color: #ffc107; padding: 15px; border-radius: 5px; margin-bottom: 20px; 
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); display: flex; gap: 15px; align-items: center; }
    .menu a { text-decoration: none; color: #000; font-weight: bold; padding: 8px 12px; border-radius: 5px;
     transition: 0.2s; }
    .menu a:hover { background-color: #ffca28; }
    .menu a.logout { background-color: #d32f2f; color: white; margin-left: auto; }
    table { width: 100%; border-collapse: collapse; background-color: #fff; border-radius: 5px;
     overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
    th, td { border: 1px solid #ffe082; padding: 10px; text-align: left; }
    th { background-color: #ffca28; color: #000; }
    tr:nth-child(even) { background-color: #fff9c4; }
    input, select { padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 100%;
     max-width: 300px; box-sizing: border-box; }
    button, .btn { background-color: #ff9800; border: none; padding: 10px 15px; color: #fff;
     font-weight: bold; cursor: pointer; border-radius: 4px; display: inline-block; text-decoration:
      none; margin-top: 5px;}
    button:hover, .btn:hover { background-color: #e65100; }
    .container { background-color: #fff; padding: 20px; border-radius: 5px; 
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
</style>

<div class="menu">
    <a href="index.php?mod=parkir&act=dashboard">Dashboard</a>
    <a href="index.php?mod=parkir&act=masuk">Parkir Masuk</a>
    <a href="index.php?mod=parkir&act=keluar">Parkir Keluar</a>
    <a href="index.php?mod=parkir&act=laporan">Laporan</a>
    <a href="index.php?mod=auth&act=logout" class="logout" onclick="return confirm('Peringatan: Anda yakin ingin keluar dari aplikasi?');">Logout</a>
</div>