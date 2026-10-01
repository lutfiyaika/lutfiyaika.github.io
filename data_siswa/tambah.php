<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nis     = $_POST['nis'];
    $nama    = $_POST['nama'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    $query = mysqli_query($koneksi, "INSERT INTO siswa
        (nis, nama, kelas, jurusan, alamat)
        VALUES ('$nis', '$nama', '$kelas', '$jurusan', '$alamat')");

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Data Siswa</h2>

    <form method="post">
        <label>NIS</label>
        <input type="text" name="nis" required>

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Kelas</label>
        <input type="text" name="kelas" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" required>

        <label>Alamat</label>
        <textarea name="alamat" required></textarea>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <a href="index.php">Kembali</a>
</div>

</body>
</html>