DROP TABLE IF EXISTS `messgae`;
CREATE TABLE IF NOT EXISTS `messgae` (
  `messageNB` int(8) NOT NULL AUTO_INCREMENT,
  `adresseMail` varchar(255) NOT NULL,
  `numTicket` int(11) DEFAULT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`messageNB`),
  KEY `numTicket` (`numTicket`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `numTicket` int(8) NOT NULL AUTO_INCREMENT,
  `mailUser` varchar(255) NOT NULL,
  `mailAdmin` varchar(255) NOT NULL,
  PRIMARY KEY (`numTicket`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


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
