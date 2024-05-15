-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 02:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_webprog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username_admin`, `password_admin`) VALUES
(1, 'smpnumn', '$2y$10$lBm6XrIJN3a1obAGaDxSR.osugvAhzO5Wjs4DniDr5nMupkrBffri');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` blob NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `status` enum('Tidak Diterima, Diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto`, `email`, `no_telp`, `username`, `password`, `confirm_password`, `reset_token`, `status`) VALUES
(75, 'Ian Pangeswara Hermawan', 'Pati', '2023-04-07', 'ICON', 0x666f746f5f73697377612f2831292e6a706567, 'ian.pangeswara@student.umn.ac.id', '0895636826847', 'wolvoldigoad', '$2y$10$wREL4tfaTF.nuRtW9GEPju0.KZIBNqaLkRRBorvxjVDbwfHvKedhq', '$2y$10$4jJEzP/4SumI31WJoou7K.CfI7K44h6X73Pgx9DI9r/xchBlcuE.O', '1c3dd2aafe32b8db4a7f51215fcbfac7', 'Tidak Diterima, Diterima'),
(85, 'Erland', 'Jakarta', '2023-04-06', 'scientia residence', 0x666f746f5f73697377612f556e7469746c65642064657369676e2e706e67, 'erland@gmail.com', '233434654654', 'erland123', '$2y$10$zWWoaTHPyfaIVpM7ERz3IuS1aTEylBI1.hrPA0hxeysBHBVuFkNCa', '$2y$10$plG8lUzZEeGUsnFqj7Y00OnIwmFAhZpq/uQNpst/OqT7APhnz28Lu', NULL, 'Tidak Diterima, Diterima'),
(86, 'Sinung Agung', 'Jakarta', '2023-04-11', 'Allogio', 0x666f746f5f73697377612f47414d45532e706e67, 'sinung@gmail.com', '233434654654', 'SinungAgung', '$2y$10$BrtzVeRMy5po6iGD/Z17NOzu3q8nFEwnfPbD7wDaggwig9NCWj2rK', '$2y$10$WdqJlv33esVxO9a5Nwnx.ult7ptTDy7751Tw8KG2mmcKp9FJmwr9C', NULL, 'Tidak Diterima, Diterima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
