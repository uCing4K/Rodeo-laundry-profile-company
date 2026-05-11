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
      @forelse ($faq as $index => $item)
        <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: {{ $index % 2 == 0 ? 0 : 80 }}ms;">
          <button class="accordion-button" aria-expanded="false">{{ $item->question }}</button>
          <div class="accordion-content">
            <p>{{ $item->answer }}</p>
          </div>
        </div>
      @empty
        <div class="accordion-item" data-accordion data-reveal style="--reveal-delay: 0ms;">
          <button class="accordion-button" aria-expanded="false">Belum ada FAQ</button>
          <div class="accordion-content">
            <p>FAQ akan segera ditambahkan.</p>
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>
@endsection
