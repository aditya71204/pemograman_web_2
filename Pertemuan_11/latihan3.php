<?php
// Koneksi sekaligus memilih database
$link = mysqli_connect("localhost", "root", "", "lat_dbase");

if (!$link) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Membuat tabel tbl_mhs
$sql = "CREATE TABLE IF NOT EXISTS tbl_mhs (
    mhsID INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(mhsID),
    FirstName VARCHAR(15),
    LastName VARCHAR(15),
    Age INT
)";
mysqli_query($link, $sql);

// Input data awal
$input = mysqli_query($link, "INSERT INTO tbl_mhs(FirstName, LastName, Age) VALUES('Anjar', 'Prabowo', 25)");

if ($input) {
    echo "Tabel berhasil dibuat dan data awal berhasil dimasukkan.";
} else {
    echo "Gagal memasukkan data: " . mysqli_error($link);
}

mysqli_close($link);
?>