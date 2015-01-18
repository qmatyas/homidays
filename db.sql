-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 18 Janvier 2015 à 08:46
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `activites`
--

CREATE TABLE IF NOT EXISTS `activites` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `quartiers_id` int(45) NOT NULL,
  `musee` tinyint(1) DEFAULT NULL,
  `sport` tinyint(1) DEFAULT NULL,
  `parc_attraction` tinyint(1) DEFAULT NULL,
  `shopping` tinyint(1) DEFAULT NULL,
  `autre` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `activites`
--

INSERT INTO `activites` (`id`, `quartiers_id`, `musee`, `sport`, `parc_attraction`, `shopping`, `autre`) VALUES
(1, 4, 0, 1, 0, 0, 0),
(2, 5, 0, 1, 0, 0, 0),
(3, 6, 0, 1, 0, 0, 0),
(4, 7, 1, 0, 0, 0, 0),
(5, 8, 1, 0, 0, 0, 0),
(6, 9, 1, 0, 0, 0, 0),
(7, 10, 1, 1, 1, 1, 0),
(8, 11, 1, 1, 1, 0, 0),
(9, 12, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(30) CHARACTER SET utf16 NOT NULL,
  `cat_ordre` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_ordre` (`cat_ordre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_nom`, `cat_ordre`) VALUES
(1, 'Général', 30),
(2, 'Autre', 20);

-- --------------------------------------------------------

--
-- Structure de la table `contraintes`
--

CREATE TABLE IF NOT EXISTS `contraintes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logement_id` int(11) NOT NULL,
  `pas_fumer` tinyint(1) DEFAULT NULL,
  `pas_bruit` tinyint(1) DEFAULT NULL,
  `pas_enfant` tinyint(1) DEFAULT NULL,
  `pas_animaux` tinyint(1) DEFAULT NULL,
  `autre` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id_idx` (`logement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `contraintes`
--

INSERT INTO `contraintes` (`id`, `logement_id`, `pas_fumer`, `pas_bruit`, `pas_enfant`, `pas_animaux`, `autre`) VALUES
(1, 6, 1, 0, 0, 0, 0),
(2, 7, 0, 1, 0, 0, 0),
(3, 8, 0, 1, 0, 0, 0),
(4, 9, 0, 1, 0, 0, 0),
(5, 10, 0, 1, 0, 0, 0),
(6, 11, 1, 1, 0, 0, 0),
(7, 12, 0, 0, 0, 0, 0),
(8, 13, 1, 1, 0, 0, 0),
(9, 14, 1, 0, 0, 0, 0),
(10, 16, 1, 0, 0, 1, 0),
(11, 17, 1, 0, 0, 1, 0),
(12, 18, 1, 0, 0, 1, 0),
(13, 19, 1, 0, 0, 1, 0),
(14, 20, 1, 0, 0, 1, 0),
(15, 21, 1, 0, 0, 1, 0),
(16, 22, 0, 0, 0, 1, 0),
(17, 23, 0, 1, 0, 0, 0),
(18, 24, 0, 0, 0, 1, 0),
(19, 25, 0, 0, 0, 1, 0),
(20, 26, 0, 0, 0, 1, 0),
(21, 27, 0, 0, 0, 1, 0),
(22, 28, 0, 0, 0, 1, 0),
(23, 29, 0, 0, 0, 1, 0),
(24, 30, 0, 0, 0, 1, 0),
(25, 31, 0, 0, 0, 1, 0),
(26, 32, 0, 0, 0, 1, 0),
(27, 33, 0, 0, 0, 1, 0),
(28, 34, 0, 0, 0, 1, 0),
(29, 35, 0, 0, 0, 1, 0),
(30, 36, 0, 0, 0, 1, 0),
(31, 37, 0, 0, 0, 1, 0),
(32, 38, 0, 0, 0, 1, 0),
(33, 39, 0, 0, 0, 1, 0),
(34, 40, 0, 1, 1, 1, 0),
(35, 41, 0, 1, 1, 1, 0),
(36, 42, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `disponibilites`
--

CREATE TABLE IF NOT EXISTS `disponibilites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `logement_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `echanges`
--

CREATE TABLE IF NOT EXISTS `echanges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logement_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `victime_id` int(11) NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `note_logement` float NOT NULL,
  `avis_logement` text NOT NULL,
  `note_victime` float NOT NULL,
  `avis_victime` text NOT NULL,
  `disponibilite_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id_idx` (`logement_id`),
  KEY `utilisateur_id_idx` (`utilisateur_id`),
  KEY `victime_id_idx` (`victime_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `environnements`
--

CREATE TABLE IF NOT EXISTS `environnements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quartiers_id` int(11) NOT NULL,
  `lac` tinyint(1) DEFAULT NULL,
  `foret` tinyint(1) DEFAULT NULL,
  `campagne` tinyint(1) DEFAULT NULL,
  `mer` tinyint(1) DEFAULT NULL,
  `ville` tinyint(1) DEFAULT NULL,
  `autre` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `environnements`
--

INSERT INTO `environnements` (`id`, `quartiers_id`, `lac`, `foret`, `campagne`, `mer`, `ville`, `autre`) VALUES
(1, 4, 0, 0, 1, 0, 0, 0),
(2, 5, 0, 1, 0, 0, 1, 0),
(3, 6, 0, 1, 0, 0, 1, 0),
(4, 7, 0, 1, 0, 0, 0, 0),
(5, 8, 0, 0, 1, 0, 0, 0),
(6, 9, 0, 0, 0, 0, 1, 0),
(7, 10, 1, 1, 1, 1, 1, 0),
(8, 11, 1, 1, 0, 0, 1, 0),
(9, 12, 0, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_cat_id` mediumint(8) NOT NULL,
  `forum_nom` varchar(30) NOT NULL,
  `forum_description` text NOT NULL,
  `forum_ordre` mediumint(8) NOT NULL,
  `forum_dernier_message_id` int(11) NOT NULL,
  `forum_sujet` mediumint(8) NOT NULL,
  `forum_message` mediumint(8) NOT NULL,
  `auth_vue` tinyint(4) NOT NULL,
  `auth_message` tinyint(4) NOT NULL,
  `auth_sujet` tinyint(4) NOT NULL,
  `auth_annonce` tinyint(4) NOT NULL,
  `auth_modo` tinyint(4) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`forum_id`, `forum_cat_id`, `forum_nom`, `forum_description`, `forum_ordre`, `forum_dernier_message_id`, `forum_sujet`, `forum_message`, `auth_vue`, `auth_message`, `auth_sujet`, `auth_annonce`, `auth_modo`) VALUES
(1, 1, 'Présentation', 'Nouveau sur le forum? Venez vous présenter ici!', 60, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 'Les News', 'Les news du site sont ici', 50, 0, 0, 0, 0, 0, 0, 0, -13),
(3, 1, 'Discussions générales', 'Ici, on peut parler de tous les sujets.', 40, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logement_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `logement_id`, `nom`) VALUES
(1, 21, 'images/logement/logement_21_14213647690.jpg'),
(2, 21, 'images/logement/logement_21_14213647691.jpg'),
(3, 21, 'images/logement/logement_21_14213647692.jpg'),
(4, 21, 'images/logement/logement_21_14213647693.jpg'),
(5, 42, 'images/logement/logement_42_14215127570.png'),
(6, 42, 'images/logement/logement_42_14215127571.jpg'),
(7, 41, 'images/logement/logement_41_14215131600.jpg'),
(8, 41, 'images/logement/logement_41_14215131601.jpg'),
(9, 41, 'images/logement/logement_41_14215131602.jpg'),
(10, 41, 'images/logement/logement_41_14215131603.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

CREATE TABLE IF NOT EXISTS `logements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(110) NOT NULL,
  `date_inscription` date NOT NULL,
  `type_logement` varchar(45) NOT NULL,
  `rue` varchar(45) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `superficie` int(11) NOT NULL,
  `nb_piece` int(11) NOT NULL,
  `nb_chambre` int(11) NOT NULL,
  `nb_salle_bain` int(11) NOT NULL,
  `note_totale` float NOT NULL DEFAULT '0',
  `note_nombre` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id_idx` (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `logements`
--

INSERT INTO `logements` (`id`, `utilisateur_id`, `nom`, `date_inscription`, `type_logement`, `rue`, `code_postal`, `ville`, `pays`, `superficie`, `nb_piece`, `nb_chambre`, `nb_salle_bain`, `note_totale`, `note_nombre`, `description`) VALUES
(1, 1, 'Petite fleur fanée', '0000-00-00', 'loft', '6', 92200, 'Neuilly-sur-Seine', 'France', 569, 2, 2, 2, 0, 0, 'vedvwevweg '),
(6, 12, 'Ma petite case créole', '0000-00-00', 'maison', '22 rue Jean de Cambiaire', 92170, 'Saint-Joseph', 'France', 250, 8, 3, 1, 0, 0, 'Et patati et patata '),
(9, 14, 'Soleil doré', '0000-00-00', 'maison', '22 rue Soleil', 9999, 'Casablanca', 'Maroc', 290, 7, 4, 2, 0, 0, 'jolie maison '),
(10, 15, 'Belle Villa', '0000-00-00', 'maison', '5 rue Bellegrade', 92200, 'Paris', 'France', 10, 1, 3, 2, 0, 0, ' belle vue, beau temps'),
(11, 18, 'Rêve perdu', '0000-00-00', 'appartement', '5 rue de l''Autre', 9999, 'Damas', 'Syrie', 200, 6, 4, 2, 0, 0, 'jolie maison '),
(12, 19, 'Paradis', '0000-00-00', 'autre', '7e ciel', 0, 'Eden', 'Univers', 9999, 99, 2, 4, 0, 0, 'C''est le paradis '),
(13, 20, 'Bagatelle', '0000-00-00', 'appartement', '6 rue de  Bagatelle', 92200, 'Neuilly-sur-Seine', 'France', 140, 6, 4, 2, 0, 0, 'salon, salle Ã  manger, cuisine, couloir, 4 chambres '),
(14, 3, 'Ailleurs', '2015-01-13', 'maison', '31 rue Jean Bleuzen', 92170, 'Vanves', 'France', 18, 2, 1, 1, 0, 0, '  très sympa'),
(21, 20, 'aaaa', '2015-01-16', 'maison', 'aaaa', 0, 'aaa', 'aaa', 4, 2, 3, 3, 0, 0, 'csdcsd'),
(22, 24, 'Villa des Gobelins', '2015-01-16', 'appartement', 'Villa des Gobelins', 75013, 'Paris', 'France', 48, 2, 1, 1, 0, 0, '2e étage'),
(23, 3, 'aaaa', '2015-01-17', 'maison', 'aaaaa', 0, 'aaaaa', 'aaaaa', 11, 1, 1, 1, 0, 0, 'aaaaaa'),
(27, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(28, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(29, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(30, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(31, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(32, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(33, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(34, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(35, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(36, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(37, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(38, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(39, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zzzz', 'zzz', 44, 44, 1, 1, 0, 0, 'gggg'),
(40, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zz', 'zzz', 4, 4, 3, 3, 0, 0, 'sfhfxfj'),
(41, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zz', 'zzz', 4, 4, 3, 3, 0, 0, 'sfhfxfj'),
(42, 3, 'zzzz', '2015-01-17', 'maison', 'zzzz', 0, 'zz', 'zzz', 4, 4, 3, 3, 0, 0, 'sfhfxfj');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_createur` int(11) NOT NULL,
  `message_texte` text NOT NULL,
  `message_date` int(11) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `message_forum_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logement_id` int(11) NOT NULL,
  `wifi` tinyint(1) DEFAULT NULL,
  `voiture` tinyint(1) DEFAULT NULL,
  `jardin_terrasse` tinyint(1) DEFAULT NULL,
  `piscine` tinyint(1) DEFAULT NULL,
  `equipement_sportif` tinyint(1) DEFAULT NULL,
  `acces_handicape` tinyint(1) DEFAULT NULL,
  `autre` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id_idx` (`logement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `options`
--

INSERT INTO `options` (`id`, `logement_id`, `wifi`, `voiture`, `jardin_terrasse`, `piscine`, `equipement_sportif`, `acces_handicape`, `autre`) VALUES
(1, 6, 1, 1, 1, 1, 1, 0, 0),
(2, 7, 0, 1, 0, 0, 0, 0, 0),
(3, 8, 0, 1, 0, 0, 0, 0, 0),
(4, 9, 0, 0, 0, 1, 0, 0, 0),
(5, 10, 1, 0, 0, 0, 1, 0, 0),
(6, 11, 1, 1, 0, 0, 0, 0, 0),
(7, 12, 1, 1, 1, 1, 1, 1, 0),
(8, 13, 1, 1, 1, 0, 0, 0, 0),
(9, 14, 1, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

CREATE TABLE IF NOT EXISTS `quartiers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logement_id` int(11) NOT NULL,
  `point_fort` text NOT NULL,
  `restauration` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id_idx` (`logement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `quartiers`
--

INSERT INTO `quartiers` (`id`, `logement_id`, `point_fort`, `restauration`) VALUES
(4, 6, 'Vue sur la mer\r\nPiscine\r\nKiosque\r\nBBQ\r\nGrand jardin', 'La maison des grand-parents'),
(5, 7, 'kjkj', 'jksj'),
(6, 8, 'kjkj', 'jksj'),
(7, 9, 'tres bonne odeur', 'gateaux marocains'),
(8, 10, 'voisins sympatiques, soir&es dansantes', 'boulangerie'),
(9, 11, 'voisins bruyants, jasmin partout, Ã  manger partout, rose de damas', 'chichtaouk'),
(10, 12, 'il y a que des anges', 'Chinois,Japonais, Italien ...'),
(11, 13, 'Calme, belle vue, prÃ¨s du Bois de Boulogne', 'Tout commerce Ã  proximitÃ©'),
(12, 14, 'calme', 'pizerria');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logement_id` int(11) NOT NULL,
  `fermer` tinyint(1) DEFAULT NULL,
  `garder_animaux` tinyint(1) DEFAULT NULL,
  `arroser_plantes` tinyint(1) DEFAULT NULL,
  `discuter_voisine` tinyint(1) DEFAULT NULL,
  `menage` tinyint(1) DEFAULT NULL,
  `autre` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logement_id_idx` (`logement_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `services`
--

INSERT INTO `services` (`id`, `logement_id`, `fermer`, `garder_animaux`, `arroser_plantes`, `discuter_voisine`, `menage`, `autre`) VALUES
(1, 6, 1, 0, 0, 1, 0, 0),
(2, 7, 1, 0, 0, 0, 0, 0),
(3, 8, 1, 0, 0, 0, 0, 0),
(4, 9, 1, 0, 0, 0, 0, 0),
(5, 10, 1, 0, 0, 0, 0, 0),
(6, 11, 1, 1, 0, 1, 1, 0),
(7, 12, 0, 0, 1, 1, 1, 0),
(8, 13, 1, 1, 0, 0, 1, 0),
(9, 14, 1, 0, 0, 1, 1, 0),
(10, 16, 0, 0, 1, 0, 1, 0),
(11, 17, 0, 0, 1, 0, 1, 0),
(12, 18, 0, 0, 1, 0, 1, 0),
(13, 19, 0, 0, 1, 0, 1, 0),
(14, 20, 0, 0, 1, 0, 1, 0),
(15, 21, 0, 0, 1, 0, 1, 0),
(16, 22, 1, 0, 0, 1, 0, 0),
(17, 23, 0, 1, 0, 0, 0, 0),
(18, 24, 0, 0, 1, 0, 0, 0),
(19, 25, 0, 0, 1, 0, 0, 0),
(20, 26, 0, 0, 1, 0, 0, 0),
(21, 27, 0, 0, 1, 0, 0, 0),
(22, 28, 0, 0, 1, 0, 0, 0),
(23, 29, 0, 0, 1, 0, 0, 0),
(24, 30, 0, 0, 1, 0, 0, 0),
(25, 31, 0, 0, 1, 0, 0, 0),
(26, 32, 0, 0, 1, 0, 0, 0),
(27, 33, 0, 0, 1, 0, 0, 0),
(28, 34, 0, 0, 1, 0, 0, 0),
(29, 35, 0, 0, 1, 0, 0, 0),
(30, 36, 0, 0, 1, 0, 0, 0),
(31, 37, 0, 0, 1, 0, 0, 0),
(32, 38, 0, 0, 1, 0, 0, 0),
(33, 39, 0, 0, 1, 0, 0, 0),
(34, 40, 0, 0, 0, 1, 0, 0),
(35, 41, 0, 0, 0, 1, 0, 0),
(36, 42, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sujets`
--

CREATE TABLE IF NOT EXISTS `sujets` (
  `sujet_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `sujet_titre` char(60) NOT NULL,
  `sujet_createur` int(11) NOT NULL,
  `sujet_vu` mediumint(8) NOT NULL,
  `sujet_date` int(11) NOT NULL,
  `sujet_genre` varchar(30) NOT NULL,
  `sujet_dernier_message` int(11) NOT NULL,
  `sujet_premier_message` int(11) NOT NULL,
  `sujet_message` mediumint(8) NOT NULL,
  PRIMARY KEY (`sujet_id`),
  UNIQUE KEY `dernier_message` (`sujet_dernier_message`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `transports`
--

CREATE TABLE IF NOT EXISTS `transports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quartiers_id` int(11) NOT NULL,
  `metro` tinyint(1) DEFAULT NULL,
  `velib` tinyint(1) DEFAULT NULL,
  `bus` tinyint(1) DEFAULT NULL,
  `tramway` tinyint(1) DEFAULT NULL,
  `autre` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `transports`
--

INSERT INTO `transports` (`id`, `quartiers_id`, `metro`, `velib`, `bus`, `tramway`, `autre`) VALUES
(1, 4, 0, 0, 1, 0, 0),
(2, 5, 0, 0, 1, 0, 0),
(3, 6, 0, 0, 1, 0, 0),
(4, 7, 0, 0, 1, 0, 0),
(5, 8, 1, 0, 0, 0, 0),
(6, 9, 0, 0, 0, 0, 0),
(7, 10, 1, 1, 1, 1, 0),
(8, 11, 0, 1, 1, 0, 0),
(9, 12, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `date_inscription` date NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `pass` char(45) NOT NULL,
  `hash_validation` char(32) NOT NULL,
  `profession` varchar(45) DEFAULT NULL,
  `langue` varchar(345) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `tel` int(11) NOT NULL,
  `note_totale` float DEFAULT NULL,
  `note_nombre` int(11) DEFAULT NULL,
  `rue` varchar(45) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(45) NOT NULL,
  `pays` varchar(45) NOT NULL,
  `nb_enfant` int(2) NOT NULL,
  `nb_adulte` int(2) NOT NULL,
  `interet` varchar(350) DEFAULT NULL,
  `animaux` tinyint(1) NOT NULL,
  `fumeur` tinyint(1) NOT NULL,
  `avatar` varchar(128) NOT NULL DEFAULT ''' ''',
  `carte_ID` varchar(128) NOT NULL DEFAULT '',
  `signature` varchar(200) NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `inscrit` int(11) NOT NULL,
  `derniere_visite` int(11) NOT NULL,
  `rang` tinyint(4) NOT NULL DEFAULT '2',
  `message` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `pseudo_2` (`pseudo`,`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `date_naissance`, `sexe`, `date_inscription`, `pseudo`, `pass`, `hash_validation`, `profession`, `langue`, `email`, `tel`, `note_totale`, `note_nombre`, `rue`, `code_postal`, `ville`, `pays`, `nb_enfant`, `nb_adulte`, `interet`, `animaux`, `fumeur`, `avatar`, `carte_ID`, `signature`, `localisation`, `inscrit`, `derniere_visite`, `rang`, `message`) VALUES
(1, 'Macé', 'Roxane', '1995-01-22', 1, '2014-11-26', 'Roxye', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'Emmerdeuse', NULL, 'roxanemace95@hotmail.fr', 750351352, 0, 0, '6 rue de Bagatelle', 92200, 'Neuilly-sur-Seine', 'France', 2, 2, 'Faire des listes\r\nCache des trucs\r\nFait attention aux autres  ', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(2, 'Gonzalez', 'Adrien', '1993-07-29', 0, '2014-11-28', 'Adrienanou', 'yasmine', '', 'Etudiant', NULL, 'adrien.gonzalez@isep.fr', 645821696, 0, 0, '50 rue Edouard Vaillant', 92300, 'Levallois Perret', 'France', 1, 2, '  maquette, lecture, Star Wars, dormir...', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(3, 'Fontaine', 'Alexis', '1994-02-02', 0, '2014-12-16', 'Alexi', 'e1983919a69ce4a448263028cd667b57acdd975b', '', 'Ours en peluche', 'Français, Anglais, Allemand, Créole', 'alexis.fontaine@isep.fr', 627861790, 0, 0, '22 rue Jean de Cambiaire', 97480, 'Saint-Joseph', 'France', 2, 2, 'La bouffe\r\nLes voyages\r\nLes amis/famille\r\n...\r\nR                             ', 1, 0, '', '', '', '', 0, 0, 2, 0),
(4, 'De cuverville', 'Martin', '1992-12-28', 0, '2014-12-16', 'Tintin', '1f71e0f4ac9b47cd93bf269e4017abaab9d3bd63', '', 'Etudiant', NULL, 'mdecuverville@isep.fr', 628261455, 0, 0, '', 0, 'Paris', 'France', 2, 2, 'photo, voile ', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(5, 'Quatabou', 'Fatima', '1994-12-15', 1, '2014-12-16', 'Faty', '10a34637ad661d98ba3344717656fcc76209c2f8', '', 'Etudiante', NULL, 'fatyquatabou@isep.fr', 698635201, 0, 0, '', 0, 'Casablanca', 'Maroc', 2, 2, 'lire, danser, chanter   ', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(6, 'Manceny', 'Mathieu', '1965-01-01', 0, '2014-12-16', 'Manceny', 'e6fb06210fafc02fd7479ddbed2d042cc3a5155e', '', 'Professeur', NULL, 'manceny@isep.fr', 0, 0, 0, '10 rue de Vanves', 92130, 'Issy-les-Moulinaux', 'France', 2, 2, 'lecture, code   ', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(7, 'Chakkour', 'Mouna', '1964-04-26', 1, '2014-12-16', 'Moumou', 'cca39afda638eae2b9f29e42b62778a0fe31b726', '', 'Journaliste', NULL, 'mouna.chakkour@yahoo.fr', 988423497, 0, 0, '6 rue de  Bagatelle', 92200, 'Neuilly-sur-Seine', 'France', 3, 2, 'lecture, amies...', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(8, 'Lalle', 'Quentin', '1993-05-31', 0, '2014-12-17', 'Quentinou', '7785db84585b09fc9bc5e7e763fca1095488c446', '', 'Etudiant', NULL, 'quentin.lalle@isep.fr', 648658479, 0, 0, '3 rue Raspail', 75006, 'Paris', 'France', 2, 2, 'VTT, musique, jeux de cartes, photographie   ', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(9, 'Macé', 'Ludovic', '1965-06-01', 0, '2014-12-21', 'Mike', '7aff03e62f4d0ec0e510cff1d87f05818a233e86', '', 'Ingénieur', NULL, 'mi_klima@yahoo.fr', 646312255, NULL, NULL, '6 rue de  Bagatelle', 92200, 'Neuilly-sur-Seine', 'France', 3, 2, 'lire, manger, boire, dormir, glander...   ', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(10, 'Macé', 'Valentine', '1997-02-23', 1, '2014-12-23', 'Valentou', 'e3e6722cb688bcef7c3e811ca3f2c5042d64959e', '8713744f788ce81a366ecd454a92b001', 'Lycéenne', NULL, 'valentine.mace@hotmail.com', 770380091, NULL, NULL, '6 rue de  Bagatelle', 92200, 'Neuilly-sur-Seine', 'France', 2, 1, 'manger, lire, dormir, regarder des sÃ©ries', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(11, 'Duclos', 'Lola', '1994-03-31', 1, '2014-12-23', 'Lolita', 'dc1af77d2e5ce67bbc5547b1bb56771c0b952c77', 'd6573e608231f8a3f8ed4be0e04f54a3', 'Etudiante', NULL, 'lola.duclos@hotmail.fr', 664973811, NULL, NULL, '11375 SW 14t St', 97005, 'Beaverton', 'Etats-Unis', 2, 2, 'lecture, sport, danse', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(12, 'Monteiro', 'Lana', '1994-04-04', 0, '2014-12-24', 'Lan''s', 'cbf61ffd8cce5db2050cb305480c6655f8de74d6', '9406bfc8ded853c9865ed46ef2d31430', 'Etudiante', NULL, 'lana.monteiro@hotmail.fr', 967900761, NULL, NULL, '112 rue brancion', 92170, 'Vanves', 'France', 2, 2, 'lecture, dormir, dessiner', 0, 0, 'DOSSIER_AVATAR25.tmp', '', '', '', 0, 0, 2, 0),
(13, 'Hureau', 'Romain', '1993-08-24', 0, '0000-00-00', 'Dadoooo', '5e2692b7569abb96dfaf802c63685395f9ffba51', '', 'Etudiant', 'FranÃ§ais, Anglais', 'romain.hureau@isep.fr', 650429032, NULL, NULL, '28 rue Notre-Dame-des-Champs', 75006, 'Paris', 'France', 0, 3, 'sÃ©ries', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(14, 'Macé', 'Béatrice', '1999-12-05', 1, '0000-00-00', 'Ecureuil', '15fb5119c046aa0e5a3637484830fd0e80530dce', 'f49c19eada1a71f598a42bf577b23947', 'ElÃ¨ve', 'FranÃ§ais, Anglais, Arabe, Espagnol', 'beabieber999@yahoo.fr', 750449697, NULL, NULL, '6 rue de  Bagatelle', 92200, 'Neuilly-sur-Seine', 'France', 2, 0, 'noisette', 0, 0, 'DOSSIER_AVATAR39.tmp', '', '', '', 0, 0, 2, 0),
(15, 'Isidore', 'Flavien', '1994-08-31', 0, '0000-00-00', 'Flavien', '40a868aa1f3ea1985916de8f617b7b0604cfa467', '', 'ElÃ¨ve', 'FranÃ§ais, Anglais, Allemand', 'flavien.i@hotmail.fr', 618263990, NULL, NULL, '572 Chemin du Viget', 30100, 'AlÃ¨s', 'France', 1, 3, 'diriger le monde', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(16, 'Rouault', 'Maéva', '0000-00-00', 1, '0000-00-00', 'Mimi', '76b7f49ce0dcdd42748690dcf4f2059bec919bd1', '7463993664bd3279ea4ff474f2125630', 'Etudiante', 'FranÃ§ais, Anglais, Espagnol', 'rouault.maeva@isep.fr', 658262399, NULL, NULL, 'Olivier de Serre', 92170, 'Versailles', 'France', 4, 2, 'lire, famille, amis, sojouk', 0, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(18, 'pasInpsirée', 'EncoreMoins', '1111-11-11', 1, '0000-00-00', 'Mwouais', '17ba0791499db908433b80f37c5fbc89b870084b', 'dcdf62ef07bef59040dee69c9bd11df4', 'JmeCasseLaTete', 'Le blablablabla', 'aaaa@aaa.aaa', 0, NULL, NULL, '11 blablablabla', 23333, 'QuequePart', 'Perdu', 99, 99, 'Un peu beaucoup la flemme de compléter ceci, mais je me fais quand même chier à le taper ...............', 1, 0, ''' ''', '', '', '', 0, 0, 2, 0),
(20, 'aaaa', 'aaa', '1111-11-11', 1, '2015-01-15', 'aaaaaa', '70c881d4a26984ddce795f6f71817c9cf4480e79', '', 'aaaaa', 'aaaaa', 'aaaa@aaa.aaa', 0, NULL, NULL, 'aaaaaaa', 99999, 'aaaaa', 'aaa', 2, 2, 'aaaa', 1, 0, 'images/avatar/aaaaaa.png', '', '', '', 0, 0, 2, 0),
(24, 'Pradelle', 'Baptiste', '1994-02-01', 0, '2015-01-16', 'Bapt', 'cce3b81ce1c05726331254f5d3dba8d589a4bfa8', '', 'Etudiant', 'francais', 'baptiste.pradelle@isep.fr', 750449697, NULL, NULL, 'rue Vanves', 99999, 'Vanves', 'France', 1, 1, 'ellypsis', 1, 0, 'images/avatar/Bapt.png', '', '', '', 0, 0, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
