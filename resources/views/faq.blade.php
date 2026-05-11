@extends('layouts.app')

@section('title', 'FAQ - Rodeo Laundry')
@section('description', 'Pertanyaan yang sering diajukan tentang layanan Rodeo Laundry.')
@section('og_title', 'FAQ Rodeo Laundry')
@section('og_description', 'Jawaban cepat untuk pertanyaan umum seputar layanan laundry.')

@section('content')
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
        <a class="btn btn-primary" href="https://wa.me/6282143297707" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
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
@endsection
