<?php
if (isset($_SESSION['transaksi'])) {
    $transaksi = $_SESSION['transaksi'];
?>
    <h2>Transaksi</h2>
    <table>
        <tr>
            <th>Jenis Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
        </tr>
        <?php foreach ($transaksi['pembelian'] as $pembelian) : ?>
            <tr>
                <td><?php echo $pembelian['jenis']; ?></td>
                <td><?php echo $pembelian['jumlah']; ?></td>
                <td><?php echo $pembelian['harga_satuan']; ?></td>
                <td><?php echo $pembelian['total_harga']; ?></td>
            </tr>
        <?php endforeach; ?>
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
