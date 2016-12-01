-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 01 Décembre 2016 à 20:59
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tub`
--

-- --------------------------------------------------------

--
-- Structure de la table `hours`
--

CREATE TABLE `hours` (
  `id` int(11) NOT NULL,
  `id_stop` int(11) DEFAULT NULL,
  `id_line` int(11) DEFAULT NULL,
  `hour` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `hours`
--

INSERT INTO `hours` (`id`, `id_stop`, `id_line`, `hour`) VALUES
(1, 1, 21, '8:14'),
(2, 1, 21, '10:33'),
(3, 1, 21, '11:33'),
(4, 1, 21, '12:33'),
(5, 1, 21, '13:33'),
(6, 1, 21, '14:18'),
(7, 1, 21, '15:33'),
(8, 2, 21, '8:14'),
(9, 2, 21, '10:33'),
(10, 2, 21, '11:33'),
(11, 2, 21, '12:33'),
(12, 2, 21, '13:33'),
(13, 2, 21, '14:18'),
(14, 2, 21, '15:33'),
(15, 3, 21, '8:16'),
(16, 3, 21, '10:35'),
(17, 3, 21, '11:35'),
(18, 3, 21, '12:35'),
(19, 3, 21, '13:35'),
(20, 3, 21, '14:20'),
(21, 3, 21, '15:35'),
(22, 4, 21, '8:17'),
(23, 4, 21, '10:36'),
(24, 4, 21, '11:36'),
(25, 4, 21, '12:36'),
(26, 4, 21, '13:36'),
(27, 4, 21, '14:21'),
(28, 4, 21, '15:36'),
(29, 5, 21, '8:18'),
(30, 5, 21, '10:37'),
(31, 5, 21, '11:37'),
(32, 5, 21, '12:37'),
(33, 5, 21, '13:37'),
(34, 5, 21, '14:22'),
(35, 5, 21, '15:37'),
(36, 6, 21, '8:19'),
(37, 6, 21, '10:38'),
(38, 6, 21, '11:38'),
(39, 6, 21, '12:38'),
(40, 6, 21, '13:38'),
(41, 6, 21, '14:23'),
(42, 6, 21, '15:38'),
(43, 7, 21, '8:20'),
(44, 7, 21, '10:39'),
(45, 7, 21, '11:39'),
(46, 7, 21, '12:39'),
(47, 7, 21, '13:39'),
(48, 7, 21, '14:24'),
(49, 7, 21, '15:39'),
(50, 8, 21, '8:21'),
(51, 8, 21, '10:40'),
(52, 8, 21, '11:40'),
(53, 8, 21, '12:40'),
(54, 8, 21, '13:40'),
(55, 8, 21, '14:25'),
(56, 8, 21, '15:40'),
(57, 8, 22, '11:15'),
(58, 8, 22, '12:15'),
(59, 8, 22, '13:15'),
(60, 8, 22, '13:48'),
(61, 8, 22, '15:15'),
(62, 8, 22, '17:03'),
(63, 7, 22, '11:17'),
(64, 7, 22, '12:17'),
(65, 7, 22, '13:17'),
(66, 7, 22, '13:50'),
(67, 7, 22, '15:17'),
(68, 7, 22, '17:05'),
(69, 6, 22, '11:20'),
(70, 6, 22, '12:20'),
(71, 6, 22, '13:20'),
(72, 6, 22, '13:53'),
(73, 6, 22, '15:20'),
(74, 6, 22, '17:08'),
(75, 5, 22, '11:22'),
(76, 5, 22, '12:22'),
(77, 5, 22, '13:22'),
(78, 5, 22, '13:55'),
(79, 5, 22, '15:22'),
(80, 5, 22, '17:10'),
(81, 4, 22, '11:23'),
(82, 4, 22, '12:23'),
(83, 4, 22, '13:23'),
(84, 4, 22, '13:56'),
(85, 4, 22, '15:23'),
(86, 4, 22, '17:11'),
(87, 3, 22, '11:25'),
(88, 3, 22, '12:25'),
(89, 3, 22, '13:25'),
(90, 3, 22, '13:58'),
(91, 3, 22, '15:25'),
(92, 3, 22, '17:13'),
(93, 2, 22, '11:27'),
(94, 2, 22, '13:27'),
(95, 2, 22, '12:27'),
(96, 2, 22, '14:00'),
(97, 2, 22, '15:27'),
(98, 2, 22, '17:15');

-- --------------------------------------------------------

--
-- Structure de la table `lines`
--

CREATE TABLE `lines` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lines`
--

INSERT INTO `lines` (`id`, `name`) VALUES
(21, 'Ligne 21'),
(22, 'ligne 21');

-- --------------------------------------------------------

--
-- Structure de la table `stops`
--

CREATE TABLE `stops` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stops`
--

INSERT INTO `stops` (`id`, `name`, `description`, `latitude`, `longitude`) VALUES
(1, 'Peloux Gare', NULL, NULL, NULL),
(2, 'Peloux', NULL, NULL, NULL),
(3, 'Ferry', NULL, NULL, NULL),
(4, 'Crouy', NULL, NULL, NULL),
(5, 'Valery', NULL, NULL, NULL),
(6, 'Arbelles', NULL, NULL, NULL),
(7, 'Providence', NULL, NULL, NULL),
(8, 'Sources', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `login`, `password`) VALUES
(23, 'test', 'test', 'test', 'test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `hours`
--
ALTER TABLE `hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stop_idx` (`id_stop`),
  ADD KEY `fk_line_idx` (`id_line`);

--
-- Index pour la table `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `hours`
--
ALTER TABLE `hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT pour la table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `hours`
--
ALTER TABLE `hours`
  ADD CONSTRAINT `fk_line` FOREIGN KEY (`id_line`) REFERENCES `lines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stop` FOREIGN KEY (`id_stop`) REFERENCES `stops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
