<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bahan Bakar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #e0f7e9;
        }

        form {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            color: #28a745;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <form action="" method="POST">
        <div class="form-group">
            <label for="jenis" class="form-label">Pilih Jenis Bahan Bakar</label>
            <select name="jenis" id="jenis" class="form-select" required>
                <option value="default" selected disabled >Pilih jenis Bahan Bakar:</option>
                <option value="SSuper">Shell Super - Rp. 10.000/liter</option>
                <option value="SVPower">Shell V-Power - Rp. 15.000/liter</option>
                <option value="SVPowerDiesel">Shell V-Power Diesel - Rp. 18.000/liter</option>
                <option value="SVPowerNitro">Shell V-Power Nitro - Rp. 20.000/liter</option>
            </select>
        </div>
        <div class="form-group">
            <label for="liter" class="form-label">Masukan jumlah Liter pembelian</label>
            <input type="number" name="liter" id="liter" class="form-control" min="1" placeholder="Minimal 1 liter" required>
        </div>
        <center><button type="submit" name="beli" class="btn btn-primary">Beli</button>
        </center>
    </form>

    <?php
    // panggil file logic
    require 'logic.php';
    // baru dibuka, langsung set harganya
    $logic = new Pembelian();
    $logic->setHarga(10000, 15000, 18000, 18000);
    // jika sudah fixt, jalankan
    if (isset($_POST['beli'])) {
        // isi atribut public pada class sesuai dengan isian formnya
        $logic->jenisYangDiPilih = $_POST['jenis'];
        $logic->totalLiter = $_POST['liter'];
        // abis kirim nilai formnya, proses harganya
        $logic->totalHarga();
        ob_start();
        $logic->cetakBukti();
        $output = ob_get_clean();
        echo "<div class='output'>$output</div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>