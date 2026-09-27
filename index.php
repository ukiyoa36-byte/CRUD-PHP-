<?php

include "koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM tugas");

?>

<!DOCTYPE html>
<html>
<head>
    <title>To Do List</title>
</head>

<body>

<h1>To Do List</h1>

<a href="tambah.php">Tambah Tugas</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Nama Tugas</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;

    while ($tugas = mysqli_fetch_assoc($data)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $tugas['nama_tugas']; ?></td>
        <td><?= $tugas['status']; ?></td>

        <td>
            <a href="edit.php?id=<?= $tugas['id']; ?>">
                Edit
            </a>

            |

            <a href="hapus.php?id=<?= $tugas['id']; ?>"
               onclick="return confirm('Yakin ingin menghapus tugas ini?')">
                Hapus
            </a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>