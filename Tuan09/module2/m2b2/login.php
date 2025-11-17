<?php
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <style>
    body{font-family: Arial, Helvetica, sans-serif; background:#f4f6f8;}
    .card{background:#fff;padding:20px;border-radius:6px;box-shadow:0 2px 6px rgba(0,0,0,0.1);width:360px;margin:60px auto}
    label{display:block;margin:10px 0 4px}
    input[type=text], input[type=password]{width:100%;padding:8px;border:1px solid #ccc;border-radius:4px}
    .buttons{margin-top:12px}
    input[type=submit], input[type=reset]{padding:8px 12px;margin-right:8px}
  </style>
</head>
<body>
  <div class="card">
    <h2>Đăng nhập</h2>
    <form action="dologin.php" method="post">
      <label for="username">User Name</label>
      <input type="text" name="username" id="username" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>

      <div class="buttons">
        <input type="reset" value="Hủy">
        <input type="submit" value="Đăng nhập">
      </div>
    </form>
  </div>
</body>
</html>
