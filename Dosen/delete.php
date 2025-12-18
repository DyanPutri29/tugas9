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

if (!isset($_GET['nidn'])) {
    die("Error: NIDN tidak ditemukan.");
}

$nidn = $_GET['nidn'];

$query = "DELETE FROM tbl_dosen WHERE nidn='$nidn'";
$hasil = mysqli_query($conn, $query);

if (!$hasil) {
    die("SQL Error: " . mysqli_error($conn));
}

header("Location: dosen.php");
exit;
?>
