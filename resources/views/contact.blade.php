@extends('layouts.app')

@section('title', 'Lokasi dan Kontak - Rodeo Laundry')
@section('description', 'Alamat, kontak, dan jam operasional Rodeo Laundry di Batu, Sumberejo.')
@section('og_title', 'Lokasi Rodeo Laundry')
@section('og_description', 'Temukan lokasi Rodeo Laundry dan hubungi kami untuk pemesanan.')

@section('content')
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
        <a class="btn btn-primary" href="https://wa.me/6282143297707" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
      </div>
    </div>
    <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
      <span class="badge">Info cepat</span>
      <h3>Jam operasional</h3>
      <p>Senin - Minggu, buka sekitar pukul 09:00 - 19:00 WIB.</p>
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
        <li><strong>WhatsApp:</strong> <a href="https://wa.me/6282143297707" target="_blank" rel="noopener noreferrer">Chat sekarang</a></li>
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
@endsection
