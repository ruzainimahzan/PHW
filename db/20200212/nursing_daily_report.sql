-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 02:04 AM
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
-- Table structure for table `nursing_daily_report`
--

CREATE TABLE `nursing_daily_report` (
  `id_daily_report` int(11) NOT NULL,
  `id_diagnose` int(11) DEFAULT NULL,
  `id_monthly_report` int(11) DEFAULT NULL,
  `date_daily_report` date DEFAULT NULL,
  `remarks` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nursing_daily_report`
--
ALTER TABLE `nursing_daily_report`
  ADD PRIMARY KEY (`id_daily_report`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nursing_daily_report`
--
ALTER TABLE `nursing_daily_report`
  MODIFY `id_daily_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
