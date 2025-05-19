-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2024 at 03:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`) VALUES
(4, 'Admin', 'admin123@gmail.com', 'admin123'),
(9, 'munia', 'tasnimmunia1@gmail.com', '$2y$10$Ee2h2lu8lKwOOcSFoKrDWO5/57p6L3/2/.WHu0/gHCbeIX4YT.a2a'),
(10, 'munia', 'tasnimmunia1234@gmail.com', '$2y$10$gbniZkRoSUHdwpsHdZ6EbOWKZmUEbr2DHSdFiHEebt9UrDcPWL0f2');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingId` int(11) NOT NULL,
  `PackageId` int(11) DEFAULT NULL,
  `FirstName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Phone` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `CancelledBy` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingId`, `PackageId`, `FirstName`, `Email`, `Phone`, `address`, `status`, `CancelledBy`, `arrivals`, `leaving`) VALUES
(31, 18, 'Anjali', 'anjalis3455@gmail.com', '6307134789', 'United states', 2, 'a', '0000-00-00', '0000-00-00'),
(32, 18, 'Shivam', 'ashish@gmail.com', '08126707709', 'United states', 2, 'a', '0000-00-00', '0000-00-00'),
(33, 19, 'Shivam', 'ashish@gmail.com', '08126707709', 'United states', 2, 'a', '0000-00-00', '0000-00-00'),
(34, 19, 'Shivam', 'anjalis3455@gmail.com', '08126707709', 'United states', 2, 'a', '0000-00-00', '0000-00-00'),
(35, 20, 'Shivam Maurya', 'anjalis3455@gmail.com', '08126707709', 'Asia', 0, NULL, '0000-00-00', '0000-00-00'),
(36, 19, 'Shivam Maurya', 'ashish@gmail.com', '08126707709', 'Asia', 0, NULL, '0000-00-00', '0000-00-00'),
(37, 18, 'munia', 'admin@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(38, 18, 'Admin', 'admin@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(39, 19, 'samin', 'admin@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(40, 19, 'aurna', 'tasnimmunia1@gmail.com', '09299883877', '', 2, 'a', '0000-00-00', '0000-00-00'),
(41, 20, 'munia', 'tasnimmunia1@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(42, 0, 'munia', 'tasnimmunia1@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(43, 146, 'munia', 'tasnimmunia1@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(44, 146, 'munia', 'admin@gmail.com', '09299883877', '', 0, NULL, '0000-00-00', '0000-00-00'),
(45, 146, 'saifan', 'tasnimmunia1@gmail.com', '09299883877', 'Dhaka', 0, NULL, '2024-09-30', '2024-10-02'),
(46, 146, 'saifan', 'tasnimmunia1@gmail.com', '09299883877', 'Dhaka', 2, 'a', '2024-09-30', '2024-10-02'),
(47, 151, 'samin', 'samin@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-01'),
(48, 151, 'samin', 'samin@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-01'),
(49, 151, 'samin', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-10-01', '2024-10-03'),
(50, 0, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(51, 0, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(52, 0, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(53, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(54, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(55, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(56, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(57, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(58, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02'),
(59, 144, 'munia', 'tasnimmunia1@gmail.com', '09299883877', 'sirajganj', 0, NULL, '2024-09-30', '2024-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `book_form`
--

CREATE TABLE `book_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending ',
  `total_price` int(244) NOT NULL,
  `method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_form`
--

INSERT INTO `book_form` (`id`, `name`, `email`, `phone`, `address`, `location`, `arrivals`, `leaving`, `status`, `total_price`, `method`) VALUES
(2, 'Tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', '0', '2024-12-12', '2024-09-18', '', 0, ''),
(4, 'Tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', '0', '2024-10-04', '2024-10-09', '', 0, ''),
(5, 'tasmin', 'aktar@gmail.com', '0185343201', 'sirajganj', '0', '2024-09-28', '2024-10-01', '', 0, ''),
(6, 'tasmin', 'tasnimmunia1234@gmail.com', '0185343201', 'sirajganj', '0', '2024-09-28', '2024-09-30', '', 0, ''),
(7, 'Tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', '0', '2024-09-28', '2024-10-01', '', 0, ''),
(8, 'tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-09-30', '2024-10-02', 'Pending ', 1000, 'Credit Card'),
(9, 'tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-09-30', '2024-10-02', 'Pending ', 1000, 'Credit Card'),
(10, 'tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-09-30', '2024-10-02', 'Pending ', 1000, 'Credit Card'),
(11, 'tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-09-30', '2024-10-02', 'Pending ', 1000, 'Credit Card'),
(12, 'tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-09-30', '2024-10-02', 'Pending ', 1000, 'Credit Card'),
(13, 'Tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-10-04', '2024-10-08', 'Pending ', 1000, 'Cash on delivery'),
(14, 'Tasmin', 'tasnimmunia1@gmail.com', '0185343201', 'sirajganj', 'Dhaka', '2024-10-04', '2024-10-08', 'Pending ', 1000, 'Cash on delivery'),
(15, 'Aurna', 'admin@gmail.com', '0185343201', 'Dhaka', 'Sylhet', '2024-10-02', '2024-10-06', 'Pending ', 2222, 'Cash on delivery'),
(16, 'tasmin', 'tasnimmunia1234@gmail.com', '0185343201', 'Dhaka', 'Dhaka', '2024-09-28', '2024-09-30', 'Pending ', 1000, 'Cash on delivery'),
(17, 'Ruma', 'aktar@gmail.com', '0185343201', 'Dhaka', 'Dhaka', '2024-09-29', '2024-10-02', 'Pending ', 1000, '0'),
(18, 'Ruma', 'aktar@gmail.com', '0185343201', 'Dhaka', 'Dhaka', '2024-09-29', '2024-10-02', 'Pending ', 1000, '0'),
(19, 'Ruma', 'aktar@gmail.com', '0185343201', 'Dhaka', 'Dhaka', '2024-09-29', '2024-10-02', 'Pending ', 1000, '0'),
(20, 'Ruma', 'aktar@gmail.com', '0185343201', 'Dhaka', 'Dhaka', '2024-09-29', '2024-10-02', 'Pending ', 1000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `image`) VALUES
(3, 'dhaka', 'pic5.png'),
(9, 'dhaka', 'pic3.png'),
(12, 'dhaka', 'pic1.png'),
(13, 'aaaaa', 'pic10.png'),
(14, 'Bandorban', 'pic6.png'),
(16, 'bandorban', 'WhatsApp Image 2024-09-16 at 9.46.00 PM (2).jpeg'),
(17, 'bandorban', 'pic3.png');

-- --------------------------------------------------------

--
-- Table structure for table `massage`
--

CREATE TABLE `massage` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `masg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `massage`
--

INSERT INTO `massage` (`id`, `name`, `email`, `masg`) VALUES
(1, 'tasmin', 'tasnimmunia1@gmail.com', 'aaaa'),
(59, 'tasmin', 'tasnimmunia1234@gmail.com', 'i am munia'),
(66, 'Tasmin', 'tasnimmunia1@gmail.com', 'i face some problem'),
(67, 'Tasmin', 'tasnimmunia1@gmail.com', 'i face some problem'),
(68, 'tasmin', 'tasnimmunia1@gmail.com', 'ss'),
(69, 'tasmin', 'tasnimmunia1@gmail.com', 'ss'),
(70, 'Tasmin', 'tasnimmunia1@gmail.com', 'ddddd'),
(71, 'Tasmin', 'tasnimmunia1@gmail.com', 'ddddd'),
(72, 'tasmin', 'samin@gmail.com', 'ssss'),
(73, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(74, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(75, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(76, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(77, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(78, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(79, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(80, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(81, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(82, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(83, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(84, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(85, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(86, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(87, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(88, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(89, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(90, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(91, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(92, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(93, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(94, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(95, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(96, 'Tasmin', 'tasnimmunia1@gmail.com', 'ssss'),
(97, 'tasmin', 'tasnimmunia1@gmail.com', 'hdsuhdjsfudjfu'),
(98, 'Tasmin', 'tasnimmunia1@gmail.com', 'thjjhghjjuhyh');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `msg` varchar(2555) NOT NULL,
  `img` varchar(255) NOT NULL,
  `offer_pac` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `discount` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `image`, `msg`, `img`, `offer_pac`, `category`, `discount`) VALUES
(151, 'dhaka', '2000', 'pic12.jpeg', '3 day full Dhaka tour ', 'pic14.jpeg', 'Tour Deriles ', 'International', 5000),
(154, 'Sylhet', '1000', 'pic9.png', '3 day full Sylhet tour amazing  offer', 'pic25.jpeg', 'Tour Deriles ', 'International', 1650),
(157, 'bandorban', '2000', 'pic18.jpeg', '1 day full Bandorban city tour ', 'pic5.png', 'Tour Deriles ', 'offer package', 2400),
(161, 'Sylhet', '1500', 'pic9.png', '3 day Sylhet tour with amazing offer', 'pic21.jpeg', 'Tour Deriles ', 'offer package', 2000),
(163, 'dhaka', '8888', 'pic7.png', '3 day full Dhaka tour amazing  offer', 'pic12.jpeg', 'Tour Deriles ', 'Group tour', 9999),
(165, 'dhaka', '2222', 'pic7.png', '3 day full Dhaka tour ', 'pic11.png', 'Tour Deriles ', 'Couple package', 2222),
(166, 'bandorban', '4000', 'pic10.png', '3 day full Dhaka tour ', 'pic9.png', 'Tour Deriles ', 'Couple package', 5000),
(167, 'dhaka', '3000', 'pic14.jpeg', '1 day full Dhaka tour ', 'pic12.jpeg', '1 Day Dhaka City tour', 'Picnic package', 3500),
(168, 'bandorban', '8000', 'pic15.jpeg', '3 Days & 2 Night @Bandorban  BDT 8000 Couple Package', 'pic16.jpeg', '3 Day Bandorban City tour', 'Couple package', 8600),
(169, 'bandorban', '6999', 'pic7.png', '3 day full Dhaka tour ', 'pic12.jpeg', 'Tour Deriles ', 'Familly package', 8900);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(6, 'Lorem Ipsum', 4, 'The camera quality is phenomenal, especially in low light conditions.', 1621935691),
(7, 'Jane Doe', 5, 'Battery life lasts me all day, even with heavy usage. Impressive!', 1621939888),
(8, 'John Doe', 5, 'Love the sleek design and lightning-fast performance of this iphone!', 1621940010),
(9, 'Ami', 4, 'this good', 1726898433),
(10, 'Ami', 4, 'this good', 1726898458),
(11, 'Munia', 5, 'very good', 1727105347),
(12, 'Munia', 3, 'feddd', 1727171236);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `full_name`, `number`) VALUES
(25, 'admin@gmail.com', '$2y$10$O1Pg7He7Ta.KNeRw4LhTHe.pQBuY1s6WEAzegG9JMv.x7CCAFyZpe', 'Aurna', 1988888880),
(27, 'tasnimmunia12349@gmail.com', '$2y$10$TN0xQGo5oqcWlliF78.OL.V2nsJZ2RrZyBojGY/BI7FbwHgzC.EE2', 'munia', 1988888888),
(28, 'tasnimmunia1@gmail.com', '$2y$10$cD5MKaB7gyCVRiJJczS/Iu9asJC9B4Y44pQZKzhiJuA6j3qkbvKpi', 'munia', 1988888888),
(29, 'tasnimmunia12@gmail.com', '$2y$10$fGLV8zHb8LIp6hF5P1HQkuX/D/3LoBV1/0v/Ry22/gxETBvWakMNS', 'Muniaa', 1988888888);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingId`);

--
-- Indexes for table `book_form`
--
ALTER TABLE `book_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `massage`
--
ALTER TABLE `massage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `book_form`
--
ALTER TABLE `book_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `massage`
--
ALTER TABLE `massage`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
