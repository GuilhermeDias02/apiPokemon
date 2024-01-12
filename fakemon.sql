-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 jan. 2024 à 21:58
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fakemon`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240112184829', '2024-01-12 19:48:46', 327);

-- --------------------------------------------------------

--
-- Structure de la table `pc_box`
--

CREATE TABLE `pc_box` (
  `id` int(11) NOT NULL,
  `id_pokedex_id` int(11) NOT NULL,
  `id_trainer_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `captured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pc_box`
--

INSERT INTO `pc_box` (`id`, `id_pokedex_id`, `id_trainer_id`, `level`, `captured`) VALUES
(1, 1, 1, 10, 1),
(2, 2, 2, 11, 1),
(3, 3, 2, 12, 0);

-- --------------------------------------------------------

--
-- Structure de la table `pokedex`
--

CREATE TABLE `pokedex` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_pokedex` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `sprite_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `pokedex`
--

INSERT INTO `pokedex` (`id`, `type_id`, `region_id`, `name`, `id_pokedex`, `description`, `sprite_path`) VALUES
(1, 11, 1, 'Bulbizarre', 1, 'Bulbizarre passe son temps à faire la sieste sous le soleil. Il y a une graine sur son dos. Il absorbe les rayons du soleil pour faire doucement pousser la graine.', NULL),
(2, 6, 4, 'Ouisticram', 390, 'La flamme de son postérieur brûle grâce à un gaz de son estomac. Elle faiblit quand il ne va pas bien.', NULL),
(3, 4, 9, 'Coiffeton', 912, 'Originaire d\'une contrée lointaine, il est venu s\'installer dans la région il y a longtemps. Ses ailes sécrètent un gel qui repousse l\'eau et les saletés.', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `name`) VALUES
(1, 'Kanto'),
(2, 'Johto'),
(3, 'Hoenn'),
(4, 'Sinnoh'),
(5, 'Unys'),
(6, 'Kalos'),
(7, 'Alola'),
(8, 'Galar'),
(9, 'Paldea');

-- --------------------------------------------------------

--
-- Structure de la table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `trainer`
--

INSERT INTO `trainer` (`id`, `name`) VALUES
(1, 'Red'),
(2, 'Sacha');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Acier'),
(2, 'Combat'),
(3, 'Dragon'),
(4, 'Eau'),
(5, 'Electrique'),
(6, 'Feu'),
(7, 'Fée'),
(8, 'Glace'),
(9, 'Insecte'),
(10, 'Normal'),
(11, 'Plante'),
(12, 'Poison'),
(13, 'Psy'),
(14, 'Roche'),
(15, 'Sol'),
(16, 'Spectre'),
(17, 'Ténèbres'),
(18, 'Vol');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `pc_box`
--
ALTER TABLE `pc_box`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F42F235E826D21` (`id_trainer_id`),
  ADD KEY `kfmnqpfmq;flq` (`id_pokedex_id`) USING BTREE;

--
-- Index pour la table `pokedex`
--
ALTER TABLE `pokedex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6336F6A7C54C8C93` (`type_id`),
  ADD KEY `IDX_6336F6A798260155` (`region_id`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pc_box`
--
ALTER TABLE `pc_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pokedex`
--
ALTER TABLE `pokedex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pc_box`
--
ALTER TABLE `pc_box`
  ADD CONSTRAINT `FK_F42F235E826D21` FOREIGN KEY (`id_trainer_id`) REFERENCES `trainer` (`id`);

--
-- Contraintes pour la table `pokedex`
--
ALTER TABLE `pokedex`
  ADD CONSTRAINT `FK_6336F6A798260155` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `FK_6336F6A7C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
