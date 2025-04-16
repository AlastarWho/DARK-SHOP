<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/style.css">
    <link rel="shortcut icon" href="asset/image/brand.png" type="image/x-icon">
</head>
<body class="darkweb-body">
    <!-- Video Background -->
    <div class="video-background">
        <video autoplay muted loop>
            <source src="asset/image/hacker_video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Tombol untuk memutar musik -->
    <button class="music-button" onclick="toggleMusic()">
        <i class="fas fa-play"></i>
    </button>

    <!-- Audio player -->
    <audio id="background-music">
        <source src="asset/audio/hacker.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    
     <!-- Tombol untuk menampilkan modal alert -->
     <div class="text-center mt-4">
        <button class="btn btn-darkweb-rules" data-toggle="modal" data-target="#hackerNoteModal">
            <i class="fas fa-exclamation-triangle"></i>Warning !
        </button>
    </div>
    
    <!-- Modal hacker note -->
    <div class="modal fade" id="hackerNoteModal" tabindex="-1" aria-labelledby="hackerNoteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content-darkweb">
                <div class="modal-header">
                    <h5 class="modal-title" id="hackerNoteModalLabel"><i class="fas fa-exclamation-triangle"></i> Peringatan!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2><i><strong>Welcome To Voldemart Forums</strong></i></h2>
                    <p>⚠️ <strong>Website ini merupakan platform yang beroperasi di dark web dan melayani transaksi ilegal.</strong></p>
                    <p>🚨 Segala bentuk akses atau penggunaan yang tidak sah dapat berdampak serius pada keamanan dan privasi Anda.</p>
                    <p>👮 Kami tidak bertanggung jawab atas segala akibat hukum yang timbul dari penggunaan platform ini.</p>
                    <p>💀 Kami harap menggunakan platform ini dengan bijak dan bertanggung jawab.</p>
                    <p>😈 Selamat menikmati hiburan kotormu :)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Login -->
    <div class="login-container">
        <!-- Informasi selamat datang -->
        <p class="light-text">Selamat datang di Voldemart, platform penjualan barang ilegal. Silakan masukkan username dan password Anda untuk melanjutkan.</p>
        
        <h2>Login to Voldemart</h2>

        <!-- Form login -->
        <form action="service/process_login.php" method="post">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <!-- Informasi tambahan -->
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>

        <!-- Alert untuk login berhasil -->
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
            <strong><i class="fas fa-check-circle"></i> Login berhasil.</strong> Selamat datang di dunia gelapmu!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Alert untuk login gagal -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;">
            <strong><i class="fas fa-times-circle"></i> Gagal login.</strong> Username atau password salah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    
   
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Ambil parameter dari URL jika ada
        const urlParams = new URLSearchParams(window.location.search);
        const loginSuccess = urlParams.has('login') && urlParams.get('login') === 'success';
        const loginError = urlParams.has('error');

        // Tampilkan alert jika login berhasil
        if (loginSuccess) {
            document.querySelector('.login-container').classList.add('logged-in');
            const alertElement = document.querySelector('.alert-success');
            alertElement.style.display = 'block';
            
            // Tampilkan teka-teki dan verifikasi jawaban
            const riddleAnswer = prompt('Jawab teka-teki berikut untuk melanjutkan: Apa binatang yang suka makan pisang?');
            if (riddleAnswer.toLowerCase() === 'monyet') {
                // Jika jawaban benar, arahkan ke halaman index.php
                window.location.href = 'index.php';
            } else {
                // Jika jawaban salah, beri pesan dan arahkan ke halaman login.php lagi
                alert('Jawaban Anda salah. Silakan coba lagi.');
                window.location.href = 'login.php';
            }
        }

        

        // Tampilkan alert jika login gagal
        if (loginError) {
            document.querySelector('.login-container').classList.add('logged-in');
            const alertElement = document.querySelector('.alert-danger');
            alertElement.style.display = 'block';
        }

        // Fungsi untuk memutar atau menghentikan musik
        function toggleMusic() {
            const music = document.getElementById('background-music');
            const musicButtonIcon = document.querySelector('.music-button i');
            if (music.paused) {
                music.play();
                musicButtonIcon.classList.remove('fa-play');
                musicButtonIcon.classList.add('fa-pause');
            } else {
                music.pause();
                musicButtonIcon.classList.remove('fa-pause');
                musicButtonIcon.classList.add('fa-play');
            }
        }
    </script>
</body>
</html>
