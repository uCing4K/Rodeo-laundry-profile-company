# Rodeo Laundry Company Profile

Dokumen ini adalah panduan utama untuk membangun website company profile Rodeo Laundry dari nol sampai siap produksi.

Target pembaca:
- Backend team (Laravel)
- Frontend team (UI implementation)
- PM/Owner untuk validasi scope dan kualitas

Repository utama:
- https://github.com/uCing4K/Rodeo-laundry-profile-company.git

## 1. Visi Proyek

Membangun website company profile yang:
- Menampilkan layanan dan harga secara jelas
- Memiliki fitur tracking order publik
- Mudah dikembangkan bertahap (MVP ke dynamic)
- Bisa dipelihara lintas tim tanpa miskomunikasi

Output akhir minimal:
- Landing page modern dan responsive
- Halaman layanan lengkap (reguler + premium)
- Halaman tracking order (berdasarkan nomor order atau token)
- Halaman tentang, kontak, FAQ
- Integrasi WhatsApp dan SEO dasar

## 2. Ruang Lingkup Fitur

### Must Have (MVP)
- Home
- Layanan dan Harga
- Kontak dan Lokasi
- Responsive mobile
- Floating WhatsApp

### Should Have
- Tracking order publik
- FAQ
- SEO metadata + Open Graph
- Dynamic content dari database untuk bagian utama

### Nice to Have
- Form order online
- Counter statistik dinamis
- Galeri
- Konten blog

## 3. Struktur Data dan Sumber Kebenaran

Data utama berasal dari folder [database/](database/).

Gunakan urutan SQL berikut:
1. [database/01_schema.sql](database/01_schema.sql)
2. [database/02_seed_data.sql](database/02_seed_data.sql)
3. [database/03_views_and_queries.sql](database/03_views_and_queries.sql)

Dump referensi lengkap tersedia di:
- [database/rodd1157_profile_company.sql](database/rodd1157_profile_company.sql)

Catatan:
- Untuk development, disarankan gunakan file 01-03 (lebih modular)
- File dump penuh cocok untuk import cepat atau audit struktur

## 4. Mapping Halaman ke Tabel

- Home: company_settings, page_contents, service_categories, products, testimonials, statistics_cache
- Layanan: service_categories, products, service_types
- Tracking: orders, order_items, service_types
- Tentang: page_contents, team_members, statistics_cache
- Kontak: company_settings, operating_hours, contact_messages
- FAQ: faq

## 5. Arsitektur yang Direkomendasikan

### Backend
- Framework: Laravel 11+
- Database: MySQL/MariaDB
- API style: REST JSON
- Auth admin: Laravel Breeze/Fortify (opsional di fase awal)

### Frontend
Pilih salah satu mode:
1. Blade + Vite (cepat untuk team Laravel kecil)
2. Headless (React/Next/Vue) konsumsi API Laravel

Saran untuk efisiensi awal:
- Mulai dengan Blade + Vite untuk MVP
- Pisah ke headless bila traffic dan kebutuhan UI makin kompleks

## 6. Struktur Folder Laravel (Target)

Contoh struktur target di dalam project Laravel:

```text
app/
  Http/
    Controllers/
      Api/
        Public/
        Admin/
  Services/
  Repositories/

routes/
  web.php
  api.php

database/
  migrations/
  seeders/

resources/
  views/
  js/
  css/
```

## 7. Kontrak API Publik (Minimum)

### 7.1 GET /api/public/settings
Tujuan:
- Ambil setting global (nama, kontak, SEO, warna)

Response ringkas:
```json
{
  "company_name": "Rodeo Laundry",
  "company_phone": "+62 821-4329-7707",
  "company_whatsapp": "6282143297707"
}
```

### 7.2 GET /api/public/services
Tujuan:
- Ambil kategori + produk aktif

### 7.3 GET /api/public/faq
Tujuan:
- Ambil FAQ aktif terurut

### 7.4 GET /api/public/testimonials
Tujuan:
- Ambil testimonial aktif

### 7.5 GET /api/public/tracking?query={order_number_or_token}
Tujuan:
- Cek status berdasarkan order number atau tracking token

Validasi minimal:
- Tolak input kosong
- Batasi panjang input
- Validasi regex order number: ^RODEO-[0-9]{8}-[0-9]{4}$
- Rate limit endpoint

Contoh response:
```json
{
  "order_number": "RODEO-20260303-0001",
  "status": "processing",
  "status_description": "Sedang dalam proses cuci/setrika",
  "status_icon": "processing",
  "estimated_done_at": "2026-03-05 17:00:00"
}
```

## 8. Kontrak API Admin (Fase 2)

Contoh endpoint admin:
- CRUD kategori layanan
- CRUD produk
- CRUD konten halaman
- CRUD FAQ
- CRUD testimonial
- Update jam operasional

Rekomendasi:
- Gunakan Form Request validation
- Gunakan Policy/Gate untuk akses admin
- Gunakan Resource class untuk response konsisten

## 9. Workflow GitHub untuk Tim

Remote repository:
- https://github.com/uCing4K/Rodeo-laundry-profile-company.git

### Branching strategy
- main: stabil/production-ready
- develop: integrasi fitur
- feature/*: pekerjaan per fitur
- hotfix/*: perbaikan cepat production

### Naming branch
- feature/frontend-homepage
- feature/backend-tracking-api
- fix/tracking-validation

### Pull request checklist
- Scope sesuai issue
- Tidak ada hardcoded credential
- Endpoint diuji manual
- UI responsive (mobile + desktop)
- Lulus code review minimal 1 reviewer

### Conventional commit (disarankan)
- feat: tambah fitur
- fix: perbaikan bug
- refactor: perbaikan struktur tanpa ubah behavior
- docs: update dokumentasi
- chore: perubahan maintenance

Contoh:
- feat(api): add public tracking endpoint
- fix(frontend): handle empty service list state

## 10. Setup Lokal (Laravel)

Asumsi project Laravel sudah dibuat dalam repository.

Langkah cepat:
1. Clone repository
2. Copy .env.example ke .env
3. Set kredensial database
4. Jalankan composer install
5. Jalankan php artisan key:generate
6. Import SQL dari folder database (01-03)
7. Jalankan php artisan serve
8. Jalankan npm install lalu npm run dev (jika pakai Vite)

## 11. Standar Backend

- Gunakan Service layer untuk logic non-trivial
- Query kompleks dipusatkan di Repository/Query object
- Hindari logic berat di Controller
- Gunakan pagination untuk list besar
- Semua request write wajib tervalidasi

## 12. Standar Frontend

- Mobile-first
- Gunakan design token dari company_settings (warna/font)
- Komponen reusable untuk card layanan, testimonial, FAQ item
- Error state dan empty state wajib ada
- Optimasi aset gambar (lazy loading, kompresi)

## 13. Keamanan dan Reliability

Tracking publik adalah endpoint sensitif, wajib:
- Tidak expose data pribadi berlebih
- Query hanya field aman
- Rate limiting
- Logging untuk request mencurigakan

Selain itu:
- Simpan credential hanya di .env
- Aktifkan CSRF untuk form web
- Escape output HTML kecuali konten yang sudah disanitasi

## 14. SEO dan Performa

Minimum SEO:
- title dan meta description per halaman
- Open Graph image
- Sitemap XML
- Robots.txt

Minimum performa:
- LCP target < 2.5s
- Kompres gambar hero
- Minify assets
- Caching query untuk data statis (settings, faq, testimonials)

## 15. Roadmap Implementasi

### Phase 1 (1-2 minggu)
- Setup project Laravel + DB
- Implement Home, Layanan, Kontak
- Integrasi WhatsApp CTA

### Phase 2 (1 minggu)
- Implement Tentang, FAQ
- Rapikan SEO dasar
- Stabilkan UI responsive

### Phase 3 (2-3 minggu)
- Implement tracking endpoint + halaman tracking
- Integrasi dynamic data dari DB
- Tambahkan dashboard admin sederhana

### Phase 4 (opsional)
- Galeri
- Form order online
- Statistik real-time lanjutan

## 16. Definition of Done per Fitur

Sebuah fitur dianggap selesai jika:
- Fungsionalitas sesuai acceptance criteria
- Data valid dan aman
- UI responsive dan terbaca jelas
- Dokumentasi endpoint diperbarui
- Sudah direview dan di-merge via PR

## 17. Onboarding Cepat Anggota Tim Baru

1. Baca [RODEO_LAUNDRY_Company_Profile_Planning.md](RODEO_LAUNDRY_Company_Profile_Planning.md)
2. Baca [database/README.md](database/README.md)
3. Baca dokumen ini dari atas ke bawah
4. Jalankan setup lokal
5. Ambil issue dari board dan buat branch feature

## 18. Prioritas Implementasi Teknis Pertama

Urutan kerja yang paling aman:
1. Finalisasi skema database dev (01-03)
2. Bangun endpoint publik read-only
3. Bangun halaman frontend konsumsi API
4. Bangun tracking publik
5. Tambah CMS/admin bertahap

## 19. Catatan Kolaborasi Tim

Agar tidak sering saling tanya:
- Semua perubahan struktur data harus update dokumen
- Semua endpoint baru harus punya contoh request/response
- Semua komponen UI utama harus ada source of truth (nama props, behavior)
- Semua keputusan teknis dicatat di PR description

## 20. Referensi Internal

- [RODEO_LAUNDRY_Company_Profile_Planning.md](RODEO_LAUNDRY_Company_Profile_Planning.md)
- [database/README.md](database/README.md)
- [database/01_schema.sql](database/01_schema.sql)
- [database/02_seed_data.sql](database/02_seed_data.sql)
- [database/03_views_and_queries.sql](database/03_views_and_queries.sql)

---

Jika ingin, tahap berikutnya saya bisa bantu generate:
- Template issue GitHub (backend/frontend/bug)
- Struktur route + controller Laravel untuk endpoint publik
- Struktur komponen frontend per halaman (Home, Services, Tracking)
- Checklist QA sebelum launch
