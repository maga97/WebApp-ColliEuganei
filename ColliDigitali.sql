-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2018 at 09:14 PM
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
  `Descrizione` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Prezzo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Prenotazioni`
--

CREATE TABLE `Prenotazioni` (
  `ID_Prenotazione` int(11) NOT NULL,
  `ID_Attivita` int(11) NOT NULL,
  `ID_Utenti` int(11) NOT NULL,
  `Giorno` date NOT NULL,
  `Posti_Prenotati` int(10) NOT NULL,
  `Pagamento` varchar(20) NOT NULL,
  `Valutazione` enum('Insufficiente','Quasi insufficiente','Sufficiente','Buono','Ottimo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Utenti`
--

CREATE TABLE `Utenti` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Indirizzo` varchar(255) NOT NULL,
  `Civico` int(11) NOT NULL,
  `CAP` int(11) NOT NULL,
  `Tipo` enum('Admin','Utente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Utenti`
--

INSERT INTO `Utenti` (`ID`, `Nome`, `Cognome`, `Email`, `Password`, `Indirizzo`, `Civico`, `CAP`, `Tipo`) VALUES
(1, 'mario', 'c', 'marioconiglio@inwind.it', '$2y$10$LmvbkoRDyLhKK5aatb7BKOys3HVIADc9VEqjQbLztw7ZgzC4LdbVe', 'm', 12, 12, 'Admin');

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
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attivita`
--
ALTER TABLE `Attivita`
  MODIFY `ID_Attivita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Utenti`
--
ALTER TABLE `Utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Prenotazioni`
--
ALTER TABLE `Prenotazioni`
  ADD CONSTRAINT `Prenotazioni_ibfk_1` FOREIGN KEY (`ID_Utenti`) REFERENCES `Utenti` (`ID`),
  ADD CONSTRAINT `Prenotazioni_ibfk_2` FOREIGN KEY (`ID_Attivita`) REFERENCES `Attivita` (`ID_Attivita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
