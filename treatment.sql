-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 مارس 2023 الساعة 15:29
-- إصدار الخادم: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `treatment`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `username`, `contact`, `address`, `country`, `city`, `created_at`, `updated_at`) VALUES
(3, 'Yousef Alsaeedi', 'admin521@gmail.com', NULL, '$2y$10$N1vQFFn.gZEjnjsESoooS.R47VinPi628hdKJs6rKl.uZM9Y1yfvm', 'super_admin', '85926314', 'Kwuit / Alahmadi', 'Kwuit', 'Kwuit', '2023-02-21 11:21:33', '2023-03-30 11:14:20');

-- --------------------------------------------------------

--
-- بنية الجدول `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `respond` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `complaints_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `doctor_id`, `complaint`, `respond`, `created_at`, `updated_at`) VALUES
(2, '1', 1, 'thi si sssdfg', 'yesy i will contact ou soonsdf', '2023-03-18 06:15:31', '2023-03-30 11:28:09'),
(4, '1', 2, 'tyhuj', NULL, '2023-03-31 06:38:29', NULL),
(5, '4', 3, 'khaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledalikhaledali', 'khaledalikhaledalikhaledali', '2023-03-31 09:40:37', '2023-03-31 09:41:05');

-- --------------------------------------------------------

--
-- بنية الجدول `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Ahmed Mostafa', 'ahmedalamir521@gmail.com', 'wderftgyh', '01012921224', 'dfghyjuk', '2023-03-29 06:58:10', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `doucments`
--

CREATE TABLE IF NOT EXISTS `doucments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `doucment` varchar(999) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_agreement` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_agreement` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doucments_user_id_foreign` (`user_id`),
  KEY `doucments_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `doucments`
--

INSERT INTO `doucments` (`id`, `user_id`, `doctor_id`, `doucment`, `dr_agreement`, `admin_agreement`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'Ahmed Mostafa.pdf', '1', '1', '2023-03-18 07:21:42', '2023-03-19 10:45:20'),
(7, 1, 1, 'WhatsApp Image 2023-03-16 at 3.01.49 PM.jpeg', 'Choose ..', '2', '2023-03-20 10:13:24', '2023-03-31 09:31:10'),
(8, 1, 2, '41443945_727419630945886_1761778606813478912_n.jpg', NULL, '1', '2023-03-31 06:38:48', '2023-03-31 09:31:24'),
(9, 4, 3, '202301020820a (1).jpg', '1', NULL, '2023-03-31 09:41:43', '2023-03-31 09:43:12'),
(10, 4, 3, 'Ahmed Mostafa.pdf', '2', NULL, '2023-03-31 09:42:06', '2023-03-31 09:43:19');

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `features`
--

CREATE TABLE IF NOT EXISTS `features` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `features`
--

INSERT INTO `features` (`id`, `name`, `details`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Operation', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', 'upload/features/1757884487332992.jpg', '2023-02-15 06:21:26', '2023-03-22 08:08:56'),
(3, 'Medical', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', 'upload/features/1757884503037022.jpg', '2023-02-15 06:21:41', '2023-03-22 08:09:02'),
(4, 'ICU', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', 'upload/features/1757884522937593.jpg', '2023-02-15 06:22:00', '2023-03-22 08:09:07'),
(5, 'Laboratory', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', 'upload/features/1757884542776530.jpg', '2023-02-15 06:22:19', '2023-03-22 08:09:13'),
(6, 'Test Room', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', 'upload/features/1757884565227505.jpg', '2023-02-15 06:22:41', '2023-03-22 08:09:18'),
(7, 'Patient Ward', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', 'upload/features/1757884585627661.jpg', '2023-02-15 06:23:00', '2023-03-22 08:09:22');

-- --------------------------------------------------------

--
-- بنية الجدول `f_doctors`
--

CREATE TABLE IF NOT EXISTS `f_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `f_doctors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `f_doctors`
--

INSERT INTO `f_doctors` (`id`, `name`, `hospital_id`, `specialization_id`, `email`, `password`, `username`, `contact`, `gender`, `nationality`, `bloodtype`, `religion`, `address`, `country`, `city`, `doctor_image`, `created_at`, `updated_at`) VALUES
(1, 'John Tery', 3, 3, 'john521@gmail.com', '$2y$10$ChJsuQxJlL88zxC5HIo4M.clcI/PNB8/LzpOEndMQtHDqIrZT94l6', 'john_521', '52948745', 'Male', 'French', 'O-', 'Christian', 'France - Paris', 'France', 'Paris', 'upload/ForginDr/1761873536215326.jpg', '2023-02-21 07:45:42', '2023-03-31 07:05:40'),
(2, 'Ahmed Mostafa', 2, 6, 'ahmed521@gmail.com', '$2y$10$B4jileiphskuEkoE3zjT/.bgz6hFjhEAAEbzhxceVJstAI.FLIn4i', 'ahmed_521', '59846274', 'Male', 'Egyptian', 'AB+', 'Muslim', 'Egypt - Cairo', 'Egypt', 'Cairo', 'upload/ForginDr/1761873395572046.jpg', '2023-03-30 08:45:21', '2023-03-31 07:03:26');

-- --------------------------------------------------------

--
-- بنية الجدول `genders`
--

CREATE TABLE IF NOT EXISTS `genders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `genders`
--

INSERT INTO `genders` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(4, 'Male', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(5, 'Female', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(6, 'Other', '2023-02-21 06:23:45', '2023-02-21 06:23:45');

-- --------------------------------------------------------

--
-- بنية الجدول `hospitals`
--

CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `hospitals`
--

INSERT INTO `hospitals` (`id`, `title`, `email`, `short_desc`, `long_desc`, `contact`, `address`, `country`, `city`, `image1`, `image2`, `image3`, `image4`, `image5`, `created_at`, `updated_at`) VALUES
(1, 'El Hayat International', 'elyahathospital@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '64985119', 'Kwuit - Alahmady', 'Kwui', 'Alahmady', 'upload/hospital/1758532790679589.jpg', 'upload/hospital/1758532790762045.jpg', 'upload/hospital/1758532790831299.jpg', 'upload/hospital/1758532790906573.jpg', 'upload/hospital/1758532790975817.jpg', '2023-02-22 10:05:57', '2023-03-31 06:49:42'),
(2, 'El Sabaah Private Hospital', 'elsabahhhospital@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum. web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '54879560', 'Spaun - Barcelona', 'Espain', 'Barcelona', 'upload/hospital/1758535377042569.jpg', 'upload/hospital/1758535377127242.jpg', 'upload/hospital/1758535377198186.jpg', 'upload/hospital/1758535377270945.jpg', 'upload/hospital/1758535377349381.jpg', '2023-02-22 10:47:04', '2023-03-31 06:49:55'),
(3, 'La Vie De France', 'laviedefrance@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '31564894', 'France - Baris', 'France', 'Baris', 'upload/hospital/1758535507976149.jpg', 'upload/hospital/1758535508053225.jpg', 'upload/hospital/1758535508125401.jpg', 'upload/hospital/1758535508201244.jpg', 'upload/hospital/1758535508271225.jpg', '2023-02-22 10:49:08', NULL),
(4, 'Magdi Yacoub InterNational', 'magdyyacoub@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '54985126', 'Egypt - Cairo', 'Egypt', 'Cairo', 'upload/hospital/1761872714460561.jpg', 'upload/hospital/1761872714515497.jpg', 'upload/hospital/1761872714560316.jpg', 'upload/hospital/1761872714616850.jpg', 'upload/hospital/1761872714667332.jpg', '2023-03-31 06:52:36', NULL),
(5, 'Modern Canadian Hospital', 'modernhospital@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '29584762', 'Canada', 'Canada', 'Canada', 'upload/hospital/1761872814683951.jpg', 'upload/hospital/1761872814738519.jpg', 'upload/hospital/1761872814778508.jpg', 'upload/hospital/1761872814821461.jpg', 'upload/hospital/1761872814858629.jpg', '2023-03-31 06:54:12', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_13_072842_create_admins_table', 2),
(6, '2023_02_15_070102_create_specializations_table', 3),
(7, '2023_02_15_080811_create_features_table', 4),
(8, '2023_02_21_081108_create_nationalities_table', 5),
(9, '2023_02_21_081416_create_type__bloods_table', 6),
(10, '2023_02_21_081636_create_genders_table', 7),
(11, '2023_02_21_082246_create_religions_table', 8),
(13, '2023_02_21_092947_create_f_doctors_table', 10),
(14, '2023_02_22_073130_create_hospitals_table', 11),
(15, '2023_02_22_142427_create_rates_table', 12),
(18, '2023_02_21_083516_create_n_doctors_table', 14),
(19, '2023_02_25_064217_create_complaints_table', 15),
(21, '2023_02_25_124821_create_doucments_table', 16),
(23, '2023_03_19_124917_create_tests_table', 17),
(25, '2023_03_20_081741_create_requessts_table', 18),
(26, '2023_03_20_095749_create_reports_table', 19),
(28, '2023_03_22_120911_create_queries_table', 20),
(29, '2023_03_22_123203_create_contacts_table', 21),
(31, '2023_03_30_111124_create_testimonials_table', 22),
(32, '2023_03_22_130819_create_subscripes_table', 23);

-- --------------------------------------------------------

--
-- بنية الجدول `nationalities`
--

CREATE TABLE IF NOT EXISTS `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=985 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `nationalities`
--

INSERT INTO `nationalities` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(739, 'Afghan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(740, 'Albanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(741, 'Aland Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(742, 'Algerian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(743, 'American Samoan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(744, 'Andorran', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(745, 'Angolan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(746, 'Anguillan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(747, 'Antarctican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(748, 'Antiguan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(749, 'Argentinian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(750, 'Armenian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(751, 'Aruban', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(752, 'Australian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(753, 'Austrian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(754, 'Azerbaijani', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(755, 'Bahamian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(756, 'Bahraini', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(757, 'Bangladeshi', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(758, 'Barbadian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(759, 'Belarusian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(760, 'Belgian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(761, 'Belizean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(762, 'Beninese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(763, 'Saint Barthelmian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(764, 'Bermudan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(765, 'Bhutanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(766, 'Bolivian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(767, 'Bosnian / Herzegovinian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(768, 'Botswanan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(769, 'Bouvetian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(770, 'Brazilian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(771, 'British Indian Ocean Territory', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(772, 'Bruneian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(773, 'Bulgarian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(774, 'Burkinabe', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(775, 'Burundian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(776, 'Cambodian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(777, 'Cameroonian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(778, 'Canadian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(779, 'Cape Verdean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(780, 'Caymanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(781, 'Central African', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(782, 'Chadian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(783, 'Chilean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(784, 'Chinese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(785, 'Christmas Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(786, 'Cocos Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(787, 'Colombian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(788, 'Comorian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(789, 'Congolese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(790, 'Cook Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(791, 'Costa Rican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(792, 'Croatian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(793, 'Cuban', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(794, 'Cypriot', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(795, 'Curacian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(796, 'Czech', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(797, 'Danish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(798, 'Djiboutian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(799, 'Dominican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(800, 'Dominican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(801, 'Ecuadorian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(802, 'Egyptian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(803, 'Salvadoran', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(804, 'Equatorial Guinean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(805, 'Eritrean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(806, 'Estonian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(807, 'Ethiopian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(808, 'Falkland Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(809, 'Faroese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(810, 'Fijian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(811, 'Finnish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(812, 'French', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(813, 'French Guianese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(814, 'French Polynesian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(815, 'French', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(816, 'Gabonese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(817, 'Gambian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(818, 'Georgian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(819, 'German', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(820, 'Ghanaian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(821, 'Gibraltar', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(822, 'Guernsian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(823, 'Greek', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(824, 'Greenlandic', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(825, 'Grenadian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(826, 'Guadeloupe', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(827, 'Guamanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(828, 'Guatemalan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(829, 'Guinean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(830, 'Guinea-Bissauan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(831, 'Guyanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(832, 'Haitian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(833, 'Heard and Mc Donald Islanders', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(834, 'Honduran', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(835, 'Hongkongese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(836, 'Hungarian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(837, 'Icelandic', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(838, 'Indian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(839, 'Manx', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(840, 'Indonesian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(841, 'Iranian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(842, 'Iraqi', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(843, 'Irish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(844, 'Italian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(845, 'Ivory Coastian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(846, 'Jersian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(847, 'Jamaican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(848, 'Japanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(849, 'Jordanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(850, 'Kazakh', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(851, 'Kenyan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(852, 'I-Kiribati', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(853, 'North Korean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(854, 'South Korean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(855, 'Kosovar', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(856, 'Kuwaiti', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(857, 'Kyrgyzstani', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(858, 'Laotian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(859, 'Latvian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(860, 'Lebanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(861, 'Basotho', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(862, 'Liberian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(863, 'Libyan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(864, 'Liechtenstein', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(865, 'Lithuanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(866, 'Luxembourger', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(867, 'Sri Lankian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(868, 'Macanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(869, 'Macedonian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(870, 'Malagasy', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(871, 'Malawian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(872, 'Malaysian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(873, 'Maldivian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(874, 'Malian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(875, 'Maltese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(876, 'Marshallese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(877, 'Martiniquais', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(878, 'Mauritanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(879, 'Mauritian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(880, 'Mahoran', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(881, 'Mexican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(882, 'Micronesian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(883, 'Moldovan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(884, 'Monacan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(885, 'Mongolian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(886, 'Montenegrin', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(887, 'Montserratian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(888, 'Moroccan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(889, 'Mozambican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(890, 'Myanmarian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(891, 'Namibian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(892, 'Nauruan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(893, 'Nepalese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(894, 'Dutch', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(895, 'Dutch Antilier', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(896, 'New Caledonian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(897, 'New Zealander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(898, 'Nicaraguan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(899, 'Nigerien', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(900, 'Nigerian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(901, 'Niuean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(902, 'Norfolk Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(903, 'Northern Marianan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(904, 'Norwegian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(905, 'Omani', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(906, 'Pakistani', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(907, 'Palauan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(908, 'Palestinian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(909, 'Panamanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(910, 'Papua New Guinean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(911, 'Paraguayan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(912, 'Peruvian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(913, 'Filipino', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(914, 'Pitcairn Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(915, 'Polish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(916, 'Portuguese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(917, 'Puerto Rican', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(918, 'Qatari', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(919, 'Reunionese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(920, 'Romanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(921, 'Russian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(922, 'Rwandan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(923, 'Kittitian/Nevisian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(924, 'St. Martian(French)', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(925, 'St. Martian(Dutch)', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(926, 'St. Pierre and Miquelon', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(927, 'Saint Vincent and the Grenadines', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(928, 'Samoan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(929, 'Sammarinese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(930, 'Sao Tomean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(931, 'Saudi Arabian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(932, 'Senegalese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(933, 'Serbian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(934, 'Seychellois', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(935, 'Sierra Leonean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(936, 'Singaporean', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(937, 'Slovak', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(938, 'Slovenian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(939, 'Solomon Island', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(940, 'Somali', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(941, 'South African', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(942, 'South Georgia and the South Sandwich', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(943, 'South Sudanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(944, 'Spanish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(945, 'St. Helenian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(946, 'Sudanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(947, 'Surinamese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(948, 'Svalbardian/Jan Mayenian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(949, 'Swazi', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(950, 'Swedish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(951, 'Swiss', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(952, 'Syrian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(953, 'Taiwanese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(954, 'Tajikistani', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(955, 'Tanzanian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(956, 'Thai', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(957, 'Timor-Lestian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(958, 'Togolese', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(959, 'Tokelaian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(960, 'Tongan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(961, 'Trinidadian/Tobagonian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(962, 'Tunisian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(963, 'Turkish', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(964, 'Turkmen', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(965, 'Turks and Caicos Islands', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(966, 'Tuvaluan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(967, 'Ugandan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(968, 'Ukrainian', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(969, 'Emirati', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(970, 'British', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(971, 'American', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(972, 'US Minor Outlying Islander', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(973, 'Uruguayan', '2023-02-21 06:23:44', '2023-02-21 06:23:44'),
(974, 'Uzbek', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(975, 'Vanuatuan', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(976, 'Venezuelan', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(977, 'Vietnamese', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(978, 'American Virgin Islander', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(979, 'Vatican', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(980, 'Wallisian/Futunan', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(981, 'Sahrawian', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(982, 'Yemeni', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(983, 'Zambian', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(984, 'Zimbabwean', '2023-02-21 06:23:45', '2023-02-21 06:23:45');

-- --------------------------------------------------------

--
-- بنية الجدول `n_doctors`
--

CREATE TABLE IF NOT EXISTS `n_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `n_doctors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `n_doctors`
--

INSERT INTO `n_doctors` (`id`, `name`, `hospital_id`, `specialization_id`, `email`, `password`, `username`, `contact`, `gender`, `nationality`, `bloodtype`, `religion`, `address`, `country`, `city`, `doctor_image`, `created_at`, `updated_at`) VALUES
(1, 'Khaled Elasaber', 5, 7, 'khaled521@gmail.com', '$2y$10$Gvf0kczAEl/y43/zJwLyXeVA6ohqX4nJXbTNgEvy1big53pIYJKti', 'khaled_521', '59846217', 'Male', 'Kuwaiti', 'O+', 'Christian', 'Kuwait - Alahmady', 'Kuwait', 'Alahmady', 'upload/NationalDr/1761873189019948.jpg', '2023-02-25 09:43:23', '2023-03-31 07:00:09'),
(2, 'Manal Eltawel', 2, 3, 'manal521@gmail.com', '$2y$10$VbEnxuAK11EUKtWhgOHH8Oq42xkyhM1rf2qsDJW1Fvz5nQ1DbYIaa', 'manal_521', '58926314', 'Female', 'Kuwaiti', 'B+', 'Muslim', 'Kuwait - Alahmady', 'Kuwait', 'Alahmady', 'upload/NationalDr/1761873005985422.jpg', '2023-03-30 08:10:47', '2023-03-31 06:57:14'),
(3, 'Maged Motazz', 4, 4, 'maged521@gmail.com', '$2y$10$MPCM34.EaS3/52fGpsngRuV84ZdLOh8bk53fZWXKRH4p9JBiPB78i', 'maged_521', '59847562', 'Male', 'Kuwaiti', 'AB+', 'Muslim', 'Kuwait - Kuwait', 'Kuwait', 'Kuwait', 'upload/NationalDr/1761873055289763.jpg', '2023-03-30 08:58:31', '2023-03-31 06:58:01'),
(4, 'Marwa Maher', 1, 5, 'marwa521@gmail.com', '$2y$10$NRBuCsjSJNQ0eiPYQx1Nm.pC9UB3Ty6NCF2b5ZPud71Z1f/DA55Bm', 'marwa_521', '21365971', 'Male', 'Kuwaiti', 'B-', 'Muslim', 'Kuwait - Kuwait', 'Kuwait', 'Kuwait', 'upload/NationalDr/1761873293399187.jpg', '2023-03-31 07:01:48', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `queries`
--

CREATE TABLE IF NOT EXISTS `queries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `queries`
--

INSERT INTO `queries` (`id`, `email`, `phone`, `address`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Yousefalsaeedi@gmail.com', '85912475', 'Kwuit - Alahmadi', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', NULL, '2023-03-30 11:10:50');

-- --------------------------------------------------------

--
-- بنية الجدول `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `ndoctor_id` int(11) DEFAULT NULL,
  `fdoctor_id` int(11) DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `rates`
--

INSERT INTO `rates` (`id`, `name`, `hospital_id`, `ndoctor_id`, `fdoctor_id`, `rating`, `review`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Mostafa', 2, NULL, NULL, 'star-5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Curabitur non nulla sit amet nisl tempus', '2023-02-22 12:38:47', NULL),
(4, 'Khaled Ali', NULL, 1, NULL, 'star-5', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-22 09:39:53', NULL),
(5, 'Marwa Mohamed', NULL, NULL, 1, 'star-4', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-22 09:51:04', NULL),
(6, 'Yousef Elnauef', NULL, 1, NULL, 'star-1', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-29 07:47:32', NULL),
(7, 'Motazz Elmaorshady', NULL, NULL, 1, 'star-3', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-29 08:03:19', NULL),
(8, 'Tallat Mostafa', 2, NULL, NULL, 'star-4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. Curabitur non nulla sit amet nisl tempus', '2023-03-30 07:43:14', NULL),
(9, 'Motazz Mohamed', 5, NULL, NULL, 'star-4', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:29:15', NULL),
(10, 'Mohamed Maher', 4, NULL, NULL, 'star-5', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:29:54', NULL),
(11, 'Dema Maher', 3, NULL, NULL, 'star-4', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:30:27', NULL),
(12, 'Hamed Shokry', 1, NULL, NULL, 'star-2', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:32:45', NULL),
(13, 'Mohamed Khaled', NULL, 4, NULL, 'star-4', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:34:29', NULL),
(14, 'Motazz Metwally', NULL, 4, NULL, 'star-5', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:34:44', NULL),
(15, 'Yousef Elsassadi', NULL, 4, NULL, 'star-1', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:35:20', NULL),
(16, 'Monir eltoghy', NULL, 3, NULL, 'star-3', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:35:46', NULL),
(17, 'John Khan', NULL, 3, NULL, 'star-5', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:36:08', NULL),
(18, 'Maher Yousef', NULL, 2, NULL, 'star-3', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:36:41', NULL),
(19, 'Yasser Maged', NULL, 2, NULL, 'star-2', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:37:01', NULL),
(20, 'Fatma Yousef', NULL, 2, NULL, 'star-3', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:37:17', NULL),
(21, 'Ahmed Moustafa', NULL, NULL, 2, 'star-4', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:38:13', NULL),
(22, 'Amir Khaled', NULL, NULL, 2, 'star-2', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 07:38:31', NULL),
(23, 'Khaled Ali', NULL, NULL, 2, 'star-5', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 09:55:12', NULL),
(24, 'Khaled Ali', 4, NULL, NULL, 'star-4', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2023-03-31 09:55:49', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `religions`
--

CREATE TABLE IF NOT EXISTS `religions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `religions`
--

INSERT INTO `religions` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(1, 'Muslim', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(2, 'Christian', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(3, 'Other', '2023-02-21 06:23:45', '2023-02-21 06:23:45');

-- --------------------------------------------------------

--
-- بنية الجدول `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ndoctor_id` bigint(20) UNSIGNED NOT NULL,
  `fdoctor_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_user_id_foreign` (`user_id`),
  KEY `reports_ndoctor_id_foreign` (`ndoctor_id`),
  KEY `reports_fdoctor_id_foreign` (`fdoctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `ndoctor_id`, `fdoctor_id`, `start_date`, `end_date`, `details`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, '2023-03-13', '2023-03-20', 'dfghyju', '2023-03-20 08:55:12', '2023-03-20 08:55:12'),
(4, 4, 3, 2, '2023-04-01', '2023-04-08', 'sfdegrhjyk', '2023-03-31 09:50:47', '2023-03-31 09:50:47');

-- --------------------------------------------------------

--
-- بنية الجدول `requessts`
--

CREATE TABLE IF NOT EXISTS `requessts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ndoctor_id` bigint(20) UNSIGNED NOT NULL,
  `fdoctor_id` bigint(20) UNSIGNED NOT NULL,
  `test_result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ndoctor_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fdoctor_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requessts_user_id_foreign` (`user_id`),
  KEY `requessts_fdoctor_id_foreign` (`fdoctor_id`),
  KEY `requessts_ndoctor_id_foreign` (`ndoctor_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `requessts`
--

INSERT INTO `requessts` (`id`, `user_id`, `ndoctor_id`, `fdoctor_id`, `test_result`, `ndoctor_details`, `status`, `fdoctor_details`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 1, 'sfrgyjh', 'efrgyjhuki', '1', 'fvbgnhjmk', '2023-03-30 11:33:36', '2023-03-31 06:20:34'),
(5, 4, 3, 2, 'dsfghjkdfghjkdsfghjkdfghjkdsfghjkdfghjkdsfghjkdfghjk', 'dsfghjkdfghjkdsfghjkdfghjkdsfghjkdfghjk', '1', 'bgfhhj', '2023-03-31 09:47:11', '2023-03-31 09:49:51');

-- --------------------------------------------------------

--
-- بنية الجدول `specializations`
--

CREATE TABLE IF NOT EXISTS `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Dentist', 'upload/specilazation/1757881308816245.png', '2023-02-15 05:30:55', NULL),
(4, 'Urology', 'upload/specilazation/1757881332474367.png', '2023-02-15 05:31:18', NULL),
(5, 'Neurology', 'upload/specilazation/1757881351158764.png', '2023-02-15 05:31:35', NULL),
(6, 'Orthopedic', 'upload/specilazation/1757881368221154.png', '2023-02-15 05:31:52', NULL),
(7, 'Cardiologist', 'upload/specilazation/1757881391816885.png', '2023-02-15 05:32:14', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `subscripes`
--

CREATE TABLE IF NOT EXISTS `subscripes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `user_id`, `testimonial`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ahmed Mostafa', '1', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2', '2023-03-30 09:34:09', '2023-03-31 09:36:23'),
(3, 'Ahmed Mostafa', '1', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '1', '2023-03-30 09:34:21', '2023-03-31 09:36:52'),
(4, 'Ahmed Mostafa', '1', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas adipisicing.', '2', '2023-03-30 09:40:17', '2023-03-31 09:36:33');

-- --------------------------------------------------------

--
-- بنية الجدول `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approvment` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tests_user_id_foreign` (`user_id`),
  KEY `tests_doctor_id_foreign` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `tests`
--

INSERT INTO `tests` (`id`, `user_id`, `doctor_id`, `date`, `approvment`, `details`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-20', '1', 'That is ok', '2023-03-19 11:13:48', '2023-03-19 11:30:43'),
(5, 4, 3, '2023-04-01', '1', 'sdfghjkk', '2023-03-31 09:44:20', '2023-03-31 09:45:25');

-- --------------------------------------------------------

--
-- بنية الجدول `type__bloods`
--

CREATE TABLE IF NOT EXISTS `type__bloods` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `type__bloods`
--

INSERT INTO `type__bloods` (`id`, `Name`, `created_at`, `updated_at`) VALUES
(17, 'O-', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(18, 'O+', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(19, 'A+', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(20, 'A-', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(21, 'B+', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(22, 'B-', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(23, 'AB+', '2023-02-21 06:23:45', '2023-02-21 06:23:45'),
(24, 'AB-', '2023-02-21 06:23:45', '2023-02-21 06:23:45');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bloodtype` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(900) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `contact`, `dob`, `gender`, `nationality`, `bloodtype`, `religion`, `address`, `country`, `city`, `user_image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Motazz Elkholy', 'motazz521@gmail.com', NULL, '$2y$10$CArLR5AW1VCsXoVlkV1IBe9KHG3LNqW7mGeTQtwoAt/ttTuZ1PeNy', '58926314', NULL, 'Male', 'Kuwaiti', 'AB+', 'Muslim', 'Kuwaiti / Kuwaiti', 'Kuwaiti', 'Kuwaiti', '202302211301doctor-thumb-05.jpg', NULL, '2023-02-21 09:59:27', '2023-03-20 09:48:20'),
(3, 'Maher Ali', 'maher521@gmail.com', NULL, '$2y$10$4nDj5VrPLwnet8RQAjl3LOyWOdk2aMekEznHPcygOPfrL/hYWkW6y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-30 10:09:59', '2023-03-30 10:09:59'),
(4, 'Khaled Ali', 'khaledali@gmail.com', NULL, '$2y$10$9k45JeFHUT6dDy.aLlDMcuuLp3uYEkE00sP3eBgIMdn2SoowofoYq', '4141412424', NULL, 'Male', 'Azerbaijani', 'A-', 'Christian', NULL, NULL, NULL, NULL, NULL, '2023-03-31 09:39:54', '2023-03-31 09:48:07');

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `n_doctors` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `doucments`
--
ALTER TABLE `doucments`
  ADD CONSTRAINT `doucments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `n_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doucments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_fdoctor_id_foreign` FOREIGN KEY (`fdoctor_id`) REFERENCES `f_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_ndoctor_id_foreign` FOREIGN KEY (`ndoctor_id`) REFERENCES `n_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `requessts`
--
ALTER TABLE `requessts`
  ADD CONSTRAINT `requessts_fdoctor_id_foreign` FOREIGN KEY (`fdoctor_id`) REFERENCES `f_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requessts_ndoctor_id_foreign` FOREIGN KEY (`ndoctor_id`) REFERENCES `n_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requessts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- القيود للجدول `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `n_doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
