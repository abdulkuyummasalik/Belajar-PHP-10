<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor K28</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffcccc;
            color: #000;
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            color: #ff1493;
            font-weight: bold;
        }

        .form-control,
        .form-select {
            border: 2px solid #ff1493;
        }

        .btn-primary {
            background-color: #ff1493;
            border-color: #ff1493;
            font-weight: bold;
            width: 100%;
            /* Mengubah lebar button menjadi 100% */
        }

        .btn-primary:hover {
            background-color: #ff66b2;
            border-color: #ff66b2;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .hasil {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: left;
            color: #000;
        }

        .hasil b {
            color: #ff1493;
        }

        .hasil i {
            color: #666;
        }

        @media (max-width: 768px) {
            form {
                margin: 20px;
            }

            .hasil {
                margin: 20px;
            }
        }
    </style>
</head>

<body>
    <form action="" method="POST" id="rentalForm">
        <div class="form-group">
            <label for="nama" class="form-label">Masukkan nama :</label>
            <input type="text" name="member" id="nama" class="form-control" placeholder="Masukkan nama" required>
        </div>
        <div class="form-group">
            <label for="jenis" class="form-label">Pilih Jenis Motor : </label>
            <select name="jenis" id="jenis" class="form-select" required>
                <option value="" selected disabled>Pilih jenis Motor:</option>
                <option value="Scooter">Scooter</option>
                <option value="Sport">Sport</option>
                <option value="SportTouring">Sport Touring</option>
                <option value="Cross">Cross</option>
            </select>
        </div>
        <div class="form-group">
            <label for="waktu" class="form-label">Masukkan waktu sewa : </label>
            <input type="number" name="waktu" id="waktu" class="form-control" min="1" placeholder="Minimal 1 hari" required>
        </div>
        <div class="form-group"> <!-- Memindahkan button ke dalam div dengan class form-group -->
            <button type="submit" name="submit" class="btn btn-primary">Sewa</button>
        </div>
    </form>

    <?php
    class Data
    {
        public $member, $jenis, $waktu, $diskon;
        protected $pajak;
        private $Scooter, $Sport, $SportTouring, $Cross;
        private $listMember = ['Khoyum', 'Bintang', 'Zidan', 'ara'];

        public function __construct()
        {
            $this->pajak = 10000;
        }

        public function getMember()
        {
            if (in_array($this->member, $this->listMember)) {
                return "Member";
            } else {
                return "Non Member";
            }
        }

        public function setHarga($jenis1, $jenis2, $jenis3, $jenis4)
        {
            $this->Scooter = $jenis1;
            $this->Sport = $jenis2;
            $this->SportTouring = $jenis3;
            $this->Cross = $jenis4;
        }

        public function getHarga()
        {
            $data['Scooter'] = $this->Scooter;
            $data['Sport'] = $this->Sport;
            $data['SportTouring'] = $this->SportTouring;
            $data['Cross'] = $this->Cross;

            return $data;
        }
    }

    class Rental extends Data
    {
        public function Rental()
        {
            $dataHarga = $this->getHarga()[$this->jenis];
            $diskon = $this->getMember() == "Member" ? 5 : 0;
            if ($this->waktu === 1) {
                $bayar = ($dataHarga - ($dataHarga * $diskon / 100)) + $this->pajak;
            } else {
                $bayar = (($dataHarga * $this->waktu) - ($dataHarga * $diskon / 100) + $this->pajak);
            }
            return [$bayar, $diskon];
        }

        public function Pembayaran()
        {
            echo "<div class='hasil'>";
            echo $this->member . " berstatus sebagai " . $this->getMember() . " mendapatkan diskon sebesar " . $this->Rental()[1] . "%";
            echo "<br>";
            echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari";
            echo "<br>";
            echo "Harga rental per-harinya : Rp. " . number_format($this->getHarga()[$this->jenis]);
            echo "<br>";
            echo "<b>Besar yang harus dibayarkan adalah: Rp. " . number_format($this->Rental()[0]) . " (<i>Termasuk Pajak)</i></b>";
            echo " </div>";
        }
    }

    $logic = new Rental();
    $logic->setHarga(100000, 150000, 200000, 250000);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $logic->member = $_POST['member'];
        $logic->jenis = $_POST['jenis'];
        $logic->waktu = $_POST['waktu'];

        $logic->Pembayaran();
    }
    ?>
</body>

</html>