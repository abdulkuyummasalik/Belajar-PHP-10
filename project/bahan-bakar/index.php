<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #1a1a1a;
            --second-bg-color: #2c2c2c;
            --text-color: #ffffff;
            --main-color: #ff7f00;
            --hover-color: #e66a00;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 700px;
            margin: 20px;
            background-color: var(--second-bg-color);
            border-radius: 15px;
            box-shadow: 0 0 40px var(--main-color);
            padding: 40px;
        }

        label,
        form label {
            font-weight: bold;
            color: var(--main-color);
            display: block;
            text-align: center;
            margin-bottom: 10px;
        }

        .output button,
        button[type="submit"] {
            width: 100%;
            margin-bottom: 20px;
            border: 5px solid var(--main-color);
            border-radius: 10px;
            box-sizing: border-box;
            font-size: 18px;
            padding: 10px;
            background-color: var(--main-color);
            color: var(--text-color);
        }

        button[type="submit"],
        .output button {
            background-color: var(--main-color);
            color: var(--text-color);
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            padding: 12px 20px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover,
        .output button:hover {
            background-color: var(--hover-color);
        }

        button[name="printt"] {
            background-color: #0056b3;
        }

        button[name="printt"]:hover {
            background-color: #003c80;
        }

        .output {
            text-align: center;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            button[type="submit"],
            .output button {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php if (!isset($_POST['beli']) && !isset($_POST['bayar'])) : ?>
            <div class="form-card">
                <h1 class="text-center">Form Bahan Bakar</h1>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="jenis">Pilih Jenis Bahan Bakar</label>
                        <select class="form-control" name="jenis" id="jenis" required>
                            <option value="default" selected disabled>Pilih jenis Bahan Bakar</option>
                            <option value="SSuper">Shell Super - Rp. 10.000/liter</option>
                            <option value="SVPower">Shell V-Power - Rp. 15.000/liter</option>
                            <option value="SVPowerDiesel">Shell V-Power Diesel - Rp. 18.000/liter</option>
                            <option value="SVPowerNitro">Shell V-Power Nitro - Rp. 20.000/liter</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="liter">Masukan jumlah Liter pembelian</label>
                        <input type="number" class="form-control" name="liter" id="liter" min="1" placeholder="Minimal 1 liter" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="beli">Beli</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>

        <?php
        class DataBahanBakar
        {
            private $hargaSSuper, $hargaSVPower, $hargaSVPowerDiesel, $hargaSVPowerNitro;

            public function setHarga($valSSuper, $valSVPower, $valSVPowerDiesel, $valSVPowerNitro)
            {
                $this->hargaSSuper = $valSSuper;
                $this->hargaSVPower = $valSVPower;
                $this->hargaSVPowerDiesel = $valSVPowerDiesel;
                $this->hargaSVPowerNitro = $valSVPowerNitro;
            }

            public function getHarga()
            {
                return [
                    "SSuper" => $this->hargaSSuper,
                    "SVPower" => $this->hargaSVPower,
                    "SVPowerDiesel" => $this->hargaSVPowerDiesel,
                    "SVPowerNitro" => $this->hargaSVPowerNitro
                ];
            }
        }

        class Pembelian extends DataBahanBakar
        {
            public $jenisYangDiPilih;
            public $totalLiter;
            protected $totalPembayaran;

            public function totalHarga()
            {
                $this->totalPembayaran = $this->getHarga()[$this->jenisYangDiPilih] * $this->totalLiter;
            }

            public function cetakBukti()
            {
        ?>
                <div class='output'>
                    <h4><strong>Terima kasih telah melakukan pembelian!</strong></h4>
                    <div><strong>Jenis Bahan Bakar yang Anda Beli:</strong> <?php echo $this->jenisYangDiPilih; ?></div>
                    <div><strong>Total Liter yang Anda Beli:</strong> <?php echo $this->totalLiter; ?></div>
                    <div><strong>Total Harga yang Anda Bayarkan:</strong> Rp. <?php echo number_format($this->totalPembayaran); ?></div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="metode">Pilih Metode Pembayaran</label>
                            <select class="form-control" name="metode" id="metode" required>
                                <option value="default" selected disabled>Pilih Metode Pembayaran:</option>
                                <option value="cash">Cash</option>
                                <option value="debit">Debit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="jenis" value="<?php echo $this->jenisYangDiPilih; ?>">
                            <input type="hidden" name="liter" value="<?php echo $this->totalLiter; ?>">
                            <label for="uangDibayar">Masukkan jumlah uang yang akan Anda bayarkan</label>
                            <input type="number" class="form-control" name="uangDibayar" id="uangDibayar" min="<?php echo $this->totalPembayaran; ?>" required>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" name="bayar">Bayar</button>
                        </div>
                    </form>
                </div>
            <?php
            }
        }

        $logic = new Pembelian();
        $logic->setHarga(10000, 15000, 18000, 20000);

        if (isset($_POST['beli'])) {
            $logic->jenisYangDiPilih = $_POST['jenis'];
            $logic->totalLiter = $_POST['liter'];
            $logic->totalHarga();
            $logic->cetakBukti();
        } elseif (isset($_POST['bayar'])) {
            $jenis = isset($_POST['jenis']) ? $_POST['jenis'] : null;
            $liter = isset($_POST['liter']) ? $_POST['liter'] : null;
            $metode = isset($_POST['metode']) ? $_POST['metode'] : null;
            $uangDibayar = isset($_POST['uangDibayar']) ? $_POST['uangDibayar'] : null;

            if ($jenis && $liter && $metode && $uangDibayar) {
                $harga = [
                    "SSuper" => 10000,
                    "SVPower" => 15000,
                    "SVPowerDiesel" => 18000,
                    "SVPowerNitro" => 20000
                ];
                $totalBayar = $harga[$jenis] * $liter;
                $kembalian = $uangDibayar - $totalBayar;
            ?>
                <div class='output'>
                    <h4><strong>Terima kasih telah melakukan pembelian!</strong></h4>
                    <div><strong>Jenis Bahan Bakar yang Anda Beli: <b><?php echo $jenis; ?></b></strong></div>
                    <div><strong>Total Liter yang Anda Beli: <b><?php echo $liter; ?></b></strong></div>
                    <div><strong>Total Harga yang Anda Bayarkan: Rp. <b><?php echo number_format($totalBayar); ?></b></strong></div>
                    <div><strong>Metode Pembayaran: <b><?php echo $metode; ?></b></strong></div>
                    <div><strong>Uang yang Dibayarkan: Rp. <b><?php echo number_format($uangDibayar); ?></b></strong></div>
                    <div><strong>Kembalian: Rp. <b><?php echo number_format($kembalian); ?></b></strong></div>
                    <form action="" method="POST">
                        <div class="text-center" style="margin-top: 20px;">
                            <button type="button" name="printt" class="btn btn-lg btn-primary" onclick="window.print()">Print</button>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" name="selesai">Kembali</button>
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>