-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 05:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffeedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `shot` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'No',
  `description` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`id`, `name`, `type`, `price`, `image`, `shot`, `description`) VALUES
(1, 'Coffee', 'Hot Drinks', 35, 'Images/Coffee/coffee.jpg', 'Yes', 'A Good coffee'),
(3, 'Toffee Late', 'Hot Drinks', 40, 'Images/Coffee/toffee.jpg', 'Yes', 'Latte topped with a swirl of cream and a toffee drizzle.'),
(4, 'Hot Chocolate', 'Hot Drinks', 40, 'Images/Coffee/hot_chocolate.jpg', 'No', 'Deliciously warming, this is a silky smooth blend of chocolatey syrup and water.'),
(5, 'Latte', 'Hot Drinks', 38, 'Images/Coffee/latte.jpg', 'No', 'A large shot of bean espresso ,mix it with organic, semi-skimmed.'),
(6, 'Cappuccino', 'Hot Drinks', 38, 'Images/Coffee/cappuccino.jpg', 'Yes', 'A large shot of bean espresso with semi-skimmed milk in the perfect frothy texture.'),
(7, 'Espresso ', 'Hot Drinks', 35, 'Images/Coffee/espresso.jpg', 'Yes', 'A double shot of coffee made from freshly ground 100% Arabica beans.'),
(8, 'Tea', 'Hot Drinks', 30, 'Images/Coffee/tea.jpg', 'No', 'Because there are few things a nice cup of tea can’t make better.'),
(9, 'Belgian Chocolate Iced Frappe', 'Cold Drinks', 45, 'Images/Coffee/toffee.jpg', 'No', 'Deliciously indulgent, this iced frappe.'),
(10, 'Raspberry Ripple Iced Cooler', 'Cold Drinks', 50, 'Images/Coffee/berry.jpg', 'No', 'Dive into the refreshing, summer taste of our Raspberry Ripple Iced Cooler.'),
(11, 'Peppermint White Chocolate Mocha', 'Cold Drinks', 55, 'Images/Coffee/white.jpg', 'No', 'Delicious coffee is blended with ice, topped with peppermint and white chocolate sauce.'),
(12, 'Strawberry Lemonade', 'Cold Drinks', 45, 'Images/Coffee/berry.jpg', 'No', 'Tangy frozen lemonade with a deliciously sweet strawberry flavored swirl'),
(13, 'Mocha Iced Frappe', 'Cold Drinks', 43, 'Images/Coffee/white.jpg', 'No', 'With a hint of coffee,topped with cream and an irresistible chocolate drizzle.'),
(14, 'Caramel Iced Frappe', 'Cold Drinks', 43, 'Images/Coffee/toffee.jpg', 'No', 'A hint of delicious coffee is blended with ice.'),
(15, 'Berry Burst Fruit Smoothie', 'Cold Drinks', 65, 'Images/Coffee/white.jpg', 'No', 'Pureed fruit and juices are blended with low fat yogurt and ice.'),
(16, 'Mango Iced Fruit Smoothie', 'Cold Drinks', 70, 'Images/Coffee/berry.jpg', 'No', 'Pure mango blended with low fat yogurt and ice.'),
(17, 'Straw', 'Side Order', 0, 'Images/Coffee/straws.jpg', 'No', 'Straw for fun'),
(18, 'Ice', 'Side Order', 0, 'Images/Coffee/ice.jpg', 'No', 'Chilled ice cubes'),
(19, 'Sugar', 'Side Order', 5, 'Images/Coffee/sugar.jpg', 'No', 'Sugar cubes'),
(20, 'Milk', 'Side Order', 8, 'Images/Coffee/milk.jpg', 'No', 'Milk packets');

-- --------------------------------------------------------

--
-- Table structure for table `coffee_cart`
--

CREATE TABLE `coffee_cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `shot` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'No',
  `price` double DEFAULT NULL,
  `total` bigint(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_id_UNIQUE` (`admin_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coffee_cart`
--
ALTER TABLE `coffee_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `coffee_cart`
--
ALTER TABLE `coffee_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
