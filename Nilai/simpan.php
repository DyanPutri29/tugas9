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

$nilai      = $_POST['nilai'];
$nilaiHuruf = $_POST['nilaiHuruf'];
$kodematkul = $_POST['kodeMatkul'];
$nim        = $_POST['nim'];
$nidn       = $_POST['nidn'];

$sql = "INSERT INTO tbl_nilai (nim, kodematkul, nilai, nilaiHuruf, nidn) 
                VALUES ('$nim', '$kodematkul', '$nilai', '$nilaiHuruf', '$nidn')";

if (mysqli_query($conn, $sql)) {
    header("Location: nilai.php");
    exit;
} else {
    echo "SQL Error: " . mysqli_error($conn);
}
