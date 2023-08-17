-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 11:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$CGTGuQxac1PhINzn0pO.AekR7CdK70xGi2NGHCa..lxX3CvpFOjlq', NULL, '2020-03-05 18:47:57', '2020-03-05 18:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `entry_date`, `created_at`, `updated_at`) VALUES
(384, 'Aarong', '2020-03-11', '2020-03-11 07:20:38', '2020-03-11 07:20:38'),
(385, 'Yellow', '2020-03-11', '2020-03-11 07:20:52', '2020-03-11 07:20:52'),
(386, 'Cats Eye', '2020-03-11', '2020-03-11 07:21:00', '2020-03-11 07:21:00'),
(387, 'RichMan', '2020-03-11', '2020-03-11 07:21:08', '2020-03-11 07:21:08'),
(388, 'Easy', '2020-03-11', '2020-03-11 07:21:16', '2020-03-11 07:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `brand_id`, `model_id`, `name`, `entry_date`, `created_at`, `updated_at`) VALUES
(53, 385, 50, 'Pant 100', '2020-03-11 02:22:57', '2020-03-11 07:22:57', '2020-03-11 07:22:57'),
(54, 384, 51, 'Shirt 200', '2020-03-11 02:23:25', '2020-03-11 07:23:25', '2020-03-11 07:23:25'),
(55, 385, 52, 'T-Shirt 50', '2020-03-11 02:23:55', '2020-03-11 07:23:55', '2020-03-11 07:23:55'),
(56, 387, 59, 'Cap 500', '2020-03-11 09:59:57', '2020-03-11 14:59:57', '2020-03-11 14:59:57'),
(57, 387, 56, 'Sari 501', '2020-03-11 10:00:38', '2020-03-11 15:00:38', '2020-03-11 15:00:38'),
(58, 388, 56, 'Bags 300', '2020-03-11 10:02:50', '2020-03-11 15:02:50', '2020-03-11 15:02:50'),
(59, 386, 57, 'Wallet', '2020-03-11 10:03:06', '2020-03-11 15:03:06', '2020-03-11 15:03:06'),
(60, 385, 55, 'Gold', '2020-03-11 10:03:24', '2020-03-11 15:03:24', '2020-03-11 15:03:24'),
(61, 386, 56, 'Silber', '2020-03-11 10:03:36', '2020-03-11 15:03:36', '2020-03-11 15:03:36'),
(62, 385, 56, 'Frock 605', '2020-03-11 10:04:05', '2020-03-11 15:04:05', '2020-03-11 15:04:05'),
(63, 384, 58, 'Saree 605', '2020-03-11 10:04:20', '2020-03-11 15:04:20', '2020-03-11 15:04:20'),
(64, 386, 55, 'Cups', '2020-03-11 10:04:43', '2020-03-11 15:04:43', '2020-03-11 15:04:43'),
(65, 384, 57, 'Mogs', '2020-03-11 10:04:52', '2020-03-11 15:04:52', '2020-03-11 15:04:52'),
(66, 384, 54, 'Trays', '2020-03-11 10:05:15', '2020-03-11 15:05:15', '2020-03-11 15:05:15'),
(67, 384, 57, 'Runner', '2020-03-11 10:05:25', '2020-03-11 15:05:25', '2020-03-11 15:05:25'),
(68, 386, 57, 'Photo Frames', '2020-03-11 10:05:49', '2020-03-11 15:05:49', '2020-03-11 15:05:49'),
(69, 386, 58, 'Golds', '2020-03-11 10:06:14', '2020-03-11 15:06:14', '2020-03-11 15:06:14'),
(70, 385, 55, 'Silver', '2020-03-11 10:06:25', '2020-03-11 15:06:25', '2020-03-11 15:06:25'),
(71, 384, 58, 'Panjabi', '2020-03-11 10:06:47', '2020-03-11 15:06:47', '2020-03-11 15:06:47'),
(72, 386, 58, 'Pajama', '2020-03-11 10:06:57', '2020-03-11 15:06:57', '2020-03-11 15:06:57'),
(73, 386, 58, 'Kurta', '2020-03-11 10:07:11', '2020-03-11 15:07:11', '2020-03-11 15:07:11'),
(74, 386, 60, 'Pearl', '2020-03-11 10:07:33', '2020-03-11 15:07:33', '2020-03-11 15:07:33'),
(75, 386, 58, 'Pant Top', '2020-03-11 10:07:52', '2020-03-11 15:07:52', '2020-03-11 15:07:52'),
(76, 387, 59, 'Gift SETS', '2020-03-11 10:08:04', '2020-03-11 15:08:04', '2020-03-11 15:08:04'),
(77, 387, 57, 'Casual 200', '2020-03-11 10:08:37', '2020-03-11 15:08:37', '2020-03-11 15:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 3),
(7, '2014_10_12_100000_create_password_resets_table', 3),
(8, '2019_08_19_000000_create_failed_jobs_table', 3),
(9, '2020_01_16_073354_create_admins_table', 3),
(20, '2020_03_05_133830_create_brand_table', 12),
(21, '2020_03_05_134643_create_models_table', 13),
(22, '2020_03_05_135434_create_items_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entry_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand_id`, `name`, `entry_date`, `created_at`, `updated_at`) VALUES
(50, 385, 'M-2020', '2020-03-11 02:21:55', '2020-03-11 07:21:55', '2020-03-11 07:21:55'),
(51, 384, 'K-2019', '2020-03-11 02:22:11', '2020-03-11 07:22:11', '2020-03-11 07:22:11'),
(52, 386, 'M-2021', '2020-03-11 02:22:24', '2020-03-11 07:22:24', '2020-03-11 07:22:24'),
(54, 387, 'C-2018', '2020-03-11 09:58:03', '2020-03-11 14:58:03', '2020-03-11 14:58:03'),
(55, 387, 'S-2011', '2020-03-11 09:58:21', '2020-03-11 14:58:21', '2020-03-11 14:58:21'),
(56, 386, 'W-2019', '2020-03-11 09:58:36', '2020-03-11 14:58:36', '2020-03-11 14:58:36'),
(57, 385, 'D-2012', '2020-03-11 09:58:52', '2020-03-11 14:58:52', '2020-03-11 14:58:52'),
(58, 387, 'R-2019', '2020-03-11 09:59:03', '2020-03-11 14:59:03', '2020-03-11 14:59:03'),
(59, 384, 'O-2013', '2020-03-11 09:59:15', '2020-03-11 14:59:15', '2020-03-11 14:59:15'),
(60, 387, 'L-2016', '2020-03-11 09:59:28', '2020-03-11 14:59:28', '2020-03-11 14:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Fazley Rabbi', 'fazleyrabbicse@gmail.com', NULL, '$2y$10$cFjH50/dZ6We7FKwjzB8Jur6erhKyawKMDN3ILGYtjV261FO104fu', NULL, '2020-01-20 00:43:51', '2020-01-20 00:43:51');

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
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=390;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
