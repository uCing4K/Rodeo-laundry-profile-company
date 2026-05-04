<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Rodeo Laundry</title>
    <meta name="description" content="Dashboard admin Rodeo Laundry." />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body class="admin-body">
    <div class="admin-shell">
      <aside class="admin-sidebar" id="admin-sidebar" data-admin-sidebar>
        <div class="admin-sidebar-head">
          <div class="admin-brand">
            <img src="{{ asset('Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
            <div class="admin-brand-text">
              <span class="admin-brand-name">Rodeo Laundry</span>
              <span class="admin-brand-role">Admin Dashboard</span>
            </div>
          </div>
          <button
            class="admin-menu-btn admin-menu-close"
            type="button"
            aria-label="Tutup menu"
            data-admin-menu-close
          >
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <p class="admin-sidebar-note">
          Kelola konten, operasional, dan komunikasi pelanggan dari satu tempat.
        </p>

        <div class="admin-nav-divider"></div>

        <nav class="admin-nav">
          <div class="admin-nav-section">
            <span class="admin-nav-label">Menu Utama</span>
            <a class="admin-nav-item is-active" href="#dashboard">
              <i class="admin-nav-icon fas fa-chart-line"></i>
              <span>Dashboard</span>
            </a>
          </div>

          <div class="admin-nav-section">
            <span class="admin-nav-label">Manajemen Konten</span>
            <a class="admin-nav-item" href="#services">
              <i class="admin-nav-icon fas fa-tools"></i>
              <span>Layanan & Harga</span>
            </a>
            <a class="admin-nav-item" href="#categories">
              <i class="admin-nav-icon fas fa-folder"></i>
              <span>Kategori</span>
            </a>
            <a class="admin-nav-item" href="#service-types">
              <i class="admin-nav-icon fas fa-cog"></i>
              <span>Jenis Layanan</span>
            </a>
          </div>

          <div class="admin-nav-section">
            <span class="admin-nav-label">Transaksi</span>
            <a class="admin-nav-item" href="#orders">
              <i class="admin-nav-icon fas fa-box"></i>
              <span>Order & Tracking</span>
            </a>
          </div>

          <div class="admin-nav-section">
            <span class="admin-nav-label">Informasi Publik</span>
            <a class="admin-nav-item" href="#faq">
              <i class="admin-nav-icon fas fa-question-circle"></i>
              <span>FAQ</span>
            </a>
            <a class="admin-nav-item" href="#testimonials">
              <i class="admin-nav-icon fas fa-star"></i>
              <span>Testimoni</span>
            </a>
            <a class="admin-nav-item" href="#team">
              <i class="admin-nav-icon fas fa-users"></i>
              <span>Tim</span>
            </a>
          </div>

          <div class="admin-nav-section">
            <span class="admin-nav-label">Pengaturan</span>
            <a class="admin-nav-item" href="#settings">
              <i class="admin-nav-icon fas fa-sliders-h"></i>
              <span>Company Settings</span>
            </a>
            <a class="admin-nav-item" href="#hours">
              <i class="admin-nav-icon fas fa-clock"></i>
              <span>Jam Operasional</span>
            </a>
          </div>
        </nav>

        <div class="admin-nav-divider"></div>

        <div class="admin-sidebar-footer">
          <div class="admin-user">
            <div class="admin-user-avatar">RL</div>
            <div>
              <p class="admin-user-name">Admin Rodeo</p>
              <p class="admin-user-role">Owner</p>
            </div>
          </div>
          <button class="btn btn-ghost" type="button">Logout</button>
        </div>
      </aside>

      <div class="admin-sidebar-backdrop" data-admin-backdrop></div>

      <main class="admin-main">
        <header class="admin-topbar">
          <div class="admin-topbar-left">
            <button
              class="admin-menu-btn"
              type="button"
              aria-label="Buka menu"
              aria-controls="admin-sidebar"
              aria-expanded="false"
              data-admin-menu-toggle
            >
              <i class="fas fa-bars"></i>
            </button>
            <div class="admin-topbar-title">
              <p class="admin-kicker">Dashboard</p>
              <h1>Selamat datang, Admin</h1>
              <p class="admin-topbar-subtitle">
                Kelola operasional Rodeo Laundry dengan ringkas dan cepat.
              </p>
            </div>
          </div>
          <div class="admin-actions">
            <button class="btn btn-ghost" type="button">Preview Website</button>
            <button class="btn btn-primary" type="button">Tambah Order</button>
          </div>
        </header>

        <div class="admin-content">
          <section class="admin-hero" id="dashboard">
            <div class="admin-hero-text">
              <p class="admin-hero-label">Overview Hari Ini</p>
              <h2>Semua modul siap dikelola dalam satu dashboard.</h2>
              <p>
                Monitor order, layanan, dan komunikasi pelanggan dalam satu
                tampilan yang rapi dan mudah dipahami.
              </p>
              <div class="admin-hero-actions">
                <button class="btn btn-primary" type="button">Buat Order</button>
                <button class="btn btn-ghost" type="button">Kelola Layanan</button>
              </div>
            </div>
            <div class="admin-hero-card">
              <div class="admin-hero-card-head">
                <h3>Snapshot Operasional</h3>
                <span class="admin-pill">Live</span>
              </div>
              <div class="admin-hero-list">
                <div class="admin-hero-item">
                  <div>
                    <p class="admin-hero-item-title">Order aktif</p>
                    <p class="admin-hero-item-meta">Pesanan berjalan hari ini</p>
                  </div>
                  <span class="admin-hero-item-value">34</span>
                </div>
                <div class="admin-hero-item">
                  <div>
                    <p class="admin-hero-item-title">Estimasi selesai</p>
                    <p class="admin-hero-item-meta">Rata-rata 24 - 48 jam</p>
                  </div>
                  <span class="admin-hero-item-value">48j</span>
                </div>
                <div class="admin-hero-item">
                  <div>
                    <p class="admin-hero-item-title">CS aktif</p>
                    <p class="admin-hero-item-meta">Balas chat pelanggan</p>
                  </div>
                  <span class="admin-hero-item-value">3</span>
                </div>
              </div>
            </div>
          </section>

          <section class="admin-grid">
            <div class="admin-card">
              <div class="admin-card-head">
                <h3>Ringkasan KPI</h3>
                <span class="admin-chip">Hari ini</span>
              </div>
              <div class="admin-kpis">
                <div class="admin-kpi">
                  <p class="stat-value">15</p>
                  <p class="stat-label">Kategori layanan</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">120</p>
                  <p class="stat-label">Produk aktif</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">34</p>
                  <p class="stat-label">Order hari ini</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">10</p>
                  <p class="stat-label">FAQ aktif</p>
                </div>
              </div>
              <div class="note-block">
                <strong>Catatan backend:</strong>
                Endpoint ringkasan bisa disediakan di GET /admin/summary.
              </div>
            </div>
            <div class="admin-card">
              <div class="admin-card-head">
                <h3>Order Terbaru</h3>
                <a class="admin-card-link" href="#orders">Lihat semua</a>
              </div>
              <div class="admin-activity">
                <div class="admin-activity-item">
                  <div>
                    <p class="admin-activity-title">RODEO-20260428-0001</p>
                    <p class="admin-activity-meta">Budi Santoso - Processing</p>
                  </div>
                  <span class="admin-pill">17:00</span>
                </div>
                <div class="admin-activity-item">
                  <div>
                    <p class="admin-activity-title">RODEO-20260428-0002</p>
                    <p class="admin-activity-meta">Rina P. - Ready</p>
                  </div>
                  <span class="admin-pill">16:30</span>
                </div>
                <div class="admin-activity-item">
                  <div>
                    <p class="admin-activity-title">RODEO-20260428-0003</p>
                    <p class="admin-activity-meta">Satria R. - Pickup</p>
                  </div>
                  <span class="admin-pill">15:10</span>
                </div>
              </div>
            </div>
          </section>

          <section class="admin-section" id="services" data-api="/admin/services">
            <h3>Layanan dan Harga</h3>
            <p>Kelola daftar produk layanan yang tampil di website.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel products. Fields utama: category_id, name, unit,
              base_price, service_type_id, is_active, description.
            </div>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Tipe</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Setrika</td>
                    <td>Setrika Saja</td>
                    <td>kg</td>
                    <td>2500</td>
                    <td>Reguler</td>
                    <td><span class="status-tag">Aktif</span></td>
                    <td>Edit | Hapus</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="hero-form">
              <div class="form-grid">
                <div class="field">
                  <input type="text" placeholder="Nama produk" />
                </div>
                <div class="field">
                  <select>
                    <option>Kategori</option>
                    <option>Setrika</option>
                    <option>Cuci Setrika</option>
                  </select>
                </div>
                <div class="field">
                  <input type="text" placeholder="Satuan (kg/pcs/meter)" />
                </div>
                <div class="field">
                  <input type="number" placeholder="Harga" />
                </div>
                <div class="field">
                  <select>
                    <option>Tipe layanan</option>
                    <option>Reguler</option>
                    <option>Premium</option>
                  </select>
                </div>
                <div class="field">
                  <select>
                    <option>Status</option>
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                  </select>
                </div>
              </div>
              <div class="field">
                <textarea rows="3" placeholder="Deskripsi singkat"></textarea>
              </div>
              <button class="btn btn-primary" type="button">Simpan layanan</button>
            </form>
          </section>

          <section class="admin-section" id="categories" data-api="/admin/categories">
            <h3>Kategori Layanan</h3>
            <p>Kelola kategori dan urutan tampilan.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel service_categories. Fields: name, icon, display_order, is_active.
            </div>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Icon</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Setrika</td>
                    <td>HT</td>
                    <td>1</td>
                    <td><span class="status-tag">Aktif</span></td>
                    <td>Edit | Hapus</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <section class="admin-section" id="service-types" data-api="/admin/service-types">
            <h3>Jenis Layanan</h3>
            <p>Kelola tipe layanan seperti reguler, express, premium.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel service_types. Fields: name, description, extra_fee, is_active.
            </div>
            <form class="hero-form">
              <div class="form-grid">
                <div class="field">
                  <input type="text" placeholder="Nama tipe" />
                </div>
                <div class="field">
                  <input type="number" placeholder="Biaya tambahan" />
                </div>
              </div>
              <div class="field">
                <textarea rows="3" placeholder="Deskripsi"></textarea>
              </div>
              <button class="btn btn-primary" type="button">Simpan tipe</button>
            </form>
          </section>

          <section class="admin-section" id="orders" data-api="/admin/orders">
            <h3>Order dan Tracking</h3>
            <p>Update status pesanan untuk kebutuhan tracking publik.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel orders + order_items. Fields penting: order_number,
              tracking_token, status, estimated_done_at. Pastikan validasi regex
              order number dan audit log perubahan status.
            </div>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Order</th>
                    <th>Pelanggan</th>
                    <th>Status</th>
                    <th>Estimasi selesai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>RODEO-20260428-0001</td>
                    <td>Budi Santoso</td>
                    <td><span class="status-tag">Processing</span></td>
                    <td>2026-04-28 17:00</td>
                    <td>Update | Detail</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <section class="admin-section" id="faq" data-api="/admin/faq">
            <h3>FAQ</h3>
            <p>Kelola pertanyaan umum yang tampil di halaman FAQ.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel faq. Fields: question, answer, display_order, is_active.
            </div>
            <form class="hero-form">
              <div class="field">
                <input type="text" placeholder="Pertanyaan" />
              </div>
              <div class="field">
                <textarea rows="3" placeholder="Jawaban"></textarea>
              </div>
              <button class="btn btn-primary" type="button">Simpan FAQ</button>
            </form>
          </section>

          <section class="admin-section" id="testimonials" data-api="/admin/testimonials">
            <h3>Testimoni</h3>
            <p>Kelola testimoni pelanggan yang tampil di beranda.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel testimonials. Fields: customer_name, message, rating, is_active.
            </div>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Rina P.</td>
                    <td>Pengerjaan cepat dan rapi.</td>
                    <td>5</td>
                    <td><span class="status-tag">Aktif</span></td>
                    <td>Edit | Hapus</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <section class="admin-section" id="settings" data-api="/admin/settings">
            <h3>Company Settings</h3>
            <p>Data global yang tampil di header, footer, dan halaman kontak.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel company_settings. Fields: company_name, address, phone,
              whatsapp, email, tagline, seo_title, seo_description.
            </div>
            <form class="hero-form">
              <div class="form-grid">
                <div class="field"><input type="text" placeholder="Nama perusahaan" /></div>
                <div class="field"><input type="text" placeholder="Tagline" /></div>
                <div class="field"><input type="text" placeholder="Telepon" /></div>
                <div class="field"><input type="text" placeholder="WhatsApp" /></div>
                <div class="field"><input type="email" placeholder="Email" /></div>
                <div class="field"><input type="text" placeholder="Alamat" /></div>
              </div>
              <div class="field">
                <textarea rows="3" placeholder="Deskripsi SEO"></textarea>
              </div>
              <button class="btn btn-primary" type="button">Simpan settings</button>
            </form>
          </section>

          <section class="admin-section" id="hours" data-api="/admin/operating-hours">
            <h3>Jam Operasional</h3>
            <p>Kelola jadwal buka dan tutup.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel operating_hours. Fields: day_name, open_time, close_time, is_open.
            </div>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Hari</th>
                    <th>Jam buka</th>
                    <th>Jam tutup</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Senin</td>
                    <td>09:00</td>
                    <td>19:00</td>
                    <td><span class="status-tag">Buka</span></td>
                    <td>Edit</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <section class="admin-section" id="team" data-api="/admin/team">
            <h3>Tim</h3>
            <p>Kelola informasi tim untuk halaman Tentang Kami.</p>
            <div class="note-block">
              <strong>Catatan backend:</strong>
              CRUD tabel team_members. Fields: name, role, photo_url, display_order, is_active.
            </div>
            <form class="hero-form">
              <div class="form-grid">
                <div class="field"><input type="text" placeholder="Nama" /></div>
                <div class="field"><input type="text" placeholder="Jabatan" /></div>
                <div class="field"><input type="text" placeholder="URL foto" /></div>
                <div class="field"><input type="number" placeholder="Urutan tampil" /></div>
              </div>
              <button class="btn btn-primary" type="button">Simpan anggota</button>
            </form>
          </section>
        </div>
      </main>
    </div>

    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>
