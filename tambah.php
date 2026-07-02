<?php
require 'fungsi.php';

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'tambah.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label>NIM :</label><br>
                <input type="text" name="nim" required>
            </li>
            <li>
                <label>Nama :</label><br>
                <input type="text" name="nama" required>
            </li>
            <li>
                <label>Prodi :</label><br>
                <input type="text" name="prodi" required>
            </li>
            <li>
                <label>Email :</label><br>
                <input type="email" name="email" required>
            </li>
            <li>
                <label>No HP :</label><br>
                <input type="text" name="no_hp" required>
            </li>
            <li>
                <label>Foto :</label><br>
                <input type="file" name="foto" accept=".jpg,.jpeg,.png">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>

    <a href="mahasiswa.php">Kembali ke Data Mahasiswa</a>
</body>
</html>