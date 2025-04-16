<?php
// Pastikan file database.php di-include untuk koneksi ke database
require_once('database.php');

// Tangkap data dari form registrasi
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Hapus bagian ini jika tidak ada input email di form
// $email = isset($_POST['email']) ? $_POST['email'] : '';

// Validasi input
if (empty($username) || empty($password)) {
    echo "Username dan password harus diisi!";
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Buat query untuk memeriksa apakah username sudah ada
$query_check_username = "SELECT * FROM users WHERE username = ?";
$stmt_check_username = $conn->prepare($query_check_username);
$stmt_check_username->bind_param("s", $username);
$stmt_check_username->execute();
$result_check_username = $stmt_check_username->get_result();

// Periksa apakah username sudah ada
if ($result_check_username->num_rows > 0) {
    echo "Username sudah digunakan!";
    exit();
}

// Buat query untuk memasukkan data ke dalam database
$query_insert_user = "INSERT INTO users (username, password) VALUES (?, ?)";

// Siapkan statement SQL untuk insert user baru
$stmt_insert_user = $conn->prepare($query_insert_user);
$stmt_insert_user->bind_param("ss", $username, $hashed_password);

// Eksekusi statement untuk insert user baru
if ($stmt_insert_user->execute()) {
    // Redirect ke halaman login jika registrasi berhasil
    header("Location: ../login.php");
    exit();
} else {
    // Jika gagal, tampilkan pesan error
    echo "Error: " . $stmt_insert_user->error;
}

// Tutup statement dan koneksi
$stmt_insert_user->close();
$conn->close();
?>
