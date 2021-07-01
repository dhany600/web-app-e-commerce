-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2021 at 10:16 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projek_fai`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Deskripsi` varchar(255) DEFAULT NULL,
  `Kategori` int(11) NOT NULL,
  `Harga` int(11) DEFAULT '0',
  `Stok` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `Nama`, `Deskripsi`, `Kategori`, `Harga`, `Stok`) VALUES
(1, 'Hing Fu Shan', NULL, 0, 185000, 2),
(3, 'tetst', NULL, 0, 666066, 2),
(4, 'test1', NULL, 0, 135000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gambar_barang`
--

CREATE TABLE `gambar_barang` (
  `ID_Barang` int(11) NOT NULL,
  `Gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar_barang`
--

INSERT INTO `gambar_barang` (`ID_Barang`, `Gambar`) VALUES
(1, 'product-image-1.jpg'),
(3, 'default-150x150.png'),
(4, 'default-150x150.png'),
(5, 'pexels-photo-2897883.jpeg'),
(5, 'pexels-photo-3756679.jpeg'),
(5, 'stock-photo-jakarta-indonesia-may-young-businessman-wearing-a-mask-while-looking-at-the-camera-and-1733996660.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `Status`, `ID`) VALUES
('test', '$2y$10$Do/ZICpa5KqjESGuI7cXsO3TDHRyFrU3g5ijOWeG65TuoI1sIQMs.', 'test@test.test', 0, 8),
(NULL, '$2y$10$ukhwOjyoO1KaiN8fyc7u7.KMyMvNIPnRyKLTrwMC0sJSx309Qd1CC', 'test1@test.test', 0, 9),
('bagong', '$2y$10$GCe8aU.C8eBag4/muy7wbu5JR8iBgoQm/RFxPP8rcS0v6cEqXzjCG', 'dimas78@gmail.com', 0, 10),
('admin', '$2y$10$xxLnPBIh5D/dDifB./EB/em.HUnPOl3hSsS8DdGPYo8nBK.bYYGG2', 'admin@admin.admin', 1, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
