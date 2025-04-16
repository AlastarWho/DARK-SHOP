<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="asset/style.css">
    <link rel="shortcut icon" href="asset/image/brand.png" type="image/x-icon">
</head>
<body>
<div class="typing-animation">
        <h1>Hello , Selamat Datang Di Dunia Kotormu</h1>
    </div>
    <div class="hacker-container">
        <h2>Formulir Registrasi</h2>
        <form action="service/process_register.php" method="POST">
            <div class="hacker-form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="hacker-form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="hacker-button">Daftar</button>
        </form>
        <p class="hacker-info">Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
    </div>
</body>
</html>
