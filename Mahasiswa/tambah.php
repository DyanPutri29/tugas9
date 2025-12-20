<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];

    $foto = '';
    if (!empty($_FILES['foto']['name'])) {
        $foto = time().'_'.$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$foto);
    }

    mysqli_query($koneksi,
        "INSERT INTO tbl_mahasiswa (nim,nama,prodi,email,foto)
         VALUES ('$nim','$nama','$prodi','$email','$foto')"
    );

    header("Location: mahasiswa.php?status=ok");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#ffe6f2;
}
.card{
    border-radius:20px;
}
.card-header{
    background:#ff66b3;
    color:#fff;
}
.btn-pink{
    background:#ff66b3;
    color:#fff;
}
.btn-pink:hover{
    background:#ff3385;
    color:#fff;
}
</style>
</head>

<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header text-center">
    <h4>Form Tambah Mahasiswa</h4>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <input type="text" name="prodi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto Mahasiswa</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-pink px-4">
            Simpan
        </button>
        <a href="mahasiswa.php" class="btn btn-secondary px-4">
            Kembali
        </a>
    </div>

</form>

</div>
</div>

</div>
</div>
</div>

</body>
</html>
