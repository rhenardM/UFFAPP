-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 juil. 2023 à 12:04
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
-- Base de données : `gestion_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tb_document`
--

CREATE TABLE `tb_document` (
  `id` int(11) NOT NULL,
  `nom_doc` varchar(40) DEFAULT NULL,
  `type_doc` varchar(40) DEFAULT NULL,
  `nom_personne` varchar(40) DEFAULT NULL,
  `descption` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_document`
--

INSERT INTO `tb_document` (`id`, `nom_doc`, `type_doc`, `nom_personne`, `descption`) VALUES
(1, 'doc cv', 'Diplome licence', 'French munongo', 'je suis votre homme pour cette bourse '),
(3, 'document', 'Attestation de reussite', 'Rhenard Bokey', 'je suis la description'),
(4, 'document', 'Attestation de reussite', 'Rhenard Bokey', 'je suis la description'),
(5, 'cv ', 'Attestation de naissance', 'David Mandes', 'je suis '),
(6, 'cv ', 'Attestation de naissance', 'David Mandes', 'je suis '),
(7, 'lv', 'Diplome d\'Etat', 'Romid Munongo', 'je suis '),
(8, NULL, 'Diplome d\'Etat', 'Akuka', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tb_frais`
--

CREATE TABLE `tb_frais` (
  `id` int(11) NOT NULL,
  `noms` varchar(250) NOT NULL,
  `date` datetime DEFAULT NULL,
  `billet` float DEFAULT NULL,
  `ouverture` float DEFAULT NULL,
  `passport` varchar(40) DEFAULT NULL,
  `legalisation` float DEFAULT NULL,
  `photo` float DEFAULT NULL,
  `jugement` float DEFAULT NULL,
  `acompte` float DEFAULT NULL,
  `tranche1` float DEFAULT NULL,
  `tranche2` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_frais`
--

INSERT INTO `tb_frais` (`id`, `noms`, `date`, `billet`, `ouverture`, `passport`, `legalisation`, `photo`, `jugement`, `acompte`, `tranche1`, `tranche2`) VALUES
(2, '', '2023-07-04 20:05:32', 300, 40, '500', 500, 10, 40, 40, 500, 50),
(3, '', '2023-07-04 20:08:44', 40, 55, '70', 70, 80, 80, 45, 500, 300),
(4, '', '2023-07-04 20:16:08', 60, 15, '20', 50, 15, 55, NULL, 1500, 1000),
(5, 'Rhenard munongo ', '2023-07-04 20:52:39', 15, 50, '50', 16, 29, 13, NULL, 400, 500);

-- --------------------------------------------------------

--
-- Structure de la table `tb_inscription`
--

CREATE TABLE `tb_inscription` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `postnom` varchar(40) NOT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `sexe` char(10) DEFAULT NULL,
  `numero` varchar(40) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nom_tuteur` varchar(40) DEFAULT NULL,
  `num_tuteur` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tb_inscription`
--

INSERT INTO `tb_inscription` (`id`, `nom`, `postnom`, `prenom`, `sexe`, `numero`, `age`, `nom_tuteur`, `num_tuteur`) VALUES
(2, 'Munongo', 'Bonkey', 'Rhenard', 'Homme', '0814014247', 23, 'Stors', '0821441909'),
(3, 'rob', 'Bon', 'Bob', 'Femme', '09877654322', 12, 'Stor', '098776654');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `login`, `password`) VALUES
(1, 'Munongo', 'Rhenard', 'Bonkey', '7accc3cca8396264be933599cda54e9d'),
(2, 'Matuza', 'Exauce', 'ndengo', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Munongo', 'Rhenard', 'french', '009f5c9afdb782cf80d91e30dc261ef1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tb_document`
--
ALTER TABLE `tb_document`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tb_frais`
--
ALTER TABLE `tb_frais`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tb_inscription`
--
ALTER TABLE `tb_inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tb_document`
--
ALTER TABLE `tb_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `tb_frais`
--
ALTER TABLE `tb_frais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tb_inscription`
--
ALTER TABLE `tb_inscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
