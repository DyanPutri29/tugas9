<?php
include '../koneksi.php';

$nim = $_GET['nim'];
$data = mysqli_fetch_assoc(
    mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'")
);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];

    // jika ganti foto
    if (!empty($_FILES['foto']['name'])) {

        $foto = time().'_'.$_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "../foto/".$foto);

        $sql = "UPDATE tbl_mahasiswa SET
                nama='$nama',
                prodi='$prodi',
                email='$email',
                foto='$foto'
                WHERE nim='$nim'";
    } else {

        $sql = "UPDATE tbl_mahasiswa SET
                nama='$nama',
                prodi='$prodi',
                email='$email'
                WHERE nim='$nim'";
    }

    mysqli_query($koneksi, $sql);
    header("Location: mahasiswa.php?status=update");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Mahasiswa</title>

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
.foto{
    width:90px;
    height:90px;
    border-radius:50%;
    object-fit:cover;
    border:2px solid #ff66b3;
}
</style>
</head>

<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header text-center">
    <h4>Form Edit Mahasiswa</h4>
</div>

<div class="card-body">

<form method="POST" enctype="multipart/form-data">

    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" class="form-control" value="<?= $data['nim']; ?>" readonly>
    </div>

    <div class="mb-3">
        <label class="form-label">Nama Mahasiswa</label>
        <input type="text" name="nama" class="form-control"
               value="<?= $data['nama']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Program Studi</label>
        <input type="text" name="prodi" class="form-control"
               value="<?= $data['prodi']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control"
               value="<?= $data['email']; ?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Foto Saat Ini</label><br>
        <?php if (!empty($data['foto'])) { ?>
            <img src="../foto/<?= $data['foto']; ?>" class="foto">
        <?php } else { ?>
            <span class="text-muted">Tidak ada foto</span>
        <?php } ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Ganti Foto (Opsional)</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-pink px-4">
            Update
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
