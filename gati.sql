-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2023 at 07:39 PM
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
-- Database: `gati`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Dhanashree', 'sweet');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'necklace'),
(2, 'earrings'),
(3, 'bangles');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `mrp` decimal(10,3) NOT NULL,
  `sale_price` decimal(10,3) NOT NULL,
  `unit` decimal(10,3) NOT NULL,
  `brand` longtext NOT NULL,
  `category` longtext NOT NULL,
  `bar_code` varchar(200) NOT NULL,
  `cgst` decimal(10,2) NOT NULL,
  `sgst` decimal(10,2) NOT NULL,
  `status` tinytext NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `mrp`, `sale_price`, `unit`, `brand`, `category`, `bar_code`, `cgst`, `sgst`, `status`, `created`) VALUES
(1, 'NATH', 300.000, 250.000, 130.000, 'LOCALBRAND', '1', '8901277017437', 0.00, 0.00, '1', '2023-09-09 09:55:35'),
(2, 'JHUMKA', 400.000, 350.000, 440.000, 'Lara', '2', 'JHUMKA', 0.00, 0.00, '1', '2023-09-18 15:28:20');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `name`, `password`) VALUES
(1, 'try', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `sales_person`
--

CREATE TABLE `sales_person` (
  `id` int(11) NOT NULL,
  `name` longtext DEFAULT NULL,
  `mobile_number` longtext DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `identity_proof` longtext DEFAULT NULL,
  `items_sold` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_person`
--

INSERT INTO `sales_person` (`id`, `name`, `mobile_number`, `address`, `identity_proof`, `items_sold`) VALUES
(1, 'Prathameshhhh', '78430877777', 'Flat 61,E2 Building,Green Acre Society, Bibwewadi', '1234565789', '0'),
(2, 'Dhanashreeee', '8208143115', 'Punee', '9876543218928', '5');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item`, `quantity`, `category`, `vendor`, `price`, `date`) VALUES
(1, 'JHUMKA', 20, 'earrings', 'VendorWithDate', 5000, '2023-09-20 20:30:17'),
(2, 'JHUMKA', 40, 'earrings', 'VendorWithDate', 5000, '2023-09-20 20:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `address` longtext NOT NULL,
  `identity_proof` longtext NOT NULL,
  `active` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `mobile_no`, `address`, `identity_proof`, `active`, `date`) VALUES
(1, 'vendorA', 2147483647, 'pune', '234567890', '1', '2023-09-09 09:51:17'),
(2, 'vendorB', 2147483647, 'pune', '124567893', '1', '2023-09-09 09:51:17'),
(3, 'vendorC', 2147483647, 'dhule', '2147483647', '0', '2023-09-09 09:51:17'),
(4, 'VendorWithDate', 8919201012, 'pune', '121212121212', '1', '2023-09-18 15:54:35'),
(5, 'VendorWithDate2', 8919201012, 'pune', '121212121212111111', '0', '2023-09-18 16:09:42'),
(6, 'VendorWithProperTime', 9012311111, 'pune', '121212121212', '1', '2023-09-18 19:46:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_person`
--
ALTER TABLE `sales_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales_person`
--
ALTER TABLE `sales_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
