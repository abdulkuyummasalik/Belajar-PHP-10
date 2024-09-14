<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perbandingan</title>
</head>

<body>
    <div class="container">
        <?php
        $hasil_perbandingan = "";
        if (isset ($_POST['submit'])) {
            $number1 = $_POST['number1'];
            $number2 = $_POST['number2'];
            if ($number1 == $number2) {
                $hasil_perbandingan = "<span class='operator'>=</span>
                " . "<br>" . "
                $number1 sama dengan $number2";
            } elseif ($number1 > $number2) {
                $hasil_perbandingan = "<span class='operator'>></span>
                " . "<br>" . "
                $number1 lebih besar dari $number2";
            } else {
                $hasil_perbandingan = "<span class='operator'><</span>
                " . "<br>" . "
                $number1 lebih kecil dari $number2";
            }
        } elseif (isset ($_POST['hapus'])) {
            $number1 = null;
            $number2 = null;
            $hasil_perbandingan = null;
        }
        ?>
        <?php if (!empty ($hasil_perbandingan)): ?>
        <p class="hasil">
            <?php echo $hasil_perbandingan; ?>
        </p>
        <?php endif; ?>
        <p class="judul">Cek Perbandingan Angka</p>
        <form action="" method="post">
            <label for="number1">Angka Pertama:</label>
            <input type="number" id="number1" name="number1" value="<?php echo $number1; ?>" required>
            <label for="number2">Angka Kedua:</label>
            <input type="number" id="number2" name="number2" value="<?php echo $number2; ?>" required>
            <button type="submit" name="hapus" style="margin-right: 30px;">Bersihkan</button>
            <button type="submit" name="submit">Kirim</button>
        </form>
        <footer>@khoyum - 2024</footer>
    </div>
</body>

</html>