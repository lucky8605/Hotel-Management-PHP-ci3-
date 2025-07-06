-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 03:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2z_web_project_ci3_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_tbl_id` int(11) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_mobile` varchar(15) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_tbl_id`, `admin_name`, `admin_email`, `admin_mobile`, `admin_password`) VALUES
(1, 'vikas Pawar', 'vikas@gmail.com', '9657613754', 'vikas@123');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_tbl_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `admin_tbl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_tbl_id`, `category_name`, `admin_tbl_id`) VALUES
(2, 'Non Veg', 1),
(3, 'Veg', 1),
(4, 'Starter', 1),
(5, 'Drink', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product_tbl`
--

CREATE TABLE `order_product_tbl` (
  `order_product_tbl_id` int(11) NOT NULL,
  `order_tbl_id` int(11) DEFAULT NULL,
  `product_tbl_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `product_price` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product_tbl`
--

INSERT INTO `order_product_tbl` (`order_product_tbl_id`, `order_tbl_id`, `product_tbl_id`, `qty`, `product_price`, `total`) VALUES
(1, 1, 4, 1, 200, 200),
(2, 1, 5, 1, 500, 500),
(3, 1, 6, 1, 20, 20),
(4, 1, 7, 1, 50, 50),
(5, 2, 3, 1, 270, 270),
(6, 2, 6, 1, 20, 20),
(7, 3, 3, 1, 270, 270),
(8, 3, 4, 1, 200, 200),
(9, 3, 6, 2, 20, 40),
(10, 4, 5, 3, 500, 1500),
(11, 5, 5, 1, 500, 500),
(12, 5, 4, 4, 200, 800),
(13, 6, 5, 3, 500, 1500),
(14, 6, 7, 1, 50, 50),
(15, 6, 6, 1, 20, 20),
(16, 6, 6, 1, 20, 20),
(17, 6, 7, 1, 50, 50),
(18, 7, 3, 1, 270, 270),
(19, 7, 7, 1, 50, 50),
(20, 6, 5, 2, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_tbl_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `table_tbl_id` int(11) DEFAULT NULL,
  `order_time` varchar(10) DEFAULT NULL,
  `order_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_tbl_id`, `order_date`, `table_tbl_id`, `order_time`, `order_status`) VALUES
(1, '2025-01-24', 2, '11:26', 'complete'),
(2, '2025-01-24', 3, '11:28', 'complete'),
(3, '2025-01-24', 3, '14:05', 'complete'),
(4, '2025-01-24', 3, '14:06', 'complete'),
(5, '2025-01-24', 2, '14:07', 'complete'),
(6, '2025-01-24', 2, '14:09', 'active'),
(7, '2025-02-14', NULL, '20:07', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_tbl_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` varchar(100) DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `category_tbl_id` int(11) DEFAULT NULL,
  `admin_tbl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_tbl_id`, `product_name`, `product_price`, `product_img`, `category_tbl_id`, `admin_tbl_id`) VALUES
(3, 'Panner Masala', '270', '1737524703panner.jpg', 3, 1),
(4, 'Shev Bhaji', '200', '1737526716shev.jpg', 3, 1),
(5, 'Chicken', '500', '1737526934chicken.jpg', 2, 1),
(6, 'Water', '20', '1737526968water.jpg', 5, 1),
(7, 'Cold Drink', '50', '1737526988colddrink.jpg', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_tbl`
--

CREATE TABLE `table_tbl` (
  `table_tbl_id` int(11) NOT NULL,
  `table_no` varchar(100) NOT NULL,
  `admin_tbl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_tbl`
--

INSERT INTO `table_tbl` (`table_tbl_id`, `table_no`, `admin_tbl_id`) VALUES
(1, 'Table No - 1', 1),
(2, 'Table No - 2', 1),
(3, 'Table No - 3', 1),
(5, 'Table No - 4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_tbl_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_tbl_id`);

--
-- Indexes for table `order_product_tbl`
--
ALTER TABLE `order_product_tbl`
  ADD PRIMARY KEY (`order_product_tbl_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_tbl_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_tbl_id`);

--
-- Indexes for table `table_tbl`
--
ALTER TABLE `table_tbl`
  ADD PRIMARY KEY (`table_tbl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_product_tbl`
--
ALTER TABLE `order_product_tbl`
  MODIFY `order_product_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_tbl`
--
ALTER TABLE `table_tbl`
  MODIFY `table_tbl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
