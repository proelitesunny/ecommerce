-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `pin` varchar(8) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (8,8,'Main road,Ranchi','834001','Jharkhand','9708530250','2017-09-09 02:16:09','2017-09-09 02:16:09'),(6,1,'Line Tank Road, Gopalgunj, Chadri, Ranchi','834001','Jharkhand','9708530250','2017-05-03 00:21:39','2017-05-03 00:21:39');
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Men','2017-04-16 06:24:13','2017-04-16 06:24:13'),(2,'Women','2017-04-16 06:33:05','2017-04-16 06:33:05'),(3,'Kids','2017-04-16 07:10:29','2017-04-16 07:10:29'),(4,'Technologies','2017-04-16 07:53:14','2017-04-16 07:53:14');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `message` text NOT NULL,
  `reply` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiries`
--

LOCK TABLES `enquiries` WRITE;
/*!40000 ALTER TABLE `enquiries` DISABLE KEYS */;
INSERT INTO `enquiries` VALUES (1,1,'Order Delay','Why my order is delay','It will be delivered shortly.','2017-04-26 13:10:09','2017-04-27 07:16:23'),(2,1,'Hello','I want to ask that\r\n\r\nHow can I rent your product',NULL,'2017-04-27 09:43:17','2017-04-27 09:43:17'),(3,1,'Order Delay','Why My order is delay???',NULL,'2017-05-03 00:24:02','2017-05-03 00:24:02');
/*!40000 ALTER TABLE `enquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,'RAM','3 GB',11,'2017-04-28 06:06:09','2017-04-28 06:06:09'),(6,'Internal','16 GB',11,'2017-04-29 00:19:17','2017-04-29 00:19:17'),(4,'Size','X',6,'2017-04-28 06:13:52','2017-04-28 06:13:52'),(7,'Cool','Head',13,'2017-05-03 00:31:23','2017-05-03 00:31:23');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT 'a',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (13,12,1,'500',1,'Line Tank Road, Gopalgunj, Chadri, Ranchi','9708530250','Jharkhand','834001','COD','a','2017-05-31 00:28:53','2017-05-31 00:28:53'),(11,5,2,'500',1,'Near Taxi Stand, Barkatha Chatti, Barkatha','9708530250','Jharkhand','825323','COD','can','2017-04-30 05:01:31','2017-04-30 05:13:47'),(10,11,2,'30000',1,'Near Taxi Stand, Barkatha Chatti, Barkatha','9708530250','Jharkhand','825323','COD','c','2017-04-30 05:01:31','2017-06-04 09:28:18'),(14,12,1,'500',8,'Main road,Ranchi','9708530250','Jharkhand','834001','COD','d','2017-09-09 02:16:15','2017-09-09 02:16:54');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(30) NOT NULL,
  `promotional_price` varchar(30) DEFAULT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'default.png',
  `handling_time` int(11) NOT NULL,
  `expiring_date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Mobile','sdfg dfgn fdg  dfgn','20000',NULL,'1492591753.jpg',2,'2017-04-30',4,0,'2017-04-16 12:20:12','2017-04-26 09:54:02'),(3,'Laptop','eddevf fn  bfgngh fgngy','200000',NULL,'default.png',0,NULL,4,1,'2017-04-16 12:22:08','2017-04-16 12:22:08'),(4,'camera','efe klfern vejkrbv vjkbvejr vkejbr','20000',NULL,'default.png',0,NULL,4,1,'2017-04-16 12:24:50','2017-04-16 12:24:50'),(5,'Trousers','sahb fjkebf kjgbewr jbgejr','250',NULL,'default.png',0,NULL,4,1,'2017-04-16 12:29:00','2017-04-16 12:29:00'),(6,'Payjama','dfjb eger ergber erjgnre','42',NULL,'default.png',0,NULL,1,1,'2017-04-16 12:32:37','2017-04-16 12:32:37'),(7,'Laptop','effio thbgr rgberg hner freni','20000',NULL,'1492591724.jpg',0,NULL,4,1,'2017-04-19 00:23:14','2017-04-19 03:18:44'),(8,'Laptop','effio thbgr rgberg hner freni','20000',NULL,'1492591854.jpg',2,'2017-04-20',9,1,'2017-04-19 03:14:32','2017-04-26 10:09:55'),(9,'Laptop Dell','effio thbgr rgberg hner freni','20000',NULL,'default.png',0,NULL,4,1,'2017-04-19 03:15:05','2017-04-26 11:18:15'),(10,'Shoe','The best shoe that matches your personality.','250',NULL,'1493209527.jpg',0,NULL,1,0,'2017-04-26 06:55:28','2017-04-26 09:52:28'),(11,'SmartPhone','The best smartphone under this range.','20000','15000','1493219221.jpg',2,'2017-04-30',4,1,'2017-04-26 09:37:02','2017-04-28 05:11:47'),(12,'Chair','A very comfort chair with a good price..','500',NULL,'1493549721.jpg',3,'2017-04-06',3,1,'2017-04-30 05:25:22','2017-05-03 00:28:29');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,1,11,'Nice phone in this range...','2017-04-29 01:42:05','2017-04-29 01:42:05');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES (1,'Slide 1','1493554848.jpg','2017-04-30 06:50:49','2017-04-30 06:50:49'),(3,'Slide 2','1493555986.jpg','2017-04-30 07:09:46','2017-04-30 07:09:46'),(4,'Slide 3','1493790776.jpg','2017-05-03 00:22:58','2017-05-03 00:22:58'),(5,'Slide 4','1496599021.jpg','2017-06-04 12:27:02','2017-06-04 12:27:02'),(6,'Slide 5','1496599164.png','2017-06-04 12:29:24','2017-06-04 12:29:24');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
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
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sunny Kumar','proelitesunny@gmail.com','admin','$2y$10$AnQ0qaQ1IYRXt0Q.RIfTNOF536OTImfOP5eaH0oMaLMZmsPQJQWeG','uTezk02GVjtgYzoFu8gz77QsM4zY7WdOPBMd53TyfRUF8RM8Vs6Vhf1wrjGA','2017-04-23 13:04:23','2017-04-30 05:58:13'),(8,'Rozy','rozy@gmail.com','customer','$2y$10$EnjACBj0QsyU7kTIC5Ky6ujwZPsyZdbybULBsiTrUP8w2rKuZO.De',NULL,'2017-09-09 02:15:01','2017-09-09 02:15:01'),(6,'ABC','abc@gmail.com','admin','$2y$10$bR6fGh2mOTJ0wS7qVg5Che2f5aJYAaBMkb42GkYkSkXZtb0YH/Lc.',NULL,'2017-06-05 00:39:32','2017-06-05 00:39:54'),(7,'XYZ','xyz@gmail.com','customer','$2y$10$UniqVWpKJY972BLoT2WQgulA.VFILEM/S8WSsFmNJhGVjrRXBP/uW',NULL,'2017-06-12 23:06:36','2017-06-12 23:06:36'),(5,'Shahid','shahid@gmail.com','customer','$2y$10$ljgEWVoSKLusBDecDfp8ZeKqVDWaDDGRzHPMlD5UgliHXlsEWDQh.','JJfOC5pWUtGLchWWONYaPW6XSaVQ8UV1Ij1mRwgoFQmASjWJHxVkJsu4Ex9t','2017-05-03 04:03:37','2017-05-03 04:03:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wish_lists`
--

DROP TABLE IF EXISTS `wish_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wish_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wish_lists`
--

LOCK TABLES `wish_lists` WRITE;
/*!40000 ALTER TABLE `wish_lists` DISABLE KEYS */;
INSERT INTO `wish_lists` VALUES (3,1,13,'2017-05-03 01:03:39','2017-05-03 01:03:39'),(4,1,12,'2017-05-03 01:03:42','2017-05-03 01:03:42'),(5,1,11,'2017-05-03 01:03:45','2017-05-03 01:03:45'),(6,1,8,'2017-05-03 01:03:48','2017-05-03 01:03:48'),(7,1,13,'2017-09-08 23:52:11','2017-09-08 23:52:11'),(8,1,12,'2018-06-15 05:54:09','2018-06-15 05:54:09'),(9,1,12,'2018-06-15 05:54:21','2018-06-15 05:54:21'),(10,1,12,'2018-06-15 05:54:24','2018-06-15 05:54:24');
/*!40000 ALTER TABLE `wish_lists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-15 20:47:47
