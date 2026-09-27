<?php

include "koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM tugas WHERE id = $id"
);

$tugas = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $nama_tugas = $_POST['nama_tugas'];
    $status = $_POST['status'];

    mysqli_query(
        $koneksi,
        "UPDATE tugas
         SET nama_tugas = '$nama_tugas',
             status = '$status'
         WHERE id = $id"
    );

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Tugas</title>
</head>

<body>

<h1>Edit Tugas</h1>

<form method="POST">

    <label>Nama Tugas</label>
    <br>

    <input
        type="text"
        name="nama_tugas"
        value="<?= $tugas['nama_tugas']; ?>"
        required
    >

    <br><br>

    <label>Status</label>
    <br>

    <select name="status">

        <option
            value="Belum selesai"
            <?= $tugas['status'] == 'Belum selesai' ? 'selected' : ''; ?>
        >
            Belum selesai
        </option>

        <option
            value="Selesai"
            <?= $tugas['status'] == 'Selesai' ? 'selected' : ''; ?>
        >
            Selesai
        </option>

    </select>

    <br><br>

    <button type="submit" name="update">
        Update
    </button>

</form>

<br>

<a href="index.php">Kembali</a>

</body>
</html>