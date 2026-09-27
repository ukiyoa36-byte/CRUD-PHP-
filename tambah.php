<?php

include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama_tugas = $_POST['nama_tugas'];
    $status = $_POST['status'];

    mysqli_query(
        $koneksi,
        "INSERT INTO tugas (nama_tugas, status)
         VALUES ('$nama_tugas', '$status')"
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tugas</title>
</head>

<body>

<h1>Tambah Tugas</h1>

<form method="POST">

    <label>Nama Tugas</label>
    <br>

    <input type="text" name="nama_tugas" required>

    <br><br>

    <label>Status</label>
    <br>

    <select name="status">

        <option value="Belum selesai">
            Belum selesai
        </option>

        <option value="Selesai">
            Selesai
        </option>

    </select>

    <br><br>

    <button type="submit" name="simpan">
        Simpan
    </button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>