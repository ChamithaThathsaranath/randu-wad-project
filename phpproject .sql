-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2025 at 06:31 AM
-- Server version: 8.0.36
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `order_cost` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(14, 200.00, 'not paid ', 5, '717052555', 'sf', 'asfsagh', '2025-01-20 20:13:36'),
(15, 200.00, 'not paid ', 6, '717052555', 'sf', 'asfsagh', '2025-01-20 20:15:00'),
(16, 11400.00, 'not paid ', 6, '717052555', 'sf', 'sfasdf', '2025-01-20 21:15:19'),
(17, 18000.00, 'not paid ', 5, '717052555', 'sf', 'sf', '2025-01-20 22:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(26, 14, 6, 'Banners', 'banners.jpg', 200.00, 1, 5, '2025-01-20 20:13:36'),
(27, 15, 2, 'Business Signage', 'businesssignage.jpg', 200.00, 1, 6, '2025-01-20 20:15:00'),
(28, 16, 3, 'Digital Display Boards', 'digitaldisplay.jpeg', 200.00, 1, 6, '2025-01-20 21:15:19'),
(29, 16, 4, 'Name boards', 'nameboards.jpg', 11200.00, 1, 6, '2025-01-20 21:15:19'),
(30, 17, 5, 'Vehicle Branding', 'vehiclebranding.jpg', 18000.00, 1, 5, '2025-01-20 22:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(20,2) NOT NULL,
  `product_special_offer` tinyint NOT NULL,
  `product_color` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Billboards', 'add', 'A standard size of 12X6ft board. For high-impact billboards any type of design can be printed within the billboard dimension. Payment also includes installations fees. For design specifications, our customer service will be in touch once the product is ordered.\n', 'billboard.jpg', 'featured2.jpeg', 'featured3.jpeg', 'featured4.jpeg', 20000.00, 0, 'white'),
(2, 'Business Signage', 'add', 'A standard size of 2X1.5ft board. Any design can be printed within the board dimension. Payment also includes installations fees. For design specifications, our customer service will be in touch once the product is ordered.\n                            Whether it’s for storefronts, offices, or retail spaces, we create signs \n                            that reflect your brand’s personality and professionalism.', 'businesssignage.jpg', 'featured2.jpeg', 'featured3.jpeg', 'featured4.jpeg', 200.00, 0, 'white'),
(3, 'Digital Display Boards', 'add', 'A standard size of 3X4ft board. Any manner of designs can be displayed on the Boards. Payment also includes installations fees. For design specifications, our customer service will be in touch once the product is ordered.\n                            Perfect for high-traffic areas, these vibrant, \n                            energy-efficient boards deliver your message day and night, \n                            creating dynamic visual experiences.', 'digitaldisplay.jpeg', 'featured2.jpeg', 'featured3.jpeg', 'featured4.jpeg', 200.00, 0, 'white'),
(4, 'Name boards', 'add', 'A standard size of 1X2.5in board. Any type of fonts and letters can be included through laser cutting or engraving. Payment also includes installations fees. For design specifications, our customer service will be in touch once the product is ordered.\n                            Crafted with precision and available in various styles and materials, \n                            these boards are perfect for businesses, homes, and institutions.', 'nameboards.jpg', 'featured2.jpeg', 'featured3.jpeg', 'featured4.jpeg', 11200.00, 0, 'white'),
(5, 'Vehicle Branding', 'add', 'A full vehicle makeover can be done under your preferred designs. Payment also includes installations fees. For design specifications, our customer service will be in touch once the product is ordered.\n                            Turn your vehicles into mobile billboards with our vehicle branding and wrapping services. \n                            We design and install eye-catching graphics that turn every drive into a marketing opportunity.', 'vehiclebranding.jpg', 'featured2.jpeg', 'featured3.jpeg', 'featured4.jpeg', 18000.00, 0, 'white'),
(6, 'Banners', 'add', 'A standard size of 2.5X3.5ft board.Any design can be printed within the banner dimensions. Payment also includes installations fees. For design specifications, our customer service will be in touch once the product is ordered.', 'banners.jpg', 'featured2.jpeg', 'featured3.jpeg', 'featured4.jpeg', 200.00, 0, 'white');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'chamitha', 'senavi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'chamitha', 'uvuf@gmail.com', 'afc5b757d40a5e72f03c27d89b82875d'),
(3, 'ravindra', 'omidu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'jack ma', 'jackma@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(5, 'elon', 'elon@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(6, 'nayanathara', 'nayana@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
