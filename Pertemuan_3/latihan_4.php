<html>
<head>
    <title>Penggunaan Switch - Case</title>
</head>
<body>
Hari ini :
<?php
    $nama_hari = date("l");

    switch ($nama_hari) {
        case "Sunday":
            print("Minggu <br>");
            print("Waktu untuk istirahat");
            break;

        case "Wednesday":
            print("Rabu <br>");
            print("Seminar Launching Windows Vista di JHCC");
            break;

        case "Thursday":
            print("Kamis <br>");
            print("Pertemuan dengan Mahasiswa");
            break;

        case "Friday":
            print("Jum’at <br>");
            print("Waktu Sholat Jumat");
            break;

        default:
            print("Hari lain <br>");
            print("Aktivitas rutin seperti biasa");
            break;
    }
?>
</body>
</html>
