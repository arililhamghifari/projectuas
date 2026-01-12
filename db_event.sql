-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2026 at 08:29 PM
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
-- Database: `db_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500'),
(3, 'aril', '$2y$10$jdCTg6P.7zWUQzLhjVM5wOgiGw3ZjCedYzknzDb6IT9QdZmlXE/Xi');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_event`
--

CREATE TABLE `peserta_event` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `event` varchar(50) NOT NULL,
  `alasan` text DEFAULT NULL,
  `tanggal_daftar` datetime DEFAULT current_timestamp(),
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta_event`
--

INSERT INTO `peserta_event` (`id`, `nama`, `email`, `no_hp`, `event`, `alasan`, `tanggal_daftar`, `foto`) VALUES
(4, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Seminar Web', 'saya sangat tertarik banget', '2026-01-08 22:48:20', NULL),
(5, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Seminar Web', 'sangat menyukai seminar web', '2026-01-08 23:13:22', NULL),
(6, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Seminar Web', 'sangat menyukai seminar web', '2026-01-08 23:16:24', NULL),
(7, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Lomba Coding', 'saya sangat jago coding', '2026-01-08 23:18:34', NULL),
(8, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Lomba Coding', 'saya sangat jago coding', '2026-01-08 23:19:05', NULL),
(15, 'Aril Ilham Ghifari', 'aril@gmail.com', '081227292770', 'Seminar Web', 'aaaaaaaaaaaaaaaaaaaaa', '2026-01-12 00:40:24', NULL),
(16, 'Aril Ilham Ghifari', 'aril@gmail.com', '081227292770', 'Lomba Coding', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2026-01-12 00:43:14', NULL),
(17, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Workshop UI/UX', 'hai test 123 cekcek', '2026-01-12 00:43:31', NULL),
(18, 'Aril Ilham Ghifari', 'arililhamghifari@gmail.com', '081227292770', 'Seminar Web', 'aaasadafasfadfad', '2026-01-13 02:03:16', 'foto_6965457417977.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_event`
--
ALTER TABLE `peserta_event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta_event`
--
ALTER TABLE `peserta_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
