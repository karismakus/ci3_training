-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ci3_training
CREATE DATABASE IF NOT EXISTS `ci3_training` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ci3_training`;

-- Dumping structure for table ci3_training.articles
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_edited` date DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_articles_articles_category` (`category`),
  CONSTRAINT `FK_articles_articles_category` FOREIGN KEY (`category`) REFERENCES `articles_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_training.articles: ~6 rows (approximately)
DELETE FROM `articles`;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `content`, `date_created`, `date_edited`, `category`) VALUES
	(1, 'Judul 1', 'ini adalah konten', '2020-11-08', NULL, 1),
	(2, 'Judul 2', 'ini adalah konten', '2021-11-09', NULL, 2),
	(3, 'Judul 3', 'ini adalah konten', '2021-11-07', NULL, 3),
	(4, 'Judul 4', 'ini adalah konten', '2021-11-06', NULL, 2),
	(5, 'Judul 5', 'ini adalah konten', '2021-11-10', NULL, 1),
	(6, 'Judul 6', 'ini adalah konten', '2021-11-11', '2021-11-16', 2);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;

-- Dumping structure for table ci3_training.articles_category
CREATE TABLE IF NOT EXISTS `articles_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_training.articles_category: ~2 rows (approximately)
DELETE FROM `articles_category`;
/*!40000 ALTER TABLE `articles_category` DISABLE KEYS */;
INSERT INTO `articles_category` (`id`, `category`) VALUES
	(1, 'Gempa Bumi'),
	(2, 'Cuaca'),
	(3, 'Iklim');
/*!40000 ALTER TABLE `articles_category` ENABLE KEYS */;

-- Dumping structure for table ci3_training.departement
CREATE TABLE IF NOT EXISTS `departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_training.departement: ~2 rows (approximately)
DELETE FROM `departement`;
/*!40000 ALTER TABLE `departement` DISABLE KEYS */;
INSERT INTO `departement` (`id`, `departement`) VALUES
	(1, 'Finance'),
	(2, 'IT');
/*!40000 ALTER TABLE `departement` ENABLE KEYS */;

-- Dumping structure for table ci3_training.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `ID` varchar(18) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `departement_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_employees_departement` (`departement_id`) USING BTREE,
  CONSTRAINT `FK_employees_departement` FOREIGN KEY (`departement_id`) REFERENCES `departement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_training.employees: ~2 rows (approximately)
DELETE FROM `employees`;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`ID`, `name`, `email`, `address`, `phone`, `departement_id`) VALUES
	('199805162021061001', 'Karisma Kusuma Nagari', 'karisma.nagari@bmkg.go.id', 'Jakarta selatan', '085893498607', 1),
	('199805162021062001', 'Kusuma Nagari', 'kusuma@gmail.com', 'Pondok Betung', '085123123123', 2);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table ci3_training.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_training.role: ~0 rows (approximately)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `role`) VALUES
	(1, 'administrator'),
	(2, 'hrd');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table ci3_training.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `avatar` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users_role` (`role_id`),
  CONSTRAINT `FK_users_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_training.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `avatar`) VALUES
	(10, 'karis', 'karis@gmail.com', 'f0f46d191b9de6626c7daebd35335278', 1, 'Screenshot_43.png'),
	(11, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
