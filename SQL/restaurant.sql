-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 02:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `jenis_kategori` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id`, `nama_kategori`, `jenis_kategori`, `stok`) VALUES
(1, 'Makanan', 'Cake', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `kode_menu` varchar(255) NOT NULL,
  `nama_menu` varchar(150) NOT NULL,
  `harga_menu` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_menu` varchar(250) NOT NULL,
  `id_minuman` varchar(255) NOT NULL,
  `id_makanan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `kode_menu`, `nama_menu`, `harga_menu`, `foto`, `status_menu`, `id_minuman`, `id_makanan`) VALUES
(1, '901', 'Cake Strawbery', '12000', 'rainbow_cake_20402_16x9.jpg', 'Tersedia', '1', 0),
(2, '901', 'SaysStory Fraanchise', '12000', 'franchise-say-story-murah.jpg', 'Tersedia', '2', 0),
(3, '0', 'SaysStory Choklateeee', '5000', 'brand1.png', 'Tersedia', '1', 1),
(4, '89', 'Urangg', '1000', '32.jpg', 'Tidak', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `jenis_kategori` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id`, `nama_kategori`, `jenis_kategori`, `stok`) VALUES
(1, 'Minuman', 'Boba Drink', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `tanggal_pemesan` date NOT NULL,
  `kode_pemesanan` varchar(255) NOT NULL,
  `nama_pembeli` varchar(250) NOT NULL,
  `id_menu` int(12) NOT NULL,
  `id_minuman` int(12) NOT NULL,
  `no_hp` varchar(250) NOT NULL,
  `id_makanan` int(12) NOT NULL,
  `status_order` varchar(250) NOT NULL,
  `jumlah_pemesanan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `tanggal_pemesan`, `kode_pemesanan`, `nama_pembeli`, `id_menu`, `id_minuman`, `no_hp`, `id_makanan`, `status_order`, `jumlah_pemesanan`) VALUES
(2, '2022-06-09', '12', 'Ahmad', 2, 1, '089281', 0, 'Selesai', '10'),
(3, '2022-06-10', '120', 'Fais', 3, 1, '08182827', 0, 'Selesai', '10'),
(6, '2022-06-11', '676', 'Fais', 3, 1, '038738', 1, 'Selesai', '9'),
(8, '2022-06-10', '10', 'Fais', 1, 1, '111111', 1, 'Selesaiiii', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'Admin', 'admin@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'User', 'user@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(4, 'ahmadfauzi', 'ahmadfauzi@gmail.com', '$2y$10$WW79.dXXCkva8Txcg.Lre.RAP4OCsD5mK/aJUpLDSlphkU5opldcS', 2),
(5, 'ahmad faiz', 'ahmadfaiz@gmail.com', '$2y$10$0gvq5Jqg3ArLwkJd2Jcyauy8m7OBvULNWsX2o.K7XPOok4NquHM8i', 2),
(6, 'ahmad faiz', 'ahmadfaisasu@gmail.com', '$2y$10$kRl4PKQ2QV8BZ0O/o6tOD.cBoXvvICzR..dfRXLWontDwnpBUj9LK', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_email_unique` (`email`),
  ADD KEY `login_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `minuman`
--
ALTER TABLE `minuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `login_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
