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


-- Dumping database structure for ci3_invitation_business_v3
CREATE DATABASE IF NOT EXISTS `ci3_invitation_business_v3` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ci3_invitation_business_v3`;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.activity_logs: ~7 rows (approximately)
INSERT INTO `activity_logs` (`id`, `user_id`, `module`, `action`, `description`, `created_at`) VALUES
	(1, 1, 'system', 'seed', 'Database operational berhasil di-seed', '2026-03-30 13:40:04'),
	(2, 1, 'projects', 'create', 'Membuat project #3 (konie-ultah)', '2026-03-30 13:42:00'),
	(3, 1, 'wishes', 'approve', 'Approve wish #3', '2026-03-30 13:43:41'),
	(4, 1, 'projects', 'create', 'Membuat project #4 (tess)', '2026-03-30 13:48:23'),
	(5, 1, 'projects', 'update', 'Mengubah project #4 (tess)', '2026-03-30 13:49:04'),
	(6, 1, 'projects', 'update', 'Mengubah project #4 (tess)', '2026-03-30 13:49:47'),
	(7, 1, 'users', 'delete', 'Menghapus admin user #2 (cs)', '2026-03-30 13:51:39'),
	(8, 1, 'templates', 'clone', 'Clone template #4 menjadi #5', '2026-03-30 14:06:10'),
	(9, 1, 'templates', 'update', 'Mengubah template #5', '2026-03-30 14:06:31'),
	(10, 1, 'projects', 'create', 'Membuat project #5 (ultahnich)', '2026-03-30 14:09:34'),
	(11, 1, 'templates', 'clone', 'Clone template #5 menjadi #6', '2026-03-30 14:12:13'),
	(12, 1, 'templates', 'update', 'Mengubah template #6', '2026-03-30 14:12:28'),
	(13, 1, 'projects', 'create', 'Membuat project #6 (dsadsa)', '2026-03-30 14:13:43'),
	(14, 1, 'templates', 'clone', 'Clone template #6 menjadi #7', '2026-03-30 14:16:29'),
	(15, 1, 'templates', 'update', 'Mengubah template #7', '2026-03-30 14:16:43'),
	(16, 1, 'projects', 'create', 'Membuat project #7 (sunibuno)', '2026-03-30 14:17:37'),
	(17, 1, 'templates', 'clone', 'Clone template #7 menjadi #8', '2026-03-30 14:24:54'),
	(18, 1, 'templates', 'update', 'Mengubah template #8', '2026-03-30 14:25:17'),
	(19, 1, 'projects', 'create', 'Membuat project #8 (dsadsa-1)', '2026-03-30 14:29:15');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.customers: ~2 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `source`, `address`, `notes`, `created_at`) VALUES
	(1, 'Albert', '081234567890', 'albert@example.com', 'Instagram', 'Sidoarjo', 'Sample customer wedding', '2026-03-30 13:40:04'),
	(2, 'Bella', '081298765432', 'bella@example.com', 'WhatsApp', 'Surabaya', 'Sample customer greeting card', '2026-03-30 13:40:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.guests: ~3 rows (approximately)
INSERT INTO `guests` (`id`, `project_id`, `guest_name`, `phone`, `category`, `slug`, `is_opened`, `opened_at`, `created_at`) VALUES
	(1, 1, 'Albert', '6281234567890', 'Keluarga', 'albert', 1, '2026-03-30 13:40:04', '2026-03-30 13:40:04'),
	(2, 1, 'Bapak Ahmad', '628222333444', 'VIP', 'bapak-ahmad', 0, NULL, '2026-03-30 13:40:04'),
	(3, 1, 'Ibu Rina', '', 'Teman', 'ibu-rina', 0, NULL, '2026-03-30 13:40:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.orders: ~2 rows (approximately)
INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `product_type`, `package_name`, `template_id`, `assigned_user_id`, `payment_status`, `status`, `price`, `discount`, `final_price`, `dp_amount`, `paid_amount`, `payment_method`, `payment_date`, `deadline_date`, `payment_proof`, `notes`, `created_at`) VALUES
	(1, 'ORD-20260314-0001', 1, 'wedding', 'Premium', 1, NULL, 'paid', 'in_progress', 129000, 0, 129000, 50000, 129000, 'bank_transfer', '2026-03-14', '2026-06-30', NULL, 'Order wedding sample', '2026-03-30 13:40:04'),
	(2, 'ORD-20260314-0002', 2, 'greeting_card', 'Greeting Pro', 3, NULL, 'paid', 'completed', 89000, 0, 89000, 0, 89000, 'qris', '2026-03-14', '2026-03-20', NULL, 'Order greeting card sample', '2026-03-30 13:40:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.packages: ~5 rows (approximately)
INSERT INTO `packages` (`id`, `product_type`, `name`, `price`, `old_price`, `description`, `features`, `button_text`, `is_featured`, `is_active`, `sort_order`, `created_at`) VALUES
	(1, 'wedding', 'Basic', 79000, 0, 'Paket entry level untuk undangan wedding.', '1 halaman undangan\n1 template\nRevisi minor 1x\nLink share', 'Pilih Paket', 0, 1, 1, '2026-03-30 13:40:04'),
	(2, 'wedding', 'Premium', 129000, 149000, 'Paket favorit untuk wedding invitation.', 'Wedding invitation\nRSVP & ucapan\n3 template pilihan\nRevisi 2x', 'Pilih Paket', 1, 1, 2, '2026-03-30 13:40:04'),
	(3, 'wedding', 'Exclusive', 199000, 0, 'Paket premium dengan fitur lebih lengkap.', 'Gift info\nRSVP & ucapan\nPrioritas pengerjaan\nTemplate premium', 'Pilih Paket', 0, 1, 3, '2026-03-30 13:40:04'),
	(4, 'greeting_card', 'Greeting Basic', 49000, 0, 'Kartu ucapan digital simple.', '1 halaman kartu\n1 template\nLink share', 'Pilih Paket', 0, 1, 1, '2026-03-30 13:40:04'),
	(5, 'greeting_card', 'Greeting Pro', 89000, 0, 'Kartu ucapan dengan desain lebih premium.', 'Animasi tampilan\nTemplate premium\nPrioritas pengerjaan', 'Pilih Paket', 1, 1, 2, '2026-03-30 13:40:04');

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
	(1, 'Wedding Invitation', 'wedding', 'Undangan digital untuk pernikahan', 1, 1, '2026-03-30 13:40:04'),
	(2, 'Greeting Card', 'greeting_card', 'Kartu ucapan digital', 1, 2, '2026-03-30 13:40:04');

-- Dumping structure for table ci3_invitation_business_v3.projects
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.projects: ~4 rows (approximately)
INSERT INTO `projects` (`id`, `order_id`, `product_type`, `template_id`, `assigned_user_id`, `slug`, `title`, `subtitle`, `cover_text`, `hero_image`, `music_url`, `event_date`, `event_time`, `deadline_date`, `location_name`, `location_address`, `map_embed`, `description`, `sender_name`, `receiver_name`, `message_title`, `message_body`, `rsvp_enabled`, `wish_enabled`, `gift_enabled`, `gift_info`, `revision_notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'wedding', 1, NULL, 'amel-budi', 'Amel & Budi', 'The Wedding Celebration', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1400&q=80', '', '2026-07-12', '10:00 WIB', '2026-06-30', 'Gedung Serbaguna Bahagia', 'Jl. Mawar No. 88, Sidoarjo', '', 'Dengan penuh kebahagiaan kami mengundang Anda untuk hadir di hari istimewa kami.', '', '', 'Wedding Invitation', '', 1, 1, 1, 'BCA 123456789 a.n. Amel Budi', 'Client minta revisi foto cover dan gift info.', 'published', '2026-03-30 13:40:04', '2026-03-30 13:40:04'),
	(2, 2, 'greeting_card', 3, NULL, 'happy-birthday-bella', 'Happy Birthday Bella', 'A Little Surprise For You', 'Untuk seseorang yang spesial', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1400&q=80', '', NULL, '', '2026-03-20', '', '', '', 'Semoga hari-harimu selalu penuh kebahagiaan, kesehatan, dan kejutan manis.', 'AKT Team', 'Bella', 'Best Wishes', 'Selamat ulang tahun. Semoga semua hal baik datang menghampirimu tahun ini.', 0, 0, 0, '', '', 'published', '2026-03-30 13:40:04', '2026-03-30 13:40:04'),
	(3, 1, 'greeting_card', 4, 1, 'konie-ultah', 'konie ultah', 'ultah brok', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'uploads/projects/083cffa99ed78aa651765babaf343a09.png', '', NULL, '10:00 WIB', '2026-03-30', '', '', '', 'selamat ultah cinaku', 'doni', 'indah', 'selaat ultah', 'selamat ultah', 0, 1, 0, '', 'dsadsasd', 'published', '2026-03-30 13:42:00', NULL),
	(4, 1, 'wedding', 2, 1, 'tess', 'tes menika', 'The Wedding Celebrationsss', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'uploads/projects/9fa8fc18000cc12a6bf5d217aa8957d0.png', '', '2026-03-28', '10:00 WIB', '2026-03-19', 'dsasad', 'dsasd', '', 'dsadas', 'dd', 'dd', 'A Special Greeting', 'ddddddddddd', 0, 1, 0, 'halo', 'dsakodas', 'published', '2026-03-30 13:48:23', '2026-03-30 13:49:46'),
	(5, 2, 'greeting_card', 5, 1, 'ultahnich', 'ultah nnicchh', 'ultah areknya', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'uploads/projects/faf3d3ba923be2db6a94b8bedfde1a4f.png', '', NULL, '10:00 WIB', '2026-03-30', '', '', '', '', 'roni', 'indah', 'A Special Greeting', 'selamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ain selamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ainselamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ainselamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ainselamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ainselamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ainselamat kamu adlaah teman terbaiku seapanjang masa sepanjang hidupku aku akan selalu berasaamaamu seriuss saayaa sangat mencintaii dirimu tidak mau yang ain', 0, 1, 0, '', '', 'published', '2026-03-30 14:09:34', NULL),
	(6, 1, 'greeting_card', 6, 1, 'dsadsa', 'sriuss nih kmau nikah', 'nika', 'Kepada Yth. Bapak/Ibu/Saudara/idsasad', 'uploads/projects/24f50928a7e9ed2791641323637ce13d.png', '', NULL, '10:00 WIB', '2026-03-30', '', '', '', 'dsaad', 'korini', 'indah', 'A Special Greeting', 'dsadasHistory, Purpose and Usage. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designsHistory, Purpose and Usage. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designsHistory, Purpose and Usage. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs', 0, 1, 0, '', '', 'published', '2026-03-30 14:13:43', NULL),
	(7, 1, 'greeting_card', 7, 1, 'sunibuno', 'suni buni xixix', 'cuni budi', 'Kepada Yth. Bapak/Ibu/Saudara/isdasd', '', '', NULL, '10:00 WIB', '2026-03-30', '', '', '', 'dsadsadsssssssssss', 'kroniggggggggggg', 'kinda', 'A Special Greeting', 'sssssssssssssssssssssssssssssssssgreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunnygreeting_sunny_bunny', 0, 1, 0, '', '', 'published', '2026-03-30 14:17:36', NULL),
	(8, 1, 'greeting_card', 8, 1, 'dsadsa-1', 'poladsajsadjisdajpl', 'dsaaaaaaaaaaaaaaaa', 'Kepada Yth. Bapak/Ibu/Saudara/isad', 'uploads/projects/edf6eae87af6fbb9e4d71b9dfe16a013.png', '', NULL, '10:00 WIB', '2026-03-30', '', '', '', 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'toni', 'ganteng', 'odkakdsakok', 'dsokaksoakselamat bolo kmau terbaik', 0, 1, 0, '', 'kodsakookdsaok', 'published', '2026-03-30 14:29:13', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.project_galleries: ~2 rows (approximately)
INSERT INTO `project_galleries` (`id`, `project_id`, `image_path`, `caption`, `sort_order`, `created_at`) VALUES
	(1, 1, 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80', 'Momen prewedding', 1, '2026-03-30 13:40:05'),
	(2, 1, 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1200&q=80', 'Venue wedding', 2, '2026-03-30 13:40:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.project_timelines: ~2 rows (approximately)
INSERT INTO `project_timelines` (`id`, `project_id`, `user_id`, `status_label`, `note`, `approval_status`, `approved_by`, `approved_at`, `created_at`) VALUES
	(1, 1, NULL, 'Kickoff', 'Project dibuat dan menunggu revisi cover photo dari client.', 'approved', 1, '2026-03-30 13:40:04', '2026-03-30 13:40:04'),
	(2, 1, NULL, 'Revision', 'Client minta update gift info dan foto cover.', 'pending', NULL, NULL, '2026-03-30 13:40:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.rsvps: ~0 rows (approximately)
INSERT INTO `rsvps` (`id`, `project_id`, `guest_id`, `guest_name`, `attendance_status`, `guest_total`, `note`, `created_at`) VALUES
	(1, 1, 3, 'Ibu Rina', 'Hadir', 2, 'InsyaAllah hadir', '2026-03-30 13:40:04');

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
	(3, 'auto_approve_wishes', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.templates: ~4 rows (approximately)
INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `thumbnail`, `description`, `preview_mobile`, `preview_desktop`, `demo_url`, `sort_order`, `is_active`, `created_at`) VALUES
	(1, 'Romantic Wedding', 'romantic', 'wedding', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=900&q=80', 'Tampilan clean dan elegan untuk wedding invitation.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/preview/amel-budi', 1, 1, '2026-03-30 13:40:04'),
	(2, 'Floral Wedding', 'floral', 'wedding', 'https://images.unsplash.com/photo-1525258946800-98cfd641d0de?auto=format&fit=crop&w=900&q=80', 'Warna lembut dengan info acara dan RSVP.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/preview/amel-budi', 2, 1, '2026-03-30 13:40:04'),
	(3, 'Greeting Special', 'greeting', 'greeting_card', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=900&q=80', 'Cocok untuk birthday, anniversary, dan ucapan spesial.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 1, 1, '2026-03-30 13:40:04'),
	(4, 'Greeting Blossom Animation', 'greeting_blossom', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, '2026-03-30 13:40:04'),
	(5, 'Greeting Bear', 'greeting_bear', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', '', '', 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, '2026-03-30 14:06:10'),
	(6, 'Greeting Sunflower', 'greeting_sunflower', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', '', '', 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, '2026-03-30 14:12:13'),
	(7, 'Greeting Sunny bunny', 'greeting_sunny_bunny', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', '', '', 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, '2026-03-30 14:16:29'),
	(8, 'Greeting Polaroid', 'greeting_polaroid', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', '', '', 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, '2026-03-30 14:24:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `photo`, `is_active`, `last_login_at`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', 'admin@example.com', '$2y$12$O7PZeXPDY3oHgZXe/hB5ZuQzOzKsKUhWPtijKLXQ91qqcLzvN3ptq', 'super_admin', '', 1, NULL, '2026-03-30 13:40:03', '2026-03-30 13:40:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.wishes: ~3 rows (approximately)
INSERT INTO `wishes` (`id`, `project_id`, `guest_name`, `message`, `status`, `is_approved`, `created_at`) VALUES
	(1, 1, 'Dewi', 'Selamat menempuh hidup baru, semoga langgeng dan bahagia selalu.', 'approved', 1, '2026-03-30 13:40:04'),
	(2, 1, 'Fahri', 'Happy wedding, lancar sampai hari H.', 'pending', 0, '2026-03-30 13:40:04'),
	(3, 1, 'korni', 'selamta ya', 'approved', 1, '2026-03-30 13:43:22');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
