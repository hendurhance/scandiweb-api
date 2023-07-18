CREATE DATABASE IF NOT EXISTS `scandiweb`;

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
