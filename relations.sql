-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2022 at 12:43 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relations`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'مصر'),
(2, 'فلسطين'),
(3, 'المملكة العربية السعودية'),
(4, 'تونس'),
(5, 'المغرب'),
(6, 'العراق');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `gender` enum('male','female') COLLATE utf16_unicode_ci NOT NULL DEFAULT 'male',
  `title` varchar(70) COLLATE utf16_unicode_ci NOT NULL,
  `hospital_id` int NOT NULL,
  `medical_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `gender`, `title`, `hospital_id`, `medical_id`) VALUES
(1, 'ندى محمد السيد ', 'female', 'دكتور أسنان', 2, 2),
(2, 'خالد نادر محمد ', 'male', 'دكتور أسنان', 3, 1),
(3, 'عمر أحمد عبدالوهاب', 'male', 'دكتور أسنان', 1, 3),
(7, 'يعقوب قمر الدين ديبيازة', 'male', 'استشاري', 3, 0),
(8, 'خالد كشميري', 'male', 'استشاري', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_service`
--

DROP TABLE IF EXISTS `doctor_service`;
CREATE TABLE IF NOT EXISTS `doctor_service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `doctor_id` int NOT NULL,
  `service_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor_service`
--

INSERT INTO `doctor_service` (`id`, `doctor_id`, `service_id`) VALUES
(8, 2, 6),
(3, 2, 2),
(19, 1, 5),
(7, 2, 5),
(6, 2, 1),
(18, 1, 4),
(17, 1, 6),
(11, 2, 1),
(12, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf16_unicode_ci NOT NULL,
  `country_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `address`, `country_id`, `created_at`, `updated_at`) VALUES
(3, 'مستشفى القاهرة الدولي', 'الجيزة', 1, NULL, NULL),
(2, 'مستشفى مصر للعيون', 'شارع الهرم', 2, NULL, NULL),
(1, 'مستشفى الأمل', 'شارع مصر الجديدة', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicals`
--

DROP TABLE IF EXISTS `medicals`;
CREATE TABLE IF NOT EXISTS `medicals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pdf` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `patient_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicals`
--

INSERT INTO `medicals` (`id`, `pdf`, `patient_id`) VALUES
(1, 'omar.pdf', 1),
(2, 'khalid.pdf', 2),
(3, 'ahmed.pdf', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_phones_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`) VALUES
(1, 'omar'),
(2, 'khalid'),
(3, 'ahmed');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE IF NOT EXISTS `phones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `code`, `phone`, `user_id`) VALUES
(1, '02', '01028689567', 1),
(2, '04', '01004688839', 2),
(3, '04', '010287899567', 1),
(4, '05', '02035568899', 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'تقويم الأسنان', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'تنظيف الأسنان', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'تسليك الأسنان', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'حشو عادي', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'حشو عصب', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'زراعه \r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'omar', 'omar@gmail.com', NULL, '123456', NULL, NULL, NULL),
(2, 'mohamed', 'mohamed@gmail.com', NULL, '852963', NULL, NULL, NULL),
(3, 'ssssss', 'sssssssss', NULL, 'sss', NULL, NULL, NULL),
(4, 'ssssssssssss', 'dddd', NULL, 'dddd', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
