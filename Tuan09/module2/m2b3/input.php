<?php
// Lấy dữ liệu trả về (nếu có)
$a = isset($_GET['a']) ? $_GET['a'] : '';
$b = isset($_GET['b']) ? $_GET['b'] : '';
$result = isset($_GET['result']) ? $_GET['result'] : '';
$error = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Máy tính đơn giản</title>
	<style>
		/* ...nhỏ gọn cho giao diện... */
		.form-row { margin: 10px 0; }
		.result { margin-top: 12px; font-weight: bold; color: #006; }
		.error { margin-top: 12px; color: #c00; font-weight: bold; }
	</style>
</head>
<body>
	<h3>Phép tính: cộng, trừ, nhân, chia</h3>
	<form method="post" action="process.php">
		<div class="form-row">
			a = <input type="text" name="a" value="<?php echo htmlspecialchars($a); ?>" />
			b = <input type="text" name="b" value="<?php echo htmlspecialchars($b); ?>" />
		</div>
		<div class="form-row">
			<button type="submit" name="op" value="+">+</button>
			<button type="submit" name="op" value="-">-</button>
			<button type="submit" name="op" value="*">&times;</button>
			<button type="submit" name="op" value="/">&#247;</button>
		</div>
	</form>

	<?php if ($result !== ''): ?>
		<div class="result">Kết quả: <?php echo htmlspecialchars($result); ?></div>
	<?php elseif ($error !== ''): ?>
		<div class="error">Lỗi: <?php echo htmlspecialchars($error); ?></div>
	<?php endif; ?>

</body>
</html>