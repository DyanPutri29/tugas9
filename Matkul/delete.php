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
