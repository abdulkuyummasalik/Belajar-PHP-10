<?php
session_start();

$siswa = [];
if (isset($_SESSION['siswa'])) {
    $siswa = $_SESSION['siswa'];
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];

    $dataSiswa = [
        'nama' => $nama,
        'nis' => $nis,
        'rayon' => $rayon
    ];

    $siswa[] = $dataSiswa;

    $_SESSION['siswa'] = $siswa;
}
if (isset($_GET['hapus'])) {
    $index = $_GET['hapus'];
    unset($siswa[$index]);
    $_SESSION['siswa'] = $siswa;
}
if (isset($_GET['hapusData'])) {
    $siswa = [];
    $_SESSION['siswa'] = $siswa;
}
if (isset($_GET['detail'])) {
    $index = $_GET['detail'];
    $dataSiswa = $siswa[$index];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UKK Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark">
    <div class="container bg-dark">
        <h2 class="mt-4 text-center text-light">Masukan Data Siswa</h2>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row g-2 align-items-center">
                <div class="form-group">
                    <label for="nama" class="col-form-label text-light">NAMA</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nis" class="  col-form-label text-light">NIS</label>
                    <input type="number" id="nis" name="nis" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rayon" class=" col-form-label text-light">RAYON</label>
                    <select name="rayon" id="rayon" class="form-control" required>
                        <option value="Ciawi">Ciawi</option>
                        <option value="Cibedug">Cibedug</option>
                        <option value="Cicurug">Cicurug</option>
                        <option value="Cisarua">Cisarua</option>
                        <option value="Tajur">Tajur</option>
                        <option value="Sukasari">Sukasari</option>
                        <option value="Wikrama">Wikrama</option>
                    </select>
                </div>
                <div class=" p-2 d-flex gap-3 justify-content-center">
                    <button type="submit" name="submit" class="btn btn-primary">+ Tambah</button>
                    <button onclick="window.print();" class="btn print bg-success"> Cetak </button>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?hapusData=1'; ?>" class="btn btn-danger">Hapus Data</a>
                </div>
        </form>

        <?php if (!empty($siswa)) : ?>
            <table class="table table-bordered">
                <thead class="table-danger">
                    <tr class="Danger">
                        <th>No</th>
                        <th>NAMA</th>
                        <th>NIS</th>
                        <th>RAYON</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $index => $s) : ?>
                        <tr class="text-center ">
                            <th scope="row"><?php echo $index + 1; ?></th>
                            <td><?php echo htmlspecialchars($s['nama']); ?></td>
                            <td><?php echo htmlspecialchars($s['nis']); ?></td>
                            <td><?php echo htmlspecialchars($s['rayon']); ?></td>
                            <td class="text-center">
                                <a href="<?php echo $_SERVER['PHP_SELF']. '?detail='. $index;?>" class="btn bg-primary">Detail</a>
                                <a href="<?php echo $_SERVER['PHP_SELF']. '?detail='. $index;?>" class="btn bg-secondary">Edit</a>
                                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?hapus=' . $index; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>

</html>