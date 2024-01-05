-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: first_project
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `club_book`
--

DROP TABLE IF EXISTS `club_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club_book` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `club_id` int NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `init_count` int DEFAULT NULL,
  `current_count` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club_book`
--

LOCK TABLES `club_book` WRITE;
/*!40000 ALTER TABLE `club_book` DISABLE KEYS */;
INSERT INTO `club_book` VALUES (1,1,1,'A1-1',5,4,'2023-12-04 09:32:03','2023-12-29 09:59:16',NULL),(2,2,2,'A1-2',4,1,'2023-12-04 09:32:18','2023-12-04 09:32:46',NULL),(3,3,1,'A1-3',6,4,'2023-12-04 09:32:46',NULL,NULL),(4,4,5,'A1-4',5,3,'2023-12-05 02:26:51',NULL,NULL),(5,5,5,'A1-5',7,2,'2023-12-05 02:26:51',NULL,NULL),(6,6,3,'A1-6',9,1,'2023-12-05 03:20:05',NULL,NULL),(7,7,3,'A1-7',8,2,'2023-12-05 03:20:05',NULL,NULL),(8,8,3,'A1-8',7,3,'2023-12-05 03:20:05',NULL,NULL),(9,1,4,'A1-1',6,4,'2023-12-05 03:20:05',NULL,NULL),(10,2,4,'A1-2',5,5,'2023-12-05 03:20:05',NULL,NULL),(11,3,4,'A1-3',4,3,'2023-12-05 03:20:05',NULL,NULL),(12,4,4,'A1-4',3,2,'2023-12-05 03:20:05',NULL,NULL),(13,5,4,'A1-5',2,1,'2023-12-05 03:20:05',NULL,NULL),(14,12,3,'A1-12',7,2,'2024-01-03 01:58:37','2024-01-03 01:58:37',NULL),(15,13,3,'A1-13',10,5,'2024-01-03 02:02:11','2024-01-03 02:02:11',NULL),(16,14,4,'A1-14',4,4,'2024-01-03 02:05:27','2024-01-03 02:05:27',NULL);
/*!40000 ALTER TABLE `club_book` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-05 17:49:32
