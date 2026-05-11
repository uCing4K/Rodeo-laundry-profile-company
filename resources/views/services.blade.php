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
        Semua jenis tipe layanan Rodeo Laundry.
      </p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="https://wa.me/6282143297707" target="_blank" rel="noopener noreferrer">Pesan via WhatsApp</a>
        <a class="btn btn-ghost" href="{{ route('tracking') ?? '/tracking' }}">Cek status pesanan</a>
      </div>
    </div>
    <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
      <span class="badge">Informasi cepat</span>
      <h3>Estimasi selesai</h3>
      <p>Estimasi durasi pengerjaan berdasarkan tipe layanan.</p>
      <div class="hero-stats">
        @foreach($serviceTypes as $type)
        <div class="stat">
          <div class="stat-value">{{ $type->name }}</div>
          <div class="stat-label">{{ $type->estimated_duration ?? 'Tanya admin' }}</div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<section class="section">
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
          @forelse($regulerCategories as $category)
          <tr>
            <td data-label="Kategori">{{ $category->category }}</td>
            <td data-label="Produk">{{ $category->product ?? '-' }}</td>
            <td data-label="Satuan">{{ $category->unit ?? '-' }}</td>
            <td data-label="Harga">Rp {{ number_format($category->base_price, 0, ',', '.') }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="4" style="text-align: center; padding: 2rem;">Belum ada layanan reguler.</td>
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
      <h2 class="section-title">Daftar harga layanan premium.</h2>
      <p class="section-subtitle">
        Layanan premium dengan penanganan ekstra hati-hati,
        dan dikerjakan oleh tim berpengalaman.
      </p>
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
          @forelse($premiumCategories as $category)
          <tr>
            <td data-label="Kategori">{{ $category->category }}</td>
            <td data-label="Produk">{{ $category->product ?? '-' }}</td>
            <td data-label="Satuan">{{ $category->unit ?? '-' }}</td>
            <td data-label="Harga">Rp {{ number_format($category->base_price, 0, ',', '.') }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="4" style="text-align: center; padding: 2rem;">Belum ada layanan premium.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-header" data-reveal>
      <div class="eyebrow">Layanan lainnya</div>
      <h2 class="section-title">Daftar harga layanan lainnya.</h2>
      <p class="section-subtitle">
        Layanan tambahan, express, atau layanan khusus lainnya yang tersedia di Rodeo Laundry.
      </p>
    </div>
    <div class="table-wrapper" data-reveal>
      <table class="table">
        <thead>
          <tr>
            <th>Kategori</th>
            <th>Produk</th>
            <th>Satuan</th>
            <th>Tipe Layanan</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
          @forelse($otherCategories as $category)
          <tr>
            <td data-label="Kategori">{{ $category->category }}</td>
            <td data-label="Produk">{{ $category->product ?? '-' }}</td>
            <td data-label="Satuan">{{ $category->unit ?? '-' }}</td>
            <td data-label="Tipe Layanan"><span class="badge">{{ $category->serviceType->name ?? '-' }}</span></td>
            <td data-label="Harga">Rp {{ number_format($category->base_price, 0, ',', '.') }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="5" style="text-align: center; padding: 2rem;">Belum ada layanan lainnya.</td>
          </tr>
          @endforelse
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
        <a class="btn btn-dark" href="https://wa.me/6282143297707" target="_blank" rel="noopener noreferrer">Chat WhatsApp sekarang</a>
      </div>
    </div>
  </div>
</section>
@endsection
