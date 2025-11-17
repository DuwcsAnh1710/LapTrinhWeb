<?php
    $x = 3;
    $y = 5;

    $cong = $x + $y;
    $tru = $x - $y;
    $nhan = $x * $y;
    $chia = $x / $y;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Three Plus Five</title>
</head>
<body>

    <h2>Three Plus Five</h2>
    <p>Demonstrates use of numeric variables</p>

    <?php
        echo "$x + $y = $cong <br>";
        echo "$x - $y = $tru <br>";
        echo "$x * $y = $nhan <br>";
        echo "$x / $y = $chia <br>";
    ?>

</body>
</html>
