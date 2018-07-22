-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 08:40 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `adminId` int(11) NOT NULL,
  `adminUsername` varchar(50) NOT NULL,
  `adminPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`adminId`, `adminUsername`, `adminPassword`) VALUES
(2, 'admin1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `adminmanageclient`
--

CREATE TABLE `adminmanageclient` (
  `clientId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `companyEmail` varchar(100) NOT NULL,
  `companyContact` varchar(25) NOT NULL,
  `companyUsername` varchar(100) NOT NULL,
  `companyPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminmanageclient`
--

INSERT INTO `adminmanageclient` (`clientId`, `adminId`, `companyName`, `companyEmail`, `companyContact`, `companyUsername`, `companyPassword`) VALUES
(2, 2, 'Chanel Cosmetic', 'chanel12@gmail.com', '0125896547', 'chanel123', '123456'),
(4, 2, 'Sunshine Company', 'sunshine1547@gmail.com', '044412569', 'sunshine123', 'sunshine123456'),
(5, 2, 'INTI College', 'inti@gmail.com', '0145566238', 'intipenang123', '123789'),
(6, 2, 'Google Inc', 'google@gmail.com', '0147788569', 'google123', 'google123'),
(8, 2, 'HTC Company', 'htc@gmail.com', '0215588997', 'htc123', '123456'),
(16, 2, 'William Company', 'williaminc@gmail.com', '0215588997', 'william123', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `clientaddquatation`
--

CREATE TABLE `clientaddquatation` (
  `quatationViewId` int(50) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `quatationAddressLine` varchar(100) NOT NULL,
  `quatationCity` varchar(100) NOT NULL,
  `quatationPostal` varchar(10) NOT NULL,
  `quatationState` varchar(100) NOT NULL,
  `quatationCountry` varchar(100) NOT NULL,
  `quatationCustomerName` int(11) NOT NULL,
  `clientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientcustomer`
--

CREATE TABLE `clientcustomer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerContact` varchar(20) NOT NULL,
  `customerAddressLine` varchar(100) NOT NULL,
  `customerCity` varchar(50) NOT NULL,
  `customerPostal` varchar(20) NOT NULL,
  `customerState` varchar(50) NOT NULL,
  `customerCountry` varchar(50) NOT NULL,
  `clientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientcustomer`
--

INSERT INTO `clientcustomer` (`customerId`, `customerName`, `customerEmail`, `customerContact`, `customerAddressLine`, `customerCity`, `customerPostal`, `customerState`, `customerCountry`, `clientId`) VALUES
(1, 'Joachim Chin Yong Siang', 'joachimchin1148@gmail.com', '0126658974', '112 Lorong Dana, 1/2 Taman Dana', 'Balik Pulau', '11412', 'Pulau Pinang', 'Malaysia', 2),
(2, 'Manami Yamada', 'manami@gmail.com', '0554789652', '123 Hokaido 1/2 Garden Hokaido', 'Hokaido', '23566', 'Hiroshima', 'Japan', 2),
(3, 'Koo Lee Chun', 'leechun@hotmail.com', '116652347', '123 Lorong Ria 1/6 Taman Ria', 'Bayan Baru', '11411', 'Kedah', 'Malaysia', 2),
(4, 'Sam Smith', 'shinhay@gmail.com', '116652347', '123 Lorong Ria 1/6 Taman Ria', 'Bayan Baru', '11411', 'Kedah', 'Malaysia', 4),
(5, 'Chuks Agu', 'chuks12@gmail.com', '0129856474', '241 Garden Bay 31 Flower Garden', 'Coventry', '15248', 'London', 'United Kingdom', 4),
(6, 'Erika Ling', 'erika11@hotmail.com', '0128954752', '123 Lorong Ria 1/6 Taman Ria', 'Bayan Baru', '11411', 'Kedah', 'Malaysia', 4),
(7, 'Lim Kai Ling', 'ling23@gmail.com', '0125589654', '123 Lorong Hi 1/2 Taman Hi', 'Sungai Petani', '08000', 'Kedah', 'Malaysia', 5),
(8, 'Khong Jun Yih', 'khong21@gmail.com', '0129863541', '245 Taman Kai 1/5 Taman Kai', 'Kulim', '09000', 'Kedah', 'Malaysia', 5),
(10, 'Chern Huey Rong', 'chern11@hotmail.com', '0128895774', '45 Loring Hana, 2/8 Taman Sana', 'Pulau Pinang', '15224', 'Pulau Pinang', 'Malaysia', 16),
(11, 'Koo Lee Chun', 'leechun@hotmail.com', '116652347', '123 Lorong Ria 1/6 Taman Ria', 'Bayan Baru', '11411', 'Kedah', 'Malaysia', 4);

-- --------------------------------------------------------

--
-- Table structure for table `clientinvoice`
--

CREATE TABLE `clientinvoice` (
  `invoiceID` bigint(20) NOT NULL,
  `invoiceDate` date NOT NULL,
  `invoiceNo` int(11) NOT NULL,
  `quatationID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `clientId` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientproduct`
--

CREATE TABLE `clientproduct` (
  `productId` int(10) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productQuantity` int(255) NOT NULL,
  `productPrice` int(10) NOT NULL,
  `productDescription` varchar(200) NOT NULL,
  `clientId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientproduct`
--

INSERT INTO `clientproduct` (`productId`, `productName`, `productQuantity`, `productPrice`, `productDescription`, `clientId`) VALUES
(1, 'Alienware', 10, 6000, 'Intel i9 Processor', 2),
(2, 'Acer 24 Monitor', 10, 2000, 'good!!', 4),
(3, 'C++ Programming Book', 10, 120, 'By John Priece', 5),
(4, 'Dell Model 5', 10, 6000, 'Great Computer', 16),
(5, 'Alienware', 20, 2000, '123456', 4),
(6, 'Acer 24 Monitor', 10, 6000, '47895', 4);

-- --------------------------------------------------------

--
-- Table structure for table `clientquatation`
--

CREATE TABLE `clientquatation` (
  `quatationId` bigint(20) NOT NULL,
  `quatationNo` int(11) NOT NULL,
  `quatationDate` date NOT NULL,
  `customerId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `quatationAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `uploadStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageId`, `clientId`, `uploadStatus`) VALUES
(5, 4, 1),
(6, 8, 0),
(10, 16, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `adminmanageclient`
--
ALTER TABLE `adminmanageclient`
  ADD PRIMARY KEY (`clientId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `clientaddquatation`
--
ALTER TABLE `clientaddquatation`
  ADD PRIMARY KEY (`quatationViewId`),
  ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `clientcustomer`
--
ALTER TABLE `clientcustomer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `clientinvoice`
--
ALTER TABLE `clientinvoice`
  ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `clientproduct`
--
ALTER TABLE `clientproduct`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `clientquatation`
--
ALTER TABLE `clientquatation`
  ADD PRIMARY KEY (`quatationId`),
  ADD KEY `clientId` (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `clientId` (`clientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminaccount`
--
ALTER TABLE `adminaccount`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminmanageclient`
--
ALTER TABLE `adminmanageclient`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clientcustomer`
--
ALTER TABLE `clientcustomer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `clientproduct`
--
ALTER TABLE `clientproduct`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clientquatation`
--
ALTER TABLE `clientquatation`
  MODIFY `quatationId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminmanageclient`
--
ALTER TABLE `adminmanageclient`
  ADD CONSTRAINT `adminmanageclient_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `adminaccount` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientaddquatation`
--
ALTER TABLE `clientaddquatation`
  ADD CONSTRAINT `clientaddquatation_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `adminmanageclient` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientcustomer`
--
ALTER TABLE `clientcustomer`
  ADD CONSTRAINT `clientcustomer_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `adminmanageclient` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientinvoice`
--
ALTER TABLE `clientinvoice`
  ADD CONSTRAINT `clientinvoice_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `adminmanageclient` (`clientId`);

--
-- Constraints for table `clientproduct`
--
ALTER TABLE `clientproduct`
  ADD CONSTRAINT `clientproduct_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `adminmanageclient` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clientquatation`
--
ALTER TABLE `clientquatation`
  ADD CONSTRAINT `clientquatation_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `adminmanageclient` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`clientId`) REFERENCES `adminmanageclient` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
