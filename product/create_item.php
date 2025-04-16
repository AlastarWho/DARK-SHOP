<?php
$message = ""; // Variabel untuk menyimpan pesan

// Mulai sesi
session_start();

// Pastikan pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php?error=not_logged_in");
    exit();
}

// Pastikan pengguna adalah admin
if ($_SESSION['username'] !== 'admin') {
    header("Location: ../login.php?error=not_admin");
    exit();
}

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../service/database.php'; 

    $jenis = $_POST['jenis']; 
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga_usd = $_POST['harga'];
    
    // Konversi harga dari USD ke IDR
    $harga_idr = $harga_usd * 15000;

    // Handle upload gambar
    $nama_file = $_FILES["gambar"]["name"];
    $ukuran_file = $_FILES["gambar"]["size"];
    $tmp_file = $_FILES["gambar"]["tmp_name"];
    $dir_upload = "../asset/image/";

    // Cek apakah direktori asset/image tersedia
    if (!is_dir($dir_upload)) {
        mkdir($dir_upload, 0755, true); // Buat direktori jika belum ada
    }

    // Pindahkan file ke direktori asset/image
    if (move_uploaded_file($tmp_file, $dir_upload . $nama_file)) {
        // Tentukan tabel berdasarkan jenis item
        switch ($jenis) {
            case 'produk':
                $tabel = 'produk';
                break;
            case 'obat':
                $tabel = 'obat_terlarang';
                break;
            case 'database':
                $tabel = 'jual_database';
                break;
            default:
                echo "Jenis item tidak valid.";
                exit();
        }

        // Simpan informasi item ke database
        $gambar_path = "asset/image/" . $nama_file;
        $query = "INSERT INTO $tabel (nama, deskripsi, harga, gambar) VALUES ('$nama', '$deskripsi', $harga_idr, '$gambar_path')";

        if ($conn->query($query) === TRUE) {
            $message = "Item berhasil ditambahkan!";
        } else {
            $message = "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        $message = "Gagal mengupload file.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Item - Voldemart</title>
    <link rel="stylesheet" href="crud.css">
    <link rel="shortcut icon" href="../asset/image/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>

/* Body background color */
body {
    background-color: #1a1a1a;
    color: #fff; 
}

/* Navbar styling */
.navbar {
    background-color: #008000; 
}

.navbar-brand, .navbar-nav .nav-link {
    color: greenyellow !important;
}

.navbar-toggler-icon {
    background-color: #fff; 
}

/* Form styling */
.container {
    background-color: #333; 
    padding: 20px; 
    border-radius: 8px; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); 
}

h2 {
    color: #008000; 
}

.form-group label {
    color: #fff; 
}

.form-control {
    background-color: #333; 
    border: 1px solid #008000; 
    color: #fff; 
}

.form-control::placeholder {
    color: #ccc; 
}

.form-control:focus {
 
    border-color: #008000; 
}

.form-control-file {
    background-color: #333; 
    border: 1px solid #008000; 
    color: #fff; 
}

.btn-primary {
    background-color: #008000; 
    border-color: #008000; 
}

.btn-primary:hover {
    background-color: #006400; 
    border-color: #006400; 
}

.alert-success {
    background-color: #006400; 
    border-color: #006400; 
    color: #fff; 
}
</style>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Voldemart</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="read.php">List Produk Database</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../logout.php">Logout</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="navbar-text">Logged in as: Admin</span>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    <h2>Tambah Item</h2>
    <?php if ($message != ""): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="jenis">Jenis Item</label>
            <select class="form-control" id="jenis" name="jenis" required>
                <option value="produk">Senjata</option>
                <option value="obat">Obat Terlarang</option>
                <option value="database">Database</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nama">Nama Item</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Item</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga (dollar)</label>
            <input type="number" step="0.01" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Item</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Item</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
