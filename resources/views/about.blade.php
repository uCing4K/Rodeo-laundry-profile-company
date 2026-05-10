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
          <a class="is-active" href="{{ route('about') ?? '/about' }}">Tentang</a>
          <a href="{{ route('contact') ?? '/contact' }}">Kontak</a>
          <a href="{{ route('faq') ?? '/faq' }}">FAQ</a>
          <div class="nav-mobile-cta">
            <a class="btn btn-primary btn-icon" href="https://wa.me/6282143297707" aria-label="WhatsApp">
              <svg class="icon-whatsapp" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                <path d="M12.04 0C5.383 0 .02 5.363.017 12.02c-.002 2.11.553 4.167 1.608 5.98L0 24l6.17-1.62a11.954 11.954 0 0 0 5.87 1.496h.005c6.657 0 12.02-5.363 12.023-12.02a11.93 11.93 0 0 0-3.51-8.507A11.93 11.93 0 0 0 12.04 0zM12.05 21.82h-.005a9.934 9.934 0 0 1-5.072-1.39l-.363-.215-3.66.96.976-3.57-.236-.374a9.913 9.913 0 0 1-1.52-5.285c.003-5.45 4.44-9.885 9.894-9.885a9.84 9.84 0 0 1 6.99 2.9 9.84 9.84 0 0 1 2.895 6.993c-.003 5.45-4.44 9.885-9.894 9.885zm5.404-7.37c-.296-.148-1.758-.867-2.03-.967-.273-.099-.472-.148-.672.148-.198.297-.768.967-.94 1.167-.174.198-.347.223-.644.075-.297-.148-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.654-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.297.298-.497.099-.198.05-.372-.025-.52-.075-.149-.672-1.611-.922-2.206-.242-.579-.487-.5-.672-.51l-.572-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.264.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.718 2.006-1.412.248-.695.248-1.29.173-1.412-.074-.123-.272-.198-.57-.347z" />
              </svg>
              <span class="sr-only">WhatsApp</span>
            </a>
            <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a>
          </div>
        </nav>

        <div class="header-cta">
          <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a>
          <a class="btn btn-primary btn-icon" href="https://wa.me/6282143297707" aria-label="WhatsApp">
            <svg class="icon-whatsapp" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
              <path d="M12.04 0C5.383 0 .02 5.363.017 12.02c-.002 2.11.553 4.167 1.608 5.98L0 24l6.17-1.62a11.954 11.954 0 0 0 5.87 1.496h.005c6.657 0 12.02-5.363 12.023-12.02a11.93 11.93 0 0 0-3.51-8.507A11.93 11.93 0 0 0 12.04 0zM12.05 21.82h-.005a9.934 9.934 0 0 1-5.072-1.39l-.363-.215-3.66.96.976-3.57-.236-.374a9.913 9.913 0 0 1-1.52-5.285c.003-5.45 4.44-9.885 9.894-9.885a9.84 9.84 0 0 1 6.99 2.9 9.84 9.84 0 0 1 2.895 6.993c-.003 5.45-4.44 9.885-9.894 9.885zm5.404-7.37c-.296-.148-1.758-.867-2.03-.967-.273-.099-.472-.148-.672.148-.198.297-.768.967-.94 1.167-.174.198-.347.223-.644.075-.297-.148-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.654-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.297.298-.497.099-.198.05-.372-.025-.52-.075-.149-.672-1.611-.922-2.206-.242-.579-.487-.5-.672-.51l-.572-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.264.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.718 2.006-1.412.248-.695.248-1.29.173-1.412-.074-.123-.272-.198-.57-.347z" />
            </svg>
            <span class="sr-only">WhatsApp</span>
          </a>
        </div>

        <button
          class="menu-toggle"
          type="button"
          data-menu-toggle
          aria-controls="site-menu"
          aria-expanded="false"
        >
          <span class="menu-toggle-lines" aria-hidden="true"></span>
          <span class="sr-only">Menu</span>
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
      <a class="fab" href="https://wa.me/6282143297707" aria-label="WhatsApp Rodeo Laundry">
        <svg class="icon-whatsapp" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
          <path d="M12.04 0C5.383 0 .02 5.363.017 12.02c-.002 2.11.553 4.167 1.608 5.98L0 24l6.17-1.62a11.954 11.954 0 0 0 5.87 1.496h.005c6.657 0 12.02-5.363 12.023-12.02a11.93 11.93 0 0 0-3.51-8.507A11.93 11.93 0 0 0 12.04 0zM12.05 21.82h-.005a9.934 9.934 0 0 1-5.072-1.39l-.363-.215-3.66.96.976-3.57-.236-.374a9.913 9.913 0 0 1-1.52-5.285c.003-5.45 4.44-9.885 9.894-9.885a9.84 9.84 0 0 1 6.99 2.9 9.84 9.84 0 0 1 2.895 6.993c-.003 5.45-4.44 9.885-9.894 9.885zm5.404-7.37c-.296-.148-1.758-.867-2.03-.967-.273-.099-.472-.148-.672.148-.198.297-.768.967-.94 1.167-.174.198-.347.223-.644.075-.297-.148-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.654-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.52.149-.174.198-.297.298-.497.099-.198.05-.372-.025-.52-.075-.149-.672-1.611-.922-2.206-.242-.579-.487-.5-.672-.51l-.572-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.264.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.718 2.006-1.412.248-.695.248-1.29.173-1.412-.074-.123-.272-.198-.57-.347z" />
        </svg>
        <span class="sr-only">WhatsApp</span>
      </a>
    </div>

    <script src="{{ asset('js/main.js') }}"></script>
  </body>
</html>
