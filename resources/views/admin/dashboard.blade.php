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
                  @forelse ($faqs as $faq)
                    <tr>
                      <td data-label="Pertanyaan">{{ $faq->question }}</td>
                      <td data-label="Jawaban">{{ \Illuminate\Support\Str::limit($faq->answer, 80) }}</td>
                      <td data-label="Aksi">
                        <div class="admin-table-actions">
                          <a class="admin-action-btn edit-faq-button" href="javascript:void(0)" data-id="{{ $faq->id }}" data-question="{{ e($faq->question) }}" data-answer="{{ e($faq->answer) }}">Edit</a>
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
            <form class="hero-form" id="faq-form" action="{{ route('admin.faqs.store') }}" method="post">
              @csrf
              <div class="field">
                <input type="text" name="question" placeholder="Pertanyaan" value="{{ old('question') }}" required />
              </div>
              <div class="field">
                <textarea name="answer" rows="3" placeholder="Jawaban" required>{{ old('answer') }}</textarea>
              </div>
              <div class="form-actions" id="faq-form-actions" style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
                <button class="btn btn-primary" type="submit" id="faq-submit-button">Simpan FAQ</button>
              </div>
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
                          <a class="admin-action-btn edit-testimonial-button" href="javascript:void(0)" data-id="{{ $testimonial->id }}" data-name="{{ e($testimonial->customer_name) }}" data-content="{{ e($testimonial->content) }}">Edit</a>
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
            <form class="hero-form" id="testimonial-form" action="{{ route('admin.testimonials.store') }}" method="post">
              @csrf
              <div class="form-grid">
                <div class="field">
                  <input type="text" name="customer_name" placeholder="Nama pelanggan" value="{{ old('customer_name') }}" required />
                </div>
              </div>
              <div class="field">
                <textarea name="content" rows="3" placeholder="Pesan testimoni" required>{{ old('content') }}</textarea>
              </div>
              <div class="form-actions" id="testimonial-form-actions" style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
                <button class="btn btn-primary" type="submit" id="testimonial-submit-button">Simpan testimoni</button>
              </div>
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
                <div class="field">
                  <label style="display:block; margin-bottom:0.5rem; font-size:14px; font-weight:500;">Link Map Embed (Kode Iframe)</label>
                  <textarea name="map_embed" rows="1" placeholder="Link Map Embed (Kode iframe)" required disabled>{{ $company_settings->map_embed ?? '' }}</textarea>
                </div>
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

  </body>
</html>
