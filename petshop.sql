-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2026 at 02:49 AM
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
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@min', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `phone`, `address`, `payment_method`, `total`, `order_date`, `status`) VALUES
(3, 4, 'Haruto', '09234848493', 'idiid', 'DANA', 733000.00, '2026-06-23 10:04:37', 'Delivered'),
(4, 4, 'Yoshi', '083875387724', 'kp,nyalidung', 'Cash on Delivery', 103000.00, '2026-06-23 10:25:08', 'Pending'),
(5, 4, 'juju', '09828732', 'sdadas', 'OVO', 712000.00, '2026-06-23 10:35:33', 'Pending'),
(6, 4, 'Shalwa Maulidha Husein', '083875387724', 'KOLOPOK', 'Cash on Delivery', 423000.00, '2026-06-24 01:14:00', 'Pending'),
(7, 4, 'nono', '08979887788', 'jririit', 'DANA', 145000.00, '2026-06-24 01:56:48', 'Pending'),
(8, 4, 'nono', '08979887788', 'jririit', 'DANA', 145000.00, '2026-06-24 01:56:59', 'Pending'),
(9, 5, 'Shalwa Maulidha Husein', '09234848493', 'kfokof', 'DANA', 712000.00, '2026-06-24 02:14:51', 'Pending'),
(10, 4, 'jeongwoo', '083875387724', 'iksan', 'Cash on Delivery', 85000.00, '2026-06-30 15:12:58', 'Cancelled'),
(11, 4, 'mang ryul', '083875387724', 'rumah papi jay park', 'DANA', 422000.00, '2026-06-30 15:17:18', 'Cancelled'),
(12, 4, 'Shalwa Maulidha Husein', '09828732', 'aa', 'DANA', 35000.00, '2026-06-30 15:51:53', 'Processing'),
(13, 4, 'Shalwa Maulidha Husein', '083875387724', 'klool', 'Bank Transfer', 34000.00, '2026-07-03 01:53:46', 'Delivered'),
(14, 4, 'Shalwa Maulidha Husein', '083875387724', 'cicurug', 'QRIS', 106000.00, '2026-07-03 01:59:58', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`, `quantity`, `subtotal`) VALUES
(1, 12, 'Kibble', 25000.00, 1, 25000.00),
(2, 13, 'Whiskas Wet Food Adult 400g', 24000.00, 1, 24000.00),
(3, 14, 'Whiskas Kitten 11kg', 75000.00, 1, 75000.00),
(4, 14, 'Royal Canin Hairball Care Wet 85gr', 21000.00, 1, 21000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `phone`, `name`, `email`, `password`, `created_at`) VALUES
(4, '08387538772', 'Shalwa Maulidha Husein', 'shalwahsein@gmail.com', '$2y$10$LjVv.YhsxOrj08QKEM8Mlu.23Wst9OzVnTuy6McN5cHSA.OhVThUq', '2026-06-30 14:32:56'),
(5, '09234848493', 'Haruto Watanabe', 'harutow@min.com', '$2y$10$Z7BnOlZ8b7xlGLRPWZ.NZO4czbUF91GmOFQjzJ4oleiAoVa08hnJ6', '2026-06-23 07:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Phone Number` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
