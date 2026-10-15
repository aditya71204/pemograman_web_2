<?php
$link = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$hasil = mysqli_query($link, "SELECT * FROM tbl_mhs");

// Mengambil data per baris berdasarkan nomor indeks kolom
while ($data = mysqli_fetch_row($hasil)) {
    echo "$data[0] $data[1] $data[2] $data[3]<br>";
}

mysqli_close($link);
?>