-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voldemart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jual_database`
--

CREATE TABLE `jual_database` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jual_database`
--

INSERT INTO `jual_database` (`id`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(11, 'Kominfo', 'Berisi data\" karyawan kominfo berupa KTP,KK,ATM,SIM  dan  data\" sensitive dll', 12000000.00, 'asset/image/Kominfo.png'),
(12, 'Shoppe', 'berupa data\" sentisiv dan keuangan server', 8000000.00, 'asset/image/shoope.png'),
(13, 'Amazon', 'data\" karyawan dan keuangan ', 10000000.00, 'asset/image/amazon.png');

-- --------------------------------------------------------

--
-- Table structure for table `obat_terlarang`
--

CREATE TABLE `obat_terlarang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat_terlarang`
--

INSERT INTO `obat_terlarang` (`id`, `nama`, `deskripsi`, `harga`, `gambar`, `created_at`) VALUES
(10, 'Kokain', 'Kokain adalah stimulan kuat yang digunakan untuk meningkatkan energi dan memberikan efek euforia. Sangat dicari untuk rekreasi dan penggunaan ilegal.  \r\n200/gram', 3000000.00, 'asset/image/kokain.png', '2024-07-17 13:11:07'),
(11, 'Heroin', 'Heroin adalah opiat yang memberikan efek relaksasi dan euforia yang kuat. Dikenal sebagai salah satu narkotika paling adiktif di dunia.\r\n300/Gram', 4500000.00, 'asset/image/Heroin.png', '2024-07-17 13:13:18'),
(12, 'Metamphetamine', 'Metamphetamine, atau meth, adalah stimulan yang meningkatkan energi dan memberikan efek semangat yang tinggi. Sering digunakan secara ilegal untuk rekreasi.\r\n150/Gram', 2250000.00, 'asset/image/Metamphetamine.png', '2024-07-17 13:15:45'),
(13, 'Ecstasy', 'Ecstasy adalah pil psikotropika yang memberikan efek perasaan senang dan meningkatkan empati sosial. Digunakan di berbagai acara rekreasi.\r\n50/Pill', 750000.00, 'asset/image/Ecstasy.png', '2024-07-17 13:17:41'),
(14, 'Marijuana', 'Marijuana adalah ganja yang digunakan untuk efek relaksasi dan efek psikoaktif. Populer di kalangan pengguna rekreasi dan medis di beberapa yurisdiksi.\r\n20/gram', 300000.00, 'asset/image/Marijuana.png', '2024-07-17 13:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `gambar`) VALUES
(23, 'Serbu AR-15', 'Senapan serbu AR-15 adalah pilihan utama para penggemar senjata dengan performa tinggi dan desain ergonomis. Cocok untuk keperluan militer dan keamanan pribadi.', 11985000.00, 'asset/image/AR-15.png'),
(24, 'Beretta M9', 'Pistol Beretta M9 adalah senjata semi-otomatis legendaris yang terkenal karena kehandalannya. Ideal untuk penjaga keamanan dan kolektor senjata.', 13500000.00, 'asset/image/Beretta M9.png'),
(25, 'Mossberg 500', 'Shotgun Mossberg 500 adalah senjata pilihan untuk keperluan pertahanan diri dan berburu. Dikenal dengan keandalan dan kemudahannya dalam pengoperasian.', 18000000.00, 'asset/image/Shotgun Mossberg 500.png'),
(26, 'AK-47', 'AK-47, senjata legendaris dari Rusia, terkenal karena ketahanan dan kemudahannya dalam perawatan. Cocok untuk kondisi medan yang berat.', 30000000.00, 'asset/image/AK-47.png'),
(27, 'Wesson Model 686', 'Wesson Model 686 adalah pilihan terbaik untuk penggemar senjata dengan kehandalan dan presisi tinggi. Cocok untuk penggunaan pribadi dan profesional.', 16500000.00, 'asset/image/Revolver Smith & Wesson Model 686.png'),
(28, 'Remington 700', 'Rifle sniper Remington 700 adalah senjata pilihan untuk penembak jitu dengan akurasi tinggi dan performa luar biasa. Ideal untuk keperluan militer dan penembak jarak jauh.', 27000000.00, 'asset/image/Remington 700.png'),
(29, 'Glock 19', 'Pistol Glock 19 adalah senjata semi-otomatis yang terkenal karena kehandalannya dalam kondisi ekstrim. Cocok untuk penggunaan militer dan keamanan pribadi.', 15000000.00, 'asset/image/Pistol Glock 19.png'),
(30, 'Barrett M82', 'Senapan sniper Barrett M82 adalah senjata anti-material dengan daya tembak jarak jauh yang luar biasa. Digunakan untuk menargetkan sasaran dari jarak yang aman.', 45000000.00, 'asset/image/Senapan Sniper Barrett M82.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'dilja', '123', '2024-06-30 21:46:02'),
(3, 'dadang', '123', '2024-06-30 21:59:01'),
(4, 'kakang', '123', '2024-06-30 22:13:33'),
(5, 'aww', '123', '2024-06-30 22:16:11'),
(6, 'anda', '$2y$10$NOOHapeYUPnyxVMN0gdnD.AO1r7PhRiIDFAnIySmmuvwlbC58Qfp2', '2024-06-30 22:19:59'),
(7, 'heni', '$2y$10$VKQiw6JNh7Rlm00iyAonBe4ek2rRduhKJVBPb3w0KOpX68/qa5NOa', '2024-06-30 22:29:06'),
(8, 'admin', '$2y$10$n/pWe4GEMNI/e2ZWB3XvzOhQsBXjbQ8w/dIF1eCmFhAx1peZsWUP.', '2024-06-30 22:31:15'),
(9, 'fadhil', '$2y$10$HeAWlJc62ZkZOpKzo3i3iuSTHXoJLINIdMaQrRI2XVSfcN5lmiHXa', '2024-06-30 23:32:42'),
(10, 'sule', '$2y$10$Yf48xvWgJxASOVqMm0zfU.Nk97sg9vtp6FlD7JxndK/x5NcmGULRG', '2024-07-03 06:18:46'),
(11, 'koin', '$2y$10$fFedhYDtP9i9GuzPDfYMjuPjPHO.UrxfPSOU./QDCCRXmN8tNPuN2', '2024-07-03 06:29:04'),
(12, 'mahasiswa', '$2y$10$5x9.AA5o.DFLMLBQwauGTOtlF8RHB57eJkG7ScS5zZ2t6iQucJzAO', '2024-07-15 19:39:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jual_database`
--
ALTER TABLE `jual_database`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat_terlarang`
--
ALTER TABLE `obat_terlarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jual_database`
--
ALTER TABLE `jual_database`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `obat_terlarang`
--
ALTER TABLE `obat_terlarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
