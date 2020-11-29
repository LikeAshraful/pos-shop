-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2020 at 12:25 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `code`, `updated_at`, `created_at`, `created_by`, `updated_by`, `status`, `description`) VALUES
(14, 'Walton', 'walton', '2020-11-24 03:18:59', '2020-11-24 03:18:15', 2, 2, 'active', 'Description'),
(15, 'Pran', 'pran', '2020-11-24 03:19:32', '2020-11-24 03:19:32', 2, NULL, 'active', 'Pran'),
(16, 'Fresh', 'fresh', '2020-11-24 03:20:09', '2020-11-24 03:19:55', 2, 2, 'active', 'Fresh Company'),
(17, 'Beximco Pharma', 'beximco-pharma', '2020-11-24 03:21:33', '2020-11-24 03:21:33', 2, NULL, 'active', 'Beximco Pharma');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`, `code`) VALUES
(16, 'Medicine', '2020-11-24 03:07:40', '2020-11-24 03:07:40', 2, NULL, 'active', 'medicine'),
(17, 'Refrigerator', '2020-11-24 03:27:19', '2020-11-24 03:27:19', 2, NULL, 'active', 'refrigerator');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `code`, `country_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'DHK', 1, 'active', NULL, NULL, '2020-11-16 23:55:37', '2020-11-17 05:22:48'),
(6, 'Rajshahi', 'RAJ', 1, 'active', NULL, NULL, '2020-11-17 05:24:53', '2020-11-17 05:24:53'),
(7, 'Khulna', 'KHL', 1, 'active', NULL, NULL, '2020-11-17 05:25:19', '2020-11-17 05:25:19'),
(8, 'Sylhet', 'SYL', 1, 'active', NULL, NULL, '2020-11-17 05:25:33', '2020-11-17 05:25:33'),
(9, 'Rangpur', 'RAN', 1, 'active', NULL, NULL, '2020-11-17 05:25:46', '2020-11-17 05:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'BD', 1, '2020-11-05 10:10:40', '2020-11-03 06:46:29'),
(3, 'INDIA', 'IND', 0, '2020-11-18 06:02:25', '2020-11-18 06:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `created_by`, `updated_by`, `email`, `mobile_no`, `address`, `updated_at`, `created_at`) VALUES
(1, 'Muhammad Hanna Ali', 2, NULL, 'abc@gmail.com', '+8801744894453', 'Mojud Bashtoli, Kaliakair, Gazipur', '2020-11-24 03:14:34', '2020-11-24 03:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_16_141813_create_countries_table', 1),
(4, '2020_11_16_142055_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `name_bn`, `status`, `updated_at`, `created_at`) VALUES
(4, 'Hurchan Evo Spyder', 'Hurchan Evo Spyder', 'active', '2020-11-19 05:14:43', '2020-11-19 04:20:12'),
(5, 'Audi R8', 'অডি R8', 'active', '2020-11-23 00:47:46', '2020-11-23 00:47:46'),
(6, 'Astron Martin DB9', 'এস্টন মার্টিন ডিবি ৯', 'active', '2020-11-23 00:48:41', '2020-11-23 00:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(200) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(200) UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `quantity` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `supplier_id`, `unit_id`, `sub_category_id`, `quantity`, `status`) VALUES
(69, 16, 17, 'Napa 500', 'Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac rutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus rhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis hendrerit mi a sollicitudin. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ullamcorper libero sed ante auctor vel gravida nunc placerat. Suspendisse molestie posuere sem, in viverra dolor venenatis sit amet. Aliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada massa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies vitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis dui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in vulputate non, tristique eu mi. Aliquam tristique dapibus tempor. Vivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis bibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum porta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis nec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing purus vehicula.', NULL, 2, '2020-11-23 01:13:38', '2020-11-28 01:02:41', 2, 2, 1, 1500, 0),
(70, 16, 17, 'Cough Syrup', 'Cough Syrup', 2, 2, '2020-11-24 04:38:08', '2020-11-28 01:02:33', 2, 2, 3, 1200, 0),
(74, 16, 17, 'Cefril', 'sdfds', 2, 2, '2020-11-24 09:30:05', '2020-11-28 01:02:30', 1, 2, 2, 1200, 0),
(75, 17, 17, 'Amethyst', 'Description', 2, NULL, '2020-11-28 05:25:39', '2020-11-28 05:25:39', 1, 1, 3, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` int(200) DEFAULT NULL,
  `relative_path` varchar(200) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `product_id`, `relative_path`, `updated_at`, `created_at`) VALUES
(3, 'prod_21112020_5fb8a2b485339.jpg', 53, '/image/', '2020-11-20 23:16:36', '2020-11-20 23:16:36'),
(12, 'prod_21112020_5fb8b679ded20.png', 65, '/image/', '2020-11-21 00:40:57', '2020-11-21 00:40:57'),
(13, 'prod_21112020_5fb8b6a03f329.png', 66, '/image/', '2020-11-21 00:41:36', '2020-11-21 00:41:36'),
(14, 'prod_21112020_5fb8b6f81d27a.png', 63, '/image/', '2020-11-21 00:43:04', '2020-11-21 00:43:04'),
(16, 'prod_21112020_5fb8b75068ae5.jpg', 52, '/image/', '2020-11-21 00:44:32', '2020-11-21 00:44:32'),
(17, 'prod_21112020_5fb8de92f0336.jpg', 64, '/image/', '2020-11-21 03:32:02', '2020-11-21 03:32:02'),
(18, 'prod_23112020_5fbb5f5d4b410.jpg', 68, '/image/', '2020-11-23 01:06:05', '2020-11-23 01:06:05'),
(19, 'prod_23112020_5fbb612270bd9.jpg', 69, '/image/', '2020-11-23 01:13:38', '2020-11-23 01:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `buying_qty` double NOT NULL,
  `buying_price` double NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = Pending, 1 = Approved',
  `date` date NOT NULL,
  `purchase_no` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `category_id`, `sub_category_id`, `brand_id`, `supplier_id`, `buying_qty`, `buying_price`, `description`, `status`, `date`, `purchase_no`, `created_by`, `updated_at`, `created_at`, `product_id`, `unit_id`) VALUES
(11, 16, 0, 17, 2, 100, 110, 'Cefril', 1, '2020-11-27', 989, 2, '2020-11-27 01:14:10', '2020-11-27 01:14:10', 70, 2),
(12, 16, 0, 17, 2, 200, 350, 'Cefril', 1, '2020-11-27', 989, 2, '2020-11-27 01:14:10', '2020-11-27 01:14:10', 70, 2),
(15, 16, 0, 17, 2, 300, 7750, 'Iron Rod', 1, '2020-11-27', 7789, 2, '2020-11-27 01:17:00', '2020-11-27 01:17:00', 70, 1),
(17, 16, 1, 17, 2, 400, 51, 'Cefril', 1, '2020-11-27', 545, 2, '2020-11-27 01:29:55', '2020-11-27 01:29:55', 69, 2),
(92, 16, 3, 17, 2, 500, 50000, 'Aliquam vel egestas turpis.', 1, '2020-11-28', 9898, 2, '2020-11-28 00:10:15', '2020-11-28 00:10:15', 70, 2),
(93, 16, 2, 17, 2, 600, 5000, 'test', 1, '2020-11-28', 1001, 2, '2020-11-28 00:13:00', '2020-11-28 00:13:00', 74, 2),
(94, 16, 1, 17, 2, 700, 12500, 'test', 1, '2020-11-12', 1001, 2, '2020-11-28 00:13:00', '2020-11-28 00:13:00', 69, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`) VALUES
(1, 'Admin', 'admin'),
(2, 'User', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `brand_id`, `slug`, `created_by`, `updated_at`, `created_at`, `status`, `updated_by`) VALUES
(1, 'Tablets', 16, 17, 'Tablets', 2, '2020-11-24 03:26:33', '2020-11-24 03:26:33', 'active', NULL),
(2, 'Home', 17, 14, 'Home', 2, '2020-11-24 03:37:40', '2020-11-24 03:28:05', 'active', 2),
(3, 'Syrup', 16, 17, 'Syrup', 2, '2020-11-24 04:41:08', '2020-11-24 04:41:08', 'active', NULL),
(4, 'Syrup2', 16, 17, 'Syrup', 2, '2020-11-24 04:41:08', '2020-11-24 04:41:08', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `mobile_no`, `email`, `address`, `status`, `created_by`, `updated_by`, `updated_at`, `created_at`) VALUES
(1, 'Imam Enterprise', '01531261214', 'imam@gmail.com', 'Mojud Bashtoli, Kaliakair, Gazipur', 'active', 2, NULL, '2020-11-24 03:03:14', '2020-11-24 03:03:14'),
(2, 'Salim Enter Prise', '+8801744894452', 'salim@gmail.com', 'Mojud Bashtoli, Kaliakair, Gazipur', 'active', 2, NULL, '2020-11-24 03:20:47', '2020-11-24 03:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 'Inch', 'active', 2, '2020-11-24 03:33:39', '2020-11-24 03:33:39'),
(2, 'PCS', 'active', 2, '2020-11-24 03:44:10', '2020-11-24 03:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` int(100) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mobile`, `address`, `gender`) VALUES
(2, 1, 'Admin Name', 'admin', 'mdhannan.info@gmail.com', NULL, '$2y$10$zPwtcs1kHTP/00JaoUfnuuHZahU8H9HH6/j8ia1mPomqiTR0tIn1a', NULL, NULL, '2020-11-28 05:29:03', 1744894452, 'Banani, Dhaka, Bangladesh', 'Male'),
(3, 2, 'Author Name', 'author', 'hannan@arobil.com', NULL, '$2y$10$pZx0eZ9MG9OOfW/F4DPtAeNRJ8ftdRLGxp0ICSyWRWoE/hjavT2ma', NULL, NULL, NULL, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_name_unique` (`name`),
  ADD UNIQUE KEY `cities_code_unique` (`code`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
