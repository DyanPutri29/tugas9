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
