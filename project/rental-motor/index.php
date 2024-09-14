<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --bg-color: #1a1a1a;
            --second-bg-color: #2c2c2c;
            --text-color: #ffffff;
            --main-color: #ff7f00;
            --main-color-hover: #e76e00;
            --highlight-color: #ff4500;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: var(--second-bg-color);
            border-radius: 8px;
            box-shadow: 0 0 10px var(--main-color);
            border: 1px solid var(--main-color);
        }

        form h1{
            text-align: center;
            color: var(--main-color);
            margin-bottom: 30px;
        }

        .form-label {
            color: var(--main-color);
        }

        .form-control,
        .form-select {
            background-color: var(--second-bg-color);
            color: var(--text-color);
            border: 1px solid var(--main-color);
        }

        .form-control::placeholder {
            color: var(--text-color);
        }

        .btn-primary {
            background-color: var(--main-color);
            border-color: var(--highlight-color);
        }

        .btn-primary:hover {
            background-color: var(--main-color-hover);
            border-color: var(--highlight-color);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .hasil {
            border: 1px solid var(--main-color);
            padding: 20px;
            margin: 1rem auto;
            border-radius: 10px;
            box-shadow: 0 0 10px var(--main-color);
            text-align: center;
            background-color: var(--second-bg-color);
            color: var(--text-color);
            font-weight: bold;
        }

        .hasil-header h2,
        .hasil-footer p {
            margin: 0;
            padding: 10px 0;
            color: var(--main-color);
        }

        .hasil-body {
            margin: 20px 0;
        }

        .spn{
            font-size: 20px;
        }
        @media (min-width: 300px) {
            form {
                max-width: 90%;
            }
            .hasil {
                max-width: 85%;
            }
        }

        @media (min-width: 768px) {
            form {
                max-width: 60%;
            }
            .hasil {
                max-width: 50%;
            }
        }

        @media (min-width: 992px) {
            form {
                max-width: 50%;
            }
            .hasil {
                max-width: 40%;
            }
        }

        @media (min-width: 1200px) {
            form {
                max-width: 50%;
            }
            .hasil {
                max-width: 30%;
            }
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <h1>Rental Motor</h1>
        <div class="form-group">
            <label for="nama" class="form-label">Masukan nama :</label>
            <input type="text" name="member" id="nama" class="form-control" placeholder="Masukan nama" required>
        </div>
        <div class="form-group">
            <label for="jenis" class="form-label">Pilih Jenis Motor : </label>
            <select name="jenis" id="jenis" class="form-select" required>
                <option value="default" selected disabled>Pilih jenis Motor:</option>
                <option value="Scooter">Scooter</option>
                <option value="Sport">Sport</option>
                <option value="SportTouring">Sport Touring</option>
                <option value="Cross">Cross</option>
            </select>
        </div>
        <div class="form-group">
            <label for="waktu" class="form-label">Masukan waktu sewa : </label>
            <input type="number" name="waktu" id="waktu" class="form-control" min="1" placeholder="Minimal 1 hari" required>
        </div>
        <center>
            <button type="submit" name="submit" class="btn btn-primary">Sewa</button>
        </center>
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
            echo "<div class='hasil-header'><h2>Detail Pembayaran</h2></div>";
            echo "<div class='hasil-body'>";
            echo $this->member . " berstatus sebagai " . $this->getMember() . " mendapatkan diskon sebesar " . $this->Rental()[1] . "%";
            echo "<br>";
            echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari";
            echo "<br>";
            echo "Harga rental per-harinya : Rp. " . number_format($this->getHarga()[$this->jenis]);
            echo "<br>";
            echo "<b>Besar yang harus dibayarkan adalah: Rp. <span class='spn'>" . number_format($this->Rental()[0]) . "</span> (<i>Termasuk Pajak)</i></b>";
            echo "</div>";
            echo "<div class='hasil-footer'><p>Terima kasih telah menggunakan layanan kami.</p></div>";
            echo "</div>";
        }
    }

    $logic = new Rental();
    $logic->setHarga(100000, 150000, 200000, 250000);

    if (isset($_POST['submit'])) {
        $logic->member = $_POST['member'];
        $logic->jenis = $_POST['jenis'];
        $logic->waktu = $_POST['waktu'];

        $logic->Pembayaran();
    }
    ?>
</body>

</html>
