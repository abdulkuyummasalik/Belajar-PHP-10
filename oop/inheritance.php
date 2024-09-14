<?php

class Toko
{
    protected function beli()
    {
        return "yey beli baru!";
    }

    public function getBeli(){
        return $this->beli();
    }
}


class Laptop extends Toko
{
    public function beliLaptop()
    {
        return $this->beli();
    }
}

class Komputer extends Laptop{
    public function beliKomputer(){
        return $this->beliLaptop();
    }
}

$laptopBaru = new Laptop('','');
$toko = new Toko();
$komputer = new Komputer('','');
echo $laptopBaru->beliLaptop();
echo "<br>";
echo $toko->getBeli();