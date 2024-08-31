-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 05:18 AM
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
-- Database: `biye_shady`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$wXSJlkcSkqva/RubxChhEuaFdJW/TYQtMCjD4kpORd73BC0776jv2', NULL, NULL, '2024-02-24 08:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `all_titles`
--

CREATE TABLE `all_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sec` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_titles`
--

INSERT INTO `all_titles` (`id`, `page`, `sec`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home_sec_3', 'Most Recent Bio Data', 0, '2024-02-22 04:31:18', '2024-02-22 04:31:18'),
(2, 'about_us', 'about_us_sec_3', 'User Statistics', 0, '2024-02-22 04:51:17', '2024-02-22 04:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Sylhet', 0, '2024-02-25 18:44:54', '2024-02-25 18:44:54'),
(2, NULL, 'Dilhi', 0, '2024-02-26 10:21:10', '2024-02-26 10:21:10'),
(3, NULL, 'Karachi', 0, '2024-02-26 10:21:18', '2024-02-26 10:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `clint_reviews`
--

CREATE TABLE `clint_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sec` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commom_banners`
--

CREATE TABLE `commom_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sec` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_banners`
--

CREATE TABLE `common_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sec` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_banners`
--

INSERT INTO `common_banners` (`id`, `page`, `sec`, `title`, `img`, `alt_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'happy_client', 'Happy_Client_sec_1', 'Our Client', '202402250612form2.png', 'Null', 0, '2024-02-22 04:47:16', '2024-02-25 00:12:15'),
(2, 'about_us', 'About_us_sec_1', 'About us', '202402250612form2.png', 'Null', 0, '2024-02-22 04:48:03', '2024-02-25 00:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `content_with_icons`
--

CREATE TABLE `content_with_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_with_icons`
--

INSERT INTO `content_with_icons` (`id`, `icon`, `des`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fa-solid fa-pencil', '<font face=\"Poppins, sans-serif\">Total Groom and Bride\'s Biodatas</font>', '4450', 0, '2024-02-22 04:52:42', '2024-02-22 04:52:42'),
(2, 'fa-solid fa-pencil', 'Total Groom and Bride\'s Biodatas', '4450', 0, '2024-02-23 23:02:19', '2024-02-23 23:02:28'),
(3, 'fa-solid fa-pencil', '<p>Total Groom and Bride\'s Biodatas<br></p>', '4450', 0, '2024-02-23 23:02:49', '2024-02-23 23:02:49'),
(4, 'fa-solid fa-pencil', '<p>Total Groom and Bride\'s Biodatas<br></p>', '4450', 0, '2024-02-23 23:02:58', '2024-02-23 23:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `content_with_images`
--

CREATE TABLE `content_with_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sec` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `button_name_one` varchar(255) DEFAULT NULL,
  `button_name_two` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_with_images`
--

INSERT INTO `content_with_images` (`id`, `page`, `sec`, `title`, `sub_title`, `button_name_one`, `button_name_two`, `img`, `video`, `alt_img`, `des`, `status`, `created_at`, `updated_at`) VALUES
(3, 'home', 'home_sec_1', 'Find Your Perfect Life Partner And Create Your Haven Life', NULL, 'Add Your Bio Data', 'How To Create Bio Data', '202404040607banner.png', 'https://www.youtube.com/embed/5xYDXp7fkY4?si=wkBfz8BeCP7xEGS_', 'Null', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br></p>', 0, '2024-02-27 00:50:38', '2024-04-04 00:07:21'),
(4, 'home', 'home_sec_4', 'About Us', 'Sylhet Bie-Shaadi.com is Sylhet\'s first digital marriage media.', 'More About', NULL, '202402270658202402250610Group 424.png', NULL, 'Null', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident , sunt in culpa qui officia deserunt mollit anim id est laborum.</div><div><br></div><div><br></div>', 0, '2024-02-27 00:58:54', '2024-02-27 00:58:54'),
(5, 'about_us', 'about_us_sec_2', 'About us', 'Marriage is a distinctive blessing given by Almighty Allah and a vital Sunnah of the Prophet.', 'Add Your Bio Data', 'How To Create Bio Data', '202402270830202402270658202402250610Group 424.png', 'https://www.youtube.com/embed/5xYDXp7fkY4?si=wkBfz8BeCP7xEGS_', 'Null', '<p>According to the Qur\'an and Hadith, wedding is regarded as a means of purity, half of the deen (religion) and a means of financial prosperity. Allah commands the believers to marry for its benefits morally, spiritually, socially and psychologically. The Holy Prophet said, Marriage is my precept and my practice. Those who do not follow my practice are not of me. When a man has married, he has completed one half of his religion. The purpose of marriage is to provide a legal union which safeguards society from moral and social degradation. When a man has married, The has completed one half of his religion. The purpose of marriage is to provide a legal union which safeguards society from moral and social degradation.<br></p>', 0, '2024-02-27 02:30:55', '2024-02-27 02:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `content_with_videos`
--

CREATE TABLE `content_with_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `sec` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_with_videos`
--

INSERT INTO `content_with_videos` (`id`, `page`, `sec`, `title`, `date`, `video`, `thumb`, `alt_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home_sec_6', 'Title', 'SEPTEMBER 09, 2023', 'https://www.youtube.com/embed/5xYDXp7fkY4?si=wkBfz8BeCP7xEGS_', '202402250605form2.png', 'Null', 0, '2024-02-22 04:45:51', '2024-02-25 00:05:07'),
(2, 'home', 'home_sec_6', 'Review', 'November 26-02-2014', 'https://www.youtube.com/embed/5xYDXp7fkY4?si=wkBfz8BeCP7xEGS_', '202402270715202402250722profile.png', 'Null', 0, '2024-02-27 01:15:38', '2024-02-27 01:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 0, '2024-02-25 07:36:26', '2024-02-25 07:36:26'),
(2, 'Canada', 0, '2024-02-25 07:40:02', '2024-02-25 07:40:02'),
(4, 'India', 0, '2024-02-26 10:20:17', '2024-02-26 10:20:17'),
(5, 'Pakistan', 0, '2024-02-26 10:20:40', '2024-02-26 10:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `education` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `education`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Under SSC', 0, '2024-02-25 18:43:56', '2024-04-05 05:34:01'),
(3, 'HSC', 0, '2024-02-26 10:24:58', '2024-02-26 10:25:39'),
(5, 'SSC', 0, '2024-04-05 05:35:40', '2024-04-05 05:35:40'),
(6, 'Dakhil', 0, '2024-04-05 05:36:01', '2024-04-05 05:36:01'),
(7, 'Alim', 0, '2024-04-05 05:36:15', '2024-04-05 05:36:15'),
(8, 'Fazil', 0, '2024-04-05 05:36:23', '2024-04-05 05:36:23'),
(9, 'Kamil', 0, '2024-04-05 05:36:33', '2024-04-05 05:36:33'),
(10, 'Diploma', 0, '2024-04-05 05:36:42', '2024-04-05 05:36:42'),
(11, 'BA', 0, '2024-04-05 05:36:50', '2024-04-05 05:36:50'),
(12, 'MA', 0, '2024-04-05 05:36:58', '2024-04-05 05:36:58'),
(13, 'O-Level', 0, '2024-04-05 05:37:09', '2024-04-05 05:37:09'),
(14, 'A-Level', 0, '2024-04-05 05:37:16', '2024-04-05 05:37:16'),
(15, 'Degree-Pass', 0, '2024-04-05 05:37:31', '2024-04-05 05:37:31'),
(16, 'LLB', 0, '2024-04-05 05:37:39', '2024-04-05 05:37:39'),
(17, 'LLM', 0, '2024-04-05 05:37:46', '2024-04-05 05:37:46'),
(18, 'BBA', 0, '2024-04-05 05:37:53', '2024-04-05 05:37:53'),
(19, 'MBA', 0, '2024-04-05 05:38:00', '2024-04-05 05:38:00'),
(20, 'BSS', 0, '2024-04-05 05:38:08', '2024-04-05 05:38:08'),
(21, 'MSS', 0, '2024-04-05 05:39:48', '2024-04-05 05:39:48'),
(22, 'B.Sc.', 0, '2024-04-05 05:39:56', '2024-04-05 05:39:56'),
(23, 'M.Sc.', 0, '2024-04-05 05:40:04', '2024-04-05 05:40:04'),
(24, 'PhD', 0, '2024-04-05 05:40:10', '2024-04-05 05:40:10'),
(25, 'MBBS', 0, '2024-04-05 05:40:17', '2024-04-05 05:40:17'),
(26, 'FCPS', 0, '2024-04-05 05:40:25', '2024-04-05 05:40:25'),
(27, 'D.in Midwifery', 0, '2024-04-05 05:40:32', '2024-04-05 05:40:32'),
(28, 'D.in Nursing', 0, '2024-04-05 05:40:39', '2024-04-05 05:40:39'),
(29, 'IELTS-5', 0, '2024-04-05 05:40:47', '2024-04-05 05:40:47'),
(30, 'IELTS-5.5', 0, '2024-04-05 05:40:54', '2024-04-05 05:40:54'),
(31, 'IELTS-6', 0, '2024-04-05 05:41:00', '2024-04-05 05:41:00'),
(32, 'IELTS-7', 0, '2024-04-05 05:41:08', '2024-04-05 05:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `educational_qualifications`
--

CREATE TABLE `educational_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `education_method` varchar(255) DEFAULT NULL,
  `latest_edu` varchar(255) DEFAULT NULL,
  `passing_year` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `equivalent` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educational_qualifications`
--

INSERT INTO `educational_qualifications` (`id`, `user_id`, `education_method`, `latest_edu`, `passing_year`, `group`, `result`, `equivalent`, `qualification`, `created_at`, `updated_at`) VALUES
(2, 22, NULL, 'Diploma', '2003', 'Science', 'A+', 'Other', 'No', '2024-04-05 09:18:31', '2024-04-05 09:18:31'),
(3, 25, 'General', 'Fazil', '2003', 'Arts', 'D', 'Other', 'No', '2024-04-05 12:30:14', '2024-04-05 12:30:14'),
(4, 23, 'General', 'HSC', '2022', 'Science', 'A', 'HSC', 'No', '2024-04-05 22:37:20', '2024-04-05 22:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `family_information`
--

CREATE TABLE `family_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `father_alive` varchar(255) DEFAULT NULL,
  `mother_alive` varchar(255) DEFAULT NULL,
  `father_profession` varchar(255) DEFAULT NULL,
  `mother_profession` varchar(255) DEFAULT NULL,
  `how_many_brother` varchar(255) DEFAULT NULL,
  `brother_information` varchar(255) DEFAULT NULL,
  `financial_status` varchar(255) DEFAULT NULL,
  `financial_condition` varchar(255) DEFAULT NULL,
  `religious_condition` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `family_information`
--

INSERT INTO `family_information` (`id`, `user_id`, `father_alive`, `mother_alive`, `father_profession`, `mother_profession`, `how_many_brother`, `brother_information`, `financial_status`, `financial_condition`, `religious_condition`, `created_at`, `updated_at`) VALUES
(10, 22, 'Not alive', 'Not alive', NULL, NULL, '01', 'Student', 'Middle Class', 'Middle Class', 'Hindu', '2024-04-05 09:19:28', '2024-04-05 09:19:28'),
(11, 25, 'alive', 'alive', 'Bussiness Man', 'Housewife', '1', 'One Brother', 'Middle Class', 'Financial Condition', 'Muslim', '2024-04-05 12:31:10', '2024-04-05 12:31:10'),
(12, 23, 'alive', 'alive', 'Bussiness Man', 'Housewife', '1', 'One Brother', 'Higher Class', 'Financial Condition', 'Muslim', '2024-04-05 22:37:39', '2024-04-05 22:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `life_partners`
--

CREATE TABLE `life_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `complexion` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `educational_qualification` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `getting_married` varchar(255) DEFAULT NULL,
  `financial_condition` varchar(255) DEFAULT NULL,
  `life_partner` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `life_partners`
--

INSERT INTO `life_partners` (`id`, `user_id`, `age`, `complexion`, `height`, `educational_qualification`, `district`, `getting_married`, `financial_condition`, `life_partner`, `status`, `created_at`, `updated_at`) VALUES
(8, 22, '25-30', 'Fair Skin', '5.6', 'Alim', 'Sylhet', 'Getting Married', 'Middle Class', 'Life Partner', 0, '2024-04-04 03:00:42', '2024-04-05 09:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `marriage_related`
--

CREATE TABLE `marriage_related` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `marriage_status` varchar(255) DEFAULT NULL,
  `agree_to_marriage` varchar(255) DEFAULT NULL,
  `reason_divorce` varchar(255) DEFAULT NULL,
  `after_marriage` varchar(255) DEFAULT NULL,
  `studies_after_marriage` varchar(255) DEFAULT NULL,
  `getting_married` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marriage_related`
--

INSERT INTO `marriage_related` (`id`, `user_id`, `marriage_status`, `agree_to_marriage`, `reason_divorce`, `after_marriage`, `studies_after_marriage`, `getting_married`, `created_at`, `updated_at`) VALUES
(5, 22, 'Single Class', 'Yes', NULL, 'Yes', 'Yes', 'What??', '2024-04-05 09:23:06', '2024-04-05 09:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `number`, `gender`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Cole Torres', 'cinibogy@mailinator.com', '+1 (471) 513-1763', 'male', 'Placeat necessitati', '2024-02-27 03:17:45', '2024-02-27 03:17:45'),
(2, 'Lucian Fulton', 'pufobyg@mailinator.com', '+1 (816) 808-1697', 'male', 'Modi elit mollit re', '2024-02-27 03:19:58', '2024-02-27 03:19:58'),
(3, 'Tyrone Ellison', 'qaceroje@mailinator.com', '+1 (189) 511-4563', 'male', 'Exercitation ullamco', '2024-02-27 03:20:12', '2024-02-27 03:20:12'),
(4, 'Felix Clements', 'hanynexube@mailinator.com', '+1 (549) 849-4212', 'male', 'Recusandae Unde ips', '2024-02-27 03:25:54', '2024-02-27 03:25:54'),
(5, 'Main Admin', 'admin@gmail.com', '+8801886338863', 'male', 'sdfsfsfsdfsf', '2024-03-03 00:00:55', '2024-03-03 00:00:55'),
(6, 'Calista Flowers', 'sacijyd@mailinator.com', '+1 (442) 412-3579', 'male', 'Amet sint sed id ut', '2024-04-03 00:57:26', '2024-04-03 00:57:26'),
(7, 'Athena Arnold', 'kojananota@mailinator.com', '+1 (841) 653-7072', 'female', 'Itaque voluptas laud', '2024-04-03 01:00:58', '2024-04-03 01:00:58'),
(8, 'sunny', 'sunnyyyyyy@gmail.comf', '01615338863', 'male', 'dsfsfffdfdsf', '2024-04-15 04:19:19', '2024-04-15 04:19:19'),
(9, 'Melodie England', 'jyhodyvigy@mailinator.com', '+1 (432) 727-8923', 'female', 'Aliqua Maxime conse', '2024-04-15 04:19:44', '2024-04-15 04:19:44'),
(10, 'Megan Vincent', 'hyravuv@mailinator.com', '+1 (439) 923-1991', 'male', 'Elit vel quibusdam', '2024-04-15 04:22:08', '2024-04-15 04:22:08');

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
(21, '2024_01_30_003430_create_commom_banners_table', 9),
(49, '2024_02_17_075444_add_new_fields_to_users_table', 33),
(50, '2024_02_17_080558_add_new_fields_to_users_table', 34),
(51, '2024_02_17_080912_add_new_fields_to_users_table', 35),
(52, '2024_02_17_081845_add_new_fields_to_users_table', 36),
(114, '2014_10_12_100000_create_password_reset_tokens_table', 37),
(115, '2014_10_12_100000_create_password_resets_table', 37),
(116, '2019_08_19_000000_create_failed_jobs_table', 37),
(117, '2019_12_14_000001_create_personal_access_tokens_table', 37),
(119, '2023_11_23_095307_create_content_with_videos_table', 37),
(120, '2023_11_23_095325_create_content_with_icons_table', 37),
(121, '2023_11_23_095351_create_seos_table', 37),
(122, '2024_01_28_021919_create_all_titles_table', 37),
(123, '2024_01_28_025607_create_most_recents_table', 37),
(124, '2024_01_28_103252_create_clint_reviews_table', 37),
(125, '2024_01_29_194817_create_sylheti_biyes_table', 37),
(126, '2024_01_29_220039_create_our_client_reviews_table', 37),
(127, '2024_01_30_004321_create_common_banners_table', 37),
(131, '2024_02_06_064124_add_new_fields_to_users_table', 37),
(133, '2024_02_08_051223_create_family_information_table', 37),
(134, '2024_02_08_051711_create_occupational_information_table', 37),
(135, '2024_02_08_052810_create_marriage_related_table', 37),
(136, '2024_02_08_053353_create_life_partners_table', 37),
(137, '2024_02_08_090848_add_new_fields_to_users_table', 37),
(138, '2024_02_09_155403_create_email_verifications_table', 37),
(139, '2024_02_11_141811_add_new_fields_to_users_table', 37),
(140, '2024_02_11_145015_create_admins_table', 37),
(143, '2014_10_12_000000_create_users_table', 38),
(146, '2024_02_22_110015_create_payments_table', 40),
(148, '2024_02_25_130600_create_countries_table', 41),
(153, '2024_02_25_152212_create_education_table', 44),
(154, '2024_02_25_152225_create_professions_table', 44),
(155, '2024_02_25_134034_create_cities_table', 45),
(157, '2024_01_31_101635_create_site_settings_table', 47),
(159, '2023_11_23_065545_create_content_with_images_table', 48),
(160, '2024_01_31_091628_create_messages_table', 49),
(164, '2024_03_11_043401_create_subscribes_table', 51),
(165, '2024_02_07_092504_create_educational_qualifications_table', 52),
(166, '2024_04_04_045929_create_up_gradation_fees_table', 53),
(177, '2024_02_05_044136_create_your_personal_data_table', 56),
(178, '2024_04_24_043356_create_visitors_table', 57);

-- --------------------------------------------------------

--
-- Table structure for table `most_recents`
--

CREATE TABLE `most_recents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `statas` varchar(255) DEFAULT NULL,
  `button_name_one` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `occupational_information`
--

CREATE TABLE `occupational_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `description_of_profession` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupational_information`
--

INSERT INTO `occupational_information` (`id`, `user_id`, `occupation`, `description_of_profession`, `created_at`, `updated_at`) VALUES
(6, 22, 'BCS Cadre', 'Description Of Profession', '2024-04-05 09:22:16', '2024-04-05 09:35:00'),
(7, 25, 'Maulana', 'I\'m maulana Of Opstel-IT', '2024-04-05 12:31:27', '2024-04-05 12:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `our_client_reviews`
--

CREATE TABLE `our_client_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `des` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_client_reviews`
--

INSERT INTO `our_client_reviews` (`id`, `title`, `des`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Our Client Review', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitatio.<br></p>', 0, '2024-02-22 04:44:53', '2024-02-22 04:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `b_number` varchar(255) DEFAULT NULL,
  `trans_number` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Free',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `b_number`, `trans_number`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, 'U9254865', '43645', '453', '45354', 'Paid', '2024-02-24 07:47:00', '2024-02-24 08:32:12'),
(7, 'U4293893', '01615338863', 'zccdcdcc', '3000', 'Paid', '2024-04-04 03:01:08', '2024-04-04 03:02:12'),
(8, 'U0054912', '01615338863', 'adil', '3000', 'Paid', '2024-04-04 07:28:16', '2024-04-04 07:28:37'),
(9, 'U8759834', '01615338863', 'zccdcdcc', '2000', 'Paid', '2024-04-05 11:48:56', '2024-04-05 11:49:07'),
(10, 'U8984321', '01715338863', 'zccdcdcc', '3000', 'Paid', '2024-04-05 12:33:51', '2024-04-05 12:34:39'),
(15, 'U5644033', '01615338863', 'zccdcdcc', '2500', 'Paid', '2024-04-20 00:00:26', '2024-04-20 00:00:48'),
(16, 'U8011910', '01615338863', 'zccdcdcc', '2500', 'Paid', '2024-04-20 02:40:25', '2024-04-20 02:41:16'),
(18, 'U0205927', '01615338863', 'zccdcdcc', '2500', 'Paid', '2024-04-20 07:57:35', '2024-04-20 07:58:01'),
(19, 'U2225609', '01615338863', 'zccdcdcc', '2500', 'Paid', '2024-04-24 08:40:46', '2024-04-24 08:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

CREATE TABLE `professions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `profession`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Doctor', 0, '2024-02-26 10:26:15', '2024-02-26 10:26:15'),
(5, 'Engineer', 0, '2024-02-26 10:27:18', '2024-02-26 10:27:18'),
(6, 'Still student', 0, '2024-04-05 05:43:22', '2024-04-05 05:43:22'),
(7, 'Govt. employee', 0, '2024-04-05 05:43:31', '2024-04-05 05:43:31'),
(8, 'Govt.clg.teacher', 0, '2024-04-05 05:44:15', '2024-04-05 05:44:15'),
(9, 'Govt.sch.teacher', 0, '2024-04-05 05:44:24', '2024-04-05 05:44:24'),
(10, 'Private employee', 0, '2024-04-05 05:44:32', '2024-04-05 05:44:32'),
(11, 'Private college teacher', 0, '2024-04-05 05:45:06', '2024-04-05 05:45:06'),
(12, 'Private school teacher', 0, '2024-04-05 05:45:25', '2024-04-05 05:45:25'),
(13, 'Businessman', 0, '2024-04-05 05:45:33', '2024-04-05 05:45:33'),
(14, 'BCS Cadre', 0, '2024-04-05 05:45:41', '2024-04-05 05:45:41'),
(15, 'Banker', 0, '2024-04-05 05:45:47', '2024-04-05 05:45:47'),
(16, 'Engineer', 0, '2024-04-05 05:45:54', '2024-04-05 05:45:54'),
(17, 'Doctor', 0, '2024-04-05 05:46:00', '2024-04-05 05:46:00'),
(18, 'Nurse', 0, '2024-04-05 05:46:07', '2024-04-05 05:46:07'),
(19, 'Dentist', 0, '2024-04-05 05:46:14', '2024-04-05 05:46:14'),
(20, 'Lawyer', 0, '2024-04-05 05:46:20', '2024-04-05 05:46:20'),
(21, 'Barrister', 0, '2024-04-05 05:46:27', '2024-04-05 05:46:27'),
(22, 'Journalist', 0, '2024-04-05 05:46:34', '2024-04-05 05:46:34'),
(23, 'Law enforcer', 0, '2024-04-05 05:46:42', '2024-04-05 05:46:42'),
(24, 'Chef', 0, '2024-04-05 05:46:49', '2024-04-05 05:46:49'),
(25, 'Unemployed', 0, '2024-04-05 05:46:55', '2024-04-05 05:46:55'),
(26, 'Driver', 0, '2024-04-05 05:47:05', '2024-04-05 05:47:05'),
(27, 'Maulana', 0, '2024-04-05 05:47:12', '2024-04-05 05:47:12'),
(28, 'Inform Later', 0, '2024-04-05 05:47:21', '2024-04-05 05:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `page`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 'home', 'Meta Title', '<p>Meta Des</p>', '<p>Meta Key</p>', '2024-02-23 23:14:56', '2024-02-23 23:15:09'),
(2, 'home', 'Meta Titledf', '<p>Meta Description</p>', '<p>Meta Keyword</p>', '2024-04-15 01:30:26', '2024-04-15 01:30:38'),
(3, 'about_us', 'Meta Tile', '<p>Meta Des</p>', '<p>Meta Keyword</p>', '2024-04-15 01:31:41', '2024-04-15 01:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `copy_right` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `w_img` varchar(255) DEFAULT NULL,
  `d_img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `copy_right`, `number`, `w_img`, `d_img`, `alt_img`, `status`, `created_at`, `updated_at`) VALUES
(1, '© 2024 SylhetiWedding.com  Powerd By Opstelit', '+8801766325014', '202404201328Sylheti Weeding.png', '202404201328Logo 2.png', 'Null', 0, '2024-02-25 19:35:14', '2024-04-20 07:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'kypa@mailinator.com', '2024-03-10 22:55:14', '2024-03-10 22:55:14'),
(3, 'uzzol@gmail.com', '2024-03-10 22:55:43', '2024-03-10 22:55:43'),
(4, 'sunny123@gmail.com', '2024-03-10 23:02:45', '2024-03-10 23:02:45'),
(5, 'admin@gmail.com', '2024-03-10 23:04:24', '2024-03-10 23:04:24'),
(9, 'feff@gmail.com', '2024-04-15 04:08:12', '2024-04-15 04:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `sylheti_biyes`
--

CREATE TABLE `sylheti_biyes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_1` varchar(255) DEFAULT NULL,
  `icon_1` varchar(255) DEFAULT NULL,
  `des_1` varchar(255) DEFAULT NULL,
  `title_2` varchar(255) DEFAULT NULL,
  `icon_2` varchar(255) DEFAULT NULL,
  `des_2` varchar(255) DEFAULT NULL,
  `title_3` varchar(255) DEFAULT NULL,
  `icon_3` varchar(255) DEFAULT NULL,
  `des_3` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `alt_img` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sylheti_biyes`
--

INSERT INTO `sylheti_biyes` (`id`, `title`, `title_1`, `icon_1`, `des_1`, `title_2`, `icon_2`, `des_2`, `title_3`, `icon_3`, `des_3`, `img`, `alt_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 'This is how Sylheti Biye Shadi.com works', 'Create a resume', 'fa-solid fa-user-plus', 'You can easily create free Syleti biya shaadi.com Biodata', 'Find Bio Data', 'fa-solid fa-magnifying-glass', 'You can easily search biodata using many filters including age, upazila, profession, educational qualification.', 'Consummate The Marriage', 'fa-solid fa-heart-crack', 'If you like the biodata and talk, do a thorough search at your own risk and complete the Sunnati marriage.', '202402250605img1.png', 'Null', 0, '2024-02-22 04:43:53', '2024-02-25 00:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `up_gradation_fees`
--

CREATE TABLE `up_gradation_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `up_gradation_fees`
--

INSERT INTO `up_gradation_fees` (`id`, `fee`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, '2500', 'Deshi Bridegroom', 0, '2024-04-03 23:51:08', '2024-04-03 23:51:35'),
(3, '3000', 'Foreigner Bridegroom', 0, '2024-04-04 02:55:04', '2024-04-04 02:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `show_password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `number`, `email`, `email_verified_at`, `password`, `show_password`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(22, 'Uzzol Dash', 'U4293893', '01615338863', 'uzzol@gmail.com', NULL, '$2y$10$zbFiE6LJ/59rMRWCnDtXv.6Jf.mBt9.p/L.83Xo7MD.YlJss8XEby', '123456', 0, NULL, NULL, '2024-04-04 02:54:36', '2024-04-04 03:02:12'),
(23, 'Adil', 'U0054912', '01615338863', 'adil@gmail.com', NULL, '$2y$10$xUnFlRT2hFfJ3R11iZmtmOWCFI2pPWRPed5cX0NVvx75PrzmNVsTu', '123456', 0, NULL, NULL, '2024-04-04 07:26:11', '2024-04-04 07:28:37'),
(24, 'Farhan Taj', 'U8759834', '01615338863', 'farhan@gmail.com', NULL, '$2y$10$gqfyDBPD4H9yfYqBusWk/u9VChOdiwSGOaJhcWdJt3W5Pm6puW/A6', '123456', 0, NULL, NULL, '2024-04-05 11:26:29', '2024-04-05 11:49:07'),
(25, 'Jisan Khan', 'U8984321', '01615338863', 'jisan@gmail.com', NULL, '$2y$10$Oy/lN7PhlkVssivS7qR3OeAYsNatatb8e2c1ZYyNGOc7wX1sYfRq2', '123456', 0, NULL, NULL, '2024-04-05 12:28:21', '2024-04-05 12:34:39'),
(26, 'Omor Mirza', 'U1338690', '01615338863', 'Omor@gmail.com', NULL, '$2y$10$npZ9aTxd9MBp7cD9VpLBGugNRx9fkxd1ZtE/sV/nUdzqXnU.CAEza', '123456', 1, NULL, NULL, '2024-04-05 23:26:45', '2024-04-05 23:26:45'),
(32, 'arif', 'U5644033', '01615338863', 'arif@gmail.com', NULL, '$2y$10$A4.do2P7WBamAWg0tDnKKuABALGZRt11J763zOv/cO7bCvPC3wqmu', '123456', 0, NULL, NULL, '2024-04-19 23:58:48', '2024-04-20 00:00:48'),
(33, 'Abadur rahman', 'U8011910', '01615338863', 'avad@gmail.com', NULL, '$2y$10$/eLg4NLM7zlHLZQrf5FIU.y6FdZKSsYev2ty6Nr86Ag/sY3IXf5Le', '123456', 0, NULL, NULL, '2024-04-20 02:38:58', '2024-04-20 02:41:16'),
(39, 'Istiaq', 'U0205927', '01615338863', 'istiaq@gmail.com', NULL, '$2y$10$ncNDqLvsibf2KJVbJcirFuwWCsTpf4XkcVGaN6JPxdNSGVru.I/nO', '123456', 0, NULL, NULL, '2024-04-20 07:55:37', '2024-04-20 07:58:01'),
(40, 'Tayef Uddin', 'U2225609', '01615338863', 'tayef@gmail.com', NULL, '$2y$10$n/9XGIa7PYgTEbZvewDyYO.sK66vXT2sYAtfN/3LikzQP9h.bBqa.', '123456', 0, NULL, NULL, '2024-04-24 08:40:36', '2024-04-24 08:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_visits` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `your_personal_data`
--

CREATE TABLE `your_personal_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` varchar(255) DEFAULT NULL,
  `city_id` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `proffession` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `visits` int(11) NOT NULL DEFAULT 0,
  `marital` varchar(255) DEFAULT NULL,
  `children` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `complexion` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `your_personal_data`
--

INSERT INTO `your_personal_data` (`id`, `name`, `user_id`, `country_id`, `city_id`, `number`, `gender`, `age`, `education`, `proffession`, `religion`, `height`, `visits`, `marital`, `children`, `date_of_birth`, `complexion`, `weight`, `blood_group`, `nationality`, `country`, `city`, `address`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Uzzol Dash', 22, '1', '1', '01615338863', 'Male', '24', 'HSC', 'Inform Later', 'Hindu', '5.6', 7, 'Single', 'No', '2024-04-23', 'Fair Skin', '65', 'B+', 'Bangladeshi', NULL, NULL, 'Sylhet,Zindabazar', '202404230948202404230756202404230753202404051041Ellipse 154.png', '2024-04-23 03:49:00', '2024-04-24 08:19:29'),
(2, 'Adil Shah', 23, '1', '1', '01615338863', 'Male', '24', 'BA', 'Inform Later', 'Muslim', '5.6', 6, 'Single', 'No', '2024-04-23', 'Fair Skin', '55', 'B+', 'Bangladeshi', NULL, NULL, 'Sylhet,Zindabazar', '202404231014202404051745Ellipse 158.png', '2024-04-23 04:14:50', '2024-04-24 08:19:20'),
(3, 'Farhan', 24, '1', '1', '01615338863', 'Male', '24', 'B.Sc.', 'Chef', 'Muslim', '5.11', 4, 'Single', 'No', '2024-04-23', 'Fair Skin', '55', 'B+', 'Foreigner', NULL, NULL, 'Sylhet,Zindabazar', '202404231019202404230756202404230753202404051041Ellipse 154.png', '2024-04-23 04:19:08', '2024-04-23 09:58:46'),
(4, 'Abadur rahman', 33, '1', '1', '01615338863', 'Male', '24', 'BSS', 'Inform Later', 'Muslim', '5.6', 0, 'Single', 'No', '2024-04-23', 'Fair Skin', '55', 'B+', 'Bangladeshi', NULL, NULL, 'Sylhet,Zindabazar', '202404231020202404230747202404051059Ellipse 154.png', '2024-04-23 04:20:50', '2024-04-23 04:20:50'),
(5, 'Jisan Khan', 25, '1', '1', '01615338863', 'Male', '22', NULL, 'Inform Later', 'Muslim', '5.5', 2, 'Single', 'No', '2024-04-23', 'Fair Skin', '65', 'B+', 'Bangladeshi', NULL, NULL, 'Sylhet,Zindabazar', '202404231022202404230749202404230729about.jpg', '2024-04-23 04:22:16', '2024-04-23 09:06:56'),
(6, 'Istiaq', 39, '1', '1', '01615338863', 'Male', '22', NULL, 'Maulana', 'Muslim', '5.4', 2, 'Single', 'No', '2024-04-23', 'Fair Skin', '65', 'B+', 'Bangladeshi', NULL, NULL, 'Sylhet,Amberkhana', '202404231023202404051829Group 549.png', '2024-04-23 04:23:47', '2024-04-24 08:44:26'),
(7, 'arif', 32, '1', '1', '01615338863', 'Male', '22', 'Diploma', 'Driver', 'Muslim', NULL, 0, 'Single', 'No', '2024-04-23', 'Fair Skin', '65', NULL, 'Foreigner', NULL, NULL, 'Sylhet,Amberkhana', '202404231024202403110707profile.png', '2024-04-23 04:24:38', '2024-04-23 04:24:38'),
(8, 'Tayef Uddin', 40, '1', '1', '01618338863', 'Male', '26', 'Diploma', 'Inform Later', 'Muslim', '5.6', 0, 'Single', 'No', '2024-04-23', 'Fair Skin', '65', 'B+', 'Bangladeshi', NULL, NULL, 'Sylhet,Amberkhana', '202404241442202404051059Ellipse 154.png', '2024-04-24 08:42:05', '2024-04-24 08:42:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `all_titles`
--
ALTER TABLE `all_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clint_reviews`
--
ALTER TABLE `clint_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commom_banners`
--
ALTER TABLE `commom_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `common_banners`
--
ALTER TABLE `common_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_with_icons`
--
ALTER TABLE `content_with_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_with_images`
--
ALTER TABLE `content_with_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_with_videos`
--
ALTER TABLE `content_with_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_qualifications`
--
ALTER TABLE `educational_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `family_information`
--
ALTER TABLE `family_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `life_partners`
--
ALTER TABLE `life_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marriage_related`
--
ALTER TABLE `marriage_related`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `most_recents`
--
ALTER TABLE `most_recents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupational_information`
--
ALTER TABLE `occupational_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_client_reviews`
--
ALTER TABLE `our_client_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `professions`
--
ALTER TABLE `professions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribes_email_unique` (`email`);

--
-- Indexes for table `sylheti_biyes`
--
ALTER TABLE `sylheti_biyes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_gradation_fees`
--
ALTER TABLE `up_gradation_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `your_personal_data`
--
ALTER TABLE `your_personal_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_titles`
--
ALTER TABLE `all_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clint_reviews`
--
ALTER TABLE `clint_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commom_banners`
--
ALTER TABLE `commom_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `common_banners`
--
ALTER TABLE `common_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `content_with_icons`
--
ALTER TABLE `content_with_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content_with_images`
--
ALTER TABLE `content_with_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content_with_videos`
--
ALTER TABLE `content_with_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `educational_qualifications`
--
ALTER TABLE `educational_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_information`
--
ALTER TABLE `family_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `life_partners`
--
ALTER TABLE `life_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `marriage_related`
--
ALTER TABLE `marriage_related`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `most_recents`
--
ALTER TABLE `most_recents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `occupational_information`
--
ALTER TABLE `occupational_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_client_reviews`
--
ALTER TABLE `our_client_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professions`
--
ALTER TABLE `professions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sylheti_biyes`
--
ALTER TABLE `sylheti_biyes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `up_gradation_fees`
--
ALTER TABLE `up_gradation_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `your_personal_data`
--
ALTER TABLE `your_personal_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
