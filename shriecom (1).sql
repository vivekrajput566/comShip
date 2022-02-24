-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 02:01 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shriecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecom_customer_delivery_details`
--

CREATE TABLE `ecom_customer_delivery_details` (
  `id` bigint(20) NOT NULL,
  `username` longtext NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `address` longtext NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `customerid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_customer_delivery_details`
--

INSERT INTO `ecom_customer_delivery_details` (`id`, `username`, `phonenumber`, `address`, `pincode`, `customerid`) VALUES
(1, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(2, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(3, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(4, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(5, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(6, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(7, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(8, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(9, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(10, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(11, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(12, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(13, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(14, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(15, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(16, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(17, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(18, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(19, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924),
(20, 'vivek rajput', 7845453456, 'guru nanak dev institute of technology', 110088, 7840034924);

-- --------------------------------------------------------

--
-- Table structure for table `itemorder`
--

CREATE TABLE `itemorder` (
  `id` int(100) NOT NULL,
  `phonenumber` bigint(11) NOT NULL,
  `shopid` int(100) NOT NULL,
  `itemuniqueid` longtext NOT NULL,
  `itemquantity` int(100) NOT NULL,
  `status` int(100) NOT NULL,
  `orderid` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemorder`
--

INSERT INTO `itemorder` (`id`, `phonenumber`, `shopid`, `itemuniqueid`, `itemquantity`, `status`, `orderid`) VALUES
(24, 7840034924, 346, 'ilumpbp620418fc818f39.57633856', 1, 1, 34734776474);

-- --------------------------------------------------------

--
-- Table structure for table `itemselect`
--

CREATE TABLE `itemselect` (
  `id` int(100) NOT NULL,
  `itemname` text NOT NULL,
  `itemdescription` longtext NOT NULL,
  `itemimg` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemselect`
--

INSERT INTO `itemselect` (`id`, `itemname`, `itemdescription`, `itemimg`) VALUES
(1, 'plug', '3 pin plug', 'socket2.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `shopinfo`
--

CREATE TABLE `shopinfo` (
  `id` int(100) NOT NULL,
  `shopname` longtext NOT NULL,
  `shopownername` text NOT NULL,
  `shopaddress` longtext NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `shopimg` longtext NOT NULL,
  `shopcategory` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopinfo`
--

INSERT INTO `shopinfo` (`id`, `shopname`, `shopownername`, `shopaddress`, `phonenumber`, `shopimg`, `shopcategory`) VALUES
(346, 'moz key', 'vivek rajput', 'rz a-6 jai vihar najafgarh new delhi', 7840034924, 'electric shop.jpg', 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `shopitem`
--

CREATE TABLE `shopitem` (
  `id` int(100) NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `shopid` int(100) NOT NULL,
  `itemname` longtext NOT NULL,
  `itemdescription` longtext NOT NULL,
  `itemcode` int(100) NOT NULL,
  `potstatus` int(100) NOT NULL,
  `amazonprice` int(100) NOT NULL,
  `flipkartprice` int(100) NOT NULL,
  `otherwebsiteprice` int(100) NOT NULL,
  `itemprice` int(100) NOT NULL,
  `itemimg` longtext NOT NULL,
  `itemsideimg` longtext NOT NULL,
  `itemurl` longtext NOT NULL,
  `uniqueid` longtext NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopitem`
--

INSERT INTO `shopitem` (`id`, `phonenumber`, `shopid`, `itemname`, `itemdescription`, `itemcode`, `potstatus`, `amazonprice`, `flipkartprice`, `otherwebsiteprice`, `itemprice`, `itemimg`, `itemsideimg`, `itemurl`, `uniqueid`, `status`) VALUES
(446, 7840034924, 346, 'animal planterss', 'resin animal planter', 101, 0, 0, 0, 0, 250, '10583860498WhatsApp Image 2022-02-04 at 10.43.43 AM (2).jpeg', '72670878646WhatsApp Image 2022-02-04 at 10.43.43 AM (2).jpeg', '94083775796animal-planterss.php', 'ilumpbp620418fc818f39.57633856', 0),
(447, 7840034924, 346, 'girls planter', 'resin planter', 0, 0, 0, 0, 0, 1200, '94360456488WhatsApp Image 2022-02-04 at 10.43.43 AM (3).jpeg', '43827124983WhatsApp Image 2022-02-04 at 10.43.43 AM (3).jpeg', '58208625237girls-planter.php', 'ilumpbp62041b246cd177.40967184', 0),
(448, 7840034924, 346, 'ganesh jii', 'resin ganesh', 0, 0, 0, 0, 0, 450, '16697227454WhatsApp Image 2022-02-04 at 10.43.43 AM (1).jpeg', '17321020759WhatsApp Image 2022-02-04 at 10.43.43 AM (1).jpeg', '41440582439ganesh-jii.php', 'ilumpbp62041b3e21bad8.19346560', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` bigint(100) NOT NULL,
  `phonenumber` bigint(20) NOT NULL,
  `uniqueid` longtext NOT NULL,
  `quantity` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`id`, `phonenumber`, `uniqueid`, `quantity`) VALUES
(48, 7840034924, 'ilumpbp620418fc818f39.57633856', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(100) NOT NULL,
  `username` text NOT NULL,
  `phonenumber` bigint(100) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `phonenumber`, `password`) VALUES
(11, 'vivek', 7840034924, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecom_customer_delivery_details`
--
ALTER TABLE `ecom_customer_delivery_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemorder`
--
ALTER TABLE `itemorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemselect`
--
ALTER TABLE `itemselect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopinfo`
--
ALTER TABLE `shopinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopitem`
--
ALTER TABLE `shopitem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecom_customer_delivery_details`
--
ALTER TABLE `ecom_customer_delivery_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `itemorder`
--
ALTER TABLE `itemorder`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `itemselect`
--
ALTER TABLE `itemselect`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopinfo`
--
ALTER TABLE `shopinfo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `shopitem`
--
ALTER TABLE `shopitem`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
