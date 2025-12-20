<?php
include '../koneksi.php';

$nim = $_GET['nim'];

$data = mysqli_fetch_assoc(
    mysqli_query($koneksi,"SELECT foto FROM tbl_mahasiswa WHERE nim='$nim'")
);

if ($data && $data['foto']) {
    unlink("../foto/".$data['foto']);
}

mysqli_query($koneksi,"DELETE FROM tbl_mahasiswa WHERE nim='$nim'");

header("Location: mahasiswa.php?status=ok");
exit;
