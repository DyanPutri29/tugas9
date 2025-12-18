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
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dosen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Data Dosen</h3>

    <form action="simpan.php" method="POST">
        <div class="mb-3">
            <label>NIDN</label>
            <input type="text" name="nidn" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Dosen</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Prodi</label>
            <input type="text" name="prodi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="dosen.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
