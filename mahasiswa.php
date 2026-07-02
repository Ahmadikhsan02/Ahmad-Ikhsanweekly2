
<?php
require 'fungsi.php';
$koneksi = mysqli_connect("localhost", "root", "", "ahmadikhsannweekly");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($koneksi, $query);
?>



</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1 align="center">
             WEB TI AMD - 2026
        </h1>
        
        <table border="2" align="center" cellspacing="0" cellpadding="10px">
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href="about.php">about</a></td>
                <td><a href="contact.php">contact</a></td>
                <td><a href="mahasiswa.php">Mahasiswa</a></td>
            </tr>
        </table>
        <br><br>
        <h2>Data Mahasiswa</h2>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
<body>



    <br><br>

  

    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Email</th>
        </tr>

        <?php $no = 1; ?>
        <?php while($mhs = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $mhs['nim']; ?></td>
            <td><?= $mhs['nama']; ?></td>
            <td><?= $mhs['jurusan']; ?></td>
            <td><?= $mhs['email']; ?></td>
        </tr>
        <?php endwhile; ?>
        
    </table>

        <table border="1" cellpadding="6px">
            <tr>
                <td rowspan="2">baris 1, kolom1</td>
                <td colspan="2">baris 1, kolom2</td> 
                <!-- <td>baris 2, kolom 2</td> -->
            </tr>
            <tr>
                <!-- <td rowspan="2">baris 2, kolom 1</td> -->
                <td> baris 2, kolom 2</td>
                <td> baris 2, kolom 3</td>
                <!-- <td> baris 2, kolom 3</td> -->
            </tr>
            
            <table border="1" cellpadding="10px">
                <tr>
                    <td> baris 1, kolom 1</td>
                    <td> baris 1, kolom 2</td>
                    <td> baris 1, kolom 3</td>
                    <td> baris 1, kolom 4</td>
                </tr>
                <tr>

                    <td> baris 2, kolom 1</td>
                    <td rowspan="2" colspan="2"> baris 2, kolom 2</td>
                    <!-- <td rowspan="2"> baris 2, kolom 3</td> -->
                    <td> baris 2, kolom 4</td>
                </tr>
                <tr>

                    <td> baris 3, kolom 1</td>
                    <td> baris 3, kolom 2</td>
                    <!-- <td> baris 3, kolom 3</td>
                    <td> baris 3, kolom 4</td> -->
                </tr>
                <tr>

                    <td> baris 4, kolom 1</td>
                    <td> baris 4, kolom 2</td>
                    <td> baris 4, kolom 3</td>
                    <td> baris 4, kolom 4</td>
                </tr>
            </table>
        </table>
</body>
</html>