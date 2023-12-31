-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_dwwm3
CREATE DATABASE IF NOT EXISTS `forum_dwwm3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forum_dwwm3`;

-- Listage de la structure de table forum_dwwm3. category
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dwwm3.category : ~5 rows (environ)
INSERT INTO `category` (`id_category`, `name`) VALUES
	(1, 'Informatique'),
	(2, 'Jeux Vidéos'),
	(3, 'Nourriture'),
	(4, 'Voyage'),
	(5, 'Sport');

-- Listage de la structure de table forum_dwwm3. member
CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int NOT NULL AUTO_INCREMENT,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dwwm3.member : ~3 rows (environ)
INSERT INTO `member` (`id_member`, `nickname`, `email`, `password`, `role`, `registerDate`) VALUES
	(1, 'blabla1', 'blabla1@mail.com', 'Blabla123', 'Membre', '2023-06-22 15:29:25'),
	(2, 'bloblo', 'bloblo@gmail.com', 'Bloblo123', 'Membre', '2023-06-28 11:42:44'),
	(3, 'blibli', 'blibli@gmail.com', 'Blibli12', 'Membre', '2023-06-28 11:43:30');

-- Listage de la structure de table forum_dwwm3. post
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `member_id` int DEFAULT NULL,
  `topic_id` int DEFAULT NULL,
  PRIMARY KEY (`id_post`),
  KEY `FK_post_member` (`member_id`),
  KEY `FK_post_topic` (`topic_id`),
  CONSTRAINT `FK_post_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`),
  CONSTRAINT `FK_post_topic` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dwwm3.post : ~7 rows (environ)
INSERT INTO `post` (`id_post`, `content`, `dateCreation`, `member_id`, `topic_id`) VALUES
	(1, 'Lel elel blableoedje iedje iqhjdq deqidisjd eq oqdip  eçf^fief<i ief,i snfie  oefinf ', '2023-06-27 10:00:22', 1, 1),
	(2, 'Wahaahhh la rando était trop cool merci pour l\'info', '2023-06-28 11:41:52', 1, 3),
	(5, 'Trop vrai !', '2023-06-28 11:44:02', 2, 3),
	(6, 'cette nouvelle carte m&egrave;re c&#039;est le feu 123dzads', '2023-06-29 09:53:28', 3, 4),
	(7, 'C&#039;est vraiment de la merde mais enfait &ccedil;a va', '2023-06-29 12:23:30', 3, 5),
	(24, 'Ce jeu est magnifique waaahou', '2023-06-30 11:52:25', 3, 6),
	(25, 'La dinguerie niveau dopage ils sont fous ', '2023-06-30 11:52:52', 3, 7);

-- Listage de la structure de table forum_dwwm3. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locked` tinyint DEFAULT '0',
  `member_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `FK_topic_member` (`member_id`),
  KEY `FK_topic_category` (`category_id`),
  CONSTRAINT `FK_topic_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE CASCADE,
  CONSTRAINT `FK_topic_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id_member`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Listage des données de la table forum_dwwm3.topic : ~7 rows (environ)
INSERT INTO `topic` (`id_topic`, `title`, `dateCreation`, `locked`, `member_id`, `category_id`) VALUES
	(1, 'Cette carte graphique est ENORME', '2023-06-22 15:37:34', 0, 1, 1),
	(2, 'Amazing restaurant un Paris', '2023-06-28 10:06:47', 0, 1, 3),
	(3, 'Cette rando dans les Vosges est superbe', '2023-06-28 10:07:11', 0, 1, 4),
	(4, 'Carte mère', '2023-06-29 09:53:28', 0, 3, 1),
	(5, 'McDonald wtf ??', '2023-06-29 12:23:30', 0, 3, 3),
	(6, 'TOTK', '2023-06-30 11:52:25', 0, 3, 2),
	(7, 'Tour de france', '2023-06-30 11:52:52', 0, 3, 5);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
