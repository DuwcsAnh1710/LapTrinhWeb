<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Bài 4 - Foreach</title>
</head>
<body>


<?php
$list = array("alpha", "beta", "gamma", "delta", "epsilon");

echo "<ul>";

foreach ($list as $value) {
    echo "<li>$value</li>";
}
echo "</ul>";
?>

</body>
</html>
