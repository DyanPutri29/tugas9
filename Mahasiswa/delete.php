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

$nim = $_GET['nim'];

$sql = "DELETE FROM tbl_mahasiswa WHERE nim = '$nim'";
$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: mahasiswa.php");
    exit;
} else {
    echo "Gagal menghapus data!";
}
?>
