SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `settings`;
DROP TABLE IF EXISTS `packages`;
DROP TABLE IF EXISTS `product_types`;
DROP TABLE IF EXISTS `wishes`;
DROP TABLE IF EXISTS `rsvps`;
DROP TABLE IF EXISTS `guests`;
DROP TABLE IF EXISTS `projects`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `templates`;
DROP TABLE IF EXISTS `customers`;
DROP TABLE IF EXISTS `activity_logs`;
DROP TABLE IF EXISTS `project_galleries`;
DROP TABLE IF EXISTS `project_timelines`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'admin',
  `photo` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `activity_logs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `module` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `product_types` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `code` varchar(80) NOT NULL,
  `description` text,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `product_type` varchar(50) NOT NULL DEFAULT 'wedding',
  `thumbnail` text,
  `description` text,
  `preview_mobile` varchar(255) DEFAULT NULL,
  `preview_desktop` varchar(255) DEFAULT NULL,
  `demo_url` text,
  `sort_order` int NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `packages` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_type` varchar(80) NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` bigint NOT NULL DEFAULT 0,
  `old_price` bigint NOT NULL DEFAULT 0,
  `description` text,
  `features` text,
  `button_text` varchar(100) DEFAULT 'Pilih Paket',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `source` varchar(80) DEFAULT NULL,
  `address` text,
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) DEFAULT NULL,
  `customer_id` int unsigned NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `package_name` varchar(100) DEFAULT NULL,
  `template_id` int unsigned DEFAULT NULL,
  `assigned_user_id` int unsigned DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT 'unpaid',
  `status` varchar(30) DEFAULT 'new',
  `price` bigint NOT NULL DEFAULT 0,
  `discount` bigint NOT NULL DEFAULT 0,
  `final_price` bigint NOT NULL DEFAULT 0,
  `dp_amount` bigint NOT NULL DEFAULT 0,
  `paid_amount` bigint NOT NULL DEFAULT 0,
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
  KEY `assigned_user_id` (`assigned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `projects` (
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
  `rsvp_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `wish_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `gift_enabled` tinyint(1) NOT NULL DEFAULT 0,
  `gift_info` text,
  `revision_notes` text,
  `status` varchar(30) NOT NULL DEFAULT 'draft',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `order_id` (`order_id`),
  KEY `template_id` (`template_id`),
  KEY `assigned_user_id` (`assigned_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `guests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_name` varchar(150) NOT NULL,
  `phone` varchar(40) DEFAULT NULL,
  `category` varchar(80) DEFAULT NULL,
  `slug` varchar(160) NOT NULL,
  `is_opened` tinyint(1) NOT NULL DEFAULT 0,
  `opened_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `rsvps` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_id` int unsigned DEFAULT NULL,
  `guest_name` varchar(120) NOT NULL,
  `attendance_status` varchar(50) DEFAULT NULL,
  `guest_total` int DEFAULT 1,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `guest_id` (`guest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `project_galleries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `project_timelines` (
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
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `wishes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_name` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `photo`, `is_active`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', 'admin@example.com', '$2y$12$O7PZeXPDY3oHgZXe/hB5ZuQzOzKsKUhWPtijKLXQ91qqcLzvN3ptq', 'super_admin', '', 1, NULL, NOW(), NOW()),
(2, 'CS Invite', 'cs', 'cs@example.com', '$2y$12$O7PZeXPDY3oHgZXe/hB5ZuQzOzKsKUhWPtijKLXQ91qqcLzvN3ptq', 'admin', '', 1, NULL, NOW(), NOW());

INSERT INTO `activity_logs` (`user_id`, `module`, `action`, `description`, `created_at`) VALUES (1, 'system', 'seed', 'Database operational berhasil di-seed', NOW());
INSERT INTO `settings` (`setting_key`, `setting_value`) VALUES ('brand_name', 'InviteBiz'), ('wa_number', '6281234567890'), ('auto_approve_wishes', '0');
INSERT INTO `product_types` (`id`, `name`, `code`, `description`, `is_active`, `sort_order`, `created_at`) VALUES (1, 'Wedding Invitation', 'wedding', 'Undangan digital untuk pernikahan', 1, 1, NOW()), (2, 'Greeting Card', 'greeting_card', 'Kartu ucapan digital', 1, 2, NOW());
INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `thumbnail`, `description`, `preview_mobile`, `preview_desktop`, `demo_url`, `sort_order`, `is_active`, `created_at`) VALUES
(1, 'Romantic Wedding', 'romantic', 'wedding', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=900&q=80', 'Tampilan clean dan elegan untuk wedding invitation.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/preview/amel-budi', 1, 1, NOW()),
(2, 'Floral Wedding', 'floral', 'wedding', 'https://images.unsplash.com/photo-1525258946800-98cfd641d0de?auto=format&fit=crop&w=900&q=80', 'Warna lembut dengan info acara dan RSVP.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/preview/amel-budi', 2, 1, NOW()),
(3, 'Greeting Special', 'greeting', 'greeting_card', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=900&q=80', 'Cocok untuk birthday, anniversary, dan ucapan spesial.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 1, 1, NOW()),
(4, 'Greeting Blossom Animation', 'greeting_blossom', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, NOW());
INSERT INTO `packages` (`id`, `product_type`, `name`, `price`, `old_price`, `description`, `features`, `button_text`, `is_featured`, `is_active`, `sort_order`, `created_at`) VALUES
(1, 'wedding', 'Basic', 79000, 0, 'Paket entry level untuk undangan wedding.', '1 halaman undangan\n1 template\nRevisi minor 1x\nLink share', 'Pilih Paket', 0, 1, 1, NOW()),
(2, 'wedding', 'Premium', 129000, 149000, 'Paket favorit untuk wedding invitation.', 'Wedding invitation\nRSVP & ucapan\n3 template pilihan\nRevisi 2x', 'Pilih Paket', 1, 1, 2, NOW()),
(3, 'wedding', 'Exclusive', 199000, 0, 'Paket premium dengan fitur lebih lengkap.', 'Gift info\nRSVP & ucapan\nPrioritas pengerjaan\nTemplate premium', 'Pilih Paket', 0, 1, 3, NOW()),
(4, 'greeting_card', 'Greeting Basic', 49000, 0, 'Kartu ucapan digital simple.', '1 halaman kartu\n1 template\nLink share', 'Pilih Paket', 0, 1, 1, NOW()),
(5, 'greeting_card', 'Greeting Pro', 89000, 0, 'Kartu ucapan dengan desain lebih premium.', 'Animasi tampilan\nTemplate premium\nPrioritas pengerjaan', 'Pilih Paket', 1, 1, 2, NOW());
INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `source`, `address`, `notes`, `created_at`) VALUES
(1, 'Albert', '081234567890', 'albert@example.com', 'Instagram', 'Sidoarjo', 'Sample customer wedding', NOW()),
(2, 'Bella', '081298765432', 'bella@example.com', 'WhatsApp', 'Surabaya', 'Sample customer greeting card', NOW());
INSERT INTO `orders` (`id`, `order_no`, `customer_id`, `product_type`, `package_name`, `template_id`, `assigned_user_id`, `payment_status`, `status`, `price`, `discount`, `final_price`, `dp_amount`, `paid_amount`, `payment_method`, `payment_date`, `deadline_date`, `payment_proof`, `notes`, `created_at`) VALUES
(1, 'ORD-20260314-0001', 1, 'wedding', 'Premium', 1, 2, 'paid', 'in_progress', 129000, 0, 129000, 50000, 129000, 'bank_transfer', '2026-03-14', '2026-06-30', NULL, 'Order wedding sample', NOW()),
(2, 'ORD-20260314-0002', 2, 'greeting_card', 'Greeting Pro', 3, 2, 'paid', 'completed', 89000, 0, 89000, 0, 89000, 'qris', '2026-03-14', '2026-03-20', NULL, 'Order greeting card sample', NOW());
INSERT INTO `projects` (`id`, `order_id`, `product_type`, `template_id`, `assigned_user_id`, `slug`, `title`, `subtitle`, `cover_text`, `hero_image`, `music_url`, `event_date`, `event_time`, `deadline_date`, `location_name`, `location_address`, `map_embed`, `description`, `sender_name`, `receiver_name`, `message_title`, `message_body`, `rsvp_enabled`, `wish_enabled`, `gift_enabled`, `gift_info`, `revision_notes`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'wedding', 1, 2, 'amel-budi', 'Amel & Budi', 'The Wedding Celebration', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1400&q=80', '', '2026-07-12', '10:00 WIB', '2026-06-30', 'Gedung Serbaguna Bahagia', 'Jl. Mawar No. 88, Sidoarjo', '', 'Dengan penuh kebahagiaan kami mengundang Anda untuk hadir di hari istimewa kami.', '', '', 'Wedding Invitation', '', 1, 1, 1, 'BCA 123456789 a.n. Amel Budi', 'Client minta revisi foto cover dan gift info.', 'published', NOW(), NOW()),
(2, 2, 'greeting_card', 3, 2, 'happy-birthday-bella', 'Happy Birthday Bella', 'A Little Surprise For You', 'Untuk seseorang yang spesial', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1400&q=80', '', NULL, '', '2026-03-20', '', '', '', 'Semoga hari-harimu selalu penuh kebahagiaan, kesehatan, dan kejutan manis.', 'AKT Team', 'Bella', 'Best Wishes', 'Selamat ulang tahun. Semoga semua hal baik datang menghampirimu tahun ini.', 0, 0, 0, '', '', 'published', NOW(), NOW());
INSERT INTO `guests` (`project_id`, `guest_name`, `phone`, `category`, `slug`, `is_opened`, `opened_at`, `created_at`) VALUES (1, 'Albert', '6281234567890', 'Keluarga', 'albert', 1, NOW(), NOW()), (1, 'Bapak Ahmad', '628222333444', 'VIP', 'bapak-ahmad', 0, NULL, NOW()), (1, 'Ibu Rina', '', 'Teman', 'ibu-rina', 0, NULL, NOW());
INSERT INTO `rsvps` (`project_id`, `guest_id`, `guest_name`, `attendance_status`, `guest_total`, `note`, `created_at`) VALUES (1, 3, 'Ibu Rina', 'Hadir', 2, 'InsyaAllah hadir', NOW());
INSERT INTO `project_timelines` (`project_id`, `user_id`, `status_label`, `note`, `approval_status`, `approved_by`, `approved_at`, `created_at`) VALUES (1, 2, 'Kickoff', 'Project dibuat dan menunggu revisi cover photo dari client.', 'approved', 1, NOW(), NOW()), (1, 2, 'Revision', 'Client minta update gift info dan foto cover.', 'pending', NULL, NULL, NOW());
INSERT INTO `wishes` (`project_id`, `guest_name`, `message`, `status`, `is_approved`, `created_at`) VALUES (1, 'Dewi', 'Selamat menempuh hidup baru, semoga langgeng dan bahagia selalu.', 'approved', 1, NOW()), (1, 'Fahri', 'Happy wedding, lancar sampai hari H.', 'pending', 0, NOW());
ALTER TABLE `orders` ADD CONSTRAINT `orders_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE, ADD CONSTRAINT `orders_template_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE, ADD CONSTRAINT `orders_user_fk` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `projects` ADD CONSTRAINT `projects_order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE CASCADE, ADD CONSTRAINT `projects_template_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL ON UPDATE CASCADE, ADD CONSTRAINT `projects_user_fk` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `guests` ADD CONSTRAINT `guests_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `rsvps` ADD CONSTRAINT `rsvps_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE, ADD CONSTRAINT `rsvps_guest_fk` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `project_timelines` ADD CONSTRAINT `project_timelines_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE, ADD CONSTRAINT `project_timelines_user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
ALTER TABLE `wishes` ADD CONSTRAINT `wishes_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `project_galleries` ADD CONSTRAINT `project_galleries_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `project_galleries` (`project_id`, `image_path`, `caption`, `sort_order`, `created_at`) VALUES
(1, 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=1200&q=80', 'Momen prewedding', 1, NOW()),
(1, 'https://images.unsplash.com/photo-1519225421980-715cb0215aed?auto=format&fit=crop&w=1200&q=80', 'Venue wedding', 2, NOW());
COMMIT;
SET FOREIGN_KEY_CHECKS=1;


-- Add-on greeting card animation template for existing installation
INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `thumbnail`, `description`, `preview_mobile`, `preview_desktop`, `demo_url`, `sort_order`, `is_active`, `created_at`)
SELECT 4, 'Greeting Blossom Animation', 'greeting_blossom', 'greeting_card', 'https://images.unsplash.com/photo-1464349153735-7db50ed83c84?auto=format&fit=crop&w=900&q=80', 'Greeting card animasi lucu dengan nuansa pastel, cocok untuk birthday dan ucapan manis.', NULL, NULL, 'http://localhost/ci3_invitation_business_v4_3_production/card/happy-birthday-bella', 2, 1, NOW()
WHERE NOT EXISTS (SELECT 1 FROM `templates` WHERE `folder` = 'greeting_blossom');
