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
          <button class="admin-menu-btn" type="button" data-admin-menu-close aria-label="Close menu">
            <i class="fas fa-times"></i>
          </button>
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
          <button class="admin-menu-btn" type="button" data-admin-menu-toggle aria-label="Toggle menu" aria-expanded="false">
            <i class="fas fa-bars"></i>
          </button>
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
                <h3>Ringkasan</h3>
                <span class="admin-chip">Total Data</span>
              </div>
              <div class="admin-kpis">
                <div class="admin-kpi">
                  <p class="stat-value">{{ $popular_services->count() }}</p>
                  <p class="stat-label">Layanan populer</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">{{ $stats['total_categories'] }}</p>
                  <p class="stat-label">Layanan tersedia</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">{{ $stats['total_faq'] }}</p>
                  <p class="stat-label">FAQ aktif</p>
                </div>
              </div>
            </div>
          </section>

          <section class="admin-section" id="services" data-api="/admin/service-categories">
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
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                  <tr>
                    <td data-label="Kategori">{{ $category->category }}</td>
                    <td data-label="Produk">{{ $category->product ?? '-' }}</td>
                    <td data-label="Satuan">{{ $category->unit ?? '-' }}</td>
                    <td data-label="Harga">Rp{{ number_format($category->base_price, 0, ',', '.') }}</td>
                    <td data-label="Tipe">{{ $category->serviceType->name ?? '-' }}</td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <a class="admin-action-btn" href="javascript:void(0)" onclick="editServiceCategory({{ $category->id }}, {{ json_encode($category->category) }}, {{ json_encode($category->product) }}, {{ json_encode($category->unit) }}, {{ $category->base_price - ($category->serviceType->additional_cost ?? 0) }}, {{ json_encode($category->service_type_id) }}, {{ json_encode($category->description) }})">Edit</a>
                        <form action="{{ route('admin.service-categories.destroy', $category->id) }}" method="post" data-confirm="Hapus layanan ini?">
                          @csrf
                          @method('DELETE')
                          <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <form class="hero-form" id="form-service-categories" action="{{ route('admin.service-categories.store') }}" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="category" placeholder="Kategori" required />
                </div>
                <div class="field">
                  <input type="text" name="product" placeholder="Nama produk" />
                </div>
                <div class="field">
                  <select name="unit" required>
                    <option value="">Satuan</option>
                    <option value="/kg">/kg</option>
                    <option value="/pcs">/pcs</option>
                    <option value="/meter">/meter</option>
                  </select>
                </div>
                <div class="field">
                  <input type="number" name="base_price" placeholder="Harga" min="0" required />
                </div>
                <div class="field">
                  <select name="service_type_id" required>
                    <option value="">Tipe layanan</option>
                    @foreach($service_types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="field">
                <textarea name="description" rows="3" placeholder="Deskripsi singkat"></textarea>
              </div>
              <div style="display: flex; gap: 12px;">
                <button class="btn btn-primary" type="submit">Simpan layanan</button>
                <button class="btn btn-ghost" type="button" id="cancel-edit-service-categories" style="display: none;" onclick="cancelEditServiceCategory()">Batal Edit</button>
              </div>
            </form>
          </section>

          <section class="admin-section" id="popular-services" data-api="/admin/popular-services">
            <h3>Layanan Populer</h3>
            <p>Tentukan layanan mana yang akan ditampilkan sebagai layanan populer di beranda.</p>
            <div style="margin-bottom: 1rem;">
              <button class="btn btn-primary" type="button" onclick="document.getElementById('popular-modal').style.display='flex'">Tambah Layanan Populer</button>
            </div>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($popular_services as $service)
                  <tr>
                    <td data-label="Kategori">{{ $service->category }}</td>
                    <td data-label="Produk">{{ $service->product ?? '-' }}</td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <form action="{{ route('admin.service-categories.toggle-popular', $service->id) }}" method="post" data-confirm="Hapus layanan ini dari daftar populer?">
                          @csrf
                          <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="3" style="text-align: center;">Belum ada layanan populer</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </section>

          <section class="admin-section" id="service-types" data-api="/admin/service-types">
            <h3>Tipe Layanan</h3>
            <p>Kelola tipe layanan seperti reguler, express, premium.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Estimasi Durasi</th>
                    <th>Biaya Tambahan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($service_types as $type)
                  <tr>
                    <td data-label="Nama">{{ $type->name }}</td>
                    <td data-label="Estimasi Durasi">{{ $type->estimated_duration ?? '-' }}</td>
                    <td data-label="Biaya Tambahan">Rp{{ number_format($type->additional_cost, 0, ',', '.') }}</td>
                    <td data-label="Deskripsi">{{ $type->description }}</td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <a class="admin-action-btn" href="javascript:void(0)" onclick="editServiceType({{ $type->id }}, {{ json_encode($type->name) }}, {{ json_encode($type->estimated_duration) }}, {{ $type->additional_cost }}, {{ json_encode($type->description) }})">Edit</a>
                        <form action="{{ route('admin.service-types.destroy', $type->id) }}" method="post" data-confirm="Hapus tipe layanan ini?">
                          @csrf
                          @method('DELETE')
                          <button class="admin-action-btn is-danger" type="submit">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <form class="hero-form" id="form-service-types" action="{{ route('admin.service-types.store') }}" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="name" placeholder="Nama tipe" required />
                </div>
                <div class="field">
                  <input type="text" name="estimated_duration" placeholder="Estimasi Durasi (misal: 3 Hari)" />
                </div>
                <div class="field">
                  <input type="number" name="additional_cost" placeholder="Biaya tambahan" min="0" />
                </div>
              </div>
              <div class="field">
                <textarea name="description" rows="3" placeholder="Deskripsi"></textarea>
              </div>
              <div style="display: flex; gap: 12px;">
                <button class="btn btn-primary" type="submit">Simpan tipe</button>
                <button class="btn btn-ghost" type="button" id="cancel-edit-service-types" style="display: none;" onclick="cancelEditServiceType()">Batal Edit</button>
              </div>
            </form>
          </section>

          <section class="admin-section" id="faq" data-api="/admin/faq">
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
                  <tr>
                    <td data-label="Pertanyaan">Berapa lama proses cuci?</td>
                    <td data-label="Jawaban">Proses cuci reguler memakan waktu 3 hari.</td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <a class="admin-action-btn" href="/admin/faq/1/edit">Edit</a>
                        <form action="/admin/faq/1" method="post" data-confirm="Hapus FAQ ini?">
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
            <form class="hero-form" action="/admin/faq" method="post">
              @csrf
              <div class="field">
                <input type="text" name="question" placeholder="Pertanyaan" required />
              </div>
              <div class="field">
                <textarea name="answer" rows="3" placeholder="Jawaban" required></textarea>
              </div>
              <button class="btn btn-primary" type="submit">Simpan FAQ</button>
            </form>
          </section>

          <section class="admin-section" id="testimonials" data-api="/admin/testimonials">
            <h3>Testimoni</h3>
            <p>Kelola testimoni pelanggan yang tampil di beranda.</p>
            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-label="Nama">Rina P.</td>
                    <td data-label="Pesan">Pengerjaan cepat dan rapi.</td>
                    <td data-label="Status"><span class="status-tag">Aktif</span></td>
                    <td data-label="Aksi">
                      <div class="admin-table-actions">
                        <a class="admin-action-btn" href="/admin/testimonials/1/edit">Edit</a>
                        <form action="/admin/testimonials/1" method="post" data-confirm="Hapus testimoni ini?">
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
            <form class="hero-form" action="/admin/testimonials" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="name" placeholder="Nama pelanggan" required />
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
                <textarea name="message" rows="3" placeholder="Pesan testimoni" required></textarea>
              </div>
              <button class="btn btn-primary" type="submit">Simpan testimoni</button>
            </form>
          </section>

          <section class="admin-section" id="settings">
            <h3>Company Settings</h3>
            <p>Data global yang tampil di header, footer, dan halaman kontak. Karena hanya ada satu data, silakan langsung edit nilainya di bawah ini.</p>

            <form class="hero-form" id="form-company-settings" action="{{ route('admin.settings.update') }}" method="post" style="margin-top: 1.5rem;">
              @csrf
              @method('PUT')
              <div class="form-grid">

                <div class="field">
                  <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Nomor Telepon</label>
                  <input
                    type="tel"
                    name="phone"
                    placeholder="Nomor Telepon"
                    inputmode="numeric"
                    pattern="[0-9+()\s-]+"
                    title="Gunakan angka dan simbol +() - saja"
                    value="{{ $company_settings->phone ?? '' }}"
                    required
                    disabled
                  />
                </div>
                <div class="field">
                  <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Link WhatsApp</label>
                  <input type="url" name="whatsapp_link" placeholder="Link WhatsApp (https://wa.me/...)" value="{{ $company_settings->whatsapp_link ?? '' }}" required disabled />
                </div>
                <div class="field">
                  <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Email</label>
                  <input
                    type="email"
                    name="email"
                    placeholder="Email"
                    pattern=".+@.+"
                    title="Masukkan email yang valid"
                    value="{{ $company_settings->email ?? '' }}"
                    required
                    disabled
                  />
                </div>
                <div class="field">
                  <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Alamat</label>
                  <input type="text" name="address" placeholder="Alamat" value="{{ $company_settings->address ?? '' }}" required disabled />
                </div>
              </div>
              <div class="field">
                <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Link Map Embed (Kode Iframe)</label>
                <textarea name="map_embed" rows="3" placeholder="Link Map Embed (Kode iframe)" required disabled>{{ $company_settings->map_embed ?? '' }}</textarea>
              </div>
              <div class="field">
                <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Deskripsi SEO</label>
                <textarea name="seo_description" rows="3" placeholder="Deskripsi SEO" disabled>{{ $company_settings->seo_description ?? '' }}</textarea>
              </div>
              <div style="display: flex; gap: 12px;">
                <button class="btn btn-primary" type="button" id="btn-edit-settings" onclick="editCompanySettings()">Edit Settings</button>
                <button class="btn btn-primary" type="submit" id="btn-save-settings" style="display: none;">Update Settings</button>
                <button class="btn btn-ghost" type="button" id="btn-cancel-settings" style="display: none;" onclick="cancelEditCompanySettings()">Batal Edit</button>
              </div>
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
      <div class="admin-sidebar-backdrop" data-admin-backdrop></div>
    </div>

    <script src="{{ asset('asset/js/main.js') }}"></script>

    <div id="logout-modal" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0, 0, 0, 0.4); align-items: center; justify-content: center;" onclick="if(event.target===this) this.style.display='none'">
      <div class="logout-card">
        <h3>Konfirmasi Logout</h3>
        <p>Yakin ingin keluar dari dashboard admin?</p>
        <div class="logout-actions">
          <button class="btn btn-ghost" onclick="document.getElementById('logout-modal').style.display='none'">Batal</button>
          <button class="btn btn-primary" onclick="document.getElementById('logout-form').submit()">Ya, Logout</button>
        </div>
      </div>
    </div>

    <div id="delete-modal" onclick="if(event.target===this) document.getElementById('delete-modal').style.display='none'" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0, 0, 0, 0.4); align-items: center; justify-content: center;">
      <div class="logout-card">
        <h3>Konfirmasi Hapus</h3>
        <p id="delete-modal-text">Yakin ingin menghapus data ini?</p>
        <div class="logout-actions">
          <button class="btn btn-ghost" onclick="document.getElementById('delete-modal').style.display='none'">Batal</button>
          <button class="btn btn-primary" style="background: #d64545; border-color: #d64545;" onclick="submitDeleteForm()">Ya, Hapus</button>
        </div>
      </div>
    </div>


    <div id="popular-modal" onclick="if(event.target===this) this.style.display='none'" style="display: none; position: fixed; inset: 0; z-index: 9999; background: rgba(0,0,0,0.6); align-items: center; justify-content: center; padding: 1rem;">
      <div style="background: #141312; color: #f5f2ee; border: 1px solid rgba(255,255,255,0.1); border-radius: 14px; padding: 1.5rem; width: 100%; max-width: 480px; max-height: 80vh; display: flex; flex-direction: column; gap: 1rem;">

        <div style="display: flex; align-items: center; justify-content: space-between;">
          <h3 style="margin: 0; font-size: 1rem; font-weight: 600; color: #ffffff;">Tambah Layanan Populer</h3>
          <button onclick="document.getElementById('popular-modal').style.display='none'; document.getElementById('popular-search-input').value=''; filterPopularSearch('');" style="background: none; border: none; cursor: pointer; font-size: 1.4rem; color: rgba(255,255,255,0.5); line-height: 1; padding: 0;">&times;</button>
        </div>

        <input
          type="text"
          id="popular-search-input"
          placeholder="Cari layanan..."
          oninput="filterPopularSearch(this.value)"
          style="width: 100%; padding: 0.55rem 0.85rem; border: 1px solid rgba(255,255,255,0.12); border-radius: 8px; background: rgba(255,255,255,0.06); color: #f5f2ee; font-size: 0.875rem; box-sizing: border-box; outline: none;"
          autofocus
        />

        <div id="popular-search-results" style="overflow-y: auto; flex: 1; display: flex; flex-direction: column; gap: 0.4rem;">
          @forelse($categories->where('is_popular', false) as $cat)
          <div
            data-search="{{ strtolower($cat->category . ' ' . ($cat->product ?? '') . ' ' . ($cat->serviceType->name ?? '')) }}"
            style="display: flex; align-items: center; justify-content: space-between; padding: 0.6rem 0.75rem; border-radius: 8px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.04); gap: 0.75rem;"
          >
            <div style="min-width: 0;">
              <p style="margin: 0; font-size: 0.875rem; font-weight: 500; color: #ffffff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $cat->category }}{{ $cat->product ? ' – ' . $cat->product : '' }}</p>
              <p style="margin: 0; font-size: 0.75rem; color: rgba(255,255,255,0.5);">{{ $cat->serviceType->name ?? 'Tanpa tipe' }} · Rp{{ number_format($cat->base_price, 0, ',', '.') }}</p>
            </div>
            <form action="{{ route('admin.service-categories.toggle-popular', $cat->id) }}" method="post" style="flex-shrink: 0;">
              @csrf
              <button class="btn btn-primary" type="submit" style="padding: 0.35rem 0.85rem; font-size: 0.8rem;">Pilih</button>
            </form>
          </div>
          @empty
          <p style="text-align: center; color: rgba(255,255,255,0.4); font-size: 0.875rem; margin: 1rem 0;">Semua layanan sudah menjadi populer.</p>
          @endforelse
        </div>

      </div>
    </div>

  </body>
</html>
