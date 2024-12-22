-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2024 at 06:01 PM
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
-- Database: `reneo_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `field` varchar(30) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`field`, `text`) VALUES
('content', 'Reneo Studio is a photo booth provider with <b><i>unique and stylish looks</b></i> and the latest technology to capture your moments. With <b><i>its best quality and professional lighting</b></i>, it stands even more as it is printed with an outstanding outcome. Our photo booth not only creates great prints but also fits in many events with customizable frames.'),
('pretitle', '<b>We have</b>'),
('title', 'The Best Quality <br> with Good Visuals');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `good_photo_menu`
--

CREATE TABLE `good_photo_menu` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `maksimum_orang` int(11) DEFAULT NULL,
  `harga` decimal(15,2) NOT NULL,
  `gambar_contoh` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `good_photo_menu`
--

INSERT INTO `good_photo_menu` (`id`, `judul`, `deskripsi`, `maksimum_orang`, `harga`, `gambar_contoh`) VALUES
(1, 'The Solo', '10 Minutes Photo Session\r\n5 Minutes Selection Photo\r\nAll Soft File', 1, 25000.00, '../good_photo_menu_images/1.jpg'),
(2, 'The Duo', '15 Minutes Photo Session\r\n5 Minutes Selection Photo\r\n2 Print Photos\r\nAll Soft File ', 2, 70000.00, NULL),
(15, 'The Group', '20 Minutes Photo Session\r\n10 Minutes Selection Photo\r\n4 Print Photos\r\nAll Soft File', 4, 115000.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `good_photo_menu_additional`
--

CREATE TABLE `good_photo_menu_additional` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `good_photo_menu_additional`
--

INSERT INTO `good_photo_menu_additional` (`id`, `deskripsi`, `harga`) VALUES
(1, '1 Person', 20000.00),
(3, 'Print', 15000.00),
(4, '1 Person under-age (Kids)', 15000.00),
(5, '1 Pet (Cat only)', 20000.00),
(6, '2 Costume', 30000.00),
(7, 'Mini Photostrip', 15000.00),
(8, 'Pas Foto', 45000.00);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `singleton`
--

CREATE TABLE `singleton` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `singleton`
--

INSERT INTO `singleton` (`id`, `judul`, `isi`) VALUES
(2, 'alamat', 'Q376+XH Mangunjaya, Bekasi District, West Java 17510');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`field`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `good_photo_menu`
--
ALTER TABLE `good_photo_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `judul` (`judul`);

--
-- Indexes for table `good_photo_menu_additional`
--
ALTER TABLE `good_photo_menu_additional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singleton`
--
ALTER TABLE `singleton`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `good_photo_menu`
--
ALTER TABLE `good_photo_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `good_photo_menu_additional`
--
ALTER TABLE `good_photo_menu_additional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `singleton`
--
ALTER TABLE `singleton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
