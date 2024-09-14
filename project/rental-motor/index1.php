<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>

<body>
    <h2>Form Rental Motor</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nama_pelanggan">Nama Pelanggan</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" required>

        <label for="lama_rental">Lama Waktu Rental (per-hari)</label>
        <input type="number" id="lama_rental" name="lama_rental" min="1" required>

        <label for="jenis_motor">Jenis Motor</label>
        <select id="jenis_motor" name="jenis_motor" required>
            <option value="Beat">Beat - 100.000 /hari</option>
            <option value="Scoopy">Scoopy - 150.000 /hari</option>
            <option value="Aerox">Aerox - 200.000 /hari</option>
            <option value="Zx25r">Zx25r - 250.000 /hari</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</body>

</html>

<?php

class RentalMotor
{
    private $namaPelanggan;
    private $lamaRental;
    private $jenisMotor;
    private $tambahanPajak = 10000;

    private $namaMember = array("Asep", "Andi", "Anisa");

    public function __construct($namaPelanggan, $lamaRental, $jenisMotor)
    {
        $this->namaPelanggan = $namaPelanggan;
        $this->lamaRental = $lamaRental;
        $this->jenisMotor = $jenisMotor;
    }

    public function hitungBiayaRental()
    {
        $hargaMotor = $this->getHargaMotor();
        $totalBiaya = $hargaMotor * $this->lamaRental;

        if ($this->isMember()) {
            $totalBiaya -= ($totalBiaya * 0.05);
        }

        $totalBiaya += $this->tambahanPajak;

        return $totalBiaya;
    }

    public function getHargaMotor()
    {
        switch ($this->jenisMotor) {
            case 'Beat':
                return 100000;
            case 'Scoopy':
                return 150000;
            case 'Aerox':
                return 200000;
            case 'Zx25r':
                return 250000;
            default:
                return 0;
        }
    }

    // Mengecek apakah pelanggan adalah member
    public function isMember()
    {
        return in_array($this->namaPelanggan, $this->namaMember);
    }
}

// Proses jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $namaPelanggan = $_POST["nama_pelanggan"];
    $lamaRental = $_POST["lama_rental"];
    $jenisMotor = $_POST["jenis_motor"];

    // Buat objek RentalMotor berdasarkan data yang diambil
    $rental = new RentalMotor($namaPelanggan, $lamaRental, $jenisMotor);

    // Hitung biaya rental
    $totalBiaya = $rental->hitungBiayaRental();

    // Tampilkan total biaya rental dan informasi lainnya
    echo "<div class='output'>";
    if ($rental->isMember()) {
        echo "$namaPelanggan berstatus sebagai Member dan mendapatkan diskon sebesar 5%.<br>";
    } else {
        echo "$namaPelanggan berstatus bukan Member.<br>";
    }
    echo "Jenis Motor yang dirental adalah  $jenisMotor selama $lamaRental hari<br>";
    echo "Harga Rental per-harinya : " . number_format($totalBiaya / $lamaRental, 2) . "<br>";
    echo "<b>Besar yang harus dibayarkan adalah: " . number_format($totalBiaya, 2) . " (<i>Termasuk Pajak)</i></b>";
    echo "</div>";
}
?>