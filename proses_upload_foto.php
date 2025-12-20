<?php
session_start();
include '../koneksi.php';

// pastikan request POST
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: mahasiswa.php");
    exit();
}

$nim = $_POST['nim'];

// cek file ada atau tidak
if (!isset($_FILES['file_foto']) || $_FILES['file_foto']['name'] == '') {
    echo "Foto belum dipilih";
    exit();
}

$namaFile = $_FILES['file_foto']['name'];
$tmpFile  = $_FILES['file_foto']['tmp_name'];
$sizeFile = $_FILES['file_foto']['size'];
$errorFile= $_FILES['file_foto']['error'];

// cek error upload
if ($errorFile !== 0) {
    echo "Terjadi kesalahan saat upload file";
    exit();
}

/* ======================
   VALIDASI EKSTENSI
====================== */
$ekstensiValid = array('jpg', 'jpeg', 'png');

// ambil ekstensi TANPA pathinfo
$namaExplode = explode('.', $namaFile);
$ekstensiFile = strtolower(end($namaExplode));

if (!in_array($ekstensiFile, $ekstensiValid)) {
    echo "Format file harus JPG, JPEG, atau PNG";
    exit();
}

/* ======================
   VALIDASI UKURAN
====================== */
if ($sizeFile > 1000000) {
    echo "Ukuran file maksimal 1 MB";
    exit();
}

// rename file agar unik
$namaBaru = time() . "_" . $namaFile;
$folderTujuan = "foto/";

// upload file
if (move_uploaded_file($tmpFile, $folderTujuan . $namaBaru)) {

    // simpan nama foto ke database
    $sql = "UPDATE tbl_mahasiswa 
            SET foto='$namaBaru' 
            WHERE nim='$nim'";

    mysqli_query($conn, $sql);

    header("Location: edit_mahasiswa.php?nim=$nim");
    exit();

} else {
    echo "Upload foto gagal";
}
