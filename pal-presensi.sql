-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 08:50 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pal-presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'sa', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftarhadir`
--

CREATE TABLE `tbl_daftarhadir` (
  `id` int(11) NOT NULL,
  `id_Rapat` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `namaLengkap` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sign` varchar(100) DEFAULT NULL,
  `attendance` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftarhadir`
--

INSERT INTO `tbl_daftarhadir` (`id`, `id_Rapat`, `nip`, `namaLengkap`, `jabatan`, `unit`, `instansi`, `email`, `sign`, `attendance`) VALUES
(1, 1, '212303002', 'Salma Sayyidah', 'Direktur', 'Pemberantas Korupsi', 'PT. Salema Jaya', 'ssaruma@gmail.com', NULL, '2023-07-10 01:30:00'),
(39, 1, '212303022', 'Seokjin', 'Bendahara', 'Pemberantas Korupsi', 'PT. Salema Jaya', 'seokjinna@gmail.com', 'img_sign/64b587ec19b8e_1_17072023.png', '2023-07-17 18:26:52'),
(40, 1, '212303003', 'Baekhyun Byun', 'HRD', 'Pemberantas Korupsi', 'PT. Salema Jaya', 'baekhyunchan@gmail.com', 'img_sign/64b58af59ed5f_1_17072023.png', '2023-07-17 18:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftarrapat`
--

CREATE TABLE `tbl_daftarrapat` (
  `id` int(11) NOT NULL,
  `judulRapat` varchar(200) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `idZoom` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_daftarrapat`
--

INSERT INTO `tbl_daftarrapat` (`id`, `judulRapat`, `tempat`, `tanggal`, `waktu`, `status`, `idZoom`, `link`, `password`) VALUES
(1, 'Rapat pembahasan pembangunan IKN tahun 2024', 'Zoom Meetings', '2023-07-03', '09:30:00', 1, '234ahsbg2', 'https://zoom.meetings.com', 'abg2512');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daftarhadir`
--
ALTER TABLE `tbl_daftarhadir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_daftarrapat`
--
ALTER TABLE `tbl_daftarrapat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_daftarhadir`
--
ALTER TABLE `tbl_daftarhadir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_daftarrapat`
--
ALTER TABLE `tbl_daftarrapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
