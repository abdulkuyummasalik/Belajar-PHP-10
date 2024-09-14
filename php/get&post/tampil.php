<?php 
// menangkap data nama dengan method post
$nama = $_POST['nama'];
// menangkap data usia dengan method post
$asal = $_POST['asal'];
// menangkap data usia dengan method post
$telepon = $_POST['telepon'];
// menangkap data usia dengan method post
$jk = $_POST['jenis_kelamin'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Selamat <b><?= $nama?></b>, Pendaftaran berhasil!</h2>
    <h3>Biodata anda</h3>
    <hr>
    <?php
    //menampilkan data nama
    echo "Nama anda adalah $nama <br>";
    //menampilkan data asal sekolah
    echo "Usia anda adalah $asal <br>";
    //menampilkan data telepon
    echo "Nama anda adalah $telepon <br>";
    //menampilkan data jenis kelamin
    echo "Usia anda adalah $jk <br>";
    ?>
</body>
</html>