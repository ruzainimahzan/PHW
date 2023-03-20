-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2020 at 04:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `id_assigned` int(11) NOT NULL,
  `id_diagnose` int(11) NOT NULL,
  `id_staff` varchar(50) NOT NULL,
  `id_treatment` int(11) NOT NULL,
  `task_status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`id_assigned`, `id_diagnose`, `id_staff`, `id_treatment`, `task_status`, `created_at`, `updated_at`) VALUES
(4, 29, 'PHW00001', 24, 0, '2019-09-15 23:42:17', '2019-09-15 23:42:17'),
(5, 30, 'PHW00002', 25, 0, '2019-09-15 23:43:15', '2019-09-15 23:43:15'),
(6, 31, 'PHW00003', 26, 0, '2019-09-16 03:46:56', '2019-09-16 03:46:56'),
(7, 32, 'PHW00003', 27, 0, '2019-09-16 04:17:49', '2019-09-16 04:17:49'),
(8, 33, 'PHW00004', 29, 0, '2019-09-25 04:56:27', '2019-09-25 04:56:27'),
(9, 34, 'PHW00005', 33, 0, '2019-09-25 09:00:19', '2019-09-25 09:00:19'),
(10, 35, 'PHW00005', 34, 0, '2019-09-25 09:01:17', '2019-09-25 09:01:17'),
(11, 36, 'PHW00005', 35, 0, '2019-09-25 09:02:43', '2019-09-25 09:02:43'),
(12, 38, 'PHW00002', 36, 0, '2019-09-25 09:21:44', '2019-09-25 09:21:44'),
(13, 32, 'PHW00002', 32, 0, '2019-09-26 14:05:48', '2019-09-26 05:59:14'),
(15, 32, 'PHW00002', 45, 0, '2019-09-26 06:00:46', '2019-09-26 06:00:46'),
(16, 39, 'PHW00002', 46, 0, '2019-09-26 06:15:59', '2019-09-26 06:15:59'),
(17, 39, 'PHW00004', 47, 0, '2019-09-26 06:16:21', '2019-09-26 06:16:21'),
(18, 37, 'PHW00001', 48, 1, '2019-09-28 09:21:27', '2019-09-28 01:20:51'),
(19, 37, 'PHW00005', 49, 0, '2019-09-28 01:22:28', '2019-09-28 01:22:28'),
(20, 37, 'PHW00001', 50, 0, '2019-09-28 01:23:16', '2019-09-28 01:23:16'),
(21, 37, 'PHW00001', 51, 0, '2019-09-28 02:25:03', '2019-09-28 02:25:03'),
(22, 40, 'PHW00002', 52, 0, '2019-10-09 03:42:56', '2019-10-09 03:42:56'),
(23, 41, 'PHW00005', 53, 0, '2019-10-09 03:46:38', '2019-10-09 03:46:38'),
(24, 42, 'PHW00002', 54, 0, '2019-10-09 04:13:07', '2019-10-09 04:13:07'),
(25, 43, 'PHW00002', 55, 0, '2019-10-09 04:22:14', '2019-10-09 04:22:14'),
(26, 44, 'PHW00002', 56, 0, '2019-10-09 04:22:30', '2019-10-09 04:22:30'),
(27, 45, 'PHW00002', 57, 0, '2019-10-09 04:24:47', '2019-10-09 04:24:47'),
(28, 46, 'PHW00002', 58, 0, '2019-10-09 04:31:08', '2019-10-09 04:31:08'),
(29, 46, 'PHW00001', 59, 0, '2019-10-09 04:31:23', '2019-10-09 04:31:23'),
(30, 46, 'PHW00001', 60, 0, '2019-10-09 04:47:32', '2019-10-09 04:47:32'),
(31, 47, 'PHW00001', 61, 0, '2019-10-09 04:48:05', '2019-10-09 04:48:05'),
(32, 47, 'PHW00001', 62, 0, '2019-10-09 04:53:19', '2019-10-09 04:53:19'),
(33, 47, 'PHW00001', 63, 0, '2019-10-09 04:54:03', '2019-10-09 04:54:03'),
(34, 47, 'PHW00001', 64, 0, '2019-10-09 05:03:26', '2019-10-09 05:03:26'),
(35, 47, 'PHW00001', 65, 0, '2019-10-09 05:04:24', '2019-10-09 05:04:24'),
(36, 49, 'PHW00001', 66, 0, '2019-10-09 05:05:29', '2019-10-09 05:05:29'),
(37, 50, 'PHW00001', 67, 0, '2019-11-20 04:12:10', '2019-11-20 04:12:10'),
(38, 51, 'PHW00002', 68, 1, '2019-11-27 17:07:46', '2019-11-27 08:43:51'),
(39, 52, 'PHW00002', 69, 0, '2019-11-27 08:44:38', '2019-11-27 08:44:38'),
(40, 53, 'PHW00002', 70, 0, '2019-11-27 08:51:13', '2019-11-27 08:51:13'),
(41, 54, 'PHW00002', 71, 0, '2019-11-27 09:02:40', '2019-11-27 09:02:40'),
(42, 52, 'PHW00002', 72, 0, '2019-11-27 09:46:16', '2019-11-27 09:46:16'),
(43, 55, 'PHW00001', 73, 0, '2019-12-01 19:22:29', '2019-12-01 19:22:29'),
(44, 56, 'PHW00001', 74, 0, '2019-12-01 19:23:29', '2019-12-01 19:23:29'),
(45, 57, 'PHW00001', 75, 0, '2019-12-01 19:38:22', '2019-12-01 19:38:22'),
(46, 42, 'PHW00001', 76, 0, '2019-12-01 19:39:54', '2019-12-01 19:39:54'),
(47, 42, 'PHW00001', 77, 0, '2019-12-01 19:42:59', '2019-12-01 19:42:59'),
(48, 61, 'PHW00002', 78, 1, '2020-01-03 00:43:57', '2020-01-02 16:41:56'),
(49, 62, 'PHW00002', 79, 0, '2020-01-02 16:47:47', '2020-01-02 16:47:47'),
(50, 63, 'PHW00002', 80, 0, '2020-01-02 16:48:36', '2020-01-02 16:48:36'),
(51, 64, 'PHW00002', 81, 0, '2020-01-02 16:50:45', '2020-01-02 16:50:45'),
(52, 65, 'PHW00002', 82, 0, '2020-01-02 16:50:54', '2020-01-02 16:50:54'),
(53, 66, 'PHW00002', 83, 0, '2020-01-02 16:51:00', '2020-01-02 16:51:00'),
(54, 67, 'PHW00002', 84, 0, '2020-01-02 16:58:24', '2020-01-02 16:58:24'),
(55, 77, 'PHW00002', 85, 1, '2020-01-03 10:58:44', '2020-01-03 02:57:54'),
(56, 78, 'PHW00002', 86, 1, '2020-01-03 11:13:46', '2020-01-03 03:12:53'),
(57, 79, 'PHW00002', 87, 1, '2020-01-03 11:25:00', '2020-01-03 03:24:38'),
(58, 80, 'PHW00002', 88, 1, '2020-01-03 11:30:33', '2020-01-03 03:29:56'),
(59, 81, 'PHW00002', 89, 1, '2020-01-03 12:43:50', '2020-01-03 04:42:45'),
(60, 82, 'PHW00002', 90, 1, '2020-01-03 12:52:00', '2020-01-03 04:51:46'),
(61, 83, 'PHW00002', 91, 1, '2020-01-03 12:57:55', '2020-01-03 04:57:39'),
(62, 84, 'PHW00002', 92, 1, '2020-01-03 13:43:10', '2020-01-03 05:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'walk-in'),
(2, 'session-phw');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id_department` int(11) NOT NULL,
  `name_department` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id_department`, `name_department`, `created_at`, `updated_at`) VALUES
(1, 'HQ', '2019-08-22 15:47:24', '0000-00-00 00:00:00'),
(2, 'Therapist', '2019-08-22 15:47:19', '0000-00-00 00:00:00'),
(3, 'Nursing', '2019-08-22 15:47:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `diagnose`
--

CREATE TABLE `diagnose` (
  `id_diagnose` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `reference_no` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `doctor_diagnose` text COLLATE utf8_bin DEFAULT NULL,
  `doctor_management` text COLLATE utf8_bin DEFAULT NULL,
  `problem` text COLLATE utf8_bin DEFAULT NULL,
  `pain_scale` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `area` text COLLATE utf8_bin DEFAULT NULL,
  `nature` text COLLATE utf8_bin DEFAULT NULL,
  `agg` text COLLATE utf8_bin DEFAULT NULL,
  `ease` text COLLATE utf8_bin DEFAULT NULL,
  `hours` text COLLATE utf8_bin DEFAULT NULL,
  `irrirability_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `general_health` text COLLATE utf8_bin DEFAULT NULL,
  `pmhx_surgery` text COLLATE utf8_bin DEFAULT NULL,
  `mri_xray` text COLLATE utf8_bin DEFAULT NULL,
  `medication_steroid` text COLLATE utf8_bin DEFAULT NULL,
  `occupation_recreation` text COLLATE utf8_bin DEFAULT NULL,
  `current_history` text COLLATE utf8_bin DEFAULT NULL,
  `past_history` text COLLATE utf8_bin DEFAULT NULL,
  `observation` text COLLATE utf8_bin DEFAULT NULL,
  `palpation` text COLLATE utf8_bin DEFAULT NULL,
  `movement_join` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `movement_join_des` text COLLATE utf8_bin DEFAULT NULL,
  `special_test` text COLLATE utf8_bin DEFAULT NULL,
  `neurological_motor` text COLLATE utf8_bin DEFAULT NULL,
  `neurological_seasation` text COLLATE utf8_bin DEFAULT NULL,
  `neurological_reflexes` text COLLATE utf8_bin DEFAULT NULL,
  `clearing_test_other_joins` text COLLATE utf8_bin DEFAULT NULL,
  `physiotherapist_impression` text COLLATE utf8_bin DEFAULT NULL,
  `short_term_goals` text COLLATE utf8_bin DEFAULT NULL,
  `long_term_goals` text COLLATE utf8_bin DEFAULT NULL,
  `plan_of_treatment` text COLLATE utf8_bin DEFAULT NULL,
  `treatment_status_id` int(11) DEFAULT NULL,
  `need_treatment` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `type_department` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '1998-12-31 16:00:00',
  `id_package` int(11) DEFAULT NULL,
  `total_payment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_type_session` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `id_session_category` int(11) DEFAULT NULL,
  `total_session` int(11) DEFAULT NULL,
  `price_session` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `balance_amount` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `current_session` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `diagnose`
--

INSERT INTO `diagnose` (`id_diagnose`, `id_patients`, `reference_no`, `doctor_diagnose`, `doctor_management`, `problem`, `pain_scale`, `area`, `nature`, `agg`, `ease`, `hours`, `irrirability_id`, `general_health`, `pmhx_surgery`, `mri_xray`, `medication_steroid`, `occupation_recreation`, `current_history`, `past_history`, `observation`, `palpation`, `movement_join`, `movement_join_des`, `special_test`, `neurological_motor`, `neurological_seasation`, `neurological_reflexes`, `clearing_test_other_joins`, `physiotherapist_impression`, `short_term_goals`, `long_term_goals`, `plan_of_treatment`, `treatment_status_id`, `need_treatment`, `created_by`, `type_department`, `created_at`, `updated_at`, `id_package`, `total_payment`, `id_type_session`, `id_session_category`, `total_session`, `price_session`, `balance_amount`, `current_session`) VALUES
(84, 16, 'FLPT00002', 'Stroke', 'Jatuh Bilik Air', 'Stroke', '8', 'Left Body', '2', '3', NULL, 'On', 'High', 'Test', 'Test2', 'X-Ray', 'Test3', 'Test1', 'Stroke', 'Good', 'Perlukan Khidmat PHW', 'No', NULL, NULL, 'No Need', 'Y15', 'Nope', 'Yeah', 'Stroke Join', 'Nice', 'Need a movement', 'Healthy', '3 Month', NULL, NULL, NULL, NULL, '2020-01-03 15:27:20', '2020-01-03 07:27:20', NULL, NULL, NULL, 2, 10, '4500', '4000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnose_hq`
--

CREATE TABLE `diagnose_hq` (
  `id_diagnose` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `reference_no` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `doctor_diagnose` text COLLATE utf8_bin DEFAULT NULL,
  `doctor_management` text COLLATE utf8_bin DEFAULT NULL,
  `problem` text COLLATE utf8_bin DEFAULT NULL,
  `pain_scale` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `area` text COLLATE utf8_bin DEFAULT NULL,
  `nature` text COLLATE utf8_bin DEFAULT NULL,
  `agg` text COLLATE utf8_bin DEFAULT NULL,
  `ease` text COLLATE utf8_bin DEFAULT NULL,
  `hours` text COLLATE utf8_bin DEFAULT NULL,
  `irrirability_id` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `general_health` text COLLATE utf8_bin DEFAULT NULL,
  `pmhx_surgery` text COLLATE utf8_bin DEFAULT NULL,
  `mri_xray` text COLLATE utf8_bin DEFAULT NULL,
  `medication_steroid` text COLLATE utf8_bin DEFAULT NULL,
  `occupation_recreation` text COLLATE utf8_bin DEFAULT NULL,
  `current_history` text COLLATE utf8_bin DEFAULT NULL,
  `past_history` text COLLATE utf8_bin DEFAULT NULL,
  `observation` text COLLATE utf8_bin DEFAULT NULL,
  `palpation` text COLLATE utf8_bin DEFAULT NULL,
  `movement_join` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `movement_join_des` text COLLATE utf8_bin DEFAULT NULL,
  `special_test` text COLLATE utf8_bin DEFAULT NULL,
  `neurological_motor` text COLLATE utf8_bin DEFAULT NULL,
  `neurological_seasation` text COLLATE utf8_bin DEFAULT NULL,
  `neurological_reflexes` text COLLATE utf8_bin DEFAULT NULL,
  `clearing_test_other_joins` text COLLATE utf8_bin DEFAULT NULL,
  `physiotherapist_impression` text COLLATE utf8_bin DEFAULT NULL,
  `short_term_goals` text COLLATE utf8_bin DEFAULT NULL,
  `long_term_goals` text COLLATE utf8_bin DEFAULT NULL,
  `plan_of_treatment` text COLLATE utf8_bin DEFAULT NULL,
  `treatment_status_id` int(11) DEFAULT NULL,
  `need_treatment` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `type_department` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '1998-12-31 16:00:00',
  `id_package` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `diagnose_hq`
--

INSERT INTO `diagnose_hq` (`id_diagnose`, `id_patients`, `reference_no`, `doctor_diagnose`, `doctor_management`, `problem`, `pain_scale`, `area`, `nature`, `agg`, `ease`, `hours`, `irrirability_id`, `general_health`, `pmhx_surgery`, `mri_xray`, `medication_steroid`, `occupation_recreation`, `current_history`, `past_history`, `observation`, `palpation`, `movement_join`, `movement_join_des`, `special_test`, `neurological_motor`, `neurological_seasation`, `neurological_reflexes`, `clearing_test_other_joins`, `physiotherapist_impression`, `short_term_goals`, `long_term_goals`, `plan_of_treatment`, `treatment_status_id`, `need_treatment`, `created_by`, `type_department`, `created_at`, `updated_at`, `id_package`) VALUES
(2, 7, NULL, 'Test 3', NULL, 'Unknown', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 23:51:46', '2019-08-01 23:51:46', NULL),
(3, 7, NULL, 'Test 2', NULL, 'Unknown', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-02 08:24:24', '2019-08-01 23:52:30', NULL),
(4, 7, NULL, 'Test 3', NULL, 'Unknown', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-02 00:07:26', '2019-08-02 00:07:26', NULL),
(10, 7, NULL, 'Head Disclocate', 'Testing', NULL, '101', 'qwe', 'qweq', 'qwe', 'qwe', 'On', 'Medium', NULL, NULL, 'not null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'special test', NULL, NULL, NULL, 'clearing test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-02 08:24:39', '2019-06-27 05:02:57', NULL),
(2, 7, NULL, 'Test 3', NULL, 'Unknown', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-01 23:51:46', '2019-08-01 23:51:46', NULL),
(3, 7, NULL, 'Test 2', NULL, 'Unknown', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-02 08:24:24', '2019-08-01 23:52:30', NULL),
(4, 7, NULL, 'Test 3', NULL, 'Unknown', NULL, NULL, NULL, NULL, NULL, 'Select', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-02 00:07:26', '2019-08-02 00:07:26', NULL),
(10, 7, NULL, 'Head Disclocate', 'Testing', NULL, '101', 'qwe', 'qweq', 'qwe', 'qwe', 'On', 'Medium', NULL, NULL, 'not null', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'special test', NULL, NULL, NULL, 'clearing test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-02 08:24:39', '2019-06-27 05:02:57', NULL);

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
(1, 1, NULL, 'Stroke', NULL, NULL, NULL, NULL, '2019-08-04 10:03:58', '1998-12-31 16:00:00', NULL),
(8, 3, NULL, 'Angle Dislocate', NULL, NULL, NULL, NULL, '2019-08-04 08:32:46', '2019-08-04 08:32:46', 8),
(9, 3, NULL, 'Stroke', NULL, NULL, NULL, NULL, '2019-08-05 04:10:09', '2019-08-05 04:10:09', 8),
(10, 3, NULL, 'Angle Dislocate', NULL, NULL, NULL, NULL, '2019-08-05 04:35:34', '2019-08-05 04:35:34', 7);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'Demo Event-1', '2017-09-11', '2017-09-12', '2019-09-05 04:30:18', '2019-09-05 04:30:18'),
(2, 'Demo Event-2', '2017-09-11', '2017-09-13', '2019-09-05 04:30:18', '2019-09-05 04:30:18'),
(3, 'Demo Event-3', '2017-09-14', '2017-09-14', '2019-09-05 04:30:18', '2019-09-05 04:30:18'),
(4, 'Demo Event-3', '2017-09-17', '2017-09-17', '2019-09-05 04:30:18', '2019-09-05 04:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `intake_output_chart`
--

CREATE TABLE `intake_output_chart` (
  `id_intake_output` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `io_date` date DEFAULT NULL,
  `io_time` time DEFAULT NULL,
  `io_oral_fluids` text DEFAULT NULL,
  `io_iv_fluids` text DEFAULT NULL,
  `io_total_intake` text DEFAULT NULL,
  `io_vomitus` text DEFAULT NULL,
  `io_gastric_aspiration` text DEFAULT NULL,
  `io_bowel_open` text DEFAULT NULL,
  `io_urine` text DEFAULT NULL,
  `io_remarks` text DEFAULT NULL,
  `io_total_output` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intake_output_chart`
--

INSERT INTO `intake_output_chart` (`id_intake_output`, `id_patients`, `io_date`, `io_time`, `io_oral_fluids`, `io_iv_fluids`, `io_total_intake`, `io_vomitus`, `io_gastric_aspiration`, `io_bowel_open`, `io_urine`, `io_remarks`, `io_total_output`, `created_at`, `updated_at`) VALUES
(1, 7, '2019-07-11', '23:45:00', '12', '332', 'asd', 'asda', 'asd', 'asd', 'asd', 'qweqweqweqe', 'qwe', '2019-07-02 07:42:12', '2019-07-02 07:42:12'),
(3, 7, '2019-07-17', '01:30:00', '12', '332', 'asd', 'asda', 'asd', 'asd', 'asd', 'asdasdadadd', 'asd', '2019-07-02 09:30:43', '2019-07-02 09:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `irrirability`
--

CREATE TABLE `irrirability` (
  `id_irrilability` int(11) NOT NULL,
  `name_irrilability` varchar(40) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `irrirability`
--

INSERT INTO `irrirability` (`id_irrilability`, `name_irrilability`, `created_at`, `updated_at`) VALUES
(1, 'high', '2019-06-22 05:10:16', '0000-00-00 00:00:00'),
(2, 'medium', '2019-06-22 05:10:16', '0000-00-00 00:00:00'),
(3, 'low', '2019-06-22 05:10:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medical_chart_routine`
--

CREATE TABLE `medical_chart_routine` (
  `id_routine` int(11) NOT NULL,
  `id_prescription` int(11) NOT NULL,
  `mcr_date_given` datetime DEFAULT NULL,
  `mcr_given_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medication_chart`
--

CREATE TABLE `medication_chart` (
  `id_prescription` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `mc_prescription_name` text DEFAULT NULL,
  `mc_dosage` text DEFAULT NULL,
  `mc_duration` text DEFAULT NULL,
  `mc_route` text DEFAULT NULL,
  `mc_sign` text DEFAULT NULL,
  `mc_date_start` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication_chart`
--

INSERT INTO `medication_chart` (`id_prescription`, `id_patients`, `mc_prescription_name`, `mc_dosage`, `mc_duration`, `mc_route`, `mc_sign`, `mc_date_start`, `created_at`, `updated_at`) VALUES
(4, 7, 'asd', 'asd', 'asd', 'asd', 'asd', '2019-07-10 00:00:00', '2019-07-02 08:25:36', '2019-07-02 08:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_summary_report`
--

CREATE TABLE `monthly_summary_report` (
  `id_summary_report` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `msr_date` date DEFAULT NULL,
  `msr_month` varchar(50) DEFAULT NULL,
  `msr_remarks_report` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_diagnose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_summary_report`
--

INSERT INTO `monthly_summary_report` (`id_summary_report`, `id_patients`, `msr_date`, `msr_month`, `msr_remarks_report`, `created_at`, `updated_at`, `id_diagnose`) VALUES
(2, 7, '2019-07-12', 'March', 'asdasdadas', '2019-07-02 09:19:16', '2019-07-02 09:19:16', 0),
(4, 7, '2019-08-21', 'May', 'sad', '2019-08-03 02:57:25', '2019-08-03 02:57:25', 0),
(6, 1, '2019-07-31', 'March', 'Test', '2019-08-04 23:53:35', '2019-08-04 23:53:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `movement_joint`
--

CREATE TABLE `movement_joint` (
  `id_movement_joint` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `name_joints` varchar(255) DEFAULT NULL,
  `status_joints` varchar(20) DEFAULT NULL,
  `remark_joints` text DEFAULT NULL,
  `date_joints` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference_no` varchar(150) DEFAULT NULL,
  `id_diagnose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movement_joint`
--

INSERT INTO `movement_joint` (`id_movement_joint`, `id_patients`, `name_joints`, `status_joints`, `remark_joints`, `date_joints`, `created_at`, `updated_at`, `reference_no`, `id_diagnose`) VALUES
(1, 16, 'Test', 'Active', 'test', NULL, '2020-01-03 05:54:01', '2020-01-03 05:54:01', NULL, 84);

-- --------------------------------------------------------

--
-- Table structure for table `movement_joint_hq`
--

CREATE TABLE `movement_joint_hq` (
  `id_movement_joint` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `name_joints` varchar(255) DEFAULT NULL,
  `status_joints` varchar(20) DEFAULT NULL,
  `remark_joints` text DEFAULT NULL,
  `date_joints` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference_no` varchar(150) DEFAULT NULL,
  `id_diagnose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id_package` int(11) NOT NULL,
  `name_package` text DEFAULT NULL,
  `price_package` float DEFAULT NULL,
  `type_package` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id_package`, `name_package`, `price_package`, `type_package`) VALUES
(1, 'Normal Package', 150, 'therapist'),
(2, 'Casual Package', 1000, 'therapist'),
(3, 'Platinum Package', 1350, 'therapist'),
(4, 'Ultimate Package', 1600, 'therapist'),
(5, 'Super Package', 2400, 'therapist'),
(6, 'Package A', 5600, 'nursing'),
(7, 'Package B', 8600, 'nursing'),
(8, 'Package C', 13000, 'nursing');

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
(16, 'Mohamad Khuzairie Saffie', '', '920613015454', 27, 'Male', 'No 33  , Jalan Setia 5/4 , Taman Setia Indah , 81100 Johor Bahru', '0177965161', '2020-01-03 13:41:55', '2020-01-03 13:41:55', NULL, 'PNT00001', NULL, 'PHW0001', 'center', 2),
(19, 'Mohammad Ruzaini Mahzan', '', '930823145915', 22, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '0177654822', '2020-01-03 13:41:31', '2020-01-03 13:41:31', NULL, 'PNT00002', NULL, 'PHW00002', 'center', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patients_nursing`
--

CREATE TABLE `patients_nursing` (
  `id_patients` int(11) NOT NULL,
  `fullname_patients` varchar(70) COLLATE utf8_bin NOT NULL,
  `lastname_patients` varchar(70) COLLATE utf8_bin NOT NULL,
  `ic_patients` varchar(12) COLLATE utf8_bin NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `address_patients` text COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_bin NOT NULL,
  `id_staff` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `patients_nursing`
--

INSERT INTO `patients_nursing` (`id_patients`, `fullname_patients`, `lastname_patients`, `ic_patients`, `age`, `gender`, `address_patients`, `phone_number`, `id_staff`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruzaini', 'Mahzan', '930823145915', 25, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '0177654822', NULL, '2019-08-04 08:04:04', '2019-08-04 08:04:04', NULL),
(3, 'Mohammad Ruzaini', 'Mahzan', '9809809808', 26, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '0177654822', NULL, '2019-08-05 08:23:18', '2019-08-05 08:23:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patients_therapist`
--

CREATE TABLE `patients_therapist` (
  `id_patients` int(11) NOT NULL,
  `fullname_patients` varchar(70) COLLATE utf8_bin NOT NULL,
  `lastname_patients` varchar(70) COLLATE utf8_bin NOT NULL,
  `ic_patients` varchar(12) COLLATE utf8_bin NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `address_patients` text COLLATE utf8_bin NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_bin NOT NULL,
  `id_staff` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `mrn_no` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `patients_therapist`
--

INSERT INTO `patients_therapist` (`id_patients`, `fullname_patients`, `lastname_patients`, `ic_patients`, `age`, `gender`, `address_patients`, `phone_number`, `id_staff`, `mrn_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruzaini', 'Mahzan', '930823145915', 25, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '0177654822', NULL, NULL, '2019-08-04 08:02:25', '2019-08-04 08:02:25', NULL),
(3, 'Mohammad Ruzaini Mahzan', 'Mahzan', '12312314567', NULL, NULL, '', '177654822', NULL, NULL, '2019-06-23 07:38:03', '2019-06-23 07:38:03', NULL),
(5, 'Mohammad Ruzaini Mahzan', 'Mahzan', '131144141414', NULL, NULL, '', '177654822', NULL, NULL, '2019-06-23 09:07:36', '2019-06-23 09:07:36', NULL),
(6, 'Mohammad Ruzaini Mahzan', 'Mahzan', '131144141414', NULL, NULL, 'CO3-03, Villa C,Bayu Puteri 2 Apartment,Jalan Bayu Puteri 1/2, Taman Bayu Puteri', '177654822', 'PHW0001', 'PNT0004', '2019-08-19 07:46:38', '2019-08-19 07:46:38', NULL),
(7, 'zaini Mahzan', 'Mahzan', '9809809808', 24, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '177654822', 'PHW0001', 'PNT0003', '2019-08-19 07:46:15', '2019-08-19 07:46:15', NULL),
(8, 'Mohammad Ruzaini Mahzan', 'Mahzan', '111111111111', 21, 'Male', 'CO3-03, Villa C\r\nBayu Puteri 2 Apartment\r\nJalan Bayu Puteri 1/2, Taman Bayu Puteri', '177654822', 'PHW0001', 'PNT0002', '2019-08-19 07:46:04', '2019-08-19 07:46:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `total_payment` varchar(255) NOT NULL,
  `payment_paid` varchar(255) NOT NULL,
  `balance_payment` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_diagnose` int(11) NOT NULL,
  `type_payment` varchar(50) NOT NULL,
  `file_attachment` varchar(255) DEFAULT NULL,
  `status_verified` varchar(50) NOT NULL,
  `verify_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_payment`, `id_patients`, `total_payment`, `payment_paid`, `balance_payment`, `department`, `id_user`, `id_diagnose`, `type_payment`, `file_attachment`, `status_verified`, `verify_by`, `created_at`, `updated_at`, `payment_date`) VALUES
(8, 16, '4500', '100', '4400', 'Therapist', 17, 84, 'Cash', 'WIN_20190308_09_52_11_Pro_1578064660.jpg', 'Not Verified', NULL, '2020-01-03 07:17:40', '2020-01-03 07:17:40', '2020-01-03'),
(9, 16, '4400', '400', '4000', 'Therapist', 17, 84, 'Cash', 'WIN_20190308_09_53_05_Pro_1578065239.jpg', 'Not Verified', NULL, '2020-01-03 07:27:19', '2020-01-03 07:27:19', '2020-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE `progression` (
  `id_progression` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `progression_problem_disease` text DEFAULT NULL,
  `progression_remarks` text DEFAULT NULL,
  `date_progression` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_diagnose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progression`
--

INSERT INTO `progression` (`id_progression`, `id_patients`, `progression_problem_disease`, `progression_remarks`, `date_progression`, `created_at`, `updated_at`, `id_diagnose`) VALUES
(5, 7, 'Ankle Dislocate', 'Testing', NULL, '2019-08-03 02:09:46', '2019-08-03 02:09:46', 0),
(9, 1, 'Ankle Dislocate', 'Test 1', '2019-08-08', '2019-08-04 05:32:38', '2019-08-04 05:32:38', 6),
(12, 3, NULL, 'asdasdadasd', '2019-08-20', '2019-08-05 08:48:24', '2019-08-05 08:48:24', 10);

-- --------------------------------------------------------

--
-- Table structure for table `progress_note`
--

CREATE TABLE `progress_note` (
  `id_progress_note` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `pn_date` date DEFAULT NULL,
  `pn_time` time DEFAULT NULL,
  `pn_activity` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progress_note`
--

INSERT INTO `progress_note` (`id_progress_note`, `id_patients`, `pn_date`, `pn_time`, `pn_activity`, `created_at`, `updated_at`) VALUES
(2, 7, '2019-07-17', '00:45:00', 'asdasd', '2019-07-02 08:42:34', '2019-07-02 08:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `relative_patients`
--

CREATE TABLE `relative_patients` (
  `id_rel_patients` int(11) NOT NULL,
  `fullname_relatives` varchar(70) COLLATE utf8_bin NOT NULL,
  `lastname_relatives` varchar(70) COLLATE utf8_bin NOT NULL,
  `phone_no_relatives` varchar(70) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_patients` int(11) NOT NULL,
  `type` text COLLATE utf8_bin DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `relative_patients`
--

INSERT INTO `relative_patients` (`id_rel_patients`, `fullname_relatives`, `lastname_relatives`, `phone_no_relatives`, `created_at`, `updated_at`, `id_patients`, `type`, `deleted_at`) VALUES
(13, 'Mahzan', 'Othman baik', '0182736121', '2019-06-24 02:00:03', '2019-06-24 02:00:03', 7, NULL, NULL),
(14, 'Syafiq kamal', 'Othman', '0197227822', '2019-06-27 12:31:01', '2019-06-24 02:00:19', 7, NULL, NULL),
(24, 'Mahzan', 'Othman', '0197227822', '2019-08-05 00:23:27', '2019-08-05 00:23:27', 3, 'Nursing', NULL),
(25, 'Mahzan', 'Othman', '0197227551', '2019-08-05 00:33:36', '2019-08-05 00:33:36', 1, 'Nursing', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report_diagnose`
--

CREATE TABLE `report_diagnose` (
  `id_report_diagnose` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `id_treatment_diagnose` int(11) DEFAULT NULL,
  `report_date` date NOT NULL,
  `report_description` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `report_diagnose`
--

INSERT INTO `report_diagnose` (`id_report_diagnose`, `id_patients`, `id_treatment_diagnose`, `report_date`, `report_description`, `created_at`, `updated_at`) VALUES
(1, 7, NULL, '2019-06-14', 'asdasdasd', '2019-06-25 14:46:31', '2019-06-25 06:26:56'),
(3, 7, NULL, '2019-06-13', 'asdasd', '2019-06-25 06:38:55', '2019-06-25 06:38:55'),
(5, 7, NULL, '2019-06-22', '1.hfhfh\r\n2.jgjgjgjg\r\n3.lkjlkjlkj\r\n4.jkilop', '2019-06-25 07:03:12', '2019-06-25 07:03:12'),
(6, 7, NULL, '2019-06-13', 'Testing 2.0', '2019-06-27 03:50:33', '2019-06-27 03:50:33'),
(15, 16, 18, '2019-08-23', 'test', '2019-08-19 08:04:09', '2019-08-18 07:04:36'),
(16, 16, 18, '2019-08-19', 'Testing Simple Report', '2019-08-19 08:03:39', '2019-08-18 23:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `report_diagnose_hq`
--

CREATE TABLE `report_diagnose_hq` (
  `id_report_diagnose` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `id_treatment_diagnose` int(11) DEFAULT NULL,
  `report_date` date NOT NULL,
  `report_description` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `report_diagnose_hq`
--

INSERT INTO `report_diagnose_hq` (`id_report_diagnose`, `id_patients`, `id_treatment_diagnose`, `report_date`, `report_description`, `created_at`, `updated_at`) VALUES
(1, 7, NULL, '2019-06-14', 'asdasdasd', '2019-06-25 14:46:31', '2019-06-25 06:26:56'),
(3, 7, NULL, '2019-06-13', 'asdasd', '2019-06-25 06:38:55', '2019-06-25 06:38:55'),
(5, 7, 10, '2019-06-22', '1.hfhfh\r\n2.jgjgjgjg\r\n3.lkjlkjlkj\r\n4.jkilop', '2019-08-02 08:21:18', '2019-06-25 07:03:12'),
(6, 7, NULL, '2019-06-13', 'Testing 2.0', '2019-06-27 03:50:33', '2019-06-27 03:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `roasters`
--

CREATE TABLE `roasters` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `patients_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roasters`
--

INSERT INTO `roasters` (`id`, `title`, `start`, `end`, `patients_id`, `staff_id`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'test khuzairie', '2019-12-02 11:15:00', '2019-12-02 12:15:00', 1, 2, 2, '2019-12-01 19:17:23', '2019-12-01 19:17:23'),
(4, 'test by airie', '2019-12-03 12:00:00', '2019-12-03 14:00:00', 1, 2, 2, '2019-12-01 19:55:31', '2019-12-01 19:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name_role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-06-22 04:49:59', '0000-00-00 00:00:00'),
(2, 'staff', '2019-06-22 04:49:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `summary_diagnose`
--

CREATE TABLE `summary_diagnose` (
  `id_summary_diagnose` int(11) NOT NULL,
  `id_treatment_diagnose` int(11) DEFAULT NULL,
  `s_method` text COLLATE utf8_bin DEFAULT NULL,
  `o_method` text COLLATE utf8_bin DEFAULT NULL,
  `a_method` text COLLATE utf8_bin DEFAULT NULL,
  `p_method` text COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_patients` int(11) NOT NULL,
  `date_method` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `summary_diagnose`
--

INSERT INTO `summary_diagnose` (`id_summary_diagnose`, `id_treatment_diagnose`, `s_method`, `o_method`, `a_method`, `p_method`, `created_at`, `updated_at`, `id_patients`, `date_method`) VALUES
(34, 92, 'test1', 'test2', 'test3', 'test4', '2020-01-03 13:54:50', '2020-01-03 05:42:35', 16, '2020-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `summary_diagnose_hq`
--

CREATE TABLE `summary_diagnose_hq` (
  `id_summary_diagnose` int(11) NOT NULL,
  `id_treatment_diagnose` int(11) DEFAULT NULL,
  `s_method` text COLLATE utf8_bin NOT NULL,
  `o_method` text COLLATE utf8_bin NOT NULL,
  `a_method` text COLLATE utf8_bin NOT NULL,
  `p_method` text COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_patients` int(11) NOT NULL,
  `date_method` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `summary_diagnose_hq`
--

INSERT INTO `summary_diagnose_hq` (`id_summary_diagnose`, `id_treatment_diagnose`, `s_method`, `o_method`, `a_method`, `p_method`, `created_at`, `updated_at`, `id_patients`, `date_method`) VALUES
(8, NULL, '-avb\r\n-bnds', 'dsad', 'dasd', 'sadasd', '2019-06-26 04:59:20', '2019-06-26 04:59:20', 7, '2019-06-28'),
(9, 10, 's', 'o', 'a', 'p', '2019-08-02 08:18:43', '2019-06-27 04:15:10', 7, '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `tentavie`
--

CREATE TABLE `tentavie` (
  `id_tentative` int(11) NOT NULL,
  `id_treatment_diagnose` int(11) NOT NULL,
  `description_tentative` text COLLATE utf8_bin NOT NULL,
  `date_tentative` datetime NOT NULL,
  `time_tentative` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id_treatment` int(11) NOT NULL,
  `treatment_name` int(11) DEFAULT NULL,
  `summary_treatment` text COLLATE utf8_bin DEFAULT NULL,
  `date_treatment` date NOT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `treatment_therapist` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_patients` int(11) NOT NULL,
  `treatment_amount` float DEFAULT NULL,
  `status_paid` tinyint(1) DEFAULT 0,
  `id_diagnose` int(11) DEFAULT NULL,
  `payment_mode` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id_treatment`, `treatment_name`, `summary_treatment`, `date_treatment`, `time_in`, `time_out`, `treatment_therapist`, `id_patients`, `treatment_amount`, `status_paid`, `id_diagnose`, `payment_mode`, `created_at`, `updated_at`) VALUES
(92, NULL, NULL, '2020-01-03', NULL, NULL, 'PHW00002', 16, NULL, 0, 84, 'Cash', '2020-01-03 05:42:35', '2020-01-03 05:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_diagnose`
--

CREATE TABLE `treatment_diagnose` (
  `id_treatment_diagnose` int(11) NOT NULL,
  `id_diagnose` int(11) NOT NULL,
  `id_treatment` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `treatment_hq`
--

CREATE TABLE `treatment_hq` (
  `id_treatment` int(11) NOT NULL,
  `treatment_name` int(11) DEFAULT NULL,
  `summary_treatment` int(11) DEFAULT NULL,
  `date_treatment` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `treatment_therapist` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_patients` int(11) NOT NULL,
  `treatment_amount` float DEFAULT NULL,
  `id_diagnose` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `treatment_hq`
--

INSERT INTO `treatment_hq` (`id_treatment`, `treatment_name`, `summary_treatment`, `date_treatment`, `time_in`, `time_out`, `treatment_therapist`, `id_patients`, `treatment_amount`, `id_diagnose`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2019-06-16', '09:00:00', '10:00:00', '', 7, NULL, NULL, '2019-06-27 03:47:28', '2019-06-23 18:55:03'),
(2, NULL, NULL, '2019-06-23', '09:00:00', '10:00:00', '', 0, NULL, NULL, '2019-06-24 03:11:43', '2019-06-24 03:11:43'),
(3, NULL, NULL, '2019-06-24', '09:00:00', '10:00:00', '', 0, NULL, NULL, '2019-06-24 03:12:35', '2019-06-24 03:12:35'),
(4, NULL, NULL, '2019-05-05', '09:00:00', '10:00:00', '', 7, NULL, NULL, '2019-06-27 03:47:18', '2019-06-23 20:11:41'),
(5, NULL, NULL, '2019-06-18', '18:00:00', '18:00:00', 'PHW0000', 7, NULL, NULL, '2019-06-27 01:48:41', '2019-06-27 01:48:41'),
(6, NULL, NULL, '2019-06-25', '18:00:00', '20:30:00', 'PHW0000', 7, NULL, NULL, '2019-06-27 01:49:14', '2019-06-27 01:49:14'),
(7, NULL, NULL, '2019-06-19', '18:00:00', '20:30:00', 'PHW0000', 7, NULL, NULL, '2019-06-27 01:55:38', '2019-06-27 01:55:38'),
(8, NULL, NULL, '2019-06-20', '18:00:00', '19:30:00', 'PHW0000', 7, NULL, NULL, '2019-06-27 01:57:39', '2019-06-27 01:57:39'),
(9, NULL, NULL, '2019-06-28', '17:15:00', '18:15:00', 'PHW0000', 7, NULL, NULL, '2019-06-27 02:02:28', '2019-06-27 02:02:28'),
(10, NULL, NULL, '2019-06-19', '19:45:00', '19:45:00', 'PHW0000', 7, 100, NULL, '2019-06-27 03:45:24', '2019-06-27 03:45:24'),
(11, NULL, NULL, '2019-07-31', '19:45:00', '19:45:00', 'PHW0000', 7, 100, 10, '2019-08-02 08:18:21', '2019-06-27 03:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_status`
--

CREATE TABLE `treatment_status` (
  `id_treatment_status` int(11) NOT NULL,
  `name_treatment_status` varchar(10) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 'Admin', '', '930823145915', 'PHW0000', 1, 1, 'admin@gmail.com', NULL, '$2y$10$mgiTI0KyxITM6gcud/NLG.UvW9x1Yhy5j28.kSWEkRaIvYtIicNMa', '0IS5tldvX34FVYRStdawFUDJEicrZzguRNcZkCQLjiBMVzQjCKIargQyymQj', '2019-05-29 01:11:00', '2019-06-23 00:36:18', '2019-06-23 00:36:18'),
(16, 'Ruzaini', 'Mahzan', '930823145915', 'PHW00001', 2, 2, 'ruzainimahzan93@gmail.com', NULL, '$2y$10$.dvE/f91kcy2147n5cdeVebvT6HOSDl/MbNkiPESH71lLbEOUtbZG', 'IYI66zq9ADZ8SSZ5QSZS5VZs4McwumgpOvLnXvR51LFAc2vAfm9GCAXHNraJ', '2019-08-20 02:56:35', '2019-08-20 02:56:35', NULL),
(17, 'Husin', 'Tahir', NULL, 'PHW00002', 2, 2, 'admin1@gmail.com', NULL, '$2y$10$l7sv1t8KwSrAMhN96Ip9o.5qBlGOYFFmhQ2u8sBJ4KSBzHYJUGdT2', NULL, '2019-08-22 07:27:01', '2019-08-22 07:27:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vital_sign_form`
--

CREATE TABLE `vital_sign_form` (
  `id_vital_sign` int(11) NOT NULL,
  `id_patients` int(11) NOT NULL,
  `vital_date` date DEFAULT NULL,
  `vital_time` time DEFAULT NULL,
  `vital_blood_pressure` varchar(255) DEFAULT NULL,
  `vital_pulse` varchar(255) DEFAULT NULL,
  `vital_resp` varchar(255) DEFAULT NULL,
  `vital_temp` varchar(255) DEFAULT NULL,
  `vital_gm` varchar(255) DEFAULT NULL,
  `vital_sign` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vital_sign_form`
--

INSERT INTO `vital_sign_form` (`id_vital_sign`, `id_patients`, `vital_date`, `vital_time`, `vital_blood_pressure`, `vital_pulse`, `vital_resp`, `vital_temp`, `vital_gm`, `vital_sign`, `created_at`, `updated_at`) VALUES
(1, 7, '2019-07-12', '23:05:00', '12', '23', '56', '34', '123', '123', '2019-07-02 07:03:42', '2019-07-02 07:03:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`id_assigned`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id_department`);

--
-- Indexes for table `diagnose`
--
ALTER TABLE `diagnose`
  ADD PRIMARY KEY (`id_diagnose`);

--
-- Indexes for table `diagnose_nursing`
--
ALTER TABLE `diagnose_nursing`
  ADD PRIMARY KEY (`id_diagnose`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intake_output_chart`
--
ALTER TABLE `intake_output_chart`
  ADD PRIMARY KEY (`id_intake_output`);

--
-- Indexes for table `irrirability`
--
ALTER TABLE `irrirability`
  ADD PRIMARY KEY (`id_irrilability`);

--
-- Indexes for table `medication_chart`
--
ALTER TABLE `medication_chart`
  ADD PRIMARY KEY (`id_prescription`);

--
-- Indexes for table `monthly_summary_report`
--
ALTER TABLE `monthly_summary_report`
  ADD PRIMARY KEY (`id_summary_report`);

--
-- Indexes for table `movement_joint`
--
ALTER TABLE `movement_joint`
  ADD PRIMARY KEY (`id_movement_joint`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id_package`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id_patients`);

--
-- Indexes for table `patients_nursing`
--
ALTER TABLE `patients_nursing`
  ADD PRIMARY KEY (`id_patients`);

--
-- Indexes for table `patients_therapist`
--
ALTER TABLE `patients_therapist`
  ADD PRIMARY KEY (`id_patients`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indexes for table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`id_progression`);

--
-- Indexes for table `progress_note`
--
ALTER TABLE `progress_note`
  ADD PRIMARY KEY (`id_progress_note`);

--
-- Indexes for table `relative_patients`
--
ALTER TABLE `relative_patients`
  ADD PRIMARY KEY (`id_rel_patients`);

--
-- Indexes for table `report_diagnose`
--
ALTER TABLE `report_diagnose`
  ADD PRIMARY KEY (`id_report_diagnose`);

--
-- Indexes for table `report_diagnose_hq`
--
ALTER TABLE `report_diagnose_hq`
  ADD PRIMARY KEY (`id_report_diagnose`);

--
-- Indexes for table `roasters`
--
ALTER TABLE `roasters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `summary_diagnose`
--
ALTER TABLE `summary_diagnose`
  ADD PRIMARY KEY (`id_summary_diagnose`);

--
-- Indexes for table `summary_diagnose_hq`
--
ALTER TABLE `summary_diagnose_hq`
  ADD PRIMARY KEY (`id_summary_diagnose`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id_treatment`);

--
-- Indexes for table `treatment_diagnose`
--
ALTER TABLE `treatment_diagnose`
  ADD PRIMARY KEY (`id_treatment_diagnose`);

--
-- Indexes for table `treatment_hq`
--
ALTER TABLE `treatment_hq`
  ADD PRIMARY KEY (`id_treatment`);

--
-- Indexes for table `type_sessions`
--
ALTER TABLE `type_sessions`
  ADD PRIMARY KEY (`id_type_sessions`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vital_sign_form`
--
ALTER TABLE `vital_sign_form`
  ADD PRIMARY KEY (`id_vital_sign`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `id_assigned` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `diagnose`
--
ALTER TABLE `diagnose`
  MODIFY `id_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `diagnose_nursing`
--
ALTER TABLE `diagnose_nursing`
  MODIFY `id_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `intake_output_chart`
--
ALTER TABLE `intake_output_chart`
  MODIFY `id_intake_output` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `irrirability`
--
ALTER TABLE `irrirability`
  MODIFY `id_irrilability` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medication_chart`
--
ALTER TABLE `medication_chart`
  MODIFY `id_prescription` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `monthly_summary_report`
--
ALTER TABLE `monthly_summary_report`
  MODIFY `id_summary_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movement_joint`
--
ALTER TABLE `movement_joint`
  MODIFY `id_movement_joint` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id_package` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id_patients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients_nursing`
--
ALTER TABLE `patients_nursing`
  MODIFY `id_patients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `progression`
--
ALTER TABLE `progression`
  MODIFY `id_progression` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `progress_note`
--
ALTER TABLE `progress_note`
  MODIFY `id_progress_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `relative_patients`
--
ALTER TABLE `relative_patients`
  MODIFY `id_rel_patients` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `report_diagnose`
--
ALTER TABLE `report_diagnose`
  MODIFY `id_report_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `report_diagnose_hq`
--
ALTER TABLE `report_diagnose_hq`
  MODIFY `id_report_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roasters`
--
ALTER TABLE `roasters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `summary_diagnose`
--
ALTER TABLE `summary_diagnose`
  MODIFY `id_summary_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `summary_diagnose_hq`
--
ALTER TABLE `summary_diagnose_hq`
  MODIFY `id_summary_diagnose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `treatment_diagnose`
--
ALTER TABLE `treatment_diagnose`
  MODIFY `id_treatment_diagnose` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatment_hq`
--
ALTER TABLE `treatment_hq`
  MODIFY `id_treatment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `type_sessions`
--
ALTER TABLE `type_sessions`
  MODIFY `id_type_sessions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `vital_sign_form`
--
ALTER TABLE `vital_sign_form`
  MODIFY `id_vital_sign` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
