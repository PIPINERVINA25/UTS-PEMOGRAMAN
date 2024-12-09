<?php
// File: view.php

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "uts");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil semua data
$sql = "SELECT * FROM member";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Member</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Tambahan tema pink */
        .bg-pink {
            background-color: #ffcccb !important;
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
            <div class="card-header bg-pink text-pink">
                <h2 class="mb-0">Daftar Member</h2>
            </div>
            <div class="card-body">
                <?php if ($result->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-pink text-pink">
                                <tr>
                                    <th>ID Member</th>
                                    <th>Nama Member</th>
                                    <th>Level</th>
                                    <th>Diskon Member</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['id_member']) ?></td>
                                        <td><?= htmlspecialchars($row['nama_member']) ?></td>
                                        <td><?= htmlspecialchars($row['level']) ?></td>
                                        <td><?= htmlspecialchars($row['diskon_member']) ?>%</td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Tidak ada data yang tersedia.
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer text-end">
                <a href="index.php" class="btn btn-pink">Kembali</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Tutup koneksi
$koneksi->close();
?>
