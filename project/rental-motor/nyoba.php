<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2 class=" mt-4 text-center">Rental Motor</h2>
        <form action="" method="POST">
            <label class="form-label" for="nama">Nama :</label>
            <input class="form-control" type="text" name="nama" id="nama" required>
            <label class="form-label" for="lama">Lama :</label>
            <input class="form-control" type="number" name="lama" id="lama" required>
            <label class="form-label" for="jenis">Jenis :</label>
            <select class="form-control" name="jenis" id="jenis" required>
                <option value="Scooter">Scooter</option>
                <option value="Sport">Sport</option>
                <option value="Sport Touring">Sport Touring</option>
                <option value="Cross">Cross</option>
            </select>
            <div class="d-flex justify-content-center ">
                <input class="btn btn-primary mt-2" type="submit" name="submit" value="Submit">
            </div>
        </form>

        <?php
        class Rental
        {
            private $nama, $lama, $jenis, $pajak = 10000;
            private $member = ['Khoyum', 'Masalik'];

            public function __construct($nama, $jenis, $lama)
            {
                $this->nama = $nama;
                $this->jenis = $jenis;
                $this->lama = $lama;
            }

            public function getHarga()
            {
                switch ($this->jenis) {
                    case 'Scooter':
                        $harga = 100000;
                        break;
                    case 'Sport':
                        $harga = 200000;
                        break;
                    case 'Sport Touring':
                        $harga = 300000;
                        break;
                    case 'Cross':
                        $harga = 400000;
                        break;
                    default:
                        $harga = 0;
                        break;
                }
                return $harga;
            }

            public function member()
            {
                return in_array($this->nama, $this->member);
            }

            public function hitungBiaya()
            {
                $harga = $this->getHarga();
                $totalBiaya = $harga * $this->lama;

                if ($this->member()) {
                    $totalBiaya -= ($totalBiaya * 0.5);
                }

                $totalBiaya += $this->pajak;

                return $totalBiaya;
            }
        }

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $jenis = $_POST['jenis'];
            $lama = $_POST['lama'];

            $rental = new Rental($nama, $jenis, $lama);
            $totalBiaya = $rental->hitungBiaya();

            echo "<div class='card text-center mt-3'>";
            if ($rental->member()) {
                echo "$nama berstatus sebagai Member dan mendapatkan diskon sebesar 50%.<br>";
            } else {
                echo "$nama berstatus bukan Member.<br>";
            }
            echo "Jenis Motor yang dirental adalah $jenis selama $lama hari<br>";
            echo "Harga Rental per-harinya : " . number_format($totalBiaya / $lama, 2) . "<br>";
            echo "<b>Besar yang harus dibayarkan adalah: " . number_format($totalBiaya, 2) . " (<i>Termasuk Pajak)</i></b>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>