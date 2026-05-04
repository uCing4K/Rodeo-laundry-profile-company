@extends('layouts.app')

@section('title', 'Tentang Kami - Rodeo Laundry')
@section('description', 'Mengenal Rodeo Laundry, visi, misi, nilai, dan perjalanan kami.')
@section('og_title', 'Tentang Rodeo Laundry')
@section('og_description', 'Rodeo Laundry fokus pada kebersihan, ketepatan waktu, dan layanan pelanggan terbaik.')

@section('content')
      <section class="hero">
        <div class="container hero-grid">
          <div data-reveal style="--reveal-delay: 0ms;">
            <div class="eyebrow">Tentang kami</div>
            <h1>Rodeo Laundry hadir untuk menjawab kebutuhan laundry modern.</h1>
            <p>
              Kami berkomitmen memberikan layanan yang konsisten, cepat, dan
              selalu mengutamakan kenyamanan pelanggan.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="{{ route('services') ?? '/services' }}">Lihat layanan</a>
              <a class="btn btn-ghost" href="{{ route('contact') ?? '/contact' }}">Hubungi kami</a>
            </div>
          </div>
          <div class="hero-card" data-reveal style="--reveal-delay: 120ms;">
            <span class="badge">Cerita singkat</span>
            <h3>Berawal dari kebutuhan lokal.</h3>
            <p>
              Rodeo Laundry mulai melayani pelanggan di Batu dan sekitarnya sejak
              2020 dengan fokus pada kualitas dan kecepatan.
            </p>
          </div>
        </div>
      </section>

      <section class="section section-alt">
        <div class="container grid-2">
          <div data-reveal style="--reveal-delay: 0ms;">
            <div class="eyebrow">Cerita Rodeo</div>
            <h2 class="section-title">Dibangun dari kepercayaan pelanggan.</h2>
            <p>
              Sejak awal, Rodeo Laundry fokus pada kualitas proses, komunikasi
              yang jelas, dan layanan yang ramah. Kami melayani pelanggan rumah
              tangga hingga bisnis lokal dengan kebutuhan laundry skala besar.
            </p>
            <p>
              Dengan sistem POS internal, kami memastikan setiap pesanan tercatat
              rapi agar pelanggan bisa tracking status kapan saja.
            </p>
          </div>
          <div class="card" data-reveal style="--reveal-delay: 120ms;">
            <h3>Nilai inti kami</h3>
            <ul>
              <li>Bersih dan rapi di setiap proses.</li>
              <li>Tepat waktu sesuai estimasi.</li>
              <li>Komunikasi ramah dan responsif.</li>
              <li>Transparan dalam harga dan layanan.</li>
            </ul>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Visi dan misi</div>
            <h2 class="section-title">Arah kami untuk melayani pelanggan.</h2>
          </div>
          <div class="grid-2">
            <div class="card card-soft" data-reveal style="--reveal-delay: 0ms;">
              <h3>Visi</h3>
              <p>
                Menjadi layanan laundry pilihan utama yang terpercaya di Batu dan
                sekitarnya.
              </p>
            </div>
            <div class="card card-soft" data-reveal style="--reveal-delay: 120ms;">
              <h3>Misi</h3>
              <p>
                Memberikan layanan laundry berkualitas tinggi dengan harga
                terjangkau dan pelayanan pelanggan terbaik.
              </p>
            </div>
          </div>
        </div>
      </section>

      <section class="section section-alt" data-api="/api/public/settings">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Angka utama</div>
            <h2 class="section-title">Pertumbuhan Rodeo Laundry.</h2>
          </div>
          <div class="grid-4">
            <div class="card" data-reveal style="--reveal-delay: 0ms;">
              <h3>5.000+</h3>
              <p>Total pesanan selesai</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 80ms;">
              <h3>1.000+</h3>
              <p>Pelanggan terdaftar</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 160ms;">
              <h3>15+</h3>
              <p>Kategori layanan</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 240ms;">
              <h3>2020</h3>
              <p>Tahun berdiri</p>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header" data-reveal>
            <div class="eyebrow">Tim kami</div>
            <h2 class="section-title">Pelayanan ramah di setiap tahap.</h2>
          </div>
          <div class="grid-3">
            <div class="card" data-reveal style="--reveal-delay: 0ms;">
              <h3>Customer Service</h3>
              <p>Respons cepat untuk konsultasi dan tracking pesanan.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 80ms;">
              <h3>Tim Operasional</h3>
              <p>Menangani proses cuci, setrika, dan quality control.</p>
            </div>
            <div class="card" data-reveal style="--reveal-delay: 160ms;">
              <h3>Logistik</h3>
              <p>Memastikan pesanan siap diantar atau diambil tepat waktu.</p>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
