<?php
// Mulai session jika belum aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
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
          <span>voldemart@proton.me</span>
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
      <a class="navbar-brand" href="index.html"><span id="typing-text"></span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produk
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="product/product.php">senjata</a>
          <a class="dropdown-item" href="product/obat_terlarang.php">Obat Terlarang</a>
          <a class="dropdown-item" href="product/jual_database.php">Database</a>
        </div>
      </li>
            <li class="nav-item">
              <a class="nav-link" href="product/keranjang.php">Keranjang</a>
            </li>
           
            <?php
            // Periksa apakah pengguna sudah login berdasarkan session
            if (isset($_SESSION['username'])) {
              echo '
              <li class="nav-item">
                  <a class="nav-link" href="logout.php"><i class="fas fa-user-secret"></i> Logout</a>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    const textElement = document.getElementById('typing-text');
    const text = "Voldemart Forums"; // Teks yang akan ditampilkan

    let index = 0;
    function typeWriter() {
      if (index < text.length) {
        textElement.innerHTML += text.charAt(index);
        index++;
        setTimeout(typeWriter, 200); // Adjust typing speed here
      } else {
        index = 0;
        textElement.innerHTML = ''; // Reset animation after finishing
        setTimeout(typeWriter, 100); // Wait 1s before starting again
      }
    }

    typeWriter(); // Start the typing animation
  });
  </script>
