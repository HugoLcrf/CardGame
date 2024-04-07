-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 23 fév. 2024 à 16:27
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SSBB`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` int(11) NOT NULL,
  `player_number` int(2) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `img` varchar(250) NOT NULL,
  `atk` int(11) NOT NULL,
  `pv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `player_number`, `nom`, `img`, `atk`, `pv`) VALUES
(1, 0, 'MARIO', 'Mario_-_Super_Smash_Bros._Brawl.png', 10, 200),
(2, 0, 'DONKEY KONG', 'Donkey_Kong_-_Super_Smash_Bros._Brawl.png', 10, 100),
(3, 0, 'LINK', 'Link_-_Super_Smash_Bros._Brawl.png', 10, 100),
(4, 0, 'SAMUS', 'Samus_-_Super_Smash_Bros._Brawl.png', 10, 100),
(5, 0, 'KIRBY', 'Kirby_-_Super_Smash_Bros._Brawl.png', 10, 70),
(6, 0, 'FOX', 'Fox_-_Super_Smash_Bros._Brawl.png', 10, 100),
(7, 0, 'PIKACHU', 'Pikachu_-_Super_Smash_Bros._Brawl.png', 10, 100),
(8, 0, 'MARTH', 'Marth_-_Super_Smash_Bros._Brawl.png', 10, 100),
(9, 0, 'MR.GAME&WATCH', 'Mr._Game_ 26_Watch_-_Super_Smash_Bros._Brawl.png', 10, 100),
(10, 0, 'LUIGI', 'Luigi_-_Super_Smash_Bros._Brawl.png', 10, 100),
(11, 0, 'DIDDY KONG', 'Diddy_Kong_-_Super_Smash_Bros._Brawl.png', 10, 100),
(12, 0, 'ZELDA', 'Zelda_-_Super_Smash_Bros._Brawl.png', 10, 100),
(13, 0, 'PIT', 'Pit_-_Super_Smash_Bros._Brawl.png', 10, 100),
(14, 0, 'META KNIGHT', 'Meta_Knight_-_Super_Smash_Bros._Brawl.png', 10, 100),
(15, 0, 'FALCO', 'Falco_-_Super_Smash_Bros._Brawl.png', 10, 100),
(16, 0, 'POKEMON TRAINER', 'Pokemon_Trainer_-_Super_Smash_Bros._Brawl.png', 10, 100),
(17, 0, 'IKE', 'Ike_-_Super_Smash_Bros._Brawl.png', 10, 100),
(18, 0, 'SNAKE', 'Snake_-_Super_Smash_Bros._Brawl.png', 10, 100),
(19, 0, 'PEACH', 'Peach_-_Super_Smash_Bros._Brawl.png', 10, 200),
(20, 0, 'YOSHI', 'Yoshi_-_Super_Smash_Bros._Brawl.png', 10, 100),
(21, 0, 'GANONDORF', 'Ganondorf_-_Super_Smash_Bros._Brawl.png', 10, 100),
(22, 0, 'ICE CLIMBERS', 'Ice_Climbers_-_Super_Smash_Bros._Brawl.png', 10, 100),
(23, 0, 'KING DEDEDE', 'King_Dedede_-_Super_Smash_Bros._Brawl.png', 10, 100),
(24, 0, 'WOLF', 'Wolf_-_Super_Smash_Bros._Brawl.png', 10, 90),
(25, 0, 'LUCARIO', 'Lucario_-_Super_Smash_Bros._Brawl.png', 10, 100),
(26, 0, 'NESS', 'Ness_-_Super_Smash_Bros._Brawl.png', 10, 100),
(27, 0, 'SONIC', 'Sonic_-_Super_Smash_Bros._Brawl.png', 10, 100),
(28, 0, 'BOWSER', 'Bowser_-_Super_Smash_Bros._Brawl.png', 10, 100),
(29, 0, 'WARIO', 'Wario_-_Super_Smash_Bros._Brawl.png', 10, 100),
(30, 0, 'TOON LINK', 'Toon_Link_-_Super_Smash_Bros._Brawl.png', 10, 80),
(31, 2, 'R.O.B', 'R.O.B._-_Super_Smash_Bros._Brawl.png', 10, 100),
(32, 1, 'OLIMAR', 'Olimar_-_Super_Smash_Bros._Brawl.png', 10, 100),
(33, 0, 'CAPTAIN FALCON', 'Captain_Falcon_-_Super_Smash_Bros._Brawl.png', 10, 100),
(34, 0, 'JIGGLYPUFF', 'Jigglypuff_-_Super_Smash_Bros._Brawl.png', 10, 100),
(35, 0, 'LUCAS', 'Lucas_-_Super_Smash_Bros._Brawl.png', 10, 100);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
