# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.5-10.1.16-MariaDB)
# Base de données: tub
# Temps de génération: 2016-11-30 15:58:55 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table hours
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hours`;

CREATE TABLE `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_stop` int(11) DEFAULT NULL,
  `id_line` int(11) DEFAULT NULL,
  `going` tinyint(1) DEFAULT NULL,
  `hour` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stop_idx` (`id_stop`),
  KEY `fk_line_idx` (`id_line`),
  CONSTRAINT `fk_line` FOREIGN KEY (`id_line`) REFERENCES `lines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_stop` FOREIGN KEY (`id_stop`) REFERENCES `stops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;

INSERT INTO `hours` (`id`, `id_stop`, `id_line`, `going`, `hour`)
VALUES
	(1,1,21,1,'8:14'),
	(2,1,21,1,'10:33'),
	(3,1,21,1,'11:33'),
	(4,1,21,1,'12:33'),
	(5,1,21,1,'13:33'),
	(6,1,21,1,'14:18'),
	(7,1,21,1,'15:33'),
	(8,2,21,1,'8:14'),
	(9,2,21,1,'10:33'),
	(10,2,21,1,'11:33'),
	(11,2,21,1,'12:33'),
	(12,2,21,1,'13:33'),
	(13,2,21,1,'14:18'),
	(14,2,21,1,'15:33'),
	(15,3,21,1,'8:16'),
	(16,3,21,1,'10:35'),
	(17,3,21,1,'11:35'),
	(18,3,21,1,'12:35'),
	(19,3,21,1,'13:35'),
	(20,3,21,1,'14:20'),
	(21,3,21,1,'15:35'),
	(22,4,21,1,'8:17'),
	(23,4,21,1,'10:36'),
	(24,4,21,1,'11:36'),
	(25,4,21,1,'12:36'),
	(26,4,21,1,'13:36'),
	(27,4,21,1,'14:21'),
	(28,4,21,1,'15:36'),
	(29,5,21,1,'8:18'),
	(30,5,21,1,'10:37'),
	(31,5,21,1,'11:37'),
	(32,5,21,1,'12:37'),
	(33,5,21,1,'13:37'),
	(34,5,21,1,'14:22'),
	(35,5,21,1,'15:37'),
	(36,6,21,1,'8:19'),
	(37,6,21,1,'10:38'),
	(38,6,21,1,'11:38'),
	(39,6,21,1,'12:38'),
	(40,6,21,1,'13:38'),
	(41,6,21,1,'14:23'),
	(42,6,21,1,'15:38'),
	(43,7,21,1,'8:20'),
	(44,7,21,1,'10:39'),
	(45,7,21,1,'11:39'),
	(46,7,21,1,'12:39'),
	(47,7,21,1,'13:39'),
	(48,7,21,1,'14:24'),
	(49,7,21,1,'15:39'),
	(50,8,21,1,'8:21'),
	(51,8,21,1,'10:40'),
	(52,8,21,1,'11:40'),
	(53,8,21,1,'12:40'),
	(54,8,21,1,'13:40'),
	(55,8,21,1,'14:25'),
	(56,8,21,1,'15:40'),
	(57,8,21,0,'11:15'),
	(58,8,21,0,'12:15'),
	(59,8,21,0,'13:15'),
	(60,8,21,0,'13:48'),
	(61,8,21,0,'15:15'),
	(62,8,21,0,'17:03'),
	(63,7,21,0,'11:17'),
	(64,7,21,0,'12:17'),
	(65,7,21,0,'13:17'),
	(66,7,21,0,'13:50'),
	(67,7,21,0,'15:17'),
	(68,7,21,0,'17:05'),
	(69,6,21,0,'11:20'),
	(70,6,21,0,'12:20'),
	(71,6,21,0,'13:20'),
	(72,6,21,0,'13:53'),
	(73,6,21,0,'15:20'),
	(74,6,21,0,'17:08'),
	(75,5,21,0,'11:22'),
	(76,5,21,0,'12:22'),
	(77,5,21,0,'13:22'),
	(78,5,21,0,'13:55'),
	(79,5,21,0,'15:22'),
	(80,5,21,0,'17:10'),
	(81,4,21,0,'11:23'),
	(82,4,21,0,'12:23'),
	(83,4,21,0,'13:23'),
	(84,4,21,0,'13:56'),
	(85,4,21,0,'15:23'),
	(86,4,21,0,'17:11'),
	(87,3,21,0,'11:25'),
	(88,3,21,0,'12:25'),
	(89,3,21,0,'13:25'),
	(90,3,21,0,'13:58'),
	(91,3,21,0,'15:25'),
	(92,3,21,0,'17:13'),
	(93,2,21,0,'11:27'),
	(94,2,21,0,'13:27'),
	(95,2,21,0,'12:27'),
	(96,2,21,0,'14:00'),
	(97,2,21,0,'15:27'),
	(98,2,21,0,'17:15');

/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table lines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lines`;

CREATE TABLE `lines` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lines` WRITE;
/*!40000 ALTER TABLE `lines` DISABLE KEYS */;

INSERT INTO `lines` (`id`, `name`)
VALUES
	(21,'Ligne 21');

/*!40000 ALTER TABLE `lines` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table stops
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stops`;

CREATE TABLE `stops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `stops` WRITE;
/*!40000 ALTER TABLE `stops` DISABLE KEYS */;

INSERT INTO `stops` (`id`, `name`, `description`, `latitude`, `longitude`)
VALUES
	(1,'Peloux Gare',NULL,NULL,NULL),
	(2,'Peloux',NULL,NULL,NULL),
	(3,'Ferry',NULL,NULL,NULL),
	(4,'Crouy',NULL,NULL,NULL),
	(5,'ValÃ©ry',NULL,NULL,NULL),
	(6,'Arbelles',NULL,NULL,NULL),
	(7,'Providence',NULL,NULL,NULL),
	(8,'Sources',NULL,NULL,NULL);

/*!40000 ALTER TABLE `stops` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `login`, `password`)
VALUES
	(23,'test','test','test','test');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
