-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 02:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mukase_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` enum('Breakfast','Lunch','Dinner') NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `email`, `phone`, `number_of_guests`, `reservation_date`, `reservation_time`, `message`) VALUES
(6, 'Emily Chen', 'emilychen@gmail.com', '1234567890', 2, '0000-00-00', 'Dinner', 'Please reserve a table near the window. Thank you!'),
(7, 'Davide Lee', 'davidlee@yahoo.com', '9876543210', 2, '0000-00-00', 'Breakfast', 'Do you have any vegetarian options? Looking forward to trying your restaurant!'),
(8, 'Sophia Patel', 'sophia.patel@hotmail.com', '5678901234', 6, '0000-00-00', 'Lunch', 'Can I request a private room for special occasion? Please let me know. Thanks!'),
(9, 'Michel Kim', 'michealkim@outlook.com', '3456789012', 3, '0000-00-00', 'Dinner', 'Do you have any gluten-free options? My friend has dietary restrictions. Thank you!'),
(10, 'Julia Brown', 'julia.brown@aol.com', '9012345678', 5, '0000-00-00', 'Breakfast', 'Can we request a high chair for our toddler? Looking forward to our visit!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
