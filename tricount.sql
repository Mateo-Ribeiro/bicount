-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql-con
-- Generation Time: Dec 19, 2025 at 09:46 AM
-- Server version: 9.5.0
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `BUDGETS`
--

CREATE TABLE `BUDGETS` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `BUDGETS`
--

INSERT INTO `BUDGETS` (`id`, `name`) VALUES
(1, 'saussice');

-- --------------------------------------------------------

--
-- Table structure for table `RELATION_BUDGET`
--

CREATE TABLE `RELATION_BUDGET` (
  `user_id` int NOT NULL,
  `budget_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `RELATION_TRANSACTION`
--

CREATE TABLE `RELATION_TRANSACTION` (
  `budget_id` int NOT NULL,
  `transaction_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `RELATION_TRANSACTION`
--

INSERT INTO `RELATION_TRANSACTION` (`budget_id`, `transaction_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `TRANSACTION`
--

CREATE TABLE `TRANSACTION` (
  `id` int NOT NULL,
  `amount` float NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `TRANSACTION`
--

INSERT INTO `TRANSACTION` (`id`, `amount`, `user_id`) VALUES
(1, 3.12, 1),
(2, -96.12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`id`, `name`, `email`, `password`) VALUES
(1, 'bieghsgf', 'fdgfbnsdvgbsg', 'poiuytrdqghj'),
(2, 'biehuorvhjsr', 'fdgfbng', 'poiuytrdqghj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BUDGETS`
--
ALTER TABLE `BUDGETS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `RELATION_BUDGET`
--
ALTER TABLE `RELATION_BUDGET`
  ADD PRIMARY KEY (`user_id`,`budget_id`),
  ADD KEY `RELATION_BUDGET_fk1` (`budget_id`);

--
-- Indexes for table `RELATION_TRANSACTION`
--
ALTER TABLE `RELATION_TRANSACTION`
  ADD PRIMARY KEY (`budget_id`,`transaction_id`),
  ADD UNIQUE KEY `RELATION_TRANSACTION_fk1` (`transaction_id`) USING BTREE;

--
-- Indexes for table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `TRANSACTION_fk2` (`user_id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BUDGETS`
--
ALTER TABLE `BUDGETS`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `RELATION_BUDGET`
--
ALTER TABLE `RELATION_BUDGET`
  ADD CONSTRAINT `RELATION_BUDGET_fk0` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`),
  ADD CONSTRAINT `RELATION_BUDGET_fk1` FOREIGN KEY (`budget_id`) REFERENCES `BUDGETS` (`id`);

--
-- Constraints for table `RELATION_TRANSACTION`
--
ALTER TABLE `RELATION_TRANSACTION`
  ADD CONSTRAINT `RELATION_TRANSACTION_fk0` FOREIGN KEY (`budget_id`) REFERENCES `BUDGETS` (`id`),
  ADD CONSTRAINT `RELATION_TRANSACTION_fk1` FOREIGN KEY (`transaction_id`) REFERENCES `TRANSACTION` (`id`);

--
-- Constraints for table `TRANSACTION`
--
ALTER TABLE `TRANSACTION`
  ADD CONSTRAINT `TRANSACTION_fk2` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
