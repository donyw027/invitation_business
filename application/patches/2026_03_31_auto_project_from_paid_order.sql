-- Patch: auto project from paid order
-- Jalankan pada database yang SUDAH terpasang dari db_fix.sql lama

ALTER TABLE `projects`
ADD COLUMN `source` varchar(30) NOT NULL DEFAULT 'manual' AFTER `order_id`;

UPDATE `projects`
SET `source` = CASE
    WHEN `order_id` IS NOT NULL AND `id` IN (
        SELECT * FROM (
            SELECT MIN(`id`)
            FROM `projects`
            WHERE `order_id` IS NOT NULL
            GROUP BY `order_id`
        ) x
    ) THEN 'order_auto'
    ELSE 'manual'
END;
