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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'$2y$10$rH0dvvDt10I6Hok7LAKxNerDCpEit3YZIln6BMasSogYztPfJca8S',NULL,NULL,'vanxinh12',NULL,NULL,NULL,NULL,NULL,'Nguyen van','vanxinh@gmail.com','HN8','2003-03-02','0999934343435','avatars/0f5NLWNi3cGb0cbDX4yZGlhCVCFyMC9evIrdPoxg.jpg','2023-11-28 07:26:50','2023-12-28 08:56:54',NULL),(2,'$2y$10$kkFTZtw.M3kEIESx2oxNFe4pDy66fJNfZEL/r3TFTGXMINQ4o4SX2',NULL,NULL,'ducxx',NULL,NULL,1,NULL,NULL,'Nguyen Minh Duc','ducnmhe@gmail.com','Ngo32 - Yên hòa - Ha noi','2000-08-24','0359727297','avatars/3gN3jSd5yOfzdiT6xMXzUzGFwYTahkcXZFsc1JGQ.jpg','2023-11-28 09:02:57','2023-12-28 08:57:16',NULL),(3,'$2y$10$bTXQqmtiJURxBl5AGEetPOSAr6lwunxPb9A.smneico01BWr2VOoG',NULL,NULL,'ducxx12',NULL,NULL,NULL,NULL,NULL,'Nguyen Duc','ilovefcbclub2@gmail.com',NULL,NULL,'359727297',NULL,'2023-11-30 03:13:57','2023-12-13 02:09:47',NULL),(4,'$2y$10$Oq.6IyPQ5h9SMVMqHvmaZupABAYHTnpbAfqZdslegfIb79ozkQ.Fe',NULL,NULL,'ducxxxxx',NULL,NULL,NULL,NULL,NULL,'Nguyen Minh Duc','ilovefcbclub123@gmail.com',NULL,NULL,'0987676767',NULL,'2023-12-13 03:23:10','2023-12-13 03:23:10',NULL),(5,'$2y$10$XxtkhQ1U92Pl8Ewk976OKu3/Iox2Xnji.GgF8M8H/pWMjS6Xur9/y',NULL,NULL,'ducxxxxxvc',NULL,NULL,NULL,NULL,NULL,'Nguyen Minh Duc','ilovefcb@gmail.com',NULL,NULL,'09876767672323',NULL,'2023-12-13 03:24:21','2023-12-13 03:24:21',NULL),(6,'$2y$10$ODTJtEEtLBcqp508tz2D2.dEBD4eCsyF6EyB6sDJpPaG/VNDLoZQe',NULL,NULL,'vanxinhxx',NULL,NULL,NULL,NULL,NULL,'nguyen hong van','vannguyen23@gmail.com',NULL,NULL,'0987772232323',NULL,'2023-12-13 03:28:29','2023-12-13 03:28:29',NULL),(7,'$2y$10$8oQFjf5pRvmUv6b6uYwkoOMKfId72HMRKbS3wW50w63inGFdMm2ui',NULL,NULL,'minhduc2308',NULL,NULL,NULL,NULL,NULL,'Nguyen Minh Duc','ilovefcbclub2332@gmail.com',NULL,NULL,'0999837744',NULL,'2023-12-14 08:13:32','2023-12-14 08:13:32',NULL),(8,'$2y$10$Occ0vX/BF8gVhJZvlzarSu.T9mxRlSjWdJsLiI.M6hk9.xOl/Mr1S',NULL,NULL,'ducxx234',NULL,NULL,NULL,NULL,NULL,'nguyen duc minh','ilovefcbclub@gmail.com',NULL,NULL,'359727297',NULL,'2023-12-19 08:27:55','2023-12-19 08:27:55',NULL),(9,'$2y$10$r1PhxBBngo4ZiwToUMpYMuy1lBXKCNsBAnaFji/wEMyUAbr3ve1ny',NULL,NULL,'ducminh1',NULL,NULL,NULL,NULL,NULL,'nguyen duc duc','ducdeptrai2308@gmail.com','Ha Noi','2000-08-23','0999999999',NULL,'2023-12-20 10:07:08','2023-12-20 10:16:12',NULL),(10,'$2y$10$JLhtxwAhWF4qi.uM2k/8UukCpc2aj0baGkGeGm6lG2Oj4oROZfZc2',NULL,NULL,'ducxx23082000',NULL,NULL,NULL,NULL,NULL,'nguyen duc xx','ilovefcbclubggg@gmail.com',NULL,NULL,'099999999999',NULL,'2023-12-21 08:55:35','2023-12-21 08:55:35',NULL),(11,'$2y$10$E2ruUlEFpOkMxGZ/ZxnZO.cxFIwXxXp3rB.LicoWb4L2yrnU0/ui2',NULL,NULL,'ducxx2323232',NULL,NULL,NULL,NULL,NULL,'nguyen minhhhhhh','ilovefcbclub232323232@gmail.com',NULL,NULL,'359727297',NULL,'2023-12-21 09:06:09','2023-12-21 09:06:09',NULL),(12,'$2y$10$Bc069KK8TkIqN5.NT5eN5OhNfrEkQ9InqG/422CTGxJKS4tm/pX66',NULL,NULL,'ducxx346',NULL,NULL,NULL,NULL,NULL,'Duc Nguyen','ducnmhe1414677@gmail.com',NULL,NULL,'0359727297',NULL,'2024-01-03 02:19:44','2024-01-03 02:19:44',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-05 17:49:33
