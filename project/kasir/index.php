<!DOCTYPE html>
<html>

<head>
    <title>Kasir</title>
</head>

<style>
    :root {
        --bg-color: #1a1a1a;
        --second-bg-color: #2c2c2c;
        --text-color: #ffffff;
        --main-color: #ff7f00;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--bg-color);
        color: var(--text-color);
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background: var(--second-bg-color);
        border-radius: 8px;
        box-shadow: 0 4px 6px var(--main-color);
        padding: 30px;
    }

    h1 {
        text-align: center;
        color: var(--main-color);
    }

    h2,
    h3 {
        color: var(--main-color);
        margin-bottom: 20px;
    }

    form {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: var(--text-color);
        font-size: 18px;
    }

    select,
    input[type="number"],
    input[type="submit"] {
        width: 100%;
        padding: 14px;
        margin-bottom: 20px;
        border: 1px solid var(--main-color);
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        background-color: var(--second-bg-color);
        color: var(--text-color);
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="submit"] {
        background: var(--main-color);
        color: var(--text-color);
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 18px;
    }

    input[type="submit"]:hover {
        background-color: #e76e00;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 14px;
        border: 1px solid var(--main-color);
        text-align: center;
        font-size: 16px;
        color: var(--text-color);
    }

    th {
        background: var(--second-bg-color);
    }

    a {
        color: var(--main-color);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #e76e00;
    }

    .error {
        color: red;
    }
</style>

<body>
    <div class="container">
        <?php
        session_start();

        // harga barang
        $hargaBarang = [
            'pensil' => 1000,
            'pulpen' => 2000,
            'penghapus' => 3000,
            'penggaris' => 4000,
            'tipex' => 5000
        ];

        // page yg di tampilkan
        $page = isset($_GET['page']) ? $_GET['page'] : 'pembelian';

        // hapus barang
        if (isset($_GET['hapus']) && isset($_SESSION['pembelian'][$_GET['hapus']])) {
            unset($_SESSION['pembelian'][$_GET['hapus']]);
            $_SESSION['pembelian'] = array_values($_SESSION['pembelian']);

            header("Location: ?page=pembelian");
            exit();
        }

        // proses pembelian
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
            $jenis = $_POST['jenis'];
            $jumlah = $_POST['jumlah'];
            $hargaSatuan = $_POST['harga_satuan'];
            $totalHarga = $hargaSatuan * $jumlah;

            if (!isset($_SESSION['pembelian'])) {
                $_SESSION['pembelian'] = [];
            }

            $_SESSION['pembelian'][] = [
                'jenis' => $jenis,
                'jumlah' => $jumlah,
                'harga_satuan' => $hargaSatuan,
                'total_harga' => $totalHarga
            ];

            header("Location: ?page=pembelian");
            exit();
        }

        // page pembelian
        if ($page == 'pembelian') {
            $dataBarang = isset($_SESSION['pembelian']) && !empty($_SESSION['pembelian']);
        ?>
            <h1 style="text-align: center;">KASIR</h1>
            <hr>
            <h2 style="text-align: center;">Beli Barang</h2>
            <form method="POST" action="?page=pembelian">
                <label>Jenis Barang:</label>
                <select name="jenis">
                    <option value="pensil">Pensil</option>
                    <option value="pulpen">Pulpen</option>
                    <option value="penghapus">Penghapus</option>
                    <option value="penggaris">Penggaris</option>
                    <option value="tipex">Tipe x</option>
                </select>
                <label>Jumlah:</label>
                <input type="number" name="jumlah" min="1" required placeholder="Masukkan jumlah">
                <label>Harga Satuan:</label>
                <input type="number" name="harga_satuan" min="1" required placeholder="Masukkan harga satuan">
                <input type="submit" name="tambah" value="Tambah">
            </form>

            <?php
            if ($dataBarang) {
                echo "<h2 style='text-align: center;'>Data Barang yang Akan Dibeli</h2>";
                echo "<table border='1'>
                <tr>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>";
                foreach ($_SESSION['pembelian'] as $key => $pembelian) {
                    echo "<tr>
                    <td>{$pembelian['jenis']}</td>
                    <td>{$pembelian['jumlah']}</td>
                    <td>{$pembelian['harga_satuan']}</td>
                    <td>{$pembelian['total_harga']}</td>
                    <td><a href='?page=pembelian&hapus={$key}'>Hapus</a></td>
                  </tr>";
                }
                echo "</table>";

                echo "<form method='GET' action=''>";
                echo "<input type='hidden' name='page' value='pembayaran'>";
                echo "<input type='submit' value='Pembayaran'>";
                echo "</form>";
            }
        }

        // page pembayaran
        if ($page == 'pembayaran' && isset($_SESSION['pembelian']) && !empty($_SESSION['pembelian'])) {
            echo "<h2 style='text-align: center;'>Detail Pembelian</h2>";
            echo "<table border='1'>
                <tr>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                </tr>";
            $totalKeseluruhan = 0;
            foreach ($_SESSION['pembelian'] as $pembelian) {
                echo "<tr>
                    <td>{$pembelian['jenis']}</td>
                    <td>{$pembelian['jumlah']}</td>
                    <td>{$pembelian['harga_satuan']}</td>
                    <td>{$pembelian['total_harga']}</td>
                  </tr>";
                $totalKeseluruhan += $pembelian['total_harga'];
            }
            echo "<tr>
                <td colspan='3'><strong>Total Keseluruhan</strong></td>
                <td><strong>$totalKeseluruhan</strong></td>
              </tr>";
            echo "</table>";
            ?>
            <form method="POST" action="?page=pembayaran">
                <label>Jumlah Uang:</label>
                <input type="number" name="uang_dibayar" required min="<?php echo $totalKeseluruhan; ?>" placeholder="Masukkan jumlah uang">
                <?php if (isset($_GET['error'])) echo "<p style='color:red;'>{$_GET['error']}</p>"; ?>
                <input type="submit" name="bayar" value="Bayar">
            </form>
        <?php
        }

        // proses pembayaran
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bayar'])) {
            $uangDibayar = $_POST['uang_dibayar'];
            $totalKeseluruhan = array_sum(array_column($_SESSION['pembelian'], 'total_harga'));

            if ($uangDibayar >= $totalKeseluruhan) {
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
                $error = "Uang yang dibayarkan tidak cukup. Total harga: Rp " . $totalKeseluruhan;
                header("Location: ?page=pembayaran&error=" . urlencode($error));
                exit();
            }
        }

        // page transaksi
        if ($page == 'transaksi' && isset($_SESSION['transaksi'])) {
            $transaksi = $_SESSION['transaksi'];
        ?>
            <h2 style="text-align: center;">Transaksi</h2>
            <table border='1'>
                <tr>
                    <th>Jenis Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total Harga</th>
                </tr>
                <?php
                foreach ($transaksi['pembelian'] as $pembelian) {
                    echo "<tr>
                    <td>{$pembelian['jenis']}</td>
                    <td>{$pembelian['jumlah']}</td>
                    <td>{$pembelian['harga_satuan']}</td>
                    <td>{$pembelian['total_harga']}</td>
                  </tr>";
                }
                ?>
                <tr>
                    <td colspan='3'><strong>Total Keseluruhan</strong></td>
                    <td><strong><?php echo $transaksi['total_keseluruhan']; ?></strong></td>
                </tr>
                <tr>
                    <td colspan='3'><strong>Uang Dibayar</strong></td>
                    <td><strong><?php echo $transaksi['uang_dibayar']; ?></strong></td>
                </tr>
                <tr>
                    <td colspan='3'><strong>Kembalian</strong></td>
                    <td><strong><?php echo $transaksi['kembalian']; ?></strong></td>
                </tr>
            </table>
            <form method="GET" action="">
                <input type="hidden" name="page" value="pembelian">
                <input type="submit" value="Beli Lagi">
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>
