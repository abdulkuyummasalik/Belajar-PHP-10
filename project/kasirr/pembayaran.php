<?php
if (isset($_SESSION['pembelian']) && !empty($_SESSION['pembelian'])) {
    $totalKeseluruhan = array_sum(array_column($_SESSION['pembelian'], 'total_harga'));
?>
    <h2>Detail Pembelian</h2>
    <table>
        <tr>
            <th>Jenis Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </tr>
        <?php foreach ($_SESSION['pembelian'] as $pembelian) : ?>
            <tr>
                <td><?php echo $pembelian['jenis']; ?></td>
                <td><?php echo $pembelian['jumlah']; ?></td>
                <td><?php echo $pembelian['harga_satuan']; ?></td>
                <td><?php echo $pembelian['total_harga']; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan='3'><strong>Total Keseluruhan</strong></td>
            <td><strong><?php echo $totalKeseluruhan; ?></strong></td>
        </tr>
    </table>
    <form method="POST" action="?page=pembayaran">
        <label>Jumlah Uang:</label>
        <input type="number" name="uang_dibayar" required min="<?php echo $totalKeseluruhan; ?>" placeholder="Masukkan jumlah uang">
        <input type="submit" name="bayar" value="Bayar">
    </form>
<?php
    if (isset($_GET['error'])) {
        echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
    }
} else {
    echo "<p>Belum ada barang yang dibeli. <a href='?page=pembelian'>Beli Barang</a></p>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bayar'])) {
    $uangDibayar = $_POST['uang_dibayar'];
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
?>
