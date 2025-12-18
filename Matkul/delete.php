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

$kode = $_GET['kodeMatkul'];

$sql = "DELETE FROM tbl_matkul WHERE kodeMatkul='$kode'";

if (mysqli_query($conn, $sql)) {
    header("Location: matkul.php");
    exit;
} else {
    echo "SQL Error: " . mysqli_error($conn);
}
