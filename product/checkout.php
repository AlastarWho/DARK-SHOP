<?php
session_start(); // Mulai session untuk mengakses/menyimpan data cart

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$total = 0;

// Menghitung total pembayaran
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Simpan total harga produk ke dalam session
$_SESSION['cart_total'] = $total;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Voldemart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="../asset/image/brand.png" type="image/x-icon">
    <style>
        body {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New', Courier, monospace;
        }
        .container {
            margin-top: 50px;
        }
        .form-container, .cart-container {
            background-color: #111;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .btn-primary, .btn-success {
            background-color: #0f0;
            border-color: #0f0;
            color: #000;
        }
        .btn-primary:hover, .btn-success:hover {
            background-color: #0a0;
            border-color: #0a0;
        }
        h1 {
            font-size: 2.5rem;
        }
        .product-details {
            background-color: #222;
            color: #0f0;
            border: 1px solid #0f0;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
        }
        .form-group i {
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .form-container, .cart-container {
                width: 100%;
            }
            .cart-container {
                order: -1;
            }
        }
    </style>
    <script>
        function updateTotal() {
            var shippingMethod = document.getElementById('shipping_method').value;
            var totalElement = document.getElementById('total');
            var shippingCost = 0;

            if (shippingMethod === 'standard') {
                shippingCost = 5.00;
            } else if (shippingMethod === 'express') {
                shippingCost = 15.00;
            } else if (shippingMethod === 'same_day') {
                shippingCost = 25.00;
            }

            var total = <?php echo $total; ?>;
            var grandTotal = total + shippingCost;

            totalElement.value = grandTotal.toFixed(2);
        }
    </script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Checkout</h1>
    <div class="row">
        <div class="col-md-6 cart-container">
            <h2 class="text-center">Detail Keranjang</h2>
            <?php if (count($cart) > 0): ?>
                <?php foreach ($cart as $item): ?>
                    <div class="product-details">
                        <p><strong>Nama Produk:</strong> <?php echo $item['name']; ?></p>
                        <p><strong>Jumlah:</strong> <?php echo $item['quantity']; ?></p>
                        <p><strong>Harga per Unit:</strong> $<?php echo number_format($item['price'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Keranjang Anda kosong. <a href="product.php">Belanja sekarang</a></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 form-container">
            <?php if (count($cart) > 0): ?>
                <form method="post" action="process_checkout.php">
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Nama:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="address"><i class="fas fa-address-card"></i> Alamat:</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone"><i class="fas fa-phone"></i> Nomor Telepon:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="shipping_method"><i class="fas fa-shipping-fast"></i> Metode Pengiriman:</label>
                        <select class="form-control" id="shipping_method" name="shipping_method" required onchange="updateTotal()">
                            <option value="standard">Standard (3-5 hari) - $5.00</option>
                            <option value="express">Express (1-2 hari) - $15.00</option>
                            <option value="same_day">Same Day - $25.00</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="payment_method"><i class="fas fa-credit-card"></i> Metode Pembayaran:</label>
                        <select class="form-control" id="payment_method" name="payment_method" required>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="paypal">PayPal</option>
                            <option value="bank_transfer">Transfer Bank</option>
                            <option value="crypto">Cryptocurrency</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="total"><i class="fas fa-dollar-sign"></i> Total Pembayaran:</label>
                        <input type="text" class="form-control" id="total" name="total" value="<?php echo number_format($total, 2); ?>" readonly>
                    </div>
                    <button type="submit" name="process_payment" class="btn btn-success btn-block">Proses Pembayaran</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>
