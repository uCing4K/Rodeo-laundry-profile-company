<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tentang Kami - Rodeo Laundry</title>
    <meta
      name="description"
      content="Mengenal Rodeo Laundry, visi, misi, nilai, dan perjalanan kami."
    />
    <meta property="og:title" content="Tentang Rodeo Laundry" />
    <meta
      property="og:description"
      content="Rodeo Laundry fokus pada kebersihan, ketepatan waktu, dan layanan pelanggan terbaik."
    />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
  </head>
  <body>
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    <header class="site-header">
      <div class="container header-inner">
        <a class="logo" href="{{ route('index') ?? '/' }}">
          <img src="{{ asset('Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
          <span>Rodeo Laundry</span>
        </a>

        <nav class="site-nav" id="site-menu" data-menu-panel>
          <a href="{{ route('index') ?? '/' }}">Beranda</a>
          <a href="{{ route('services') ?? '/services' }}">Layanan</a>
          <a href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a>
          <a class="is-active" href="{{ route('about') ?? '/about' }}">Tentang</a>
          <a href="{{ route('contact') ?? '/contact' }}">Kontak</a>
          <a href="{{ route('faq') ?? '/faq' }}">FAQ</a>
          <div class="nav-mobile-cta">
            <a class="btn btn-primary" href="https://wa.me/6282143297707">WhatsApp</a>
            <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a>
          </div>
        </nav>

        <div class="header-cta">
          <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a>
          <a class="btn btn-primary" href="https://wa.me/6282143297707">WhatsApp</a>
        </div>

        <button
          class="menu-toggle"
          type="button"
          data-menu-toggle
          aria-controls="site-menu"
          aria-expanded="false"
        >
          Menu
        </button>
      </div>
    </header>

    <main id="main-content">
      <section class="hero">
        <div class="container hero-grid">
          <div data-reveal style="--reveal-delay: 0ms;">
            <div class="eyebrow">Tentang kami</div>
            <h1>Rodeo Laundry hadir untuk menjawab kebutuhan laundry modern.</h1>
            <p>
              Kami berkomitmen memberikan layanan yang konsisten, cepat, dan
              selalu mengutamakan kenyamanan pelanggan.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="{{ route('services') ?? '/services' }}">Lihat layanan</a>
              <a class="btn btn-ghost" href="{{ route('contact') ?? '/contact' }}">Hubungi kami</a>
            </div>
          </div>
          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Cerita singkat</span>
            <h3>Berawal dari kebutuhan lokal.</h3>
            <p>
              Rodeo Laundry mulai melayani pelanggan di Batu dan sekitarnya sejak
              2020 dengan fokus pada kualitas dan kecepatan.
            </p>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container grid-2">
          <div data-reveal style="--reveal-delay: 0ms;">
            <div class="eyebrow">Cerita Rodeo</div>
            <h2 class="section-title">Dibangun dari kepercayaan pelanggan.</h2>
            <p>
              Sejak awal, Rodeo Laundry fokus pada kualitas proses, komunikasi
              yang jelas, dan layanan yang ramah. Kami melayani pelanggan rumah
              tangga hingga bisnis lokal dengan kebutuhan laundry skala besar.
            </p>
            <p>
              Dengan sistem POS internal, kami memastikan setiap pesanan tercatat
              rapi agar pelanggan bisa tracking status kapan saja.
            </p>
          </div>
          <div class="card" data-reveal style="--reveal-delay: 120ms;">
            <h3>Nilai inti kami</h3>
            <ul>
              <li>Bersih dan rapi di setiap proses.</li>
              <li>Tepat waktu sesuai estimasi.</li>
              <li>Komunikasi ramah dan responsif.</li>
              <li>Transparan dalam harga dan layanan.</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Visi dan misi</div>
            <h2 class="section-title">Arah kami untuk melayani pelanggan.</h2>
          </div>
          <div class="grid-2">
            <div class="card card-soft" data-reveal style="--reveal-delay: 0ms;">
              <h3>Visi</h3>
              <p>
                Menjadi layanan laundry pilihan utama yang terpercaya di Batu dan
                sekitarnya.
              </p>
            </div>
            <div class="card card-soft" data-reveal style="--reveal-delay: 120ms;">
              <h3>Misi</h3>
              <p>
                Memberikan layanan laundry berkualitas tinggi dengan harga
                terjangkau dan pelayanan pelanggan terbaik.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-alt" data-api="/api/public/settings">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Angka utama</div>
            <h2 class="section-title">Pertumbuhan Rodeo Laundry.</h2>
          </div>
          <div class="grid-4">
            <div class="card" data-reveal style="--reveal-delay: 0ms;">
              <h3>5.000+</h3>
              <p>Total pesanan selesai</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 80ms;">
              <h3>1.000+</h3>
              <p>Pelanggan terdaftar</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 160ms;">
              <h3>15+</h3>
              <p>Kategori layanan</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 240ms;">
              <h3>2020</h3>
              <p>Tahun berdiri</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Tim kami</div>
            <h2 class="section-title">Pelayanan ramah di setiap tahap.</h2>
          </div>
          <div class="grid-3">
            <div class="card" data-reveal style="--reveal-delay: 0ms;">
              <h3>Customer Service</h3>
              <p>Respons cepat untuk konsultasi dan tracking pesanan.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 80ms;">
              <h3>Tim Operasional</h3>
              <p>Menangani proses cuci, setrika, dan quality control.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 160ms;">
              <h3>Logistik</h3>
              <p>Memastikan pesanan siap diantar atau diambil tepat waktu.</p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="container footer-grid">
        <div>
          <div class="logo">
            <img src="{{ asset('Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
            <span>Rodeo Laundry</span>
          </div>
          <p>
            Layanan laundry profesional dengan proses cepat dan hasil bersih.
          </p>
        </div>
        <div>
          <h3>Menu</h3>
          <ul>
            <li><a href="{{ route('index') ?? '/' }}">Beranda</a></li>
            <li><a href="{{ route('services') ?? '/services' }}">Layanan</a></li>
            <li><a href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a></li>
            <li><a href="{{ route('about') ?? '/about' }}">Tentang</a></li>
            <li><a href="{{ route('contact') ?? '/contact' }}">Kontak</a></li>
            <li><a href="{{ route('faq') ?? '/faq' }}">FAQ</a></li>
          </ul>
        </div>
        <div>
          <h3>Kontak</h3>
          <ul>
            <li>Batu, Sumberejo, Gg. Rodeo</li>
            <li><a href="tel:+6282143297707">+62 821-4329-7707</a></li>
            <li><a href="mailto:info@rodeolaundry.my.id">info@rodeolaundry.my.id</a></li>
            <li>Jam operasional: 09:00 - 19:00</li>
          </ul>
        </div>
      </div>
      <div class="container footer-bottom">
        <p>Copyright 2026 Rodeo Laundry. All rights reserved.</p>
      </div>
    </footer>

    <div class="floating-buttons">
      <a class="fab" href="tel:+6282143297707" aria-label="Telepon Rodeo Laundry">Call</a>
      <a class="fab" href="https://wa.me/6282143297707" aria-label="WhatsApp Rodeo Laundry">WA</a>
    </div>

    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>
