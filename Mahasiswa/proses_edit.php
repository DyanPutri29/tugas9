<?php
include '../koneksi.php';

$nim = $_GET['nim'];
$sql = "SELECT * FROM tbl_mahasiswa WHERE nim = '$nim'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Data Mahasiswa</h3>

    <form action="update.php" method="post">

        <input type="hidden" name="nim" value="<?= $data['nim'] ?>">

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Prodi</label>
            <input type="text" name="prodi" class="form-control" value="<?= $data['prodi'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

</body>
</html>
