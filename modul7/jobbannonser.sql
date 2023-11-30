-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07. Nov, 2023 21:09 PM
-- Tjener-versjon: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `modul7`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `jobbannonser`
--

CREATE TABLE `jobbannonser` (
  `id` int(11) NOT NULL,
  `tittel` varchar(255) NOT NULL,
  `beskrivelse` text DEFAULT NULL,
  `publiseringsdato` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `jobbannonser`
--

INSERT INTO `jobbannonser` (`id`, `tittel`, `beskrivelse`, `publiseringsdato`) VALUES
(5, 'Skyarkitekt', 'Telenor trenger en ny cloud arkitekt som har kompetanse innen Azure ', '2023-11-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobbannonser`
--
ALTER TABLE `jobbannonser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobbannonser`
--
ALTER TABLE `jobbannonser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
