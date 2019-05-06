-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 06 mai 2019 à 09:56
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `maison`
--

INSERT INTO `maison` (`idResidence`, `nomResidence`, `adresse`, `adresseMail`) VALUES
(1, 'ISEP', '28 rue notre dame des champs \r\n75000 PARIS', 'nchoban@yahoo.fr'),
(2, 'Maison Courbevoie', '9 rue moliere', 'nchoban@yahoo.fr'),
(3, 'mon appartement', '6 rue Jean Maridor 75015\r\nParis CEDEX ', 'theo.esquerre@isep.fr'),
(4, 'Choban', '9 rue moliere 92400 courbevoie', 'nchoban@yahoo.fr'),
(5, 'maison de Tim', '9 rue moliere 92400 courbevoie', 'nchoban@yahoo.fr'),
(6, 'maison de tim', 'croix de berny', 'nchoban@yahoo.fr');

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
  `alert` tinyint(1) NOT NULL,
  `totalTempsAllume` time NOT NULL,
  `idPiece` int(11) NOT NULL,
  PRIMARY KEY (`idMultiprise`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `multiprise`
--

INSERT INTO `multiprise` (`idMultiprise`, `nomMultiprise`, `capteurLuminosite`, `capteurTemperature`, `alert`, `totalTempsAllume`, `idPiece`) VALUES
(31071997, 'box et ordinateur', 0, 23, 0, '04:00:00', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`idPiece`, `nomPiece`, `idResidence`) VALUES
(1, 'chambre de Mykola', '2'),
(2, 'chambre de Adam', '2'),
(3, 'L416', '1'),
(4, 'L012', '1'),
(5, 'chambre de tim', '5');

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

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`adresseMail`, `nom`, `prenom`, `motDePasse`, `dateDeNaissance`, `role`) VALUES
('nchoban@yahoo.fr', 'Choban', 'Mykola', '$2y$10$VzKuayGq5VFyZ7IE/19BIOmMeGzJltK7ySfqyOF1Ann5hpbMxza72', '1997-07-31', 'administrateur'),
('theo.esquerre@isep.fr', 'Esquerre', 'Theo', '$2y$10$pWsYh6xP.qVfZaujNCda2eAaJxIif8UkmYWWDzk3xrAWwZKRm7V1u', '1998-04-04', 'client'),
('najVal@gmail.com', 'Najean', 'Valentin', '$2y$10$2mTRQUt8kTWLAVoo/DGzYum6xvxFAkXTKJXQUbmsCBvAmI4/GbOB6', '2001-04-03', 'client');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
