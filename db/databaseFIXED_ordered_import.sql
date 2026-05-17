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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `photo`, `is_active`, `last_login_at`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'admin', 'admin@example.com', '$2y$12$Mif.oYTiZ1LCKYtg73M/jOTEkdLNJS6WlzFbuXSQLHMX1toxPAt/6', 'super_admin', '', 1, '2026-05-16 02:39:57', '2026-03-31 08:00:00', '2026-03-31 08:00:00'),
	(4, 'Indah', 'indah', 'indah@gmail.com', '$2y$10$lzWe64Ats4jMQ9U95TmdD.lAUmgg0mAXuZpd1V36MoUDWTxi3cLTa', 'super_admin', '', 1, '2026-05-17 03:56:22', '2026-04-12 10:32:08', '2026-05-17 03:55:57'),
	(5, 'doni', 'doni', 'doniwicaksono27@gmail.com', '$2y$10$CPJ6H6qe1gX61N0Ufi4wm.BSNQ1phiuccJDaW.wFe.wGJyx8v/kMW', 'super_admin', '', 1, '2026-05-17 03:56:12', '2026-05-05 12:05:54', '2026-05-17 03:56:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.customers: ~12 rows (approximately)
INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `source`, `address`, `notes`, `created_at`) VALUES
	(20, 'Demo', '123456', 'demo@gmail.com', 'IG', 'Demo', 'Demo', '2026-05-14 13:19:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.product_types: ~2 rows (approximately)
INSERT INTO `product_types` (`id`, `name`, `code`, `description`, `is_active`, `sort_order`, `created_at`) VALUES
	(1, 'Invitation', 'invitation', 'Undangan digital untuk wedding, birthday, khitan, dan tahlil.', 1, 1, '2026-03-31 08:00:00'),
	(2, 'Greeting Card', 'greeting_card', 'Kartu ucapan digital untuk momen spesial personal.', 1, 2, '2026-03-31 08:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.packages: ~6 rows (approximately)
INSERT INTO `packages` (`id`, `product_type`, `name`, `price`, `old_price`, `description`, `features`, `button_text`, `is_featured`, `is_active`, `sort_order`, `created_at`) VALUES
	(1, 'invitation', 'Basic', 79000, 0, 'Paket simple untuk undangan digital.', '1 halaman undangan\n1 template\nLink share\nRevisi minor 1x', 'Pilih Paket', 0, 1, 1, '2026-03-31 08:00:00'),
	(2, 'invitation', 'Premium', 129000, 149000, 'Paket favorit untuk invitation digital.', 'RSVP\nUcapan\n3 pilihan template\nRevisi 2x', 'Pilih Paket', 1, 1, 2, '2026-03-31 08:00:00'),
	(3, 'invitation', 'Exclusive', 199000, 229000, 'Paket invitation premium paling lengkap.', 'RSVP\nUcapan\nGift info\nPrioritas pengerjaan', 'Pilih Paket', 0, 1, 3, '2026-03-31 08:00:00'),
	(4, 'greeting_card', 'Greeting Basic', 49000, 0, 'Greeting card simple dan manis.', '1 halaman greeting\n1 template\nLink share', 'Pilih Paket', 0, 1, 1, '2026-03-31 08:00:00'),
	(5, 'greeting_card', 'Greeting Special', 69000, 0, 'Greeting card dengan desain premium.', 'Animasi\nTemplate premium\nLink share', 'Pilih Paket', 1, 1, 2, '2026-03-31 08:00:00'),
	(6, 'greeting_card', 'Greeting Deluxe', 89000, 0, 'Greeting card dengan custom lebih lengkap.', 'Animasi\nTemplate premium\nPrioritas pengerjaan', 'Pilih Paket', 0, 1, 3, '2026-03-31 08:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.templates: ~12 rows (approximately)
INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `thumbnail`, `description`, `preview_mobile`, `preview_desktop`, `demo_url`, `sort_order`, `is_active`, `created_at`) VALUES
	(1, 'Romantic Wedding', 'romantic', 'invitation', 'uploads/templates/68d32283c25fa48949fa9e8987c4387d.png', 'Tema wedding elegan dengan pasangan, bunga, dan nuansa romantis.', 'uploads/templates/a822fc9880ce704e37b44160ac877945.png', 'uploads/templates/aaf8b3dfc44b59814680c203a5596179.png', 'i/demo-romantic', 1, 1, '2026-03-31 08:30:00'),
	(2, 'Floral Wedding', 'floral', 'invitation', 'uploads/templates/eec27f508f3502149f427e5c71f0fe1f.png', 'Tema wedding floral lembut dengan dekorasi bunga pastel.', 'uploads/templates/5e90192dfb9c7aad2cfa47981a722dfd.png', 'uploads/templates/9da11e45c2ac79fbbc2777337f1e0a9a.png', 'i/demo-floral', 2, 1, '2026-03-31 08:31:00'),
	(3, 'Birthday Party', 'birthday', 'invitation', 'uploads/templates/a3e4f62ec92acdd29956b4cede51eae4.png', 'Tema invitation ulang tahun dengan kue, lilin, dan pesta.', 'uploads/templates/105a530517b68f66a81f968948053080.png', 'uploads/templates/16638378920fd67c14aec5e226a3b7e6.png', 'i/demo-birthday', 3, 1, '2026-04-05 12:35:00'),
	(4, 'Khitan', 'khitan', 'invitation', 'uploads/templates/3c85ee1e1373e467bbe048a2db71e02b.png', 'Tema invitation khitan keluarga dengan suasana hangat dan meriah.', 'uploads/templates/3f3028a53b992496519237cc41c738fb.png', 'uploads/templates/bbe1fb4169231943d6dd818fd0a5fc33.png', 'i/demo-khitan', 4, 1, '2026-04-05 12:37:00'),
	(5, 'Tahlil Invitation', 'tahlil', 'invitation', 'uploads/templates/e8df5de1ba890c82acdcb5ab6c6c28be.png', 'Tema invitation tahlil bernuansa tenang, sopan, dan khidmat.', 'uploads/templates/8c179f06b1857ee6ac6276d301df376e.png', 'uploads/templates/deeef1398f5755d5e4cfba0172eda9e9.png', 'i/demo-tahlil', 5, 1, '2026-04-05 12:40:00'),
	(6, 'Greeting Blush', 'greeting_blush', 'greeting_card', 'uploads/templates/d235d9cedf8a147c9d6153f7c85db9ef.png', 'Greeting ulang tahun dengan suasana ceria dan colorful.', 'uploads/templates/d7e99685f687eff43af3bb27bc7355b9.png', 'uploads/templates/84414fc55b861cad3faf039182dcf05c.png', 'i/demo-greeting-blush', 6, 1, '2026-03-31 03:00:00'),
	(7, 'Greeting Bear', 'greeting_bear', 'greeting_card', 'uploads/templates/d650a814f3014279a3a347bccfaa0068.png', 'Greeting card lucu dengan vibe teddy bear hangat.', 'uploads/templates/f8edd3a8dc0f5d7c0ed0ae371b6da7aa.png', 'uploads/templates/4ecc2fcdc5611e01b28d0d7406192f1f.png', 'i/demo-greeting-bear', 7, 1, '2026-03-31 04:10:00'),
	(8, 'Greeting Blossom', 'greeting_blossom', 'greeting_card', 'uploads/templates/b5f5a6d3074c2f354581eb94e336b3bc.png', 'Greeting card pastel dengan bunga-bunga manis.', 'uploads/templates/1a0e299abdc09803dc1891d3b3849723.png', 'uploads/templates/1b59cfd4fa2e0649cb54a501cabe7557.png', 'i/demo-greeting-blossom', 8, 1, '2026-03-31 21:37:00'),
	(9, 'Greeting Polaroid', 'greeting_polaroid', 'greeting_card', 'uploads/templates/e0fcdb52ff527f58693f4cd84abe67a1.png', 'Greeting card dengan gaya foto polaroid dan memory wall.', 'uploads/templates/c8b05080cc15e09cf093b53dcd60b3ea.png', 'uploads/templates/f63a09673fe586f609c981088632516a.png', 'i/demo-greeting-polaroid', 9, 1, '2026-03-31 04:28:00'),
	(10, 'Greeting Sunflower', 'greeting_sunflower', 'greeting_card', 'uploads/templates/322f0f22c271e2003c9964eb1ebd0774.png', 'Greeting card cerah dengan nuansa bunga matahari.', 'uploads/templates/38136c743acbce5079b8925dbe09b818.png', 'uploads/templates/d2f665247c30331bf04a50c6b2d25481.png', 'i/demo-greeting-sunflower', 10, 1, '2026-03-31 04:14:00'),
	(11, 'Greeting Sunny Bunny', 'greeting_sunny_bunny', 'greeting_card', 'uploads/templates/d2c48039aa0abb1e0ed828bf77d2ba06.png', 'Greeting card bunny lucu dengan nuansa kuning ceria.', 'uploads/templates/b44bbec6ad8871f1f597df949cc8b7c9.png', 'uploads/templates/7b69bec15d72775a073506ad53fb252f.png', 'i/demo-greeting-sunny-bunny', 11, 1, '2026-03-31 04:18:00'),
	(12, 'Graduation', 'graduation', 'invitation', 'uploads/templates/00d8f81d98fc275b9df60b8634374903.png', 'Tema invitation Graduation', 'uploads/templates/cbfea28c8bc23207047f2f6edde31958.png', 'uploads/templates/c33db673c0f832e88061642f3eb339ac.png', 'i/demo-graduation', 3, 1, '2026-05-16 03:32:01'),
	(13, 'Greeting Claudy', 'greeting_claudy', 'greeting_card', 'uploads/templates/037670d927c4251954a9f1f72ae5d7a8.png', 'Greeting card Claudy dengan Awan-Awan manis.', 'uploads/templates/714fbe19a79781e09604402a3ba93c6a.png', 'uploads/templates/1dfcbfe76efca0e59729138cac823f7d.png', 'i/demo-greeting-claudy', 8, 1, '2026-05-16 05:57:03'),
	(14, 'Doa Bersama', 'doa', 'invitation', 'uploads/templates/fb698b189859867f842931f48c0f2976.png', 'Tema invitation Doa Bersama, sopan, dan Minimalist.', 'uploads/templates/4d5eacc8efaa4099a323238a0e2e9b05.png', 'uploads/templates/7ef0900e07493ba3399edecd68a19df3.png', 'i/demo-doa', 5, 1, '2026-05-16 06:37:59'),
	(16, 'Black', 'black', 'invitation', 'uploads/templates/a186bd470421a7dfad5e6f647c7003c2.png', 'Tema wedding elegan dengan pasangan, bunga, dan nuansa romantis.', 'uploads/templates/401ae3171b89c99bc1786e52aa8d155c.png', 'uploads/templates/5694b959273ccf1c26a1ae92306737b6.png', 'i/demo-black', 1, 1, '2026-05-16 06:39:03'),
	(17, 'Minimalist', 'minimalist', 'invitation', 'uploads/templates/cb356702dc79fe337800e144c550fd86.png', 'Tema undangan keren untuk acara apapun.', 'uploads/templates/c6b55da645790935e2fed7f91e5c29a4.png', 'uploads/templates/8e050b91b26345c271d9dbc9b3a7eece.png', 'i/demo-minimalist', 2, 1, '2026-05-16 06:39:54');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.orders: ~11 rows (approximately)
INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `product_type`, `package_name`, `template_id`, `assigned_user_id`, `payment_status`, `status`, `price`, `discount`, `final_price`, `dp_amount`, `paid_amount`, `payment_method`, `payment_date`, `deadline_date`, `payment_proof`, `notes`, `created_at`) VALUES
	(1, 'ORD-20260401-0001', 20, 'invitation', 'Exclusive', 1, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-01', '2026-04-10', 'uploads/payments/order1.jpg', 'Wedding invitation untuk akad dan resepsi.', '2026-04-01 09:30:00'),
	(2, 'ORD-20260401-0002', 20, 'invitation', 'Premium', 2, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'qris', '2026-04-01', '2026-04-08', 'uploads/payments/order2.jpg', 'Undangan floral untuk intimate wedding.', '2026-04-01 10:00:00'),
	(3, 'ORD-20260402-0001', 20, 'invitation', 'Premium', 3, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-02', '2026-04-12', 'uploads/payments/order3.jpg', 'Birthday invitation untuk ulang tahun ke-7.', '2026-04-02 08:45:00'),
	(4, 'ORD-20260402-0002', 20, 'invitation', 'Exclusive', 4, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'ewallet', '2026-04-02', '2026-04-13', 'uploads/payments/order4.jpg', 'Undangan khitan dengan RSVP aktif.', '2026-04-02 09:20:00'),
	(5, 'ORD-20260402-0003', 20, 'invitation', 'Basic', 5, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'cash', '2026-04-02', '2026-04-06', 'uploads/payments/order5.jpg', 'Tahlil 7 hari, desain clean.', '2026-04-02 10:05:00'),
	(6, 'ORD-20260403-0001', 20, 'greeting_card', 'Greeting Basic', 6, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'qris', '2026-04-03', '2026-04-04', 'uploads/payments/order6.jpg', 'Greeting untuk ulang tahun sahabat.', '2026-04-03 09:00:00'),
	(7, 'ORD-20260403-0002', 20, 'greeting_card', 'Greeting Special', 7, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-03', '2026-04-05', 'uploads/payments/order7.jpg', 'Greeting bear untuk ucapan semangat.', '2026-04-03 09:30:00'),
	(8, 'ORD-20260403-0003', 20, 'greeting_card', 'Greeting Deluxe', 8, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'qris', '2026-04-03', '2026-04-06', 'uploads/payments/order8.jpg', 'Greeting blossom premium.', '2026-04-03 10:00:00'),
	(9, 'ORD-20260403-0004', 20, 'greeting_card', 'Greeting Special', 9, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-03', '2026-04-05', 'uploads/payments/order9.jpg', 'Greeting polaroid untuk anniversary ke-3.', '2026-04-03 10:20:00'),
	(10, 'ORD-20260404-0001', 20, 'greeting_card', 'Greeting Basic', 10, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'ewallet', '2026-04-04', '2026-04-05', 'uploads/payments/order10.jpg', 'Greeting sunflower untuk bestie.', '2026-04-04 08:15:00'),
	(11, 'ORD-20260404-0002', 20, 'greeting_card', 'Greeting Deluxe', 11, 5, 'paid', 'in_progress', 0, 0, 0, 0, 0, 'bank_transfer', '2026-04-04', '2026-04-07', 'uploads/payments/order11.jpg', 'Greeting bunny premium untuk anniversary.', '2026-04-04 09:10:00'),
	(25, 'ORD-20260514-0001', 20, 'invitation', 'Premium', 3, 5, 'paid', 'completed', 0, 0, 0, 0, 0, 'bank_transfer', '2026-05-14', '2026-05-14', '', '', '2026-05-14 13:19:44'),
	(26, 'ORD-20260516-0001', 20, 'greeting_card', 'Premium', 13, 1, 'paid', 'new', 0, 0, 0, 0, 0, 'bank_transfer', '2026-05-16', '2026-05-16', NULL, '', '2026-05-16 05:58:26'),
	(28, 'ORD-20260516-0002', 20, 'invitation', 'Premium', 16, 1, 'paid', 'new', 0, 0, 0, 0, 0, 'bank_transfer', '2026-05-16', '2026-05-16', NULL, '', '2026-05-16 06:49:56'),
	(29, 'ORD-20260516-0003', 20, 'invitation', 'Premium', 17, 1, 'paid', 'new', 0, 0, 0, 0, 0, 'bank_transfer', '2026-05-16', '2026-05-16', '', '', '2026-05-16 07:01:23'),
	(30, 'ORD-20260516-0004', 20, 'invitation', 'Premium', 14, 1, 'paid', 'new', 0, 0, 0, 0, 0, 'bank_transfer', '2026-05-16', '2026-05-16', '', '', '2026-05-16 07:05:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.projects: ~12 rows (approximately)
INSERT INTO `projects` (`id`, `order_id`, `source`, `product_type`, `template_id`, `assigned_user_id`, `slug`, `title`, `subtitle`, `cover_text`, `hero_image`, `music_url`, `event_date`, `event_time`, `deadline_date`, `location_name`, `location_address`, `map_embed`, `description`, `sender_name`, `receiver_name`, `message_title`, `message_body`, `rsvp_enabled`, `wish_enabled`, `gift_enabled`, `gift_info`, `revision_notes`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'order_auto', 'invitation', 1, 5, 'demo-romantic', 'The Wedding of William & Cassandra', 'A Celebration of Love, Promise, and Forever', 'Two souls, one beautiful journey, and a lifetime commitment to walk hand in hand through every season of life together.', 'uploads/projects/12a89238a0b1ca52e34c3feee32aaf47.jpg', '', '2026-06-06', '09:00 WIB - selesai', '2026-04-10', 'Jl. Pakuwon Indah No. 88', 'Jl. Pakuwon Indah No. 88', '', 'Dengan penuh rasa syukur dan kebahagiaan, kami mengundang keluarga, sahabat, dan orang-orang terkasih untuk hadir dalam hari istimewa kami. Setelah perjalanan panjang yang dipenuhi cinta, doa, dan kebersamaan, kami siap memulai babak baru kehidupan sebagai pasangan suami dan istri, serta berharap dapat berbagi kebahagiaan ini bersama Anda semua.', 'William & Cassandra', 'Dear Family & Friends', 'Wedding Invitation', 'Dengan sukacita kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara pernikahan kami. Kehadiran serta doa restu dari Anda akan menjadi kebahagiaan dan kehormatan yang sangat berarti bagi kami dan keluarga. Kami berharap dapat merayakan momen bahagia ini bersama orang-orang terkasih dalam suasana penuh cinta dan kehangatan.', 0, 1, 1, 'Your presence and prayers are more than enough for us. However, for family and friends who wish to send a token of love, you may kindly use the following account:\r\n\r\nBCA - 1234567890\r\na.n. William Hartono\r\n\r\nMandiri - 9876543210\r\na.n. Cassandra Lee', 'Auto dibuat dari order paid: ORD-20260401-0001 | Template: Romantic Garden', 'published', '2026-04-01 09:35:00', '2026-05-16 08:35:07'),
	(2, 2, 'order_auto', 'invitation', 2, 5, 'demo-floral', 'The Wedding of Nathan & Olivia', 'Together With Their Families', 'And among His signs is that He created for you mates from among yourselves, that you may find tranquility in them, and He placed between you affection and mercy', 'uploads/projects/811ef5550547e94feb65e76f738d22db.jpg', '', '2026-04-20', '10:00 WIB', '2026-04-08', 'Jl. Raya Darmo No. 68', 'Jl. Raya Darmo No. 68', '', 'Tidak ada yang kebetulan di dunia ini. Dari pertemuan sederhana, percakapan kecil, hingga perjalanan panjang yang penuh cerita, kami percaya semua telah diatur dengan indah pada waktu terbaik-Nya. Dengan penuh rasa syukur dan kebahagiaan, kami mengundang keluarga, sahabat, dan orang-orang terkasih untuk hadir dan menjadi bagian dari hari istimewa dalam awal perjalanan baru kami sebagai sepasang suami dan istri.', 'Nathan Wijaya & Olivia Santoso', 'Bapak/Ibu/Saudara/i Terkasih', 'Undangan Pernikahan', 'Assalamu’alaikum Warahmatullahi Wabarakatuh. Dengan memohon rahmat dan ridho Allah SWT, kami bermaksud menyelenggarakan acara pernikahan putra-putri kami. Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kedua mempelai pada hari yang berbahagia ini. Atas kehadiran dan doa restunya kami ucapkan terima kasih. Wassalamu’alaikum Warahmatullahi Wabarakatuh.', 0, 1, 1, 'Doa restu dan kehadiran Bapak/Ibu/Saudara/i merupakan hadiah terindah bagi kami. Namun apabila berkenan memberikan tanda kasih, dapat disampaikan melalui wedding gift yang telah tersedia.', 'Auto dibuat dari order paid: ORD-20260401-0002 | Template: Floral Classic', 'published', '2026-04-01 10:05:00', '2026-05-16 08:30:58'),
	(3, 3, 'order_auto', 'invitation', 3, 5, 'demo-birthday', 'Sasya’s Sweet 21 Party', 'Too Glam To Be This Age', 'Another year older, still iconic, still dramatic, and still the main character ✨', 'uploads/projects/a33010b2d09ca55de0b771a504393d29.jpg', '', '2026-06-06', '15:30 WIB', '2026-04-12', 'Jl. Darmokali No. 18', 'Jl. Darmokali No. 18', '', 'A birthday is not just about getting older, it’s about celebrating memories, friendships, laughter, and all the little moments that made the past year unforgettable. Let’s make this special day full of fun, chaos, photos, and good vibes together.', 'Sasya Amelia', 'Bestie & Party Squad', 'You’re Invited To My Birthday Party!', 'OMG finally it’s my birthday again 🥹✨\r\nI honestly can’t believe how fast time goes, but one thing I know for sure is that I want to celebrate this special moment with the people who always make my life happier — yes, that means YOU.\r\nThis year has been full of random plot twists, late night overthinking, happy moments, messy moments, and so many memories that somehow made me grow into the person I am today. And because of that, I just want one fun night where we can forget about stress, dress cute, take tons of pictures, laugh too loud, eat good food, and create another chaotic memory together 😭💖\r\nThank you for always being part of my journey, for supporting me, listening to my nonsense stories, and staying around through every phase. Life honestly wouldn’t be this fun without you guys.\r\nSo please come and celebrate with me, because it truly won’t feel complete without your presence. Let’s make this birthday party one to remember ✨🎂', 0, 1, 1, 'Your presence is already the best gift ever, but if you still wanna bring something… I mean, I won’t stop you 👀🎁', 'Auto dibuat dari order paid: ORD-20260402-0001 | Template: Birthday Sparkle', 'published', '2026-04-02 08:50:00', '2026-05-16 08:26:49'),
	(4, 4, 'order_auto', 'invitation', 4, 4, 'demo-khitan', 'Khitan Celebration of Azzam', 'A Blessed Step Towards Growing Up', 'Dengan penuh rasa syukur kepada Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara syukuran khitan putra kami tercinta.', 'uploads/projects/0e99b11532fb9b3ce31252bf56a8d8ee.jpg', '', '2026-04-26', '09:00 WIB - 14:00 WIB', '2026-04-13', 'Jl. Raya Ketintang No. 45', 'Jl. Raya Ketintang No. 45', '', 'Khitan merupakan salah satu momen penting dalam perjalanan tumbuh kembang seorang anak menuju kedewasaan. Dengan penuh rasa syukur dan kebahagiaan, kami sekeluarga ingin berbagi momen istimewa ini bersama keluarga, sahabat, dan orang-orang terdekat melalui acara syukuran sederhana yang penuh doa dan kebersamaan.', 'Keluarga Bapak Ahmad Fauzi', 'Bapak/Ibu/Saudara/i Terkasih', 'Undangan Syukuran Khitan', 'Assalamu’alaikum Warahmatullahi Wabarakatuh. Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara syukuran khitan putra kami, Muhammad Azzam Pratama. Kehadiran serta doa restu yang diberikan akan menjadi kebahagiaan dan kehormatan bagi keluarga kami. Atas perhatian dan kehadirannya kami ucapkan terima kasih. Wassalamu’alaikum Warahmatullahi Wabarakatuh.', 1, 1, 1, 'Doa restu dan kehadiran Bapak/Ibu/Saudara/i merupakan hadiah terindah bagi putra kami dan keluarga.', 'Auto dibuat dari order paid: ORD-20260402-0002 | Template: Khitan Kareem', 'published', '2026-04-02 09:25:00', '2026-05-16 08:24:11'),
	(5, 5, 'order_auto', 'invitation', 5, 1, 'demo-tahlil', 'Tahlil Bapak Hasyim', 'Mengenang 7 hari wafatnya Alm. Bapak Hasyim', 'Assalamualaikum Warahmatullahi Wabarakatuh', 'uploads/projects/67a8affb8e3c19e46fdad2d974fd6a54.jpg', '', '2026-04-09', '18:30 WIB', '2026-04-06', 'Jl. KH. Ahmad Dahlan No. 24', 'Jl. KH. Ahmad Dahlan No. 24', '', 'Sebagai bentuk penghormatan dan doa bagi almarhum, keluarga besar mengadakan acara tahlil dan doa bersama agar segala amal ibadah Alm. Bapak Hasyim diterima di sisi Allah SWT serta diberikan tempat terbaik di sisi-Nya. Semoga melalui doa dan kebersamaan ini, keluarga yang ditinggalkan diberikan kekuatan, ketabahan, dan keikhlasan.', '', '', 'Undangan Tahlil', 'Assalamu’alaikum Warahmatullahi Wabarakatuh. Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk berkenan hadir dalam acara tahlil dan doa bersama untuk Alm. Bapak Hasyim. Kehadiran serta doa yang diberikan akan menjadi penghormatan dan penguat bagi keluarga yang ditinggalkan. Atas perhatian dan kehadirannya kami ucapkan terima kasih. Wassalamu’alaikum Warahmatullahi Wabarakatuh.', 0, 0, 0, '', 'Auto dibuat dari order paid: ORD-20260402-0003 | Template: Tahlil Tribute', 'published', '2026-04-02 10:10:00', '2026-05-16 08:19:42'),
	(6, 6, 'order_auto', 'greeting_card', 6, 1, 'demo-greeting-blush', 'A New Chapter Begins', 'Congratulations On Your New Journey', 'Setiap langkah baru selalu membawa kesempatan baru. Selamat untuk awal perjalanan yang sudah lama kamu perjuangkan.', 'uploads/projects/7db4d47eb967c35bbc1b646925bf6485.jpg', '', '2026-04-06', 'Anytime', '2026-04-04', '', '', '', 'Mendapatkan pekerjaan baru bukan hanya tentang pencapaian, tetapi juga tentang hasil dari usaha, doa, dan perjuangan yang tidak selalu mudah. Greeting card ini dibuat sebagai bentuk apresiasi dan ucapan semangat untuk memulai perjalanan baru yang penuh harapan.', 'Kani', 'Nimas', 'Congratulations On Your New Job!', 'Selamat ya atas pekerjaan barunya! Aku tahu perjalanan sampai di titik ini bukan sesuatu yang mudah. Ada banyak proses, rasa capek, overthinking, penolakan, dan mungkin momen-momen di mana kamu sempat meragukan diri sendiri. Tapi hari ini semua perjuangan itu akhirnya membuahkan hasil, dan aku benar-benar ikut bangga melihat kamu bisa sampai sejauh ini.\r\nAku yakin tempat baru ini akan menjadi awal dari banyak hal baik dalam hidupmu. Mungkin nanti akan ada tantangan baru, lingkungan baru, dan hal-hal yang membuatmu harus banyak belajar lagi, tapi aku percaya kamu pasti bisa melewatinya. Kamu adalah orang yang pekerja keras dan selalu berusaha memberikan yang terbaik dalam apa pun yang kamu lakukan.\r\nSemoga pekerjaan ini membawa banyak pengalaman baik, kesempatan besar, relasi yang positif, dan tentunya kebahagiaan untuk hidupmu. Jangan lupa tetap jaga kesehatan, tetap rendah hati, dan tetap jadi diri sendiri seperti yang selama ini aku kenal.\r\nSekali lagi, congratulations! Kamu pantas mendapatkan semua pencapaian ini 🎉', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0001 | Template: Classic Greeting', 'published', '2026-04-03 09:05:00', '2026-05-16 08:15:37'),
	(7, 7, 'order_auto', 'greeting_card', 7, 1, 'demo-greeting-bear', 'For The Most Wonderful Mom', 'Happy Birthday To The Heart Of Our Family', 'Untuk wanita terhebat yang selalu memberi cinta tanpa batas, terima kasih telah menjadi rumah ternyaman bagi keluarga ini.', 'uploads/projects/56031f9fe2016a7766a76a9fb30d9d1a.jpg', '', '2026-04-05', 'Anytime', '2026-04-05', '', '', '', 'Seorang ibu adalah sosok yang selalu hadir dengan kasih, doa, dan pengorbanan yang sering kali tidak bisa dibalas dengan apa pun. Greeting card ini dibuat sebagai ungkapan cinta dan rasa terima kasih untuk ibu tercinta di hari spesialnya.', 'Anak-anakmu', 'Mama Tersayang', 'Happy Birthday, Mom', 'Selamat ulang tahun, Ma. Hari ini adalah hari spesial untuk seseorang yang selama ini selalu menjadi sumber kekuatan, kasih sayang, dan kehangatan dalam keluarga. Terima kasih untuk semua hal yang sudah Mama lakukan selama ini, untuk setiap doa yang selalu Mama panjatkan, untuk setiap perhatian kecil yang kadang tidak kami sadari, dan untuk cinta yang selalu Mama berikan tanpa pernah meminta balasan.\r\nKami tahu menjadi seorang ibu tidak pernah mudah. Ada banyak lelah yang mungkin Mama simpan sendiri, banyak pengorbanan yang mungkin tidak pernah Mama ceritakan, tapi Mama tetap selalu berusaha memberikan yang terbaik untuk keluarga ini. Dan karena itu, kami akan selalu bersyukur memiliki Mama dalam hidup kami.\r\nDi usia Mama yang baru ini, kami hanya ingin Mama lebih bahagia, lebih sehat, dan lebih banyak tersenyum. Semoga semua hal baik selalu datang menghampiri Mama, dan semoga Tuhan selalu melindungi setiap langkah Mama di mana pun berada.\r\nTerima kasih karena sudah menjadi ibu terbaik yang bisa kami miliki. Kami sayang Mama, hari ini, besok, dan selamanya 🤍', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0002 | Template: Bear Hug', 'published', '2026-04-03 09:35:00', '2026-05-16 08:12:59'),
	(8, 8, 'order_auto', 'greeting_card', 8, 1, 'demo-greeting-blossom', 'Cheers To Your 24th Birthday', 'For The Best Sister Ever', '24 tahun perjalanan, tawa, perjuangan, dan cerita baru yang akan terus bertambah indah di setiap langkah kehidupanmu.', 'uploads/projects/aaf96651278a78f96f4f2e5757467433.jpg', '', '2026-04-07', '19:00 WIB', '2026-04-06', 'Kediaman Mama', 'Jl. Imam Bonjol No. 3, Blitar', '', 'Ulang tahun bukan hanya tentang bertambahnya usia, tetapi juga tentang perjalanan hidup, proses bertumbuh, dan semua kenangan yang telah dilewati. Greeting card ini dibuat sebagai bentuk kasih dan doa terbaik untuk kakak tersayang di hari spesialnya.', 'Derryn', 'Andini', 'Happy 24th Birthday, Kak!', 'Selamat ulang tahun yang ke-24 ya, Kak! Tidak terasa sekarang sudah sampai di fase hidup yang baru dengan begitu banyak pengalaman, pelajaran, dan pencapaian yang sudah berhasil kamu lewati sampai hari ini. Aku tahu mungkin perjalananmu tidak selalu mudah, tapi aku bangga karena kamu selalu bisa bertahan dan terus berjalan sejauh ini.\r\n\r\nTerima kasih karena selama ini selalu menjadi kakak yang baik, yang sering membantu, mendengarkan cerita, memberi nasihat, dan selalu ada di banyak momen penting dalam hidupku. Walaupun kadang kita suka bercanda, berdebat, atau saling jahil, sebenarnya aku selalu bersyukur punya kakak seperti kamu.\r\n\r\nDi umur yang baru ini, aku berharap semoga semua hal baik semakin mendekat ke hidupmu. Semoga kesehatan, kebahagiaan, karier, impian, dan semua doa yang kamu simpan perlahan bisa terwujud satu per satu. Jangan terlalu keras sama diri sendiri ya, karena kamu sudah melakukan yang terbaik sejauh ini.\r\n\r\nTetap jadi pribadi yang hangat, kuat, dan selalu membawa energi baik untuk orang-orang di sekitarmu. Semoga tahun ini menjadi salah satu tahun terbaik dalam hidupmu.\r\n\r\nHappy birthday, Kak. We love you so much 🤍', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0003 | Template: Blossom Letter', 'published', '2026-04-03 10:05:00', '2026-05-16 08:07:37'),
	(9, 9, 'order_auto', 'greeting_card', 9, 5, 'demo-greeting-polaroid', 'To My Favorite Person', 'Thank You For Being Part Of My Life', 'Dari sekian banyak hal baik yang pernah datang dalam hidupku, salah satu yang paling aku syukuri adalah kehadiranmu.', 'uploads/projects/757c2ce51835680595f1c95f9be96009.jpg', '', '2026-04-08', '20:00 WIB', '2026-04-05', '', '', '', 'Terkadang cinta hadir bukan melalui hal-hal besar, melainkan lewat perhatian kecil, obrolan sederhana, dan seseorang yang selalu berhasil membuat hari terasa lebih hangat. Greeting card ini dibuat sebagai ungkapan kasih untuk seseorang yang selalu menjadi alasan di balik banyak senyuman.', 'Kevin', 'Rania', 'A Little Reminder That I Love You', 'Aku cuma ingin kamu tahu kalau kehadiranmu benar-benar berarti buat aku. Mungkin aku tidak selalu bisa mengungkapkan semuanya dengan sempurna, tapi setiap hari aku selalu bersyukur karena punya kamu di hidupku. Kamu adalah salah satu alasan kenapa hari-hariku terasa lebih ringan dan lebih berwarna.\r\n\r\nTerima kasih karena selalu mendengarkan cerita-ceritaku, memahami hal-hal kecil tentang diriku, dan tetap bertahan bahkan di saat aku sedang sulit dipahami. Bersamamu, aku merasa bisa menjadi diriku sendiri tanpa harus berpura-pura menjadi orang lain.\r\n\r\nAku suka semua hal tentang kamu, mulai dari caramu tertawa, caramu peduli, sampai bagaimana kamu selalu berhasil membuat aku tenang hanya dengan hadir di dekatku. Kadang aku berpikir, mungkin Tuhan memang sengaja mempertemukan kita di waktu yang tepat.\r\n\r\nAku tidak tahu bagaimana cerita kita ke depannya nanti, tapi yang aku tahu sekarang, aku ingin terus menciptakan banyak kenangan bersamamu. Semoga apa pun yang terjadi, kita tetap bisa saling menjaga, saling mendukung, dan tetap memilih satu sama lain setiap harinya.\r\n\r\nThank you for being my favorite person.', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260403-0004 | Template: Polaroid Memories', 'published', '2026-04-03 10:25:00', '2026-05-16 08:04:23'),
	(10, 10, 'order_auto', 'greeting_card', 10, 1, 'demo-greeting-sunflower', 'Home Is You', 'For The One Who Stays Through Everything', 'Terima kasih karena tetap tinggal, tetap bertahan, dan tetap memilih berjalan bersama sampai hari ini.', 'uploads/projects/4a658b63b4137961936c28fa66d6f476.jpg', 'https://cdn.pixabay.com/download/audio/2022/03/10/audio_987ba1237f.mp3?filename=romantic-background-11262.mp3', '2026-04-05', 'Anytime', '2026-04-05', '', '', '', 'Pernikahan bukan hanya tentang kebahagiaan, tetapi tentang dua orang yang terus memilih untuk saling memahami, mendukung, dan bertahan bersama dalam setiap keadaan. Greeting card ini menjadi ungkapan sederhana untuk seseorang yang telah menjadi rumah, tempat pulang, dan bagian terpenting dalam hidup.', 'Andy', 'Rina', 'Thank You For Always Being Here', 'Aku mungkin bukan orang yang paling pandai mengungkapkan perasaan setiap hari, tapi ada satu hal yang selalu aku syukuri dalam hidup ini, yaitu kamu. Terima kasih karena sudah hadir dan bertahan sejauh ini, bahkan di saat hidup tidak selalu mudah untuk kita jalani bersama.\r\n\r\nTerima kasih untuk setiap kesabaranmu menghadapi sifatku, untuk setiap dukungan kecil yang mungkin sering terlihat sederhana, tapi sebenarnya sangat berarti buat aku. Kamu selalu ada di saat aku lelah, di saat aku kehilangan semangat, bahkan di saat aku tidak tahu harus bercerita kepada siapa lagi.\r\n\r\nBanyak hal berubah seiring waktu, tetapi satu hal yang tidak pernah berubah adalah rasa nyaman yang selalu aku rasakan saat bersama kamu. Rumah bukan lagi tentang tempat, melainkan tentang seseorang yang membuat kita merasa diterima sepenuhnya. Dan buat aku, rumah itu adalah kamu.\r\n\r\nAku tidak tahu bagaimana masa depan nanti, tapi aku berharap kita tetap bisa berjalan bersama, melewati semua hal baik maupun buruk, sambil terus belajar mencintai satu sama lain dengan cara yang sederhana namun tulus.\r\n\r\nTerima kasih karena sudah menjadi bagian terbaik dalam hidupku.', 0, 0, 0, '', 'Auto dibuat dari order paid: ORD-20260404-0001 | Template: Sunflower Smile', 'published', '2026-04-04 08:20:00', '2026-05-16 08:01:42'),
	(11, 11, 'order_auto', 'greeting_card', 11, 1, 'demo-greeting-sunny-bunny', 'Maybe It’s Always Been You', 'Kadang seseorang datang tanpa direncanakan, lalu perlahan menjadi alasan kenapa hari-hari terasa lebih berarti dari sebelumnya.', 'A Little Message From My Heart', 'uploads/projects/8f71234882d3dc24199d2f60f4d360ff.jpg', '', '2026-04-07', '21:00 WIB', '2026-04-07', '', '', '', 'Perasaan yang tumbuh secara perlahan sering kali menjadi yang paling tulus. Greeting card ini dibuat sebagai ungkapan perasaan sederhana untuk seseorang yang selama ini berhasil membawa kenyamanan, kebahagiaan, dan warna baru dalam kehidupan.', 'Dimas', 'Nira', 'There’s Something I Want To Tell You', 'Aku sebenarnya sudah cukup lama ingin mengatakan ini, tapi selalu bingung harus mulai dari mana. Mungkin karena aku takut semuanya berubah, atau takut perasaan ini cuma akan menjadi sesuatu yang aku simpan sendiri. Tapi semakin lama kita dekat, semakin aku sadar kalau kehadiranmu benar-benar punya arti besar buat aku.\r\nKamu hadir di waktu yang tidak pernah aku rencanakan sebelumnya, tapi entah kenapa semuanya terasa nyaman sejak awal. Cara kamu bercerita, tertawa, peduli pada hal-hal kecil, sampai bagaimana kamu memperlakukan orang lain, semuanya membuat aku semakin kagum setiap harinya. Aku suka caramu membuat suasana menjadi hangat tanpa perlu berusaha terlalu keras.\r\nAku tidak tahu bagaimana perasaanmu ke aku selama ini, dan aku juga tidak ingin memaksakan apa pun. Aku hanya ingin jujur kalau sekarang aku melihatmu lebih dari sekadar teman biasa. Bersamamu, aku merasa lebih tenang, lebih semangat menjalani hari, dan lebih bahagia hanya karena hal-hal sederhana.\r\nKalau suatu hari nanti kamu mau membuka hati untuk seseorang, aku berharap orang itu bisa jadi aku. Tapi apa pun jawabanmu nanti, terima kasih karena sudah menjadi bagian indah dalam hari-hariku selama ini.', 0, 1, 0, '', 'Auto dibuat dari order paid: ORD-20260404-0002 | Template: Sunny Bunny', 'published', '2026-04-04 09:15:00', '2026-05-16 07:58:21'),
	(21, 25, 'quick_create', 'invitation', 12, 5, 'demo-graduation', 'Graduation Celebration 2026', 'Dengan penuh rasa syukur dan kebahagiaan, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara syukuran kelulusan dan perayaan wisuda sebagai momen berharga atas perjalanan pendidikan yang tela', 'A Journey Ends, A New Chapter Begins', 'uploads/projects/ff9eea61f1952695ba06597f985cbec9.jpg', '', '2026-05-28', '10:00 WIB', '2026-05-14', 'Jl. Mayjen Sungkono No. 88', 'Jl. Mayjen Sungkono No. 88', '', 'Setelah melewati berbagai proses pembelajaran, perjuangan, dan pengalaman selama masa perkuliahan, akhirnya tiba saat yang penuh rasa syukur dan kebahagiaan untuk merayakan kelulusan ini. Momen sederhana ini menjadi awal langkah baru menuju masa depan yang lebih baik serta ungkapan terima kasih atas doa, dukungan, dan kebersamaan dari keluarga serta sahabat tercinta.', 'Keluarga Michael Jonathan', 'Bapak/Ibu/Saudara/i Terkasih', 'Undangan Graduation Celebration', 'Dengan penuh sukacita kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara syukuran kelulusan dan perayaan wisuda ini. Kehadiran serta doa yang diberikan akan menjadi kebahagiaan dan kehormatan bagi kami sekeluarga dalam merayakan momen istimewa ini bersama orang-orang terkasih.', 0, 0, 1, 'Kehadiran dan doa restu dari Bapak/Ibu/Saudara/i merupakan hadiah terindah bagi kami dan keluarga.', '', 'published', '2026-05-14 13:21:07', '2026-05-16 07:53:48'),
	(22, 26, 'quick_create', 'greeting_card', 13, 1, 'demo-greeting-claudy', 'For The Brighter Days Ahead', 'This Is Not The End Of Your Story', 'Tidak semua perjuangan langsung berakhir dengan kemenangan hari ini, tetapi setiap langkah yang sudah kamu lewati tetap berharga dan akan membawamu menuju tempat terbaik yang sudah Tuhan siapkan.', 'uploads/projects/4348ce89f9d434fc6a4c8e2c1d1a717f.jpg', '', NULL, '', '2026-05-16', '', '', '', 'Terkadang hidup tidak selalu berjalan sesuai harapan, namun setiap kegagalan bukanlah akhir dari perjalanan melainkan bagian dari proses untuk menjadi lebih kuat dan lebih siap menghadapi masa depan. Greeting card ini dibuat sebagai bentuk dukungan dan pengingat bahwa masih banyak kesempatan indah yang menanti di depan sana.', 'Aurel', 'Kevin Adrian', 'Semangat, Jalanmu Masih Panjang', 'Aku tahu mungkin hari ini rasanya berat banget buat kamu. Setelah semua usaha, begadang, capek, doa, dan harapan yang sudah kamu perjuangkan, ternyata hasilnya belum sesuai yang kamu inginkan. Wajar kalau kamu kecewa, sedih, bahkan merasa gagal. Tapi percayalah, tidak lolos hari ini bukan berarti kamu tidak pintar, tidak hebat, atau tidak punya masa depan yang baik. Kadang hidup memang punya cara sendiri untuk membawa kita ke tempat yang tepat di waktu yang tepat.\r\n\r\nAku cuma mau kamu ingat kalau satu hasil ujian tidak pernah bisa menentukan nilai dirimu sebagai seseorang. Kamu tetap pribadi yang kuat, penuh potensi, dan punya banyak hal hebat di depan sana. Bisa jadi jalan yang Tuhan siapkan memang berbeda dari yang kamu bayangkan sekarang, tapi bukan berarti lebih buruk. Bahkan sering kali, jalan yang tidak kita rencanakan justru membawa kita ke tempat terbaik dalam hidup.\r\n\r\nJangan terlalu keras sama dirimu sendiri ya. Istirahat sebentar boleh, nangis juga boleh, kecewa juga manusiawi. Tapi jangan berhenti percaya kalau kamu masih punya kesempatan besar untuk berhasil. Aku yakin suatu hari nanti kamu akan melihat kembali momen ini dan sadar kalau ini hanyalah satu bagian kecil dari perjalanan panjangmu.\r\n\r\nTerima kasih karena sudah berjuang sejauh ini. Aku bangga sama kamu, dan aku akan tetap mendukungmu apa pun yang terjadi. Semangat terus, karena cerita hebatmu belum selesai.', 0, 1, 0, '', '', 'published', '2026-05-16 06:00:05', '2026-05-16 07:49:08'),
	(23, 28, 'quick_create', 'invitation', 16, 1, 'demo-black', 'Bounded Zone Surabaya 2026', 'Creative Business & Digital Innovation Seminar', 'Sebuah seminar inspiratif yang mempertemukan kreator, pelaku bisnis, dan generasi muda dalam satu ruang kolaborasi, inovasi, dan pengembangan ide kreatif di era digital.', 'uploads/projects/68bea2bb92174d64a7819a1ddb851aaa.jpg', '', '2026-06-06', '18:30 WIB', '2026-05-16', 'Jl. Gubeng Pojok No. 1', 'Jl. Gubeng Pojok No. 1', '', 'Bounded Zone Surabaya hadir sebagai ruang berbagi inspirasi, wawasan, dan pengalaman dari berbagai pelaku industri kreatif dan digital. Melalui seminar ini, peserta diharapkan dapat memperluas koneksi, menemukan peluang baru, serta memperoleh motivasi untuk terus berkembang dan beradaptasi di tengah perkembangan teknologi dan dunia bisnis modern.', 'Bounded Zone Organizer', 'Peserta Seminar & Undangan Khusus', 'Invitation to Bounded Zone Seminar 2026', 'Dengan hormat, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara Bounded Zone Surabaya 2026. Seminar ini akan menghadirkan berbagai pembicara inspiratif serta sesi diskusi interaktif seputar kreativitas, bisnis, teknologi, dan pengembangan personal di era digital. Kehadiran Anda akan menjadi bagian penting dalam terciptanya ruang kolaborasi yang penuh inspirasi dan inovasi.', 0, 0, 1, 'Terima kasih atas partisipasi dan dukungan Anda dalam acara Bounded Zone Surabaya 2026. Sampai bertemu di venue.', '', 'published', '2026-05-16 06:50:53', '2026-05-16 07:45:03'),
	(24, 29, 'quick_create', 'invitation', 17, 1, 'demo-minimalist', 'Faith & Fellowship Night', 'An Evening of Reflection and Togetherness', 'Dengan penuh sukacita, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara malam kebersamaan dan sharing rohani bersama keluarga serta sahabat terkasih.', 'uploads/projects/fbbf72dd84e22978763bd50e07173f0b.jpg', 'https://www.youtube.com/watch?v=6F9N0rM4k7Q', '2026-06-06', '09:00 WIB - selesai', '2026-05-16', 'Jl. Tunjungan Plaza Boulevard No. 25', 'Jl. Tunjungan Plaza Boulevard No. 25', '', 'Acara ini diadakan sebagai momen sederhana untuk berkumpul, berbagi cerita kehidupan, mempererat hubungan dalam kasih, serta menikmati malam penuh kehangatan dan kebersamaan bersama orang-orang terdekat.', 'Komunitas Damai', 'Bapak/Ibu/Saudara/i Terkasih', 'Undangan Fellowship & Sharing Night', 'Dengan penuh kebahagiaan kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara fellowship dan malam kebersamaan ini. Semoga melalui pertemuan sederhana ini kita dapat saling menguatkan, berbagi sukacita, dan menikmati indahnya kebersamaan.', 0, 1, 1, 'Kehadiran dan kebersamaan Bapak/Ibu/Saudara/i merupakan kebahagiaan dan kehormatan terbesar bagi kami.', '', 'published', '2026-05-16 07:02:03', '2026-05-16 07:41:29'),
	(25, 30, 'quick_create', 'invitation', 14, 1, 'demo-doa', 'Doa Bersama Malam Penuh Kasih', 'Gathering in Faith, Hope, and Love', 'Dengan penuh rasa syukur kepada Tuhan Yesus Kristus, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara doa bersama dan malam persekutuan sebagai ungkapan syukur, harapan, dan kebersamaan dal', 'uploads/projects/9ae5e59a0f01da9082115f9dcc5e5c43.jpg', 'https://www.youtube.com/watch?v=0LAs7i1H3K8', '2026-06-06', '09:00 WIB - selesai', '2026-05-16', 'Gereja Santa Maria Penuh Rahmat', 'Jl. Raya Darmo No. 112 Surabaya, Jawa Timur', '', 'Dengan penuh rasa syukur kepada Tuhan Yesus Kristus, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dalam acara doa bersama sebagai ungkapan syukur atas penyertaan dan kasih Tuhan dalam kehidupan kami, serta sebagai momen kebersamaan dalam iman, pengharapan, dan damai sejahtera.', 'Keluarga Bapak Andreas Wijaya & Ibu Maria Helena', 'Bapak/Ibu/Saudara/i Terkasih', 'Undangan Doa Bersama', 'Shalom, dengan penuh sukacita kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan mengambil bagian dalam acara doa bersama ini. Kehadiran serta doa yang diberikan akan menjadi berkat dan kebahagiaan bagi kami dan keluarga. Atas perhatian dan kehadirannya kami ucapkan terima kasih. Tuhan memberkati.', 0, 0, 1, 'Kehadiran dan doa tulus dari Bapak/Ibu/Saudara/i merupakan hadiah terindah bagi kami. Namun apabila berkenan memberikan tanda kasih, dapat disampaikan secara langsung pada saat acara berlangsung.', '', 'published', '2026-05-16 07:05:53', '2026-05-16 07:36:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.guests: ~20 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.project_galleries: ~7 rows (approximately)
INSERT INTO `project_galleries` (`id`, `project_id`, `image_path`, `caption`, `sort_order`, `created_at`) VALUES
	(28, 25, 'uploads/projects/gallery/221b8a81acbdf72d9a822da0056f9050.jpg', '', 0, '2026-05-16 07:32:23'),
	(29, 24, 'uploads/projects/gallery/2b0f92aa649427fbeab10ef35e249d40.jpg', '', 0, '2026-05-16 07:41:38'),
	(30, 23, 'uploads/projects/gallery/2f594e15be8ccb951da3fc27fab37f07.jpg', '', 0, '2026-05-16 07:45:13'),
	(31, 21, 'uploads/projects/gallery/818705c229935bd7f0bd6ff8f444de3d.jpg', '', 0, '2026-05-16 07:52:13'),
	(32, 5, 'uploads/projects/gallery/228da566f581e9b7b474e8835557e13a.jpg', '-', 0, '2026-05-16 08:20:14'),
	(33, 4, 'uploads/projects/gallery/3cfb821c995a5c401f186f9c220846ea.jpg', '', 0, '2026-05-16 08:24:24'),
	(34, 3, 'uploads/projects/gallery/a60640fb9ed8942b5ff317d01f1aff81.jpg', '', 0, '2026-05-16 08:27:46'),
	(35, 2, 'uploads/projects/gallery/761b584eff731b71f6d09cb440137285.jpg', '', 0, '2026-05-16 08:31:29'),
	(36, 1, 'uploads/projects/gallery/7b4f09229c7b4455a2cf9c310d0becea.jpg', '', 0, '2026-05-16 08:35:25');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.wishes: ~14 rows (approximately)
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
	(15, 3, 'doni', 'selamta ya', 'approved', 1, '2026-04-11 05:09:12'),
	(17, 5, 'Tamu Undangandsa', 'dsa', 'approved', 1, '2026-05-16 06:47:12');

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
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.activity_logs: ~111 rows (approximately)
INSERT INTO `activity_logs` (`id`, `user_id`, `module`, `action`, `description`, `created_at`) VALUES
	(1, 1, 'templates', 'seed', 'Mengisi 11 template aktif sesuai folder tema yang tersedia.', '2026-04-05 12:41:00'),
	(2, 1, 'customers', 'seed', 'Mengisi customer dummy realistis untuk demo project.', '2026-04-05 12:42:00'),
	(3, 1, 'orders', 'seed', 'Mengisi 11 order berbayar agar otomatis punya project.', '2026-04-05 12:43:00'),
	(4, 1, 'projects', 'seed', 'Mengisi 11 project untuk seluruh template.', '2026-04-05 12:44:00'),
	(5, 1, 'guests', 'seed', 'Mengisi guest hanya untuk project invitation.', '2026-04-05 12:45:00'),
	(186, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-17 03:48:35'),
	(187, 5, 'templates', 'update', 'Mengubah template #1', '2026-05-17 03:49:35'),
	(188, 5, 'templates', 'update', 'Mengubah template #16', '2026-05-17 03:50:25'),
	(189, 5, 'templates', 'update', 'Mengubah template #2', '2026-05-17 03:50:45'),
	(190, 5, 'templates', 'update', 'Mengubah template #17', '2026-05-17 03:51:27'),
	(191, 5, 'templates', 'update', 'Mengubah template #3', '2026-05-17 03:51:53'),
	(192, 5, 'templates', 'update', 'Mengubah template #12', '2026-05-17 03:52:10'),
	(193, 5, 'templates', 'update', 'Mengubah template #4', '2026-05-17 03:52:27'),
	(194, 5, 'templates', 'update', 'Mengubah template #5', '2026-05-17 03:52:44'),
	(195, 5, 'templates', 'update', 'Mengubah template #14', '2026-05-17 03:53:02'),
	(196, 5, 'templates', 'update', 'Mengubah template #6', '2026-05-17 03:53:20'),
	(197, 5, 'templates', 'update', 'Mengubah template #7', '2026-05-17 03:53:43'),
	(198, 5, 'templates', 'update', 'Mengubah template #8', '2026-05-17 03:53:59'),
	(199, 5, 'templates', 'update', 'Mengubah template #13', '2026-05-17 03:54:16'),
	(200, 5, 'templates', 'update', 'Mengubah template #9', '2026-05-17 03:54:35'),
	(201, 5, 'templates', 'update', 'Mengubah template #10', '2026-05-17 03:54:51'),
	(202, 5, 'templates', 'update', 'Mengubah template #11', '2026-05-17 03:55:08'),
	(203, 5, 'users', 'update', 'Mengubah admin user #4 (indah)', '2026-05-17 03:55:57'),
	(204, 5, 'users', 'update', 'Mengubah admin user #5 (doni)', '2026-05-17 03:56:05'),
	(205, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-17 03:56:07'),
	(206, 5, 'auth', 'login', 'User login ke admin panel', '2026-05-17 03:56:12'),
	(207, 5, 'auth', 'logout', 'User logout dari admin panel', '2026-05-17 03:56:14'),
	(208, 4, 'auth', 'login', 'User login ke admin panel', '2026-05-17 03:56:22');

-- Dumping structure for table ci3_invitation_business_v3.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ci3_invitation_business_v3.settings: ~3 rows (approximately)
INSERT INTO `settings` (`id`, `setting_key`, `setting_value`) VALUES
	(1, 'brand_name', 'My Simple Gift'),
	(2, 'wa_number', '6281234567890'),
	(3, 'auto_approve_wishes', '1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
