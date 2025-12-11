<?php
include '../koneksi.php';

$kodematkul = $_POST['kodeMatkul'];
$namamatkul = $_POST['namaMatkul'];
$sks        = $_POST['sks'];
$nidn       = $_POST['nidn'];

$sql = "UPDATE tbl_matkul SET 
        namaMatkul = '$namamatkul',
        sks = '$sks',
        nidn = '$nidn'
        WHERE kodeMatkul = '$kodematkul'";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: matkul.php"); // arahkan ke halaman matkul, bukan mahasiswa
    exit;
} else {
    echo "Gagal update data!";
}
?>