<!DOCTYPE html>
<html>
<head>
    <title>Contoh Penggunaan UDF</title>
</head>
<body>

<!-- Menentukan Form Input -->
<form method="post" action="">
    Masukkan Bilangan Pertama : <br>
    <input type="text" name="A" size="10" required> <br>
    Masukkan Bilangan Kedua : <br>
    <input type="text" name="B" size="10" required> <br><br>
    <input type="submit" name="hitung" value="Hitung">
</form>

<!-- Membandingkan dan memproses 2 buah bilangan yang diinput -->
<?php
if (isset($_POST['hitung'])) {
    // Mengambil nilai input dan mengonversi ke tipe data numerik
    $a = $_POST['A'];
    $b = $_POST['B'];

    // Deklarasi User Defined Functions (UDF)
    function jumlah($A, $B) {
        return $A + $B;
    }

    function kurang($A, $B) {
        return $A - $B;
    }

    function kali($A, $B) {
        return $A * $B;
    }

    function bagi($A, $B) {
        if ($B == 0) {
            return "Tidak dapat dibagi dengan nol";
        }
        return $A / $B;
    }

    echo "<hr>";
    echo "Bilangan Pertama : " . htmlspecialchars($a) . "<br>";
    echo "Bilangan Kedua : " . htmlspecialchars($b) . "<br><br>";

    // Memanggil fungsi-fungsi UDF
    $jumlahbil = jumlah($a, $b);
    $kurangbil = kurang($a, $b);
    $kalibil   = kali($a, $b);
    $bagibil   = bagi($a, $b);

    // Menampilkan hasil kalkulasi
    echo "<strong>Hasil Penjumlahan 2 buah bilangan</strong><br>";
    printf("Penjumlahan antara : %d + %d = %d", $a, $b, $jumlahbil);
    echo "<br><br>";

    echo "<strong>Hasil Pengurangan 2 buah bilangan</strong><br>";
    printf("Pengurangan antara : %d - %d = %d", $a, $b, $kurangbil);
    echo "<br><br>";

    echo "<strong>Hasil Perkalian 2 buah bilangan</strong><br>";
    printf("Perkalian antara : %d * %d = %d", $a, $b, $kalibil);
    echo "<br><br>";

    echo "<strong>Hasil Pembagian 2 buah bilangan</strong><br>";
    if (is_numeric($bagibil)) {
        printf("Pembagian antara : %d / %d = %.2f", $a, $b, $bagibil);
    } else {
        echo $bagibil;
    }
    echo "<br><br>";
}
?>

</body>
</html>