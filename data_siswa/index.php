<?php
include "koneksi.php";

$cari = $_GET['cari'] ?? '';

$query = mysqli_query($koneksi, "SELECT * FROM siswa
    WHERE nama LIKE '%$cari%'
    OR nis LIKE '%$cari%'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Data Siswa</h2>

    <a class="tambah" href="tambah.php">+ Tambah Data</a>

    <form method="get" class="search">
        <input type="text" name="cari" placeholder="Cari nama atau NIS..." value="<?= $cari; ?>">
        <button type="submit">Cari</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nis']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['kelas']; ?></td>
            <td><?= $data['jurusan']; ?></td>
            <td><?= $data['alamat']; ?></td>
            <td>
                <a href="edit.php?id=<?= $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $data['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>
    <br>
    <a href="mata_pelajaran.php">Mata Pelajaran</a>
</div>

</body>
</html>