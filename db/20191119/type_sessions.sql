-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 09:01 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phw`
--

-- --------------------------------------------------------

--
-- Table structure for table `type_sessions`
--

CREATE TABLE `type_sessions` (
  `id_type_sessions` int(11) NOT NULL,
  `name_type_sessions` varchar(255) DEFAULT NULL,
  `category` int(10) NOT NULL,
  `total_sessions` int(11) DEFAULT NULL,
  `price_session` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_sessions`
--

INSERT INTO `type_sessions` (`id_type_sessions`, `name_type_sessions`, `category`, `total_sessions`, `price_session`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rehab', 2, 10, '90', NULL, NULL, '2019-11-19 07:50:02'),
(2, 'Suction', 2, 10, '50', NULL, NULL, '2019-11-19 07:50:06'),
(3, 'Sport Massage', 2, 10, '90', NULL, NULL, '2019-11-19 07:50:09'),
(4, 'Shockwave', 2, 10, '20', NULL, NULL, '2019-11-19 07:50:13'),
(5, 'Nebulizer', 2, 10, '90', NULL, NULL, '2019-11-19 07:50:21'),
(6, 'Others', 2, 0, '0', NULL, NULL, '2019-11-19 07:50:24'),
(7, 'Rehab', 1, 1, NULL, NULL, NULL, NULL),
(8, 'Others', 1, 1, NULL, NULL, NULL, NULL),
(9, 'Nebulizer', 1, 1, NULL, NULL, NULL, NULL),
(10, 'Suction', 1, 1, NULL, NULL, NULL, NULL),
(11, 'Sport Massage', 1, 1, NULL, NULL, NULL, NULL),
(12, 'Sport Massage', 1, 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `type_sessions`
--
ALTER TABLE `type_sessions`
  ADD PRIMARY KEY (`id_type_sessions`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type_sessions`
--
ALTER TABLE `type_sessions`
  MODIFY `id_type_sessions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
