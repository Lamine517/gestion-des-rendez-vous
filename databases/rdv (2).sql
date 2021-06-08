-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 07 juin 2021 à 14:33
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rdv`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Objet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_envoie` datetime NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `mail`, `subject`, `Objet`, `date_envoie`) VALUES
(1, 'fall Amy', 'fallamy@gmail.com', 'Reclamation', 'Bonjour j\'aimerais faire une reclamation de bourse', '0000-00-00 00:00:00'),
(3, 'ss', 'ss', 'ss', 'ff', '0000-00-00 00:00:00'),
(5, 'lamine dieme', 'diemelamine398@gmail.com', 'demande de bourse', 'a', '2021-05-30 01:05:28');

-- --------------------------------------------------------

--
-- Structure de la table `directions`
--

DROP TABLE IF EXISTS `directions`;
CREATE TABLE IF NOT EXISTS `directions` (
  `matricule_directions` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `libelle_directions` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`matricule_directions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `directions`
--

INSERT INTO `directions` (`matricule_directions`, `libelle_directions`) VALUES
('D-ADMIN002', 'Direction Administratives'),
('D-ETUDES001', 'Directions des Etudes'),
('lll', 'fghj');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id_personnes` int NOT NULL,
  `Nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Numtel` int NOT NULL,
  `Adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Specialiste` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `matricule_services` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `passwrd` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_personnes`),
  KEY `matricule_services` (`matricule_services`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id_personnes`, `Nom`, `Prenom`, `Email`, `Numtel`, `Adresse`, `Specialiste`, `matricule_services`, `passwrd`) VALUES
(2003, 'Samoura', 'Salimata', 'ssamoura@isepdiamniadio.edu.sn', 770990000, 'DAKAR', 'Secretaire', 'S-RRS004', 'samoura'),
(2004, 'NDIAYE GUEYE', 'Mbossé', 'directrice@isepdiamniadio.edu.sn', 770990000, 'DAKAR CENTRE', 'Directrice', 'S-SS001', 'ndiaye'),
(2015, 'DIEME', 'Lamine', 'diemelamine398@gmail.com', 789090909, 'YEUMBEUL', 'ETUDIANT', 'S-SS001', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `prendrerv`
--

DROP TABLE IF EXISTS `prendrerv`;
CREATE TABLE IF NOT EXISTS `prendrerv` (
  `Date_RV` date NOT NULL,
  `Heure_Deb` time NOT NULL,
  `Heure_Fin` time NOT NULL,
  `Objet` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `destinataire` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_users` int NOT NULL,
  `id_personnes` int NOT NULL,
  KEY `id_users` (`id_users`),
  KEY `id_personnes` (`id_personnes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `prendrerv`
--

INSERT INTO `prendrerv` (`Date_RV`, `Heure_Deb`, `Heure_Fin`, `Objet`, `destinataire`, `id_users`, `id_personnes`) VALUES
('2021-03-01', '10:00:00', '11:00:00', 'Nous avons dans le précédent article codé les pages, donc la partie CMS de notre blog. Je vous ai alors dit que la série était terminée mais je vous ai aussi sollicité pour des ajouts éventuels.', 'ss@isepdiamniadio.edu.sn', 12, 2003);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `matricule_services` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `libelle_services` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `matricule_directions` varchar(12) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`matricule_services`),
  KEY `matricule_directions` (`matricule_directions`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`matricule_services`, `libelle_services`, `matricule_directions`) VALUES
('S-C006', 'Comptabilite', 'D-ETUDES001'),
('S-CC008', 'Charge de Communication', 'D-ADMIN002'),
('S-CJ010', 'Conseillée Jurdiaue', 'D-ADMIN002'),
('S-CSA003', 'Coodinateurs des Services Administratifs', 'D-ETUDES001'),
('S-MP007', 'Marche Publique', 'D-ETUDES001'),
('S-RRS004', 'Responsables des ressources Humaines', 'D-ETUDES001'),
('S-SA-002', 'Services Des Apprenants', 'D-ETUDES001'),
('S-SF005', 'Services Financiers', 'D-ETUDES001'),
('S-SI011', 'Service Informatique', 'D-ADMIN002'),
('S-SS001', 'Services de Scolarites', 'D-ETUDES001'),
('fg', 'jloop', 'D-ADMIN002');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `passwrd` varchar(255) NOT NULL,
  `telephone` int NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `prenom`, `nom`, `Email`, `passwrd`, `telephone`, `type`) VALUES
(10, 'Administrateur', 'app', 'apprenantisep@gmail.com', 'a172cedcae47474b615c54d510a5d84a8dea3032e958587430b413538be3f333', 7678990, 'admin'),
(11, 'Aissatou', 'diouf', 'ad@gmail.com', '924378b37680f2782af3d148bb32a6f19098d564368d3d5962d35df41fc88f5b', 2147483647, 'admin'),
(12, 'Lamine', 'DIEME', 'diemelamine398@gmail.com', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 781837370, 'user'),
(22, 'Cheikh Ahmed Tidiane', 'mbengue', 'ch.a.t.mbengue@gmail.com', '165a154eb414e59b7f6b3173af3dfb11550ddc2c3e5318e771306ab08b949342', 779990909, 'user'),
(24, 'Apprenant', 'isep', 'apprenantisep@gmail.com', 'isep', 339090090, 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD CONSTRAINT `FK_personnes_matricule_matricule_services` FOREIGN KEY (`matricule_services`) REFERENCES `services` (`matricule_services`);

--
-- Contraintes pour la table `prendrerv`
--
ALTER TABLE `prendrerv`
  ADD CONSTRAINT `FK_prendrerv_id_personnes` FOREIGN KEY (`id_personnes`) REFERENCES `personnes` (`id_personnes`),
  ADD CONSTRAINT `FK_prendrerv_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `FK_services_matricule_directions` FOREIGN KEY (`matricule_directions`) REFERENCES `directions` (`matricule_directions`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
