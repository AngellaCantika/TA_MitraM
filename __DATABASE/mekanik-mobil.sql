-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.3.0 - MySQL Community Server - GPL
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

-- Dumping structure for table mekanik-mobil.alat_berat
CREATE TABLE IF NOT EXISTS `alat_berat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `komponen_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` bigint unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_perbaikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alat_berat_penanggung_jawab_foreign` (`penanggung_jawab`),
  CONSTRAINT `alat_berat_penanggung_jawab_foreign` FOREIGN KEY (`penanggung_jawab`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.alat_berat: ~2 rows (approximately)
INSERT INTO `alat_berat` (`id`, `merk`, `model`, `tanggal_masuk`, `komponen_kerusakan`, `penanggung_jawab`, `foto`, `status_perbaikan`, `created_at`, `updated_at`) VALUES
	(6, 'Crane', 'GR-300EX', '2024-05-26', 'Arm', 2, '1721902124.jpg', 'Sudah Selesai', '2024-07-04 01:35:24', '2024-07-25 03:28:45'),
	(7, 'Shantui', 'Bulldozer', '2024-06-25', 'Arm', 5, '1720082171.png', 'Pending', '2024-07-04 01:36:11', '2024-07-04 01:36:11'),
	(8, 'Crane', 'SD22', '2024-07-05', 'Crane', 14, '1721970195.jpg', 'Pending', '2024-07-25 22:03:15', '2024-07-25 22:04:17');

-- Dumping structure for table mekanik-mobil.daftar_mobil
CREATE TABLE IF NOT EXISTS `daftar_mobil` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `merk` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_masuk` date NOT NULL,
  `plat_nomer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_perbaikan` enum('Pending','Perbaikan','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `penanggung_jawab` bigint unsigned NOT NULL,
  `komponen_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `daftar_mobil_plat_nomer_unique` (`plat_nomer`),
  KEY `daftar_mobil_penanggung_jawab_foreign` (`penanggung_jawab`),
  CONSTRAINT `daftar_mobil_penanggung_jawab_foreign` FOREIGN KEY (`penanggung_jawab`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.daftar_mobil: ~4 rows (approximately)
INSERT INTO `daftar_mobil` (`id`, `merk`, `model`, `tgl_masuk`, `plat_nomer`, `status_perbaikan`, `penanggung_jawab`, `komponen_kerusakan`, `foto`, `created_at`, `updated_at`) VALUES
	(1, 'Nissan', 'Skyline R34', '2024-06-30', 'B123CDE', 'Pending', 4, 'Pintu Mobil', '1720081059.jpg', '2024-07-03 23:48:49', '2024-07-25 03:36:46'),
	(2, 'Subaru', 'Impreza', '2024-06-30', 'B123CDA', 'Perbaikan', 4, 'Tire', '1720079439.jpg', '2024-07-04 00:50:39', '2024-07-04 00:50:39'),
	(3, 'Suzuki Ertiga', 'Ertiga', '2024-06-30', 'B123CDEZ', 'Selesai', 4, 'Pintu Mobil', '1721901409.png', '2024-07-04 02:50:08', '2024-07-25 03:39:16'),
	(13, 'Nisssun', 'S-Presso', '2024-06-30', 'B123CDEA', 'Perbaikan', 4, 'Kaca Mobil', '1721970359.jpg', '2024-07-04 05:12:42', '2024-07-25 22:05:59'),
	(20, 'Suzuki', 'Suzuki XL7', '2024-07-17', 'B123CDEAA', 'Perbaikan', 14, 'Kaca Depan', '1722240541.png', '2024-07-29 01:09:01', '2024-07-29 01:09:01');

-- Dumping structure for table mekanik-mobil.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table mekanik-mobil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2024_05_03_092849_create_roles_table', 1),
	(6, '2024_05_08_131734_create_daftar_mobils_table', 2),
	(7, '2024_06_24_144523_create_alat_berat_table', 3),
	(8, '2024_06_24_144833_create_alat_berat_table', 4),
	(9, '2024_06_29_160215_add_status_perbaikan_to_alat_berat_table', 5),
	(10, '2024_07_02_061041_add_penanggung_jawab_to_daftar_mobil_table', 6),
	(11, '2024_07_03_150055_add_foto_komponen_kerusakan_to_daftar_mobil_table', 7),
	(12, '2024_07_04_053835_create_daftar_mobil_table', 8),
	(13, '2024_07_04_115928_add_unique_to_plat_nomer_on_daftar_mobil_table', 9);

-- Dumping structure for table mekanik-mobil.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table mekanik-mobil.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table mekanik-mobil.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_role_name_unique` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '2024-05-03 03:02:39', '2024-05-03 03:02:39'),
	(2, 'mekanik', '2024-05-03 03:02:39', '2024-05-03 03:02:39'),
	(3, 'user', '2024-05-03 03:02:39', '2024-05-03 03:02:39');

-- Dumping structure for table mekanik-mobil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mekanik-mobil.users: ~9 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Emilie Rutherford PhD', 'fzieme@example.com', '2024-05-03 03:02:39', '$2y$12$wnd90V5rEUqQtyAmnfJKueZyN.nY0a2G15irL4LHq1PiovoCgGvTa', 1, '5ve3hrCEDMgp8rusadr5NdYCgMDeVVBkfUhEzROwJYIJAmpG7Q7SfGXypV3B', '2024-05-03 03:02:39', '2024-05-03 03:02:39'),
	(2, 'Mayra Mann', 'dickinson.brandt@example.com', '2024-05-03 03:02:39', '$2y$12$wnd90V5rEUqQtyAmnfJKueZyN.nY0a2G15irL4LHq1PiovoCgGvTa', 2, 'apfMNsTcRn41D3LoWfqb3ERe13HQtt4eFrGPerkIpO1ZoOaywlWjE9zpulbC', '2024-05-03 03:02:39', '2024-05-03 03:02:39'),
	(4, 'Jacklyn Price', 'prutherford@example.com', '2024-05-03 03:02:39', '$2y$12$wnd90V5rEUqQtyAmnfJKueZyN.nY0a2G15irL4LHq1PiovoCgGvTa', 2, 'HT464DCBCd', '2024-05-03 03:02:39', '2024-05-03 03:02:39'),
	(5, 'Ms. Thalia Ruecker Jr.', 'phills@example.com', '2024-05-03 03:02:39', '$2y$12$wnd90V5rEUqQtyAmnfJKueZyN.nY0a2G15irL4LHq1PiovoCgGvTa', 2, 'qGbBSVpMOkw0dCOtxmvhrzPHLJJu5hXQZXZuEtGB0JBak4YpRPJi4cKdhGTl', '2024-05-03 03:02:39', '2024-07-03 05:57:49'),
	(6, 'upi', 'upi@gmail.com', NULL, '$2y$12$5cvjIqjMvbES9.Yt.K/OzOQbnVRpkNCli4/mebw./2pPKnfUaEJ3i', 1, NULL, '2024-05-30 03:39:48', '2024-05-30 04:44:49'),
	(7, 'user', 'user@gmail.com', NULL, '$2y$12$yT37lvA5GXpg3DF/S.9gAeNlWKt9aaT5hdZh6e.pYHNr1krju7W02', 2, NULL, '2024-06-02 23:00:33', '2024-07-03 05:57:55'),
	(9, 'User', 'user1@gmail.com', NULL, '$2y$12$l7iJ7zxUIJeGtaK2oBqgAea5foqoR/XvzYirRmb1pOKy1K/1WjTs6', 2, NULL, '2024-06-10 18:49:09', '2024-07-03 05:57:58'),
	(11, 'ATMIN', 'admin@admin.com', NULL, '$2y$12$V7qPu8dt743Doawf9Gip6ez.8bxZUVsNVJ3DFlBfhaXcH1ZWx8Pna', 1, NULL, '2024-06-29 09:41:16', '2024-06-29 09:43:11'),
	(12, 'mekanik', 'mekanik@mekanik.com', NULL, '$2y$12$EPsmaBqb71pYUK/EN00K.eNySDlF5Wp7KSQygD9oAjazPiA4sefQy', 2, NULL, '2024-07-01 22:59:18', '2024-07-01 22:59:18'),
	(13, 'Owain Carr', 'inimekanik@mail.com', NULL, '$2y$12$00zQxuSunoEUpP53K104c.AKIBjdzwE9nPZ67hhoYa8lLK.58sK86', 2, NULL, '2024-07-02 04:30:09', '2024-07-02 04:30:09'),
	(14, 'Agus Setiawan', 'agus@mekanik.com', NULL, '$2y$12$W8YZMZaFjzak9H3Sze5lTOAdIFtNBlIcM4d26iDFMTTpaWjoMWqU6', 2, NULL, '2024-07-04 01:51:51', '2024-07-04 01:51:51');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
