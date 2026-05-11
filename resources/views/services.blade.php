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
            <td data-label="Kategori">Setrika</td>
            <td data-label="Produk">Setrika Saja</td>
            <td data-label="Satuan">/kg</td>
            <td data-label="Harga">Rp 2.500</td>
          </tr>
          <tr>
            <td data-label="Kategori">Cuci Kering</td>
            <td data-label="Produk">Cuci Kering Lipat</td>
            <td data-label="Satuan">/kg</td>
            <td data-label="Harga">Rp 4.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Cuci Setrika</td>
            <td data-label="Produk">Cuci Setrika</td>
            <td data-label="Satuan">/kg</td>
            <td data-label="Harga">Rp 5.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Selimut</td>
            <td data-label="Produk">S - M - L - XL - XXL</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 5.000 - 20.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Bedcover</td>
            <td data-label="Produk">S - M - L - XL - XXL</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 13.000 - 25.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Seprai</td>
            <td data-label="Produk">Seprai + sarung bantal guling</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 5.000 - 10.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Karpet</td>
            <td data-label="Produk">Tipis - sedang - tebal</td>
            <td data-label="Satuan">/meter</td>
            <td data-label="Harga">Rp 5.000 - 15.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Boneka</td>
            <td data-label="Produk">Kecil - sedang - besar - jumbo</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 2.000 - 25.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Handuk dan Jaket</td>
            <td data-label="Produk">Handuk, jaket, keset</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 2.000 - 15.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Cuci Sepatu</td>
            <td data-label="Produk">Ukuran kecil - normal</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 10.000 - 15.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Gorden</td>
            <td data-label="Produk">Normal - tebal</td>
            <td data-label="Satuan">/kg</td>
            <td data-label="Harga">Rp 7.000 - 10.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Bantal dan Guling</td>
            <td data-label="Produk">Bantal normal, guling tebal</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 10.000 - 12.000</td>
          </tr>
          <tr>
            <td data-label="Kategori">Tas</td>
            <td data-label="Produk">Kecil - sedang - besar</td>
            <td data-label="Satuan">pcs</td>
            <td data-label="Harga">Rp 5.000 - 15.000</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container">
    <div class="cta-banner" data-reveal>
      <h2>Ada pesanan atau pertanyaan?</h2>
      <p>
        Hubungi Rodeo Laundry via WhatsApp untuk konsultasi layanan dan paket khusus.
      </p>
      <div class="cta-actions">
        <a class="btn btn-dark" href="https://wa.me/6282143297707">Chat WhatsApp sekarang</a>
      </div>
    </div>
  </div>
</section>
@endsection
