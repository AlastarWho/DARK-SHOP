<?php
session_start(); // Memulai session untuk mengakses/menampilkan data checkout_info

if (isset($_SESSION['checkout_info'])) {
    $checkout_info = $_SESSION['checkout_info'];
    $name = htmlspecialchars($checkout_info['name']);
    $address = htmlspecialchars($checkout_info['address']);
    $phone = htmlspecialchars($checkout_info['phone']);
    $shipping_method = htmlspecialchars($checkout_info['shipping_method']);
    $shipping_estimate = htmlspecialchars($checkout_info['shipping_estimate']);
    $payment_method = htmlspecialchars($checkout_info['payment_method']);
    $product_total = floatval($checkout_info['total']);
    $shipping_cost = floatval($checkout_info['shipping_cost']);
    $payment_total = floatval($checkout_info['grand_total']);
} else {
    // Jika data checkout tidak tersedia, redirect kembali ke halaman checkout
    header('Location: checkout.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pesanan - Voldemart</title>
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
            background-color: #111;
            border-radius: 10px;
            padding: 20px;
            margin: 50px auto;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        .receipt {
            background-color: #222;
            border: 1px solid #0f0;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
        .receipt h2 {
            font-size: 2rem;
            text-align: center;
            color: #0f0; /* Warna teks judul */
            margin-bottom: 20px;
        }
        .receipt p {
            margin-bottom: 5px;
            color: #0f0; /* Warna teks isi */
        }
        .barcode {
            margin: 20px 0;
            text-align: center;
        }
        .barcode img {
            width: 300px; /* Lebar gambar barcode */
            height: auto;
        }
        .print-button {
            display: block;
            margin: 20px auto;
            text-align: center;
        }
        .print-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0f0;
            border: 1px solid #0f0;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }
        .print-button a:hover {
            background-color: #0a0;
            border-color: #0a0;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="receipt">
        <h2>Terima kasih telah berbelanja di Voldemart!</h2>
        <p><strong>Nomor Pesanan:</strong> <?php echo uniqid(); ?></p>
        <p><strong>Nama:</strong> <?php echo $name; ?></p>
        <p><strong>Alamat:</strong> <?php echo $address; ?></p>
        <p><strong>Nomor Telepon:</strong> <?php echo $phone; ?></p>
        <p><strong>Metode Pengiriman:</strong> <?php echo $shipping_method; ?> (Estimasi: <?php echo $shipping_estimate; ?>)</p>
        <p><strong>Metode Pembayaran:</strong> <?php echo $payment_method; ?></p>
        <p><strong>Total Harga Produk:</strong> $<?php echo number_format($product_total, 2); ?></p>
        <p><strong>Biaya Pengiriman:</strong> $<?php echo number_format($shipping_cost, 2); ?></p>
        <p><strong>Total Pembayaran:</strong> $<?php echo number_format($payment_total, 2); ?></p>
    </div>
    <div class="barcode">
        <!-- Contoh menggunakan layanan online untuk barcode -->
        <img src="https://barcode.tec-it.com/barcode.ashx?data=1234567890&code=Code128&dpi=96" alt="Barcode">
    </div>
    <div class="print-button no-print">
        <a href="#" onclick="window.print()">Cetak Struk</a>
    </div>
    <div class="print-button no-print">
        <a href="product.php">Kembali Belanja</a>
    </div>
</div>

</body>
</html>
