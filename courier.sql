-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2024 at 01:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `ZipCode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `street`, `city`, `state`, `ZipCode`, `country`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'DM Singapore', '111 North Bridge Rd, 04-46 Peninsula Plaza', 'Singapore', 'Singapore', '179098', 'Singapore', '90578770', '2024-05-06 07:46:00', '2024-05-06 07:46:00'),
(2, 'DM Yangon (Main)', 'အခန်း 303 ၊ တိုက်(၁) အင်းစိန်လမ်းမကြီးပေါ်၊ အောင်မြေသာစည်အိမ်ရာ ကမာရွတ်မြို့နယ်', 'Yangon', 'Yangon', 'NA', 'Myanmar', '09-442358755', '2024-05-06 07:46:00', '2024-05-06 07:46:00'),
(3, 'DM Mandalay', 'င-၃/၄၉၊ ၆၃လမ်း၁၀၈x၁၀၉လမ်းကြား ၊ ချမ်းမြသာစည်မြို့နယ် ၊ မန္တလေးမြို့', 'Mandalay', 'Mandalay', 'NA', 'Myanmar', '09-251845339', '2024-05-06 07:46:00', '2024-05-06 07:46:00'),
(4, 'DM Taungoo', 'တောင်ငူလိပ်စာ ၁၈ရပ်ကွက် ၊ ငွေတောင်ဦးတောင်ဘက် ဇောတိရွာဦး၊တောင်ငူမြို့ 09-751994596 09-662853824', 'Taungoo', 'Bago', 'NA', 'Myanmar', '09-751994596', '2024-05-06 07:46:00', '2024-05-06 07:46:00'),
(5, 'DM MONYWA', 'မုံရွာပြည်တော်သာရပ်ကွက်အောင်သူခဆန်စက်နောက်ကျောဆည်မြောင်းလမ်း မရွှင်အိမ် 09793591935 Aung That Wai Tun 09449154662', 'MONYWA', 'SAGAING', 'NA', 'MYANMAR', '09793591935', '2024-05-06 07:46:00', '2024-05-06 07:46:00'),
(6, 'DM YANGON (2)', 'အမှတ် 139 ကေတုမာလာရိပ်သာ အရှေ့ 1 လမ်း (4) ရပ်ကွက် တောင်ဥဣလာပမြို့နယ်။ PH- 09766223659 0945707094', 'YANGON', 'YANGON', 'NA', 'MYANMAR', '09766223659', '2024-05-06 07:46:00', '2024-05-06 07:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parcel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `cargo_type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `additional_charges` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `parcel_id`, `item`, `weight`, `cargo_type`, `amount`, `additional_charges`, `created_at`, `updated_at`) VALUES
(1, 44, 'food', '1', 'Sea Cargo', '1', '1', '2024-05-18 09:30:12', '2024-05-18 09:30:12'),
(2, 44, 'clothes', '2', 'Air Cargo', '2', '2', '2024-05-18 09:30:12', '2024-05-18 09:30:12'),
(3, 45, 'food', '2', 'Sea Cargo', '7', '3', '2024-05-18 11:50:12', '2024-05-18 11:50:12'),
(4, 46, 'food', '1', 'Sea Cargo', '1', '1', '2024-05-18 12:29:44', '2024-05-18 12:29:44'),
(5, 46, 'clothes', '2', 'Air Cargo', '2', '2', '2024-05-18 12:29:44', '2024-05-18 12:29:44'),
(6, 47, 'food', '1.5', 'Sea Cargo', '1.5', '1.5', '2024-05-18 12:32:35', '2024-05-18 12:32:35'),
(7, 47, 'clothes', '2.5', 'Air Cargo', '2.5', '2.5', '2024-05-18 12:32:36', '2024-05-18 12:32:36'),
(8, 48, 'food', '1.5', 'Sea Cargo', '1.5', '1.5', '2024-05-18 12:48:13', '2024-05-18 12:48:13'),
(9, 48, 'clothes', '2.5', 'Air Cargo', '2.5', '2.5', '2024-05-18 12:48:13', '2024-05-18 12:48:13'),
(10, 49, 'food', '1.5', 'Sea Cargo', '1.5', '1.5', '2024-05-18 12:51:22', '2024-05-18 12:51:22'),
(11, 49, 'clothes', '2.5', 'Air Cargo', '2.5', '2.5', '2024-05-18 12:51:22', '2024-05-18 12:51:22'),
(12, 50, 'food', '1.5', 'Sea Cargo', '1.5', '1.5', '2024-05-18 12:56:37', '2024-05-18 12:56:37'),
(13, 50, 'clothes', '2.5', 'Air Cargo', '2.5', '2.5', '2024-05-18 12:56:37', '2024-05-18 12:56:37'),
(14, 51, 'food', '1.5', 'Sea Cargo', '3', '2.5', '2024-05-18 13:03:47', '2024-05-18 13:03:47'),
(15, 51, 'clothes', '3.5', 'Air Cargo', '4.5', '5.5', '2024-05-18 13:03:47', '2024-05-18 13:03:47'),
(16, 52, 'delivery fees', '2', 'Sea Cargo', '2', '2', '2024-05-19 10:00:03', '2024-05-19 10:00:03'),
(17, 52, 'ice for food', '3', 'Air Cargo', '3', '3', '2024-05-19 10:00:03', '2024-05-19 10:00:03'),
(18, 53, 'ice for food', '78', 'Sea Cargo', '560.76', '676.78', '2024-05-20 01:27:16', '2024-05-20 01:27:16'),
(19, 53, 'delivery fees', '2', 'Sea Cargo', '2', '2', '2024-05-20 01:27:18', '2024-05-20 01:27:18'),
(20, 54, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-20 01:37:36', '2024-05-20 01:37:36'),
(21, 54, 'ice for food', '2', 'Air Cargo', '2', '2', '2024-05-20 01:37:36', '2024-05-20 01:37:36'),
(22, 55, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-20 01:43:11', '2024-05-20 01:43:11'),
(23, 55, 'ice for food', '2', 'Air Cargo', '2', '2', '2024-05-20 01:43:11', '2024-05-20 01:43:11'),
(24, 56, 'delivery fees', '78', 'Sea Cargo', '900', '67', '2024-05-20 01:46:07', '2024-05-20 01:46:07'),
(25, 56, 'ice for food', '2', 'Sea Cargo', '2', '2', '2024-05-20 01:46:07', '2024-05-20 01:46:07'),
(26, 57, 'delivery fees', '78.56', 'Air Cargo', '456', '67', '2024-05-20 01:52:38', '2024-05-20 01:52:38'),
(27, 57, 'ice for food', '78', 'Sea Cargo', '900', '67', '2024-05-20 01:52:38', '2024-05-20 01:52:38'),
(28, 58, 'ice for food', '78', 'Sea Cargo', '245', '67', '2024-05-20 01:54:29', '2024-05-20 01:54:29'),
(29, 58, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-20 01:54:29', '2024-05-20 01:54:29'),
(30, 59, 'ice for food', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-20 01:57:15', '2024-05-20 01:57:15'),
(31, 59, 'delivery fees', '78', 'Sea Cargo', '900', '67', '2024-05-20 01:57:15', '2024-05-20 01:57:15'),
(32, 60, 'ice for food', '78.56', 'Air Cargo', '560.76', '676.78', '2024-05-20 02:01:59', '2024-05-20 02:01:59'),
(33, 60, 'delivery fees', '78', 'Sea Cargo', '560', '67', '2024-05-20 02:02:00', '2024-05-20 02:02:00'),
(34, 61, 'ice for food', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-20 02:07:38', '2024-05-20 02:07:38'),
(35, 61, 'delivery fees', '78', 'Sea Cargo', '900', '67', '2024-05-20 02:07:38', '2024-05-20 02:07:38'),
(36, 62, 'ice for food', '78', 'Sea Cargo', '245', '67', '2024-05-20 02:15:10', '2024-05-20 02:15:10'),
(37, 62, 'delivery fees', '78.56', 'Sea Cargo', '560', '676.78', '2024-05-20 02:15:10', '2024-05-20 02:15:10'),
(38, 63, 'ice for food', '78.56', 'Sea Cargo', '560', '67', '2024-05-20 02:18:33', '2024-05-20 02:18:33'),
(39, 63, 'delivery fees', '2.6', 'Air Cargo', '345', '67.8', '2024-05-20 02:18:33', '2024-05-20 02:18:33'),
(40, 64, 'ice for food', '78.56', 'Sea Cargo', '560', '67', '2024-05-20 02:24:53', '2024-05-20 02:24:53'),
(41, 64, 'delivery fees', '7', 'Sea Cargo', '90', '6', '2024-05-20 02:24:53', '2024-05-20 02:24:53'),
(42, 65, 'delivery fees', '78', 'Air Cargo', '560.76', '676.78', '2024-05-20 02:28:33', '2024-05-20 02:28:33'),
(43, 65, 'ice for food', '78.56', 'Sea Cargo', '78987', '676.78', '2024-05-20 02:28:33', '2024-05-20 02:28:33'),
(44, 66, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-20 02:32:49', '2024-05-20 02:32:49'),
(45, 66, 'ice for food', '7', 'Sea Cargo', '5', '6', '2024-05-20 02:32:49', '2024-05-20 02:32:49'),
(46, 67, 'ice for food', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-20 02:43:41', '2024-05-20 02:43:41'),
(47, 67, 'delivery fees', '7', 'Sea Cargo', '5', '6', '2024-05-20 02:43:41', '2024-05-20 02:43:41'),
(48, 68, 'ice for food', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-20 02:52:14', '2024-05-20 02:52:14'),
(49, 68, 'delivery fees', '78', 'Sea Cargo', '560.76', '676.78', '2024-05-20 02:52:14', '2024-05-20 02:52:14'),
(50, 69, 'ice for food', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-20 02:55:59', '2024-05-20 02:55:59'),
(51, 69, 'delivery fees', '78', 'Air Cargo', '560.76', '67', '2024-05-20 02:55:59', '2024-05-20 02:55:59'),
(52, 70, 'ice for food', '7', 'Sea Cargo', '5', '6', '2024-05-20 03:23:49', '2024-05-20 03:23:49'),
(53, 70, 'delivery fees', '3', 'Sea Cargo', '4', '2', '2024-05-20 03:23:49', '2024-05-20 03:23:49'),
(54, 71, 'ice for food', '7', 'Sea Cargo', '5', '6', '2024-05-20 03:27:29', '2024-05-20 03:27:29'),
(55, 71, 'delivery fees', '9', 'Sea Cargo', '3', '8', '2024-05-20 03:27:29', '2024-05-20 03:27:29'),
(56, 72, 'ice for food', '7', 'Sea Cargo', '9', '6', '2024-05-20 03:34:23', '2024-05-20 03:34:23'),
(57, 72, 'delivery fees', '5', 'Sea Cargo', '4', '8', '2024-05-20 03:34:24', '2024-05-20 03:34:24'),
(58, 73, 'ice for food', '7', 'Sea Cargo', '5', '6', '2024-05-20 03:37:26', '2024-05-20 03:37:26'),
(59, 73, 'delivery fees', '8', 'Sea Cargo', '8', '4', '2024-05-20 03:37:26', '2024-05-20 03:37:26'),
(60, 74, 'ice for food', '7', 'Air Cargo', '5', '6', '2024-05-20 03:42:04', '2024-05-20 03:42:04'),
(61, 74, 'delivery fees', '8', 'Sea Cargo', '9', '4', '2024-05-20 03:42:04', '2024-05-20 03:42:04'),
(62, 75, 'ice for food', '3', 'Sea Cargo', '4', '2', '2024-05-20 03:45:20', '2024-05-20 03:45:20'),
(63, 75, 'delivery fees', '6', 'Air Cargo', '7', '5', '2024-05-20 03:45:21', '2024-05-20 03:45:21'),
(64, 76, 'ice for food', '78', 'Sea Cargo', '78987', '67', '2024-05-20 03:49:44', '2024-05-20 03:49:44'),
(65, 76, 'delivery fees', '78.56', 'Air Cargo', '560.76', '676.78', '2024-05-20 03:49:44', '2024-05-20 03:49:44'),
(66, 77, 'ice for food', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 03:51:15', '2024-05-20 03:51:15'),
(67, 77, 'delivery fees', '78.56', 'Air Cargo', '560.76', '67', '2024-05-20 03:51:15', '2024-05-20 03:51:15'),
(68, 78, 'ice for food', '78', 'Sea Cargo', '456', '67', '2024-05-20 03:54:05', '2024-05-20 03:54:05'),
(69, 78, 'cosmetics', '78', 'Sea Cargo', '560.76', '676.78', '2024-05-20 03:54:05', '2024-05-20 03:54:05'),
(70, 79, 'ice for food', '78', 'Sea Cargo', '560.76', '67', '2024-05-20 04:00:06', '2024-05-20 04:00:06'),
(71, 79, 'delivery fees', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 04:00:06', '2024-05-20 04:00:06'),
(72, 80, 'ice for food', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 04:03:18', '2024-05-20 04:03:18'),
(73, 80, 'delivery fees', '78', 'Sea Cargo', '78987', '676.78', '2024-05-20 04:03:18', '2024-05-20 04:03:18'),
(74, 81, 'ice for food', '78.56', 'Air Cargo', '78987', '67', '2024-05-20 04:06:01', '2024-05-20 04:06:01'),
(75, 81, 'delivery fees', '78.56', 'Air Cargo', '245', '67', '2024-05-20 04:06:01', '2024-05-20 04:06:01'),
(76, 82, 'ice for food', '78', 'Sea Cargo', '78987', '67', '2024-05-20 04:09:02', '2024-05-20 04:09:02'),
(77, 82, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-20 04:09:02', '2024-05-20 04:09:02'),
(78, 83, 'ice for food', '78.56', 'Air Cargo', '456', '676.78', '2024-05-20 04:11:19', '2024-05-20 04:11:19'),
(79, 83, 'delivery fees', '78.56', 'Sea Cargo', '245', '676.78', '2024-05-20 04:11:19', '2024-05-20 04:11:19'),
(80, 84, 'ice for food', '78', 'Sea Cargo', '456', '67', '2024-05-20 09:41:09', '2024-05-20 09:41:09'),
(81, 84, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-20 09:41:09', '2024-05-20 09:41:09'),
(82, 86, 'ice for food', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 09:50:08', '2024-05-20 09:50:08'),
(83, 87, 'delivery fees', '78.56', 'Sea Cargo', '78987', '676.78', '2024-05-20 09:53:22', '2024-05-20 09:53:22'),
(84, 88, 'ice for food', '78.56', 'Sea Cargo', '245', '67', '2024-05-20 09:54:48', '2024-05-20 09:54:48'),
(85, 89, 'delivery fees', '78', 'Sea Cargo', '900', '67', '2024-05-20 09:56:06', '2024-05-20 09:56:06'),
(86, 90, 'delivery fees', '78', 'Sea Cargo', '560.76', '67', '2024-05-20 09:58:21', '2024-05-20 09:58:21'),
(87, 91, 'cosmetics', '78', 'Sea Cargo', '900', '676.78', '2024-05-20 10:00:12', '2024-05-20 10:00:12'),
(88, 92, 'documents', '78', 'Sea Cargo', '78987', '67', '2024-05-20 10:01:43', '2024-05-20 10:01:43'),
(89, 93, 'ice for food', '7', 'Air Cargo', '4', '6', '2024-05-20 21:47:11', '2024-05-20 21:47:11'),
(90, 93, 'delivery fees', '2', 'Sea Cargo', '3', '9', '2024-05-20 21:47:11', '2024-05-20 21:47:11'),
(91, 94, 'ice for food', '2', 'Sea Cargo', '3', '4', '2024-05-20 21:59:17', '2024-05-20 21:59:17'),
(92, 94, 'delivery fees', '5', 'Sea Cargo', '2', '8', '2024-05-20 21:59:17', '2024-05-20 21:59:17'),
(93, 95, 'ice for food', '78.56', 'Sea Cargo', '245', '67', '2024-05-20 22:04:30', '2024-05-20 22:04:30'),
(94, 96, 'ice for food', '78.56', 'Sea Cargo', '245', '67', '2024-05-20 22:05:38', '2024-05-20 22:05:38'),
(95, 97, 'ice for food', '78.56', 'Air Cargo', '245', '676.78', '2024-05-20 22:11:57', '2024-05-20 22:11:57'),
(96, 98, 'delivery fees', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 22:15:32', '2024-05-20 22:15:32'),
(97, 99, 'medicine', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 22:23:26', '2024-05-20 22:23:26'),
(98, 100, 'delivery fees', '78', 'Sea Cargo', '245', '67', '2024-05-20 22:24:32', '2024-05-20 22:24:32'),
(99, 101, 'delivery fees', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 22:28:00', '2024-05-20 22:28:00'),
(100, 102, 'ice for food', '78.56', 'Sea Cargo', '78987', '67', '2024-05-20 22:31:03', '2024-05-20 22:31:03'),
(101, 103, 'delivery fees', '78', 'Air Cargo', '560.76', '676.78', '2024-05-20 22:32:56', '2024-05-20 22:32:56'),
(102, 104, 'ice for food', '78', 'Air Cargo', '78987', '67', '2024-05-20 22:34:49', '2024-05-20 22:34:49'),
(103, 105, 'ice for food', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-21 00:40:52', '2024-05-21 00:40:52'),
(104, 105, 'cosmetics', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-21 00:40:52', '2024-05-21 00:40:52'),
(105, 106, 'ice for food', '78', 'Sea Cargo', '78987', '67', '2024-05-21 00:43:40', '2024-05-21 00:43:40'),
(106, 106, 'delivery fees', '78', 'Air Cargo', '560.76', '676.78', '2024-05-21 00:43:40', '2024-05-21 00:43:40'),
(107, 107, 'ice for food', '78.56', 'Air Cargo', '560', '67', '2024-05-21 00:46:33', '2024-05-21 00:46:33'),
(108, 107, 'ice for food', '78.56', 'Sea Cargo', '560', '676.78', '2024-05-21 00:46:33', '2024-05-21 00:46:33'),
(109, 108, 'delivery fees', '78.56', 'Sea Cargo', '78987', '676.78', '2024-05-21 00:49:23', '2024-05-21 00:49:23'),
(110, 108, 'ice for food', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-21 00:49:23', '2024-05-21 00:49:23'),
(111, NULL, 'ice for food', '78', 'Sea Cargo', '245', '676.78', '2024-05-21 00:50:57', '2024-05-21 00:50:57'),
(112, NULL, 'delivery fees', '78.56', 'Sea Cargo', '560', '676.78', '2024-05-21 00:50:57', '2024-05-21 00:50:57'),
(113, 110, 'ice for food', '78', 'Air Cargo', '456', '676.78', '2024-05-21 01:01:10', '2024-05-21 01:01:10'),
(114, 110, 'ice for food', '78', 'Sea Cargo', '456', '676.78', '2024-05-21 01:01:10', '2024-05-21 01:01:10'),
(115, 111, 'ice for food', '78.56', 'Air Cargo', '560.76', '67', '2024-05-21 01:29:14', '2024-05-21 01:29:14'),
(116, 111, 'ice for food', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-21 01:29:14', '2024-05-21 01:29:14'),
(117, 112, 'ice for food', '78.56', 'Air Cargo', '560.76', '67', '2024-05-21 01:50:34', '2024-05-21 01:50:34'),
(118, 112, 'ice for food', '78', 'Sea Cargo', '78987', '67', '2024-05-21 01:50:34', '2024-05-21 01:50:34'),
(119, 113, 'ice for food', '78.56', 'Sea Cargo', '245', '67', '2024-05-21 06:49:05', '2024-05-21 06:49:05'),
(120, 113, 'delivery fees', '78', 'Air Cargo', '456', '67', '2024-05-21 06:49:05', '2024-05-21 06:49:05'),
(121, NULL, 'ice for food', '78.56', 'Sea Cargo', '78987', '676.78', '2024-05-21 07:02:41', '2024-05-21 07:02:41'),
(140, 115, 'clothes', '3', 'Sea Cargo', '2', '', '2024-05-22 06:04:33', '2024-05-22 06:04:33'),
(141, 117, 'food', '78.56', 'Sea Cargo', '560.76', '', '2024-05-22 06:19:59', '2024-05-22 06:19:59'),
(142, 117, 'medicine', '3', 'Air Cargo', '6', '3', '2024-05-22 06:19:59', '2024-05-22 06:19:59'),
(143, 118, 'delivery fees', '78.56', 'Air Cargo', '560.76', '', '2024-05-22 06:23:58', '2024-05-22 06:23:58'),
(144, 118, 'ice for food', '1', 'Sea Cargo', '2', '67', '2024-05-22 06:23:58', '2024-05-22 06:23:58'),
(149, 121, 'ice for food', '78', 'Sea Cargo', '560.76', '67', '2024-05-23 00:43:25', '2024-05-23 00:43:25'),
(150, 121, 'ice for food', '78', 'Sea Cargo', '560.76', '67', '2024-05-23 00:43:25', '2024-05-23 00:43:25'),
(151, 121, 'delivery fees', '78', 'Sea Cargo', '560.76', '', '2024-05-23 00:43:25', '2024-05-23 00:43:25'),
(152, 123, 'ice for food', '78', 'Air Cargo', '78987', '676.78', '2024-05-23 00:44:29', '2024-05-23 00:44:29'),
(156, 119, 'delivery fees', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-23 05:34:59', '2024-05-23 05:34:59'),
(157, 120, 'documents', '78', 'Sea Cargo', '560', '676.78', '2024-05-23 05:45:16', '2024-05-23 05:45:16'),
(158, 120, 'food', '78', 'Sea Cargo', '78987', '67', '2024-05-23 05:45:16', '2024-05-23 05:45:16'),
(159, 120, 'clothes', '1', 'Sea Cargo', '2', '4', '2024-05-23 05:45:16', '2024-05-23 05:45:16'),
(160, 124, 'ice for food', '78.56', 'Sea Cargo', '560', '', '2024-05-23 22:21:17', '2024-05-23 22:21:17'),
(161, 126, 'clothes', '78.56', 'Sea Cargo', '560.76', '', '2024-05-23 22:37:38', '2024-05-23 22:37:38'),
(162, 127, 'ice for food', '78.56', 'Sea Cargo', '245', '67', '2024-05-23 22:44:09', '2024-05-23 22:44:09'),
(163, 127, 'delivery fees', '78', 'Sea Cargo', '456', '676.78', '2024-05-23 22:44:09', '2024-05-23 22:44:09'),
(164, 128, 'medicine', '78', 'Sea Cargo', '560.76', '67', '2024-05-23 23:01:39', '2024-05-23 23:01:39'),
(165, 129, 'food', '78.56', 'Sea Cargo', '78987', '676.78', '2024-05-23 23:02:37', '2024-05-23 23:02:37'),
(166, 130, 'cosmetics', '78', 'Air Cargo', '78987', '67', '2024-05-23 23:04:03', '2024-05-23 23:04:03'),
(167, 131, 'clothes', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-23 23:07:36', '2024-05-23 23:07:36'),
(168, 132, 'delivery fees', '78', 'Sea Cargo', '560.76', '67', '2024-05-23 23:15:02', '2024-05-23 23:15:02'),
(169, 133, 'delivery fees', '78.56', 'Sea Cargo', '900', '676.78', '2024-05-23 23:16:09', '2024-05-23 23:16:09'),
(170, 134, 'delivery fees', '78', 'Air Cargo', '560.76', '676.78', '2024-05-23 23:22:12', '2024-05-23 23:22:12'),
(171, 135, 'ice for food', '78', 'Sea Cargo', '78987', '676.78', '2024-05-23 23:25:17', '2024-05-23 23:25:17'),
(172, 136, 'medicine', '78', 'Sea Cargo', '245', '676.78', '2024-05-23 23:26:23', '2024-05-23 23:26:23'),
(173, 137, 'delivery fees', '78', 'Sea Cargo', '560.76', '67', '2024-05-23 23:30:15', '2024-05-23 23:30:15'),
(174, 138, 'medicine', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-23 23:31:09', '2024-05-23 23:31:09'),
(175, 139, 'food', '78', 'Sea Cargo', '560.76', '676.78', '2024-05-23 23:34:42', '2024-05-23 23:34:42'),
(176, 140, 'documents', '78', 'Sea Cargo', '900', '676.78', '2024-05-24 00:18:35', '2024-05-24 00:18:35'),
(177, 141, 'ice for food', '78', 'Sea Cargo', '78987', '676.78', '2024-05-24 00:20:32', '2024-05-24 00:20:32'),
(178, 142, 'cosmetics', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-24 00:22:05', '2024-05-24 00:22:05'),
(179, 143, 'medicine', '78', 'Air Cargo', '456', '67', '2024-05-24 00:23:14', '2024-05-24 00:23:14'),
(180, 144, 'ice for food', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-24 05:52:59', '2024-05-24 05:52:59'),
(181, 144, 'delivery fees', '78', 'Sea Cargo', '560', '67', '2024-05-24 05:52:59', '2024-05-24 05:52:59'),
(182, 144, 'clothes', '78', 'Sea Cargo', '245', '', '2024-05-24 05:52:59', '2024-05-24 05:52:59'),
(183, 145, 'ice for food', '78.56', 'Sea Cargo', '900', '67', '2024-05-24 05:57:28', '2024-05-24 05:57:28'),
(184, 146, 'medicine', '78.56', 'Air Cargo', '560.76', '67', '2024-05-24 05:58:53', '2024-05-24 05:58:53'),
(185, 147, 'ice for food', '78', 'Sea Cargo', '456', '676.78', '2024-05-24 06:05:57', '2024-05-24 06:05:57'),
(186, 148, 'ice for food', '78.56', 'Sea Cargo', '245', '676.78', '2024-05-24 06:07:36', '2024-05-24 06:07:36'),
(187, 149, 'clothes', '78.56', 'Air Cargo', '78987', '67', '2024-05-24 09:41:18', '2024-05-24 09:41:18'),
(188, 150, 'cosmetics', '78.56', 'Air Cargo', '456', '67', '2024-05-24 22:48:34', '2024-05-24 22:48:34'),
(189, 150, 'cosmetics', '78.56', 'Sea Cargo', '900', '', '2024-05-24 22:48:34', '2024-05-24 22:48:34'),
(190, 150, 'cosmetics', '78', 'Air Cargo', '245', '676.78', '2024-05-24 22:48:34', '2024-05-24 22:48:34'),
(191, 151, 'cosmetics', '78.56', 'Sea Cargo', '560.76', '67', '2024-05-24 23:06:49', '2024-05-24 23:06:49'),
(192, 152, 'ice for food', '78.56', 'Air Cargo', '560.76', '67', '2024-05-25 05:47:42', '2024-05-25 05:47:42'),
(193, 153, 'documents', '78', 'Sea Cargo', '560.76', '67', '2024-05-25 05:53:40', '2024-05-25 05:53:40'),
(216, NULL, 'Jewlary', '78', 'Sea Cargo', '560.76', '67', '2024-05-26 03:14:35', '2024-05-26 03:14:35'),
(217, NULL, 'other item', '78', 'Sea Cargo', '560.76', '676.78', '2024-05-26 03:14:35', '2024-05-26 03:14:35'),
(218, 154, 'medicine', '78', 'Sea Cargo', '560.76', '676.78', '2024-05-26 03:15:14', '2024-05-26 03:15:14'),
(219, 154, 'delivery fees', '78.56', 'Sea Cargo', '560', '', '2024-05-26 03:15:14', '2024-05-26 03:15:14'),
(220, 156, 'Jewelary', '78', 'Sea Cargo', '78987', '676.78', '2024-05-27 06:09:53', '2024-05-27 06:09:53'),
(221, 156, 'Gold', '78.56', 'Sea Cargo', '560.76', '676.78', '2024-05-27 06:09:53', '2024-05-27 06:09:53'),
(222, 157, 'Gold', '2', 'Air Cargo', '3', '4', '2024-05-27 06:11:25', '2024-05-27 06:11:25'),
(223, 157, 'Jewelary', '5', 'Sea Cargo', '6', '8', '2024-05-27 06:11:25', '2024-05-27 06:11:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2024_04_09_065315_create_branches_table', 1),
(4, '2024_04_11_175237_create_roles_table', 1),
(5, '2024_04_13_120351_create_statuses_table', 1),
(6, '0001_01_01_000000_create_users_table', 2),
(7, '2024_04_24_131207_create_parcel_statuses_table', 3),
(8, '2024_04_13_114322_create_parcels_table', 4),
(9, '2024_05_18_124946_create_items_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TrackingId` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `SenderName` varchar(255) DEFAULT NULL,
  `SenderContact` varchar(255) DEFAULT NULL,
  `RecieverName` varchar(255) DEFAULT NULL,
  `RecieverAddress` varchar(255) DEFAULT NULL,
  `RecieverContact` varchar(255) DEFAULT NULL,
  `PickupBranchId` varchar(255) DEFAULT NULL,
  `ProcessedBranchId` varchar(255) DEFAULT NULL,
  `PaymentStatus` varchar(255) DEFAULT NULL,
  `ParcelImage` varchar(255) DEFAULT NULL,
  `RecieverSignature` varchar(255) DEFAULT NULL,
  `SignatureDate` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `TrackingId`, `status_id`, `SenderName`, `SenderContact`, `RecieverName`, `RecieverAddress`, `RecieverContact`, `PickupBranchId`, `ProcessedBranchId`, `PaymentStatus`, `ParcelImage`, `RecieverSignature`, `SignatureDate`, `created_at`, `updated_at`) VALUES
(1, 'DMYANGON(MAIN)67891713932849', 5, 'Kashif', '12345', 'Ihtisham', 'DM Mandalay Myanmar', '6789', '3', '2', 'Paid', NULL, '662a3e204ce05.png', NULL, '2024-05-06 09:02:30', '2024-05-06 09:02:30'),
(2, 'DMTAUNGOO999831714183306', 5, 'usman', '67555', 'usman', 'DM Taungoo', '9983', '3', '2', 'COD', NULL, NULL, NULL, '2024-05-06 09:54:01', '2024-05-06 09:54:01'),
(3, 'DMMONYWA6557651714189833', 1, 'test', '789979', 'Ihtisham', 'DM Mandalay Myanmar', '655765', '2', '4', 'Paid', NULL, NULL, NULL, '2024-05-06 09:54:01', '2024-05-06 09:54:01'),
(4, 'DMYANGON(MAIN)67891714198874', 6, 'khalid', '12345', 'Ahsan', 'DM Mandalay Myanmar', '6789', '2', '5', 'Paid', NULL, '66547081a3819.png', NULL, '2024-05-06 10:04:44', '2024-05-27 06:37:37'),
(5, 'DMYANGON(MAIN)6557651714199808', 1, 'Amir', '88876', 'Liaqat', 'Liaqat abad', '343', '4', '2', 'COD', NULL, NULL, NULL, '2024-05-06 10:07:26', '2024-05-06 10:07:26'),
(6, 'DMTaungoo30705052024', 1, 'sender', '345', 'reciever', 'reciever address', '307', '4', '2', 'Paid', NULL, NULL, NULL, '2024-05-06 10:10:52', '2024-05-06 10:10:52'),
(21, 'DMTaungoo678909052024', 1, 'Kashif', '345', 'test', 'uiyuiyi', '6789', '4', '4', 'Paid', '', NULL, NULL, '2024-05-09 12:53:17', '2024-05-09 12:53:17'),
(22, 'DMMONYWA877777709052024', 1, 'Khalid', '12345', 'iuyui', 'Ihtisham', '8777777', '5', '4', 'COD', '', NULL, NULL, '2024-05-09 12:56:56', '2024-05-09 12:56:56'),
(25, 'DMMandalay678909055930', 1, 'Khalid', '67868', 'Ihtisham', 'uiyuiyi', '6789', '3', '3', 'Paid', '', NULL, NULL, '2024-05-09 13:31:00', '2024-05-09 13:31:00'),
(26, 'DMYangon(Main)78677814055556', 1, 'Khalid', '1341', 'staff', 'reciever address', '786778', '2', '1', 'COD', '', NULL, NULL, '2024-05-14 02:56:58', '2024-05-14 02:56:58'),
(27, 'DMMONYWA65576514051014', 1, 'Kashif', '12345', 'Ihtisham', 'DM Mandalay Myanmar', '655765', '5', '5', 'Paid', '', NULL, NULL, '2024-05-14 03:14:11', '2024-05-14 03:14:11'),
(28, 'DMTaungoo65576514051153', 1, 'Kashif', '345', 'iuyui', 'uiyuiyi', '655765', '4', '4', 'Paid', '', NULL, NULL, '2024-05-14 05:53:12', '2024-05-14 05:53:12'),
(29, 'DMMONYWA65576514053211', 1, 'Khalid', '789979', 'iuyui', 'DM Mandalay Myanmar', '655765', '5', '5', 'COD', '', NULL, NULL, '2024-05-14 06:11:33', '2024-05-14 06:11:33'),
(30, 'dmmonywa2525', 1, 'test', '67868', 'Ahsan', 'staff', '12345', '5', '3', 'COD', '', NULL, NULL, '2024-05-17 06:25:40', '2024-05-17 06:25:40'),
(31, 'dmyangon(2)2907', 1, 'akljl', '1341', 'reciever', 'reciever address', '655765', '6', '4', 'COD', '', NULL, NULL, '2024-05-17 07:07:43', '2024-05-17 07:07:43'),
(32, 'dmmandalay0013', 1, 'sender', '789979', 'staff', 'DM Mandalay Myanmar', '655765', '3', '5', 'COD', '', NULL, NULL, '2024-05-17 07:13:16', '2024-05-17 07:13:16'),
(33, 'dmsingapore2621', 1, 'Khalid', '67868', 'Ahsan', 'DM Mandalay Myanmar', '445334', '1', '1', 'COD', '', NULL, NULL, '2024-05-17 07:22:16', '2024-05-17 07:22:16'),
(34, 'dmsingaporeezq4r', 1, 'khalid', '67868', 'Ahsan', 'uiyuiyi', '445334', '1', '5', 'COD', '', NULL, NULL, '2024-05-17 07:29:43', '2024-05-17 07:29:43'),
(35, 'dmsingapore47474', 1, 'sender', '789979', 'staff', 'staff', '655765', '1', '4', 'COD', '', NULL, NULL, '2024-05-17 07:36:16', '2024-05-17 07:36:16'),
(36, 'dmsingapore94076', 1, 'old value', '789979', 'iuyui', 'staff', '655765', '1', '1', 'COD', '', NULL, NULL, '2024-05-17 12:05:20', '2024-05-17 12:05:20'),
(37, 'dmtaungoo64033', 1, 'khalid', '789979', 'Ihtisham', 'uiyuiyi', '655765', '4', '2', 'COD', '', NULL, NULL, '2024-05-17 12:08:09', '2024-05-17 12:08:09'),
(38, 'dmyangon(2)90227', 1, 'khalid', '789979', 'iuyui', 'reciever address', '655765', '6', '1', 'COD', '', NULL, NULL, '2024-05-17 12:11:22', '2024-05-17 12:11:22'),
(39, 'dmtaungoo82049', 1, 'Khalid', '345', 'Ihtisham', 'Ihtisham', '655765', '4', '3', 'COD', '', NULL, NULL, '2024-05-17 12:11:59', '2024-05-17 12:11:59'),
(40, 'dmyangon(main)52201', 6, 'khalid', '345', 'Ihtisham', 'Ihtisham', '445334', '2', '4', 'COD', '', '665470a4ce667.png', NULL, '2024-05-17 12:14:15', '2024-05-27 06:38:12'),
(41, 'dmyangon(main)48838', 1, 'khalid', '789979', 'iuyui', 'reciever address', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-17 23:10:26', '2024-05-17 23:10:26'),
(42, 'dmyangon(main)93291', 1, 'Khalid', '789979', 'iuyui', 'Ihtisham', '445334', '2', '3', 'COD', '', NULL, NULL, '2024-05-18 01:17:53', '2024-05-18 01:17:53'),
(43, 'dmyangon(main)83599', 1, 'sender', '345', 'Ihtisham', 'DM Mandalay Myanmar', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-18 01:21:14', '2024-05-18 01:21:14'),
(44, 'dmsingapore95387', 1, 'khalid', '12345', 'iuyui', 'uiyuiyi', '445334', '1', '1', 'COD', '', NULL, NULL, '2024-05-18 09:30:12', '2024-05-18 09:30:12'),
(45, 'dmyangon(main)87100', 1, 'asif', '89080', 'salman', 'peshawar', '890809', '2', '3', 'COD', '', NULL, NULL, '2024-05-18 11:50:12', '2024-05-18 11:50:12'),
(46, 'dmyangon(main)49095', 6, 'jamshed', '12345', 'Ikram', 'Lakki', '67890', '2', '2', 'COD', '', NULL, NULL, '2024-05-18 12:29:44', '2024-05-18 12:29:44'),
(47, 'dmsingapore88692', 1, 'Kashif', '789979', 'Ihtisham', 'uiyuiyi', '6789', '1', '5', 'COD', '', NULL, NULL, '2024-05-18 12:32:35', '2024-05-18 12:32:35'),
(48, 'dmsingapore39523', 6, 'Kashif', '789979', 'Ihtisham', 'Ihtisham', '6789', '1', '2', 'COD', '', NULL, NULL, '2024-05-18 12:48:13', '2024-05-18 12:48:13'),
(49, 'dmyangon(main)89913', 1, 'Kashif', '789979', 'iuyui', 'uiyuiyi', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-18 12:51:22', '2024-05-18 12:51:22'),
(50, 'dmsingapore51527', 5, 'sender', '12345', 'Ihtisham', 'DM Mandalay Myanmar', '6789', '5', '2', 'COD', '', NULL, NULL, '2024-05-18 12:56:37', '2024-05-19 07:11:15'),
(51, 'dmyangon(main)97424', 4, 'sender', '789979', 'Ahsan', 'DM Mandalay Myanmar', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-18 13:03:47', '2024-05-18 13:03:47'),
(52, 'dmsingapore71134', 1, 'khalid', '345', 'iuyui', 'DM Mandalay Myanmar', '6789', '1', '1', 'COD', '', NULL, NULL, '2024-05-19 10:00:03', '2024-05-19 10:00:03'),
(53, 'dmyangon(main)78917', 1, 'khalid', '789979', 'test', 'Ihtisham', '655765', '2', '1', 'COD', '', NULL, NULL, '2024-05-20 01:27:15', '2024-05-20 01:27:15'),
(54, 'dmsingapore71436', 1, 'khalid', '789979', 'Ihtisham', 'Ihtisham', '655765', '1', '1', 'COD', '', NULL, NULL, '2024-05-20 01:37:36', '2024-05-20 01:37:36'),
(55, 'dmyangon(main)64692', 1, 'Kashif', '345', 'iuyui', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 01:43:11', '2024-05-20 01:43:11'),
(56, 'dmyangon(main)74133', 1, 'khalid', '345', 'test', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 01:46:07', '2024-05-20 01:46:07'),
(57, 'dmsingapore36730', 1, 'Kashif', '12345', 'iuyui', 'uiyuiyi', '445334', '1', '1', 'COD', '', NULL, NULL, '2024-05-20 01:52:38', '2024-05-20 01:52:38'),
(58, 'dmyangon(main)68174', 1, 'Khalid', '12345', 'iuyui', 'uiyuiyi', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 01:54:29', '2024-05-20 01:54:29'),
(59, 'dmmonywa18577', 1, 'Kashif', '345', 'test', 'Ihtisham', '6789', '5', '5', 'COD', '', NULL, NULL, '2024-05-20 01:57:15', '2024-05-20 01:57:15'),
(60, 'dmmandalay78035', 1, 'sender', '1341', 'test', 'uiyuiyi', '445334', '3', '2', 'COD', '', NULL, NULL, '2024-05-20 02:01:59', '2024-05-20 02:01:59'),
(61, 'dmyangon(main)88755', 1, 'Khalid', '12345', 'test', 'DM Mandalay Myanmar', '6789', '2', '1', 'COD', '', NULL, NULL, '2024-05-20 02:07:38', '2024-05-20 02:07:38'),
(62, 'dmyangon(main)73439', 1, 'Kashif', '12345', 'iuyui', 'reciever address', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:15:10', '2024-05-20 02:15:10'),
(63, 'dmyangon(main)65974', 1, 'khalid', '789979', 'Ihtisham', 'uiyuiyi', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:18:33', '2024-05-20 02:18:33'),
(64, 'dmyangon(main)10553', 1, 'Kashif', '789979', 'iuyui', 'uiyuiyi', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:24:53', '2024-05-20 02:24:53'),
(65, 'dmyangon(main)32641', 1, 'Kashif', '12345', 'test', 'DM Mandalay Myanmar', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:28:33', '2024-05-20 02:28:33'),
(66, 'dmyangon(main)49115', 1, 'khalid', '12345', 'Ihtisham', 'uiyuiyi', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:32:49', '2024-05-20 02:32:49'),
(67, 'dmyangon(main)81541', 1, 'Kashif', '345', 'test', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:43:41', '2024-05-20 02:43:41'),
(68, 'dmyangon(main)22558', 1, 'khalid', '789979', 'Ihtisham', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:52:13', '2024-05-20 02:52:13'),
(69, 'dmyangon(main)29545', 1, 'Kashif', '345', 'iuyui', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 02:55:58', '2024-05-20 02:55:58'),
(70, 'dmyangon(main)74040', 1, 'Khalid', '12345', 'iuyui', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:23:49', '2024-05-20 03:23:49'),
(71, 'dmyangon(main)32407', 1, 'khalid', '789979', 'Ihtisham', 'DM Mandalay Myanmar', '655765', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:27:29', '2024-05-20 03:27:29'),
(72, 'dmyangon(main)68565', 1, 'Kashif', '789979', 'iuyui', 'uiyuiyi', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:34:23', '2024-05-20 03:34:23'),
(73, 'dmyangon(main)32501', 1, 'khalid', '345', 'Ihtisham', 'Ihtisham', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:37:25', '2024-05-20 03:37:25'),
(74, 'dmyangon(main)96349', 1, 'Kashif', '345', 'iuyui', 'uiyuiyi', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:42:04', '2024-05-20 03:42:04'),
(75, 'dmyangon(main)32481', 1, 'Kashif', '67868', 'Ihtisham', 'uiyuiyi', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:45:20', '2024-05-20 03:45:20'),
(76, 'dmyangon(main)19287', 1, 'khalid', '789979', 'Ihtisham', 'uiyuiyi', '655765', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:49:44', '2024-05-20 03:49:44'),
(77, 'dmyangon(main)32268', 1, 'Kashif', '345', 'Ihtisham', 'DM Mandalay Myanmar', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:51:15', '2024-05-20 03:51:15'),
(78, 'dmyangon(main)28002', 1, 'khalid', '12345', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '445334', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 03:54:05', '2024-05-20 03:54:05'),
(79, 'dmyangon(main)36630', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 04:00:05', '2024-05-20 04:00:05'),
(80, 'dmyangon(main)83690', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 04:03:18', '2024-05-20 04:03:18'),
(81, 'dmyangon(main)31306', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 04:06:01', '2024-05-20 04:06:01'),
(82, 'dmyangon(main)35023', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 04:09:02', '2024-05-20 04:09:02'),
(83, 'dmyangon(main)36785', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 04:11:19', '2024-05-20 04:11:19'),
(84, 'dmyangon(main)99047', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-20 09:41:09', '2024-05-20 09:41:09'),
(85, 'dmyangon(main)23798', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-20 09:46:49', '2024-05-20 09:46:49'),
(86, 'dmyangon(main)51762', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-20 09:50:08', '2024-05-20 09:50:08'),
(87, 'dmyangon(main)54276', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-20 09:53:21', '2024-05-20 09:53:21'),
(88, 'dmyangon(main)48935', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-20 09:54:48', '2024-05-20 09:54:48'),
(89, 'dmyangon(main)88766', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-20 09:56:06', '2024-05-20 09:56:06'),
(90, 'dmsingapore80078', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '1', 'COD', '', NULL, NULL, '2024-05-20 09:58:21', '2024-05-20 09:58:21'),
(91, 'dmmonywa12192', 1, 'Kashif', '789979', 'test', 'reciever address', '655765', '5', '3', 'COD', '', NULL, NULL, '2024-05-20 10:00:12', '2024-05-20 10:00:12'),
(92, 'dmtaungoo15034', 1, 'Khalid Usman', '345345345345', 'test', 'DM Mandalay Myanmar', '655765345345', '4', '1', 'COD', '', NULL, NULL, '2024-05-20 10:01:43', '2024-05-20 10:01:43'),
(93, 'dmyangon(main)86895', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '5', 'COD', '', NULL, NULL, '2024-05-20 21:47:10', '2024-05-20 21:47:10'),
(94, 'dmyangon(main)21930', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-20 21:59:17', '2024-05-20 21:59:17'),
(95, 'dmyangon(main)49514', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-20 22:04:30', '2024-05-20 22:04:30'),
(96, 'dmyangon(main)73092', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-20 22:05:38', '2024-05-20 22:05:38'),
(97, 'dmyangon(main)39244', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'Paid', '', NULL, NULL, '2024-05-20 22:11:57', '2024-05-20 22:11:57'),
(98, 'dmmandalay18111', 1, 'Kashif', '345345345345', 'test', 'Ihtisham', '6789', '3', '3', 'COD', '', NULL, NULL, '2024-05-20 22:15:32', '2024-05-20 22:15:32'),
(99, 'dmyangon(main)25025', 1, 'Kashif', '12345', 'iuyui', 'Ihtisham', '655765', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 22:23:26', '2024-05-20 22:23:26'),
(100, 'dmsingapore36847', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '6789', '1', '3', 'COD', '', NULL, NULL, '2024-05-20 22:24:32', '2024-05-20 22:24:32'),
(101, 'dmyangon(main)10202', 1, 'Kashif', '345', 'iuyui', 'Ihtisham', '655765', '2', '2', 'COD', '', NULL, NULL, '2024-05-20 22:28:00', '2024-05-20 22:28:00'),
(102, 'dmyangon(main)74468', 1, 'Kashif', '345', 'iuyui', 'Ihtisham', '6789', '2', '2', 'Paid', '', NULL, NULL, '2024-05-20 22:31:03', '2024-05-20 22:31:03'),
(103, 'dmmandalay85519', 1, 'Kashif', '345', 'iuyui', 'Ihtisham', '6789', '3', '1', 'COD', '', NULL, NULL, '2024-05-20 22:32:56', '2024-05-20 22:32:56'),
(104, 'dmyangon(main)15089', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-20 22:34:49', '2024-05-20 22:34:49'),
(105, 'dmyangon(main)34687', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-21 00:40:51', '2024-05-21 00:40:51'),
(106, 'dmyangon(main)15709', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-21 00:43:40', '2024-05-21 00:43:40'),
(107, 'dmyangon(main)88575', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'COD', '', NULL, NULL, '2024-05-21 00:46:33', '2024-05-21 00:46:33'),
(108, 'dmyangon(main)61850', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-21 00:49:23', '2024-05-21 00:49:23'),
(110, 'dmyangon(main)36282', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '5', 'COD', '', NULL, NULL, '2024-05-21 01:01:10', '2024-05-21 01:01:10'),
(111, 'dmyangon(main)70789', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'COD', '', NULL, NULL, '2024-05-21 01:29:14', '2024-05-21 01:29:14'),
(112, 'dmyangon(main)30977', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '5', 'COD', '', NULL, NULL, '2024-05-21 01:50:34', '2024-05-21 01:50:34'),
(113, 'dmyangon(main)45725', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'Paid', '', NULL, NULL, '2024-05-21 06:49:05', '2024-05-21 06:49:05'),
(115, 'dmsingapore29288', 6, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay', '655765345345', '1', '6', 'Paid', '1383339929.jpg', NULL, NULL, '2024-05-21 10:21:46', '2024-05-22 05:59:46'),
(117, 'dmyangon(main)51885', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '5', 'Paid', '', NULL, NULL, '2024-05-22 06:19:59', '2024-05-22 06:19:59'),
(118, 'dmsingapore98628', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '2', 'Paid', '', NULL, NULL, '2024-05-22 06:23:58', '2024-05-22 06:23:58'),
(119, 'dmmandalay92007', 1, 'khalid', '789979', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765', '3', '3', 'Paid', '', NULL, NULL, '2024-05-23 00:27:05', '2024-05-23 00:27:05'),
(120, 'dmmandalay79921', 1, 'khalid', '789979', 'test', 'uiyuiyi', '6789', '3', '1', 'Paid', '', NULL, NULL, '2024-05-23 00:37:22', '2024-05-23 00:37:22'),
(121, 'dmmandalay60411', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '3', '2', 'Paid', '', NULL, NULL, '2024-05-23 00:43:25', '2024-05-23 00:43:25'),
(123, 'dmsingapore27964', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '4', 'Paid', '', NULL, NULL, '2024-05-23 00:44:29', '2024-05-23 00:44:29'),
(124, 'dmmandalay13168', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '3', '4', 'Paid', '', NULL, NULL, '2024-05-23 22:21:17', '2024-05-23 22:21:17'),
(125, 'dmtaungoo79624', 1, 'Khalid Usman', '345', 'Ihtisham Khan', 'Ihtisham', '445334', '4', '4', 'Paid', '', NULL, NULL, '2024-05-23 22:31:34', '2024-05-23 22:31:34'),
(126, 'dmyangon(main)76042', 1, 'khalid', '789979', 'Ihtisham', 'uiyuiyi', '6789', '2', '1', 'Paid', '', NULL, NULL, '2024-05-23 22:37:37', '2024-05-23 22:37:37'),
(127, 'dmyangon(main)72207', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '3', 'Paid', '', NULL, NULL, '2024-05-23 22:44:09', '2024-05-23 22:44:09'),
(128, 'dmmandalay63934', 1, 'Kashif', '12345', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '6789', '3', '3', 'Paid', '', NULL, NULL, '2024-05-23 23:01:39', '2024-05-23 23:01:39'),
(129, 'dmtaungoo86157', 1, 'Kashif', '345345345345', 'iuyui', 'Ihtisham', '6789', '4', '3', 'Paid', '', NULL, NULL, '2024-05-23 23:02:37', '2024-05-23 23:02:37'),
(130, 'dmyangon(main)13720', 1, 'Kashif', '345', 'Ihtisham', 'Ihtisham', '6789', '2', '1', 'Paid', '', NULL, NULL, '2024-05-23 23:04:02', '2024-05-23 23:04:02'),
(131, 'dmtaungoo72997', 1, 'Kashif', '345345345345', 'iuyui', 'Ihtisham', '6789', '4', '4', 'Paid', '', NULL, NULL, '2024-05-23 23:07:36', '2024-05-23 23:07:36'),
(132, 'dmsingapore95651', 1, 'Kashif', '345345345345', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '2', 'Paid', '', NULL, NULL, '2024-05-23 23:15:02', '2024-05-23 23:15:02'),
(133, 'dmsingapore11977', 1, 'Kashif', '789979', 'iuyui', 'Ihtisham', '655765', '1', '2', 'Paid', '', NULL, NULL, '2024-05-23 23:16:09', '2024-05-23 23:16:09'),
(134, 'dmyangon(main)25044', 1, 'Kashif', '345', 'iuyui', 'Ihtisham', '6789', '2', '2', 'COD', '', NULL, NULL, '2024-05-23 23:22:12', '2024-05-23 23:22:12'),
(135, 'dmsingapore15185', 1, 'Khalid Usman', '345', 'iuyui', 'Ihtisham', '655765345345', '1', '1', 'Paid', '', NULL, NULL, '2024-05-23 23:25:17', '2024-05-23 23:25:17'),
(136, 'dmyangon(main)33284', 1, 'khalid', '345345345345', 'iuyui', 'Ihtisham', '6789', '2', '2', 'Paid', '', NULL, NULL, '2024-05-23 23:26:23', '2024-05-23 23:26:23'),
(137, 'dmsingapore81445', 1, 'Khalid Usman', '345345345345', 'iuyui', 'Ihtisham', '655765345345', '1', '1', 'Paid', '', NULL, NULL, '2024-05-23 23:30:15', '2024-05-23 23:30:15'),
(138, 'dmyangon(2)22017', 1, 'Khalid Usman', '789979', 'Ihtisham', 'uiyuiyi', '6789', '6', '5', 'Paid', '', NULL, NULL, '2024-05-23 23:31:09', '2024-05-23 23:31:09'),
(139, 'dmsingapore44103', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'Ihtisham', '655765345345', '1', '3', 'Paid', '', NULL, NULL, '2024-05-23 23:34:42', '2024-05-23 23:34:42'),
(140, 'dmyangon(main)78775', 1, 'Khalid Usman', '345', 'Ihtisham Khan', 'Ihtisham', '655765', '2', '2', 'Paid', '', NULL, NULL, '2024-05-24 00:18:34', '2024-05-24 00:18:34'),
(141, 'dmsingapore82047', 1, 'Kashif', '345', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '1', 'Paid', '', NULL, NULL, '2024-05-24 00:20:31', '2024-05-24 00:20:31'),
(142, 'dmyangon(main)76369', 1, 'Khalid Usman', '789979', 'iuyui', 'Ihtisham', '6789', '2', '2', 'Paid', '', NULL, NULL, '2024-05-24 00:22:04', '2024-05-24 00:22:04'),
(143, 'dmsingapore50586', 1, 'Khalid Usman', '345', 'Ihtisham Khan', 'Ihtisham', '6789', '1', '1', 'Paid', '', NULL, NULL, '2024-05-24 00:23:14', '2024-05-24 00:23:14'),
(144, 'dmyangon(main)46841', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '1', 'Paid', '', NULL, NULL, '2024-05-24 05:52:58', '2024-05-24 05:52:58'),
(145, 'dmyangon(main)60311', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '1', 'Paid', '', NULL, NULL, '2024-05-24 05:57:28', '2024-05-24 05:57:28'),
(146, 'dmmonywa68501', 1, 'Kashif', '345', 'Ahsan', 'DM Mandalay Myanmar', '445334', '5', '2', 'Paid', '', NULL, NULL, '2024-05-24 05:58:53', '2024-05-24 05:58:53'),
(147, 'dmmandalay91551', 1, 'Kashif', '789979', 'iuyui', 'Ihtisham', '655765345345', '3', '1', 'Paid', '', NULL, NULL, '2024-05-24 06:05:57', '2024-05-24 06:05:57'),
(148, 'dmsingapore80470', 1, 'Khalid Usman', '345345345345', 'Ihtisham Khan', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '2', 'Paid', '', NULL, NULL, '2024-05-24 06:07:36', '2024-05-24 06:07:36'),
(149, 'dmyangon(main)51599', 1, 'khalid', '789979', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '2', '4', 'Paid', '', NULL, NULL, '2024-05-24 09:41:18', '2024-05-24 09:41:18'),
(150, 'dmyangon(main)64143', 1, 'Khalid Usman Rabbani', '345345345345876786', 'Ihtisham Khan updated', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '6557653453457897867867', '2', '3', 'Paid', '', '66546e573f797.png', NULL, '2024-05-24 22:48:33', '2024-05-27 06:56:13'),
(151, 'dmsingapore63934', 1, 'Khalid Usman', '345', 'iuyui', 'DM Mandalay Myanmar DM Mandalay Myanmar', '655765345345', '1', '1', 'Paid', '', NULL, NULL, '2024-05-24 23:06:48', '2024-05-27 06:56:09'),
(152, 'dmmonywa88833', 1, 'Khalid Usman Rabbani', '345345345345876786', 'Ihtisham Khan Rabbani', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '6557653453457897867867', '5', '2', 'Paid', '', NULL, NULL, '2024-05-25 05:47:42', '2024-05-27 06:56:03'),
(153, 'dmtaungoo47875', 1, 'Khalid Usman Rabbani', '345345345345876786', 'Ihtisham Khan Rabbani', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '6557653453457897867867', '4', '4', 'Paid', '', '665462aa27354.png', NULL, '2024-05-25 05:53:40', '2024-05-27 06:55:59'),
(154, 'dmmandalay74460', 1, 'Khalid Usman Rabbani', '345345345345876786', 'Ihtisham Khan Rabbani', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '6557653453457897867867', '3', '3', 'Paid', '', '66545f57a1c33.png', NULL, '2024-05-25 06:02:52', '2024-05-27 06:55:53'),
(156, 'dmyangon(main)11489', 1, 'Khalid Usman Rabbani', '345345345345876786', 'Ihtisham Khan Rabbani', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '6557653453457897867867', '2', '4', 'Paid', '', NULL, NULL, '2024-05-27 06:09:53', '2024-05-27 06:09:53'),
(157, 'dmyangon(main)14931', 6, 'Khalid Usman Rabbani', '345345345345876786', 'Ihtisham Khan Rabbani', 'DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar DM Mandalay Myanmar', '6557653453457897867867', '2', '4', 'Paid', '', '665474f7efb25.png', '2024-05-27 06:56:39', '2024-05-27 06:11:25', '2024-05-27 06:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_statuses`
--

CREATE TABLE `parcel_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TrackingId` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `RoleName` varchar(255) NOT NULL,
  `add_permission` varchar(255) DEFAULT NULL,
  `view_permission` varchar(255) DEFAULT NULL,
  `update_permission` varchar(255) DEFAULT NULL,
  `delete_permission` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `RoleName`, `add_permission`, `view_permission`, `update_permission`, `delete_permission`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1', '1', '1', '1', '2024-05-06 07:54:33', '2024-05-06 07:54:33'),
(2, 'Staff', '0', '0', '0', '0', '2024-05-06 07:54:33', '2024-05-06 07:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LsHVQMhsDrNkvtuJMgC4yT16V6KQ3gQI9NvU7beX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoid3FuODlzYVhXZDBOSkJYSXNLTlBjWjRsMU5zWHpaVWVEbmt1bThsUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6ODoibGFuZ3VhZ2UiO3M6MjoiZW4iO30=', 1724455591);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ParcelStatus` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `ParcelStatus`, `created_at`, `updated_at`) VALUES
(1, 'Item Accepted by Courier', '2024-05-06 07:56:23', '2024-05-06 07:56:23'),
(2, 'Parcel leaving to Singapore', '2024-05-06 07:56:23', '2024-05-06 07:56:23'),
(3, 'On the way to Yangon (Main Office)', '2024-05-06 07:56:23', '2024-05-06 07:56:23'),
(4, 'Parcel leaving to Myanmar', '2024-05-06 07:56:23', '2024-05-06 07:56:23'),
(5, 'Ready for collection', '2024-05-06 07:56:23', '2024-05-06 07:56:23'),
(6, 'Collected', '2024-05-06 07:56:23', '2024-05-06 07:56:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `role_id`, `branch_id`, `picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(18, 'Admin', 'admin@gmail.com', 1, 1, 'UIMG_2024082366c91a9a7dfef.jpg', NULL, '$2y$12$10NIevBg9LhBBkNeoEvxY.4tTcOA3swAPh4vWC5VNPt62lxqQ07fe', NULL, '2024-08-24 06:24:34', '2024-08-24 06:26:18'),
(19, 'Staff', 'staff@gmail.com', 2, 1, 'dummy.jpg', NULL, '$2y$12$r9BiTslDl.AVW1Zeyl/XceXgxccFRqLjobl0FILL0oYnDqTIbYU.e', NULL, '2024-08-24 06:25:03', '2024-08-24 06:25:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_name_unique` (`name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_parcel_id_foreign` (`parcel_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parcels_trackingid_unique` (`TrackingId`),
  ADD KEY `parcels_status_id_foreign` (`status_id`);

--
-- Indexes for table `parcel_statuses`
--
ALTER TABLE `parcel_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parcel_statuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `parcel_statuses`
--
ALTER TABLE `parcel_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_parcel_id_foreign` FOREIGN KEY (`parcel_id`) REFERENCES `parcels` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `parcels`
--
ALTER TABLE `parcels`
  ADD CONSTRAINT `parcels_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `parcel_statuses`
--
ALTER TABLE `parcel_statuses`
  ADD CONSTRAINT `parcel_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
