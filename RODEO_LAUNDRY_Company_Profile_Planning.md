# 🏢 Base Planning — Company Profile Web
# Rodeo Laundry

> **Dokumen ini adalah perencanaan dasar (base planning) untuk membangun website company profile modern milik Rodeo Laundry.**
> Disusun berdasarkan analisis database sistem POS internal yang aktif digunakan.

---

## 📌 Identitas Perusahaan

| Field         | Detail                          |
|---------------|---------------------------------|
| Nama          | **Rodeo Laundry**               |
| Alamat        | Batu, Sumberejo, Gg. Rodeo      |
| Telepon       | +62 821-4329-7707               |
| Email         | info@rodeolaundry.my.id         |
| Domain        | rodeolaundry.my.id              |
| Tagline (saran) | *"Bersih, Cepat, Terpercaya"* |

---

## 🎯 Tujuan Website

1. Memperkenalkan Rodeo Laundry kepada calon pelanggan baru secara digital
2. Menampilkan daftar layanan lengkap beserta harga secara transparan
3. Membangun kepercayaan pelanggan melalui informasi yang jelas dan profesional
4. Menyediakan fitur pelacakan pesanan secara publik
5. Memudahkan pelanggan menghubungi atau memesan layanan

---

## 🗂️ Struktur Halaman (Sitemap)

```
Rodeo Laundry Website
│
├── 🏠 Home / Beranda
├── 🧺 Layanan & Harga
│   ├── Layanan Reguler
│   └── Layanan Premium
├── 🔍 Cek Status Order
├── ℹ️ Tentang Kami
├── 📍 Lokasi & Kontak
└── ❓ FAQ
```

---

## 📄 Detail Setiap Halaman

---

### 1. 🏠 Halaman Beranda (Home)

Halaman pertama yang dilihat pengunjung. Harus memberikan kesan modern, bersih, dan langsung to the point.

#### Komponen yang Wajib Ada:

| Bagian             | Deskripsi                                                                 |
|--------------------|---------------------------------------------------------------------------|
| **Hero Section**   | Judul besar + tagline + tombol CTA ("Lihat Layanan" & "Hubungi Kami")     |
| **Keunggulan**     | 3–4 poin singkat (Harga Terjangkau, Proses Cepat, Bisa Tracking, dll.)   |
| **Preview Layanan**| Kartu ringkas kategori layanan dengan ikon dan harga mulai dari           |
| **Cara Kerja**     | Infografis 3 langkah: Antar → Proses → Ambil/Dikirim                     |
| **Testimonial**    | Komentar pelanggan (bisa fiktif/mock awal, lalu diperbarui)              |
| **CTA Akhir**      | Banner besar ajak pelanggan kontak atau cek status pesanan                |

---

### 2. 🧺 Halaman Layanan & Harga

Halaman ini adalah halaman paling penting secara bisnis — tampilkan semua produk dari database.

#### 2a. Layanan Reguler

| Kategori             | Produk                                       | Satuan  | Harga        |
|----------------------|----------------------------------------------|---------|--------------|
| **Setrika**          | Setrika Saja                                 | /kg     | Rp 2.500     |
| **Cuci Kering**      | Cuci Kering Lipat                            | /kg     | Rp 4.000     |
| **Cuci Setrika**     | Cuci Setrika                                 | /kg     | Rp 5.000     |
| **Selimut**          | S / M / L / XL / XXL                        | /pcs    | Rp 5.000–20.000 |
| **Bedcover**         | S / M / L / XL / XXL                        | /pcs    | Rp 13.000–25.000 |
| **Seprai**           | Seprai + Sarung Bantal/Guling (3 varian)     | /pcs    | Rp 5.000–10.000 |
| **Karpet**           | Tipis / Sedang / Tebal / Super Tebal         | /meter  | Rp 5.000–15.000 |
| **Boneka**           | Kecil / Sedang / Besar / Jumbo               | /pcs    | Rp 2.000–25.000 |
| **Handuk & Jaket**   | Handuk Kecil/Sedang/Besar, Jaket, Keset     | /pcs    | Rp 2.000–15.000 |
| **Cuci Sepatu**      | Ukuran Kecil / Normal                        | /pcs    | Rp 10.000–15.000 |
| **Gorden**           | Normal / Tebal                               | /kg     | Rp 7.000–10.000 |
| **Bantal & Guling**  | Bantal Normal, Guling Normal/Tebal           | /pcs    | Rp 10.000–12.000 |
| **Tas**              | Kecil / Sedang / Besar                       | /pcs    | Rp 5.000–15.000 |

#### 2b. Layanan Premium ✨

> Proses lebih teliti, estimasi 48–72 jam.

| Kategori              | Produk                                            | Harga        |
|-----------------------|---------------------------------------------------|--------------|
| **Atasan & Luaran**   | Kaos, Kemeja, Jaket Tipis/Tebal                   | Rp 15.000–30.000/pcs |
| **Bawahan**           | Celana Pendek/Panjang, Jeans, Rok                 | Rp 15.000–25.000/pcs |
| **Ibadah & Lainnya**  | Hijab, Sajadah, Mukena SET, Baju Renang, Handuk Dewasa | Rp 15.000–30.000/pcs |
| **Formal & Gaun**     | Dress Anak/Dewasa, Baju Syar'i, Jas, Jas Setelan  | Rp 20.000–50.000/pcs |

#### 2c. Jenis Layanan (Service Type)

| Jenis Layanan        | Estimasi Selesai        | Keterangan                          |
|----------------------|-------------------------|-------------------------------------|
| Reguler              | Sesuai kategori produk  | Harga standar                        |
| Express 24 Jam       | ~24 jam                 | Biaya tambahan: +Rp 15.000          |
| Express Same Day     | Hari yang sama          | Biaya tambahan: +Rp 10.000          |
| Express 2 Hari       | 2 hari kerja            | Biaya tambahan menyesuaikan         |

---

### 3. 🔍 Halaman Cek Status Order

Fitur **sangat kuat** yang sudah didukung sistem internal (ada `tracking_token` di tabel `orders`).

#### Alur Fitur:
1. Pelanggan memasukkan **nomor order** (format: `RODEO-YYYYMMDD-XXXX`) atau **token tracking**
2. Sistem menampilkan status order secara real-time

#### Tampilan Status yang Bisa Ditampilkan:

| Status         | Ikon  | Keterangan                                 |
|----------------|-------|--------------------------------------------|
| `pending`      | 🕐    | Pesanan diterima, menunggu diproses         |
| `processing`   | 🔄    | Sedang dalam proses cuci/setrika            |
| `done`         | ✅    | Selesai, siap diambil                       |
| `picked_up`    | 📦    | Sudah diambil oleh pelanggan                |
| `cancelled`    | ❌    | Pesanan dibatalkan                          |

> **Catatan teknis:** Endpoint publik dapat dibuat untuk mengakses data order berdasarkan `tracking_token` tanpa harus login ke sistem POS.

---

### 4. ℹ️ Halaman Tentang Kami

Membangun kepercayaan dan menunjukkan identitas brand.

#### Konten yang Perlu Ada:
- **Cerita / Sejarah**: Tanggal berdiri, latar belakang
- **Visi & Misi**: Singkat, 1–2 kalimat masing-masing
- **Nilai Perusahaan**: Bersih, Tepat Waktu, Ramah Pelanggan, Terpercaya
- **Tim**: Foto dan nama jabatan (opsional namun sangat membantu)
- **Angka Kunci** *(bisa ditarik dari database secara dinamis)*:
  - Total pesanan selesai
  - Total pelanggan terdaftar
  - Kategori layanan tersedia
  - Tahun berdiri

---

### 5. 📍 Halaman Lokasi & Kontak

| Elemen          | Detail                                           |
|-----------------|--------------------------------------------------|
| **Peta Interaktif** | Google Maps embed dengan pin lokasi              |
| **Alamat**      | Batu, Sumberejo, Gg. Rodeo                       |
| **No. Telepon** | +62 821-4329-7707 *(klik to call)*              |
| **WhatsApp**    | Tombol langsung ke WhatsApp chat                 |
| **Email**       | info@rodeolaundry.my.id                          |
| **Jam Operasional** | Tampilkan jam buka dan tutup per hari           |

---

### 6. ❓ Halaman FAQ

Menjawab pertanyaan umum pelanggan sehingga mengurangi pertanyaan berulang ke WhatsApp.

#### Contoh Pertanyaan FAQ:

- Berapa lama waktu proses pencucian?
- Apakah ada layanan antar-jemput?
- Bagaimana cara melacak status laundry saya?
- Apa bedanya layanan reguler dan premium?
- Apakah bisa bayar nanti (hutang/kredit)?
- Bagaimana jika pakaian saya rusak atau hilang?
- Apakah melayani order dalam jumlah besar (villa, penginapan, catering)?

---

## 🎨 Panduan Desain (Design Guide)

### Palet Warna (Saran)

| Peran      | Warna           | Kode Hex  |
|------------|-----------------|-----------|
| Primer     | Biru Laut       | `#1E4D8C` |
| Aksen      | Oranye Segar    | `#F5821F` |
| Latar      | Putih Bersih    | `#FFFFFF` |
| Teks       | Abu Gelap       | `#2D2D2D` |
| Sekunder   | Abu Terang      | `#F5F5F5` |

> Warna biru memberikan kesan kepercayaan dan kebersihan. Oranye sebagai aksen memberikan energi dan kehangatan.

### Tipografi (Saran)

| Peran       | Font Google     |
|-------------|-----------------|
| Judul       | `Poppins Bold`  |
| Body        | `Inter Regular` |
| Aksen       | `Poppins Medium`|

### Prinsip UI/UX Modern

- **Mobile-First**: Mayoritas pengguna mengakses dari smartphone
- **Ikon FontAwesome**: Sudah digunakan di sistem internal (konsistensi brand)
- **Shadow lembut** pada kartu layanan
- **Animasi ringan** saat scroll (scroll-reveal)
- **CTA kontras tinggi** (tombol mudah ditemukan)
- **Loading cepat**: Optimalkan gambar, gunakan lazy loading

---

## 🛠️ Stack Teknologi yang Disarankan

### Opsi A — Static Website (Sederhana & Cepat)

| Layer     | Teknologi         |
|-----------|-------------------|
| Frontend  | HTML5 + CSS3 + Vanilla JS (atau Bootstrap 5) |
| Hosting   | Vercel / Netlify / GitHub Pages |
| Form      | Formspree / WhatsApp deep link |

**Kelebihan:** Cepat, murah, mudah di-maintain.

---

### Opsi B — Integrasi dengan Sistem POS (Dinamis & Canggih)

| Layer      | Teknologi         |
|------------|-------------------|
| Frontend   | React.js / Next.js atau Vue.js |
| Backend    | Laravel / CodeIgniter (sudah ada sistem POS PHP) |
| Database   | MySQL (sudah ada: `rodd1157_rodeolaundry_pos`) |
| Hosting    | VPS / Shared Hosting dengan subdomain `www.`|
| API Publik | Endpoint tracking order via `tracking_token` |

**Kelebihan:** Harga layanan selalu update otomatis dari database, fitur tracking hidup.

---

## 📱 Fitur Wajib vs Opsional

### ✅ Fitur Wajib (Must Have)

- [ ] Halaman beranda dengan hero section
- [ ] Daftar layanan + harga lengkap
- [ ] Informasi kontak (WhatsApp, telepon, peta)
- [ ] Tampilan responsif mobile
- [ ] Tombol WhatsApp mengambang (floating button)

### 🌟 Fitur Prioritas Tinggi (Should Have)

- [ ] Cek status pesanan via nomor order / token
- [ ] Halaman FAQ
- [ ] SEO dasar (meta tags, Open Graph)
- [ ] Google Maps embed

### 💡 Fitur Opsional (Nice to Have)

- [ ] Harga terupdate otomatis dari database (integrasi API)
- [ ] Form pemesanan online sederhana
- [ ] Counter statistik (total pelanggan, total order)
- [ ] Galeri foto (before-after cucian, foto outlet)
- [ ] Blog / artikel tips perawatan pakaian
- [ ] Multi-bahasa (Indonesia & Inggris)
- [ ] Notifikasi WhatsApp otomatis ketika order selesai

---

## 🚀 Rencana Pengembangan (Roadmap)

### Phase 1 — MVP (Minimum Viable Product) | Durasi: 1–2 Minggu
- Setup domain & hosting
- Halaman Beranda
- Halaman Layanan & Harga (statis)
- Halaman Kontak + peta

### Phase 2 — Enhanced | Durasi: 1 Minggu
- Halaman Tentang Kami
- Halaman FAQ
- SEO Optimization
- Tombol floating WhatsApp
- Responsif mobile sempurna

### Phase 3 — Dynamic Integration | Durasi: 2–3 Minggu
- Fitur cek status order (integrasi API dengan sistem POS)
- Harga layanan dari database (real-time)
- Form pemesanan online

### Phase 4 — Growth | Opsional
- Statistik dinamis
- Galeri foto
- Blog konten

---

## 📊 Data dari Database yang Bisa Ditampilkan Secara Dinamis

| Data                     | Sumber Tabel         | Digunakan di Halaman     |
|--------------------------|----------------------|--------------------------|
| Daftar produk & harga    | `products`           | Layanan & Harga          |
| Kategori layanan + ikon  | `service_categories` | Layanan & Harga, Beranda |
| Total pelanggan          | `customers`          | Tentang Kami (statistik) |
| Status order             | `orders`             | Cek Status Order         |
| Info perusahaan          | `company_settings`   | Semua halaman (footer)   |

---

## 📞 Integrasi WhatsApp

**Template pesan otomatis saat tombol WA diklik:**

```
Halo Rodeo Laundry! 👋
Saya ingin [bertanya tentang layanan / melihat harga / mempersiapkan order].

Nama: _______
```

> URL format: `https://wa.me/6282143297707?text=...`

---

## ✅ Checklist Sebelum Launch

- [ ] Domain aktif dan HTTPS terpasang (SSL)
- [ ] Tampilan responsif di HP, tablet, dan desktop
- [ ] Semua nomor telepon/WA bisa diklik (tel: link)
- [ ] Google Maps menampilkan lokasi yang benar
- [ ] Semua harga sudah diverifikasi dengan pemilik
- [ ] Meta title & description terisi untuk SEO
- [ ] Favicon terpasang
- [ ] Uji coba di Chrome, Firefox, Safari mobile
- [ ] Loading speed < 3 detik (cek dengan PageSpeed Insights)
- [ ] Footer menampilkan nama perusahaan, kontak, dan copyright

---

## 📝 Catatan Strategis

> **Pelanggan Spesial yang Perlu Diperhatikan:**
> Dari data transaksi, terlihat adanya pesanan dari **villa/penginapan** (nama "Aster 1008", "Aster 2008", "Aster 2003", "BUS Asraf") dan **katering** ("Erick Catering").
> Ini menunjukkan ada segmen **B2B** (bisnis ke bisnis) yang sudah aktif.
>
> **Rekomendasi:** Tambahkan seksi khusus di website untuk **"Layanan Bisnis"** (villa, hotel, kos, katering) dengan penawaran khusus dan formulir kontak B2B terpisah.

---

*Dokumen ini dibuat berdasarkan analisis database `rodd1157_rodeolaundry_pos` — versi: 2 Maret 2026*
