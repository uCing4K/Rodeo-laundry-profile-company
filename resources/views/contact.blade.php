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
        <a class="btn btn-primary" href="{{ $companySetting->whatsapp_link ?? 'https://wa.me/6282143297707' }}" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
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
          <div class="stat-label" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">{{ $companySetting->address ?? 'Batu, Sumberejo' }}</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-alt">
  <div class="container grid-2">
    <div class="card" data-reveal style="--reveal-delay: 0ms;">
      <h3>Kontak utama</h3>
      <ul>
        <li><strong>Alamat:</strong> {{ $companySetting->address ?? 'Batu, Sumberejo, Gg. Rodeo' }}</li>
        <li><strong>Telepon:</strong> <a href="tel:{{ preg_replace('/[^0-9+]/', '', $companySetting->phone ?? '+6282143297707') }}">{{ $companySetting->phone ?? '+62 821-4329-7707' }}</a></li>
        <li><strong>WhatsApp:</strong> <a href="{{ $companySetting->whatsapp_link ?? 'https://wa.me/6282143297707' }}" target="_blank" rel="noopener noreferrer">Chat sekarang</a></li>
        <li><strong>Email:</strong> <a href="mailto:{{ $companySetting->email ?? 'info@rodeolaundry.my.id' }}">{{ $companySetting->email ?? 'info@rodeolaundry.my.id' }}</a></li>
      </ul>
    </div>
    <div class="card" data-reveal style="--reveal-delay: 120ms;">
      <h3>Google Maps</h3>
      <div class="map-frame">
        @if(str_contains($companySetting->map_embed ?? '', '<iframe'))
            {!! $companySetting->map_embed !!}
        @else
            <iframe
              title="Lokasi Rodeo Laundry"
              src="{{ $companySetting->map_embed ?? 'https://www.google.com/maps?q=Batu%2C%20Sumberejo%2C%20Gg.%20Rodeo&output=embed' }}"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
        @endif
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
          @forelse($operatingHours as $hour)
          <tr>
            <td>{{ $hour->day }}</td>
            <td>
              @if($hour->is_closed)
                Tutup
              @else
                {{ \Carbon\Carbon::parse($hour->open_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($hour->close_time)->format('H:i') }} WIB
              @endif
            </td>
          </tr>
          @empty
          <tr><td colspan="2" style="text-align: center;">Belum ada data jam operasional</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
