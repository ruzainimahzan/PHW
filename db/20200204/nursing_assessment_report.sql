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
-- Table structure for table `nursing_assessment_report`
--

CREATE TABLE `nursing_assessment_report` (
  `id_assessment_report` int(11) NOT NULL,
  `date_assessment` date DEFAULT NULL,
  `id_diagnose` int(11) NOT NULL,
  `month` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT NULL,
  `remarks` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_nopad_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nursing_assessment_report`
--

INSERT INTO `nursing_assessment_report` (`id_assessment_report`, `date_assessment`, `id_diagnose`, `month`, `remarks`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2020-02-02', 11, 'February', 'Testttt', 'PHW00005', '2020-02-02 09:20:31', '2020-02-02 09:20:31'),
(2, '2020-02-04', 12, 'February', NULL, 'PHW00005', '2020-02-03 21:49:41', '2020-02-03 21:49:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nursing_assessment_report`
--
ALTER TABLE `nursing_assessment_report`
  ADD PRIMARY KEY (`id_assessment_report`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nursing_assessment_report`
--
ALTER TABLE `nursing_assessment_report`
  MODIFY `id_assessment_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
