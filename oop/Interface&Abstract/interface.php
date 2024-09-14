<?php
/*
Interface
- interface memakai implement agar bisa digunakan oleh class lain
- tidak bisa memakai properti
- hanya bisa public
- tidak bisa memakai fungsi biasa
- 
*/

interface Hewan
{
    public function suara();
    public function makan();
}

class Kucing implements Hewan
{
    public function suara()
    {
        echo "Suara : Meong";
    }
    public function makan()
    {
        echo "Makan : Ikan";
    }
}

$kucing = new Kucing();
$kucing->suara();
echo "<br>";
$kucing->makan();
