-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 09:43 PM
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
-- Table structure for table `annuncio`
--

CREATE TABLE `annuncio` (
  `codice` int(8) NOT NULL,
  `venditore` varchar(16) NOT NULL,
  `via` varchar(30) NOT NULL,
  `comune` varchar(20) NOT NULL,
  `regione` varchar(20) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `nome_annuncio` varchar(50) NOT NULL,
  `nome_prodotto` varchar(30) NOT NULL,
  `foto` text DEFAULT NULL,
  `prezzo` float NOT NULL,
  `nuovo` tinyint(1) NOT NULL,
  `tempo_usura` varchar(20) DEFAULT NULL,
  `stato_usura` enum('pari a nuovo','buono','meglio','usato') DEFAULT NULL,
  `garanzia` tinyint(1) DEFAULT NULL,
  `copertura_garanzia` varchar(20) DEFAULT NULL,
  `acquirente` varchar(16) DEFAULT NULL,
  `visibilita` enum('privata','pubblica','ristretta') NOT NULL DEFAULT 'privata',
  `categorie` enum('Elettrodomestici','Foto e Video','Abbigliamento','Hobby') NOT NULL,
  `sottocategorie` enum('Aspirapolveri','Caffetiere','Tostapane','Frullattori','Altro1','Macchine fotografiche','Accessori2','Telecamere','Microfoni','Altro2','Vestiti','Borse','Scarpe','Accessori3','Altro3','Giocattoli','Film e DVD','Musica','Libre e Riviste','Altro4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annuncio`
--

INSERT INTO `annuncio` (`codice`, `venditore`, `via`, `comune`, `regione`, `provincia`, `nome_annuncio`, `nome_prodotto`, `foto`, `prezzo`, `nuovo`, `tempo_usura`, `stato_usura`, `garanzia`, `copertura_garanzia`, `acquirente`, `visibilita`, `categorie`, `sottocategorie`) VALUES
(1, 'MYGLRA99P60Z131O', 'pitteri 56', 'milano', 'lombardia', 'mi', 'vendesi aspirapolvere', 'folletto 3pro', NULL, 200, 1, NULL, NULL, 1, 'due anni', 'MRNVNT96R63I577A', 'privata', 'Elettrodomestici', 'Aspirapolveri'),
(2, 'MYGLRA99P60Z131O', 'pitteri 56', 'milano', 'lombardia', 'mi', 'microonde', 'Samsung', NULL, 80, 1, NULL, NULL, 1, '7 anni', 'MRNVNT96R63I577A', 'privata', 'Elettrodomestici', 'Altro1'),
(3, 'MYGLRA99P60Z131O', 'pitteri 56', 'milano', 'lombardia', 'mi', 'si vende cellulare usato', 'huawei p20 lite', NULL, 120, 0, 'un anno', 'pari a nuovo', NULL, NULL, NULL, 'ristretta', 'Hobby', 'Altro4'),
(4, 'MYGLRA99P60Z131O', 'galileo galilei 3', 'stresa', 'piemonte', 'vb', 'si vende tv usata', 'Philips 480', NULL, 500, 0, '2 anni', 'buono', NULL, NULL, NULL, 'ristretta', 'Foto e Video', 'Altro2'),
(5, 'MRRCLS06S13H501K', 'aldo moro 76', 'bologna', 'emilia romagna', 'bo', 'Si vende DVD star wars', 'DVD star wars', NULL, 10, 1, NULL, NULL, 0, NULL, NULL, 'pubblica', 'Hobby', 'Film e DVD');

-- --------------------------------------------------------

--
-- Table structure for table `indirizzo`
--

CREATE TABLE `indirizzo` (
  `via` varchar(30) NOT NULL,
  `comune` varchar(20) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `regione` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indirizzo`
--

INSERT INTO `indirizzo` (`via`, `comune`, `provincia`, `regione`) VALUES
('aldo moro 76', 'bologna', 'bo', 'emilia romagna'),
('galileo galilei 3', 'stresa', 'vb', 'piemonte'),
('pitteri 56', 'milano', 'mi', 'lombardia'),
('scarlatti 33', 'buccinasco', 'mi', 'lombardia');

-- --------------------------------------------------------

--
-- Table structure for table `luogo_ristretta`
--

CREATE TABLE `luogo_ristretta` (
  `regione` varchar(20) NOT NULL,
  `provincia` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `luogo_ristretta`
--

INSERT INTO `luogo_ristretta` (`regione`, `provincia`) VALUES
('lombardia', 'mi'),
('piemonte', 'to');

-- --------------------------------------------------------

--
-- Table structure for table `osserva`
--

CREATE TABLE `osserva` (
  `utente` varchar(16) NOT NULL,
  `prodotto` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `osserva`
--

INSERT INTO `osserva` (`utente`, `prodotto`) VALUES
('MRNVNT96R63I577A', 1),
('MRNVNT96R63I577A', 2),
('MRNVNT96R63I577A', 3),
('MRNVNT96R63I577A', 5),
('MRRCLS06S13H501K', 1),
('MRRCLS06S13H501K', 4),
('MYGLRA99P60Z131O', 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `stato`
--

CREATE TABLE `stato` (
  `prodotto` int(8) NOT NULL,
  `stato` enum('in vendita','venduto','eliminato') NOT NULL,
  `data_ora` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stato`
--

INSERT INTO `stato` (`prodotto`, `stato`, `data_ora`) VALUES
(1, 'in vendita', '2020-11-17 18:45:36'),
(1, 'in vendita', '2020-11-17 18:46:25'),
(1, 'venduto', '2020-11-17 18:45:36'),
(3, 'in vendita', '2020-11-18 17:11:16'),
(3, 'venduto', '2020-11-18 17:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `codice_fiscale` varchar(16) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `immagine` text DEFAULT NULL,
  `tipo_utente` enum('acquirente','venditore') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`codice_fiscale`, `nome`, `cognome`, `email`, `immagine`, `tipo_utente`) VALUES
('MRNVNT96R63I577A', 'Valentina', 'Maronese', 'valentina@maronese.com', NULL, 'acquirente'),
('MRRCLS06S13H501K', 'Callisto', 'Morra', 'callisto@morra.com', NULL, 'venditore'),
('MYGLRA99P60Z131O', 'Laura', 'Moya', 'laura@moya.com', NULL, 'venditore');

-- --------------------------------------------------------

--
-- Table structure for table `valutazione`
--

CREATE TABLE `valutazione` (
  `codice_fiscale_valuta` varchar(16) NOT NULL,
  `codice_fiscale_valutato` varchar(16) NOT NULL,
  `serieta` enum('1','2','3','4','5') NOT NULL,
  `puntualita` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valutazione`
--

INSERT INTO `valutazione` (`codice_fiscale_valuta`, `codice_fiscale_valutato`, `serieta`, `puntualita`) VALUES
('MRNVNT96R63I577A', 'MYGLRA99P60Z131O', '5', '4'),
('MYGLRA99P60Z131O', 'MRNVNT96R63I577A', '5', '5'),
('MYGLRA99P60Z131O', 'MRNVNT96R63I577A', '5', '5'),
('MRNVNT96R63I577A', 'MYGLRA99P60Z131O', '1', '3'),
('MYGLRA99P60Z131O', 'MRNVNT96R63I577A', '2', '1'),
('MRNVNT96R63I577A', 'MRRCLS06S13H501K', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `vive`
--

CREATE TABLE `vive` (
  `codice_fiscale` varchar(16) NOT NULL,
  `via` varchar(30) NOT NULL,
  `comune` varchar(20) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `regione` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vive`
--

INSERT INTO `vive` (`codice_fiscale`, `via`, `comune`, `provincia`, `regione`) VALUES
('MRNVNT96R63I577A', 'galileo galilei 3', 'stresa', 'vb', 'piemonte'),
('MRNVNT96R63I577A', 'scarlatti 33', 'buccinasco', 'mi', 'lombardia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annuncio`
--
ALTER TABLE `annuncio`
  ADD PRIMARY KEY (`codice`),
  ADD KEY `venditore` (`venditore`),
  ADD KEY `via` (`via`),
  ADD KEY `comune` (`comune`),
  ADD KEY `regione` (`regione`),
  ADD KEY `provincia` (`provincia`),
  ADD KEY `acquirente` (`acquirente`);

--
-- Indexes for table `indirizzo`
--
ALTER TABLE `indirizzo`
  ADD PRIMARY KEY (`via`,`comune`,`provincia`,`regione`),
  ADD KEY `via` (`via`),
  ADD KEY `comune` (`comune`),
  ADD KEY `provincia` (`provincia`),
  ADD KEY `regione` (`regione`);

--
-- Indexes for table `luogo_ristretta`
--
ALTER TABLE `luogo_ristretta`
  ADD PRIMARY KEY (`regione`,`provincia`),
  ADD KEY `regione` (`regione`),
  ADD KEY `provincia` (`provincia`);

--
-- Indexes for table `osserva`
--
ALTER TABLE `osserva`
  ADD PRIMARY KEY (`utente`,`prodotto`),
  ADD KEY `prodotto` (`prodotto`);

--
-- Indexes for table `possiede`
--
ALTER TABLE `possiede`
  ADD PRIMARY KEY (`prodotto`,`regione`,`provincia`),
  ADD KEY `regione` (`regione`),
  ADD KEY `provincia` (`provincia`);

--
-- Indexes for table `stato`
--
ALTER TABLE `stato`
  ADD PRIMARY KEY (`prodotto`,`stato`,`data_ora`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`codice_fiscale`);

--
-- Indexes for table `valutazione`
--
ALTER TABLE `valutazione`
  ADD KEY `codice_fiscale_valutato` (`codice_fiscale_valutato`),
  ADD KEY `valutazione_ibfk_1` (`codice_fiscale_valuta`);

--
-- Indexes for table `vive`
--
ALTER TABLE `vive`
  ADD PRIMARY KEY (`codice_fiscale`,`via`,`comune`,`provincia`,`regione`),
  ADD KEY `via` (`via`),
  ADD KEY `comune` (`comune`),
  ADD KEY `provincia` (`provincia`),
  ADD KEY `regione` (`regione`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annuncio`
--
ALTER TABLE `annuncio`
  MODIFY `codice` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `annuncio`
--
ALTER TABLE `annuncio`
  ADD CONSTRAINT `annuncio_ibfk_1` FOREIGN KEY (`venditore`) REFERENCES `utente` (`codice_fiscale`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `annuncio_ibfk_2` FOREIGN KEY (`via`) REFERENCES `indirizzo` (`via`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `annuncio_ibfk_3` FOREIGN KEY (`comune`) REFERENCES `indirizzo` (`comune`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `annuncio_ibfk_4` FOREIGN KEY (`provincia`) REFERENCES `indirizzo` (`provincia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `annuncio_ibfk_5` FOREIGN KEY (`regione`) REFERENCES `indirizzo` (`regione`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `annuncio_ibfk_6` FOREIGN KEY (`acquirente`) REFERENCES `utente` (`codice_fiscale`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `osserva`
--
ALTER TABLE `osserva`
  ADD CONSTRAINT `osserva_ibfk_1` FOREIGN KEY (`prodotto`) REFERENCES `annuncio` (`codice`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `osserva_ibfk_2` FOREIGN KEY (`utente`) REFERENCES `utente` (`codice_fiscale`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `possiede`
--
ALTER TABLE `possiede`
  ADD CONSTRAINT `possiede_ibfk_1` FOREIGN KEY (`prodotto`) REFERENCES `annuncio` (`codice`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `possiede_ibfk_2` FOREIGN KEY (`regione`) REFERENCES `luogo_ristretta` (`regione`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `possiede_ibfk_3` FOREIGN KEY (`provincia`) REFERENCES `luogo_ristretta` (`provincia`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `stato`
--
ALTER TABLE `stato`
  ADD CONSTRAINT `stato_ibfk_1` FOREIGN KEY (`prodotto`) REFERENCES `annuncio` (`codice`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `valutazione`
--
ALTER TABLE `valutazione`
  ADD CONSTRAINT `valutazione_ibfk_1` FOREIGN KEY (`codice_fiscale_valuta`) REFERENCES `utente` (`codice_fiscale`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `valutazione_ibfk_2` FOREIGN KEY (`codice_fiscale_valutato`) REFERENCES `utente` (`codice_fiscale`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `vive`
--
ALTER TABLE `vive`
  ADD CONSTRAINT `vive_ibfk_1` FOREIGN KEY (`codice_fiscale`) REFERENCES `utente` (`codice_fiscale`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vive_ibfk_2` FOREIGN KEY (`via`) REFERENCES `indirizzo` (`via`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vive_ibfk_3` FOREIGN KEY (`comune`) REFERENCES `indirizzo` (`comune`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vive_ibfk_4` FOREIGN KEY (`provincia`) REFERENCES `indirizzo` (`provincia`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `vive_ibfk_5` FOREIGN KEY (`regione`) REFERENCES `indirizzo` (`regione`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
