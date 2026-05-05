@extends('layouts.app')

@section('title', 'Layanan dan Harga - Rodeo Laundry')
@section('description', 'Daftar layanan dan harga Rodeo Laundry untuk reguler maupun premium.')
@section('og_title', 'Layanan Rodeo Laundry')
@section('og_description', 'Harga transparan dan kategori layanan lengkap untuk kebutuhan Anda.')

@section('content')
      <section class="hero">
        <div class="container hero-grid">
          <div data-reveal style="--reveal-delay: 0ms;">
            <div class="eyebrow">Layanan dan harga</div>
            <h1>Semua layanan Rodeo Laundry dalam satu halaman.</h1>
            <p>
              Gunakan daftar ini sebagai referensi harga. Data di halaman ini
              siap dihubungkan ke API agar selalu update.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="https://wa.me/6282143297707">Pesan via WhatsApp</a>
              <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek status pesanan</a>
            </div>
          </div>
          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Informasi cepat</span>
            <h3>Estimasi selesai</h3>
            <p>Layanan reguler selesai dalam 24 - 48 jam.</p>
            <div class="hero-stats">
              <div class="stat">
                <div class="stat-value">Reguler</div>
                <div class="stat-label">Harga standar</div>
              </div>
              <div class="stat">
                <div class="stat-value">Premium</div>
                <div class="stat-label">48 - 72 jam</div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Filter layanan</div>
            <h2 class="section-title">Cari layanan sesuai kebutuhan.</h2>
            <p class="section-subtitle">
              Filter ini dapat dibuat dinamis dari kategori dan tipe layanan.
            </p>
          </div>
          <div class="service-filters" data-reveal>
            <span class="chip is-active">Semua</span>
            @foreach($serviceTypes as $type)
              <span class="chip">{{ $type->name }}</span>
            @endforeach
          </div>
          <div class="section" style="padding-top: 36px;">
            <div class="field">
              <input type="search" placeholder="Cari nama layanan atau kategori" />
              <button class="btn btn-primary" type="button">Cari</button>
            </div>
          </div>
        </div>
      </section>

      <section class="section" data-api="/api/public/services">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Layanan reguler</div>
            <h2 class="section-title">Daftar harga layanan reguler.</h2>
          </div>
          <div class="table-wrapper" data-reveal>
            <table class="table">
              <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Produk</th>
                  <th>Satuan</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                @forelse($products as $product)
                  <tr>
                    <td>{{ $product->category?->name ?? '-' }}</td>
                    <td>{{ $product->name }}</td>
                    <td>/{{ $product->unit }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada produk tersedia</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Layanan premium</div>
            <h2 class="section-title">Perawatan lebih teliti untuk pakaian spesial.</h2>
            <p class="section-subtitle">Estimasi pengerjaan 48 - 72 jam.</p>
          </div>
          <div class="table-wrapper" data-reveal>
            <table class="table">
              <thead>
                <tr>
                  <th>Kategori</th>
                  <th>Produk</th>
                  <th>Harga</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Atasan dan Luaran</td>
                  <td>Kaos, kemeja, jaket tipis - tebal</td>
                  <td>Rp 15.000 - 30.000 / pcs</td>
                </tr>
                <tr>
                  <td>Bawahan</td>
                  <td>Celana pendek - panjang, jeans, rok</td>
                  <td>Rp 15.000 - 25.000 / pcs</td>
                </tr>
                <tr>
                  <td>Ibadah dan Lainnya</td>
                  <td>Hijab, sajadah, mukena set, baju renang</td>
                  <td>Rp 15.000 - 30.000 / pcs</td>
                </tr>
                <tr>
                  <td>Formal dan Gaun</td>
                  <td>Dress anak - dewasa, jas, jas setelan</td>
                  <td>Rp 20.000 - 50.000 / pcs</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Jenis layanan</div>
            <h2 class="section-title">Pilih waktu pengerjaan sesuai kebutuhan.</h2>
          </div>
          <div class="grid-3">
            @forelse($serviceTypes as $index => $type)
              <div class="card" data-reveal style="--reveal-delay: {{ $index * 80 }}ms;">
                <h3>{{ $type->name }}</h3>
                <p>{{ $type->description }}</p>
                @if($type->additional_cost > 0)
                  <p style="font-size: 0.9em; color: #666;">Biaya tambahan: Rp {{ number_format($type->additional_cost, 0, ',', '.') }}</p>
                @endif
              </div>
            @empty
              <p>Tidak ada jenis layanan tersedia.</p>
            @endforelse
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="cta-banner" data-reveal>
            <h2>Ingin harga terbaru otomatis?</h2>
            <p>
              Backend bisa menghubungkan halaman ini ke API layanan agar harga
              selalu update dari database POS.
            </p>
            <div class="cta-actions">
              <a class="btn btn-dark" href="https://wa.me/6282143297707">Diskusi integrasi</a>
              <a class="btn btn-ghost" href="{{ route('contact') ?? '/contact' }}">Kontak kami</a>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
