-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 mai 2019 à 08:40
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

DROP TABLE IF EXISTS `maison`;
CREATE TABLE IF NOT EXISTS `maison` (
  `idResidence` int(11) NOT NULL AUTO_INCREMENT,
  `nomResidence` varchar(255) NOT NULL,
  `adresse` text NOT NULL,
  `adresseMail` varchar(255) NOT NULL,
  PRIMARY KEY (`idResidence`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`idResidence`, `nomResidence`, `adresse`, `adresseMail`) VALUES
(1, 'Reda Aichane', 'isep', 'jj'),
(2, 'Reda Aichane', 'isep', 'jj'),
(3, 'kdkdk', 'isep', 'jj'),
(4, 'Reda Aichane', '277 Rue Lecourbe', 'jj'),
(5, 'Reda Aichane', '277 Rue Lecourbe', 'jj'),
(6, 'Reda Aichane', '277 Rue Lecourbe', 'f'),
(7, 'Dounia', '277 Rue Lecourbe', 'f'),
(8, 'Reda Aichane', '277 Rue Lecourbe', 'f');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageNB` int(8) NOT NULL AUTO_INCREMENT,
  `adresseMail` varchar(255) NOT NULL,
  `numTicket` int(11) DEFAULT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`messageNB`),
  KEY `numTicket` (`numTicket`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`messageNB`, `adresseMail`, `numTicket`, `texte`) VALUES
(83, 'valentinnajean@isep.fr', 13, 'hey'),
(84, 'valentinnajean@isep.fr', 14, 'ss');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `numTicket` int(8) NOT NULL AUTO_INCREMENT,
  `mailUser` varchar(255) NOT NULL,
  `mailAdmin` varchar(255) NOT NULL,
  PRIMARY KEY (`numTicket`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`numTicket`, `mailUser`, `mailAdmin`) VALUES
(13, 'valentinnajean@isep.fr', 'admin@admin.com'),
(14, 'valentinnajean@isep.fr', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `adresseMail` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `dateDeNaissance` date NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`adresseMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
