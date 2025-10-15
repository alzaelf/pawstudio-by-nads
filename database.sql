-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
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


-- Dumping database structure for pawstudio
DROP DATABASE IF EXISTS `pawstudio`;
CREATE DATABASE IF NOT EXISTS `pawstudio` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pawstudio`;

-- Dumping structure for table pawstudio.customers
DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pawstudio.customers: ~3 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `phone`, `address`) VALUES
	(1, 'Nadine Alza', '628123456789', 'Jl. Mawar No.10, Banyuwangi'),
	(2, 'Budi Santoso', '628223456789', 'Jl. Kenanga No.5, Banyuwangi'),
	(3, 'zafwan alzari', '0857890456', 'Jl. california no 9');

-- Dumping structure for table pawstudio.pets
DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `species` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `breed` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `age` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pawstudio.pets: ~2 rows (approximately)
INSERT INTO `pets` (`id`, `customer_id`, `name`, `species`, `breed`, `age`) VALUES
	(1, 1, 'Miko', 'Kucing', 'Persia', 2),
	(4, 1, 'Meme', 'Kucing', 'Anggora', 8);

-- Dumping structure for table pawstudio.services
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pawstudio.services: ~3 rows (approximately)
INSERT INTO `services` (`id`, `service_name`, `price`, `description`) VALUES
	(1, 'Grooming', 50000.00, 'Perawatan bulu dan kuku'),
	(2, 'Vaksinasi', 80000.00, 'Vaksin dasar untuk hewan'),
	(3, 'Penitipan', 120000.00, 'Titip harian');

-- Dumping structure for table pawstudio.transactions
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `pet_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `service_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` date DEFAULT (curdate()),
  `status` enum('pending','done','cancelled') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pawstudio.transactions: ~2 rows (approximately)
INSERT INTO `transactions` (`id`, `customer_name`, `pet_name`, `service_name`, `price`, `date`, `status`) VALUES
	(1, 'Nadine Alza', 'Miko', 'Groomingg', 50000.00, '2025-10-15', 'done'),
	(6, 'Nadine Alza', 'Meme', 'Vaksinasi', 800000.00, '2025-10-15', 'pending');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
