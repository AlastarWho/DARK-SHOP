<?php
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

require_once '../service/database.php';

function fetchItems($table) {
    global $conn;
    $items = [];
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }
    return $items;
}

// Fetch items based on jenis item
$jenisItems = [
    'produk' => fetchItems('produk'),
    'obat_terlarang' => fetchItems('obat_terlarang'),
    'jual_database' => fetchItems('jual_database')
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Item - Voldemart</title>

    <link rel="shortcut icon" href="../asset/image/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>


body {
    background-color: #1a1a1a;
    color: greenyellow; /* Warna teks putih */
}

/* Navbar styling */
.navbar {
    background-color: #008000; /* Warna hijau */
}

.navbar-brand, .navbar-nav .nav-link {
    color: greenyellow !important;
}

.navbar-toggler-icon {
    background-color: #fff; /* Warna ikon toggler */
}

/* Card styling */
.card {
    background-color: #333;
    border: none;
}

.card-header {
    background-color: #008000;
    border-bottom: none;
}

.card-header h3 {
    margin-bottom: 0;
}

.card-body {
    padding: 0;
}

.table {
    background-color: #333;
    color: greenyellow;
    margin-bottom: 0;
}

.table th, .table td {
    border-color: #008000;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #2b2b2b;
}

.btn-primary {
    background-color: #008000;
    border-color: #008000;
}

.btn-primary:hover {
    background-color: #006400;
    border-color: #006400;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #c82333;
}

form {
    margin-bottom: 0;
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
                    <a class="nav-link" href="create_item.php">Tambah Item</a>
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
        <h2 class="mb-4">Daftar Item</h2>

        <?php foreach ($jenisItems as $jenis => $items): ?>
            <?php if (!empty($items)): ?>
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        <?php 
                            switch ($jenis) {
                                case 'produk':
                                    echo 'Senjata';
                                    break;
                                case 'obat_terlarang':
                                    echo 'Obat Terlarang';
                                    break;
                                case 'jual_database':
                                    echo 'Database';
                                    break;
                                default:
                                    echo 'Jenis Item Tidak Valid';
                                    break;
                            }
                        ?>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Harga (IDR)</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $item): ?>
                                        <tr>
                                            <td><?php echo $item['nama']; ?></td>
                                            <td><?php echo $item['deskripsi']; ?></td>
                                            <td><?php echo number_format($item['harga']); ?></td>
                                            <td><img src="../<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama']; ?>" width="50"></td>
                                            <td>
                                                <a href="update.php?id=<?php echo $item['id']; ?>&jenis=<?php echo $jenis; ?>" class="btn btn-primary btn-sm">Update</a>
                                                <form action="crud.php" method="POST" style="display:inline-block;">
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                                    <input type="hidden" name="jenis" value="<?php echo $jenis; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
