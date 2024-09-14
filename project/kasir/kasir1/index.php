<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian Barang</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #fce4ec;
        margin: 0;
        padding: 0;
    }

    a {
        text-decoration: none;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h1,
    h2 {
        text-align: center;
        color: #e91e63;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 30px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .error {
        color: #e91e63;
        margin-top: 10px;
        font-size: 0.9rem;
    }

    .total-row {
        background-color: #f8bbd0;
    }

    .button {
        margin: 20px 0;
        width: 100%;
        padding: 10px;
        font-weight: 600;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .button-primary {
        background-color: #e91e63;
        color: #fff;
    }

    .button-primary:hover {
        background-color: #ad1457;
    }

    .button-hapus {
        background-color: #f06292;
        padding: 5px;
        color: #fff;
    }

    .button-hapus:hover {
        background-color: #c2185b;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    .table th,
    .table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .table thead {
        background-color: #fce4ec;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f8bbd0;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #fce4ec;
    }

    .table th {
        background-color: #e91e63;
        color: #fff;
    }

    @media (max-width: 600px) {
        .container {
            margin: 20px auto;
            padding: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group input {
            padding: 0.5em;
        }

        .button {
            padding: 0.5em;
            margin: 10px 0;
        }

        .table th,
        .table td {
            padding: 0.5em;
        }
    }
</style>

<body>
    <div class="container">
        <?php
        session_start();
        // halaman awal
        $page = isset($_GET['page']) ? $_GET['page'] : 'pembelian';


        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
            $namaBarang = htmlspecialchars($_POST['namaBarang']);
            $jumlahBarang = filter_var($_POST['jumlahBarang'], FILTER_VALIDATE_INT);
            $hargaSatuan = filter_var($_POST['harga'], FILTER_VALIDATE_INT);

            if ($namaBarang && $jumlahBarang && $hargaSatuan) {
                $totalHarga = $hargaSatuan * $jumlahBarang;

                if (!isset($_SESSION['pembelian'])) {
                    $_SESSION['pembelian'] = [];
                }

                $_SESSION['pembelian'][] = [
                    'namaBarang' => $namaBarang,
                    'jumlahBarang' => $jumlahBarang,
                    'harga_satuan' => $hargaSatuan,
                    'total_harga' => $totalHarga
                ];

                header("Location: ?page=pembelian");
                exit();
            }
        }

        if (isset($_GET['hapus']) && isset($_SESSION['pembelian'][$_GET['hapus']])) {
            unset($_SESSION['pembelian'][$_GET['hapus']]);
            $_SESSION['pembelian'] = array_values($_SESSION['pembelian']);

            header("Location: ?page=pembelian");
            exit();
        }

        if ($page == 'pembelian') {
            $dataBarang = isset($_SESSION['pembelian']) && !empty($_SESSION['pembelian']);
        ?>
            <h1>KASIR</h1>
            <h2>Beli Barang</h2>
            <form method="POST" action="?page=pembelian">
                <div class="form-group">
                    <label for="namaBarang">Nama Barang:</label>
                    <input type="text" id="namaBarang" name="namaBarang" required placeholder="Masukkan nama barang">
                </div>
                <div class="form-group">
                    <label for="jumlahBarang">Jumlah:</label>
                    <input type="number" id="jumlahBarang" name="jumlahBarang" min="1" required placeholder="Masukkan jumlah barang">
                </div>
                <div class="form-group">
                    <label for="harga">Harga Satuan:</label>
                    <input type="number" id="harga" name="harga" min="1" required placeholder="Masukkan harga satuan">
                </div>
                <button type="submit" class="button button-primary" name="tambah">Tambah</button>
            </form>

            <?php
            if ($dataBarang) {
                echo "<h2>Data Barang yang Akan Dibeli</h2>";
                echo "<table class='table'>
                        <thead class='thead-light'>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach ($_SESSION['pembelian'] as $key => $pembelian) {
                    echo "<tr>
                            <td>{$pembelian['namaBarang']}</td>
                            <td>{$pembelian['jumlahBarang']}</td>
                            <td>Rp " . number_format($pembelian['harga_satuan'], 0, ',', '.') . "</td>
                            <td>Rp " . number_format($pembelian['total_harga'], 0, ',', '.') . "</td>
                            <td><a href='?page=pembelian&hapus={$key}' class='button button-hapus'>Hapus</a></td>
                        </tr>";
                }
                echo "</tbody></table>";

                echo "<form method='GET' action=''>";
                echo "<input type='hidden' name='page' value='pembayaran'>";
                echo "<button type='submit' class='button button-primary'>Pembayaran</button>";
                echo "</form>";
            }
        }

        if ($page == 'pembayaran' && isset($_SESSION['pembelian']) && !empty($_SESSION['pembelian'])) {
            echo "<h2>Detail Pembelian</h2>";
            echo "<table class='table'>
                    <thead class='thead-light'>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>";
            $totalKeseluruhan = 0;
            foreach ($_SESSION['pembelian'] as $pembelian) {
                echo "<tr>
                        <td>{$pembelian['namaBarang']}</td>
                        <td>{$pembelian['jumlahBarang']}</td>
                        <td>Rp " . number_format($pembelian['harga_satuan'], 0, ',', '.') . "</td>
                        <td>Rp " . number_format($pembelian['total_harga'], 0, ',', '.') . "</td>
                    </tr>";
                $totalKeseluruhan += $pembelian['total_harga'];
            }
            echo "<tr class='total-row'>
                    <td colspan='3'><strong>Total Keseluruhan</strong></td>
                    <td><strong>Rp " . number_format($totalKeseluruhan, 0, ',', '.') . "</strong></td>
                </tr>";
            echo "</tbody></table>";

            echo "<form method='POST' action='?page=pembayaran'>";
            echo "<div class='form-group'>";
            echo "<label for='uang_dibayar'>Jumlah Uang:</label>";
            echo "<input type='number' id='uang_dibayar' name='uang_dibayar' required min='$totalKeseluruhan' placeholder='Masukkan jumlah uang'>";

            if (isset($_GET['error'])) echo "<p class='error'>{$_GET['error']}</p>";

            echo "</div>";
            echo "<button type='submit' class='button button-primary' name='bayar'>Bayar</button>";
            echo "</form>";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bayar'])) {
            $uangDibayar = filter_var($_POST['uang_dibayar'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
            $totalKeseluruhan = array_sum(array_column($_SESSION['pembelian'], 'total_harga'));

            if ($uangDibayar && $uangDibayar >= $totalKeseluruhan) {
                $kembalian = $uangDibayar - $totalKeseluruhan;
                $_SESSION['transaksi'] = [
                    'pembelian' => $_SESSION['pembelian'],
                    'uang_dibayar' => $uangDibayar,
                    'total_keseluruhan' => $totalKeseluruhan,
                    'kembalian' => $kembalian
                ];
                unset($_SESSION['pembelian']);
                header("Location: ?page=transaksi");
                exit();
            } else {
                $error = "Uang yang dibayarkan tidak cukup. Total harga: Rp " . number_format($totalKeseluruhan, 0, ',', '.');
                header("Location: ?page=pembayaran&error=" . urlencode($error));
                exit();
            }
        }

        if ($page == 'transaksi' && isset($_SESSION['transaksi'])) {
            $transaksi = $_SESSION['transaksi'];
            ?>
            <h2>Transaksi</h2>
            <table class="table">
                <thead class='thead-light'>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transaksi['pembelian'] as $pembelian) {
                        echo "<tr>
                                <td>{$pembelian['namaBarang']}</td>
                                <td>{$pembelian['jumlahBarang']}</td>
                                <td>Rp " . number_format($pembelian['harga_satuan'], 0, ',', '.') . "</td>
                                <td>Rp " . number_format($pembelian['total_harga'], 0, ',', '.') . "</td>
                            </tr>";
                    }
                    ?>
                    <tr class="total-row">
                        <td colspan="3"><strong>Total Keseluruhan</strong></td>
                        <td><strong>Rp <?php echo number_format($transaksi['total_keseluruhan'], 0, ',', '.'); ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Uang Dibayar</strong></td>

                        <td><strong>Rp <?php echo number_format($transaksi['uang_dibayar'], 0, ',', '.'); ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Kembalian</strong></td>
                        <td><strong>Rp <?php echo number_format($transaksi['kembalian'], 0, ',', '.'); ?></strong></td>
                    </tr>
                </tbody>
            </table>
            <form method="GET" action="">
                <input type="hidden" name="page" value="pembelian">
                <button type="submit" class="button button-primary">Beli Lagi</button>
            </form>
            <button onclick="window.print()" class="button button-primary">Cetak</button>

        <?php
        }
        ?>
    </div>
</body>

</html>