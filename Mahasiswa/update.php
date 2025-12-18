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

$nim   = $_POST['nim'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

$sql = "UPDATE tbl_mahasiswa SET 
        nama = '$nama',
        prodi = '$prodi',
        email = '$email'
        WHERE nim = '$nim'";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: mahasiswa.php");
    exit;
} else {
    echo "Gagal update data!";
}
?>
