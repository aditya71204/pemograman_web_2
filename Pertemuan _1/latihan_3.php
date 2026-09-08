<?php
define("judul", "Menghitung luas lingkaran"); // mendefinisikan konstanta judul
define("phi", 3.14); // mendefinisikan konstanta phi

$r = 5; // jari-jari
$luas = phi * $r * $r; // rumus luas lingkaran

echo judul . "\n"; // tampilkan judul
echo "Luas = $luas\n"; // tampilkan hasil
?>
