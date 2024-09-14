<?php
/*

#### Operator Aritmatika
$a = 5;
$b = 2;

##Penjumlahan
$c = $a + $b;
echo "$a + $b = $c";
echo "<hr>";

##Pengurangan
$c = $a - $b;
echo "$a - $b = $c";
echo "<hr>";

##Perkalian
$c = $a * $b;
echo "$a * $b = $c";
echo "<hr>";

##Pembagian
$c = $a / $b;
echo "$a / $b = $c";
echo "<hr>";

##Sisa bagi
$c = $a % $b;
echo "$a % $b = $c";
echo "<hr>";

##Pangkat
$c = $a ** $b;
echo "$a ** $b = $c";
echo "<hr>";
*/


#### Operator Penugasan
/*
1. Pengisian Nilai (=)
2. Pengisian dan Penambahan (+=)
3. Pengisian dan Pengurangan (-=)
4. Pengisian dan Perkalian (*=)
5. Pengisian dan Pemangkatan (**=)
6. Pengisian dan Pembagian (/=)
7. Pengisian dan Sisa bagi (%=)
8. Pengisian dan Pengabungan (string) (.=)
*/

// $a = 20;
// $a += 20;

// echo $a


#### Operator Increment & Decrement

// $a = 1;
// $a++;
// $a++;
// $a++;

// echo $a


#### Operator Relasi/Pembanding
/*
1. Lebih Besar (>)
2. Lebih Kecil (<)
3. Sama Dengan (==) atau (===)
4. Tidak Sama dengan (!=) atau (!==)
5. Lebih Besar Sama dengan (>=)
6. Lebih Kecil Sama dengan (<=)
7. 1 == true
*/


// $a = 6;
// $b = 2;

##menggunakan operator relasi lebih besar
// $c = $a > $b;
// echo "$a > $b = $c";
// echo "<hr>";

##menggunakan operator relasi lebih kecil
// $c = $a < $b;
// echo "$a < $b = $c";
// echo "<hr>";


#### Operator Logika
/*
1. Logika AND (&&)
2. Logika OR (||)
3. Negasi/kebalikan/ NOT (!)
*/

// $a = true;
// $b = false; // => kosong == 0

// $c = $a && $b;
// echo "$a && $b = $c";
// echo "<hr>";

// $c = $a || $b;
// echo "$a || $b = $c";
// echo "<hr>";

// $c = !$a;
// echo "$a != $b = $c";
// echo "<hr>";


// # 0.
$a = 10;
$t = 8;
$luasSegitiga = ($a * $t) / 2;
echo " Luas segitiga yang memiliki alas $a dan tinggi $t adalah $luasSegitiga cm";
echo "<hr>";


// #1.
$s = 4;
$luasPersegi = $s * $s;
echo " Luas persegi yang memiliki sisi $s adalah $luasPersegi cm";
echo "<hr>";

// #2.
$r = 8;
$phi = 3.14;
$luasLingkaran = $phi * $r * $r;
echo " Luas persegi yang memiliki jari-jari $r adalah $luasLingkaran cm";
echo "<hr>";

#3.
$a = 19;
$b = 20;
$c = $a < $b;
$d = $a > $b;
$e = $a == $b;
$f = $a != $b;
$g = $a <= $b;
$h = $a >= $b;
echo "$a < $b = $c ";
echo "<hr>";
echo "$a > $b = $d ";
echo "<hr>";
echo "$a == $b = $e ";
echo "<hr>";
echo "$a != $b = $f ";
echo "<hr>";
echo "$a <= $b = $g ";
echo "<hr>";
echo "$a >= $b = $h";
echo "<hr>";


?>