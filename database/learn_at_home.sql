-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.42 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for learnathome
CREATE DATABASE IF NOT EXISTS `learnathome` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `learnathome`;

-- Dumping structure for table learnathome.account_type
CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.account_type: ~3 rows (approximately)
INSERT INTO `account_type` (`id`, `name`) VALUES
	(1, 'Student Account'),
	(2, 'Teacher Account'),
	(3, 'Accademic Officer');

-- Dumping structure for table learnathome.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.admin: ~1 rows (approximately)
INSERT INTO `admin` (`email`, `password`) VALUES
	('admin.learnathome@example.com', '1234');

-- Dumping structure for table learnathome.assignments
CREATE TABLE IF NOT EXISTS `assignments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `started_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `file_path` text,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_assignments_user1_idx` (`user_email`),
  CONSTRAINT `fk_assignments_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.assignments: ~0 rows (approximately)

-- Dumping structure for table learnathome.assignment_answers
CREATE TABLE IF NOT EXISTS `assignment_answers` (
  `assignments_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `answersheet_path` text NOT NULL,
  `marks` double DEFAULT NULL,
  `submitted_date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`assignments_id`,`user_email`),
  KEY `fk_assignments_has_user_user1_idx` (`user_email`),
  KEY `fk_assignments_has_user_assignments1_idx` (`assignments_id`),
  CONSTRAINT `fk_assignments_has_user_assignments1` FOREIGN KEY (`assignments_id`) REFERENCES `assignments` (`id`),
  CONSTRAINT `fk_assignments_has_user_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.assignment_answers: ~0 rows (approximately)

-- Dumping structure for table learnathome.lesson_notes
CREATE TABLE IF NOT EXISTS `lesson_notes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `uploaded_date` date DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `file_path` text,
  PRIMARY KEY (`id`),
  KEY `fk_lecture_notes_user1_idx` (`user_email`),
  CONSTRAINT `fk_lecture_notes_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.lesson_notes: ~0 rows (approximately)

-- Dumping structure for table learnathome.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `user_email` varchar(50) NOT NULL,
  `path` text,
  PRIMARY KEY (`user_email`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.profile_image: ~0 rows (approximately)

-- Dumping structure for table learnathome.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  `fName` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `lName` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `verification_code` varchar(45) DEFAULT NULL,
  `verification_status_id` int NOT NULL,
  `account_type_id` int NOT NULL,
  `contact1` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `contact2` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nic` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `registered_date_time` datetime NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_verification_status_idx` (`verification_status_id`),
  KEY `fk_user_account_type1_idx` (`account_type_id`),
  CONSTRAINT `fk_user_account_type1` FOREIGN KEY (`account_type_id`) REFERENCES `account_type` (`id`),
  CONSTRAINT `fk_user_verification_status` FOREIGN KEY (`verification_status_id`) REFERENCES `verification_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.user: ~3 rows (approximately)
INSERT INTO `user` (`email`, `fName`, `lName`, `password`, `verification_code`, `verification_status_id`, `account_type_id`, `contact1`, `contact2`, `address`, `nic`, `registered_date_time`) VALUES
	('kasun.perera@example.com', 'Kasun', 'Perera', 'Student123', NULL, 1, 1, '0771234567', '0711234567', '25 Temple Road, Kurunegala', '200145678901', '2023-08-07 23:39:41'),
	('nimal.fonseka@example.com', 'Nimal', 'Fonseka', 'Teacher123', NULL, 1, 2, '0712345678', '0772345678', '42 Lake Road, Kandy', '198512345678', '2023-01-10 13:13:12'),
	('sanduni.jayawardena@example.com', 'Sanduni', 'Jayawardena', 'Officer123', NULL, 1, 3, '0763456789', '0703456789', '18 Station Road, Galle', '199856789012', '2023-08-07 23:37:49');

-- Dumping structure for table learnathome.verification_status
CREATE TABLE IF NOT EXISTS `verification_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table learnathome.verification_status: ~2 rows (approximately)
INSERT INTO `verification_status` (`id`, `name`) VALUES
	(1, 'Verified'),
	(2, 'Not Verified');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
