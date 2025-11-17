<?php
// Xử lý form server-side
$resultMsg = '';
$error = false;
$n = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy và kiểm tra giá trị n
    $n_raw = isset($_POST['n']) ? trim($_POST['n']) : '';
    if ($n_raw === '' || !ctype_digit($n_raw) || (int)$n_raw < 1) {
        $error = true;
        $resultMsg = 'Vui lòng nhập một số nguyên dương.';
    } else {
        $n = (int)$n_raw;
        // Sử dụng bcmath/ints tùy kích thước; ở đây dùng integer
        $sum = ($n * ($n + 1)) / 2;
        $resultMsg = "Tổng 1 + 2 + ... + {$n} = {$sum}";
    }
}
?>
<!doctype html>
<html lang="vi">
<head>
	<meta charset="utf-8" />
	<title>Tính tổng 1+2+...+n (PHP)</title>
	<style>
		body{font-family:Segoe UI,Roboto,Arial;margin:32px}
		label,input,button{font-size:16px}
		.result{margin-top:12px;font-weight:600}
		.error{color:#c00}
		pre.code{background:#f5f5f5;padding:12px;border-radius:4px;overflow:auto}
	</style>
</head>
<body>
	<h2>Tính tổng dãy 1 + 2 + ... + n (PHP)</h2>

	<form method="post" action="">
		<label for="n">Nhập n (số nguyên dương): </label>
		<input id="n" name="n" type="number" min="1" step="1" required value="<?php echo htmlspecialchars($n); ?>" />
		<button type="submit">Tính tổng</button>
	</form>

	<div class="result <?php echo $error ? 'error' : ''; ?>">
		<?php if ($resultMsg !== '') echo htmlspecialchars($resultMsg); ?>
	</div>

	<hr />

	

	<!-- Tùy chọn: gửi AJAX để lưu (bỏ comment nếu muốn sử dụng) -->
	<script>
		// Example: gửi AJAX để lưu kết quả sau khi submit (nếu bạn triển khai save_sum.php)
		/*
		document.querySelector('form').addEventListener('submit', function(e){
			// nếu muốn lưu bằng JS, bỏ preventDefault và submit thủ công hoặc gửi fetch sau khi nhận phản hồi server
		});
		*/
	</script>
</body>
</html>
