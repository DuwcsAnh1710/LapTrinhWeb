<?php
$name = '';
if (isset($_REQUEST['userName'])) {
    $name = trim($_REQUEST['userName']);
}
$safe = $name !== '' ? htmlspecialchars($name, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8') : '';
?>
<!doctype html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Hi User</title>
</head>
<body>
	<h1>Hi User</h1>
	<p>PHP program that receives a value from "whatsName"</p>
	<?php if ($safe): ?>
		<p>Hi there, <?php echo $safe; ?>!</p>
	<?php else: ?>
		<p>Hi there! (no name provided)</p>
	<?php endif; ?>
</body>
</html>