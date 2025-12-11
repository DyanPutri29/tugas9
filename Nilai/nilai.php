<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'kampus';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Gagal terhubung ke MySQL: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM tbl_nilai ORDER BY id_nilai ASC";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background: #ffe6f2;
        }
        .card {
            border-radius: 20px;
        }
        .card-header {
            background: #ff66b3 !important;
            border-radius: 20px 20px 0 0;
        }
        .btn-back {
            background: #ff66b3;
            border: none;
            font-weight: 600;
            color: #fff;
            border-radius: 30px;
            padding: 10px 20px;
        }
        .btn-back:hover {
            background: #ff3385;
        }
        thead {
            background-color: #ff99cc !important;
            color: #fff;
        }
        tbody tr:hover {
            background-color: #ffe0ef;
            transition: 0.3s;
        }
        table {
            background: #ffffff;
            border-radius: 10px;
        }
    </style>

</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center py-3">
            <h4 class="mb-0"><i class="bi bi-journal-check"></i> Data Nilai Mahasiswa</h4>
        </div>

        <div class="card-body">
            <a href="../index.php" class="btn btn-back mb-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Menu
            </a>
             <a href="tambah.php" class="btn btn-back mb-3">
                <i class="bi bi-arrow-left-circle"></i> Tambah Nilai
            </a>

            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>ID Nilai</th>
                            <th>Nilai Angka</th>
                            <th>Nilai Huruf</th>
                            <th>Kode Matkul</th>
                            <th>NIM</th>
                            <th>NIDN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $row['id_nilai'] ?></td>
                            <td><?= $row['nilai'] ?></td>
                            <td><?= $row['nilaiHuruf'] ?></td>
                            <td><?= $row['kodeMatkul'] ?></td>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nidn'] ?></td>
                            <td>
                                <a href="update.php?id_nilai=<?= $row['id_nilai']; ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="delete.php?id_nilai=<?= $row['id_nilai']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="bi bi-trash-fill"></i> Hapus
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>

<?php mysqli_free_result($query); ?>
