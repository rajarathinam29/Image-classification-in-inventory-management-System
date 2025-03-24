-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 05:01 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
(1, 'Mr', 'Admin', '', '+94 755555555', 'admin@mail.com', NULL, 'admin', '$2y$10$u4kh/9QdKALBeavP0TJyfuQgZSiTHtbdPr8Zf7Q9Qb9J0bZfHP5mG', NULL, 'xyz', 'xyz', 'xyz', 'xyz', NULL, 1, 'eyJpdiI6IlJYZjFBZGNpR205TC9hNzVUZVZhTVE9PSIsInZhbHVlIjoiVXlwK1hKTFB1YWZYUDlKNTBXQUdCdDhDK0xUK0kxODNwOGNGd3R1ZTdDa2ZFK3Nmd3d5SlFDdmhrUjlOdDgvZyIsIm1hYyI6IjlkZDBkMzEzNjdiZWMxYzFlZDQxMjA5ZmU5NjNjZTk4NDQ5ZGFmNjIxNWZhOWEyYmQ0NzM4MGVlZWUyY2JmYTYiLCJ0YWciOiIifQ==', NULL, '2023-07-20 04:54:00', NULL, '2023-06-01 01:58:37', '2023-07-19 23:24:00', NULL);

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

--
-- Dumping data for table `bank_branches`
--

INSERT INTO `bank_branches` (`id`, `bank_id`, `branch_code`, `branch_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 36, 'Aluthgama', NULL, '2023-07-26 01:02:58', '2023-07-26 01:02:58'),
(2, 1, 22, 'Ambalanthota', NULL, '2023-07-26 01:03:37', '2023-07-26 01:03:37'),
(3, 1, 34, 'Ampara', NULL, '2023-07-26 01:05:31', '2023-07-26 01:05:31'),
(4, 1, 15, 'Anuradhapura', NULL, '2023-07-26 01:06:37', '2023-07-26 01:06:37'),
(5, 1, 25, 'Avissawella', NULL, '2023-07-26 01:08:36', '2023-07-26 01:08:36'),
(6, 1, 7, 'Batticaloa', NULL, '2023-07-26 01:10:03', '2023-07-26 01:10:03'),
(7, 1, 25, 'Chilaw', NULL, '2023-07-27 02:24:39', NULL),
(8, 1, 19, 'Mannar', '2023-07-27 01:07:35', '2023-07-27 01:19:10', '2023-07-27 01:19:10'),
(9, 1, 20, 'Jaffna', '2023-07-27 01:12:01', '2023-07-27 01:12:01', NULL),
(10, 1, 45, 'Kandy', '2023-07-27 01:15:29', '2023-07-27 01:15:29', NULL),
(11, 1, 27, 'Vavuniya', '2023-07-27 03:18:57', '2023-07-27 03:19:58', NULL),
(12, 3, 1, 'Jaffna', '2023-07-27 03:22:12', '2023-07-27 03:22:12', NULL);

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

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `company_id`, `branch_name`, `phone_no`, `email`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Jaffna', '78945641364', 'email@mail.com', NULL, 'zxc', 'zxc', 'zxc', 'Sri Lanka', NULL, NULL, 1, '2023-06-01 02:01:38', '2023-06-01 02:01:38', NULL),
(2, 1, 'Vavuniya', '94789456412', 'email@mail.com', NULL, 'zxcv', 'zxcv', 'zxcv', 'Sri Lanka', NULL, NULL, 1, '2023-06-01 02:02:09', '2023-06-01 02:02:09', NULL);

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

--
-- Dumping data for table `cheque_issued`
--

INSERT INTO `cheque_issued` (`id`, `cheque_no`, `issue_date`, `effective_date`, `amount`, `payee_name`, `refference`, `issue_to`, `issue_id`, `cheque_status`, `company_bank_id`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '456123', '2023-07-14 12:15:19', '2023-07-21 00:00:00', 2000.00, 'Cash', 'paid To Company 1 payment Rs 2000', 'purchase', 2, 1, 1, 2, 1, 1, '2023-07-14 01:18:03', '2023-07-18 04:12:52', NULL),
(2, '456124', '2023-07-14 12:18:03', '2023-07-28 00:00:00', 1000.00, 'Cash', '', 'purchase', 3, 3, 1, 2, 1, 1, '2023-07-14 01:30:37', '2023-07-18 04:13:54', NULL),
(3, '4561238', '2023-07-17 16:38:52', '2023-07-31 00:00:00', 1000.00, 'Cash', 'Cash Cheque Payment', 'purchase', 4, 4, 5, 2, 1, 1, '2023-07-17 05:40:19', '2023-07-18 04:14:55', NULL);

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
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `proprietor_name`, `registerd_no`, `start_date`, `phone_no`, `email`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `user_limit`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'BBK Daily Food City', NULL, '123456', '2023-06-01', '12345678944', 'email@mail.com', NULL, NULL, NULL, NULL, 'Sri Lanka', NULL, 5, 1, '2023-06-01 02:00:57', '2023-06-01 02:00:57', NULL);

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

--
-- Dumping data for table `company_bank_info`
--

INSERT INTO `company_bank_info` (`id`, `bank_id`, `bank_branch_id`, `bank_account_no`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 79745672364689, 1, 1, 1, NULL, NULL, NULL),
(2, 1, 2, 6654621656462, 2, 1, 2, '2023-07-12 01:16:32', '2023-07-12 01:16:32', NULL),
(3, 1, 3, 123456795, 2, 1, 1, '2023-07-12 02:05:24', '2023-07-12 02:49:18', '2023-07-12 02:49:18'),
(4, 1, 5, 656465465, 2, 1, 1, '2023-07-12 23:29:56', '2023-07-13 01:07:43', NULL),
(5, 1, 4, 1234567890, 2, 1, 1, '2023-07-17 05:38:21', '2023-07-17 05:38:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT 0.00,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `first_name`, `last_name`, `phone_no`, `email`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `points`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr', 'customer', '1', '45648979456', NULL, NULL, 'zxcv', 'zxcv', 'zxcv', 'Sri Lanka', NULL, 0.00, 1, 1, '2023-06-01 02:06:39', '2023-07-03 04:44:44', NULL),
(2, 'Mr', 'customer', '2', '94785463214', NULL, NULL, 'zxcv', 'zxcv', 'zxcv', 'Sri Lanka', NULL, 0.00, 1, 2, '2023-06-05 05:54:56', '2023-07-03 04:42:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
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

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `date`, `payment_type`, `type_id`, `purchase_payment_id`, `payment_method`, `description`, `amount`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-06-01 16:11:52', 1, 4, NULL, 1, 'Sale 1-1-20230601-2-1 balance paid.', 40.00, 2, 1, 1, '2023-06-01 05:12:13', '2023-06-01 05:12:13', NULL),
(2, '2023-06-02 12:01:07', 1, 6, NULL, 1, 'Sale 1-1-20230602-2-1 balance paid.', 40.00, 2, 1, 1, '2023-06-02 01:16:21', '2023-06-02 01:16:21', NULL),
(3, '2023-06-06 10:54:00', 3, NULL, NULL, 1, 'Other Expenses', 100.00, 2, 1, 1, '2023-06-05 23:55:18', '2023-06-05 23:55:18', NULL),
(4, '2023-06-07 14:49:50', 1, 11, NULL, 1, 'Sale 1-1-20230607-2-1 balance paid.', 404.00, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(5, '2023-06-07 14:49:50', 1, 10, NULL, 1, 'Sale 1-1-20230607-2-1 balance paid.', 20.00, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(6, '2023-06-07 15:23:38', 1, 12, NULL, 1, 'Sale 1-1-20230607-2-3 balance paid.', 10.00, 2, 1, 1, '2023-06-07 04:24:06', '2023-06-07 04:24:06', NULL),
(7, '2023-06-07 16:08:45', 1, 13, NULL, 1, 'Sale 1-1-20230607-2-4 balance paid.', 78.00, 2, 1, 1, '2023-06-07 05:09:22', '2023-06-07 05:09:22', NULL),
(8, '2023-06-09 16:09:51', 1, 17, NULL, 1, 'Sale 1-1-20230609-2-1 balance paid.', 8.00, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(9, '2023-06-09 16:09:51', 1, 18, NULL, 1, 'Sale 1-1-20230609-2-2 balance paid.', 408.00, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(10, '2023-06-09 16:21:26', 1, 19, NULL, 1, 'Sale 1-1-20230609-2-3 balance paid.', 300.00, 2, 1, 1, '2023-06-09 05:22:05', '2023-06-09 05:22:05', NULL),
(11, '2023-06-15 15:18:47', 1, 20, NULL, 1, 'Sale 1-1-20230615-2-1 balance paid.', 80.00, 2, 1, 1, '2023-06-15 04:19:31', '2023-06-15 04:19:31', NULL),
(12, '2023-06-15 15:53:42', 1, 22, NULL, 1, 'Sale 1-1-20230615-2-3 balance paid.', 8.00, 2, 1, 1, '2023-06-15 04:54:46', '2023-06-15 04:54:46', NULL),
(13, '2023-06-29 15:21:33', 2, 1, NULL, 1, 'Purchase GRN-1-1-1 credit invoice paid.', 2000.00, 2, 1, 1, '2023-06-29 04:21:49', '2023-06-30 00:02:23', '2023-06-30 00:02:23'),
(14, '2023-06-29 15:36:56', 2, 1, NULL, 1, 'Purchase GRN-1-1-1 credit invoice paid.', 3000.00, 2, 1, 1, '2023-06-29 04:37:21', '2023-06-30 00:02:35', '2023-06-30 00:02:35'),
(15, '2023-06-29 15:36:56', 2, 4, NULL, 1, 'Purchase GRN-1-1-2 credit invoice paid.', 2000.00, 2, 1, 1, '2023-06-29 04:37:21', '2023-06-30 00:02:27', '2023-06-30 00:02:27'),
(16, '2023-06-29 15:40:43', 2, 5, NULL, 1, 'Purchase GRN-1-1-3 credit invoice paid.', 5000.00, 2, 1, 1, '2023-06-29 04:42:19', '2023-06-30 00:02:39', '2023-06-30 00:02:39'),
(17, '2023-06-29 15:42:26', 2, 4, NULL, 1, 'Purchase GRN-1-1-2 credit invoice paid.', 3500.00, 2, 1, 1, '2023-06-29 04:43:27', '2023-06-30 00:02:46', '2023-06-30 00:02:46'),
(18, '2023-06-29 15:42:26', 2, 5, NULL, 1, 'Purchase GRN-1-1-3 credit invoice paid.', 1500.00, 2, 1, 1, '2023-06-29 04:43:27', '2023-06-30 00:02:43', '2023-06-30 00:02:43'),
(19, '2023-06-30 10:47:37', 2, 5, NULL, 2, 'Card No: 7894\r\nPaid to instant promo Deal', 2000.00, 2, 1, 1, '2023-06-29 23:49:30', '2023-06-30 00:02:50', '2023-06-30 00:02:50'),
(20, '2023-06-30 11:16:40', 2, 1, NULL, 2, 'Purchase GRN-1-1-1 credit invoice paid.Card No: 4563', 1000.00, 2, 1, 1, '2023-06-30 00:17:52', '2023-06-30 00:17:52', NULL),
(21, '2023-06-30 11:21:47', 2, 1, NULL, 1, 'Purchase GRN-1-1-1 credit invoice paid. ', 4000.00, 2, 1, 1, '2023-06-30 00:22:03', '2023-06-30 00:22:03', NULL),
(22, '2023-06-30 11:34:51', 2, 4, NULL, 1, 'Purchase GRN-1-1-2 credit invoice paid. ', 1000.00, 2, 1, 1, '2023-06-30 00:36:40', '2023-06-30 00:36:40', NULL),
(23, '2023-06-30 11:36:40', 2, 4, NULL, 1, 'Purchase GRN-1-1-2 credit invoice paid. ', 1000.00, 2, 1, 1, '2023-06-30 00:37:04', '2023-06-30 00:37:04', NULL),
(24, '2023-07-05 11:54:15', 2, 4, 1, 1, 'Purchase GRN-1-1-2 credit invoice paid. Added with PurchasePayment', 3500.00, 2, 1, 1, '2023-07-05 00:56:17', '2023-07-05 00:56:17', NULL),
(25, '2023-07-14 12:15:19', 2, 5, 2, 3, 'Purchase GRN-1-1-3 credit invoice paid. paid To Company 1 payment Rs 2000', 2000.00, 2, 1, 1, '2023-07-14 01:18:03', '2023-07-14 01:18:03', NULL),
(26, '2023-07-14 12:18:03', 2, 5, 3, 3, 'Purchase GRN-1-1-3 credit invoice paid. ', 2000.00, 2, 1, 1, '2023-07-14 01:30:37', '2023-07-14 01:30:37', NULL),
(27, '2023-07-17 16:38:52', 2, 5, 4, 3, 'Purchase GRN-1-1-3 credit invoice paid. Cash Cheque Payment', 1000.00, 2, 1, 1, '2023-07-17 05:40:19', '2023-07-17 05:40:19', NULL),
(28, '2023-08-08 11:53:30', 2, 5, 5, 1, 'Purchase GRN-1-1-3 credit invoice paid. ', 2000.00, 2, 1, 1, '2023-08-08 00:54:22', '2023-08-08 00:54:22', NULL);

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

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language_name`, `short_name`, `company_id`, `created_by`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tamil', 'ta', 1, 1, 1, NULL, NULL, NULL);

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
(56, '2023_07_07_064812_create_cheque_issued_table', 6);

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

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `method_name`, `description`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Cash', 'Cash', 1, 1, NULL, NULL, NULL),
(2, 'Card', 'Card', 1, 1, NULL, NULL, NULL),
(3, 'Cheque', 'Cheque', 1, 1, NULL, NULL, NULL),
(4, 'Points', 'Points', 1, 1, NULL, NULL, NULL),
(5, 'Voucher', 'Voucher', 1, 1, NULL, NULL, NULL),
(6, 'Bank Transfer', 'Bank Transfer', 1, 1, NULL, NULL, NULL);

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

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `type_name`, `description`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sales', 'Sales', 1, 1, NULL, NULL, NULL),
(2, 'Purchase', 'Purchase', 1, 1, NULL, NULL, NULL),
(3, 'Others', 'Others', 1, 1, NULL, NULL, NULL);

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
  `units_type` bigint(20) UNSIGNED NOT NULL,
  `cost_price` double(10,2) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) DEFAULT 0.00,
  `product_company_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `bar_code`, `product_name`, `productcategory_id`, `units_in_case`, `units_type`, `cost_price`, `sale_price`, `mrp`, `vat`, `product_company_id`, `product_brand_id`, `product_status`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '479456123789', 'Product 1', 1, 12.00, 1, 150.00, 160.00, 170.00, 20.00, 1, 1, 1, 1, 1, '2023-06-01 02:10:50', '2023-06-01 02:10:50', NULL),
(2, '49886467498', 'Product 2', 1, 12.00, 1, 1000.00, 1200.00, 1300.00, 0.00, 1, 1, 1, 1, 2, '2023-06-06 05:36:30', '2023-06-06 05:36:30', NULL),
(3, '2458965412', 'product 07', 1, 2.00, 1, 20.00, 50.00, 70.00, 20.00, 1, 1, 1, 1, 1, '2023-06-07 01:17:57', '2023-06-07 01:19:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brands_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `brand_name`, `description`, `brands_status`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Product Company 1', 'Product Company 1', 1, 1, 1, '2023-06-01 02:09:23', '2023-06-01 02:09:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `category_description`, `category_status`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Category 1', 'Category 1', 1, 1, 1, '2023-06-01 02:08:20', '2023-06-01 02:08:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_companies`
--

CREATE TABLE `product_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `companies_status` tinyint(1) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_companies`
--

INSERT INTO `product_companies` (`id`, `company_name`, `description`, `companies_status`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Product Company 1', 'Product Company 1', 1, 1, 1, '2023-06-01 02:08:47', '2023-06-01 02:08:47', NULL);

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

--
-- Dumping data for table `product_language`
--

INSERT INTO `product_language` (`id`, `product_id`, `language_id`, `product_name`, `company_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'பொருள் 1', 1, '2023-06-02 04:02:58', '2023-06-05 05:48:01', NULL),
(2, 1, 1, 'பொருள் 02', 1, '2023-06-02 04:16:59', '2023-06-02 04:22:50', '2023-06-02 04:22:50');

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

--
-- Dumping data for table `product_multiple_alliance`
--

INSERT INTO `product_multiple_alliance` (`id`, `product_id`, `units_type`, `barcode`, `qty`, `cost_price`, `sale_price`, `status`, `company_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '147852', 10.00, 150.00, 160.00, 1, 1, '2023-06-01 03:28:08', '2023-06-01 03:28:08', NULL),
(2, 1, 1, '789123', 100.00, 150.00, 160.00, 1, 1, '2023-06-05 05:43:45', '2023-06-05 05:43:45', NULL);

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
(2, 'Kg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grn_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `invoice_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `purchase` (`id`, `grn_no`, `date`, `invoice_no`, `suppliers_id`, `total_amount`, `discount`, `cost`, `purchase_status`, `company_id`, `branch_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GRN-1-1-1', '2023-06-05 12:55:00', 'Inv001', 1, 5000.00, 0.00, 0.00, 1, 1, 1, 1, '2023-06-05 01:54:28', '2023-06-30 00:22:03', NULL),
(2, 'GRN-1-1-2', '2023-06-05 12:55:00', 'Inv001', 1, 5000.00, 0.00, 0.00, 0, 1, 1, 1, '2023-06-05 01:55:00', '2023-06-05 01:56:57', '2023-06-05 01:56:57'),
(3, 'GRN-1-1-3', '2023-06-05 12:56:00', 'Inv001', 1, 5000.00, 0.00, 0.00, 0, 1, 1, 1, '2023-06-05 01:56:19', '2023-06-05 01:56:55', '2023-06-05 01:56:55'),
(4, 'GRN-1-1-2', '2023-06-29 10:28:00', '456498', 1, 5000.00, 0.00, 500.00, 1, 1, 1, 2, '2023-06-28 23:29:50', '2023-07-05 00:56:17', NULL),
(5, 'GRN-1-1-3', '2023-06-29 10:31:00', '897987', 1, 10000.00, 1000.00, 0.00, 0, 1, 1, 2, '2023-06-28 23:31:29', '2023-06-30 00:15:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_products`
--

CREATE TABLE `purchased_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `units` double(8,2) NOT NULL,
  `free` double(8,2) NOT NULL DEFAULT 0.00,
  `cost_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mrp` decimal(10,2) NOT NULL,
  `mrp_c` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `expiry_status` tinyint(1) NOT NULL DEFAULT 0,
  `price_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchased_products`
--

INSERT INTO `purchased_products` (`id`, `purchase_id`, `product_id`, `units`, `free`, `cost_price`, `sale_price`, `mrp`, `mrp_c`, `total`, `expiry_date`, `expiry_status`, `price_status`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10.00, 0.00, 150.00, 160.00, 170.00, 0.00, 1500.00, '2023-08-30', 0, 0, 2, 1, 1, '2023-06-05 05:52:21', '2023-06-05 05:52:21', NULL),
(2, 1, 1, 10.00, 0.00, 100.00, 0.00, 150.00, 0.00, 1000.00, NULL, 0, 0, 2, 1, 1, '2023-06-06 06:00:13', '2023-06-06 06:00:13', NULL);

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
  `thumbnail_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
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

--
-- Dumping data for table `purchase_payments`
--

INSERT INTO `purchase_payments` (`id`, `date`, `supplier_id`, `payment_method`, `amount`, `description`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-07-05 11:54:15', 1, 1, 3500.00, 'Added with PurchasePayment', 2, 1, 1, '2023-07-05 00:56:17', '2023-07-05 00:56:17', NULL),
(2, '2023-07-14 12:15:19', 1, 3, 2000.00, 'paid To Company 1 payment Rs 2000', 2, 1, 1, '2023-07-14 01:18:03', '2023-07-14 01:18:03', NULL),
(3, '2023-07-14 12:18:03', 1, 3, 1000.00, '', 2, 1, 1, '2023-07-14 01:30:37', '2023-07-14 01:30:37', NULL),
(4, '2023-07-17 16:38:52', 1, 3, 1000.00, 'Cash Cheque Payment', 2, 1, 1, '2023-07-17 05:40:19', '2023-07-17 05:40:19', NULL),
(5, '2023-08-08 11:53:30', 1, 1, 2000.00, '', 2, 1, 1, '2023-08-08 00:54:22', '2023-08-08 00:54:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `payment_type` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
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

--
-- Dumping data for table `revenues`
--

INSERT INTO `revenues` (`id`, `date`, `payment_type`, `type_id`, `payment_method`, `description`, `amount`, `card_no`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2023-06-01 16:00:42', 1, 3, 1, 'Sale 1-1-20230601-2-1 payment.', 2000.00, NULL, 2, 1, 1, '2023-06-01 05:00:58', '2023-06-01 05:00:58', NULL),
(3, '2023-06-01 16:11:52', 1, 4, 1, 'Sale 1-1-20230601-2-1 payment.', 200.00, NULL, 2, 1, 1, '2023-06-01 05:12:13', '2023-06-01 05:12:13', NULL),
(4, '2023-06-01 16:29:36', 1, 5, 1, 'Sale 1-1-20230601-2-5 payment.', 160.00, NULL, 2, 1, 1, '2023-06-01 05:29:48', '2023-06-01 05:29:48', NULL),
(5, '2023-06-02 12:01:07', 1, 6, 1, 'Sale 1-1-20230602-2-1 payment.', 200.00, NULL, 2, 1, 1, '2023-06-02 01:16:21', '2023-06-02 01:16:21', NULL),
(6, '2023-06-05 16:53:33', 1, 7, 1, 'Sale 1-1-20230605-2-1 payment.', 160.00, NULL, 2, 1, 1, '2023-06-05 05:58:20', '2023-06-05 05:58:20', NULL),
(7, '2023-06-06 16:36:36', 1, 8, 1, 'Sale 1-1-20230606-2-1 payment.', 1360.00, NULL, 2, 1, 1, '2023-06-06 05:37:17', '2023-06-06 05:37:17', NULL),
(8, '2023-06-06 16:52:21', 1, 9, 4, 'Sale 1-1-20230606-2-2 payment.', 1.60, NULL, 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(9, '2023-06-06 16:52:21', 1, 9, 1, 'Sale 1-1-20230606-2-2 payment.', 1000.00, NULL, 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(10, '2023-06-06 16:52:21', 1, 9, 2, 'Sale 1-1-20230606-2-2 payment.', 800.00, '4566', 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(11, '2023-06-06 16:52:21', 1, 9, 1, 'Sale 1-1-20230606-2-2 payment.', 78.40, NULL, 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(12, '2023-06-07 14:49:50', 1, 11, 1, 'Sale 1-1-20230607-2-1 payment.', 384.00, NULL, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(13, '2023-06-07 14:49:50', 1, 10, 1, 'Sale 1-1-20230607-2-1 payment.', 384.00, NULL, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(14, '2023-06-07 14:49:50', 1, 11, 1, 'Sale 1-1-20230607-2-1 payment.', 384.00, NULL, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(15, '2023-06-07 15:23:38', 1, 12, 1, 'Sale 1-1-20230607-2-3 payment.', 192.00, NULL, 2, 1, 1, '2023-06-07 04:24:06', '2023-06-07 04:24:06', NULL),
(16, '2023-06-07 16:08:45', 1, 13, 1, 'Sale 1-1-20230607-2-4 payment.', 300.00, NULL, 2, 1, 1, '2023-06-07 05:09:22', '2023-06-07 05:09:22', NULL),
(17, '2023-06-08 11:13:53', 1, 14, 1, 'Sale 1-1-20230608-2-1 payment.', -192.00, NULL, 2, 1, 1, '2023-06-08 00:14:30', '2023-06-08 00:14:30', NULL),
(18, '2023-06-08 11:17:37', 1, 15, 1, 'Sale 1-1-20230608-2-2 payment.', -192.00, NULL, 2, 1, 1, '2023-06-08 00:18:34', '2023-06-08 00:18:34', NULL),
(19, '2023-06-08 05:48:34', 1, 16, 1, 'Sale 1-1-20230608-2-3 payment.', -192.00, NULL, 2, 1, 1, '2023-06-08 00:30:48', '2023-06-08 00:30:48', NULL),
(20, '2023-06-09 16:09:51', 1, 17, 2, 'Sale 1-1-20230609-2-1 payment.', 1000.00, '2314', 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(21, '2023-06-09 16:09:51', 1, 17, 1, 'Sale 1-1-20230609-2-1 payment.', 400.00, NULL, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(22, '2023-06-09 16:09:51', 1, 18, 2, 'Sale 1-1-20230609-2-2 payment.', 1000.00, '2314', 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(23, '2023-06-09 16:09:51', 1, 18, 1, 'Sale 1-1-20230609-2-2 payment.', 400.00, NULL, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(24, '2023-06-09 16:09:51', 1, 18, 1, 'Sale 1-1-20230609-2-2 payment.', 400.00, NULL, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(25, '2023-06-09 16:21:26', 1, 19, 1, 'Sale 1-1-20230609-2-3 payment.', 1500.00, NULL, 2, 1, 1, '2023-06-09 05:22:05', '2023-06-09 05:22:05', NULL),
(26, '2023-06-15 15:18:47', 1, 20, 5, 'Sale 1-1-20230615-2-1 payment.', 1000.00, NULL, 2, 1, 1, '2023-06-15 04:19:31', '2023-06-15 04:19:31', NULL),
(27, '2023-06-15 15:18:47', 1, 20, 1, 'Sale 1-1-20230615-2-1 payment.', 1000.00, NULL, 2, 1, 1, '2023-06-15 04:19:31', '2023-06-15 04:19:31', NULL),
(28, '2023-06-15 15:50:40', 1, 21, 5, 'Sale 1-1-20230615-2-2 payment.', 192.00, NULL, 2, 1, 1, '2023-06-15 04:51:17', '2023-06-15 04:51:17', NULL),
(29, '2023-06-15 15:53:42', 1, 22, 5, 'Sale 1-1-20230615-2-3 payment.', 808.00, NULL, 2, 1, 1, '2023-06-15 04:54:46', '2023-06-15 04:54:46', NULL),
(30, '2023-06-15 15:53:42', 1, 22, 1, 'Sale 1-1-20230615-2-3 payment.', 400.00, NULL, 2, 1, 1, '2023-06-15 04:54:46', '2023-06-15 04:54:46', NULL),
(31, '2023-06-15 16:46:17', 1, 23, 5, 'Sale 1-1-20230615-2-4 payment.', 5000.00, NULL, 2, 1, 1, '2023-06-15 05:48:26', '2023-06-15 05:48:26', NULL),
(32, '2023-06-15 16:46:17', 1, 23, 1, 'Sale 1-1-20230615-2-4 payment.', 1000.00, NULL, 2, 1, 1, '2023-06-15 05:48:26', '2023-06-15 05:48:26', NULL),
(33, '2023-06-15 17:04:00', 1, 24, 5, 'Sale 1-1-20230615-2-5 payment.', 5000.00, NULL, 2, 1, 1, '2023-06-15 06:06:05', '2023-06-15 06:06:05', NULL),
(34, '2023-06-15 17:04:00', 1, 24, 5, 'Sale 1-1-20230615-2-5 payment.', 2200.00, NULL, 2, 1, 1, '2023-06-15 06:06:05', '2023-06-15 06:06:05', NULL),
(35, '2023-06-15 11:36:05', 1, 25, 5, 'Sale 1-1-20230615-2-6 payment.', 192.00, NULL, 2, 1, 1, '2023-06-15 06:07:23', '2023-06-15 06:07:23', NULL),
(36, '2023-06-15 11:37:23', 1, 26, 5, 'Sale 1-1-20230615-2-7 payment.', 2608.00, NULL, 2, 1, 1, '2023-06-15 06:08:43', '2023-06-15 06:08:43', NULL),
(37, '2023-06-15 11:37:23', 1, 26, 1, 'Sale 1-1-20230615-2-7 payment.', 1232.00, NULL, 2, 1, 1, '2023-06-15 06:08:43', '2023-06-15 06:08:43', NULL),
(38, '2023-06-26 10:33:46', 1, 28, 5, 'Sale 1-1-20230626-2-2 payment.', -192.00, NULL, 2, 1, 1, '2023-06-25 23:34:43', '2023-06-25 23:34:43', NULL),
(39, '2023-06-26 11:43:34', 1, 29, 1, 'Sale 1-1-20230626-2-3 payment.', 720.00, NULL, 2, 1, 1, '2023-06-26 00:54:57', '2023-06-26 00:54:57', NULL),
(40, '2023-06-26 06:24:57', 1, 30, 5, 'Sale 1-1-20230626-2-4 payment.', -384.00, NULL, 2, 1, 1, '2023-06-26 00:57:41', '2023-06-26 00:57:41', NULL),
(41, '2023-06-26 13:01:40', 1, 31, 5, 'Sale 1-1-20230626-2-5 payment.', -192.00, NULL, 2, 1, 1, '2023-06-26 02:04:24', '2023-06-26 02:04:24', NULL),
(42, '2023-06-28 10:52:39', 1, 32, 1, 'Sale 1-1-20230628-2-1 payment.', -192.00, NULL, 2, 1, 1, '2023-06-28 00:02:39', '2023-06-28 00:02:39', NULL),
(43, '2023-06-28 11:04:53', 1, 33, 1, 'Sale 1-1-20230628-2-2 payment.', -576.00, NULL, 2, 1, 1, '2023-06-28 00:05:28', '2023-06-28 00:05:28', NULL),
(44, '2023-06-28 11:06:37', 1, 34, 1, 'Sale 1-1-20230628-2-3 payment.', -1200.00, NULL, 2, 1, 1, '2023-06-28 00:07:26', '2023-06-28 00:07:26', NULL),
(45, '2023-07-03 15:00:54', 2, 35, 4, 'Sales 1-1-20230630-2-1 credit invoice paid. ', 30.52, NULL, 2, 1, 1, '2023-07-03 04:01:08', '2023-07-03 04:03:34', '2023-07-03 04:03:34'),
(46, '2023-07-03 15:03:39', 2, 35, 4, 'Sales 1-1-20230630-2-1 credit invoice paid. points Settle ment', 30.52, NULL, 2, 1, 1, '2023-07-03 04:04:31', '2023-07-03 04:05:39', '2023-07-03 04:05:39'),
(47, '2023-07-03 15:05:42', 1, 35, 4, 'Sales 1-1-20230630-2-1 credit invoice paid. ', 30.52, NULL, 2, 1, 1, '2023-07-03 04:05:57', '2023-07-03 04:05:57', NULL),
(48, '2023-07-03 15:10:35', 1, 36, 5, 'Sales 1-1-20230630-2-2 credit invoice paid. ', 192.00, NULL, 2, 1, 1, '2023-07-03 04:11:10', '2023-07-03 04:11:10', NULL),
(49, '2023-07-03 15:15:45', 1, 35, 1, 'Sales 1-1-20230630-2-1 credit invoice paid. ', 161.48, NULL, 2, 1, 1, '2023-07-03 04:16:34', '2023-07-03 04:16:34', NULL),
(50, '2023-07-03 15:26:24', 1, 37, 5, 'Sales 1-1-20230703-2-1 credit invoice paid. Voucher Payment', 1200.00, NULL, 2, 1, 1, '2023-07-03 04:30:56', '2023-07-03 04:30:56', NULL),
(51, '2023-07-03 15:41:29', 1, 38, 4, 'Sales 1-1-20230703-2-2 credit invoice paid. Points Payment', 13.60, NULL, 2, 1, 1, '2023-07-03 04:42:52', '2023-07-03 04:42:52', NULL),
(52, '2023-07-03 15:43:32', 1, 39, 4, 'Sales 1-1-20230703-2-3 credit invoice paid. ', 24.00, NULL, 2, 1, 1, '2023-07-03 04:44:43', '2023-07-03 04:44:43', NULL),
(53, '2023-07-03 15:44:44', 1, 39, 5, 'Sales 1-1-20230703-2-3 credit invoice paid. ', 1000.00, NULL, 2, 1, 1, '2023-07-03 04:47:07', '2023-07-03 04:47:07', NULL),
(54, '2023-07-03 15:47:07', 1, 39, 1, 'Sales 1-1-20230703-2-3 credit invoice paid. ', 176.00, NULL, 2, 1, 1, '2023-07-03 04:47:32', '2023-07-03 04:47:32', NULL);

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_id`, `invoice_date`, `credit_date`, `customer_id`, `sales_status`, `discount_type`, `discount`, `shipping_cost`, `tracking_code`, `shipping_date`, `rtn_bill_id`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1-1-20230601-2-1', '2023-06-01 15:47:54', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-01 04:48:11', '2023-06-06 01:49:47', '2023-06-06 01:49:47'),
(2, '1-1-20230601-2-1', '2023-06-01 15:51:48', NULL, 1, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-01 04:52:17', '2023-06-06 02:27:42', '2023-06-06 02:27:42'),
(3, '1-1-20230601-2-1', '2023-05-22 16:00:42', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-01 05:00:58', '2023-06-23 02:05:06', NULL),
(4, '1-1-20230601-2-1', '2023-06-01 16:11:52', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-01 05:12:13', '2023-06-01 05:12:13', NULL),
(5, '1-1-20230601-2-5', '2023-06-01 16:29:36', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-01 05:29:48', '2023-06-01 05:29:48', NULL),
(6, '1-1-20230602-2-1', '2023-06-02 12:01:07', NULL, 1, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-02 01:16:20', '2023-06-02 01:16:20', NULL),
(7, '1-1-20230605-2-1', '2023-06-05 16:53:33', NULL, 2, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-05 05:58:20', '2023-06-05 05:58:20', NULL),
(8, '1-1-20230606-2-1', '2023-06-06 16:36:36', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-06 05:37:17', '2023-06-06 05:37:17', NULL),
(9, '1-1-20230606-2-2', '2023-06-06 16:52:21', NULL, 1, 0, 0, 50.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(10, '1-1-20230607-2-1', '2023-06-07 14:49:50', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(11, '1-1-20230607-2-1', '2023-06-07 14:49:50', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(12, '1-1-20230607-2-3', '2023-06-07 15:23:38', NULL, NULL, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-07 04:24:06', '2023-06-07 04:24:06', NULL),
(13, '1-1-20230607-2-4', '2023-06-07 16:08:45', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-07 05:09:22', '2023-06-07 05:09:22', NULL),
(14, '1-1-20230608-2-1', '2023-06-08 11:13:53', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-08 00:14:30', '2023-06-08 00:14:30', NULL),
(15, '1-1-20230608-2-2', '2023-06-08 11:17:37', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-08 00:18:34', '2023-06-08 00:18:34', NULL),
(16, '1-1-20230608-2-3', '2023-06-08 05:48:34', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-08 00:30:48', '2023-06-08 00:30:48', NULL),
(17, '1-1-20230609-2-1', '2023-06-09 16:09:51', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(18, '1-1-20230609-2-2', '2023-06-09 16:09:51', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(19, '1-1-20230609-2-3', '2023-06-09 16:21:26', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-09 05:22:05', '2023-06-09 05:22:05', NULL),
(20, '1-1-20230615-2-1', '2023-06-15 15:18:47', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 04:19:31', '2023-06-15 04:19:31', NULL),
(21, '1-1-20230615-2-2', '2023-06-15 15:50:40', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 04:51:17', '2023-06-15 04:51:17', NULL),
(22, '1-1-20230615-2-3', '2023-06-15 15:53:42', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 04:54:46', '2023-06-15 04:54:46', NULL),
(23, '1-1-20230615-2-4', '2023-06-15 16:46:17', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 05:48:26', '2023-06-15 05:48:26', NULL),
(24, '1-1-20230615-2-5', '2023-06-15 17:04:00', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 06:06:05', '2023-06-15 06:06:05', NULL),
(25, '1-1-20230615-2-6', '2023-06-15 11:36:05', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 06:07:23', '2023-06-15 06:07:23', NULL),
(26, '1-1-20230615-2-7', '2023-06-15 11:37:23', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-15 06:08:43', '2023-06-20 03:11:59', NULL),
(27, '1-1-20230626-2-1', '2023-06-26 10:31:47', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-25 23:32:28', '2023-06-25 23:32:28', NULL),
(28, '1-1-20230626-2-2', '2023-06-26 10:33:46', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-25 23:34:43', '2023-06-25 23:34:43', NULL),
(29, '1-1-20230626-2-3', '2023-06-26 11:43:34', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-26 00:54:57', '2023-06-26 00:54:57', NULL),
(30, '1-1-20230626-2-4', '2023-06-26 06:24:57', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-26 00:57:41', '2023-06-26 00:57:41', NULL),
(31, '1-1-20230626-2-5', '2023-06-26 13:01:40', NULL, 1, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-26 02:04:24', '2023-06-26 02:04:24', NULL),
(32, '1-1-20230628-2-1', '2023-06-28 10:52:39', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-28 00:02:39', '2023-06-28 00:02:39', NULL),
(33, '1-1-20230628-2-2', '2023-06-28 11:04:53', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-28 00:05:28', '2023-06-28 00:05:28', NULL),
(34, '1-1-20230628-2-3', '2023-06-28 11:06:37', NULL, NULL, 4, 0, 0.00, 0.00, NULL, NULL, 22, 2, 1, 1, '2023-06-28 00:07:26', '2023-06-28 00:07:26', NULL),
(35, '1-1-20230630-2-1', '2023-06-30 14:33:23', '2023-07-06 14:33:23', 1, 1, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-30 03:34:24', '2023-07-03 04:16:34', NULL),
(36, '1-1-20230630-2-2', '2023-06-30 14:33:23', '2023-07-06 14:33:23', 1, 1, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-06-30 03:52:49', '2023-07-03 04:11:10', NULL),
(37, '1-1-20230703-2-1', '2023-07-03 15:25:13', '2023-07-13 15:25:13', 1, 1, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-07-03 04:25:58', '2023-07-03 04:30:56', NULL),
(38, '1-1-20230703-2-2', '2023-07-03 15:40:10', '2023-07-13 15:40:10', 2, 0, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-07-03 04:40:42', '2023-07-03 04:40:42', NULL),
(39, '1-1-20230703-2-3', '2023-07-03 15:42:57', '2023-07-13 15:42:57', 1, 1, 0, 0.00, 0.00, NULL, NULL, NULL, 2, 1, 1, '2023-07-03 04:43:20', '2023-07-03 04:47:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales_products`
--

CREATE TABLE `sales_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` double(8,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `mrp` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) DEFAULT 0.00,
  `reusable` tinyint(1) NOT NULL DEFAULT 0,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_products`
--

INSERT INTO `sales_products` (`id`, `sale_id`, `product_id`, `qty`, `sale_price`, `mrp`, `vat`, `reusable`, `reason`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10.00, 160.00, 160.00, 0.00, 0, '', 2, 1, 1, '2023-06-01 04:48:11', '2023-06-06 01:49:47', '2023-06-06 01:49:47'),
(2, 2, 1, 10.00, 160.00, 160.00, 0.00, 0, '', 2, 1, 1, '2023-06-01 04:52:17', '2023-06-06 02:27:42', '2023-06-06 02:27:42'),
(3, 3, 1, 10.00, 160.00, 160.00, 0.00, 0, '', 2, 1, 1, '2023-06-01 05:00:58', '2023-06-01 05:00:58', NULL),
(4, 4, 1, 1.00, 160.00, 160.00, 0.00, 0, '', 2, 1, 1, '2023-06-01 05:12:13', '2023-06-01 05:12:13', NULL),
(5, 5, 1, 1.00, 160.00, 160.00, 0.00, 0, '', 2, 1, 1, '2023-06-01 05:29:48', '2023-06-01 05:29:48', NULL),
(6, 6, 1, 1.00, 160.00, 160.00, 0.00, 0, '', 2, 1, 1, '2023-06-02 01:16:20', '2023-06-02 01:16:20', NULL),
(7, 7, 1, 1.00, 160.00, 170.00, 0.00, 0, '', 2, 1, 1, '2023-06-05 05:58:20', '2023-06-05 05:58:20', NULL),
(8, 8, 1, 1.00, 160.00, 170.00, 0.00, 0, '', 2, 1, 1, '2023-06-06 05:37:17', '2023-06-06 05:37:17', NULL),
(9, 8, 2, 1.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-06 05:37:17', '2023-06-06 05:37:17', NULL),
(10, 9, 1, 3.00, 160.00, 170.00, 0.00, 0, '', 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(11, 9, 2, 1.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(12, 9, 1, 1.00, 150.00, 150.00, 0.00, 0, '', 2, 1, 1, '2023-06-06 06:45:36', '2023-06-06 06:45:36', NULL),
(13, 11, 1, 2.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(14, 10, 1, 2.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-07 04:23:17', '2023-06-07 04:23:17', NULL),
(15, 12, 1, 1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-07 04:24:06', '2023-06-07 04:24:06', NULL),
(16, 13, 3, 1.00, 50.00, 70.00, 20.00, 0, '', 2, 1, 1, '2023-06-07 05:09:22', '2023-06-07 05:09:22', NULL),
(17, 13, 1, 1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-07 05:09:22', '2023-06-07 05:09:22', NULL),
(18, 14, 1, -1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-08 00:14:30', '2023-06-08 00:14:30', NULL),
(19, 15, 1, -1.00, 160.00, 170.00, 20.00, 2, 'Packing Damaged.', 2, 1, 1, '2023-06-08 00:18:34', '2023-06-22 02:38:53', NULL),
(20, 16, 1, -1.00, 160.00, 170.00, 20.00, 1, '', 2, 1, 1, '2023-06-08 00:30:48', '2023-06-22 02:38:10', NULL),
(21, 17, 1, 1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(22, 17, 2, 1.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(23, 18, 1, 1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(24, 18, 2, 1.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-09 05:11:13', '2023-06-09 05:11:13', NULL),
(25, 19, 2, 1.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-09 05:22:05', '2023-06-09 05:22:05', NULL),
(26, 20, 1, 10.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-15 04:19:31', '2023-06-15 04:19:31', NULL),
(27, 21, 1, 1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-15 04:51:17', '2023-06-15 04:51:17', NULL),
(28, 22, 2, 1.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-15 04:54:46', '2023-06-15 04:54:46', NULL),
(29, 23, 2, 5.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-15 05:48:26', '2023-06-15 05:48:26', NULL),
(30, 24, 2, 6.00, 1200.00, 1300.00, 0.00, 0, '', 2, 1, 1, '2023-06-15 06:06:05', '2023-06-15 06:06:05', NULL),
(31, 25, 1, 1.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-15 06:07:23', '2023-06-15 06:07:23', NULL),
(32, 26, 1, 20.00, 160.00, 170.00, 20.00, 0, '', 2, 1, 1, '2023-06-15 06:08:43', '2023-06-15 06:08:43', NULL),
(33, 28, 1, -1.00, 160.00, 170.00, 20.00, 0, NULL, 2, 1, 1, '2023-06-25 23:34:43', '2023-06-25 23:34:43', NULL),
(34, 29, 2, -1.00, 1200.00, 1300.00, 0.00, 0, NULL, 2, 1, 1, '2023-06-26 00:54:57', '2023-06-26 00:54:57', NULL),
(35, 29, 1, 10.00, 160.00, 170.00, 20.00, 1, NULL, 2, 1, 1, '2023-06-26 00:54:57', '2023-06-26 00:54:57', NULL),
(36, 30, 1, -2.00, 160.00, 170.00, 20.00, 0, NULL, 2, 1, 1, '2023-06-26 00:57:41', '2023-06-26 00:57:41', NULL),
(37, 31, 1, -1.00, 160.00, 170.00, 20.00, 0, NULL, 2, 1, 1, '2023-06-26 02:04:24', '2023-06-26 02:04:24', NULL),
(38, 32, 1, -1.00, 160.00, 170.00, 20.00, 0, NULL, 2, 1, 1, '2023-06-28 00:02:39', '2023-06-28 00:02:39', NULL),
(39, 33, 1, -3.00, 160.00, 170.00, 20.00, 0, NULL, 2, 1, 1, '2023-06-28 00:05:28', '2023-06-28 00:05:28', NULL),
(40, 34, 2, -1.00, 1200.00, 1300.00, 0.00, 0, NULL, 2, 1, 1, '2023-06-28 00:07:26', '2023-06-28 00:07:26', NULL),
(41, 35, 1, 1.00, 160.00, 170.00, 20.00, 1, NULL, 2, 1, 1, '2023-06-30 03:34:24', '2023-06-30 03:34:24', NULL),
(42, 36, 1, 1.00, 160.00, 170.00, 20.00, 1, NULL, 2, 1, 1, '2023-06-30 03:52:49', '2023-06-30 03:52:49', NULL),
(43, 37, 2, 1.00, 1200.00, 1300.00, 0.00, 1, NULL, 2, 1, 1, '2023-07-03 04:25:58', '2023-07-03 04:25:58', NULL),
(44, 38, 2, 1.00, 1200.00, 1300.00, 0.00, 1, NULL, 2, 1, 1, '2023-07-03 04:40:42', '2023-07-03 04:40:42', NULL),
(45, 39, 2, 1.00, 1200.00, 1300.00, 0.00, 1, NULL, 2, 1, 1, '2023-07-03 04:43:20', '2023-07-03 04:43:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `suppliers` (`id`, `company_name`, `dealer_name`, `phone_no`, `email`, `building_no`, `street`, `city`, `state`, `country`, `zipcode`, `suppliers_status`, `company_id`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'company 01', 'Adam', '940756440859', NULL, NULL, NULL, 'Jaffna', NULL, 'Sri Lanka', NULL, 1, 1, 1, '2023-06-05 01:53:19', '2023-06-05 01:53:19', NULL),
(2, 'Company 2', 'Deal 2', '48964986544', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, '2023-06-28 23:29:30', '2023-06-28 23:29:30', NULL);

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
(1, 1, 1, 1, 1, NULL, 1, '2023-06-01 02:02:26', '2023-06-01 02:04:12', NULL),
(2, 1, 1, 2, 0, NULL, 0, '2023-06-01 02:04:06', '2023-06-01 02:04:12', NULL),
(3, 2, 1, 1, 0, NULL, 1, '2023-06-01 02:54:22', '2023-06-01 02:54:22', NULL);

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
(1, 'Mr', 'Admin', '', '+94 755555555', 'admin@mail.com', NULL, 'admin', '$2y$10$s5ApU7OMhJDfQGaY9o54tuYDYCyzH.wBoLF64fiVU9o0kEM1zZHMa', NULL, 'xyz', 'xyz', 'xyz', 'xyz', NULL, 1, 1, 'eyJpdiI6IkFHSHpCK1REZnZEckdpS0R0Z1VkR3c9PSIsInZhbHVlIjoiTHFaNkZlbXVlQ0JVTzcwclVlV1FibFRKcXhMWCtmL2dSb3d6ZktxOUJvbFl4bE5hQ1p5T0dpZzlUL2Y3V01MeCIsIm1hYyI6ImQ4NGE0YjllMDM4YWYzZmI1OGFlNjZhNGViZTM3ZDkyZTRlMTNkYzYxYzg3MWNjMTk4ZTUxMWUyNjVhYzc5OWYiLCJ0YWciOiIifQ==', '2023-10-27 05:34:29', NULL, '2023-06-01 01:58:37', '2023-10-27 00:04:29', NULL),
(2, 'Mr', 'Brain', 'Adam', '78979879879', 'email@mail.com', NULL, 'adam', '$2y$10$gG90eLRg41zPFSlh9MZyl.OZIPGaXIADhkhEn2pyBNHAubWDOAdpO', NULL, 'zxcv', 'zxcv', 'zxcv', 'Sri Lanka', NULL, 1, 1, 'eyJpdiI6Ilhxbnp0WGlrSjdpT0VHU05VcUI2aEE9PSIsInZhbHVlIjoidTJ1dC9pVGlXb1AzWEJvV041WXFadUNHdDlBRFdIY2VjQjhiUC80amdzU3NIaU5YMmNNWSttaERTUjU0bkFGSSIsIm1hYyI6IjJiNTU2NjgwN2QwZWEzYmQyMGZmYTEyZGM3N2RhMmY2NmNmYjVlNGZjOTI2NDk4ZTljZDQwZDFkZjM1ZThkMWEiLCJ0YWciOiIifQ==', '2023-07-28 06:19:33', NULL, '2023-06-01 02:54:09', '2023-07-28 00:49:33', NULL);

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
(1, '10988', 2000.00, '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(2, '962929', 2000.00, '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(3, '647393', 2000.00, '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(4, '330614', 2000.00, '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL),
(5, '513362', 2000.00, '2023-07-31', 0, '2023-07-05', 'v_sale', 1, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `voucher_sales`
--

CREATE TABLE `voucher_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_type` tinyint(1) NOT NULL DEFAULT 0,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_sales`
--

INSERT INTO `voucher_sales` (`id`, `date`, `invoice_id`, `customer_id`, `discount_type`, `discount`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `company_id`, `branch_id`) VALUES
(1, '2023-07-05 10:53:00', '1-1-230705-2-1', 1, 0, 0.00, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_sale_payments`
--

CREATE TABLE `voucher_sale_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `voucher_sale_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_type` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refference` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_sale_payments`
--

INSERT INTO `voucher_sale_payments` (`id`, `date`, `voucher_sale_id`, `amount`, `payment_type`, `payment_method`, `description`, `refference`, `created_by`, `company_id`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-07-05 10:53:00', 1, 10000.00, 1, 1, 'Voucher Sale 1-1-230705-2-1 Cash payment.', NULL, 2, 1, 1, '2023-07-04 23:53:38', '2023-07-04 23:53:38', NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_created_by_foreign` (`created_by`),
  ADD KEY `customers_company_id_foreign` (`company_id`);

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
  ADD KEY `purchase_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchased_products_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchased_products_product_id_foreign` (`product_id`),
  ADD KEY `purchased_products_created_by_foreign` (`created_by`),
  ADD KEY `purchased_products_company_id_foreign` (`company_id`),
  ADD KEY `purchased_products_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `purchase_attachments`
--
ALTER TABLE `purchase_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_attachments_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_attachments_created_by_foreign` (`created_by`),
  ADD KEY `purchase_attachments_company_id_foreign` (`company_id`);

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
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `revenues_payment_method_foreign` (`payment_method`),
  ADD KEY `revenues_payment_type_foreign` (`payment_type`),
  ADD KEY `revenues_created_by_foreign` (`created_by`),
  ADD KEY `revenues_company_id_foreign` (`company_id`),
  ADD KEY `revenues_branch_id_foreign` (`branch_id`);

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
-- Indexes for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_products_product_id_foreign` (`product_id`),
  ADD KEY `sales_products_sale_id_foreign` (`sale_id`),
  ADD KEY `sales_products_created_by_foreign` (`created_by`),
  ADD KEY `sales_products_company_id_foreign` (`company_id`),
  ADD KEY `sales_products_branch_id_foreign` (`branch_id`);

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
-- Indexes for table `voucher_sales`
--
ALTER TABLE `voucher_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_sales_customer_id_foreign` (`customer_id`),
  ADD KEY `voucher_sales_created_by_foreign` (`created_by`),
  ADD KEY `voucher_sales_company_id_foreign` (`company_id`),
  ADD KEY `voucher_sales_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `voucher_sale_payments`
--
ALTER TABLE `voucher_sale_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher_sale_payments_voucher_sale_id_foreign` (`voucher_sale_id`),
  ADD KEY `voucher_sale_payments_payment_method_foreign` (`payment_method`),
  ADD KEY `voucher_sale_payments_created_by_foreign` (`created_by`),
  ADD KEY `voucher_sale_payments_company_id_foreign` (`company_id`),
  ADD KEY `voucher_sale_payments_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cheque_issued`
--
ALTER TABLE `cheque_issued`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company_bank_info`
--
ALTER TABLE `company_bank_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules_sub`
--
ALTER TABLE `modules_sub`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_companies`
--
ALTER TABLE `product_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_language`
--
ALTER TABLE `product_language`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_multiple_alliance`
--
ALTER TABLE `product_multiple_alliance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_unit_types`
--
ALTER TABLE `product_unit_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchased_products`
--
ALTER TABLE `purchased_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_attachments`
--
ALTER TABLE `purchase_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sales_products`
--
ALTER TABLE `sales_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usercompanies`
--
ALTER TABLE `usercompanies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `voucher_payments`
--
ALTER TABLE `voucher_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_sales`
--
ALTER TABLE `voucher_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher_sale_payments`
--
ALTER TABLE `voucher_sale_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `company_bank_info`
--
ALTER TABLE `company_bank_info`
  ADD CONSTRAINT `company_bank_info_bank_branch_id_foreign` FOREIGN KEY (`bank_branch_id`) REFERENCES `bank_branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_bank_info_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_suppliers_id_foreign` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchased_products`
--
ALTER TABLE `purchased_products`
  ADD CONSTRAINT `purchased_products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_products_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_attachments`
--
ALTER TABLE `purchase_attachments`
  ADD CONSTRAINT `purchase_attachments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_attachments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_attachments_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchase_payments`
--
ALTER TABLE `purchase_payments`
  ADD CONSTRAINT `purchase_payments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_payments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_payments_payment_method_foreign` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_payments_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `revenues`
--
ALTER TABLE `revenues`
  ADD CONSTRAINT `revenues_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revenues_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revenues_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revenues_payment_method_foreign` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revenues_payment_type_foreign` FOREIGN KEY (`payment_type`) REFERENCES `payment_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_rtn_bill_id_foreign` FOREIGN KEY (`rtn_bill_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_products`
--
ALTER TABLE `sales_products`
  ADD CONSTRAINT `sales_products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_products_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `suppliers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `usercompanies`
--
ALTER TABLE `usercompanies`
  ADD CONSTRAINT `usercompanies_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usercompanies_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usercompanies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vouchers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vouchers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_payments`
--
ALTER TABLE `voucher_payments`
  ADD CONSTRAINT `voucher_payments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_payments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_payments_revenue_id_foreign` FOREIGN KEY (`revenue_id`) REFERENCES `revenues` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_payments_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_sales`
--
ALTER TABLE `voucher_sales`
  ADD CONSTRAINT `voucher_sales_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sales_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sales_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `voucher_sale_payments`
--
ALTER TABLE `voucher_sale_payments`
  ADD CONSTRAINT `voucher_sale_payments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sale_payments_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sale_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sale_payments_payment_method_foreign` FOREIGN KEY (`payment_method`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voucher_sale_payments_voucher_sale_id_foreign` FOREIGN KEY (`voucher_sale_id`) REFERENCES `voucher_sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
