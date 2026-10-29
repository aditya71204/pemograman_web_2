<?php
session_start();

// Inisialisasi array session jika belum ada
if (!isset($_SESSION['data_pendaftar'])) {
    $_SESSION['data_pendaftar'] = [];
}

// Fitur untuk menghapus/reset semua data jika diperlukan
if (isset($_POST['reset'])) {
    $_SESSION['data_pendaftar'] = [];
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Proses jika form disubmit
if (isset($_POST['simpan'])) {
    $tgl_input = $_POST['tgl_input'];
    $kode = strtoupper($_POST['kode']);
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];

    $mat = (float)$_POST['mat'];
    $bing = (float)$_POST['bing'];
    $umum = (float)$_POST['umum'];

    // Hitung rata-rata
    $rata = ($mat + $bing + $umum) / 3;

    // Menentukan keterangan
    if ($rata >= 70) {
        $keterangan = "Lulus";
    } elseif ($rata >= 60) {
        $keterangan = "Cadangan";
    } else {
        $keterangan = "Tidak Lulus";
    }

    // Menentukan tempat tes berdasarkan kode
    $kode_awal = substr($kode, 0, 1);
    if ($kode_awal == "A") {
        $tempat_tes = "Gedung A";
    } elseif ($kode_awal == "B") {
        $tempat_tes = "Gedung B";
    } elseif ($kode_awal == "V") {
        $tempat_tes = "Viktor";
    } else {
        $tempat_tes = "Tidak Diketahui";
    }

    // Simpan data ke dalam session
    $_SESSION['data_pendaftar'][] = [
        'kode'           => $kode,
        'nama'           => $nama,
        'jk'             => $jk,
        'tempat_lahir'   => $tempat_lahir,
        'tgl_lahir'      => $tgl_lahir,
        'asal_sekolah'   => $asal_sekolah,
        'pekerjaan_ortu' => $pekerjaan_ortu,
        'tempat_tes'     => $tempat_tes,
        'mat'            => $mat,
        'bing'           => $bing,
        'umum'           => $umum,
        'rata'           => $rata,
        'keterangan'     => $keterangan
    ];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PHP - Pendaftaran Mahasiswa</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            margin: 30px;
            background: #f4f4f4;
        }

        .container{
            width: 95%;
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }

        input[type=text],
        input[type=number],
        input[type=date]{
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .btn{
            background: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn:hover{
            background: darkblue;
        }

        .btn-reset{
            background: red;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-reset:hover{
            background: darkred;
        }

        .info{
            margin-top: 20px;
            padding: 10px;
            background: #eef;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>FORM PENDAFTARAN MAHASISWA BARU</h2>

    <form method="POST">

        <label>Tanggal Input</label>
        <input type="date" name="tgl_input" required>

        <label>Kode Pendaftaran</label>
        <input type="text" name="kode" placeholder="Contoh : A2" required>

        <label>Nama Pendaftar</label>
        <input type="text" name="nama" required>

        <label>Jenis Kelamin</label><br>
        <input type="radio" name="jk" value="Laki-Laki" required> Laki-Laki
        <input type="radio" name="jk" value="Perempuan"> Perempuan
        <br><br>

        <label>Asal Sekolah</label>
        <input type="text" name="asal_sekolah" required>

        <label>Pekerjaan Orang Tua</label>
        <input type="text" name="pekerjaan_ortu" required>

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" required>

        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" required>

        <label>Matematika</label>
        <input type="number" name="mat" min="0" max="100" required>

        <label>Bahasa Inggris</label>
        <input type="number" name="bing" min="0" max="100" required>

        <label>Umum</label>
        <input type="number" name="umum" min="0" max="100" required>

        <button type="submit" name="simpan" class="btn">SIMPAN</button>

    </form>

    <?php if (!empty($_SESSION['data_pendaftar'])): ?>
        
        <h3>DAFTAR PESERTA TERDAFTAR</h3>
        <table>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Asal Sekolah</th>
                <th>Pekerjaan Ortu</th>
                <th>Tempat Tes</th>
                <th>MAT</th>
                <th>B. Inggris</th>
                <th>Umum</th>
                <th>Rata-rata</th>
                <th>Keterangan</th>
            </tr>

            <?php 
            $no = 1;
            $jumlah_lulus = 0;
            $jumlah_cadangan = 0;
            $jumlah_tidak_lulus = 0;

            foreach ($_SESSION['data_pendaftar'] as $row): 
                if ($row['keterangan'] == "Lulus") {
                    $jumlah_lulus++;
                } elseif ($row['keterangan'] == "Cadangan") {
                    $jumlah_cadangan++;
                } else {
                    $jumlah_tidak_lulus++;
                }
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($row['kode']); ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['jk']); ?></td>
                <td><?= htmlspecialchars($row['tempat_lahir']) . ", " . htmlspecialchars($row['tgl_lahir']); ?></td>
                <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                <td><?= htmlspecialchars($row['pekerjaan_ortu']); ?></td>
                <td><?= htmlspecialchars($row['tempat_tes']); ?></td>
                <td><?= $row['mat']; ?></td>
                <td><?= $row['bing']; ?></td>
                <td><?= $row['umum']; ?></td>
                <td><?= number_format($row['rata'], 2); ?></td>
                <td><?= $row['keterangan']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class='info'>
            <h3>Rekap Data:</h3>
            <p>Jumlah Pendaftar : <b><?= count($_SESSION['data_pendaftar']); ?></b></p>
            <p>Jumlah Peserta Lulus : <b><?= $jumlah_lulus; ?></b></p>
            <p>Jumlah Peserta Cadangan : <b><?= $jumlah_cadangan; ?></b></p>
            <p>Jumlah Tidak Lulus : <b><?= $jumlah_tidak_lulus; ?></b></p>
            
            <form method="POST">
                <button type="submit" name="reset" class="btn-reset" onclick="return confirm('Apakah Anda yakin ingin menghapus semua data?')">Reset/Hapus Semua Data</button>
            </form>
        </div>

    <?php endif; ?>

    <div class='info'>
        <h3>Keterangan:</h3>
        <p><b>Kode Tempat Tes:</b></p>
        <ul>
            <li>A = Gedung A</li>
            <li>B = Gedung B</li>
            <li>V = Viktor</li>
        </ul>

        <p><b>Hasil Seleksi:</b></p>
        <ul>
            <li>Rata-rata ≥ 70 = Lulus</li>
            <li>Rata-rata 60 - 69 = Cadangan</li>
            <li>Rata-rata &lt; 60 = Tidak Lulus</li>
        </ul>
    </div>

</div>

</body>
</html>