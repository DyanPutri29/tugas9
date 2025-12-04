<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Utama</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background: #ffe6f2; /* pink soft */
        }
        .card {
            border-radius: 20px;
        }
        .btn-menu {
            border-radius: 15px;
            padding: 20px;
            font-size: 18px;
            font-weight: 600;
            transition: 0.3s;
            background-color: #ffb3d9;
            color: #ffffff;
            border: none;
        }
        .btn-menu:hover {
            background-color: #ff66b3;
            transform: translateY(-3px);
        }
        .icon-menu {
            font-size: 35px;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header text-white text-center" style="background-color: #ff66b3;">
            <h3 class="mt-1">Menu Utama 💖</h3>
        </div>

        <div class="card-body">
            <p class="text-center mb-4">Silakan pilih data yang ingin dilihat:</p>

            <div class="row text-center g-3">

                <div class="col-md-3 col-6">
                    <a href="mahasiswa.php" class="btn btn-menu w-100">
                        <i class="bi bi-people-fill icon-menu"></i><br>
                        Mahasiswa
                    </a>
                </div>

                <div class="col-md-3 col-6">
                    <a href="nilai.php" class="btn btn-menu w-100">
                        <i class="bi bi-journal-bookmark-fill icon-menu"></i><br>
                        Nilai
                    </a>
                </div>

                <div class="col-md-3 col-6">
                    <a href="dosen.php" class="btn btn-menu w-100">
                        <i class="bi bi-person-badge-fill icon-menu"></i><br>
                        Dosen
                    </a>
                </div>

                <div class="col-md-3 col-6">
                    <a href="matkul.php" class="btn btn-menu w-100">
                        <i class="bi bi-book-half icon-menu"></i><br>
                        Mata Kuliah
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
