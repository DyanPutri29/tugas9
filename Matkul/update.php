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