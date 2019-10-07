-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2019 at 12:32 AM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.2.16-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(3) NOT NULL,
  `parent` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `class` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent`, `name`, `class`, `url`) VALUES
(24, 0, 'Languages', 'icon icon-hand-scissors-o', ''),
(23, 0, 'Patterns', 'icon icon-industry', ''),
(22, 0, 'Shapes', 'icon icon-book', ''),
(13, 0, 'Products', 'icon icon-wrench', ''),
(14, 0, 'Brands', 'icon icon-certificate', ''),
(15, 0, 'Categories', 'icon icon-gears', ''),
(25, 0, 'Suppliers', 'icon icon-group', ''),
(26, 24, 'Add', '', 'admin/add_language'),
(27, 24, 'Manage', '', 'admin/manage_languages'),
(28, 23, 'Add', '', 'admin/add_pattern'),
(29, 23, 'Manage', '', 'admin/manage_patterns'),
(30, 22, 'Add', '', 'admin/add_shape'),
(31, 22, 'Manage', '', 'admin/manage_shapes'),
(32, 13, 'Add', '', 'admin/add_product'),
(33, 13, 'Manage', '', 'admin/manage_products'),
(34, 14, 'Add', '', 'admin/add_brands'),
(35, 14, 'Manage', '', 'admin/manage_brands'),
(36, 15, 'Add', '', 'admin/add_category'),
(37, 15, 'Manage', '', 'admin/manage_categories'),
(38, 25, 'Add', '', 'admin/add_supplier'),
(39, 25, 'Manage', '', 'admin/manage_suppliers'),
(40, 0, 'Colors', 'icon icon-paint-brush', ''),
(41, 40, 'Add', '', 'admin/add_color'),
(42, 40, 'Manage', '', 'admin/manage_colors'),
(43, 0, 'Surfaces', 'icon icon-object-group', ''),
(44, 43, 'Add', '', 'admin/add_surface'),
(45, 43, 'Manage', '', 'admin/manage_surfaces'),
(46, 0, 'Features', 'icon icon-server', ''),
(47, 46, 'Add', '', 'admin/add_feature'),
(48, 46, 'Manage', '', 'admin/manage_features'),
(49, 0, 'Currency', 'icon icon-money', ''),
(50, 49, 'Add', '', 'admin/add_currency'),
(51, 49, 'Manage', '', 'admin/manage_currencies'),
(52, 0, 'Users', 'icon icon-user', ''),
(53, 52, 'Add', '', 'admin/add_user'),
(54, 52, 'Manage', '', 'admin/manage_users');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`) VALUES
(1, 'Nike', '2019-09-25 17:34:13'),
(2, 'GUCCI', '2019-10-01 14:36:56'),
(4, 'Kelvin Klean', '2019-10-01 14:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent`, `created_at`) VALUES
(1, 'Neckless', 0, '2019-09-26 05:39:07'),
(2, 'Bangles', 0, '2019-09-26 05:39:16'),
(3, 'Rings', 0, '2019-09-26 05:39:20'),
(4, 'Single layer', 1, '2019-09-26 05:39:30'),
(5, 'Single layer with crown', 1, '2019-09-26 05:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `category_features`
--

CREATE TABLE `category_features` (
  `id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `features` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_features`
--

INSERT INTO `category_features` (`id`, `category_id`, `features`, `created_at`) VALUES
(5, 3, '1,5', '2019-09-27 05:38:35'),
(6, 2, '2,5', '2019-09-27 05:38:45'),
(7, 5, '1,2', '2019-09-27 05:38:56'),
(10, 4, '1,4,5', '2019-09-27 05:40:34'),
(12, 1, '2,3,6,7,8,9,10,11', '2019-10-01 10:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`) VALUES
(1, 'Red', '2019-09-25 18:03:51'),
(3, 'Magenta', '2019-09-25 18:04:02'),
(4, 'green', '2019-09-25 18:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `created_at`) VALUES
(1, 'Dollars', 'USD', '2019-09-30 18:34:14'),
(2, 'Pounds', 'GBP', '2019-09-30 18:34:14'),
(3, 'Euro', 'EU', '2019-09-30 18:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE `dictionary` (
  `id` int(11) NOT NULL,
  `lang_id` int(3) NOT NULL,
  `literal` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `created_at`) VALUES
(2, 'Weight', '2019-09-26 09:36:49'),
(3, 'Length', '2019-09-26 09:36:53'),
(6, 'Largest part dimension', '2019-10-01 05:11:54'),
(7, 'Smallest part dimension', '2019-10-01 05:12:15'),
(8, 'Overall dimensions', '2019-10-01 05:12:34'),
(9, 'Color', '2019-10-01 10:53:43'),
(10, 'Material', '2019-10-01 10:53:48'),
(11, 'Tag', '2019-10-01 10:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`) VALUES
(2, 'German', '2019-10-03 09:54:18'),
(3, 'Lithuanian', '2019-10-03 09:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `patterns`
--

CREATE TABLE `patterns` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patterns`
--

INSERT INTO `patterns` (`id`, `name`, `created_at`) VALUES
(1, 'tiled', '2019-09-25 18:12:46'),
(2, 'knotted', '2019-09-25 18:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` int(5) NOT NULL,
  `sub_category` int(5) DEFAULT NULL,
  `price` int(6) NOT NULL,
  `currency_id` int(3) NOT NULL,
  `supplier_id` int(5) NOT NULL,
  `status` enum('Active','In-active') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `code`, `name`, `category`, `sub_category`, `price`, `currency_id`, `supplier_id`, `status`, `created_at`) VALUES
(1, 'SP011', 'Joanas Diamond Neckles', 1, NULL, 450, 2, 1, 'Active', '2019-10-01 11:04:19'),
(2, 'SW1254', 'asdfasdf', 2, NULL, 23, 3, 2, 'Active', '2019-10-03 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `shape_id` int(5) NOT NULL,
  `surface_id` int(5) NOT NULL,
  `pattern_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `brand_id`, `shape_id`, `surface_id`, `pattern_id`, `created_at`) VALUES
(3, 1, 1, 1, 1, 1, '2019-10-03 08:21:49'),
(5, 2, 2, 1, 2, 1, '2019-10-03 12:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_name`, `uploaded_on`, `created_at`) VALUES
(1, 1, 'pakistan.jpg', '2019-10-03 07:37:14', '2019-10-03 07:37:14'),
(2, 1, 'pak.jpg', '2019-10-03 07:37:14', '2019-10-03 07:37:14'),
(3, 1, 'hilux.jpg', '2019-10-03 07:37:14', '2019-10-03 07:37:14'),
(4, 2, 'hilux1.jpg', '2019-10-03 12:52:47', '2019-10-03 12:52:47'),
(5, 2, 'Screenshot_from_2019-09-11_22-05-55.png', '2019-10-03 12:52:47', '2019-10-03 12:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `prod_cat_feature_values`
--

CREATE TABLE `prod_cat_feature_values` (
  `id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `feature_id` int(5) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_cat_feature_values`
--

INSERT INTO `prod_cat_feature_values` (`id`, `product_id`, `feature_id`, `value`, `created_at`) VALUES
(17, 1, 2, '33', '2019-10-03 08:21:49'),
(18, 1, 3, '33', '2019-10-03 08:21:49'),
(19, 1, 6, '33', '2019-10-03 08:21:49'),
(20, 1, 7, '3x8', '2019-10-03 08:21:49'),
(21, 1, 8, '2x4', '2019-10-03 08:21:49'),
(22, 1, 9, 'red', '2019-10-03 08:21:49'),
(23, 1, 10, 'Strong fibre', '2019-10-03 08:21:49'),
(24, 1, 11, 'adfsasdfa', '2019-10-03 08:21:49'),
(27, 2, 2, '33', '2019-10-03 12:52:39'),
(28, 2, 3, '45', '2019-10-03 12:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `shapes`
--

CREATE TABLE `shapes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shapes`
--

INSERT INTO `shapes` (`id`, `name`, `created_at`) VALUES
(1, 'Round', '2019-09-25 17:50:34'),
(2, 'Circle', '2019-09-25 17:50:46'),
(3, 'Square', '2019-09-25 17:50:50'),
(4, 'hexagon', '2019-09-25 17:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `code`, `category_id`, `address`, `phone`, `created_at`) VALUES
(1, 'Aron Associates', 'SP-2', 1, 'Ghauri Town', '345345234', '2019-09-29 08:00:44'),
(2, 'BZ Traders', 'SP-3', 2, 'some address 4', '34534534', '2019-09-29 08:01:15'),
(3, 'TR and Company', 'SP-5', 3, 'asdfasdf', '354645645', '2019-09-29 08:01:34');

-- --------------------------------------------------------

--
-- Table structure for table `surfaces`
--

CREATE TABLE `surfaces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surfaces`
--

INSERT INTO `surfaces` (`id`, `name`, `created_at`) VALUES
(1, 'Slippery', '2019-09-25 18:08:38'),
(2, 'Wet', '2019-09-25 18:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `language` varchar(50) DEFAULT 'english',
  `role` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `language`, `role`) VALUES
(1, 'admin', 'admin@malik.com', '496d8d37306246ef4ea37bddb7e7355e', 'english', 1),
(2, 'Malik', 'malikmudassar@gmail.com', '496d8d37306246ef4ea37bddb7e7355e', 'german', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `permissions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `permissions`) VALUES
(2, 2, '14,34,35,15,36,37,22,23,28,29,25,38,40,41,49,50,52,53'),
(3, 1, '13,32,33,14,34,35,15,36,37,22,30,31,23,28,29,24,26,27,25,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`) VALUES
(1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `category_features`
--
ALTER TABLE `category_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patterns`
--
ALTER TABLE `patterns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod_cat_feature_values`
--
ALTER TABLE `prod_cat_feature_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shapes`
--
ALTER TABLE `shapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surfaces`
--
ALTER TABLE `surfaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category_features`
--
ALTER TABLE `category_features`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `patterns`
--
ALTER TABLE `patterns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prod_cat_feature_values`
--
ALTER TABLE `prod_cat_feature_values`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `shapes`
--
ALTER TABLE `shapes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `surfaces`
--
ALTER TABLE `surfaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
