-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 11:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 
--

-- --------------------------------------------------------

--
-- Table structure for table `kozmetika`
--

CREATE TABLE `kozmetika` (
  `id_kozmetike` int(11) NOT NULL,
  `nazivkozmetike` varchar(256) NOT NULL,
  `izdavac` varchar(60) NOT NULL,
  `cena` int(11) NOT NULL,
  `vrsta` varchar(30) NOT NULL,
  `id_proizvodjaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kozmetika`
--

INSERT INTO `kozmetika` (`id_kozmetike`, `nazivkozmetike`, `izdavac`, `cena`, `vrsta`, `id_proizvodjaca`) VALUES
(2, 'Oriflame', 'Avon', 800, 'maskara', 2),
(4, 'MaxFactor', 'Avon', 1550, 'ajlajner', 4);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `id_proizvodjaca` int(11) NOT NULL,
  `godina_izlaska` date NOT NULL,
  `nazivizdavaca` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`id_proizvodjaca`, `godina_izlaska`, `nazivizdavaca`) VALUES
(2, '2020-05-10', 'Origon'),
(4, '2020-05-02', 'Swiss Magic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kozmetika`
--
ALTER TABLE `kozmetika`
  ADD PRIMARY KEY (`id_kozmetike`),
  ADD KEY `id_proizvodjaca` (`id_proizvodjaca`);

--
-- Indexes for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD PRIMARY KEY (`id_proizvodjaca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kozmetika`
--
ALTER TABLE `kozmetika`
  MODIFY `id_kozmetike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  MODIFY `id_proizvodjaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
