-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 12:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `available_dates`
--

CREATE TABLE `available_dates` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `playground_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `hours` int(11) NOT NULL,
  `playground_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `calculate_total_price` BEFORE INSERT ON `booking` FOR EACH ROW BEGIN
    SET NEW.total_price = NEW.hours * (SELECT price_per_hour FROM playgrounds WHERE id = NEW.playground_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contract_image` varchar(250) NOT NULL,
  `owner_phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `email`, `password`, `contract_image`, `owner_phone`) VALUES
(1, 'Mohamed', 'mo@gmail.com', '12345678', 'contract.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `playgrounds`
--

CREATE TABLE `playgrounds` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location_address` varchar(250) NOT NULL,
  `location_city` varchar(100) NOT NULL,
  `cover_image` varchar(100) DEFAULT NULL,
  `price_per_hour` float NOT NULL,
  `capacity` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playgrounds`
--

INSERT INTO `playgrounds` (`id`, `name`, `location_address`, `location_city`, `cover_image`, `price_per_hour`, `capacity`, `owner_id`) VALUES
(7, 's', 'w', 'w', '485779bddf54977cf737364861470585.jpeg', 1, 1, 1),
(8, 'a', 's', 's', 'ba51cbbf2eb971f3374dc6c9ae61ba44.jpeg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `playground_images`
--

CREATE TABLE `playground_images` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `playground_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playground_images`
--

INSERT INTO `playground_images` (`id`, `image`, `playground_id`) VALUES
(1, '48aa769f99f8c3405a8732a32ced667f.png', 8),
(2, 'f835f0e3ae6f4c9dc8b382ecb994fa47.png', 8),
(3, 'd1a4d15cf45a4e493d698678baf15a88.png', 8),
(4, 'd05a6be5eee1e89b158f46c19e93b384.png', 8),
(5, '6066a0dad8eefee376545120417cb991.png', 8),
(6, '9114800968c569ae017d93232d399402.png', 8),
(7, '4287083f9f0578d8b75fdf1b3293c05d.png', 8),
(8, 'c545f6b95286b5daf2eaa07d2501a592.png', 8),
(9, 'dd660405e4d94a89a70f5dc72ec7743d.png', 8),
(10, '0849f46dc515eed1b8b21bdf9e11edde.png', 8);

-- --------------------------------------------------------

--
-- Table structure for table `playground_services`
--

CREATE TABLE `playground_services` (
  `playground_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ali', 'hgamal93@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `user_phones`
--

CREATE TABLE `user_phones` (
  `id` int(11) NOT NULL,
  `number` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playground_id` (`playground_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playground_id` (`playground_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `playgrounds`
--
ALTER TABLE `playgrounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `playground_images`
--
ALTER TABLE `playground_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playground_id` (`playground_id`);

--
-- Indexes for table `playground_services`
--
ALTER TABLE `playground_services`
  ADD PRIMARY KEY (`playground_id`,`service_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_phones`
--
ALTER TABLE `user_phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_dates`
--
ALTER TABLE `available_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playgrounds`
--
ALTER TABLE `playgrounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `playground_images`
--
ALTER TABLE `playground_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_phones`
--
ALTER TABLE `user_phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_dates`
--
ALTER TABLE `available_dates`
  ADD CONSTRAINT `available_dates_ibfk_1` FOREIGN KEY (`playground_id`) REFERENCES `playgrounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`playground_id`) REFERENCES `playgrounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playgrounds`
--
ALTER TABLE `playgrounds`
  ADD CONSTRAINT `playgrounds_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playground_images`
--
ALTER TABLE `playground_images`
  ADD CONSTRAINT `playground_images_ibfk_1` FOREIGN KEY (`playground_id`) REFERENCES `playgrounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playground_services`
--
ALTER TABLE `playground_services`
  ADD CONSTRAINT `playground_services_ibfk_1` FOREIGN KEY (`playground_id`) REFERENCES `playgrounds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playground_services_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_phones`
--
ALTER TABLE `user_phones`
  ADD CONSTRAINT `user_phones_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
