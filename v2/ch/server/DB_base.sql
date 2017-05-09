-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2017 at 01:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30
-- Reviewd by Jack

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otto_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('OTADMINTO', 'ottoadmin');

-- --------------------------------------------------------

--
-- Table structure for table `item_regis`
--

CREATE TABLE IF NOT EXISTS `item_regis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `weight` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `publishDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(100) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Item_Username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_regis`
--

CREATE TABLE IF NOT EXISTS `order_regis` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `sellerName` varchar(200) NOT NULL,
  `sellerCell` varchar(50) NOT NULL,
  `sellerEmail` varchar(300) NOT NULL,
  `buyerName` varchar(200) NOT NULL,
  `buyerAddress` varchar(300) NOT NULL,
  `buyerCell` varchar(50) NOT NULL,
  `totalWeight` float NOT NULL,
  `totalValue` float NOT NULL,
  `trackingID` varchar(30) DEFAULT NULL,
  `ottoPickUp` tinyint(1) NOT NULL,
  `publishdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderID`),
  KEY `FK_Order_Username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tracking_regis`
--

CREATE TABLE IF NOT EXISTS `tracking_regis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trackingID` varchar(30) NOT NULL,
  `publishdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr_info`
--

CREATE TABLE IF NOT EXISTS `usr_info` (
  `username` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usr_regis`
--

CREATE TABLE IF NOT EXISTS `usr_regis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `departures` varchar(200) NOT NULL,
  `arrivals` varchar(200) NOT NULL,
  `traveldate` date NOT NULL,
  `cell` int(50) NOT NULL,
  `publishdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_regis`
--
ALTER TABLE `item_regis`
  ADD CONSTRAINT `FK_Item_Username` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_regis`
--
ALTER TABLE `order_regis`
  ADD CONSTRAINT `FK_Order_Username` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usr_info`
--
ALTER TABLE `usr_info`
  ADD CONSTRAINT `FK_Info_Username` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usr_regis`
--
ALTER TABLE `usr_regis`
  ADD CONSTRAINT `FK_Flight_Username` FOREIGN KEY (`username`) REFERENCES `admin` (`username`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
