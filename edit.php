<?php
require 'fungsi.php';

if (!isset($_GET["id"])) {
    header("Location: mahasiswa.php");
    exit;
}

$id = (int)$_GET["id"];
$data = query("SELECT * FROM mahasiswa WHERE id = $id");

if (!$data) {
    echo "
        <script>
            alert('Data tidak ditemukan!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
    exit;
}

$mhs = $data[0];

if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'mahasiswa.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diubah / tidak ada perubahan!');
                document.location.href = 'mahasiswa.php';
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
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <!-- id data -->
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">

        <!-- simpan nama foto lama -->
        <input type="hidden" name="fotoLama" value="<?= $mhs["foto"]; ?>">

        <ul>
            <li>
                <label>NIM :</label><br>
                <input type="text" name="nim" required value="<?= $mhs["nim"]; ?>">
            </li>
            <li>
                <label>Nama :</label><br>
                <input type="text" name="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label>Prodi :</label><br>
                <input type="text" name="prodi" required value="<?= $mhs["prodi"]; ?>">
            </li>
            <li>
                <label>Email :</label><br>
                <input type="email" name="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label>No HP :</label><br>
                <input type="text" name="no_hp" required value="<?= $mhs["no_hp"]; ?>">
            </li>

            <li>
                <label>Foto Saat Ini :</label><br><br>
                <img src="img/<?= $mhs["foto"]; ?>" width="100" height="100" style="object-fit: cover; border-radius: 8px;">
            </li>

            <br>

            <li>
                <label>Ganti Foto :</label><br>
                <input type="file" name="foto" accept=".jpg,.jpeg,.png">
            </li>

            <br>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>
    </form>

    <a href="mahasiswa.php">Kembali ke Data Mahasiswa</a>
</body>
</html>