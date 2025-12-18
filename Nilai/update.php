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

// pastikan id_nilai ada di URL
if (!isset($_GET['id_nilai'])) {
    die("Error: ID nilai tidak ditemukan.");
}

$id = $_GET['id_nilai'];

// Ambil data nilai berdasarkan ID
$sql = "SELECT * FROM tbl_nilai WHERE id_nilai='$id'";
$data = mysqli_query($conn, $sql);

if (!$data) {
    die("SQL Error: " . mysqli_error($conn));
}

$nilai = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Nilai</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Edit Nilai Mahasiswa</h4>
        </div>

        <div class="card-body">
            <form action="proses_edit.php" method="post">

                <input type="hidden" name="id_nilai" value="<?= $nilai['id_nilai']; ?>">

                <div class="mb-3">
                    <label class="form-label">Nilai Angka</label>
                    <input type="number" name="nilai" class="form-control" value="<?= $nilai['nilai']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nilai Huruf</label>
                    <input type="text" name="nilaiHuruf" class="form-control" value="<?= $nilai['nilaiHuruf']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kode Matkul</label>
                    <input type="text" name="kodeMatkul" class="form-control" value="<?= $nilai['kodeMatkul']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= $nilai['nim']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIDN</label>
                    <input type="text" name="nidn" class="form-control" value="<?= $nilai['nidn']; ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                <a href="nilai.php" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
