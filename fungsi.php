<?php
$koneksi = mysqli_connect("localhost", "root", "", "ahmadikhsannweekly");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload() {
    if ($_FILES['foto']['error'] == 4) {
        return 'default.png';
    }

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

    if (!in_array($ekstensiFile, $ekstensiValid)) {
        echo "<script>alert('Format foto harus JPG, JPEG, atau PNG!');</script>";
        return false;
    }

    if ($ukuranFile > 2000000) {
        echo "<script>alert('Ukuran foto terlalu besar! Maksimal 2MB');</script>";
        return false;
    }

    $namaFileBaru = uniqid() . '.' . $ekstensiFile;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function tambah($data) {
    global $koneksi;

    $nim   = htmlspecialchars($data["nim"]);
    $nama  = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    $foto = upload();
    if (!$foto) {
        return false;
    }

    $query = "INSERT INTO mahasiswa (nim, nama, prodi, email, no_hp, foto)
              VALUES ('$nim', '$nama', '$prodi', '$email', '$no_hp', '$foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function hapus($id) {
    global $koneksi;

    $id = (int)$id;

    $data = query("SELECT foto FROM mahasiswa WHERE id = $id");
    if ($data) {
        $foto = $data[0]['foto'];
        if ($foto != 'default.png' && file_exists('img/' . $foto)) {
            unlink('img/' . $foto);
        }
    }

    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($koneksi);
}

function ubah($data) {
    global $koneksi;

    $id    = (int)$data["id"];
    $nim   = htmlspecialchars($data["nim"]);
    $nama  = htmlspecialchars($data["nama"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
        if (!$foto) {
            return false;
        }

        if ($fotoLama != 'default.png' && file_exists('img/' . $fotoLama)) {
            unlink('img/' . $fotoLama);
        }
    }

    $query = "UPDATE mahasiswa SET
                nim = '$nim',
                nama = '$nama',
                prodi = '$prodi',
                email = '$email',
                no_hp = '$no_hp',
                foto = '$foto'
              WHERE id = $id";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
?>