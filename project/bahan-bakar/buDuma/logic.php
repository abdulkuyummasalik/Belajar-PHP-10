<?php

class dataBahanBakar
{
    private $hargaSSuper,
        $hargaSVPower,
        $hargaSVPowerDiesel,
        $hargaSVPowerNitro;
    public $jenisYangDiPilih;

    public $totalLiter;

    protected $totalPembayaran;

    public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro)
    {
        $this->hargaSSuper = $valSSuper;
        $this->hargaSVPower = $valSVPower;
        $this->hargaSVPowerDiesel = $valSVPowerDiesel;
        $this->hargaSVPowerNitro = $valSVPowerNitro;
    }
    // setelah nilai dari atribut di simpan, fungsi getter akan mengembalikan data
    // karna data yang akan dikirim/dikeluarkan lebih dari satu, maka data data tersebut 
    public function getHarga()
    {
        $semuaDataSolar["SSuper"] = $this->hargaSSuper;
        $semuaDataSolar["SVPower"] = $this->hargaSVPower;
        $semuaDataSolar["SVPowerDiesel"] = $this->hargaSVPowerDiesel;
        $semuaDataSolar["SVPowerNitro"] = $this->hargaSVPowerNitro;
        // tujuan utama dari getter : return
        return $semuaDataSolar;
    }
}

class Pembelian extends dataBahanBakar
{
    // data sudah disediakan, tinggal proses penghitungan jumlah pembelian

    public function totalHarga()
    {
        $this->totalPembayaran = $this->getHarga()[$this->jenisYangDiPilih] * $this->totalLiter;
    }

    public function cetakBukti()
    {
        echo "<div class='hasil'>";
        echo "========================================<br>";
        echo "Jenis Bahan Bakar : " . $this->jenisYangDiPilih . "<br>";
        echo "Total Liter : " . $this->totalLiter . "<br>";
        echo "Harga Bayar : Rp. " . number_format($this->totalPembayaran) . "<br>";
        echo "========================================<br>";
        echo "</div>";
    }
}
?>
<html>
<style>
    .hasil {
        border: 1px solid #ddd;
        padding: 20px;
        margin: 1rem 24rem;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        background-color: #fff;
        color: #28a745;
    font-weight: bold;
    }

    .hasil-header,
    .hasil-footer {
        text-align: center;
        font-weight: bold;
    }

    .hasil-body {
        margin: 20px 0;
    }
</style>

</html>