<?php
class Laptop{
    public $pemilik,$merk;

    public function __construct($pemilik,$merk){
        echo "Ini berasal dari constructor laptop";
        $this->pemilik = $pemilik;
        $this->merk = $merk;
    }

    public function hidupkanLaptop(){
        return "Hidupkan Laptop $this->merk punya $this->pemilik";
    }

    public function __destruct(){
        echo "Ini berasal dari Destructor Laptop objek telah dihancurkan";
    }
}
$laptop1 = new Laptop("Andi","Lenovo");
echo "<br>";
echo $laptop1->hidupkanLaptop();
echo "<br>";