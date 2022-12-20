-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2022 at 03:59 AM
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
(10051, 'Tilted Nation RGB Headset Stand', 'Tilted Nation RGB Headset Stand.jpg', 'Tilted Nation', 74256, 59.99, 'Gaming Headphone Stand for Desk Display with Mouse Bungee Cord Holder - Gaming Headset Holder with USB 3.0 Hub for Xbox, PS4, PC ', 12, 1),
(11802, 'I-Rocks IRC41 Memory Foam Wrist Pad', 'I-rocks.jpg', 'I-Rocks', 19104, 24.95, 'Anti-Slip Base; Provides Cushioned Support and Pain Relief for Office, Gaming, Computers and Laptops', 4, 1),
(41172, 'Darkecho Gaming and Office Chair', 'Darkecho.jpg', 'Darkecho', 6255, 209.99, 'Footrest Massage Vintage Leather Ergonomic Chair Reclining Adjustable High Back Gamer Chair with Headrest and Lumbar Support Ivory', 3, 1),
(61249, 'MX MASTER 3S', 'LogiTech Mouse.png', 'Logitech', 33732, 99.99, 'Darkfield high precision performance Wireless Mouse with Bluetooth Low Energy Technology', 9, 1),
(61920, 'AOC 4K UHD Monitor', 'AOC Monitor.jpg', 'AOC', 19227, 330, 'AOC CU32V3 32\" Super-Curved 4K UHD monitor, 1500R Curved VA, 4ms, 121% sRGB Coverage / 90% DCI-P3, HDMI 2.0/DisplayPort, VESA', 15, 1),
(81638, 'MageGee MK Mechanical Keyboard', 'MageGee MK Mechanical Compact.jpg', 'MageGee', 33732, 42.99, 'Portable 60% Mechanical Keyboard, MageGee MK-Box LED Backlit Compact 68 Keys Mini Wired Office Keyboard \r\nfor Windows Laptop PC Mac', 7, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
