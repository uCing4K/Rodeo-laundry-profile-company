<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lokasi dan Kontak - Rodeo Laundry</title>
    <meta
      name="description"
      content="Alamat, kontak, dan jam operasional Rodeo Laundry di Batu, Sumberejo."
    />
    <meta property="og:title" content="Lokasi Rodeo Laundry" />
    <meta
      property="og:description"
      content="Temukan lokasi Rodeo Laundry dan hubungi kami untuk pemesanan."
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
          <a href="{{ route('about') ?? '/about' }}">Tentang</a>
          <a class="is-active" href="{{ route('contact') ?? '/contact' }}">Kontak</a>
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
            <div class="eyebrow">Lokasi dan kontak</div>
            <h1>Kunjungi atau hubungi Rodeo Laundry.</h1>
            <p>
              Kami berlokasi di Batu, Sumberejo. Hubungi kami untuk pemesanan atau
              informasi layanan.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="https://wa.me/6282143297707">Chat WhatsApp</a>
              <a class="btn btn-ghost" href="tel:+6282143297707">Telepon langsung</a>
            </div>
          </div>
          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Info cepat</span>
            <h3>Jam operasional</h3>
            <p>Senin - Minggu, pukul 09:00 - 19:00 WIB.</p>
            <div class="hero-stats">
              <div class="stat">
                <div class="stat-value">WA aktif</div>
                <div class="stat-label">Respon cepat</div>
              </div>
              <div class="stat">
                <div class="stat-value">Lokasi</div>
                <div class="stat-label">Batu, Sumberejo</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-alt" data-api="/api/public/settings">
        <div class="container grid-2">
          <div class="card" data-reveal style="--reveal-delay: 0ms;">
            <h3>Kontak utama</h3>
            <ul>
              <li><strong>Alamat:</strong> Batu, Sumberejo, Gg. Rodeo</li>
              <li><strong>Telepon:</strong> <a href="tel:+6282143297707">+62 821-4329-7707</a></li>
              <li><strong>WhatsApp:</strong> <a href="https://wa.me/6282143297707">Chat sekarang</a></li>
              <li><strong>Email:</strong> <a href="mailto:info@rodeolaundry.my.id">info@rodeolaundry.my.id</a></li>
            </ul>
          </div>
          <div class="card" data-reveal style="--reveal-delay: 120ms;">
            <h3>Google Maps</h3>
            <div class="map-frame">
              <iframe
                title="Lokasi Rodeo Laundry"
                src="https://www.google.com/maps?q=Batu%2C%20Sumberejo%2C%20Gg.%20Rodeo&output=embed"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
              ></iframe>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Jam operasional</div>
            <h2 class="section-title">Waktu layanan Rodeo Laundry.</h2>
          </div>
          <div class="table-wrapper" data-reveal>
            <table class="table">
              <thead>
                <tr>
                  <th>Hari</th>
                  <th>Jam</th>
                </tr>
              </thead>
              <tbody>
                <tr><td>Senin</td><td>09:00 - 19:00 WIB</td></tr>
                <tr><td>Selasa</td><td>09:00 - 19:00 WIB</td></tr>
                <tr><td>Rabu</td><td>09:00 - 19:00 WIB</td></tr>
                <tr><td>Kamis</td><td>09:00 - 19:00 WIB</td></tr>
                <tr><td>Jumat</td><td>09:00 - 19:00 WIB</td></tr>
                <tr><td>Sabtu</td><td>08:00 - 20:00 WIB</td></tr>
                <tr><td>Minggu</td><td>09:00 - 19:00 WIB</td></tr>
              </tbody>
            </table>
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
