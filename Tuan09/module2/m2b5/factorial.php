<?php
function factorial_bcmath(int $n): string {
	$result = "1";
	for ($i = 2; $i <= $n; $i++) {
		$result = bcmul($result, (string)$i);
	}
	return $result;
}

$input = null;
$error = null;
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$raw = $_POST['n'] ?? '';
	$raw = trim($raw);
	if ($raw === '' || !preg_match('/^-?\d+$/', $raw)) {
		$error = 'Vui lòng nhập một số nguyên.';
	} else {
		$input = (int)$raw;
		if ($input < 0) {
			$error = 'Vui lòng nhập số nguyên không âm.';
		} else {
			$result = factorial_bcmath($input);
		}
	}
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Tính giai thừa</title>
</head>
<body>
	<h1>Tính giai thừa</h1>
	<form method="post" action="">
		<label for="n">Nhập số nguyên không âm:</label>
		<input type="text" id="n" name="n" value="<?php echo htmlspecialchars($input ?? ''); ?>">
		<button type="submit">Tính</button>
	</form>

	<?php if ($error): ?>
		<p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
	<?php elseif ($result !== null): ?>
		<p>Giai thừa của <?php echo htmlspecialchars((string)$input); ?> là:</p>
		<pre><?php echo htmlspecialchars($result); ?></pre>
	<?php endif; ?>
</body>
</html>