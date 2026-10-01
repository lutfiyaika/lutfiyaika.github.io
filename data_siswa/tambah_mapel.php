<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $idmapel = $_POST['idmapel'];
    $namamapel = $_POST['namamapel'];

    $query = mysqli_query($koneksi, "INSERT INTO mata_pelajaran
        (idmapel, namamapel)
        VALUES ('$idmapel', '$namamapel')");

    if ($query) {
        header("Location: mata_pelajaran.php");
        exit;
    } else {
        echo "Data gagal disimpan: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mata Pelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Mata Pelajaran</h2>

    <form method="post">
        <label>ID Mapel</label>
        <input type="text" name="idmapel" maxlength="10" required>

        <label>Nama Mata Pelajaran</label>
        <input type="text" name="namamapel" maxlength="20" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>

    <br>
    <a href="mata_pelajaran.php">Kembali</a>
</div>

</body>
</html>