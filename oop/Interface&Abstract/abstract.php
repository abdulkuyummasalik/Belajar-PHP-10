<?php
// abstract class AlatElektronik{
//     abstract public function lihat_spec();
//     public static function hidupkan_komputer(){
//         echo "Hidupkan Komputer!!!";
//     }
// }

// class Laptop extends AlatElektronik{
//     public function lihat_spec(){
//         echo "Lihat Spec Laptop...";
//     }
//     public function beli_laptop(){
//         echo "Beli Laptop...";
//     }
// }

// class Hanphone extends AlatElektronik{
//     public function lihat_spec(){
//         echo "Lihat Spec Handphone...";
//     }
// }

// $laptop_baru = new Laptop();
// echo $laptop_baru->lihat_spec();
// echo "<br>";
// echo $laptop_baru->beli_laptop();
// echo "<br>";
// echo $laptop_baru->hidupkan_komputer();

interface Hewan{
    public function bersuara();
    public function makan();
}

class MahklukHidup{
    public function __construct()
    {
        
    }
    public function intro(){
        return "Termasuk Mahkluk Hidup";
    }
}

class Kucing extends MahklukHidup implements Hewan{
    public function bersuara(){
        return "Meong Meong";
    }
    public function makan(){
        return "Makan Ikan";
    }
}

$kucing = new Kucing;
echo $kucing->intro();
echo "<br>";
echo $kucing->bersuara();
echo "<br>";
echo $kucing->makan();
echo "<br>";