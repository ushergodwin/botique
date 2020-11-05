-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2020 at 08:06 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemaholt_botique`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

DROP TABLE IF EXISTS `accessories`;
CREATE TABLE IF NOT EXISTS `accessories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `code`, `price`, `description`, `image`, `status`, `category`) VALUES
(1, 'Make Up Kit', 'muk01', 45000.00, 'all make up and perfume in one kit', 'product-images/beauty.PNG', '55000', 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `location`, `email`) VALUES
(1, 'Banda', 'brenda@gmail.com'),
(2, 'Mpererwe', 'usher.godwin@yahoo.com'),
(3, 'Munyonyo', 'pretybridgetgema@gmail.com'),
(11, 'Abayita Ababiri', 'usher@gmail.com'),
(4, 'Kawempe Tula', 'godwintumuhimbise96@gmail.com'),
(5, 'Bakuli', 'abaasajosephine@gmail.com'),
(6, 'Bakuli', 'abaasajosephine@gmail.com'),
(7, 'Abayita Ababiri', 'abaasajosephine@gmail.com'),
(8, 'Abayita Ababiri', 'abaasajosephine@gmail.com'),
(9, 'Entebbe Town', 'abaasajosephine@gmail.com'),
(10, 'Entebbe Market Area', 'usher@yahoo.com'),
(12, 'Abayita Ababiri', 'usher@gmail.com'),
(13, 'Mpererwe', 'godwintumuhimbise96@gmail.com'),
(14, 'Mpererwe', 'godwintumuhimbise96@gmail.com'),
(15, 'Kawempe Tula', 'usher.godwin@yahoo.com'),
(16, 'Kawempe Tula', 'godwintumuhimbise96@gmail.com'),
(17, 'Mpererwe', 'bridgetnamugema@gmail.com'),
(18, 'Munyonyo', 'bernanalubega96@gmail.com'),
(19, 'kasubi-namungoona', 'ashrikan@gmail.com'),
(20, 'kasubi-namungoona', 'ashrikan@gmail.com'),
(21, 'Mpererwe', 'tumuhimbise@gmail.com'),
(22, 'Mpererwe', 'ushergodwin1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `inquirer` varchar(15) DEFAULT NULL,
  `response_file` varchar(35) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `inquirer`, `response_file`, `status`) VALUES
('user', 'Usher Gray', 'godwin', 'user-godwin.txt', 'offline'),
('usher', 'Usher Godwin', 'godwin', 'usher-godwin.txt', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `all_cart`
--

DROP TABLE IF EXISTS `all_cart`;
CREATE TABLE IF NOT EXISTS `all_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` double NOT NULL,
  `it_total_price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `size` varchar(5) DEFAULT NULL,
  `order_ID` int(11) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `order_ID` (`order_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_cart`
--

INSERT INTO `all_cart` (`id`, `name`, `code`, `quantity`, `price`, `it_total_price`, `image`, `email`, `size`, `order_ID`, `user_agent`) VALUES
(1, 'Men Office Suit', 'menofficesuit01', 1, 50000, 50000, 'product-images/256703178509_status_d7bcc4d9516348e8bdaefba0865b0369.jpg', '', 'L', 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(2, 'suit purple', 'suit02', 1, 80000, 80000, 'product-images/256703178509_status_bec406781be248b198c82b34a18964df.jpg', NULL, NULL, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(3, 'Make Up Kit', 'muk01', 3, 50000, 150000, 'product-images/beauty.PNG', 'bernanalubega96@gmail.com', 'L', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1'),
(4, 'suit for men', 'suitformen01', 1, 80000, 80000, 'product-images/256703178509_status_a0b75cbfe93647ada144f10f2b5ee285.jpg', 'bernanalubega96@gmail.com', 'M', 0, 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1'),
(5, 'Make Up Kit', 'muk01', 1, 50000, 50000, 'product-images/beauty.PNG', 'bernanalubega96@gmail.com', 'L', 716340410, 'Mozilla/5.0 (Linux; Android 9; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36'),
(6, 'Ankle Boots Colour Deep Blue', 'wabdb01', 1, 80000, 80000, 'product-images/shoeswomen.PNG', 'bernanalubega96@gmail.com', 'XL', 716340410, 'Mozilla/5.0 (Linux; Android 9; SM-G960U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.89 Mobile Safari/537.36'),
(12, 'suit purple', 'suit02', 2, 80000, 160000, 'product-images/256703178509_status_bec406781be248b198c82b34a18964df.jpg', 'godwintumuhimbise96@gmail.com', 'S', 362564395, NULL),
(8, 'Ankle Boots Colour Deep Blue', 'wabdb01', 1, 80000, 80000, 'product-images/shoeswomen.PNG', '', 'XS', 0, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(9, 'Make Up Kit', 'muk01', 1, 50000, 50000, 'product-images/beauty.PNG', '', 'S', 0, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(13, 'Men Office Suit', 'menofficesuit01', 1, 50000, 50000, 'product-images/256703178509_status_d7bcc4d9516348e8bdaefba0865b0369.jpg', '', NULL, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36'),
(11, 'Classic Ladies Light Bag', 'cllb01', 1, 30000, 30000, 'product-images/bag.PNG', NULL, NULL, 0, 'Mozilla/5.0 (Linux; Android 8.1.0; Infinix X571) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36'),
(16, 'Make Up Kit', 'muk01', 1, 45000, 45000, 'product-images/beauty.PNG', NULL, NULL, 0, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `bags`
--

DROP TABLE IF EXISTS `bags`;
CREATE TABLE IF NOT EXISTS `bags` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bags`
--

INSERT INTO `bags` (`id`, `name`, `code`, `price`, `description`, `image`, `status`, `category`) VALUES
(1, 'Classic Ladies Light Bag', 'cllb01', 50000.00, 'Classic Ladies light bag in grey color. Trending fashion', 'product-images/bag.PNG', '43000', 'bags');

-- --------------------------------------------------------

--
-- Table structure for table `beauty`
--

DROP TABLE IF EXISTS `beauty`;
CREATE TABLE IF NOT EXISTS `beauty` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blazers`
--

DROP TABLE IF EXISTS `blazers`;
CREATE TABLE IF NOT EXISTS `blazers` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blazers`
--

INSERT INTO `blazers` (`id`, `name`, `code`, `price`, `description`, `image`, `status`, `category`) VALUES
(4, 'suit for men', 'suitformen01', 80000.00, 'the outstanding outfit for men, office and interview ware', 'product-images/256703178509_status_a0b75cbfe93647ada144f10f2b5ee285.jpg', '90000', 'blazers'),
(5, 'Women Office Suit', 'womenofficesuit01', 70000.00, 'Suit for women, classic outfit', 'product-images/256703178509_status_d58f7df036ae496fae87c4b065e55c9a.jpg', '80000', 'blazers'),
(7, 'Men Office Suit Orange', 'menofficesuit03', 80000.00, 'Orange coloured  suit for gentlemen', 'product-images/256703178509_status_95d4af9cffa544d48812e249688e43c7.jpg', '90000', 'blazers');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` double NOT NULL,
  `it_total_price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `size` varchar(5) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `code`, `quantity`, `price`, `it_total_price`, `image`, `email`, `size`, `user_agent`) VALUES
(1, 'Men Office Suit', 'menofficesuit01', 1, 50000, 50000, 'product-images/256703178509_status_d7bcc4d9516348e8bdaefba0865b0369.jpg', '', 'L', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(2, 'suit purple', 'suit02', 1, 80000, 80000, 'product-images/256703178509_status_bec406781be248b198c82b34a18964df.jpg', NULL, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(3, 'Make Up Kit', 'muk01', 3, 50000, 150000, 'product-images/beauty.PNG', 'bernanalubega96@gmail.com', 'L', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1'),
(4, 'suit for men', 'suitformen01', 1, 80000, 80000, 'product-images/256703178509_status_a0b75cbfe93647ada144f10f2b5ee285.jpg', 'bernanalubega96@gmail.com', 'M', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_3_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.5 Mobile/15E148 Safari/604.1'),
(8, 'Ankle Boots Colour Deep Blue', 'wabdb01', 1, 80000, 80000, 'product-images/shoeswomen.PNG', '', 'XS', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(9, 'Make Up Kit', 'muk01', 1, 50000, 50000, 'product-images/beauty.PNG', '', 'S', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36'),
(13, 'Men Office Suit', 'menofficesuit01', 1, 50000, 50000, 'product-images/256703178509_status_d7bcc4d9516348e8bdaefba0865b0369.jpg', '', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.125 Safari/537.36'),
(11, 'Classic Ladies Light Bag', 'cllb01', 1, 30000, 30000, 'product-images/bag.PNG', NULL, NULL, 'Mozilla/5.0 (Linux; Android 8.1.0; Infinix X571) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.111 Mobile Safari/537.36'),
(16, 'Make Up Kit', 'muk01', 1, 45000, 45000, 'product-images/beauty.PNG', NULL, NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.121 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryprices`
--

DROP TABLE IF EXISTS `deliveryprices`;
CREATE TABLE IF NOT EXISTS `deliveryprices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryprices`
--

INSERT INTO `deliveryprices` (`id`, `location`, `price`) VALUES
(1, 'Mpererwe', 4000),
(2, 'Kawempe Tula', 3500),
(3, 'Banda', 6000),
(4, 'Munyonyo', 5000),
(5, 'Wandegeya', 2500),
(6, 'Wandegeya', 2500),
(7, 'Wandegeya', 2500),
(8, 'Wandegeya', 2500),
(9, 'Wandegeya', 2500),
(10, 'Entebbe Town', 10000),
(11, 'Airport Area', 8000),
(12, 'Bukoto', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `dresses`
--

DROP TABLE IF EXISTS `dresses`;
CREATE TABLE IF NOT EXISTS `dresses` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dresses`
--

INSERT INTO `dresses` (`id`, `name`, `code`, `price`, `description`, `image`, `status`, `category`) VALUES
(1, 'Long dress', 'longdress01', 30000.00, 'impressive long dress', 'product-images/IMG-20200817-WA0057.jpg', '42000', 'dresses'),
(2, 'Nice dress', 'nice01', 250000.00, 'A very nice dress for ladies', 'product-images/IMG-20200817-WA0042.jpg', '30000', 'dresses');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `subject`, `message`) VALUES
(8, 'asd@gmail.com', 'asd', 'as'),
(9, 'godwintumuhimbise96@gmail.com', 'Test Email Functionality ', 'Please respond using the reply box and see whether it works. Thank you.\r\nRegards,\r\nDeveloper ');

-- --------------------------------------------------------

--
-- Table structure for table `online`
--

DROP TABLE IF EXISTS `online`;
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(35) NOT NULL,
  `firstname` varchar(35) NOT NULL,
  `lastname` varchar(35) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online`
--

INSERT INTO `online` (`id`, `email`, `firstname`, `lastname`, `status`) VALUES
(1, 'bridgetnamugema@gmail.com', 'Bridget', 'Namugema', 'offline'),
(2, 'godwintumuhimbise96@gmail.com', 'Tumuhimbise', 'Godwin', 'offline'),
(3, 'ushergodwin1@gmail.com', 'Usher', 'Godwin ', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

DROP TABLE IF EXISTS `ordered`;
CREATE TABLE IF NOT EXISTS `ordered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_ID` int(11) NOT NULL,
  `shipping` varchar(100) DEFAULT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `total_cost` int(10) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `ordered_at` varchar(30) NOT NULL,
  `order_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`id`, `order_ID`, `shipping`, `payment`, `total_cost`, `status`, `email`, `ordered_at`, `order_code`) VALUES
(1, 716340410, 'Standard Shipping', 'cash on delivery', 135000, 'Order Received', 'bernanalubega96@gmail.com', '2020-08-07 07:01:16am', 'hOVC'),
(2, 362564395, 'Pick Up from office', 'cash on delivery', 163000, 'Order Delivered', 'godwintumuhimbise96@gmail.com', '2020-08-14 20:37:24pm', 'RMcP');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `comment`) VALUES
(1, 'usher', '\r\nthank you for providing us with best quality products'),
(2, 'Gema', 'i love gemasglam home. cool outfits guys'),
(3, 'jaime', 'i would like to work with you'),
(4, 'kush', 'you guys have to try out gemasglam...best men\'s outfit..i am in love'),
(5, 'William', 'Can\'t wait to shop from you guy. My fiancee will get the best outfit from gemasglam. ');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

DROP TABLE IF EXISTS `shoes`;
CREATE TABLE IF NOT EXISTS `shoes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`id`, `name`, `code`, `price`, `description`, `image`, `status`, `category`) VALUES
(2, 'ankle high hill', 'ahh01', 80000.00, 'The high hill you will always feel comfortable in', 'product-images/IMG-20200817-WA0047.jpg', '95000', 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `skirts`
--

DROP TABLE IF EXISTS `skirts`;
CREATE TABLE IF NOT EXISTS `skirts` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tops`
--

DROP TABLE IF EXISTS `tops`;
CREATE TABLE IF NOT EXISTS `tops` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tops`
--

INSERT INTO `tops` (`id`, `name`, `code`, `price`, `description`, `image`, `status`, `category`) VALUES
(2, 'amazing top', 'at01', 20000.00, 'Amazing top for decades', 'product-images/IMG-20200817-WA0068.jpg', '25000', 'tops');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

DROP TABLE IF EXISTS `total`;
CREATE TABLE IF NOT EXISTS `total` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` int(11) DEFAULT NULL,
  `final_total` int(11) DEFAULT NULL,
  `notification` varchar(100) DEFAULT NULL,
  `email` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trousers`
--

DROP TABLE IF EXISTS `trousers`;
CREATE TABLE IF NOT EXISTS `trousers` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `email` varchar(65) NOT NULL,
  `query_file` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`, `email`, `query_file`, `status`) VALUES
('godwin', 'Tumuhimbise Godwin', 'godwintumuhimbise96@gmail.com', 'godwin.txt', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `address`, `contact`, `account_type`, `password`) VALUES
('godwintumuhimbise96@gmail.com', 'Tumuhimbise', 'Godwin', 'Kawempe Tula', '+25675809525', 'user', '$2y$10$or.yi4QSO9ii5tgL7iVjluMdpiaAa9XNarsW4Y8VsG2wTBb6ibym6'),
('bridgetnamugema@gmail.com', 'Bridget', 'Namugema', 'Mpererwe', '+256703903990', 'admin', '$2y$10$8698BO0nOF4JtcIGhyU5lOn8Xpq9CDWr54jnvtQlNYeGyox.r00E6'),
('bernanalubega96@gmail.com', 'Berna', 'Luyinda ', 'Munyonyo', '+256700208907', 'user', '$2y$10$U0kXFe9UP/U1F65DAIvgVOiYfxLI1E4pFxee2HOC2F5AipNNK7LFC'),
('ashrikan@gmail.com', 'NAKABIITO', 'ENID', 'kasubi-namungoona', '0784565201', 'user', '$2y$10$wHnuUUTB/V2wiK94AZBsTuF7mv7XNxdbrssQt62AxLKYnjOcQsuyy'),
('ushergodwin1@gmail.com', 'Usher', 'Godwin ', 'Mpererwe', '+256756809525', 'staff', '$2y$10$D1VO33HRHej0d9RThmi5ROFRkDjG.NztBibQhPo6JDrHKTbpzagkq');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

DROP TABLE IF EXISTS `verify`;
CREATE TABLE IF NOT EXISTS `verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(65) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `email`, `code`) VALUES
(5, 'tumuhimbise@gmail.com', '92fba86e5806823e61ab77295b2266d6');

-- --------------------------------------------------------

--
-- Table structure for table `vochar`
--

DROP TABLE IF EXISTS `vochar`;
CREATE TABLE IF NOT EXISTS `vochar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vochar` varchar(6) NOT NULL,
  `price` int(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vochar` (`vochar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vochar`
--

INSERT INTO `vochar` (`id`, `vochar`, `price`) VALUES
(1, 'ush01', 10000),
(2, 'gema2', 15000),
(3, 'gema3', 5000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
