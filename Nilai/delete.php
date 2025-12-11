<?php
include '../koneksi.php';

if (!isset($_GET['id_nilai'])) {
    die("Error: ID Nilai tidak ditemukan!");
}

$id = $_GET['id_nilai'];

$sql = "DELETE FROM tbl_nilai WHERE id_nilai = '$id'";
$query = mysqli_query($conn, $sql);

if ($query) {
    echo "<script>
            alert('Data nilai berhasil dihapus!');
            window.location='nilai.php';
          </script>";
} else {
    echo "Hapus data gagal: " . mysqli_error($conn);
}
?>
