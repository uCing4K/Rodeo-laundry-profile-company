# 📦 Database — Rodeo Laundry Company Profile Website

> Dokumentasi database untuk website company profile Rodeo Laundry.  
> Dibuat berdasarkan `RODEO_LAUNDRY_Company_Profile_Planning.md`

---

## 📁 Struktur File

| File | Deskripsi |
|------|-----------|
| `schema/01_schema.sql` | Struktur tabel (DDL) — jalankan pertama |
| `seeds/02_seed_data.sql` | Data awal: produk, harga, FAQ, konten halaman, dll |
| `views/03_views_and_queries.sql` | Views, stored procedures, dan query siap pakai |
| `dump/rodd1157_profile_company.sql` | Dump penuh referensi database |
| `README.md` | Dokumentasi ini |

### Urutan Instalasi

```sql
-- 1. Buat database
CREATE DATABASE rodeo_laundry_web CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE rodeo_laundry_web;

-- 2. Jalankan schema
SOURCE schema/01_schema.sql;

-- 3. Isi data awal
SOURCE seeds/02_seed_data.sql;

-- 4. Buat views & stored procedures
SOURCE views/03_views_and_queries.sql;
```

---

## 🗃️ Daftar Tabel (15 Tabel)

### Tabel Utama (Core)

| No | Tabel | Deskripsi | Digunakan di Halaman |
|----|-------|-----------|----------------------|
| 1 | `company_settings` | Identitas, kontak, SEO, warna, font | Semua halaman (header, footer) |
| 2 | `service_categories` | Kategori layanan (reguler & premium) | Layanan & Harga, Beranda |
| 3 | `products` | Produk/layanan + harga per satuan | Layanan & Harga |
| 4 | `service_types` | Jenis layanan (Reguler, Express, dll) | Layanan & Harga |
| 5 | `customers` | Data pelanggan (personal & B2B) | Statistik, Order |
| 6 | `orders` | Pesanan dengan tracking token | Cek Status Order |
| 7 | `order_items` | Detail item per pesanan | Cek Status Order |

### Tabel Konten (Content)

| No | Tabel | Deskripsi | Digunakan di Halaman |
|----|-------|-----------|----------------------|
| 8 | `testimonials` | Testimonial pelanggan | Beranda |
| 9 | `faq` | Pertanyaan yang sering diajukan | FAQ |
| 10 | `page_contents` | Konten halaman (mini CMS) | Semua halaman |
| 11 | `team_members` | Anggota tim perusahaan | Tentang Kami |
| 12 | `operating_hours` | Jam operasional per hari | Kontak & Lokasi |
| 13 | `gallery` | Galeri foto website | Galeri, Beranda |

### Tabel Pendukung (Support)

| No | Tabel | Deskripsi | Digunakan di Halaman |
|----|-------|-----------|----------------------|
| 14 | `contact_messages` | Pesan dari form kontak | Admin / Backend |
| 15 | `statistics_cache` | Cache statistik (total order, dll) | Tentang Kami, Beranda |

---

## 🔗 Relasi Antar Tabel (ERD)

```
┌─────────────────────┐
│  service_categories  │
│  (Kategori Layanan)  │
└──────────┬──────────┘
           │ 1:N
           ▼
┌─────────────────────┐
│      products        │
│  (Produk & Harga)    │
└──────────┬──────────┘
           │ 1:N (via order_items)
           ▼
┌─────────────────────┐       ┌─────────────────────┐
│    order_items       │◄──────│      orders          │
│  (Detail Item)       │  N:1  │  (Pesanan Utama)     │
└─────────────────────┘       └──────┬───────┬───────┘
                                     │       │
                              N:1    │       │ N:1
                                     ▼       ▼
                          ┌───────────┐ ┌──────────────┐
                          │ customers  │ │ service_types │
                          │(Pelanggan) │ │(Jenis Layanan)│
                          └───────────┘ └──────────────┘
```

---

## 📄 Detail Tabel

### `company_settings`

Menyimpan konfigurasi key-value untuk seluruh website.

| `setting_group` | Contoh Key | Deskripsi |
|-----------------|------------|-----------|
| `general` | `company_name`, `company_tagline` | Identitas dasar |
| `contact` | `company_phone`, `company_whatsapp`, `company_email` | Info kontak |
| `social` | `social_instagram`, `social_facebook` | Media sosial |
| `seo` | `seo_meta_title`, `seo_meta_description` | SEO & Open Graph |
| `design` | `color_primary`, `font_heading` | Warna & tipografi |

### `service_categories`

| Field | Tipe | Keterangan |
|-------|------|------------|
| `type` | ENUM | `reguler` atau `premium` |
| `icon` | VARCHAR | Class FontAwesome (cth: `fa-shirt`) |
| `sort_order` | INT | Urutan tampil di halaman |

**Total: 13 kategori reguler + 4 kategori premium = 17 kategori**

### `products`

| Field | Tipe | Keterangan |
|-------|------|------------|
| `price` | DECIMAL(10,2) | Harga dalam Rupiah |
| `unit` | VARCHAR | `/kg`, `/pcs`, atau `/meter` |
| `size_variant` | VARCHAR | S, M, L, XL, XXL, Tipis, Sedang, dll |

**Total: 45 produk reguler + 18 produk premium = 63 produk**

### `orders` — Fitur Tracking

| Field | Keterangan |
|-------|------------|
| `order_number` | Format: `RODEO-YYYYMMDD-XXXX` |
| `tracking_token` | Token unik untuk akses publik tanpa login |
| `status` | `pending` → `processing` → `done` → `picked_up` atau `cancelled` |

### `page_contents` — Mini CMS

Konten halaman disimpan sebagai key-value agar bisa diedit tanpa ubah kode.

| `content_type` | Keterangan |
|----------------|------------|
| `text` | Teks biasa |
| `html` | Konten dengan format HTML |
| `image` | Path gambar |
| `json` | Data terstruktur (cth: array keunggulan) |

---

## 🔍 Views yang Tersedia

| View | Kegunaan |
|------|----------|
| `v_product_list` | Daftar produk lengkap dengan info kategori |
| `v_category_price_range` | Kategori + range harga (untuk preview di beranda) |
| `v_order_tracking` | Data tracking order dengan deskripsi status |
| `v_live_statistics` | Statistik real-time (total order, pelanggan, dll) |
| `v_faq_active` | FAQ aktif terurut |
| `v_testimonials_active` | Testimonial aktif terurut |
| `v_operating_hours` | Jam operasional terformat |

---

## ⚙️ Stored Procedures

| Procedure | Kegunaan |
|-----------|----------|
| `sp_generate_order_number` | Generate nomor order otomatis: `RODEO-YYYYMMDD-XXXX` |
| `sp_generate_tracking_token` | Generate token tracking unik (MD5-based) |
| `sp_update_statistics_cache` | Update cache statistik untuk tampilan website |

---

## 🌐 Mapping Halaman ↔ Tabel

| Halaman Website | Tabel yang Digunakan |
|-----------------|---------------------|
| 🏠 Beranda | `page_contents`, `service_categories`, `products`, `testimonials`, `statistics_cache` |
| 🧺 Layanan & Harga | `service_categories`, `products`, `service_types` |
| 🔍 Cek Status Order | `orders`, `order_items`, `service_types` |
| ℹ️ Tentang Kami | `page_contents`, `team_members`, `statistics_cache` |
| 📍 Lokasi & Kontak | `company_settings`, `operating_hours`, `contact_messages` |
| ❓ FAQ | `faq` |
| 🔧 Header & Footer | `company_settings` |

---

## 🔐 Catatan Keamanan

1. **Endpoint tracking order harus publik** — gunakan `tracking_token` sebagai identifier, bukan `order_id`
2. **Jangan expose data sensitif** — view `v_order_tracking` sudah difilter hanya menampilkan info yang aman
3. **Rate limiting** — terapkan rate limit pada endpoint cek status order untuk mencegah brute force
4. **Input sanitization** — validasi format nomor order (`RODEO-YYYYMMDD-XXXX`) sebelum query

---

## 📊 Seed Data yang Sudah Terisi

| Data | Jumlah |
|------|--------|
| Company Settings | 32 entries |
| Kategori Layanan | 17 kategori (13 reguler + 4 premium) |
| Produk & Harga | 63 produk |
| Service Types | 4 jenis layanan |
| FAQ | 7 pertanyaan |
| Testimonial | 5 testimonial (mock) |
| Page Contents | 25 konten halaman |
| Operating Hours | 7 hari |
| Team Members | 1 placeholder |
| Statistics Cache | 4 metrik |
| Sample Customers | 3 pelanggan |
| Sample Order | 1 order (untuk testing tracking) |

---

*Database version: 1.0 — Dibuat: 3 Maret 2026*
