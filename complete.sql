-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for onestore_db
DROP DATABASE IF EXISTS `onestore_db`;
CREATE DATABASE IF NOT EXISTS `onestore_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `onestore_db`;

-- Dumping structure for table onestore_db.tbl_admin
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('super_admin','admin','manager') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'admin',
  `permissions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_brand
DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandID` int NOT NULL AUTO_INCREMENT,
  `brandName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`brandID`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_cart
DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartID` int NOT NULL AUTO_INCREMENT,
  `customerID` int DEFAULT NULL,
  `session_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `productID` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cartID`),
  KEY `customerID` (`customerID`),
  KEY `productID` (`productID`),
  CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_cart_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_category
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `categoryID` int NOT NULL AUTO_INCREMENT,
  `catName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`categoryID`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_coupon
DROP TABLE IF EXISTS `tbl_coupon`;
CREATE TABLE IF NOT EXISTS `tbl_coupon` (
  `couponID` int NOT NULL AUTO_INCREMENT,
  `code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('percentage','fixed') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `minimum_amount` decimal(10,2) DEFAULT NULL,
  `usage_limit` int DEFAULT NULL,
  `used_count` int DEFAULT '0',
  `valid_from` date NOT NULL,
  `valid_until` date NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`couponID`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_customer
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customerID` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `gender` enum('male','female','other') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customerID`),
  UNIQUE KEY `email` (`email`),
  KEY `idx_customer_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_customer_address
DROP TABLE IF EXISTS `tbl_customer_address`;
CREATE TABLE IF NOT EXISTS `tbl_customer_address` (
  `addressID` int NOT NULL AUTO_INCREMENT,
  `customerID` int NOT NULL,
  `type` enum('billing','shipping') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `company` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`addressID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `tbl_customer_address_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_order
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `customerID` int DEFAULT NULL,
  `order_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_status` enum('pending','processing','shipped','delivered','cancelled','refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `payment_status` enum('pending','paid','failed','refunded') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) DEFAULT '0.00',
  `shipping_amount` decimal(10,2) DEFAULT '0.00',
  `discount_amount` decimal(10,2) DEFAULT '0.00',
  `total_amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'USD',
  `billing_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `shipped_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderID`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `customerID` (`customerID`),
  KEY `idx_order_status` (`order_status`),
  KEY `idx_order_date` (`created_at`),
  CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_order_item
DROP TABLE IF EXISTS `tbl_order_item`;
CREATE TABLE IF NOT EXISTS `tbl_order_item` (
  `orderItemID` int NOT NULL AUTO_INCREMENT,
  `orderID` int NOT NULL,
  `productID` int NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_sku` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderItemID`),
  KEY `orderID` (`orderID`),
  KEY `productID` (`productID`),
  CONSTRAINT `tbl_order_item_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `tbl_order` (`orderID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_order_item_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_product
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `categoryID` int NOT NULL,
  `brandID` int DEFAULT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `sku` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stock_quantity` int DEFAULT '0',
  `weight` decimal(8,2) DEFAULT NULL,
  `dimensions` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gallery` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `featured` tinyint(1) DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`productID`),
  UNIQUE KEY `slug` (`slug`),
  KEY `categoryID` (`categoryID`),
  KEY `brandID` (`brandID`),
  KEY `idx_product_price` (`price`),
  KEY `idx_product_featured` (`featured`),
  CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `tbl_category` (`categoryID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandID`) REFERENCES `tbl_brand` (`brandID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_review
DROP TABLE IF EXISTS `tbl_review`;
CREATE TABLE IF NOT EXISTS `tbl_review` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `productID` int NOT NULL,
  `customerID` int DEFAULT NULL,
  `customer_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rating` tinyint(1) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `approved` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reviewID`),
  KEY `productID` (`productID`),
  KEY `customerID` (`customerID`),
  CONSTRAINT `tbl_review_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `tbl_product` (`productID`) ON DELETE CASCADE,
  CONSTRAINT `tbl_review_ibfk_2` FOREIGN KEY (`customerID`) REFERENCES `tbl_customer` (`customerID`) ON DELETE SET NULL,
  CONSTRAINT `tbl_review_chk_1` CHECK (((`rating` >= 1) and (`rating` <= 5)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_shipping
DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE IF NOT EXISTS `tbl_shipping` (
  `shippingID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cost` decimal(10,2) NOT NULL,
  `free_shipping_minimum` decimal(10,2) DEFAULT NULL,
  `estimated_days` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`shippingID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

-- Dumping structure for table onestore_db.tbl_slider
DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE IF NOT EXISTS `tbl_slider` (
  `sliderID` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_text` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `position` int DEFAULT '0',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sliderID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
