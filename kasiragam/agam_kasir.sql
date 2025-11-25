-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 02:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agam_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_menu`, `jumlah`, `subtotal`) VALUES
(21, 22, 2, 1, 10000.00),
(22, 22, 1, 1, 10000.00),
(23, 22, 5, 2, 10000.00),
(24, 23, 1, 2, 20000.00),
(25, 23, 5, 1, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `username`, `password`, `nama_kasir`, `email`) VALUES
(1, 'Kasir1', '12345', 'Haikal', 'adminhaikal@warkop.com'),
(2, 'Kasir2', '121212', 'Farqi', 'farqiputra@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `total_pendapatan` decimal(10,2) NOT NULL,
  `id_kasir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id_laporan`, `tanggal_laporan`, `total_pendapatan`, `id_kasir`) VALUES
(9, '2025-11-11', 30000.00, 1),
(10, '2025-11-17', 25000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `kategori` enum('Makanan','Minuman') NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(55) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `kategori`, `harga`, `stok`, `status`, `deskripsi`, `gambar`) VALUES
(1, 'Ayam Penyet', 'Makanan', 10000.00, 70, 'Tersedia', 'Ayam penyet 1 porsi yang sangat enak', 'ayampenyet.png'),
(2, 'Ayam 3 Rasa', 'Makanan', 10000.00, 70, 'Tersedia', 'Ayam 1 porsi dengan 3 rasa', 'ayam3rasa.png'),
(3, 'Teh Susu Dingin', 'Minuman', 8000.00, 70, 'Tersedia', 'Minuman segar dan enak', 'tehsusu.png'),
(4, 'Mie Bangladesh', 'Makanan', 10000.00, 70, 'Tersedia', 'Mie nyemek enak', 'miebang.png'),
(5, 'Mandi', 'Minuman', 5000.00, 70, 'Tersedia', 'Minuman teh manis dingin', 'mandi.jpg'),
(6, 'Kopi Caffuccino Dingin', 'Minuman', 8000.00, 70, 'Tersedia', 'Kopi seger', 'kapucino.png'),
(7, 'Milo dingin', 'Minuman', 8000.00, 70, 'Tersedia', 'Milo seger', 'milo.png'),
(8, 'Taro Dingin', 'Minuman', 8000.00, 70, 'Tersedia', 'Taroo seger', 'taro.jpg'),
(9, 'Nasi Goreng', 'Makanan', 12000.00, 70, 'Tersedia', 'Nasgor mantuuapp', 'nasgor.png'),
(10, 'Martabak Kacang', 'Makanan', 12000.00, 70, 'Tersedia', 'martabak kacang enakk', 'martabak.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `metode_pembayaran` enum('Tunai','NonTunai') NOT NULL,
  `jumlah_bayar` decimal(10,2) NOT NULL,
  `kembalian` decimal(10,2) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL,
  `id_kasir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `metode_pembayaran`, `jumlah_bayar`, `kembalian`, `tanggal_pembayaran`, `id_kasir`) VALUES
(33, 22, 'Tunai', 50000.00, 20000.00, '2025-11-11 09:31:27', 1),
(34, 23, 'Tunai', 50000.00, 25000.00, '2025-11-17 16:02:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `status_pesanan` enum('Belum Dibayar','Sudah Dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesanan`, `nama_pelanggan`, `total_harga`, `status_pesanan`) VALUES
(22, '2025-11-11 09:31:06', 'Adit', 30000.00, 'Sudah Dibayar'),
(23, '2025-11-17 16:01:08', 'wildan', 25000.00, 'Sudah Dibayar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `detail_pesanan_ibfk_1` (`id_pesanan`),
  ADD KEY `detail_pesanan_ibfk_2` (`id_menu`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `laporan_penjualan_ibfk_1` (`id_kasir`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_ibfk_1` (`id_pesanan`),
  ADD KEY `pembayaran_ibfk_2` (`id_kasir`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE;

--
-- Constraints for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD CONSTRAINT `laporan_penjualan_ibfk_1` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
