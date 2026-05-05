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
            <img src="{{ asset('asset/Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
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
              <p class="admin-user-name">{{ Auth::user()->name ?? 'Admin' }}</p>
              <p class="admin-user-role">{{ Auth::user()->role ?? 'Owner' }}</p>
            </div>
          </div>
          <form method="POST" action="{{ route('admin.logout') }}" style="width: 100%;">
            @csrf
            <button class="btn btn-ghost" type="submit" style="width: 100%;">Logout</button>
          </form>
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
            <a class="btn btn-ghost" href="{{ url('/') }}" target="_blank">Preview Website</a>
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
                <a class="btn btn-primary" href="#services">Kelola Layanan</a>
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
                    <p class="admin-hero-item-title">Order hari ini</p>
                    <p class="admin-hero-item-meta">Pesanan masuk hari ini</p>
                  </div>
                  <span class="admin-hero-item-value">{{ $stats['orders_today'] }}</span>
                </div>
                <div class="admin-hero-item">
                  <div>
                    <p class="admin-hero-item-title">Produk aktif</p>
                    <p class="admin-hero-item-meta">Total layanan tersedia</p>
                  </div>
                  <span class="admin-hero-item-value">{{ $stats['total_products'] }}</span>
                </div>
                <div class="admin-hero-item">
                  <div>
                    <p class="admin-hero-item-title">Kategori</p>
                    <p class="admin-hero-item-meta">Kategori layanan aktif</p>
                  </div>
                  <span class="admin-hero-item-value">{{ $stats['total_categories'] }}</span>
                </div>
              </div>
            </div>
          </section>

          <section class="admin-grid">
            <div class="admin-card">
              <div class="admin-card-head">
                <h3>Ringkasan KPI</h3>
                <span class="admin-chip">Live</span>
              </div>
              <div class="admin-kpis">
                <div class="admin-kpi">
                  <p class="stat-value">{{ $stats['total_categories'] }}</p>
                  <p class="stat-label">Kategori layanan</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">{{ $stats['total_products'] }}</p>
                  <p class="stat-label">Produk aktif</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">{{ $stats['orders_today'] }}</p>
                  <p class="stat-label">Order hari ini</p>
                </div>
                <div class="admin-kpi">
                  <p class="stat-value">{{ $stats['total_faq'] }}</p>
                  <p class="stat-label">FAQ aktif</p>
                </div>
              </div>
            </div>
            <div class="admin-card">
              <div class="admin-card-head">
                <h3>Order Terbaru</h3>
                <a class="admin-card-link" href="#orders">Lihat semua</a>
              </div>
              <div class="admin-activity">
                @forelse ($recent_orders as $order)
                  <div class="admin-activity-item">
                    <div>
                      <p class="admin-activity-title">{{ $order->order_number }}</p>
                      <p class="admin-activity-meta">
                        {{ $order->customer_name ?? ($order->customer->name ?? '-') }} — {{ ucfirst($order->status) }}
                      </p>
                    </div>
                    <span class="admin-pill">{{ $order->created_at->format('H:i') }}</span>
                  </div>
                @empty
                  <p style="padding:12px 0;color:var(--text-muted,#888)">Belum ada order.</p>
                @endforelse
              </div>
            </div>
          </section>

          <section class="admin-section" id="services">
            <h3>Layanan dan Harga</h3>
            <p>Kelola daftar produk layanan yang tampil di website.</p>

            @if (session('success'))
              <div class="note-block" style="background:var(--success-bg,#e6f9ee);border-color:var(--success,#22c55e);">
                {{ session('success') }}
              </div>
            @endif

            <div class="table-wrapper">
              <table class="admin-table">
                <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Produk</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($products as $product)
                    <tr>
                      <td>{{ $product->category->name ?? '-' }}</td>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->unit }}</td>
                      <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                      <td>
                        <span class="status-tag {{ $product->is_active ? '' : 'inactive' }}">
                          {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                        </span>
                      </td>
                      <td style="display:flex;gap:8px;">
                        <button class="btn btn-ghost" type="button" style="padding:4px 10px;font-size:.8rem;"
                          onclick="editProduct({{ $product->id }},
                            '{{ addslashes($product->name) }}',
                            '{{ $product->category_id }}',
                            '{{ addslashes($product->unit) }}',
                            '{{ $product->price }}',
                            '{{ (int)$product->is_active }}',
                            '{{ addslashes($product->description ?? '') }}')">Edit</button>
                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                          onsubmit="return confirm('Hapus layanan ini?')" style="margin:0">
                          @csrf @method('DELETE')
                          <button class="btn btn-ghost" type="submit"
                            style="padding:4px 10px;font-size:.8rem;color:#ef4444;">Hapus</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" style="text-align:center;padding:16px;color:var(--text-muted,#888)">
                        Belum ada layanan. Tambahkan lewat form di bawah.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            <form class="hero-form" id="product-form"
              method="POST" action="{{ route('admin.products.store') }}">
              @csrf
              <input type="hidden" name="_method" id="product-method" value="POST">
              <input type="hidden" name="product_id" id="product-id" value="">

              <h4 id="product-form-title" style="margin-bottom:12px;">Tambah Layanan Baru</h4>

              <div class="form-grid">
                <div class="field">
                  <label>Nama Produk</label>
                  <input type="text" name="name" id="field-name"
                    placeholder="Nama produk" required />
                </div>
                <div class="field">
                  <label>Kategori</label>
                  <select name="category_id" id="field-category" required>
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="field">
                  <label>Satuan</label>
                  <input type="text" name="unit" id="field-unit"
                    placeholder="kg / pcs / meter" required />
                </div>
                <div class="field">
                  <label>Harga (Rp)</label>
                  <input type="number" name="price" id="field-price"
                    placeholder="Harga" min="0" required />
                </div>
                <div class="field">
                  <label>Status</label>
                  <select name="is_active" id="field-status">
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                  </select>
                </div>
              </div>

              <div class="field">
                <label>Deskripsi</label>
                <textarea rows="3" name="description" id="field-description"
                  placeholder="Deskripsi singkat (opsional)"></textarea>
              </div>

              <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <button class="btn btn-primary" type="submit" id="product-submit-btn">
                  Simpan Layanan
                </button>
                <button class="btn btn-ghost" type="button" id="product-cancel-btn"
                  style="display:none" onclick="resetProductForm()">
                  Batal
                </button>
              </div>
            </form>
          </section>

          <script>
            const productForm    = document.getElementById('product-form');
            const productMethod  = document.getElementById('product-method');
            const productId = document.getElementById('product-id');
            const formTitle = document.getElementById('product-form-title');
            const submitBtn = document.getElementById('product-submit-btn');
            const cancelBtn = document.getElementById('product-cancel-btn');

            function editProduct(id, name, categoryId, unit, price, isActive, description) {
              formTitle.textContent = 'Edit Layanan';
              productMethod.value  = 'PUT';
              productForm.action = '/admin/products/' + id;
              productId.value = id;

              document.getElementById('field-name').value = name;
              document.getElementById('field-category').value = categoryId;
              document.getElementById('field-unit').value = unit;
              document.getElementById('field-price').value = price;
              document.getElementById('field-status').value = isActive;
              document.getElementById('field-description').value = description;

              submitBtn.textContent = 'Update Layanan';
              cancelBtn.style.display = 'inline-flex';
              productForm.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }

            function resetProductForm() {
              formTitle.textContent = 'Tambah Layanan Baru';
              productMethod.value  = 'POST';
              productForm.action = '{{ route("admin.products.store") }}';
              productId.value  = '';
              productForm.reset();
              submitBtn.textContent   = 'Simpan Layanan';
              cancelBtn.style.display = 'none';
            }
          </script>

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
