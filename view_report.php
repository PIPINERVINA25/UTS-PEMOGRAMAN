<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        .table-pink th {
            background-color: #ffb6c1 !important;
            color: white !important;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-pink text-white">
                <h3 class="mb-0">Data Transaksi</h3>
            </div>
            <div class="card-body">
                <?php
                // Koneksi ke database
                $koneksi = new mysqli("localhost", "root", "", "uts");

                if ($koneksi->connect_error) {
                    die("Koneksi gagal: " . $koneksi->connect_error);
                }

                $sql = "
                SELECT 
                    m.nama_member AS Member,
                    m.level AS Level,
                    CONCAT(m.diskon_member, '%') AS Diskon_Member,
                    CONCAT(k.diskon_kategori, '%') AS Diskon_Barang,
                    t.total_harga AS Total_Pembelian,
                    t.total_diskon AS Total_Diskon,
                    (t.total_harga - t.total_diskon) AS Total_Transaksi
                FROM transaksi t
                JOIN member m ON t.id_member = m.id_member
                JOIN barang b ON t.id_barang = b.id_barang
                JOIN kategori k ON b.id_kategori = k.id_kategori;
                ";

                $result = $koneksi->query($sql);

                if ($result->num_rows > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-pink">
                                <tr>
                                    <th>Member</th>
                                    <th>Level</th>
                                    <th>Diskon Member</th>
                                    <th>Diskon Barang</th>
                                    <th>Total Pembelian</th>
                                    <th>Total Diskon</th>
                                    <th>Total Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($row['Member']) ?></td>
                                        <td><?= htmlspecialchars($row['Level']) ?></td>
                                        <td><?= htmlspecialchars($row['Diskon_Member']) ?></td>
                                        <td><?= htmlspecialchars($row['Diskon_Barang']) ?></td>
                                        <td><?= htmlspecialchars($row['Total_Pembelian']) ?></td>
                                        <td><?= htmlspecialchars($row['Total_Diskon']) ?></td>
                                        <td><?= htmlspecialchars($row['Total_Transaksi']) ?></td>
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
                <a href="index.php" class="btn btn-pink">Back</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
