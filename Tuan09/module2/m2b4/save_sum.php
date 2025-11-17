<?php
// Lưu ý: chỉnh DB_HOST, DB_USER, DB_PASS, DB_NAME trước khi chạy
header('Content-Type: application/json; charset=utf-8');

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'your_database';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'DB connection error']);
    exit;
}

$n = isset($_POST['n']) ? trim($_POST['n']) : '';
if ($n === '' || !ctype_digit($n) || (int)$n < 1) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'error' => 'Invalid n']);
    $conn->close();
    exit;
}

$n = (int)$n;
$sum = ($n * ($n + 1)) / 2;

$stmt = $conn->prepare("INSERT INTO sums (n, sum) VALUES (?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $conn->error]);
    $conn->close();
    exit;
}
$stmt->bind_param("ii", $n, $sum);
if ($stmt->execute()) {
    echo json_encode(['ok' => true, 'id' => $stmt->insert_id, 'n' => $n, 'sum' => $sum]);
} else {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $stmt->error]);
}
$stmt->close();
$conn->close();
?>
