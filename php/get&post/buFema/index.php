<?php 
if ($_POST['bilangan_pertama'] != "" && $_POST['bilangan_pemangkat'] != ""){
    $hasilPemangkatan = $_POST['bilangan_pertama']** $_POST['bilangan_pemangkat'];
    echo "<h3 style='text-align:center;color:green;margin:10px 0;'>hasil  pangkat dari adalah $hasilPemangkatan</h3>";
}else{
    echo "<p style='text-align:center;color:red;margin:10px 0;'>Data harus diisi dengan lengkap</p>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pangkat</title>
</head>

<body>
    <!-- 
    Hal-hal yang harus di perhatikan pada sebuah form dengan request method POST : 
    1. tag form dan atrribute method action
    2. inout atau select harus ada name dan type
    -->
    <form action="" style="display: flex;justify-content:center;" method="POST">
        <table border="2">
            <tr>
                <td><label for="bilangan">Bilangan pertama : </label></td>
                <td><input type="number" name="bilangan_pertama" id="bilangan"></td>
            </tr>
            <tr>
                <td><label for="pemangkat">Bilangan Pemangkat : </label></td>
                <td><input type="number" name="bilangan_pemangkat" id="pemangkat"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Hitung</button></td>
            </tr>
        </table>
    </form>
</body>

</html>