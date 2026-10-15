<?php
// Hostname, username, dan password server MySQL
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = '';

// Membuka koneksi ke MySQL
$link = mysqli_connect($servername, $dbusername, $dbpassword);

if (!$link) {
    die("Not able to connect to server: " . mysqli_connect_error());
}

if ($link) {
    echo "ok....koneksi berhasil";
}
?>