<?php
## Perkalian
function perkalian($angka1, $angka2) {
    # Pembuatan fungsi
    $a = $angka1;
    $b = $angka2;
    $hasil = $a * $b;
    return $hasil;
};

# Pemanggilan fungsi
$hasil = perkalian(4, 5);
echo "perkalian 4 * 5 adalah $hasil";
echo "<hr>";
echo "Perkalian 7 * 2 adalah ".perkalian(7,2);
echo "<hr>";

function biodata(){
    echo "Nama : Khoyum Masalik <br>";
    echo "Rombel : PPLG X-1 <br>";
}
biodata();
echo "<hr>";


// Membuat fungsi ke-2
function perkenalan($nama,$rombel){
    echo "Nama : $nama <br>";
    echo "Rombel : $rombel <br>";
}

// Pemanggilan fungsi yang sudah dibuat
perkenalan("Masalik", "DTR X-1");
echo "<hr>";

$nama="Asep";
$rombel="IPS-2";

// Pemanggilan fungsi lagi
echo perkenalan($nama, $rombel);
echo "<hr>";

// Membuat fungsi ke-3
function perkenalan2($nama, $rombel, $rayon="Cisarua 2"){
    echo "Nama : $nama <br>";
    echo "Rombel : $rombel <br>";
    echo "Rayon : $rayon <br>";

}
echo perkenalan2("Khoyum Masalik", "PPLG X-1");
echo "<hr>";

$nama = "Bahar";
$rombel = "DKWH";
$rayon = "MZ-1";

echo perkenalan2($nama, $rombel, $rayon);
echo "<hr>";

// Hitung umur
function hitungUmur($tahunLahir, $tahunSekarang){
    $umur = $tahunSekarang - $tahunLahir;
    return $umur;
}
echo "Umur saya adalah " . hitungUmur(2008, 2024) . " Tahun";
echo "<hr>";


#1.
function mencetak($nama,$nis, $rombel, $rayon){
    echo "Nama : $nama <br>";
    echo "NIS : $nis <br>";
    echo "Rombel : $rombel <br>";
    echo "Rayon : $rayon <br>";
}
mencetak("Abdul", 1224, "PPLG X", "Belendung");
echo "<hr>";
mencetak("khoyum", 5678, "PPLG XI", "Sukamahi");
echo "<hr>";
mencetak("Masalik", 1357, "PPLG XII", "Megamendung");
echo "<hr>";


#2.  

function luasSegitiga($alas,$tinggi){
echo $hasil = 0.5 * $alas * $tinggi;
    return $hasil;
}
luasSegitiga(2, 4);
echo "<hr>";

function luasPersegi($sisi){
    echo $hasil = $sisi * $sisi;
    return $hasil;
}
luasPersegi(5);
echo "<hr>";

function luasLingkaran($r){
    echo $hasil = 3.14 * $r * $r;
    return $hasil;
}
luasLingkaran(7);
echo "<hr>";