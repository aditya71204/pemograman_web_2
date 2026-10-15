<?php
$link = mysqli_connect("localhost", "root", "");

if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$dbname = "lat_dbase";
$sql = "CREATE DATABASE $dbname";
$cek = mysqli_query($link, $sql);

if ($cek) {
    echo "Database $dbname berhasil dibuat";
} else {
    echo "Couldn't Create Database: $dbname - " . mysqli_error($link);
}

mysqli_close($link);
?>