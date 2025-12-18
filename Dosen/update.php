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

// Pastikan nidn ada di URL
if (!isset($_GET['nidn'])) {
    die("Error: NIDN dosen tidak ditemukan.");
}

$nidn = $_GET['nidn'];

// Ambil data dosen berdasarkan NIDN
$sql = "SELECT * FROM tbl_dosen WHERE nidn='$nidn'";
$data = mysqli_query($conn, $sql);

if (!$data) {
    die("SQL Error: " . mysqli_error($conn));
}

$dosen = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Dosen</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Edit Data Dosen</h4>
        </div>

        <div class="card-body">
            <form action="proses_edit.php" method="post">

                <!-- NIDN lama -->
                <input type="hidden" name="nidn_lama" value="<?= $dosen['nidn']; ?>">

                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control" value="<?= $dosen['nidn']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Dosen</label>
                    <input type="text" name="nama" class="form-control" value="<?= $dosen['nama']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Prodi</label>
                    <input type="text" name="prodi" class="form-control" value="<?= $dosen['prodi']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $dosen['email']; ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="dosen.php" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
