-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2022 at 11:51 PM
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
(4, 'admin', 'admin', '01680366446', 'codersujon@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, 'Demra', 'Samanta Islam Nafia', '01880366446', 'nafia@gmail.com', '863d49dc9c2cc6d2c8582d307ede6dec', 0),
(6, 'Jatrabari ', 'Azizur Rahman Mostakim', '01616765864', 'mostakim423@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 0),
(8, 'Soni Akhra', 'Israt Jahan Muskan', '01970366446', 'muskan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1);

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
(15, 'Meril Petroleum Jelly', '30ml', 'Meril Petroleum Jelly', '#ededed', '001', 54, 105),
(16, 'Protector Ginger shampoo Flower Brand', '100', 'Protector Ginger', '#e0e0e0', '002', 100, 300),
(17, 'Saffola Active Oil ', ' 5 Litre', 'Blended Edible Vegetable Oil ', '#df0707', '003', 1020, 1299),
(18, 'Alkushi Powder ', '200gm', 'Alkushi Powder (Purified with milk)  ', '#a4a2a2', '004', 80, 153),
(19, 'Ashwagandha Powder  ', '200gm', 'Ashwagandha Powder  (Indian and natural)', '#b3adad', '005', 180, 294);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `id` int(11) NOT NULL,
  `pdate` date NOT NULL,
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
(69, '2022-11-23', 'Daraz 11.11', '2202', 4, 16, 2, 100, 20, 2000),
(70, '2022-11-23', 'Daraz ', '2202', 4, 18, 4, 80, 5, 400),
(73, '2022-11-16', 'Daraz 11', '66', 4, 16, 2, 100, 3, 300),
(75, '2022-11-16', 'Daraz 11', '66', 4, 15, 1, 54, 2, 108),
(77, '2022-11-16', 'Dara 5.1', '55', 4, 16, 2, 100, 3, 300),
(78, '2022-11-16', 'Dara 5.2', '56', 4, 15, 1, 54, 50, 2700),
(83, '2022-11-15', 'Daraz', '65', 4, 16, 2, 100, 2, 200),
(84, '2022-11-16', 'daraz', '41541', 4, 15, 1, 54, 2, 108),
(85, '2022-11-16', '', '', 4, 15, 1, 54, 2, 108),
(86, '2022-11-16', '', '', 4, 15, 1, 54, 2, 108);

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
(3, '2022-11-15', 'ABM', 2201, 10, 10200, 5, 510, 9690, 9690, 0, 4),
(4, '2022-11-23', 'Daraz ', 2202, 25, 2400, 5, 120, 2280, 2000, -280, 4);

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
(11, 17, 4, 142),
(12, 16, 4, 142),
(13, 18, 4, 142),
(14, 19, 4, 142),
(15, 15, 4, 142);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_purchase_summery`
--
ALTER TABLE `tbl_purchase_summery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
