-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 23 nov. 2020 à 16:08
-- Version du serveur :  5.7.30
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `prenom`, `nom`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'Jfive', 'five', 'Jackson', 'okok'),
(3, 'Tonym', 'Montana', 'Tony', '1O2PZK9SK4FJ'),
(4, 'JeanP', 'Paté', 'Jean', 'E230IEJ0X8J'),
(5, 'MichelJ', 'Michel', 'Jean', '09K1093K1J'),
(6, 'Jenaimare', 'Jean', 'aimarre', 'fouloulou'),
(7, 'LeaP', 'Lea', 'Ponzi', '29DK02D4UF'),
(8, 'Jmoinard', 'Jean', 'Moinard', '2309KDK4'),
(9, 'CyrilB', 'Cyril', 'Baye', '3EKO39C'),
(10, 'NunoB', 'Nuno', 'Barbosa', 'SOI3DNUFH4'),
(11, 'Jlasalle', 'Jean', 'Lasalle', 'sosomaness'),
(12, 'i', 'i', 'i', 'i'),
(13, 'rub', 'rub', 'rub', 'rub'),
(14, 'pat', 'pat', 'pat', 'pat'),
(15, 'tes', 'tes', 'tes', 'tes'),
(16, 'o', 'o', 'o', 'o'),
(17, 'a', 'a', 'a', 'a'),
(18, 'b', 'b', 'b', 'b'),
(19, 'c', 'c', 'c', 'c'),
(20, 'u', 'u', 'u', 'u'),
(21, 'po', 'po', 'po', 'po');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
