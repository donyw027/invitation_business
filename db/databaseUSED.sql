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

-- Dumping structure for table ci3_invitation_business_v3.activity_logs
CREATE TABLE IF NOT EXISTS `activity_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `module` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.activity_logs: ~95 rows (approximately)
INSERT INTO `activity_logs` (`id`, `user_id`, `module`, `action`, `description`, `created_at`) VALUES
	(1, 1, 'templates', 'seed', 'Mengisi 11 template aktif sesuai folder tema yang tersedia.', '2026-04-05 12:41:00'),
	(2, 1, 'customers', 'seed', 'Mengisi customer dummy realistis untuk demo project.', '2026-04-05 12:42:00'),
	(3, 1, 'orders', 'seed', 'Mengisi 11 order berbayar agar otomatis punya project.', '2026-04-05 12:43:00'),
	(4, 1, 'projects', 'seed', 'Mengisi 11 project untuk seluruh template.', '2026-04-05 12:44:00'),
	(5, 1, 'guests', 'seed', 'Mengisi guest hanya untuk project invitation.', '2026-04-05 12:45:00'),
	(6, 1, 'wishes', 'seed', 'Mengisi wish demo untuk invitation dan greeting card.', '2026-04-05 12:46:00'),
	(7, 1, 'rsvps', 'seed', 'Mengisi RSVP demo untuk project invitation.', '2026-04-05 12:47:00'),
	(8, 1, 'projects', 'update', 'Mengubah project #1 (demo-romantic)', '2026-04-05 06:38:00'),
	(9, 1, 'projects', 'update', 'Mengubah project #2 (demo-floral)', '2026-04-05 06:38:42'),
	(10, 1, 'projects', 'update', 'Mengubah project #3 (demo-birthday)', '2026-04-05 06:39:15'),
	(11, 1, 'templates', 'update', 'Mengubah template #4', '2026-04-05 06:39:29'),
	(12, 1, 'projects', 'update', 'Mengubah project #4 (demo-khitan)', '2026-04-05 06:39:46'),
	(13, 1, 'projects', 'update', 'Mengubah project #5 (demo-tahlil)', '2026-04-05 06:40:24'),
	(14, 1, 'templates', 'update', 'Mengubah template #5', '2026-04-05 06:40:33'),
	(15, 1, 'projects', 'update', 'Mengubah project #6 (demo-greeting)', '2026-04-05 06:41:03'),
	(16, 1, 'projects', 'update', 'Mengubah project #7 (demo-greeting-bear)', '2026-04-05 06:41:27'),
	(17, 1, 'projects', 'update', 'Mengubah project #8 (demo-greeting-blossom)', '2026-04-05 06:42:03'),
	(18, 1, 'projects', 'update', 'Mengubah project #9 (demo-greeting-polaroid)', '2026-04-05 06:42:37'),
	(19, 1, 'projects', 'update', 'Mengubah project #10 (demo-greeting-sunflower)', '2026-04-05 06:43:02'),
	(20, 1, 'projects', 'update', 'Mengubah project #11 (demo-greeting-sunny-bunny)', '2026-04-05 06:43:33'),
	(21, 1, 'auth', 'login', 'User login ke admin panel', '2026-04-12 10:31:22'),
	(22, 1, 'users', 'delete', 'Menghapus admin user #3 (designer)', '2026-04-12 10:31:33'),
	(23, 1, 'users', 'delete', 'Menghapus admin user #2 (cs)', '2026-04-12 10:31:37'),
	(24, 1, 'users', 'create', 'Membuat admin user #4 (indah)', '2026-04-12 10:32:08'),
	(25, 4, 'auth', 'login', 'User login ke admin panel', '2026-04-12 10:32:43'),
	(26, 4, 'customers', 'create', 'Membuat customer #12', '2026-04-12 10:39:06'),
	(27, 4, 'customers', 'create', 'Membuat customer #13', '2026-04-12 10:39:38'),
	(28, 4, 'orders', 'create', 'Membuat order #12 (ORD-20260412-0001)', '2026-04-12 10:43:12'),
	(29, 4, 'projects', 'auto_create_from_order', 'Auto membuat project #12 dari order #12 (ORD-20260412-0001)', '2026-04-12 10:43:12'),
	(30, 4, 'projects', 'update', 'Mengubah project #12 (linda-ord-20260412-0001)', '2026-04-12 10:47:59'),
	(31, 4, 'projects', 'update', 'Mengubah project #12 (linda-ord-20260412-0001)', '2026-04-12 10:49:39'),
	(32, 4, 'orders', 'create', 'Membuat order #15 (ORD-20260412-0002)', '2026-04-12 10:53:13'),
	(33, 4, 'projects', 'auto_create_from_order', 'Auto membuat project #13 dari order #15 (ORD-20260412-0002)', '2026-04-12 10:53:13'),
	(34, 4, 'projects', 'update', 'Mengubah project #13 (sasa-ord-20260412-0002)', '2026-04-12 10:55:09'),
	(35, 4, 'projects', 'update', 'Mengubah project #13 (sasa-ord-20260412-0002)', '2026-04-12 10:55:35'),
	(36, 4, 'projects', 'update', 'Mengubah project #13 (sasa-ord-20260412-0002)', '2026-04-12 10:56:52'),
	(37, 4, 'projects', 'update', 'Mengubah project #13 (sasa-ord-20260412-0002)', '2026-04-12 10:57:10'),
	(38, 4, 'projects', 'update', 'Mengubah project #13 (sasa-ord-20260412-0002)', '2026-04-12 10:57:30'),
	(39, 1, 'auth', 'login', 'User login ke admin panel', '2026-05-05 11:36:34'),
	(40, 1, 'auth', 'logout', 'User logout dari admin panel', '2026-05-05 12:05:17'),
	(41, 1, 'auth', 'login', 'User login ke admin panel', '2026-05-05 12:05:23'),
	(42, 1, 'users', 'create', 'Membuat admin user #5 (doni)', '2026-05-05 12:05:54'),
	(43, 1, 'invitations', 'simple_create', 'Membuat undangan simple flow #14 dari order ORD-20260505-0001', '2026-05-05 12:10:49'),
	(44, 1, 'orders', 'create_simple_menu', 'Membuat order #17 (ORD-20260505-0002) via menu Undangan', '2026-05-05 12:25:34'),
	(45, 1, 'projects', 'auto_create_from_order_simple_menu', 'Auto membuat project #15 dari order #17 (ORD-20260505-0002) via menu Undangan', '2026-05-05 12:25:34'),
	(46, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-05 12:55:00'),
	(47, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-14 11:19:37'),
	(48, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-14 11:50:49'),
	(49, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-14 11:50:54'),
	(50, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-14 11:59:06'),
	(51, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-14 12:01:40'),
	(52, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-14 12:11:06'),
	(53, 1, 'auth', 'login', 'User login ke admin panel', '2026-05-14 12:11:10'),
	(54, 1, 'auth', 'logout', 'User logout dari admin panel', '2026-05-14 12:11:13'),
	(55, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-14 12:11:16'),
	(56, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-14 12:12:45'),
	(57, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-14 12:14:54'),
	(58, 5, 'orders', 'update', 'Mengubah order #18 (ORD-20260505-0003)', '2026-05-14 12:21:22'),
	(59, 5, 'orders', 'update', 'Mengubah order #17 (ORD-20260505-0002)', '2026-05-14 12:21:32'),
	(60, 5, 'orders', 'update', 'Mengubah order #16 (ORD-20260505-0001)', '2026-05-14 12:21:39'),
	(61, 5, 'orders', 'update', 'Mengubah order #16 (ORD-20260505-0001)', '2026-05-14 12:21:46'),
	(62, 5, 'orders', 'update', 'Mengubah order #15 (ORD-20260412-0002)', '2026-05-14 12:21:56'),
	(63, 5, 'orders', 'update', 'Mengubah order #12 (ORD-20260412-0001)', '2026-05-14 12:22:06'),
	(64, 5, 'orders', 'delete', 'Menghapus order #18', '2026-05-14 12:25:58'),
	(65, 5, 'orders', 'delete', 'Menghapus order #17', '2026-05-14 12:26:03'),
	(66, 5, 'orders', 'delete', 'Menghapus order #16', '2026-05-14 12:26:06'),
	(67, 5, 'orders', 'delete', 'Menghapus order #15', '2026-05-14 12:28:04'),
	(68, 5, 'orders', 'delete', 'Menghapus order #12', '2026-05-14 12:28:10'),
	(69, 5, 'customers', 'delete', 'Menghapus customer #16', '2026-05-14 12:28:40'),
	(70, 5, 'customers', 'delete', 'Menghapus customer #15', '2026-05-14 12:28:42'),
	(71, 5, 'customers', 'delete', 'Menghapus customer #14', '2026-05-14 12:28:44'),
	(72, 5, 'customers', 'delete', 'Menghapus customer #13', '2026-05-14 12:28:47'),
	(73, 5, 'customers', 'delete', 'Menghapus customer #12', '2026-05-14 12:28:50'),
	(74, 5, 'projects', 'update', 'Mengubah project #16 (invitation-stonio-ord-20260514-0002)', '2026-05-14 13:01:32'),
	(75, 5, 'projects', 'auto_create_from_order', 'Auto membuat project #17 dari order #21 (ORD-20260514-0001)', '2026-05-14 13:02:07'),
	(76, 5, 'customers', 'delete', 'Menghapus customer #17', '2026-05-14 13:05:37'),
	(77, 5, 'projects', 'update', 'Mengubah project #18 (invitation-stonio-ord-20260514-0001)', '2026-05-14 13:08:04'),
	(78, 5, 'projects', 'auto_create_from_order', 'Auto membuat project #19 dari order #23 (ORD-20260514-0001)', '2026-05-14 13:09:21'),
	(79, 5, 'orders', 'delete', 'Menghapus order #23', '2026-05-14 13:09:40'),
	(80, 5, 'customers', 'delete', 'Menghapus customer #18', '2026-05-14 13:09:59'),
	(81, 5, 'customers', 'delete', 'Menghapus customer #19', '2026-05-14 13:11:56'),
	(82, 5, 'orders', 'update', 'Mengubah order #11 (ORD-20260404-0002)', '2026-05-14 13:13:35'),
	(83, 5, 'orders', 'update', 'Mengubah order #10 (ORD-20260404-0001)', '2026-05-14 13:13:48'),
	(84, 5, 'orders', 'update', 'Mengubah order #9 (ORD-20260403-0004)', '2026-05-14 13:13:59'),
	(85, 5, 'orders', 'update', 'Mengubah order #8 (ORD-20260403-0003)', '2026-05-14 13:14:14'),
	(86, 5, 'orders', 'update', 'Mengubah order #7 (ORD-20260403-0002)', '2026-05-14 13:14:41'),
	(87, 5, 'orders', 'update', 'Mengubah order #6 (ORD-20260403-0001)', '2026-05-14 13:14:53'),
	(88, 5, 'orders', 'update', 'Mengubah order #5 (ORD-20260402-0003)', '2026-05-14 13:15:10'),
	(89, 5, 'orders', 'update', 'Mengubah order #4 (ORD-20260402-0002)', '2026-05-14 13:15:25'),
	(90, 5, 'orders', 'update', 'Mengubah order #3 (ORD-20260402-0001)', '2026-05-14 13:15:37'),
	(91, 5, 'orders', 'update', 'Mengubah order #2 (ORD-20260401-0002)', '2026-05-14 13:15:50'),
	(92, 5, 'orders', 'update', 'Mengubah order #1 (ORD-20260401-0001)', '2026-05-14 13:16:02'),
	(93, 5, 'projects', 'update', 'Mengubah project #21 (invitation-tomas-ultah-ord-20260514-0001)', '2026-05-14 13:21:15'),
	(94, 5, 'projects', 'update', 'Mengubah project #21 (invitation-tomas-ultah-ord-20260514-0001)', '2026-05-14 13:22:47'),
	(95, 5, 'projects', 'update', 'Mengubah project #21 (invitation-tomas-ultah-ord-20260514-0001)', '2026-05-14 13:23:09');

-- Dumping structure for table ci3_invitation_business_v3.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `source` varchar(80) DEFAULT NULL,
  `address` text,
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.customers: ~12 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `source`, `address`, `notes`, `created_at`) VALUES
	(1, 'Raka & Putri', '628123450001', 'raka.putri@example.com', 'Instagram', 'Jl. Merdeka No. 12, Kediri', 'Customer wedding dari DM Instagram.', '2026-03-28 09:10:00'),
	(2, 'Aldi & Siska', '628123450002', 'aldi.siska@example.com', 'WhatsApp', 'Jl. Hayam Wuruk No. 8, Blitar', 'Butuh undangan cepat untuk akad dan resepsi.', '2026-03-29 10:15:00'),
	(3, 'Keluarga Bima', '628123450003', 'bima.family@example.com', 'Repeat Order', 'Perumahan Griya Melati Blok C2, Tulungagung', 'Order undangan ulang tahun anak.', '2026-04-01 08:25:00'),
	(4, 'Keluarga Fajar', '628123450004', 'fajar.family@example.com', 'Referral', 'Jl. Veteran No. 55, Pare', 'Order undangan khitan dengan data tamu cukup banyak.', '2026-04-01 09:40:00'),
	(5, 'Keluarga Alm. Bapak Hasyim', '628123450005', 'hasyim.family@example.com', 'WhatsApp', 'Desa Ngadiluwih RT 03/RW 02, Kediri', 'Tema tahlil sederhana dan sopan.', '2026-04-02 07:45:00'),
	(6, 'Nadia', '628123450006', 'nadia@example.com', 'TikTok', 'Jl. Diponegoro No. 7, Kediri', 'Greeting card untuk sahabat.', '2026-04-02 10:00:00'),
	(7, 'Rendi', '628123450007', 'rendi@example.com', 'Instagram', 'Jl. Brawijaya No. 18, Tulungagung', 'Greeting card bertema bear.', '2026-04-02 10:15:00'),
	(8, 'Livia', '628123450008', 'livia@example.com', 'Instagram', 'Jl. Imam Bonjol No. 3, Blitar', 'Greeting blossom untuk ulang tahun mama.', '2026-04-03 08:05:00'),
	(9, 'Dito', '628123450009', 'dito@example.com', 'Shopee', 'Jl. Basuki Rahmat No. 4, Malang', 'Greeting polaroid untuk anniversary.', '2026-04-03 08:40:00'),
	(10, 'Maya', '628123450010', 'maya@example.com', 'Referral', 'Jl. Ahmad Yani No. 44, Kediri', 'Greeting sunflower untuk bestie.', '2026-04-03 09:15:00'),
	(11, 'Kevin', '628123450011', 'kevin@example.com', 'Website', 'Jl. Soekarno Hatta No. 91, Surabaya', 'Greeting bunny premium untuk pacar.', '2026-04-03 09:55:00'),
	(20, 'Tomas', '913', 'das@gmail.com', '213', '123', '123', '2026-05-14 13:19:08');

-- Dumping structure for table ci3_invitation_business_v3.guests
CREATE TABLE IF NOT EXISTS `guests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_name` varchar(150) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `slug` varchar(160) NOT NULL,
  `is_opened` tinyint(1) NOT NULL DEFAULT '0',
  `opened_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `slug` (`slug`),
  CONSTRAINT `guests_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.guests: ~19 rows (approximately)
INSERT INTO `guests` (`id`, `project_id`, `guest_name`, `phone`, `category`, `slug`, `is_opened`, `opened_at`, `created_at`) VALUES
	(1, 1, 'Keluarga Bapak Andi', '628131000001', 'Keluarga', 'keluarga-bapak-andi', 1, '2026-04-04 19:10:00', '2026-04-02 12:00:00'),
	(2, 1, 'Mbak Rini & Suami', '628131000002', 'Teman', 'mbak-rini-suami', 1, '2026-04-05 08:30:00', '2026-04-02 12:05:00'),
	(3, 1, 'Pak Hendra', '628131000003', 'Rekan Kerja', 'pak-hendra', 0, NULL, '2026-04-02 12:08:00'),
	(4, 1, 'Dewi & Keluarga', '628131000004', 'Teman Kuliah', 'dewi-keluarga', 1, '2026-04-05 09:00:00', '2026-04-02 12:12:00'),
	(5, 1, 'Keluarga Om Joko', '628131000005', 'Keluarga', 'keluarga-om-joko', 0, NULL, '2026-04-02 12:15:00'),
	(6, 2, 'Nita & Dimas', '628131000006', 'Teman', 'nita-dimas', 1, '2026-04-03 16:00:00', '2026-04-02 13:00:00'),
	(7, 2, 'Keluarga Pak Yudi', '628131000007', 'Keluarga', 'keluarga-pak-yudi', 1, '2026-04-03 16:20:00', '2026-04-02 13:05:00'),
	(8, 2, 'Mila', '628131000008', 'Teman Kantor', 'mila', 0, NULL, '2026-04-02 13:10:00'),
	(9, 2, 'Kak Arif', '628131000009', 'Saudara', 'kak-arif', 1, '2026-04-04 11:15:00', '2026-04-02 13:12:00'),
	(10, 3, 'Aisha', '628131000010', 'Teman Sekolah', 'aisha', 1, '2026-04-04 15:45:00', '2026-04-03 10:10:00'),
	(11, 3, 'Rafa', '628131000011', 'Teman Sekolah', 'rafa', 1, '2026-04-04 15:48:00', '2026-04-03 10:12:00'),
	(12, 3, 'Caca', '628131000012', 'Tetangga', 'caca', 0, NULL, '2026-04-03 10:14:00'),
	(13, 3, 'Keluarga Om Bayu', '628131000013', 'Keluarga', 'keluarga-om-bayu', 1, '2026-04-04 18:10:00', '2026-04-03 10:16:00'),
	(14, 4, 'Bapak Ustadz Rahman', '628131000014', 'Tokoh Masyarakat', 'bapak-ustadz-rahman', 1, '2026-04-04 20:20:00', '2026-04-03 11:00:00'),
	(15, 4, 'Keluarga Pak Seno', '628131000015', 'Tetangga', 'keluarga-pak-seno', 1, '2026-04-04 20:25:00', '2026-04-03 11:03:00'),
	(16, 4, 'Mbak Yuni', '628131000016', 'Keluarga', 'mbak-yuni', 0, NULL, '2026-04-03 11:05:00'),
	(17, 4, 'Pak RT', '628131000017', 'Tetangga', 'pak-rt', 1, '2026-04-04 21:00:00', '2026-04-03 11:08:00'),
	(18, 5, 'Keluarga Pak Ahmad', '628131000018', 'Keluarga', 'keluarga-pak-ahmad', 1, '2026-04-03 20:15:00', '2026-04-02 19:00:00'),
	(19, 5, 'Bu Nur', '628131000019', 'Tetangga', 'bu-nur', 1, '2026-04-03 20:30:00', '2026-04-02 19:03:00'),
	(20, 5, 'Pak Slamet', '628131000020', 'Kerabat', 'pak-slamet', 0, NULL, '2026-04-02 19:05:00');

-- Dumping structure for table ci3_invitation_business_v3.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) DEFAULT NULL,
  `customer_id` int unsigned NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `package_name` varchar(100) DEFAULT NULL,
  `template_id` int unsigned DEFAULT NULL,
  `assigned_user_id` int unsigned DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT 'unpaid',
  `status` varchar(30) DEFAULT 'new',
  `price` bigint NOT NULL DEFAULT '0',
  `discount` bigint NOT NULL DEFAULT '0',
  `final_price` bigint NOT NULL DEFAULT '0',
  `dp_amount` bigint NOT NULL DEFAULT '0',
  `paid_amount` bigint NOT NULL DEFAULT '0',
  `payment_method` varchar(40) DEFAULT 'bank_transfer',
  `payment_date` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `payment_proof` varchar(255) DEFAULT NULL,
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_no` (`order_no`),
  KEY `customer_id` (`customer_id`),
  KEY `template_id` (`template_id`),
  KEY `assigned_user_id` (`assigned_user_id`),
  CONSTRAINT `orders_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `orders_template_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `orders_user_fk` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.orders: ~12 rows (approximately)
INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `product_type`, `package_name`, `template_id`, `assigned_user_id`, `payment_status`, `status`, `price`, `discount`, `final_price`, `dp_amount`, `paid_amount`, `payment_method`, `payment_date`, `deadline_date`, `payment_proof`, `notes`, `created_at`) VALUES
	(1, 'ORD-20260401-0001', 1, 'invitation', 'Exclusive', 1, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-01', '2026-04-10', 'uploads/payments/order1.jpg', 'Wedding invitation untuk akad dan resepsi.', '2026-04-01 09:30:00'),
	(2, 'ORD-20260401-0002', 2, 'invitation', 'Premium', 2, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'qris', '2026-04-01', '2026-04-08', 'uploads/payments/order2.jpg', 'Undangan floral untuk intimate wedding.', '2026-04-01 10:00:00'),
	(3, 'ORD-20260402-0001', 3, 'invitation', 'Premium', 3, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-02', '2026-04-12', 'uploads/payments/order3.jpg', 'Birthday invitation untuk ulang tahun ke-7.', '2026-04-02 08:45:00'),
	(4, 'ORD-20260402-0002', 4, 'invitation', 'Exclusive', 4, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'ewallet', '2026-04-02', '2026-04-13', 'uploads/payments/order4.jpg', 'Undangan khitan dengan RSVP aktif.', '2026-04-02 09:20:00'),
	(5, 'ORD-20260402-0003', 5, 'invitation', 'Basic', 5, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'cash', '2026-04-02', '2026-04-06', 'uploads/payments/order5.jpg', 'Tahlil 7 hari, desain clean.', '2026-04-02 10:05:00'),
	(6, 'ORD-20260403-0001', 6, 'greeting_card', 'Greeting Basic', 6, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'qris', '2026-04-03', '2026-04-04', 'uploads/payments/order6.jpg', 'Greeting untuk ulang tahun sahabat.', '2026-04-03 09:00:00'),
	(7, 'ORD-20260403-0002', 7, 'greeting_card', 'Greeting Special', 7, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-03', '2026-04-05', 'uploads/payments/order7.jpg', 'Greeting bear untuk ucapan semangat.', '2026-04-03 09:30:00'),
	(8, 'ORD-20260403-0003', 8, 'greeting_card', 'Greeting Deluxe', 8, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'qris', '2026-04-03', '2026-04-06', 'uploads/payments/order8.jpg', 'Greeting blossom premium.', '2026-04-03 10:00:00'),
	(9, 'ORD-20260403-0004', 9, 'greeting_card', 'Greeting Special', 9, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-03', '2026-04-05', 'uploads/payments/order9.jpg', 'Greeting polaroid untuk anniversary ke-3.', '2026-04-03 10:20:00'),
	(10, 'ORD-20260404-0001', 10, 'greeting_card', 'Greeting Basic', 10, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'ewallet', '2026-04-04', '2026-04-05', 'uploads/payments/order10.jpg', 'Greeting sunflower untuk bestie.', '2026-04-04 08:15:00'),
	(11, 'ORD-20260404-0002', 11, 'greeting_card', 'Greeting Deluxe', 11, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-04', '2026-04-07', 'uploads/payments/order11.jpg', 'Greeting bunny premium untuk anniversary.', '2026-04-04 09:10:00'),
	(25, 'ORD-20260514-0001', 20, 'invitation', 'Premium', 3, 5, 'unpaid', 'new', 0, 0, 0, 0, 0, 'bank_transfer', '2026-05-14', '2026-05-14', NULL, '', '2026-05-14 13:19:44');

-- Dumping structure for table ci3_invitation_business_v3.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_type` varchar(80) NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` bigint NOT NULL DEFAULT '0',
  `old_price` bigint NOT NULL DEFAULT '0',
  `description` text,
  `features` text,
  `button_text` varchar(100) DEFAULT 'Pilih Paket',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.packages: ~6 rows (approximately)
INSERT INTO `packages` (`id`, `product_type`, `name`, `price`, `old_price`, `description`, `features`, `button_text`, `is_featured`, `is_active`, `sort_order`, `created_at`) VALUES
	(1, 'invitation', 'Basic', 79000, 0, 'Paket simple untuk undangan digital.', '1 halaman undangan\n1 template\nLink share\nRevisi minor 1x', 'Pilih Paket', 0, 1, 1, '2026-03-31 08:00:00'),
	(2, 'invitation', 'Premium', 129000, 149000, 'Paket favorit untuk invitation digital.', 'RSVP\nUcapan\n3 pilihan template\nRevisi 2x', 'Pilih Paket', 1, 1, 2, '2026-03-31 08:00:00'),
	(3, 'invitation', 'Exclusive', 199000, 229000, 'Paket invitation premium paling lengkap.', 'RSVP\nUcapan\nGift info\nPrioritas pengerjaan', 'Pilih Paket', 0, 1, 3, '2026-03-31 08:00:00'),
	(4, 'greeting_card', 'Greeting Basic', 49000, 0, 'Greeting card simple dan manis.', '1 halaman greeting\n1 template\nLink share', 'Pilih Paket', 0, 1, 1, '2026-03-31 08:00:00'),
	(5, 'greeting_card', 'Greeting Special', 69000, 0, 'Greeting card dengan desain premium.', 'Animasi\nTemplate premium\nLink share', 'Pilih Paket', 1, 1, 2, '2026-03-31 08:00:00'),
	(6, 'greeting_card', 'Greeting Deluxe', 89000, 0, 'Greeting card dengan custom lebih lengkap.', 'Animasi\nTemplate premium\nPrioritas pengerjaan', 'Pilih Paket', 0, 1, 3, '2026-03-31 08:00:00');

-- Dumping structure for table ci3_invitation_business_v3.product_types
CREATE TABLE IF NOT EXISTS `product_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `code` varchar(80) NOT NULL,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.product_types: ~2 rows (approximately)
INSERT INTO `product_types` (`id`, `name`, `code`, `description`, `is_active`, `sort_order`, `created_at`) VALUES
	(1, 'Invitation', 'invitation', 'Undangan digital untuk wedding, birthday, khitan, dan tahlil.', 1, 1, '2026-03-31 08:00:00'),
	(2, 'Greeting Card', 'greeting_card', 'Kartu ucapan digital untuk momen spesial personal.', 1, 2, '2026-03-31 08:00:00');

-- Dumping structure for table ci3_invitation_business_v3.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `source` varchar(30) NOT NULL DEFAULT 'manual',
  `product_type` varchar(50) NOT NULL,
  `template_id` int unsigned DEFAULT NULL,
  `assigned_user_id` int unsigned DEFAULT NULL,
  `slug` varchar(150) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `cover_text` varchar(200) DEFAULT NULL,
  `hero_image` text,
  `music_url` text,
  `event_date` date DEFAULT NULL,
  `event_time` varchar(80) DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `location_name` varchar(180) DEFAULT NULL,
  `location_address` text,
  `map_embed` text,
  `description` text,
  `sender_name` varchar(120) DEFAULT NULL,
  `receiver_name` varchar(120) DEFAULT NULL,
  `message_title` varchar(180) DEFAULT NULL,
  `message_body` text,
  `rsvp_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `wish_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `gift_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `gift_info` text,
  `revision_notes` text,
  `status` varchar(30) NOT NULL DEFAULT 'draft',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `order_id` (`order_id`),
  KEY `template_id` (`template_id`),
  KEY `assigned_user_id` (`assigned_user_id`),
  CONSTRAINT `projects_order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `projects_template_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `projects_user_fk` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.projects: ~12 rows (approximately)
INSERT INTO `projects` (`id`, `order_id`, `source`, `product_type`, `template_id`, `assigned_user_id`, `slug`, `title`, `subtitle`, `cover_text`, `hero_image`, `music_url`, `event_date`, `event_time`, `deadline_date`, `location_name`, `location_address`, `map_embed`, `description`, `sender_name`, `receiver_name`, `message_title`, `message_body`, `rsvp_enabled`, `wish_enabled`, `gift_enabled`, `gift_info`, `revision_notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'order_auto', 'invitation', 1, NULL, 'demo-romantic', 'Raka & Putri Wedding Invitation', 'We Are Getting Married', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/03/15/audio_c8f4a5f6b7.mp3?filename=wedding-strings-110624.mp3', '2026-05-17', '09:00 WIB - selesai', '2026-04-10', 'Grand Ballroom Lotus Kediri', 'Jl. Hasanudin No. 17, Kediri', '&lt;iframe src="https://maps.google.com/maps?q=Kediri&t=&z=13&ie=UTF8&iwloc=&output=embed"&gt;&lt;/iframe&gt;', 'Dengan penuh kebahagiaan kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara pernikahan kami.', '', '', 'Digital Invitation', 'Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu.', 1, 1, 1, 'Bank BCA 1234567890 a.n. Putri Maharani', 'Auto dibuat dari order paid: ORD-20260401-0001 | Template: Romantic Garden', 'published', '2026-04-01 09:35:00', '2026-04-05 06:38:00'),
	(2, 2, 'order_auto', 'invitation', 2, NULL, 'demo-floral', 'Aldi & Siska Intimate Wedding', 'Save The Date', 'Tanpa mengurangi rasa hormat, kami mengundang Anda untuk hadir.', 'https://images.unsplash.com/photo-1529636798458-92182e662485?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2021/11/25/audio_cb1f2f2e31.mp3?filename=romantic-piano-14274.mp3', '2026-04-20', '10:00 WIB', '2026-04-08', 'The Bloom Garden Hall Blitar', 'Jl. Melati Indah No. 25, Blitar', '&lt;iframe src="https://maps.google.com/maps?q=Blitar&t=&z=13&ie=UTF8&iwloc=&output=embed"&gt;&lt;/iframe&gt;', 'Undangan akad dan resepsi dengan nuansa taman bunga yang intimate.', '', '', 'Digital Invitation', 'Kami berharap kehadiran Anda dapat menambah kebahagiaan di hari istimewa kami.', 1, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260401-0002 | Template: Floral Classic', 'published', '2026-04-01 10:05:00', '2026-04-05 06:38:42'),
	(3, 3, 'order_auto', 'invitation', 3, NULL, 'demo-birthday', 'Birthday Party Nayla', 'Turning 7 with Joy', 'Yuk datang ke pesta ulang tahunku', 'https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/02/07/audio_3ec0d2e734.mp3?filename=happy-birthday-to-you-piano-version-17386.mp3', '2026-04-27', '15:30 WIB', '2026-04-12', 'Rumah Nayla', 'Perumahan Griya Melati Blok C2, Tulungagung', '&lt;iframe src="https://maps.google.com/maps?q=Tulungagung&t=&z=13&ie=UTF8&iwloc=&output=embed"&gt;&lt;/iframe&gt;', 'Pesta ulang tahun anak dengan games, snack corner, dan photobooth kecil.', 'Papa & Mama Nayla', 'Teman-teman Nayla', 'Birthday Invitation', 'Datang yaa, kita seru-seruan bareng dan rayakan ulang tahun Nayla yang ke-7!', 1, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260402-0001 | Template: Birthday Sparkle', 'published', '2026-04-02 08:50:00', '2026-04-05 06:39:15'),
	(4, 4, 'order_auto', 'invitation', 4, NULL, 'demo-khitan', 'Walimatul Khitan Ananda Farhan', 'Mohon doa restu atas khitan putra kami', 'Assalamuâ€™alaikum Warahmatullahi Wabarakatuh', 'https://images.unsplash.com/photo-1517164850305-99a3e65bb47e?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/10/25/audio_22da64ec87.mp3?filename=islamic-background-124008.mp3', '2026-04-26', '09:00 WIB - 14:00 WIB', '2026-04-13', 'Gedung Serbaguna Al Ikhlas Pare', 'Jl. KH. Ahmad Dahlan No. 11, Pare', '&lt;iframe src="https://maps.google.com/maps?q=Pare&t=&z=13&ie=UTF8&iwloc=&output=embed"&gt;&lt;/iframe&gt;', 'Dengan memohon rahmat Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk hadir pada acara walimatul khitan putra kami.', 'Bapak Fajar & Ibu Lilis', 'Ananda Farhan', 'Undangan Khitan', 'Merupakan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa terbaik.', 1, 1, 1, 'Konfirmasi hadiah melalui WhatsApp keluarga.', 'Auto dibuat dari order paid: ORD-20260402-0002 | Template: Khitan Kareem', 'published', '2026-04-02 09:25:00', '2026-04-05 06:39:46'),
	(5, 5, 'order_auto', 'invitation', 5, NULL, 'demo-tahlil', 'Doa Bersama & Tahlil', 'Mengenang 7 hari wafatnya Alm. Bapak Hasyim', 'Assalamuâ€™alaikum Warahmatullahi Wabarakatuh', 'https://images.unsplash.com/photo-1504052434569-70ad5836ab65?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/08/03/audio_4e6c137d5d.mp3?filename=peaceful-piano-112274.mp3', '2026-04-09', '18:30 WIB', '2026-04-06', 'Kediaman Alm. Bapak Hasyim', 'Desa Ngadiluwih RT 03/RW 02, Kediri', '&lt;iframe src="https://maps.google.com/maps?q=Ngadiluwih Kediri&t=&z=13&ie=UTF8&iwloc=&output=embed"&gt;&lt;/iframe&gt;', 'Kami mengundang keluarga, sahabat, dan kerabat untuk hadir dalam doa bersama dan tahlil.', '', '', 'Undangan Tahlil', 'Atas kehadiran dan doa yang dipanjatkan kami ucapkan terima kasih.', 1, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260402-0003 | Template: Tahlil Tribute', 'published', '2026-04-02 10:10:00', '2026-04-05 06:40:24'),
	(6, 6, 'order_auto', 'greeting_card', 6, NULL, 'demo-greeting', 'Happy Birthday Salsa', 'A little note for your special day', 'Open this little card with a smile', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/02/07/audio_3ec0d2e734.mp3?filename=happy-birthday-to-you-piano-version-17386.mp3', '2026-04-06', 'Anytime', '2026-04-04', '', '', '', 'Greeting card simple untuk mengucapkan selamat ulang tahun.', 'Nadia', 'Salsa', 'For Your Birthday', 'Semoga hari kamu secerah senyummu. Happy birthday and enjoy your beautiful day!', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0001 | Template: Classic Greeting', 'published', '2026-04-03 09:05:00', '2026-04-05 06:41:03'),
	(7, 7, 'order_auto', 'greeting_card', 7, NULL, 'demo-greeting-bear', 'Bear Hug for Rara', 'A warm card full of encouragement', 'A tiny bear is sending you a big hug', 'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/01/18/audio_4ca76af02a.mp3?filename=soft-piano-logo-13276.mp3', '2026-04-05', 'Anytime', '2026-04-05', '', '', '', 'Greeting card bertema bear untuk memberi semangat dan dukungan.', 'Rendi', 'Rara', 'You Are Doing Great', 'Peluk jauh dari aku. Semoga semua prosesmu dimudahkan dan kamu selalu kuat ya.', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0002 | Template: Bear Hug', 'published', '2026-04-03 09:35:00', '2026-04-05 06:41:27'),
	(8, 8, 'order_auto', 'greeting_card', 8, NULL, 'demo-greeting-blossom', 'Blossom Letter for Mama', 'Soft petals, warm words', 'A blooming note for the sweetest mom', 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/01/20/audio_1fd2f04f04.mp3?filename=piano-moment-9835.mp3', '2026-04-07', '19:00 WIB', '2026-04-06', 'Kediaman Mama', 'Jl. Imam Bonjol No. 3, Blitar', '', 'Greeting card bunga pastel untuk ucapan ulang tahun ibu.', 'Livia', 'Mama', 'For The Best Mom', 'Terima kasih untuk semua cinta dan doa. Semoga Mama selalu sehat dan bahagia.', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0003 | Template: Blossom Letter', 'published', '2026-04-03 10:05:00', '2026-04-05 06:42:03'),
	(9, 9, 'order_auto', 'greeting_card', 9, NULL, 'demo-greeting-polaroid', 'Polaroid Anniversary Card', 'Three years of little memories', 'A scrapbook of us', 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/03/10/audio_987ba1237f.mp3?filename=romantic-background-11262.mp3', '2026-04-08', '20:00 WIB', '2026-04-05', '', '', '', 'Greeting bergaya polaroid untuk anniversary.', 'Dito', 'Dita', 'Happy Anniversary', 'Terima kasih sudah hadir di setiap foto hidupku. Semoga kita terus bertumbuh bersama.', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0004 | Template: Polaroid Memories', 'published', '2026-04-03 10:25:00', '2026-04-05 06:42:37'),
	(10, 10, 'order_auto', 'greeting_card', 10, NULL, 'demo-greeting-sunflower', 'Sunflower Smile', 'Bright wishes for a bright soul', 'A little sunshine for you', 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/05/16/audio_b4ed09eb59.mp3?filename=ukulele-113580.mp3', '2026-04-05', 'Anytime', '2026-04-05', '', '', '', 'Greeting card sunflower untuk sahabat yang ceria.', 'Maya', 'Bella', 'Stay Golden', 'Tetap jadi orang yang hangat dan bersinar ya. Happy birthday, bestie!', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260404-0001 | Template: Sunflower Smile', 'published', '2026-04-04 08:20:00', '2026-05-05 11:40:57'),
	(11, 11, 'order_auto', 'greeting_card', 11, NULL, 'demo-greeting-sunny-bunny', 'Sunny Bunny Love Note', 'Cute, cozy, and made with love', 'Psst... open this bunny letter', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=1200&q=80', 'https://cdn.pixabay.com/download/audio/2022/03/15/audio_8dfdb240a4.mp3?filename=happy-mood-122840.mp3', '2026-04-07', '21:00 WIB', '2026-04-07', '', '', '', 'Greeting premium bertema bunny dengan nuansa manis.', 'Kevin', 'Alya', 'Just For You', 'Makasih sudah jadi rumah paling nyaman. Semoga kamu selalu bahagia, my bunny.', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260404-0002 | Template: Sunny Bunny', 'published', '2026-04-04 09:15:00', '2026-04-05 06:43:33'),
	(21, 25, 'quick_create', 'invitation', 3, 5, 'invitation-tomas-ultah-ord-20260514-0001', 'Invitation - Tomas Ultah', 'Tomas Ultah', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'uploads/projects/a67b08df66cb897b7dbc67eb782ea95a.png', '', '2026-05-28', '10:00 WIB', '2026-05-14', 'Graha Kartika Sidoarjo', 'Jl Surabaya No10', '', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when', 'Kroni', 'Krono', 'Tomas Ultah', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when', 0, 0, 1, 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, whenorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when', '', 'draft', '2026-05-14 13:21:07', '2026-05-14 13:23:09');

-- Dumping structure for table ci3_invitation_business_v3.project_galleries
CREATE TABLE IF NOT EXISTS `project_galleries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_galleries_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.project_galleries: ~13 rows (approximately)
INSERT INTO `project_galleries` (`id`, `project_id`, `image_path`, `caption`, `sort_order`, `created_at`) VALUES
	(1, 1, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 1 project 1', 1, '2026-04-04 10:00:00'),
	(2, 1, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 2 project 1', 2, '2026-04-04 10:00:00'),
	(3, 2, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 1 project 2', 1, '2026-04-04 10:00:00'),
	(4, 2, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 2 project 2', 2, '2026-04-04 10:00:00'),
	(5, 3, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 1 project 3', 1, '2026-04-04 10:00:00'),
	(6, 3, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 2 project 3', 2, '2026-04-04 10:00:00'),
	(7, 4, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 1 project 4', 1, '2026-04-04 10:00:00'),
	(8, 4, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 2 project 4', 2, '2026-04-04 10:00:00'),
	(9, 5, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 1 project 5', 1, '2026-04-04 10:00:00'),
	(10, 5, 'uploads/projects/gallery/b87924de387a08098b02da2b048a8c33.png', 'Gallery 2 project 5', 2, '2026-04-04 10:00:00'),
	(14, 21, 'uploads/projects/gallery/88353885d6aea75b25a6775d4c97bc6b.png', '1', 1, '2026-05-14 13:21:29'),
	(15, 21, 'uploads/projects/gallery/49afe735a435a86c3c7049c178f56849.png', '2', 2, '2026-05-14 13:21:41'),
	(16, 21, 'uploads/projects/gallery/fb83b207b8087a98ad59fbb6e36d2620.png', '3', 3, '2026-05-14 13:21:55');

-- Dumping structure for table ci3_invitation_business_v3.project_timelines
CREATE TABLE IF NOT EXISTS `project_timelines` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `status_label` varchar(100) DEFAULT NULL,
  `note` text NOT NULL,
  `approval_status` varchar(20) NOT NULL DEFAULT 'pending',
  `approved_by` int unsigned DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `project_timelines_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_timelines_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.project_timelines: ~8 rows (approximately)
INSERT INTO `project_timelines` (`id`, `project_id`, `user_id`, `status_label`, `note`, `approval_status`, `approved_by`, `approved_at`, `created_at`) VALUES
	(1, 1, NULL, 'Draft Awal', 'Konten awal wedding sudah dimasukkan sesuai brief customer.', 'approved', 1, '2026-04-02 15:10:00', '2026-04-02 14:45:00'),
	(2, 1, NULL, 'Revisi', 'Menyesuaikan jam resepsi dan gift info.', 'approved', 1, '2026-04-03 14:15:00', '2026-04-03 13:50:00'),
	(3, 2, NULL, 'Published', 'Project floral sudah dipublish dan link dikirim ke customer.', 'approved', 1, '2026-04-02 16:12:00', '2026-04-02 16:10:00'),
	(4, 3, NULL, 'Konten Masuk', 'Data birthday dan daftar tamu sudah lengkap.', 'approved', 1, '2026-04-03 11:25:00', '2026-04-03 11:20:00'),
	(5, 4, NULL, 'Revisi', 'Customer meminta penambahan gift info dan pembetulan nama venue.', 'approved', 1, '2026-04-04 10:35:00', '2026-04-04 10:30:00'),
	(6, 5, NULL, 'Published', 'Undangan tahlil sudah dikirim ke keluarga inti.', 'approved', 1, '2026-04-03 19:15:00', '2026-04-03 19:10:00'),
	(7, 8, NULL, 'Final Check', 'Greeting blossom sudah final dan siap dibagikan.', 'approved', 1, '2026-04-04 13:15:00', '2026-04-04 13:10:00'),
	(8, 11, NULL, 'Final Check', 'Sunny bunny sudah publish dengan musik aktif.', 'approved', 1, '2026-04-05 09:32:00', '2026-04-05 09:30:00');

-- Dumping structure for table ci3_invitation_business_v3.rsvps
CREATE TABLE IF NOT EXISTS `rsvps` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_id` int unsigned DEFAULT NULL,
  `guest_name` varchar(120) NOT NULL,
  `attendance_status` varchar(50) DEFAULT NULL,
  `guest_total` int DEFAULT '1',
  `note` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `guest_id` (`guest_id`),
  CONSTRAINT `rsvps_guest_fk` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `rsvps_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.rsvps: ~10 rows (approximately)
INSERT INTO `rsvps` (`id`, `project_id`, `guest_id`, `guest_name`, `attendance_status`, `guest_total`, `note`, `created_at`) VALUES
	(1, 1, 1, 'Keluarga Bapak Andi', 'Hadir', 2, 'InsyaAllah hadir.', '2026-04-04 19:12:00'),
	(2, 1, 2, 'Mbak Rini & Suami', 'Hadir', 2, 'Akan datang setelah akad.', '2026-04-05 08:32:00'),
	(3, 2, 6, 'Nita & Dimas', 'Hadir', 2, 'Sudah save tanggalnya.', '2026-04-03 16:05:00'),
	(4, 2, 7, 'Keluarga Pak Yudi', 'Hadir', 3, 'Kami hadir bertiga.', '2026-04-03 16:22:00'),
	(5, 3, 10, 'Aisha', 'Hadir', 1, 'Aku datang ya!', '2026-04-04 15:46:00'),
	(6, 3, 11, 'Rafa', 'Hadir', 1, 'Bawa hadiah kecil.', '2026-04-04 15:50:00'),
	(7, 4, 14, 'Bapak Ustadz Rahman', 'Hadir', 1, 'InsyaAllah hadir sebelum dzuhur.', '2026-04-04 20:22:00'),
	(8, 4, 15, 'Keluarga Pak Seno', 'Hadir', 4, 'Kami sekeluarga hadir.', '2026-04-04 20:27:00'),
	(9, 5, 18, 'Keluarga Pak Ahmad', 'Hadir', 2, 'Siap hadir untuk tahlil.', '2026-04-03 20:17:00'),
	(10, 5, 19, 'Bu Nur', 'Berhalangan', 1, 'Mohon maaf tidak bisa hadir, titip doa.', '2026-04-03 20:31:00');

-- Dumping structure for table ci3_invitation_business_v3.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.settings: ~3 rows (approximately)
INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
	(1, 'brand_name', 'My Simple Gift'),
	(2, 'wa_number', '6281234567890'),
	(3, 'auto_approve_wishes', '1');

-- Dumping structure for table ci3_invitation_business_v3.templates
CREATE TABLE IF NOT EXISTS `templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `product_type` varchar(50) NOT NULL DEFAULT 'wedding',
  `thumbnail` text,
  `description` text,
  `preview_mobile` varchar(255) DEFAULT NULL,
  `preview_desktop` varchar(255) DEFAULT NULL,
  `demo_url` text,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.templates: ~11 rows (approximately)
INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `thumbnail`, `description`, `preview_mobile`, `preview_desktop`, `demo_url`, `sort_order`, `is_active`, `created_at`) VALUES
	(1, 'Romantic Wedding', 'romantic', 'invitation', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=900&q=80', 'Tema wedding elegan dengan pasangan, bunga, dan nuansa romantis.', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80', 'i/demo-romantic', 1, 1, '2026-03-31 08:30:00'),
	(2, 'Floral Wedding', 'floral', 'invitation', 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=900&q=80', 'Tema wedding floral lembut dengan dekorasi bunga pastel.', 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=1200&q=80', 'i/demo-floral', 2, 1, '2026-03-31 08:31:00'),
	(3, 'Birthday Party', 'birthday', 'invitation', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Tema invitation ulang tahun dengan kue, lilin, dan pesta.', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=1200&q=80', 'i/demo-birthday', 3, 1, '2026-04-05 12:35:00'),
	(4, 'Khitan', 'khitan', 'invitation', 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?auto=format&fit=crop&w=900&q=80', 'Tema invitation khitan keluarga dengan suasana hangat dan meriah.', 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1519671482749-fd09be7ccebf?auto=format&fit=crop&w=1200&q=80', 'i/demo-khitan', 4, 1, '2026-04-05 12:37:00'),
	(5, 'Tahlil Invitation', 'tahlil', 'invitation', 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?auto=format&fit=crop&w=900&q=80', 'Tema invitation tahlil bernuansa tenang, sopan, dan khidmat.', 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?auto=format&fit=crop&w=1200&q=80', 'i/demo-tahlil', 5, 1, '2026-04-05 12:40:00'),
	(6, 'Greeting Birthday', 'greeting', 'greeting_card', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=900&q=80', 'Greeting ulang tahun dengan suasana ceria dan colorful.', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1200&q=80', 'i/demo-greeting', 6, 1, '2026-03-31 03:00:00'),
	(7, 'Greeting Bear', 'greeting_bear', 'greeting_card', 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=900&q=80', 'Greeting card lucu dengan vibe teddy bear hangat.', 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=1200&q=80', 'i/demo-greeting-bear', 7, 1, '2026-03-31 04:10:00'),
	(8, 'Greeting Blossom', 'greeting_blossom', 'greeting_card', 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=900&q=80', 'Greeting card pastel dengan bunga-bunga manis.', 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=1200&q=80', 'i/demo-greeting-blossom', 8, 1, '2026-03-31 21:37:00'),
	(9, 'Greeting Polaroid', 'greeting_polaroid', 'greeting_card', 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=900&q=80', 'Greeting card dengan gaya foto polaroid dan memory wall.', 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1200&q=80', 'i/demo-greeting-polaroid', 9, 1, '2026-03-31 04:28:00'),
	(10, 'Greeting Sunflower', 'greeting_sunflower', 'greeting_card', 'https://images.unsplash.com/photo-1470509037663-253afd7f0f51?auto=format&fit=crop&w=900&q=80', 'Greeting card cerah dengan nuansa bunga matahari.', 'https://images.unsplash.com/photo-1470509037663-253afd7f0f51?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1470509037663-253afd7f0f51?auto=format&fit=crop&w=1200&q=80', 'i/demo-greeting-sunflower', 10, 1, '2026-03-31 04:14:00'),
	(11, 'Greeting Sunny Bunny', 'greeting_sunny_bunny', 'greeting_card', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=900&q=80', 'Greeting card bunny lucu dengan nuansa kuning ceria.', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=500&q=80', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=1200&q=80', 'i/demo-greeting-sunny-bunny', 11, 1, '2026-03-31 04:18:00');

-- Dumping structure for table ci3_invitation_business_v3.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'admin',
  `photo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `photo`, `is_active`, `last_login_at`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', 'admin@example.com', '$2y$12$Mif.oYTiZ1LCKYtg73M/jOTEkdLNJS6WlzFbuXSQLHMX1toxPAt/6', 'super_admin', '', 1, '2026-05-14 12:11:10', '2026-03-31 08:00:00', '2026-03-31 08:00:00'),
	(4, 'Indah', 'indah', 'indah@gmail.com', '$2y$10$lyoP7Prw6sgcmmqMVSZpTuvBkneMPrR91ugHcjRpToD8Zh4H0UnF2', 'super_admin', '', 1, '2026-04-12 10:32:43', '2026-04-12 10:32:08', '2026-04-12 10:32:08'),
	(5, 'doni', 'doni', 'doniwicaksono27@gmail.com', '$2y$10$Y/lSRl.JBns7nuRIkDhOHuuPhU6/CLlvtNtcFEV52lOeTUn0y6xjC', 'super_admin', '', 1, '2026-05-14 12:14:54', '2026-05-05 12:05:54', '2026-05-05 12:05:54');

-- Dumping structure for table ci3_invitation_business_v3.wishes
CREATE TABLE IF NOT EXISTS `wishes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_name` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `wishes_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.wishes: ~13 rows (approximately)
INSERT INTO `wishes` (`id`, `project_id`, `guest_name`, `message`, `status`, `is_approved`, `created_at`) VALUES
	(1, 1, 'Mbak Rini', 'Semoga lancar sampai hari H dan menjadi keluarga sakinah mawaddah warahmah.', 'approved', 1, '2026-04-05 08:35:00'),
	(2, 1, 'Dewi', 'Happy wedding! Semoga selalu bahagia dan penuh berkah.', 'approved', 1, '2026-04-05 09:05:00'),
	(3, 2, 'Nita', 'Selamat menempuh hidup baru, semoga acaranya lancar ya.', 'approved', 1, '2026-04-03 16:10:00'),
	(4, 3, 'Aisha', 'Happy birthday Naylaa, semoga pestanya seru!', 'approved', 1, '2026-04-04 15:47:00'),
	(5, 3, 'Rafa', 'Selamat ulang tahun Nayla, sehat selalu ya.', 'approved', 1, '2026-04-04 15:52:00'),
	(6, 4, 'Pak RT', 'Semoga menjadi anak yang sholeh dan berbakti kepada orang tua.', 'approved', 1, '2026-04-04 21:02:00'),
	(7, 5, 'Bu Nur', 'Turut mendoakan semoga Allah memberikan tempat terbaik untuk beliau.', 'approved', 1, '2026-04-03 20:35:00'),
	(8, 6, 'Salsa', 'Aku suka banget kartunya, makasih Nad!', 'approved', 1, '2026-04-04 09:45:00'),
	(9, 7, 'Rara', 'Lucu banget bear-nya, aku terharu bacanya.', 'approved', 1, '2026-04-04 09:50:00'),
	(10, 8, 'Mama', 'Cantik sekali, Mama senang sekali bacanya.', 'approved', 1, '2026-04-04 13:20:00'),
	(11, 9, 'Dita', 'Aku simpan kartunya ya, manis banget.', 'approved', 1, '2026-04-04 11:45:00'),
	(12, 10, 'Bella', 'Sunflower-nya pas banget sama aku, thank you!', 'approved', 1, '2026-04-04 12:30:00'),
	(13, 11, 'Alya', 'Bunny card-nya gemes banget, aku suka sekali.', 'approved', 1, '2026-04-05 09:35:00'),
	(14, 11, 'Alya', 'Setiap detailnya kerasa personal, makasih ya sayang.', 'approved', 1, '2026-04-05 09:40:00'),
	(15, 3, 'doni', 'selamta ya', 'approved', 1, '2026-04-11 05:09:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
