-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 07:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
(17, 1, 100000),
(18, 4, 95000),
(19, 2, 56000),
(20, 3, 75000),
(21, 5, 90000),
(21, 5, 90000),
(22, 1, 100000),
(23, 3, 75000),
(24, 2, 56000),
(25, 4, 95000),
(26, 2, 56000);

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
(17, 5, 200000, 'Belum dibayar', '2021-11-30', '2021-12-02', '13:31:00'),
(18, 5, 95000, 'Sudah dibayar', '2021-12-07', '2021-12-08', '07:00:00'),
(19, 5, 168000, 'Sudah dibayar', '2021-12-08', '2021-12-11', '00:28:00'),
(20, 5, 75000, 'Sudah dibayar', '2021-12-07', '2021-12-08', '00:31:00'),
(21, 5, 180000, 'Sudah dibayar', '2021-12-08', '2021-12-09', '13:34:00'),
(22, 5, 200000, 'Sudah dibayar', '2021-12-07', '2021-12-09', '11:35:00'),
(23, 5, 225000, 'Sudah dibayar', '2021-12-06', '2021-12-09', '11:40:00'),
(24, 5, 56000, 'Sudah dibayar', '2021-12-06', '2021-12-07', '23:42:00'),
(25, 5, 95000, 'Sudah dibayar', '2021-12-07', '2021-12-08', '11:47:00'),
(26, 5, 56000, 'Sudah dibayar', '2021-12-07', '2021-12-08', '11:52:00');

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
  `status` varchar(100) NOT NULL,
  `gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `tahun`, `bahan_bakar`, `jenis`, `tarif_hari`, `status`, `gambar`) VALUES
(1, 'Toyota All New Yaris', 2014, 'Solar', 'Hatchback', 400000, 'Available', 1),
(2, 'Toyota Kijang Innova', 2018, 'Bensin', 'MPV', 500000, 'Available', 2),
(3, 'Suzuki Baleno', 2021, 'Bensin', 'Hatchback', 250000, 'Available', 3),
(4, 'Honda Odyssey', 2021, 'Bensin', 'MPV', 300000, 'Available', 4),
(5, 'Mini Cooper', 2020, 'Listrik', 'Hatchback', 900000, 'Available', 5),
(6, 'Toyota Avanza', 2021, 'Bensin', 'MPV', 200000, 'Available', 6),
(8, 'Toyota New Innova Reborn', 2021, 'Solar', 'MPV', 450000, 'Available', 8),
(9, 'Mitsubishi Xpander', 2021, 'Bensin', 'SUV', 900000, 'Available', 9),
(10, 'Toyota All New Alphard Transformer', 2021, 'Bensin', 'MPV', 4500000, 'Available', 10),
(11, 'Toyota Hiace Commuter', 2021, 'Solar', 'Station Wagon', 1750000, 'Available', 11),
(12, 'Toyota Vellfire', 2021, 'Bensin', 'MPV', 1900000, 'Available', 12),
(13, 'Toyota Alphard', 2021, 'Bensin', 'MPV', 1900000, 'Available', 13),
(14, 'Toyota Fortuner VRZ', 2021, 'Solar', 'SUV', 1100000, 'Available', 14),
(15, 'Mitsubishi Pajero', 2021, 'Solar', 'SUV', 1100000, 'Available', 15),
(16, 'Daihatsu Xenia', 2021, 'Bensin', 'SUV', 220000, 'Available', 16),
(17, 'Toyota Calya', 2021, 'Bensin', 'MPV', 245000, 'Available', 17),
(18, 'Suzuki Ertiga', 2021, 'Bensin', 'MPV', 259700, 'Available', 18),
(19, 'Honda Mobilio', 2021, 'Bensin', 'SUV', 250000, 'Available', 19),
(20, 'Nissan Grand Livina', 2021, 'Bensin', 'MPV', 185000, 'Available', 20),
(21, 'Toyota Agya', 2021, 'Bensin', 'Hatchback', 150000, 'Available', 21),
(22, 'Honda Brio', 2021, 'Bensin', 'Hatchback', 300000, 'Available', 22),
(23, 'Honda Jazz', 2017, 'Bensin', 'SUV', 400000, 'Available', 23),
(24, 'Toyota Raize', 2021, 'Bensin', 'Hatchback', 500000, 'Available', 24),
(25, 'GR Yaris ', 2021, 'Bensin', 'Hatchback', 2000000, 'Available', 25),
(26, 'Mercedes-Benz G-Class', 2021, 'Bensin', 'SUV', 10000000, 'Available', 26),
(27, 'BMW M5', 2021, 'Bensin', 'Sedan', 9900000, 'Available', 27),
(28, 'Hyundai Kona Electric', 2021, 'Listrik', 'SUV', 1500000, 'Available', 28),
(29, 'Tesla Model X', 2021, 'Listrik', 'Sedan', 3000000, 'Available', 29);

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
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
