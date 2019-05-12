-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: c9
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_number` int(11) NOT NULL,
  `item_amount` int(11) NOT NULL,
  `published` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_namekana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hqAddress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foundedYear` int(11) NOT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `companyURL` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `revenue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `internationalWorkersPercentage` int(11) DEFAULT NULL,
  `pyHiringResult` int(11) DEFAULT NULL,
  `menWomenRatio` int(11) DEFAULT NULL,
  `japaneselevel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hiringReason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (5,'AWS','アブロード',NULL,'http://www.squeeze.com.br/assets/img/sample/woocommerce/img/logo/1.png','307000','Tokyo, Japan','Yes',2018,'HR','Detail','https://www.ge.com/jp/','2019-05-04 10:17:41','2019-05-04 10:17:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Rakuten','ラクテン',NULL,'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Rakuten_Global_Brand_Logo.svg/450px-Rakuten_Global_Brand_Logo.svg.png','307000','Tokyo, Japan','Yes',2018,'HR','Detail','https://www.ge.com/jp/','2019-05-04 11:50:58','2019-05-04 11:50:58',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'ANA','アナ',NULL,'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/All_Nippon_Airways_Logo.svg/360px-All_Nippon_Airways_Logo.svg.png','307000','Tokyo, Japan','Yes',2018,'HR','Detail','https://www.ge.com/jp/','2019-05-04 11:51:55','2019-05-04 11:51:55',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'リクルート','アブロード',NULL,'http://www.squeeze.com.br/assets/img/sample/woocommerce/img/logo/1.png','307000','Tokyo, Japan','Yes',2018,'HR','Detail','https://www.ge.com/jp/','2019-05-11 11:12:15','2019-05-11 11:12:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (95,'2014_10_12_000000_create_users_table',1),(96,'2014_10_12_100000_create_password_resets_table',1),(97,'2019_04_20_064143_create_companies_table',1),(98,'2019_04_20_075525_create_books_table',1),(99,'2019_04_21_050105_create_reviews_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enrollment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_function_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_division` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_env_rate` int(11) DEFAULT NULL,
  `promotion_rate` int(11) DEFAULT NULL,
  `work_life_balance_rate` int(11) DEFAULT NULL,
  `gap_rate` int(11) DEFAULT NULL,
  `c_and_b_rate` int(11) DEFAULT NULL,
  `gender_equality_rate` int(11) DEFAULT NULL,
  `compliance_rate` int(11) DEFAULT NULL,
  `overtime` int(11) DEFAULT NULL,
  `work_env` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screening` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `growth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender_equality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_and_b` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `compliance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'LINE','4','3','temporary',NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Fair treatment of non-Japanese employees: Use of languages other than Japanese:',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 10:06:35','2019-05-04 10:06:35'),(2,'LINE','4','3','temporary','on',NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Fair treatment of non-Japanese employees: Use of languages other than Japanese:',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 10:16:10','2019-05-04 10:16:10'),(3,'Abroad','2','3','internship',NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Fair treatment of non-Japanese employees: Use of languages other than Japanese:',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 10:16:26','2019-05-04 10:16:26'),(4,'LINE','4','2','internship',NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Fair treatment of non-Japanese employees: Use of languages other than Japanese:',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 10:18:53','2019-05-04 10:18:53'),(5,'AWS','5','2','temporary',NULL,NULL,NULL,NULL,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'いい会社',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 11:53:41','2019-05-04 11:53:41'),(6,'AWS','5','2','temporary',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'最悪',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 11:56:24','2019-05-04 11:56:24'),(8,'LINE','8','2','contract',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'最悪！',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-04 12:32:33','2019-05-04 12:32:33'),(9,'LINE','8','2','contract',NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'あああ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-06 08:58:12','2019-05-06 08:58:12'),(10,'Rakuten','6','2','contract',NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Fair treatment of non-Japanese employees: Use of languages other than Japanese:',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-11 08:18:19','2019-05-11 08:18:19');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminflag` tinyint(1) DEFAULT NULL,
  `reviewflag` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'カサイテツ','kasai@gmail.com','$2y$10$xS314IuCoFSDXRZIdxxYNOWAWwR08fxzuJbdTlxzpzkoNeBg.5tL.',NULL,NULL,NULL,'2019-05-04 06:52:18','2019-05-04 06:52:18'),(2,'スズキ','suzuki@gmail.com','$2y$10$z2T22ntBoZFqlabMkABeWeMh.JZ06AZftPUAmeMy4N3PHSXt45qhe',NULL,NULL,'LIW53Bw1AKsxedRBtuLBA3qMdvYZHYvLYfSOMKqhpDslIeXkR2MaNWFS3jFs','2019-05-04 09:45:11','2019-05-04 09:45:11'),(3,'Nobu','nobu@gmail.com','$2y$10$tXwrynOS9f8vGe2r/RIlEORorzXNmRT7nwWdTnctVlRA8Lff6a2fO',NULL,NULL,NULL,'2019-05-10 12:25:11','2019-05-10 12:25:11');
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

-- Dump completed on 2019-05-12  5:49:48
