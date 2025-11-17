<?php
// Nhận dữ liệu POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: input.php');
    exit;
}

$a_raw = isset($_POST['a']) ? trim($_POST['a']) : '';
$b_raw = isset($_POST['b']) ? trim($_POST['b']) : '';
$op = isset($_POST['op']) ? $_POST['op'] : '';

$params = [
    'a' => $a_raw,
    'b' => $b_raw
];

if ($a_raw === '' || $b_raw === '') {
    $params['error'] = 'Vui lòng nhập cả a và b.';
    header('Location: input.php?' . http_build_query($params));
    exit;
}

// Kiểm tra số
if (!is_numeric($a_raw) || !is_numeric($b_raw)) {
    $params['error'] = 'Giá trị a và b phải là số.';
    header('Location: input.php?' . http_build_query($params));
    exit;
}

$a = $a_raw + 0;
$b = $b_raw + 0;
$result_text = '';

switch ($op) {
    case '+':
        $res = $a + $b;
        $result_text = "{$a} + {$b} = {$res}";
        break;
    case '-':
        $res = $a - $b;
        $result_text = "{$a} - {$b} = {$res}";
        break;
    case '*':
        $res = $a * $b;
        $result_text = "{$a} * {$b} = {$res}";
        break;
    case '/':
        if ($b == 0) {
            $params['error'] = 'Lỗi: chia cho 0.';
            header('Location: input.php?' . http_build_query($params));
            exit;
        }
        $res = $a / $b;
        $result_text = "{$a} / {$b} = {$res}";
        break;
    default:
        $params['error'] = 'Phép toán không hợp lệ.';
        header('Location: input.php?' . http_build_query($params));
        exit;
}

$params['result'] = $result_text;
header('Location: input.php?' . http_build_query($params));
exit;
