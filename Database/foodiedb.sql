-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 06:28 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodiedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `admin_image` varchar(225) NOT NULL,
  `nationality` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `admin_image`, `nationality`, `email`, `username`, `password`, `phone`, `role`) VALUES
(10, 'IsraTech', 'user (1).jpg', 'xxx', 'isratech@outlook.com', 'isratech', 'isratech.1', '1234567890', 'manager'),
(13, 'John Nowrey', 'user (3).jpg', 'xxx', 'lijuser@mailinator.com', 'Joseph', 'tt', '24456789', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_cost` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `food_id`, `session_id`, `qty`, `total_cost`) VALUES
(16, 15, '6umc9u61221ietf5k359bouj4h', 2, '138'),
(17, 7, '6umc9u61221ietf5k359bouj4h', 1, '50'),
(18, 6, '8qjqm4t1ib2ov39ceblj8gnlk4', 1, '36'),
(20, 6, 'kotd04p9kh51ifmdestm5rmeg5', 1, '36'),
(22, 7, 'kotd04p9kh51ifmdestm5rmeg5', 1, '50'),
(24, 25, 'kotd04p9kh51ifmdestm5rmeg5', 1, '43'),
(25, 24, 'kotd04p9kh51ifmdestm5rmeg5', 3, '168'),
(26, 8, '33afnid7ce6o7a9b72lck88ijj', 1, '40'),
(27, 18, '33afnid7ce6o7a9b72lck88ijj', 2, '120'),
(28, 14, '8n96mfd9huaodtcejmuokpil4s', 1, '49'),
(29, 13, '8n96mfd9huaodtcejmuokpil4s', 1, '70'),
(30, 19, '8n96mfd9huaodtcejmuokpil4s', 1, '80'),
(31, 8, '8n96mfd9huaodtcejmuokpil4s', 1, '40'),
(32, 14, '0joh8b4pr5mm7c474lfhl70595', 1, '49'),
(33, 16, '7e29r2h7ueob8d5a70pl1jilvr', 2, '76'),
(34, 8, '7e29r2h7ueob8d5a70pl1jilvr', 2, '80');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryboys`
--

CREATE TABLE `deliveryboys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `db_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `deliveryboys`
--

INSERT INTO `deliveryboys` (`id`, `name`, `phone`, `email`, `nationality`, `db_image`) VALUES
(1, 'DB Name', '2342545453546', 'penyradigy@mailinator.com', 'xxx', 'user (20).png');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_desc` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `image`, `food_name`, `food_desc`, `category`, `price`) VALUES
(3, 'new (5).png', 'Drink Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'drinks', '10'),
(4, 'new (10).png', 'Drink Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'drinks', '25'),
(5, 'dimasRestj3.png', 'Drink Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'drinks', '18'),
(6, 'new (11).png', 'Drink Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'drinks', '36'),
(7, 'cake (2).png', 'Cake Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'cakes', '50'),
(8, 'homeImage.png', 'Food Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'fastfood', '40'),
(11, 'new (16).png', 'Food Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'dessert', '59'),
(13, 'new (18).png', 'Food Name', 'This is food desccription template text by IsraTech, yuou can change it via BTN.', 'fastfood', '70'),
(14, 'aboutImage.png', 'Food name', 'This is the description demo for this item. It can be changed via an update BTN.', 'fastfood', '49'),
(15, 'klipartz.com (10).png', 'Food Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'localfood', '69'),
(16, 'new (2).png', 'Food Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'localfood', '38'),
(17, 'new (3).png', 'Food Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'localfood', '34'),
(18, 'cake (4).png', 'Cake Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'cakes', '60'),
(19, 'cake (6).png', 'Cake Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'cakes', '80'),
(20, 'cake (1).png', 'Cake name', 'This is the description demo for this item. It can be changed via an update BTN.', 'cakes', '47'),
(21, 'new (1).png', 'Dessert name', 'This is the description demo for this item. It can be changed via an update BTN.', 'dessert', '67'),
(22, 'new (15).png', 'Dessert', 'This is the description demo for this item. It can be changed via an update BTN.', 'dessert', '32'),
(23, 'new (13).png', 'Dessert Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'dessert', '68'),
(24, 'new (21).png', 'Dessert Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'dessert', '56'),
(25, 'popular (2).png', 'Food name', 'This is the description demo for this item. It can be changed via an update BTN.', 'localfood', '43'),
(26, 'popular (3).png', 'Fast Food', 'This is the description demo for this item. It can be changed via an update BTN.', 'fastfood', '67'),
(31, 'new (4).png', 'Food Name', 'This is the description demo for this item. It can be changed via an update BTN.', 'localfood', '34');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cart_ID` int(11) NOT NULL,
  `cust_fname` varchar(15) NOT NULL,
  `cust_sname` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `location` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `street` varchar(15) NOT NULL,
  `building` varchar(10) NOT NULL,
  `message` varchar(225) NOT NULL,
  `total_cost` varchar(10) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `updated_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_ID`, `cust_fname`, `cust_sname`, `contact`, `location`, `email`, `street`, `building`, `message`, `total_cost`, `order_status`, `payment`, `updated_by`, `updated_date`) VALUES
(24, 17, 'Isratech', 'Tech', '1234567890', 'London', 'isratech@ouitlook.com', 'willson', '34d', 'I need it hot', '188', 'delivered', 'C.O.D', 'isratech', '2023-01-16 12:20:17'),
(25, 18, 'Damon Ellison', 'Devin Stark', '38', 'Shefield', 'gikezi@mailinator.com', 'Nobis placeat e', 'Reprehende', 'Et magni quas quod v', '36', 'on the way', 'Dining', 'Admin', '2023-01-16 12:33:54'),
(26, 25, 'Isra', 'Tech', '12345678', 'Liverpool', 'isratech8@outlook.com', 'Quitonham', '34ffgt', 'Any message', '297', 'delivered', 'C.O.D', 'isratech', '2023-01-16 12:19:44'),
(27, 27, 'Bree Kelly', 'Alfonso Frankli', '87', 'Liverpool', 'wodubeni@mailinator.com', 'Deserunt velit ', 'Dolore fug', 'Sed qui laboriosam ', '160', 'canceled', 'C.O.D', 'w', '2023-02-01 05:33:44'),
(28, 34, 'Isra', 'tech', '12345', 'Liverpool', 'isratech@outlook.com', '123', '123', 'Food', '156', 'ordered', 'C.O.D', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviewer` varchar(50) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `date`) VALUES
(11, 'isratech8@outlook.com', '2023-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `tablereservations`
--

CREATE TABLE `tablereservations` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(50) NOT NULL,
  `people` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `message` varchar(255) NOT NULL,
  `expenses` varchar(100) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tablereservations`
--

INSERT INTO `tablereservations` (`id`, `guest_name`, `people`, `email`, `contact`, `time`, `date`, `message`, `expenses`, `updated_by`, `status`) VALUES
(4, 'Kenyon', 110, 'wukokyq@mailinator.com', '+1 (511) 466-8415', '06:16:00', '1977-08-24', 'Ea qui qui cupidatat', '300', 'isratech', 'checkedin'),
(5, 'Your Name', 2, 'name@outlook.com', '12345', '13:00:00', '2023-02-02', 'we are coming to dine at the restaurant', '1000', 'isratech', 'closed'),
(9, 'Patricia', 6, 'jimahycoq@mailinator.com', '+1 (266) 563-9536', '16:30:00', '2023-02-01', 'coming with my people', '300', 'John', 'canceled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablereservations`
--
ALTER TABLE `tablereservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `deliveryboys`
--
ALTER TABLE `deliveryboys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tablereservations`
--
ALTER TABLE `tablereservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
