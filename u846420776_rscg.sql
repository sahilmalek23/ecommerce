-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2025 at 03:19 PM
-- Server version: 10.11.10-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u846420776_rscg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `profile`) VALUES
(1, 'Ravindra', 'admin', '$2y$12$GPKRyxuHkLeyQz0oNmI/dOIIOSfOfuZOD1RSSwrambuOYHZC7NYjC', '');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT 0,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0:active 1: delete 2:hide',
  `addedby` int(11) NOT NULL DEFAULT 0,
  `statusby` int(11) NOT NULL DEFAULT 0,
  `statusdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `entrydate`, `title`, `image`, `priority`, `status`, `addedby`, `statusby`, `statusdate`) VALUES
(1, '2025-08-07 16:45:29', 'Men\'s Clothing', 'categoryimg/1754585834_6894daea4ced8.crdownload', 0, '0', 1, 0, '2025-08-07 17:05:05'),
(2, '2025-08-07 16:49:25', 'Kids\' Clothing', 'categoryimg/1754586405_6894dd25b8a8a.jpg', 0, '0', 1, 0, '2025-08-07 17:06:45'),
(3, '2025-08-07 16:50:25', 'Sports & Activewear', 'categoryimg/1754586471_6894dd67cfe3f.jpg', 0, '0', 1, 0, '2025-08-07 17:07:51'),
(4, '2025-08-07 16:55:46', 'Women\'s Clothing', 'categoryimg/1754585746_6894da92d4ad9.jpg', 0, '0', 1, 0, '2025-08-07 17:05:38'),
(5, '2025-08-07 16:59:32', 'Accessories (Clothing-related)', 'categoryimg/1754586659_6894de2316b7f.jpg', 0, '0', 1, 0, '2025-08-07 17:10:59'),
(6, '2025-08-07 17:02:54', 'Skirts & Shorts', 'categoryimg/1754586174_6894dc3e3cc46.jpg', 0, '0', 1, 0, '2025-08-07 17:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `india_regions`
--

CREATE TABLE `india_regions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` enum('State','Union Territory') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `india_regions`
--

INSERT INTO `india_regions` (`id`, `name`, `type`) VALUES
(1, 'Andhra Pradesh', 'State'),
(2, 'Arunachal Pradesh', 'State'),
(3, 'Assam', 'State'),
(4, 'Bihar', 'State'),
(5, 'Chhattisgarh', 'State'),
(6, 'Goa', 'State'),
(7, 'Gujarat', 'State'),
(8, 'Haryana', 'State'),
(9, 'Himachal Pradesh', 'State'),
(10, 'Jharkhand', 'State'),
(11, 'Karnataka', 'State'),
(12, 'Kerala', 'State'),
(13, 'Madhya Pradesh', 'State'),
(14, 'Maharashtra', 'State'),
(15, 'Manipur', 'State'),
(16, 'Meghalaya', 'State'),
(17, 'Mizoram', 'State'),
(18, 'Nagaland', 'State'),
(19, 'Odisha', 'State'),
(20, 'Punjab', 'State'),
(21, 'Rajasthan', 'State'),
(22, 'Sikkim', 'State'),
(23, 'Tamil Nadu', 'State'),
(24, 'Telangana', 'State'),
(25, 'Tripura', 'State'),
(26, 'Uttar Pradesh', 'State'),
(27, 'Uttarakhand', 'State'),
(28, 'West Bengal', 'State'),
(29, 'Andaman and Nicobar Islands', 'Union Territory'),
(30, 'Chandigarh', 'Union Territory'),
(31, 'Dadra and Nagar Haveli and Daman and Diu', 'Union Territory'),
(32, 'Delhi', 'Union Territory'),
(33, 'Jammu and Kashmir', 'Union Territory'),
(34, 'Ladakh', 'Union Territory'),
(35, 'Lakshadweep', 'Union Territory'),
(36, 'Puducherry', 'Union Territory');

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetail`
--

CREATE TABLE `invoicedetail` (
  `id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `invoiceno` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT 0,
  `randomsession` varchar(255) DEFAULT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `price` float NOT NULL,
  `dp` float NOT NULL,
  `totalamount` float NOT NULL,
  `status` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0:pending 1:accept 2:reject 3:request 4:dispatch 5:delivered 6:return',
  `statusdate` datetime DEFAULT NULL,
  `statusby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoicedetail`
--

INSERT INTO `invoicedetail` (`id`, `entrydate`, `orderid`, `invoiceno`, `userid`, `randomsession`, `productid`, `qty`, `price`, `dp`, `totalamount`, `status`, `statusdate`, `statusby`) VALUES
(1, '2025-08-07 17:34:56', 1, 541311, 1, NULL, 4, 1, 6000, 3000, 3000, '4', NULL, NULL),
(2, '2025-08-07 17:51:12', NULL, NULL, 0, 'uh6p3c5h83gsr5llruhs0al49j', 3, 2, 10500, 3000, 6000, '3', NULL, NULL),
(3, '2025-08-08 17:11:58', 5, 204884, 1, '', 4, 1, 6000, 3000, 3000, '1', NULL, NULL),
(5, '2025-08-08 17:12:53', 5, 204884, 1, '', 7, 2, 4777, 4444, 8888, '1', NULL, NULL),
(7, '2025-08-13 16:38:52', NULL, NULL, 0, '7vpv54t8hef0t9dc9p9hf6l07r', 4, 2, 6000, 3000, 6000, '3', NULL, NULL),
(8, '2025-08-13 16:43:12', 6, 199089, 2, '', 3, 1, 10500, 3000, 3000, '5', NULL, NULL),
(10, '2025-08-15 03:05:13', NULL, NULL, 0, '9aodn2eu4b6csfkquaqkd238pt', 7, 1, 4777, 4444, 4444, '3', NULL, NULL),
(11, '2025-08-17 09:00:53', NULL, NULL, 0, 'ofhtt236loroirl4uvvr370s7d', 7, 1, 4777, 4444, 4444, '3', NULL, NULL),
(12, '2025-08-17 09:04:35', 9, 612536, 1, '', 4, 1, 6000, 3000, 3000, '1', NULL, NULL),
(13, '2025-08-31 23:22:55', 9, 612536, 1, NULL, 1, 4, 2000, 1000, 4000, '1', NULL, NULL),
(14, '2025-09-06 02:17:02', NULL, NULL, 3, NULL, 4, 1, 6000, 3000, 3000, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE `invoice_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entrydate` datetime DEFAULT NULL,
  `userid` bigint(20) UNSIGNED DEFAULT NULL,
  `invoiceno` int(11) DEFAULT NULL,
  `autoinvoiceno` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `dp` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `deliveryfee` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `finaltotal` float DEFAULT NULL,
  `status` enum('0','1','2','3','4','5','6') DEFAULT '0' COMMENT '0:pending 1:accepted 2:rejected 3:request 4:dispatch 5:delivered 6:return',
  `promocode` varchar(50) DEFAULT NULL,
  `promoperc` float DEFAULT NULL,
  `order_id` varchar(250) NOT NULL,
  `payment_method` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0: COD 1:Online Payment',
  `payment_status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0:Pending 1:Success 2:Failed ',
  `payment_id` varchar(250) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `apartment` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `same_ship` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0:No 1:yes',
  `bill_country` varchar(100) DEFAULT NULL,
  `bill_firstname` varchar(100) DEFAULT NULL,
  `bill_lastname` varchar(100) DEFAULT NULL,
  `bill_address` text DEFAULT NULL,
  `bill_apartment` varchar(100) DEFAULT NULL,
  `bill_city` varchar(100) DEFAULT NULL,
  `bill_state` int(11) DEFAULT NULL,
  `bill_pincode` varchar(20) DEFAULT NULL,
  `bill_phone` varchar(10) DEFAULT NULL,
  `statusby` int(11) DEFAULT NULL,
  `statusdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_master`
--

INSERT INTO `invoice_master` (`id`, `entrydate`, `userid`, `invoiceno`, `autoinvoiceno`, `qty`, `price`, `dp`, `discount`, `deliveryfee`, `subtotal`, `finaltotal`, `status`, `promocode`, `promoperc`, `order_id`, `payment_method`, `payment_status`, `payment_id`, `firstname`, `lastname`, `address`, `apartment`, `city`, `state`, `pincode`, `phone`, `same_ship`, `bill_country`, `bill_firstname`, `bill_lastname`, `bill_address`, `bill_apartment`, `bill_city`, `bill_state`, `bill_pincode`, `bill_phone`, `statusby`, `statusdate`) VALUES
(1, '2025-08-07 17:43:23', 1, 541311, NULL, 1, 6000, 3000, 0, 0, 3000, 3000, '4', NULL, 0, 'order_R2WzYiLgtWb3Xc', '1', '1', 'pay_R2WziSnPuf8gok', 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL),
(2, '2025-08-08 17:19:44', 1, NULL, NULL, 3, 10777, 7444, 100, 0, 11888, 11788, '3', 'IPL20', 100, 'order_R2v7gOTOEPWQ1r', '1', '0', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL),
(3, '2025-08-08 17:19:44', 1, 478965, NULL, 3, 10777, 7444, 100, 0, 11888, 11788, '1', 'IPL20', 100, 'order_R2v7gNnUvRtLHh', '1', '1', 'pay_R2v8vXYAgOjWiI', 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL),
(4, '2025-08-08 17:20:08', 1, NULL, NULL, 3, 10777, 7444, 100, 0, 11888, 11788, '3', 'IPL20', 100, 'order_R2v85v6sUOMREE', '1', '0', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL),
(5, '2025-08-08 17:20:35', 1, 204884, NULL, 3, 10777, 7444, 100, 0, 11888, 11788, '1', 'IPL20', 100, 'order_R2v8YmvkUfGckf', '1', '1', 'pay_R2v8wEBmceTDyh', 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668866', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668866', NULL, NULL),
(6, '2025-08-13 16:43:35', 2, 199089, NULL, 1, 10500, 3000, 0, 0, 3000, 3000, '5', NULL, 0, 'order_R4tB5zdLtHKx05', '1', '1', 'pay_R4tBOTi6OkyYan', 'check', 'this', 'AHMEDABAD', 'bad', 'new', 7, '382220', '9876543876', '1', NULL, 'check', 'this', 'AHMEDABAD', 'thus', 'new', 7, '382220', '9876543876', NULL, NULL),
(7, '2025-08-17 09:07:06', 1, NULL, NULL, 2, 10777, 7444, 0, 0, 7444, 7444, '3', NULL, 0, 'order_R6LXNg1lJ3h3NG', '1', '0', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL),
(8, '2025-09-05 17:19:30', 1, NULL, NULL, 5, 8000, 4000, 0, 0, 7000, 7000, '3', NULL, 0, 'order_RE04oTyZzb9Bh4', '1', '0', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL),
(9, '2025-09-05 17:19:52', 1, 612536, NULL, 5, 8000, 4000, 0, 0, 7000, 7000, '1', NULL, 0, 'order_RE05AzYs2ul8mo', '1', '1', 'pay_RE05LpDoqAawQW', 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', '1', NULL, 'App', 'Master', 'Motajoravarapura', 'fff', 'Ahmedabad', 7, '380025', '6354668897', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0: active 1:delete 2:hide',
  `statusby` int(11) NOT NULL DEFAULT 0,
  `statusdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productimage`
--

INSERT INTO `productimage` (`id`, `entrydate`, `image`, `product_id`, `status`, `statusby`, `statusdate`) VALUES
(1, '2025-08-07 17:14:45', 'productimg/1754586885_6894df05387c0.jpg', 1, '0', 0, NULL),
(2, '2025-08-07 17:27:49', 'productimg/1754587669_6894e21548984.jpg', 1, '1', 1, '2025-08-07 17:28:15'),
(3, '2025-08-07 17:28:41', 'productimg/1754587721_6894e249b7c51.jpg', 2, '0', 0, NULL),
(4, '2025-08-07 17:33:00', 'productimg/1754587980_6894e34c9a0d5.jpg', 3, '0', 0, NULL),
(5, '2025-08-07 17:38:04', 'productimg/1754588284_6894e47c40e76.jpg', 4, '0', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` float DEFAULT 0,
  `dp` float NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL COMMENT '0:active 1:delete 2:hide',
  `remarks` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `addedby` int(11) NOT NULL DEFAULT 0,
  `statusby` int(11) NOT NULL DEFAULT 0,
  `statusdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `entrydate`, `name`, `category_id`, `price`, `dp`, `description`, `status`, `remarks`, `image`, `addedby`, `statusby`, `statusdate`) VALUES
(1, '2025-08-07 17:14:24', 'T-Shirts and Shirts Combo', 1, 0, 0, '<p>Soft, breathable cotton T-shirt with a modern fit. Perfect for everyday casual wear.</p>', '0', NULL, 'productimg/1754587464_6894e14843fc0.jpg', 1, 0, '2025-08-07 17:24:24'),
(2, '2025-08-07 17:27:35', 'T-Shirts & Shirts Tow', 2, 0, 0, '<p>Cute and comfortable cotton frock with playful prints, ideal for daily wear.</p>', '0', NULL, 'productimg/1754587655_6894e207c8dc9.jpg', 1, 0, '2025-08-07 17:27:35'),
(3, '2025-08-07 17:32:42', 'Men’s Training Shorts', 3, 0, 0, '<p>Quick-dry, lightweight shorts with built-in lining and side pockets—ideal for any sport.</p>', '0', NULL, 'productimg/1754587962_6894e33acaed7.jpg', 1, 0, '2025-08-07 17:32:42'),
(4, '2025-08-07 17:37:49', 'Kurtis', 4, 0, 0, '<p>Elegant printed kurti crafted from premium rayon fabric, ideal for office and festive wear.</p>', '0', NULL, 'productimg/1754588269_6894e46db3f7b.jpg', 1, 0, '2025-08-07 17:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_master`
--

CREATE TABLE `product_sub_master` (
  `id` int(11) NOT NULL,
  `entrydate` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `dp` float NOT NULL,
  `size` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0: active 1: delete 2: update',
  `addedby` int(11) NOT NULL DEFAULT 0,
  `statusby` int(11) NOT NULL DEFAULT 0,
  `statusdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_sub_master`
--

INSERT INTO `product_sub_master` (`id`, `entrydate`, `product_id`, `price`, `dp`, `size`, `status`, `addedby`, `statusby`, `statusdate`) VALUES
(1, '2025-08-07 17:15:50', 1, 2000, 1000, 1, '0', 1, 0, NULL),
(2, '2025-08-07 17:16:07', 1, 4000, 2000, 3, '0', 1, 0, NULL),
(3, '2025-08-07 17:29:22', 2, 10500, 3000, 2, '0', 1, 0, NULL),
(4, '2025-08-07 17:33:27', 3, 6000, 3000, 4, '0', 1, 0, NULL),
(5, '2025-08-07 17:34:01', 3, 3999, 4535, 5, '0', 1, 0, NULL),
(6, '2025-08-07 17:38:43', 4, 4003, 3000, 2, '0', 1, 0, NULL),
(7, '2025-08-07 17:39:11', 4, 4777, 4444, 6, '0', 1, 0, NULL),
(8, '2025-08-07 17:39:24', 4, 33333, 4443, 3, '0', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entrydate` datetime NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` enum('fixed','percent') DEFAULT NULL,
  `value` float DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0' COMMENT '0: active, 1: inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `entrydate`, `code`, `type`, `value`, `status`) VALUES
(1, '2025-06-26 04:08:49', 'IPL20', 'fixed', 100, '0');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('B6O53drqdtg8PwSt85doAqFn8ZUPyo9lfw20igzb', NULL, '209.38.73.173', 'Mozilla/5.0 (X11; Linux x86_64; rv:139.0) Gecko/20100101 Firefox/139.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUVhb1NQT2lWQnRlbzlZYWtlT3Q0YWJKM2JpR0YzaUhraThyQ3k3MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vZ2xvd2xpbmsuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757165702),
('CpALmznF69IodtjSZR5qeLkgDY9QYrVjLhIZPMCJ', NULL, '2402:3a80:15a4:49ee:79d8:db32:b36c:4f23', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkdHRjB0cHZCbmpmUFBHRjRWY1M3bG1RcktMaTJtUEh5TkVyVnJobCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTk6Imh0dHBzOi8vZ2xvd2xpbmsuaW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1757171952),
('xTPye3SBhjWa9SnVjANm7IdEo6QgiXX5HJbzRGSd', NULL, '66.249.72.36', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.7204.183 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSTNoU3gxVHZpalJLdkhJNWE4bndIOWJ5TVM1QjE4QnVMNmhzN1VWUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vd3d3Lmdsb3dsaW5rLmluL2Fib3V0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1757169510);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `stock_transaction`
--

CREATE TABLE `stock_transaction` (
  `id` int(11) NOT NULL,
  `entrydate` datetime NOT NULL,
  `type` enum('MP','AP') NOT NULL COMMENT 'MP: Member AP:adminpanel',
  `userid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_sub_id` int(11) NOT NULL,
  `addedby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_transaction`
--

INSERT INTO `stock_transaction` (`id`, `entrydate`, `type`, `userid`, `stock`, `product_sub_id`, `addedby`) VALUES
(1, '2025-08-07 17:16:24', 'AP', 0, 5, 1, 1),
(2, '2025-08-07 17:16:30', 'AP', 0, 1, 2, 1),
(3, '2025-08-07 17:29:35', 'AP', 0, 10, 3, 1),
(4, '2025-08-07 17:34:22', 'AP', 0, 30, 4, 1),
(5, '2025-08-07 17:39:43', 'AP', 0, 40, 7, 1),
(6, '2025-08-07 17:43:48', 'MP', 0, -1, 4, 0),
(7, '2025-08-08 17:21:13', 'MP', 0, -1, 4, 0),
(8, '2025-08-08 17:21:13', 'MP', 0, -2, 7, 0),
(9, '2025-08-13 16:44:07', 'MP', 0, -1, 3, 0),
(10, '2025-09-05 17:20:15', 'MP', 0, -1, 4, 0),
(11, '2025-09-05 17:20:15', 'MP', 0, -4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', 'rc5556662@gmail.com', NULL, '', 'LEQNWOpv6TDfr8ds0plljcZP2H27rbRgGxGoBYEWESLcUCZsWMXp8Aq5M8xG', '2025-07-22 17:42:48', '2025-07-22 17:42:48'),
(2, '', 'sahilmalek2311@gmail.com', NULL, '', '3WeRVWvxDm9dI0ulj0DGar6ssMQcfvbsqbrmHOYF5GbEWd157F9SgdL6J6yJ', '2025-08-13 16:42:56', '2025-08-13 16:42:56'),
(3, '', 'mukeshsuthar6142@gmail.com', NULL, '', 'vdWtZ5xskqSEM9Cr4KVuzaF9u16TeeEYM8KeRXiQwt6BNzOQBQ7qKz5nG8il', '2025-09-06 02:17:42', '2025-09-06 02:17:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `india_regions`
--
ALTER TABLE `india_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_master`
--
ALTER TABLE `invoice_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_master`
--
ALTER TABLE `product_sub_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `india_regions`
--
ALTER TABLE `india_regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `invoicedetail`
--
ALTER TABLE `invoicedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice_master`
--
ALTER TABLE `invoice_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sub_master`
--
ALTER TABLE `product_sub_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_transaction`
--
ALTER TABLE `stock_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
