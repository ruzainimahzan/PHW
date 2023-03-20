-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 07:35 AM
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
-- Table structure for table `nursing_monthly_report`
--

CREATE TABLE `nursing_monthly_report` (
  `id_monthly_report` int(11) NOT NULL,
  `id_diagnose` int(11) DEFAULT NULL,
  `date_monthly_report` date DEFAULT NULL,
  `month` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT NULL,
  `remarks` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursing_monthly_report`
--

INSERT INTO `nursing_monthly_report` (`id_monthly_report`, `id_diagnose`, `date_monthly_report`, `month`, `remarks`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, '2020-02-01', 'February', 'Test', 'PHW00005', '2020-02-02 09:19:41', '2020-02-02 09:19:41', NULL),
(3, 12, '2020-02-04', 'February', 'Edit monthly report February', 'PHW00005', '2020-02-03 21:49:41', '2020-02-03 21:49:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nursing_monthly_report`
--
ALTER TABLE `nursing_monthly_report`
  ADD PRIMARY KEY (`id_monthly_report`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nursing_monthly_report`
--
ALTER TABLE `nursing_monthly_report`
  MODIFY `id_monthly_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
