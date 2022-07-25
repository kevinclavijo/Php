-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220506.44a5cb2d56
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3309
-- Generation Time: Jun 02, 2022 at 04:04 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `img`, `stock`) VALUES
(1, 'coffe', '20.00', 'cof.jpg', 95),
(2, 'Sugar', '3.20', 'sugar.jpg', 200),
(3, 'Soup - Chicken ', '224.02', 'is.jpg', 62),
(4, 'Melon', '8.50', 'melon_194841866.png', 24),
(5, 'Soup - Campbells ', '3.50', '842958.jpg', 27),
(6, 'Chocolate', '2.50', 'chocolate.jpg', 200),
(33, 'Melon', '22.00', 'melon_194841866.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'Kevin', 'kevin@nbcc.ca', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Rafael', 'rafael@nbcc.ca', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(3, 'Gladys', 'gladys@nbcc.ca', 'ee11cbb19052e40b07aac0ca060c23ee', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



