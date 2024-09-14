<?php
// Study kasus
/* 1.Ubahlah variable $baju menjadi false dan lihatlah apa yang akan terjadi! Tuliskan kesimpulan masing-masing
menggunakan
komentar!*/

/* 2.Buatlah Program untuk menentukan peringkat disebuah sekolah,
- Jika nilai 90 - 100 maka program akan mencetak peringkat “A”
- Jika nilai 80-90 maka program akan mencetak peringkat “B”
- Jika nilai 70-80 maka program akan mencetak peringkat “C”
- Jika nilai kurang dari 70 maka program akan mencetak peringkat “D”*/

//1

$baju = true;
if ($baju) {
    echo "Variabel bernilai true"; // harus true
}

//2

// Membuat variabel
$nilai = "75";

// Versi satu

// Jika nilai >= 80 maka nilai Mutunya A dan Lulus
if ($nilai >= 80) {
    echo "Versi Satu : Nilai anda $nilai2 Maka nilai Mutu anda A dan dinyatakan Lulus";
}
// Jika nilai >= 68 maka nilai Mutunya B dan Lulus
elseif ($nilai >= 68) {
    echo "Versi Satu : Nilai anda $nilai Maka nilai Mutu anda B dan dinyatakan Lulus";

}
// Jika nilai >= 56 maka nilai Mutunya C dan Lulus
elseif ($nilai >= 56) {
    echo "Versi Satu : Nilai anda $nilai Maka nilai Mutu anda C dan dinyatakan Lulus";

}
// Jika nilai >= 45 maka nilai Mutunya D dan Tidak Lulus
elseif ($nilai >= 45) {
    echo "Versi Satu : Nilai anda $nilai Maka nilai Mutu anda D dan dinyatakan Tidak Lulus";

}
// Jika Selain dari itu Nilai Mutunya E dan Tidak Lulus
else {
    echo "Versi Satu : Nilai anda $nilai Maka nilai Mutu anda E dan dinyatakan Tidak Lulus";

}

echo "<br><hr>";

// versi dua

$nilai2 = "87";
if ($nilai2 >= 80) {
    $nilaiMutu = "A";
    $ket = "Lulus";
} elseif ($nilai2 >= 68) {
    $nilaiMutu = "B";
    $ket = "Lulus";
} elseif ($nilai2 >= 56) {
    $nilaiMutu = "C";
    $ket = "Lulus";
} elseif ($nilai2 >= 45) {
    $nilaiMutu = "D";
    $ket = "Tidak Lulus";
} else {
    $nilaiMutu = "E";
    $ket = "Tidak Lulus";
}

echo "Versi Dua : Nilai anda $nilai2 Maka nilai Mutu anda $nilaiMutu dan dinyatakan $ket";

echo "<br><hr>";

// versi tiga

$nilai3 = "41";
if ($nilai2 >= 80) {
    $nilaiMutu3 = "A";
} elseif ($nilai2 >= 68) {
    $nilaiMutu3 = "B";
} elseif ($nilai2 >= 56) {
    $nilaiMutu3 = "C";
} elseif ($nilai2 >= 45) {
    $nilaiMutu3 = "D";
} else {
    $nilaiMutu3 = "E";
}

// if ($nilaiMutu3 == "A") {
//     $ket3 = "Lulus";
// } else if ($nilaiMutu == "B") {
//     $ket3 = "Lulus";
// } else if ($nilaiMutu == "C") {
//     $ket3 = "Lulus";
// } else if ($nilaiMutu == "D") {
//     $ket3 = "Lulus";
// } else {
//     $ket3 = "Lulus";
// }

// Bisa juga

if ($nilaiMutu3 == "A" || $nilaiMutu3 == "B" || $nilaiMutu3 == "C") {
    $ket4 = "Lulus";
} else {
    $ket4 = "Tidak Lulus";
}

// echo "Versi Tiga : Nilai anda $nilai3 Maka nilai Mutu anda $nilaiMutu3 dan dinyatakan $ket3";

echo "Versi Tiga : Nilai anda $nilai3 Maka nilai Mutu anda $nilaiMutu3 dan dinyatakan $ket4";

echo "<br><hr>"

?>