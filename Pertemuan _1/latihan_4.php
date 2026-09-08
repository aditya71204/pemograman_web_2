<?php 
// Komentar satu baris

/* Komentar banyak baris
   akan selesai setelah diakhiri dengan */
?>

<html> 
<head> 
    <title>Test Penyisipan PHP Pada HTML</title> 
</head> 
<body> 
    Kapal Asing, Silakan identifikasikan diri Anda! <br><br>

    <?php 
    // Inisialisasi variabel
    $namad = "Jean"; 
    $namat = "Luc"; 
    $namab = "Piccard"; 

    $nilai1 = 25;
    $nilai2 = 50;
    $hasil = $nilai1 * $nilai2;

    $a = 2;
    $b = 3;
    $hsl = pow($a, $b);
    ?> 

    <b>Ini adalah kapal Federasi Planet USS Enterprise.<br></b> 

    <?php 
    echo "Saya $namab, $namad $namat $namab, kapten kapal.<br>"; 
    echo "$nilai1 x $nilai2 = $hasil<br>"; 
    echo "$a ^ $b = $hsl"; 
    ?> 
</body> 
</html>
