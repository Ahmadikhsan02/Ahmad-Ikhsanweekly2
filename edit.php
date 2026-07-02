<?php
require 'fungsi.php';

$id = $_GET["id"];
$mhs = tampildata("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs['id']; ?>">

        <ul>
            <li>
                <label>NIM :</label><br>
                <input type="text" name="nim" value="<?= $mhs['nim']; ?>" required>
            </li>
            <li>
                <label>Nama :</label><br>
                <input type="text" name="nama" value="<?= $mhs['nama']; ?>" required>
            </li>
            <li>
                <label>Jurusan :</label><br>
                <input type="text" name="jurusan" value="<?= $mhs['jurusan']; ?>" required>
            </li>
            <li>
                <label>Email :</label><br>
                <input type="email" name="email" value="<?= $mhs['email']; ?>" required>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Simpan Perubahan</button>
            </li>
        </ul>
    </form>

    <a href="mahasiswa.php">Kembali ke Data Mahasiswa</a>
</body>
</html>