<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'kampus';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die('Gagal terhubung ke MySQL: ' . mysqli_connect_error());
}

$sql = "SELECT * FROM tbl_mahasiswa ORDER BY nim ASC";
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
    <title>Data Mahasiswa</title>

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
        table {
            background: #ffffff;
            border-radius: 10px;
        }
        thead {
            background: #ff99cc !important;
            color: #fff;
            font-size: 16px;
        }
        tbody tr:hover {
            background-color: #ffe0ef;
            transition: 0.3s;
        }
    </style>

</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center py-3">
            <h4 class="mb-0"><i class="bi bi-people-fill"></i> Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            <a href="../index.php" class="btn btn-back mb-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Menu
            </a>
            <a href="tambah.php" class="btn btn-back mb-3">
                <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
            </a>


            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>Aksi</th> <!-- Tambahan -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $row['nim'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['prodi'] ?></td>
                            <td><?= $row['email'] ?></td>

                            <!-- Tombol Aksi -->
                            <td>
                                <a href="proses_edit.php?nim=<?= $row['nim'] ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="delete.php?nim=<?= $row['nim'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="bi bi-trash"></i>
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
