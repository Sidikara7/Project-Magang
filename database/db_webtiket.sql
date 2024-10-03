-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 07:55 AM
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
-- Database: `db_webtiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(15, 'fahri', '$2y$10$Acz0q9JRW7F02QlpeIaoRuJsX9bN7za9B.Y4OSiAoEe4jnAAiJu/G'),
(16, 'admin', '$2y$10$K/ZD2ZWesriIReQCVxt9R.ImdBszsZs72uJkORR9hzjjQM0BBlB5q');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `no_wa`, `email`, `password`) VALUES
(9, 'user', '086681928172', 'user@gmail.com', '$2y$10$oMx9dlc3y9iSgK9mo8IdF.rDs6ybV3LILt2pelox/0Ziq2/8abA5K');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `id_tiket` varchar(15) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `rek_pengirim` varchar(50) NOT NULL,
  `namarek_pengirim` varchar(100) NOT NULL,
  `bank_pengirim` varchar(20) NOT NULL,
  `jenis_pesanan` varchar(100) NOT NULL,
  `bank_penerima` varchar(150) NOT NULL,
  `total_pembayaran` varchar(50) NOT NULL,
  `waktu_pesanan` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `link_status` varchar(50) NOT NULL,
  `warna_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `id_tiket`, `order_id`, `email`, `catatan`, `rek_pengirim`, `namarek_pengirim`, `bank_pengirim`, `jenis_pesanan`, `bank_penerima`, `total_pembayaran`, `waktu_pesanan`, `bukti_pembayaran`, `status`, `link_status`, `warna_status`) VALUES
(33, 'user|12169', 'user', '086681928172 / user@gmail.com', '', '236478234', 'kakek', 'MANDIRI', 'GURLS CLUB CONCERT VOL. 1', '', '100000', 'Friday, 29-12-2023 | 17:52:27 pm', '', 'Telah Digunakan', '#', 'primary'),
(34, 'user|92928', 'user', '086681928172 / user@gmail.com', '', '98217', 'bebeb', 'BRI', 'GURLS CLUB CONCERT VOL. 1', 'BRI 8126649102 A/N LANGIT SENJA', '100000', 'Friday, 29-12-2023 | 17:54:59 pm', '658efa20c0642.jpeg', 'Ditolak', 'reject.php', 'danger'),
(35, 'user|83027', 'user', '086681928172 / user@gmail.com', '', '3423423', 'ulang', 'MANDIRI', 'GURLS CLUB CONCERT VOL. 1', 'BRI 891101012333 A/N LANGIT SENJA', '100000', 'Friday, 29-12-2023 | 17:56:00 pm', '658efa4a48e1b.jpeg', 'Ditolak', 'reject.php', 'danger'),
(36, 'user|92928', 'user', '086681928172 / user@gmail.com', '', '98217', 'bebeb', 'BRI', 'GURLS CLUB CONCERT VOL. 1', 'BRI 8126649102 A/N LANGIT SENJA', '100000', 'Friday, 29-12-2023 | 17:54:59 pm', '658efac04be64.jpeg', 'Ditolak', 'reject.php', 'danger'),
(37, 'user|1555', 'user', '086681928172 / user@gmail.com', '', '32423423', 'sada', 'BCA', 'GURLS CLUB CONCERT VOL. 1', 'BCA 7819201223 A/N LANGIT SENJA', '100000', 'Friday, 29-12-2023 | 17:58:40 pm', '658efad08de25.jpeg', 'Cetak Tiket', 'cetaktiket.php', 'success'),
(38, 'user|52237', 'user', '086681928172 / user@gmail.com', '', '214313', 'dsada', 'DANA', 'GURLS CLUB CONCERT VOL. 1', 'MANDIRI 8910782211 A/N LANGIT SENJA', '100000', 'Friday, 29-12-2023 | 18:24:19 pm', '658f00d421437.png', 'Cetak Tiket', 'cetaktiket.php', 'success');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
