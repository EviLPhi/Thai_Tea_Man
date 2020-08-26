-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 02:00 PM
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
  `stok_barang` bigint(20) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama_barang`, `stok_barang`, `jenis_barang`, `harga`) VALUES
(9, 'Ice Cream Oreo Cake', 35, 'minuman', '10000'),
(10, 'Ice Cream Chocolate', 30, 'minuman', '10000'),
(11, 'Fried Ice Cream', 15, 'minuman', '8000'),
(12, 'Teh', 100, 'minuman', '2000'),
(13, 'Jeruk', 100, 'minuman', '3000'),
(14, 'wedang jahe', 100, 'minuman', '5000'),
(15, 'Lemon Tea', 100, 'minuman', '4000'),
(16, 'Air Mineral', 98, 'minuman', '3000'),
(17, 'Milo', 80, 'minuman', '5000'),
(18, 'Goodday', 50, 'minuman', '4000'),
(19, 'Pizza Sunday', 25, 'makanan', '20000'),
(20, 'Burger Beef', 35, 'makanan', '8000'),
(21, 'Burger Chiken', 30, 'makanan', '8000'),
(22, 'Chiken Steak', 45, 'makanan', '10000'),
(23, 'French Frees', 50, 'makanan', '6000'),
(24, 'Spagheti', 65, 'makanan', '8000'),
(25, 'Sosis Bakar', 68, 'makanan', '10000'),
(26, 'Ayam Penyet', 24, 'makanan', '18000'),
(27, 'Ayam Goreng', 34, 'makanan', '18000'),
(28, 'Hotplate Ayam', 45, 'makanan', '15000'),
(29, 'Hotplate Cumi-cumi', 24, 'makanan', '15000'),
(30, 'Hotplate Udang', 20, 'makanan', '15000'),
(31, 'Singkong Krezz', 9, 'makanan', '6000'),
(32, 'Indomie Telur', 33, 'makanan', '8000'),
(33, 'Es Kepal', 21, 'snack', '10000');

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
(1, 2, 3, 55, '2018-07-29 17:54:54'),
(2, 4, 3, 25, '2018-07-29 17:54:54'),
(3, 2, 2, 79, '2018-07-29 17:57:00'),
(4, 4, 2, 77, '2018-07-29 17:57:00'),
(5, 1, 2, 9, '2018-07-29 18:06:01'),
(6, 3, 2, 7, '2018-07-29 18:06:01'),
(7, 1, 3, 34, '2018-07-29 18:35:11'),
(8, 6, 3, 2, '2018-07-29 19:07:07'),
(9, 5, 3, 1, '2019-05-19 06:18:42'),
(10, 17, 3, 20, '2019-12-12 07:14:42'),
(11, 24, 3, 5, '2019-12-12 07:14:42'),
(12, 26, 3, 1, '2019-12-20 16:44:53'),
(13, 31, 3, 1, '2020-08-11 11:18:40'),
(14, 16, 3, 2, '2020-08-25 10:28:53'),
(15, 30, 3, 2, '2020-08-25 10:28:53');

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
(3, 'Bantul', 'ca10e103002f2019683106657911a87e', 'kasir'),
(5, 'Sleman', '0ce214d04fd31abec3fe265a65ec203a', 'kasir'),
(7, 'Yogya', 'fd2db0bbc4f3b6e3dff9ebdd76e669ff', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
