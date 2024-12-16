-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2024 at 10:59 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(21, 'rupesh', 'rupesh135799@gmail.com', '$2y$10$xQmKiect90MD0AfGtLW/jO6lvRGvfeVRsdI6VTFQx.zJUSHmn/nhm');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(7, 'Zomato'),
(8, 'Flipkart'),
(9, 'Vestel'),
(12, 'Nike'),
(13, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `user_email`, `quantity`) VALUES
(37, 'kumar@gmail.com', 0),
(32, 'rupesh135799@gmail.com', 0),
(33, 'rupesh135799@gmail.com', 0),
(44, 'rupesh135799@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(9, 'Fruits'),
(10, 'Juices'),
(21, 'shoes'),
(22, 'Electronics'),
(23, 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `contact`, `email`, `subject`, `message`) VALUES
(20, 'adsfasf', 'asdf', 'fdasf@gmail.com', 'asdfasd', 'asdfasdf'),
(21, 'qasdfsa', 'asdfas', 'fasdf@gmail.coom', 'asfd', 'asdf'),
(22, 'asdf', 'asdf', 'asdf@gmail.com', 'asdf', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_keywords` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(31, 'Apple', 'Apple are tasty eat once you will ask more/-', 'apple,red apple, fresh apple', 9, 7, 'apples.PNG', 'apples.PNG', 'apples.PNG', '120', '2023-10-25 02:31:33', 'true'),
(32, 'Watermelon', 'watermelon are healthy', 'watermelon, fresh watermelon, red watermelon', 9, 7, 'watermelon.PNG', 'watermelon.PNG', 'watermelon.PNG', '180', '2023-10-26 04:00:53', 'true'),
(33, 'Iphone 15', 'Get iphone 15 at affordable price. Get in black color with 4+128 variant.', 'iphone,15,iphone15 apple', 18, 1, 'iphone15.PNG', 'iphone15a.PNG', 'iphone15.PNG', '157500', '2023-10-30 14:43:15', 'true'),
(34, 'Vestel 32', 'VESTEL 32 smart tv at affordable price', 'Tv ,android tv, led ,television', 18, 9, 'tv1.PNG', 'tv2.PNG', 'tv3.PNG', '13900', '2023-11-07 10:59:07', 'true'),
(37, 'Shoes', 'Get brand new shoes at affordable price', 'shoes,brand new shoes, nike,blue shoes,', 21, 12, 'shoes0.PNG', 'shoes1.PNG', 'shoes2.PNG', '4000', '2024-02-06 10:54:18', 'true'),
(43, 'Dustbin', 'Brand new dustbin', 'dustbin, cleaner, bucket', 23, 13, 'dustbin1.webp', 'dustbin2.webp', 'dustbin1.webp', '120', '2024-10-21 17:16:39', 'true'),
(44, 'Nike Dunk Low Retro', 'Mens Shoes', 'shoes, nike', 21, 12, 'nike1.png', 'nike2.jpeg', 'nike3.png', '4000', '2024-10-21 17:21:20', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `items_name` varchar(255) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `items_name`, `amount_due`, `total_products`, `order_date`, `payment_mode`) VALUES
('COD65abc39ead3b2', 72, ' Apple/ watermelon/ ', 250, 2, '2024-01-20 12:59:10', 'Cash on Delivery'),
('COD65abc698a4100', 73, ' Iphone 15/ ', 157500, 1, '2024-01-20 13:11:52', 'Cash on Delivery'),
('COD6648b70cd12c3', 74, ' Watermelon/ ', 180, 1, '2024-05-18 14:11:24', 'Cash on Delivery'),
('eS65abc666ef3d4', 73, ' Apple/ ', 120, 1, '2024-01-20 13:11:32', 'eSewa'),
('eS65abd7bfa7306', 73, ' Shoes/ watermelon/ ', 5110, 2, '2024-01-20 14:25:33', 'eSewa'),
('eS65abd8178b941', 73, ' Shoes/ ', 5000, 1, '2024-01-20 14:26:59', 'eSewa'),
('eS65b1272a4783a', 72, ' Shoes/ ', 5000, 1, '2024-01-24 15:05:43', 'eSewa'),
('eS65b47c6a7e159', 72, ' Shoes/ ', 5000, 1, '2024-01-27 03:46:23', 'eSewa'),
('eS65bf8b49b2b6e', 74, ' Watermelon/ ', 180, 1, '2024-02-04 13:05:33', 'eSewa'),
('eS65bfa58a86f01', 74, ' Shoes/ ', 5000, 1, '2024-02-04 14:56:38', 'eSewa'),
('eS65c20ce3d5c95', 74, ' Vestel 32/ ', 13900, 1, '2024-02-06 10:43:19', 'eSewa'),
('eS65c216dbbcb7b', 75, ' Vestel 32/ ', 13900, 1, '2024-02-06 11:24:55', 'eSewa');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `verify_token` varchar(64) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `verify_token`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(73, 'kumar', 'kumar@gmail.com', '$2y$10$ojU8KFe4eeFa1MphbJ/L2eba0ePsK35xOYBYc6VjhsNTG1CGcXRMC', NULL, 'admin.jpg', '', 'janakpur', '9814828690'),
(74, 'rupesh', 'rupesh135799@gmail.com', '$2y$10$9mHq/R6bA8KiOP9QyWQRIOh38DtVG1xmdaIzGtTuJzkmvGP2kjmKe', '89e883dde9809e39bf1c0ac390ddebe2', 'admin.jpg', '', 'janakpur', '9814828690'),
(75, 'shivshankar', 'shivsanka@gmail.com', '$2y$10$90dKJhHcS6c3rg.AOH6aZe1GK5raQufvKOWmEU4roed7KSH5ZH6w.', NULL, 'delivery-truck.png', '', 'janakpur', '9814828689');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `verify_token` (`verify_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
