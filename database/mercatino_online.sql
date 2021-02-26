-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 10:37 AM
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
  `nome_annuncio` varchar(100) NOT NULL,
  `nome_prodotto` varchar(100) NOT NULL,
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
  `sottocategorie` enum('Aspirapolveri','Caffettiere','Tostapane','Frullattori','Altri elettrodomestici','Macchine fotografiche','Accessori fotografici','Telecamere','Microfoni','Altro da foto e video','Vestiti','Borse','Scarpe','Accessori','Altro da abbigliamento','Giocattoli','Film e DVD','Musica','Libri e Riviste','Altro da hobby') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `annuncio`
--

INSERT INTO `annuncio` (`codice`, `venditore`, `via`, `comune`, `regione`, `provincia`, `nome_annuncio`, `nome_prodotto`, `foto`, `prezzo`, `nuovo`, `tempo_usura`, `stato_usura`, `garanzia`, `copertura_garanzia`, `acquirente`, `visibilita`, `categorie`, `sottocategorie`) VALUES
(1, 'MYGLRA99P60Z131O', 'pitteri 56', 'Milano', 'Lombardia', 'MI', 'vendesi aspirapolvere', 'folletto 3pro', '../images/folletto.jpg', 200, 1, NULL, NULL, 1, 'due anni', 'MRNVNT96R63I577A', 'pubblica', 'Elettrodomestici', 'Aspirapolveri'),
(2, 'MYGLRA99P60Z131O', 'pitteri 56', 'Milano', 'Lombardia', 'MI', 'microonde', 'Samsung', '../images/microonde.jpg', 80, 1, NULL, NULL, 1, '7 anni', 'MRNVNT96R63I577A', 'pubblica', 'Elettrodomestici', 'Aspirapolveri'),
(3, 'MYGLRA99P60Z131O', 'pitteri 56', 'Milano', 'Lombardia', 'MI', 'si vende cellulare usato', 'huawei p20 lite', '../images/huawei.jpg', 120, 0, 'un anno', 'pari a nuovo', NULL, NULL, NULL, 'pubblica', 'Hobby', 'Altro da hobby'),
(4, 'MYGLRA99P60Z131O', 'scarlatti 33', 'Buccinasco', 'Lombardia', 'MI', 'si vende televisione ', 'Sony G14', '../images/tv-sony.jpg', 750, 0, '4 mesi', 'pari a nuovo', NULL, NULL, NULL, 'ristretta', 'Foto e Video', 'Altro da foto e video'),
(5, 'MRRCLS06S13H501K', 'aldo moro 76', 'Bologna', 'Emilia Romagna', 'BO', 'Vendesi DVD dei primi 6 film di Star Wars - originali', 'DVD star wars - cofanetto completo', '../images/dvd-starwars.jpg', 10, 1, NULL, NULL, 0, NULL, NULL, 'pubblica', 'Hobby', 'Film e DVD'),
(6, 'MYGLRA99P60Z131O', 'pitteri 56', 'Milano', 'Lombardia', 'MI', 'Vendesi macchina fotografica vintage', 'Polaroid 580', '../images/polaroid.jpg', 150, 0, '20 anni', 'buono', NULL, NULL, 'MRNVNT96R63I577A', 'pubblica', 'Foto e Video', 'Macchine fotografiche'),
(7, 'tzzzambornilllll', 'via mulino bianco', 'Pavia', 'Lombardia', 'PV', 'Caffettiera di design in super sconto', 'Caffettiera La conica by Alessi', '../images/caffettiera-conica.jpg', 15, 1, '', '', 1, '2 mesi', 'GLNRNI95E57F205P', 'pubblica', 'Elettrodomestici', 'Caffettiere'),
(8, 'tzzzambornilllll', 'via Gonin', 'Roma', 'Lazio', 'RO', 'Vendesi come nuovi vinili di Levante', 'Album Magmamemoria di Levante in vinile', '../images/levante-vinili.jpg', 40, 0, '1 mese', 'pari a nuovo', 0, '', NULL, 'pubblica', 'Hobby', 'Musica'),
(9, 'MRRCLS06S13H501K', 'Via I Maggio 12', 'Bergamo', 'Lombardia', 'BG', 'Bellissima maglietta da uomo - Onda di Hokustai ', 'T-shirt the wave by Hokusai, black', '../images/tshirt-wave.jpg', 20, 1, '', '', 0, '', NULL, 'pubblica', 'Abbigliamento', 'Vestiti'),
(10, 'MRRCLS06S13H501K', 'Via I Maggio 12', 'Bergamo', 'Lombardia', 'BG', 'Vendesi zaino Eastpack praticamente mai usato', 'Zaino Eastpack - Galaxy design', '../images/zaino-eastpack-galaxy.jpg', 30, 0, '3 anni', 'buono', 0, '', NULL, 'pubblica', 'Abbigliamento', 'Borse'),
(11, 'MRRCLS06S13H501K', 'Via I Maggio 12', 'Bergamo', 'Lombardia', 'BG', 'Microfono compatto, essenziale, completo, di alta qualità', 'LIAM&DAAN - Mini Microfono Cardioide', '../images/mini-microfono.jpg', 50, 1, '', '', 1, '2 anni', NULL, 'ristretta', 'Foto e Video', 'Microfoni'),
(12, 'MRRCLS06S13H501K', 'Via I Maggio 12', 'Bergamo', 'Lombardia', 'BG', 'Collana oro ben tenuta ', 'Fine doppia collana oro 750 con fantasia', '../images/gold-blog.jpg', 150, 0, '3 anni', 'usato', 0, '', NULL, 'ristretta', 'Abbigliamento', 'Accessori'),
(13, 'GLNRNI95E57F205P', 'Via Mulino Bianco 13', 'Cusago', 'Lombardia', 'MI', 'LED Studi Anello Luce per Make Up', 'Anello Luce con Treppiede per Make Up con Telecomando Bluetooth', '../images/anello-luce.jpg', 25, 1, '', '', 0, '', 'MYGLRA99P60Z131O', 'ristretta', 'Foto e Video', 'Accessori fotografici'),
(14, 'GLNRNI95E57F205P', 'Via Mulino Bianco 13', 'Cusago', 'Lombardia', 'MI', 'Libro Usato Bellissimo', 'Venuto al mondo - Margaret Mazzantini', '../images/venuto-al-mondo-margaret-mazzantini.png', 8, 0, '3 anni', 'meglio', 0, '', NULL, 'pubblica', 'Hobby', 'Libri e Riviste'),
(15, 'GLNRNI95E57F205P', 'Via Mulino Bianco 13', 'Cusago', 'Lombardia', 'MI', 'Grande classico in ottime condizioni', 'Cime Tempestose - Emily Bronte', '../images/812WFlUxpsL.jpg', 5, 0, '3 anni', 'buono', 0, '', NULL, 'privata', 'Hobby', 'Libri e Riviste'),
(16, 'GLNRNI95E57F205P', 'Via Mulino Bianco 13', 'Cusago', 'Lombardia', 'MI', 'Gonna usata poco ', 'Gonna di velluto taglia M', '../images/gonna.jpeg', 10, 0, '2 anni', 'buono', 0, '', NULL, 'pubblica', 'Abbigliamento', 'Altro da abbigliamento'),
(42, 'GLNRNI95E57F205P', 'Via Mulino Bianco 13', 'Cusago', 'Lombardia', 'MI', '', '', '../images/Not-Available.png', 0, 0, '', '', 0, '', NULL, 'pubblica', 'Foto e Video', 'Macchine fotografiche');

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
('Dfghjk', 'Fghyjuk', 'FG', 'Fghjkl'),
('galileo galilei 3', 'stresa', 'vb', 'piemonte'),
('pitteri 56', 'milano', 'mi', 'lombardia'),
('scarlatti 33', 'buccinasco', 'mi', 'lombardia'),
('Via Camelia 43', 'Monza', 'MI', 'Lombardia'),
('via dante alighieri', 'Palermo', 'PA', 'Sicilia'),
('via Emilia 6', 'Segrate', 'MI', 'Lombardia'),
('via evangelista', 'Corsico', 'MI', 'Lombardia'),
('via evangelista', 'Roma', 'RO', 'Lazio'),
('via forlanini 54', 'Milano', 'MI', 'lombardia'),
('via Gonin', 'Milano', 'M', ''),
('via Gonin', 'Milano', 'MI', 'Lombardia'),
('via Gonin', 'Roma', 'RO', 'Lazio'),
('via gozzoli', 'Palermo', 'PA', 'Sicilia'),
('Via I Maggio 12', 'Bergamo', 'BG', 'Lombardia'),
('via iv', 'Zibido', 'MI', 'Lombardia'),
('via mulino bianco', 'Pavia', 'PV', 'Lombardia'),
('Via Mulino Bianco 13', 'Cusago', 'MI', 'Lombardia'),
('via stradi', 'Corsico', 'MI', 'Lombardia'),
('via stradivari', 'Corsico', 'Lo', 'MI'),
('via stradivari', 'Corsico', 'MI', 'Lombardia'),
('via stradivari', 'Roma', 'RO', 'Lazio'),
('via stradix', 'Corsico', 'MI', 'Lombardia'),
('via trottoli', 'Rho', 'Lo', 'MI');

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
('GLNRNI95E57F205P', 1),
('GLNRNI95E57F205P', 5),
('GLNRNI95E57F205P', 8),
('MRNVNT96R63I577A', 1),
('MRNVNT96R63I577A', 4),
('MRRCLS06S13H501K', 1),
('MRRCLS06S13H501K', 2),
('MRRCLS06S13H501K', 4),
('MRRCLS06S13H501K', 5),
('MYGLRA99P60Z131O', 10),
('pieroooooooooooo', 1),
('pieroooooooooooo', 3),
('tzzzambornilllll', 2),
('tzzzambornilllll', 3),
('tzzzambornilllll', 4);

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
(1, 'in vendita', '2021-02-18 14:47:33'),
(1, 'in vendita', '2021-02-18 14:50:31'),
(1, 'in vendita', '2021-02-18 19:18:43'),
(1, 'in vendita', '2021-02-20 23:21:45'),
(1, 'venduto', '2021-02-20 15:08:36'),
(1, 'venduto', '2021-02-26 08:48:16'),
(1, 'eliminato', '2021-02-17 16:10:43'),
(1, 'eliminato', '2021-02-18 14:50:25'),
(2, 'in vendita', '2021-02-17 12:34:04'),
(2, 'in vendita', '2021-02-17 13:44:43'),
(2, 'in vendita', '2021-02-17 13:45:19'),
(2, 'in vendita', '2021-02-17 16:19:37'),
(2, 'in vendita', '2021-02-18 14:47:44'),
(2, 'in vendita', '2021-02-20 23:21:51'),
(2, 'venduto', '2020-11-19 11:33:30'),
(2, 'venduto', '2021-02-18 14:03:30'),
(2, 'venduto', '2021-02-18 18:44:15'),
(2, 'venduto', '2021-02-21 18:50:39'),
(2, 'eliminato', '2021-02-17 13:43:52'),
(2, 'eliminato', '2021-02-17 16:19:30'),
(3, 'in vendita', '2021-02-17 12:56:32'),
(3, 'in vendita', '2021-02-17 13:43:43'),
(3, 'in vendita', '2021-02-17 16:11:20'),
(3, 'in vendita', '2021-02-17 16:11:31'),
(3, 'in vendita', '2021-02-20 10:41:54'),
(3, 'eliminato', '2020-11-18 17:11:05'),
(3, 'eliminato', '2021-02-17 13:00:42'),
(3, 'eliminato', '2021-02-19 10:06:11'),
(3, 'eliminato', '2021-02-26 00:55:36'),
(4, 'in vendita', '2021-02-17 21:34:02'),
(4, 'eliminato', '2021-02-21 20:03:42'),
(5, 'in vendita', '2021-02-21 12:29:08'),
(5, 'venduto', '2021-02-18 14:54:16'),
(6, 'in vendita', '2021-02-20 11:03:56'),
(6, 'venduto', '2021-02-20 19:36:02'),
(7, 'in vendita', '2021-02-20 12:46:24'),
(7, 'in vendita', '2021-02-21 12:28:12'),
(7, 'venduto', '2021-02-20 17:40:06'),
(7, 'venduto', '2021-02-20 18:06:58'),
(7, 'venduto', '2021-02-25 22:17:01'),
(8, 'in vendita', '2021-02-20 13:05:56'),
(8, 'in vendita', '2021-02-21 12:28:18'),
(8, 'venduto', '2021-02-20 15:10:45'),
(9, 'in vendita', '2021-02-21 13:36:01'),
(10, 'in vendita', '2021-02-21 13:50:54'),
(11, 'in vendita', '2021-02-21 14:12:14'),
(12, 'in vendita', '2021-02-21 14:40:09'),
(13, 'in vendita', '2021-02-25 13:38:08'),
(13, 'in vendita', '2021-02-25 18:17:43'),
(13, 'venduto', '2021-02-25 13:39:02'),
(13, 'venduto', '2021-02-26 00:48:05'),
(13, 'venduto', '2021-02-26 00:48:44'),
(14, 'in vendita', '2021-02-25 18:05:44'),
(15, 'in vendita', '2021-02-25 18:12:02'),
(16, 'in vendita', '2021-02-25 18:17:25'),
(42, 'in vendita', '2021-02-25 22:19:39');

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
  `tipo_utente` enum('acquirente','venditore') NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`codice_fiscale`, `nome`, `cognome`, `email`, `immagine`, `tipo_utente`, `password`) VALUES
('2345678sdfg16262', 'Laura', 'Lamborgini', 'laura@kk.com', '../images/user.png', 'acquirente', '1234'),
('234567sdfg456789', 'Marco', 'Mesiti', 'marco@mesiti.com', '../images/user.png', 'venditore', '1234'),
('eeeeeeeeeeeeeeee', 'valentina', 'ciao', 'ciao@vale.it', '../images/user.png', 'venditore', '1234'),
('GLNRNI95E57F205P', 'Irene', 'Galiano', 'irn.galiano@gmail.com', '../images/irene.jpg', 'venditore', '1234'),
('LSMRNhoskjdfskjd', 'lisa', 'maronese', 'lisa@maronese.com', '../images/Lisa-maronese.jpg', 'acquirente', '1234'),
('MRABND67RR3ACYY9', 'Maria', 'Biondi', 'maria@biondi.com', '../images/DSC_0092.JPG', 'acquirente', '1234'),
('MRNVNT96R63I577A', 'Valentina', 'Maronese', 'valentina@maronese.com', '../images/DSC_0153.JPG', 'venditore', '1234'),
('MRRCLS06S13H501K', 'Callisto', 'Morra', 'callisto@morra.com', '../images/user.png', 'venditore', '4567'),
('MYGLRA99P60Z131O', 'Laura', 'Moya', 'moyalaura2@gmail.com', '../images/Laura-Moya.jpeg', 'venditore', '7890'),
('pieroooooooooooo', 'Piero', 'maronese', 'piero@maronese.com', '../images/user.png', 'acquirente', '1234'),
('STFFRR91TRA352TT', 'Stefano', 'Ferrari', 'ste@ferrari.com', '../images/user.png', 'acquirente', '1234'),
('tzzzambornilllll', 'Tiziano', 'Zamborlin', 'tiziano@zamborlin.com', '../images/user.png', 'venditore', '1234');

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
('MRNVNT96R63I577A', 'MYGLRA99P60Z131O', '1', '3'),
('tzzzambornilllll', 'pieroooooooooooo', '5', '4'),
('pieroooooooooooo', 'tzzzambornilllll', '2', '3'),
('MRNVNT96R63I577A', 'MYGLRA99P60Z131O', '3', '4'),
('MYGLRA99P60Z131O', 'MRNVNT96R63I577A', '3', '5'),
('MYGLRA99P60Z131O', 'GLNRNI95E57F205P', '4', '5'),
('MYGLRA99P60Z131O', 'GLNRNI95E57F205P', '4', '5');

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
('GLNRNI95E57F205P', 'Via Mulino Bianco 13', 'Cusago', 'MI', 'Lombardia'),
('MRNVNT96R63I577A', 'galileo galilei 3', 'stresa', 'vb', 'piemonte'),
('MRNVNT96R63I577A', 'scarlatti 33', 'Buccinasco', 'MI', 'Lombardia'),
('MRNVNT96R63I577A', 'via dante alighieri', 'Palermo', 'PA', 'Sicilia'),
('MRNVNT96R63I577A', 'via stradivari', 'Roma', 'RO', 'Lazio'),
('MRRCLS06S13H501K', 'Via I Maggio 12', 'Bergamo', 'BG', 'Lombardia'),
('MYGLRA99P60Z131O', 'Dfghjk', 'Fghyjuk', 'FG', 'Fghjkl'),
('MYGLRA99P60Z131O', 'Via Camelia 43', 'Monza', 'MI', 'Lombardia'),
('MYGLRA99P60Z131O', 'via Emilia 6', 'Segrate', 'MI', 'Lombardia'),
('MYGLRA99P60Z131O', 'via forlanini 54', 'Milano', 'MI', 'lombardia'),
('MYGLRA99P60Z131O', 'via Gonin', 'Milano', 'MI', 'Lombardia'),
('tzzzambornilllll', 'via Gonin', 'Roma', 'RO', 'Lazio'),
('tzzzambornilllll', 'via mulino bianco', 'Pavia', 'PV', 'Lombardia');

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
  MODIFY `codice` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
