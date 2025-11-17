<?php
function check_credentials(string $user, string $pass): bool {
    $correctUser = 'admin';
    $correctPass = '123456';
    return ($user === $correctUser && $pass === $correctPass);
}

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (check_credentials($username, $password)) {
    $message = 'Welcome Admin!';
} else {
    $message = 'You are not Admin!';
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Kết quả đăng nhập</title>
  <style>body{font-family:Arial;margin:40px;background:#f9fafb} .box{background:#fff;padding:20px;border-radius:6px;max-width:600px;margin:auto;box-shadow:0 2px 6px rgba(0,0,0,0.08)}</style>
</head>
<body>
  <div class="box">
    <h2>Kết quả</h2>
    <p><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
    <p><strong>Username đã nhập:</strong> <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></p>
    <p><a href="login.php">Quay lại trang đăng nhập</a></p>
  </div>
</body>
</html>
