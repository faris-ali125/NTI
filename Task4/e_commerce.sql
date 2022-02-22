-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 08:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(20) UNSIGNED NOT NULL,
  `street` varchar(5) NOT NULL,
  `building` varchar(5) NOT NULL,
  `floor` varchar(5) NOT NULL,
  `flat` varchar(5) NOT NULL,
  `notes` varchar(5) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(20) UNSIGNED DEFAULT NULL,
  `regoin_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `building`, `floor`, `flat`, `notes`, `created_at`, `updated_at`, `user_id`, `regoin_id`) VALUES
(1, 'nasse', '22', '1', '2', NULL, '2022-02-22 19:27:00', '2022-02-22 19:27:00', 1, 2),
(2, 'broug', '2', '3', '4', NULL, '2022-02-22 19:27:00', '2022-02-22 19:27:00', 4, 1),
(3, 'maka', '23', '3', '2', NULL, '2022-02-22 19:27:00', '2022-02-22 19:27:00', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(20) UNSIGNED NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  `name_ar` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `sub_category_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `status`, `image`, `created_at`, `updated_at`, `sub_category_id`) VALUES
(1, 'LENOVO', 'لينوفو', 'AVAILABLE', 'DEFAULT.PNG', '2022-02-22 19:37:24', '2022-02-22 19:37:24', 2),
(2, 'APPLE', 'أبل', 'AVAILABLE', 'DEFAULT.PNG', '2022-02-22 19:37:24', '2022-02-22 19:37:24', 3),
(3, 'DELL', 'ديل', 'AVAILABLE', 'DEFAULT.PNG', '2022-02-22 19:37:24', '2022-02-22 19:37:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(20) UNSIGNED NOT NULL,
  `quantity` int(20) UNSIGNED NOT NULL,
  `product_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `quantity`, `product_id`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) UNSIGNED NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  `name_ar` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ELECTRONICS', 'الكترونيات', 'AVAILABLE', '2022-02-22 19:30:56', '2022-02-22 19:30:56'),
(2, 'BIG DEVICES', 'اجهزة كبيرة', 'AVAILABLE', '2022-02-22 19:30:56', '2022-02-22 19:30:56'),
(3, 'SMALL DEVICES', 'اجهزة صغيرة', 'AVAILABLE', '2022-02-22 19:30:56', '2022-02-22 19:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(20) UNSIGNED NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  `name_ar` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `regoin_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`, `regoin_id`) VALUES
(1, 'CAIRO', 'القاهرة', 'AVAILABLE', '2022-02-22 19:50:54', '2022-02-22 19:50:54', 1),
(2, 'ALEX', 'الاسكندرية', 'AVAILABLE', '2022-02-22 19:50:54', '2022-02-22 19:50:54', 2),
(3, 'SOHAG', 'سوهاج', 'AVAILABLE', '2022-02-22 19:50:54', '2022-02-22 19:50:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cities_offers`
--

CREATE TABLE `cities_offers` (
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `city_id` int(20) UNSIGNED DEFAULT NULL,
  `offer_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities_offers`
--

INSERT INTO `cities_offers` (`start_date`, `end_date`, `city_id`, `offer_id`) VALUES
('2022-02-22 19:53:06', '2022-02-22 19:53:06', 1, 1),
('2022-02-22 19:53:06', '2022-02-22 19:53:06', 2, 2),
('2022-02-22 19:53:06', '2022-02-22 19:53:06', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(20) UNSIGNED NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `discount_type` varchar(20) NOT NULL,
  `strat_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `max_discount_value` varchar(20) NOT NULL,
  `min_order_value` varchar(20) NOT NULL,
  `max_usage_per_user` varchar(20) NOT NULL,
  `max_usage_in_general` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount_type`, `strat_date`, `end_date`, `max_discount_value`, `min_order_value`, `max_usage_per_user`, `max_usage_in_general`, `created_at`, `updated_at`) VALUES
(1, '123456', '10', '2022-02-22 19:40:23', '2022-02-22 19:40:23', '30', '1', '2', '4', '2022-02-22 19:40:23', '2022-02-22 19:40:23'),
(2, '234567', '10', '2022-02-22 19:40:23', '2022-02-22 19:40:23', '30', '1', '2', '4', '2022-02-22 19:40:23', '2022-02-22 19:40:23'),
(3, '345678', '10', '2022-02-22 19:40:23', '2022-02-22 19:40:23', '30', '1', '2', '4', '2022-02-22 19:40:23', '2022-02-22 19:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(20) UNSIGNED NOT NULL,
  `title_en` varchar(20) NOT NULL,
  `title_ar` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `discont` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title_en`, `title_ar`, `image`, `start_date`, `end_date`, `discont`) VALUES
(1, 'BUY NOW AND...', 'اشتري الان و', 'DEFAULT.PNG', '2022-02-22 19:43:02', '2022-02-22 19:43:02', 10),
(2, 'BUY NOW AND...', 'اشتري الان و', 'DEFAULT.PNG', '2022-02-22 19:43:02', '2022-02-22 19:43:02', 10),
(3, 'BUY NOW AND...', 'اشتري الان و', 'DEFAULT.PNG', '2022-02-22 19:43:02', '2022-02-22 19:43:02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(20) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `delliverd_date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `total_price`, `delliverd_date`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'AVAILABLE', '20', '2022-02-22 18:51:38', '2022-02-22 18:51:38', '2022-02-22 18:51:38', 1),
(2, 'AVAILABLE', '50', '2022-02-22 18:51:38', '2022-02-22 18:51:38', '2022-02-22 18:51:38', 4),
(3, 'AVAILABLE', '100', '2022-02-22 18:51:38', '2022-02-22 18:51:38', '2022-02-22 18:51:38', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(20) UNSIGNED NOT NULL,
  `quantity` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `desc_en` varchar(20) DEFAULT NULL,
  `desc_ar` varchar(20) DEFAULT NULL,
  `created_at` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  `name_ar` varchar(20) DEFAULT NULL,
  `order_id` int(20) UNSIGNED DEFAULT NULL,
  `offer_id` int(20) UNSIGNED DEFAULT NULL,
  `coupon_id` int(20) UNSIGNED DEFAULT NULL,
  `brand_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `quantity`, `status`, `image`, `desc_en`, `desc_ar`, `created_at`, `updated_at`, `name_en`, `name_ar`, `order_id`, `offer_id`, `coupon_id`, `brand_id`) VALUES
(2, 1, 'AVAILABLE', 'DEFAULT.PNG', 'LAPTOP', 'لاب توب', '2022-02-22 19:34:21.', '2022-02-22 19:34:21.', 'LEGION 5', 'ليجون 5', 1, 1, 1, 1),
(3, 2, 'AVAILABLE', 'DEFAULT.PNG', 'I PHONE', 'ايفون', '2022-02-22 19:34:21.', '2022-02-22 19:34:21.', 'I PHONE', 'ايفون', 2, 2, 2, 2),
(4, 1, 'AVAILABLE', 'DEFAULT.PNG', 'SCREENS', 'شاشات', '2022-02-22 19:34:21.', '2022-02-22 19:34:21.', 'DELL', 'ديل', 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `regoins`
--

CREATE TABLE `regoins` (
  `id` int(20) UNSIGNED NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  `name_ar` varchar(20) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regoins`
--

INSERT INTO `regoins` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CAIRO', 'القاهرة', 'AVAILABLE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ALEX', 'الاسكندرية', 'AVAILABLE', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'SOHAG', 'سوهاج', 'AVAILABLE', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(20) UNSIGNED NOT NULL,
  `value` int(5) DEFAULT NULL,
  `comment` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `product_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `value`, `comment`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 2, 'NOUN', '2022-02-22 19:54:03', '2022-02-22 19:54:03', 2),
(2, 3, 'NOUN', '2022-02-22 19:54:03', '2022-02-22 19:54:03', 3),
(3, 5, 'NOUN', '2022-02-22 19:54:03', '2022-02-22 19:54:03', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(20) UNSIGNED NOT NULL,
  `name_en` varchar(20) DEFAULT NULL,
  `name_ar` varchar(20) DEFAULT NULL,
  `image` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `category_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name_en`, `name_ar`, `image`, `status`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'LAPTOPS', 'لاب توبات', 'DEFAULT.PNG', 'AVAILABLE', '2022-02-22 19:34:21', '2022-02-22 19:34:21', 2),
(2, 'PHONES', 'هواتف', 'DEFAULT.PNG', 'AVAILABLE', '2022-02-22 19:34:21', '2022-02-22 19:34:21', 3),
(3, 'SCREENS', 'شاشات', 'DEFAULT.PNG', 'AVAILABLE', '2022-02-22 19:34:21', '2022-02-22 19:34:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `status` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `verified_at` datetime NOT NULL,
  `expired_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `gender`, `status`, `image`, `verified_at`, `expired_at`) VALUES
(1, 'AHMED', 'ALI', '123456', 'm', 'ONLINE', 'DEFAULT.PNG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'MOHAMED', 'SAMIR', '789012', 'm', 'ONLINE', 'DEFAULT.PNG', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'AYA', 'HANY', '123456', 'f', 'OFFLINE', 'DEFAULT.PNG', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_email`
--

CREATE TABLE `users_email` (
  `email` varchar(20) NOT NULL,
  `user_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_email`
--

INSERT INTO `users_email` (`email`, `user_id`) VALUES
('ahmed123@.com', 1),
('mohamed123@.com', 2),
('aya123@.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_phone`
--

CREATE TABLE `users_phone` (
  `phone` varchar(20) NOT NULL,
  `user_id` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_phone`
--

INSERT INTO `users_phone` (`phone`, `user_id`) VALUES
('0101234567', 1),
('01123456456', 2),
('01123456787', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `regoin_id` (`regoin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `sub_category_id` (`sub_category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `regoin_id` (`regoin_id`);

--
-- Indexes for table `cities_offers`
--
ALTER TABLE `cities_offers`
  ADD UNIQUE KEY `city_id` (`city_id`),
  ADD UNIQUE KEY `offer_id` (`offer_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD UNIQUE KEY `offer_id` (`offer_id`),
  ADD UNIQUE KEY `coupon_id` (`coupon_id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `regoins`
--
ALTER TABLE `regoins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_en` (`name_en`),
  ADD UNIQUE KEY `name_ar` (`name_ar`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`first_name`),
  ADD UNIQUE KEY `last_name` (`last_name`);

--
-- Indexes for table `users_email`
--
ALTER TABLE `users_email`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users_phone`
--
ALTER TABLE `users_phone`
  ADD PRIMARY KEY (`phone`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `regoins`
--
ALTER TABLE `regoins`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `regoin_addresses` FOREIGN KEY (`regoin_id`) REFERENCES `regoins` (`id`),
  ADD CONSTRAINT `user_addresses` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_addresses` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `sub_category_brands` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `regoin_cities` FOREIGN KEY (`regoin_id`) REFERENCES `regoins` (`id`);

--
-- Constraints for table `cities_offers`
--
ALTER TABLE `cities_offers`
  ADD CONSTRAINT `city_cities_offers` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `offer_cities_offers` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_product` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `product_coupon` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `product_offer` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`),
  ADD CONSTRAINT `product_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `review_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `categories_sub_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users_email`
--
ALTER TABLE `users_email`
  ADD CONSTRAINT `user_user_email` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_phone`
--
ALTER TABLE `users_phone`
  ADD CONSTRAINT `user_user_phone` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
