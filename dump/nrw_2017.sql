-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 23. Sep 2016 um 14:24
-- Server-Version: 10.1.16-MariaDB
-- PHP-Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `wahlen`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nrw_2017`
--

CREATE TABLE `nrw_2017` (
  `id` int(8) NOT NULL,
  `party` varchar(10) NOT NULL,
  `label` varchar(20) NOT NULL,
  `votes` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `nrw_2017`
--

INSERT INTO `nrw_2017` (`id`, `party`, `label`, `votes`) VALUES
(1, 'linke', 'Die Linke', 50),
(2, 'spd', 'SPD', 27),
(3, 'gruenen', 'Die Grünen', 21),
(4, 'fdp', 'FDP', 10),
(5, 'cdu', 'CDU', 57),
(6, 'afd', 'AfD', 43);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `nrw_2017`
--
ALTER TABLE `nrw_2017`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `nrw_2017`
--
ALTER TABLE `nrw_2017`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
