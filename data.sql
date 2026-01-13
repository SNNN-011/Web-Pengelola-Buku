-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2026 at 04:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_buku`
--

CREATE TABLE `tabel_buku` (
  `Id Buku` varchar(100) NOT NULL,
  `Kategori` varchar(100) NOT NULL,
  `Nama Buku` varchar(100) NOT NULL,
  `Harga` varchar(100) NOT NULL,
  `Stok` varchar(100) NOT NULL,
  `Penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_buku`
--

INSERT INTO `tabel_buku` (`Id Buku`, `Kategori`, `Nama Buku`, `Harga`, `Stok`, `Penerbit`) VALUES
('K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', '50.000', '60', 'Penerbit Informatika'),
('K1002', 'Keilmuan', 'Artifical Intelligence', '45.000', '60', 'Penerbit informatika'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', '40.000\r\n', '25', 'Penerbit informatika'),
('B1001', 'Bisnis', 'Bisnis Online', '75.000', '9', 'Penerbit informatika'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', '85.000', '15', 'Penerbit informatika'),
('B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', '67.500', '20', 'Penerbit informatika'),
('N1001', 'Novel', 'Cahaya D Penjuru Hati', '68.000', '10', 'Andi Offset'),
('N1002', 'Novel', 'Aku Ingin Cerita', '48.000', '12', 'Danendra');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penerbit`
--

CREATE TABLE `tabel_penerbit` (
  `Id Penerbit` varchar(100) NOT NULL,
  `Nama Penerbit` varchar(100) NOT NULL,
  `Alamat Penerbit` varchar(100) NOT NULL,
  `Kota` varchar(100) NOT NULL,
  `Telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_penerbit`
--

INSERT INTO `tabel_penerbit` (`Id Penerbit`, `Nama Penerbit`, `Alamat Penerbit`, `Kota`, `Telp`) VALUES
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No.121', 'Bandung', '0813-2220-1946'),
('SP02', 'Andi Offset', 'Jl. Suryaaya IX No.3', 'Bandung', '0879-3903-0688'),
('SP03', 'Danendra', 'Jl Moch. Toha 44', 'Bandung', '022-5201215');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
