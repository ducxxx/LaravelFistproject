CREATE DATABASE  IF NOT EXISTS `first_project` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `first_project`;
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
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `author` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `author`
--

LOCK TABLES `author` WRITE;
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` VALUES (82,'Brad Stone','2023-12-04 01:22:54',NULL,NULL),(83,'Edward Snowden','2023-12-04 01:23:44',NULL,NULL),(84,'Frank McCourt','2023-12-04 01:24:00','2023-12-04 01:24:09',NULL),(85,'Phil Knight','2023-12-04 01:24:57',NULL,NULL),(86,'Alex Ferguson','2023-12-04 01:24:57',NULL,NULL),(87,'Jessica Easto','2023-12-04 01:24:57',NULL,NULL),(88,'Trần Vỹ','2023-12-04 01:24:57',NULL,NULL),(89,'Bùi Công Dụng','2023-12-04 01:24:57',NULL,NULL),(90,'Viktor Emil Frankl','2024-01-03 01:15:57','2024-01-03 01:15:57',NULL),(91,'Dale Carnegie','2024-01-03 02:05:27','2024-01-03 02:05:27',NULL);
/*!40000 ALTER TABLE `author` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int NOT NULL,
  `author_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'Jeff Bezos và kỷ nguyên Amazon',1,82,NULL,'2023-12-04 01:27:41','2023-12-04 01:29:04',NULL,NULL),(2,'Bị theo dõi',1,83,NULL,'2023-12-04 01:28:26','2023-12-04 01:29:04',NULL,NULL),(3,'Người thầy',2,84,NULL,'2023-12-04 01:28:46','2023-12-04 01:29:04',NULL,NULL),(4,'Gã nghiện giày',3,85,NULL,'2023-12-04 01:29:26',NULL,NULL,NULL),(5,'Hồi ký Alex Ferguson',4,86,NULL,'2023-12-04 01:29:46',NULL,NULL,NULL),(6,'Elon Musk muốn thay đổi thế giới',1,87,NULL,'2023-12-04 01:30:06',NULL,NULL,NULL),(7,'Tôi là Jack Ma',1,88,NULL,'2023-12-04 01:30:26',NULL,NULL,NULL),(8,'Ký sự Sơn Trà',2,89,NULL,'2023-12-04 01:30:45',NULL,NULL,NULL),(9,'Sách Đi Tìm Lẽ Sống',1,90,NULL,'2024-01-03 01:22:06','2024-01-03 01:22:06',NULL,NULL),(10,'Sách Đi Tìm Lẽ Sống Sống',1,90,NULL,'2024-01-03 01:24:22','2024-01-03 01:24:22',NULL,NULL),(11,'Sách Đi Tìm Lẽ Sống Sống Sap',1,90,NULL,'2024-01-03 01:26:48','2024-01-03 01:26:48',NULL,NULL),(12,'Sách Đi Tìm Lẽ Sống Sống Sao',1,90,NULL,'2024-01-03 01:58:37','2024-01-03 01:58:37',NULL,NULL),(13,'Sách Đi Tìm Lẽ Sống Sống Sao 1',1,90,NULL,'2024-01-03 02:02:11','2024-01-03 02:02:11',NULL,NULL),(14,'Đắc nhân tâm',7,91,NULL,'2024-01-03 02:05:27','2024-01-03 02:05:27',NULL,NULL);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_vote`
--

DROP TABLE IF EXISTS `book_vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_vote` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_comment` text COLLATE utf8mb4_unicode_ci,
  `book_id` int NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `star_vote` int NOT NULL DEFAULT '5',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_vote`
--

LOCK TABLES `book_vote` WRITE;
/*!40000 ALTER TABLE `book_vote` DISABLE KEYS */;
INSERT INTO `book_vote` VALUES (1,NULL,1,2,1,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(2,NULL,1,3,2,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(3,NULL,1,4,3,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(4,NULL,2,2,4,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(5,NULL,2,2,5,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(6,NULL,2,2,5,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(7,NULL,3,3,4,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(8,NULL,3,4,3,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(9,'Sach Hay, Doc cuon hut, tot cho nhieu nguoi',4,2,2,'2023-12-18 07:38:26','2024-01-09 07:05:40',NULL),(10,'sach hoc hoi co the mo rong nnn',4,3,1,'2023-12-18 07:38:26','2024-01-09 07:05:40',NULL),(11,NULL,5,6,1,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(12,NULL,3,2,2,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(13,NULL,6,5,3,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(14,NULL,5,7,4,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(15,NULL,3,8,5,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(16,NULL,7,4,5,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(17,NULL,7,5,4,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(18,NULL,8,6,3,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(19,NULL,8,7,2,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(20,NULL,8,8,1,'2023-12-18 07:38:26','2024-01-08 09:46:52',NULL),(21,'sach hay can doc ngay',4,1,3,'2024-01-09 08:57:58','2024-01-09 08:57:58',NULL),(22,NULL,4,1,5,'2024-01-09 09:12:40','2024-01-09 09:12:40',NULL),(23,NULL,4,1,5,'2024-01-09 09:12:43','2024-01-09 09:12:43',NULL),(24,NULL,4,1,5,'2024-01-09 09:12:50','2024-01-09 09:12:50',NULL),(25,'Sach hay qua troi',4,1,4,'2024-01-09 09:21:47','2024-01-09 09:21:47',NULL);
/*!40000 ALTER TABLE `book_vote` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Tiểu sử - hồi ký','2023-12-04 01:27:03',NULL,NULL),(2,'Trinh thám','2023-12-04 01:27:03',NULL,NULL),(3,'Chính trị – pháp luật','2023-12-04 01:27:03',NULL,NULL),(4,'Khoa học công nghệ – Kinh tế','2023-12-04 01:27:03',NULL,NULL),(5,'Văn học nghệ thuật','2023-12-04 01:27:03',NULL,NULL),(6,'Giáo trình','2023-12-04 01:27:03',NULL,NULL),(7,'Dale Carnegie','2024-01-03 02:05:27','2024-01-03 02:05:27',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `club` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES (1,'CLB Sách Chuyên Hùng Vương','Việt Trì','Trao đổi sách - Trao đổi đam mê','2023-12-04 06:49:53',NULL,NULL),(2,'CLB Sách FPT','Đại Học FPT','Đây là câu lạc bộ sách trường đại học FPT ssss','2023-12-04 06:49:53','2023-12-04 08:04:20',NULL),(3,'D Free Book Đại La','Đại La- Hà Nội','D Free Book là thư viện \"3 không\": Không đặt cọc, không thu phí và không giới hạn đối tượng. Sách ở đây là MIỄN PHÍ! Thời gian mở cửa: 8h30 - 22h mỗi ngày Liên hệ: 0962.188.248. https://www.facebook.com/dfreebook','2023-12-04 06:49:53',NULL,NULL),(4,'D Free Book Cầu Giấy','Cầu Giấy-Hà Nội','D Free Book là thư viện \"3 không\": Không đặt cọc, không thu phí và không giới hạn đối tượng. Sách ở đây là MIỄN PHÍ! Thời gian mở cửa: 8h30 - 11h, 14h - 20h30 mỗi ngày Liên hệ: 0986.689.024 https://www.facebook.com/dfreebook','2023-12-04 06:49:53',NULL,NULL),(5,'Free Book Test','Test-Adress','Chúng mình là thư viện cộng đồng cho mượn sách','2023-12-05 02:26:02',NULL,NULL);
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `draft_order`
--

DROP TABLE IF EXISTS `draft_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `draft_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order` int NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` timestamp NOT NULL,
  `due_date` timestamp NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `draft_order`
--

LOCK TABLES `draft_order` WRITE;
/*!40000 ALTER TABLE `draft_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `draft_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `draft_order_detail`
--

DROP TABLE IF EXISTS `draft_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `draft_order_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `draft_order_id` int NOT NULL,
  `club_book_id` int NOT NULL,
  `return_date` timestamp NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `draft_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `draft_order_detail`
--

LOCK TABLES `draft_order_detail` WRITE;
/*!40000 ALTER TABLE `draft_order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `draft_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,2,'Ngo32 - Yên hòa - Ha noi','2000-08-24 00:00:00','ducnmhe@gmail.com','Nguyen Minh Duc','0359727297','2023-12-12 01:50:17','2023-12-28 08:55:45',NULL),(2,9,'Ha Noi','2000-08-23 00:00:00','ducdeptrai2308@gmail.com','nguyen duc duc','0999999999','2023-12-20 10:16:31','2023-12-20 10:16:31',NULL),(3,1,'HN8','2003-03-02 00:00:00','vanxinh@gmail.com','Nguyen van','0999934343435','2023-12-28 07:25:41','2023-12-28 08:56:54',NULL),(4,12,'đại học FPT',NULL,'ducnmhe1414677@gmail.com','Duc Nguyen','0359727297','2024-01-03 02:20:39','2024-01-03 02:20:39',NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership`
--

DROP TABLE IF EXISTS `membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membership` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `club_book_id` int NOT NULL,
  `member_id` int NOT NULL,
  `leaved_at` date NOT NULL,
  `joined_at` timestamp NOT NULL,
  `is_staff` tinyint(1) NOT NULL,
  `member_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership`
--

LOCK TABLES `membership` WRITE;
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (24,'2023_11_20_083253_create_user_table',1),(48,'2014_10_12_000000_create_users_table',2),(49,'2014_10_12_100000_create_password_resets_table',2),(50,'2019_08_19_000000_create_failed_jobs_table',2),(51,'2019_12_14_000001_create_personal_access_tokens_table',2),(52,'2023_11_20_045042_create_book_table',2),(53,'2023_11_20_071413_create_author_table',2),(54,'2023_11_20_071548_create_category_table',2),(55,'2023_11_20_072418_create_club_table',2),(56,'2023_11_20_072433_create_group_table',2),(57,'2023_11_20_072448_create_permission_table',2),(58,'2023_11_20_072503_create_user_group_table',2),(59,'2023_11_20_072519_create_user_group_permission_table',2),(60,'2023_11_20_072533_create_user_permission_table',2),(61,'2023_11_20_072610_create_order_table',2),(62,'2023_11_20_072623_create_order_detail_table',2),(63,'2023_11_20_072634_create_draft_order_table',2),(64,'2023_11_20_072646_create_draft_order_detail_table',2),(65,'2023_11_20_072657_create_reader_table',2),(66,'2023_11_20_072709_create_member_table',2),(67,'2023_11_20_072730_create_membership_table',2),(68,'2023_11_20_072741_create_otp_table',2),(69,'2023_11_20_072753_create_upload_file_table',2),(70,'2023_11_20_074921_create_club_book_table',2),(71,'2023_12_15_082040_create_book_vote',3),(72,'2024_01_08_092157_create_book_comments_table',4),(73,'2024_01_08_094435_add_user_id_to_book_votes',5),(74,'2024_01_09_013457_delete_book_comments_table',6),(75,'2024_01_09_013515_add_book_comment_to_book_votes',7),(76,'2024_01_11_030633_add_otp_code_and_limit_time_verify_to_users_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `club_id` int NOT NULL,
  `order_date` datetime NOT NULL,
  `due_date` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,1,1,'2023-12-12 00:00:00','2023-12-12 00:00:00','2023-12-12 04:45:56',NULL,NULL),(2,1,2,'2023-12-11 00:00:00','2023-12-30 00:00:00','2023-12-12 04:45:56',NULL,NULL),(3,1,5,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 07:10:57','2023-12-21 07:10:57',NULL),(4,1,5,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 07:12:10','2023-12-21 07:12:10',NULL),(5,1,5,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 07:13:45','2023-12-21 07:13:45',NULL),(6,1,5,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 07:15:29','2023-12-21 07:15:29',NULL),(7,1,3,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 07:17:05','2023-12-21 07:17:05',NULL),(8,1,5,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 07:21:28','2023-12-21 07:21:28',NULL),(9,1,4,'2023-12-21 00:00:00','2024-01-21 00:00:00','2023-12-21 09:20:50','2023-12-21 09:20:50',NULL),(10,1,5,'2023-12-26 00:00:00','2024-01-26 00:00:00','2023-12-26 08:57:56','2023-12-26 08:57:56',NULL),(11,1,5,'2023-12-26 00:00:00','2024-01-26 00:00:00','2023-12-26 08:59:03','2023-12-26 08:59:03',NULL),(12,1,3,'2023-12-26 00:00:00','2024-01-26 00:00:00','2023-12-26 09:03:30','2023-12-26 09:03:30',NULL),(13,1,5,'2023-12-26 00:00:00','2024-01-26 00:00:00','2023-12-26 09:06:52','2023-12-26 09:06:52',NULL),(14,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:25:41','2023-12-28 07:25:41',NULL),(15,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:32:47','2023-12-28 07:32:47',NULL),(16,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:35:39','2023-12-28 07:35:39',NULL),(17,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:36:53','2023-12-28 07:36:53',NULL),(18,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:37:53','2023-12-28 07:37:53',NULL),(19,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:39:14','2023-12-28 07:39:14',NULL),(20,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:39:53','2023-12-28 07:39:53',NULL),(21,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:40:59','2023-12-28 07:40:59',NULL),(22,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:41:12','2023-12-28 07:41:12',NULL),(23,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:41:45','2023-12-28 07:41:45',NULL),(24,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:43:20','2023-12-28 07:43:20',NULL),(25,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:43:45','2023-12-28 07:43:45',NULL),(26,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:45:28','2023-12-28 07:45:28',NULL),(27,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:49:42','2023-12-28 07:49:42',NULL),(28,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:51:19','2023-12-28 07:51:19',NULL),(29,3,4,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:51:45','2023-12-28 07:51:45',NULL),(30,3,4,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:51:55','2023-12-28 07:51:55',NULL),(31,3,4,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:53:22','2023-12-28 07:53:22',NULL),(32,3,3,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:54:35','2023-12-28 07:54:35',NULL),(33,3,3,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:57:23','2023-12-28 07:57:23',NULL),(34,3,3,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:57:43','2023-12-28 07:57:43',NULL),(35,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:58:07','2023-12-28 07:58:07',NULL),(36,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:58:40','2023-12-28 07:58:40',NULL),(37,3,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 07:59:59','2023-12-28 07:59:59',NULL),(38,1,5,'2023-12-28 00:00:00','2024-01-28 00:00:00','2023-12-28 10:27:57','2023-12-28 10:27:57',NULL),(39,4,5,'2024-01-03 00:00:00','2024-02-03 00:00:00','2024-01-03 02:20:39','2024-01-03 02:20:39',NULL),(40,1,5,'2024-01-03 00:00:00','2024-02-03 00:00:00','2024-01-03 10:32:16','2024-01-03 10:32:16',NULL),(41,1,3,'2024-01-08 00:00:00','2024-02-08 00:00:00','2024-01-08 03:48:07','2024-01-08 03:48:07',NULL),(42,1,5,'2024-01-08 00:00:00','2024-02-08 00:00:00','2024-01-08 04:27:31','2024-01-08 04:27:31',NULL),(43,3,3,'2024-01-10 00:00:00','2024-02-10 00:00:00','2024-01-10 08:00:52','2024-01-10 08:00:52',NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `club_book_id` int NOT NULL,
  `return_date` timestamp NULL DEFAULT NULL,
  `overdue_day_count` int DEFAULT '0',
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (1,1,1,'2023-12-28 09:02:57',0,NULL,'2','2023-12-12 06:45:56','2023-12-26 08:47:32',NULL),(2,1,3,'2023-12-28 09:02:57',0,NULL,'2','2023-12-12 06:46:25','2023-12-26 08:47:32',NULL),(3,2,2,'2023-12-29 09:02:57',0,NULL,'2','2023-12-12 06:47:16','2024-01-04 01:37:08',NULL),(4,2,4,'2023-12-29 09:02:57',0,NULL,'2','2023-12-12 06:47:16','2024-01-04 01:37:08',NULL),(5,6,4,NULL,0,NULL,'2','2023-12-21 07:15:29','2023-12-26 08:47:32',NULL),(6,6,5,NULL,0,NULL,'2','2023-12-21 07:15:29','2023-12-26 08:47:32',NULL),(7,7,6,NULL,0,NULL,'2','2023-12-21 07:17:05','2023-12-26 08:47:32',NULL),(8,7,7,NULL,0,NULL,'2','2023-12-21 07:17:05','2023-12-26 08:47:32',NULL),(9,8,4,NULL,0,NULL,'2','2023-12-21 07:21:28','2023-12-26 08:47:32',NULL),(10,8,5,NULL,0,NULL,'2','2023-12-21 07:21:28','2023-12-26 08:47:32',NULL),(11,9,11,NULL,0,NULL,'2','2023-12-21 09:20:50','2023-12-26 08:47:32',NULL),(12,9,12,NULL,0,NULL,'2','2023-12-21 09:20:50','2023-12-26 08:47:32',NULL),(13,9,13,NULL,0,NULL,'2','2023-12-21 09:20:50','2023-12-26 08:47:32',NULL),(14,10,4,NULL,0,NULL,'2','2023-12-26 08:57:56','2023-12-26 09:03:17',NULL),(15,10,5,NULL,0,NULL,'2','2023-12-26 08:57:56','2023-12-26 09:03:20',NULL),(16,11,4,NULL,0,NULL,'2','2023-12-26 08:59:03','2023-12-28 10:27:41',NULL),(17,11,5,NULL,0,NULL,'2','2023-12-26 08:59:03','2023-12-26 09:05:59',NULL),(18,12,6,NULL,0,NULL,'2','2023-12-26 09:03:30','2023-12-26 09:05:59',NULL),(19,12,7,NULL,0,NULL,'2','2023-12-26 09:03:30','2023-12-26 09:05:59',NULL),(20,13,4,NULL,0,NULL,'0','2023-12-26 09:06:52','2023-12-26 09:06:52',NULL),(21,13,5,NULL,0,NULL,'2','2023-12-26 09:06:52','2024-01-04 04:26:17',NULL),(22,37,4,NULL,0,NULL,'0','2023-12-28 07:59:59',NULL,NULL),(23,37,5,NULL,0,NULL,'1','2023-12-28 07:59:59','2024-01-04 04:02:18',NULL),(24,38,5,NULL,0,NULL,'2','2023-12-28 10:27:57','2023-12-28 10:28:36',NULL),(25,39,4,NULL,0,NULL,'1','2024-01-03 02:20:39','2024-01-04 04:02:04',NULL),(26,40,4,NULL,0,NULL,'2','2024-01-03 10:32:16','2024-01-08 04:27:20',NULL),(27,41,7,NULL,0,NULL,'2','2024-01-08 03:48:07','2024-01-08 04:27:20',NULL),(28,42,4,NULL,0,NULL,'0','2024-01-08 04:27:31',NULL,NULL),(29,43,8,NULL,0,NULL,'0','2024-01-10 08:00:52',NULL,NULL);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `otp` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` timestamp NOT NULL,
  `enable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_sid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp`
--

LOCK TABLES `otp` WRITE;
/*!40000 ALTER TABLE `otp` DISABLE KEYS */;
/*!40000 ALTER TABLE `otp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reader`
--

DROP TABLE IF EXISTS `reader`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reader` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` timestamp NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reader`
--

LOCK TABLES `reader` WRITE;
/*!40000 ALTER TABLE `reader` DISABLE KEYS */;
/*!40000 ALTER TABLE `reader` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_file`
--

DROP TABLE IF EXISTS `upload_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `upload_file` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `upload_at` timestamp NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_file`
--

LOCK TABLES `upload_file` WRITE;
/*!40000 ALTER TABLE `upload_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group`
--

DROP TABLE IF EXISTS `user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_group` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `group_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group`
--

LOCK TABLES `user_group` WRITE;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_group_permission`
--

DROP TABLE IF EXISTS `user_group_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_group_permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int NOT NULL,
  `permission_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_group_permission`
--

LOCK TABLES `user_group_permission` WRITE;
/*!40000 ALTER TABLE `user_group_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_group_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_permission`
--

DROP TABLE IF EXISTS `user_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permission` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `permission_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permission`
--

LOCK TABLES `user_permission` WRITE;
/*!40000 ALTER TABLE `user_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_superuser` tinyint(1) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_staff` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `date_joined` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `otp_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_time_verify` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$rH0dvvDt10I6Hok7LAKxNerDCpEit3YZIln6BMasSogYztPfJca8S',NULL,NULL,'vanxinh12',NULL,NULL,NULL,1,NULL,'Nguyen van','vanxinh@gmail.com','HN8','2003-03-02','0999934343435','avatars/0f5NLWNi3cGb0cbDX4yZGlhCVCFyMC9evIrdPoxg.jpg','2023-11-28 07:26:50','2024-01-11 04:32:48',NULL,'IL5rpvRf','2024-01-11 04:37:34'),(2,'$2y$10$kkFTZtw.M3kEIESx2oxNFe4pDy66fJNfZEL/r3TFTGXMINQ4o4SX2',NULL,NULL,'ducxx',NULL,NULL,1,1,NULL,'Nguyen Minh Duc','ilovefcbclub@gmail.com','Ngo32 - Yên hòa - Ha noi','2000-08-24','0359727297','avatars/Y3ycwsHtmGzfWoKMqc47PyzSMV24W5cgDUECRPpw.jpg','2023-11-28 09:02:57','2024-01-11 04:16:47',NULL,'fZChgsHH','2024-01-11 04:21:47'),(3,'$2y$10$bTXQqmtiJURxBl5AGEetPOSAr6lwunxPb9A.smneico01BWr2VOoG',NULL,NULL,'ducxx12',NULL,NULL,NULL,NULL,NULL,'Nguyen Duc','ilovefcbclub2@gmail.com',NULL,NULL,'359727297',NULL,'2023-11-30 03:13:57','2023-12-13 02:09:47',NULL,NULL,NULL),(4,'$2y$10$Oq.6IyPQ5h9SMVMqHvmaZupABAYHTnpbAfqZdslegfIb79ozkQ.Fe',NULL,NULL,'ducxxxxx',NULL,NULL,NULL,NULL,NULL,'Nguyen Minh Duc','ilovefcbclub123@gmail.com',NULL,NULL,'0987676767',NULL,'2023-12-13 03:23:10','2023-12-13 03:23:10',NULL,NULL,NULL),(5,'$2y$10$XxtkhQ1U92Pl8Ewk976OKu3/Iox2Xnji.GgF8M8H/pWMjS6Xur9/y',NULL,NULL,'ducxxxxxvc',NULL,NULL,NULL,NULL,NULL,'Nguyen Minh Duc','ilovefcb@gmail.com',NULL,NULL,'09876767672323',NULL,'2023-12-13 03:24:21','2023-12-13 03:24:21',NULL,NULL,NULL),(6,'$2y$10$ODTJtEEtLBcqp508tz2D2.dEBD4eCsyF6EyB6sDJpPaG/VNDLoZQe',NULL,NULL,'vanxinhxx',NULL,NULL,NULL,NULL,NULL,'nguyen hong van','vannguyen23@gmail.com',NULL,NULL,'0987772232323',NULL,'2023-12-13 03:28:29','2023-12-13 03:28:29',NULL,NULL,NULL),(7,'$2y$10$8oQFjf5pRvmUv6b6uYwkoOMKfId72HMRKbS3wW50w63inGFdMm2ui',NULL,NULL,'minhduc2308',NULL,NULL,NULL,NULL,NULL,'Nguyen Minh Duc','ilovefcbclub2332@gmail.com',NULL,NULL,'0999837744',NULL,'2023-12-14 08:13:32','2023-12-14 08:13:32',NULL,NULL,NULL),(8,'$2y$10$Occ0vX/BF8gVhJZvlzarSu.T9mxRlSjWdJsLiI.M6hk9.xOl/Mr1S',NULL,NULL,'ducxx234',NULL,NULL,NULL,NULL,NULL,'nguyen duc minh','ilovefcbclub232323@gmail.com',NULL,NULL,'359727297',NULL,'2023-12-19 08:27:55','2024-01-11 03:18:10',NULL,NULL,NULL),(9,'$2y$10$r1PhxBBngo4ZiwToUMpYMuy1lBXKCNsBAnaFji/wEMyUAbr3ve1ny',NULL,NULL,'ducminh1',NULL,NULL,NULL,NULL,NULL,'nguyen duc duc','ducdeptrai2308@gmail.com','Ha Noi','2000-08-23','0999999999',NULL,'2023-12-20 10:07:08','2023-12-20 10:16:12',NULL,NULL,NULL),(10,'$2y$10$JLhtxwAhWF4qi.uM2k/8UukCpc2aj0baGkGeGm6lG2Oj4oROZfZc2',NULL,NULL,'ducxx23082000',NULL,NULL,NULL,NULL,NULL,'nguyen duc xx','ilovefcbclubggg@gmail.com',NULL,NULL,'099999999999',NULL,'2023-12-21 08:55:35','2023-12-21 08:55:35',NULL,NULL,NULL),(11,'$2y$10$E2ruUlEFpOkMxGZ/ZxnZO.cxFIwXxXp3rB.LicoWb4L2yrnU0/ui2',NULL,NULL,'ducxx2323232',NULL,NULL,NULL,NULL,NULL,'nguyen minhhhhhh','ilovefcbclub232323232@gmail.com',NULL,NULL,'359727297',NULL,'2023-12-21 09:06:09','2023-12-21 09:06:09',NULL,NULL,NULL),(12,'$2y$10$Bc069KK8TkIqN5.NT5eN5OhNfrEkQ9InqG/422CTGxJKS4tm/pX66',NULL,NULL,'ducxx346',NULL,NULL,NULL,NULL,NULL,'Duc Nguyen','ducnmhe1414677@gmail.com',NULL,NULL,'0359727297',NULL,'2024-01-03 02:19:44','2024-01-03 02:19:44',NULL,NULL,NULL),(13,'$2y$10$Kx/VQyGDm.ViO1jfIKlEV.xY6ZBwrIC5BRp8NbYl3CpyEE7QFOoGe',NULL,NULL,'vanxinh1223',NULL,NULL,NULL,NULL,NULL,'NGuyen Hong Van','duckjkkjkj@gmail.com',NULL,NULL,'099992323232',NULL,'2024-01-09 08:03:54','2024-01-09 08:03:54',NULL,NULL,NULL),(14,'$2y$10$85EzxmiTsL.yVCE6HPybvul82aSXNIqKFvklTnmzDJtjhIA1OyJSG',NULL,NULL,'vanxinh123456',NULL,NULL,NULL,1,NULL,'nguyen Hong Van XX','vannguyenXX@gmail.com',NULL,NULL,'09999923232323',NULL,'2024-01-11 04:35:15','2024-01-11 04:41:40',NULL,'rf8UKzOR','2024-01-11 04:45:43'),(15,'$2y$10$/3kGIL386Hi7ghLp8AQUz.qp4ym./xvGLQtjw1BwfUEpJ0qX8nbLS',NULL,NULL,'ducxx789',NULL,NULL,NULL,NULL,NULL,'Duc Minh','ilovefcbclub34521@gmail.com',NULL,NULL,'35972729723',NULL,'2024-01-11 04:43:18','2024-01-11 04:43:18',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'first_project'
--

--
-- Dumping routines for database 'first_project'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-11 20:28:10
