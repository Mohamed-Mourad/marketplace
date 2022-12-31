-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2022 at 05:00 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BrandName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BrandName`) VALUES
('AOC'),
('Darkecho'),
('I-Rocks'),
('Logitech'),
('MageGee'),
('TitledNation');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `passw` text NOT NULL,
  `fullname` text NOT NULL,
  `addr` longtext NOT NULL,
  `locat` longtext,
  `phone_number` text NOT NULL,
  `profile_picture` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `user_name`, `passw`, `fullname`, `addr`, `locat`, `phone_number`, `profile_picture`) VALUES
(1, 'Mohamed_Mourad', 'odasnc,mbqiwfu;sabcj', 'Mohamed Mourad', '17 walaa street, behind Sayed Darwish Hall - Khatem Al Morsalin - Haram', 'gowa bo7eret el dood el laziz', '01157766474', '(2952).JPG'),
(3, 'hakona', 'sdqwdqds', 'qdqasdq', 'qsdaqsa', 'sqadq', 'sadqsda', '(3898).jpg'),
(4, 'test20121217am', 'test', 'test', 'test', 'test', 'test', '(3898).jpg'),
(5, 'moMourad', 'moMourad', 'moMourad', 'Continental Residence compound, Sheikh Zayed', 'Cairo, Egypt', '01156308405', 'IMG-20220211-WA0009.jpg'),
(6, 'rawanalshamii', '1', 'rawan amr', 'Continental Residence compound, Sheikh Zayed', 'Cairo, Egypt', '01156308405', 'IMG-20220211-WA0009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `likedbrands`
--

CREATE TABLE `likedbrands` (
  `UserID` int(11) NOT NULL,
  `BrandName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likedbrands`
--

INSERT INTO `likedbrands` (`UserID`, `BrandName`) VALUES
(5, 'I-Rocks'),
(5, 'Logitech'),
(5, 'TitledNation'),
(6, 'TitledNation');

-- --------------------------------------------------------

--
-- Table structure for table `likedproducts`
--

CREATE TABLE `likedproducts` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `likedproducts`
--

INSERT INTO `likedproducts` (`UserID`, `ProductID`) VALUES
(5, 41172),
(5, 21149),
(6, 11802),
(6, 81638);

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `user_id` int(11) NOT NULL,
  `market_name` text NOT NULL,
  `passw` text NOT NULL,
  `balance` float NOT NULL,
  `balance_number` text NOT NULL,
  `paypal` varchar(32) NOT NULL,
  `phone_number` text NOT NULL,
  `market_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`user_id`, `market_name`, `passw`, `balance`, `balance_number`, `paypal`, `phone_number`, `market_logo`) VALUES
(1, '0', '0', 0, '0', '0', '0', '4'),
(4, 'test20121217amMARKET', 'test', 3232, '0', '232332', '01157766474', '(2952).JPG'),
(5, 'Lilos', 'Lilos', 12000, '12345678', 'Lilos@gmail.com', '01123342744', 'screencapture-eservices-eehc-gov-eg-services-CODEMETER-entries-589619-2022-12-22-20_11_50.png'),
(6, 'Nike', 'Nike', 12000, '12345678', 'Nike@gmail.com', '01123342744', 'NIKE.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Image` text NOT NULL,
  `Brand` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MarketID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Brief` text NOT NULL,
  `InStock` int(11) NOT NULL,
  `BestSeller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Image`, `Brand`, `MarketID`, `Price`, `Brief`, `InStock`, `BestSeller`) VALUES
(10051, 'Tilted Nation RGB Headset Stand', 'Tilted Nation RGB Headset Stand.jpg', 'TiltedNation', 74256, 59.99, 'Gaming Headphone Stand for Desk Display with Mouse Bungee Cord Holder - Gaming Headset Holder with USB 3.0 Hub for Xbox, PS4, PC ', 12, 1),
(11802, 'I-Rocks IRC41 Memory Foam Wrist Pad', 'I-rocks.jpg', 'I-Rocks', 19104, 24.95, 'Anti-Slip Base; Provides Cushioned Support and Pain Relief for Office, Gaming, Computers and Laptops', 4, 1),
(21149, 'Tilted Nation RGB Headset Stand', 'Tilted Nation RGB Headset Stand2.jpg', 'TiltedNation', 19194, 49.99, 'USB RGB Headphone Stand with 3 USB 3.0 Ports RGB Lights Trusyo Audio The Portal Ultimate Gaming Accessories (White)', 4, 0),
(41172, 'Darkecho Gaming and Office Chair', 'Darkecho.jpg', 'Darkecho', 6255, 209.99, 'Footrest Massage Vintage Leather Ergonomic Chair Reclining Adjustable High Back Gamer Chair with Headrest and Lumbar Support Ivory', 3, 1),
(61249, 'MX MASTER 3S', 'LogiTech Mouse.png', 'Logitech', 33732, 99.99, 'Darkfield high precision performance Wireless Mouse with Bluetooth Low Energy Technology', 9, 1),
(61920, 'AOC 4K UHD Monitor', 'AOC Monitor.jpg', 'AOC', 19227, 330, 'AOC CU32V3 32\" Super-Curved 4K UHD monitor, 1500R Curved VA, 4ms, 121% sRGB Coverage / 90% DCI-P3, HDMI 2.0/DisplayPort, VESA', 15, 1),
(81638, 'MageGee MK Mechanical Keyboard', 'MageGee MK Mechanical Compact.jpg', 'MageGee', 33732, 42.99, 'Portable 60% Mechanical Keyboard, MageGee MK-Box LED Backlit Compact 68 Keys Mini Wired Office Keyboard \r\nfor Windows Laptop PC Mac', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchasehistory`
--

INSERT INTO `purchasehistory` (`OrderID`, `UserID`, `ProductID`, `Status`) VALUES
(5957, 5, 41172, 'card'),
(5958, 5, 61920, 'card'),
(5959, 5, 21149, 'card'),
(5960, 6, 61249, 'cash'),
(5961, 6, 41172, 'card'),
(5963, 6, 81638, 'cash'),
(5964, 6, 11802, 'cash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandName`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `likedbrands`
--
ALTER TABLE `likedbrands`
  ADD KEY `BrandName` (`BrandName`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `likedproducts`
--
ALTER TABLE `likedproducts`
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `markets`
--
ALTER TABLE `markets`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `paypal` (`paypal`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Brand` (`Brand`),
  ADD KEY `Brand_2` (`Brand`);

--
-- Indexes for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5966;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likedbrands`
--
ALTER TABLE `likedbrands`
  ADD CONSTRAINT `likedbrands_ibfk_1` FOREIGN KEY (`BrandName`) REFERENCES `brands` (`BrandName`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `likedbrands_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `customers` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `likedproducts`
--
ALTER TABLE `likedproducts`
  ADD CONSTRAINT `likedproducts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `customers` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `likedproducts_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD CONSTRAINT `purchasehistory_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `customers` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `purchasehistory_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
