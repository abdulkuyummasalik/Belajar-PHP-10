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
if (isset($_GET['hapusSemua'])) {
    $siswa = [];
    $_SESSION['siswa'] = $siswa;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="mt-4 text-center">Masukan Data Siswa</h2>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukan nama lengkap" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="number" id="nis" name="nis" placeholder="Masukan NIS" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="rayon" class="form-label">Rayon:</label>
                <select name="rayon" id="rayon" class="form-control" required>
                    <option value="Ciawi">Ciawi</option>
                    <option value="Cibedug">Cibedug</option>
                    <option value="Cisarua">Cisarua</option>
                </select>
            </div>
            <div class="d-flex gap-3 justify-content-center">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="<?php echo $_SERVER['PHP_SELF'] . '?hapusSemua=1'; ?>" class="btn btn-danger">Hapus Semua</a>
            </div>
        </form>

        <?php if (!empty($siswa)) : ?>
            <h2 class="mt-4 text-center pb-4">Daftar Data Siswa</h2>
            <table class="table table-bordered">
                <thead class="text-center table-danger">
                    <tr class="Danger">
                        <th>Nama Lengkap</th>
                        <th>NIS</th>
                        <th>Rayon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($siswa as $index => $s) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($s['nama']); ?></td>
                            <td><?php echo htmlspecialchars($s['nis']); ?></td>
                            <td><?php echo htmlspecialchars($s['rayon']); ?></td>
                            <td  class="text-center"><a href="<?php echo $_SERVER['PHP_SELF'] . '?hapus=' . $index; ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
