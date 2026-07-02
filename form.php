<?php
require 'fungsi.php';

if (isset($_POST['kirim'])) {

    $nama   = $_POST['nama'];
    $nim    = $_POST['nim'];
    $prodi  = $_POST['Jurusan'];
    $email  = $_POST['email'];
    $nohp   = $_POST['nohp'];

    // Upload Foto
    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];

    if (!is_dir("img")) {
        mkdir("img");
    }

    move_uploaded_file($tmp, "img/" . $foto);

    $query = "INSERT INTO mahasiswa (nama,nim,prodi,email,no_hp,foto)
              VALUES ('$nama','$nim','$prodi','$email','$nohp','$foto')";

    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location='mahasiswa.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal ditambahkan');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
</head>
<body>

<h2>Form Input Mahasiswa</h2>

<form action="" method="post" enctype="multipart/form-data">

    Nama <br>
    <input type="text" name="nama" required><br><br>

    NIM <br>
    <input type="text" name="nim" required><br><br>

    Jurusan <br>
    <input type="text" name="Jurusan" required><br><br>

    Email <br>
    <input type="email" name="email" required><br><br>

    No HP <br>
    <input type="text" name="nohp" required><br><br>

    Foto <br>
    <input type="file" name="foto" required><br><br>

    <button type="submit" name="kirim">Kirim Data</button>

</form>

</body>
</html>