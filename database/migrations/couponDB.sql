-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 15, 2023 alle 09:40
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coupon`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `azienda`
--

CREATE TABLE `azienda` (
  `Id_Azienda` int(11) NOT NULL,
  `NomeAzienda` varchar(30) NOT NULL,
  `Logo` blob NOT NULL,
  `Sede` varchar(30) NOT NULL,
  `Descrizione` text NOT NULL,
  `Categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `coupon`
--

CREATE TABLE `coupon` (
  `UsernameUtente` varchar(30) NOT NULL,
  `Id_Offerta` int(11) NOT NULL,
  `Id_Coupon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `faq`
--

CREATE TABLE `faq` (
  `Id_Domanda` int(11) NOT NULL,
  `Domanda` text NOT NULL,
  `Risposta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `gestoriaziende`
--

CREATE TABLE `gestoriaziende` (
  `UsernameUtente` varchar(30) NOT NULL,
  `Id_Azienda` int(11) NOT NULL,
   `id` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `offerta`
--

CREATE TABLE `offerta` (
  `Id_Offerta` int(11) NOT NULL,
  `Id_Azienda` int(11) NOT NULL,
  `Luogo` varchar(30) NOT NULL,
  `Descrizione` text NOT NULL,
  `Validità` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(30) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `Livello` enum('1','2','3') NOT NULL DEFAULT '1',
  `Telefono` varchar(10) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Età` tinyint(3) UNSIGNED NOT NULL,
  `Genere` enum('Maschio','Femmina') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `azienda`
--
ALTER TABLE `azienda`
  ADD PRIMARY KEY (`Id_Azienda`);

--
-- Indici per le tabelle `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`Id_Coupon`),
  ADD UNIQUE KEY `UsernameUtente` (`UsernameUtente`,`Id_Offerta`),
  ADD KEY `ref_Id_Offerta` (`Id_Offerta`);

--
-- Indici per le tabelle `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`Id_Domanda`);

--
-- Indici per le tabelle `gestoriaziende`
--
ALTER TABLE `gestoriaziende`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_username` (`UsernameUtente`),
  ADD KEY `ref_Id_Azienda` (`Id_Azienda`);

--
-- Indici per le tabelle `offerta`
--
ALTER TABLE `offerta`
  ADD PRIMARY KEY (`Id_Offerta`),
  ADD KEY `ref_Id_azienda_offerta` (`Id_Azienda`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `azienda`
--
ALTER TABLE `azienda`
  MODIFY `Id_Azienda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `faq`
--
ALTER TABLE `faq`
  MODIFY `Id_Domanda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `offerta`
--
ALTER TABLE `offerta`
  MODIFY `Id_Offerta` int(11) NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT per la tabella `gestoriaziende`
--
ALTER TABLE `gestoriaziende`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `red_OffertaCoupon` FOREIGN KEY (`Id_Offerta`) REFERENCES `offerta` (`Id_Offerta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `red_UsernameCoupon` FOREIGN KEY (`UsernameUtente`) REFERENCES `utente` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `gestoriaziende`
--
ALTER TABLE `gestoriaziende`
  ADD CONSTRAINT `ref_AziendaGestione` FOREIGN KEY (`Id_Azienda`) REFERENCES `azienda` (`Id_Azienda`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ref_UtenteGestione` FOREIGN KEY (`UsernameUtente`) REFERENCES `utente` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `offerta`
--
ALTER TABLE `offerta`
  ADD CONSTRAINT `ref_OffertaAzienda` FOREIGN KEY (`Id_Azienda`) REFERENCES `azienda` (`Id_Azienda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
