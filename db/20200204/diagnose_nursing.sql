-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 07:33 AM
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
-- Table structure for table `diagnose_nursing`
--

CREATE TABLE `diagnose_nursing` (
  `id_diagnose` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `reference_no` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `doctor_diagnose` text COLLATE utf8_bin DEFAULT NULL,
  `doctor_management` text COLLATE utf8_bin DEFAULT NULL,
  `problem` text COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `type_department` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '1998-12-31 16:00:00',
  `id_package` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `diagnose_nursing`
--

INSERT INTO `diagnose_nursing` (`id_diagnose`, `id_patients`, `reference_no`, `doctor_diagnose`, `doctor_management`, `problem`, `created_by`, `type_department`, `created_at`, `updated_at`, `id_package`) VALUES
(11, 1, 'FLPT00001', 'Test Nursing', NULL, NULL, NULL, NULL, '2020-02-02 09:19:01', '2020-02-02 09:19:01', NULL),
(12, 4, 'FLPT00002', 'Stroke', NULL, NULL, NULL, NULL, '2020-02-03 21:49:17', '2020-02-03 21:49:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnose_nursing`
--
ALTER TABLE `diagnose_nursing`
  ADD PRIMARY KEY (`id_diagnose`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnose_nursing`
--
ALTER TABLE `diagnose_nursing`
  MODIFY `id_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
