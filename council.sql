-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2020 at 02:09 PM
-- Server version: 10.2.29-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `council`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_id`, `name`, `surname`, `phonenumber`, `employee_num`, `created_at`, `updated_at`) VALUES
(1, '1', 'Webster', 'Mosws', '0771477878', '2020', '2020-01-26 17:26:09', '2020-01-26 17:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Gweru', '2020-01-26 18:04:53', '2020-01-26 18:04:53'),
(4, 'Harare', '2020-01-26 18:42:53', '2020-01-26 18:42:53'),
(5, 'Kadoma City', '2020-01-27 13:02:54', '2020-02-04 00:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `compalaints`
--

CREATE TABLE `compalaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compalaints`
--

INSERT INTO `compalaints` (`id`, `res_id`, `complain`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Sewage ranetsa', 'Resolved', NULL, '2020-02-04 02:33:09'),
(2, '3', 'Mvura haizi kubuda', 'Resolved', NULL, NULL),
(3, '3', 'Mvura haizi kubuda', 'Pending', '2020-02-07 11:19:35', '2020-02-07 11:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `councils`
--

CREATE TABLE `councils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `councils`
--

INSERT INTO `councils` (`id`, `name`, `city`, `created_at`, `updated_at`) VALUES
(2, 'Gweru Main', '3', '2020-01-26 19:13:54', '2020-01-26 19:13:54'),
(3, 'Moris Depo Council 1', '5', '2020-01-26 19:14:07', '2020-02-04 01:07:00'),
(4, 'Kadoma City Council', '5', '2020-01-27 13:03:22', '2020-01-27 13:03:22');

-- --------------------------------------------------------

--
-- Table structure for table `council_users`
--

CREATE TABLE `council_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `council_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `council_users`
--

INSERT INTO `council_users` (`id`, `user_id`, `council_id`, `name`, `surname`, `employee_id`, `phonenumber`, `status`, `created_at`, `updated_at`) VALUES
(1, '5', '2', 'Timothy', 'Moswa', '1234567', '0771407147', 'Active', '2020-01-26 19:16:24', '2020-01-26 19:16:24'),
(2, '6', '2', 'Webster', 'Moswa', '30909', '0771407147', 'Active', '2020-01-27 10:11:57', '2020-01-27 10:11:57'),
(3, '9', '2', 'Michelle', 'Machaya Kunaka', '709020', '077404040', 'Active', '2020-01-27 13:05:24', '2020-02-04 01:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `city`, `addBy`, `created_at`, `updated_at`) VALUES
(2, 'Mkoba', '3', '1234567', '2020-02-04 01:32:21', '2020-02-04 01:32:21'),
(4, 'Kio', '5', '7090', '2020-01-27 13:06:08', '2020-01-27 13:06:08'),
(5, 'Woodlands Park', '3', '1234567', '2020-02-04 01:32:21', '2020-02-04 01:32:21'),
(6, 'Mambo', '3', '1234567', '2020-02-07 10:57:32', '2020-02-07 10:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_08_184145_create_residents_table', 1),
(4, '2019_04_08_184232_create_compalaints_table', 1),
(5, '2019_04_08_184918_create_locations_table', 1),
(6, '2019_04_11_093342_create_notifications_table', 1),
(7, '2020_01_26_162053_create_admins_table', 1),
(8, '2020_01_26_162344_create_resident_accounts_table', 1),
(9, '2020_01_26_162635_create_payments_table', 1),
(10, '2020_01_26_162911_create_messages_table', 1),
(11, '2020_01_26_170956_create_councils_table', 2),
(12, '2020_01_26_171158_create_council_users_table', 2),
(13, '2020_01_26_195149_create_cities_table', 3),
(14, '2020_01_27_133442_create_purchases_table', 4),
(15, '2020_01_27_133544_create_transactions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addedBy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `litres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `litres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `user_id`, `name`, `national_id`, `gender`, `phonenumber`, `house_number`, `location_id`, `created_at`, `updated_at`) VALUES
(2, '8', 'Timothy Moswa', '29295480N07', 'Male', '0771407147', '8080', '2', '2020-01-27 11:02:30', '2020-01-27 11:02:30'),
(3, '10', 'Kim Muzire', '2929548090M07', 'Male', '0771303030', '50507090', '2', '2020-01-27 13:07:29', '2020-02-07 10:59:52'),
(4, '12', 'Thandiwe Chireshe', '290909090', 'Female', '07714076189', '1234', '6', '2020-02-07 10:59:39', '2020-02-07 10:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `resident_accounts`
--

CREATE TABLE `resident_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `res_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resident_accounts`
--

INSERT INTO `resident_accounts` (`id`, `res_id`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '0', 'Disabled', '2020-01-27 11:02:30', '2020-01-27 11:02:30'),
(2, '3', '150', 'Active', '2020-01-27 13:07:29', '2020-02-07 12:08:25'),
(3, '4', '0', 'Disabled', '2020-02-07 10:59:40', '2020-02-07 10:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_record` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_action` enum('add','subtract','set') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'set',
  `amount` double(8,2) NOT NULL,
  `instrument` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poll_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `payment_model`, `payment_record`, `payment_column`, `payment_action`, `amount`, `instrument`, `poll_url`, `paid`, `value`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL, NULL, 'set', 3.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=65b36fa2-ccb4-4db4-9095-18c615ffe253', 0, NULL, '2020-01-27 12:01:44', '2020-01-27 12:01:55'),
(2, '', NULL, NULL, NULL, 'set', 4.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=1f25da94-5e4e-4161-99db-29cca1c41d30', 0, NULL, '2020-01-27 12:11:39', '2020-01-27 12:11:59'),
(3, '', NULL, NULL, NULL, 'set', 3.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=d4a74c89-78c8-4107-a248-ae08de07d842', 0, NULL, '2020-01-27 12:25:23', '2020-01-27 12:25:34'),
(4, '', NULL, NULL, NULL, 'set', 3.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=0c1a4916-33dd-4a4e-9dd7-8e84e1f8b7b6', 0, NULL, '2020-01-27 12:25:24', '2020-01-27 12:25:30'),
(5, '', NULL, NULL, NULL, 'set', 8.00, '0771407147', NULL, 0, NULL, '2020-01-27 13:10:51', '2020-01-27 13:10:51'),
(6, '', NULL, NULL, NULL, 'set', 7.00, '0771407147', NULL, 0, NULL, '2020-01-27 13:11:53', '2020-01-27 13:11:53'),
(7, '', NULL, NULL, NULL, 'set', 2.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=f47f9eac-71d9-4adb-99b1-08619005c197', 0, NULL, '2020-02-07 11:02:04', '2020-02-07 11:02:13'),
(8, '10', NULL, NULL, NULL, 'set', 20.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=52c8f6e2-773e-409e-9902-a8f92458fdaa', 0, NULL, '2020-02-07 12:03:02', '2020-02-07 12:03:05'),
(9, '10', NULL, NULL, NULL, 'set', 3.00, '0771407147', 'https://www.paynow.co.zw/Interface/CheckPayment/?guid=8906f75b-26c3-465e-9dbc-338dd1b6e46d', 0, NULL, '2020-02-07 12:08:22', '2020-02-07 12:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isFirstTime` tinyint(1) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `res_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `isFirstTime`, `status`, `access`, `res_id`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Webster Mosws', '2020', 1, 'Active', 'Admin', NULL, '$2y$10$5umVYORwiWLkcabXq8FZ4uvT836LjrpP97HBUZZ4esewY8PlhvdXW', NULL, '2020-01-26 17:26:09', '2020-02-04 01:31:08'),
(5, 'Timothy', '1234567', 1, 'Active', 'Council', NULL, '$2y$10$G/Cxzs7lAlly1W2pylGNoeDVaIQNcdfO5q65bQqDQhQ.R1T8asoZW', NULL, '2020-01-26 19:16:24', '2020-01-26 19:16:24'),
(6, 'Webster', '30909', 1, 'Active', 'Council', NULL, '$2y$10$qjpIlXxSxIDnFcy6p.lcdeuCA0wZJq6kmXeatBqx4wbO2cDqZzX2C', NULL, '2020-01-27 10:11:57', '2020-01-27 10:11:57'),
(7, 'Webster Moswa', '29295480M07', 1, 'Active', 'Resident', NULL, '$2y$10$2DTAJByHVWQ6ROZNqKVqCuINdDjaiLGZjZJmj568cAL7bMzzbzB.O', NULL, '2020-01-27 11:00:32', '2020-01-27 11:00:32'),
(8, 'Timothy Moswa', '29295480N07', 1, 'Active', 'Resident', NULL, '$2y$10$4bqFjNiHkvDpyPTe43k5ZOiTFWbpwaUMjFPZfcAbePaU6cxN5WjMe', NULL, '2020-01-27 11:02:30', '2020-01-27 11:02:30'),
(9, 'Michelle', '709020', 1, 'Active', 'Council', NULL, '$2y$10$xR80qAV94WJi/3gWxIkOrOmuEJpBwilXEHintFXZwyxnqIGJfIlSu', NULL, '2020-01-27 13:05:24', '2020-02-04 01:25:09'),
(10, 'Kim Muzire', '2929548090M0750507090', 1, 'Active', 'Resident', '3', '$2y$10$kypTAICBoW1KO7LPgZh1vewfSBYlJW1L5SYslpLBV2k3u0qhrc/26', NULL, '2020-01-27 13:07:29', '2020-02-07 11:58:01'),
(12, 'Thandiwe Chireshe', '2909090901234', 1, 'Active', 'Resident', NULL, '$2y$10$hbciLwD1ZwoBquhP1ZAJ8eFhlm3vWgkBMKuazVZ3bDMFSz4HPGmnS', NULL, '2020-02-07 10:59:39', '2020-02-07 10:59:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compalaints`
--
ALTER TABLE `compalaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `councils`
--
ALTER TABLE `councils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `council_users`
--
ALTER TABLE `council_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_accounts`
--
ALTER TABLE `resident_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `compalaints`
--
ALTER TABLE `compalaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `councils`
--
ALTER TABLE `councils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `council_users`
--
ALTER TABLE `council_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resident_accounts`
--
ALTER TABLE `resident_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
