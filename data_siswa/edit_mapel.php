<?php
include "koneksi.php";

$idmapel = $_GET['idmapel'];

$data = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran WHERE idmapel='$idmapel'");
$mapel = mysqli_fetch_assoc($data);

if (isset($_POST['simpan'])) {
    $namamapel = $_POST['namamapel'];

    $query = mysqli_query($koneksi, "UPDATE mata_pelajaran SET
        namamapel='$namamapel'
        WHERE idmapel='$idmapel'");

    if ($query) {
        header("Location: mata_pelajaran.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Pelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit Mata Pelajaran</h2>

    <form method="post">
        <label>ID Mapel</label>
        <input type="text" value="<?= htmlspecialchars($mapel['idmapel']); ?>" readonly>

        <label>Nama Mata Pelajaran</label>
        <input type="text" name="namamapel" value="<?= htmlspecialchars($mapel['namamapel']); ?>" maxlength="20" required>

        <button type="submit" name="simpan">Simpan Perubahan</button>
    </form>

    <br>
    <a href="mata_pelajaran.php">Kembali</a>
</div>

</body>
</html>