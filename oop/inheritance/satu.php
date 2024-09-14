<?php
class hewan
{
  public $nama;
  public $kaki;
  public function __construct($nama, $kaki)
  {
    $this->nama = $nama;
    $this->kaki = $kaki;
  }
  public function intro()
  {
    echo "Aku hewan bernama {$this->nama} dia berkaki {$this->kaki}.";
  }
  public function message()
  {
    echo "Hewan apakah aku ?,   ";
  }
}

class ayam extends hewan
{
}

class sapi extends hewan
{
}

class bebek extends hewan
{
}

$ayam = new ayam("Ayam", "Dua");
$ayam->message();
$ayam->intro();

echo "<br>";
$sapi = new sapi("Sapi", "Empat");
$sapi->message();
$sapi->intro();

echo "<br>";
$bebek = new bebek("Bebek", "Dua");
$bebek->message();
$bebek->intro();
