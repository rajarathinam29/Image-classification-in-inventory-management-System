-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 07:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodcity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_time` datetime NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` int(11) DEFAULT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `title`, `first_name`, `last_name`, `phone_no`, `email`, `email_verified_at`, `user_name`, `password`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `status`, `token`, `permissions`, `last_login`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr', 'Rajarathinam', '', '+94 755555555', 'admin@mail.com', NULL, 'admin', '$2y$10$u4kh/9QdKALBeavP0TJyfuQgZSiTHtbdPr8Zf7Q9Qb9J0bZfHP5mG', NULL, 'xyz', 'xyz', 'xyz', 'xyz', NULL, 1, 'eyJpdiI6IllTeTFkLy9jOFpCT0d2RjFXeDdaOEE9PSIsInZhbHVlIjoiTkhPdGpmTVNEU3R4ckt6ZnlqQ0FIVEVOQ0tMeDRwb0IvUnZoZzFwQ29XajlpcVJNaFV1MjVITER4cTJENFAvaCIsIm1hYyI6IjM0ZTdkYWQ4OTU2MGM0NjQ2YzZmNTBiYTZhNmIxZGE2YWM5ZGYyYzc0ZGI0ZjAzN2MwODliYWNmMzBkZDYyYzMiLCJ0YWciOiIifQ==', NULL, '2025-03-18 08:14:03', NULL, '2025-01-01 01:58:37', '2025-01-01 02:44:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_code` int(11) NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_templete` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_code`, `bank_name`, `short_name`, `country`, `cheque_templete`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7852, 'Alliance Finance Company PLC', '', 'LK', '', NULL, NULL, NULL),
(2, 7463, 'Amana Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(3, 7472, 'Axis Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(4, 7010, 'Bank of Ceylon', NULL, 'LK', NULL, NULL, NULL, NULL),
(5, 7481, 'Cargills Bank Limited', NULL, 'LK', NULL, NULL, NULL, NULL),
(6, 8004, 'Central Bank of Sri Lanka', NULL, 'LK', NULL, NULL, NULL, NULL),
(7, 7825, 'Central Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(8, 7047, 'Citi Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(9, 7746, 'Citizen Development Business Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(10, 7056, 'Commercial Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(11, 7870, 'Commercial Credit & Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(12, 7807, 'Commercial Leasing and Finance', NULL, 'LK', NULL, NULL, NULL, NULL),
(13, 7205, 'Deutsche Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(14, 7454, 'DFCC Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(15, 7074, 'Habib Bank Ltd', NULL, 'LK', NULL, NULL, NULL, NULL),
(16, 7083, 'Hatton National Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(17, 7737, 'HDFC Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(18, 7092, 'Hongkong Shanghai Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(19, 7384, 'ICICI Bank Ltd', NULL, 'LK', NULL, NULL, NULL, NULL),
(20, 7108, 'Indian Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(21, 7117, 'Indian Overseas Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(22, 7834, 'Kanrich Finance Limited', NULL, 'LK', NULL, NULL, NULL, NULL),
(23, 7861, 'Lanka Orix Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(24, 7773, 'LB Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(25, 7269, 'MCB Bank Ltd', NULL, 'LK', NULL, NULL, NULL, NULL),
(26, 7913, 'Mercantile Investment and Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(27, 7898, 'Merchant Bank of Sri Lanka & Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(28, 7214, 'National Development Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(29, 7719, 'National Savings Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(30, 7162, 'Nations Trust Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(31, 7311, 'Pan Asia Banking Corporation PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(32, 7135, 'Peoples Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(33, 7922, 'People’s Leasing & Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(34, 7296, 'Public Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(35, 7755, 'Regional Development Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(36, 7278, 'Sampath Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(37, 7728, 'Sanasa Development Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(38, 7782, 'Senkadagala Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(39, 7287, 'Seylan Bank PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(40, 7038, 'Standard Chartered Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(41, 7144, 'State Bank of India', NULL, 'LK', NULL, NULL, NULL, NULL),
(42, 7764, 'State Mortgage & Investment Bank', NULL, 'LK', NULL, NULL, NULL, NULL),
(43, 7302, 'Union Bank of Colombo PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(44, 7816, 'Vallibel Finance PLC', NULL, 'LK', NULL, NULL, NULL, NULL),
(45, 5, 'Bank of Ceylon', 'BOC', 'LK', NULL, '2023-07-12 23:10:46', '2023-07-13 00:53:34', '2023-07-13 00:53:34'),
(46, 7800, 'Dash  Trust Bank', 'DB', 'LK', NULL, '2023-07-13 00:21:33', '2023-07-13 00:56:10', NULL),
(47, 2, 'Nation Trust Bank', 'NTB', 'LK', NULL, '2023-07-13 00:22:53', '2023-07-13 00:22:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_branches`
--

CREATE TABLE `bank_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `branch_code` int(11) NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_issued`
--

CREATE TABLE `cheque_issued` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` datetime NOT NULL,
  `effective_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refference` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cheque_status` tinyint(4) NOT NULL,
  `company_bank_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cheque_received`
--

CREATE TABLE `cheque_received` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` datetime NOT NULL,
  `effective_date` datetime NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refference` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cheque_status` tinyint(4) NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proprietor_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registerd_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `phone_no` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_limit` int(11) NOT NULL DEFAULT 0,
  `logo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `starting_month` int(11) NOT NULL DEFAULT 1,
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `currency_placement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'before',
  `date_format` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_bank_info`
--

CREATE TABLE `company_bank_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `bank_branch_id` bigint(20) UNSIGNED NOT NULL,
  `bank_account_no` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thousand_separator` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal_separator` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `country`, `currency`, `code`, `symbol`, `thousand_separator`, `decimal_separator`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', ',', '.', NULL, NULL),
(2, 'America', 'Dollars', 'USD', '$', ',', '.', NULL, NULL),
(3, 'Afghanistan', 'Afghanis', 'AF', '؋', ',', '.', NULL, NULL),
(4, 'Argentina', 'Pesos', 'ARS', '$', ',', '.', NULL, NULL),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ', ',', '.', NULL, NULL),
(6, 'Australia', 'Dollars', 'AUD', '$', ',', '.', NULL, NULL),
(7, 'Azerbaijan', 'New Manats', 'AZ', 'ман', ',', '.', NULL, NULL),
(8, 'Bahamas', 'Dollars', 'BSD', '$', ',', '.', NULL, NULL),
(9, 'Barbados', 'Dollars', 'BBD', '$', ',', '.', NULL, NULL),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', ',', '.', NULL, NULL),
(11, 'Belgium', 'Euro', 'EUR', '€', ',', '.', NULL, NULL),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', ',', '.', NULL, NULL),
(13, 'Bermuda', 'Dollars', 'BMD', '$', ',', '.', NULL, NULL),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', ',', '.', NULL, NULL),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', ',', '.', NULL, NULL),
(16, 'Botswana', 'Pula\'s', 'BWP', 'P', ',', '.', NULL, NULL),
(17, 'Bulgaria', 'Leva', 'BG', 'лв', ',', '.', NULL, NULL),
(18, 'Brazil', 'Reais', 'BRL', 'R$', ',', '.', NULL, NULL),
(19, 'Britain [United Kingdom]', 'Pounds', 'GBP', '£', ',', '.', NULL, NULL),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', ',', '.', NULL, NULL),
(21, 'Cambodia', 'Riels', 'KHR', '៛', ',', '.', NULL, NULL),
(22, 'Canada', 'Dollars', 'CAD', '$', ',', '.', NULL, NULL),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', ',', '.', NULL, NULL),
(24, 'Chile', 'Pesos', 'CLP', '$', ',', '.', NULL, NULL),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥', ',', '.', NULL, NULL),
(26, 'Colombia', 'Pesos', 'COP', '$', ',', '.', NULL, NULL),
(27, 'Costa Rica', 'Colón', 'CRC', '₡', ',', '.', NULL, NULL),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', ',', '.', NULL, NULL),
(29, 'Cuba', 'Pesos', 'CUP', '₱', ',', '.', NULL, NULL),
(30, 'Cyprus', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč', ',', '.', NULL, NULL),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', ',', '.', NULL, NULL),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', ',', '.', NULL, NULL),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', ',', '.', NULL, NULL),
(35, 'Egypt', 'Pounds', 'EGP', '£', ',', '.', NULL, NULL),
(36, 'El Salvador', 'Colones', 'SVC', '$', ',', '.', NULL, NULL),
(37, 'England [United Kingdom]', 'Pounds', 'GBP', '£', ',', '.', NULL, NULL),
(38, 'Euro', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£', ',', '.', NULL, NULL),
(40, 'Fiji', 'Dollars', 'FJD', '$', ',', '.', NULL, NULL),
(41, 'France', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(42, 'Ghana', 'Cedis', 'GHS', '¢', ',', '.', NULL, NULL),
(43, 'Gibraltar', 'Pounds', 'GIP', '£', ',', '.', NULL, NULL),
(44, 'Greece', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', ',', '.', NULL, NULL),
(46, 'Guernsey', 'Pounds', 'GGP', '£', ',', '.', NULL, NULL),
(47, 'Guyana', 'Dollars', 'GYD', '$', ',', '.', NULL, NULL),
(48, 'Holland [Netherlands]', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', ',', '.', NULL, NULL),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', ',', '.', NULL, NULL),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', ',', '.', NULL, NULL),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', ',', '.', NULL, NULL),
(53, 'India', 'Rupees', 'INR', '₹', ',', '.', NULL, NULL),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', ',', '.', NULL, NULL),
(55, 'Iran', 'Rials', 'IRR', '﷼', ',', '.', NULL, NULL),
(56, 'Ireland', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(57, 'Isle of Man', 'Pounds', 'IMP', '£', ',', '.', NULL, NULL),
(58, 'Israel', 'New Shekels', 'ILS', '₪', ',', '.', NULL, NULL),
(59, 'Italy', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', ',', '.', NULL, NULL),
(61, 'Japan', 'Yen', 'JPY', '¥', ',', '.', NULL, NULL),
(62, 'Jersey', 'Pounds', 'JEP', '£', ',', '.', NULL, NULL),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'лв', ',', '.', NULL, NULL),
(64, 'Korea [North]', 'Won', 'KPW', '₩', ',', '.', NULL, NULL),
(65, 'Korea [South]', 'Won', 'KRW', '₩', ',', '.', NULL, NULL),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'лв', ',', '.', NULL, NULL),
(67, 'Laos', 'Kips', 'LAK', '₭', ',', '.', NULL, NULL),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', ',', '.', NULL, NULL),
(69, 'Lebanon', 'Pounds', 'LBP', '£', ',', '.', NULL, NULL),
(70, 'Liberia', 'Dollars', 'LRD', '$', ',', '.', NULL, NULL),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', ',', '.', NULL, NULL),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', ',', '.', NULL, NULL),
(73, 'Luxembourg', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(74, 'Macedonia', 'Denars', 'MKD', 'ден', ',', '.', NULL, NULL),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', ',', '.', NULL, NULL),
(76, 'Malta', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(77, 'Mauritius', 'Rupees', 'MUR', '₨', ',', '.', NULL, NULL),
(78, 'Mexico', 'Pesos', 'MXN', '$', ',', '.', NULL, NULL),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮', ',', '.', NULL, NULL),
(80, 'Mozambique', 'Meticais', 'MZ', 'MT', ',', '.', NULL, NULL),
(81, 'Namibia', 'Dollars', 'NAD', '$', ',', '.', NULL, NULL),
(82, 'Nepal', 'Rupees', 'NPR', '₨', ',', '.', NULL, NULL),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ', ',', '.', NULL, NULL),
(84, 'Netherlands', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(85, 'New Zealand', 'Dollars', 'NZD', '$', ',', '.', NULL, NULL),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', ',', '.', NULL, NULL),
(87, 'Nigeria', 'Nairas', 'NGN', '₦', ',', '.', NULL, NULL),
(88, 'North Korea', 'Won', 'KPW', '₩', ',', '.', NULL, NULL),
(89, 'Norway', 'Krone', 'NOK', 'kr', ',', '.', NULL, NULL),
(90, 'Oman', 'Rials', 'OMR', '﷼', ',', '.', NULL, NULL),
(91, 'Pakistan', 'Rupees', 'PKR', '₨', ',', '.', NULL, NULL),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', ',', '.', NULL, NULL),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', ',', '.', NULL, NULL),
(94, 'Peru', 'Nuevos Soles', 'PE', 'S/.', ',', '.', NULL, NULL),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', ',', '.', NULL, NULL),
(96, 'Poland', 'Zlotych', 'PL', 'zł', ',', '.', NULL, NULL),
(97, 'Qatar', 'Rials', 'QAR', '﷼', ',', '.', NULL, NULL),
(98, 'Romania', 'New Lei', 'RO', 'lei', ',', '.', NULL, NULL),
(99, 'Russia', 'Rubles', 'RUB', 'руб', ',', '.', NULL, NULL),
(100, 'Saint Helena', 'Pounds', 'SHP', '£', ',', '.', NULL, NULL),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼', ',', '.', NULL, NULL),
(102, 'Serbia', 'Dinars', 'RSD', 'Дин.', ',', '.', NULL, NULL),
(103, 'Seychelles', 'Rupees', 'SCR', '₨', ',', '.', NULL, NULL),
(104, 'Singapore', 'Dollars', 'SGD', '$', ',', '.', NULL, NULL),
(105, 'Slovenia', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', ',', '.', NULL, NULL),
(107, 'Somalia', 'Shillings', 'SOS', 'S', ',', '.', NULL, NULL),
(108, 'South Africa', 'Rand', 'ZAR', 'R', ',', '.', NULL, NULL),
(109, 'South Korea', 'Won', 'KRW', '₩', ',', '.', NULL, NULL),
(110, 'Spain', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₨', ',', '.', NULL, NULL),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', ',', '.', NULL, NULL),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', ',', '.', NULL, NULL),
(114, 'Suriname', 'Dollars', 'SRD', '$', ',', '.', NULL, NULL),
(115, 'Syria', 'Pounds', 'SYP', '£', ',', '.', NULL, NULL),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', ',', '.', NULL, NULL),
(117, 'Thailand', 'Baht', 'THB', '฿', ',', '.', NULL, NULL),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', ',', '.', NULL, NULL),
(119, 'Turkey', 'Lira', 'TRY', 'TL', ',', '.', NULL, NULL),
(120, 'Turkey', 'Liras', 'TRL', '£', ',', '.', NULL, NULL),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', ',', '.', NULL, NULL),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴', ',', '.', NULL, NULL),
(123, 'United Kingdom', 'Pounds', 'GBP', '£', ',', '.', NULL, NULL),
(124, 'United States of America', 'Dollars', 'USD', '$', ',', '.', NULL, NULL),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', ',', '.', NULL, NULL),
(126, 'Uzbekistan', 'Sums', 'UZS', 'лв', ',', '.', NULL, NULL),
(127, 'Vatican City', 'Euro', 'EUR', '€', '.', ',', NULL, NULL),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', ',', '.', NULL, NULL),
(129, 'Vietnam', 'Dong', 'VND', '₫', ',', '.', NULL, NULL),
(130, 'Yemen', 'Rials', 'YER', '﷼', ',', '.', NULL, NULL),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', ',', '.', NULL, NULL),
(132, 'Iraq', 'Iraqi dinar', 'IQD', 'د.ع', ',', '.', NULL, NULL),
(133, 'Kenya', 'Kenyan shilling', 'KES', 'KSh', ',', '.', NULL, NULL),
(134, 'Bangladesh', 'Taka', 'BDT', '৳', ',', '.', NULL, NULL),
(135, 'Algerie', 'Algerian dinar', 'DZD', 'د.ج', ' ', '.', NULL, NULL),
(136, 'United Arab Emirates', 'United Arab Emirates dirham', 'AED', 'د.إ', ',', '.', NULL, NULL),
(137, 'Uganda', 'Uganda shillings', 'UGX', 'USh', ',', '.', NULL, NULL),
(138, 'Tanzania', 'Tanzanian shilling', 'TZS', 'TSh', ',', '.', NULL, NULL),
(139, 'Angola', 'Kwanza', 'AOA', 'Kz', ',', '.', NULL, NULL),
(140, 'Kuwait', 'Kuwaiti dinar', 'KWD', 'KD', ',', '.', NULL, NULL),
(141, 'Bahrain', 'Bahraini dinar', 'BHD', 'BD', ',', '.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_phone_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT 0.00,
  `credit_limit` double(8,2) NOT NULL DEFAULT 0.00,
  `shipping_building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_balance` double(10,2) DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disposed_products`
--

CREATE TABLE `disposed_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `disposed_type` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` double(8,2) NOT NULL,
  `serial_no` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disposed_type`
--

CREATE TABLE `disposed_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_phone_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purchase_payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `make_model`
--

CREATE TABLE `make_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `make_model_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_04_03_062008_create_user_role', 1),
(5, '2023_04_03_062724_create_users', 1),
(6, '2023_04_03_065251_create_modules_table', 1),
(7, '2023_04_03_070219_create_modules_sub_table', 1),
(8, '2023_04_07_062055_create_companies_table', 1),
(9, '2023_04_10_060426_create_branches_table', 1),
(10, '2023_04_11_054508_create_usercompanies_table', 1),
(11, '2023_04_13_045240_create_admins_table', 1),
(12, '2023_04_17_055748_create_product_categories_table', 1),
(13, '2023_04_19_044643_create_product_brands_table', 1),
(14, '2023_04_19_112622_create_product_companies_table', 1),
(15, '2023_04_20_062124_create_product_unit_types', 1),
(16, '2023_04_20_062534_create_products_table', 1),
(17, '2023_04_25_041624_create_suppliers_table', 1),
(18, '2023_05_02_043804_create_purchase_table', 1),
(19, '2023_05_02_045228_create_customers_table', 1),
(20, '2023_05_03_103512_create_payment_methods_table', 1),
(21, '2023_05_05_104548_create_product_multiple_alliance_table', 1),
(22, '2023_05_09_055407_create_purchase_attachments_table', 1),
(23, '2023_05_11_075525_create_purchased_products_table', 1),
(24, '2023_05_19_072840_create_sales_table', 1),
(25, '2023_05_19_080539_create_payment_types_table', 1),
(26, '2023_05_19_080632_create_revenues_table', 1),
(27, '2023_05_19_082033_create_expenses_table', 1),
(29, '2023_05_30_061842_create_languages_table', 1),
(30, '2023_05_30_070656_create_product_language_table', 1),
(31, '2023_05_31_054944_create_sales_products_table', 1),
(47, '2023_06_12_062339_create_vouchers_table', 2),
(48, '2023_06_12_081936_create_voucher_payments_table', 2),
(49, '2023_06_12_094012_create_voucher_sales_table', 2),
(50, '2023_06_13_055713_create_voucher_sale_payments_table', 2),
(51, '2023_07_05_051201_create_purchase_payments_table', 2),
(52, '2023_07_05_053531_add_purchase_payment_id_to_expenses_table', 3),
(53, '2023_07_06_081143_create_banks_table', 4),
(54, '2023_07_06_083052_create_bank_branches_table', 4),
(55, '2023_07_07_053029_create_company_bank_info_table', 5),
(56, '2023_07_07_064812_create_cheque_issued_table', 6),
(59, '2024_02_01_073715_create_stock_count_table', 7),
(60, '2024_02_01_085553_create_stock_count_products_table', 7),
(63, '2024_02_08_091955_add_customers_table', 8),
(64, '2024_02_09_102919_add_moredetails_products_table', 8),
(67, '2024_02_19_080424_create_activity_log_table', 9),
(68, '2024_02_29_094413_add_suppliers_table', 10),
(69, '2024_03_01_055505_create_sales_payments_table', 11),
(70, '2024_03_01_081714_add_salespayment_revenues_table', 12),
(71, '2024_03_01_084130_create_cheque_received_table', 13),
(72, '2024_03_01_094750_add_payment_status_sales_table', 14),
(73, '2024_03_28_062950_add_stock_id_sales_product_table', 15),
(74, '2024_04_02_051330_create_users_profile_photos_table', 16),
(77, '2024_04_12_114856_create_currencies_table', 17),
(78, '2024_04_12_115708_add_currency_info_companies_table', 18),
(80, '2024_04_26_065519_add_dateformat_companies_table', 19),
(82, '2024_05_06_064928_create_commpany_settings_table', 20),
(83, '2024_05_07_092850_add_ref_no_sales_payments_table', 21),
(84, '2024_05_08_055315_add_ref_no_purchase_payments_table', 22),
(85, '2024_05_08_080855_add_ref_no_expenses_table', 23),
(86, '2024_05_09_060310_add_ref_no_revenue_table', 24),
(87, '2024_05_24_092758_add_cost_price_sales_products_table', 25),
(90, '2024_08_21_063158_create_wip_table', 26),
(91, '2024_08_27_110958_create_wip_attachments_table', 27),
(92, '2024_08_30_054027_create_purchase_order_table', 28),
(93, '2024_09_02_071145_create_purchase_order_products_table', 29),
(94, '2024_09_06_051353_create_purchase_order_attachments', 30),
(95, '2024_09_06_071721_add_part_no_products_table', 31),
(100, '2024_09_11_085424_create_wip_parts_received_table', 32),
(101, '2024_09_11_102731_create_wip_stock_table', 32),
(102, '2024_09_18_045952_create_wip_parts_received_attachments_table', 33),
(104, '2024_09_30_062342_create_employees_table', 34),
(105, '2024_10_03_043515_create_vehicle_reg_no_table', 35),
(106, '2024_10_03_044641_add_vehicle_reg_wip_table', 36),
(107, '2024_10_04_053558_add_note_wip_stock_table', 37),
(108, '2024_10_07_105600_add_receive_note_wip_stock_table', 38),
(109, '2024_10_09_063400_add_company_name_customers_table', 39),
(111, '2024_10_17_064133_add_finalize_purchase_order_table', 40),
(113, '2024_10_21_094701_create_wip_hand_over_table', 41),
(114, '2024_11_05_061216_create_wip_notes_table', 42),
(115, '2024_11_07_065331_create_wip_return_table', 43),
(116, '2024_11_11_070325_create_stock_transfer_source_table', 44),
(117, '2024_11_11_080212_create_stock_transfer_table', 45),
(118, '2024_11_12_110024_create_stock_transfer_products', 46),
(119, '2024_11_20_061426_add_account_no_supplier_table', 47),
(120, '2024_11_22_103239_add_transfer_id_purchase_products', 48),
(121, '2024_11_22_105647_add_transfer_id_wip_parts_received_table', 49),
(122, '2024_11_25_092333_add_stock_id_transfer_products_table', 50),
(129, '2024_12_02_092543_create_purchase_return_table', 51),
(130, '2024_12_02_095854_create_purchase_return_products', 51),
(131, '2024_12_05_061603_create_purchase_return_attachments', 52),
(133, '2025_01_18_071430_add_customer_id_customers_table', 53),
(134, '2025_01_20_052444_create_make_model_table', 54),
(135, '2025_01_20_104455_create_product_make_model_table', 55),
(136, '2025_01_24_101416_add_location_products_table', 56),
(137, '2025_01_28_062952_create_disposed_type_table', 57),
(138, '2025_01_28_063219_create_disposed_products_table', 57),
(139, '2025_01_30_082526_add_order_id_purchase_table', 58),
(140, '2025_01_30_124930_add_note_date_purchase_products_table', 59);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_by` enum('Admins','Users','All') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `access_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admins', 'Admins', 1, NULL, NULL),
(2, 'Users', 'All', 1, NULL, NULL),
(3, 'Companies', 'Admins', 1, NULL, NULL),
(4, 'Suppliers', 'Users', 1, NULL, NULL),
(5, 'Customers', 'Users', 1, NULL, NULL),
(6, 'Products', 'Users', 1, NULL, NULL),
(7, 'Purchases', 'Users', 1, NULL, NULL),
(8, 'Purchase Payment', 'Users', 1, NULL, NULL),
(9, 'Sales', 'Users', 1, NULL, NULL),
(10, 'Sales Payment', 'Users', 1, NULL, NULL),
(11, 'Expenses', 'Users', 1, NULL, NULL),
(12, 'Revenues', 'Users', 1, NULL, NULL),
(13, 'Vouchers', 'Users', 1, NULL, NULL),
(14, 'Cheques', 'Users', 1, NULL, NULL),
(15, 'Reports', 'Users', 1, NULL, NULL),
(16, 'Logs', 'Users', 1, NULL, NULL),
(17, 'Stock Count', 'Users', 1, NULL, NULL),
(18, 'Imports', 'Users', 1, NULL, NULL),
(19, 'Wip', 'Users', 1, NULL, NULL),
(20, 'Employees', 'Users', 1, NULL, NULL),
(21, 'Stock Transfer', 'Users', 1, NULL, NULL),
(22, 'Stock', 'Users', 1, NULL, NULL),
(23, 'Purchase Return', 'Users', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modules_sub`
--

CREATE TABLE `modules_sub` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `sub_module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules_sub`
--

INSERT INTO `modules_sub` (`id`, `module_id`, `sub_module_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'View', 1, NULL, NULL),
(2, 1, 'Write', 1, NULL, NULL),
(3, 1, 'Delete', 1, NULL, NULL),
(4, 1, 'SetPermission', 1, NULL, NULL),
(5, 2, 'View', 1, NULL, NULL),
(6, 2, 'Write', 1, NULL, NULL),
(7, 2, 'Delete', 1, NULL, NULL),
(8, 2, 'SetPermission', 1, NULL, NULL),
(9, 3, 'View', 1, NULL, NULL),
(10, 3, 'Write', 1, NULL, NULL),
(11, 3, 'Delete', 1, NULL, NULL),
(12, 4, 'View', 1, NULL, NULL),
(13, 4, 'Write', 1, NULL, NULL),
(14, 4, 'Delete', 1, NULL, NULL),
(15, 5, 'View', 1, NULL, NULL),
(16, 5, 'Write', 1, NULL, NULL),
(17, 5, 'Delete', 1, NULL, NULL),
(18, 6, 'View', 1, NULL, NULL),
(19, 6, 'Write', 1, NULL, NULL),
(20, 6, 'Delete', 1, NULL, NULL),
(21, 7, 'View', 1, NULL, NULL),
(22, 7, 'Write', 1, NULL, NULL),
(23, 7, 'Delete', 1, NULL, NULL),
(24, 8, 'View', 1, NULL, NULL),
(25, 8, 'Write', 1, NULL, NULL),
(26, 8, 'Delete', 1, NULL, NULL),
(27, 9, 'View', 1, NULL, NULL),
(28, 9, 'Write', 1, NULL, NULL),
(29, 9, 'Delete', 1, NULL, NULL),
(30, 10, 'View', 1, NULL, NULL),
(31, 10, 'Write', 1, NULL, NULL),
(32, 10, 'Delete', 1, NULL, NULL),
(33, 11, 'View', 1, NULL, NULL),
(34, 11, 'Write', 1, NULL, NULL),
(35, 11, 'Delete', 1, NULL, NULL),
(36, 12, 'View', 1, NULL, NULL),
(37, 12, 'Write', 1, NULL, NULL),
(38, 12, 'Delete', 1, NULL, NULL),
(39, 13, 'View', 1, NULL, NULL),
(40, 13, 'Write', 1, NULL, NULL),
(41, 13, 'Delete', 1, NULL, NULL),
(42, 14, 'View', 1, NULL, NULL),
(43, 14, 'Write', 1, NULL, NULL),
(44, 14, 'Delete', 1, NULL, NULL),
(45, 15, 'StockReport', 1, NULL, NULL),
(46, 15, 'FrequentlySales', 1, NULL, NULL),
(47, 15, 'FrequentlyPurchase', 1, NULL, NULL),
(48, 15, 'SalesSummaryReport', 1, NULL, NULL),
(49, 16, 'View', 1, NULL, NULL),
(50, 17, 'View', 1, NULL, NULL),
(51, 17, 'Write', 1, NULL, NULL),
(52, 17, 'Delete', 1, NULL, NULL),
(53, 18, 'Products', 1, NULL, NULL),
(54, 18, 'Customers', 1, NULL, NULL),
(55, 18, 'Suppliers', 1, NULL, NULL),
(56, 19, 'View', 1, NULL, NULL),
(57, 19, 'Write', 1, NULL, NULL),
(58, 19, 'Delete', 1, NULL, NULL),
(59, 20, 'View', 1, NULL, NULL),
(60, 20, 'Write', 1, NULL, NULL),
(61, 20, 'Delete', 1, NULL, NULL),
(62, 21, 'View', 1, NULL, NULL),
(63, 21, 'Write', 1, NULL, NULL),
(64, 21, 'Delete', 1, NULL, NULL),
(65, 22, 'View', 1, NULL, NULL),
(66, 23, 'View', 1, NULL, NULL),
(67, 23, 'Write', 1, NULL, NULL),
(68, 23, 'Delete', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `method_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bar_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productcategory_id` bigint(20) UNSIGNED NOT NULL,
  `units_in_case` double(8,2) NOT NULL,
  `alert_qty` double(8,2) DEFAULT NULL,
  `units_type` bigint(20) UNSIGNED NOT NULL,
  `price_type` tinyint(1) NOT NULL DEFAULT 0,
  `profit_margin` double(8,2) NOT NULL,
  `cost_price` double(10,2) NOT NULL,
  `sale_price` double(10,2) DEFAULT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) DEFAULT 0.00,
  `vat_type` tinyint(1) DEFAULT NULL,
  `product_company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brands_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_companies`
--

CREATE TABLE `product_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companies_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_language`
--

CREATE TABLE `product_language` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_make_model`
--

CREATE TABLE `product_make_model` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `make_model_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_make_model`
--

INSERT INTO `product_make_model` (`id`, `product_id`, `make_model_id`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 19, 1, 1, 3, 4, NULL, NULL, NULL),
(2, 5598, 1, 1, 3, 4, '2025-01-23 04:50:00', '2025-01-23 04:50:00', NULL),
(3, 5598, 2, 1, 3, 4, '2025-01-23 04:50:00', '2025-01-23 04:50:00', NULL),
(5, 5573, 2, 1, 3, 4, '2025-01-25 03:59:38', '2025-01-25 03:59:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_multiple_alliance`
--

CREATE TABLE `product_multiple_alliance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units_type` bigint(20) UNSIGNED DEFAULT NULL,
  `barcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` double(8,2) DEFAULT NULL,
  `cost_price` double(10,2) DEFAULT NULL,
  `sale_price` double(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_unit_types`
--

CREATE TABLE `product_unit_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_unit_types`
--

INSERT INTO `product_unit_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', NULL, NULL),
(2, 'Kg', NULL, NULL),
(3, 'g', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grn_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `suppliers_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `purchase_status` tinyint(1) NOT NULL DEFAULT 0,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `grn_no`, `date`, `invoice_no`, `order_id`, `suppliers_id`, `total_amount`, `discount`, `cost`, `purchase_status`, `company_id`, `branch_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 'AGSP2', '2025-01-30 09:48:00', 'etf753', 14, 9, '67.03', '0.00', '0.00', 1, 3, 4, 1, '2025-01-30 04:18:48', '2025-01-30 07:28:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transfer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units` double(8,2) NOT NULL,
  `free` double(8,2) NOT NULL DEFAULT 0.00,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mrp` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `expiry_status` tinyint(1) NOT NULL DEFAULT 0,
  `price_status` tinyint(1) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_attachments`
--

CREATE TABLE `purchase_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` double(10,2) DEFAULT NULL,
  `thumbnail_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `suppliers_id` bigint(20) UNSIGNED NOT NULL,
  `wip_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `finalize` tinyint(1) NOT NULL DEFAULT 0,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_attachments`
--

CREATE TABLE `purchase_order_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` double(10,2) DEFAULT NULL,
  `thumbnail_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_products`
--

CREATE TABLE `purchase_order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units` double(8,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mrp` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_payments`
--

CREATE TABLE `purchase_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return`
--

CREATE TABLE `purchase_return` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `return_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suppliers_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_attachments`
--

CREATE TABLE `purchase_return_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_return_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` double(10,2) DEFAULT NULL,
  `thumbnail_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_return_products`
--

CREATE TABLE `purchase_return_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_return_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units` double(8,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mrp` decimal(10,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `card_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_date` datetime NOT NULL,
  `credit_date` datetime DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_status` tinyint(4) NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `discount_type` tinyint(1) NOT NULL DEFAULT 0,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `rtn_bill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_payments`
--

CREATE TABLE `sales_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` double(8,2) NOT NULL,
  `cost_price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) DEFAULT 0.00,
  `reusable` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=uncheck,1=reuse,2=damage',
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_count`
--

CREATE TABLE `stock_count` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_count_products`
--

CREATE TABLE `stock_count_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stock_count_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units` double(8,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mrp` decimal(10,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `expiry_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer`
--

CREATE TABLE `stock_transfer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transfer_date` datetime NOT NULL,
  `transfer_source` bigint(20) UNSIGNED NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_transfer`
--

INSERT INTO `stock_transfer` (`id`, `ref_no`, `transfer_date`, `transfer_source`, `from_id`, `to_id`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '2024-11-22 00:00:00', 2, 3, NULL, 1, 3, 4, '2024-11-22 06:08:14', '2024-11-22 06:08:14', NULL),
(2, '2', '2024-11-25 00:00:00', 2, 3, NULL, 1, 3, 4, '2024-11-25 05:13:39', '2024-11-25 05:13:39', NULL),
(3, '3', '2024-11-26 00:00:00', 3, NULL, 4, 1, 3, 4, '2024-11-26 02:06:56', '2024-11-26 02:06:56', NULL),
(4, '4', '2024-11-26 00:00:00', 3, NULL, 4, 1, 3, 4, '2024-11-26 02:23:39', '2024-11-26 02:23:39', NULL),
(5, '5', '2024-11-26 00:00:00', 3, NULL, 4, 1, 3, 4, '2024-11-26 02:25:46', '2024-11-26 02:25:46', NULL),
(6, '6', '2024-11-26 00:00:00', 3, NULL, 4, 1, 3, 4, '2024-11-26 03:18:15', '2024-11-26 03:18:15', NULL),
(7, '7', '2024-11-26 00:00:00', 3, NULL, 4, 1, 3, 4, '2024-11-26 03:21:44', '2024-11-26 03:21:44', NULL),
(8, '8', '2024-12-02 10:47:00', 3, NULL, 4, 1, 3, 4, '2024-12-01 23:49:07', '2024-12-01 23:49:07', NULL),
(9, '9', '2024-12-02 10:50:00', 2, 4, NULL, 1, 3, 4, '2024-12-01 23:50:33', '2024-12-01 23:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer_products`
--

CREATE TABLE `stock_transfer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transfer_id` bigint(20) UNSIGNED NOT NULL,
  `wip_stock_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units` double(8,2) NOT NULL,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mrp` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_transfer_products`
--

INSERT INTO `stock_transfer_products` (`id`, `transfer_id`, `wip_stock_id`, `product_id`, `units`, `cost_price`, `sale_price`, `mrp`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 13, 20, 1.00, '200.00', '250.00', '250.00', 1, 3, 4, '2024-11-22 06:08:14', '2024-11-22 06:08:14', NULL),
(2, 2, 12, 19, 1.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-11-25 05:13:39', '2024-11-25 05:13:39', NULL),
(3, 2, 14, 19, 1.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-11-25 05:13:39', '2024-11-25 05:13:39', NULL),
(4, 5, NULL, 19, 1.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-11-26 02:25:46', '2024-11-26 02:25:46', NULL),
(5, 6, NULL, 19, 1.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-11-26 03:18:15', '2024-11-26 03:18:15', NULL),
(6, 7, NULL, 19, 1.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-11-26 03:21:44', '2024-11-26 03:21:44', NULL),
(7, 8, NULL, 19, 19.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-12-01 23:49:07', '2024-12-01 23:49:07', NULL),
(8, 9, 20, 19, 19.00, '200.00', '300.00', '300.00', 1, 3, 4, '2024-12-01 23:50:33', '2024-12-01 23:50:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_transfer_source`
--

CREATE TABLE `stock_transfer_source` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `source_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_transfer_source`
--

INSERT INTO `stock_transfer_source` (`id`, `source_name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Branch To Branch', 0, NULL, NULL, NULL),
(2, 'Wip To Stock', 1, NULL, NULL, NULL),
(3, 'Stock To Wip', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt_phone_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_limit` double(8,2) NOT NULL DEFAULT 0.00,
  `shipping_building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suppliers_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `dealer_name`, `account_no`, `phone_no`, `alt_phone_no`, `email`, `credit_limit`, `shipping_building_no`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_zipcode`, `tax_no`, `pay_term`, `pay_type`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `suppliers_status`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'company 01', 'Adam', NULL, '+94 756440869', '+44', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', 'Months', NULL, NULL, 'Jaffna', NULL, 'Sri Lanka', NULL, 1, 1, 1, '2023-06-05 01:53:19', '2024-05-15 23:29:09', NULL),
(2, 'Company 2', 'Deal 2', NULL, '48964986544', '', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2023-06-28 23:29:30', '2023-06-28 23:29:30', NULL),
(3, 'bcvbxbc', 'cxvbfcgb', NULL, '355964121584', '2566947651269', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Months', NULL, NULL, NULL, NULL, 'Sri Lanka', NULL, 0, 1, 2, '2024-03-01 00:41:52', '2024-03-01 00:41:52', NULL),
(4, 'fdfdfdgdg', 'cxcdgfdgdf', NULL, '6359645417', '253459875214', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Months', NULL, NULL, NULL, NULL, 'Sri Lanka', NULL, 0, 1, 2, '2024-03-04 00:44:29', '2024-03-04 00:44:29', NULL),
(5, 'company 05', 'Kirutthi-Sri', NULL, '3256459754303', '2156484219527', NULL, 15000.00, NULL, NULL, NULL, NULL, NULL, NULL, 'CF0002', '17', 'Months', '15', 'hanana', 'fheyuhf', 'lanju', 'Sri Lanka', '40000', 1, 1, 2, '2024-03-04 01:04:52', '2024-03-04 01:22:49', '2024-03-04 01:22:49'),
(6, 'ABC', 'Asar', NULL, '94776440859', '97845632456', 'abc@mail.com', 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2024-04-26 03:30:08', '2024-04-26 03:30:08', NULL),
(7, 'fhgfhgfhf', 'gfhfghfgh', NULL, '+44 1236547896', '+44', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Months', NULL, NULL, NULL, NULL, 'Sri Lanka', NULL, 0, 1, 2, '2024-05-15 23:32:39', '2024-05-15 23:33:20', '2024-05-15 23:33:20'),
(8, 'ABCD', 'Jons', NULL, '+44 45612331', '+44', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Months', NULL, NULL, NULL, NULL, 'Sri Lanka', NULL, 0, 1, 1, '2024-08-21 05:57:33', '2024-08-21 05:57:33', NULL),
(9, 'Supplier 1', 'SDeard 1', '123456', '94786541236', '+44', NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Months', NULL, NULL, NULL, NULL, 'United Kingdom', NULL, 1, 3, 1, '2024-10-29 00:03:23', '2025-01-18 02:46:13', NULL),
(10, 'tredfg', 'ewsd', NULL, '78945613', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:21', '2025-01-17 01:26:21', NULL),
(11, 'kjrthgklj', 'iru', NULL, '78945614', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:21', '2025-01-17 01:26:21', NULL),
(12, 'ghrihj', 'hmty', NULL, '78945615', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:21', '2025-01-17 01:26:21', NULL),
(13, 'fglhj', 'trinb', NULL, '78945616', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:22', '2025-01-17 01:26:22', NULL),
(14, 'ghg', 'ioern', NULL, '78945617', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:22', '2025-01-17 01:26:22', NULL),
(15, 'nfkhnm', 'ehbnrj', NULL, '78945618', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:22', '2025-01-17 01:26:22', NULL),
(16, 'fnfn', 'rjrnrg', NULL, '78945619', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:22', '2025-01-17 01:26:22', NULL),
(17, 'fgnmfgkl', 'rtnbcv', NULL, '78945620', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:22', '2025-01-17 01:26:22', NULL),
(18, 'fgtiou', 'trhet', NULL, '78945621', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, '2025-01-17 01:26:23', '2025-01-17 01:26:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usercompanies`
--

CREATE TABLE `usercompanies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `default_company` tinyint(1) NOT NULL DEFAULT 0,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usercompanies`
--

INSERT INTO `usercompanies` (`id`, `user_id`, `company_id`, `branch_id`, `default_company`, `permissions`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 1, '{\"chequesView\":\"on\",\"chequesWrite\":\"on\",\"chequesDelete\":\"on\",\"customersView\":\"on\",\"customersWrite\":\"on\",\"customersDelete\":\"on\",\"employeesView\":\"on\",\"employeesWrite\":\"on\",\"employeesDelete\":\"on\",\"expensesView\":\"on\",\"expensesWrite\":\"on\",\"expensesDelete\":\"on\",\"logsView\":\"on\",\"productsView\":\"on\",\"productsWrite\":\"on\",\"productsDelete\":\"on\",\"purchase_paymentView\":\"on\",\"purchase_paymentWrite\":\"on\",\"purchase_paymentDelete\":\"on\",\"purchasesView\":\"on\",\"purchasesWrite\":\"on\",\"purchasesDelete\":\"on\",\"reportsStockReport\":\"on\",\"reportsFrequentlySales\":\"on\",\"reportsFrequentlyPurchase\":\"on\",\"reportsSalesSummaryReport\":\"on\",\"revenuesView\":\"on\",\"revenuesWrite\":\"on\",\"revenuesDelete\":\"on\",\"salesView\":\"on\",\"salesWrite\":\"on\",\"salesDelete\":\"on\",\"sales_paymentView\":\"on\",\"sales_paymentWrite\":\"on\",\"sales_paymentDelete\":\"on\",\"stock_countView\":\"on\",\"stock_countWrite\":\"on\",\"stock_countDelete\":\"on\",\"suppliersView\":\"on\",\"suppliersWrite\":\"on\",\"suppliersDelete\":\"on\",\"usersView\":\"on\",\"usersWrite\":\"on\",\"usersDelete\":\"on\",\"usersSetPermission\":\"on\",\"vouchersView\":\"on\",\"vouchersWrite\":\"on\",\"vouchersDelete\":\"on\",\"wipView\":\"on\",\"wipWrite\":\"on\",\"wipDelete\":\"on\"}', 1, '2023-06-01 02:02:26', '2025-01-21 00:29:31', NULL),
(2, 1, 1, 2, 0, NULL, 0, '2023-06-01 02:04:06', '2023-06-01 02:04:12', NULL),
(3, 2, 1, 1, 1, '{\"suppliersView\":\"on\",\"suppliersWrite\":\"on\",\"suppliersDelete\":\"on\",\"customersView\":\"on\",\"customersWrite\":\"on\",\"customersDelete\":\"on\",\"productsView\":\"on\",\"productsWrite\":\"on\",\"productsDelete\":\"on\",\"purchasesView\":\"on\",\"purchasesWrite\":\"on\",\"purchasesDelete\":\"on\",\"purchase_paymentView\":\"on\",\"purchase_paymentWrite\":\"on\",\"purchase_paymentDelete\":\"on\",\"salesView\":\"on\",\"salesWrite\":\"on\",\"salesDelete\":\"on\",\"sales_paymentView\":\"on\",\"sales_paymentWrite\":\"on\",\"sales_paymentDelete\":\"on\",\"expensesView\":\"on\",\"expensesWrite\":\"on\",\"expensesDelete\":\"on\",\"revenuesView\":\"on\",\"revenuesWrite\":\"on\",\"revenuesDelete\":\"on\",\"vouchersView\":\"on\",\"vouchersWrite\":\"on\",\"vouchersDelete\":\"on\",\"chequesView\":\"on\",\"chequesWrite\":\"on\",\"chequesDelete\":\"on\",\"reportsStockReport\":\"on\",\"reportsFrequentlySales\":\"on\",\"reportsFrequentlyPurchase\":\"on\",\"reportsSalesSummaryReport\":\"on\",\"stock_countView\":\"on\",\"stock_countWrite\":\"on\",\"stock_countDelete\":\"on\"}', 1, '2023-06-01 02:54:22', '2024-05-23 23:31:08', NULL),
(4, 3, 2, 3, 0, NULL, 1, '2024-03-14 06:14:10', '2024-03-14 06:14:10', NULL),
(6, 4, 1, 1, 0, '{\"suppliersView\":\"on\",\"suppliersWrite\":\"on\",\"suppliersDelete\":\"on\",\"customersView\":\"on\",\"customersWrite\":\"on\",\"customersDelete\":\"on\",\"productsView\":\"on\",\"productsWrite\":\"on\",\"productsDelete\":\"on\",\"purchasesView\":\"on\",\"purchasesWrite\":\"on\",\"purchasesDelete\":\"on\",\"purchase_paymentView\":\"on\",\"purchase_paymentWrite\":\"on\",\"purchase_paymentDelete\":\"on\",\"salesView\":\"on\",\"salesWrite\":\"on\",\"salesDelete\":\"on\",\"sales_paymentView\":\"on\",\"sales_paymentWrite\":\"on\",\"sales_paymentDelete\":\"on\",\"reportsStockReport\":\"on\"}', 1, '2024-05-20 05:39:28', '2024-05-20 05:40:55', NULL),
(7, 5, 1, 1, 0, NULL, 1, '2024-05-28 23:58:55', '2024-05-28 23:58:55', NULL),
(8, 6, 1, 1, 0, '{\"usersView\":\"on\",\"usersWrite\":\"on\",\"usersDelete\":\"on\",\"usersSetPermission\":\"on\",\"suppliersView\":\"on\",\"suppliersWrite\":\"on\",\"suppliersDelete\":\"on\",\"customersView\":\"on\",\"customersWrite\":\"on\",\"customersDelete\":\"on\",\"productsView\":\"on\",\"productsWrite\":\"on\",\"productsDelete\":\"on\",\"purchasesView\":\"on\",\"purchasesWrite\":\"on\",\"purchasesDelete\":\"on\",\"purchase_paymentView\":\"on\",\"purchase_paymentWrite\":\"on\",\"purchase_paymentDelete\":\"on\",\"salesView\":\"on\",\"salesWrite\":\"on\",\"salesDelete\":\"on\",\"sales_paymentView\":\"on\",\"sales_paymentWrite\":\"on\",\"sales_paymentDelete\":\"on\",\"expensesView\":\"on\",\"expensesWrite\":\"on\",\"expensesDelete\":\"on\",\"revenuesView\":\"on\",\"revenuesWrite\":\"on\",\"revenuesDelete\":\"on\",\"vouchersView\":\"on\",\"vouchersWrite\":\"on\",\"vouchersDelete\":\"on\",\"chequesView\":\"on\",\"chequesWrite\":\"on\",\"chequesDelete\":\"on\",\"reportsStockReport\":\"on\",\"reportsFrequentlySales\":\"on\",\"reportsFrequentlyPurchase\":\"on\",\"reportsSalesSummaryReport\":\"on\",\"logsView\":\"on\",\"stock_countView\":\"on\",\"stock_countWrite\":\"on\",\"stock_countDelete\":\"on\",\"importsProducts\":\"on\",\"importsCustomers\":\"on\",\"importsSuppliers\":\"on\",\"wipView\":\"on\",\"wipWrite\":\"on\",\"wipDelete\":\"on\"}', 1, '2024-05-29 00:20:16', '2024-10-09 01:44:34', NULL),
(9, 7, 1, 1, 0, NULL, 1, '2024-05-29 00:21:24', '2024-05-29 00:21:24', NULL),
(10, 8, 1, 1, 0, NULL, 1, '2024-05-29 00:23:23', '2024-05-29 00:23:23', NULL),
(11, 1, 3, 4, 0, '{\"usersView\":\"on\",\"usersWrite\":\"on\",\"usersDelete\":\"on\",\"usersSetPermission\":\"on\",\"suppliersView\":\"on\",\"suppliersWrite\":\"on\",\"suppliersDelete\":\"on\",\"customersView\":\"on\",\"customersWrite\":\"on\",\"customersDelete\":\"on\",\"productsView\":\"on\",\"productsWrite\":\"on\",\"productsDelete\":\"on\",\"purchasesView\":\"on\",\"purchasesWrite\":\"on\",\"purchasesDelete\":\"on\",\"purchase_paymentView\":\"on\",\"purchase_paymentWrite\":\"on\",\"purchase_paymentDelete\":\"on\",\"salesView\":\"on\",\"salesWrite\":\"on\",\"salesDelete\":\"on\",\"sales_paymentView\":\"on\",\"sales_paymentWrite\":\"on\",\"sales_paymentDelete\":\"on\",\"expensesView\":\"on\",\"expensesWrite\":\"on\",\"expensesDelete\":\"on\",\"revenuesView\":\"on\",\"revenuesWrite\":\"on\",\"revenuesDelete\":\"on\",\"vouchersView\":\"on\",\"vouchersWrite\":\"on\",\"vouchersDelete\":\"on\",\"chequesView\":\"on\",\"chequesWrite\":\"on\",\"chequesDelete\":\"on\",\"reportsStockReport\":\"on\",\"reportsFrequentlySales\":\"on\",\"reportsFrequentlyPurchase\":\"on\",\"reportsSalesSummaryReport\":\"on\",\"logsView\":\"on\",\"stock_countView\":\"on\",\"stock_countWrite\":\"on\",\"stock_countDelete\":\"on\",\"importsProducts\":\"on\",\"importsCustomers\":\"on\",\"importsSuppliers\":\"on\",\"wipView\":\"on\",\"wipWrite\":\"on\",\"wipDelete\":\"on\",\"employeesView\":\"on\",\"employeesWrite\":\"on\",\"employeesDelete\":\"on\",\"stock_transferView\":\"on\",\"stock_transferWrite\":\"on\",\"stock_transferDelete\":\"on\",\"stockView\":\"on\",\"purchase_returnView\":\"on\",\"purchase_returnWrite\":\"on\",\"purchase_returnDelete\":\"on\"}', 1, '2024-10-28 05:34:57', '2024-12-04 23:26:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `phone_no`, `email`, `email_verified_at`, `user_name`, `password`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `role_id`, `status`, `token`, `last_login`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr', 'Admin', '', '+94 755555555', 'admin@mail.com', NULL, 'admin', '$2y$10$s5ApU7OMhJDfQGaY9o54tuYDYCyzH.wBoLF64fiVU9o0kEM1zZHMa', NULL, 'xyz', 'xyz', 'xyz', 'xyz', NULL, 1, 1, 'eyJpdiI6InpxTlNUNWVlL21XcGV3L3VvdVNlRHc9PSIsInZhbHVlIjoiYnNMNVBVVzNkck1uMlpJejdaN3VsTzlmekhIN0JJUXBlOGhPejlRWWhZb3lPanBtOGZrazlQUDdNUytVSTVadiIsIm1hYyI6ImE0YzBmYTkxMmZhMWI2ZjE0NGQ3MzZkNTE0ZWM5NmZiYjJiMDcxOWIzOTk3NzIyYTM0N2EzZDc5YzBhZjJiMzIiLCJ0YWciOiIifQ==', '2025-01-31 04:36:16', NULL, '2023-06-01 01:58:37', '2025-01-30 23:06:16', NULL),
(2, 'Mr', 'Brain', 'Adam', '+94 751122333', 'email@mail.com', NULL, 'adam', '$2y$10$gG90eLRg41zPFSlh9MZyl.OZIPGaXIADhkhEn2pyBNHAubWDOAdpO', '15', 'zxcv', 'zxcv', 'zxcv', 'Sri Lanka', NULL, 1, 1, 'eyJpdiI6IklYUUZCWTV2am9TbnNVT0FFeTZjT1E9PSIsInZhbHVlIjoiYUNFcEV0N1JGenZ1aVZ5QXI2UncxUVY0VzBMRUk0L2JpZk1GZUFseFMremZGZ21HK3NEMVRTQXMzekRZRncvWSIsIm1hYyI6ImQ5ZTFiN2RkYzBlNDQ4YTU5ZWJhNDY5NDRiNzhjODY0YTEwMzIyYTIzYWFiMGI2ZTg2Yzg5NzNmMjI0YmQ2ODMiLCJ0YWciOiIifQ==', '2024-12-02 07:34:24', NULL, '2023-06-01 02:54:09', '2024-12-02 02:04:24', NULL),
(3, 'Mr', 'Arun', 'Prasath', '4879797987979', 'arun@ownmake.co.uk', NULL, 'arun', '$2y$10$qbiDQV4Xtx1abcupiND.FuEGflZdvKSAew0AlVsZaDGDdAxuYbsX.', NULL, 'Uk', 'Uk', 'uk', 'United Kingdom', NULL, 1, 1, 'eyJpdiI6InRqMGpCWW1GcGZPNFA5TGVvU2ZJOFE9PSIsInZhbHVlIjoiRU4rclVPQ2FWNVJhc3VIUmhLbnhMOGJ3Vlh5SmxQK3hNeU9NVmVsaXI5L3ltb1NjK2EvRGxMNzBkdUQzVk5lbiIsIm1hYyI6ImU5M2QwNWY1ZDFhZDc4MTQ5MDE1ZjE1ZmE5MGE0ZTZhOGVlZjFhNjVjZjUwNWJjZTc5OTFmYWUzN2NiMmJkYmYiLCJ0YWciOiIifQ==', '2024-04-17 07:47:47', NULL, '2024-03-14 06:13:52', '2024-04-17 02:17:47', NULL),
(4, 'Mr', 'Ravi', 'Varman', '+94 789456123', 'varman@mail.com', NULL, 'varman', '$2y$10$e6DqbeNpSacrhUdN3js/d.8VE5AfR.tq9LYZp206lbay0oyh9fKmW', NULL, 'asdfg', 'edrf', 'dfgt', 'Sri Lanka', NULL, 2, 1, 'eyJpdiI6InpHbDR0c3dHRStiK0RCQlE1eTlSYWc9PSIsInZhbHVlIjoiRVZpOFFCL28vdTB4QXN6cXQ0RTU0K1BVak4wSzJ2ckIwUWlLL0QwbzBIL0MwWlJua3EwLy9HOEpwdWZ5UUxudSIsIm1hYyI6ImViM2E4MmMwYjk5YWNjZDBiNjFlM2NhMDUwZGYwNzM4ZDI1MGUzZmYzZTkwN2YzNGVhOTYyNWQzNGFmZWFjOWEiLCJ0YWciOiIifQ==', '2024-05-21 04:51:39', NULL, '2024-05-20 05:39:28', '2024-05-20 23:21:39', NULL),
(5, 'Mr', 'Rajarathinam', 'V', '+94 789456213', 'email@mail.com', NULL, 'raja', '$2y$10$b5KYbSuE4KWdihfMJ5rE5.ci9t8i2JPeOYdWAwCMSJI9rZJvogu6q', '12', 'trgf', 'gffs', 'tgrwfed', 'Sri Lanka', '40000', 2, 1, NULL, NULL, NULL, '2024-05-28 23:58:55', '2024-05-28 23:58:55', NULL),
(6, 'Miss', 'Kirutthi', 'S', '+94 789456498', 'email@mail.com', NULL, 'kirutthi', '$2y$10$U.kAD.QurVm8jcuRiUcMneCY.jlCiT8KuoaCpaxt1v0ooccqO9uLe', NULL, 'dfgd', 'fgdf', 'dfgdf', 'Sri Lanka', NULL, 1, 1, 'eyJpdiI6IlFrWFhDNklPMGFTczNDRUdwWmRDRHc9PSIsInZhbHVlIjoiaTlqZVp3UEhBeEJnM2V5Q0pacWRlSUdURFBzWEZGbm5JZFYwc2hFQ0NhL1VtV3pJbXdzY3crZnJuQWE4U2pOTCIsIm1hYyI6Ijg3NWVjMjg5OWU5MWJmYTBjMGQ2OGQxMjVmZmU3ZThhMDYxZjk3MWJmZGIyNzkxZTUyZTIyODVhYzYxY2E1NTQiLCJ0YWciOiIifQ==', '2024-11-21 05:45:28', NULL, '2024-05-29 00:20:16', '2024-11-21 00:15:28', NULL),
(7, 'Mr', 'Siva', 'Luxmy', '+44 789498793', 'email@mail.com', NULL, 'luxmy', '$2y$10$NVijkIv12HzGAlyeSwixbODMEMIAItP98zrI69u8QC3bURmZXf1CG', NULL, 'thttg', 'fghtr', 'fghrt', 'Sri Lanka', NULL, 2, 1, NULL, NULL, NULL, '2024-05-29 00:21:24', '2024-05-29 00:53:24', NULL),
(8, 'Mr', 'sinthu', 's', '+94', 'email@mail.com', NULL, 'sinthu', '$2y$10$u53dTgjDsu3Ev/ABAdzHj.6PFDTeWXWLu3vi4NuxU5d/fdyEX05ee', NULL, 'sdfgtred', 'dfgfds', 'sdfsd', 'Sri Lanka', NULL, 2, 1, NULL, NULL, NULL, '2024-05-29 00:23:23', '2024-05-29 00:23:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile_photos`
--

CREATE TABLE `users_profile_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_profile_photos`
--

INSERT INTO `users_profile_photos` (`id`, `user_id`, `name`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'download (5).jpg', 'uploads/users/1712043228_OwnMake_download (5).jpg', '2024-04-02 02:03:48', '2024-04-02 02:03:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`, `permissions`) VALUES
(1, 'Admin', NULL),
(2, 'Manager', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `expiry_on` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `issue_date` date NOT NULL,
  `issue_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `serial_no`, `amount`, `expiry_on`, `status`, `issue_date`, `issue_to`, `issue_id`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '10988', '2000.00', '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(2, '962929', '2000.00', '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(3, '647393', '2000.00', '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(4, '330614', '2000.00', '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(5, '513362', '2000.00', '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(6, '216742', '1000.00', '2024-07-31', 0, '2024-05-30', 'v_sale', 2, 1, 1, 1, '2024-05-30 03:45:39', '2024-05-30 03:45:39', NULL),
(7, '310399', '1000.00', '2024-07-31', 0, '2024-05-30', 'v_sale', 2, 1, 1, 1, '2024-05-30 03:45:39', '2024-05-30 03:45:39', NULL),
(8, '684123', '2000.00', '2024-08-01', 0, '2024-05-30', 'v_sale', 3, 1, 1, 1, '2024-05-30 03:48:19', '2024-05-30 03:48:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_payments`
--

CREATE TABLE `voucher_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_date` datetime NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `revenue_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_created_by_foreign` (`created_by`),
  ADD KEY `activity_log_company_id_foreign` (`company_id`),
  ADD KEY `activity_log_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_user_name_unique` (`user_name`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_branches_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_company_id_foreign` (`company_id`);

--
-- Indexes for table `cheque_issued`
--
ALTER TABLE `cheque_issued`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheque_issued_company_bank_id_foreign` (`company_bank_id`),
  ADD KEY `cheque_issued_created_by_foreign` (`created_by`),
  ADD KEY `cheque_issued_company_id_foreign` (`company_id`),
  ADD KEY `cheque_issued_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `cheque_received`
--
ALTER TABLE `cheque_received`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cheque_received_bank_id_foreign` (`bank_id`),
  ADD KEY `cheque_received_created_by_foreign` (`created_by`),
  ADD KEY `cheque_received_company_id_foreign` (`company_id`),
  ADD KEY `cheque_received_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `company_bank_info`
--
ALTER TABLE `company_bank_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_bank_info_bank_id_foreign` (`bank_id`),
  ADD KEY `company_bank_info_bank_branch_id_foreign` (`bank_branch_id`),
  ADD KEY `company_bank_info_created_by_foreign` (`created_by`),
  ADD KEY `company_bank_info_company_id_foreign` (`company_id`),
  ADD KEY `company_bank_info_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_settings_company_id_foreign` (`company_id`),
  ADD KEY `company_settings_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_created_by_foreign` (`created_by`),
  ADD KEY `customers_company_id_foreign` (`company_id`);

--
-- Indexes for table `disposed_products`
--
ALTER TABLE `disposed_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposed_products_disposed_type_foreign` (`disposed_type`),
  ADD KEY `disposed_products_product_id_foreign` (`product_id`),
  ADD KEY `disposed_products_created_by_foreign` (`created_by`),
  ADD KEY `disposed_products_company_id_foreign` (`company_id`),
  ADD KEY `disposed_products_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `disposed_type`
--
ALTER TABLE `disposed_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposed_type_created_by_foreign` (`created_by`),
  ADD KEY `disposed_type_company_id_foreign` (`company_id`),
  ADD KEY `disposed_type_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_created_by_foreign` (`created_by`),
  ADD KEY `employees_company_id_foreign` (`company_id`),
  ADD KEY `employees_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_payment_method_foreign` (`payment_method`),
  ADD KEY `expenses_payment_type_foreign` (`payment_type`),
  ADD KEY `expenses_created_by_foreign` (`created_by`),
  ADD KEY `expenses_company_id_foreign` (`company_id`),
  ADD KEY `expenses_branch_id_foreign` (`branch_id`),
  ADD KEY `expenses_purchase_payment_id_foreign` (`purchase_payment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_created_by_foreign` (`created_by`),
  ADD KEY `languages_company_id_foreign` (`company_id`),
  ADD KEY `languages_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `make_model`
--
ALTER TABLE `make_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `make_model_created_by_foreign` (`created_by`),
  ADD KEY `make_model_company_id_foreign` (`company_id`),
  ADD KEY `make_model_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules_sub`
--
ALTER TABLE `modules_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modules_sub_module_id_foreign` (`module_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_methods_created_by_foreign` (`created_by`),
  ADD KEY `payment_methods_company_id_foreign` (`company_id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_types_created_by_foreign` (`created_by`),
  ADD KEY `payment_types_company_id_foreign` (`company_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_company_id_foreign` (`company_id`),
  ADD KEY `products_productcategory_id_foreign` (`productcategory_id`),
  ADD KEY `products_units_type_foreign` (`units_type`),
  ADD KEY `products_product_company_id_foreign` (`product_company_id`),
  ADD KEY `products_product_brand_id_foreign` (`product_brand_id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_brands_created_by_foreign` (`created_by`),
  ADD KEY `product_brands_company_id_foreign` (`company_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_created_by_foreign` (`created_by`),
  ADD KEY `product_categories_company_id_foreign` (`company_id`);

--
-- Indexes for table `product_companies`
--
ALTER TABLE `product_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_companies_created_by_foreign` (`created_by`),
  ADD KEY `product_companies_company_id_foreign` (`company_id`);

--
-- Indexes for table `product_language`
--
ALTER TABLE `product_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_language_product_id_foreign` (`product_id`),
  ADD KEY `product_language_language_id_foreign` (`language_id`),
  ADD KEY `product_language_company_id_foreign` (`company_id`);

--
-- Indexes for table `product_make_model`
--
ALTER TABLE `product_make_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_make_model_product_id_foreign` (`product_id`),
  ADD KEY `product_make_model_make_model_id_foreign` (`make_model_id`),
  ADD KEY `product_make_model_created_by_foreign` (`created_by`),
  ADD KEY `product_make_model_company_id_foreign` (`company_id`),
  ADD KEY `product_make_model_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `product_multiple_alliance`
--
ALTER TABLE `product_multiple_alliance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_multiple_alliance_product_id_foreign` (`product_id`),
  ADD KEY `product_multiple_alliance_units_type_foreign` (`units_type`),
  ADD KEY `product_multiple_alliance_company_id_foreign` (`company_id`);

--
-- Indexes for table `product_unit_types`
--
ALTER TABLE `product_unit_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_created_by_foreign` (`created_by`),
  ADD KEY `purchase_company_id_foreign` (`company_id`),
  ADD KEY `purchase_suppliers_id_foreign` (`suppliers_id`),
  ADD KEY `purchase_branch_id_foreign` (`branch_id`),
  ADD KEY `purchase_order_id_foreign` (`order_id`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchased_products_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchased_products_product_id_foreign` (`product_id`),
  ADD KEY `purchased_products_created_by_foreign` (`created_by`),
  ADD KEY `purchased_products_company_id_foreign` (`company_id`),
  ADD KEY `purchased_products_branch_id_foreign` (`branch_id`),
  ADD KEY `purchased_products_transfer_id_foreign` (`transfer_id`);

--
-- Indexes for table `purchase_attachments`
--
ALTER TABLE `purchase_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_attachments_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_attachments_created_by_foreign` (`created_by`),
  ADD KEY `purchase_attachments_company_id_foreign` (`company_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_created_by_foreign` (`created_by`),
  ADD KEY `purchase_order_company_id_foreign` (`company_id`),
  ADD KEY `purchase_order_suppliers_id_foreign` (`suppliers_id`),
  ADD KEY `purchase_order_wip_id_foreign` (`wip_id`),
  ADD KEY `purchase_order_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchase_order_attachments`
--
ALTER TABLE `purchase_order_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_attachments_order_id_foreign` (`order_id`),
  ADD KEY `purchase_order_attachments_created_by_foreign` (`created_by`),
  ADD KEY `purchase_order_attachments_company_id_foreign` (`company_id`);

--
-- Indexes for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_order_products_order_id_foreign` (`order_id`),
  ADD KEY `purchase_order_products_product_id_foreign` (`product_id`),
  ADD KEY `purchase_order_products_created_by_foreign` (`created_by`),
  ADD KEY `purchase_order_products_company_id_foreign` (`company_id`),
  ADD KEY `purchase_order_products_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_payments_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchase_payments_payment_method_foreign` (`payment_method`),
  ADD KEY `purchase_payments_created_by_foreign` (`created_by`),
  ADD KEY `purchase_payments_company_id_foreign` (`company_id`),
  ADD KEY `purchase_payments_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchase_return`
--
ALTER TABLE `purchase_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_return_created_by_foreign` (`created_by`),
  ADD KEY `purchase_return_company_id_foreign` (`company_id`),
  ADD KEY `purchase_return_suppliers_id_foreign` (`suppliers_id`),
  ADD KEY `purchase_return_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchase_return_attachments`
--
ALTER TABLE `purchase_return_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_return_attachments_purchase_return_id_foreign` (`purchase_return_id`),
  ADD KEY `purchase_return_attachments_created_by_foreign` (`created_by`),
  ADD KEY `purchase_return_attachments_company_id_foreign` (`company_id`),
  ADD KEY `purchase_return_attachments_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchase_return_products`
--
ALTER TABLE `purchase_return_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_return_products_purchase_return_id_foreign` (`purchase_return_id`),
  ADD KEY `purchase_return_products_product_id_foreign` (`product_id`),
  ADD KEY `purchase_return_products_created_by_foreign` (`created_by`),
  ADD KEY `purchase_return_products_company_id_foreign` (`company_id`),
  ADD KEY `purchase_return_products_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revenues_payment_method_foreign` (`payment_method`),
  ADD KEY `revenues_payment_type_foreign` (`payment_type`),
  ADD KEY `revenues_created_by_foreign` (`created_by`),
  ADD KEY `revenues_company_id_foreign` (`company_id`),
  ADD KEY `revenues_branch_id_foreign` (`branch_id`),
  ADD KEY `revenues_sales_payment_id_foreign` (`sales_payment_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`),
  ADD KEY `sales_created_by_foreign` (`created_by`),
  ADD KEY `sales_company_id_foreign` (`company_id`),
  ADD KEY `sales_branch_id_foreign` (`branch_id`),
  ADD KEY `sales_rtn_bill_id_foreign` (`rtn_bill_id`);

--
-- Indexes for table `sales_payments`
--
ALTER TABLE `sales_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_payments_customer_id_foreign` (`customer_id`),
  ADD KEY `sales_payments_payment_method_foreign` (`payment_method`),
  ADD KEY `sales_payments_created_by_foreign` (`created_by`),
  ADD KEY `sales_payments_company_id_foreign` (`company_id`),
  ADD KEY `sales_payments_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_products_product_id_foreign` (`product_id`),
  ADD KEY `sales_products_sale_id_foreign` (`sale_id`),
  ADD KEY `sales_products_created_by_foreign` (`created_by`),
  ADD KEY `sales_products_company_id_foreign` (`company_id`),
  ADD KEY `sales_products_branch_id_foreign` (`branch_id`),
  ADD KEY `sales_products_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `stock_count`
--
ALTER TABLE `stock_count`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_count_created_by_foreign` (`created_by`),
  ADD KEY `stock_count_company_id_foreign` (`company_id`),
  ADD KEY `stock_count_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `stock_count_products`
--
ALTER TABLE `stock_count_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_count_products_stock_count_id_foreign` (`stock_count_id`),
  ADD KEY `stock_count_products_product_id_foreign` (`product_id`),
  ADD KEY `stock_count_products_created_by_foreign` (`created_by`),
  ADD KEY `stock_count_products_company_id_foreign` (`company_id`),
  ADD KEY `stock_count_products_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `stock_transfer`
--
ALTER TABLE `stock_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_transfer_transfer_source_foreign` (`transfer_source`),
  ADD KEY `stock_transfer_created_by_foreign` (`created_by`),
  ADD KEY `stock_transfer_company_id_foreign` (`company_id`),
  ADD KEY `stock_transfer_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `stock_transfer_products`
--
ALTER TABLE `stock_transfer_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_transfer_products_transfer_id_foreign` (`transfer_id`),
  ADD KEY `stock_transfer_products_product_id_foreign` (`product_id`),
  ADD KEY `stock_transfer_products_created_by_foreign` (`created_by`),
  ADD KEY `stock_transfer_products_company_id_foreign` (`company_id`),
  ADD KEY `stock_transfer_products_branch_id_foreign` (`branch_id`),
  ADD KEY `stock_transfer_products_wip_stock_id_foreign` (`wip_stock_id`);

--
-- Indexes for table `stock_transfer_source`
--
ALTER TABLE `stock_transfer_source`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_created_by_foreign` (`created_by`),
  ADD KEY `suppliers_company_id_foreign` (`company_id`);

--
-- Indexes for table `usercompanies`
--
ALTER TABLE `usercompanies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usercompanies_user_id_foreign` (`user_id`),
  ADD KEY `usercompanies_company_id_foreign` (`company_id`),
  ADD KEY `usercompanies_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users_profile_photos`
--
ALTER TABLE `users_profile_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_profile_photos_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_serial_no_unique` (`serial_no`),
  ADD KEY `vouchers_created_by_foreign` (`created_by`),
  ADD KEY `vouchers_company_id_foreign` (`company_id`),
  ADD KEY `vouchers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `voucher_payments`
--
ALTER TABLE `voucher_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_payments_voucher_id_foreign` (`voucher_id`),
  ADD KEY `voucher_payments_revenue_id_foreign` (`revenue_id`),
  ADD KEY `voucher_payments_created_by_foreign` (`created_by`),
  ADD KEY `voucher_payments_company_id_foreign` (`company_id`),
  ADD KEY `voucher_payments_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `bank_branches`
--
ALTER TABLE `bank_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cheque_issued`
--
ALTER TABLE `cheque_issued`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cheque_received`
--
ALTER TABLE `cheque_received`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company_bank_info`
--
ALTER TABLE `company_bank_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1071;

--
-- AUTO_INCREMENT for table `disposed_products`
--
ALTER TABLE `disposed_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disposed_type`
--
ALTER TABLE `disposed_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `make_model`
--
ALTER TABLE `make_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `modules_sub`
--
ALTER TABLE `modules_sub`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5577;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_companies`
--
ALTER TABLE `product_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_language`
--
ALTER TABLE `product_language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_make_model`
--
ALTER TABLE `product_make_model`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_multiple_alliance`
--
ALTER TABLE `product_multiple_alliance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_unit_types`
--
ALTER TABLE `product_unit_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `purchase_attachments`
--
ALTER TABLE `purchase_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `purchase_order_attachments`
--
ALTER TABLE `purchase_order_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_order_products`
--
ALTER TABLE `purchase_order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `purchase_return`
--
ALTER TABLE `purchase_return`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_return_attachments`
--
ALTER TABLE `purchase_return_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_return_products`
--
ALTER TABLE `purchase_return_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `sales_payments`
--
ALTER TABLE `sales_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `stock_count`
--
ALTER TABLE `stock_count`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock_count_products`
--
ALTER TABLE `stock_count_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock_transfer`
--
ALTER TABLE `stock_transfer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_transfer_products`
--
ALTER TABLE `stock_transfer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock_transfer_source`
--
ALTER TABLE `stock_transfer_source`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usercompanies`
--
ALTER TABLE `usercompanies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_profile_photos`
--
ALTER TABLE `users_profile_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voucher_payments`
--
ALTER TABLE `voucher_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_log_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_log_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_branches`
--
ALTER TABLE `bank_branches`
  ADD CONSTRAINT `bank_branches_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cheque_issued`
--
ALTER TABLE `cheque_issued`
  ADD CONSTRAINT `cheque_issued_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheque_issued_company_bank_id_foreign` FOREIGN KEY (`company_bank_id`) REFERENCES `company_bank_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheque_issued_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheque_issued_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cheque_received`
--
ALTER TABLE `cheque_received`
  ADD CONSTRAINT `cheque_received_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheque_received_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheque_received_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cheque_received_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_bank_info`
--
ALTER TABLE `company_bank_info`
  ADD CONSTRAINT `company_bank_info_bank_branch_id_foreign` FOREIGN KEY (`bank_branch_id`) REFERENCES `bank_branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD CONSTRAINT `company_settings_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_settings_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disposed_products`
--
ALTER TABLE `disposed_products`
  ADD CONSTRAINT `disposed_products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposed_products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposed_products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposed_products_disposed_type_foreign` FOREIGN KEY (`disposed_type`) REFERENCES `disposed_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposed_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disposed_type`
--
ALTER TABLE `disposed_type`
  ADD CONSTRAINT `disposed_type_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposed_type_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `disposed_type_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_payment_method_foreign` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_payment_type_foreign` FOREIGN KEY (`payment_type`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `expenses_purchase_payment_id_foreign` FOREIGN KEY (`purchase_payment_id`) REFERENCES `purchase_payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `languages_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `languages_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `make_model`
--
ALTER TABLE `make_model`
  ADD CONSTRAINT `make_model_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `make_model_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `make_model_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modules_sub`
--
ALTER TABLE `modules_sub`
  ADD CONSTRAINT `modules_sub_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD CONSTRAINT `payment_methods_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_methods_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD CONSTRAINT `payment_types_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_types_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_brand_id_foreign` FOREIGN KEY (`product_brand_id`) REFERENCES `product_brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_company_id_foreign` FOREIGN KEY (`product_company_id`) REFERENCES `product_companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_productcategory_id_foreign` FOREIGN KEY (`productcategory_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_units_type_foreign` FOREIGN KEY (`units_type`) REFERENCES `product_unit_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD CONSTRAINT `product_brands_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_brands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_companies`
--
ALTER TABLE `product_companies`
  ADD CONSTRAINT `product_companies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_companies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_language`
--
ALTER TABLE `product_language`
  ADD CONSTRAINT `product_language_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_language_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_language_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_multiple_alliance`
--
ALTER TABLE `product_multiple_alliance`
  ADD CONSTRAINT `product_multiple_alliance_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_multiple_alliance_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_multiple_alliance_units_type_foreign` FOREIGN KEY (`units_type`) REFERENCES `product_unit_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
