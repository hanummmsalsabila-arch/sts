<!DOCTYPE html>
<html>
<head><title>Login Aplikasi Parkir</title></head>
<body style="font-family: Arial; background-color: #fffde7; text-align: center; padding-top: 100px;">
    <div style="background: #fff; padding: 30px; display: inline-block; border-radius: 8px;
     box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-top: 5px solid #e6ce87;">
        <h2 style="color: #ebb484; margin-top:0;">Login Admin Parkir</h2>
        <form method="POST" action="index.php?mod=auth&act=login">
            <div style="margin-bottom: 10px; text-align: left;">
                <label>Username</label><br>
                <input type="text" name="username" required style="padding: 10px; width: 250px;
                 border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px; text-align: left;">
                <label>Password</label><br>
                <input type="password" name="password" required style="padding: 10px; width: 250px; 
                border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <button type="submit" name="login" style="background-color: #f1ca8e; border: none; 
            padding: 10px; width: 100%; color: #fff; font-weight: bold; cursor: pointer;
             border-radius: 4px;">Login</button>
        </form>
    </div>
</body>
</html>