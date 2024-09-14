<?php
class BahanBakar {
    private $pertalite, $pertamax, $turbo, $bioSolar;
    protected $pembayaran;
    public $jenisBahanBakar, $totalLiter;

    public function setHarga($pertalite, $pertamax, $turbo, $bioSolar) {
        $this->pertalite = $pertalite;
        $this->pertamax = $pertamax;
        $this->turbo = $turbo;
        $this->bioSolar = $bioSolar;
    }

    public function getHarga() {
        return [
            "Pertalite" => $this->pertalite,
            "Pertamax" => $this->pertamax,
            "Turbo" => $this->turbo,
            "BioSolar" => $this->bioSolar
        ];
    }
}

class BeliBahanBakar extends BahanBakar {
    public function totalHarga() {
        $harga = $this->getHarga();
        $this->pembayaran = $harga[$this->jenisBahanBakar] * $this->totalLiter;
    }

    public function cetakBukti() {
        echo "<center>";
        echo "========================================<br>";
        echo "Jenis Bahan Bakar : " . $this->jenisBahanBakar . "<br>";
        echo "Total Liter : " . $this->totalLiter . "<br>";
        echo "Harga Bayar : Rp. " . number_format($this->pembayaran) . "<br>";
        echo "========================================<br>";
        echo "</center>";
    }
}
?>
