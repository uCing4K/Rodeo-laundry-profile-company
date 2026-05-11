@extends('layouts.app')

@section('title', 'Cek Status Order - Rodeo Laundry')
@section('description', 'Cek status order Rodeo Laundry menggunakan nomor order atau token tracking.')
@section('og_title', 'Cek Status Order')
@section('og_description', 'Masukkan nomor order atau token untuk mengetahui status laundry Anda.')

@section('content')
<section class="hero">
  <div class="container hero-grid">
    <div data-reveal style="--reveal-delay: 0ms;">
      <div class="eyebrow">Cek status order</div>
      <h1>Tracking pesanan laundry secara real time.</h1>
      <p>
        Masukkan nomor order atau token tracking untuk melihat status
        pesanan Anda saat ini.
      </p>
      <div class="hero-actions">
        <a class="btn btn-primary" href="https://wa.me/6282143297707" target="_blank" rel="noopener noreferrer">Chat bantuan</a>
        <a class="btn btn-ghost" href="{{ route('services') ?? '/services' }}">Lihat layanan</a>
      </div>
    </div>
    <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
      <span class="badge">Form tracking</span>
      <h3>Masukkan data Anda di bawah ini.</h3>
      <p>
        Format order: RODEO-YYYYMMDD-XXXX atau gunakan token tracking.
      </p>
      <form
        class="hero-form"
        data-tracking-form
        data-tracking-redirect="https://rodeolaundry.online/public/receipt-digital.php"
      >
        <div class="field">
          <input
            type="text"
            name="token"
            placeholder="Contoh: 3b04a2dcf6df846a889de268b5c4f24b"
            required
          />
          <button class="btn btn-primary" type="submit">Cek status</button>
        </div>
        <small>Masukkan token agar langsung diarahkan ke status order.</small>
      </form>
      <div class="alert" data-tracking-error hidden></div>
    </div>
  </div>
</section>
@endsection
