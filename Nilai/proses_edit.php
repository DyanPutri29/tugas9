<?php
include '../koneksi.php';

if (isset($_POST['id_nilai'])) {
    $id          = $_POST['id_nilai'];
    $nilaiAngka  = $_POST['nilai'];
    $nilaiHuruf  = $_POST['nilaiHuruf'];
    $kodeMatkul  = $_POST['kodeMatkul'];
    $nim         = $_POST['nim'];
    $nidn        = $_POST['nidn'];

    $query = "UPDATE tbl_nilai SET 
                nilai='$nilaiAngka',
                nilaiHuruf='$nilaiHuruf',
                kodeMatkul='$kodeMatkul',
                nim='$nim',
                nidn='$nidn'
              WHERE id_nilai='$id'";

    $hasil = mysqli_query($conn, $query);

    if (!$hasil) {
        die('SQL Error: ' . mysqli_error($conn));
    }

    header("Location: nilai.php");
}
?>
