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

// Include database configuration file
include '../service/database.php';

// Ambil data item yang akan diupdate
$row = null;
if (isset($_GET['id']) && isset($_GET['jenis'])) {
    $id = $_GET['id'];
    $jenis = $_GET['jenis'];

    // Query untuk mendapatkan data item berdasarkan ID dan jenis
    $query = "SELECT * FROM $jenis WHERE id=$id";
    $result = $conn->query($query);

    // Jika data ditemukan, ambil data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $message = "Item tidak ditemukan.";
    }
} else {
    $message = "Parameter tidak lengkap.";
}

// Handle form submission untuk update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $jenis = $_POST['jenis'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    // Query untuk melakukan update item
    $query = "UPDATE $jenis SET nama='$nama', deskripsi='$deskripsi', harga=$harga ";

    // Handle upload gambar jika ada perubahan gambar
    if ($_FILES["gambar"]["name"] !== '') {
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
            $gambar_path = "asset/image/" . $nama_file;
            $query .= ", gambar='$gambar_path' ";
        } else {
            $message = "Gagal mengupload file gambar.";
        }
    }

    $query .= " WHERE id=$id";

    if ($conn->query($query) === TRUE) {
        $message = "Item berhasil diperbarui!";
    } else {
        $message = "Error: " . $query . "<br>" . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item - Voldemart</title>
    <link rel="shortcut icon" href="../asset/image/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    /* crud.css */

body {
    background-color: #1a1a1a;
    color: #fff;
}

.navbar {
    background-color: #008000;
}

.navbar-brand, .navbar-nav .nav-link {
    color: greenyellow !important;
}

.navbar-toggler-icon {
    background-color: #fff;
}

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
    background-color: #454545;
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
        <h2>Update Item</h2>
        <?php if ($message != ""): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <?php if ($row): ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
                <div class="form-group">
                    <label for="nama">Nama Item</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Item</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo $row['deskripsi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">Harga (dollar)</label>
                    <input type="number" step="0.01" class="form-control" id="harga" name="harga" value="<?php echo $row['harga']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar Item</label>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                </div>
                <button type="submit" class="btn btn-primary">Update Item</button>
            </form>
        <?php else: ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
