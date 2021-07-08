-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bfx
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cierre_comisions`
--

DROP TABLE IF EXISTS `cierre_comisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cierre_comisions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `package_id` bigint(20) unsigned NOT NULL,
  `s_inicial` double NOT NULL COMMENT 'saldo inicial',
  `s_ingreso` double NOT NULL COMMENT 'saldo ingreso',
  `s_final` double NOT NULL COMMENT 'saldo final',
  `cierre` date NOT NULL COMMENT 'fecha del cierre',
  `comentario` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cierre_comisions_package_id_foreign` (`package_id`),
  CONSTRAINT `cierre_comisions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cierre_comisions`
--

LOCK TABLES `cierre_comisions` WRITE;
/*!40000 ALTER TABLE `cierre_comisions` DISABLE KEYS */;
/*!40000 ALTER TABLE `cierre_comisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inversions`
--

DROP TABLE IF EXISTS `inversions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inversions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` bigint(20) unsigned NOT NULL,
  `package_id` bigint(20) unsigned NOT NULL,
  `orden_id` bigint(20) unsigned NOT NULL,
  `invertido` double NOT NULL,
  `ganacia` double NOT NULL,
  `retiro` double NOT NULL,
  `capital` double NOT NULL,
  `progreso` double NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `porcentaje_fondo` decimal(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - activo , 2 - culminada',
  `status_por_pagar` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 - por Pagar , 0 - Pagado',
  `ganancia_acumulada` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inversions_iduser_foreign` (`iduser`),
  KEY `inversions_package_id_foreign` (`package_id`),
  KEY `inversions_orden_id_foreign` (`orden_id`),
  CONSTRAINT `inversions_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  CONSTRAINT `inversions_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `orden_purchases` (`id`),
  CONSTRAINT `inversions_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inversions`
--

LOCK TABLES `inversions` WRITE;
/*!40000 ALTER TABLE `inversions` DISABLE KEYS */;
/*!40000 ALTER TABLE `inversions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liquidactions`
--

DROP TABLE IF EXISTS `liquidactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liquidactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` bigint(20) unsigned NOT NULL,
  `total` double NOT NULL,
  `monto_bruto` double NOT NULL,
  `feed` double NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_used` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `liquidactions_iduser_foreign` (`iduser`),
  CONSTRAINT `liquidactions_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liquidactions`
--

LOCK TABLES `liquidactions` WRITE;
/*!40000 ALTER TABLE `liquidactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `liquidactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_liquidations`
--

DROP TABLE IF EXISTS `log_liquidations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_liquidations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idliquidation` bigint(20) unsigned NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_liquidations_idliquidation_foreign` (`idliquidation`),
  CONSTRAINT `log_liquidations_idliquidation_foreign` FOREIGN KEY (`idliquidation`) REFERENCES `liquidactions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_liquidations`
--

LOCK TABLES `log_liquidations` WRITE;
/*!40000 ALTER TABLE `log_liquidations` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_liquidations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2020_10_05_165857_create_groups_table',1),(4,'2020_10_06_043331_create_packages_table',1),(5,'2020_10_19_160343_create_liquidactions_table',1),(6,'2020_11_05_181015_create_orden_purchases_table',1),(7,'2020_11_12_172029_create_cierre_comisions_table',1),(8,'2020_11_13_210917_create_wallets_table',1),(9,'2021_03_13_132234_create_tickets_table',1),(10,'2021_03_19_211758_create_log_liquidations_table',1),(11,'2021_06_10_224007_create_inversions_table',1),(12,'2021_07_07_175601_create_ranks_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_purchases`
--

DROP TABLE IF EXISTS `orden_purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_purchases` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` bigint(20) unsigned NOT NULL,
  `package_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `idtransacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ID de la transacion',
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - En Espera, 1 - Completada, 2 - Rechazada, 3 - Cancelada',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orden_purchases_iduser_foreign` (`iduser`),
  KEY `orden_purchases_package_id_foreign` (`package_id`),
  CONSTRAINT `orden_purchases_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`),
  CONSTRAINT `orden_purchases_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_purchases`
--

LOCK TABLES `orden_purchases` WRITE;
/*!40000 ALTER TABLE `orden_purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT 0,
  `expired` date DEFAULT NULL COMMENT 'Fecha de vencimiento del paquete',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 - desactivado, 1 - activado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,'Paquete A',50,NULL,NULL,'1','2021-07-08 22:10:36','2021-07-08 22:10:36'),(2,'Paquete B',100,NULL,NULL,'1','2021-07-08 22:10:36','2021-07-08 22:10:36'),(3,'Paquete C',300,NULL,NULL,'1','2021-07-08 22:10:36','2021-07-08 22:10:36'),(4,'Paquete D',500,NULL,NULL,'1','2021-07-08 22:10:37','2021-07-08 22:10:37'),(5,'Paquete E',1000,NULL,NULL,'1','2021-07-08 22:10:37','2021-07-08 22:10:37'),(6,'Paquete F',2000,NULL,NULL,'1','2021-07-08 22:10:37','2021-07-08 22:10:37'),(7,'Paquete G',3000,NULL,NULL,'1','2021-07-08 22:10:37','2021-07-08 22:10:37'),(8,'Paquete H',5000,NULL,NULL,'1','2021-07-08 22:10:37','2021-07-08 22:10:37'),(9,'Paquete I',10000,NULL,NULL,'1','2021-07-08 22:10:37','2021-07-08 22:10:37');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - Activo, 1 - Inactivo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` bigint(20) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - Abierto, 1 - Cerrado, 2',
  `priority` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 - Alto, 1 - Medio, 2 - bajo',
  `issue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_admin` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` double NOT NULL DEFAULT 0,
  `admin` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'permite saber si un usuario es admin o no',
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 - inactivo, 1 - activo, 2 - eliminado',
  `referred_id` bigint(20) NOT NULL DEFAULT 1 COMMENT 'ID del usuario patrocinador',
  `binary_id` bigint(20) NOT NULL DEFAULT 1 COMMENT 'ID del usuario binario',
  `binary_side` enum('I','D') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Permite saber si esta en la derecha o izquierda en el binario',
  `binary_side_register` enum('I','D') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'I' COMMENT 'Permite saber porque lado va a registrar a un nuevo usuario',
  `dni` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet_address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photoDB` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','BFX','Admin BFX','admin@bfx.com',NULL,'123456789','$2y$10$fhoB81JbaCwr/88WbFWsb.kxZWVop.n14zsQHFi5yVljxJ8V1F7xa',NULL,0,'1','0',0,1,NULL,'I',NULL,NULL,NULL,NULL,'2021-07-08 22:10:37','2021-07-08 22:10:37'),(2,'Test','BFX','Test BFX','test@bfx.com',NULL,'123456789','$2y$10$PEPJakQQz70JAHb2hzc2w.GHOhTsCfPzUzkg/T0BDIgvTDR.9Z0Ma',NULL,0,'0','0',1,1,NULL,'I',NULL,NULL,NULL,NULL,'2021-07-08 22:10:37','2021-07-08 22:10:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` bigint(20) unsigned NOT NULL,
  `referred_id` bigint(20) unsigned DEFAULT NULL,
  `cierre_comision_id` bigint(20) unsigned DEFAULT NULL,
  `liquidation_id` bigint(20) unsigned DEFAULT NULL,
  `monto` decimal(8,2) NOT NULL DEFAULT 0.00 COMMENT 'entrada de cash',
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - En espera, 1 - Pagado (liquidado), 2 - Cancelado',
  `tipo_transaction` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - comision, 1 - retiro',
  `liquidado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 - sin liquidar, 1 - liquidado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallets`
--

LOCK TABLES `wallets` WRITE;
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-08 14:11:10
