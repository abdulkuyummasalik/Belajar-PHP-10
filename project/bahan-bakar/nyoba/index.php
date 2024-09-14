<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bahan bakar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h2 class="text-center mt-4">Bahan Bakar</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="jenis" class="form-label">Pilih Jenis Bahan Bakar</label>
                <select name="jenis" id="jenis" class="form-select" required>
                    <option value="default" selected disabled>Pilih jenis Bahan Bakar:</option>
                    <option value="Pertalite">Pertalite - Rp. 10.000/liter</option>
                    <option value="Pertamax">Pertamax - Rp. 12.950/liter</option>
                    <option value="Turbo">Turbo - Rp. 14.400/liter</option>
                    <option value="BioSolar">Bio Solar - Rp. 6.800/liter</option>
                </select>
            </div>
            <div class="form-group">
                <label for="liter" class="form-label">Masukan jumlah Liter pembelian</label>
                <input type="number" name="liter" id="liter" class="form-control" min="1" placeholder="Minimal 1 liter" required>
            </div>
            <button type="submit" name="beli" class="mt-2 btn btn-primary">Beli</button>
        </form>

        <?php
        require 'logic.php';

        $logic = new BeliBahanBakar();
        $logic->setHarga(10000, 1295, 14400, 6800);

        if (isset($_POST['beli'])) {
            $logic->jenisBahanBakar = $_POST['jenis'];
            $logic->totalLiter = $_POST['liter'];
            $logic->totalHarga();
            ob_start();
            $logic->cetakBukti();
            $output = ob_get_clean();
            echo "<div class='output'>$output</div>";
        }
        ?>
    </div>
</body>

</html>