-- ============================================================
-- RODEO LAUNDRY — Company Profile Website Database
-- Database: rodeo_laundry_web
-- Created: 2026-03-03
-- Based on: RODEO_LAUNDRY_Company_Profile_Planning.md
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";
SET NAMES utf8mb4;

-- ============================================================
-- DROP EXISTING TABLES (untuk fresh install)
-- ============================================================

DROP TABLE IF EXISTS `order_items`;
DROP TABLE IF EXISTS `orders`;
DROP TABLE IF EXISTS `customers`;
DROP TABLE IF EXISTS `products`;
DROP TABLE IF EXISTS `service_categories`;
DROP TABLE IF EXISTS `service_types`;
DROP TABLE IF EXISTS `company_settings`;
DROP TABLE IF EXISTS `operating_hours`;
DROP TABLE IF EXISTS `team_members`;
DROP TABLE IF EXISTS `testimonials`;
DROP TABLE IF EXISTS `faq`;
DROP TABLE IF EXISTS `gallery`;
DROP TABLE IF EXISTS `contact_messages`;
DROP TABLE IF EXISTS `page_contents`;
DROP TABLE IF EXISTS `statistics_cache`;

-- ============================================================
-- 1. COMPANY SETTINGS
--    Menyimpan informasi perusahaan untuk ditampilkan di seluruh halaman
--    Digunakan di: Header, Footer, Kontak, Tentang Kami
-- ============================================================

CREATE TABLE `company_settings` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `setting_key` VARCHAR(100) NOT NULL UNIQUE,
    `setting_value` TEXT NULL,
    `setting_group` VARCHAR(50) NOT NULL DEFAULT 'general' COMMENT 'Grup: general, contact, social, seo',
    `description` VARCHAR(255) NULL COMMENT 'Deskripsi setting untuk admin',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_setting_group` (`setting_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Konfigurasi perusahaan (identitas, kontak, SEO, dll)';

-- ============================================================
-- 2. SERVICE CATEGORIES
--    Kategori layanan laundry (Setrika, Cuci Kering, Selimut, dll)
--    Digunakan di: Halaman Layanan & Harga, Preview di Beranda
-- ============================================================

CREATE TABLE `service_categories` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL COMMENT 'Nama kategori (cth: Setrika, Cuci Kering)',
    `slug` VARCHAR(120) NOT NULL UNIQUE COMMENT 'URL-friendly name',
    `description` TEXT NULL COMMENT 'Deskripsi kategori',
    `icon` VARCHAR(100) NULL COMMENT 'FontAwesome icon class (cth: fa-tshirt)',
    `image` VARCHAR(255) NULL COMMENT 'Path gambar kategori',
    `type` ENUM('reguler', 'premium') NOT NULL DEFAULT 'reguler' COMMENT 'Tipe layanan',
    `sort_order` INT NOT NULL DEFAULT 0 COMMENT 'Urutan tampil',
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_type` (`type`),
    INDEX `idx_sort_order` (`sort_order`),
    INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Kategori layanan laundry (reguler & premium)';

-- ============================================================
-- 3. PRODUCTS
--    Produk/layanan spesifik dalam setiap kategori
--    Berisi harga, satuan, dan estimasi waktu
--    Digunakan di: Halaman Layanan & Harga
-- ============================================================

CREATE TABLE `products` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `category_id` INT UNSIGNED NOT NULL,
    `name` VARCHAR(150) NOT NULL COMMENT 'Nama produk (cth: Selimut Ukuran L)',
    `slug` VARCHAR(170) NOT NULL UNIQUE,
    `description` TEXT NULL,
    `price` DECIMAL(10,2) NOT NULL COMMENT 'Harga per satuan',
    `unit` VARCHAR(30) NOT NULL DEFAULT '/pcs' COMMENT 'Satuan: /kg, /pcs, /meter',
    `estimated_duration` VARCHAR(50) NULL COMMENT 'Estimasi waktu pengerjaan',
    `size_variant` VARCHAR(50) NULL COMMENT 'Varian ukuran (S, M, L, XL, XXL)',
    `icon` VARCHAR(100) NULL COMMENT 'FontAwesome icon class',
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT `fk_products_category` 
        FOREIGN KEY (`category_id`) REFERENCES `service_categories`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,

    INDEX `idx_category` (`category_id`),
    INDEX `idx_active` (`is_active`),
    INDEX `idx_sort_order` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Daftar produk/layanan laundry beserta harga';

-- ============================================================
-- 4. SERVICE TYPES
--    Jenis layanan berdasarkan kecepatan (Reguler, Express, dll)
--    Digunakan di: Halaman Layanan & Harga, Form Pemesanan
-- ============================================================

CREATE TABLE `service_types` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL COMMENT 'Nama jenis layanan',
    `slug` VARCHAR(120) NOT NULL UNIQUE,
    `description` TEXT NULL,
    `estimated_duration` VARCHAR(50) NULL COMMENT 'Estimasi waktu (cth: ~24 jam)',
    `additional_cost` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Biaya tambahan',
    `additional_cost_note` VARCHAR(255) NULL COMMENT 'Catatan biaya tambahan',
    `icon` VARCHAR(100) NULL,
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Jenis layanan berdasarkan kecepatan pengerjaan';

-- ============================================================
-- 5. CUSTOMERS
--    Data pelanggan untuk tracking order dan statistik
--    Digunakan di: Cek Status Order, Statistik Tentang Kami
-- ============================================================

CREATE TABLE `customers` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(20) NULL,
    `email` VARCHAR(150) NULL,
    `address` TEXT NULL,
    `customer_type` ENUM('personal', 'business') NOT NULL DEFAULT 'personal' COMMENT 'Tipe: personal atau B2B',
    `business_name` VARCHAR(200) NULL COMMENT 'Nama bisnis (untuk pelanggan B2B)',
    `notes` TEXT NULL,
    `total_orders` INT UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Counter total pesanan',
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_phone` (`phone`),
    INDEX `idx_customer_type` (`customer_type`),
    INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Data pelanggan (personal & B2B)';

-- ============================================================
-- 6. ORDERS
--    Pesanan utama dengan tracking token untuk fitur Cek Status Order
--    Digunakan di: Cek Status Order (publik), Statistik
-- ============================================================

CREATE TABLE `orders` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `order_number` VARCHAR(30) NOT NULL UNIQUE COMMENT 'Format: RODEO-YYYYMMDD-XXXX',
    `tracking_token` VARCHAR(64) NOT NULL UNIQUE COMMENT 'Token unik untuk tracking publik',
    `customer_id` INT UNSIGNED NULL,
    `customer_name` VARCHAR(150) NOT NULL COMMENT 'Nama pelanggan (snapshot)',
    `customer_phone` VARCHAR(20) NULL,
    `service_type_id` INT UNSIGNED NULL,
    `status` ENUM('pending', 'processing', 'done', 'picked_up', 'cancelled') NOT NULL DEFAULT 'pending',
    `status_note` VARCHAR(255) NULL COMMENT 'Catatan status (opsional)',
    `total_items` INT UNSIGNED NOT NULL DEFAULT 0,
    `total_weight` DECIMAL(8,2) NULL COMMENT 'Total berat (kg) jika relevan',
    `subtotal` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
    `additional_cost` DECIMAL(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Biaya tambahan (express, dll)',
    `discount` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
    `total_price` DECIMAL(12,2) NOT NULL DEFAULT 0.00,
    `payment_status` ENUM('unpaid', 'partial', 'paid') NOT NULL DEFAULT 'unpaid',
    `payment_method` VARCHAR(50) NULL COMMENT 'Metode bayar: cash, transfer, dll',
    `notes` TEXT NULL COMMENT 'Catatan order',
    `estimated_done_at` DATETIME NULL COMMENT 'Estimasi selesai',
    `completed_at` DATETIME NULL COMMENT 'Tanggal selesai aktual',
    `picked_up_at` DATETIME NULL COMMENT 'Tanggal diambil',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT `fk_orders_customer`
        FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE,

    CONSTRAINT `fk_orders_service_type`
        FOREIGN KEY (`service_type_id`) REFERENCES `service_types`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE,

    INDEX `idx_order_number` (`order_number`),
    INDEX `idx_tracking_token` (`tracking_token`),
    INDEX `idx_customer` (`customer_id`),
    INDEX `idx_status` (`status`),
    INDEX `idx_payment_status` (`payment_status`),
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Pesanan pelanggan dengan tracking token untuk akses publik';

-- ============================================================
-- 7. ORDER ITEMS
--    Detail item dalam setiap pesanan
--    Digunakan di: Detail Cek Status Order
-- ============================================================

CREATE TABLE `order_items` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `order_id` INT UNSIGNED NOT NULL,
    `product_id` INT UNSIGNED NULL,
    `product_name` VARCHAR(150) NOT NULL COMMENT 'Nama produk (snapshot)',
    `quantity` INT UNSIGNED NOT NULL DEFAULT 1,
    `unit` VARCHAR(30) NOT NULL DEFAULT '/pcs',
    `unit_price` DECIMAL(10,2) NOT NULL,
    `subtotal` DECIMAL(12,2) NOT NULL,
    `notes` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT `fk_order_items_order`
        FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE,

    CONSTRAINT `fk_order_items_product`
        FOREIGN KEY (`product_id`) REFERENCES `products`(`id`)
        ON DELETE SET NULL ON UPDATE CASCADE,

    INDEX `idx_order` (`order_id`),
    INDEX `idx_product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Detail item per pesanan';

-- ============================================================
-- 8. TESTIMONIALS
--    Testimonial pelanggan untuk ditampilkan di Beranda
--    Digunakan di: Halaman Beranda (section testimonial)
-- ============================================================

CREATE TABLE `testimonials` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `customer_name` VARCHAR(150) NOT NULL,
    `customer_title` VARCHAR(100) NULL COMMENT 'Jabatan/deskripsi (cth: Pemilik Villa Aster)',
    `content` TEXT NOT NULL COMMENT 'Isi testimonial',
    `rating` TINYINT UNSIGNED NOT NULL DEFAULT 5 COMMENT 'Rating 1-5 bintang',
    `avatar` VARCHAR(255) NULL COMMENT 'Path foto pelanggan',
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_active` (`is_active`),
    INDEX `idx_rating` (`rating`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Testimonial pelanggan untuk halaman beranda';

-- ============================================================
-- 9. FAQ
--    Pertanyaan yang sering diajukan
--    Digunakan di: Halaman FAQ
-- ============================================================

CREATE TABLE `faq` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `question` VARCHAR(500) NOT NULL,
    `answer` TEXT NOT NULL,
    `category` VARCHAR(100) NULL COMMENT 'Kategori FAQ (cth: Layanan, Pembayaran, dll)',
    `icon` VARCHAR(100) NULL,
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_category` (`category`),
    INDEX `idx_active` (`is_active`),
    INDEX `idx_sort_order` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Frequently Asked Questions';

-- ============================================================
-- 10. OPERATING HOURS
--     Jam operasional per hari
--     Digunakan di: Halaman Kontak & Lokasi, Footer
-- ============================================================

CREATE TABLE `operating_hours` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `day_of_week` TINYINT UNSIGNED NOT NULL COMMENT '1=Senin, 2=Selasa, ..., 7=Minggu',
    `day_name` VARCHAR(20) NOT NULL COMMENT 'Nama hari',
    `open_time` TIME NULL COMMENT 'Jam buka (NULL = tutup)',
    `close_time` TIME NULL COMMENT 'Jam tutup (NULL = tutup)',
    `is_closed` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '1 = hari libur',
    `note` VARCHAR(255) NULL COMMENT 'Catatan tambahan',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    UNIQUE KEY `uk_day` (`day_of_week`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Jam operasional per hari';

-- ============================================================
-- 11. TEAM MEMBERS
--     Anggota tim untuk halaman Tentang Kami
--     Digunakan di: Halaman Tentang Kami (section tim)
-- ============================================================

CREATE TABLE `team_members` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `position` VARCHAR(100) NOT NULL COMMENT 'Jabatan (cth: Owner, Manager, Staff)',
    `photo` VARCHAR(255) NULL COMMENT 'Path foto',
    `bio` TEXT NULL COMMENT 'Bio singkat',
    `phone` VARCHAR(20) NULL,
    `email` VARCHAR(150) NULL,
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_active` (`is_active`),
    INDEX `idx_sort_order` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Anggota tim untuk halaman Tentang Kami';

-- ============================================================
-- 12. GALLERY
--     Galeri foto untuk website (outlet, before-after, dll)
--     Digunakan di: Halaman Galeri (opsional), Beranda
-- ============================================================

CREATE TABLE `gallery` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `description` TEXT NULL,
    `image_path` VARCHAR(255) NOT NULL,
    `image_alt` VARCHAR(255) NULL COMMENT 'Alt text untuk SEO',
    `category` ENUM('outlet', 'before_after', 'process', 'team', 'other') NOT NULL DEFAULT 'other',
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_category` (`category`),
    INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Galeri foto website';

-- ============================================================
-- 13. CONTACT MESSAGES
--     Pesan dari form kontak / pemesanan online
--     Digunakan di: Halaman Kontak (form), Admin panel
-- ============================================================

CREATE TABLE `contact_messages` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(150) NOT NULL,
    `phone` VARCHAR(20) NULL,
    `email` VARCHAR(150) NULL,
    `subject` VARCHAR(255) NULL,
    `message` TEXT NOT NULL,
    `message_type` ENUM('general', 'order', 'complaint', 'b2b_inquiry') NOT NULL DEFAULT 'general',
    `is_read` TINYINT(1) NOT NULL DEFAULT 0,
    `is_replied` TINYINT(1) NOT NULL DEFAULT 0,
    `replied_at` DATETIME NULL,
    `admin_notes` TEXT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_type` (`message_type`),
    INDEX `idx_read` (`is_read`),
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Pesan masuk dari form kontak website';

-- ============================================================
-- 14. PAGE CONTENTS (Mini CMS)
--     Konten halaman yang bisa diedit dari admin
--     Digunakan di: Semua halaman (hero text, about text, dll)
-- ============================================================

CREATE TABLE `page_contents` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `page` VARCHAR(50) NOT NULL COMMENT 'Halaman: home, about, services, contact, faq',
    `section` VARCHAR(100) NOT NULL COMMENT 'Section dalam halaman (cth: hero_title, hero_subtitle)',
    `content_key` VARCHAR(100) NOT NULL UNIQUE COMMENT 'Key unik untuk akses programatis',
    `content_value` TEXT NULL COMMENT 'Isi konten (bisa HTML)',
    `content_type` ENUM('text', 'html', 'image', 'json') NOT NULL DEFAULT 'text',
    `description` VARCHAR(255) NULL COMMENT 'Deskripsi untuk admin',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_page` (`page`),
    INDEX `idx_section` (`section`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Konten halaman website (mini CMS)';

-- ============================================================
-- 15. STATISTICS CACHE
--     Cache untuk angka-angka statistik yang ditampilkan
--     Digunakan di: Halaman Tentang Kami, Beranda
-- ============================================================

CREATE TABLE `statistics_cache` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `stat_key` VARCHAR(100) NOT NULL UNIQUE COMMENT 'Key statistik (cth: total_orders, total_customers)',
    `stat_value` VARCHAR(100) NOT NULL DEFAULT '0',
    `stat_label` VARCHAR(150) NOT NULL COMMENT 'Label tampilan (cth: Total Pesanan Selesai)',
    `stat_icon` VARCHAR(100) NULL COMMENT 'FontAwesome icon',
    `sort_order` INT NOT NULL DEFAULT 0,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `last_calculated_at` TIMESTAMP NULL COMMENT 'Terakhir dihitung',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    INDEX `idx_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
COMMENT='Cache statistik untuk tampilan website';
