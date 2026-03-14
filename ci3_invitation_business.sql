-- CI3 Invitation Business Starter SQL
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `wishes`;
DROP TABLE IF EXISTS `rsvps`;
DROP TABLE IF EXISTS `guests`;
DROP TABLE IF EXISTS `projects`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `templates`;
DROP TABLE IF EXISTS `customers`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `customers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `folder` varchar(100) NOT NULL,
  `product_type` varchar(50) NOT NULL DEFAULT 'wedding',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int unsigned NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `package_name` varchar(100) DEFAULT NULL,
  `template_id` int unsigned DEFAULT NULL,
  `payment_status` varchar(30) DEFAULT 'unpaid',
  `status` varchar(30) DEFAULT 'new',
  `notes` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `template_id` (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int unsigned DEFAULT NULL,
  `product_type` varchar(50) NOT NULL,
  `template_id` int unsigned DEFAULT NULL,
  `slug` varchar(150) NOT NULL,
  `title` varchar(200) NOT NULL,
  `subtitle` varchar(200) DEFAULT NULL,
  `cover_text` varchar(200) DEFAULT NULL,
  `hero_image` text,
  `music_url` text,
  `event_date` date DEFAULT NULL,
  `event_time` varchar(80) DEFAULT NULL,
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
  `status` varchar(30) NOT NULL DEFAULT 'draft',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `order_id` (`order_id`),
  KEY `template_id` (`template_id`)
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
  `guest_name` varchar(120) NOT NULL,
  `attendance_status` varchar(50) DEFAULT NULL,
  `guest_total` int DEFAULT 1,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `wishes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `guest_name` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$12$O7PZeXPDY3oHgZXe/hB5ZuQzOzKsKUhWPtijKLXQ91qqcLzvN3ptq', NOW());

INSERT INTO `customers` (`id`, `name`, `phone`, `notes`, `created_at`) VALUES
(1, 'Albert', '081234567890', 'Sample customer wedding', NOW()),
(2, 'Bella', '081298765432', 'Sample customer greeting card', NOW());

INSERT INTO `templates` (`id`, `name`, `folder`, `product_type`, `is_active`) VALUES
(1, 'Romantic Wedding', 'romantic', 'wedding', 1),
(2, 'Floral Wedding', 'floral', 'wedding', 1),
(3, 'Greeting Special', 'greeting', 'greeting_card', 1);

INSERT INTO `orders` (`id`, `customer_id`, `product_type`, `package_name`, `template_id`, `payment_status`, `status`, `notes`, `created_at`) VALUES
(1, 1, 'wedding', 'Premium', 1, 'paid', 'in_progress', 'Order wedding sample', NOW()),
(2, 2, 'greeting_card', 'Basic', 3, 'paid', 'completed', 'Order greeting card sample', NOW());

INSERT INTO `projects` (`id`, `order_id`, `product_type`, `template_id`, `slug`, `title`, `subtitle`, `cover_text`, `hero_image`, `music_url`, `event_date`, `event_time`, `location_name`, `location_address`, `map_embed`, `description`, `sender_name`, `receiver_name`, `message_title`, `message_body`, `rsvp_enabled`, `wish_enabled`, `gift_enabled`, `gift_info`, `status`, `created_at`) VALUES
(1, 1, 'wedding', 1, 'amel-budi', 'Amel & Budi', 'The Wedding Celebration', 'Kepada Yth. Bapak/Ibu/Saudara/i', 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1400&q=80', '', '2026-07-12', '10:00 WIB', 'Gedung Serbaguna Bahagia', 'Jl. Mawar No. 88, Sidoarjo', '', 'Dengan penuh kebahagiaan kami mengundang Anda untuk hadir di hari istimewa kami.', '', '', 'Wedding Invitation', '', 1, 1, 1, 'BCA 123456789 a.n. Amel Budi', 'published', NOW()),
(2, 2, 'greeting_card', 3, 'happy-birthday-bella', 'Happy Birthday Bella', 'A Little Surprise For You', 'Untuk seseorang yang spesial', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=1400&q=80', '', NULL, '', '', '', '', 'Semoga hari-harimu selalu penuh kebahagiaan, kesehatan, dan kejutan manis.', 'AKT Team', 'Bella', 'Best Wishes', 'Selamat ulang tahun. Semoga semua hal baik datang menghampirimu tahun ini.', 0, 0, 0, '', 'published', NOW());


INSERT INTO `guests` (`project_id`, `guest_name`, `phone`, `category`, `slug`, `is_opened`, `opened_at`, `created_at`) VALUES
(1, 'Albert', '6281234567890', 'Keluarga', 'albert', 1, NOW(), NOW()),
(1, 'Bapak Ahmad', '628222333444', 'VIP', 'bapak-ahmad', 0, NULL, NOW()),
(1, 'Ibu Rina', '', 'Teman', 'ibu-rina', 0, NULL, NOW());

INSERT INTO `rsvps` (`project_id`, `guest_name`, `attendance_status`, `guest_total`, `note`, `created_at`) VALUES
(1, 'Rina', 'Hadir', 2, 'InsyaAllah hadir', NOW());

INSERT INTO `wishes` (`project_id`, `guest_name`, `message`, `is_approved`, `created_at`) VALUES
(1, 'Dewi', 'Selamat menempuh hidup baru, semoga langgeng dan bahagia selalu.', 1, NOW()),
(1, 'Fahri', 'Happy wedding, lancar sampai hari H.', 1, NOW());

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_fk` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_template_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL;

ALTER TABLE `projects`
  ADD CONSTRAINT `projects_order_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_template_fk` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL;

ALTER TABLE `guests`
  ADD CONSTRAINT `guests_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

ALTER TABLE `rsvps`
  ADD CONSTRAINT `rsvps_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

ALTER TABLE `wishes`
  ADD CONSTRAINT `wishes_project_fk` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

COMMIT;
