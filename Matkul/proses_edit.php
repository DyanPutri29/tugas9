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

<?php
include '../koneksi.php';
$xkodematkul = $_GET['kodeMatkul'];
$data = mysqli_query($conn, "SELECT * FROM tbl_matkul WHERE kodeMatkul='$xkodematkul'");
$data = mysqli_fetch_array($data);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Matkul</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Data Matkul</h3>

    <form action="update.php" method="post">

        <!-- Kode Matkul -->
        <div class="mb-3">
            <label>Kode Matkul</label>
            <input type="text" name="kodeMatkul" class="form-control" 
                   value="<?= $data['kodeMatkul'] ?>" readonly>
        </div>

        <!-- Nama Matkul -->
        <div class="mb-3">
            <label>Nama Matkul</label>
            <input type="text" name="namaMatkul" class="form-control" 
                   value="<?= $data['namaMatkul'] ?>" required>
        </div>

        <!-- SKS -->
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" 
                   value="<?= $data['sks'] ?>" required>
        </div>

        <!-- Prodi -->
        <div class="mb-3">
            <label>Prodi</label>
            <input type="number" name="nidn" class="form-control" 
                   value="<?= $data['nidn'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

</body>
</html>