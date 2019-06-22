-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 06:03 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Supper Admin' COMMENT 'Admin|Supper Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohaimen', 'mohaimen707@gmail.com', '$2y$10$.C8m/IBmdxM0/5VqUMYoGuvOEKgbGcep2/3zMz9ndY1Ip8EQMf9Eu', '01798659099', NULL, 'Supper Admin', 'OoboqQJGlgjtYRTmuFNFjUzxzs4czhSmriz1a08xsEoCHnJ2g7BsnUyAsIEB', NULL, '2019-03-25 14:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Samsung', 'samsung is the most popular brand in the world.', 'samsung.png', '2019-02-27 14:22:08', '2019-02-27 14:22:08'),
(3, 'LG', 'lg is the popular brand', '1551277597.jpg', '2019-02-27 08:26:37', '2019-02-27 08:26:37'),
(4, 'Apple', 'apple is the best brand', '1551278160.png', '2019-02-27 08:28:16', '2019-02-27 08:36:00'),
(5, 'Others', 'other brand', '1551503820.jpg', '2019-03-01 23:17:00', '2019-03-01 23:17:00'),
(6, 'Philips', NULL, '1551506510.jpg', '2019-03-02 00:01:50', '2019-03-02 00:01:50'),
(7, 'Coca cola', 'Coca cola', NULL, '2019-03-02 00:40:55', '2019-03-02 00:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(191) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(28, 1, 19, 5, '127.0.0.1', 2, '2019-03-19 01:25:52', '2019-03-27 13:54:05'),
(32, 12, NULL, 5, '127.0.0.1', 1, '2019-03-19 05:37:35', '2019-03-27 13:51:50'),
(34, 15, 19, 5, '127.0.0.1', 1, '2019-03-19 12:38:28', '2019-03-22 13:21:22'),
(35, 14, 19, 5, '127.0.0.1', 2, '2019-03-19 12:38:34', '2019-03-22 13:35:48'),
(36, 12, 19, 6, '127.0.0.1', 1, '2019-03-23 07:55:30', '2019-03-23 07:56:14'),
(37, 16, 19, 6, '127.0.0.1', 1, '2019-03-23 07:55:38', '2019-03-23 07:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(8, 'Accessorices', 'Samsung', '1550682686.png', NULL, '2019-02-20 11:11:26', '2019-03-02 12:35:28'),
(9, 'Headphone', 'Samsung Headphone', '1550683424.png', 8, '2019-02-20 11:23:44', '2019-02-20 11:23:44'),
(12, 'Earphone', 'Earphone v2.0', '1550684720.jpg', 8, '2019-02-20 11:45:20', '2019-02-22 09:50:27'),
(13, 'Fridge', 'FridgeFridge', '1550687341.jpg', 14, '2019-02-20 12:29:01', '2019-03-02 12:30:12'),
(14, 'Electronics', 'Air ConditionarAir Conditionar', '1550859428.jpg', NULL, '2019-02-20 12:29:25', '2019-02-27 03:45:15'),
(15, 'Samsung Smart Tv', 'Samsung Smart TvSamsung Smart Tv', '1550687407.jpeg', 8, '2019-02-20 12:30:07', '2019-02-20 12:30:08'),
(16, 'Watches', 'Watchesinc.', '1551260767.png', NULL, '2019-02-20 12:31:46', '2019-02-27 03:46:07'),
(17, 'Apple watch', 'aple aple', '1550687608.png', 16, '2019-02-20 12:33:28', '2019-02-20 12:33:28'),
(18, 'Mobile Phones', 'Mobile Phones', '1551260627.jpg', NULL, '2019-02-27 03:43:47', '2019-02-27 03:43:47'),
(19, 'Personal Care', 'Personal Care', '1551260677.jpg', NULL, '2019-02-27 03:44:37', '2019-02-27 03:44:38'),
(20, 'Fish', 'Fish', '1551261461.jpg', NULL, '2019-02-27 03:57:41', '2019-02-27 03:57:41'),
(21, 'Other', 'others', '1551506366.gif', NULL, '2019-03-01 23:54:43', '2019-03-01 23:59:26'),
(22, 'Loshon', NULL, NULL, 19, '2019-03-02 12:48:45', '2019-03-02 12:48:45'),
(23, 'test', 'sfdsadfa', '1552061099.png', NULL, '2019-03-08 10:04:59', '2019-03-08 10:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(3, 'Comilla', 1, '2019-03-06 01:31:52', '2019-03-06 01:49:18'),
(6, 'Mymensingh sadar', 9, '2019-03-06 07:53:29', '2019-03-06 07:53:29');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-03-05 02:31:59', '2019-03-05 02:50:23'),
(5, 'Khulna', 4, '2019-03-06 07:34:32', '2019-03-06 07:34:32'),
(6, 'Chittagong', 5, '2019-03-06 07:34:41', '2019-03-06 07:34:41'),
(7, 'Rajshahi', 6, '2019-03-06 07:34:56', '2019-03-06 07:34:56'),
(8, 'Barisal', 7, '2019-03-06 07:35:08', '2019-03-06 07:35:08'),
(9, 'Mymensingh', 2, '2019-03-06 07:53:06', '2019-03-06 07:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `featureds`
--

CREATE TABLE `featureds` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_17_101327_create_categories_table', 1),
(4, '2019_02_17_154744_create_brands_table', 1),
(5, '2019_02_17_154857_create_products_table', 1),
(7, '2019_02_17_155102_create_featureds_table', 1),
(8, '2019_02_18_065856_create_product_images_table', 1),
(11, '2014_10_12_000000_create_users_table', 2),
(12, '2019_03_05_073321_create_divisions_table', 3),
(13, '2019_03_05_073700_create_districts_table', 3),
(15, '2019_03_16_055002_create_carts_table', 4),
(16, '2019_03_20_064717_create_settings_table', 5),
(17, '2019_03_20_104406_create_payments_table', 6),
(18, '2019_03_16_054754_create_orders_table', 7),
(20, '2019_02_17_154956_create_admins_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_completed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_seen_by_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `name`, `phone_no`, `email`, `shipping_address`, `message`, `ip_address`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transaction_id`, `created_at`, `updated_at`) VALUES
(5, 19, 3, 'Abdul Mohaimen', '01798659099', 'mohaimen707@gmail.com', 'Dhanmondi', NULL, '127.0.0.1', '0', '0', '1', 'AXDT5DL6A', '2019-03-22 13:21:22', '2019-03-27 14:58:00'),
(6, 19, 2, 'Abdul Mohaimen', '01798659099', 'mohaimen707@gmail.com', 'Dhanmondi', NULL, '127.0.0.1', '0', '0', '1', 'gfhgfjhgfjhgfj', '2019-03-23 07:56:14', '2019-03-27 15:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In Delivery', 'Cash_in.jpg', 1, 'Cash_in', NULL, NULL, '2019-03-20 13:23:49', '2019-03-20 13:23:49'),
(2, 'Bkash', 'bkash.jpg', 2, 'Bkash', '017986590991', 'Personal', '2019-03-20 13:23:49', '2019-03-20 13:23:49'),
(3, 'Rocket', 'roket.jpg', 3, 'Roket', '017986590991', 'Personal', '2019-03-20 13:23:49', '2019-03-20 13:23:49'),
(5, 'Nexus Pay', 'nexuspay.jpg', 4, 'Nexuspay', NULL, NULL, '2019-03-21 06:00:17', '2019-03-21 06:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 21, 7, 'Coke 1L', 'A Coke® tastes the same no matter who you are, what you look like, what you believe, or who you love. And more than ever, we believe that', 'Coca-cola', 1, 110, 1, NULL, 1, '2019-02-17 18:00:00', '2019-02-17 18:00:00'),
(2, 8, 2, 'Samsung Galaxy', 'samsung Galaxy tastes the same no matter who you are, what you look like, what you believe, or who you love. And more than ever, we believe that', 'Samsung-Galaxy', 1, 10000, 1, NULL, 1, '2019-02-17 18:00:00', '2019-02-17 18:00:00'),
(5, 8, 2, 'Samsung Headphone', 'Razer Kraken 7.1 V2 - Digital Gaming Headset\r\n[ 1.00 EA ]', 'samsung-headphone', 2, 7500, 1, NULL, 1, '2019-02-19 01:57:55', '2019-02-19 01:57:55'),
(6, 8, 2, 'Samsung Headphone Lite', 'Baseus CAMTYW-01 Micro USB/Type C Data Cable CAMTYW-01', 'samsung-headphone-lite', 3, 5555, 1, NULL, 1, '2019-02-19 03:42:46', '2019-02-19 03:42:46'),
(7, 21, 5, 'Test post', 'Test post', 'test-post', 1, 2000, 0, NULL, 1, '2019-02-23 02:35:27', '2019-02-23 02:35:27'),
(8, 8, 2, 'Fridge', 'Samsung Fridge', 'fridge', 2, 50000, 1, NULL, 1, '2019-02-23 02:35:59', '2019-02-23 02:35:59'),
(9, 16, 4, 'Apple', 'Apple watch', 'apple', 4, 46000, 0, NULL, 1, '2019-02-23 02:36:51', '2019-02-23 02:50:28'),
(10, 9, 3, 'Headphone  v2.0', 'Headphone', 'headphone-v20', 3, 1200, 0, NULL, 1, '2019-02-23 02:37:24', '2019-02-23 02:37:24'),
(11, 13, 3, 'LG AC', 'LG ac', 'lg-ac', 1, 3000, 0, NULL, 1, '2019-02-23 02:38:36', '2019-02-23 02:38:36'),
(12, 17, 4, 'Apple watch series 4', 'Apple watch', 'apple-watch-series-4', 1, 500, 1, NULL, 1, '2019-02-23 02:49:21', '2019-02-23 02:49:55'),
(14, 14, 6, 'Mixer Grinder Philips HL7710', 'Auto cut off- Yes \r\nChutney Jar- 0.4 L \r\nMultipurpose Jar- 1 L \r\nSpeed setting- 4\r\nWet Jar- 1.5 L \r\nCord length- 1.2 m \r\nVoltage- 230 V ', 'mixer-grinder-philips-hl7710', 2, 6500, 0, NULL, 1, '2019-03-02 00:03:26', '2019-03-02 00:03:26'),
(15, 14, 5, 'DryIron NI-27AWT', 'Powerful 1000W \r\n    Non-Stick Coating Sole Plate\r\n    Deluxe Metal Cover \r\n    Big Thermostatic Pilot Lamp \r\n    Heat-Resistant Cotton Cord \r\n    Easy Operation 6 Temperature Settings\r\n', 'dryiron-ni-27awt', 3, 600, 0, NULL, 1, '2019-03-02 00:05:06', '2019-03-02 00:05:06'),
(16, 17, 4, 'Apple watch series 3', 'Apple watch 3 |white color', 'apple-watch-series-3', 4, 50000, 0, NULL, 1, '2019-03-02 11:15:07', '2019-03-02 11:15:07'),
(17, 20, 5, 'Fish', 'Fish', 'fish', 3, 4545, 0, NULL, 1, '2019-03-02 12:40:36', '2019-03-03 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1.png', '2019-02-17 18:00:00', '2019-02-17 18:00:00'),
(2, 2, '2.jpg', '2019-02-17 18:00:00', '2019-02-17 18:00:00'),
(3, 5, '1550563075.png', '2019-02-19 01:57:55', '2019-02-19 01:57:55'),
(4, 6, '1550569366.jpg', '2019-02-19 03:42:46', '2019-02-19 03:42:46'),
(5, 6, '1550569366.jpg', '2019-02-19 03:42:46', '2019-02-19 03:42:46'),
(6, 6, '1550569366.jpg', '2019-02-19 03:42:46', '2019-02-19 03:42:46'),
(8, 8, '1550570791.png', '2019-02-19 04:06:31', '2019-02-19 04:06:31'),
(9, 9, '1550571217.jpg', '2019-02-19 04:13:37', '2019-02-19 04:13:37'),
(10, 9, '1550571217.png', '2019-02-19 04:13:37', '2019-02-19 04:13:37'),
(11, 9, '1550571217.jpg', '2019-02-19 04:13:37', '2019-02-19 04:13:37'),
(12, 10, '1550581758.png', '2019-02-19 07:09:18', '2019-02-19 07:09:18'),
(13, 11, '1550589295.jpg', '2019-02-19 09:14:55', '2019-02-19 09:14:55'),
(14, 11, '1550589295.jpg', '2019-02-19 09:14:55', '2019-02-19 09:14:55'),
(15, 7, '1550910927.jpeg', '2019-02-23 02:35:28', '2019-02-23 02:35:28'),
(16, 8, '1550910959.jpg', '2019-02-23 02:35:59', '2019-02-23 02:35:59'),
(17, 9, '1550911011.png', '2019-02-23 02:36:51', '2019-02-23 02:36:51'),
(18, 10, '1550911044.png', '2019-02-23 02:37:24', '2019-02-23 02:37:24'),
(19, 11, '1550911116.jpg', '2019-02-23 02:38:36', '2019-02-23 02:38:36'),
(20, 12, '1550911761.png', '2019-02-23 02:49:21', '2019-02-23 02:49:21'),
(21, 13, '1551506237.gif', '2019-03-01 23:57:17', '2019-03-01 23:57:17'),
(22, 14, '1551506606.png', '2019-03-02 00:03:26', '2019-03-02 00:03:26'),
(23, 15, '1551506706.png', '2019-03-02 00:05:06', '2019-03-02 00:05:06'),
(24, 16, '1551546907.jpg', '2019-03-02 11:15:07', '2019-03-02 11:15:07'),
(25, 17, '1551552036.jpg', '2019-03-02 12:40:37', '2019-03-02 12:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'mohaimen707@gmail.com', '017986590989', 'Dhaka-1200, Dhaka', 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive|1=active',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `avatar`, `shipping_address`, `ip_address`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Abdul', 'Mohaimen', 'AbdulMohaimen', '01798659099', 'mohaimen707@gmail.com', '$2y$10$eMPGb/u5ZfSKNMlzOsGuWuMHLdSKot8/z.ekD2wZR3ssqDZa0bvDm', '59/2/A', 9, 6, 1, NULL, 'Dhanmondi', '127.0.0.1', NULL, '5WX7z1BnKfjBmyFdvEBJFDrj7bn7teHiU1ZtyMbKXnEYYYDB3wPibfXW8op0', '2019-03-11 09:49:58', '2019-03-15 14:18:09'),
(20, 'Abdul', 'Mosabbir', 'abdulmosabbir', '01558383483', 'masud@gmail.com', '$2y$10$EgLqFdbNzOaYwUF7cxxKZOHxOYjKauTkDLTVNnIvuTJ0V5u/Y80ui', 'Fulbaria, mymensingh', 9, 6, 1, NULL, NULL, '127.0.0.1', NULL, '15bTHuzKDwlZHWto7IbB91NcjEgN92KY7vLz85ZbZYXmbpgYs6kTp8q9jvoH', '2019-03-18 09:08:12', '2019-03-18 09:08:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featureds`
--
ALTER TABLE `featureds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `featureds`
--
ALTER TABLE `featureds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
