<?php
include '../koneksi.php';

$kode = $_POST['kodeMatkul'];
$nama = $_POST['namaMatkul'];
$sks  = $_POST['sks'];
$nidn = $_POST['nidn'];

$sql = "INSERT INTO tbl_matkul (kodeMatkul, namaMatkul, sks, nidn)
        VALUES ('$kode', '$nama', '$sks', '$nidn')";

if (mysqli_query($conn, $sql)) {
    header("Location: matkul.php");
    exit;
} else {
    echo "SQL Error: " . mysqli_error($conn);
}
