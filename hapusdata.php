<?php
require 'fungsi.php';

if (!isset($_GET["id"])) {
    echo "
        <script>
            alert('ID tidak ditemukan!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
    exit;
}

$id = (int) $_GET["id"];

if (hapus($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
}
?>