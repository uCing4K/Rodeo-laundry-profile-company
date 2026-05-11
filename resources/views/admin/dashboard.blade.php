<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Dashboard — Rodeo Laundry</title>
    <meta name="description" content="Dashboard admin Rodeo Laundry." />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body class="admin-body">
    <div class="admin-shell">
      <aside class="admin-sidebar" id="admin-sidebar" data-admin-sidebar>
        <div class="admin-sidebar-head">
          <div class="admin-brand">
            <img src="{{ asset('asset/Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
            <div class="admin-brand-text">
              <span class="admin-brand-name">Rodeo Laundry</span>
              <span class="admin-brand-role">Admin Dashboard</span>
            </div>
          </div>
        </div>

        <p class="admin-sidebar-note">
          Kelola konten website company profile Rodeo Laundry.
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
            <a class="admin-nav-item" href="#popular-services">
              <i class="admin-nav-icon fas fa-star"></i>
              <span>Layanan Populer</span>
            </a>
            <a class="admin-nav-item" href="#service-types">
              <i class="admin-nav-icon fas fa-cog"></i>
              <span>Jenis Layanan</span>
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
            <div class="admin-user-avatar">
              {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div>
              <p class="admin-user-name">{{ Auth::user()->name }}</p>
              <p class="admin-user-role">Administrator</p>
            </div>
          </div>
          <form class="admin-logout" id="logout-form" action="{{ route('admin.logout') }}" method="post">
            @csrf
            <button class="btn btn-ghost" type="button" onclick="confirmLogout()">Logout</button>
          </form>
        </div>
      </aside>

      <main class="admin-main">
        <header class="admin-topbar">
          <div class="admin-topbar-left">
            <div class="admin-topbar-title">
              <p class="admin-kicker">Dashboard</p>
              <h1>Selamat datang, {{ Auth::user()->name }}!</h1>
              <p class="admin-topbar-subtitle">
                Kelola isi konten website profil Rodeo Laundry dengan ringkas dan cepat.
              </p>
            </div>
          </div>
          <div class="admin-actions">
            <a class="btn btn-ghost" href="{{ route('index') }}" target="_blank" rel="noopener">
              Preview Website
            </a>
          </div>
        </header>

        @if (session('success'))
          <div class="alert" style="margin: 16px 28px 0; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
          </div>
        @endif

        @if (session('error'))
          <div class="alert" style="margin: 16px 28px 0; background: #fff0f0; border-color: #f8a4a4; color: #c53030; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
          </div>
        @endif

        <div class="admin-content">
          <section class="admin-hero" id="dashboard">
            <div class="admin-hero-text">
              <p class="admin-hero-label">Overview Hari Ini</p>
              <h2>Semua modul siap dikelola dalam satu dashboard.</h2>
              <p>
                Monitor layanan, harga, dan pertanyaan pelanggan dalam satu
                tampilan yang rapi dan mudah dipahami.
              </p>
              <div class="admin-hero-actions">
                <a class="btn btn-primary" href="#services">Kelola Layanan</a>
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
                  <p class="stat-value">4</p>
                  <p class="stat-label">Layanan populer</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">120</p>
                  <p class="stat-label">Produk aktif</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">10</p>
                  <p class="stat-label">FAQ aktif</p>
                </div>
              </div>
            </div>
          </section>

          <section class="admin-section" id="services" data-api="/admin/services">
            <h3>Layanan dan Harga</h3>
            <p>Kelola daftar produk layanan yang tampil di website.</p>
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
                    <td data-label="Kategori">Setrika</td>
                    <td data-label="Produk">Setrika Saja</td>
                    <td data-label="Satuan">kg</td>
                    <td data-label="Harga">2500</td>
                    <td data-label="Tipe">Reguler</td>
                    <td data-label="Status"><span class="status-tag">Aktif</span></td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <a class="admin-action-btn" href="/admin/services/1/edit">Edit</a>
                        <form action="/admin/services/1" method="post" data-confirm="Hapus layanan ini?">
                          @csrf
                          @method('DELETE')
                          <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="/admin/services" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="name" placeholder="Nama produk" required />
                </div>
                <div class="field">
                  <select name="category_id" required>
                    <option value="">Kategori</option>
                    <option value="setrika">Setrika</option>
                    <option value="cuci-setrika">Cuci Setrika</option>
                  </select>
                </div>
                <div class="field">
                  <select name="unit" required>
                    <option value="">Satuan</option>
                    <option value="kg">kg</option>
                    <option value="pcs">pcs</option>
                    <option value="meter">meter</option>
                  </select>
                </div>
                <div class="field">
                  <input type="number" name="base_price" placeholder="Harga" min="0" required />
                </div>
                <div class="field">
                  <select name="service_type_id" required>
                    <option value="">Tipe layanan</option>
                    <option value="reguler">Reguler</option>
                    <option value="premium">Premium</option>
                  </select>
                </div>
                <div class="field">
                  <select name="is_active" required>
                    <option value="">Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                </div>
              </div>
              <div class="field">
                <textarea name="description" rows="3" placeholder="Deskripsi singkat"></textarea>
              </div>
              <button class="btn btn-primary" type="submit">Simpan layanan</button>
            </form>
          </section>

          <section class="admin-section" id="popular-services" data-api="/admin/popular-services">
            <h3>Layanan Populer</h3>
            <p>Tentukan layanan mana yang akan ditampilkan sebagai layanan populer di beranda.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Layanan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Layanan">Cuci Komplit</td>
                    <td data-label="Kategori">Pakaian</td>
                    <td data-label="Status"><span class="status-tag">Aktif</span></td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <form action="/admin/popular-services/1" method="post" data-confirm="Hapus layanan ini dari daftar populer?">
                          @csrf
                          @method('DELETE')
                          <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="/admin/popular-services" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <select name="service_id" required>
                    <option value="">Pilih Layanan</option>
                    <option value="1">Setrika Saja</option>
                    <option value="2">Cuci Komplit</option>
                  </select>
                </div>
                <div class="field">
                  <select name="is_active" required>
                    <option value="">Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Tambah ke populer</button>
            </form>
          </section>

          <section class="admin-section" id="service-types" data-api="/admin/service-types">
            <h3>Tipe Layanan</h3>
            <p>Kelola tipe layanan seperti reguler, express, premium.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Biaya Tambahan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Nama">Reguler</td>
                    <td data-label="Biaya Tambahan">0</td>
                    <td data-label="Deskripsi">Layanan standar</td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <a class="admin-action-btn" href="/admin/service-types/1/edit">Edit</a>
                        <form action="/admin/service-types/1" method="post" data-confirm="Hapus tipe layanan ini?">
                          @csrf
                          @method('DELETE')
                          <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="/admin/service-types" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="name" placeholder="Nama tipe" required />
                </div>
                <div class="field">
                  <input type="number" name="extra_fee" placeholder="Biaya tambahan" min="0" />
                </div>
              </div>
              <div class="field">
                <textarea name="description" rows="3" placeholder="Deskripsi"></textarea>
              </div>
              <button class="btn btn-primary" type="submit">Simpan tipe</button>
            </form>
          </section>

          <section class="admin-section" id="faq" data-api="/admin/faq">
            @php
              $edit_faq = session('edit_faq');
            @endphp
            <h3>FAQ</h3>
            <p>Kelola pertanyaan umum yang tampil di halaman FAQ.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Pertanyaan</th>
                    <th>Jawaban</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($faqs as $faq)
                    <tr>
                      <td data-label="Pertanyaan">{{ $faq->question }}</td>
                      <td data-label="Jawaban">{{ \Illuminate\Support\Str::limit($faq->answer, 80) }}</td>
                      <td data-label="Aksi">
                        <div class="admin-table-actions">
                          <a class="admin-action-btn" href="{{ route('admin.faqs.edit', $faq) }}">Edit</a>
                          <form action="{{ route('admin.faqs.destroy', $faq) }}" method="post" data-confirm="Hapus FAQ ini?">
                            @csrf
                            @method('DELETE')
                            <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3">Belum ada FAQ.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="{{ $edit_faq ? route('admin.faqs.update', $edit_faq['id']) : route('admin.faqs.store') }}" method="post">
              @csrf
              @if ($edit_faq)
                @method('PUT')
              @endif
              <div class="field">
                <input type="text" name="question" placeholder="Pertanyaan" value="{{ old('question', $edit_faq['question'] ?? '') }}" required />
              </div>
              <div class="field">
                <textarea name="answer" rows="3" placeholder="Jawaban" required>{{ old('answer', $edit_faq['answer'] ?? '') }}</textarea>
              </div>
              <button class="btn btn-primary" type="submit">{{ $edit_faq ? 'Perbarui FAQ' : 'Simpan FAQ' }}</button>
            </form>
          </section>

          <section class="admin-section" id="testimonials" data-api="/admin/testimonials">
            @php
              $edit_testimonial = session('edit_testimonial');
            @endphp
            <h3>Testimoni</h3>
            <p>Kelola testimoni pelanggan yang tampil di beranda.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($testimonials as $testimonial)
                    <tr>
                      <td data-label="Nama">{{ $testimonial->customer_name }}</td>
                      <td data-label="Pesan">{{ \Illuminate\Support\Str::limit($testimonial->content, 80) }}</td>
                      <td data-label="Aksi">
                        <div class="admin-table-actions">
                          <a class="admin-action-btn" href="{{ route('admin.testimonials.edit', $testimonial) }}">Edit</a>
                          <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="post" data-confirm="Hapus testimoni ini?">
                            @csrf
                            @method('DELETE')
                            <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="3">Belum ada testimoni.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="{{ $edit_testimonial ? route('admin.testimonials.update', $edit_testimonial['id']) : route('admin.testimonials.store') }}" method="post">
              @csrf
              @if ($edit_testimonial)
                @method('PUT')
              @endif
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="customer_name" placeholder="Nama pelanggan" value="{{ old('customer_name', $edit_testimonial['customer_name'] ?? '') }}" required />
                </div>
              </div>
              <div class="field">
                <textarea name="content" rows="3" placeholder="Pesan testimoni" required>{{ old('content', $edit_testimonial['content'] ?? '') }}</textarea>
              </div>
              <div class="form-actions" style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
                <button class="btn btn-primary" type="submit">{{ $edit_testimonial ? 'Perbarui testimoni' : 'Simpan testimoni' }}</button>
                @if ($edit_testimonial)
                  <a class="btn btn-ghost" href="{{ route('admin.dashboard') }}#testimonials">Batal</a>
                @endif
              </div>
            </form>
          </section>

          <section class="admin-section" id="settings" data-api="/admin/settings">
            <h3>Company Settings</h3>
            <p>Data global yang tampil di header, footer, dan halaman kontak.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama Perusahaan</th>
                    <th>Nomor Telepon</th>
                    <th>Link WhatsApp</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Link Map Embed</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Nama Perusahaan">Rodeo Laundry</td>
                    <td data-label="Nomor Telepon">08123456789</td>
                    <td data-label="Link WhatsApp">https://wa.me/628123456789</td>
                    <td data-label="Email">hello@rodeolaundry.com</td>
                    <td data-label="Alamat">Jl. Contoh No. 123</td>
                    <td data-label="Link Map">https://www.google.com/maps?q=Batu%2C%20Sumberejo%2C%20Gg.%20Rodeo&output=embed</td>
                    <td data-label="Aksi">
                      <a class="admin-action-btn" href="/admin/settings/1/edit">Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="/admin/settings" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="company_name" placeholder="Nama perusahaan" required />
                </div>
                <div class="field">
                  <input
                    type="tel"
                    name="phone"
                    placeholder="Nomor Telepon"
                    inputmode="numeric"
                    pattern="[0-9+()\s-]+"
                    title="Gunakan angka dan simbol +() - saja"
                    required
                  />
                </div>
                <div class="field">
                  <input type="url" name="whatsapp_link" placeholder="Link WhatsApp (https://wa.me/...)" required />
                </div>
                <div class="field">
                  <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    pattern=".+@.+"
                    title="Masukkan email yang valid"
                    required
                  />
                </div>
                <div class="field"><input type="text" name="address" placeholder="Alamat" required /></div>
                <div class="field">
                  <textarea name="map_embed" rows="1" placeholder="Link Map Embed (Kode iframe)" required></textarea>
                </div>
              </div>
              <div class="field">
                <textarea name="seo_description" rows="3" placeholder="Deskripsi SEO"></textarea>
              </div>
              <button class="btn btn-primary" type="submit">Simpan settings</button>
            </form>
          </section>

          <section class="admin-section" id="hours" data-api="/admin/operating-hours">
            <h3>Jam Operasional</h3>
            <p>Kelola jadwal buka dan tutup.</p>
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
                    <td data-label="Hari">Senin</td>
                    <td data-label="Jam buka">09:00</td>
                    <td data-label="Jam tutup">19:00</td>
                    <td data-label="Status"><span class="status-tag">Buka</span></td>
                    <td data-label="Aksi">
                      <a class="admin-action-btn" href="/admin/operating-hours/1/edit">Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <form class="hero-form" action="/admin/operating-hours" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <select name="day" required>
                    <option value="">Pilih Hari</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                  </select>
                </div>
                <div class="field">
                  <input type="time" name="open_time" required />
                </div>
                <div class="field">
                  <input type="time" name="close_time" required />
                </div>
                <div class="field">
                  <select name="is_closed" required>
                    <option value="">Status</option>
                    <option value="0">Buka</option>
                    <option value="1">Tutup</option>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary" type="submit">Simpan jam operasional</button>
            </form>
          </section>

        </div>
      </main>
    </div>

    <script src="{{ asset('asset/js/main.js') }}"></script>

    <div id="logout-modal" onclick="if(event.target===this) modal.style.display='none'">
      <div class="logout-card">
        <h3>Konfirmasi Logout</h3>
        <p>Yakin ingin keluar dari dashboard admin?</p>
        <div class="logout-actions">
          <button class="btn btn-ghost" onclick="modal.style.display='none'">Batal</button>
          <button class="btn btn-primary" onclick="document.getElementById('logout-form').submit()">Ya, Logout</button>
        </div>
      </div>
    </div>

    <script>
      const modal = document.getElementById('logout-modal');
      function confirmLogout() { modal.style.display = 'flex'; }
    </script>
  </body>
</html>
