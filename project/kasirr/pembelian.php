<?php
$hargaBarang = [
    'pensil' => 1000,
    'pulpen' => 2000,
    'penghapus' => 3000,
    'penggaris' => 4000,
    'tipex' => 5000
];

if (isset($_GET['hapus']) && isset($_SESSION['pembelian'][$_GET['hapus']])) {
    unset($_SESSION['pembelian'][$_GET['hapus']]);
    $_SESSION['pembelian'] = array_values($_SESSION['pembelian']);
    header("Location: ?page=pembelian");
    exit();
}

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

$dataBarang = isset($_SESSION['pembelian']) && !empty($_SESSION['pembelian']);
?>
<h1>KASIR</h1>
<hr>
<h2>Beli Barang</h2>
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

<?php if ($dataBarang) : ?>
    <h2>Data Barang yang Akan Dibeli</h2>
    <table>
        <tr>
            <th>Jenis Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($_SESSION['pembelian'] as $key => $pembelian) : ?>
            <tr>
                <td><?php echo $pembelian['jenis']; ?></td>
                <td><?php echo $pembelian['jumlah']; ?></td>
                <td><?php echo $pembelian['harga_satuan']; ?></td>
                <td><?php echo $pembelian['total_harga']; ?></td>
                <td><a href="?page=pembelian&hapus=<?php echo $key; ?>">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method='GET' action=''>
        <input type='hidden' name='page' value='pembayaran'>
        <input type='submit' value='Pembayaran'>
    </form>
<?php endif; ?>
