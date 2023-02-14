-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 07:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_number` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `amount_paid` varchar(20) NOT NULL,
  `amount_due` varchar(20) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `note` varchar(300) NOT NULL,
  `tearms_conditions` varchar(10) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `client_name`, `client_number`, `client_address`, `subtotal`, `amount_paid`, `amount_due`, `payment_mode`, `note`, `tearms_conditions`, `date_time`) VALUES
(9, 'Prasad Mahure', '7896522', 'Amravati', '24000', '20000', '4000', 'Cash Payment', 'Demo', 'Agree', '2022-01-26 16:18:10'),
(10, 'Prasad Mahure', '874545', 'Amravati', '16000.00', '6000', '1200', 'Cheque Payment', 'dfdfdf', 'Agree', '2022-01-26 17:06:44'),
(11, 'Yogesh', '789652347', 'Amravati', '18180.00', '000', '014241', 'Cash Payment', 'rdfgcdrhgdfrg', 'Agree', '2022-01-26 17:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL,
  `client_number` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `total` varchar(25) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `client_number`, `client_name`, `product_code`, `product_name`, `quantity`, `price`, `total`, `date_time`) VALUES
(5, '7896522', 'Prasad Mahure', 'TP-002 - Dynamic Website', 'Dynamic Website', '1', '6000', '6000.00', '2022-01-26 16:18:10'),
(6, '7896522', 'Prasad Mahure', 'TP-003 - Semi E-Commerce Website', 'Semi E-Commerce Website', '2', '16000', '16000', '2022-01-26 16:18:10'),
(7, '874545', 'Prasad Mahure', 'TP-002 - Dynamic Website', 'Semi E-Commerce Website', '2', '8000', '16000.00', '2022-01-26 17:06:44'),
(8, '789652347', 'Yogesh', 'TP-003 - Semi E-Commerce Website', 'Dynamic Website', '4', '4545', '18180.00', '2022-01-26 17:37:49'),
(9, '789652347', 'Yogesh', 'TP-003 - Semi E-Commerce Website', 'Dynamic Website', '44', '4', '4444', '2022-01-26 17:37:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
