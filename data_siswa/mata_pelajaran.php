<?php
include "koneksi.php";

$cari = $_GET['cari'] ?? '';

$query = mysqli_query($koneksi, "SELECT * FROM mata_pelajaran
    WHERE idmapel LIKE '%$cari%'
    OR namamapel LIKE '%$cari%'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mata Pelajaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Data Mata Pelajaran</h2>

    <div class="top">
        <a href="tambah_mapel.php" class="btn tambah">+ Tambah Mata Pelajaran</a>

        <form method="get">
            <input type="text" name="cari" placeholder="Cari mata pelajaran..." value="<?= htmlspecialchars($cari) ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID Mapel</th>
            <th>Nama Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>

        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= htmlspecialchars($data['idmapel']); ?></td>
            <td><?= htmlspecialchars($data['namamapel']); ?></td>
            <td>
                <a href="edit_mapel.php?idmapel=<?= urlencode($data['idmapel']); ?>" class="edit">Edit</a>
                <a href="hapus_mapel.php?idmapel=<?= urlencode($data['idmapel']); ?>" class="hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="index.php">Kembali ke Data Siswa</a>
</div>

</body>
</html>