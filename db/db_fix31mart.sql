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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.activity_logs: ~24 rows (approximately)
INSERT INTO `activity_logs` (`id`, `user_id`, `module`, `action`, `description`, `created_at`) VALUES
	(1, 1, 'system', 'seed', 'Database demo lengkap berhasil dibuat.', '2026-03-31 12:55:00'),
	(2, 2, 'orders', 'create', 'Membuat order #1 untuk Rayna Putri.', '2026-03-31 09:00:00'),
	(3, 2, 'orders', 'create', 'Membuat order #2 untuk Nadia Maharani.', '2026-03-31 09:05:00'),
	(4, 2, 'orders', 'create', 'Membuat order #3 untuk Anya Citra.', '2026-03-31 09:10:00'),
	(5, 2, 'orders', 'create', 'Membuat order #4 untuk Sasa Melati.', '2026-03-31 09:15:00'),
	(6, 2, 'orders', 'create', 'Membuat order #5 untuk Elsa Prameswari.', '2026-03-31 09:20:00'),
	(7, 2, 'orders', 'create', 'Membuat order #6 untuk Luna Maharani.', '2026-03-31 09:25:00'),
	(8, 2, 'orders', 'create', 'Membuat order #7 untuk Nina Kartika.', '2026-03-31 09:30:00'),
	(9, 2, 'orders', 'create', 'Membuat order #8 untuk Rio Saputra.', '2026-03-31 09:35:00'),
	(10, 1, 'projects', 'create', 'Auto create project #1 dari order #1.', '2026-03-31 10:00:00'),
	(11, 1, 'projects', 'create', 'Auto create project #2 dari order #2.', '2026-03-31 10:05:00'),
	(12, 1, 'projects', 'create', 'Auto create project #3 dari order #3.', '2026-03-31 10:10:00'),
	(13, 1, 'projects', 'create', 'Auto create project #4 dari order #4.', '2026-03-31 10:15:00'),
	(14, 1, 'projects', 'create', 'Auto create project #5 dari order #5.', '2026-03-31 10:20:00'),
	(15, 1, 'projects', 'create', 'Auto create project #6 dari order #6.', '2026-03-31 10:25:00'),
	(16, 1, 'projects', 'create', 'Membuat project manual #7 (bunny-love-nina).', '2026-03-31 10:40:00'),
	(17, 1, 'projects', 'create', 'Membuat project manual #8 (memory-for-rio).', '2026-03-31 10:45:00'),
	(18, 3, 'guests', 'import', 'Import 4 guest ke project Rayna & Fajar.', '2026-03-31 11:21:00'),
	(19, 3, 'guests', 'import', 'Import 3 guest ke project Nadia & Raka.', '2026-03-31 11:25:00'),
	(20, 1, 'wishes', 'approve', 'Approve wish #1 untuk project Rayna & Fajar.', '2026-03-31 14:31:00'),
	(21, 1, 'wishes', 'approve', 'Approve wish #4 untuk project Nadia & Raka.', '2026-03-31 15:11:00'),
	(22, 1, 'auth', 'logout', 'User logout dari admin panel', '2026-03-31 13:07:07'),
	(23, 1, 'auth', 'login', 'User login ke admin panel', '2026-03-31 13:07:11'),
	(24, 1, 'wishes', 'approve', 'Approve wish #9', '2026-03-31 13:09:46'),
	(25, 1, 'projects', 'create', 'Membuat project #9 (m1m1m1)', '2026-03-31 13:41:40'),
	(26, 1, 'projects', 'update', 'Mengubah project #9 (m1m1m1)', '2026-03-31 13:44:57'),
	(27, 1, 'projects', 'update', 'Mengubah project #9 (m1m1m1)', '2026-03-31 13:45:42'),
	(28, 1, 'projects', 'update', 'Mengubah project #9 (m1m1m1)', '2026-03-31 13:46:45'),
	(29, 1, 'projects', 'update', 'Mengubah project #9 (m1m1m1)', '2026-03-31 13:49:15'),
	(30, 1, 'projects', 'create', 'Membuat project #10 (2222222222222222)', '2026-03-31 14:03:51'),
	(31, 1, 'projects', 'update', 'Mengubah project #10 (2222222222222222)', '2026-03-31 14:05:27'),
	(32, 1, 'projects', 'update', 'Mengubah project #9 (m1m1m1)', '2026-03-31 14:15:19'),
	(33, 1, 'wishes', 'approve', 'Approve wish #11', '2026-03-31 14:17:07'),
	(34, 1, 'projects', 'update', 'Mengubah project #9 (m1m1m1)', '2026-03-31 14:19:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.customers: ~8 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `source`, `address`, `notes`, `created_at`) VALUES
	(1, 'Rayna Putri', '628111111111', 'rayna@example.com', 'Instagram', 'Sidoarjo', 'Order wedding tema romantic', '2026-03-31 08:10:00'),
	(2, 'Nadia Maharani', '628111111112', 'nadia@example.com', 'WhatsApp', 'Surabaya', 'Order wedding tema floral', '2026-03-31 08:12:00'),
	(3, 'Anya Citra', '628111111113', 'anya@example.com', 'TikTok', 'Malang', 'Birthday greeting card', '2026-03-31 08:14:00'),
	(4, 'Sasa Melati', '628111111114', 'sasa@example.com', 'Instagram', 'Gresik', 'Anniversary blossom card', '2026-03-31 08:16:00'),
	(5, 'Elsa Prameswari', '628111111115', 'elsa@example.com', 'Referral', 'Sidoarjo', 'Cute bear greeting', '2026-03-31 08:18:00'),
	(6, 'Luna Maharani', '628111111116', 'luna@example.com', 'WhatsApp', 'Mojokerto', 'Sunflower greeting card', '2026-03-31 08:20:00'),
	(7, 'Nina Kartika', '628111111117', 'nina@example.com', 'Instagram', 'Pasuruan', 'Belum lunas bunny card', '2026-03-31 08:22:00'),
	(8, 'Rio Saputra', '628111111118', 'rio@example.com', 'Shopee Chat', 'Jombang', 'DP polaroid card', '2026-03-31 08:24:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.guests: ~7 rows (approximately)
INSERT INTO `guests` (`id`, `project_id`, `guest_name`, `phone`, `category`, `slug`, `is_opened`, `opened_at`, `created_at`) VALUES
	(1, 1, 'Bapak Ahmad', '628222333444', 'Keluarga', 'bapak-ahmad', 1, '2026-03-31 13:11:41', '2026-03-31 11:20:00'),
	(2, 1, 'Ibu Rina', '628222333445', 'Keluarga', 'ibu-rina', 1, '2026-03-31 14:10:00', '2026-03-31 11:20:00'),
	(3, 1, 'Dimas & Keluarga', '628222333446', 'Teman', 'dimas-keluarga', 1, '2026-03-31 13:19:04', '2026-03-31 11:21:00'),
	(4, 1, 'Kantor AKT Team', '628222333447', 'Rekan Kerja', 'kantor-akt-team', 1, '2026-03-31 15:00:00', '2026-03-31 11:21:00'),
	(5, 2, 'Pak Hendra', '628333444551', 'Keluarga', 'pak-hendra', 1, '2026-03-31 13:15:00', '2026-03-31 11:25:00'),
	(6, 2, 'Bu Siska', '628333444552', 'Teman', 'bu-siska', 0, NULL, '2026-03-31 11:25:00'),
	(7, 2, 'Raka Office', '628333444553', 'Rekan Kerja', 'raka-office', 1, '2026-03-31 16:20:00', '2026-03-31 11:25:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.orders: ~8 rows (approximately)
INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `product_type`, `package_name`, `template_id`, `assigned_user_id`, `payment_status`, `status`, `price`, `discount`, `final_price`, `dp_amount`, `paid_amount`, `payment_method`, `payment_date`, `deadline_date`, `payment_proof`, `notes`, `created_at`) VALUES
	(1, 'ORD-20260331-0001', 1, 'wedding', 'Premium', 1, 2, 'paid', 'in_progress', 129000, 0, 129000, 50000, 129000, 'bank_transfer', '2026-03-31', '2026-07-10', NULL, 'Auto project wedding romantic', '2026-03-31 09:00:00'),
	(2, 'ORD-20260331-0002', 2, 'wedding', 'Exclusive', 2, 2, 'paid', 'in_progress', 199000, 10000, 189000, 100000, 189000, 'bank_transfer', '2026-03-31', '2026-08-05', NULL, 'Auto project wedding floral', '2026-03-31 09:05:00'),
	(3, 'ORD-20260331-0003', 3, 'greeting_card', 'Greeting Special', 3, 2, 'paid', 'completed', 69000, 0, 69000, 0, 69000, 'qris', '2026-03-31', '2026-04-04', NULL, 'Auto greeting special', '2026-03-31 09:10:00'),
	(4, 'ORD-20260331-0004', 4, 'greeting_card', 'Greeting Special', 4, 2, 'paid', 'in_progress', 69000, 0, 69000, 0, 69000, 'bank_transfer', '2026-03-31', '2026-04-07', NULL, 'Auto blossom greeting', '2026-03-31 09:15:00'),
	(5, 'ORD-20260331-0005', 5, 'greeting_card', 'Greeting Deluxe', 5, 2, 'paid', 'in_progress', 89000, 5000, 84000, 0, 84000, 'qris', '2026-03-31', '2026-04-06', NULL, 'Auto bear greeting', '2026-03-31 09:20:00'),
	(6, 'ORD-20260331-0006', 6, 'greeting_card', 'Greeting Deluxe', 6, 2, 'paid', 'completed', 89000, 0, 89000, 0, 89000, 'bank_transfer', '2026-03-31', '2026-04-08', NULL, 'Auto sunflower greeting', '2026-03-31 09:25:00'),
	(7, 'ORD-20260331-0007', 7, 'greeting_card', 'Greeting Deluxe', 7, 2, 'unpaid', 'new', 89000, 0, 89000, 0, 0, 'bank_transfer', NULL, '2026-04-10', NULL, 'Belum paid jadi belum auto project', '2026-03-31 09:30:00'),
	(8, 'ORD-20260331-0008', 8, 'greeting_card', 'Greeting Deluxe', 8, 2, 'dp', 'waiting_payment', 89000, 0, 89000, 30000, 30000, 'bank_transfer', '2026-03-31', '2026-04-11', NULL, 'DP dulu jadi belum auto project', '2026-03-31 09:35:00');

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
	(1, 'wedding', 'Basic', 79000, 0, 'Paket simple untuk undangan digital.', '1 halaman undangan\n1 template\nLink share\nRevisi minor 1x', 'Pilih Paket', 0, 1, 1, '2026-03-31 08:00:00'),
	(2, 'wedding', 'Premium', 129000, 149000, 'Paket favorit untuk wedding invitation.', 'RSVP\nUcapan\n3 pilihan template\nRevisi 2x', 'Pilih Paket', 1, 1, 2, '2026-03-31 08:00:00'),
	(3, 'wedding', 'Exclusive', 199000, 229000, 'Paket wedding premium paling lengkap.', 'RSVP\nUcapan\nGift info\nPrioritas pengerjaan', 'Pilih Paket', 0, 1, 3, '2026-03-31 08:00:00'),
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
	(1, 'Wedding Invitation', 'wedding', 'Undangan digital untuk pernikahan', 1, 1, '2026-03-31 08:00:00'),
	(2, 'Greeting Card', 'greeting_card', 'Kartu ucapan digital', 1, 2, '2026-03-31 08:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.projects: ~8 rows (approximately)
INSERT INTO `projects` (`id`, `order_id`, `source`, `product_type`, `template_id`, `assigned_user_id`, `slug`, `title`, `subtitle`, `cover_text`, `hero_image`, `music_url`, `event_date`, `event_time`, `deadline_date`, `location_name`, `location_address`, `map_embed`, `description`, `sender_name`, `receiver_name`, `message_title`, `message_body`, `rsvp_enabled`, `wish_enabled`, `gift_enabled`, `gift_info`, `revision_notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'order_auto', 'wedding', 1, 3, 'rayna-fajar', 'Rayna & Fajar', 'The Wedding Celebration', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', '2026-07-12', '10:00 WIB', '2026-07-05', 'Graha Kartika Sidoarjo', 'Jl. Pahlawan No. 88, Sidoarjo', '<iframe src="https://maps.google.com"></iframe>', 'Dengan penuh sukacita kami mengundang Anda untuk hadir di hari bahagia kami.', 'Rayna', 'Fajar', 'Wedding Invitation', 'Merupakan suatu kehormatan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir dan memberikan doa restu.', 1, 1, 1, 'BCA 123456789 a.n. Rayna Putri', 'Revisi cover selesai, siap dibagikan.', 'published', '2026-03-31 10:00:00', '2026-03-31 12:15:00'),
	(2, 2, 'order_auto', 'wedding', 2, 3, 'nadia-raka', 'Nadia & Raka', 'Save The Date', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3', '2026-08-09', '09:30 WIB', '2026-08-02', 'Garden Palace Surabaya', 'Jl. Basuki Rahmat No. 1, Surabaya', '<iframe src="https://maps.google.com"></iframe>', 'Mohon doa restu untuk perjalanan baru kami.', 'Nadia', 'Raka', 'Wedding Invitation', 'Kami berharap kehadiran Anda akan menambah kebahagiaan di hari istimewa kami.', 1, 1, 1, 'Mandiri 987654321 a.n. Nadia Maharani', 'Client setuju tema floral dan gift info aktif.', 'published', '2026-03-31 10:05:00', '2026-03-31 12:20:00'),
	(3, 3, 'order_auto', 'greeting_card', 3, 3, 'happy-birthday-anya', 'Happy Birthday Anya', 'A Sweet Note For You', 'Untuk seseorang yang spesial', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3', NULL, '', '2026-04-04', '', '', '', 'Semoga semua hal baik datang menghampirimu tahun ini.', 'Doni', 'Anya', 'Best Wishes', 'Selamat ulang tahun. Semoga selalu sehat, bahagia, dan makin bersinar setiap harinya.', 0, 1, 0, '', 'Sudah final, tinggal share link.', 'published', '2026-03-31 10:10:00', '2026-03-31 12:25:00'),
	(4, 4, 'order_auto', 'greeting_card', 4, 3, 'bloom-for-sasa', 'Bloom For Sasa', 'Happy Anniversary', 'Open your special card', 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3', NULL, '', '2026-04-07', '', '', '', 'Terima kasih sudah hadir dalam kisah indah ini.', 'Aldy', 'Sasa', 'For My Favorite Person', 'Semoga hari-hari kita terus dipenuhi bunga, tawa, dan cerita manis.', 0, 1, 0, '', 'Masih bisa tambah 1 foto lagi kalau perlu.', 'published', '2026-03-31 10:15:00', '2026-03-31 12:30:00'),
	(5, 5, 'order_auto', 'greeting_card', 5, 3, 'hug-day-elsa', 'Hug Day Elsa', 'A Warm Bear Hug', 'Open your cute surprise', 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-5.mp3', NULL, '', '2026-04-06', '', '', '', 'Peluk virtual paling hangat untukmu hari ini.', 'Reno', 'Elsa', 'Sending You Love', 'Semoga harimu semanis pelukan yang hangat dan senyummu selalu terjaga.', 0, 1, 0, '', 'Tema bear dipilih karena customer suka yang lucu.', 'published', '2026-03-31 10:20:00', '2026-03-31 12:35:00'),
	(6, 6, 'order_auto', 'greeting_card', 6, 3, 'shine-for-luna', 'Shine For Luna', 'Sunflower Day', 'A little sunshine for you', 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-6.mp3', NULL, '', '2026-04-08', '', '', '', 'Teruslah bersinar seperti bunga matahari yang selalu mencari cahaya.', 'Tama', 'Luna', 'Keep Shining', 'Semoga semangatmu terus tumbuh dan kebahagiaan selalu mengikuti langkahmu.', 0, 1, 0, '', 'Sudah siap publish dan link sudah dicek.', 'published', '2026-03-31 10:25:00', '2026-03-31 12:40:00'),
	(7, NULL, 'manual', 'greeting_card', 7, 1, 'bunny-love-nina', 'Bunny Love Nina', 'Manual Project Demo', 'Klik untuk buka kartu ucapan', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-7.mp3', NULL, '', '2026-04-15', '', '', '', 'Project manual tanpa order untuk demo pembuatan langsung dari menu project.', 'Admin', 'Nina', 'A Special Greeting', 'Ini contoh project manual, jadi kamu bisa lihat bahwa menu tambah project tetap bisa dipakai tanpa order.', 0, 1, 0, '', 'Project dibuat manual untuk kebutuhan demo sistem.', 'draft', '2026-03-31 10:40:00', '2026-03-31 12:50:00'),
	(8, NULL, 'manual', 'greeting_card', 8, 1, 'memory-for-rio', 'Memory For Rio', 'Manual Polaroid Demo', 'Open your memory wall', 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=1400&q=80', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-8.mp3', NULL, '', '2026-04-18', '', '', '', 'Project manual polaroid untuk demo tema manual kedua.', 'Admin', 'Rio', 'Memory Lane', 'Ini contoh project manual kedua supaya terlihat perbedaan project manual dan auto dari order.', 0, 1, 0, '', 'Masih draft agar kamu bisa tes publish/unpublish.', 'draft', '2026-03-31 10:45:00', '2026-03-31 12:55:00'),
	(9, 8, 'manual', 'wedding', 1, 1, 'm1m1m1', 'm1', '32131', '32132', 'uploads/projects/047166242ba48a9feacfd0ad30056848.png', 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-4.mp3', '2026-04-09', '10:00 WIB', '2026-03-31', 'lokasi', 'alamat lokasi', '&lt;iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126506.21499607957!2d112.66716203287704!3d-7.755928454935939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d1a166d0d409:0x7244848227c6251a!2sAlun-Alun Karangsono!5e0!3m2!1sen!2sid!4v1774964655854!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"&gt;&lt;/iframe&gt;', 'm1', '32121', '32312', '221', 'dsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 1, 1, 'gift info', '', 'published', '2026-03-31 13:41:38', '2026-03-31 14:19:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.project_galleries: ~6 rows (approximately)
INSERT INTO `project_galleries` (`id`, `project_id`, `image_path`, `caption`, `sort_order`, `created_at`) VALUES
	(1, 1, 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80', 'Prewedding Session', 1, '2026-03-31 11:00:00'),
	(2, 1, 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1200&q=80', 'Venue Reception', 2, '2026-03-31 11:00:00'),
	(3, 2, 'https://images.unsplash.com/photo-1522673607200-164d1b6ce486?auto=format&fit=crop&w=1200&q=80', 'Garden Session', 1, '2026-03-31 11:05:00'),
	(4, 2, 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=1200&q=80', 'Engagement Moment', 2, '2026-03-31 11:05:00'),
	(5, 4, 'https://images.unsplash.com/photo-1518199266791-5375a83190b7?auto=format&fit=crop&w=1200&q=80', 'Pastel Blossom', 1, '2026-03-31 11:10:00'),
	(6, 8, 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1200&q=80', 'Polaroid Cover', 1, '2026-03-31 11:15:00'),
	(7, 9, 'uploads/projects/gallery/d81f0359245ba457da9723f4cd040192.png', '1', 1, '2026-03-31 13:45:10'),
	(8, 9, 'uploads/projects/gallery/4bb3d789cfc42c015d26021a98ec1194.png', '2', 2, '2026-03-31 13:45:35'),
	(13, 4, 'uploads/projects/gallery/4c84213883817124b0fcca1f4ef311ce.png', '', 2, '2026-03-31 14:33:02');

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
	(1, 1, 3, 'Kickoff', 'Project auto dibuat saat order paid dan langsung diproses designer.', 'approved', 1, '2026-03-31 10:10:00', '2026-03-31 10:00:00'),
	(2, 1, 3, 'Revision', 'Client meminta update foto cover dan wording pembuka.', 'approved', 1, '2026-03-31 11:30:00', '2026-03-31 11:00:00'),
	(3, 1, 3, 'Published', 'Link sudah live dan siap dibagikan ke tamu.', 'approved', 1, '2026-03-31 12:15:00', '2026-03-31 12:15:00'),
	(4, 2, 3, 'Kickoff', 'Tema floral dipilih dari order dan auto masuk project.', 'approved', 1, '2026-03-31 10:15:00', '2026-03-31 10:05:00'),
	(5, 2, 3, 'Content Ready', 'Data acara, lokasi, dan gift info sudah lengkap.', 'approved', 1, '2026-03-31 11:40:00', '2026-03-31 11:20:00'),
	(6, 3, 3, 'Published', 'Greeting card final dan sudah dikirim ke customer.', 'approved', 1, '2026-03-31 12:25:00', '2026-03-31 10:10:00'),
	(7, 7, 1, 'Manual Create', 'Project manual dibuat langsung dari menu project tanpa order.', 'pending', NULL, NULL, '2026-03-31 10:40:00'),
	(8, 8, 1, 'Manual Draft', 'Project manual kedua disimpan sebagai draft untuk tes publish.', 'pending', NULL, NULL, '2026-03-31 10:45:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.rsvps: ~6 rows (approximately)
INSERT INTO `rsvps` (`id`, `project_id`, `guest_id`, `guest_name`, `attendance_status`, `guest_total`, `note`, `created_at`) VALUES
	(1, 1, 1, 'Bapak Ahmad', 'Hadir', 2, 'InsyaAllah hadir berdua.', '2026-03-31 14:02:00'),
	(2, 1, 2, 'Ibu Rina', 'Tidak Hadir', 1, 'Mohon maaf belum bisa datang, semoga lancar sampai hari H.', '2026-03-31 14:12:00'),
	(3, 1, 4, 'Kantor AKT Team', 'Hadir', 5, 'Perwakilan kantor akan hadir.', '2026-03-31 15:05:00'),
	(4, 2, 5, 'Pak Hendra', 'Hadir', 3, 'Kami hadir bertiga ya.', '2026-03-31 13:18:00'),
	(5, 2, 7, 'Raka Office', 'Hadir', 4, 'Tim office siap datang.', '2026-03-31 16:25:00'),
	(6, 1, NULL, 'kronisssa', 'Hadir', 10, '', '2026-03-31 13:09:26');

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

-- Dumping data for table ci3_invitation_business_v3.templates: ~8 rows (approximately)
INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `thumbnail`, `description`, `preview_mobile`, `preview_desktop`, `demo_url`, `sort_order`, `is_active`, `created_at`) VALUES
	(1, 'Romantic Wedding', 'romantic', 'wedding', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=900&q=80', 'Tema wedding clean elegan dengan nuansa romantis.', NULL, NULL, 'http://localhost/invitation_business/preview/rayna-fajar', 1, 1, '2026-03-31 08:05:00'),
	(2, 'Floral Wedding', 'floral', 'wedding', 'https://images.unsplash.com/photo-1520854221256-17451cc331bf?auto=format&fit=crop&w=900&q=80', 'Tema floral lembut untuk wedding invitation.', NULL, NULL, 'http://localhost/invitation_business/preview/nadia-raka', 2, 1, '2026-03-31 08:05:00'),
	(3, 'Greeting Special', 'greeting', 'greeting_card', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=900&q=80', 'Greeting card clean untuk ulang tahun dan ucapan spesial.', NULL, NULL, 'http://localhost/invitation_business/card/happy-birthday-anya', 3, 1, '2026-03-31 08:05:00'),
	(4, 'Greeting Blossom Animation', 'greeting_blossom', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Tema blossom pastel untuk greeting manis.', NULL, NULL, 'http://localhost/invitation_business/card/bloom-for-sasa', 4, 1, '2026-03-31 08:05:00'),
	(5, 'Greeting Bear', 'greeting_bear', 'greeting_card', 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=900&q=80', 'Tema bear lucu untuk greeting playful.', NULL, NULL, 'http://localhost/invitation_business/card/hug-day-elsa', 5, 1, '2026-03-31 08:05:00'),
	(6, 'Greeting Sunflower', 'greeting_sunflower', 'greeting_card', 'https://images.unsplash.com/photo-1470509037663-253afd7f0f51?auto=format&fit=crop&w=900&q=80', 'Tema sunflower cerah dan hangat.', NULL, NULL, 'http://localhost/invitation_business/card/shine-for-luna', 6, 1, '2026-03-31 08:05:00'),
	(7, 'Greeting Sunny Bunny', 'greeting_sunny_bunny', 'greeting_card', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?auto=format&fit=crop&w=900&q=80', 'Tema bunny kuning ceria untuk ucapan lucu.', NULL, NULL, 'http://localhost/invitation_business/card/bunny-love-nina', 7, 1, '2026-03-31 08:05:00'),
	(8, 'Greeting Polaroid', 'greeting_polaroid', 'greeting_card', 'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=900&q=80', 'Tema polaroid untuk momen foto kenangan.', NULL, NULL, 'http://localhost/invitation_business/card/memory-for-rio', 8, 1, '2026-03-31 08:05:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `photo`, `is_active`, `last_login_at`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', 'admin@example.com', '$2y$12$Mif.oYTiZ1LCKYtg73M/jOTEkdLNJS6WlzFbuXSQLHMX1toxPAt/6', 'super_admin', '', 1, '2026-03-31 13:07:11', '2026-03-31 08:00:00', '2026-03-31 08:00:00'),
	(2, 'Customer Service', 'cs', 'cs@example.com', '$2y$12$Mif.oYTiZ1LCKYtg73M/jOTEkdLNJS6WlzFbuXSQLHMX1toxPAt/6', 'cs', '', 1, NULL, '2026-03-31 08:00:00', '2026-03-31 08:00:00'),
	(3, 'Designer Studio', 'designer', 'designer@example.com', '$2y$12$Mif.oYTiZ1LCKYtg73M/jOTEkdLNJS6WlzFbuXSQLHMX1toxPAt/6', 'designer', '', 1, NULL, '2026-03-31 08:00:00', '2026-03-31 08:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ci3_invitation_business_v3.wishes: ~9 rows (approximately)
INSERT INTO `wishes` (`id`, `project_id`, `guest_name`, `message`, `status`, `is_approved`, `created_at`) VALUES
	(1, 1, 'Dewi', 'Selamat menempuh hidup baru. Semoga langgeng, sehat, dan bahagia selalu.', 'approved', 1, '2026-03-31 14:30:00'),
	(2, 1, 'Fahri', 'Happy wedding Rayna dan Fajar, semoga acara lancar sampai hari H.', 'pending', 0, '2026-03-31 14:35:00'),
	(3, 1, 'Rina', 'Turut berbahagia untuk kalian berdua.', 'approved', 1, '2026-03-31 14:40:00'),
	(4, 2, 'Maya', 'Selamat untuk Nadia & Raka. Semoga menjadi keluarga sakinah, mawaddah, warahmah.', 'approved', 1, '2026-03-31 15:10:00'),
	(5, 3, 'Tio', 'Happy birthday Anya, semoga panjang umur dan banyak rezeki.', 'approved', 1, '2026-03-31 15:30:00'),
	(6, 4, 'Alya', 'Happy anniversary, semoga selalu kompak dan manis ya.', 'pending', 0, '2026-03-31 15:45:00'),
	(7, 5, 'Novi', 'Lucu banget kartunya, semoga Elsa suka ya.', 'approved', 1, '2026-03-31 16:00:00'),
	(8, 6, 'Rendi', 'Semoga semangatmu terus bersinar ya, Luna.', 'approved', 1, '2026-03-31 16:15:00'),
	(9, 1, 'kronisssa', 'selamatttttttttt aaaaa', 'approved', 1, '2026-03-31 13:09:37'),
	(10, 9, 'doni', 'dskaodksa', 'pending', 0, '2026-03-31 14:16:40'),
	(11, 9, 'doni', 'dskaodksa', 'approved', 1, '2026-03-31 14:16:55');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
