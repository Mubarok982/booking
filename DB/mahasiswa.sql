-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2025 at 09:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idRuangan` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `dariJam` time DEFAULT NULL,
  `sampaiJam` time DEFAULT NULL,
  `agenda` text DEFAULT NULL,
  `status` enum('Menunggu','Diterima','Ditolak') DEFAULT 'Menunggu',
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `idUser`, `idRuangan`, `tanggal`, `dariJam`, `sampaiJam`, `agenda`, `status`, `terdaftar`) VALUES
(2, NULL, 2, '2025-06-18', '02:02:00', '04:03:00', 'ntt', 'Menunggu', '2025-06-18 18:00:38'),
(3, NULL, 2, '2025-06-18', '23:05:00', '02:02:00', 'fff', 'Menunggu', '2025-06-18 18:00:56'),
(4, NULL, 2, '2025-06-26', '23:38:00', '23:37:00', 'hhhhh', 'Menunggu', '2025-06-18 18:35:09'),
(5, NULL, 2, '2025-06-12', '23:39:00', '23:39:00', 'vvv', 'Menunggu', '2025-06-18 18:38:01'),
(6, NULL, 2, '2025-06-18', '23:41:00', '23:40:00', 'ggg', 'Menunggu', '2025-06-18 18:39:56'),
(7, NULL, 2, '2025-06-18', '00:42:00', '23:45:00', 'cc', 'Menunggu', '2025-06-18 18:42:10'),
(8, NULL, 2, '2025-06-18', '23:52:00', '23:51:00', 'ccc', 'Menunggu', '2025-06-18 18:49:15'),
(9, 2, 2, '2025-06-18', '23:57:00', '23:57:00', 'xx', 'Menunggu', '2025-06-18 18:55:54'),
(10, 2, 2, '2025-06-18', '23:59:00', '23:59:00', 'vvv', 'Menunggu', '2025-06-18 18:56:08'),
(11, 1, 2, '2025-06-19', '00:11:00', '00:14:00', 'vvv', 'Menunggu', '2025-06-18 19:08:30'),
(12, 1, 3, '2025-07-11', '07:00:00', '09:03:00', 'v', 'Menunggu', '2025-06-18 21:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `status` enum('Login','Logout') DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `device` text DEFAULT NULL,
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `idUser`, `status`, `ipAddress`, `device`, `terdaftar`) VALUES
(1, 2, 'Login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0)', '2025-06-17 08:00:00'),
(2, 2, 'Logout', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0)', '2025-06-17 09:00:00'),
(3, 1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 20:49:04'),
(4, 1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 20:58:20'),
(5, 2, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 20:58:25'),
(6, 1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 20:59:48'),
(7, 1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 21:00:38'),
(8, 1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 21:10:31'),
(9, 1, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 21:11:15'),
(10, 2, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 21:11:20'),
(11, 2, '', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', '2025-06-18 21:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `kode`, `nama`, `terdaftar`) VALUES
(1, 'R001', 'Ruang Rapat 1', '2025-06-16 14:00:00'),
(2, 'R002', 'Ruang Totam', '2025-05-17 04:24:40'),
(3, 'R003', 'Lab Komputer', '2025-06-18 20:26:32'),
(4, 'R004', 'Ruang Est', '2025-03-29 05:27:57'),
(5, 'R005', 'Ruang Repudiandae', '2025-02-24 00:27:45'),
(6, 'R006', 'Ruang Ratione', '2025-02-08 14:39:02'),
(7, 'R003', 'Ruang Quisquam', '2025-03-23 11:06:14'),
(10, 'R006', 'Ruang Ratione', '2025-02-08 14:39:02'),
(11, 'R002', 'Ruang Totam', '2025-05-17 04:24:40'),
(12, 'R003', 'Ruang Quisquam', '2025-03-23 11:06:14'),
(13, 'R004', 'Ruang Est', '2025-03-29 05:27:57'),
(14, 'R005', 'Ruang Repudiandae', '2025-02-24 00:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aplikasi`
--

CREATE TABLE `tb_aplikasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aplikasi`
--

INSERT INTO `tb_aplikasi` (`id`, `nama`, `email`, `telp`, `alamat`, `logo`) VALUES
(1, 'Sistem Booking Ruangan', 'admin@booking.ac.id', '08123456789', 'Jl. Kampus No.1', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_backupdb`
--

CREATE TABLE `tb_backupdb` (
  `id` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `database` varchar(255) DEFAULT NULL,
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_backupdb`
--

INSERT INTO `tb_backupdb` (`id`, `idUser`, `database`, `terdaftar`) VALUES
(1, 1, 'Oscar Store - Backup Database - 17 Juni 2025 10:30:00.zip', '2025-06-17 10:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenisKelamin` varchar(32) DEFAULT NULL,
  `telp` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(128) DEFAULT NULL,
  `skin` varchar(8) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT 'User',
  `login` varchar(8) DEFAULT NULL,
  `terdaftar` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jenisKelamin`, `telp`, `email`, `alamat`, `username`, `password`, `foto`, `skin`, `role`, `login`, `terdaftar`) VALUES
(1, 'Setiya Admin datang', 'Laki-laki', '081391005220', 'rizqymubarok99@gmail.com', 'Bandongan', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'user_1_1750273857.jpg', NULL, 'Admin', NULL, '2025-06-18 22:29:09'),
(2, 'Budi User', 'Laki-laki', '081391005220', 'rizqymubarok99@gmail.com', 'Bandongan', 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user_2_1750273907.jpeg', NULL, 'User', NULL, '2025-06-18 22:29:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_booking` (`idUser`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_aplikasi`
--
ALTER TABLE `tb_aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_backupdb`
--
ALTER TABLE `tb_backupdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_aplikasi`
--
ALTER TABLE `tb_aplikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_backupdb`
--
ALTER TABLE `tb_backupdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_user_booking` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
