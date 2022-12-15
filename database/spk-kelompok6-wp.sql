-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 08:12 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-kelompok6-wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `kd_alt` int(11) NOT NULL,
  `nm_alt` varchar(30) NOT NULL,
  `alamat_alt` varchar(30) NOT NULL,
  `notelp_alt` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`kd_alt`, `nm_alt`, `alamat_alt`, `notelp_alt`) VALUES
(1, 'Ruang Guru', 'Jakarta Selatan', '087543245891'),
(2, 'Mie Goreng', 'Mojokerto, Jawa Timur', '089654789321'),
(3, 'Oskadon', 'Bandung, Jawa Barat', '085543654123'),
(4, 'Antangin', 'Solo, Jawa Tengah', '083982341967'),
(5, 'Rokok', 'Kediri, Jawa Timur', '031863209011'),
(6, 'Kompetisi Karya Tulis', 'Surabaya, Jawa Timur', '089546733112'),
(7, 'Le Mineral', 'Malang, Jawa Timur', '087765999123'),
(8, 'Mixagrip', 'Semarang, Jawa Tengah', '089633256741'),
(9, 'Kursus Coding', 'Jakarta Pusat', '089643255117'),
(10, 'Sampo Pantene', 'Tanggerang, Banten', '081334528970'),
(11, 'Sepatu Ventela', 'Bekasi, Jawa Barat', '085677410278'),
(12, 'Scarlet', 'Jakarta Timur', '083917168903'),
(13, 'Kursus Menjahit', 'Sidoarjo, Jawa Timur', '089156243561'),
(14, 'English Course', 'Kediri, Jawa Timur', '087753494069'),
(15, 'Haineken Lager Beer', 'Denpasar, Bali', '089765454110');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `kd_data` int(11) NOT NULL,
  `kd_alt` int(11) NOT NULL,
  `kd_kri` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`kd_data`, `kd_alt`, `kd_kri`, `nilai`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 4),
(3, 1, 3, 1750000),
(4, 1, 4, 15),
(5, 1, 5, 2),
(6, 2, 1, 2),
(7, 2, 2, 3),
(8, 2, 3, 2000000),
(9, 2, 4, 16),
(10, 2, 5, 2),
(11, 3, 1, 2),
(12, 3, 2, 4),
(13, 3, 3, 2000000),
(14, 3, 4, 15),
(15, 3, 5, 2),
(16, 4, 1, 2),
(17, 4, 2, 4),
(18, 4, 3, 1500000),
(19, 4, 4, 10),
(20, 4, 5, 3),
(21, 5, 1, 1),
(22, 5, 2, 4),
(23, 5, 3, 2000000),
(24, 5, 4, 15),
(25, 5, 5, 3),
(26, 6, 1, 3),
(27, 6, 2, 1),
(28, 6, 3, 1600000),
(29, 6, 4, 10),
(30, 6, 5, 1),
(31, 7, 1, 2),
(32, 7, 2, 4),
(33, 7, 3, 1500000),
(34, 7, 4, 13),
(35, 7, 5, 1),
(36, 8, 1, 2),
(37, 8, 2, 3),
(38, 8, 3, 1750000),
(39, 8, 4, 10),
(40, 8, 5, 2),
(41, 9, 1, 3),
(42, 9, 2, 4),
(43, 9, 3, 1500000),
(44, 9, 4, 20),
(45, 9, 5, 2),
(46, 10, 1, 2),
(47, 10, 2, 2),
(48, 10, 3, 1750000),
(49, 10, 4, 10),
(50, 10, 5, 1),
(51, 11, 1, 2),
(52, 11, 2, 2),
(53, 11, 3, 2000000),
(54, 11, 4, 12),
(55, 11, 5, 3),
(56, 12, 1, 2),
(57, 12, 2, 4),
(58, 12, 3, 2250000),
(59, 12, 4, 20),
(60, 12, 5, 2),
(61, 13, 1, 3),
(62, 13, 2, 5),
(63, 13, 3, 1500000),
(64, 13, 4, 10),
(65, 13, 5, 2),
(66, 14, 1, 3),
(67, 14, 2, 2),
(68, 14, 3, 1750000),
(69, 14, 4, 15),
(70, 14, 5, 3),
(71, 15, 1, 1),
(72, 15, 2, 3),
(73, 15, 3, 2500000),
(74, 15, 4, 15),
(75, 15, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kri` int(11) NOT NULL,
  `nm_kri` varchar(30) NOT NULL,
  `atribut` varchar(10) NOT NULL,
  `bobot` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kd_kri`, `nm_kri`, `atribut`, `bobot`, `deskripsi`) VALUES
(1, 'Kesesuaian Visi Misi', 'Benefit', 5, '<p>- Tidak sesuai (Mengandung sara, pornografi, rokok, unsur minuman keras) = 1</p>\r\n\r\n<p>- Sesuai (Tidak mengandung unsur sara) = 2</p>\r\n\r\n<p>- Sangat sesuai (Tidak mengandung sara dan terdapat unsur pendidikan) = 3</p>\r\n'),
(2, 'Jangka Kontrak (bulan)', 'Benefit', 4, '<p>Lama kontrak dalam satuan bulan.</p>\r\n'),
(3, 'Harga (bulan)', 'Benefit', 3, '<p>Harga iklan perbulan nya.</p>\r\n'),
(4, 'Durasi (detik)', 'Cost', 2, '<p>Durasi iklan yang akan ditayangkan dalam satuan detik</p>\r\n'),
(5, 'Jam Tayang', 'Benefit', 2, '<p>- Pagi (Karena minim pendengar) = 1</p>\r\n\r\n<p>- Siang (Karena cukup pendengar) = 2</p>\r\n\r\n<p>- Malam (Karena banyak pendengar) =&nbsp; 3</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(13) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `alamat`, `notelp`, `username`, `password`, `level`) VALUES
('Kelompok 6', 'Telang, Kamal, Bangkalan', '031098789876', 'admin', '456', 'admin'),
('Admin 2', 'Telang, Kamal, Bangkalan', '085786543345', 'admin2', '123', 'admin'),
('anis fitria', 'bangkalan', '089012356765', 'anis', 'fitria', 'user'),
('eka juliyanti', 'gresik', '081123456789', 'eka', '123', 'user'),
('eva', 'surabaya', '082234321123', 'eva', 'sby', 'user'),
('galih', 'mojokerto', '081546678987', 'galih', 'glh', 'user'),
('toriq', 'sumenep', '089012345789', 'toriq', 'asd', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kd_alt`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`kd_data`),
  ADD KEY `kd_alt` (`kd_alt`),
  ADD KEY `kd_kri` (`kd_kri`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kri`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `kd_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `kd_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_kri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `fk_kd_alt` FOREIGN KEY (`kd_alt`) REFERENCES `alternatif` (`kd_alt`),
  ADD CONSTRAINT `fk_kd_kri` FOREIGN KEY (`kd_kri`) REFERENCES `kriteria` (`kd_kri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
