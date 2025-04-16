<?php
session_start();
    
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Voldemart Forums</title>
     <link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js">
   <link rel="shortcut icon" href="asset/image/brand.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="asset/style.css">
</head>
<body>
    
    <?php include 'include/navbar.php'; ?>
    
    <div class="video-container">
        <video autoplay muted loop class="d-block w-100" width="864" height="480">
            <source src="asset/image/awal.mp4" type="video/mp4">
        </video>
    </div>

    <!-- bagian tentang -->
    <section class="tentang_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="heading_container">
                        <h2>Tentang</h2>
                        <p id="about-text" class="typewriter">
                     
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">

                    <!-- Video Section -->
                    <div class="video-container" id="tentang">
                        <video autoplay muted loop class="d-block w-100" width="480" height="360">
                            <source src="asset/image/video1.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service_section">
        <div class="container">
            <div class="heading_container">
                <h2>Service Kami</h2>
                <hr style="width: 50%; margin: auto; margin-bottom: 30px; border-color: #00ff00;">
                <p>Voldemart menyediakan layanan-layanan eksklusif untuk memenuhi kebutuhan Anda di dark web. Berikut adalah beberapa layanan unggulan kami:</p>
            </div>
            <div class="service_container">
                <div class="item">
                    <i class="fas fa-shopping-cart icon"></i>
                    <h5>Penjualan Produk Ilegal</h5>
                    <p>Temukan berbagai jenis produk ilegal seperti narkotika, senjata, dan barang-barang terlarang lainnya dengan keamanan terjamin.</p>
                </div>
                <div class="item">
                    <i class="fas fa-shield-alt icon"></i>
                    <h5>Keamanan Terjamin</h5>
                    <p>Kami memprioritaskan keamanan transaksi Anda dengan enkripsi yang kuat dan jaminan anonimitas.</p>
                </div>
                <div class="item">
                    <i class="fas fa-money-bill-alt icon"></i>
                    <h5>Transaksi Anonim</h5>
                    <p>Lakukan transaksi tanpa meninggalkan jejak digital dan rahasia identitas Anda terjaga.</p>
                </div>
            </div>
        </div>
    </section>

<!-- iklan -->

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="asset/image/iklan1.png" class="d-block w-100" alt="First slide">
        </div>
        <div class="carousel-item">
            <img src="asset/image/iklan2.png" class="d-block w-100" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img src="asset/image/iklan3.png" class="d-block w-100" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img src="asset/image/iklan4.png" class="d-block w-100" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


 <!-- data login -->
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- Aside untuk pengguna yang baru login -->
            <aside class="recent-logins">
                <h2 class="aside-title">Pengguna Baru Login</h2>
                <!-- Input untuk pencarian -->
                <div class="search-container">
                    <input type="text" id="searchInput" oninput="searchUsers()" placeholder="Cari pengguna...">
                </div>
                <!-- Tabel untuk menampilkan pengguna -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            <!-- Dinamis di-generate oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <!-- Navigator untuk halaman -->
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary mr-2" onclick="prevPage()"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn btn-primary" onclick="nextPage()"><i class="fas fa-chevron-right"></i></button>
                </div>
            </aside>
        </div>
    </div>
</div>


<br>

    <section class="testimonial_section">
    <div class="container">
        <div class="heading_container">
            <h2>Testimoni Pelanggan</h2>
            <hr style="width: 50%; margin: auto; margin-bottom: 30px; border-color: #00ff00;">
            <p>Simak kesan dan pengalaman nyata dari pelanggan Voldemart yang puas dengan layanan kami.</p>
        </div>
        <div class="testimonial">
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Saya sangat puas dengan pelayanan di Voldemart. Produk yang saya beli sesuai dengan deskripsi dan pengiriman tepat waktu. Sangat direkomendasikan!"</p>
                    <span class="author">OneN9X</span>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Transaksi di Voldemart sangat mudah dan aman. Saya tidak pernah menemui masalah dan barang sampai dengan kondisi baik. Terima kasih Voldemart!"</p>
                    <span class="author">Bjorka</span>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <p>"Voldemart adalah tempat yang tepat untuk mencari barang-barang unik dan sulit ditemukan. Saya sudah beberapa kali berbelanja di sini dan tidak pernah kecewa."</p>
                    <span class="author">SintyZeeo0</span>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


     <!-- Tombol untuk memutar musik -->
     <button class="music-button" onclick="toggleMusic()">
        <i class="fas fa-play"></i>
    </button>

    <!-- Audio player -->
    <audio id="background-music" loop>
        <source src="asset/audio/hacker.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>

  

 

    <?php include 'include/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="asset/js/app.js"></script>
  

</body>
</html>
