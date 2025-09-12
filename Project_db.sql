-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: project_db
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Web Development','Web Devs',NULL,NULL),(2,'Mobile Development','Mobile Devs',NULL,NULL),(3,'Game Development','Game Devs',NULL,NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `designations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `desg_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `desg_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designations`
--

LOCK TABLES `designations` WRITE;
/*!40000 ALTER TABLE `designations` DISABLE KEYS */;
INSERT INTO `designations` VALUES (1,'Web Developer',1,'For Web Development',NULL,NULL),(2,'Mobile Developer',2,'For Mobile Development',NULL,NULL),(3,'Game Developer',3,'For Game Development',NULL,NULL);
/*!40000 ALTER TABLE `designations` ENABLE KEYS */;
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
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_08_28_050649_create_categories_table',1),(5,'2025_08_28_063752_create_designations_table',1),(6,'2025_09_04_042532_create_projects_table',1),(7,'2025_09_05_070815_create_project_members_table',1),(8,'2025_09_06_111619_create_tasks_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_members`
--

DROP TABLE IF EXISTS `project_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `projects_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_members_projects_id_foreign` (`projects_id`),
  KEY `project_members_user_id_foreign` (`user_id`),
  CONSTRAINT `project_members_projects_id_foreign` FOREIGN KEY (`projects_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_members`
--

LOCK TABLES `project_members` WRITE;
/*!40000 ALTER TABLE `project_members` DISABLE KEYS */;
INSERT INTO `project_members` VALUES (1,1,13,NULL,NULL),(2,1,14,NULL,NULL),(3,1,15,NULL,NULL),(4,1,16,NULL,NULL),(5,2,3,NULL,NULL),(6,2,4,NULL,NULL),(7,2,5,NULL,NULL),(8,2,6,NULL,NULL),(9,3,13,NULL,NULL),(10,3,14,NULL,NULL),(11,3,15,NULL,NULL),(12,3,16,NULL,NULL),(13,4,8,NULL,NULL),(14,4,9,NULL,NULL),(15,4,10,NULL,NULL),(16,4,11,NULL,NULL);
/*!40000 ALTER TABLE `project_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `project_manager_id` int NOT NULL,
  `category_id` int NOT NULL,
  `status` tinyint NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Idle Game Development','2025-09-09','2026-01-06',12,3,1,'<p>Game Development</p>',2,'2025-09-08 16:31:36','2025-09-08 16:33:43'),(2,'Web Development','2025-09-09','2025-11-10',2,1,1,'<p>Web Development</p>',1,'2025-09-08 16:32:58','2025-09-08 16:32:58'),(3,'Game','2025-09-03','2025-11-13',12,3,1,'<p>Game Development</p>',1,'2025-09-08 16:34:26','2025-09-08 16:34:26'),(4,'Mobile Development','2025-09-06','2025-12-06',7,2,1,'Mobile Development',2,'2025-09-08 16:35:10','2025-09-08 16:35:10');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('bS56dZyk0iotNRs0xGiwmvmDKc3xqo43VPR7wlT1',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMExQdW56NFFqWmQ3QjR4Vjl4MnRocFJZb3hhajlIOFVrWVhMUHBncyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9qZWN0cy92aWV3LzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1757478410),('ltqlgrv37Ahyke25luFKvHVRiCqMWnJR2WmRlnlm',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY3hEeUQxZlppanlIb3p3aWtWeWNtbWdUZHdwOVFLVGFIQ0lncVBuUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1757468504),('zXMaGUt0teUZNh64buQIbdqm0yo9i3FFcBY3nBFX',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoieTA2VjdGWEFKVlVyRnZzbmVXNm10MFcyTDA3ZFV4V1F4c3JzdTBPSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9qZWN0cy92aWV3LzEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1757490403);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tasks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_user` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `priority` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Create Database (MySQL)',2,'use MySQL',4,'2025-09-05','2025-09-23',3,0,'2025-09-08 16:35:55','2025-09-08 16:35:55'),(2,'Create Admin dashboard',2,'Admin Dashboard',4,'2025-09-09','2025-09-13',3,0,'2025-09-08 16:36:31','2025-09-08 16:36:31'),(3,'Create User Dashboard',2,'User Dashboard',5,'2025-09-04','2025-09-13',2,0,'2025-09-08 16:36:57','2025-09-08 16:36:57'),(4,'Create Simple AI Example',1,'Simple AI',13,'2025-09-07','2025-09-21',2,1,'2025-09-08 16:38:39','2025-09-08 16:38:39'),(5,'Create a Support of a Unreal Engine 5',1,'Unreal Engine',14,'2025-09-09','2025-09-30',2,0,'2025-09-08 16:39:34','2025-09-08 16:39:34'),(6,'Connect Animation to the Game',1,'Animation',15,'2025-09-10','2025-09-27',1,0,'2025-09-08 16:40:10','2025-09-08 16:40:10'),(7,'Create Admin dashboard',4,'Admin Dashboard',8,'2025-09-10','2025-09-13',3,2,'2025-09-08 16:40:35','2025-09-08 16:40:35'),(8,'Create User Dashboard',4,'User Dashboard',9,'2025-09-05','2025-09-12',1,0,'2025-09-08 16:41:00','2025-09-08 16:41:00'),(9,'Create Example 2',4,'Example 2',10,'2025-09-05','2025-09-06',1,0,'2025-09-08 16:41:39','2025-09-08 16:41:39');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `roles` tinyint NOT NULL DEFAULT '0',
  `category_id` int DEFAULT NULL,
  `designation_id` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'admin','admin@gmail.com',NULL,'$2y$12$TjjERLUwBPE7sGJhgoKBfuUFCv9z.djjyTp6hemYhoHRfM/AVXKvC','123','Address',1,NULL,1,1,NULL,NULL,NULL),(2,NULL,'Eino Zulauf III','beahan.cleo@example.org',NULL,'$2y$12$T8GQaQjbgMvys67/gaeky.neX94AyBuDvF/N8H0UREV7BXyzf5ZWe','+12837207835','969 Ward Forge Apt. 121\nPort Agustina, OR 18034-7151',4,1,1,1,NULL,'2025-09-08 16:27:48','2025-09-08 16:27:48'),(3,NULL,'Genesis Bergnaum','bartoletti.austin@example.com',NULL,'$2y$12$6AL24rOzCedRxxiWJpJ7JePegTYl9jVwt1kkmzTSL4sdguQbj2.f2','801.727.9400','6885 Javonte Trace Suite 932\nSouth Evangelinemouth, DE 28224-3533',4,1,1,1,NULL,'2025-09-08 16:27:48','2025-09-08 16:27:48'),(4,NULL,'Mr. Coby Nicolas','johnston.anderson@example.net',NULL,'$2y$12$WrLfg7d3EWP9Ii1PiTECoOTqP8nWN4mvpYDuI.2d1yzIwabkBYz/e','1-213-646-6349','261 O\'Kon Village\nBruenfurt, SD 15460',4,1,1,1,NULL,'2025-09-08 16:27:49','2025-09-08 16:27:49'),(5,NULL,'Prof. Ebony Swift III','abagail.stanton@example.net',NULL,'$2y$12$lVLy6xPpxg2Z3WJwARr0pODN.SckLe9oU82irCaQjuYTxeXy.pxBG','+1-239-783-3062','294 Marcelina Walks Suite 000\nPort Rosalyn, SC 24492',4,1,1,1,NULL,'2025-09-08 16:27:49','2025-09-08 16:27:49'),(6,NULL,'Cassidy Runte','ebony.greenfelder@example.org',NULL,'$2y$12$PfSPTumc7Op7acLfhRCRzOPKifJ7NWOY2KFuEND39o59TjuhPpuju','+18607828083','344 Myron Shore\nLake Devanfurt, IL 43988',4,1,1,1,NULL,'2025-09-08 16:27:49','2025-09-08 16:27:49'),(7,NULL,'Elisa Bartell','kertzmann.lonzo@example.net',NULL,'$2y$12$LI6rwLjmgv26awuYIktQROIVgesNTLjnR3dGP/iT8Evq5fDZNmLSW','+1.803.455.1190','8093 Koch Knolls Suite 239\nAsafurt, CA 53554',4,2,2,1,NULL,'2025-09-08 16:27:49','2025-09-08 16:27:49'),(8,NULL,'Maryse Hartmann','nels.hudson@example.net',NULL,'$2y$12$xJRM1Ed2rJbq8Qeg0wAXMehg0sZsKmNSqXUv3/Bus5Ai3RgW6.3ZK','470-600-2335','926 Enrique Haven\nRueckershire, NV 91252-7238',4,2,2,1,NULL,'2025-09-08 16:27:49','2025-09-08 16:27:49'),(9,NULL,'Samanta Smith','brianne.daugherty@example.com',NULL,'$2y$12$MFc4dRoR3dClKF62o12eserL3Ljx2PqtJka66XBc/AvXd4rZIr.o2','1-972-954-9728','2117 Kuphal Spur\nRutherfordland, AZ 70130-5404',4,2,2,1,NULL,'2025-09-08 16:27:49','2025-09-08 16:27:49'),(10,NULL,'Carroll Schowalter','dovie.weimann@example.net',NULL,'$2y$12$gRo1CPA0iThMv/oprjNoIeVOlNlqR/sdJDGrldZeNd5s7L7feQg0u','+1-508-572-9000','5903 Lueilwitz Cliffs\nCheyanneside, OR 71578-2933',4,2,2,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50'),(11,NULL,'Lonny Wolff','considine.kian@example.com',NULL,'$2y$12$H8YH.C2KWSSLb1U.gi.u6.R9iUNnZqpyeLAM.MHZnntOq7Wec62jS','+18172849033','516 Mavis Trafficway\nEast Jerry, NH 29737-2863',4,2,2,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50'),(12,NULL,'Jennings Buckridge','joyce27@example.com',NULL,'$2y$12$aVji1rlfCzTXjAHK0WJlsuFqmaGztrCD39027pArC4SkzIaX6QbY6','+1-223-420-2133','275 Pietro Branch\nLake Samanta, MD 42348',4,3,3,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50'),(13,NULL,'Noemie Feeney','dessie24@example.org',NULL,'$2y$12$nkq8zXZlyHHnjO4HOyxpVuShEvDchqkawL64CTMuCI.bBjcsLgco6','1-820-714-0276','53103 Hintz Prairie Apt. 479\nLiamview, WI 86169-2143',4,3,3,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50'),(14,NULL,'Anastasia Mertz','shanelle54@example.net',NULL,'$2y$12$yhgMp1ToraoyQr.9AU1qPOjTPP.mSaJ5A9FTvZZyyb4fKwubxlOrW','616-845-2218','204 Maia Dale\nSouth Verna, SC 44437-4920',4,3,3,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50'),(15,NULL,'Dr. Rosamond Gutkowski MD','ikoch@example.com',NULL,'$2y$12$it64Ud4uwn8D4NrYXEcxdezi9.y2ueHrmNvsH9NTq.687PNQxiS0C','1-530-431-7389','4840 Gunnar Mountains Suite 588\nJohnathanfurt, MO 96683-5361',4,3,3,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50'),(16,NULL,'Miracle Robel','pacocha.lela@example.com',NULL,'$2y$12$S7ki0U724.ca7/g59r8kDugotAZAdF.BvxxuVWG8Pbmx5Wmm8rgn6','270.318.4947','62681 Conn Union\nEast Rosannaville, FL 03880-6834',4,3,3,1,NULL,'2025-09-08 16:27:50','2025-09-08 16:27:50');
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

-- Dump completed on 2025-09-10 16:48:18
