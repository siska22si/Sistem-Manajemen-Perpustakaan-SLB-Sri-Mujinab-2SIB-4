-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 01:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_kel4`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjamanbuku`
--

CREATE TABLE `peminjamanbuku` (
  `id_pinjam` int(255) NOT NULL,
  `id_buku` int(255) NOT NULL,
  `nama_peminjam` varchar(255) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalianbukus`
--

CREATE TABLE `pengembalianbukus` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalianbukus`
--

INSERT INTO `pengembalianbukus` (`id_pengembalian`, `id_pinjam`, `tanggal_pengembalian`) VALUES
(1, 43435, '2023-11-03'),
(2, 43435, '2023-11-03'),
(3, 43435, '2023-11-03'),
(4, 43435, '2023-11-03'),
(5, 43435, '2023-11-03'),
(6, 43435, '2023-11-03'),
(7, 3333, '2023-11-08'),
(8, 3333, '2023-11-08'),
(9, 3333, '2023-11-08'),
(10, 3333, '2023-11-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengembalianbukus`
--
ALTER TABLE `pengembalianbukus`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengembalianbukus`
--
ALTER TABLE `pengembalianbukus`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
