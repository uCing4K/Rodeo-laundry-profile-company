<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FAQ - Rodeo Laundry</title>
    <meta
      name="description"
      content="Pertanyaan yang sering diajukan tentang layanan Rodeo Laundry."
    />
    <meta property="og:title" content="FAQ Rodeo Laundry" />
    <meta
      property="og:description"
      content="Jawaban cepat untuk pertanyaan umum seputar layanan laundry." />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
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
          <a href="{{ route('contact') ?? '/contact' }}">Kontak</a>
          <a class="is-active" href="{{ route('faq') ?? '/faq' }}">FAQ</a>
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
            <div class="eyebrow">FAQ</div>
            <h1>Pertanyaan yang sering diajukan.</h1>
            <p>
              Temukan jawaban cepat untuk pertanyaan umum tentang layanan Rodeo
              Laundry.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="https://wa.me/6282143297707">Chat WhatsApp</a>
              <a class="btn btn-ghost" href="{{ route('contact') ?? '/contact' }}">Kontak lainnya</a>
            </div>
          </div>
          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Cari jawaban</span>
            <h3>Gunakan pencarian untuk menemukan topik.</h3>
            <div class="field" style="margin-top: 16px;">
              <input type="search" placeholder="Cari pertanyaan" />
              <button class="btn btn-primary" type="button">Cari</button>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-alt" data-api="/api/public/faq">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Daftar FAQ</div>
            <h2 class="section-title">Informasi penting untuk pelanggan.</h2>
          </div>
          <div class="grid-2">
            <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 0ms;">
              <button class="accordion-button" aria-expanded="false">Berapa lama waktu proses pencucian?</button>
              <div class="accordion-content">
                <p>Proses standar adalah 24 - 48 jam tergantung jenis layanan yang dipilih.</p>
              </div>
            </div>
            <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 80ms;">
              <button class="accordion-button" aria-expanded="false">Apakah ada layanan antar jemput?</button>
              <div class="accordion-content">
                <p>Silakan hubungi tim kami melalui WhatsApp untuk informasi jadwal antar jemput.</p>
              </div>
            </div>
            <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 0ms;">
              <button class="accordion-button" aria-expanded="false">Bagaimana cara melacak status pesanan?</button>
              <div class="accordion-content">
                <p>Gunakan halaman Cek Status Order dan masukkan nomor order atau token tracking.</p>
              </div>
            </div>
            <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 80ms;">
              <button class="accordion-button" aria-expanded="false">Apa bedanya layanan reguler dan premium?</button>
              <div class="accordion-content">
                <p>Premium memiliki proses lebih teliti dengan estimasi 48 - 72 jam.</p>
              </div>
            </div>
            <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 0ms;">
              <button class="accordion-button" aria-expanded="false">Apakah bisa bayar nanti?</button>
              <div class="accordion-content">
                <p>Kebijakan pembayaran dapat dibahas langsung dengan admin melalui WhatsApp.</p>
              </div>
            </div>
            <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 80ms;">
              <button class="accordion-button" aria-expanded="false">Apakah melayani order jumlah besar?</button>
              <div class="accordion-content">
                <p>Kami melayani villa, penginapan, dan catering. Hubungi kami untuk paket bisnis.</p>
              </div>
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

    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
