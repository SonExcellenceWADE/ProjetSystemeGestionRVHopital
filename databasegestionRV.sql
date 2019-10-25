-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 23 Octobre 2019 à 20:20
-- Version du serveur :  5.7.27-0ubuntu0.16.04.1
-- Version de PHP :  7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionRV`
--

-- --------------------------------------------------------

--
-- Structure de la table `Medecin`
--

CREATE TABLE `Medecin` (
  `idMed` int(11) NOT NULL,
  `codeMed` varchar(9) NOT NULL,
  `prenomMed` varchar(50) NOT NULL,
  `nomMed` varchar(50) NOT NULL,
  `emailMed` varchar(50) NOT NULL,
  `telMed` varchar(30) NOT NULL,
  `sexeMed` varchar(11) NOT NULL,
  `idSpecial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Medecin`
--

INSERT INTO `Medecin` (`idMed`, `codeMed`, `prenomMed`, `nomMed`, `emailMed`, `telMed`, `sexeMed`, `idSpecial`) VALUES
(4, 'MED0001SN', 'Assane', 'BA', 'assaneba@senhopital.sn', '708662697', 'Homme', 3),
(5, 'MED0002SN', 'Son Excellence', 'WADE', 'sonexcellence@senhopital.sn', '771295155', 'Homme', 34),
(6, 'MED0003SN', 'Ndeye Fatou', 'CISSE', 'fatou.cisse@senhopital.sn', '772789758', 'Femme', 27),
(9, 'MED0004SN', 'Babacar', 'Cisse', 'babacar@senhopital.sn', '771471748', 'Homme', 33);

-- --------------------------------------------------------

--
-- Structure de la table `Patient`
--

CREATE TABLE `Patient` (
  `idPatient` int(11) NOT NULL,
  `codePatient` varchar(9) NOT NULL,
  `prenomPatient` varchar(30) NOT NULL,
  `nomPatient` varchar(50) NOT NULL,
  `datenais` date NOT NULL,
  `sexe` varchar(11) NOT NULL,
  `telPatient` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Patient`
--

INSERT INTO `Patient` (`idPatient`, `codePatient`, `prenomPatient`, `nomPatient`, `datenais`, `sexe`, `telPatient`) VALUES
(6, 'PAT0001SN', 'Moussa', 'THIAM', '1993-06-19', 'Homme', '775878412'),
(9, 'PAT0002SN', 'Maimouna', 'SARR', '1997-05-02', 'Femme', '771295155'),
(11, 'PAT0003SN', 'Newton', 'N\'diaye', '1992-01-06', 'Homme', '766207443'),
(12, 'PAT0004SN', 'Cheikh', 'Mbow', '1994-04-12', 'Homme', '773881896');

-- --------------------------------------------------------

--
-- Structure de la table `Planing`
--

CREATE TABLE `Planing` (
  `idPlan` int(11) NOT NULL,
  `heureDeb` time NOT NULL,
  `heureFin` time NOT NULL,
  `datePlan` date NOT NULL,
  `idMed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Planing`
--

INSERT INTO `Planing` (`idPlan`, `heureDeb`, `heureFin`, `datePlan`, `idMed`) VALUES
(10, '16:30:00', '17:00:00', '2019-10-17', 4),
(11, '08:00:00', '10:00:00', '2019-10-22', 5),
(12, '08:00:00', '16:00:00', '2019-10-23', 6),
(13, '08:25:00', '11:25:00', '2019-10-24', 9);

-- --------------------------------------------------------

--
-- Structure de la table `RV`
--

CREATE TABLE `RV` (
  `idRV` int(11) NOT NULL,
  `numRV` varchar(7) NOT NULL,
  `idPatient` int(11) NOT NULL,
  `idPlan` int(11) NOT NULL,
  `dateRV` date NOT NULL,
  `heureRV` time NOT NULL,
  `duree` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `RV`
--

INSERT INTO `RV` (`idRV`, `numRV`, `idPatient`, `idPlan`, `dateRV`, `heureRV`, `duree`) VALUES
(1, 'RV-0001', 6, 10, '2019-10-21', '16:11:00', '15'),
(4, 'RV-0002', 11, 10, '2019-10-22', '17:35:00', '15'),
(5, 'RV-0003', 9, 12, '2019-10-22', '10:25:00', '15'),
(6, 'RV-0004', 6, 13, '2019-10-23', '08:00:00', '15'),
(7, 'RV-0005', 11, 13, '2019-10-24', '09:30:00', '15');

-- --------------------------------------------------------

--
-- Structure de la table `Secretaire`
--

CREATE TABLE `Secretaire` (
  `idSecret` int(11) NOT NULL,
  `PrenomSecret` varchar(50) NOT NULL,
  `nomSecret` varchar(50) NOT NULL,
  `emailSecret` varchar(40) NOT NULL,
  `telSecret` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Secretaire`
--

INSERT INTO `Secretaire` (`idSecret`, `PrenomSecret`, `nomSecret`, `emailSecret`, `telSecret`) VALUES
(1, 'Fatou', 'Ndiaye', 'ndiaye45toufa@gmai.com', '785436743'),
(2, 'Adama', 'Bâ', 'badama321@gmail.com', '783216954'),
(3, 'Astou', 'Diaw', 'diaw4astou@gmai.com', '775437689'),
(4, 'Fama', 'Sow', 'sowfa656@gmail.com', '765436789'),
(5, 'Kadia', 'Sarr', 'kadiousa65@gmail.com', '773225589');

-- --------------------------------------------------------

--
-- Structure de la table `Service`
--

CREATE TABLE `Service` (
  `idService` int(11) NOT NULL,
  `nomService` varchar(50) NOT NULL,
  `idSecret` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Service`
--

INSERT INTO `Service` (`idService`, `nomService`, `idSecret`) VALUES
(1, 'Cardiologie', 1),
(2, 'Dermatologie', 2),
(3, 'Oncologie', 3),
(4, 'Odontologie', 4),
(5, 'Chirurgie', 5);

-- --------------------------------------------------------

--
-- Structure de la table `Specialite`
--

CREATE TABLE `Specialite` (
  `idSpecial` int(11) NOT NULL,
  `nomSpecial` varchar(50) NOT NULL,
  `idService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Specialite`
--

INSERT INTO `Specialite` (`idSpecial`, `nomSpecial`, `idService`) VALUES
(1, 'Rythmologie', 1),
(2, 'Angiologie', 1),
(3, 'Cardiologie Pediatrique', 1),
(4, 'Phlebologie', 1),
(5, 'Dermatologie Esthetique', 2),
(21, 'Dermatopathologie', 2),
(22, 'Immunodermatologie', 2),
(23, 'Chirurgie de Mohs', 2),
(24, 'Dermatologie Pediatrique', 2),
(26, 'Oncologie Pediatrique', 3),
(27, 'Oncologie Gynecologique', 3),
(28, 'Oncologie Chirurgicale', 3),
(29, 'Oncologie Medicale', 3),
(30, 'Oncologie de Radiotherapie', 3),
(31, 'Odontologie Pediatrique', 4),
(32, 'Odontologie Stomatologie', 4),
(33, 'Odontologie Sportive', 4),
(34, 'Chirurgie Ophtalmologique', 5),
(35, 'Chirurgie Infantile', 5),
(36, 'Chirurgie Esthetique', 5),
(37, 'Chirurgie Digestive', 5),
(38, 'Chirurgie Vasculaire', 5);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `motpasse` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `idService` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`idUser`, `login`, `motpasse`, `role`, `idService`) VALUES
(1, 'Admin', 'admin', 'Admin', 1),
(2, 'Mme Ndiaye', 'passer@1', 'Secretaire', 2),
(3, 'assane@senhopital.com', 'passer', 'Medecin', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Medecin`
--
ALTER TABLE `Medecin`
  ADD PRIMARY KEY (`idMed`),
  ADD UNIQUE KEY `Medecin_AK` (`codeMed`),
  ADD KEY `Medecin_Specialite_FK` (`idSpecial`);

--
-- Index pour la table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`idPatient`),
  ADD UNIQUE KEY `Patient_AK` (`codePatient`);

--
-- Index pour la table `Planing`
--
ALTER TABLE `Planing`
  ADD PRIMARY KEY (`idPlan`),
  ADD KEY `Planing_Medecin_FK` (`idMed`);

--
-- Index pour la table `RV`
--
ALTER TABLE `RV`
  ADD PRIMARY KEY (`idRV`),
  ADD UNIQUE KEY `numRV` (`numRV`),
  ADD KEY `RV_Planing_FK` (`idPlan`),
  ADD KEY `RV_Patient0_FK` (`idPatient`);

--
-- Index pour la table `Secretaire`
--
ALTER TABLE `Secretaire`
  ADD PRIMARY KEY (`idSecret`);

--
-- Index pour la table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`idService`),
  ADD UNIQUE KEY `Service_Secretaire_AK` (`idSecret`);

--
-- Index pour la table `Specialite`
--
ALTER TABLE `Specialite`
  ADD PRIMARY KEY (`idSpecial`),
  ADD KEY `Specialite_Service_FK` (`idService`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `User_Service_FK` (`idService`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Medecin`
--
ALTER TABLE `Medecin`
  MODIFY `idMed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Patient`
--
ALTER TABLE `Patient`
  MODIFY `idPatient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `Planing`
--
ALTER TABLE `Planing`
  MODIFY `idPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `RV`
--
ALTER TABLE `RV`
  MODIFY `idRV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `Secretaire`
--
ALTER TABLE `Secretaire`
  MODIFY `idSecret` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Service`
--
ALTER TABLE `Service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Specialite`
--
ALTER TABLE `Specialite`
  MODIFY `idSpecial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Medecin`
--
ALTER TABLE `Medecin`
  ADD CONSTRAINT `Medecin_Specialite_FK` FOREIGN KEY (`idSpecial`) REFERENCES `Specialite` (`idSpecial`);

--
-- Contraintes pour la table `Planing`
--
ALTER TABLE `Planing`
  ADD CONSTRAINT `Planing_Medecin_FK` FOREIGN KEY (`idMed`) REFERENCES `Medecin` (`idMed`);

--
-- Contraintes pour la table `RV`
--
ALTER TABLE `RV`
  ADD CONSTRAINT `RV_Patient0_FK` FOREIGN KEY (`idPatient`) REFERENCES `Patient` (`idPatient`),
  ADD CONSTRAINT `RV_Planing_FK` FOREIGN KEY (`idPlan`) REFERENCES `Planing` (`idPlan`);

--
-- Contraintes pour la table `Service`
--
ALTER TABLE `Service`
  ADD CONSTRAINT `Service_Secretaire_FK` FOREIGN KEY (`idSecret`) REFERENCES `Secretaire` (`idSecret`);

--
-- Contraintes pour la table `Specialite`
--
ALTER TABLE `Specialite`
  ADD CONSTRAINT `Specialite_Service_FK` FOREIGN KEY (`idService`) REFERENCES `Service` (`idService`);

--
-- Contraintes pour la table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_Service_FK` FOREIGN KEY (`idService`) REFERENCES `Service` (`idService`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
