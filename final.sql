-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.18.0.7304
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla creaciones_alexandra.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.cache: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_documento` varchar(255) NOT NULL,
  `numero_documento` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clientes_numero_documento_unique` (`numero_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.clientes: ~0 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `tipo_documento`, `numero_documento`, `nombre`, `telefono`, `correo`, `direccion`, `created_at`, `updated_at`) VALUES
	(1, 'DNI', '70761849', 'BRANT ANTONY CHATA CHOQUE', '924437345', NULL, 'av los molles mz 536 lt02', '2026-06-11 01:10:30', '2026-06-11 01:10:30'),
	(3, 'DNI', '70761848', 'BRANT ANTONY CHATA CHOQUE', '924437345', 'antonychatachoque@gmail.com', 'av los molles', '2026-06-11 20:09:36', '2026-06-11 20:09:36');

-- Volcando estructura para tabla creaciones_alexandra.comprobantes
CREATE TABLE IF NOT EXISTS `comprobantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.comprobantes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.detalle_ventas
CREATE TABLE IF NOT EXISTS `detalle_ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_ventas_venta_id_foreign` (`venta_id`),
  KEY `detalle_ventas_producto_id_foreign` (`producto_id`),
  CONSTRAINT `detalle_ventas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_ventas_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.detalle_ventas: ~0 rows (aproximadamente)
INSERT INTO `detalle_ventas` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 12, 25.00, 300.00, '2026-06-11 01:24:33', '2026-06-11 01:24:33'),
	(2, 3, 1, 11, 25.00, 275.00, '2026-06-11 01:24:42', '2026-06-11 01:24:42'),
	(3, 4, 1, 12, 25.00, 300.00, '2026-06-11 01:54:43', '2026-06-11 01:54:43'),
	(4, 1, 2, 12, 35.00, 420.00, '2026-06-11 19:32:07', '2026-06-11 19:32:07'),
	(5, 2, 7, 9, 15.00, 135.00, '2026-06-11 20:22:34', '2026-06-11 20:22:34');

-- Volcando estructura para tabla creaciones_alexandra.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_06_10_135050_create_clientes_table', 1),
	(5, '2026_06_10_135050_create_productos_table', 1),
	(6, '2026_06_10_135051_create_pedidos_table', 1),
	(7, '2026_06_10_135051_create_ventas_table', 1),
	(8, '2026_06_10_191331_create_detalle_ventas_table', 1),
	(9, '2026_06_10_224748_add_imagen_to_productos_table', 1),
	(10, '2026_06_10_230736_create_produccions_table', 1),
	(11, '2026_06_10_230755_create_comprobantes_table', 1),
	(12, '2026_06_11_151747_add_venta_id_to_produccions_table', 2);

-- Volcando estructura para tabla creaciones_alexandra.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.pedidos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla creaciones_alexandra.produccions
CREATE TABLE IF NOT EXISTS `produccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `venta_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produccions_producto_id_foreign` (`producto_id`),
  KEY `produccions_venta_id_foreign` (`venta_id`),
  CONSTRAINT `produccions_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `produccions_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.produccions: ~0 rows (aproximadamente)
INSERT INTO `produccions` (`id`, `producto_id`, `cantidad`, `fecha_inicio`, `fecha_fin`, `estado`, `created_at`, `updated_at`, `venta_id`) VALUES
	(1, 3, 2, '2026-06-11', '2026-06-11', 'Terminado', '2026-06-11 19:51:24', '2026-06-11 19:52:55', NULL),
	(2, 5, 12, '2026-06-11', '2026-06-11', 'Terminado', '2026-06-11 19:53:07', '2026-06-11 20:01:40', NULL),
	(3, 6, 11, '2026-06-11', NULL, 'En Producción', '2026-06-11 20:02:18', '2026-06-11 20:02:32', NULL),
	(4, 2, 111, '2026-06-03', NULL, 'En Producción', '2026-06-11 20:03:36', '2026-06-11 20:11:36', NULL);

-- Volcando estructura para tabla creaciones_alexandra.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `talla` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.productos: ~0 rows (aproximadamente)
INSERT INTO `productos` (`id`, `codigo`, `nombre`, `categoria`, `talla`, `color`, `precio`, `stock`, `imagen`, `created_at`, `updated_at`) VALUES
	(1, 'P001', 'Polo Básico', 'Polos', 'M', 'Negro', 25.00, 100, NULL, NULL, NULL),
	(2, 'P002', 'Polo Premium', 'Polos', 'L', 'Blanco', 35.00, 68, NULL, NULL, '2026-06-11 19:32:07'),
	(3, 'P003', 'Polera Estampada', 'Poleras', 'M', 'Azul', 45.00, 60, NULL, NULL, NULL),
	(4, 'P004', 'Casaca Deportiva', 'Casacas', 'L', 'Negro', 65.00, 40, NULL, NULL, NULL),
	(5, 'P005', 'Camisa Oxford', 'Camisas', 'M', 'Celeste', 55.00, 62, NULL, NULL, '2026-06-11 20:01:40'),
	(6, 'P005', 'CAMISA', 'CAMISAS', 'M', 'BLANCO', 15.00, 4, NULL, '2026-06-11 19:44:59', '2026-06-11 19:44:59'),
	(7, 'C001', 'CUELLO CAMISA', 'POLOS', 'XL', 'NEGRO', 15.00, 1, NULL, '2026-06-11 20:20:52', '2026-06-11 20:22:34');

-- Volcando estructura para tabla creaciones_alexandra.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.sessions: ~0 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('OVeBaqjMf1QuaA6YBewxi9ceYNB5wHRnalY072hW', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRFRRMU1FUVV4RFozUXJZMkVVOHFrOW1ZS21nak9wVFQzTFlCaFlEYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1781194356);

-- Volcando estructura para tabla creaciones_alexandra.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(3, 'Administrador', 'admin@admin.com', NULL, '$2y$12$FXclNr.NuD10oetjRx5zpeecht2bvaW0EEyjFvjQTKncOcOZtPRBK', NULL, '2026-06-11 20:39:23', '2026-06-11 20:39:23'),
	(4, 'Administrador', 'admin@alexandra.com', NULL, '$2y$12$6cb0f6txjqNZrK0tsDJMyOYXhOFvD7GNPyfSS4/w7URyPx9NzrWvO', NULL, '2026-06-11 21:07:24', '2026-06-11 21:07:24');

-- Volcando estructura para tabla creaciones_alexandra.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint(20) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `ventas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla creaciones_alexandra.ventas: ~0 rows (aproximadamente)
INSERT INTO `ventas` (`id`, `cliente_id`, `fecha`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, '2026-06-11', 420.00, 'Pendiente', '2026-06-11 19:32:07', '2026-06-11 19:32:07'),
	(2, 1, '2026-06-11', 135.00, 'Pendiente', '2026-06-11 20:22:34', '2026-06-11 20:22:34');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
