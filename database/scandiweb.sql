-- -------------------------------------------------------------
-- TablePlus 5.3.8(500)
--
-- https://tableplus.com/
--
-- Database: scandiweb
-- Generation Time: 2023-07-15 16:36:00.5520
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(12,2) NOT NULL,
  `type` enum('dvd','book','furniture') COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double(12,2) DEFAULT NULL,
  `height` double(12,2) DEFAULT NULL,
  `width` double(12,2) DEFAULT NULL,
  `length` double(12,2) DEFAULT NULL,
  `weight` double(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`name`, `sku`, `price`, `type`, `size`, `height`, `width`, `length`, `weight`) VALUES
('Product 1', 'SKU001', 10.00, 'book', NULL, NULL, NULL, NULL, 2.85),
('Product 2', 'SKU002', 15.00, 'dvd', 12.00, NULL, NULL, NULL, NULL),
('Product 3', 'SKU003', 15.00, 'furniture', NULL, 10.00, 19.00, 10.00, NULL),
('Product 4', 'SKU004', 20.00, 'book', NULL, NULL, NULL, NULL, 3.50),
('Product 5', 'SKU005', 8.00, 'dvd', 8.50, NULL, NULL, NULL, NULL),
('Product 6', 'SKU006', 25.00, 'furniture', NULL, 12.00, 24.00, 18.00, NULL),
('Product 7', 'SKU007', 18.00, 'book', NULL, NULL, NULL, NULL, 4.20),
('Product 8', 'SKU008', 14.00, 'dvd', 10.00, NULL, NULL, NULL, NULL),
('Product 9', 'SKU009', 30.00, 'furniture', NULL, 15.00, 30.00, 20.00, NULL),
('Product 10', 'SKU010', 12.00, 'book', NULL, NULL, NULL, NULL, 2.00),
('Product 11', 'SKU011', 9.00, 'dvd', 7.50, NULL, NULL, NULL, NULL),
('Product 12', 'SKU012', 22.00, 'furniture', NULL, 14.00, 28.00, 16.00, NULL),
('Product 13', 'SKU013', 16.00, 'book', NULL, NULL, NULL, NULL, 3.80),
('Product 14', 'SKU014', 11.00, 'dvd', 9.00, NULL, NULL, NULL, NULL),
('Product 15', 'SKU015', 28.00, 'furniture', NULL, 18.00, 36.00, 24.00, NULL),
('Product 16', 'SKU016', 24.00, 'book', NULL, NULL, NULL, NULL, 3.20),
('Product 17', 'SKU017', 7.00, 'dvd', 6.50, NULL, NULL, NULL, NULL),
('Product 18', 'SKU018', 20.00, 'furniture', NULL, 16.00, 32.00, 22.00, NULL),
('Product 19', 'SKU019', 13.00, 'book', NULL, NULL, NULL, NULL, 2.50),
('Product 20', 'SKU020', 10.00, 'dvd', 9.50, NULL, NULL, NULL, NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;