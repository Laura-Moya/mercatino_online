-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 11:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mercatino_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `possiede`
--

CREATE TABLE `possiede` (
  `prodotto` int(8) NOT NULL,
  `regione` varchar(20) NOT NULL,
  `provincia` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `possiede`
--

INSERT INTO `possiede` (`prodotto`, `regione`, `provincia`) VALUES
(3, 'lombardia', 'mi'),
(3, 'piemonte', 'to'),
(4, 'piemonte', 'to');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `possiede`
--
ALTER TABLE `possiede`
  ADD PRIMARY KEY (`prodotto`,`regione`,`provincia`),
  ADD KEY `regione` (`regione`),
  ADD KEY `provincia` (`provincia`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `possiede`
--
ALTER TABLE `possiede`
  ADD CONSTRAINT `possiede_ibfk_1` FOREIGN KEY (`prodotto`) REFERENCES `annuncio` (`codice`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `possiede_ibfk_2` FOREIGN KEY (`regione`) REFERENCES `luogo_ristretta` (`regione`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `possiede_ibfk_3` FOREIGN KEY (`provincia`) REFERENCES `luogo_ristretta` (`provincia`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
