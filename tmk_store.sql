-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2023 at 10:11 PM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tmk_estore`
--
CREATE DATABASE IF NOT EXISTS `tmk_estore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tmk_estore`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
-- Table will refer to the type of catergories which the store offers.

CREATE TABLE IF NOT EXISTS `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Produce'),
(2, 'Dairy Product'),
(3, 'Canned Food'),
(4, 'Clothing'),
(5, 'Electronics'),
(6, 'Liqour'),
(7, 'Meat'),
(8, 'Beauty and Personal Care'),
(9, 'Home and Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
-- Table will refer to the users even admin as customer.

CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Address`) VALUES
(1000, 'Thomas', 'Anderson', 'thomas@gmail.com', '6283387', '15th king street'),
(1001, 'Tina', 'Zion', 'tina@gmail.com', '6051234', '10th North Front Street'),
(1002, 'Andrew', 'Castillo', 'andrew@gmail.com', '6283890', '23 Avenue'),
(1003, 'Betty', 'Elijah', 'betty@gmail.com', '6145672', '78 Neal Pen Road'),
(1004, 'Dennis', 'Leiva', 'denniss@gmail.com', '6005050', 'Sandhill'),
(1005, 'Martin', 'Chub', 'martin@gmail.com', '6156789', '01 Faber Roads'),
(1006, 'Nancy', 'Garcia', 'nancy@gmail.com', '6006001', '234 Northern Plaza Ave');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
-- Table will references to the Order, Product and create and Order Item ID.

CREATE TABLE IF NOT EXISTS `orderitems` (
  `OrderItemID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`OrderItemID`),
  KEY `ProductID` (`ProductID`),
  KEY `idx_OrderItems_OrderID` (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`OrderItemID`, `OrderID`, `ProductID`, `Quantity`, `Subtotal`) VALUES
(881, 9000, 508, 3, '119.97'),
(883, 9002, 704, 10, '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `orderpromotions`
-- Table is created and data will enter once the survey is done. The online store will determine to offer a promotion on certain Order made by customer.

CREATE TABLE IF NOT EXISTS `orderpromotions` (
  `OrderPromotionID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PromotionID` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrderPromotionID`),
  KEY `idx_OrderPromotions_OrderID` (`OrderID`),
  KEY `idx_OrderPromotions_PromotionID` (`PromotionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
-- Table will refer to orders made by the customer. 
-- Table will reference to User and Shipping Adress table.

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `ShippingAddressID` int(11) DEFAULT NULL,
  `DiscountCode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`OrderID`),
  KEY `ShippingAddressID` (`ShippingAddressID`),
  KEY `idx_Orders_UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `OrderDate`, `TotalAmount`, `ShippingAddressID`, `DiscountCode`) VALUES
(9000, 2001, '2023-10-31', '119.97', 1001001, 'dsw'),
(9001, 2001, '2023-11-08', '75.00', 1001001, ''),
(9002, 2006, '2023-11-14', '200.00', 1001006, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
-- Table will store the form of payment and determine the status of each order made. 

CREATE TABLE IF NOT EXISTS `payments` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL,
  `Status` varchar(20) DEFAULT 'Pending',
  PRIMARY KEY (`PaymentID`),
  KEY `OrderID` (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `OrderID`, `PaymentDate`, `Amount`, `PaymentMethod`, `Status`) VALUES
(123, 9000, '2023-11-02', '119.97', 'Cash', 'Pending'),
(1234, 9002, '2023-11-14', '200.00', 'Credit Card', 'Paid');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

-- --------------------------------------------------------

--
-- Table structure for table `products`
-- Table will store and display all the products the online store is offering.
-- Table sort them by an ID which is determine by its connection to the catergory table.

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Description` text,
  `Price` decimal(10,2) DEFAULT NULL,
  `StockQuantity` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `idx_Products_CategoryID` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Description`, `Price`, `StockQuantity`, `CategoryID`) VALUES
(500, 'Apples', '2 for $.50', '1.50', 10, 1),
(502, 'Tablet', NULL, '225.00', 16, 5),
(504, 'Flavored Milk', NULL, '1.95', 7, 2),
(506, 'Hollister Shirt', NULL, '25.50', 100, 4),
(508, 'Vodka', NULL, '39.99', 19, 6),
(600, 'Pork Chops', NULL, '15.00', 20, 7),
(602, 'Peach Canned', NULL, '1.75', 90, 3),
(604, 'Cushions', NULL, '50.99', 16, 9),
(606, 'Lipsticks', NULL, '2.50', 45, 8),
(608, 'Belizean Rum', NULL, '29.99', 30, 6),
(700, 'Banana ', 'six banana for $1', '1.00', 200, 1),
(702, 'Jeans', NULL, '15.00', 80, 4),
(704, 'Pineapple Juice canned', 'flavored juice with alacohol', '20.00', 109, 6),
(705, 'Pineapple Juice canned', 'flavored juice with alacoh', '20.00', 109, 3);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `PromotionID` int(11) NOT NULL,
  `PromotionCode` varchar(20) DEFAULT NULL,
  `Description` text,
  `DiscountPercentage` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`PromotionID`),
  UNIQUE KEY `PromotionCode` (`PromotionCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddresses`
-- Table will store and display the shipping information for each user to the online store.

CREATE TABLE IF NOT EXISTS `shippingaddresses` (
  `ShippingAddressID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `ZipCode` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ShippingAddressID`),
  KEY `idx_ShippingAddresses_UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingaddresses`
--

INSERT INTO `shippingaddresses` (`ShippingAddressID`, `UserID`, `Address`, `City`, `District`, `ZipCode`) VALUES
(1001001, 2001, '15th king street', 'Belize City', 'Belize', '+210'),
(1001002, 2002, '10th North Front Street', 'Belmopan', 'Cayo', '+211'),
(1001003, 2003, '23 Avenue', 'Punta Gorda', 'Toledo', '+212'),
(1001004, 2004, '78 Neal Pen Road', 'Belize City', 'Belize', '+210'),
(1001005, 2005, 'Sandhill', NULL, 'Orange Walk', '+214'),
(1001006, 2006, '01 Faber Roads', NULL, 'Corozal', '+215');

-- --------------------------------------------------------

--
-- Table structure for table `users`
-- Table refers to the registering Customer from the Customer table to an username and password
-- Table will store all information entered.

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(255) DEFAULT NULL,
  `IsAdmin` tinyint(1) DEFAULT '0',
  `TwoFactorSecretKey` varchar(255) DEFAULT NULL,
  `IsTwoFactorEnabled` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `CustomerID` (`CustomerID`),
  UNIQUE KEY `Username` (`Username`),
  FULLTEXT KEY `TwoFactorSecretKey` (`TwoFactorSecretKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `CustomerID`, `Username`, `PasswordHash`, `IsAdmin`, `TwoFactorSecretKey`, `IsTwoFactorEnabled`) VALUES
(2001, 1000, 'TAnderson', 'TestRun1', 1, 'AB1', 1),
(2002, 1001, 'TZion', 'tinazin1', 0, 'CD2', 1),
(2003, 1002, 'ACastillo', 'Acas123', 0, 'EF3', 0),
(2004, 1003, 'BElijah', 'BElij1234', 0, 'GH4', 1),
(2005, 1004, 'DLeiva', 'DLev234', 0, 'IJ5', 1),
(2006, 1005, 'MChub', 'Mchub1212', 1, 'KL6', 1),
(2007, 1006, 'NGarcia', 'NGar1231', 0, 'LM7', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `orderpromotions`
--
ALTER TABLE `orderpromotions`
  ADD CONSTRAINT `orderpromotions_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `orderpromotions_ibfk_2` FOREIGN KEY (`PromotionID`) REFERENCES `promotions` (`PromotionID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`ShippingAddressID`) REFERENCES `shippingaddresses` (`ShippingAddressID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);

--
-- Constraints for table `shippingaddresses`
--
ALTER TABLE `shippingaddresses`
  ADD CONSTRAINT `shippingaddresses_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
