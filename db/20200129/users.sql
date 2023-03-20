-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 10:25 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phw_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_no` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `lastname`, `ic`, `staff_no`, `department_id`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(28, 'superadmin', 'mountitfuture', NULL, 'super001', 1, 1, 'superadmin@gmail.com', '2020-01-21 16:00:00', '$2y$10$fxoJtHj9F67kBH7e5Z6Ih.Z1NrwxqeOeK8icMBwxNmZKv16t7gZoO', NULL, '2020-01-21 16:00:00', '2020-01-21 16:00:00', NULL),
(29, 'Admin', 'PHW', NULL, 'PHW00002', 1, 1, 'adminphw@gmail.com', NULL, '$2y$10$AbtHBoEQMr7.UMaRAFE72uw7x3UWWvRTKdTG..ta83FNxV8WUcQZe', 'VZdWbYEVkKEQx5IeLhiOxjiQt6fkKnXeOEtbPHIWr07KyDNE6ut2PSXBMbfK', '2020-01-22 01:28:18', '2020-01-22 01:28:18', NULL),
(30, 'Center', 'PHW', NULL, 'PHW00003', 2, 2, 'centerphwjb@gmail.com', NULL, '$2y$10$ISRn4KrYppXu.LdTyxZkcemhuMsgSUnGXRchgDjwUq9yKYOIFpiCC', NULL, '2020-01-22 04:17:20', '2020-01-22 04:17:20', NULL),
(37, 'Mohamad khuzairie Saffie', NULL, '920613015451', 'PHW00004', 3, 2, 'kembarairie@gmail.com', NULL, '$2y$10$G7LxqS4hlwZbU0W8nQLVmOK8CLtC2cSYU09gfFABuyYf1fIE/BNEG', NULL, '2020-01-27 00:21:47', '2020-01-27 00:21:47', NULL),
(38, 'Mohammad Ruzaini bin Mahzan', NULL, '930823145915', 'PHW00005', 3, 2, 'ruzainimahzan93@gmail.com', NULL, '$2y$10$P6KZTw2pikBH6ERcUd.ALeFG3.Xnut5FqsJwAvHrAIEkmyCsCZW0m', NULL, '2020-01-28 00:58:00', '2020-01-28 00:58:00', NULL),
(39, 'Shafiq', NULL, 'Mahzan', 'PHW00006', 4, 2, 'shafiqmahzan@gmail.com', NULL, '$2y$10$tVzeLHo3RnSzYHd4M1ps2uobJ4c/V6jgvTqN93XYbuTwQ9GgMknaK', 'JEg7barFpiUFqpeRjZfs4kDgqJIKSEEilB2HMwtjn5pTZhcl8RCrsrstY1W2', '2020-01-28 19:10:17', '2020-01-28 19:10:17', NULL),
(40, 'Nursing Admin', NULL, '93082314915', 'PHW00007', 4, 1, 'adminnursing@gmail.com', NULL, '$2y$10$w7Aw7tyWQKjZwDzMcP8PJu7UUx56UBWCokrvUOwlmhDH0t5hm/CkW', 'OjtuZFnu3WRef270ileioLhhuSyiLTsatzbyv78SsWCkpg0x5A0qd6lWC8Yk', '2020-01-29 01:10:35', '2020-01-29 01:10:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
