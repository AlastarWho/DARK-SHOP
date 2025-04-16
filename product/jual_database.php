<?php
// Mulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Sisipkan file database untuk koneksi
include '../service/database.php';

// Ambil data produk dari database
$query = "SELECT * FROM jual_database";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Database - Voldemart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="shortcut icon" href="../asset/image/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="produk.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<header class="header_section">
    <div class="header_top">
        <div class="container-fluid header_top_container">
            <div class="contact_nav">
                <a href="#">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>Call : +62 089999999</span>
                </a>
                <a href="https://mail.proton.me/">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>dadang_bjorka@proton.me</span>
                </a>
            </div>
            <div class="social_box">
                <a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                <a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand" href="index.html">Voldemart Forums</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Produk
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="product.php">Senjata</a>
                                <a class="dropdown-item" href="obat_terlarang.php">Obat</a>
                                <a class="dropdown-item" href="jual_database.php">Database</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="keranjang.php">Keranjang</a>
                        </li>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="../logout.php"><i class="fas fa-user-secret"></i> Logout</a>
                            </li>
                            ';
                        } else {
                            echo '
                            <li class="nav-item">
                                <a class="nav-link" href="login.php"><i class="fas fa-user-secret"></i> Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>

<div class="product-container">
    <h1 class="text-center mb-4">Database</h1>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Konversi harga dari IDR ke USD
                $harga_usd = $row['harga'] / 15000;
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <img src="../<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama']; ?></h5>
                            <p class="card-text">Harga: $ <?php echo number_format($harga_usd, 2); ?></p>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-details" data-toggle="modal" data-target="#productModal" data-nama="<?php echo $row['nama']; ?>" data-deskripsi="<?php echo $row['deskripsi']; ?>">Details</button>
                                <form method="post" action="keranjang.php">
                                    <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="product_name" value="<?php echo $row['nama']; ?>">
                                    <input type="hidden" name="product_price" value="<?php echo $harga_usd; ?>">
                                    <button type="submit" name="add_to_cart" class="btn btn-success">Buy</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="col-md-12"><p class="text-center">Tidak ada produk yang tersedia.</p></div>';
        }
        ?>
    </div>
</div>

<div class="hacker-note">
    <p>===[ Voldemart - A Dark Market ]===</p>
    <p>Selamat datang di Voldemart, pasar gelap digital kami.</p>
    <p>Di sini, Anda bisa menemukan berbagai produk terlarang yang tak terduga.</p>
    <p>Temukan kegelapan di dalam produk-produk kami...</p>
    <p>======================================</p>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Details Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 id="modalNama"></h5>
                <p id="modalDeskripsi"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include '../include/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('#productModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var nama = button.data('nama')
        var deskripsi = button.data('deskripsi')

        var modal = $(this)
        modal.find('.modal-title').text('Details Produk: ' + nama)
        modal.find('#modalDeskripsi').text(deskripsi)
    })
</script>

</body>
</html>
