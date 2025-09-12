-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 07:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `description`, `image_url`, `link`, `created_at`, `updated_at`) VALUES
(4, 'The Pet Haven Journal	', 'The Pet Haven Journal provides expert pet care tips, product recommendations, and heartwarming stories to help pets thrive happily.', '67bd622838b576.46609136.jpg', '', '2025-02-25 06:24:40', '2025-02-25 06:24:40'),
(5, 'Furry Friends Corner', 'Furry Friends Corner offers pet care tips, product reviews, and heartwarming stories to keep your pets happy, healthy, and loved.', '67bd628d27b434.85600014.jpg', 'https://youtube.com/shorts/TDlYlvy2WAs?si=vy3JFl-VStq7zQlG', '2025-02-25 06:26:21', '2025-02-25 06:26:21'),
(6, 'Lorem ipsum dolor sit amet', 'Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam consetetur eirmod.', '67c5182d086728.55412577.jpg', '', '2025-03-03 02:47:09', '2025-03-03 02:47:09'),
(7, 'Est dolor lorem et ea', 'Diam dolor est labore duo invidunt ipsum clita et, sed et lorem voluptua tempor invidunt at est sanctus sanctus. Clita dolores sit kasd diam takimata justo diam lorem sed', '67c518878fa690.92623862.jpg', '', '2025-03-03 02:48:39', '2025-03-03 02:48:39'),
(8, 'Dolor sit magna rebum clita rebum dolor', 'Ipsum sed lorem amet dolor amet duo ipsum amet et dolore est stet tempor eos dolor', '67c518ebccd5c9.80869941.jpg', '', '2025-03-03 02:50:19', '2025-03-03 02:50:19'),
(9, 'Dolor sit magna rebum clita rebum dolor', 'Ipsum sed lorem amet dolor amet duo ipsum amet et dolore est stet tempor eos dolor', '67c51921979a09.36389952.jpg', '', '2025-03-03 02:51:13', '2025-03-03 02:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `inventory_id` int(30) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`, `status`, `date_created`) VALUES
(5, 'Food', '&lt;p&gt;Sample Description&lt;br&gt;&lt;/p&gt;', 1, '2024-02-07 09:07:36'),
(6, 'Accessories', '&lt;p&gt;Sample Category&lt;br&gt;&lt;/p&gt;', 1, '2024-02-07 09:08:36'),
(7, 'Pet Healthcare', 'Sample Category', 1, '2025-02-28 06:15:22'),
(17, 'Pet Training', 'Sample', 1, '2025-03-22 02:52:38');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(30) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `default_delivery_address` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `gender`, `contact`, `email`, `password`, `default_delivery_address`, `date_created`) VALUES
(20, 'solanki', 'Mehul', 'Male', '9512149013', 'smehul54321@gmail.com', '$2y$10$nJ23H47occ4qxRvHw6NxreTD8wUTzaQfDbnLh62A8hWuLUWhLtQbu', ' pipardi-2, palitana, Bhavnagr', '2025-03-04 20:36:56'),
(21, 'Solanki', 'Mehul', 'Male', '9512149013', 'admin@gmail.com', '817e0a5030593ab50fdae3af3c8679e1', 'Pipardi-2, palitana, bhavnagar', '2025-03-05 02:20:05'),
(22, 'vinu', 'mehul', 'Male', '9512149012', 'nikulp2485@gmail.com', '202cb962ac59075b964b07152d234b70', '', '2025-03-07 20:40:22'),
(23, 'solanki', 'Mehul', 'Male', '951249013', 'mehul@gmail.com', '202cb962ac59075b964b07152d234b70', '', '2025-03-11 00:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`, `created_at`) VALUES
(52, 'mehul', 'smehul54321@gmil.com', 'best', '2025-03-06 04:27:21'),
(53, 'Solanki mehul', 'smehul54321@gmil.com', 'Good', '2025-03-22 09:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` double NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `quantity`, `unit`, `price`, `size`, `date_created`, `date_updated`) VALUES
(1, 1, 50, 'pcs', 250, 'M', '2021-06-21 13:01:30', '2021-06-21 13:05:23'),
(2, 1, 20, 'Sample', 300, 'L', '2021-06-21 13:07:00', NULL),
(3, 4, 150, 'pcs', 500, 'M', '2021-06-21 16:50:37', NULL),
(4, 3, 50, 'pack', 150, 'M', '2021-06-21 16:51:12', NULL),
(5, 5, 30, 'pcs', 50, 'M', '2021-06-21 16:51:35', NULL),
(6, 4, 10, 'pcs', 550, 'L', '2021-06-21 16:51:54', NULL),
(7, 6, 100, 'pcs', 150, 'S', '2021-06-22 15:50:47', NULL),
(8, 6, 150, 'pcs', 180, 'M', '2021-06-22 15:51:13', NULL),
(9, 7, 20, 'pcs', 7000, 'S', '2024-01-08 09:08:30', NULL),
(10, 8, 300, 'pcs', 1000, 'S', '2024-01-10 09:19:11', NULL),
(11, 9, 300, 'pcs', 9000, 'M', '2024-01-29 09:27:06', NULL),
(12, 10, 500, 'pcs', 250, 'S', '2024-01-29 09:29:35', NULL),
(14, 11, 500, 'pcs', 7040, 'M', '2024-04-01 20:41:56', NULL),
(15, 12, 500, 'pcs', 199, 'S', '2024-04-01 20:43:09', NULL),
(16, 13, 500, 'pcs', 750, 'M', '2024-04-01 20:44:53', NULL),
(17, 14, 500, 'pcs', 650, 'M', '2024-04-01 20:50:09', NULL),
(18, 15, 500, 'pcs', 742, 'M', '2024-04-01 20:51:07', NULL),
(19, 16, 500, 'pcs', 180, 'M', '2024-04-01 20:52:41', NULL),
(20, 17, 500, 'pcs', 480, 'M', '2024-04-01 20:53:41', NULL),
(21, 18, 500, 'pcs', 100, 'S', '2024-04-01 20:54:32', NULL),
(22, 21, 500, 'pcs', 250, 'S', '2024-04-01 21:08:17', '2024-04-01 21:08:30'),
(23, 22, 500, 'pcs', 440, 'M', '2024-04-01 21:09:54', NULL),
(24, 23, 500, 'pcs', 1899, 'NONE', '2024-04-01 21:11:56', NULL),
(25, 24, 500, 'pcs', 1019, 'NONE', '2024-04-01 21:13:07', NULL),
(26, 25, 500, 'pcs', 1289, 'NONE', '2024-04-01 21:14:13', NULL),
(27, 26, 500, 'pcs', 259, 'NONE', '2024-04-01 21:15:49', NULL),
(28, 27, 500, 'pcs', 149, 'NONE', '2024-04-01 21:18:40', NULL),
(29, 28, 500, 'pcs', 299, 'M', '2024-04-01 21:20:14', NULL),
(30, 29, 500, 'pcs', 399, 'M', '2024-04-01 21:21:39', NULL),
(31, 30, 500, 'pcs', 185, 'M', '2024-04-01 21:24:05', NULL),
(32, 31, 500, 'pcs', 500, 'M', '2024-04-01 21:25:16', NULL),
(33, 32, 500, 'pcs', 200, 'S', '2024-04-01 21:26:15', NULL),
(34, 33, 500, 'pcs', 200, 'L', '2024-04-01 21:27:54', NULL),
(35, 34, 500, 'pcs', 185, 'M', '2024-04-01 21:29:15', NULL),
(36, 35, 500, 'pcs', 235, 'M', '2024-04-01 21:30:39', NULL),
(37, 36, 500, 'pcs', 199, 'S', '2024-04-01 21:32:06', NULL),
(38, 37, 500, 'pcs', 199, 'M', '2024-04-01 21:33:28', NULL),
(39, 38, 500, 'pcs', 350, 'NONE', '2024-04-01 21:50:24', NULL),
(40, 39, 500, 'pcs', 600, 'NONE', '2024-04-01 21:51:19', NULL),
(41, 40, 550, 'pcs', 450, 'M', '2024-04-01 21:53:15', NULL),
(42, 41, 500, 'pcs', 500, 'M', '2024-04-01 21:54:15', NULL),
(43, 42, 500, '500', 799, 'M', '2024-04-01 21:55:42', NULL),
(44, 43, 500, 'pcs', 160, 'M', '2024-04-01 21:57:06', NULL),
(45, 44, 500, 'pcs', 1999, 'L', '2024-04-01 21:58:45', NULL),
(46, 45, 500, 'pcs', 1111, 'M', '2024-04-01 21:59:49', NULL),
(47, 29, 25, 'pcs', 2050, 'XS', '2025-02-18 01:07:29', NULL),
(48, 46, 2, 'mnb', 500, 'XS', '2025-02-18 01:08:17', NULL),
(49, 47, 45, 'pcs', 299, 'NONE', '2025-02-18 01:30:59', NULL),
(50, 52, 2, 'pcs', 299, 'NONE', '2025-02-22 21:02:30', NULL),
(51, 53, 1, 'pcs', 145, 'NONE', '2025-02-22 21:18:10', NULL),
(52, 54, 1, 'pcs', 249, 'NONE', '2025-02-22 21:24:03', NULL),
(53, 55, 1, 'pcs', 149, 'NONE', '2025-02-22 21:27:53', NULL),
(54, 56, 1, 'pcs', 218, 'NONE', '2025-02-22 21:34:22', NULL),
(55, 57, 1, 'mnb', 167, 'NONE', '2025-02-22 21:39:06', NULL),
(56, 58, 2, 'pcs', 279, 'NONE', '2025-02-22 21:45:07', NULL),
(58, 61, 500, 'mnb', 101, 'XS', '2025-03-01 01:33:20', NULL),
(59, 62, 100, 'pcs', 241, 'NONE', '2025-03-01 20:09:29', NULL),
(60, 63, 100, 'pcs', 280, 'NONE', '2025-03-01 20:33:25', NULL),
(61, 64, 100, 'pcs', 199, 'NONE', '2025-03-01 20:51:29', NULL),
(62, 65, 100, 'pcs', 525, 'NONE', '2025-03-01 21:04:12', NULL),
(63, 66, 100, 'mnb', 256, 'NONE', '2025-03-01 21:31:02', NULL),
(64, 67, 100, 'mnb', 217, 'NONE', '2025-03-01 21:39:26', NULL),
(65, 68, 100, 'pcs', 283, 'NONE', '2025-03-01 21:44:35', NULL),
(66, 69, 100, 'pcs', 138, 'NONE', '2025-03-01 21:49:53', NULL),
(67, 70, 100, 'pcs', 176, 'NONE', '2025-03-01 21:55:38', NULL),
(68, 71, 100, 'pcs', 300, 'NONE', '2025-03-01 22:00:23', NULL),
(69, 72, 100, 'pcs', 183, 'NONE', '2025-03-01 22:04:14', NULL),
(70, 73, 100, 'pcs', 269, 'NONE', '2025-03-01 22:07:55', NULL),
(71, 74, 100, 'pcs', 577, 'NONE', '2025-03-01 22:14:57', NULL),
(72, 75, 100, 'pcs', 184, 'NONE', '2025-03-01 22:21:07', NULL),
(73, 76, 100, 'mnb', 300, 'NONE', '2025-03-01 22:25:44', NULL),
(74, 77, 100, 'mnb', 189, 'NONE', '2025-03-01 22:28:55', NULL),
(75, 78, 100, 'mnb', 165, 'NONE', '2025-03-01 22:32:06', NULL),
(76, 79, 100, 'mnb', 249, 'NONE', '2025-03-01 22:36:52', NULL),
(77, 80, 202, 'mnb', 699, 'NONE', '2025-03-01 22:39:28', '2025-03-16 10:13:34'),
(78, 81, 100, 'pcs', 876, 'NONE', '2025-03-01 22:46:46', NULL),
(79, 82, 100, 'mnb', 188, 'M', '2025-03-01 22:53:32', NULL),
(80, 83, 100, 'mnb', 486, 'S', '2025-03-01 22:56:54', NULL),
(81, 84, 100, 'mnb', 833, 'L', '2025-03-01 22:59:34', NULL),
(82, 85, 100, 'pcs', 253, 'L', '2025-03-01 23:02:31', NULL),
(83, 86, 100, 'mnb', 753, 'NONE', '2025-03-01 23:07:38', NULL),
(84, 87, 100, 'mnb', 439, 'NONE', '2025-03-01 23:10:18', NULL),
(85, 88, 100, 'mnb', 184, 'NONE', '2025-03-01 23:15:06', NULL),
(86, 89, 100, 'pcs', 990, 'NONE', '2025-03-01 23:17:20', NULL),
(87, 90, 100, 'mnb', 2589, 'NONE', '2025-03-01 23:23:08', NULL),
(88, 91, 100, 'pcs', 248, 'NONE', '2025-03-01 23:27:20', NULL),
(89, 92, 100, 'pcs', 212, 'NONE', '2025-03-01 23:30:43', NULL),
(90, 93, 100, 'mnb', 300, 'NONE', '2025-03-01 23:34:06', NULL),
(91, 94, 100, 'pcs', 206, 'NONE', '2025-03-01 23:54:36', NULL),
(92, 95, 0, 'mnb', 196, 'NONE', '2025-03-02 00:00:09', '2025-03-03 06:11:12'),
(93, 96, 100, 'pcs', 217, 'NONE', '2025-03-02 00:21:12', NULL),
(94, 97, 100, 'pcs', 248, 'NONE', '2025-03-02 00:25:38', NULL),
(95, 98, 100, 'pcs', 998, 'NONE', '2025-03-02 00:33:06', NULL),
(96, 99, 100, 'pcs', 144, 'NONE', '2025-03-02 00:38:15', NULL),
(97, 100, 100, 'pcs', 205, 'NONE', '2025-03-02 00:43:15', NULL),
(98, 101, 100, 'pcs', 239, 'NONE', '2025-03-02 00:48:05', NULL),
(99, 102, 100, 'mnb', 169, 'NONE', '2025-03-02 00:59:05', NULL),
(100, 103, 100, 'mnb', 1441, 'XL', '2025-03-02 01:13:25', NULL),
(101, 104, 0, 'pcs', 293, 'NONE', '2025-03-02 02:24:06', '2025-03-12 06:07:05'),
(103, 108, 0, 'pcs', 300, 'L', '2025-03-07 02:01:04', NULL),
(104, 109, 100, 'pcs', 250, 'NONE', '2025-03-22 03:14:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `delivery_address` text NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `delivery_address`, `payment_method`, `amount`, `status`, `paid`, `date_created`, `date_updated`) VALUES
(120, 23, 'palitana 1', 'cod', 241, 3, 1, '2025-03-12 04:47:36', '2025-03-15 23:33:43'),
(141, 23, 'koo3mfi4fi45g5g', 'cod', 525, 0, 0, '2025-03-16 10:04:07', NULL),
(143, 23, 'buiin uinini', 'cod', 1996, 5, 0, '2025-03-16 10:08:37', '2025-03-22 00:42:27'),
(144, 23, 'jiio j;ioini', 'cod', 717, 3, 0, '2025-03-16 10:10:18', '2025-03-22 03:38:12'),
(145, 23, 'uib ijiln ioj', 'cod', 990, 1, 1, '2025-03-16 10:15:09', '2025-03-22 03:36:27'),
(146, 23, 'Palitana Bhavnagar', 'cod', 199, 2, 0, '2025-03-22 00:35:05', '2025-03-22 03:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `size` varchar(20) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `order_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `size`, `unit`, `quantity`, `price`, `total`, `order_status`) VALUES
(49, 120, 62, 'NONE', 'pcs', 1, 241, 241, NULL),
(54, 126, 0, '', '', 4, 0, 0, NULL),
(63, 141, 65, 'NONE', 'pcs', 1, 525, 525, NULL),
(65, 143, 98, 'NONE', 'pcs', 2, 998, 1996, NULL),
(66, 144, 101, 'NONE', 'pcs', 3, 239, 717, NULL),
(67, 145, 89, 'NONE', 'pcs', 1, 990, 990, NULL),
(68, 146, 64, 'NONE', 'pcs', 1, 199, 199, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `sub_category_id` int(30) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `description`, `status`, `date_created`) VALUES
(62, 5, 8, 'Drools Real Chicken ', 'Drools Real Chicken and Egg 1.2 kg Dry Adult Dog Food', 1, '2025-03-01 20:08:35'),
(63, 5, 8, 'Purple tail Combo', 'purple tail Combo Offer - Dog Real Chicken Biscuits -910Grams (Chicken Flavour) Chicken 0.91 kg (2x0.46 kg) Dry Adult, New Born, Senior, Young Dog Food', 1, '2025-03-01 20:32:31'),
(64, 5, 8, 'Purepet Real Biscuit', 'purepet Real Biscuit Chicken Dog Chew  (0.455 kg, Pack of 1)', 1, '2025-03-01 20:50:54'),
(65, 5, 8, 'Drools Chunks', 'Drools Chunks in gravy for Adult - Chicken Liver and Real Chicken 2.25 kg (15x0.15 kg) Wet Adult Dog Food', 1, '2025-03-01 21:03:10'),
(66, 5, 9, 'Kitekat', 'Kitekat (2-12 Months) Fish 1 kg Dry Young Cat Food', 1, '2025-03-01 21:30:32'),
(67, 5, 9, 'GOOD CAT', 'GOOD CAT Real Chicken &amp; Ocean Fish Cat Food Gently Oven Baked Kibbles Chicken, Fish 0.3 kg Dry Adult, Young, Senior, New Born Cat Food', 1, '2025-03-01 21:38:51'),
(68, 5, 9, 'Hachi Wilson Cat Food ', 'Hachi wilson Cat Food Grain Free, High-Protein Supports Healthy Muscle Development Fish 1 kg Dry Adult Cat Food', 1, '2025-03-01 21:44:08'),
(69, 5, 9, 'Temptation', 'Temptation Savoury Salmon Cat Treat Salmon 0.085 kg Dry Adult Cat Food', 1, '2025-03-01 21:49:19'),
(70, 5, 10, 'Hallofeed  Food', 'Hallofeed BIRD FOOD 500 gm (Sunflower seed) for Budgies , Parrots 0.5 kg Dry Adult, Senior, Young Bird Food\r\n', 1, '2025-03-01 21:54:34'),
(71, 5, 10, 'Petslife Hand', 'Petslife Hand Feeding 0.25 kg Dry New Born Bird Food', 1, '2025-03-01 21:59:39'),
(72, 5, 10, 'Hallofeed Hand Feeding Formula', 'Hallofeed Hand Feeding Formula for Baby Bird Food-200gm 0.2 kg Dry New Born Bird Food', 1, '2025-03-01 22:03:46'),
(73, 5, 10, 'STAR FARMS Star', 'STAR FARMS Star Farms Hand Feeding For Baby Bird By Jhenver 0.25 kg Dry Adult, New Born, Senior, Young Bird Food', 1, '2025-03-01 22:07:21'),
(74, 5, 11, 'Optimum', 'TUNAI Optimum(original) Fish Food Highly Digestible Nutritious Fish Food Shrimp 1 kg Dry New Born, Adult, Senior, Young Fish Food', 1, '2025-03-01 22:14:27'),
(75, 5, 11, 'AQUATIC', 'AQUATIC REMEDIES Wild Paracidol for Fish Internal Care Only Pet Health Supplements  (120 ml)', 1, '2025-03-01 22:20:38'),
(76, 5, 11, 'BOLTZ Freeze Dried Blood Worms', 'BOLTZ Freeze Dried Blood Worms Fish Food 25 Grams 0.025 kg Dry Adult Fish Food', 1, '2025-03-01 22:25:09'),
(77, 5, 11, 'TUNAI Fish Food', 'TUNAI Fish Food for Aquarium with 26% Protien Daily Nutrition Pellet for Health&amp;Growth Shrimp 0.25 kg Dry Adult, New Born, Senior, Young Fish Food', 1, '2025-03-01 22:28:30'),
(78, 6, 12, 'WAGGY TAILS Dog Toys', 'WAGGY TAILS Dog Toys + Chew Toys + Puppy Toys + Rope Dog Toy + Toys for Small to Medium Dogs Cotton Chew Toy, Training Aid For Dog', 1, '2025-03-01 22:31:13'),
(79, 6, 12, 'TAILY TAILS 2 Pcs', '\r\nShare\r\nTAILY TAILS 2 Pcs Catnip Mice Toys for Kittens &amp; Cats - Soft Plush Toy Mouse with Catnip Silk Chew Toy, Plush Toy, Soft Toy For Cat', 1, '2025-03-01 22:36:21'),
(80, 6, 12, 'TAILY TAILS Catnip', 'TAILY TAILS Catnip Plush Toys for Cats &amp; Kittens - Fish-Shaped Catnip Toy with Bell -Pillow Cotton Chew Toy, Plush Toy, Soft Toy, Squeaky Toy For Cat', 1, '2025-03-01 22:39:00'),
(81, 6, 12, 'TAILY TAILS Dog Toy', 'TAILY TAILS Dog Toy with Sound - Plush Chew &amp; Rope Toy for Dogs - Squeaker &amp; Crinkle Toy Cotton Chew Toy, Plush Toy, Squeaky Toy, Tug Toy, Soft Toy For Dog &amp; Cat', 1, '2025-03-01 22:46:09'),
(82, 6, 17, 'ALCAZAR Dog Neck Belt', 'ALCAZAR Dog Neck Belt Comfy Soft Fur Padded Collar (M, Recommended for 14-23KG Pet) Dog Everyday Collar  (Medium, Brown)', 1, '2025-03-01 22:51:54'),
(83, 6, 17, 'Regiis', 'Regiis Medium Size Dog Brass Chain Dog Choke Chain Collar  (Medium, Golden)', 1, '2025-03-01 22:56:18'),
(84, 6, 17, 'PATPAT Heavy Duty', 'PATPAT Heavy Duty Tactical Nylon Dog Collar with Handle Quick Release for Large Breeds Dog Everyday Collar  (Extra Large, Khaki)', 1, '2025-03-01 22:59:03'),
(85, 6, 17, 'Bark Baskets Dog', 'Bark Baskets Dog Everyday Collar  (Large, Cosmic Canine)', 1, '2025-03-01 23:01:24'),
(86, 7, 16, 'REFIT Vitamin H for Cow', 'REFIT Vitamin H for Cow, Buffalo, Birds, Cattle &amp; Poultry Multivitamins H, E, A &amp; D3 Pet Health Supplements  (1 L)', 1, '2025-03-01 23:07:07'),
(87, 7, 16, 'Furlicks', 'Furlicks Multivitamin Dogs &amp; Cats Vitamins for Heart, Growth &amp; Development Oral Strips Pet Health Supplements  (30 Pieces)', 1, '2025-03-01 23:09:45'),
(88, 7, 16, 'Hallofeed Multi-Vita', 'Hallofeed Multi-Vita Multivitamin Formula Pet Health Supplements  (30 mg)', 1, '2025-03-01 23:14:28'),
(89, 7, 16, 'Beaphar HD Tablet Dog ', 'Beaphar HD Tablet Dog Joint Supplement for Hip Dysplasia &amp; Joint Problems Pet Health Supplements  (60 Pieces)', 1, '2025-03-01 23:16:49'),
(90, 6, 18, 'FLEXI New Classic Red', 'FLEXI New Classic Red Tape 5m 500 cm Dog Strap Leash  (Red)', 1, '2025-03-01 23:22:26'),
(91, 6, 18, 'MILLIONS JOY Dog Leash', 'MILLIONS JOY Dog Leash Heavy Duty Rope Leashes training For all Dangerous Dogs 16mm (6 Feet) 182 cm Dog Cord Leash  (Red)', 1, '2025-03-01 23:26:40'),
(92, 6, 18, 'METPET DGL-1ORN ', 'METPET DGL-1ORN 150 cm Dog Strap Leash  (Orange)', 1, '2025-03-01 23:30:03'),
(93, 6, 18, 'YOUHAVEDEAL Dog Training Leash,', 'YOUHAVEDEAL Dog Training Leash, Dog Plain Leash with Strong Hook, 12 MM 150 cm Dog Strap Leash  (Multicolor)', 1, '2025-03-01 23:33:22'),
(94, 7, 14, 'ROMSAY Anti-Tick and Flea Shampoo', 'ROMSAY Anti-Tick and Flea Shampoo + Pet Bathing, Massaging, Body Scrub, Shower Brush Allergy Relief, Anti-fungal, Anti-dandruff, Anti-microbial, Flea and Tick, Hypoallergenic Neem Dog Shampoo  (200 ml)', 1, '2025-03-01 23:54:04'),
(95, 7, 14, 'Himalaya Herbals Erina EP', 'Himalaya Herbals Erina EP Shampoo | Improves Skin Health &amp; Odor | Controls Ticks &amp; Fleas Flea and Tick Neem and Eucalyptus Dog, Cat Shampoo  (200 ml)', 1, '2025-03-01 23:59:30'),
(96, 7, 14, 'PETSWARE', 'PETSWARE 5 in 1 Rose Cat Shampoo with Conditioner for Persian Cat &amp; All Cat Types Anti-fungal, Anti-Bacterial, Conditioning, Flea and Tick, Whitening and Color Enhancing ROSE Cat Shampoo  (200 ml)', 1, '2025-03-02 00:20:42'),
(97, 7, 14, 'Pet Life Anti Ticks & Lice Neem Dog Shampoo', 'Pet Life Anti Ticks &amp; Lice Neem Dog Shampoo 60ml + Dog Hair Toner Spray 60ml Flea and Tick, Anti-fungal, Anti-itching Fresh Fragrance, Control Hair Fall, All Dog Breed Dog Shampoo  (120 ml)', 1, '2025-03-02 00:25:05'),
(98, 7, 15, 'Fur Ball Story', 'Fur Ball Story Jump-O-Joint Oil Spray 100ml &amp; Joint Pain Relief Tablet (60 Tablets) Pet Health Supplements  (100 ml)', 1, '2025-03-02 00:32:12'),
(99, 7, 15, 'WORMIPRESS', 'WORMIPRESS Herbal Deworming Liquid Pet Health Supplements  (30 mg)', 1, '2025-03-02 00:37:45'),
(100, 7, 15, 'Drools Vitamin Tablet', 'Drools Vitamin Tablet - 50 Pieces Pet Health Supplements  (200 g)', 1, '2025-03-02 00:42:46'),
(101, 7, 15, 'PETHEEDS Omega ', 'PETHEEDS Omega 3+6+9 Syrup Sardine Fish Oil for Shiny Healthy Skin &amp; Coat for Dogs &amp; Cats Pet Health Supplements  (200 ml)', 1, '2025-03-02 00:47:30'),
(102, 6, 19, 'THE DDS STORE', 'THE DDS STORE 2 Pcs Adjustable Cat Collar with Bowtie and Bell, Polka Dot Pattern Bell Dog &amp; Cat Collar Charm  (Multicolor, Ball)', 1, '2025-03-02 00:58:28'),
(103, 6, 19, 'Barks & Wags Dress for Dog ', 'Barks &amp; Wags Dress for Dog  (Red)', 1, '2025-03-02 01:12:53'),
(104, 6, 12, 'MS PET HOUSE ', 'MS PET HOUSE 6 Knots Cotton Rope Dog Chew Toy for Medium to Adult Dogs 36 Inch Long 20 MM Cotton Chew Toy For Dog', 1, '2025-03-02 02:23:31'),
(109, 7, 15, 'RRK', 'RRK-Min', 1, '2025-03-22 03:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `total_amount`, `date_created`) VALUES
(48, 120, 241, '2025-03-12 04:47:36'),
(55, 141, 525, '2025-03-16 10:04:07'),
(57, 143, 1996, '2025-03-16 10:08:37'),
(58, 144, 717, '2025-03-16 10:10:18'),
(59, 145, 990, '2025-03-16 10:15:09'),
(60, 146, 199, '2025-03-22 00:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(30) NOT NULL,
  `size` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'xs'),
(2, 's'),
(3, 'm'),
(4, 'l'),
(5, 'xl'),
(6, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(30) NOT NULL,
  `parent_id` int(30) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `parent_id`, `sub_category`, `description`, `status`, `date_created`) VALUES
(1, 1, 'Dog Food', '&lt;p&gt;Sample only&lt;/p&gt;', 1, '2021-06-21 10:58:32'),
(3, 1, 'Cat Food', '&lt;p&gt;Sample&lt;/p&gt;', 1, '2021-06-21 16:34:59'),
(4, 4, 'Dog Needs', '&lt;p&gt;Sample&amp;nbsp;&lt;/p&gt;', 1, '2021-06-21 16:35:26'),
(5, 4, 'Cat Needs', '&lt;p&gt;Sample&lt;/p&gt;', 1, '2021-06-21 16:35:36'),
(6, 1, 'bird food', '', 1, '2024-01-10 09:17:01'),
(8, 5, 'DOG', '&lt;p&gt;FG&lt;/p&gt;', 1, '2024-02-07 09:11:22'),
(9, 5, 'Cat', '', 1, '2024-04-01 20:26:29'),
(10, 5, 'Bird', '', 1, '2024-04-01 20:28:23'),
(11, 5, 'Fish', '', 1, '2024-04-01 20:28:41'),
(12, 6, 'Pet Toys', '', 1, '2024-04-01 20:31:30'),
(13, 6, 'All Accessories', '', 1, '2024-04-01 20:31:51'),
(14, 7, 'Flea & Tick Control', '', 1, '2025-02-28 06:16:34'),
(15, 7, 'Pet Supplements', '', 1, '2025-02-28 06:17:13'),
(16, 7, 'Vitamins & Minerals', '', 1, '2025-02-28 06:17:36'),
(17, 6, 'Dog Collars', '', 1, '2025-02-28 06:20:34'),
(18, 6, 'Training Leashes', '', 1, '2025-02-28 06:21:10'),
(19, 6, 'Fashion', '', 1, '2025-03-02 00:52:53'),
(20, 17, 'Training Pads', 'Sample', 1, '2025-03-22 03:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Pet Store Food and Accessories Shop'),
(6, 'short_name', 'Pet Needs'),
(11, 'logo', 'uploads/1742642580_animals.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1742642580_Hader.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`, `email`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '5b3c211ef7515272efa1d395b3aa0d15', 'uploads/1739257920_1707193260_kitu.jpg', NULL, 1, '2021-01-20 14:02:37', '2025-02-26 22:44:30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
