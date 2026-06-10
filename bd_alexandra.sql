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

-- Volcando datos para la tabla creaciones_alexandra.cache: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.cache_locks: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.clientes: ~1 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `tipo_documento`, `numero_documento`, `nombre`, `telefono`, `correo`, `direccion`, `created_at`, `updated_at`) VALUES
	(1, 'DNI', '70761849', 'BRANT ANTONY CHATA CHOQUE', '924437345', NULL, 'av los molles mz 536 lt02', '2026-06-11 01:10:30', '2026-06-11 01:10:30');

-- Volcando datos para la tabla creaciones_alexandra.comprobantes: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.detalle_ventas: ~3 rows (aproximadamente)
INSERT INTO `detalle_ventas` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 12, 25.00, 300.00, '2026-06-11 01:24:33', '2026-06-11 01:24:33'),
	(2, 3, 1, 11, 25.00, 275.00, '2026-06-11 01:24:42', '2026-06-11 01:24:42'),
	(3, 4, 1, 12, 25.00, 300.00, '2026-06-11 01:54:43', '2026-06-11 01:54:43');

-- Volcando datos para la tabla creaciones_alexandra.failed_jobs: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.job_batches: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.jobs: ~0 rows (aproximadamente)

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
	(9, '2026_06_10_224748_add_imagen_to_productos_table', 2),
	(10, '2026_06_10_230736_create_produccions_table', 3),
	(11, '2026_06_10_230755_create_comprobantes_table', 3);

-- Volcando datos para la tabla creaciones_alexandra.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.pedidos: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.produccions: ~0 rows (aproximadamente)
INSERT INTO `produccions` (`id`, `producto_id`, `cantidad`, `fecha_inicio`, `fecha_fin`, `estado`, `created_at`, `updated_at`) VALUES
	(11, 3, 50, '2026-06-01', '2026-06-03', 'Terminado', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(12, 4, 30, '2026-06-02', NULL, 'En Producción', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(13, 5, 20, '2026-06-03', NULL, 'Pendiente', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(14, 6, 60, '2026-06-04', '2026-06-07', 'Terminado', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(15, 7, 15, '2026-06-05', NULL, 'Pendiente', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(16, 8, 25, '2026-06-06', NULL, 'En Producción', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(17, 9, 80, '2026-06-07', '2026-06-09', 'Terminado', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(18, 10, 40, '2026-06-08', NULL, 'Pendiente', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(19, 11, 35, '2026-06-09', NULL, 'En Producción', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(20, 12, 70, '2026-06-10', NULL, 'Pendiente', '2026-06-10 23:39:25', '2026-06-10 23:39:25'),
	(21, 3, 50, '2026-06-01', '2026-06-03', 'Terminado', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(22, 4, 30, '2026-06-02', NULL, 'En Producción', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(23, 5, 20, '2026-06-03', NULL, 'Pendiente', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(24, 6, 60, '2026-06-04', '2026-06-07', 'Terminado', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(25, 7, 15, '2026-06-05', NULL, 'Pendiente', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(26, 8, 25, '2026-06-06', NULL, 'En Producción', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(27, 9, 80, '2026-06-07', '2026-06-09', 'Terminado', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(28, 10, 40, '2026-06-08', NULL, 'Pendiente', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(29, 11, 35, '2026-06-09', NULL, 'En Producción', '2026-06-10 23:39:28', '2026-06-10 23:39:28'),
	(30, 12, 70, '2026-06-10', NULL, 'Pendiente', '2026-06-10 23:39:28', '2026-06-10 23:39:28');

-- Volcando datos para la tabla creaciones_alexandra.productos: ~2 rows (aproximadamente)
INSERT INTO `productos` (`id`, `codigo`, `nombre`, `categoria`, `talla`, `color`, `precio`, `stock`, `imagen`, `created_at`, `updated_at`) VALUES
	(1, 'F001', 'MERCEDES', 'POLO', 'M', 'NEGRO', 25.00, 30, NULL, '2026-06-11 01:11:21', '2026-06-11 03:11:54'),
	(2, 'F001', 'BRANT ANTONY CHATA CHOQUE', 'POLO', 'M', 'NEGRO', 25.00, 50, NULL, '2026-06-11 01:11:21', '2026-06-11 01:11:21'),
	(3, 'P001', 'Polo Básico', 'Polos', 'M', 'Negro', 25.00, 100, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(4, 'P002', 'Polo Deportivo', 'Polos', 'L', 'Azul', 30.00, 80, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(5, 'P003', 'Camisa Oxford', 'Camisas', 'M', 'Celeste', 55.00, 60, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(6, 'P004', 'Camisa Ejecutiva', 'Camisas', 'L', 'Blanco', 65.00, 40, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(7, 'P005', 'Buzo Capucha', 'Buzos', 'L', 'Negro', 80.00, 30, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(8, 'P006', 'Polera Estampada', 'Poleras', 'M', 'Rojo', 45.00, 50, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(9, 'P007', 'Casaca Jeans', 'Casacas', 'L', 'Azul', 120.00, 20, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(10, 'P008', 'Chompa Lana', 'Chompas', 'M', 'Gris', 70.00, 25, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(11, 'P009', 'Short Deportivo', 'Shorts', 'M', 'Negro', 35.00, 90, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06'),
	(12, 'P010', 'Pantalón Drill', 'Pantalones', '32', 'Beige', 95.00, 35, NULL, '2026-06-10 23:39:06', '2026-06-10 23:39:06');

-- Volcando datos para la tabla creaciones_alexandra.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('CGIAGRInxvXP4I2nqAdVfYOP46Nv46tGI07wwwjD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidGZFcE5PcVViN1BiWkNrNU5uMmJNU0tNell5RmV0WTJieW1VTkFmZCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnZlbnRhcmlvIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1781135299);

-- Volcando datos para la tabla creaciones_alexandra.users: ~0 rows (aproximadamente)

-- Volcando datos para la tabla creaciones_alexandra.ventas: ~4 rows (aproximadamente)
INSERT INTO `ventas` (`id`, `cliente_id`, `fecha`, `total`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, '2026-06-10', 300.00, 'Pendiente', '2026-06-11 01:22:52', '2026-06-11 01:22:52'),
	(2, 1, '2026-06-10', 300.00, 'Pendiente', '2026-06-11 01:24:33', '2026-06-11 01:24:33'),
	(3, 1, '2026-06-10', 275.00, 'Pendiente', '2026-06-11 01:24:42', '2026-06-11 01:24:42'),
	(4, 1, '2026-05-31', 300.00, 'Pendiente', '2026-06-11 01:54:43', '2026-06-11 01:54:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
