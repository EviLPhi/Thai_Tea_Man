-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 04:09 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama_barang`, `jenis_barang`, `harga`) VALUES
(36, 'Original Man Medium', 'Minuman', '8000'),
(37, 'Original Man Large', 'Minuman', '10000'),
(38, 'Greentea Man Medium', 'Minuman', '9000'),
(39, 'Greentea Man', 'Minuman', '11000'),
(40, 'Chocolate Man Medium', 'Minuman', '10000'),
(41, 'Chocolate Man Large', 'Minuman', '12000'),
(42, 'Coffee Man Medium', 'Minuman', '10000'),
(43, 'Coffee Man Large', 'Minuman', '12000'),
(44, 'Taro Man Medium', 'Minuman', '10000'),
(45, 'Taro Man Large', 'Minuman', '12000'),
(46, 'Boba ', 'Topping', '2000'),
(47, 'Jelly', 'Topping', '2000'),
(48, 'Oreo', 'Topping', '2000'),
(49, 'Chocochips', 'Topping', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stock` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`id_user`, `id_barang`, `stock`) VALUES
(6, 36, 23),
(7, 36, 20),
(8, 36, 20),
(6, 37, 19),
(7, 37, 20),
(8, 37, 20),
(6, 38, 19),
(7, 38, 20),
(8, 38, 20),
(6, 39, 19),
(7, 39, 20),
(8, 39, 20),
(6, 40, 19),
(7, 40, 20),
(8, 40, 20),
(6, 41, 19),
(7, 41, 20),
(8, 41, 20),
(6, 42, 19),
(7, 42, 20),
(8, 42, 20),
(6, 43, 19),
(7, 43, 20),
(8, 43, 20),
(6, 44, 18),
(7, 44, 20),
(8, 44, 20),
(6, 45, 19),
(7, 45, 20),
(8, 45, 20),
(6, 46, 18),
(7, 46, 20),
(8, 46, 20),
(6, 47, 19),
(7, 47, 20),
(8, 47, 20),
(6, 48, 19),
(7, 48, 20),
(8, 48, 20),
(6, 49, 19),
(7, 49, 20),
(8, 49, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `id_barang`, `id_user`, `jumlah_barang`, `tanggal_transaksi`) VALUES
(17, 36, 6, 2, '2020-08-26 03:15:51'),
(18, 47, 6, 2, '2020-08-26 03:16:21'),
(19, 48, 6, 1, '2020-08-26 03:16:21'),
(20, 46, 6, 2, '2020-08-26 13:03:32'),
(21, 43, 7, 3, '2020-09-16 09:56:09'),
(22, 45, 7, 1, '2020-09-16 09:56:09'),
(23, 45, 6, 1, '2020-09-16 10:01:56'),
(24, 44, 6, 1, '2020-09-16 13:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `password`, `jabatan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'cabangsewon', '490b4c1667a107c53920e739c48b6414', 'kasir'),
(3, 'cabangimogiri', 'be037e9c3f7d2783c166c81e00e71563', 'kasir'),
(4, 'cabangmalioboro', '6f161cd9f690ca5b65cb7475699de946', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);
--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
