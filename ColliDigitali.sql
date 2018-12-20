-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2018 at 11:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ColliDigitali`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attivita`
--

CREATE TABLE `Attivita` (
  `ID_Attivita` int(11) NOT NULL,
  `Descrizione` varchar(512) COLLATE latin1_bin NOT NULL,
  `Nome` varchar(40) COLLATE latin1_bin NOT NULL,
  `Prezzo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Prenotazioni`
--

CREATE TABLE `Prenotazioni` (
  `ID_Prenotazione` int(11) NOT NULL,
  `ID_Attivita` int(11) NOT NULL,
  `ID_Utenti` int(11) NOT NULL,
  `Giorno` date NOT NULL,
  `Pagamento` varchar(28) COLLATE latin1_bin NOT NULL,
  `Valutazione` varchar(512) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Table structure for table `Utenti`
--

CREATE TABLE `Utenti` (
  `ID_Utente` int(11) NOT NULL,
  `Nome` varchar(28) COLLATE latin1_bin NOT NULL,
  `Cognome` varchar(28) COLLATE latin1_bin NOT NULL,
  `Email` varchar(28) COLLATE latin1_bin NOT NULL,
  `Password` varchar(256) COLLATE latin1_bin NOT NULL,
  `Indirizzo` varchar(28) COLLATE latin1_bin NOT NULL,
  `Civico` int(11) NOT NULL,
  `CAP` int(11) NOT NULL,
  `Tipo` enum('utente','amministratore') COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Dumping data for table `Utenti`
--

INSERT INTO `Utenti` (`ID_Utente`, `Nome`, `Cognome`, `Email`, `Password`, `Indirizzo`, `Civico`, `CAP`, `Tipo`) VALUES
(1, 'Mario', 'Coniglio', 'ciao@gmail.com', '$2y$10$Zhowx9JH0PEQn/BzHMXJO.GdkV0xlMzIe21/PONIvCZ1/Uz2vg84q', 'ciso', 12, 12, 'utente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attivita`
--
ALTER TABLE `Attivita`
  ADD PRIMARY KEY (`ID_Attivita`);

--
-- Indexes for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD PRIMARY KEY (`ID_Prenotazione`),
  ADD KEY `ID_Attivita` (`ID_Attivita`),
  ADD KEY `ID_Utenti` (`ID_Utenti`);

--
-- Indexes for table `Utenti`
--
ALTER TABLE `Utenti`
  ADD PRIMARY KEY (`ID_Utente`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attivita`
--
ALTER TABLE `Attivita`
  MODIFY `ID_Attivita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  MODIFY `ID_Prenotazione` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `ID_Utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD CONSTRAINT `Prenotazioni_ibfk_1` FOREIGN KEY (`ID_Attivita`) REFERENCES `Attivita` (`ID_Attivita`),
  ADD CONSTRAINT `Prenotazioni_ibfk_2` FOREIGN KEY (`ID_Utenti`) REFERENCES `Utenti` (`ID_Utente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
