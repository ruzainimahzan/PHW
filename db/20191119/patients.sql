-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 08:15 AM
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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id_patients` int(11) NOT NULL,
  `fullname_patients` varchar(70) COLLATE utf8_bin NOT NULL,
  `lastname_patients` varchar(70) COLLATE utf8_bin NOT NULL,
  `ic_patients` varchar(12) COLLATE utf8_bin NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `address_patients` text COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(15) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `mrn_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `staff_no` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `assign_to` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `register_at` text COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id_patients`, `fullname_patients`, `lastname_patients`, `ic_patients`, `age`, `gender`, `address_patients`, `phone_number`, `created_at`, `updated_at`, `deleted_at`, `mrn_no`, `staff_no`, `assign_to`, `register_at`, `created_by`) VALUES
(16, 'Mohamad', 'Khuzairie Saffie', '920613015451', 27, 'Male', 'No 33  , Jalan Setia 5/4 , Taman Setia Indah , 81100 Johor Bahru', '0177965161', '2019-08-22 15:19:32', '2019-08-22 15:19:32', NULL, 'PNT00001', 'PHW0001', 'PHW0001', NULL, 2),
(19, 'Mohammad Ruzaini', 'Mahzan', '930823145915', 22, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '177654822', '2019-09-28 10:54:30', '2019-09-28 10:54:30', NULL, 'PNT00002', NULL, 'PHW00002', 'center', 2),
(20, 'Ruzaini', 'Mahzan', '9809809808', 22, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '177654822', '2019-09-03 14:40:51', '2019-09-03 14:40:51', NULL, 'PNT00003', NULL, 'PHW00002', 'outside', 2),
(21, 'Mad', 'Tahar', '1234567890', 25, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '01234567890', '2019-09-12 11:53:55', '2019-09-12 11:53:55', NULL, 'PNT00004', NULL, 'PHW00003', 'center', 2),
(22, 'Mangkuk', 'Ayun', '920613015451', 27, 'Male', NULL, '0177965161', '2019-11-18 22:53:14', '2019-11-18 22:53:14', NULL, 'PNT00005', NULL, NULL, 'center', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patients`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
