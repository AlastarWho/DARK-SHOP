<?php
// Pastikan file database.php di-include untuk koneksi ke database
require_once('database.php');

// Tangkap data dari form login
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validasi input
if (empty($username) || empty($password)) {
    header("Location: ../login.php?error=empty_fields");
    exit();
}

// Buat query untuk mencari user berdasarkan username
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah username ditemukan
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    // Verifikasi password menggunakan password_verify()
    if (password_verify($password, $user['password'])) {
        // Password cocok, atur session
        session_start();
        $_SESSION['username'] = $username;

        // Cek apakah username dan password adalah admin
        if ($username === 'admin' && $password === 'admin') {
            // Redirect ke crud.php
            header("Location: ../product/crud.php?login=success");
            exit();
        } else {
            // Redirect ke index.php karena bukan admin
            header("Location: ../index.php?login=success");
            exit();
        }
    } else {
        // Password tidak cocok, arahkan kembali ke halaman login.php dengan pesan error
        header("Location: ../login.php?error=invalid_password");
        exit();
    }
} else {
    // Username tidak ditemukan, arahkan kembali ke halaman login.php dengan pesan error
    header("Location: ../login.php?error=user_not_found");
    exit();
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
