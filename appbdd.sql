-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 mai 2019 à 09:26
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
  PRIMARY KEY (`idResidence`),
  KEY `adresseMail` (`adresseMail`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`idResidence`, `nomResidence`, `adresse`, `adresseMail`) VALUES
(1, 'ISEP', '28 rue notre dame des champs \r\n75000 PARIS', 'nchobadsvdsvn@yahoo.fr'),
(2, 'Maison Courbevoie', '9 rue moliere', 'nchobadsvdsvn@yahoo.fr'),
(3, 'mon appartement', '6 rue Jean Maridor 75015\r\nParis CEDEX ', 'theo.esquerre@isep.fr'),
(35, 'maison de vacance', '5 rue malard 86000 Poitier', 'nchobadsvdsvn@yahoo.fr');

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
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`messageNB`, `adresseMail`, `numTicket`, `texte`) VALUES
(83, 'valentinnajean@isep.fr', 13, 'hey'),
(84, 'valentinnajean@isep.fr', 14, 'ss'),
(85, 'nchoban@yahoo.fr', 15, 'nike ta mere vendeur de tapi');

-- --------------------------------------------------------

--
-- Structure de la table `multiprise`
--

DROP TABLE IF EXISTS `multiprise`;
CREATE TABLE IF NOT EXISTS `multiprise` (
  `idMultiprise` int(11) NOT NULL COMMENT 'numéro de série',
  `nomMultiprise` varchar(255) NOT NULL,
  `capteurLuminosite` tinyint(1) NOT NULL,
  `capteurTemperature` int(11) NOT NULL,
  `alertNotification` tinyint(1) NOT NULL,
  `switchedOnAt` time NOT NULL,
  `plug1State` tinyint(1) NOT NULL,
  `plug2State` tinyint(1) NOT NULL,
  `plug3State` tinyint(1) NOT NULL,
  `idPiece` int(11) NOT NULL,
  PRIMARY KEY (`idMultiprise`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `multiprise`
--

INSERT INTO `multiprise` (`idMultiprise`, `nomMultiprise`, `capteurLuminosite`, `capteurTemperature`, `alertNotification`, `switchedOnAt`, `plug1State`, `plug2State`, `plug3State`, `idPiece`) VALUES
(31071997, 'box et ordinateur', 0, 23, 0, '04:00:00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

DROP TABLE IF EXISTS `piece`;
CREATE TABLE IF NOT EXISTS `piece` (
  `idPiece` int(11) NOT NULL AUTO_INCREMENT,
  `nomPiece` varchar(255) NOT NULL,
  `idResidence` varchar(255) NOT NULL,
  PRIMARY KEY (`idPiece`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`idPiece`, `nomPiece`, `idResidence`) VALUES
(1, 'chambre de Mykola', '2'),
(2, 'chambre de Adam', '2'),
(3, 'L416', '1'),
(23, 'L313', '1'),
(24, '86000', '35'),
(25, 'chambre d\'amis', '35');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`numTicket`, `mailUser`, `mailAdmin`) VALUES
(13, 'valentinnajean@isep.fr', 'admin@admin.com'),
(14, 'valentinnajean@isep.fr', 'admin@admin.com'),
(15, 'nchoban@yahoo.fr', 'admin@admin.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`adresseMail`, `nom`, `prenom`, `motDePasse`, `dateDeNaissance`, `role`) VALUES
('najVal@gmail.com', 'Najean', 'Valentin', '$2y$10$2mTRQUt8kTWLAVoo/DGzYum6xvxFAkXTKJXQUbmsCBvAmI4/GbOB6', '2001-04-03', 'client'),
('nchobadsvdsvn@yahoo.fr', 'Choban', 'Mykola', '$2y$10$VzKuayGq5VFyZ7IE/19BIOmMeGzJltK7ySfqyOF1Ann5hpbMxza72', '1997-07-31', 'administrateur'),
('theo.esquerre@isep.fr', 'Esquerre', 'Theo', '$2y$10$pWsYh6xP.qVfZaujNCda2eAaJxIif8UkmYWWDzk3xrAWwZKRm7V1u', '1998-04-04', 'client');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `maison`
--
ALTER TABLE `maison`
  ADD CONSTRAINT `mailRestrict` FOREIGN KEY (`adresseMail`) REFERENCES `utilisateur` (`adresseMail`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
