-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2023 at 11:01 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20897658_uas_webprog`
--
CREATE DATABASE IF NOT EXISTS `id20897658_uas_webprog` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20897658_uas_webprog`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username_admin`, `password_admin`) VALUES
(3, 'adminferly', '$2y$10$oRBi7PE13/QqxEG9b.vyI.oZIZo6MLmfjHQkW.NiJA85V7EKU2dYC'),
(1, 'adminian', '$2y$10$oRBi7PE13/QqxEG9b.vyI.oZIZo6MLmfjHQkW.NiJA85V7EKU2dYC'),
(2, 'adminrafi', '$2y$10$oRBi7PE13/QqxEG9b.vyI.oZIZo6MLmfjHQkW.NiJA85V7EKU2dYC'),
(4, 'adminsinung', '$2y$10$oRBi7PE13/QqxEG9b.vyI.oZIZo6MLmfjHQkW.NiJA85V7EKU2dYC');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(100) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `jenis_dokter` varchar(255) NOT NULL,
  `foto` blob NOT NULL,
  `review` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama_dokter`, `jenis_dokter`, `foto`, `review`) VALUES
(2, 'Dr. Bailu', 'Spesialis', '', 'adasd'),
(4, 'Dr. Barbara', 'Umum', '', ''),
(3, 'Dr. Bennet', 'Umum', '', 'Very cool'),
(5, 'Dr. Jean', 'Spesialis', '', ''),
(1, 'Dr. Natasha', 'Umum', '', 'Dokter terbaik 2'),
(22, 'Huga', 'Umum', 0x666f746f2f556e7469746c65642064657369676e2e706e67, 'Hebat dalam handle pasien'),
(23, 'Rafi', 'Spesialis', 0x666f746f2f2831292e6a706567, 'Terbaik 2 !');

-- --------------------------------------------------------

--
-- Table structure for table `janji`
--

CREATE TABLE `janji` (
  `id` int(100) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `tanggal_pertemuan` date NOT NULL,
  `jam_pertemuan` enum('10.00 AM','14.00 PM','16.00 PM') NOT NULL,
  `keluhan` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `janji`
--

INSERT INTO `janji` (`id`, `nama_dokter`, `nama_pasien`, `tanggal_pertemuan`, `jam_pertemuan`, `keluhan`, `status`) VALUES
(13, 'Dr. Bailu', 'wolvoldigoad', '2023-06-13', '16.00 PM', 'abc', 'Diterima'),
(14, 'Dr. Natasha', 'SinungAgung', '2023-06-14', '10.00 AM', 'fhgjhgjhgjhgjhgjhgj', 'Ditolak'),
(15, 'Dr. Bennet', 'rafigans', '2023-06-13', '14.00 PM', 'Sakit Kepala\r\n', 'Diterima'),
(16, 'Dr. Bailu', 'rafi123', '2023-06-15', '10.00 AM', 'I need to hit that griddy', 'Diterima'),
(17, 'Huga', 'umn2022', '2023-06-14', '14.00 PM', 'abcd', 'Diterima'),
(18, 'Dr. Barbara', 'wolvoldigoad', '2023-06-14', '14.00 PM', 'Sakit leher', 'Ditolak'),
(19, 'Dr. Bailu', 'whatthe', '2023-06-14', '10.00 AM', 'Aaaaaa', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `alamat`, `username`, `password`, `confirm_password`) VALUES
(60, 'ABCD', 'Jakarta', '2023-06-26', '78888888888', 'ICON', 'umn2022', '$2y$10$/gjKvdUzeIq.mt0USl/z7.IASmHfiUqq0MKpGpczZepoKj9KHOetu', '$2y$10$qdVitypar9328siLx2k19.Ba2sAFS16NL.LfBtrM7Ig4IXeUMBf/a'),
(55, 'Ian Pangeswara Hermawan', 'Tangerang', '2023-06-06', '2343244', 'ICON', 'wolvoldigoad', '$2y$10$j1vEaFCsOC061x/3DIzVxeVaCnFWIQa3/rNbz57omFPybV6V/uMqi', '$2y$10$VFLSV04QgdtAhGhqtlkxFuKWLmzEcPXJ...U8ymp4I0dQzqKd.FvG'),
(57, 'Lindu', 'Pati', '2023-06-29', '55555', 'Ciledug', 'lindugans', '$2y$10$Qx7bgMX575UL5GfCrdleuuOitiPnxlkLgstErRIMnGZdQ0Lzb.KKC', '$2y$10$erqZ.FbXWgc.xcEQIXiwdOQ5JC/0nMl2xURiH1GuYcPou6.Yy5cDu'),
(61, 'Raf', 'A', '2003-03-30', '333421233', 'Earth', 'whatthe', '$2y$10$XN7HrxBGySFKmuHUDfb8/.KslWPbsN2DdfyQkAC6mreg/O941SFaG', '$2y$10$P8SJesL9DNrOuVocksSNqeWyP2WcQ9EtLVg/QRo/oF3wnIrPtB1hO'),
(58, 'Rafi Rabbani', 'Banten', '2023-06-28', '6666666666666666666', 'UMN', 'rafigans', '$2y$10$Do3MhzPYmWgsKMm2MwMs0OiiqyMUre/JpOfEgZ/3JiNCBvqFQRrbe', '$2y$10$Z21hXtwh5JCQvMWQK6LG3.o5FbtZ.Qc.1F6fhoH/pdcl/RHpSsr/q'),
(56, 'Sinung Agung', 'Jakarta', '2023-05-08', '123213', 'Allogio', 'SinungAgung', '$2y$10$Hk7aw81JmjICiyFOEyK1d.gYCv./DWVgOwGYXPY7soP2F05EiJz.y', '$2y$10$eyCLUBd6gACUNSdVyz8vs.ICxqiIIIof6uHygSiceDv537Bl.doGq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`nama_dokter`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`) USING BTREE;

--
-- Indexes for table `janji`
--
ALTER TABLE `janji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_dokter` (`nama_dokter`),
  ADD KEY `nama_pasien` (`nama_pasien`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nama`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `janji`
--
ALTER TABLE `janji`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
