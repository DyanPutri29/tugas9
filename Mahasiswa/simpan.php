<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['role'] !== 'dosen') {
    header("Location: ../index.php?page=dashboard");
    exit;
}

include '../koneksi.php';

/* PROSES SIMPAN */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nim   = trim($_POST['nim']);
    $nama  = trim($_POST['nama']);
    $prodi = trim($_POST['prodi']);
    $email = trim($_POST['email']);

    if ($nim === '' || $nama === '' || $prodi === '' || $email === '') {
        header("Location: tambah.php?error=data_kosong");
        exit;
    }

    $cek = mysqli_query($koneksi, "SELECT nim FROM tbl_mahasiswa WHERE nim='$nim'");
    if (mysqli_num_rows($cek) > 0) {
        header("Location: tambah.php?error=nim_ada");
        exit;
    }

    $foto = '';
    if (!empty($_FILES['file_foto']['name'])) {

        if ($_FILES['file_foto']['size'] > 1048576) {
            header("Location: tambah.php?error=foto_besar");
            exit;
        }

        $foto = time() . "_" . $_FILES['file_foto']['name'];
        $tmp  = $_FILES['file_foto']['tmp_name'];
        $dir  = "../foto/";

        if (!move_uploaded_file($tmp, $dir . $foto)) {
            header("Location: tambah.php?error=upload_gagal");
            exit;
        }
    }

    mysqli_query($koneksi,
        "INSERT INTO tbl_mahasiswa (nim, nama, prodi, email, foto)
         VALUES ('$nim', '$nama', '$prodi', '$email', '$foto')"
    );

    header("Location: mahasiswa.php?status=tambah_ok");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #ffe6f2;
        }
        .card {
            border-radius: 20px;
        }
        .card-header {
            background: #ff66b3;
            color: white;
            border-radius: 20px 20px 0 0;
        }
        label {
            font-weight: 500;
        }
        .btn-pink {
            background: #ff66b3;
            color: white;
            border-radius: 30px;
            padding: 8px 25px;
        }
        .btn-pink:hover {
            background: #ff3385;
            color: white;
        }
        .form-control:focus {
            border-color: #ff66b3;
            box-shadow: 0 0 0 0.2rem rgba(255,102,179,.25);
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h4 class="mb-0">Tambah Mahasiswa</h4>
        </div>

        <div class="card-body">

            <!-- PESAN ERROR -->
            <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?php
                if ($_GET['error'] === 'data_kosong') echo 'Semua field wajib diisi.';
                if ($_GET['error'] === 'nim_ada') echo 'NIM sudah terdaftar.';
                if ($_GET['error'] === 'foto_besar') echo 'Ukuran foto maksimal 1MB.';
                if ($_GET['error'] === 'upload_gagal') echo 'Upload foto gagal.';
                ?>
            </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nama</label>
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

                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="file_foto" class="form-control">
                    <small class="text-muted">Max 1MB</small>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-pink">
                        Simpan
                    </button>
                    <a href="mahasiswa.php" class="btn btn-secondary ms-2">
                        Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
