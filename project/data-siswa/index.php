<?php
session_start();

$students = [];
if (isset($_SESSION['students'])) {
    $students = $_SESSION['students'];
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];

    $student_data = [
        'nama' => $nama,
        'nis' => $nis,
        'rayon' => $rayon
    ];

    $students[] = $student_data;

    $_SESSION['students'] = $students;
}

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    unset($students[$index]);
    $_SESSION['students'] = $students;
}

if (isset($_GET['hapus_semua'])) {
    $students = [];
    $_SESSION['students'] = $students;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        :root {
            --bg-color: #1a1a1a;
            --second-bg-color: #2c2c2c;
            --text-color: #ffffff;
            --main-color: #ff7f00;
            --hover-color: #e66a00;
            --gold-color: #ffd700;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: linear-gradient(to right, #1a1a1a, #2c2c2c);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: var(--second-bg-color);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 127, 0, 0.7);
            border: 1px solid var(--main-color);
        }

        .form-card {
            background-color: var(--second-bg-color);
            border-radius: 10px;
            box-shadow: 0 0 10px var(--main-color);
            padding: 20px;
            margin-bottom: 20px;
        }

        .form-card h2 {
            margin-bottom: 20px;
            color: var(--main-color);
            font-family: 'Playfair Display', serif;
        }

        .form-card form label {
            font-weight: bold;
            color: var(--main-color);
        }

        .form-card form button[type="submit"],
        .form-card a,
        .form-card form .print {
            background-color: var(--main-color);
            color: var(--text-color);
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 127, 0, 0.3);
        }

        .form-card form button[type="submit"]:hover,
        .form-card a:hover,
        .form-card form .print:hover {
            background-color: var(--hover-color);
            box-shadow: 0 8px 20px rgba(255, 102, 0, 0.4);
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .student-table th,
        .student-table td {
            border: 1px solid var(--main-color);
            padding: 8px;
            text-align: left;
            color: var(--text-color);
        }

        .student-table th {
            background-color: var(--main-color);
            font-family: 'Playfair Display', serif;
            color: var(--gold-color);
        }

        .student-table tr:nth-child(even) {
            background-color: var(--second-bg-color);
        }

        .student-table tr:hover {
            background-color: var(--hover-color);
        }

        .student-table a {
            color: var(--main-color);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .student-table a:hover {
            color: var(--hover-color);
        }

        @media (max-width: 600px) {
            .form-card h2 {
                font-size: 1.6rem;
            }

            .form-card form label {
                font-size: 0.9rem;
            }

            .form-card form button[type="submit"],
            .form-card a,
            .form-card form .print {
                font-size: 0.9rem;
                padding: 8px 16px;
            }

            .student-table th {
                font-size: 0.9rem;
                padding: 6px;
            }

            .student-table td {
                font-size: 0.8rem;
            }
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="form-card">
            <h2 class="text-center fw-bold">Form Isi Data Siswa</h2>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="nama" class="form-label">Nama :</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan nama..." required>
                    </div>
                    <div class="col">
                        <label for="nis" class="form-label">NIS :</label>
                        <input type="number" id="nis" name="nis" class="form-control" placeholder="Masukan NIS..." required>
                    </div>
                    <div class="col">
                        <label for="rayon" class="form-label">Rayon :</label>
                        <select name="rayon" id="rayon" class="form-control">
                            <option value="" selected disabled>Pilih Rayon</option>
                            <optgroup label="Ciawi">
                                <option value="Ciawi 1">Ciawi 1</option>
                                <option value="Ciawi 2">Ciawi 2</option>
                                <option value="Ciawi 3">Ciawi 3</option>
                                <option value="Ciawi 4">Ciawi 4</option>
                                <option value="Ciawi 5">Ciawi 5</option>
                                <option value="Ciawi 6">Ciawi 6</option>
                            </optgroup>
                            <optgroup label="Cibedug">
                                <option value="Cibedug 1">Cibedug 1</option>
                                <option value="Cibedug 2">Cibedug 2</option>
                                <option value="Cibedug 3">Cibedug 3</option>
                                <option value="Cibedug 4">Cibedug 4</option>
                            </optgroup>
                            <optgroup label="Cicurug">
                                <option value="Cicurug 1">Cicurug 1</option>
                                <option value="Cicurug 2">Cicurug 2</option>
                                <option value="Cicurug 3">Cicurug 3</option>
                                <option value="Cicurug 4">Cicurug 4</option>
                                <option value="Cicurug 5">Cicurug 5</option>
                                <option value="Cicurug 6">Cicurug 6</option>
                                <option value="Cicurug 7">Cicurug 7</option>
                                <option value="Cicurug 8">Cicurug 8</option>
                                <option value="Cicurug 9">Cicurug 9</option>
                                <option value="Cicurug 10">Cicurug 10</option>
                            </optgroup>
                            <optgroup label="Cisarua">
                                <option value="Cisarua 1">Cisarua 1</option>
                                <option value="Cisarua 2">Cisarua 2</option>
                                <option value="Cisarua 3">Cisarua 3</option>
                                <option value="Cisarua 4">Cisarua 4</option>
                                <option value="Cisarua 5">Cisarua 5</option>
                                <option value="Cisarua 6">Cisarua 6</option>
                                <option value="Cisarua 7">Cisarua 7</option>
                            </optgroup>
                            <optgroup label="Sukasari">
                                <option value="Sukasari 1">Sukasari 1</option>
                                <option value="Sukasari 2">Sukasari 2</option>
                            </optgroup>
                            <optgroup label="Tajur">
                                <option value="Tajur 1">Tajur 1</option>
                                <option value="Tajur 2">Tajur 2</option>
                                <option value="Tajur 3">Tajur 3</option>
                                <option value="Tajur 4">Tajur 4</option>
                                <option value="Tajur 5">Tajur 5</option>
                                <option value="Tajur 6">Tajur 6</option>
                            </optgroup>
                            <optgroup label="Wikrama">
                                <option value="Wikrama 1">Wikrama 1</option>
                                <option value="Wikrama 2">Wikrama 2</option>
                                <option value="Wikrama 3">Wikrama 3</option>
                                <option value="Wikrama 4">Wikrama 4</option>
                                <option value="Wikrama 5">Wikrama 5</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                    <a href="<?php echo $_SERVER['PHP_SELF'] . '?hapus_semua=1'; ?>" class="btn btn-danger">Hapus</a>
                    <button type="button" onclick="window.print()" class="btn btn-success print">Cetak</button>
                </div>
            </form>
        </div>

        <?php if (!empty($students)) : ?>
            <h2 class="text-center" style="color: var(--main-color);">Data Siswa:</h2>
            <table class="student-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Rayon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    <?php foreach ($students as $index => $student) : ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $student['nama']; ?></td>
                            <td><?php echo $student['nis']; ?></td>
                            <td><?php echo $student['rayon']; ?></td>
                            <td><a href="<?php echo $_SERVER['PHP_SELF'] . '?delete=' . $index; ?>"><b style="color:red">Hapus</b></a></td>
                        </tr>   
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

</body>

</html>
