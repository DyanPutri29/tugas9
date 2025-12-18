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

$nidn  = $_POST['nidn'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

$sql = "INSERT INTO tbl_dosen VALUES ('$nidn','$nama','$prodi','$email')";
$hasil = mysqli_query($conn, $sql);

if (!$hasil) {
    die("SQL Error: " . mysqli_error($conn));
}

header("Location: dosen.php");
?>
