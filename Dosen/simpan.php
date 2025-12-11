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
