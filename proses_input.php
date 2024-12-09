<?php

// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "uts");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Tangkap data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama_member'];
    $level = $_POST['level'];
    $diskon = $_POST['diskon_member'];

    // Query untuk menambahkan data baru
    $sql = "INSERT INTO member (nama_member, level, diskon_member) VALUES ('$nama', '$level', '$diskon')";

    if ($koneksi->query($sql) === TRUE) {
        // Redirect ke halaman view_report.php setelah berhasil
        header("Location: view.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Member Baru</title>
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
                <h2 class="mb-0">Tambah Member Baru</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nama_member" class="form-label">Nama Member</label>
                        <input type="text" id="nama_member" name="nama_member" class="form-control" placeholder="Masukkan Nama Member" required>
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
                        <label for="diskon_member" class="form-label">Diskon Member (%)</label>
                        <input type="number" id="diskon_member" name="diskon_member" class="form-control" placeholder="Masukkan Diskon Member" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-pink">Simpan</button>
                        <a href="view.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
