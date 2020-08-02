-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 19 mai 2020 à 12:04
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `imk`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `idAchat` int(11) NOT NULL,
  `dateAchat` datetime NOT NULL,
  `Client` int(11) NOT NULL,
  `Panier_idPanier` int(11) NOT NULL,
  `Articles_idArticles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `NomAdmin` varchar(45) NOT NULL,
  `EmailAdmin` varchar(145) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Mdp` varchar(45) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `NomAdmin`, `EmailAdmin`, `Login`, `Mdp`, `img`) VALUES
(1, 'Default', '', '', '', ''),
(2, 'siceron', 'dann@gmail.com', 'danny', '1703@danny', 'default.png'),
(3, 'siceron', 'jdsjqjsfx@ksxj.com', 'danny', 'xoxo', 'Cristal_20190121_2109383.jpg'),
(4, 'lucas', 'sdfdfd@gm.c', 'lucas', 'xoxo', '');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `idArticles` int(11) NOT NULL,
  `NomArticle` varchar(45) NOT NULL,
  `DescArticle` varchar(745) NOT NULL,
  `PrixArticle` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `categorie_idcategorie` int(11) NOT NULL,
  `taille_idtaille` int(11) NOT NULL,
  `Color_idColor` int(11) NOT NULL,
  `imgArticle` varchar(1500) NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`idArticles`, `NomArticle`, `DescArticle`, `PrixArticle`, `like`, `categorie_idcategorie`, `taille_idtaille`, `Color_idColor`, `imgArticle`, `etat`) VALUES
(4, 'hgjfdf', 'jkxdfdhdfhdfxjxf', 10, 0, 1, 1, 1, '440b8d16d808400d8d6e0ad24b25e274.jpg', 'dfdd'),
(6, 'dempo', 'dcdscgsdfcgdhvgvg', 45, 0, 1, 1, 1, '20190608_091309.jpg', 'promotion');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL,
  `nomCategorie` varchar(45) NOT NULL,
  `descCategorie` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `nomCategorie`, `descCategorie`) VALUES
(1, 'jambon', ''),
(2, 'bonbon', ''),
(3, 'lamantin', 'sjxfhcndcgvhv');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `NomClient` varchar(50) NOT NULL,
  `EmailClient` varchar(450) NOT NULL,
  `PhoneClient` varchar(20) NOT NULL,
  `loginClient` varchar(10) NOT NULL,
  `pwdClient` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `idColor` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`idColor`, `nom`) VALUES
(1, 'Black'),
(2, 'white');

-- --------------------------------------------------------

--
-- Structure de la table `main`
--

CREATE TABLE `main` (
  `idmain` int(11) NOT NULL,
  `Partenaires_idPartenaires` int(11) NOT NULL,
  `membre_idMembre` int(11) NOT NULL,
  `Admin_idAdmin` int(11) NOT NULL,
  `Service_idService` int(11) NOT NULL,
  `Articles_idArticles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `NomMembre` varchar(145) NOT NULL,
  `DescMembre` varchar(425) NOT NULL,
  `email` varchar(145) NOT NULL,
  `imgMembre` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `NomMembre`, `DescMembre`, `email`, `imgMembre`) VALUES
(1, '', 'ssffff', '1703@dannyk.com', '8ca82e45942d4dd282b66a53f74d3a74.jpg'),
(3, 'dann', 'cxgfjhvgmhkjghko', 'fchjghfjgvf@fdg.f', '440b8d16d808400d8d6e0ad24b25e274.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `idPartenaires` int(11) NOT NULL,
  `NomPartenaires` varchar(145) NOT NULL,
  `imagePartenaires` varchar(255) NOT NULL,
  `WebPartenaires` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`idPartenaires`, `NomPartenaires`, `imagePartenaires`, `WebPartenaires`) VALUES
(2, 'dannnnnn', 'David_KAMUNGA_2_20190121_210925.jpg', 'www.cristal.com'),
(3, 'cristalteam', 'Cristal_20190121_210938.jpg', 'www.cristal.com');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `idQuestions` int(11) NOT NULL,
  `Nom` varchar(145) NOT NULL,
  `Email` varchar(145) NOT NULL,
  `Message` varchar(555) NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reponce`
--

CREATE TABLE `reponce` (
  `idReponce` int(11) NOT NULL,
  `Message` varchar(45) NOT NULL,
  `Admin_idAdmin` int(11) NOT NULL,
  `Questions_idQuestions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `idService` int(11) NOT NULL,
  `NomService` varchar(45) NOT NULL,
  `logoService` varchar(120) NOT NULL,
  `DescService` varchar(485) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`idService`, `NomService`, `logoService`, `DescService`) VALUES
(1, 'jjbdb', 'flaticon-help', 'zxhjnfxxh'),
(2, 'sfhgdf', 'jjhcdfcf', 'jhdfhdjcvjdh');

-- --------------------------------------------------------

--
-- Structure de la table `taille`
--

CREATE TABLE `taille` (
  `idtaille` int(11) NOT NULL,
  `desc` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `taille`
--

INSERT INTO `taille` (`idtaille`, `desc`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`idAchat`,`Articles_idArticles`),
  ADD KEY `fk_Achat_Panier_idx` (`Panier_idPanier`),
  ADD KEY `fk_Achat_Articles1_idx` (`Articles_idArticles`),
  ADD KEY `fkClient` (`Client`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idArticles`),
  ADD KEY `fk_Articles_categorie1_idx` (`categorie_idcategorie`),
  ADD KEY `fk_Articles_taille1_idx` (`taille_idtaille`),
  ADD KEY `fk_Articles_Color1_idx` (`Color_idColor`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idColor`);

--
-- Index pour la table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`idmain`,`Partenaires_idPartenaires`,`membre_idMembre`,`Admin_idAdmin`,`Service_idService`),
  ADD KEY `fk_main_Partenaires1_idx` (`Partenaires_idPartenaires`),
  ADD KEY `fk_main_membre1_idx` (`membre_idMembre`),
  ADD KEY `fk_main_Admin1_idx` (`Admin_idAdmin`),
  ADD KEY `fk_main_Service1_idx` (`Service_idService`),
  ADD KEY `fk_main_Articles1_idx` (`Articles_idArticles`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`idPartenaires`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestions`);

--
-- Index pour la table `reponce`
--
ALTER TABLE `reponce`
  ADD PRIMARY KEY (`idReponce`),
  ADD KEY `fk_Reponce_Admin1_idx` (`Admin_idAdmin`),
  ADD KEY `fk_Reponce_Questions1_idx` (`Questions_idQuestions`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idService`);

--
-- Index pour la table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`idtaille`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `idArticles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `idColor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `main`
--
ALTER TABLE `main`
  MODIFY `idmain` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `idPartenaires` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestions` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reponce`
--
ALTER TABLE `reponce`
  MODIFY `idReponce` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `idService` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `taille`
--
ALTER TABLE `taille`
  MODIFY `idtaille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
  ADD CONSTRAINT `fkClient` FOREIGN KEY (`Client`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Achat_Articles1` FOREIGN KEY (`Articles_idArticles`) REFERENCES `articles` (`idArticles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Achat_Panier` FOREIGN KEY (`Panier_idPanier`) REFERENCES `panier` (`idPanier`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_Articles_Color1` FOREIGN KEY (`Color_idColor`) REFERENCES `color` (`idColor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articles_categorie1` FOREIGN KEY (`categorie_idcategorie`) REFERENCES `categorie` (`idcategorie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Articles_taille1` FOREIGN KEY (`taille_idtaille`) REFERENCES `taille` (`idtaille`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `main`
--
ALTER TABLE `main`
  ADD CONSTRAINT `fk_main_Admin1` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_main_Articles1` FOREIGN KEY (`Articles_idArticles`) REFERENCES `articles` (`idArticles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_main_Partenaires1` FOREIGN KEY (`Partenaires_idPartenaires`) REFERENCES `partenaires` (`idPartenaires`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_main_Service1` FOREIGN KEY (`Service_idService`) REFERENCES `service` (`idService`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_main_membre1` FOREIGN KEY (`membre_idMembre`) REFERENCES `membre` (`idMembre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reponce`
--
ALTER TABLE `reponce`
  ADD CONSTRAINT `fk_Reponce_Admin1` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `admin` (`idAdmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Reponce_Questions1` FOREIGN KEY (`Questions_idQuestions`) REFERENCES `questions` (`idQuestions`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
