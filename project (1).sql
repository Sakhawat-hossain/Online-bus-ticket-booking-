-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 09:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `house_road` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `name`, `thana`, `district`, `house_road`, `updated_at`, `created_at`) VALUES
(1, 'Kamar para', 'Sadar', 'Rangpur', NULL, '2019-07-21 17:22:35', '2019-07-21 17:22:35'),
(2, 'Kamar para', 'Sadar', 'Rangpur', NULL, '2019-07-21 17:28:09', '2019-07-21 17:28:09'),
(3, 'Kamar para', 'Sadar', 'Rangpur', 'house #10', '2019-07-21 18:03:33', '2019-07-21 18:03:33'),
(4, 'Babukha', 'Sadar', 'Rangpur', '86', '2019-09-08 14:49:14', '2019-09-08 14:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enterprise` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `super_adminID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `enterprise`, `super_adminID`, `created_at`, `updated_at`) VALUES
(1, 'sakhawat', 'sakhawat', 'Hanif Paribahan', NULL, NULL, NULL),
(2, 'mosaddek', 'mosaddek', 'Nabil Paribahan', NULL, NULL, '2019-08-14 04:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_infos`
--

CREATE TABLE `admin_infos` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone_no` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_infos`
--

INSERT INTO `admin_infos` (`id`, `first_name`, `last_name`, `email`, `phone_no`, `created_at`, `updated_at`) VALUES
(1, 'Md Nihad', 'Islam', 'nihad@gmail.com', '01780941555', '2019-07-21 17:17:25', '2019-07-21 17:17:25'),
(2, 'Md Nihad', 'Islam', 'nihadislam@gmail.com', '01780941557', '2019-07-21 17:28:09', '2019-07-21 17:28:09'),
(5, 'Md Sadekul', 'Islam', 'sadekul@gmail.com', '01780941558', '2019-07-21 18:03:33', '2019-07-21 18:03:33'),
(6, 'Muntasir', 'Rahman', 'muntasir@gmail.com', '01780941440', '2019-09-08 14:49:14', '2019-09-08 14:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addressID` int(10) NOT NULL,
  `adminID` int(10) DEFAULT NULL,
  `admin_infoID` int(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `username`, `password`, `addressID`, `adminID`, `admin_infoID`, `updated_at`, `created_at`) VALUES
(1, 'nihad-islam', '$2y$10$0VG5Wq0GnLCt6', 2, NULL, 2, '2019-07-21 17:34:42', '2019-07-21 17:33:43'),
(2, 'sadekul', '$2y$10$b/7jVn2ssdliuX.f1eP.oOnw9JDZ/RYwgpJefOPe.YUW4suy/5x/W', 3, 1, 5, '2019-07-21 18:40:29', '2019-07-21 18:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `boardings`
--

CREATE TABLE `boardings` (
  `id` int(10) UNSIGNED NOT NULL,
  `routeID` int(11) NOT NULL,
  `placeID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boardings`
--

INSERT INTO `boardings` (`id`, `routeID`, `placeID`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 3, 4, NULL, NULL),
(5, 1, 3, NULL, NULL),
(6, 1, 4, NULL, NULL),
(7, 1, 5, NULL, NULL),
(8, 1, 6, NULL, NULL),
(9, 1, 7, NULL, NULL),
(10, 1, 8, NULL, NULL),
(11, 1, 9, NULL, NULL),
(12, 1, 10, NULL, NULL),
(13, 1, 28, NULL, NULL),
(14, 1, 29, NULL, NULL),
(15, 1, 30, NULL, NULL),
(16, 30, 11, NULL, NULL),
(17, 30, 12, NULL, NULL),
(18, 30, 13, NULL, NULL),
(19, 30, 14, NULL, NULL),
(20, 30, 15, NULL, NULL),
(21, 30, 16, NULL, NULL),
(22, 30, 17, NULL, NULL),
(23, 30, 18, NULL, NULL),
(24, 30, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coach_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `total_seat` int(11) NOT NULL,
  `available_seat` int(11) NOT NULL,
  `rID` int(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `coach_no`, `type`, `status`, `total_seat`, `available_seat`, `rID`, `created_at`, `updated_at`) VALUES
(1, 'Hanif Paribahan', 'TXB 102', 'non-AC', 'blocked', 40, 40, 1, NULL, '2019-09-12 09:25:09'),
(2, 'Hanif Paribahan', 'TXB 105', 'AC', 'available', 30, 26, 1, NULL, NULL),
(3, 'Nabil Paribahan', 'TXD 101', 'non-AC', 'available', 40, 40, 2, NULL, NULL),
(4, 'Nabil Paribahan', 'TXD 108', 'AC', 'available', 30, 30, 2, NULL, NULL),
(5, 'Shohag Paribahan', 'TXS 205', 'non-AC', 'available', 40, 40, 3, NULL, NULL),
(6, 'Shogag Paribahan', 'TXS 305', 'non-AC', 'available', 40, 40, 3, NULL, NULL),
(7, 'Ena Paribahan', 'TXB 106', '', 'available', 0, 40, 4, NULL, '2019-08-30 17:20:25'),
(8, 'Hanif Paribahan', 'TXB 103', 'AC', 'available', 27, 27, 1, '2019-08-25 15:17:12', '2019-08-25 15:17:12'),
(9, 'Hanif Paribahan', 'TXB 208', 'AC', 'available', 9, 9, 1, '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(10, 'Hanif Paribahan', 'TXB 210', 'non-AC', 'available', 40, 36, 1, '2019-08-29 14:29:15', '2019-09-11 17:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `bus_layouts`
--

CREATE TABLE `bus_layouts` (
  `id` int(10) NOT NULL,
  `busID` int(10) NOT NULL,
  `decker_num` int(5) NOT NULL,
  `rows` int(5) NOT NULL,
  `columns` int(5) NOT NULL,
  `layout` varchar(1024) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_layouts`
--

INSERT INTO `bus_layouts` (`id`, `busID`, `decker_num`, `rows`, `columns`, `layout`, `updated_at`, `created_at`) VALUES
(1, 8, 1, 9, 3, '_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;', '2019-08-25 19:10:36', '2019-08-25 16:30:20'),
(2, 1, 1, 10, 4, '_,Business,Business,Business,Business,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Blocked,_;', '2019-09-12 19:53:50', '2019-08-25 10:30:20'),
(3, 2, 1, 10, 3, '_,_,Business,Business,Business,_;_,_,Business,Business,Business,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;_,_,Economy,Economy,Economy,_;', '2019-08-25 13:10:36', '2019-08-25 10:30:20'),
(4, 9, 1, 3, 3, '_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,Business,Economy,Economy,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;_,_,_,_,_,_;', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(5, 10, 1, 10, 4, '_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;_,Economy,Economy,Economy,Economy,_;', '2019-08-29 14:29:16', '2019-08-29 14:29:16');

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
(1, '2019_06_24_093802_create_seat_infos_table', 1),
(2, '2019_06_24_094323_create_trips_table', 2),
(3, '2019_06_28_051327_create_super_admins_table', 3),
(4, '2019_06_28_051722_create_admins_table', 4),
(5, '2019_06_28_052259_create_representatives_table', 5),
(6, '2019_06_28_052718_create_seats_table', 6),
(7, '2019_06_28_053654_create_tickets_table', 7),
(8, '2019_06_28_054755_create_payments_table', 7),
(9, '2019_06_28_055945_create_routes_table', 8),
(10, '2019_06_28_060030_create_boardings_table', 8),
(11, '2019_06_28_060402_create_places_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_gateway` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bkash',
  `trxID` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_time`, `payment_gateway`, `trxID`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(3, '2019-09-02 09:57:55', 'Rocket', '1234XABCD', 1100, 'paid', '2019-07-15 02:49:04', '2019-09-02 09:57:55'),
(4, '2019-09-02 09:47:43', 'Bkash', '123DX54VF5', 1050, 'paid', '2019-07-28 19:10:32', '2019-09-02 09:47:43'),
(5, '2019-09-02 09:47:43', 'Bkash', '123DX54V78', 1050, 'paid', '2019-07-28 19:25:24', '2019-09-02 09:47:43'),
(6, '2019-09-02 09:47:43', 'Bkash', '123DX54VF', 1100, 'pending', '2019-07-29 08:41:58', '2019-09-02 09:47:43'),
(7, '2019-09-02 09:47:43', 'Bkash', '123ABCD23', 550, 'pending', '2019-07-29 08:56:22', '2019-09-02 09:47:43'),
(8, '2019-09-02 09:47:43', 'Bkash', '1234XABSD', 550, 'pending', '2019-07-29 09:18:16', '2019-09-02 09:47:43'),
(9, '2019-09-02 09:47:43', 'Bkash', '1234XABST', 550, 'pending', '2019-09-01 13:49:53', '2019-09-02 09:47:43'),
(10, '2019-09-02 09:47:43', 'Bkash', 'DX1020AB', 550, 'pending', '2019-09-02 09:18:37', '2019-09-02 09:47:43'),
(11, '2019-09-02 09:47:43', 'Bkash', 'DX1020AC', 550, 'pending', '2019-09-02 09:30:40', '2019-09-02 09:47:43'),
(12, '2019-09-02 09:47:43', 'Bkash', 'DX1020AD', 550, 'pending', '2019-09-02 09:32:11', '2019-09-02 09:47:43'),
(13, '2019-09-11 16:07:21', 'Bkash', 'DX1020CF', 1100, 'paid', '2019-09-11 16:07:21', '2019-09-11 16:07:21'),
(14, '2019-09-11 17:02:24', 'Rocket', 'DX1990CF', 1100, 'paid', '2019-09-11 17:02:24', '2019-09-11 17:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Kallanpur', 'AC market, house no# 102', NULL, NULL),
(2, 'Gabtoli', NULL, NULL, NULL),
(3, 'Kolabagan', NULL, NULL, NULL),
(4, 'Hatirpul', NULL, NULL, NULL),
(5, 'Hemayetpur', NULL, NULL, NULL),
(6, 'Majar Road', NULL, NULL, NULL),
(7, 'Savar', NULL, NULL, NULL),
(8, 'Baipyl', NULL, NULL, NULL),
(9, 'Uttora', NULL, NULL, NULL),
(10, 'Abdullahpur', NULL, NULL, NULL),
(11, 'Kamarpara bus stand', NULL, NULL, NULL),
(12, 'Modern more', NULL, NULL, NULL),
(13, 'Mithapukur', NULL, NULL, NULL),
(14, 'Jaigirhat', NULL, NULL, NULL),
(15, 'Shathibari', NULL, NULL, NULL),
(16, 'Pirgonj', NULL, NULL, NULL),
(17, 'Polashbari', NULL, NULL, NULL),
(18, 'Bogura', NULL, NULL, NULL),
(19, 'Paglapir', NULL, NULL, NULL),
(20, 'Saidpur', NULL, NULL, NULL),
(21, 'Chandra', NULL, NULL, NULL),
(22, 'Gobindogonj', NULL, NULL, NULL),
(23, 'Ghoraghat', NULL, NULL, NULL),
(24, 'Birampur', NULL, NULL, NULL),
(25, 'Fulbari', NULL, NULL, NULL),
(26, 'Birgonj', NULL, NULL, NULL),
(27, 'Dinajpur terminal', NULL, NULL, NULL),
(28, 'Aminbazar', NULL, NULL, NULL),
(29, 'Dhamrai', NULL, NULL, NULL),
(30, 'Nabinagar', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `adminID` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enterprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `representatives`
--

INSERT INTO `representatives` (`id`, `adminID`, `username`, `password`, `enterprise`, `created_at`, `updated_at`) VALUES
(1, 1, 'rep-hanif', '$2y$10$uf4QiV4XMDPSditmstY47usmlVClxvCeWg.ATbMcqL28GV1gAv/tW', 'Hanif Paribahan', '2019-08-13 17:24:47', '2019-08-13 18:34:04'),
(2, 2, 'rep-nabil', '$2y$10$.o.ntdZ1r10YPNxvXwref.Sp0FT6e14LCMX8hJ/jWrT9qmZeuESj2', 'Nabil Paribahan', '2019-08-14 04:10:38', '2019-08-14 04:12:24'),
(3, NULL, 'rep-hanif-2', '$2y$10$XupvpOkMh9InSxQWFqoqYuuYJAgseHU11SUUsoJTG9N6lP7uher3C', 'Hanif Paribahan', '2019-08-26 09:38:11', '2019-08-26 09:38:11'),
(4, NULL, 'rep-nabil', '$2y$10$yxGgQEaClBE1QTS2P0UhOODA8bEDUUJqs1pgo6SYDlwlR93p58hRa', 'Nabil Paribahan', '2019-09-08 16:00:57', '2019-09-08 16:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_point` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `from`, `to`, `starting_point`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Rangpur', 'Kallanpur', NULL, NULL),
(2, 'Dhaka', 'Dinajpur', 'Kallanpur', NULL, NULL),
(3, 'Dhaka', 'Nilphamari', 'Kallanpur', NULL, NULL),
(4, 'Dhaka', 'Thakurgoan', 'Kallanpur', NULL, NULL),
(5, 'Dhaka', 'Panchagorh', 'Kallanpur', NULL, NULL),
(6, 'Dhaka', 'Kurigram', 'Kallanpur', NULL, NULL),
(7, 'Dhaka', 'Bogura', 'Kallanpur', NULL, NULL),
(8, 'Dhaka', 'Rajshahi', 'Kallanpur', NULL, NULL),
(9, 'Dhaka', 'Pabna', 'Kallanpur', NULL, NULL),
(10, 'Dhaka', 'Gaibandha', 'Kallanpur', NULL, NULL),
(11, 'Dhaka', 'Naogaon', 'Kallanpur', NULL, NULL),
(12, 'Dhaka', 'Sirajgonj', 'Kallanpur', NULL, NULL),
(13, 'Dhaka', 'Natore', 'Kallanpur', NULL, NULL),
(14, 'Dhaka', 'Joypurhat', 'Kallanpur', NULL, NULL),
(15, 'Sylhet', 'Dhaka', '', NULL, NULL),
(16, 'Dhaka', 'Cumilla', 'Kallanpur', NULL, NULL),
(17, 'Dhaka', 'Chattogram', 'Kallanpur', NULL, NULL),
(18, 'Dhaka', 'Cox`s Bazar', 'Kallanpur', NULL, NULL),
(19, 'Dhaka', 'Khulla', 'Kallanpur', NULL, NULL),
(20, 'Dhaka', 'Kushtia', 'Kallanpur', NULL, NULL),
(21, 'Dhaka', 'Barisal', 'Kallanpur', NULL, NULL),
(22, 'Dhaka', 'Bagerhat', 'Kallanpur', NULL, NULL),
(23, 'Dhaka', 'Kuakata', 'Kallanpur', NULL, NULL),
(24, 'Sylhet', 'Rangpur', '', NULL, NULL),
(25, 'Chattogram', 'Rangpur', '', NULL, NULL),
(26, 'Khulla', 'Rangpur', '', NULL, NULL),
(27, 'Barisal', 'Rangpur', '', NULL, NULL),
(28, 'Chattogram', 'Sylhet', '', NULL, NULL),
(29, 'Cox`s Bazar', 'Rangpur', '', NULL, NULL),
(30, 'Rangpur', 'Dhaka', 'Kamarpara', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(10) UNSIGNED NOT NULL,
  `tripID` int(11) NOT NULL,
  `seatID` int(11) NOT NULL,
  `ticketID` int(11) DEFAULT NULL,
  `fare` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `tripID`, `seatID`, `ticketID`, `fare`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 3, 500, 'booked', NULL, '2019-07-15 02:49:04'),
(2, 4, 2, 3, 500, 'booked', NULL, '2019-07-17 08:19:35'),
(3, 4, 3, 4, 500, 'available', NULL, '2019-07-15 01:30:18'),
(4, 4, 4, 3, 500, 'selected', NULL, NULL),
(5, 4, 5, 1, 500, 'booked', NULL, NULL),
(6, 4, 6, 1, 500, 'booked', NULL, NULL),
(7, 4, 7, 11, 500, 'booked', NULL, '2019-07-29 09:18:16'),
(8, 4, 8, 4, 500, 'available', NULL, '2019-07-13 09:05:44'),
(9, 4, 9, 4, 500, 'available', NULL, '2019-07-21 11:31:25'),
(10, 4, 10, 4, 500, 'available', NULL, '2019-08-26 06:42:35'),
(11, 4, 11, 4, 500, 'available', NULL, '2019-07-12 07:34:56'),
(12, 4, 12, NULL, 500, 'available', NULL, NULL),
(13, 4, 13, 4, 500, 'booked', NULL, '2019-07-22 07:42:24'),
(14, 4, 14, NULL, 500, 'available', NULL, NULL),
(15, 4, 15, NULL, 500, 'booked', NULL, '2019-07-22 09:14:08'),
(16, 4, 16, NULL, 500, 'available', NULL, NULL),
(17, 4, 17, 4, 500, 'available', NULL, '2019-09-01 13:45:16'),
(18, 4, 18, 2, 500, 'available', NULL, '2019-07-21 19:48:58'),
(19, 4, 19, 4, 500, 'available', NULL, '2019-07-12 07:34:54'),
(20, 4, 20, NULL, 500, 'available', NULL, NULL),
(21, 4, 21, NULL, 500, 'booked', NULL, '2019-07-28 18:03:20'),
(22, 4, 22, NULL, 500, 'booked', NULL, '2019-07-28 18:03:20'),
(23, 4, 23, 4, 500, 'available', NULL, '2019-07-12 07:35:15'),
(24, 4, 24, 10, 500, 'booked', NULL, '2019-07-29 08:56:22'),
(25, 4, 25, 13, 500, 'booked', NULL, '2019-09-02 09:18:37'),
(26, 4, 26, NULL, 500, 'available', NULL, NULL),
(27, 4, 27, 4, 500, 'available', NULL, '2019-07-12 07:34:42'),
(28, 4, 28, NULL, 500, 'available', NULL, NULL),
(29, 4, 29, NULL, 500, 'available', NULL, NULL),
(30, 4, 30, 4, 500, 'available', NULL, '2019-09-01 11:01:22'),
(31, 4, 31, NULL, 500, 'available', NULL, NULL),
(32, 4, 32, 8, 500, 'booked', NULL, '2019-07-29 08:41:58'),
(33, 4, 33, 12, 500, 'booked', NULL, '2019-09-01 13:49:53'),
(34, 4, 34, NULL, 500, 'available', NULL, NULL),
(35, 4, 35, 4, 500, 'available', NULL, '2019-09-01 11:01:24'),
(36, 4, 36, NULL, 500, 'available', NULL, NULL),
(37, 4, 37, NULL, 500, 'available', NULL, NULL),
(38, 4, 38, 8, 500, 'booked', NULL, '2019-07-29 08:41:58'),
(39, 4, 39, NULL, 500, 'available', NULL, NULL),
(40, 4, 40, NULL, 500, 'available', NULL, NULL),
(41, 8, 41, 7, 1200, 'booked', NULL, '2019-07-29 04:36:00'),
(42, 8, 42, 2, 1200, 'available', NULL, '2019-07-29 04:07:17'),
(43, 8, 43, NULL, 1200, 'available', NULL, NULL),
(44, 8, 44, NULL, 1200, 'available', NULL, NULL),
(45, 8, 45, 2, 1200, 'booked', NULL, NULL),
(46, 8, 46, 2, 1200, 'booked', NULL, NULL),
(47, 8, 47, NULL, 1000, 'booked', NULL, '2019-07-28 18:03:20'),
(48, 8, 48, NULL, 1000, 'available', NULL, NULL),
(49, 8, 49, NULL, 1000, 'available', NULL, NULL),
(50, 8, 50, 6, 1000, 'booked', NULL, '2019-07-28 19:25:24'),
(51, 8, 51, NULL, 1000, 'available', NULL, NULL),
(52, 8, 52, NULL, 1000, 'available', NULL, NULL),
(53, 8, 53, 4, 1000, 'available', NULL, '2019-08-10 05:53:54'),
(54, 8, 54, 7, 1000, 'booked', NULL, '2019-07-29 08:47:47'),
(55, 8, 55, NULL, 1000, 'available', NULL, NULL),
(56, 8, 56, NULL, 1000, 'available', NULL, NULL),
(57, 8, 57, NULL, 1000, 'available', NULL, NULL),
(58, 8, 58, 7, 1000, 'booked', NULL, '2019-07-29 08:47:47'),
(59, 8, 59, 4, 1000, 'available', NULL, '2019-08-10 05:54:05'),
(60, 8, 60, NULL, 1000, 'available', NULL, NULL),
(61, 8, 61, NULL, 1000, 'available', NULL, NULL),
(62, 8, 62, NULL, 1000, 'available', NULL, NULL),
(63, 8, 63, NULL, 1000, 'available', NULL, NULL),
(64, 8, 64, NULL, 1000, 'available', NULL, NULL),
(65, 8, 65, NULL, 1000, 'available', NULL, NULL),
(66, 8, 66, NULL, 1000, 'available', NULL, NULL),
(67, 8, 67, NULL, 1000, 'available', NULL, NULL),
(68, 8, 68, NULL, 1000, 'available', NULL, NULL),
(69, 8, 69, NULL, 1000, 'available', NULL, NULL),
(70, 8, 70, NULL, 1000, 'available', NULL, NULL),
(71, 10, 177, NULL, 500, 'available', '2019-09-02 06:41:51', '2019-09-02 06:41:51'),
(72, 10, 178, NULL, 500, 'available', '2019-09-02 06:41:51', '2019-09-02 06:41:51'),
(73, 10, 179, NULL, 500, 'available', '2019-09-02 06:41:51', '2019-09-02 06:41:51'),
(74, 10, 180, NULL, 500, 'available', '2019-09-02 06:41:51', '2019-09-02 06:41:51'),
(75, 10, 181, 16, 500, 'booked', '2019-09-02 06:41:51', '2019-09-11 16:07:21'),
(76, 10, 182, 16, 500, 'booked', '2019-09-02 06:41:51', '2019-09-11 16:07:21'),
(77, 10, 183, NULL, 500, 'available', '2019-09-02 06:41:51', '2019-09-02 06:41:51'),
(78, 10, 184, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(79, 10, 185, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(80, 10, 186, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(81, 10, 187, 17, 500, 'booked', '2019-09-02 06:41:52', '2019-09-11 17:02:24'),
(82, 10, 188, 17, 500, 'booked', '2019-09-02 06:41:52', '2019-09-11 17:02:24'),
(83, 10, 189, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(84, 10, 190, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(85, 10, 191, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(86, 10, 192, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(87, 10, 193, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(88, 10, 194, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(89, 10, 195, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(90, 10, 196, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(91, 10, 197, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(92, 10, 198, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(93, 10, 199, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(94, 10, 200, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(95, 10, 201, NULL, 500, 'available', '2019-09-02 06:41:52', '2019-09-02 06:41:52'),
(96, 10, 202, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(97, 10, 203, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(98, 10, 204, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(99, 10, 205, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(100, 10, 206, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(101, 10, 207, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(102, 10, 208, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(103, 10, 209, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(104, 10, 210, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(105, 10, 211, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(106, 10, 212, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(107, 10, 213, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(108, 10, 214, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(109, 10, 215, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(110, 10, 216, NULL, 500, 'available', '2019-09-02 06:41:53', '2019-09-02 06:41:53'),
(111, 11, 1, NULL, 500, 'available', '2019-09-12 09:25:09', '2019-09-12 09:25:09'),
(112, 11, 2, NULL, 500, 'available', '2019-09-12 09:25:09', '2019-09-12 09:25:09'),
(113, 11, 3, NULL, 500, 'available', '2019-09-12 09:25:09', '2019-09-12 09:25:09'),
(114, 11, 4, NULL, 500, 'available', '2019-09-12 09:25:09', '2019-09-12 09:25:09'),
(115, 11, 5, NULL, 500, 'available', '2019-09-12 09:25:09', '2019-09-12 09:25:09'),
(116, 11, 6, NULL, 500, 'available', '2019-09-12 09:25:09', '2019-09-12 09:25:09'),
(117, 11, 7, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(118, 11, 8, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(119, 11, 9, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(120, 11, 10, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(121, 11, 11, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(122, 11, 12, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(123, 11, 13, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(124, 11, 14, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(125, 11, 15, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(126, 11, 16, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(127, 11, 17, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(128, 11, 18, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(129, 11, 19, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(130, 11, 20, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(131, 11, 21, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(132, 11, 22, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(133, 11, 23, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(134, 11, 24, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(135, 11, 25, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(136, 11, 26, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(137, 11, 27, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(138, 11, 28, NULL, 500, 'available', '2019-09-12 09:25:10', '2019-09-12 09:25:10'),
(139, 11, 29, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(140, 11, 30, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(141, 11, 31, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(142, 11, 32, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(143, 11, 33, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(144, 11, 34, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(145, 11, 35, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(146, 11, 36, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(147, 11, 37, NULL, 500, 'blocked', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(148, 11, 38, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(149, 11, 39, NULL, 500, 'available', '2019-09-12 09:25:11', '2019-09-12 09:25:11'),
(150, 11, 40, NULL, 500, 'blocked', '2019-09-12 09:25:11', '2019-09-12 09:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `seat_infos`
--

CREATE TABLE `seat_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `busID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seatNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seat_infos`
--

INSERT INTO `seat_infos` (`id`, `busID`, `seatNo`, `status`, `category`, `created_at`, `updated_at`) VALUES
(1, '1', 'A1', 'available', 'Business', NULL, NULL),
(2, '1', 'A2', 'available', 'Business', NULL, NULL),
(3, '1', 'A3', 'available', 'Business', NULL, NULL),
(4, '1', 'A4', 'available', 'Business', NULL, NULL),
(5, '1', 'B1', 'available', 'Economy', NULL, NULL),
(6, '1', 'B2', 'available', 'Economy', NULL, NULL),
(7, '1', 'B3', 'available', 'Economy', NULL, NULL),
(8, '1', 'B4', 'available', 'Economy', NULL, NULL),
(9, '1', 'C1', 'available', 'Economy', NULL, NULL),
(10, '1', 'C2', 'available', 'Economy', NULL, NULL),
(11, '1', 'C3', 'available', 'Economy', NULL, NULL),
(12, '1', 'C4', 'available', 'Economy', NULL, NULL),
(13, '1', 'D1', 'available', 'Economy', NULL, NULL),
(14, '1', 'D2', 'available', 'Economy', NULL, NULL),
(15, '1', 'D3', 'available', 'Economy', NULL, NULL),
(16, '1', 'D4', 'available', 'Economy', NULL, NULL),
(17, '1', 'E1', 'available', 'Economy', NULL, NULL),
(18, '1', 'E2', 'available', 'Economy', NULL, NULL),
(19, '1', 'E3', 'available', 'Economy', NULL, NULL),
(20, '1', 'E4', 'available', 'Economy', NULL, NULL),
(21, '1', 'F1', 'available', 'Economy', NULL, NULL),
(22, '1', 'F2', 'available', 'Economy', NULL, NULL),
(23, '1', 'F3', 'available', 'Economy', NULL, NULL),
(24, '1', 'F4', 'available', 'Economy', NULL, NULL),
(25, '1', 'G1', 'available', 'Economy', NULL, NULL),
(26, '1', 'G2', 'available', 'Economy', NULL, NULL),
(27, '1', 'G3', 'available', 'Economy', NULL, NULL),
(28, '1', 'G4', 'available', 'Economy', NULL, NULL),
(29, '1', 'H1', 'available', 'Economy', NULL, NULL),
(30, '1', 'H2', 'available', 'Economy', NULL, NULL),
(31, '1', 'H3', 'available', 'Economy', NULL, NULL),
(32, '1', 'H4', 'available', 'Economy', NULL, NULL),
(33, '1', 'I1', 'available', 'Economy', NULL, NULL),
(34, '1', 'I2', 'available', 'Economy', NULL, NULL),
(35, '1', 'I3', 'available', 'Economy', NULL, NULL),
(36, '1', 'I4', 'available', 'Economy', NULL, NULL),
(37, '1', 'J1', 'available', 'Economy', NULL, '2019-09-12 19:53:48'),
(38, '1', 'J2', 'available', 'Economy', NULL, NULL),
(39, '1', 'J3', 'available', 'Economy', NULL, NULL),
(40, '1', 'J4', 'blocked', 'Economy', NULL, NULL),
(41, '2', 'A1', 'available', 'Business', NULL, NULL),
(42, '2', 'A3', 'available', 'Business', NULL, NULL),
(43, '2', 'A4', 'available', 'Business', NULL, NULL),
(44, '2', 'B1', 'available', 'Business', NULL, NULL),
(45, '2', 'B3', 'available', 'Business', NULL, NULL),
(46, '2', 'B4', 'available', 'Business', NULL, NULL),
(47, '2', 'C1', 'available', 'Economy', NULL, NULL),
(48, '2', 'C3', 'available', 'Economy', NULL, NULL),
(49, '2', 'C4', 'available', 'Economy', NULL, NULL),
(50, '2', 'D1', 'available', 'Economy', NULL, NULL),
(51, '2', 'D3', 'available', 'Economy', NULL, NULL),
(52, '2', 'D4', 'available', 'Economy', NULL, NULL),
(53, '2', 'E1', 'available', 'Economy', NULL, NULL),
(54, '2', 'E3', 'available', 'Economy', NULL, NULL),
(55, '2', 'E4', 'available', 'Economy', NULL, NULL),
(56, '2', 'F1', 'available', 'Economy', NULL, NULL),
(57, '2', 'F3', 'available', 'Economy', NULL, NULL),
(58, '2', 'F4', 'available', 'Economy', NULL, NULL),
(59, '2', 'G1', 'available', 'Economy', NULL, NULL),
(60, '2', 'G3', 'available', 'Economy', NULL, NULL),
(61, '2', 'G4', 'available', 'Economy', NULL, NULL),
(62, '2', 'H1', 'available', 'Economy', NULL, NULL),
(63, '2', 'H3', 'available', 'Economy', NULL, NULL),
(64, '2', 'H4', 'available', 'Economy', NULL, NULL),
(65, '2', 'I1', 'available', 'Economy', NULL, NULL),
(66, '2', 'I3', 'available', 'Economy', NULL, NULL),
(67, '2', 'I4', 'available', 'Economy', NULL, NULL),
(68, '2', 'J1', 'blocked', 'Economy', NULL, NULL),
(69, '2', 'J3', 'blocked', 'Economy', NULL, NULL),
(70, '2', 'J4', 'blocked', 'Economy', NULL, NULL),
(71, '3', 'A1', 'available', 'Economy', NULL, NULL),
(72, '3', 'A2', 'available', 'Economy', NULL, NULL),
(73, '3', 'A3', 'available', 'Economy', NULL, NULL),
(74, '3', 'A4', 'available', 'Economy', NULL, NULL),
(75, '3', 'B1', 'available', 'Economy', NULL, NULL),
(76, '3', 'B2', 'available', 'Economy', NULL, NULL),
(77, '3', 'B3', 'available', 'Economy', NULL, NULL),
(78, '3', 'B4', 'available', 'Economy', NULL, NULL),
(79, '3', 'C1', 'available', 'Economy', NULL, NULL),
(80, '3', 'C2', 'available', 'Economy', NULL, NULL),
(81, '3', 'C3', 'available', 'Economy', NULL, NULL),
(82, '3', 'C4', 'available', 'Economy', NULL, NULL),
(83, '3', 'D1', 'available', 'Economy', NULL, NULL),
(84, '3', 'D2', 'available', 'Economy', NULL, NULL),
(85, '3', 'D3', 'available', 'Economy', NULL, NULL),
(86, '3', 'D4', 'available', 'Economy', NULL, NULL),
(87, '3', 'E1', 'available', 'Economy', NULL, NULL),
(88, '3', 'E2', 'available', 'Economy', NULL, NULL),
(89, '3', 'E3', 'available', 'Economy', NULL, NULL),
(90, '3', 'E4', 'available', 'Economy', NULL, NULL),
(91, '3', 'F1', 'available', 'Economy', NULL, NULL),
(92, '3', 'F2', 'available', 'Economy', NULL, NULL),
(93, '3', 'F3', 'available', 'Economy', NULL, NULL),
(94, '3', 'F4', 'available', 'Economy', NULL, NULL),
(95, '3', 'G1', 'available', 'Economy', NULL, NULL),
(96, '3', 'G2', 'available', 'Economy', NULL, NULL),
(97, '3', 'G3', 'available', 'Economy', NULL, NULL),
(98, '3', 'G4', 'available', 'Economy', NULL, NULL),
(99, '3', 'H1', 'available', 'Economy', NULL, NULL),
(100, '3', 'H2', 'available', 'Economy', NULL, NULL),
(101, '3', 'H3', 'available', 'Economy', NULL, NULL),
(102, '3', 'H4', 'available', 'Economy', NULL, NULL),
(103, '3', 'I1', 'available', 'Economy', NULL, NULL),
(104, '3', 'I2', 'available', 'Economy', NULL, NULL),
(105, '3', 'I3', 'available', 'Economy', NULL, NULL),
(106, '3', 'I4', 'available', 'Economy', NULL, NULL),
(107, '3', 'J1', 'available', 'Economy', NULL, NULL),
(108, '3', 'J2', 'available', 'Economy', NULL, NULL),
(109, '3', 'J3', 'available', 'Economy', NULL, NULL),
(110, '3', 'J4', 'available', 'Economy', NULL, NULL),
(111, '4', 'A1', 'available', 'Business', NULL, NULL),
(112, '4', 'A3', 'available', 'Business', NULL, NULL),
(113, '4', 'A4', 'available', 'Business', NULL, NULL),
(114, '4', 'B1', 'available', 'Business', NULL, NULL),
(115, '4', 'B3', 'available', 'Business', NULL, NULL),
(116, '4', 'B4', 'available', 'Business', NULL, NULL),
(117, '4', 'C1', 'available', 'Economy', NULL, NULL),
(118, '4', 'C3', 'available', 'Economy', NULL, NULL),
(119, '4', 'C4', 'available', 'Economy', NULL, NULL),
(120, '4', 'D1', 'available', 'Economy', NULL, NULL),
(121, '4', 'D3', 'available', 'Economy', NULL, NULL),
(122, '4', 'D4', 'available', 'Economy', NULL, NULL),
(123, '4', 'E1', 'available', 'Economy', NULL, NULL),
(124, '4', 'E3', 'available', 'Economy', NULL, NULL),
(125, '4', 'E4', 'available', 'Economy', NULL, NULL),
(126, '4', 'F1', 'available', 'Economy', NULL, NULL),
(127, '4', 'F3', 'available', 'Economy', NULL, NULL),
(128, '4', 'F4', 'available', 'Economy', NULL, NULL),
(129, '4', 'G1', 'available', 'Economy', NULL, NULL),
(130, '4', 'G3', 'available', 'Economy', NULL, NULL),
(131, '4', 'G4', 'available', 'Economy', NULL, NULL),
(132, '4', 'H1', 'available', 'Economy', NULL, NULL),
(133, '4', 'H3', 'available', 'Economy', NULL, NULL),
(134, '4', 'H4', 'available', 'Economy', NULL, NULL),
(135, '4', 'I1', 'available', 'Economy', NULL, NULL),
(136, '4', 'I3', 'available', 'Economy', NULL, NULL),
(137, '4', 'I4', 'available', 'Economy', NULL, NULL),
(138, '4', 'J1', 'blocked', 'Economy', NULL, NULL),
(139, '4', 'J3', 'blocked', 'Economy', NULL, NULL),
(140, '4', 'J4', 'blocked', 'Economy', NULL, NULL),
(141, '8', 'A1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(142, '8', 'A2', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(143, '8', 'A3', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(144, '8', 'B1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(145, '8', 'B2', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(146, '8', 'B3', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(147, '8', 'C1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(148, '8', 'C2', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(149, '8', 'C3', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(150, '8', 'D1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(151, '8', 'D2', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(152, '8', 'D3', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(153, '8', 'E1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(154, '8', 'E2', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(155, '8', 'E3', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(156, '8', 'F1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(157, '8', 'F2', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(158, '8', 'F3', 'available', 'Economy', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(159, '8', 'G1', 'available', 'Business', '2019-08-25 16:30:20', '2019-08-25 16:30:20'),
(160, '8', 'G2', 'available', 'Economy', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(161, '8', 'G3', 'available', 'Economy', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(162, '8', 'H1', 'available', 'Business', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(163, '8', 'H2', 'available', 'Economy', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(164, '8', 'H3', 'available', 'Economy', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(165, '8', 'I1', 'available', 'Business', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(166, '8', 'I2', 'available', 'Economy', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(167, '8', 'I3', 'available', 'Economy', '2019-08-25 16:30:21', '2019-08-25 16:30:21'),
(168, '9', 'A1', 'available', 'Business', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(169, '9', 'A2', 'available', 'Economy', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(170, '9', 'A3', 'available', 'Economy', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(171, '9', 'B1', 'available', 'Business', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(172, '9', 'B2', 'available', 'Economy', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(173, '9', 'B3', 'available', 'Economy', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(174, '9', 'C1', 'available', 'Business', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(175, '9', 'C2', 'available', 'Economy', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(176, '9', 'C3', 'available', 'Economy', '2019-08-26 09:04:20', '2019-08-26 09:04:20'),
(177, '10', 'A1', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(178, '10', 'A2', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(179, '10', 'A3', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(180, '10', 'A4', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(181, '10', 'B1', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(182, '10', 'B2', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(183, '10', 'B3', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(184, '10', 'B4', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(185, '10', 'C1', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(186, '10', 'C2', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(187, '10', 'C3', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(188, '10', 'C4', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(189, '10', 'D1', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(190, '10', 'D2', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(191, '10', 'D3', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(192, '10', 'D4', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(193, '10', 'E1', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(194, '10', 'E2', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(195, '10', 'E3', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(196, '10', 'E4', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(197, '10', 'F1', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(198, '10', 'F2', 'available', 'Economy', '2019-08-29 14:29:16', '2019-08-29 14:29:16'),
(199, '10', 'F3', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(200, '10', 'F4', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(201, '10', 'G1', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(202, '10', 'G2', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(203, '10', 'G3', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(204, '10', 'G4', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(205, '10', 'H1', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(206, '10', 'H2', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(207, '10', 'H3', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(208, '10', 'H4', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(209, '10', 'I1', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(210, '10', 'I2', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(211, '10', 'I3', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(212, '10', 'I4', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(213, '10', 'J1', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(214, '10', 'J2', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(215, '10', 'J3', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17'),
(216, '10', 'J4', 'available', 'Economy', '2019-08-29 14:29:17', '2019-08-29 14:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `service_charges`
--

CREATE TABLE `service_charges` (
  `id` int(10) NOT NULL,
  `amount` int(5) NOT NULL,
  `status` varchar(10) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_charges`
--

INSERT INTO `service_charges` (`id`, `amount`, `status`, `updated_at`, `created_at`) VALUES
(1, 50, 'active', '2019-07-18 10:09:18', '2019-07-18 10:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `super_admins`
--

CREATE TABLE `super_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_infoID` int(6) DEFAULT NULL,
  `addressID` int(6) DEFAULT NULL,
  `adminID` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `super_admins`
--

INSERT INTO `super_admins` (`id`, `username`, `password`, `admin_infoID`, `addressID`, `adminID`, `created_at`, `updated_at`) VALUES
(1, 'admin-test', 'admin1', NULL, NULL, NULL, '2019-07-29 07:08:33', '2019-09-08 13:38:52'),
(2, 'muntasir', '$2y$10$g2cEKNuinmLw2q5IxViZzObtjjQX/GCc1T7BqoSetxK6XA7YZoZI.', 6, 4, 1, '2019-09-08 14:49:14', '2019-09-08 17:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `boarding_point` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dropping_point` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `agentID` int(10) NOT NULL,
  `adminID` int(10) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `boarding_point`, `dropping_point`, `booking_time`, `paymentID`, `userID`, `agentID`, `adminID`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Kallanpur', 'Kamarpara', '2019-07-13 17:46:43', 1, 4, 0, NULL, 'active', NULL, NULL),
(2, 'Kamarpara', 'Kallanpur', '2019-07-16 09:52:37', 2, 4, 0, NULL, 'previous', NULL, NULL),
(3, 'Kallanpur', 'Kamarpara bus stand', '2019-07-17 19:03:00', 3, 4, 0, NULL, 'active', '2019-07-17 12:56:51', '2019-07-17 12:56:51'),
(4, 'Kallanpur', 'Mithapukur', '2019-07-22 07:31:23', 0, 9, 2, NULL, 'active', '2019-07-22 07:31:23', '2019-07-22 07:38:23'),
(5, 'Kamarpara bus stand', 'Gabtoli', '2019-07-28 19:10:32', 4, 4, 0, NULL, 'paid', '2019-07-28 19:10:32', '2019-07-29 08:10:56'),
(6, 'Kamarpara bus stand', 'Kallanpur', '2019-07-28 19:25:24', 5, 4, 0, NULL, 'paid', '2019-07-28 19:25:24', '2019-07-29 08:42:26'),
(7, 'Shathibari', 'Gabtoli', '2019-07-29 04:36:00', 0, 11, 2, NULL, 'active', '2019-07-29 04:36:00', '2019-07-29 04:36:00'),
(8, 'Kallanpur', 'Kamarpara bus stand', '2019-07-29 08:41:58', 6, 4, 0, 2, 'cancelling', '2019-07-29 08:41:58', '2019-09-09 09:48:32'),
(9, 'Modern more', '', '2019-07-29 08:47:47', 0, 11, 2, NULL, 'active', '2019-07-29 08:47:47', '2019-07-29 08:47:47'),
(10, 'Kallanpur', 'Modern more', '2019-07-29 08:56:22', 7, 4, 0, 2, 'pending', '2019-07-29 08:56:22', '2019-09-09 09:48:20'),
(11, 'Gabtoli', 'Kamarpara bus stand', '2019-07-29 09:18:16', 8, 4, 0, NULL, 'active', '2019-07-29 09:18:16', '2019-07-29 09:21:47'),
(12, 'Gabtoli', 'Kamarpara bus stand', '2019-09-01 13:49:53', 9, 8, 0, 2, 'pending', '2019-09-01 13:49:53', '2019-09-09 09:48:23'),
(13, 'Savar', 'Mithapukur', '2019-09-02 09:18:37', 10, 4, 0, 2, 'active', '2019-09-02 09:18:37', '2019-09-09 09:32:30'),
(14, 'Savar', 'Mithapukur', '2019-09-02 09:30:40', 11, 4, 0, 2, 'pending', '2019-09-02 09:30:40', '2019-09-09 09:48:26'),
(15, 'Savar', 'Mithapukur', '2019-09-02 09:32:11', 12, 4, 0, NULL, 'pending', '2019-09-02 09:32:11', '2019-09-02 09:32:11'),
(16, 'Savar', 'Modern more', '2019-09-11 16:07:21', 13, 4, 0, NULL, 'pending', '2019-09-11 16:07:21', '2019-09-11 16:07:21'),
(17, 'Gabtoli', 'Pirgonj', '2019-09-11 17:02:24', 14, 8, 0, NULL, 'pending', '2019-09-11 17:02:24', '2019-09-11 17:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(10) UNSIGNED NOT NULL,
  `routeID` int(10) NOT NULL,
  `departure_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `busID` int(6) NOT NULL,
  `rID` int(10) NOT NULL,
  `b/e` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0/0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `routeID`, `departure_time`, `arrival_time`, `date`, `comment`, `busID`, `rID`, `b/e`, `created_at`, `updated_at`) VALUES
(1, 1, '11:00 PM', '7:30 AM', '2019-07-07', 'available', 4, 2, '1200/1000', NULL, NULL),
(2, 1, '8:00 PM', '7:30:00', '2018-05-22', 'available', 2, 3, '1200/1000', NULL, NULL),
(3, 2, '1:00 PM', '7:30:00', '2018-06-05', 'available', 4, 3, '1200/1000', NULL, NULL),
(4, 1, '9:00 PM', '5:00 AM', '2019-07-30', 'available', 1, 1, '500/500', NULL, '2019-07-28 14:08:13'),
(5, 1, '10:00 PM', '6:00 AM', '2019-07-30', 'available', 2, 1, '1200/1000', NULL, '2019-07-28 14:08:24'),
(6, 1, '11:00 PM', '7:00 AM', '2019-07-30', 'available', 3, 2, '500/500', NULL, '2019-07-28 14:08:31'),
(7, 30, '9:00 PM', '5:00 AM', '2019-07-31', 'available', 1, 1, '500/500', NULL, '2019-08-30 17:33:47'),
(8, 30, '10:00 PM', '6:00 AM', '2019-07-31', 'available', 2, 1, '1200/1000', NULL, '2019-07-28 14:08:48'),
(9, 30, '11:00 PM', '7:00 AM', '2019-07-31', 'available', 3, 2, '500/500', NULL, '2019-07-28 14:09:13'),
(10, 1, '10:00 PM', '06:00 AM', '2019-09-10', 'available', 10, 1, '500/500', '2019-09-02 06:41:51', '2019-09-02 06:43:27'),
(11, 30, '10:30 PM', '6:00 AM', '2019-09-20', 'available', 1, 1, '500/500', '2019-09-12 09:25:09', '2019-09-12 09:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone no` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `phone no`, `gender`, `age`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'nihad15', '123', 'example1@gmail.com', '', '', 0, '2019-06-19 01:58:26', '2019-06-19 01:58:26'),
(3, NULL, NULL, 'sakhawat', '1234', 'example1@gmail.com', '', '', 0, '2019-06-19 10:38:33', '2019-06-19 10:38:33'),
(4, 'Md Sakhawat', 'Hossain', 'sakhawat15', '$2y$10$38gN7v.iMS6VJbE4ChnCRefYaOOyzjtvCgdqswGcSPT4Wm0hJxaw2', 'msh15@gmail.com', '01780941550', 'male', 23, '2019-06-30 12:14:09', '2019-09-01 13:27:04'),
(5, 'Sakhawat', 'Hossain', 'sakhawat', '$2y$10$/UePWIq82gIJSI3chRTejO8Cpqv3dTOvRNH2vcCbcMleWX.DBTjAu', 'msh15@gmail.com', '01780941550', 'male', 23, '2019-06-30 12:51:57', '2019-06-30 12:51:57'),
(6, 'mosaddek', 'islam', 'hhh', '$2y$10$kqr.S.EiAHPDr/Qggo969u7NpEY5VLuQxYzoVImlG.yU90jWxVw0G', 'msh159@gmail.com', '01729483334', 'male', 23, '2019-07-01 03:37:14', '2019-07-01 03:37:14'),
(7, 'Tanvir', 'Mahmud', '1505039', '$2y$10$9jLGZvdwpXtcpvqs1wRBju0O1qeKYi52McXt9oFzZgIuW7RT0KeYC', 'tanim@gmail.com', '01708713775', 'male', 23, '2019-07-12 06:41:08', '2019-07-12 06:41:08'),
(8, NULL, NULL, 'tanvir15', '$2y$10$aoQPzXq8/NgvBXxISC5gmu1oI2g6qL1ibYPNyBEASm7HIlBXrmW8O', 'tanvir15@gmail.com', '01780941555', 'male', 0, '2019-07-17 04:20:00', '2019-07-17 04:20:00'),
(9, 'Masud Mia', NULL, '', '', NULL, '01780941551', 'male', 0, '2019-07-22 06:33:53', '2019-07-22 06:35:35'),
(10, 'sakhawat', NULL, '', '', NULL, '01780941552', 'male', 0, '2019-07-22 09:04:17', '2019-07-22 09:04:17'),
(11, 'MD Ibrahim Hossain', NULL, '', '', NULL, '01780951550', 'male', 0, '2019-07-29 04:13:20', '2019-07-29 04:13:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_infos`
--
ALTER TABLE `admin_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boardings`
--
ALTER TABLE `boardings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus_layouts`
--
ALTER TABLE `bus_layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seat_infos`
--
ALTER TABLE `seat_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_charges`
--
ALTER TABLE `service_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admins`
--
ALTER TABLE `super_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_infos`
--
ALTER TABLE `admin_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `boardings`
--
ALTER TABLE `boardings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bus_layouts`
--
ALTER TABLE `bus_layouts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `seat_infos`
--
ALTER TABLE `seat_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `service_charges`
--
ALTER TABLE `service_charges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_admins`
--
ALTER TABLE `super_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
