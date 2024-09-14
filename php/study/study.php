<?php

//// Ka Fema

// 1. Menentukan kompeten & belum kompeten
echo "<h1 style='justify-content:center;display:flex'>Study 1</h1>";
$nilai = 98;
$ket = ($nilai >= 74) ? '<span style = "font-weight: Bold ";>Kompeten</span>' : '<span style = "font-style : italic; ">Tidak Kompeten</span>';
$color = ($nilai >= 74) ? 'green' : 'red';

echo "<h2>Nilai kompetensi : $nilai <span style='color: {$color};'>$ket</span></h2>";
echo "<hr>";

// 2. Memunculkan perkalian 1-3 dengan rentang kali 1-10
echo "<h1 style='justify-content:center;display:flex'>Study 2</h1>";
for ($i = 1; $i <= 3; $i++) {
    echo "<h2 style='display:flex;'>Perkalian $i</h2>";
    for ($j = 1; $j <= 10; $j++) {
        $hasil = $i * $j;
        echo "<p>Hasil dari $i * $j = $hasil</p>";
    }
}
echo "<hr>";

// 3. Mencari tahun kabisat dan non kabisat dari data berikut :
echo "<h1 style='justify-content:center;display:flex'>Study 3</h1>";
$data = [
    [
        'nama' => 'Andi',
        'tahun' => 2008,
    ],
    [
        'nama' => 'Beni',
        'tahun' => 2001,
    ],
    [
        'nama' => 'Dani',
        'tahun' => 2004,
    ],
    [
        'nama' => 'Eko',
        'tahun' => 2006,
    ]
];

foreach ($data as $dt) {
    if ($dt['tahun'] % 4 == 0 && ($dt['tahun'] % 100 != 0)) {
        $tahun = $dt['tahun'];
        echo "<p>" . $dt['nama'] . " : Lahir pada tahun kabisat (" . $tahun . ") </p>";
    } else {
        $tahun = $dt['tahun'];
        echo "<p>" . $dt['nama'] . " : Lahir BUKAN pada tahun kabisat (" . $tahun . ")</p>";
    }
}
echo "<hr>";

// 4. Menghitung total harga pembelian dari data berikut :
echo "<h1 style='justify-content:center;display:flex'>Study 4</h1>";
$barang = [
    [
        'namaBarang' => 'Pasta Gigi',
        'hargaBarang' => 18000,
        'jumlahBeli' => 2,
    ],
    [
        'namaBarang' => 'Sabun Mandi',
        'hargaBarang' => 5000,
        'jumlahBeli' => 3,
    ],
    [
        'namaBarang' => 'Aloe Vera Sheet Mask',
        'hargaBarang' => 15000,
        'jumlahBeli' => 7,
    ],
];
$totalHarga = 0;
foreach ($barang as $item) {
    $total = ($item["hargaBarang"] * $item["jumlahBeli"]);
    $totalHarga += $total;
}
echo "<br>Total harga yang harus dibayar adalah Rp $totalHarga<br>";
echo "<hr>";


//// Bu Duma

// 1. Nilai ==> Kamis,
/*
Nilai saya : 80,78,72,84,92,88
Dari keseluruhan nilai paling tinggi adalah : 92
Sedangkan nilai terkecil adalah : 72
Apa bila diurutkan dari yang terkecil menjadi : 72,78,80,84,88,92
Apa bila diurutkan dari yang terbesar menjadi : 92,88,84,80,78,72
Apa bila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi : 82
Setelah melakukan perbaikan untuk nilai 72, saya mendapat nilai 75. Jadi nilai saya sekarang : 80,78,75,84,92,88
Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi : 92,88,84,80,78,75
*/

echo "<h1 style='justify-content:center;display:flex'>Study 5</h1>";

// cara 1
$nilaiSaya = [80, 78, 72, 84, 92, 88];
echo "Nilai Saya : ";
foreach ($nilaiSaya as $nilai) {
    echo " " . $nilai;
}
echo "<br>";
echo "Dari keseluruhan nilai paling rendah adalah : " . min($nilaiSaya) . "<br>";
echo "Dari keseluruhan nilai paling tinggi adalah : " . max($nilaiSaya) . "<br>";
echo "Apa bila diurutkan dari yang terkecil menjadi : ";
sort($nilaiSaya);
foreach ($nilaiSaya as $kecil) {
    echo " " . $kecil;
}
echo "<br>";
echo "Apa bila diurutkan dari yang terbesar menjadi : ";
rsort($nilaiSaya);
foreach ($nilaiSaya as $besar) {
    echo "$besar ";
}
echo "<br>";
$count = count($nilaiSaya);
$total = array_sum($nilaiSaya);
$average = $total / $count;
echo "Apa bila dibulatkan, rata-rata dari keseluruhan nilai saya menjadi : " . round($average);
echo "<br>";
$nilaiSaya = [80, 78, 72, 84, 92, 88];
$nilaiSaya[2] = 75;
echo "Setelah melakukan perbaikan untuk nilai 72, saya mendapat nilai 75. Jadi nilai saya sekarang : ";
foreach ($nilaiSaya as $nilai) {
    echo " " . $nilai;
}
echo "<br>";
echo "Sehingga sekarang, urutan nilai saya dari yang terbesar menjadi : ";
rsort($nilaiSaya);
foreach ($nilaiSaya as $besar) {
    echo "$besar ";
}
echo "<hr>";


// cara 2 
$nilai = [80, 78, 72, 84, 92, 88];
echo "Nilai saya : " . implode(', ', $nilai) . "<br> ";
echo "Nilai terkecil : " . min($nilai) . "<br> ";
echo "Nilai terbesar : " . max($nilai) . "<br> ";
// asort / sprt => terkecil - terbesar (ASC / Ascending)
// arsort / rsprt => terbesar - terkecil (DESC / Descending)
// ksort : terkecil - terbesar berdasarkan index awal
// krsort : terbesar - terkecil berdasarkan index awal
$terkecil = asort($nilai);
echo "Diirutkan terkecil : " . implode(", ", $nilai) . "<br>";
$terbesar = arsort($nilai);
echo "Diirutkan terbesr : " . implode(", ", $nilai) . "<br>";
$rarata = array_sum($nilai) / count($nilai);
echo "Rata-rata : " . round($rarata) . "<br>";
ksort($nilai);
array_splice($nilai, 2, 1, "75");
echo "Nilai sekarang : " . implode(", ", $nilai) . "<br>";