<?php
class Laptop{
    public $no,$pemilik;

    public function __construct($no,$pemilik){
        $this->no = $no;
        $this->pemilik = $pemilik;
    }

    public function showName(){
        return "Laptop No. $this->no Milik : <b>$this->pemilik</b>";
    }
}

$laptop1 = new Laptop("1", "Anto");
echo $laptop1->showName();
echo "<br>";
$laptop1 = new Laptop("2", "Andi");
echo $laptop1->showName();
echo "<br>";
$laptop1 = new Laptop("3", "Dina");
echo $laptop1->showName();