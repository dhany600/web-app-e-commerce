-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2021 at 03:34 AM
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
  `Kategori` varchar(50) NOT NULL,
  `Pemilik` int(11) NOT NULL,
  `Harga` int(11) DEFAULT '0',
  `Stok` int(11) DEFAULT '0',
  `thumbnail` varchar(100) DEFAULT NULL,
  `gambar_1` varchar(100) DEFAULT NULL,
  `gambar_2` varchar(100) DEFAULT NULL,
  `gambar_3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID`, `Nama`, `Deskripsi`, `Kategori`, `Pemilik`, `Harga`, `Stok`, `thumbnail`, `gambar_1`, `gambar_2`, `gambar_3`) VALUES
(1, 'Durma 100 ml', 'lorem ipsum\r\nlorem ipsum\r\nlorem ipsum', 'saltnic', 11, 115000, 18, '60e31a61a65a4.jpg', '60e5da5aec934.jpg', '60e31b388101e.jpg', 'product-image-1.jpg'),
(3, 'RV Mango Dance 100 ml', 'ini Liquid Vape RV Mango Dance', 'freebase', 11, 140000, 12, '60e31977cb1dd.png', '60e5da95e88e8.png', '60e31977dbd94.png', ''),
(4, 'Crack Strawberries Cheese 100 ml', 'ini Liquid Crack Strawberries Cheese 100 ml', 'freebase', 11, 135000, 20, '60e41331240ed.jpg', '60e5dad59427a.png', '60e5dad59460e.png', ''),
(5, 'Makmur Liquid 100 ml', 'ini Liquid Makmur Liquid 100 ml', 'free base', 11, 140000, 18, '60e5dba0c60ee.png', '60e5dba0c6520.png', '60e5dba0c67e5.png', NULL),
(6, 'Harry Potter', 'Desc', 'free base', 15, 140000, 20, 'noPict', 'noPict', 'noPict', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tranksaksi`
--

CREATE TABLE `detail_tranksaksi` (
  `ID_tranksaksi` varchar(20) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tranksaksi`
--

INSERT INTO `detail_tranksaksi` (`ID_tranksaksi`, `ID_Barang`, `jumlah_barang`, `harga`) VALUES
('820210707150751', 1, 2, 250000),
('820210707150701', 1, 2, 250000),
('1320210707200701', 1, 2, 250000),
('820210707230739', 1, 2, 115000),
('820210707230739', 5, 2, 140000),
('820210802090834', 3, 3, 420000);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_belanja`
--

CREATE TABLE `keranjang_belanja` (
  `ID_user` int(11) NOT NULL,
  `ID_Barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tranksaksi`
--

CREATE TABLE `tranksaksi` (
  `ID` varchar(25) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Total_Harga` int(11) NOT NULL,
  `Date` varchar(25) NOT NULL,
  `Status` int(1) DEFAULT '0',
  `bukti_transfer` varchar(100) DEFAULT NULL,
  `no_resi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tranksaksi`
--

INSERT INTO `tranksaksi` (`ID`, `ID_user`, `Total_Harga`, `Date`, `Status`, `bukti_transfer`, `no_resi`) VALUES
('820210707150751', 8, 250000, '2021-07-07 15:07:51', 2, '820210707150751.png', '123456'),
('820210707150701', 8, 250000, '2021-07-07 15:07:01', 1, '820210707150701.png', '123456'),
('1320210707200701', 13, 250000, '2021-07-07 20:07:01', 1, '1320210707200701.jpg', ''),
('820210707230739', 8, 255000, '2021-07-07 23:07:39', 0, NULL, NULL),
('820210802090834', 8, 420000, '2021-08-02 09:08:34', 0, '820210802090834.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(16) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `Kode_Pos` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT '0',
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `kecamatan`, `Kode_Pos`, `alamat`, `telepon`, `Status`, `ID`) VALUES
('test', '$2y$10$Do/ZICpa5KqjESGuI7cXsO3TDHRyFrU3g5ijOWeG65TuoI1sIQMs.', 'test@test.test', NULL, NULL, 'Jl Danau Sunter Slt Bl O-5/4 A Sunter Agung Podomoro, Dki Jakarta', '+62 22 420 4160 ', 0, 8),
(NULL, '$2y$10$ukhwOjyoO1KaiN8fyc7u7.KMyMvNIPnRyKLTrwMC0sJSx309Qd1CC', 'test1@test.test', NULL, NULL, NULL, NULL, 0, 9),
('bagong', '$2y$10$GCe8aU.C8eBag4/muy7wbu5JR8iBgoQm/RFxPP8rcS0v6cEqXzjCG', 'dimas78@gmail.com', NULL, NULL, NULL, NULL, 0, 10),
('admin', '$2y$10$xxLnPBIh5D/dDifB./EB/em.HUnPOl3hSsS8DdGPYo8nBK.bYYGG2', 'admin@admin.admin', NULL, NULL, NULL, NULL, 1, 11),
('steve__74', '$2y$10$Kilho1APbfMPjqaw0aOyPev4CfxhPv6rOfBShYFdSI8OcF1wlwQI2', 'steve696974@gmail.com', NULL, NULL, 'lol', '123456', 0, 13),
('evan', '$2y$10$Kfml3VxGLZFI3RQ2NSLQhuWooCOers9t2024leIHF3YDbhPbls22i', 'laptop.cantik@gmail.com', NULL, NULL, NULL, NULL, 1, 15);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
