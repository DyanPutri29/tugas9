<?php
include '../koneksi.php';

/* CEK METHOD */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: mahasiswa.php");
    exit;
}

/* AMBIL DATA */
$nim   = $_POST['nim'] ?? '';
$nama  = $_POST['nama'] ?? '';
$prodi = $_POST['prodi'] ?? '';
$email = $_POST['email'] ?? '';

/* VALIDASI DASAR */
if ($nim === '' || $nama === '' || $prodi === '' || $email === '') {
    header("Location: update.php?nim=$nim&error=data_kosong");
    exit;
}

/* CEK FOTO BARU */
if (!empty($_FILES['foto']['name'])) {

    // validasi ukuran max 1MB
    if ($_FILES['foto']['size'] > 1048576) {
        header("Location: update.php?nim=$nim&error=foto_besar");
        exit;
    }

    $namaFile = time() . "_" . $_FILES['foto']['name'];
    $tmp      = $_FILES['foto']['tmp_name'];
    $folder   = "../foto/";

    if (!move_uploaded_file($tmp, $folder . $namaFile)) {
        header("Location: update.php?nim=$nim&error=upload_gagal");
        exit;
    }

    $sql = "UPDATE tbl_mahasiswa SET
            nama='$nama',
            prodi='$prodi',
            email='$email',
            foto='$namaFile'
            WHERE nim='$nim'";

} else {

    // TANPA GANTI FOTO
    $sql = "UPDATE tbl_mahasiswa SET
            nama='$nama',
            prodi='$prodi',
            email='$email'
            WHERE nim='$nim'";
}

/* EKSEKUSI QUERY */
mysqli_query($koneksi, $sql);

/* REDIRECT BERHASIL */
header("Location: mahasiswa.php?status=update_ok");
exit;
