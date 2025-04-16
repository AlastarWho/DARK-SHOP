<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['process_payment'])) {
    // Ambil dan validasi data dari form
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $shipping_method = htmlspecialchars($_POST['shipping_method']);
    $payment_method = htmlspecialchars($_POST['payment_method']);
    $total = floatval($_POST['total']);

    // Hitung biaya pengiriman dan estimasi waktu pengiriman
    $shipping_cost = 0;
    $shipping_estimate = '';

    if ($shipping_method == 'standard') {
        $shipping_cost = 5.00;
        $shipping_estimate = '3-5 hari';
    } elseif ($shipping_method == 'express') {
        $shipping_cost = 15.00;
        $shipping_estimate = '1-2 hari';
    } elseif ($shipping_method == 'same_day') {
        $shipping_cost = 25.00;
        $shipping_estimate = 'Pada hari yang sama';
    }

    // Hitung total akhir
    $grand_total = $total + $shipping_cost;

    // Simpan informasi checkout ke dalam session
    $_SESSION['checkout_info'] = [
        'name' => $name,
        'address' => $address,
        'phone' => $phone,
        'shipping_method' => $shipping_method,
        'shipping_estimate' => $shipping_estimate,
        'payment_method' => $payment_method,
        'total' => $total,
        'shipping_cost' => $shipping_cost,
        'grand_total' => $grand_total,
    ];

    // Kosongkan keranjang setelah proses checkout
    unset($_SESSION['cart']);

    // Redirect ke halaman konfirmasi pesanan
    header('Location: confirmation.php');
    exit();
} else {
    // Jika pengguna mencoba mengakses halaman ini secara langsung, redirect ke halaman keranjang
    header('Location: keranjang.php');
    exit();
}
?>
