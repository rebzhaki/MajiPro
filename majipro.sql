-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 04, 2021 at 08:12 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majipro`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `consumption` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `customer_id`, `start_date`, `end_date`, `date`, `status`, `balance`, `amount`, `consumption`, `created_at`, `updated_at`) VALUES
(4, 1, '2021-07-22', '2021-07-22', '2021-07-22', 'Paid', 0, 680.00, NULL, '2021-07-22 09:44:14', '2021-08-03 09:23:23'),
(5, 1, '2021-08-01', '2021-08-03', '2021-08-03', 'Partially Paid', 2830, 3830.00, NULL, '2021-08-03 07:30:42', '2021-08-03 09:23:24'),
(6, 1, '2021-08-03', '2021-08-03', '2021-08-03', 'Unpaid', 3578, 3578.00, 28, '2021-08-03 08:51:43', '2021-08-03 08:51:43'),
(7, 1, '2021-08-03', '2021-08-03', '2021-08-03', 'Unpaid', 1310, 1310.00, 10, '2021-08-03 08:53:22', '2021-08-03 08:53:22'),
(9, 1, '2021-08-03', '2021-08-03', '2021-08-03', 'Unpaid', 1512, 1511.60, 11.6, '2021-08-03 09:32:26', '2021-08-03 09:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `bill_items`
--

DROP TABLE IF EXISTS `bill_items`;
CREATE TABLE IF NOT EXISTS `bill_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_items`
--

INSERT INTO `bill_items` (`id`, `bill_id`, `narrative`, `quantity`, `unit`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Consumption in cubic meters', '5', '100', 500.00, 'Active', '2021-07-22 09:40:51', '2021-07-22 09:40:51'),
(2, 3, 'KRA', '0.16', '500', 80.00, 'Active', '2021-07-22 09:40:51', '2021-07-22 09:40:51'),
(3, 3, 'NEMA', '5', '10', 50.00, 'Active', '2021-07-22 09:40:51', '2021-07-22 09:40:51'),
(4, 3, 'WARMA', '1', '50', 50.00, 'Active', '2021-07-22 09:40:51', '2021-07-22 09:40:51'),
(5, 4, 'Consumption in cubic meters', '5', '100', 500.00, 'Active', '2021-07-22 09:44:14', '2021-07-22 09:44:14'),
(6, 4, 'KRA', '0.16', '500', 80.00, 'Active', '2021-07-22 09:44:14', '2021-07-22 09:44:14'),
(7, 4, 'NEMA', '5', '10', 50.00, 'Active', '2021-07-22 09:44:14', '2021-07-22 09:44:14'),
(8, 4, 'WARMA', '1', '50', 50.00, 'Active', '2021-07-22 09:44:14', '2021-07-22 09:44:14'),
(9, 5, 'Consumption in cubic meters', '30', '100', 3000.00, 'Active', '2021-08-03 07:30:43', '2021-08-03 07:30:43'),
(10, 5, 'KRA', '0.16', '3000', 480.00, 'Active', '2021-08-03 07:30:43', '2021-08-03 07:30:43'),
(11, 5, 'NEMA', '30', '10', 300.00, 'Active', '2021-08-03 07:30:44', '2021-08-03 07:30:44'),
(12, 5, 'WARMA', '1', '50', 50.00, 'Active', '2021-08-03 07:30:44', '2021-08-03 07:30:44'),
(13, 6, 'Consumption in cubic meters', '28', '100', 2800.00, 'Active', '2021-08-03 08:51:43', '2021-08-03 08:51:43'),
(14, 6, 'KRA', '0.16', '2800', 448.00, 'Active', '2021-08-03 08:51:43', '2021-08-03 08:51:43'),
(15, 6, 'NEMA', '28', '10', 280.00, 'Active', '2021-08-03 08:51:43', '2021-08-03 08:51:43'),
(16, 6, 'WARMA', '1', '50', 50.00, 'Active', '2021-08-03 08:51:43', '2021-08-03 08:51:43'),
(17, 7, 'Consumption in cubic meters', '10', '100', 1000.00, 'Active', '2021-08-03 08:53:22', '2021-08-03 08:53:22'),
(18, 7, 'KRA', '0.16', '1000', 160.00, 'Active', '2021-08-03 08:53:22', '2021-08-03 08:53:22'),
(19, 7, 'NEMA', '10', '10', 100.00, 'Active', '2021-08-03 08:53:22', '2021-08-03 08:53:22'),
(20, 7, 'WARMA', '1', '50', 50.00, 'Active', '2021-08-03 08:53:22', '2021-08-03 08:53:22'),
(21, 8, 'Consumption in cubic meters', '11.6', '100', 1160.00, 'Active', '2021-08-03 09:29:29', '2021-08-03 09:29:29'),
(22, 8, 'KRA', '0.16', '1160', 185.60, 'Active', '2021-08-03 09:29:29', '2021-08-03 09:29:29'),
(23, 8, 'NEMA', '11.6', '10', 116.00, 'Active', '2021-08-03 09:29:29', '2021-08-03 09:29:29'),
(24, 8, 'WARMA', '1', '50', 50.00, 'Active', '2021-08-03 09:29:29', '2021-08-03 09:29:29'),
(25, 9, 'Consumption in cubic meters', '11.6', '100', 1160.00, 'Active', '2021-08-03 09:32:26', '2021-08-03 09:32:26'),
(26, 9, 'KRA', '0.16', '1160', 185.60, 'Active', '2021-08-03 09:32:26', '2021-08-03 09:32:26'),
(27, 9, 'NEMA', '11.6', '10', 116.00, 'Active', '2021-08-03 09:32:26', '2021-08-03 09:32:26'),
(28, 9, 'WARMA', '1', '50', 50.00, 'Active', '2021-08-03 09:32:26', '2021-08-03 09:32:26');

-- --------------------------------------------------------

--
-- Table structure for table `bill_payments`
--

DROP TABLE IF EXISTS `bill_payments`;
CREATE TABLE IF NOT EXISTS `bill_payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_payments`
--

INSERT INTO `bill_payments` (`id`, `bill_id`, `payment_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 680.00, '2021-08-03 09:23:23', '2021-08-03 09:23:23'),
(2, 5, 1, 1000.00, '2021-08-03 09:23:24', '2021-08-03 09:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `communications`
--

DROP TABLE IF EXISTS `communications`;
CREATE TABLE IF NOT EXISTS `communications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consumptions`
--

DROP TABLE IF EXISTS `consumptions`;
CREATE TABLE IF NOT EXISTS `consumptions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `consumption` double(8,2) NOT NULL,
  `current_reading` float DEFAULT NULL,
  `previous_reading` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `consumptions`
--

INSERT INTO `consumptions` (`id`, `customer_id`, `date`, `user_id`, `consumption`, `current_reading`, `previous_reading`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-22', 1, 5.58, 15.98, 10.4, '2021-07-22 06:16:44', '2021-07-22 06:16:44'),
(2, 1, '2021-08-03', 3, 44.02, 60, 15.98, '2021-08-03 07:34:24', '2021-08-03 07:34:24');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_number` int(11) DEFAULT NULL,
  `LR_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tarrif_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `middle_name`, `last_name`, `ID_type`, `ID_number`, `LR_number`, `address`, `location`, `place_id`, `latitude`, `longitude`, `tarrif_id`, `created_at`, `updated_at`) VALUES
(1, 'Rebecca', 'Mwihaki', 'Mwangi', 'National ID', 34082210, 'erf120', '2000-1000', 'roysambu', 'roysambu', '22', '100', 1, '2021-07-22 05:47:50', '2021-07-22 05:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_15_093411_create_customers_table', 1),
(5, '2021_07_15_102112_create_roles_table', 1),
(6, '2021_07_15_102501_create_bills_table', 1),
(7, '2021_07_15_104605_create_bill_items_table', 1),
(8, '2021_07_15_105127_create_payments_table', 1),
(9, '2021_07_15_105456_create_bill_payments_table', 1),
(10, '2021_07_15_105802_create_tarrifs_table', 1),
(11, '2021_07_15_110037_create_tarrif_items_table', 1),
(12, '2021_07_15_110317_create_consumptions_table', 1),
(13, '2021_07_21_082209_create_sms_table', 1),
(14, '2021_07_21_165614_create_communications_table', 1),
(15, '2021_07_27_102514_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 3),
(6, 'App\\Models\\User', 3),
(7, 'App\\Models\\User', 3),
(8, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `narrative` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `mode`, `date`, `code`, `narrative`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cash', '2021-08-03', NULL, 'Bacon ipsum dolor amet pork loin ribeye spare ribs, meatloaf burgdoggen capicola chicken jowl turducken tenderloin doner chislic venison. Corned beef frankfurter ham, ball tip filet mignon jowl capicola burgdoggen swine chuck.', 1000.00, '2021-08-03 09:23:23', '2021-08-03 09:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Consumption', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(2, 'Bills', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(3, 'Payments', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(4, 'Tarrifs', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(5, 'Customers', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(6, 'Users', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(7, 'Communication', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(8, 'Delete', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(2, 'Manager', 'web', '2021-07-27 07:37:35', '2021-07-27 07:37:35'),
(3, 'Finance', 'web', '2021-07-27 07:37:36', '2021-07-27 07:37:36'),
(4, 'Field officer', 'web', '2021-07-27 07:37:36', '2021-07-27 07:37:36'),
(5, 'Office staff', 'web', '2021-07-27 07:37:36', '2021-07-27 07:37:36'),
(6, 'Secretary', 'web', '2021-07-27 07:53:37', '2021-07-27 07:53:37'),
(7, 'Secretary2', 'web', '2021-07-27 07:55:06', '2021-07-27 07:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(1, 7),
(2, 7),
(3, 7),
(6, 7),
(7, 7),
(8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tarrifs`
--

DROP TABLE IF EXISTS `tarrifs`;
CREATE TABLE IF NOT EXISTS `tarrifs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tarrifs`
--

INSERT INTO `tarrifs` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Gachororo tarrif', 'Gachororo tarrif', 100.00, '2021-07-22 06:30:21', '2021-07-22 06:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `tarrif_items`
--

DROP TABLE IF EXISTS `tarrif_items`;
CREATE TABLE IF NOT EXISTS `tarrif_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tarrif_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tarrif_items`
--

INSERT INTO `tarrif_items` (`id`, `tarrif_id`, `name`, `type`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'KRA', '% of consumption', 16.00, '2021-07-22 08:50:55', '2021-07-22 08:50:55'),
(2, 1, 'NEMA', 'Amount per cubic meter', 10.00, '2021-07-22 08:55:07', '2021-07-22 09:07:03'),
(4, 1, 'WARMA', 'Fixed Amount', 50.00, '2021-07-22 09:07:38', '2021-07-22 09:07:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'REBECCA MWIHAKI', 'rebzhaki@gmail.com', NULL, NULL, '$2y$10$K1XcjGJ6HdX4m6WKKsAsUOqNqUWcsln1fb7xH2ZayWIdNsF5fuoIW', NULL, NULL, '2021-07-22 06:16:00', '2021-07-22 06:16:00'),
(2, 'REBECCA MWIHAKI', 'xxxx@gmail', NULL, NULL, '$2y$10$wNhApSQg21dKewXx6IqVle2vIgG.1IZAgqOayaflsWNMukAaG567y', NULL, NULL, '2021-07-23 05:38:17', '2021-07-23 05:38:17'),
(3, 'Stephen Mbiyu', 'stephen@mbitrix.com', NULL, '0712308537', '$2y$10$.1dTlDRy2C/09HL0DnnZPug4CLP93ancq5E859ao28XuA3Z.gSY8G', 3, NULL, '2021-07-27 08:12:24', '2021-07-27 08:26:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
