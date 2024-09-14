<?php

class Tiket
{
    private $reguler, $vip, $vvip;

    public function setHarga($reguler, $vip, $vvip)
    {
        $this->reguler = $reguler;
        $this->vip = $vip;
        $this->vvip = $vvip;
    }

    public function getHarga()
    {
        return [
            "Reguler" => $this->reguler,
            "VIP" => $this->vip,
            "VVIP" => $this->vvip
        ];
    }
}

class Beli extends Tiket
{
    public $jumlahTiket, $jenisTiket, $harga;

    public function totalHarga()
    {
        $harga = $this->getHarga();
        $this->harga = $harga[$this->jenisTiket] * $this->jumlahTiket;
        return $this->harga;
    }

    public function bayar()
    {
        echo "<div style='text-align: center; margin-top: 20px; background-color: var(--second-bg-color); border-radius: 10px; padding: 10px; box-shadow: 0px 0px 10px var(--main-color); color: var(--text-color);'>";
        echo "<strong>Rincian Pembelian:</strong><br>";
        echo "<br>";
        echo "Jenis Tiket : " . $this->jenisTiket . "<br>";
        echo "Jumlah Tiket : " . $this->jumlahTiket . "<br>";
        echo "Total Harga : Rp " . number_format($this->harga) . "<br>";
        echo "</div>";
    }
}

$beli = new Beli;
$beli->setHarga(100000, 200000, 300000);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $beli->jenisTiket = $_POST['jenis'];
    $beli->jumlahTiket = $_POST['jumlah'];
    $beli->totalHarga();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket</title>
    <style>
        :root {
            --bg-color: #1a1a1a;
            --second-bg-color: #2c2c2c;
            --text-color: #ffffff;
            --main-color: #ff7f00;
            --main-color-hover: #e56a00;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: Arial, sans-serif;
            padding-top: 70px;
            margin: 0;
        }

        .content {
            max-width: 600px;
            margin: auto;
            background-color: var(--second-bg-color);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px var(--main-color);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        select,
        input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 14px;
        }

        .beli {
            background-color: var(--main-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .beli:hover {
            background-color: var(--main-color-hover);
        }

        .alert {
            text-align: center;
            margin-top: 20px;
            background-color: var(--second-bg-color);
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0px 0px 10px var(--main-color);
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1 style="text-align: center; margin-bottom: 20px;">Pembelian Tiket</h1>
        <form method="POST">
            <div class="form-group">
                <label for="jenis">Jenis Tiket :</label>
                <select id="jenis" name="jenis">
                    <option value="Reguler">Reguler</option>
                    <option value="VIP">VIP</option>
                    <option value="VVIP">VVIP</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah">Banyak Tiket :</label>
                <input type="number" id="jumlah" name="jumlah" required>
            </div>
            <center>
                <button type="submit" class="beli" name="beli">Beli</button>
            </center>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beli->bayar();
        }
        ?>
    </div>
</body>

</html>