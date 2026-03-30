-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 19 déc. 2023 à 20:00
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `prix_ht` double(8,2) NOT NULL,
  `tva` double(8,2) NOT NULL,
  `stock` double(8,2) NOT NULL,
  `famille_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `designation`, `prix_ht`, `tva`, `stock`, `famille_id`) VALUES
(1, 'stylo', 10.00, 20.00, 200.00, 1),
(4, 'banane', 10.00, 20.00, 50.00, 3),
(28, 'Carotte', 5.00, 20.00, 100.00, 2),
(29, 'Radis', 8.00, 20.00, 90.00, 2),
(30, 'Tomate', 10.00, 20.00, 230.00, 2),
(31, ' Pomme de terre', 7.00, 20.00, 170.00, 2),
(32, 'oignons', 6.00, 20.00, 156.00, 2),
(33, 'Pomme', 6.00, 20.00, 98.00, 3),
(34, 'Poire', 15.00, 20.00, 90.00, 3),
(35, 'Orange', 9.00, 20.00, 270.00, 3),
(36, 'Kiwi ', 25.00, 20.00, 100.00, 3),
(37, 'Sardine ', 20.00, 20.00, 78.00, 4),
(38, 'crevette ', 30.00, 20.00, 98.00, 4),
(39, 'Calamar ', 65.00, 20.00, 69.00, 4),
(40, 'Huile lesieur ', 120.00, 20.00, 389.00, 5),
(41, 'Huile de colza', 90.00, 20.00, 150.00, 5),
(42, 'Huile de tournesol', 100.00, 20.00, 220.00, 5),
(43, 'Réfrigérateur ', 1590.00, 20.00, 200.00, 6),
(44, 'Mixeur', 700.00, 20.00, 139.00, 6),
(45, 'Climatiseur ', 3799.00, 20.00, 90.00, 6),
(46, 'régle', 3.00, 20.00, 200.00, 1),
(47, 'cahier', 10.00, 20.00, 289.00, 1);

-- --------------------------------------------------------

--
-- Structure de la table `bonlivraison`
--

CREATE TABLE `bonlivraison` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reglé` tinyint(1) NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `caissier_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bonlivraison`
--

INSERT INTO `bonlivraison` (`id`, `date`, `reglé`, `client_id`, `caissier_id`) VALUES
(7, '2022-01-03', 1, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `caissier`
--

CREATE TABLE `caissier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `poste` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `caissier`
--

INSERT INTO `caissier` (`id`, `nom`, `prenom`, `poste`, `admin`, `PASSWORD`) VALUES
(1, 'alami', 'zakariya', 'Caissier', 1, 'alami123'),
(6, 'jamali', 'youssra', 'caissier', 0, 'jamali123');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `adresse`, `ville`) VALUES
(1, 'benani', 'Amale', '123 rue 1', 'Fes'),
(2, 'ibrahimi', 'Ahmed', '456 Rue2', 'agadir'),
(3, 'tazi', 'khadija', '789 Rue3', 'tanger');

-- --------------------------------------------------------

--
-- Structure de la table `detail_bl`
--

CREATE TABLE `detail_bl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `bl_id` bigint(20) UNSIGNED NOT NULL,
  `qte` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `famille`
--

CREATE TABLE `famille` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `famille_cl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `famille`
--

INSERT INTO `famille` (`id`, `famille_cl`) VALUES
(1, 'unité école'),
(2, 'légumes'),
(3, 'fruits'),
(4, 'poisson'),
(5, 'huiles'),
(6, 'électroménager');

-- --------------------------------------------------------

--
-- Structure de la table `mode_reglement`
--

CREATE TABLE `mode_reglement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `mode_reglement`
--

INSERT INTO `mode_reglement` (`id`, `mode`) VALUES
(3, 'cheque'),
(7, 'carte');

-- --------------------------------------------------------

--
-- Structure de la table `reglement`
--

CREATE TABLE `reglement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `montant` double(8,2) NOT NULL,
  `bl_id` bigint(20) UNSIGNED NOT NULL,
  `mode_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_famille_id_foreign` (`famille_id`);

--
-- Index pour la table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonlivraison_client_id_foreign` (`client_id`),
  ADD KEY `bonlivraison_caissier_id_foreign` (`caissier_id`);

--
-- Index pour la table `caissier`
--
ALTER TABLE `caissier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `detail_bl`
--
ALTER TABLE `detail_bl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_bl_article_id_foreign` (`article_id`),
  ADD KEY `detail_bl_bl_id_foreign` (`bl_id`);

--
-- Index pour la table `famille`
--
ALTER TABLE `famille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mode_reglement`
--
ALTER TABLE `mode_reglement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reglement_mode_id_foreign` (`mode_id`),
  ADD KEY `reglement_bl_id_foreign` (`bl_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `caissier`
--
ALTER TABLE `caissier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `detail_bl`
--
ALTER TABLE `detail_bl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `famille`
--
ALTER TABLE `famille`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mode_reglement`
--
ALTER TABLE `mode_reglement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reglement`
--
ALTER TABLE `reglement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_famille_id_foreign` FOREIGN KEY (`famille_id`) REFERENCES `famille` (`id`);

--
-- Contraintes pour la table `bonlivraison`
--
ALTER TABLE `bonlivraison`
  ADD CONSTRAINT `bonlivraison_caissier_id_foreign` FOREIGN KEY (`caissier_id`) REFERENCES `caissier` (`id`),
  ADD CONSTRAINT `bonlivraison_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `detail_bl`
--
ALTER TABLE `detail_bl`
  ADD CONSTRAINT `detail_bl_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `detail_bl_bl_id_foreign` FOREIGN KEY (`bl_id`) REFERENCES `bonlivraison` (`id`);

--
-- Contraintes pour la table `reglement`
--
ALTER TABLE `reglement`
  ADD CONSTRAINT `reglement_bl_id_foreign` FOREIGN KEY (`bl_id`) REFERENCES `bonlivraison` (`id`),
  ADD CONSTRAINT `reglement_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `mode_reglement` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
