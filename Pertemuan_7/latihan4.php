<!DOCTYPE html>
<html>
<head>
    <title>Penggunaan Is Array</title>
</head>
<body>

<?php
$var = array(1, 2, 3, 4, 5, 6, 7);
$scan = is_array($var);

if ($scan) {
    $status = "merupakan";
} else {
    $status = "bukan merupakan";
}

echo "\$var = array(1,2,3,4,5,6,7)<br>";
echo "Variabel \$var $status array.";
?>

</body>
</html>