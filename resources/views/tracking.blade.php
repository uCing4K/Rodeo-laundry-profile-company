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
              <a class="btn btn-primary" href="https://wa.me/6282143297707">Chat bantuan</a>
              <a class="btn btn-ghost" href="{{ route('services') ?? '/services' }}">Lihat layanan</a>
            </div>
          </div>
          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Form tracking</span>
            <h3>Masukkan data Anda di bawah ini.</h3>
            <p>
              Format order: RODEO-YYYYMMDD-XXXX atau gunakan token tracking.
            </p>
            <form class="hero-form" data-tracking-form data-api="/api/public/tracking">
              <div class="field">
                <input
                  type="text"
                  name="query"
                  placeholder="Contoh: RODEO-20260428-0001"
                />
                <button class="btn btn-primary" type="submit">Cek status</button>
              </div>
              <small>Masukkan data yang benar agar status muncul.</small>
            </form>
            <div class="alert" data-tracking-error hidden></div>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Hasil tracking</div>
            <h2 class="section-title">Status pesanan Anda akan tampil di sini.</h2>
          </div>
          <div class="tracking-result" data-tracking-result>
            <div class="card tracking-placeholder" data-reveal>
              <h3>Belum ada hasil</h3>
              <p>Masukkan nomor order atau token tracking di atas.</p>
            </div>
            <div class="tracking-card" data-reveal data-tracking-card>
              <div>
                <div class="tracking-status">
                  <span class="status-pill">Processing</span>
                  <span>Status saat ini sedang diproses</span>
                </div>
                <p>Nomor order: <strong data-tracking-order>RODEO-20260428-0001</strong></p>
              </div>
              <div class="grid-2">
                <div>
                  <p><strong>Estimasi selesai</strong></p>
                  <p>28 April 2026</p>
                </div>
                <div>
                  <p><strong>Jenis layanan</strong></p>
                  <p>Cuci Setrika - Reguler</p>
                </div>
              </div>
              <div>
                <p><strong>Timeline proses</strong></p>
                <div class="timeline">
                  <div class="timeline-item">
                    <span>Pesanan diterima</span>
                    <span>27 Apr 10:30</span>
                  </div>
                  <div class="timeline-item">
                    <span>Proses cuci dan setrika</span>
                    <span>27 Apr 11:00</span>
                  </div>
                  <div class="timeline-item">
                    <span>Siap diambil</span>
                    <span>28 Apr 15:00</span>
                  </div>
                </div>
              </div>
              <div class="cta-actions">
                <a class="btn btn-primary" href="https://wa.me/6282143297707">Chat admin</a>
                <a class="btn btn-ghost" href="{{ route('contact') ?? '/contact' }}">Kontak</a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
