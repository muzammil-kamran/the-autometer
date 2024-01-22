-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 01:03 AM
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
-- Database: `the autometer`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DepartmentsID` int(11) NOT NULL,
  `DepartmentsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`DepartmentsID`, `DepartmentsName`) VALUES
(1, 'admin'),
(3, 'Hardware'),
(10, 'Software');

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `MarketsID` int(11) NOT NULL,
  `MarketsName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`MarketsID`, `MarketsName`) VALUES
(2, 'hyderi');

-- --------------------------------------------------------

--
-- Table structure for table `productdepartments`
--

CREATE TABLE `productdepartments` (
  `ProductID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdepartments`
--

INSERT INTO `productdepartments` (`ProductID`, `DepartmentID`) VALUES
(4, 3),
(5, 10),
(6, 3),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductCode` int(11) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `ProductDiscription` varchar(255) NOT NULL,
  `statusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductCode`, `ProductName`, `ProductImage`, `ProductDiscription`, `statusID`) VALUES
(1, 0, 'wire', 'images/WhatsApp Image 2023-12-15 at 5.04.18 PM.jpeg', 'the copper wire that is use for connecting electrical applaince', 0),
(2, 0, 'wire', 'images/WhatsApp Image 2023-12-15 at 5.04.18 PM.jpeg', 'the copper wire that is use for connecting electrical applaince', 0),
(3, 2147483647, 'fan', 'images/OIP.jfif', 'air colling mashine', 0),
(4, 0, 'AC', 'images/', 'wfdsa', 0),
(5, 0, 'Coooler', 'images/', 'cooling the home', 0),
(6, 0, 'PC', 'images/', 'persol computer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `producttesting`
--

CREATE TABLE `producttesting` (
  `ProductTestID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TestID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RemarksID` int(11) NOT NULL,
  `Remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttesting`
--

INSERT INTO `producttesting` (`ProductTestID`, `ProductID`, `TestID`, `UserID`, `RemarksID`, `Remarks`) VALUES
(3, 5, 1, 4, 1, 'the product wires are perfect '),
(4, 5, 7, 4, 1, 'the product programs are running ');

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE `product_status` (
  `statusID` int(12) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`statusID`, `Status`) VALUES
(0, 'In Progress'),
(1, 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `RemarksID` int(11) NOT NULL,
  `RemarksName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remarks`
--

INSERT INTO `remarks` (`RemarksID`, `RemarksName`) VALUES
(1, 'Good\r\n'),
(2, 'Bad');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `ResultID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RolesID` int(11) NOT NULL,
  `RolesNmae` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RolesID`, `RolesNmae`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'hardware inspector');

-- --------------------------------------------------------

--
-- Table structure for table `shipment`
--

CREATE TABLE `shipment` (
  `ShipmentID` int(11) NOT NULL,
  `MarketID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `TestID` int(11) NOT NULL,
  `TestName` varchar(50) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`TestID`, `TestName`, `DepartmentID`) VALUES
(1, 'wire 101', 3),
(7, 'code checking ', 10),
(8, 'thermal check', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `UserContact` varchar(50) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPassword` varchar(50) NOT NULL,
  `UserImage` varchar(50) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `DepartmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `UserContact`, `UserEmail`, `UserPassword`, `UserImage`, `RoleID`, `DepartmentID`) VALUES
(3, 'muzammil', '123456', 'muz@gmail.com', '123', '123', 3, 3),
(4, 'muz', '1235446', 'muza@gmail.com', '123', '', 1, 10),
(5, 'saad', '123465489', 'sad@gmain.com', '123', '', 2, 10),
(6, 'as', '+4456465', '', '123', '', 3, 3),
(7, 'admion', '32167464', 'admin@gmail.com', '123', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DepartmentsID`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`MarketsID`);

--
-- Indexes for table `productdepartments`
--
ALTER TABLE `productdepartments`
  ADD PRIMARY KEY (`ProductID`,`DepartmentID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `fk_products_status` (`statusID`);

--
-- Indexes for table `producttesting`
--
ALTER TABLE `producttesting`
  ADD PRIMARY KEY (`ProductTestID`),
  ADD KEY `ProductCode` (`ProductID`),
  ADD KEY `TestID` (`TestID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `RemarksID` (`RemarksID`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`RemarksID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`ResultID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RolesID`);

--
-- Indexes for table `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`ShipmentID`),
  ADD KEY `shipment_ibfk_1` (`ProductID`),
  ADD KEY `MarketID` (`MarketID`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`TestID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `DepartmentsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `MarketsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `producttesting`
--
ALTER TABLE `producttesting`
  MODIFY `ProductTestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `RemarksID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `ResultID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RolesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipment`
--
ALTER TABLE `shipment`
  MODIFY `ShipmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `TestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productdepartments`
--
ALTER TABLE `productdepartments`
  ADD CONSTRAINT `productdepartments_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `productdepartments_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `departments` (`DepartmentsID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_status` FOREIGN KEY (`statusID`) REFERENCES `product_status` (`statusID`);

--
-- Constraints for table `producttesting`
--
ALTER TABLE `producttesting`
  ADD CONSTRAINT `producttesting_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttesting_ibfk_2` FOREIGN KEY (`TestID`) REFERENCES `testing` (`TestID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttesting_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producttesting_ibfk_4` FOREIGN KEY (`RemarksID`) REFERENCES `remarks` (`RemarksID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `shipment`
--
ALTER TABLE `shipment`
  ADD CONSTRAINT `shipment_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipment_ibfk_2` FOREIGN KEY (`MarketID`) REFERENCES `markets` (`MarketsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testing`
--
ALTER TABLE `testing`
  ADD CONSTRAINT `testing_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `departments` (`DepartmentsID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RolesID`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`DepartmentID`) REFERENCES `departments` (`DepartmentsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
