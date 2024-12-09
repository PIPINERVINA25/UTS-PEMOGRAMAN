<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member Baru</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tema pink */
        .bg-pink {
            background-color: #ffc0cb !important;
        }
        .text-pink {
            color: #ff69b4 !important;
        }
        .btn-pink {
            background-color: #ff69b4 !important;
            color: white !important;
        }
        .btn-pink:hover {
            background-color: #ff85c0 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-pink text-white">
                <h2 class="mb-0">Tambah Member Baru</h2>
            </div>
            <div class="card-body">
                <form action="proses_input.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Member</label>
                        <input type="text" id="nama" name="nama_member" class="form-control" placeholder="Masukkan Nama Member" required>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Level</label>
                        <select id="level" name="level" class="form-select" required>
                            <option value="" disabled selected>Pilih Level</option>
                            <option value="Gold">Gold</option>
                            <option value="Silver">Silver</option>
                            <option value="Platinum">Platinum</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon Member (%)</label>
                        <input type="number" id="diskon" name="diskon_member" class="form-control" placeholder="Masukkan Diskon Member" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-pink">Submit</button>
                        <a href="view.php" class="btn btn-secondary">Lihat Semua Data</a>
                        <a href="view_report.php" class="btn btn-secondary">Lihat Keseluruhan Transaksi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
