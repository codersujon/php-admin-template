-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2022 at 02:39 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos_template`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `bName` varchar(30) NOT NULL,
  `mName` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `bName`, `mName`, `phone`, `email`, `password`, `status`) VALUES
(32, 'admin', 'admin', '01680366446', 'csesujon155@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(33, 'Kawran Bazar', 'Md. Majidul Islam', '01670366446', 'majid@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(34, 'Jatrabari', 'Azizur Rahman Mostakim', '01616765864', 'mostakim423@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(35, 'Soni Akhra', 'Israt Jahan Muskan', '01580366446', 'muskan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(36, 'Demra', 'Samanta Islam Nafia', '01880366446', 'nafia@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `psize` varchar(10) NOT NULL,
  `pdes` text NOT NULL,
  `pcolor` varchar(20) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `costprice` float NOT NULL,
  `saleprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pname`, `psize`, `pdes`, `pcolor`, `barcode`, `costprice`, `saleprice`) VALUES
(1, 'VISION Electric Kettle', '1.8L', 'VISION Electric Kettle 1.8L VIS-EK-005', '#ededed', '001', 600, 835),
(2, 'Fleece Wool Liner ', '1', 'Fleece Wool Liner Thick Hat Scarf Set', '#121212', '002', 100, 152),
(3, 'Bamboo Fiber Socks', '10Pairs', 'Bamboo Fiber Socks Men Casual Business Anti-Bacterial ', '#7d7373', '003', 150, 250);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `id` int(11) NOT NULL,
  `pdate` varchar(50) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `br_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `price` float NOT NULL,
  `qnt` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_details`
--

INSERT INTO `tbl_purchase_details` (`id`, `pdate`, `cname`, `invoice`, `br_id`, `product_id`, `barcode`, `price`, `qnt`, `total`) VALUES
(15, '2022-11-16', 'Daraz', '45685', 32, 1, 1, 600, 65, 39000),
(16, '2022-11-18', 'DogoDg', '48595', 32, 2, 2, 100, 60, 6000),
(17, '2022-11-18', 'DogoDg', '48595', 32, 3, 3, 150, 20, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_summery`
--

CREATE TABLE `tbl_purchase_summery` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
  `company` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `dis` float NOT NULL,
  `dis_amount` float NOT NULL,
  `grand_total` float NOT NULL,
  `payment` float NOT NULL,
  `duePayment` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_summery`
--

INSERT INTO `tbl_purchase_summery` (`id`, `pdate`, `company`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `payment`, `duePayment`, `br_id`) VALUES
(9, '2022-11-16', 'Daraz', 45685, 65, 39000, 5, 1950, 37050, 35000, 2050, 32),
(10, '2022-11-18', 'DogoDg', 48595, 80, 9000, 10, 900, 8100, 8100, 0, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `id` int(11) NOT NULL,
  `sdate` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `saleprice` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales_details`
--

INSERT INTO `tbl_sales_details` (`id`, `sdate`, `invoice`, `product_id`, `saleprice`, `quantity`, `total_amount`, `br_id`) VALUES
(33, '19-11-2022', 2022001, 2, 152, 2, 304, 32),
(34, '19-11-2022', 2022002, 2, 152, 3, 456, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_summery`
--

CREATE TABLE `tbl_sales_summery` (
  `id` int(11) NOT NULL,
  `sdate` varchar(50) NOT NULL,
  `invoice` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `dis` float NOT NULL,
  `dis_amount` float NOT NULL,
  `grand_total` float NOT NULL,
  `payment` float NOT NULL,
  `duePayment` float NOT NULL,
  `br_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sales_summery`
--

INSERT INTO `tbl_sales_summery` (`id`, `sdate`, `invoice`, `total_quantity`, `total_price`, `dis`, `dis_amount`, `grand_total`, `payment`, `duePayment`, `br_id`) VALUES
(2, '19-11-2022', 2022002, 3, 456, 5, 22.8, 433.2, 433.2, 0, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `qnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `product_id`, `br_id`, `qnt`) VALUES
(12, 1, 32, 65),
(13, 2, 32, 55),
(14, 3, 32, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales_summery`
--
ALTER TABLE `tbl_sales_summery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_sales_summery`
--
ALTER TABLE `tbl_sales_summery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
