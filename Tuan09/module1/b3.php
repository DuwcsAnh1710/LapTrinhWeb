<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 3 - Xử lý mảng</title>
</head>
<body>

<h2>Chương trình xử lý mảng số ngẫu nhiên</h2>

<form method="post">
    Nhập số phần tử n: 
    <input type="number" name="n" min="1" required>
    <button type="submit">Tạo mảng</button>
</form>

<hr>

<?php
if (isset($_POST["n"])) {
    $n = $_POST["n"];
    $arr = [];

    // 1. Nhập mảng (ngẫu nhiên)
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = rand(1, 100);
    }

    // 2. Xuất mảng
    echo "<b>Mảng vừa tạo:</b> ";
    echo implode(", ", $arr) . "<br><br>";

    // 3. Đếm số chẵn
    $countEven = 0;
    foreach ($arr as $value) {
        if ($value % 2 == 0) $countEven++;
    }
    echo "Tổng số số chẵn: <b>$countEven</b><br>";

    // 4. Tổng các số lẻ
    $sumOdd = 0;
    foreach ($arr as $value) {
        if ($value % 2 != 0) $sumOdd += $value;
    }
    echo "Tổng các số lẻ: <b>$sumOdd</b><br>";

    // 5. Max – Min
    echo "Giá trị lớn nhất: <b>" . max($arr) . "</b><br>";
    echo "Giá trị nhỏ nhất: <b>" . min($arr) . "</b><br>";

    // 6. Đảo ngược mảng
    echo "Mảng đảo ngược: <b>" . implode(", ", array_reverse($arr)) . "</b><br>";
}
?>

</body>
</html>
