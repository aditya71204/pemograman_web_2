<?php
// Inisialisasi pesan notifikasi jika ada
$pesan = "";

// Cek apakah form telah disubmit (Method POST)
if (isset($_POST['Submit']) && $_POST['Submit'] == "Submit") {
    
    // 1. Koneksi ke Database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "DB_MHS"; // Nama database

    $koneksi = mysqli_connect($host, $user, $pass, $db);

    // Cek koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // 2. Ambil data dari form
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $nama         = $_POST['nama'];
    $jurusan      = $_POST['jurusan'];
    $alamat       = $_POST['alamat'];
    $telepon      = $_POST['telepon'];

    // 3. Validasi data kosong
    if (empty($id_mahasiswa) || empty($nama) || empty($alamat) || empty($telepon) || empty($jurusan) || $jurusan == "-") {
        echo "<script>alert('Data Harap Dilengkapi!');</script>";
    } else {
        // 4. Cek apakah NIM sudah terdaftar
        $cek_query  = "SELECT id_mahasiswa FROM mahasiswa WHERE id_mahasiswa='$id_mahasiswa'";
        $cek_result = mysqli_query($koneksi, $cek_query);

        if (mysqli_num_rows($cek_result) > 0) {
            echo "<script>alert('NIM sudah dipakai!, silahkan ganti NIM yang lain');</script>";
        } else {
            // 5. Input data ke tabel mahasiswa
            $input = "INSERT INTO mahasiswa (id_mahasiswa, nama, jurusan, alamat, telepon) 
                      VALUES ('$id_mahasiswa', '$nama', '$jurusan', '$alamat', '$telepon')";
            $query_input = mysqli_query($koneksi, $input);

            if ($query_input) {
                echo "<script>
                        alert('Input Data Mahasiswa Berhasil');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo "<script>alert('Input Data Mahasiswa Gagal!, Silahkan diulangi!');</script>";
            }
        }
    }
    
    // Tutup koneksi
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Mahasiswa</title>
    <style type="text/css" media="screen">
        table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
        }
        input, select {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 11px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div style="border:0; padding:10px; width:760px; height:auto; margin:0 auto;">
        <form action="" method="POST" name="form-input-data">
            <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr height="46">
                    <td width="10%">&nbsp;</td>
                    <td width="25%">&nbsp;</td>
                    <td width="65%"><font color="orange" size="4"><b>Form Input Data Mahasiswa</b></font></td>
                </tr>
                <tr height="46">
                    <td>&nbsp;</td>
                    <td>ID Mahasiswa / NIM</td>
                    <td><input type="text" name="id_mahasiswa" size="35" maxlength="6" required /></td>
                </tr>
                <tr height="46">
                    <td>&nbsp;</td>
                    <td>Nama</td>
                    <td><input type="text" name="nama" size="50" maxlength="30" required /></td>
                </tr>
                <tr height="46">
                    <td>&nbsp;</td>
                    <td>Jurusan</td>
                    <td>
                        <select name="jurusan">
                            <option value="-">- Pilih Jurusan -</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                            <option value="Komputer Akuntansi">Komputer Akuntansi</option>
                        </select>
                    </td>
                </tr>
                <tr height="46">
                    <td>&nbsp;</td>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" size="50" maxlength="30" required /></td>
                </tr>
                <tr height="46">
                    <td>&nbsp;</td>
                    <td>No. Telp</td>
                    <td><input type="text" name="telepon" size="20" maxlength="12" required /></td>
                </tr>
                <tr height="46">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        <input type="submit" name="Submit" value="Submit">
                        <input type="reset" name="reset" value="Cancel">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>