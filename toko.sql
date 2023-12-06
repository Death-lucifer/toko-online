-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 01:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `penjual` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `penjual`, `deskripsi`, `foto`) VALUES
(1, 'asdasd', 5000000, 'asdasd', 'asdasdas', 'cat.jpg'),
(2, 'gweh bjir', 999999999, 'ndak tw', 'apa luw', 'afham.jpg'),
(4, 'kue enak', 3000, 'sepa', 'kue simple enak mbo opo', 'kue.png'),
(5, 'orang teriak aaa', 50000, 'sepa neh', 'aaaaaaaaa', 'aaa.png'),
(6, 'apa lo esempe', 7000, 'pardi saiki', 'kelihatan banget smpnya', 'smp.png');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_barang`
--

CREATE TABLE `detail_pembelian_barang` (
  `id_detail_pembelian_barang` int(11) NOT NULL,
  `id_pembelian_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian_barang`
--

INSERT INTO `detail_pembelian_barang` (`id_detail_pembelian_barang`, `id_pembelian_barang`, `id_barang`, `qty`) VALUES
(7, 8, 1, 1),
(8, 9, 2, 1),
(9, 10, 2, 1),
(10, 11, 5, 1),
(14, 15, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_barang`
--

CREATE TABLE `pembelian_barang` (
  `id_pembelian_barang` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_sampai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_barang`
--

INSERT INTO `pembelian_barang` (`id_pembelian_barang`, `id_pembeli`, `tanggal_beli`, `tanggal_sampai`) VALUES
(8, 4, '2023-09-15', '2023-09-20'),
(9, 8, '2023-12-06', '2023-12-11'),
(10, 8, '2023-12-06', '2023-12-11'),
(11, 8, '2023-12-06', '2023-12-11'),
(15, 11, '2023-12-06', '2023-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `pengantaran_barang`
--

CREATE TABLE `pengantaran_barang` (
  `id_pengantaran_barang` int(11) NOT NULL,
  `id_pembelian_barang` int(255) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengantaran_barang`
--

INSERT INTO `pengantaran_barang` (`id_pengantaran_barang`, `id_pembelian_barang`, `tanggal_pembelian`, `denda`) VALUES
(8, 8, '2023-09-15', 0),
(9, 10, '2023-12-06', 0),
(10, 9, '2023-12-06', 0),
(11, 11, '2023-12-06', 0),
(15, 15, '2023-12-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `usernamee` varchar(255) NOT NULL,
  `passwordd` varchar(255) NOT NULL,
  `level` enum('admin','member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_pembeli`, `nama_pembeli`, `tanggal_lahir`, `gender`, `alamat`, `usernamee`, `passwordd`, `level`) VALUES
(4, 'afham', '0000-00-00', 'L', 'asdasdasd', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin'),
(8, 'sheva', '2023-10-13', 'L', 'tito', 'sepa@gmail.com', 'b52a4d59d5d8fe92582cdd855a78a545', 'member'),
(10, 'rania', '2010-04-03', 'P', 'Apalah', 'rania@gmail.com', '9df9604a0388ab92c9eb3d29a095b984', 'member'),
(11, 'atet wiyono', '2023-12-06', 'L', 'jalan super', 'atet@gmail.com', 'f4ed65b2f5cb2849abf4417434851d4b', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail_pembelian_barang`
--
ALTER TABLE `detail_pembelian_barang`
  ADD PRIMARY KEY (`id_detail_pembelian_barang`),
  ADD KEY `id_pembelian_barang` (`id_pembelian_barang`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD PRIMARY KEY (`id_pembelian_barang`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `pengantaran_barang`
--
ALTER TABLE `pengantaran_barang`
  ADD PRIMARY KEY (`id_pengantaran_barang`),
  ADD KEY `id_pembelian_barang` (`id_pembelian_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_pembelian_barang`
--
ALTER TABLE `detail_pembelian_barang`
  MODIFY `id_detail_pembelian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  MODIFY `id_pembelian_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pengantaran_barang`
--
ALTER TABLE `pengantaran_barang`
  MODIFY `id_pengantaran_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian_barang`
--
ALTER TABLE `detail_pembelian_barang`
  ADD CONSTRAINT `detail_pembelian_barang_ibfk_1` FOREIGN KEY (`id_pembelian_barang`) REFERENCES `pembelian_barang` (`id_pembelian_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian_barang`
--
ALTER TABLE `pembelian_barang`
  ADD CONSTRAINT `pembelian_barang_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `user` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengantaran_barang`
--
ALTER TABLE `pengantaran_barang`
  ADD CONSTRAINT `pengantaran_barang_ibfk_1` FOREIGN KEY (`id_pembelian_barang`) REFERENCES `pembelian_barang` (`id_pembelian_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
