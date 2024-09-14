<?php
class Komputer{
    private $jenisProcessor = "Intel Core i7-4790 3.6Ghz";
    public function tampilkanProcessor(){
        echo $this->jenisProcessor;
    }
    public function getProcessor(){
        return $this->jenisProcessor;
    }   
}
$komputerBaru = new Komputer('','');

echo $komputerBaru->tampilkanProcessor();
echo "<br>";
echo $komputerBaru->getProcessor();