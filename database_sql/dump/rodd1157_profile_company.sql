-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2026 at 05:25 PM
-- Server version: 11.4.10-MariaDB-cll-lve
-- PHP Version: 8.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rodd1157_profile_company`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`rodd1157`@`localhost` PROCEDURE `sp_generate_order_number` (OUT `new_order_number` VARCHAR(30))   BEGIN
    DECLARE today_date VARCHAR(8);
    DECLARE order_count INT;
    
    SET today_date = DATE_FORMAT(NOW(), '%Y%m%d');
    
    SELECT COUNT(*) + 1 INTO order_count
    FROM `orders`
    WHERE DATE(created_at) = CURDATE();
    
    SET new_order_number = CONCAT('RODEO-', today_date, '-', LPAD(order_count, 4, '0'));
END$$

CREATE DEFINER=`rodd1157`@`localhost` PROCEDURE `sp_generate_tracking_token` (OUT `new_token` VARCHAR(64))   BEGIN
    SET new_token = CONCAT('TRK-', MD5(CONCAT(NOW(), RAND(), UUID())));
END$$

CREATE DEFINER=`rodd1157`@`localhost` PROCEDURE `sp_update_statistics_cache` ()   BEGIN
    UPDATE `statistics_cache` SET 
        `stat_value` = (SELECT CAST(COUNT(*) AS CHAR) FROM `orders` WHERE `status` IN ('done', 'picked_up')),
        `last_calculated_at` = NOW()
    WHERE `stat_key` = 'total_orders_completed';
    
    UPDATE `statistics_cache` SET 
        `stat_value` = (SELECT CAST(COUNT(*) AS CHAR) FROM `customers` WHERE `is_active` = 1),
        `last_calculated_at` = NOW()
    WHERE `stat_key` = 'total_customers';
    
    UPDATE `statistics_cache` SET 
        `stat_value` = (SELECT CAST(COUNT(*) AS CHAR) FROM `service_categories` WHERE `is_active` = 1),
        `last_calculated_at` = NOW()
    WHERE `stat_key` = 'total_service_categories';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `setting_group` varchar(50) NOT NULL DEFAULT 'general' COMMENT 'Grup: general, contact, social, seo',
  `description` varchar(255) DEFAULT NULL COMMENT 'Deskripsi setting untuk admin',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Konfigurasi perusahaan (identitas, kontak, SEO, dll)';

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `setting_key`, `setting_value`, `setting_group`, `description`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'Rodeo Laundry', 'general', 'Nama perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'company_tagline', 'Bersih, Cepat, Terpercaya', 'general', 'Tagline perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'company_description', 'Rodeo Laundry adalah jasa laundry profesional yang melayani cuci reguler, premium, dan berbagai kebutuhan pencucian lainnya dengan hasil bersih dan tepat waktu.', 'general', 'Deskripsi singkat perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'company_founded_year', '2024', 'general', 'Tahun berdiri', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 'company_logo', '/assets/images/logo.png', 'general', 'Path logo perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(6, 'company_favicon', '/assets/images/favicon.ico', 'general', 'Path favicon', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(7, 'company_address', 'Batu, Sumberejo, Gg. Rodeo', 'contact', 'Alamat lengkap', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(8, 'company_city', 'Kota Batu', 'contact', 'Kota', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(9, 'company_province', 'Jawa Timur', 'contact', 'Provinsi', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(10, 'company_phone', '+62 821-4329-7707', 'contact', 'Nomor telepon utama', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(11, 'company_whatsapp', '6282143297707', 'contact', 'Nomor WhatsApp (format internasional tanpa +)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(12, 'company_email', 'info@rodeolaundry.my.id', 'contact', 'Email perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(13, 'company_domain', 'rodeolaundry.my.id', 'contact', 'Domain website', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(14, 'company_maps_embed', 'https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE_HERE', 'contact', 'Google Maps embed URL', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(15, 'company_maps_link', 'https://maps.google.com/?q=Sumberejo+Batu+Gg+Rodeo', 'contact', 'Google Maps direct link', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(16, 'social_instagram', '', 'social', 'URL Instagram', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(17, 'social_facebook', '', 'social', 'URL Facebook', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(18, 'social_tiktok', '', 'social', 'URL TikTok', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(19, 'seo_meta_title', 'Rodeo Laundry — Bersih, Cepat, Terpercaya | Kota Batu', 'seo', 'Meta title untuk SEO', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(20, 'seo_meta_description', 'Jasa laundry profesional di Kota Batu. Layanan cuci reguler & premium, harga terjangkau, bisa tracking pesanan online. Hubungi kami sekarang!', 'seo', 'Meta description untuk SEO', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(21, 'seo_meta_keywords', 'laundry batu, laundry kota batu, cuci baju batu, rodeo laundry, laundry terdekat, laundry murah batu', 'seo', 'Meta keywords', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(22, 'seo_og_image', '/assets/images/og-image.jpg', 'seo', 'Open Graph image untuk social share', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(23, 'wa_template_general', 'Halo Rodeo Laundry! 👋%0ASaya ingin bertanya tentang layanan laundry.%0A%0ANama: _______', 'contact', 'Template pesan WA umum', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(24, 'wa_template_order', 'Halo Rodeo Laundry! 👋%0ASaya ingin memesan layanan laundry.%0A%0ANama: _______%0ALayanan: _______%0AAlamat: _______', 'contact', 'Template pesan WA pemesanan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(25, 'color_primary', '#1E4D8C', 'design', 'Warna primer (Biru Laut)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(26, 'color_accent', '#F5821F', 'design', 'Warna aksen (Oranye Segar)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(27, 'color_background', '#FFFFFF', 'design', 'Warna latar (Putih Bersih)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(28, 'color_text', '#2D2D2D', 'design', 'Warna teks (Abu Gelap)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(29, 'color_secondary_bg', '#F5F5F5', 'design', 'Warna latar sekunder (Abu Terang)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(30, 'font_heading', 'Poppins', 'design', 'Font untuk judul', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(31, 'font_body', 'Inter', 'design', 'Font untuk body text', '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `message_type` enum('general','order','complaint','b2b_inquiry') NOT NULL DEFAULT 'general',
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_replied` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` datetime DEFAULT NULL,
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Pesan masuk dari form kontak website';

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `customer_type` enum('personal','business') NOT NULL DEFAULT 'personal' COMMENT 'Tipe: personal atau B2B',
  `business_name` varchar(200) DEFAULT NULL COMMENT 'Nama bisnis (untuk pelanggan B2B)',
  `notes` text DEFAULT NULL,
  `total_orders` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Counter total pesanan',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Data pelanggan (personal & B2B)';

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `address`, `customer_type`, `business_name`, `notes`, `total_orders`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pelanggan Walk-In', NULL, NULL, NULL, 'personal', NULL, NULL, 0, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'Erick Catering', NULL, NULL, NULL, 'business', 'Erick Catering', NULL, 0, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'Villa Aster', NULL, NULL, NULL, 'business', 'Villa Aster', NULL, 0, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(100) DEFAULT NULL COMMENT 'Kategori FAQ (cth: Layanan, Pembayaran, dll)',
  `icon` varchar(100) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Frequently Asked Questions';

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Berapa lama waktu proses pencucian?', 'Untuk layanan reguler, waktu proses bervariasi tergantung jenis layanan. Cuci setrika biasanya memakan waktu 2-3 hari kerja. Kami juga menyediakan layanan Express 24 Jam dan Same Day untuk kebutuhan mendesak dengan biaya tambahan.', 'Layanan', 'fa-clock', 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'Apakah ada layanan antar-jemput?', 'Saat ini kami melayani antar-jemput untuk area Kota Batu dan sekitarnya. Silakan hubungi kami via WhatsApp untuk informasi lebih lanjut mengenai jangkauan area dan biaya antar-jemput.', 'Layanan', 'fa-truck', 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'Bagaimana cara melacak status laundry saya?', 'Anda bisa melacak status pesanan melalui halaman \"Cek Status Order\" di website kami. Cukup masukkan nomor order (format: RODEO-YYYYMMDD-XXXX) atau token tracking yang diberikan saat pemesanan.', 'Tracking', 'fa-search', 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'Apa bedanya layanan reguler dan premium?', 'Layanan reguler adalah cuci standar yang cocok untuk pakaian sehari-hari. Layanan premium menggunakan proses yang lebih teliti dan hati-hati, cocok untuk pakaian formal, berbahan khusus, atau item yang membutuhkan perawatan ekstra. Estimasi waktu premium adalah 48-72 jam.', 'Layanan', 'fa-star', 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 'Apakah bisa bayar nanti (hutang/kredit)?', 'Kami menerima pembayaran tunai dan transfer. Untuk pelanggan tetap atau pelanggan bisnis (B2B), kami menyediakan opsi pembayaran yang bisa didiskusikan langsung. Silakan hubungi kami untuk informasi lebih lanjut.', 'Pembayaran', 'fa-credit-card', 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(6, 'Bagaimana jika pakaian saya rusak atau hilang?', 'Kami sangat menjaga kualitas dan keamanan setiap item yang masuk. Jika terjadi kerusakan atau kehilangan yang disebabkan oleh kelalaian kami, kami akan bertanggung jawab penuh. Setiap item dicatat dan diperiksa saat penerimaan dan pengembalian.', 'Garansi', 'fa-shield-alt', 6, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(7, 'Apakah melayani order dalam jumlah besar (villa, penginapan, catering)?', 'Ya! Kami melayani pelanggan bisnis (B2B) seperti villa, hotel, penginapan, kos-kosan, dan katering. Kami menawarkan harga khusus dan penjadwalan rutin untuk pelanggan bisnis. Hubungi kami melalui formulir Layanan Bisnis atau WhatsApp untuk penawaran spesial.', 'Bisnis', 'fa-building', 7, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `image_alt` varchar(255) DEFAULT NULL COMMENT 'Alt text untuk SEO',
  `category` enum('outlet','before_after','process','team','other') NOT NULL DEFAULT 'other',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Galeri foto website';

-- --------------------------------------------------------

--
-- Table structure for table `operating_hours`
--

CREATE TABLE `operating_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `day_of_week` tinyint(3) UNSIGNED NOT NULL COMMENT '1=Senin, 2=Selasa, ..., 7=Minggu',
  `day_name` varchar(20) NOT NULL COMMENT 'Nama hari',
  `open_time` time DEFAULT NULL COMMENT 'Jam buka (NULL = tutup)',
  `close_time` time DEFAULT NULL COMMENT 'Jam tutup (NULL = tutup)',
  `is_closed` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 = hari libur',
  `note` varchar(255) DEFAULT NULL COMMENT 'Catatan tambahan',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jam operasional per hari';

--
-- Dumping data for table `operating_hours`
--

INSERT INTO `operating_hours` (`id`, `day_of_week`, `day_name`, `open_time`, `close_time`, `is_closed`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '07:00:00', '21:00:00', 0, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 2, 'Selasa', '07:00:00', '21:00:00', 0, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 3, 'Rabu', '07:00:00', '21:00:00', 0, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 4, 'Kamis', '07:00:00', '21:00:00', 0, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 5, 'Jumat', '07:00:00', '21:00:00', 0, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(6, 6, 'Sabtu', '07:00:00', '21:00:00', 0, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(7, 7, 'Minggu', '08:00:00', '20:00:00', 0, 'Jam operasional lebih pendek', '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_number` varchar(30) NOT NULL COMMENT 'Format: RODEO-YYYYMMDD-XXXX',
  `tracking_token` varchar(64) NOT NULL COMMENT 'Token unik untuk tracking publik',
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(150) NOT NULL COMMENT 'Nama pelanggan (snapshot)',
  `customer_phone` varchar(20) DEFAULT NULL,
  `service_type_id` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('pending','processing','done','picked_up','cancelled') NOT NULL DEFAULT 'pending',
  `status_note` varchar(255) DEFAULT NULL COMMENT 'Catatan status (opsional)',
  `total_items` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_weight` decimal(8,2) DEFAULT NULL COMMENT 'Total berat (kg) jika relevan',
  `subtotal` decimal(12,2) NOT NULL DEFAULT 0.00,
  `additional_cost` decimal(12,2) NOT NULL DEFAULT 0.00 COMMENT 'Biaya tambahan (express, dll)',
  `discount` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `payment_status` enum('unpaid','partial','paid') NOT NULL DEFAULT 'unpaid',
  `payment_method` varchar(50) DEFAULT NULL COMMENT 'Metode bayar: cash, transfer, dll',
  `notes` text DEFAULT NULL COMMENT 'Catatan order',
  `estimated_done_at` datetime DEFAULT NULL COMMENT 'Estimasi selesai',
  `completed_at` datetime DEFAULT NULL COMMENT 'Tanggal selesai aktual',
  `picked_up_at` datetime DEFAULT NULL COMMENT 'Tanggal diambil',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Pesanan pelanggan dengan tracking token untuk akses publik';

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `tracking_token`, `customer_id`, `customer_name`, `customer_phone`, `service_type_id`, `status`, `status_note`, `total_items`, `total_weight`, `subtotal`, `additional_cost`, `discount`, `total_price`, `payment_status`, `payment_method`, `notes`, `estimated_done_at`, `completed_at`, `picked_up_at`, `created_at`, `updated_at`) VALUES
(1, 'RODEO-20260303-0001', 'TRK-abc123def456', 1, 'Pelanggan Walk-In', NULL, 1, 'processing', NULL, 1, NULL, 15000.00, 0.00, 0.00, 15000.00, 'unpaid', NULL, 'Order contoh untuk testing fitur tracking', '2026-03-05 17:00:00', NULL, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_name` varchar(150) NOT NULL COMMENT 'Nama produk (snapshot)',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `unit` varchar(30) NOT NULL DEFAULT '/pcs',
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Detail item per pesanan';

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `unit`, `unit_price`, `subtotal`, `notes`, `created_at`) VALUES
(1, 1, 3, 'Cuci Setrika', 3, '/kg', 5000.00, 15000.00, NULL, '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(50) NOT NULL COMMENT 'Halaman: home, about, services, contact, faq',
  `section` varchar(100) NOT NULL COMMENT 'Section dalam halaman (cth: hero_title, hero_subtitle)',
  `content_key` varchar(100) NOT NULL COMMENT 'Key unik untuk akses programatis',
  `content_value` text DEFAULT NULL COMMENT 'Isi konten (bisa HTML)',
  `content_type` enum('text','html','image','json') NOT NULL DEFAULT 'text',
  `description` varchar(255) DEFAULT NULL COMMENT 'Deskripsi untuk admin',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Konten halaman website (mini CMS)';

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page`, `section`, `content_key`, `content_value`, `content_type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'home', 'hero', 'home_hero_title', 'Bersih, Cepat, Terpercaya', 'text', 'Judul utama hero section', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'home', 'hero', 'home_hero_subtitle', 'Layanan laundry profesional di Kota Batu. Cuci reguler & premium dengan harga terjangkau dan bisa tracking online!', 'text', 'Subtitle hero section', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'home', 'hero', 'home_hero_cta_primary', 'Lihat Layanan', 'text', 'Teks tombol CTA utama', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'home', 'hero', 'home_hero_cta_secondary', 'Hubungi Kami', 'text', 'Teks tombol CTA sekunder', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 'home', 'hero', 'home_hero_image', '/assets/images/hero-bg.jpg', 'image', 'Gambar latar hero section', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(6, 'home', 'keunggulan', 'home_keunggulan_items', '[{\"icon\":\"fa-tag\",\"title\":\"Harga Terjangkau\",\"desc\":\"Mulai dari Rp 2.500/kg untuk layanan setrika\"},{\"icon\":\"fa-bolt\",\"title\":\"Proses Cepat\",\"desc\":\"Tersedia layanan Express Same Day dan 24 Jam\"},{\"icon\":\"fa-search\",\"title\":\"Tracking Online\",\"desc\":\"Pantau status pesanan Anda secara real-time\"},{\"icon\":\"fa-shield-alt\",\"title\":\"Terpercaya\",\"desc\":\"Setiap item dijaga dan dicatat dengan baik\"}]', 'json', 'Data keunggulan (JSON array)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(7, 'home', 'cara_kerja', 'home_cara_kerja_items', '[{\"step\":1,\"icon\":\"fa-box\",\"title\":\"Antar Cucian\",\"desc\":\"Antar cucian Anda ke outlet kami atau hubungi untuk layanan jemput\"},{\"step\":2,\"icon\":\"fa-sync-alt\",\"title\":\"Proses Cuci\",\"desc\":\"Tim kami memproses cucian dengan teliti sesuai jenis layanan\"},{\"step\":3,\"icon\":\"fa-check-circle\",\"title\":\"Ambil / Dikirim\",\"desc\":\"Cucian selesai! Ambil di outlet atau kami kirim ke alamat Anda\"}]', 'json', 'Langkah cara kerja (JSON array)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(8, 'home', 'cta_bottom', 'home_cta_title', 'Siap Mencuci Pakaian Anda?', 'text', 'Judul CTA bawah', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(9, 'home', 'cta_bottom', 'home_cta_subtitle', 'Hubungi kami sekarang atau cek status pesanan Anda dengan mudah', 'text', 'Subtitle CTA bawah', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(10, 'about', 'story', 'about_story_title', 'Cerita Kami', 'text', 'Judul sejarah perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(11, 'about', 'story', 'about_story_content', 'Rodeo Laundry berdiri dengan visi sederhana: memberikan layanan laundry yang bersih, cepat, dan terpercaya untuk masyarakat Kota Batu dan sekitarnya. Berawal dari usaha kecil di Sumberejo, Gg. Rodeo, kami terus berkembang melayani tidak hanya pelanggan rumah tangga, tetapi juga mitra bisnis seperti villa, penginapan, dan jasa katering.', 'html', 'Cerita/sejarah perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(12, 'about', 'vision', 'about_vision', 'Menjadi penyedia layanan laundry terpercaya dan modern di Kota Batu yang mengutamakan kebersihan, ketepatan waktu, dan kepuasan pelanggan.', 'text', 'Visi perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(13, 'about', 'mission', 'about_mission', 'Memberikan layanan laundry berkualitas tinggi dengan harga terjangkau, didukung teknologi tracking modern untuk kemudahan pelanggan.', 'text', 'Misi perusahaan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(14, 'about', 'values', 'about_values_items', '[{\"icon\":\"fa-sparkles\",\"title\":\"Bersih\",\"desc\":\"Hasil cucian bersih dan wangi\"},{\"icon\":\"fa-clock\",\"title\":\"Tepat Waktu\",\"desc\":\"Pesanan selesai sesuai estimasi\"},{\"icon\":\"fa-smile\",\"title\":\"Ramah Pelanggan\",\"desc\":\"Pelayanan hangat dan profesional\"},{\"icon\":\"fa-handshake\",\"title\":\"Terpercaya\",\"desc\":\"Setiap item dijaga dengan baik\"}]', 'json', 'Nilai perusahaan (JSON array)', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(15, 'services', 'header', 'services_title', 'Layanan & Harga', 'text', 'Judul halaman layanan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(16, 'services', 'header', 'services_subtitle', 'Kami menyediakan berbagai layanan laundry untuk kebutuhan Anda, dari cuci reguler hingga premium.', 'text', 'Subtitle halaman layanan', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(17, 'services', 'premium_note', 'services_premium_note', 'Proses lebih teliti, estimasi 48–72 jam. Cocok untuk pakaian formal dan berbahan khusus.', 'text', 'Catatan layanan premium', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(18, 'tracking', 'header', 'tracking_title', 'Cek Status Pesanan', 'text', 'Judul halaman tracking', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(19, 'tracking', 'header', 'tracking_subtitle', 'Masukkan nomor order atau token tracking Anda untuk melihat status pesanan secara real-time.', 'text', 'Subtitle halaman tracking', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(20, 'tracking', 'header', 'tracking_placeholder', 'Masukkan nomor order (cth: RODEO-20260301-0001) atau token tracking', 'text', 'Placeholder input tracking', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(21, 'contact', 'header', 'contact_title', 'Hubungi Kami', 'text', 'Judul halaman kontak', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(22, 'contact', 'header', 'contact_subtitle', 'Punya pertanyaan atau ingin memesan layanan? Jangan ragu untuk menghubungi kami.', 'text', 'Subtitle halaman kontak', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(23, 'faq', 'header', 'faq_title', 'Pertanyaan yang Sering Diajukan', 'text', 'Judul halaman FAQ', '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(24, 'faq', 'header', 'faq_subtitle', 'Temukan jawaban untuk pertanyaan umum seputar layanan Rodeo Laundry.', 'text', 'Subtitle halaman FAQ', '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL COMMENT 'Nama produk (cth: Selimut Ukuran L)',
  `slug` varchar(170) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL COMMENT 'Harga per satuan',
  `unit` varchar(30) NOT NULL DEFAULT '/pcs' COMMENT 'Satuan: /kg, /pcs, /meter',
  `estimated_duration` varchar(50) DEFAULT NULL COMMENT 'Estimasi waktu pengerjaan',
  `size_variant` varchar(50) DEFAULT NULL COMMENT 'Varian ukuran (S, M, L, XL, XXL)',
  `icon` varchar(100) DEFAULT NULL COMMENT 'FontAwesome icon class',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Daftar produk/layanan laundry beserta harga';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `description`, `price`, `unit`, `estimated_duration`, `size_variant`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Setrika Saja', 'setrika-saja', NULL, 2500.00, '/kg', NULL, NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 2, 'Cuci Kering Lipat', 'cuci-kering-lipat', NULL, 4000.00, '/kg', NULL, NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 3, 'Cuci Setrika', 'cuci-setrika-reguler', NULL, 5000.00, '/kg', NULL, NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 4, 'Selimut Ukuran S', 'selimut-s', NULL, 5000.00, '/pcs', NULL, 'S', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 4, 'Selimut Ukuran M', 'selimut-m', NULL, 8000.00, '/pcs', NULL, 'M', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(6, 4, 'Selimut Ukuran L', 'selimut-l', NULL, 10000.00, '/pcs', NULL, 'L', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(7, 4, 'Selimut Ukuran XL', 'selimut-xl', NULL, 15000.00, '/pcs', NULL, 'XL', NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(8, 4, 'Selimut Ukuran XXL', 'selimut-xxl', NULL, 20000.00, '/pcs', NULL, 'XXL', NULL, 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(9, 5, 'Bedcover Ukuran S', 'bedcover-s', NULL, 13000.00, '/pcs', NULL, 'S', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(10, 5, 'Bedcover Ukuran M', 'bedcover-m', NULL, 15000.00, '/pcs', NULL, 'M', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(11, 5, 'Bedcover Ukuran L', 'bedcover-l', NULL, 18000.00, '/pcs', NULL, 'L', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(12, 5, 'Bedcover Ukuran XL', 'bedcover-xl', NULL, 20000.00, '/pcs', NULL, 'XL', NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(13, 5, 'Bedcover Ukuran XXL', 'bedcover-xxl', NULL, 25000.00, '/pcs', NULL, 'XXL', NULL, 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(14, 6, 'Seprai', 'seprai-biasa', NULL, 5000.00, '/pcs', NULL, NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(15, 6, 'Seprai + Sarung Bantal', 'seprai-sarung-bantal', NULL, 7000.00, '/pcs', NULL, NULL, NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(16, 6, 'Seprai + Sarung Bantal & Guling', 'seprai-sarung-bantal-guling', NULL, 10000.00, '/pcs', NULL, NULL, NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(17, 7, 'Karpet Tipis', 'karpet-tipis', NULL, 5000.00, '/meter', NULL, 'Tipis', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(18, 7, 'Karpet Sedang', 'karpet-sedang', NULL, 8000.00, '/meter', NULL, 'Sedang', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(19, 7, 'Karpet Tebal', 'karpet-tebal', NULL, 12000.00, '/meter', NULL, 'Tebal', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(20, 7, 'Karpet Super Tebal', 'karpet-super-tebal', NULL, 15000.00, '/meter', NULL, 'Super Tebal', NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(21, 8, 'Boneka Kecil', 'boneka-kecil', NULL, 2000.00, '/pcs', NULL, 'Kecil', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(22, 8, 'Boneka Sedang', 'boneka-sedang', NULL, 5000.00, '/pcs', NULL, 'Sedang', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(23, 8, 'Boneka Besar', 'boneka-besar', NULL, 15000.00, '/pcs', NULL, 'Besar', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(24, 8, 'Boneka Jumbo', 'boneka-jumbo', NULL, 25000.00, '/pcs', NULL, 'Jumbo', NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(25, 9, 'Handuk Kecil', 'handuk-kecil', NULL, 2000.00, '/pcs', NULL, 'Kecil', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(26, 9, 'Handuk Sedang', 'handuk-sedang', NULL, 5000.00, '/pcs', NULL, 'Sedang', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(27, 9, 'Handuk Besar', 'handuk-besar', NULL, 7000.00, '/pcs', NULL, 'Besar', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(28, 9, 'Jaket', 'jaket-reguler', NULL, 10000.00, '/pcs', NULL, NULL, NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(29, 9, 'Keset', 'keset', NULL, 5000.00, '/pcs', NULL, NULL, NULL, 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(30, 10, 'Sepatu Kecil', 'sepatu-kecil', NULL, 10000.00, '/pcs', NULL, 'Kecil', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(31, 10, 'Sepatu Normal', 'sepatu-normal', NULL, 15000.00, '/pcs', NULL, 'Normal', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(32, 11, 'Gorden Normal', 'gorden-normal', NULL, 7000.00, '/kg', NULL, 'Normal', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(33, 11, 'Gorden Tebal', 'gorden-tebal', NULL, 10000.00, '/kg', NULL, 'Tebal', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(34, 12, 'Bantal Normal', 'bantal-normal', NULL, 10000.00, '/pcs', NULL, NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(35, 12, 'Guling Normal', 'guling-normal', NULL, 10000.00, '/pcs', NULL, 'Normal', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(36, 12, 'Guling Tebal', 'guling-tebal', NULL, 12000.00, '/pcs', NULL, 'Tebal', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(37, 13, 'Tas Kecil', 'tas-kecil', NULL, 5000.00, '/pcs', NULL, 'Kecil', NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(38, 13, 'Tas Sedang', 'tas-sedang', NULL, 10000.00, '/pcs', NULL, 'Sedang', NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(39, 13, 'Tas Besar', 'tas-besar', NULL, 15000.00, '/pcs', NULL, 'Besar', NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(40, 14, 'Kaos', 'premium-kaos', NULL, 15000.00, '/pcs', '48-72 jam', NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(41, 14, 'Kemeja', 'premium-kemeja', NULL, 20000.00, '/pcs', '48-72 jam', NULL, NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(42, 14, 'Jaket Tipis', 'premium-jaket-tipis', NULL, 25000.00, '/pcs', '48-72 jam', NULL, NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(43, 14, 'Jaket Tebal', 'premium-jaket-tebal', NULL, 30000.00, '/pcs', '48-72 jam', NULL, NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(44, 15, 'Celana Pendek', 'premium-celana-pendek', NULL, 15000.00, '/pcs', '48-72 jam', NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(45, 15, 'Celana Panjang', 'premium-celana-panjang', NULL, 20000.00, '/pcs', '48-72 jam', NULL, NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(46, 15, 'Jeans', 'premium-jeans', NULL, 20000.00, '/pcs', '48-72 jam', NULL, NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(47, 15, 'Rok', 'premium-rok', NULL, 25000.00, '/pcs', '48-72 jam', NULL, NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(48, 16, 'Hijab', 'premium-hijab', NULL, 15000.00, '/pcs', '48-72 jam', NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(49, 16, 'Sajadah', 'premium-sajadah', NULL, 20000.00, '/pcs', '48-72 jam', NULL, NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(50, 16, 'Mukena SET', 'premium-mukena-set', NULL, 25000.00, '/pcs', '48-72 jam', NULL, NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(51, 16, 'Baju Renang', 'premium-baju-renang', NULL, 20000.00, '/pcs', '48-72 jam', NULL, NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(52, 16, 'Handuk Dewasa', 'premium-handuk-dewasa', NULL, 30000.00, '/pcs', '48-72 jam', NULL, NULL, 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(53, 17, 'Dress Anak', 'premium-dress-anak', NULL, 20000.00, '/pcs', '48-72 jam', NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(54, 17, 'Dress Dewasa', 'premium-dress-dewasa', NULL, 30000.00, '/pcs', '48-72 jam', NULL, NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(55, 17, 'Baju Syar\'i', 'premium-baju-syari', NULL, 30000.00, '/pcs', '48-72 jam', NULL, NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(56, 17, 'Jas', 'premium-jas', NULL, 35000.00, '/pcs', '48-72 jam', NULL, NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(57, 17, 'Jas Setelan', 'premium-jas-setelan', NULL, 50000.00, '/pcs', '48-72 jam', NULL, NULL, 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nama kategori (cth: Setrika, Cuci Kering)',
  `slug` varchar(120) NOT NULL COMMENT 'URL-friendly name',
  `description` text DEFAULT NULL COMMENT 'Deskripsi kategori',
  `icon` varchar(100) DEFAULT NULL COMMENT 'FontAwesome icon class (cth: fa-tshirt)',
  `image` varchar(255) DEFAULT NULL COMMENT 'Path gambar kategori',
  `type` enum('reguler','premium') NOT NULL DEFAULT 'reguler' COMMENT 'Tipe layanan',
  `sort_order` int(11) NOT NULL DEFAULT 0 COMMENT 'Urutan tampil',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Kategori layanan laundry (reguler & premium)';

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `slug`, `description`, `icon`, `image`, `type`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Setrika', 'setrika', 'Layanan setrika saja untuk pakaian yang sudah bersih', 'fa-iron', NULL, 'reguler', 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'Cuci Kering', 'cuci-kering', 'Layanan cuci kering dan lipat tanpa setrika', 'fa-wind', NULL, 'reguler', 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'Cuci Setrika', 'cuci-setrika', 'Layanan cuci lengkap dengan setrika, paket paling populer', 'fa-shirt', NULL, 'reguler', 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'Selimut', 'selimut', 'Cuci selimut berbagai ukuran dari S hingga XXL', 'fa-blanket', NULL, 'reguler', 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 'Bedcover', 'bedcover', 'Cuci bedcover berbagai ukuran', 'fa-bed', NULL, 'reguler', 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(6, 'Seprai', 'seprai', 'Cuci seprai dan sarung bantal/guling', 'fa-mattress-pillow', NULL, 'reguler', 6, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(7, 'Karpet', 'karpet', 'Cuci karpet dari tipis hingga super tebal', 'fa-rug', NULL, 'reguler', 7, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(8, 'Boneka', 'boneka', 'Cuci boneka berbagai ukuran', 'fa-teddy-bear', NULL, 'reguler', 8, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(9, 'Handuk & Jaket', 'handuk-jaket', 'Cuci handuk, jaket, dan keset', 'fa-mitten', NULL, 'reguler', 9, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(10, 'Cuci Sepatu', 'cuci-sepatu', 'Cuci sepatu sneakers dan lainnya', 'fa-shoe-prints', NULL, 'reguler', 10, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(11, 'Gorden', 'gorden', 'Cuci gorden normal dan tebal', 'fa-window-frame', NULL, 'reguler', 11, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(12, 'Bantal & Guling', 'bantal-guling', 'Cuci bantal dan guling', 'fa-cloud', NULL, 'reguler', 12, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(13, 'Tas', 'tas', 'Cuci tas berbagai ukuran', 'fa-bag-shopping', NULL, 'reguler', 13, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(14, 'Atasan & Luaran', 'atasan-luaran', 'Cuci premium untuk kaos, kemeja, dan jaket. Proses lebih teliti.', 'fa-vest', NULL, 'premium', 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(15, 'Bawahan', 'bawahan', 'Cuci premium untuk celana, jeans, dan rok.', 'fa-socks', NULL, 'premium', 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(16, 'Ibadah & Lainnya', 'ibadah-lainnya', 'Cuci premium untuk perlengkapan ibadah dan item khusus.', 'fa-mosque', NULL, 'premium', 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(17, 'Formal & Gaun', 'formal-gaun', 'Cuci premium untuk pakaian formal, dress, jas, dan gaun.', 'fa-user-tie', NULL, 'premium', 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_types`
--

CREATE TABLE `service_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Nama jenis layanan',
  `slug` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `estimated_duration` varchar(50) DEFAULT NULL COMMENT 'Estimasi waktu (cth: ~24 jam)',
  `additional_cost` decimal(10,2) NOT NULL DEFAULT 0.00 COMMENT 'Biaya tambahan',
  `additional_cost_note` varchar(255) DEFAULT NULL COMMENT 'Catatan biaya tambahan',
  `icon` varchar(100) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Jenis layanan berdasarkan kecepatan pengerjaan';

--
-- Dumping data for table `service_types`
--

INSERT INTO `service_types` (`id`, `name`, `slug`, `description`, `estimated_duration`, `additional_cost`, `additional_cost_note`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Reguler', 'reguler', 'Layanan standar dengan estimasi selesai sesuai kategori produk', 'Sesuai kategori produk', 0.00, 'Harga standar tanpa biaya tambahan', 'fa-clock', 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'Express 24 Jam', 'express-24-jam', 'Layanan cepat dengan estimasi selesai dalam 24 jam', '~24 jam', 15000.00, 'Biaya tambahan: +Rp 15.000', 'fa-bolt', 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'Express Same Day', 'express-same-day', 'Layanan super cepat, selesai di hari yang sama', 'Hari yang sama', 10000.00, 'Biaya tambahan: +Rp 10.000', 'fa-rocket', 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'Express 2 Hari', 'express-2-hari', 'Layanan express dengan estimasi 2 hari kerja', '2 hari kerja', 0.00, 'Biaya tambahan menyesuaikan', 'fa-shipping-fast', 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `statistics_cache`
--

CREATE TABLE `statistics_cache` (
  `id` int(10) UNSIGNED NOT NULL,
  `stat_key` varchar(100) NOT NULL COMMENT 'Key statistik (cth: total_orders, total_customers)',
  `stat_value` varchar(100) NOT NULL DEFAULT '0',
  `stat_label` varchar(150) NOT NULL COMMENT 'Label tampilan (cth: Total Pesanan Selesai)',
  `stat_icon` varchar(100) DEFAULT NULL COMMENT 'FontAwesome icon',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_calculated_at` timestamp NULL DEFAULT NULL COMMENT 'Terakhir dihitung',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Cache statistik untuk tampilan website';

--
-- Dumping data for table `statistics_cache`
--

INSERT INTO `statistics_cache` (`id`, `stat_key`, `stat_value`, `stat_label`, `stat_icon`, `sort_order`, `is_active`, `last_calculated_at`, `created_at`, `updated_at`) VALUES
(1, 'total_orders_completed', '0', 'Pesanan Selesai', 'fa-check-circle', 1, 1, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'total_customers', '0', 'Pelanggan Terdaftar', 'fa-users', 2, 1, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'total_service_categories', '17', 'Kategori Layanan', 'fa-list', 3, 1, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'years_operating', '2', 'Tahun Beroperasi', 'fa-calendar', 4, 1, NULL, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `position` varchar(100) NOT NULL COMMENT 'Jabatan (cth: Owner, Manager, Staff)',
  `photo` varchar(255) DEFAULT NULL COMMENT 'Path foto',
  `bio` text DEFAULT NULL COMMENT 'Bio singkat',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Anggota tim untuk halaman Tentang Kami';

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `position`, `photo`, `bio`, `phone`, `email`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Owner Rodeo Laundry', 'Pemilik & Pendiri', NULL, 'Pendiri Rodeo Laundry yang memulai usaha dengan visi memberikan layanan laundry terbaik di Kota Batu.', NULL, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_title` varchar(100) DEFAULT NULL COMMENT 'Jabatan/deskripsi (cth: Pemilik Villa Aster)',
  `content` text NOT NULL COMMENT 'Isi testimonial',
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 5 COMMENT 'Rating 1-5 bintang',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'Path foto pelanggan',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Testimonial pelanggan untuk halaman beranda';

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `customer_name`, `customer_title`, `content`, `rating`, `avatar`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Ibu Sarah', 'Pelanggan Tetap', 'Sudah langganan di Rodeo Laundry hampir setahun. Hasilnya selalu bersih dan wangi. Yang paling saya suka, bisa tracking pesanan online jadi tidak perlu telepon terus untuk tanya sudah selesai atau belum.', 5, NULL, 1, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(2, 'Bapak Erick', 'Pemilik Erick Catering', 'Untuk kebutuhan catering, kami butuh laundry yang bisa diandalkan untuk cuci taplak dan serbet dalam jumlah besar. Rodeo Laundry selalu tepat waktu dan hasilnya memuaskan. Recommended!', 5, NULL, 2, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(3, 'Villa Aster Management', 'Pengelola Villa', 'Kami mempercayakan seluruh kebutuhan laundry villa kepada Rodeo Laundry. Mulai dari seprai, handuk, hingga selimut. Pelayanan profesional dan harga bersahabat untuk partner bisnis.', 5, NULL, 3, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(4, 'Dina Rahmawati', 'Mahasiswi', 'Harganya terjangkau banget untuk anak kos. Cuci setrika cuma Rp 5.000/kg. Prosesnya juga cepat, biasanya 2-3 hari sudah bisa diambil. Tempatnya juga bersih.', 4, NULL, 4, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29'),
(5, 'Pak Hendro', 'Warga Sumberejo', 'Lokasi dekat dari rumah, pelayanan ramah. Saya sering pakai layanan express kalau butuh cepat. Hasilnya tidak mengecewakan.', 5, NULL, 5, 1, '2026-04-23 10:23:29', '2026-04-23 10:23:29');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_category_price_range`
-- (See below for the actual view)
--
CREATE TABLE `v_category_price_range` (
`id` int(10) unsigned
,`name` varchar(100)
,`slug` varchar(120)
,`icon` varchar(100)
,`type` enum('reguler','premium')
,`description` text
,`sort_order` int(11)
,`price_from` decimal(10,2)
,`price_max` decimal(10,2)
,`total_products` bigint(21)
,`unit` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_faq_active`
-- (See below for the actual view)
--
CREATE TABLE `v_faq_active` (
`id` int(10) unsigned
,`question` varchar(500)
,`answer` text
,`category` varchar(100)
,`icon` varchar(100)
,`sort_order` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_live_statistics`
-- (See below for the actual view)
--
CREATE TABLE `v_live_statistics` (
`stat_key` varchar(24)
,`stat_value` varchar(21)
,`stat_label` varchar(19)
,`stat_icon` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_operating_hours`
-- (See below for the actual view)
--
CREATE TABLE `v_operating_hours` (
`day_of_week` tinyint(3) unsigned
,`day_name` varchar(20)
,`hours` varchar(23)
,`is_closed` tinyint(1)
,`note` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_order_tracking`
-- (See below for the actual view)
--
CREATE TABLE `v_order_tracking` (
`order_number` varchar(30)
,`tracking_token` varchar(64)
,`customer_name` varchar(150)
,`status` enum('pending','processing','done','picked_up','cancelled')
,`status_note` varchar(255)
,`total_items` int(10) unsigned
,`total_price` decimal(12,2)
,`payment_status` enum('unpaid','partial','paid')
,`service_type_name` varchar(100)
,`service_estimated_duration` varchar(50)
,`estimated_done_at` datetime
,`completed_at` datetime
,`picked_up_at` datetime
,`order_date` timestamp
,`status_description` varchar(35)
,`status_icon` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_product_list`
-- (See below for the actual view)
--
CREATE TABLE `v_product_list` (
`product_id` int(10) unsigned
,`product_name` varchar(150)
,`product_slug` varchar(170)
,`price` decimal(10,2)
,`unit` varchar(30)
,`size_variant` varchar(50)
,`estimated_duration` varchar(50)
,`product_description` text
,`category_id` int(10) unsigned
,`category_name` varchar(100)
,`category_slug` varchar(120)
,`category_icon` varchar(100)
,`service_type` enum('reguler','premium')
,`category_description` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_testimonials_active`
-- (See below for the actual view)
--
CREATE TABLE `v_testimonials_active` (
`id` int(10) unsigned
,`customer_name` varchar(150)
,`customer_title` varchar(100)
,`content` text
,`rating` tinyint(3) unsigned
,`avatar` varchar(255)
,`sort_order` int(11)
);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`),
  ADD KEY `idx_setting_group` (`setting_group`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_type` (`message_type`),
  ADD KEY `idx_read` (`is_read`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_phone` (`phone`),
  ADD KEY `idx_customer_type` (`customer_type`),
  ADD KEY `idx_active` (`is_active`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `idx_active` (`is_active`),
  ADD KEY `idx_sort_order` (`sort_order`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `idx_active` (`is_active`);

--
-- Indexes for table `operating_hours`
--
ALTER TABLE `operating_hours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_day` (`day_of_week`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD UNIQUE KEY `tracking_token` (`tracking_token`),
  ADD KEY `fk_orders_service_type` (`service_type_id`),
  ADD KEY `idx_order_number` (`order_number`),
  ADD KEY `idx_tracking_token` (`tracking_token`),
  ADD KEY `idx_customer` (`customer_id`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_payment_status` (`payment_status`),
  ADD KEY `idx_created_at` (`created_at`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_order` (`order_id`),
  ADD KEY `idx_product` (`product_id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `content_key` (`content_key`),
  ADD KEY `idx_page` (`page`),
  ADD KEY `idx_section` (`section`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_category` (`category_id`),
  ADD KEY `idx_active` (`is_active`),
  ADD KEY `idx_sort_order` (`sort_order`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_sort_order` (`sort_order`),
  ADD KEY `idx_active` (`is_active`);

--
-- Indexes for table `service_types`
--
ALTER TABLE `service_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_active` (`is_active`);

--
-- Indexes for table `statistics_cache`
--
ALTER TABLE `statistics_cache`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stat_key` (`stat_key`),
  ADD KEY `idx_active` (`is_active`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_active` (`is_active`),
  ADD KEY `idx_sort_order` (`sort_order`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_active` (`is_active`),
  ADD KEY `idx_rating` (`rating`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operating_hours`
--
ALTER TABLE `operating_hours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service_types`
--
ALTER TABLE `service_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statistics_cache`
--
ALTER TABLE `statistics_cache`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --------------------------------------------------------

--
-- Structure for view `v_category_price_range`
--
DROP TABLE IF EXISTS `v_category_price_range`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_category_price_range`  AS SELECT `sc`.`id` AS `id`, `sc`.`name` AS `name`, `sc`.`slug` AS `slug`, `sc`.`icon` AS `icon`, `sc`.`type` AS `type`, `sc`.`description` AS `description`, `sc`.`sort_order` AS `sort_order`, min(`p`.`price`) AS `price_from`, max(`p`.`price`) AS `price_max`, count(`p`.`id`) AS `total_products`, (select `p2`.`unit` from `products` `p2` where `p2`.`category_id` = `sc`.`id` and `p2`.`is_active` = 1 limit 1) AS `unit` FROM (`service_categories` `sc` left join `products` `p` on(`p`.`category_id` = `sc`.`id` and `p`.`is_active` = 1)) WHERE `sc`.`is_active` = 1 GROUP BY `sc`.`id`, `sc`.`name`, `sc`.`slug`, `sc`.`icon`, `sc`.`type`, `sc`.`description`, `sc`.`sort_order` ORDER BY `sc`.`type` ASC, `sc`.`sort_order` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_faq_active`
--
DROP TABLE IF EXISTS `v_faq_active`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_faq_active`  AS SELECT `faq`.`id` AS `id`, `faq`.`question` AS `question`, `faq`.`answer` AS `answer`, `faq`.`category` AS `category`, `faq`.`icon` AS `icon`, `faq`.`sort_order` AS `sort_order` FROM `faq` WHERE `faq`.`is_active` = 1 ORDER BY `faq`.`sort_order` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_live_statistics`
--
DROP TABLE IF EXISTS `v_live_statistics`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_live_statistics`  AS SELECT 'total_orders_completed' AS `stat_key`, cast(count(0) as char charset utf8mb4) AS `stat_value`, 'Pesanan Selesai' AS `stat_label`, 'fa-check-circle' AS `stat_icon` FROM `orders` WHERE `orders`.`status` in ('done','picked_up')union all select 'total_customers' AS `total_customers`,cast(count(0) as char charset utf8mb4) AS `CAST(COUNT(*) AS CHAR)`,'Pelanggan Terdaftar' AS `Pelanggan Terdaftar`,'fa-users' AS `fa-users` from `customers` where `customers`.`is_active` = 1 union all select 'total_service_categories' AS `total_service_categories`,cast(count(0) as char charset utf8mb4) AS `CAST(COUNT(*) AS CHAR)`,'Kategori Layanan' AS `Kategori Layanan`,'fa-list' AS `fa-list` from `service_categories` where `service_categories`.`is_active` = 1 union all select 'total_products' AS `total_products`,cast(count(0) as char charset utf8mb4) AS `CAST(COUNT(*) AS CHAR)`,'Produk Layanan' AS `Produk Layanan`,'fa-tags' AS `fa-tags` from `products` where `products`.`is_active` = 1  ;

-- --------------------------------------------------------

--
-- Structure for view `v_operating_hours`
--
DROP TABLE IF EXISTS `v_operating_hours`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_operating_hours`  AS SELECT `operating_hours`.`day_of_week` AS `day_of_week`, `operating_hours`.`day_name` AS `day_name`, CASE WHEN `operating_hours`.`is_closed` = 1 THEN 'Tutup' ELSE concat(date_format(`operating_hours`.`open_time`,'%H:%i'),' - ',date_format(`operating_hours`.`close_time`,'%H:%i')) END AS `hours`, `operating_hours`.`is_closed` AS `is_closed`, `operating_hours`.`note` AS `note` FROM `operating_hours` ORDER BY `operating_hours`.`day_of_week` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_order_tracking`
--
DROP TABLE IF EXISTS `v_order_tracking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_order_tracking`  AS SELECT `o`.`order_number` AS `order_number`, `o`.`tracking_token` AS `tracking_token`, `o`.`customer_name` AS `customer_name`, `o`.`status` AS `status`, `o`.`status_note` AS `status_note`, `o`.`total_items` AS `total_items`, `o`.`total_price` AS `total_price`, `o`.`payment_status` AS `payment_status`, `st`.`name` AS `service_type_name`, `st`.`estimated_duration` AS `service_estimated_duration`, `o`.`estimated_done_at` AS `estimated_done_at`, `o`.`completed_at` AS `completed_at`, `o`.`picked_up_at` AS `picked_up_at`, `o`.`created_at` AS `order_date`, CASE `o`.`status` WHEN 'pending' THEN 'Pesanan diterima, menunggu diproses' WHEN 'processing' THEN 'Sedang dalam proses cuci/setrika' WHEN 'done' THEN 'Selesai, siap diambil' WHEN 'picked_up' THEN 'Sudah diambil oleh pelanggan' WHEN 'cancelled' THEN 'Pesanan dibatalkan' END AS `status_description`, CASE `o`.`status` WHEN 'pending' THEN '🕐' WHEN 'processing' THEN '🔄' WHEN 'done' THEN '✅' WHEN 'picked_up' THEN '📦' WHEN 'cancelled' THEN '❌' END AS `status_icon` FROM (`orders` `o` left join `service_types` `st` on(`o`.`service_type_id` = `st`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_product_list`
--
DROP TABLE IF EXISTS `v_product_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_product_list`  AS SELECT `p`.`id` AS `product_id`, `p`.`name` AS `product_name`, `p`.`slug` AS `product_slug`, `p`.`price` AS `price`, `p`.`unit` AS `unit`, `p`.`size_variant` AS `size_variant`, `p`.`estimated_duration` AS `estimated_duration`, `p`.`description` AS `product_description`, `sc`.`id` AS `category_id`, `sc`.`name` AS `category_name`, `sc`.`slug` AS `category_slug`, `sc`.`icon` AS `category_icon`, `sc`.`type` AS `service_type`, `sc`.`description` AS `category_description` FROM (`products` `p` join `service_categories` `sc` on(`p`.`category_id` = `sc`.`id`)) WHERE `p`.`is_active` = 1 AND `sc`.`is_active` = 1 ORDER BY `sc`.`type` ASC, `sc`.`sort_order` ASC, `p`.`sort_order` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `v_testimonials_active`
--
DROP TABLE IF EXISTS `v_testimonials_active`;

CREATE ALGORITHM=UNDEFINED DEFINER=`rodd1157`@`localhost` SQL SECURITY DEFINER VIEW `v_testimonials_active`  AS SELECT `testimonials`.`id` AS `id`, `testimonials`.`customer_name` AS `customer_name`, `testimonials`.`customer_title` AS `customer_title`, `testimonials`.`content` AS `content`, `testimonials`.`rating` AS `rating`, `testimonials`.`avatar` AS `avatar`, `testimonials`.`sort_order` AS `sort_order` FROM `testimonials` WHERE `testimonials`.`is_active` = 1 ORDER BY `testimonials`.`sort_order` ASC ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_service_type` FOREIGN KEY (`service_type_id`) REFERENCES `service_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_order_items_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`category_id`) REFERENCES `service_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
