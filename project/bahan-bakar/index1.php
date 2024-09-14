<?php

class Shell
{
    public
        $harga,
        $jumlah,
        $jenis,
        $ppn;

    public function __construct($harga, $jenis)
    {
        $this->harga = $harga;
        $this->jumlah = 0;
        $this->jenis = $jenis;
        $this->ppn = 0.1;
    }

    public function setJumlah($jumlah)
    {
        $this->jumlah = $jumlah;
    }

    public function getJenis()
    {
        return $this->jenis;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function getJumlah()
    {
        return $this->jumlah;
    }

    public function hitungTotal()
    {
        return $this->harga * $this->jumlah;
    }

    public function hitungPPN()
    {
        return $this->hitungTotal() * $this->ppn;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hargaShellSuper = 15420;
    $hargaShellVPower = 16130;
    $hargaShellVPowerDiesel = 18310;
    $hargaShellVPowerNitro = 16510;

    $selectedFuel = $_POST["jenis_bahan_bakar"];
    $quantity = $_POST["jumlah"];
    $selectedHarga = 0;

    switch ($selectedFuel) {
        case "Shell Super":
            $selectedHarga = $hargaShellSuper;
            break;
        case "Shell V-Power":
            $selectedHarga = $hargaShellVPower;
            break;
        case "Shell V-Power Diesel":
            $selectedHarga = $hargaShellVPowerDiesel;
            break;
        case "Shell V-Power Nitro":
            $selectedHarga = $hargaShellVPowerNitro;
            break;
    }

    $selectedShell = new Shell($selectedHarga, $selectedFuel);
    $selectedShell->setJumlah($quantity);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 450px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .hasil,
        .transaksi,
        .formm {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .formm form {
            display: flex;
            text-align: center;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .formm label,
        .formm input,
        .formm select {
            width: 90%;
            margin-bottom: 5px;
            font-size: 18px;
        }

        .formm input[type="submit"] {
            padding: 8px 16px;
            cursor: pointer;
            background-color: deeppink;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .labell{
            padding: 10px 16px;
            margin: 10px 0;
            cursor: pointer;
            background-color: deeppink;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        .formm input[type="submit"]:hover {
            background-color: #FF00FF;
        }
        .formm select {
            text-align-last: center; /* Aligment opsi ke tengah */
        }

        .formm input[type="number"]::placeholder {
            text-align: center; /* Aligment placeholder ke tengah */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="hasil">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
                <?php echo "";
                            echo "--------------------------------------------------------------- <br>";
                            echo "Anda membeli bahan bakar minyak tipe " . $selectedShell->getJenis() . "<br> Dengan jumlah : " . $selectedShell->getJumlah() . " liter <br><b> Total yang harus di bayar Rp " . number_format(($selectedShell->hitungTotal() + $selectedShell->hitungPPN()), 2, ',', '.') . "<br> </b>";
                echo '<button class="labell">Bayar </button><br>';

                            echo "---------------------------------------------------------------";
                ?>
            <?php endif; ?>
        </div>
        <div class="formm">
            <h2>Form Pembelian Bahan Bakar</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="jenis_bahan_bakar">Pilih Jenis Bahan Bakar:</label><br>
                <select id="jenis_bahan_bakar" name="jenis_bahan_bakar">
                    <option value="Shell Super">Shell Super</option>
                    <option value="Shell V-Power">Shell V-Power</option>
                    <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                    <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
                </select><br>
                <label for="jumlah">Jumlah:</label><br>
                <input type="number" id="jumlah" name="jumlah" min="1" placeholder="Minimal 1 liter" required><br>
                <label for="bayar">Bayar:</label>
                <input type="submit" value="Beli">
            </form>
        </div>
        <!-- <div class="transaksi">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
                <h2>Detail Transaksi:</h2>
                <?php
                echo "Jenis Bahan Bakar: " . $selectedShell->getJenis() . "<br>";
                echo "Harga: Rp. " . number_format($selectedShell->getHarga(), 2, ',', '.') . "<br>";
                echo "Jumlah: " . $selectedShell->getJumlah() . " liter.<br>";
                echo "Total Harga: Rp. " . number_format($selectedShell->hitungTotal(), 2, ',', '.') . "<br>";
                echo "PPN (10%): Rp. " . number_format($selectedShell->hitungPPN(), 2, ',', '.') . "<br>";
                echo "<b>Total yang Harus Dibayar: Rp. " . number_format(($selectedShell->hitungTotal() + $selectedShell->hitungPPN()), 2, ',', '.') . "<br></b>";
                ?>
            <?php endif; ?>
        </div> -->
    </div>
</body>

</html>
