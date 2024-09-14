<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <!-- penanganan form dengan metode Post -->
    <form action="tampil.php" method="POST">
        <label for="">Nama Siswa </label>
        <input type="text" name="nama"><br>
        <label for="">Asal Sekolah</label>
        <input type="text" name="asal"><br>
        <label for="">No Telepon</label>
        <input type="number" name="telepon"><br>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
        </select><br>
        <input type="submit" value="oke">
    </form>

</body>

</html>