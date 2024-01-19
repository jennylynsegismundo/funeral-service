-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 12:38 PM
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
-- Database: `db_funeralservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_product_tbl`
--

CREATE TABLE `additional_product_tbl` (
  `id` int(11) NOT NULL,
  `additional_serv_type` varchar(100) NOT NULL,
  `additional_price` decimal(10,2) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `additional_product_tbl`
--

INSERT INTO `additional_product_tbl` (`id`, `additional_serv_type`, `additional_price`, `prod_id`, `is_archived`) VALUES
(1, 'Cups with face of deceased (10 pcs)', 1500.00, 3, 0),
(11, 'Urn Necklace', 23100.00, 0, 0),
(12, 'Farewell T-shirt', 500.00, 0, 0),
(13, 'Customized Helium Balloons', 1000.00, 0, 0),
(14, 'Engraved Lapida', 5000.00, 0, 0),
(15, 'Long Lasting Gel Candles', 2500.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `casket_tbl`
--

CREATE TABLE `casket_tbl` (
  `casket_id` int(11) NOT NULL,
  `casket_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `casket_price` decimal(10,2) NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `prod_id` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `casket_tbl`
--

INSERT INTO `casket_tbl` (`casket_id`, `casket_name`, `description`, `casket_price`, `is_archived`, `prod_id`) VALUES
(27, 'St. Anne', 'Metal Casket, Double Top (split and full lid covers), Full Glass, Elegant Interiors, corners and handles', 157500.00, 0, '2024-01-07 11:24:37'),
(28, 'St. Bernadette', 'Metal Casket,  Single Top (full lid cover), Full Glass, Elegant Interiors, corners and handles', 125000.00, 0, '2024-01-07 11:24:53'),
(29, 'St. Claire', 'Metal Casket, Single Top (half lid cover), Half Glass, Elegant Interiors, corners and handles', 98500.00, 0, '2024-01-07 11:28:18'),
(30, 'St. Dominique', 'Wood Casket, Single Top (full lid cover), Full Glass, Elegant Interiors, corners and handles', 67500.00, 0, '2024-01-07 11:23:29'),
(31, 'St. Gregory', 'Metal Casket, Single Top (Split Lid Cover), Full Glass, Elegant Interiors, corners and handles', 57000.00, 0, '2024-01-07 11:23:58'),
(32, 'St. Gregory', 'Wood Casket, Single Top (Split Lid Cover), Full Glass, Elegant Interiors, corners and handles', 53000.00, 0, '2024-01-07 11:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `casket_urn_tbl`
--

CREATE TABLE `casket_urn_tbl` (
  `sales_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `total_sales` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funeral_service_tbl`
--

CREATE TABLE `funeral_service_tbl` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `serv_prod` int(11) NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funeral_service_tbl`
--

INSERT INTO `funeral_service_tbl` (`service_id`, `service_name`, `price`, `serv_prod`, `is_archived`, `created_at`) VALUES
(116, 'Tribute', 9000.00, 0, 0, '2024-01-06 13:08:31'),
(117, 'Tribute', 9000.00, 0, 0, '2024-01-06 13:08:50'),
(118, 'Mortuary Freezer', 3000.00, 0, 0, '2024-01-06 14:01:37'),
(119, 'Direct Burial', 20000.00, 0, 0, '2024-01-06 16:30:45'),
(120, 'Cremation', 30000.00, 0, 0, '2024-01-07 11:42:19'),
(121, 'Funeral Services', 25000.00, 0, 0, '2024-01-07 12:23:35'),
(122, 'Mortuary Freezer', 3000.00, 0, 0, '2024-01-13 05:39:22'),
(123, 'Funeral Services', 25000.00, 0, 0, '2024-01-13 05:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_tbl`
--

CREATE TABLE `inventory_tbl` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `inventory_stock` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `inventory_category` varchar(100) NOT NULL,
  `date_restock` date NOT NULL,
  `inventory_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_add_service`
--

CREATE TABLE `new_add_service` (
  `new_service_id` int(11) NOT NULL,
  `new_service_name` varchar(100) NOT NULL,
  `new_service_price` decimal(10,2) NOT NULL,
  `is_archived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_add_service`
--

INSERT INTO `new_add_service` (`new_service_id`, `new_service_name`, `new_service_price`, `is_archived`) VALUES
(1, 'Musical Performance', 2500.00, 0),
(5, 'dummy', 5600.00, 0),
(6, 'Embalming', 12000.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_add_service_tbl`
--

CREATE TABLE `new_add_service_tbl` (
  `new_service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_service_additional_products_tbl`
--

CREATE TABLE `new_service_additional_products_tbl` (
  `New_Service_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `new_service_additional_products_tbl`
--

INSERT INTO `new_service_additional_products_tbl` (`New_Service_ID`, `Product_ID`) VALUES
(1, 1),
(1, 12),
(5, 1),
(6, 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_type` enum('Casket','Urn','Additional Product','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`) VALUES
(1, 'Casket A', 'Casket'),
(2, 'Urn A', 'Urn'),
(3, 'Flower Arrangement', 'Additional Product');

-- --------------------------------------------------------

--
-- Table structure for table `service_additional_products_tbl`
--

CREATE TABLE `service_additional_products_tbl` (
  `Service_ID` int(11) DEFAULT NULL,
  `Product_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_additional_products_tbl`
--

INSERT INTO `service_additional_products_tbl` (`Service_ID`, `Product_ID`) VALUES
(116, 1),
(116, 12),
(117, 1),
(117, 12),
(118, 1),
(118, 12),
(118, 13),
(120, 1),
(120, 11),
(120, 13),
(122, 13),
(123, 1),
(123, 12),
(119, 12),
(119, 13),
(119, 15),
(121, 14);

-- --------------------------------------------------------

--
-- Table structure for table `service_sched_tbl`
--

CREATE TABLE `service_sched_tbl` (
  `sched_id` int(11) NOT NULL,
  `choose_service` varchar(100) NOT NULL,
  `schedule_title` varchar(100) NOT NULL,
  `name_of_customer` varchar(100) NOT NULL,
  `customer_cont_no` decimal(15,0) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `relationship_deceased` varchar(100) NOT NULL,
  `deceased_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_of_death` date DEFAULT NULL,
  `age` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` enum('Scheduled','In Progress','Completed') DEFAULT 'Scheduled',
  `birth_cert_image` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `casket_id` int(11) DEFAULT NULL,
  `urn_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_sched_tbl`
--

INSERT INTO `service_sched_tbl` (`sched_id`, `choose_service`, `schedule_title`, `name_of_customer`, `customer_cont_no`, `customer_address`, `relationship_deceased`, `deceased_name`, `gender`, `date_of_birth`, `date_of_death`, `age`, `start_date`, `end_date`, `location`, `status`, `birth_cert_image`, `created_at`, `casket_id`, `urn_id`) VALUES
(136, '121', 'Funeral Chapel Services for Leonardo Lagunilla', 'Arlene L. Segismundo', 9691632363, 'Abuyog, Sorsogon City', 'Daughter', 'Leonardo Dechavez Lagunilla', 'Male', '1932-04-09', '2023-01-19', 90, '2023-01-20', '2023-01-27', 'house', 'In Progress', '1704630449death-certificate.jpg', '2024-01-07 12:27:29', 31, NULL),
(137, '121', 'Funeral Services for Rommel Gruyon', 'Domingo Gruyon', 9567433471, 'Bacolod, Juban Sorsogon', 'Brother', 'Rommel Gruyon', 'Male', '1967-08-12', '2024-01-07', 56, '2024-01-08', '2024-01-14', 'house', 'Scheduled', '1704633147death-certificate.jpg', '2024-01-07 13:12:27', 30, NULL),
(138, '120', 'Cremation for Donald Gruyon', 'Domingo Gruyon', 9537649750, 'Bacolod, Juban Sorsogon', 'Brother', 'Donald Gruyon', 'Male', '1978-02-23', '2024-01-07', 45, '2024-01-08', '2024-01-15', 'house', 'Scheduled', '1704636631death-certificate.jpg', '2024-01-07 14:10:31', NULL, 24),
(139, '118', 'Mortuary Freezer for Glen Habana', 'Richard Habana', 9567835133, 'Buhatan, Sorsogon City', 'Brother', 'Glen Habana', 'Male', '1988-06-04', '2024-01-07', 35, '2024-01-09', '2024-01-19', 'house', 'Scheduled', '1704645104death-certificate.jpg', '2024-01-07 16:31:44', 27, NULL),
(140, '118', 'Mortuary Freezer for Glen Habana', 'Richard Habana', 9537649750, 'Buhatan, Sorsogon City', 'Brother', 'Glen Habana', 'Male', '1988-07-24', '2024-01-07', 35, '2024-01-09', '2024-01-16', 'house', 'Scheduled', '1704645289death-certificate.jpg', '2024-01-07 16:34:49', 27, NULL),
(141, '120', 'Cremation for Christian Lee', 'Jessica Lee', 9759368753, 'Sorsogon City, Sorsogon', 'Wife', 'Christian Lee', 'Male', '1974-06-18', '2024-01-08', 49, '2024-01-09', '2024-01-15', 'house', 'Scheduled', '1704650897death-certificate.jpg', '2024-01-07 18:08:17', NULL, 25),
(142, '120', 'Cremation for Christian Lee', 'Jessica Lee', 9759368753, 'Sorsogon City, Sorsogon', 'Wife', 'Christian Lee', 'Male', '1974-06-18', '2024-01-08', 49, '2024-01-09', '2024-01-15', 'house', 'Scheduled', '1704650979death-certificate.jpg', '2024-01-07 18:09:40', NULL, 25),
(143, '120', 'Cremation for Christian Lee', 'Jessica Lee', 9759368753, 'Sorsogon City, Sorsogon', 'Wife', 'Christian Lee', 'Male', '1974-06-18', '2024-01-08', 49, '2024-01-09', '2024-01-15', 'house', 'Scheduled', '1704651054death-certificate.jpg', '2024-01-07 18:10:54', NULL, 25),
(144, '120', 'Cremation for Christian Lee', 'Jessica Lee', 9807574352, 'Sorsogon City, Sorsogon', 'Wife', 'Christian Lee', 'Male', '1974-06-18', '2024-01-08', 49, '2024-01-09', '2024-01-15', 'house', 'Scheduled', '1704651234death-certificate.jpg', '2024-01-07 18:13:54', NULL, 25),
(145, '120', 'Cremation for Christian Lee', 'Jessica Lee', 9807574352, 'Sorsogon City, Sorsogon', 'Wife', 'Christian Lee', 'Male', '1974-06-18', '2024-01-08', 49, '2024-01-09', '2024-01-15', 'house', 'Scheduled', '1704651446death-certificate.jpg', '2024-01-07 18:17:26', NULL, 25),
(146, '118', 'Mortuary Freezer for Lilibeth Gonzales', 'Antonio Gonzales', 9691632363, 'Abuyog, Sorsogon City', 'Brother', 'Lilibeth Gonzales', 'Female', '1988-12-13', '2024-01-14', 35, '2024-01-15', '2024-01-22', 'house', 'Scheduled', '1705307933death-certificate.jpg', '2024-01-15 08:38:53', NULL, 23);

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `serv_id` int(11) NOT NULL,
  `serv_name` varchar(100) NOT NULL,
  `serv_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`serv_id`, `serv_name`, `serv_price`) VALUES
(1, 'Cremation', 30000.00),
(2, 'Direct Burial', 20000.00),
(3, 'Funeral Services', 25000.00),
(4, 'Funeral Chapel Services', 12000.00),
(5, 'Mortuary Freezer', 3000.00),
(6, 'Tribute', 9000.00);

-- --------------------------------------------------------

--
-- Table structure for table `start_to_end`
--

CREATE TABLE `start_to_end` (
  `start_to_end_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `selected_service` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `start_to_end`
--

INSERT INTO `start_to_end` (`start_to_end_id`, `customer_name`, `selected_service`, `start_date`, `end_date`) VALUES
(1, 'Jessica Lee', 120, '2024-01-09', '2024-01-15'),
(2, 'Antonio Gonzales', 118, '2024-01-15', '2024-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `urns_tbl`
--

CREATE TABLE `urns_tbl` (
  `urn_id` int(11) NOT NULL,
  `urn_name` text NOT NULL,
  `description` text NOT NULL,
  `urn_price` decimal(10,2) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `is_archived` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `urns_tbl`
--

INSERT INTO `urns_tbl` (`urn_id`, `urn_name`, `description`, `urn_price`, `prod_id`, `is_archived`) VALUES
(23, 'Pink Ribbon Brass', 'Imported Premium Quality Brass Casket Iron', 15900.00, 0, 0),
(24, 'Dignity Brass', 'Imported Premium Quality Brass Casket Iron Dimensions: approx. 10 x 6.4 inches (height x diameter)', 15400.00, 0, 0),
(25, 'Faith Brass', 'Brass Casket Iron Dimensions: approx. 10.75 x 6.7 inches (height x diameter)', 14900.00, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL,
  `cust_name` varchar(100) DEFAULT NULL,
  `cust_cont_no` decimal(15,0) DEFAULT NULL,
  `cust_address` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(11) NOT NULL,
  `is_archived` tinyint(4) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`user_id`, `cust_name`, `cust_cont_no`, `cust_address`, `username`, `email`, `password`, `status`, `is_archived`, `role`) VALUES
(35, 'Jenny Lyn L. Segismundo', 9691632363, 'Abuyog Sorsogon City', 'jennylyn', 'jennxiiiimcmxcix@gmail.com', '123', '1', 0, 'customer'),
(37, NULL, NULL, NULL, 'admin', NULL, '123', '1', 0, 'admin'),
(38, 'Angellica Quinones', 9983752651, 'Gubat, Sorsogon', 'angellica', 'angellicaquinones@gmail.com', '123', '1', 0, 'customer'),
(39, 'Domingo Gruyon', 9567433471, 'Bacolod, Juban Sorsogon', 'domingo', 'domingogruyon@gmail.com', '123', '1', 0, 'customer'),
(40, 'Richard Habana', 9567834523, 'Buhatan, Sorsogon City', 'richard', 'richard_habana@gmail.com', '123', '1', 0, 'customer'),
(41, 'Jessica Lee', 9807574352, 'Sorsogon City, Sorsogon', 'jessica_lee', 'jessica_lee@gmail.com', '123', '1', 0, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_product_tbl`
--
ALTER TABLE `additional_product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casket_tbl`
--
ALTER TABLE `casket_tbl`
  ADD PRIMARY KEY (`casket_id`);

--
-- Indexes for table `casket_urn_tbl`
--
ALTER TABLE `casket_urn_tbl`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `funeral_service_tbl`
--
ALTER TABLE `funeral_service_tbl`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `new_add_service`
--
ALTER TABLE `new_add_service`
  ADD PRIMARY KEY (`new_service_id`);

--
-- Indexes for table `new_add_service_tbl`
--
ALTER TABLE `new_add_service_tbl`
  ADD PRIMARY KEY (`new_service_id`);

--
-- Indexes for table `new_service_additional_products_tbl`
--
ALTER TABLE `new_service_additional_products_tbl`
  ADD KEY `New_Service_ID` (`New_Service_ID`,`Product_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `service_additional_products_tbl`
--
ALTER TABLE `service_additional_products_tbl`
  ADD KEY `Service_ID` (`Service_ID`),
  ADD KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `service_sched_tbl`
--
ALTER TABLE `service_sched_tbl`
  ADD PRIMARY KEY (`sched_id`),
  ADD KEY `service_sched_tbl_ibfk_4` (`casket_id`),
  ADD KEY `service_sched_tbl_ibfk_5` (`urn_id`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `start_to_end`
--
ALTER TABLE `start_to_end`
  ADD PRIMARY KEY (`start_to_end_id`);

--
-- Indexes for table `urns_tbl`
--
ALTER TABLE `urns_tbl`
  ADD PRIMARY KEY (`urn_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_product_tbl`
--
ALTER TABLE `additional_product_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `casket_tbl`
--
ALTER TABLE `casket_tbl`
  MODIFY `casket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `casket_urn_tbl`
--
ALTER TABLE `casket_urn_tbl`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funeral_service_tbl`
--
ALTER TABLE `funeral_service_tbl`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `inventory_tbl`
--
ALTER TABLE `inventory_tbl`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `new_add_service`
--
ALTER TABLE `new_add_service`
  MODIFY `new_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `new_add_service_tbl`
--
ALTER TABLE `new_add_service_tbl`
  MODIFY `new_service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service_sched_tbl`
--
ALTER TABLE `service_sched_tbl`
  MODIFY `sched_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `start_to_end`
--
ALTER TABLE `start_to_end`
  MODIFY `start_to_end_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `urns_tbl`
--
ALTER TABLE `urns_tbl`
  MODIFY `urn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `casket_urn_tbl`
--
ALTER TABLE `casket_urn_tbl`
  ADD CONSTRAINT `casket_urn_tbl_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `casket_tbl` (`casket_id`),
  ADD CONSTRAINT `casket_urn_tbl_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `urns_tbl` (`urn_id`),
  ADD CONSTRAINT `casket_urn_tbl_ibfk_3` FOREIGN KEY (`prod_id`) REFERENCES `additional_product_tbl` (`id`),
  ADD CONSTRAINT `casket_urn_tbl_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `funeral_service_tbl` (`service_id`),
  ADD CONSTRAINT `casket_urn_tbl_ibfk_5` FOREIGN KEY (`service_id`) REFERENCES `new_add_service_tbl` (`new_service_id`);

--
-- Constraints for table `new_service_additional_products_tbl`
--
ALTER TABLE `new_service_additional_products_tbl`
  ADD CONSTRAINT `new_service_additional_products_tbl_ibfk_1` FOREIGN KEY (`New_Service_ID`) REFERENCES `new_add_service` (`new_service_id`),
  ADD CONSTRAINT `new_service_additional_products_tbl_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `additional_product_tbl` (`id`);

--
-- Constraints for table `service_additional_products_tbl`
--
ALTER TABLE `service_additional_products_tbl`
  ADD CONSTRAINT `service_additional_products_tbl_ibfk_1` FOREIGN KEY (`Service_ID`) REFERENCES `funeral_service_tbl` (`service_id`),
  ADD CONSTRAINT `service_additional_products_tbl_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `additional_product_tbl` (`id`);

--
-- Constraints for table `service_sched_tbl`
--
ALTER TABLE `service_sched_tbl`
  ADD CONSTRAINT `service_sched_tbl_ibfk_4` FOREIGN KEY (`casket_id`) REFERENCES `casket_tbl` (`casket_id`),
  ADD CONSTRAINT `service_sched_tbl_ibfk_5` FOREIGN KEY (`urn_id`) REFERENCES `urns_tbl` (`urn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
