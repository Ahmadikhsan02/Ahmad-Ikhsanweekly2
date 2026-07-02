<?php
require 'fungsi.php';
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Data Mahasiswa</h1>

    <a href="tambah.php" class="btn tambah">+ Tambah Data Mahasiswa</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Aksi</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Prodi</th>
            <th>Email</th>
            <th>No HP</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="edit.php?id=<?= $row["id"]; ?>" class="btn edit">Edit</a>
                <a href="hapus.php?id=<?= $row["id"]; ?>" class="btn hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
            </td>
            <td>
                <?php
                $foto = "img/" . $row["foto"];
                if (!file_exists($foto)) {
                    $foto = "img/default.png";
                }
                ?>
                <img src="<?= $foto; ?>" width="70" height="70" style="object-fit:cover; border-radius:8px;">
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["prodi"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["no_hp"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>