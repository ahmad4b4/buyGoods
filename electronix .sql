-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2017 at 01:20 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronix`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_log`
--

CREATE TABLE `ad_log` (
  `id` int(11) NOT NULL,
  `aname` varchar(20) DEFAULT NULL,
  `apwd` varchar(50) DEFAULT NULL,
  `secques` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_log`
--

INSERT INTO `ad_log` (`id`, `aname`, `apwd`, `secques`) VALUES
(1, 'admin', 'admin', 'cricket');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Asus'),
(3, 'Dell'),
(4, 'Nikon'),
(5, 'Samsung'),
(7, 'Motorola'),
(8, 'Intel');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(21, '127.0.0.1', 0),
(30, '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Motherboards'),
(3, 'Desktops'),
(4, 'Cameras'),
(5, 'Mobiles');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `mem_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `mem_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mem_id`, `cus_id`, `mem_type`) VALUES
(1, 3, 'gold'),
(2, 2, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `f_name` text NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `prd_id` int(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_by` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `f_name`, `due_amount`, `invoice_no`, `total_products`, `prd_id`, `address`, `city`, `order_date`, `payment_by`, `order_status`) VALUES
(29, 2, 'Ahmad', 3800, 2103430068, 1, 15, '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', '2017-05-28 15:36:31', '', 'Recieved'),
(31, 2, 'Ahmad', 4300, 611701925, 1, 17, '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', '2017-05-30 09:49:16', '', 'Recieved'),
(32, 2, 'Ahmad', 3800, 302887106, 1, 15, '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', '2017-05-30 09:49:16', '', 'Recieved'),
(33, 2, 'Ahmad', 3895, 1789007350, 1, 20, '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', '2017-05-31 09:10:18', '', 'Pending'),
(39, 2, 'Ahmad', 50000, 413396260, 1, 29, '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', '2017-06-01 10:30:58', '', 'Pending'),
(40, 2, 'Ahmad', 11300, 1600409336, 2, 16, '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', '2017-06-01 11:10:12', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `cus_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `cvvcode` int(100) NOT NULL,
  `card_no` int(100) NOT NULL,
  `ex_date` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `payment_mode` int(50) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `prd_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_no`, `prd_id`, `qty`, `order_status`) VALUES
(1, 1, 1991155900, 18, 1, 0),
(8, 8, 1989192788, 17, 1, 0),
(9, 8, 983069322, 17, 1, 0),
(10, 1, 1353027470, 14, 1, 0),
(11, 1, 1739621165, 17, 1, 0),
(12, 2, 1781899921, 16, 1, 0),
(13, 2, 309083694, 21, 1, 0),
(14, 2, 895037724, 19, 1, 0),
(15, 2, 1616151907, 19, 1, 0),
(16, 2, 1065324824, 15, 2, 0),
(17, 2, 1124334945, 28, 1, 0),
(18, 2, 444748168, 15, 1, 0),
(19, 2, 241672472, 23, 1, 0),
(20, 2, 994445127, 30, 1, 0),
(21, 2, 1154576612, 15, 1, 0),
(22, 2, 265366630, 19, 1, 0),
(23, 2, 1898151217, 29, 1, 0),
(24, 2, 1227158797, 14, 1, 0),
(25, 2, 1062354097, 21, 1, 0),
(26, 2, 146207011, 21, 1, 0),
(27, 2, 2103430068, 15, 1, 0),
(28, 2, 702518804, 21, 1, 0),
(29, 2, 611701925, 17, 1, 0),
(30, 2, 302887106, 15, 1, 0),
(31, 2, 1789007350, 20, 1, 0),
(32, 2, 412114514, 29, 1, 0),
(33, 2, 337547549, 28, 1, 0),
(34, 2, 30817795, 18, 1, 0),
(35, 2, 476181169, 15, 1, 0),
(36, 2, 41241233, 29, 1, 0),
(37, 2, 413396260, 29, 1, 0),
(38, 2, 1600409336, 16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prd_id` int(100) NOT NULL,
  `prd_cat` int(100) NOT NULL,
  `prd_brand` int(100) NOT NULL,
  `prd_title` varchar(255) NOT NULL,
  `prd_price` int(100) NOT NULL,
  `prd_desc` text NOT NULL,
  `prd_img` text NOT NULL,
  `prd_keyword` text NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prd_id`, `prd_cat`, `prd_brand`, `prd_title`, `prd_price`, `prd_desc`, `prd_img`, `prd_keyword`, `Status`) VALUES
(14, 4, 5, 'Samsung webcam', 6500, 'digital webcam with optical zoom', 'camera.png', 'webcam,samsung,camera,samsung camera,cameras', 'on'),
(15, 5, 7, 'Motorola maxi m23', 3800, '5 MP Primary Camera\n2 MP Secondary Camera\nDual Sim (GSM + UMTS)\nAndroid v4.4 (KitKat)', '20140904-193820-moto-e.jpg', 'motorola mobile,android,motorola,android phone,android mobiles', 'on'),
(16, 5, 7, 'Moto-Turbo mx888', 4800, '\nAndroid v4.4.4 OS\nDual Sim (GSM + GSM)\n5 inch HD Screen\n8 MP Primary Camera', '20150312-04712-moto-turbo.jpg', 'motorola mobile,android,motorola,android phone,android mobiles', 'on'),
(17, 5, 2, 'Asus568-molixva', 4300, '1 GB RAM\n8 MP Primary Camera\n2 MP Secondary Camera\n1.2 Ghz Quad Core', 'asus-ze550ml-ze550ml-1a076ww-125x125-imae6qafassv5kcz.jpeg', 'Asus mobile,android,asus,android phone,android mobiles', 'on'),
(18, 5, 5, 'Samsung galaxy ace', 5000, '5 Inch Super AMOLED ...\nDual SIM (LTE + GSM)\n13 MP | 5 MP Camera ...\n2600 mAh Battery', 'samsung-galaxy-ace-nxt-sm-g313hrwdinu-sm-g313hrwdins-125x125-imae2fjadm7qrghm.jpeg', 'samsung mobile,android,samsung,android phone,android mobiles,galaxy,ace', 'on'),
(19, 2, 8, 'Intel  Motherboard', 6999, 'form factor:ATX\r\nCore i7\r\nLGA1155\r\nDDR3 SDRAM\r\nGigabit Ethernet', '$_35.JPG', 'motherboard,intel,core i7,ethernet', 'on'),
(20, 2, 2, 'ASUS Motherboard', 3895, 'Form Factor Micro-ATX\r\nSocket type AM3+\r\nAudio Codec Realtec ALC887\r\nBuffered Memory', '18279201679984motherboard138606973113875996181389273744.jpg', 'asus,gaming,raltek,motherboard', 'on'),
(21, 1, 1, 'HP Pavilion P245SA', 33990, 'OS W8.1\r\nNotebook\r\n1TB Hard disk\r\n15.6" screen size ', '$_35(2).JPG', 'notebook,1tb,hp,laptop', 'on'),
(23, 4, 4, 'Nikon Coolpix P600 ', 18000, '16.1 Megapixel,\r\ncolor:black,\r\n60X Otical Zoom,\r\nISO 100 to 6400 Senstivity,\r\n3 inch vari Angle Display', 'digital-camera-391444626208.jpg', 'nikon,camera,black,zoom,cameras', 'on'),
(28, 4, 4, 'Nikon E32 Camera', 20000, 'The most Advance Technology of capturing picture. \r\n16px Zoom, 23 hrs battery time.', 'digital-camera-391444626208.jpg', 'camera, Nikon, E32', ''),
(29, 1, 1, ' HP - 800fx T90', 50000, 'RAM 4GB\r\n Hard disk 500 GB\r\nScreen Size : 14 by 18 inch\r\nVery good product to purchase!! Hurry up ', 'img1.jpg', 'HP Laptop HP-800fx T90', ''),
(30, 1, 5, 'Samsung NoteBook 8t70', 70000, 'Very good product in reasonable price\r\nRAM: 8GB\r\nROM: 500GB\r\nWifi\r\nBluetooth etc', 'img2.jpg', 'samsung laptop notebook', ''),
(31, 5, 5, 'Samsung Galaxy S7', 20000, 'Front camera , back camera, ram 1gb, rom 8GB', 'img7.jpg', 'mobile samsung', '');

-- --------------------------------------------------------

--
-- Table structure for table `u_reg`
--

CREATE TABLE `u_reg` (
  `user_id` int(10) NOT NULL,
  `u_fname` varchar(50) NOT NULL,
  `u_lname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `zip` varchar(50) NOT NULL,
  `phno` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Date` datetime(6) NOT NULL,
  `u_ip` int(100) NOT NULL,
  `mem_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_reg`
--

INSERT INTO `u_reg` (`user_id`, `u_fname`, `u_lname`, `address`, `city`, `country`, `zip`, `phno`, `u_email`, `password`, `Date`, `u_ip`, `mem_type`) VALUES
(2, 'Ahmad', 'Akbar', '300 LDA, Gopal Nagar, Gulberg III, Lahore.', 'Lahore', 'Pakistan', '1254577', '033343470145', 'ahmad4b4@yahoo.com', '1122', '2017-04-15 22:23:04.000000', 0, 'gold'),
(3, 'Ali', 'Akbar', '300 LDS', 'Lahore', 'Pakistan', '1254577', '033343470145', 'www.wali@yahoo.com', '1122', '2017-04-16 18:34:18.000000', 0, 'No membershop');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_log`
--
ALTER TABLE `ad_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aname` (`aname`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `u_reg`
--
ALTER TABLE `u_reg`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_log`
--
ALTER TABLE `ad_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `mem_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `u_reg`
--
ALTER TABLE `u_reg`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
