-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 05:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyek_updatekev`
--
CREATE DATABASE IF NOT EXISTS `db_proyek_updatekev` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_proyek_updatekev`;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

DROP TABLE IF EXISTS `detail_pesanan`;
CREATE TABLE `detail_pesanan` (
  `order_id` int(20) NOT NULL,
  `mobil_id` int(20) NOT NULL,
  `tarif_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`order_id`, `mobil_id`, `tarif_hari`) VALUES
(14, 1, 100000),
(15, 3, 75000),
(16, 2, 56000),
(16, 2, 56000),
(17, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `header_pesanan`
--

DROP TABLE IF EXISTS `header_pesanan`;
CREATE TABLE `header_pesanan` (
  `order_id` int(20) NOT NULL,
  `penyewa_id` int(20) NOT NULL,
  `total_tagihan` int(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jam_ambil` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_pesanan`
--

INSERT INTO `header_pesanan` (`order_id`, `penyewa_id`, `total_tagihan`, `status`, `tanggal_mulai`, `tanggal_akhir`, `jam_ambil`) VALUES
(14, 5, 200000, 'Belum dibayar', '2021-11-30', '2021-12-02', '10:56:00'),
(15, 5, 150000, 'Belum dibayar', '2021-12-01', '2021-12-03', '10:56:00'),
(16, 5, 672000, 'Belum dibayar', '2021-11-04', '2021-12-10', '11:05:00'),
(17, 5, 200000, 'Belum dibayar', '2021-11-30', '2021-12-02', '13:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

DROP TABLE IF EXISTS `mobil`;
CREATE TABLE `mobil` (
  `id` int(20) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bahan_bakar` varchar(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tarif_hari` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `tahun`, `bahan_bakar`, `jenis`, `tarif_hari`, `status`) VALUES
(1, 'Yaris', 2014, 'Solar', 'Hatchback', 100000, 'Available'),
(2, 'Kijang Innova', 2018, 'Bensin', 'SUV', 56000, 'Available'),
(3, 'Suzuki Baleno', 2021, 'Bensin', 'Hatchback', 75000, 'Available'),
(4, 'Honda Odyssey', 2021, 'Bensin', 'MPV', 95000, 'Available'),
(5, 'Mini Cooper', 2020, 'Listrik', 'Sedan', 90000, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

DROP TABLE IF EXISTS `penyewa`;
CREATE TABLE `penyewa` (
  `id` int(20) NOT NULL,
  `nik` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`id`, `nik`, `username`, `password`, `nama`, `no_telp`, `alamat`, `kota`, `email`) VALUES
(1, 220310647, 'donit', 'a', 'Wahyu Donitya Adi Sasono', '0818100224', 'Perumahan Delta Mandala 1 No 131 Semambung, Gedangan, Sidoarjo.', 'Sidoarjo', 'wahyu@gmail.com'),
(2, 220310649, 'donit2', 'as', 'Wahyu Donitya Adi Sasono 2', '0818100224', 'Mandala', 'Jayapura', 'wahyuuu@gmail.com'),
(3, 2147483647, 'kevinnandrew', 'qwerty123', 'Kevin Andrew Wijaya', '087854782227', 'Kebraonnn Selatan', 'Surabaya', 'kevinandrew1402@gmail.com'),
(4, 1, 'kyril02', 'awaskenavirus', 'andrewww', '087854782227', 'kebraon', 'surabaya', 'kevinandrew0000@gmail.com'),
(5, 11, 'royce', 'royce', 'royce', 'royce', 'royce', 'royce', 'royce@aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `header_pesanan`
--
ALTER TABLE `header_pesanan`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_pesanan`
--
ALTER TABLE `header_pesanan`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `header_pesanan` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
