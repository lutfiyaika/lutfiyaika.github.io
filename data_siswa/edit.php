<?php
include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id='$id'");
$siswa = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nis     = $_POST['nis'];
    $nama    = $_POST['nama'];
    $kelas   = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $alamat  = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE siswa SET
        nis='$nis',
        nama='$nama',
        kelas='$kelas',
        jurusan='$jurusan',
        alamat='$alamat'
        WHERE id='$id'
    ");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Siswa</h2>

    <form method="post">
        <label>NIS</label>
        <input type="text" name="nis" value="<?= $siswa['nis']; ?>" required>

        <label>Nama</label>
        <input type="text" name="nama" value="<?= $siswa['nama']; ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?= $siswa['kelas']; ?>" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="<?= $siswa['jurusan']; ?>" required>

        <label>Alamat</label>
        <textarea name="alamat" required><?= $siswa['alamat']; ?></textarea>

        <button type="submit" name="update">Update</button>
    </form>

    <a href="index.php">Kembali</a>
</div>

</body>
</html>