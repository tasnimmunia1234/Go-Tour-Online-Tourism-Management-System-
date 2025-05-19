-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 11, 2024 at 05:55 PM
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
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Aktar', 'aktar@gmail.com', '$2y$10$Jmf9Xk2y8m.fo3c/ZgKmzOrdIRkU05KSGLI0picKLEtr68ll7hjB.'),
(2, 'munia', 'tasnimmunia1@gmail.com', '$2y$10$PMs53dttEb4Q2PLAOQ02OOHqInhdTPBCdvOIDOyMntKWzayq/6m8G'),
(3, 'munia', 'tasnimmunia1234@gmail.com', '$2y$10$Ba.Gl6EbKwEAr/JvdYKR8OXgSL/DkYFWhvABMZhIFWuIIHnIOKcX6'),
(4, 'Admin', 'admin123@gmail.com', '$2y$10$gQgolhol0lprQ.tSNS6lcOEo2NvnwuUy9sFYbXJCYMLYl3WZB9yPC'),
(5, 'munia', 'tasnimmunia123@gmail.com', '$2y$10$YzMDEQ33uIa8/mfzH7FjeOihtTZs8ziYSCyBTOF9IzuGdJfP3sZli'),
(6, 'munia', 'tasnimmunia91@gmail.com', '$2y$10$/bNxT3AJUDYbjokZgm6ejeXUBEP4d7MggkYvcf9B55BmqfNDKK/SG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
