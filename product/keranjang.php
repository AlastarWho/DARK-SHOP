<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tambahkan produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1
    );

    if (isset($_SESSION['cart'])) {
        // Periksa apakah produk sudah ada di keranjang
        $found = false;
        foreach ($_SESSION['cart'] as &$cart_item) {
            if ($cart_item['id'] == $product_id) {
                $cart_item['quantity'] += 1;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = $item;
        }
    } else {
        $_SESSION['cart'] = array($item);
    }
}

// Hapus produk dari keranjang
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];

    foreach ($_SESSION['cart'] as $key => $cart_item) {
        if ($cart_item['id'] == $product_id) {
            unset($_SESSION['cart'][$key]);
            // Reset array keys
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang - Voldemart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="../asset/image/brand.png" type="image/x-icon">
    <style>
        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', Courier, monospace;
        }
        .container {
            background-color: #111;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
        .table {
            background-color: #222;
            color: #0f0;
        }
        .table th, .table td {
            border-color: #333;
        }
        .btn-primary, .btn-success, .btn-danger {
            background-color: #0f0;
            border-color: #0f0;
            color: #000;
        }
        .btn-primary:hover, .btn-success:hover, .btn-danger:hover {
            background-color: #0a0;
            border-color: #0a0;
        }
        h1 {
            font-size: 2.5rem;
        }
        .hacker-note {
            background-color: #111;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
            text-align: center;
            font-size: 1.1rem;
            animation: blink 2s infinite;
        }
        .video-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .video-container video {
            width: 100%;
            max-width: 600px;
            border: 2px solid #0f0;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="video-container">
        <video autoplay muted loop>
            <source src="../asset/image/video4.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <h1 class="text-center">Keranjang Belanja</h1>
    <?php
    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        $total = 0;
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['cart'] as $item) {
                    $total_item = $item['price'] * $item['quantity'];
                    $total += $total_item;
                    ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>$<?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>$<?php echo number_format($total_item, 2); ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                <button type="submit" name="remove_from_cart" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <?php
    } else {
        echo '<p class="text-center">Keranjang Anda kosong.</p>';
    }
    ?>
    <div class="text-center">
        <a href="product.php" class="btn btn-primary">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
    </div>
</div>

<!-- Note ala hacker -->
<div class="hacker-note">
    <p>===[ Voldemart - A Dark Market ]===</p>
    <p>Selamat datang di Voldemart, pasar gelap digital kami.</p>
    <p>Di sini, Anda bisa menemukan berbagai produk terlarang yang tak terduga.</p>
    <p>Temukan kegelapan di dalam produk-produk kami...</p>
    <p>======================================</p>
</div>

</body>
</html>
