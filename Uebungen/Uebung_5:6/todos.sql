-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 21. Okt 2013 um 23:29
-- Server Version: 5.5.32
-- PHP-Version: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `hw`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Status` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT 'Open',
  `Priority` varchar(80) COLLATE utf8_bin NOT NULL,
  `Date` varchar(80) COLLATE utf8_bin NOT NULL,
  `Task` varchar(4000) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `todos`
--

INSERT INTO `todos` (`ID`, `Status`, `Priority`, `Date`, `Task`) VALUES
(1, 'Done', 'Medium', '2010-10-29', 'Das ist ein Task'),
(2, 'Done', 'Medium', '2011-12-30', 'Super Task'),
(3, 'Open', 'Medium', '2010-10-28', 'mmhm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
