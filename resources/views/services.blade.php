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
            <span class="chip">Reguler</span>
            <span class="chip">Premium</span>
            <span class="chip">Express</span>
            <span class="chip">Per kg</span>
            <span class="chip">Per pcs</span>
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
                <tr>
                  <td>Setrika</td>
                  <td>Setrika Saja</td>
                  <td>/kg</td>
                  <td>Rp 2.500</td>
                </tr>
                <tr>
                  <td>Cuci Kering</td>
                  <td>Cuci Kering Lipat</td>
                  <td>/kg</td>
                  <td>Rp 4.000</td>
                </tr>
                <tr>
                  <td>Cuci Setrika</td>
                  <td>Cuci Setrika</td>
                  <td>/kg</td>
                  <td>Rp 5.000</td>
                </tr>
                <tr>
                  <td>Selimut</td>
                  <td>S - M - L - XL - XXL</td>
                  <td>/pcs</td>
                  <td>Rp 5.000 - 20.000</td>
                </tr>
                <tr>
                  <td>Bedcover</td>
                  <td>S - M - L - XL - XXL</td>
                  <td>/pcs</td>
                  <td>Rp 13.000 - 25.000</td>
                </tr>
                <tr>
                  <td>Seprai</td>
                  <td>Seprai + sarung bantal guling</td>
                  <td>/pcs</td>
                  <td>Rp 5.000 - 10.000</td>
                </tr>
                <tr>
                  <td>Karpet</td>
                  <td>Tipis - sedang - tebal</td>
                  <td>/meter</td>
                  <td>Rp 5.000 - 15.000</td>
                </tr>
                <tr>
                  <td>Boneka</td>
                  <td>Kecil - sedang - besar - jumbo</td>
                  <td>/pcs</td>
                  <td>Rp 2.000 - 25.000</td>
                </tr>
                <tr>
                  <td>Handuk dan Jaket</td>
                  <td>Handuk, jaket, keset</td>
                  <td>/pcs</td>
                  <td>Rp 2.000 - 15.000</td>
                </tr>
                <tr>
                  <td>Cuci Sepatu</td>
                  <td>Ukuran kecil - normal</td>
                  <td>/pcs</td>
                  <td>Rp 10.000 - 15.000</td>
                </tr>
                <tr>
                  <td>Gorden</td>
                  <td>Normal - tebal</td>
                  <td>/kg</td>
                  <td>Rp 7.000 - 10.000</td>
                </tr>
                <tr>
                  <td>Bantal dan Guling</td>
                  <td>Bantal normal, guling tebal</td>
                  <td>/pcs</td>
                  <td>Rp 10.000 - 12.000</td>
                </tr>
                <tr>
                  <td>Tas</td>
                  <td>Kecil - sedang - besar</td>
                  <td>/pcs</td>
                  <td>Rp 5.000 - 15.000</td>
                </tr>
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
            <div class="card" data-reveal style="--reveal-delay: 0ms;">
              <h3>Reguler</h3>
              <p>Harga standar sesuai kategori produk.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 80ms;">
              <h3>Express 24 Jam</h3>
              <p>Tambahan biaya Rp 15.000 untuk penyelesaian cepat.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 160ms;">
              <h3>Express Same Day</h3>
              <p>Tambahan biaya Rp 10.000 untuk pengerjaan hari yang sama.</p>
            </div>
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
