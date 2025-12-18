<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit();
}

// hanya admin yang boleh tambah data mahasiswa
if ($_SESSION['role'] != 'dosen') {
    header("Location: ../index.php?page=dashboard");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Tambah Data Mahasiswa</h3>
    <form action="simpan.php" method="post">

        <div class="mb-3">
            <label>Nilai Angka</label>
            <input type="number" name="nilai" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nilai Huruf</label>
            <input type="text" name="nilaiHuruf" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kode Matkul</label>
            <input type="text" name="kodeMatkul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIM</label>
            <input type="number" name="nim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>NIDN</label>
            <input type="number" name="nidn" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

</body>
</html>
