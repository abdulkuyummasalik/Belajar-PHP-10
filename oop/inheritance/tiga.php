<?php
class produk
{
    public
        $judul,
        $penulis,
        $harga,
        $jumlahHalaman,
        $waktuMain;

    public function __construct($judul, $penulis, $harga, $jumlahHalaman = 0, $waktuMain = 0)
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->harga = $harga;
        $this->jumlahHalaman = $jumlahHalaman;
        $this->waktuMain = $waktuMain;
    }

    public function getLabel()
    {
        return "$this->judul, $this->penulis";
    }

    public function getInfoLengkap()
    {
        $str = "{$this->getLabel()} | $this->harga";
        return $str;
    }
}

class buku extends produk
{
    public function getInfoProduk()
    {
        $str = "Komik : {$this->getLabel()} | $this->harga - $this->jumlahHalaman Halaman. <br>";
        return $str;
    }
}

class game extends produk
{
    public function getInfoProduk()
    {
        $str = "Game : {$this->getLabel()} | $this->harga - $this->waktuMain Jam. <br>";
        return $str;
    }
}

$produk1 = new buku("Burlian", "Tere Liye", 30000, 415, 0);
$produk2 = new game("Watch Dogs", "Ubisoft", 250000, 0, 50);

echo $produk1->getInfoProduk();
echo $produk2->getInfoProduk();
