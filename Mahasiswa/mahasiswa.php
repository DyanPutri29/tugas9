<?php
include '../koneksi.php';

$sql   = "SELECT * FROM tbl_mahasiswa ORDER BY nim ASC";
$query = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mahasiswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body { background: #ffe6f2; }
        .card { border-radius: 20px; }
        .card-header {
            background: #ff66b3;
            color: #fff;
            border-radius: 20px 20px 0 0;
        }
        thead { background: #ff99cc; color: #fff; }
        tbody tr:hover { background-color: #ffe0ef; }
        .foto {
            width: 65px;
            height: 65px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ff66b3;
        }
        .btn-pink {
            background: #ff66b3;
            color: #fff;
        }
        .btn-pink:hover {
            background: #ff3385;
            color: #fff;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">

        <div class="card-header text-center py-3">
            <h4 class="mb-0">
                <i class="bi bi-people-fill"></i> Mahasiswa
            </h4>
        </div>

        <div class="card-body">

            <div class="d-flex gap-2 mb-3">
                <a href="../index.php" class="btn btn-pink">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>

                <a href="tambah.php" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah Mahasiswa
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td>
                                <?php if (!empty($row['foto'])) { ?>
                                    <img src="../foto/<?= $row['foto']; ?>" class="foto">
                                <?php } else { ?>
                                    <span class="text-muted">-</span>
                                <?php } ?>
                            </td>

                            <td><?= $row['nim']; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['prodi']; ?></td>
                            <td><?= $row['email']; ?></td>

                            <td>
                                <a href="update.php?nim=<?= $row['nim']; ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="delete.php?nim=<?= $row['nim']; ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data mahasiswa ini?')">
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
