-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 avr. 2019 à 14:32
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `handifablabnyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fab_lab`
--

CREATE TABLE `fab_lab` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_project` int(11) DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienaddress` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fab_lab`
--

INSERT INTO `fab_lab` (`id`, `name`, `address`, `city`, `cp`, `nb_project`, `phonenumber`, `lienaddress`, `email`) VALUES
(1, 'HandiFabLab', '64 avenue de la liberté', 'Villeneuve d\'Ascq', '59650', 5, '0320344869', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d541.7217355032823!2d3.145132810417084!3d50.62812847299126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d62d2161d81b%3A0x1138da90784089e5!2sAPF+I.E.M+Christian+Dabbadie!5e1!3m2!1sfr!2sfr!4v15', 'handifablab@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190415093011', '2019-04-15 09:31:54');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline_at` date NOT NULL,
  `price` double DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(6,2) DEFAULT NULL,
  `width` decimal(10,2) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `height` decimal(10,2) NOT NULL,
  `lientinker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `name`, `start_at`, `created_at`, `description`, `deadline_at`, `price`, `picture`, `weight`, `width`, `length`, `height`, `lientinker`) VALUES
(1, 'Le Kévin - 1.6', '2018-11-08', '2018-11-08', 'Joystick pour myopathie avancé. Empêche que la main ne tombe de la manette.', '2019-04-25', 0, 'https://csg.tinkercad.com/things/2MAjMFJoQuX/t725.png?rev=1555591072772000000&s=cc211aab7ef752e61d35f756fe2d716a&v=1', '10.00', '65.34', '75.00', '41.19', 'https://www.tinkercad.com/embed/2MAjMFJoQuX?'),
(2, 'Porte-bouteille fixable', '2019-01-22', '2019-01-22', 'Porte-bouteille réalisé pour bouteille de 2L ou moins fixable sur différents support. Créé pour tablette de fauteuil électrique. Le système d\'accroche est inspiré des accroches sur les grilles de ventilation utilisées dans les voitures.', '2019-02-12', NULL, 'https://csg.tinkercad.com/things/j2QxGofN6yK/t725.png?rev=1551435484193000000&s=36871e03f785fdffc85649fba8315eda&v=1', NULL, '8.00', '12.00', '7.45', 'https://www.tinkercad.com/embed/j2QxGofN6yK?'),
(3, 'Porte-cartes UNO malvoyants', '2018-06-05', '2018-07-17', 'Porte-carte réalisés pour grandes cartes de UNO. Ce jeu de UNO a été créé pour les personnes malvoyantes ou qui ne parviennent pas a tenir de petites cartes dans la/les mains.', '2019-03-18', NULL, 'https://csg.tinkercad.com/things/cgbmEqn2xMi/t725.png?rev=1542740952728236032&s=eda4c9b7d439c1ea29af3ce8bd21d4b7&v=1', NULL, '13.70', '18.30', '3.00', 'https://www.tinkercad.com/embed/cgbmEqn2xMi?'),
(4, 'Trophée APF France handicap 2.3.0', '2018-06-12', '2018-06-12', NULL, '2018-12-31', NULL, 'https://csg.tinkercad.com/things/2Dg7miiV0A0/t725.png?rev=1529676569274246912&s=116afea81e3557c692e90a5b2200d65c&v=1', '200.00', '4.35', '25.00', '20.00', 'https://www.tinkercad.com/embed/2Dg7miiV0A0?'),
(5, 'Trident Head Of BaoPao', '2019-04-29', '2019-04-27', 'BaoPao trident, têtes avec un inclinaison décalées pour plus d\'options de jeu et d\'ergonomie.', '2019-05-13', NULL, 'https://csg.tinkercad.com/things/hEd9PKyElez/t725.png?rev=1552397118855105100&v=1&s=c4c2ff3f0ba8419bde0f90af152098d4rev=1553625319580071422&v=1&s=f9efd661c02da8dca358bb36f12ed69erev=1553625319580071422&v=1&s=f9efd661c02da8dca358bb36f12ed69e', NULL, '2.75', '6.85', '5.19', 'https://www.tinkercad.com/embed/jP2OaCVOJap?');

-- --------------------------------------------------------

--
-- Structure de la table `project_category`
--

CREATE TABLE `project_category` (
  `project_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` int(11) NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `roles`, `city`, `address`, `cp`, `phonenumber`) VALUES
(11, 'Thomas', 'admin@gmail.com', '$2y$13$mVU/AbjLFKY/9kWji1pNA.htH7.6q1wM97N6yzgQEPjMD.KHLy1iW', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 'Admin', 'Admin', 66666, '6666666666'),
(12, 'Mathieu', 'user@gmail.com', '$2y$13$Ej5eG8DDRIC/S4EzVf1M4u1Ja1KDmRdmZukVzkBnSLyALSV4u09LW', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'user', 'user', 0, '0000000000'),
(14, 'Nicolas', 'pseudoadmin@gmail.com', '$2y$13$olflFtBufiyxiuuvzBGBGedCZCP6WsHjOFTYWi.YA8uaSNfssHmC2', 'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}', 'Villeneuve d\'Ascq', '39 AV DU BOIS', 59650, '783598296'),
(15, 'ThomasLambda', 'thomas.lab@gmail.com', '$2y$13$lblGh4hJimLiWDHKZYfopOIgHYZVH4abWi8/B0f5wo44fdqe.r6CO', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'Ici', 'Ailleurs 59 Rue Osef', 66669, '783598296'),
(16, 'TesteurFou', 'test3@gmail.com', '$2y$13$45gjJ1tWSwKpaQWKH5KZMu9bXgmZvP6dFOCXHf6RGIxhqKWc/tKcS', 'a:1:{i:0;s:9:\"ROLE_USER\";}', 'Lille', '59 avenue du néant', 59620, '796843261');

-- --------------------------------------------------------

--
-- Structure de la table `user_fab_lab`
--

CREATE TABLE `user_fab_lab` (
  `user_id` int(11) NOT NULL,
  `fab_lab_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_project`
--

CREATE TABLE `user_project` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fab_lab`
--
ALTER TABLE `fab_lab`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_14B78418166D1F9C` (`project_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_16DB4F89166D1F9C` (`project_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`project_id`,`category_id`),
  ADD KEY `IDX_3B02921A166D1F9C` (`project_id`),
  ADD KEY `IDX_3B02921A12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_fab_lab`
--
ALTER TABLE `user_fab_lab`
  ADD PRIMARY KEY (`user_id`,`fab_lab_id`),
  ADD KEY `IDX_A4375BA76ED395` (`user_id`),
  ADD KEY `IDX_A4375BE0730548` (`fab_lab_id`);

--
-- Index pour la table `user_project`
--
ALTER TABLE `user_project`
  ADD PRIMARY KEY (`user_id`,`project_id`),
  ADD KEY `IDX_77BECEE4A76ED395` (`user_id`),
  ADD KEY `IDX_77BECEE4166D1F9C` (`project_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fab_lab`
--
ALTER TABLE `fab_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_14B78418166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_16DB4F89166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Contraintes pour la table `project_category`
--
ALTER TABLE `project_category`
  ADD CONSTRAINT `FK_3B02921A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_3B02921A166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_fab_lab`
--
ALTER TABLE `user_fab_lab`
  ADD CONSTRAINT `FK_A4375BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A4375BE0730548` FOREIGN KEY (`fab_lab_id`) REFERENCES `fab_lab` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_project`
--
ALTER TABLE `user_project`
  ADD CONSTRAINT `FK_77BECEE4166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_77BECEE4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
