<?php
$servername = "localhost"; // Ganti dengan nama server Anda jika berbeda
$username_db = "root"; // Ganti dengan username MySQL Anda
$password_db = ""; // Ganti dengan password MySQL Anda
$database = "voldemart_db"; // Nama database yang telah Anda buat

// Buat koneksi ke database
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk menutup koneksi
function closeConnection($conn) {
    $conn->close();
}

// Pastikan koneksi ditutup ketika skrip selesai dieksekusi
register_shutdown_function('closeConnection', $conn);
?>
