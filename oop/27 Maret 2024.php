<?php 
// class Hewan{
//     public $nama = "kucing";
//     public $kaki;
//     public $mamalia;
//     public $jenis_makanan;

//     public function __construct(){
//         $nama = $this->nama;
//     }
//     public function showName(){
//         return $this->nama;
//     }
//     public function berjalan(){
//         return true;
//     }
//     }

//     $kucing = new Hewan;
// echo "Memanggil poperti/atribut : ". $kucing->nama . "<br>" . 
// " Memanggil Method/Fungsi: " . $kucing->showName();

// echo "<hr>";

// class laptop{
//     private $hargaLaptop;
//     public function setHarga($harga){
//         $this->hargaLaptop = $harga;
//     }
//     public function getHarga(){
//         return 'harga Laptop Rp '.
//         number_format($this->hargaLaptop,0,',','.');
//     }
// }

// $laptop = new Laptop();
// $laptop->setHarga(4500000);
// echo $laptop->getHarga();

// echo "<hr>";

class Laptop
{
    public $name;
    public $brand;

    public function __construct($name, $brand)
    {
        $this->name = $name;
        $this->brand = $brand;
    }

    public function show()
    {
        echo "laptop $this->brand adalah milik : $this->name <br>";
    }
}

$lap1 = new Laptop('Abdul', 'Sumsang');
echo $lap1->show();

$lap2 = new Laptop('Khoyum', 'APPA');
echo $lap2->show();

$lap3 = new Laptop('Masalik', 'VOVO');
echo $lap3->show();