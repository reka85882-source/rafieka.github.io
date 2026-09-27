<?php

include "koneksi.php";

$nama = "";
$email = "";
$jenis_kelamin = "";
$alamat = "";
$no_telepon = "";

$sudah_dikirim = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $no_telepon = $_POST["no_telepon"];

    $sudah_dikirim = true;


$query = "INSERT INTO registrasi
              (nama, email, jenis_kelamin, alamat, no_telepon)
              VALUES
              ('$nama', '$email', '$jenis_kelamin', '$alamat', '$no_telepon')";

    if (mysqli_query($koneksi, $query)) {
        $sudah_dikirim = true;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Registrasi</title>
   
</head>
<body>

    <div class="container">

    <h1>Form Registrasi</h1>
    
    <form action="index.php" method="POST">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" required>

        <br><br>

        <label>Email</label>
        <input type="text" name="email" required>

        <br><br>

        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin">
            <option value="">JENIS KELAMIN</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <br><br>

        <label>Alamat</label>
        <textarea type="text" name="alamat" required></textarea>

        <br><br>

        <label>no telepon</label>
        <input type="text" name="no_telepon" required>

        <br><br>
        <button type="submit">DAFTAR</button>
    </form>
    
    <?php if ($sudah_dikirim) { ?>
        <div class="hasil">
            <h2>HASIL REGISTRASI</h2>
                <p>
                    <b>Nama Lengkap:</b>
                    <?php echo $nama; ?>
                </p>

                <p>
                    <b>Email:</b>
                    <?php echo $email; ?>
                </p>

                <p>
                    <b>Jenis Kelamin:</b>
                    <?php echo $jenis_kelamin; ?>
                </p>

                <P>
                    <b>Alamat:</b>
                    <?php echo $alamat; ?>
                </p>

                <p>
                    <b>No Telepon</b>
                    <?php echo $no_telepon; ?>
                </p>
    <?php } ?>
</div>
</body>
</html>