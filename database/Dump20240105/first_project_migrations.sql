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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (24,'2023_11_20_083253_create_user_table',1),(48,'2014_10_12_000000_create_users_table',2),(49,'2014_10_12_100000_create_password_resets_table',2),(50,'2019_08_19_000000_create_failed_jobs_table',2),(51,'2019_12_14_000001_create_personal_access_tokens_table',2),(52,'2023_11_20_045042_create_book_table',2),(53,'2023_11_20_071413_create_author_table',2),(54,'2023_11_20_071548_create_category_table',2),(55,'2023_11_20_072418_create_club_table',2),(56,'2023_11_20_072433_create_group_table',2),(57,'2023_11_20_072448_create_permission_table',2),(58,'2023_11_20_072503_create_user_group_table',2),(59,'2023_11_20_072519_create_user_group_permission_table',2),(60,'2023_11_20_072533_create_user_permission_table',2),(61,'2023_11_20_072610_create_order_table',2),(62,'2023_11_20_072623_create_order_detail_table',2),(63,'2023_11_20_072634_create_draft_order_table',2),(64,'2023_11_20_072646_create_draft_order_detail_table',2),(65,'2023_11_20_072657_create_reader_table',2),(66,'2023_11_20_072709_create_member_table',2),(67,'2023_11_20_072730_create_membership_table',2),(68,'2023_11_20_072741_create_otp_table',2),(69,'2023_11_20_072753_create_upload_file_table',2),(70,'2023_11_20_074921_create_club_book_table',2),(71,'2023_12_15_082040_create_book_vote',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
