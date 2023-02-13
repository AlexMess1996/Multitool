-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 05:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `elbil`
--

CREATE TABLE `elbil` (
  `LadNr` int(11) NOT NULL,
  `Start` double NOT NULL,
  `Slutt` double NOT NULL,
  `Pris` double NOT NULL,
  `Dato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elbil`
--

INSERT INTO `elbil` (`LadNr`, `Start`, `Slutt`, `Pris`, `Dato`) VALUES
(1, 31.25, 100, 15.615867379786, '2023-01-03'),
(2, 50, 100, 11.356994458026, '2023-01-12'),
(3, 68.75, 100, 7.0981215362664, '2023-01-13'),
(4, 43.75, 100, 12.77661876528, '2023-01-19'),
(5, 43.75, 100, 12.77661876528, '2023-01-24'),
(6, 31.25, 100, 15.615867379786, '2023-01-31'),
(10, 56.25, 100, 9.937370150773, '2023-02-02'),
(11, 56.25, 100, 9.937370150773, '2023-02-03'),
(12, 56.25, 100, 9.937370150773, '2023-02-05'),
(13, 56.25, 100, 9.937370150773, '2023-02-06'),
(14, 62.5, 100, 8.5177458435197, '2023-02-11'),
(15, 56.25, 100, 9.937370150773, '2023-02-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elbil`
--
ALTER TABLE `elbil`
  ADD PRIMARY KEY (`LadNr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `elbil`
--
ALTER TABLE `elbil`
  MODIFY `LadNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
