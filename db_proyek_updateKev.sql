-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 02:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `order_id` int(20) NOT NULL,
  `mobil_id` int(20) NOT NULL,
  `tarif_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_pesanan`
--

CREATE TABLE `header_pesanan` (
  `order_id` int(20) NOT NULL,
  `penyewa_id` int(20) NOT NULL,
  `total_tagihan` int(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `jam_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id` int(20) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `tahun` int(4) NOT NULL,
  `bahan_bakar` varchar(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tarif` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id`, `nama_mobil`, `tahun`, `bahan_bakar`, `jenis`, `tarif`, `status`) VALUES
(1, 'Yaris', 2014, 'Solar', 'Hatchback', 100000, 'Available'),
(2, 'Kijang Innova', 2018, 'Bensin', 'SUV', 56000, 'Available'),
(3, 'Suzuki Baleno', 2021, 'Bensin', 'Hatchback', 75000, 'Available'),
(4, 'Honda Odyssey', 2021, 'Bensin', 'MPV', 95000, 'Available'),
(5, 'Mini Cooper', 2020, 'Listrik', 'Sedan', 90000, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

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
(4, 1, 'kyril02', 'awaskenavirus', 'andrewww', '087854782227', 'kebraon', 'surabaya', 'kevinandrew0000@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD UNIQUE KEY `mobil_id_2` (`mobil_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `header_pesanan`
--
ALTER TABLE `header_pesanan`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `penyewa_id` (`penyewa_id`);

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
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `header_pesanan` (`order_id`);

--
-- Constraints for table `header_pesanan`
--
ALTER TABLE `header_pesanan`
  ADD CONSTRAINT `header_pesanan_ibfk_1` FOREIGN KEY (`penyewa_id`) REFERENCES `penyewa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
