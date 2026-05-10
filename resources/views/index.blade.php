@extends('layouts.app')

@section('title', 'Rodeo Laundry - Bersih, Cepat, Terpercaya')
@section('description', 'Rodeo Laundry menghadirkan layanan laundry profesional dengan proses cepat, harga transparan, dan tracking pesanan yang mudah.')
@section('og_title', 'Rodeo Laundry')
@section('og_description', 'Laundry profesional dengan layanan cepat, transparan, dan bisa tracking status pesanan.')

@section('content')
      <section class="hero">
        <div class="container hero-grid">
          <div data-reveal style="--reveal-delay: 0ms;">
            <div class="eyebrow">Laundry profesional di Batu</div>
            <h1>Bersih, cepat, dan transparan untuk semua kebutuhan laundry.</h1>
            <p>
              Rodeo Laundry membantu pelanggan mendapatkan hasil terbaik dengan
              proses standar yang rapi, harga jelas, dan tracking pesanan yang
              mudah.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="{{ route('services') ?? '/services' }}">Lihat layanan</a>
              <a class="btn btn-ghost" href="{{ route('contact') ?? '/contact' }}">Hubungi kami</a>
            </div>
            <div class="hero-stats">
              <div class="stat">
                <div class="stat-value">24 - 48 jam</div>
                <div class="stat-label">Durasi standar</div>
              </div>
              <div class="stat">
                <div class="stat-value">Rp 2.500</div>
                <div class="stat-label">Harga mulai per kg</div>
              </div>
              <div class="stat">
                <div class="stat-value">Tracking</div>
                <div class="stat-label">Cek status kapan saja</div>
              </div>
            </div>
          </div>

          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Cek status cepat</span>
            <h3>Masukkan nomor order atau token.</h3>
            <p>
              Format order: RODEO-YYYYMMDD-XXXX. Anda juga bisa pakai token
              tracking.
            </p>
            <form class="hero-form" action="{{ route('tracking') ?? '/tracking' }}" method="get">
              <div class="field">
                <input
                  type="text"
                  name="query"
                  placeholder="Contoh: RODEO-20260428-0001"
                />
                <button class="btn btn-primary" type="submit">Cek</button>
              </div>
              <small>Gunakan halaman Cek Status untuk detail lengkap.</small>
            </form>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Kenapa Rodeo</div>
            <h2 class="section-title">Alasan pelanggan memilih Rodeo Laundry.</h2>
            <p class="section-subtitle">
              Kami fokus pada kualitas, kecepatan, dan komunikasi yang jelas agar
              pelanggan merasa aman setiap saat.
            </p>
          </div>
          <div class="grid-4">
            <div class="card" data-reveal style="--reveal-delay: 0ms;">
              <div class="icon-badge">HT</div>
              <h3>Harga terjangkau</h3>
              <p>Tarif jelas dari awal, tanpa biaya tersembunyi.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 80ms;">
              <div class="icon-badge">CP</div>
              <h3>Proses cepat</h3>
              <p>Standar pengerjaan 24 - 48 jam untuk layanan reguler.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 160ms;">
              <div class="icon-badge">TR</div>
              <h3>Bisa tracking</h3>
              <p>Cek status pesanan secara real time kapan saja.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 240ms;">
              <div class="icon-badge">RT</div>
              <h3>Terpercaya</h3>
              <p>Ribuan pelanggan sudah mempercayakan cucian mereka.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section" id="services" data-api="/api/public/services">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Layanan unggulan</div>
            <h2 class="section-title">Kategori populer dan harga mulai.</h2>
            <p class="section-subtitle">
              Semua harga di bawah ini dapat diupdate otomatis dari database POS.
            </p>
          </div>
          <div class="grid-3">
            @forelse($products as $index => $product)
              <div class="card" data-reveal style="--reveal-delay: {{ $index * 80 }}ms;">
                <div class="icon-badge">{{ strtoupper(substr($product->name, 0, 2)) }}</div>
                <h3>{{ $product->name }}</h3>
                <p>Mulai dari Rp {{ number_format($product->price, 0, ',', '.') }} per {{ $product->unit }}.</p>
                <a class="btn btn-ghost" href="{{ route('services') ?? '/services' }}">Lihat detail</a>
              </div>
            @empty
              <p>Tidak ada produk tersedia saat ini.</p>
            @endforelse
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Cara kerja</div>
            <h2 class="section-title">Tiga langkah yang simpel dan jelas.</h2>
          </div>
          <div class="grid-3">
            <div class="card card-soft" data-reveal style="--reveal-delay: 0ms;">
              <div class="step-number">01</div>
              <h3>Hubungi kami</h3>
              <p>Konfirmasi layanan dan jadwal lewat WhatsApp atau telepon.</p>
            </div>
            <div class="card card-soft" data-reveal style="--reveal-delay: 80ms;">
              <div class="step-number">02</div>
              <h3>Proses laundry</h3>
              <p>Tim kami mengerjakan dengan standar kebersihan terbaik.</p>
            </div>
            <div class="card card-soft" data-reveal style="--reveal-delay: 160ms;">
              <div class="step-number">03</div>
              <h3>Ambil atau kirim</h3>
              <p>Pesanan selesai sesuai estimasi dan siap diambil.</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Testimoni</div>
            <h2 class="section-title">Cerita pelanggan yang puas.</h2>
          </div>
          <div class="grid-3">
            @forelse($testimonials as $index => $testimonial)
              <div class="testimonial-card" data-reveal style="--reveal-delay: {{ $index * 80 }}ms;">
                <p>{{ $testimonial->content }}</p>
                <strong>{{ $testimonial->customer_name }}</strong>
                @if(!empty($testimonial->customer_title))
                  <span>{{ $testimonial->customer_title }}</span>
                @endif
              </div>
            @empty
              <div class="testimonial-card" data-reveal style="--reveal-delay: 0ms;">
                <p>Belum ada testimoni pelanggan saat ini.</p>
              </div>
            @endforelse
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container">
          <div class="callout" data-reveal>
            <span class="badge">Layanan bisnis</span>
            <h2>Solusi laundry untuk villa, kos, hotel, dan catering.</h2>
            <p>
              Rodeo Laundry sudah melayani kebutuhan laundry skala bisnis. Hubungi
              kami untuk paket khusus dan jadwal yang fleksibel.
            </p>
            <div class="cta-actions">
              <a class="btn btn-dark" href="{{ route('contact') ?? '/contact' }}">Konsultasi bisnis</a>
              <a class="btn btn-ghost" href="{{ route('services') ?? '/services' }}">Lihat semua layanan</a>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="cta-banner" data-reveal>
            <h2>Siap laundry tanpa ribet?</h2>
            <p>
              Hubungi Rodeo Laundry sekarang dan dapatkan layanan terbaik untuk
              kebutuhan harian maupun bisnis.
            </p>
            <div class="cta-actions">
              <a class="btn btn-dark" href="https://wa.me/6282143297707">Chat WhatsApp</a>
              <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek status pesanan</a>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
