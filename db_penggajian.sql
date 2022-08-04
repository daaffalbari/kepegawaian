-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 06:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id_golongan` int(11) NOT NULL,
  `nama_golongan` varchar(50) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `NIK` int(11) NOT NULL,
  `id_penggajian` int(11) NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki - Laki, Perempuan') NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `jumlah_gaji` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NIK`),
  ADD KEY `id_golongan` (`id_golongan`),
  ADD KEY `id_penggajian` (`id_penggajian`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id_golongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karyawan_ibfk_2` FOREIGN KEY (`id_penggajian`) REFERENCES `penggajian` (`id_penggajian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
