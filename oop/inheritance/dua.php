<?php
class Kendaraan
{
    public $warna;
    public $jumlahRoda;

    public function __construct($warna, $jumlahRoda)
    {
        $this->warna = $warna;
        $this->jumlahRoda = $jumlahRoda;
    }

    public function jalankanMesin()
    {
        echo "Mesin kendaraan dinyalakan!";
    }
}

class Mobil extends Kendaraan
{
    public $jenisBahanBakar;

    public function __construct($warna, $jumlahRoda, $jenisBahanBakar)
    {
        parent::__construct($warna, $jumlahRoda);  // Memanggil konstruktor class induk
        $this->jenisBahanBakar = $jenisBahanBakar;
    }

    public function ubahGigi()
    {
        echo "Mobil sedang berpindah gigi...";
    }
}

$mobil = new Mobil("Merah", 4, "Bensin");

echo "Mobil berwarna " . $mobil->warna . " memiliki " . $mobil->jumlahRoda . " roda dan menggunakan bahan bakar " . $mobil->jenisBahanBakar . "\n";

$mobil->jalankanMesin();  // Meneruskan method dari class induk