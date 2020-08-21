-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for car_dealer
CREATE DATABASE IF NOT EXISTS `car_dealer` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `car_dealer`;


-- Dumping structure for table car_dealer.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table car_dealer.cars: 30 rows
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`id`, `name`, `price`, `image`, `created_at`, `updated_at`) VALUES
	(38, 'Renault', '700', 'uploads/BMW.jpg', '2020-08-21 17:25:09', '2020-08-21 19:16:53'),
	(39, 'Bantam', '70000', 'uploads/6306542.jpg', '2020-08-21 17:25:50', '2020-08-21 19:41:30'),
	(41, 'Used BMW 3 Series', '119000', 'uploads/6306488.jpg', '2020-08-21 17:30:07', '2020-08-21 19:18:45'),
	(46, 'Polo Vivo', '150000', 'uploads/polo vivo.jpg', '2020-08-21 19:50:51', '2020-08-21 19:50:51'),
	(36, 'Kompressor 400', '130000', 'uploads/kompressor500.jpg', '2020-08-21 16:44:57', '2020-08-21 16:44:57'),
	(37, 'Cherolet', 'R500', 'uploads/renault-duster_techroad2020_3q-front-dirtroad.jpg', '2020-08-21 17:24:02', '2020-08-21 17:24:02'),
	(40, 'BMW 3 Series', '80000', 'uploads/1110875286_6306742.jpg', '2020-08-21 17:28:36', '2020-08-21 19:48:34'),
	(42, 'Toyota Hilux 2013', '600000', 'uploads/616244783_6304580.jpg', '2020-08-21 17:35:31', '2020-08-21 19:17:21'),
	(45, 'Brand New BMW 3i', '400000', 'uploads/6306574.jpg', '2020-08-21 19:37:11', '2020-08-21 19:38:50'),
	(34, 'Audi A8', '800', 'uploads/audi a7.jpg', '2020-08-21 16:35:56', '2020-08-21 16:35:56'),
	(43, 'Bucky 4x4', '500 000', 'uploads/6306214.jpg', '2020-08-21 17:38:39', '2020-08-21 19:48:07'),
	(44, 'Raider 4X4 Autom', '6300', 'uploads/6305522.jpg', '2020-08-21 17:42:33', '2020-08-21 19:06:14');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;


-- Dumping structure for table car_dealer.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table car_dealer.failed_jobs: 0 rows
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;


-- Dumping structure for table car_dealer.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table car_dealer.migrations: 4 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 2),
	(3, '2019_08_19_000000_create_failed_jobs_table', 2),
	(4, '2020_08_21_005747_create_cars_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table car_dealer.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table car_dealer.password_resets: 0 rows
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table car_dealer.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table car_dealer.users: 4 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Alika Pate', 'kanawa@mailinator.net', NULL, '$2y$10$8E8z4V4UMFmHVfP/N0NnnO6obuyyObkF3EtkTgtMEB.zDhAaKQUbG', NULL, '2020-08-20 21:49:23', '2020-08-20 21:49:23'),
	(2, 'Tyler Dalton', 'suwojirin@mailinator.com', NULL, '$2y$10$uhlpe9YDH5a9mUg6aHfSjuxliKL8KZ79bBkAdiWh98ZZ5tzQRUvR.', NULL, '2020-08-20 22:21:32', '2020-08-20 22:21:32'),
	(3, 'Stewart Mcknight', 'naxym@mailinator.net', NULL, '$2y$10$I/IhBoUdoR.DZWM2GAkeEOHY/iI8M.7GWoYCL0ChYcC93VWWcd8MK', NULL, '2020-08-20 22:30:11', '2020-08-20 22:30:11'),
	(4, 'Tim', 'tim@yahoo.com', NULL, '$2y$10$M0wr9/BzcorAsi7kmGM.gOYuObhB5yDtHn4ct96Tzy6nK9/W/RAmS', NULL, '2020-08-20 22:42:29', '2020-08-20 22:42:29'),
	(5, 'Nickie Balla', 'nickiebella@wwe.com', NULL, '$2y$10$qaBmfa2ZjFWxFh/HoFfPJefcb7URBG3obv3sAybKndLmd5P9esf9G', NULL, '2020-08-21 17:17:52', '2020-08-21 17:17:52'),
	(6, 'Agent47', 'agent47@gmail.com', NULL, '$2y$10$bRo7P81uIYXSqXnVYh3Sye68KMgL/PGNrLh4kdmlY6Mu/jpjDON0u', NULL, '2020-08-21 19:36:12', '2020-08-21 19:36:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
