-- ============================================================
-- RODEO LAUNDRY — Seed Data (Data Awal)
-- Semua data diambil dari RODEO_LAUNDRY_Company_Profile_Planning.md
-- ============================================================

SET NAMES utf8mb4;

-- ============================================================
-- 1. COMPANY SETTINGS
-- ============================================================

INSERT INTO `company_settings` (`setting_key`, `setting_value`, `setting_group`, `description`) VALUES

-- General
('company_name', 'Rodeo Laundry', 'general', 'Nama perusahaan'),
('company_tagline', 'Bersih, Cepat, Terpercaya', 'general', 'Tagline perusahaan'),
('company_description', 'Rodeo Laundry adalah jasa laundry profesional yang melayani cuci reguler, premium, dan berbagai kebutuhan pencucian lainnya dengan hasil bersih dan tepat waktu.', 'general', 'Deskripsi singkat perusahaan'),
('company_founded_year', '2024', 'general', 'Tahun berdiri'),
('company_logo', '/assets/images/logo.png', 'general', 'Path logo perusahaan'),
('company_favicon', '/assets/images/favicon.ico', 'general', 'Path favicon'),

-- Contact
('company_address', 'Batu, Sumberejo, Gg. Rodeo', 'contact', 'Alamat lengkap'),
('company_city', 'Kota Batu', 'contact', 'Kota'),
('company_province', 'Jawa Timur', 'contact', 'Provinsi'),
('company_phone', '+62 821-4329-7707', 'contact', 'Nomor telepon utama'),
('company_whatsapp', '6282143297707', 'contact', 'Nomor WhatsApp (format internasional tanpa +)'),
('company_email', 'info@rodeolaundry.my.id', 'contact', 'Email perusahaan'),
('company_domain', 'rodeolaundry.my.id', 'contact', 'Domain website'),
('company_maps_embed', 'https://www.google.com/maps/embed?pb=YOUR_EMBED_CODE_HERE', 'contact', 'Google Maps embed URL'),
('company_maps_link', 'https://maps.google.com/?q=Sumberejo+Batu+Gg+Rodeo', 'contact', 'Google Maps direct link'),

-- Social Media
('social_instagram', '', 'social', 'URL Instagram'),
('social_facebook', '', 'social', 'URL Facebook'),
('social_tiktok', '', 'social', 'URL TikTok'),

-- SEO
('seo_meta_title', 'Rodeo Laundry — Bersih, Cepat, Terpercaya | Kota Batu', 'seo', 'Meta title untuk SEO'),
('seo_meta_description', 'Jasa laundry profesional di Kota Batu. Layanan cuci reguler & premium, harga terjangkau, bisa tracking pesanan online. Hubungi kami sekarang!', 'seo', 'Meta description untuk SEO'),
('seo_meta_keywords', 'laundry batu, laundry kota batu, cuci baju batu, rodeo laundry, laundry terdekat, laundry murah batu', 'seo', 'Meta keywords'),
('seo_og_image', '/assets/images/og-image.jpg', 'seo', 'Open Graph image untuk social share'),

-- WhatsApp Template
('wa_template_general', 'Halo Rodeo Laundry! 👋%0ASaya ingin bertanya tentang layanan laundry.%0A%0ANama: _______', 'contact', 'Template pesan WA umum'),
('wa_template_order', 'Halo Rodeo Laundry! 👋%0ASaya ingin memesan layanan laundry.%0A%0ANama: _______%0ALayanan: _______%0AAlamat: _______', 'contact', 'Template pesan WA pemesanan'),

-- Design
('color_primary', '#1E4D8C', 'design', 'Warna primer (Biru Laut)'),
('color_accent', '#F5821F', 'design', 'Warna aksen (Oranye Segar)'),
('color_background', '#FFFFFF', 'design', 'Warna latar (Putih Bersih)'),
('color_text', '#2D2D2D', 'design', 'Warna teks (Abu Gelap)'),
('color_secondary_bg', '#F5F5F5', 'design', 'Warna latar sekunder (Abu Terang)'),
('font_heading', 'Poppins', 'design', 'Font untuk judul'),
('font_body', 'Inter', 'design', 'Font untuk body text');

-- ============================================================
-- 2. OPERATING HOURS
-- ============================================================

INSERT INTO `operating_hours` (`day_of_week`, `day_name`, `open_time`, `close_time`, `is_closed`, `note`) VALUES
(1, 'Senin',   '07:00:00', '21:00:00', 0, NULL),
(2, 'Selasa',  '07:00:00', '21:00:00', 0, NULL),
(3, 'Rabu',    '07:00:00', '21:00:00', 0, NULL),
(4, 'Kamis',   '07:00:00', '21:00:00', 0, NULL),
(5, 'Jumat',   '07:00:00', '21:00:00', 0, NULL),
(6, 'Sabtu',   '07:00:00', '21:00:00', 0, NULL),
(7, 'Minggu',  '08:00:00', '20:00:00', 0, 'Jam operasional lebih pendek');

-- ============================================================
-- 3. SERVICE CATEGORIES — REGULER
-- ============================================================

INSERT INTO `service_categories` (`id`, `name`, `slug`, `description`, `icon`, `type`, `sort_order`, `is_active`) VALUES
(1,  'Setrika',          'setrika',          'Layanan setrika saja untuk pakaian yang sudah bersih',           'fa-iron',           'reguler', 1,  1),
(2,  'Cuci Kering',      'cuci-kering',      'Layanan cuci kering dan lipat tanpa setrika',                   'fa-wind',           'reguler', 2,  1),
(3,  'Cuci Setrika',     'cuci-setrika',     'Layanan cuci lengkap dengan setrika, paket paling populer',     'fa-shirt',          'reguler', 3,  1),
(4,  'Selimut',          'selimut',          'Cuci selimut berbagai ukuran dari S hingga XXL',                'fa-blanket',        'reguler', 4,  1),
(5,  'Bedcover',         'bedcover',         'Cuci bedcover berbagai ukuran',                                 'fa-bed',            'reguler', 5,  1),
(6,  'Seprai',           'seprai',           'Cuci seprai dan sarung bantal/guling',                          'fa-mattress-pillow','reguler', 6,  1),
(7,  'Karpet',           'karpet',           'Cuci karpet dari tipis hingga super tebal',                     'fa-rug',            'reguler', 7,  1),
(8,  'Boneka',           'boneka',           'Cuci boneka berbagai ukuran',                                   'fa-teddy-bear',     'reguler', 8,  1),
(9,  'Handuk & Jaket',   'handuk-jaket',     'Cuci handuk, jaket, dan keset',                                'fa-mitten',         'reguler', 9,  1),
(10, 'Cuci Sepatu',      'cuci-sepatu',      'Cuci sepatu sneakers dan lainnya',                              'fa-shoe-prints',    'reguler', 10, 1),
(11, 'Gorden',           'gorden',           'Cuci gorden normal dan tebal',                                  'fa-window-frame',   'reguler', 11, 1),
(12, 'Bantal & Guling',  'bantal-guling',    'Cuci bantal dan guling',                                       'fa-cloud',          'reguler', 12, 1),
(13, 'Tas',              'tas',              'Cuci tas berbagai ukuran',                                      'fa-bag-shopping',   'reguler', 13, 1);

-- ============================================================
-- 4. SERVICE CATEGORIES — PREMIUM
-- ============================================================

INSERT INTO `service_categories` (`id`, `name`, `slug`, `description`, `icon`, `type`, `sort_order`, `is_active`) VALUES
(14, 'Atasan & Luaran',    'atasan-luaran',    'Cuci premium untuk kaos, kemeja, dan jaket. Proses lebih teliti.',    'fa-vest',       'premium', 1, 1),
(15, 'Bawahan',            'bawahan',          'Cuci premium untuk celana, jeans, dan rok.',                          'fa-socks',      'premium', 2, 1),
(16, 'Ibadah & Lainnya',   'ibadah-lainnya',   'Cuci premium untuk perlengkapan ibadah dan item khusus.',             'fa-mosque',     'premium', 3, 1),
(17, 'Formal & Gaun',      'formal-gaun',      'Cuci premium untuk pakaian formal, dress, jas, dan gaun.',            'fa-user-tie',   'premium', 4, 1);

-- ============================================================
-- 5. PRODUCTS — REGULER
-- ============================================================

INSERT INTO `products` (`category_id`, `name`, `slug`, `price`, `unit`, `size_variant`, `sort_order`, `is_active`) VALUES

-- Setrika (cat: 1)
(1, 'Setrika Saja', 'setrika-saja', 2500.00, '/kg', NULL, 1, 1),

-- Cuci Kering (cat: 2)
(2, 'Cuci Kering Lipat', 'cuci-kering-lipat', 4000.00, '/kg', NULL, 1, 1),

-- Cuci Setrika (cat: 3)
(3, 'Cuci Setrika', 'cuci-setrika-reguler', 5000.00, '/kg', NULL, 1, 1),

-- Selimut (cat: 4)
(4, 'Selimut Ukuran S', 'selimut-s', 5000.00, '/pcs', 'S', 1, 1),
(4, 'Selimut Ukuran M', 'selimut-m', 8000.00, '/pcs', 'M', 2, 1),
(4, 'Selimut Ukuran L', 'selimut-l', 10000.00, '/pcs', 'L', 3, 1),
(4, 'Selimut Ukuran XL', 'selimut-xl', 15000.00, '/pcs', 'XL', 4, 1),
(4, 'Selimut Ukuran XXL', 'selimut-xxl', 20000.00, '/pcs', 'XXL', 5, 1),

-- Bedcover (cat: 5)
(5, 'Bedcover Ukuran S', 'bedcover-s', 13000.00, '/pcs', 'S', 1, 1),
(5, 'Bedcover Ukuran M', 'bedcover-m', 15000.00, '/pcs', 'M', 2, 1),
(5, 'Bedcover Ukuran L', 'bedcover-l', 18000.00, '/pcs', 'L', 3, 1),
(5, 'Bedcover Ukuran XL', 'bedcover-xl', 20000.00, '/pcs', 'XL', 4, 1),
(5, 'Bedcover Ukuran XXL', 'bedcover-xxl', 25000.00, '/pcs', 'XXL', 5, 1),

-- Seprai (cat: 6)
(6, 'Seprai', 'seprai-biasa', 5000.00, '/pcs', NULL, 1, 1),
(6, 'Seprai + Sarung Bantal', 'seprai-sarung-bantal', 7000.00, '/pcs', NULL, 2, 1),
(6, 'Seprai + Sarung Bantal & Guling', 'seprai-sarung-bantal-guling', 10000.00, '/pcs', NULL, 3, 1),

-- Karpet (cat: 7)
(7, 'Karpet Tipis', 'karpet-tipis', 5000.00, '/meter', 'Tipis', 1, 1),
(7, 'Karpet Sedang', 'karpet-sedang', 8000.00, '/meter', 'Sedang', 2, 1),
(7, 'Karpet Tebal', 'karpet-tebal', 12000.00, '/meter', 'Tebal', 3, 1),
(7, 'Karpet Super Tebal', 'karpet-super-tebal', 15000.00, '/meter', 'Super Tebal', 4, 1),

-- Boneka (cat: 8)
(8, 'Boneka Kecil', 'boneka-kecil', 2000.00, '/pcs', 'Kecil', 1, 1),
(8, 'Boneka Sedang', 'boneka-sedang', 5000.00, '/pcs', 'Sedang', 2, 1),
(8, 'Boneka Besar', 'boneka-besar', 15000.00, '/pcs', 'Besar', 3, 1),
(8, 'Boneka Jumbo', 'boneka-jumbo', 25000.00, '/pcs', 'Jumbo', 4, 1),

-- Handuk & Jaket (cat: 9)
(9, 'Handuk Kecil', 'handuk-kecil', 2000.00, '/pcs', 'Kecil', 1, 1),
(9, 'Handuk Sedang', 'handuk-sedang', 5000.00, '/pcs', 'Sedang', 2, 1),
(9, 'Handuk Besar', 'handuk-besar', 7000.00, '/pcs', 'Besar', 3, 1),
(9, 'Jaket', 'jaket-reguler', 10000.00, '/pcs', NULL, 4, 1),
(9, 'Keset', 'keset', 5000.00, '/pcs', NULL, 5, 1),

-- Cuci Sepatu (cat: 10)
(10, 'Sepatu Kecil', 'sepatu-kecil', 10000.00, '/pcs', 'Kecil', 1, 1),
(10, 'Sepatu Normal', 'sepatu-normal', 15000.00, '/pcs', 'Normal', 2, 1),

-- Gorden (cat: 11)
(11, 'Gorden Normal', 'gorden-normal', 7000.00, '/kg', 'Normal', 1, 1),
(11, 'Gorden Tebal', 'gorden-tebal', 10000.00, '/kg', 'Tebal', 2, 1),

-- Bantal & Guling (cat: 12)
(12, 'Bantal Normal', 'bantal-normal', 10000.00, '/pcs', NULL, 1, 1),
(12, 'Guling Normal', 'guling-normal', 10000.00, '/pcs', 'Normal', 2, 1),
(12, 'Guling Tebal', 'guling-tebal', 12000.00, '/pcs', 'Tebal', 3, 1),

-- Tas (cat: 13)
(13, 'Tas Kecil', 'tas-kecil', 5000.00, '/pcs', 'Kecil', 1, 1),
(13, 'Tas Sedang', 'tas-sedang', 10000.00, '/pcs', 'Sedang', 2, 1),
(13, 'Tas Besar', 'tas-besar', 15000.00, '/pcs', 'Besar', 3, 1);

-- ============================================================
-- 6. PRODUCTS — PREMIUM
-- ============================================================

INSERT INTO `products` (`category_id`, `name`, `slug`, `price`, `unit`, `estimated_duration`, `sort_order`, `is_active`) VALUES

-- Atasan & Luaran (cat: 14)
(14, 'Kaos', 'premium-kaos', 15000.00, '/pcs', '48-72 jam', 1, 1),
(14, 'Kemeja', 'premium-kemeja', 20000.00, '/pcs', '48-72 jam', 2, 1),
(14, 'Jaket Tipis', 'premium-jaket-tipis', 25000.00, '/pcs', '48-72 jam', 3, 1),
(14, 'Jaket Tebal', 'premium-jaket-tebal', 30000.00, '/pcs', '48-72 jam', 4, 1),

-- Bawahan (cat: 15)
(15, 'Celana Pendek', 'premium-celana-pendek', 15000.00, '/pcs', '48-72 jam', 1, 1),
(15, 'Celana Panjang', 'premium-celana-panjang', 20000.00, '/pcs', '48-72 jam', 2, 1),
(15, 'Jeans', 'premium-jeans', 20000.00, '/pcs', '48-72 jam', 3, 1),
(15, 'Rok', 'premium-rok', 25000.00, '/pcs', '48-72 jam', 4, 1),

-- Ibadah & Lainnya (cat: 16)
(16, 'Hijab', 'premium-hijab', 15000.00, '/pcs', '48-72 jam', 1, 1),
(16, 'Sajadah', 'premium-sajadah', 20000.00, '/pcs', '48-72 jam', 2, 1),
(16, 'Mukena SET', 'premium-mukena-set', 25000.00, '/pcs', '48-72 jam', 3, 1),
(16, 'Baju Renang', 'premium-baju-renang', 20000.00, '/pcs', '48-72 jam', 4, 1),
(16, 'Handuk Dewasa', 'premium-handuk-dewasa', 30000.00, '/pcs', '48-72 jam', 5, 1),

-- Formal & Gaun (cat: 17)
(17, 'Dress Anak', 'premium-dress-anak', 20000.00, '/pcs', '48-72 jam', 1, 1),
(17, 'Dress Dewasa', 'premium-dress-dewasa', 30000.00, '/pcs', '48-72 jam', 2, 1),
(17, 'Baju Syar\'i', 'premium-baju-syari', 30000.00, '/pcs', '48-72 jam', 3, 1),
(17, 'Jas', 'premium-jas', 35000.00, '/pcs', '48-72 jam', 4, 1),
(17, 'Jas Setelan', 'premium-jas-setelan', 50000.00, '/pcs', '48-72 jam', 5, 1);

-- ============================================================
-- 7. SERVICE TYPES
-- ============================================================

INSERT INTO `service_types` (`name`, `slug`, `description`, `estimated_duration`, `additional_cost`, `additional_cost_note`, `icon`, `sort_order`, `is_active`) VALUES
('Reguler', 'reguler', 'Layanan standar dengan estimasi selesai sesuai kategori produk', 'Sesuai kategori produk', 0.00, 'Harga standar tanpa biaya tambahan', 'fa-clock', 1, 1),
('Express 24 Jam', 'express-24-jam', 'Layanan cepat dengan estimasi selesai dalam 24 jam', '~24 jam', 15000.00, 'Biaya tambahan: +Rp 15.000', 'fa-bolt', 2, 1),
('Express Same Day', 'express-same-day', 'Layanan super cepat, selesai di hari yang sama', 'Hari yang sama', 10000.00, 'Biaya tambahan: +Rp 10.000', 'fa-rocket', 3, 1),
('Express 2 Hari', 'express-2-hari', 'Layanan express dengan estimasi 2 hari kerja', '2 hari kerja', 0.00, 'Biaya tambahan menyesuaikan', 'fa-shipping-fast', 4, 1);

-- ============================================================
-- 8. FAQ
-- ============================================================

INSERT INTO `faq` (`question`, `answer`, `category`, `icon`, `sort_order`, `is_active`) VALUES

('Berapa lama waktu proses pencucian?',
 'Untuk layanan reguler, waktu proses bervariasi tergantung jenis layanan. Cuci setrika biasanya memakan waktu 2-3 hari kerja. Kami juga menyediakan layanan Express 24 Jam dan Same Day untuk kebutuhan mendesak dengan biaya tambahan.',
 'Layanan', 'fa-clock', 1, 1),

('Apakah ada layanan antar-jemput?',
 'Saat ini kami melayani antar-jemput untuk area Kota Batu dan sekitarnya. Silakan hubungi kami via WhatsApp untuk informasi lebih lanjut mengenai jangkauan area dan biaya antar-jemput.',
 'Layanan', 'fa-truck', 2, 1),

('Bagaimana cara melacak status laundry saya?',
 'Anda bisa melacak status pesanan melalui halaman "Cek Status Order" di website kami. Cukup masukkan nomor order (format: RODEO-YYYYMMDD-XXXX) atau token tracking yang diberikan saat pemesanan.',
 'Tracking', 'fa-search', 3, 1),

('Apa bedanya layanan reguler dan premium?',
 'Layanan reguler adalah cuci standar yang cocok untuk pakaian sehari-hari. Layanan premium menggunakan proses yang lebih teliti dan hati-hati, cocok untuk pakaian formal, berbahan khusus, atau item yang membutuhkan perawatan ekstra. Estimasi waktu premium adalah 48-72 jam.',
 'Layanan', 'fa-star', 4, 1),

('Apakah bisa bayar nanti (hutang/kredit)?',
 'Kami menerima pembayaran tunai dan transfer. Untuk pelanggan tetap atau pelanggan bisnis (B2B), kami menyediakan opsi pembayaran yang bisa didiskusikan langsung. Silakan hubungi kami untuk informasi lebih lanjut.',
 'Pembayaran', 'fa-credit-card', 5, 1),

('Bagaimana jika pakaian saya rusak atau hilang?',
 'Kami sangat menjaga kualitas dan keamanan setiap item yang masuk. Jika terjadi kerusakan atau kehilangan yang disebabkan oleh kelalaian kami, kami akan bertanggung jawab penuh. Setiap item dicatat dan diperiksa saat penerimaan dan pengembalian.',
 'Garansi', 'fa-shield-alt', 6, 1),

('Apakah melayani order dalam jumlah besar (villa, penginapan, catering)?',
 'Ya! Kami melayani pelanggan bisnis (B2B) seperti villa, hotel, penginapan, kos-kosan, dan katering. Kami menawarkan harga khusus dan penjadwalan rutin untuk pelanggan bisnis. Hubungi kami melalui formulir Layanan Bisnis atau WhatsApp untuk penawaran spesial.',
 'Bisnis', 'fa-building', 7, 1);

-- ============================================================
-- 9. TESTIMONIALS (Data Mock Awal)
-- ============================================================

INSERT INTO `testimonials` (`customer_name`, `customer_title`, `content`, `rating`, `sort_order`, `is_active`) VALUES

('Ibu Sarah',
 'Pelanggan Tetap',
 'Sudah langganan di Rodeo Laundry hampir setahun. Hasilnya selalu bersih dan wangi. Yang paling saya suka, bisa tracking pesanan online jadi tidak perlu telepon terus untuk tanya sudah selesai atau belum.',
 5, 1, 1),

('Bapak Erick',
 'Pemilik Erick Catering',
 'Untuk kebutuhan catering, kami butuh laundry yang bisa diandalkan untuk cuci taplak dan serbet dalam jumlah besar. Rodeo Laundry selalu tepat waktu dan hasilnya memuaskan. Recommended!',
 5, 2, 1),

('Villa Aster Management',
 'Pengelola Villa',
 'Kami mempercayakan seluruh kebutuhan laundry villa kepada Rodeo Laundry. Mulai dari seprai, handuk, hingga selimut. Pelayanan profesional dan harga bersahabat untuk partner bisnis.',
 5, 3, 1),

('Dina Rahmawati',
 'Mahasiswi',
 'Harganya terjangkau banget untuk anak kos. Cuci setrika cuma Rp 5.000/kg. Prosesnya juga cepat, biasanya 2-3 hari sudah bisa diambil. Tempatnya juga bersih.',
 4, 4, 1),

('Pak Hendro',
 'Warga Sumberejo',
 'Lokasi dekat dari rumah, pelayanan ramah. Saya sering pakai layanan express kalau butuh cepat. Hasilnya tidak mengecewakan.',
 5, 5, 1);

-- ============================================================
-- 10. PAGE CONTENTS (Konten Halaman)
-- ============================================================

INSERT INTO `page_contents` (`page`, `section`, `content_key`, `content_value`, `content_type`, `description`) VALUES

-- HOME — Hero Section
('home', 'hero', 'home_hero_title', 'Bersih, Cepat, Terpercaya', 'text', 'Judul utama hero section'),
('home', 'hero', 'home_hero_subtitle', 'Layanan laundry profesional di Kota Batu. Cuci reguler & premium dengan harga terjangkau dan bisa tracking online!', 'text', 'Subtitle hero section'),
('home', 'hero', 'home_hero_cta_primary', 'Lihat Layanan', 'text', 'Teks tombol CTA utama'),
('home', 'hero', 'home_hero_cta_secondary', 'Hubungi Kami', 'text', 'Teks tombol CTA sekunder'),
('home', 'hero', 'home_hero_image', '/assets/images/hero-bg.jpg', 'image', 'Gambar latar hero section'),

-- HOME — Keunggulan
('home', 'keunggulan', 'home_keunggulan_items', '[{"icon":"fa-tag","title":"Harga Terjangkau","desc":"Mulai dari Rp 2.500/kg untuk layanan setrika"},{"icon":"fa-bolt","title":"Proses Cepat","desc":"Tersedia layanan Express Same Day dan 24 Jam"},{"icon":"fa-search","title":"Tracking Online","desc":"Pantau status pesanan Anda secara real-time"},{"icon":"fa-shield-alt","title":"Terpercaya","desc":"Setiap item dijaga dan dicatat dengan baik"}]', 'json', 'Data keunggulan (JSON array)'),

-- HOME — Cara Kerja
('home', 'cara_kerja', 'home_cara_kerja_items', '[{"step":1,"icon":"fa-box","title":"Antar Cucian","desc":"Antar cucian Anda ke outlet kami atau hubungi untuk layanan jemput"},{"step":2,"icon":"fa-sync-alt","title":"Proses Cuci","desc":"Tim kami memproses cucian dengan teliti sesuai jenis layanan"},{"step":3,"icon":"fa-check-circle","title":"Ambil / Dikirim","desc":"Cucian selesai! Ambil di outlet atau kami kirim ke alamat Anda"}]', 'json', 'Langkah cara kerja (JSON array)'),

-- HOME — CTA Akhir
('home', 'cta_bottom', 'home_cta_title', 'Siap Mencuci Pakaian Anda?', 'text', 'Judul CTA bawah'),
('home', 'cta_bottom', 'home_cta_subtitle', 'Hubungi kami sekarang atau cek status pesanan Anda dengan mudah', 'text', 'Subtitle CTA bawah'),

-- ABOUT — Tentang Kami
('about', 'story', 'about_story_title', 'Cerita Kami', 'text', 'Judul sejarah perusahaan'),
('about', 'story', 'about_story_content', 'Rodeo Laundry berdiri dengan visi sederhana: memberikan layanan laundry yang bersih, cepat, dan terpercaya untuk masyarakat Kota Batu dan sekitarnya. Berawal dari usaha kecil di Sumberejo, Gg. Rodeo, kami terus berkembang melayani tidak hanya pelanggan rumah tangga, tetapi juga mitra bisnis seperti villa, penginapan, dan jasa katering.', 'html', 'Cerita/sejarah perusahaan'),

('about', 'vision', 'about_vision', 'Menjadi penyedia layanan laundry terpercaya dan modern di Kota Batu yang mengutamakan kebersihan, ketepatan waktu, dan kepuasan pelanggan.', 'text', 'Visi perusahaan'),
('about', 'mission', 'about_mission', 'Memberikan layanan laundry berkualitas tinggi dengan harga terjangkau, didukung teknologi tracking modern untuk kemudahan pelanggan.', 'text', 'Misi perusahaan'),

('about', 'values', 'about_values_items', '[{"icon":"fa-sparkles","title":"Bersih","desc":"Hasil cucian bersih dan wangi"},{"icon":"fa-clock","title":"Tepat Waktu","desc":"Pesanan selesai sesuai estimasi"},{"icon":"fa-smile","title":"Ramah Pelanggan","desc":"Pelayanan hangat dan profesional"},{"icon":"fa-handshake","title":"Terpercaya","desc":"Setiap item dijaga dengan baik"}]', 'json', 'Nilai perusahaan (JSON array)'),

-- SERVICES
('services', 'header', 'services_title', 'Layanan & Harga', 'text', 'Judul halaman layanan'),
('services', 'header', 'services_subtitle', 'Kami menyediakan berbagai layanan laundry untuk kebutuhan Anda, dari cuci reguler hingga premium.', 'text', 'Subtitle halaman layanan'),
('services', 'premium_note', 'services_premium_note', 'Proses lebih teliti, estimasi 48–72 jam. Cocok untuk pakaian formal dan berbahan khusus.', 'text', 'Catatan layanan premium'),

-- TRACKING
('tracking', 'header', 'tracking_title', 'Cek Status Pesanan', 'text', 'Judul halaman tracking'),
('tracking', 'header', 'tracking_subtitle', 'Masukkan nomor order atau token tracking Anda untuk melihat status pesanan secara real-time.', 'text', 'Subtitle halaman tracking'),
('tracking', 'header', 'tracking_placeholder', 'Masukkan nomor order (cth: RODEO-20260301-0001) atau token tracking', 'text', 'Placeholder input tracking'),

-- CONTACT
('contact', 'header', 'contact_title', 'Hubungi Kami', 'text', 'Judul halaman kontak'),
('contact', 'header', 'contact_subtitle', 'Punya pertanyaan atau ingin memesan layanan? Jangan ragu untuk menghubungi kami.', 'text', 'Subtitle halaman kontak'),

-- FAQ
('faq', 'header', 'faq_title', 'Pertanyaan yang Sering Diajukan', 'text', 'Judul halaman FAQ'),
('faq', 'header', 'faq_subtitle', 'Temukan jawaban untuk pertanyaan umum seputar layanan Rodeo Laundry.', 'text', 'Subtitle halaman FAQ');

-- ============================================================
-- 11. TEAM MEMBERS (Opsional — Placeholder)
-- ============================================================

INSERT INTO `team_members` (`name`, `position`, `bio`, `sort_order`, `is_active`) VALUES
('Owner Rodeo Laundry', 'Pemilik & Pendiri', 'Pendiri Rodeo Laundry yang memulai usaha dengan visi memberikan layanan laundry terbaik di Kota Batu.', 1, 1);

-- ============================================================
-- 12. STATISTICS CACHE
-- ============================================================

INSERT INTO `statistics_cache` (`stat_key`, `stat_value`, `stat_label`, `stat_icon`, `sort_order`, `is_active`) VALUES
('total_orders_completed', '0', 'Pesanan Selesai', 'fa-check-circle', 1, 1),
('total_customers', '0', 'Pelanggan Terdaftar', 'fa-users', 2, 1),
('total_service_categories', '17', 'Kategori Layanan', 'fa-list', 3, 1),
('years_operating', '2', 'Tahun Beroperasi', 'fa-calendar', 4, 1);

-- ============================================================
-- 13. SAMPLE CUSTOMERS (Data Contoh)
-- ============================================================

INSERT INTO `customers` (`name`, `phone`, `customer_type`, `business_name`, `total_orders`, `is_active`) VALUES
('Pelanggan Walk-In', NULL, 'personal', NULL, 0, 1),
('Erick Catering', NULL, 'business', 'Erick Catering', 0, 1),
('Villa Aster', NULL, 'business', 'Villa Aster', 0, 1);

-- ============================================================
-- 14. SAMPLE ORDER (Data Contoh untuk Testing Tracking)
-- ============================================================

INSERT INTO `orders` (`order_number`, `tracking_token`, `customer_id`, `customer_name`, `customer_phone`, `service_type_id`, `status`, `total_items`, `subtotal`, `total_price`, `payment_status`, `notes`, `estimated_done_at`, `created_at`) VALUES
('RODEO-20260303-0001', 'TRK-abc123def456', 1, 'Pelanggan Walk-In', NULL, 1, 'processing', 1, 15000.00, 15000.00, 'unpaid', 'Order contoh untuk testing fitur tracking', '2026-03-05 17:00:00', NOW());

INSERT INTO `order_items` (`order_id`, `product_id`, `product_name`, `quantity`, `unit`, `unit_price`, `subtotal`) VALUES
(1, 3, 'Cuci Setrika', 3, '/kg', 5000.00, 15000.00);
