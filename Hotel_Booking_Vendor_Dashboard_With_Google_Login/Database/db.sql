-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 09:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--
CREATE DATABASE IF NOT EXISTS `hotelBMS` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hotelBMS`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin@gmail.com', '$2y$10$ruAVnYR98PsnofHBF/cqsO8z2N1Ktb29Z55Aack8W.CRyJgztkD2O');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(200) NOT NULL,
  `hotel_id` int(200) NOT NULL,
  `room_type` varchar(200) NOT NULL,
  `room_no` varchar(200) NOT NULL,
  `check_in_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `hotel_id`, `room_type`, `room_no`, `check_in_date`, `checkout_date`, `total_price`, `customer_id`, `booking_date`) VALUES
(21, 15, 8, 'Single', 'A-101', '2025-03-31', '2025-04-02', '2000', 'customer_9626', '2025-03-31 08:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `mobile` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id_card_type` varchar(200) NOT NULL,
  `id_number` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `user_id`, `first_name`, `last_name`, `mobile`, `email`, `id_card_type`, `id_number`, `address`, `created_at`) VALUES
(11, 'customer_3399', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '7984651320', 'Nanded', '2025-03-28 10:11:34'),
(12, 'customer_5875', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '978465', 'Nanded', '2025-03-31 06:16:55'),
(13, 'customer_5147', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '7894651320', 'Nanded', '2025-03-31 06:26:08'),
(14, 'customer_9683', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '7984651320', 'Nanded', '2025-03-31 06:28:08'),
(15, 'customer_8222', 15, 'Ravindra', 'Hingmire', 2147483647, 'hingmireabhishek250@gmail.com', 'National Identity Card', '7984651320', 'Shiv automobiles old bus stand', '2025-03-31 06:28:50'),
(16, 'customer_1482', 15, 'Pratik', 'Bhoyar', 2147483647, 'hingmireabhishek250@gmail.com', 'National Identity Card', '7984651320', 'Mahalaxmi Temple Lane no 11 Karve nagar', '2025-03-31 06:30:05'),
(17, 'customer_5970', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '7984651320', 'Nanded', '2025-03-31 06:35:55'),
(18, 'customer_9624', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'Pan Card', '7984651320', 'Nanded', '2025-03-31 06:41:57'),
(19, 'customer_4292', 15, 'Pratik', 'Bhoyar', 2147483647, 'bsilent2502@gmail.com', 'Driving License', '7984651320', 'Mahalaxmi Temple Lane no 11 Karve nagar', '2025-03-31 06:43:15'),
(20, 'customer_5546', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '7984651320', 'Nanded', '2025-03-31 06:44:47'),
(21, 'customer_9626', 15, 'Abhishek', 'Hingmire', 2147483647, 'bsilent2502@gmail.com', 'National Identity Card', '8976451', 'Nanded', '2025-03-31 08:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `hotel_location` varchar(200) NOT NULL,
  `hotel_desc` varchar(200) NOT NULL,
  `hotel_email` varchar(200) NOT NULL,
  `hotel_mobile` varchar(200) NOT NULL,
  `vendor_id` int(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hotel_images` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_location`, `hotel_desc`, `hotel_email`, `hotel_mobile`, `vendor_id`, `created_at`, `hotel_images`) VALUES
(5, 'Abhishek Hotels', 'Pune', 'Test', 'abhihotel@gmail.com', '3148921321', 18, '2025-03-24 10:13:17', ''),
(6, 'Abhishek Hotels', 'Pune', 'Test', 'abhihotel@gmail.com', '3148921321', 18, '2025-03-24 10:13:35', ''),
(7, 'Suraj Hotel', 'Pune', 'Test', 'surajhotel@gmail.com', '789645310', 19, '2025-03-26 08:57:39', ''),
(8, 'Tushar Hotels', 'Pune', 'test', 'tushar@gmail.com', '7984651320', 15, '2025-03-27 16:05:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_type`
--

CREATE TABLE `id_card_type` (
  `id_card_type_id` int(10) NOT NULL,
  `id_card_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `id_card_type`
--

INSERT INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
(1, 'National Identity Card'),
(3, 'Pan Card'),
(4, 'Driving License');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_no` varchar(200) NOT NULL,
  `room_type_id` int(200) NOT NULL,
  `room_type_name` varchar(200) NOT NULL,
  `hotel_id` int(200) NOT NULL,
  `booking_status` int(200) NOT NULL DEFAULT 0,
  `check_in_status` int(200) NOT NULL DEFAULT 0,
  `check_out_status` int(200) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `room_type_id`, `room_type_name`, `hotel_id`, `booking_status`, `check_in_status`, `check_out_status`, `created_at`) VALUES
(32, 'B-102', 4, 'Family', 5, 0, 0, 0, '2025-03-27 06:46:08'),
(33, 'C-103', 8, 'Connecting Rooms', 5, 0, 0, 0, '2025-03-27 06:50:12'),
(34, '101', 5, 'King Sized', 5, 0, 0, 0, '2025-03-27 06:56:17'),
(35, 'A-102', 7, 'Mini-Suite', 5, 0, 0, 0, '2025-03-27 07:02:50'),
(36, '101', 9, 'Presidential Suite', 5, 0, 0, 0, '2025-03-27 07:03:56'),
(37, 'A-101', 4, 'Family', 5, 1, 0, 0, '2025-03-27 07:56:49'),
(38, 'A-102', 4, 'Family', 5, 0, 0, 0, '2025-03-27 07:57:03'),
(39, 'A-101', 1, 'Single', 8, 1, 0, 0, '2025-03-27 16:21:42'),
(40, 'A-102', 2, 'Double', 8, 0, 0, 0, '2025-03-27 16:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`) VALUES
(1, 'Single', 1000, 1),
(2, 'Double', 1500, 2),
(3, 'Triple', 2000, 3),
(4, 'Family', 3000, 2),
(5, 'King Sized', 5500, 4),
(6, 'Master Suite', 6500, 6),
(7, 'Mini-Suite', 3600, 3),
(8, 'Connecting Rooms', 8000, 6),
(9, 'Presidential Suite', 21000, 4),
(10, 'Murphy Room', 6900, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(200) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `google_id`) VALUES
(15, 'Tushar Gaikwad', 'tushar@gmail.com', 'vendor', '$2y$10$aPMpKWkM2N1eDbb0CiUPGeemJumXb2H1sL1knQLgoxfJPhEgijPr.', NULL),
(16, 'Abhishek ', 'admin@gmail.com', 'user', '$2y$10$ruAVnYR98PsnofHBF/cqsO8z2N1Ktb29Z55Aack8W.CRyJgztkD2O', NULL),
(18, 'Abhishek Hingmire', 'abhi@gmail.com', 'vendor', '$2y$10$gAk2LjnTXrBajTwuUtdciu8cKeGERFf9Wo6ClcMHPZCdH0fr7FmMO', NULL),
(19, 'Suraj', 'suraj@gmail.com', 'vendor', '$2y$10$jZqvDuYkUbXGNn6/OFNfmeAxVfZ7fZ8Rtt/EVlQMWXq86Fhf9AuBC', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `id_card_type`
--
ALTER TABLE `id_card_type`
  ADD PRIMARY KEY (`id_card_type_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `google_id` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `id_card_type`
--
ALTER TABLE `id_card_type`
  MODIFY `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
