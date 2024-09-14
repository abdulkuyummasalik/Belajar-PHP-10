<?php

$url = '/about';

switch ($url) {
    case '/':
        echo 'Selamat datang di dashboard.';
        break;
    case '/about':
        echo 'Selamat datang di halaman about.';
        break;
    case '/contact':
        echo 'Selamat datang di halaman kontak.';
        break;
    default:
        echo 'Maaf halaman yang anda cari tidak ditemukan.';
}

echo '<br> <hr>';

$warna = "putih";
switch ($warna) {
    case "Merah";
        echo "Warna kesukaan Merah";
        break;
    case "Biru";
        echo "Warna kesukaan Biru";
        break;
    default:
        echo "Warna kesukaan belum di tentukan";
        break;

}

?>