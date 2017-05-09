-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2017 at 08:55 PM
-- Server version: 5.7.18-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ottoco_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `items_reg`
--

CREATE TABLE `items_reg` (
  `sender_name` text,
  `sender_phone` text,
  `sender_email` text,
  `receiver_name` text,
  `receiver_address` text NOT NULL,
  `receiver_phone` text,
  `receiver_email` text,
  `description` text,
  `item` text,
  `weight` int(11) DEFAULT NULL,
  `unit` text,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `track_id` text NOT NULL,
  `status` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items_reg`
--

INSERT INTO `items_reg` (`sender_name`, `sender_phone`, `sender_email`, `receiver_name`, `receiver_address`, `receiver_phone`, `receiver_email`, `description`, `item`, `weight`, `unit`, `quantity`, `price`, `order_id`, `track_id`, `status`) VALUES
('Test icles', '416-827-1212', 'test@test.com', 'Receiver test', '', '416-825-8473', 'recv@test.com', 'Its a box', '', 24, 'kg', 5, 0, '', '', ''),
('First name, last name', '6477777777', 'sender@test.com', 'First, last', '123 fake st.', '6471234567', 'rcvtest@test.com', 'its a box', '/uploads/img1.jpg', 23, 'kg', 1, 200, '563264', '#OT1234657890TO', 'in ocean'),
('Dick hertz', '416-123-4567', 'dhertz@gmail.com', 'Ass hole', '123 fake st.', '416-967-1212', 'asshole@gmail.com', 'Contains milk products and radioactive material. Fragile, handle with care.', '/upload/milk.jpg', 13, 'kg', 12, 157, '123456', 'ot023210015z31bc', 'on its way');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
