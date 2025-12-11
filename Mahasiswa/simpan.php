<?php
include '../koneksi.php';

$nim   = $_POST['nim'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

$sql = "INSERT INTO tbl_mahasiswa (nim, nama, prodi, email)
        VALUES ('$nim', '$nama', '$prodi', '$email')";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: mahasiswa.php");
    exit;
} else {
    echo "Gagal menyimpan data!";
}
?>
