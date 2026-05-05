<footer class="footer">
  <div class="container footer-grid">
    <div>
      <div class="logo">
        <img src="{{ asset('asset/Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
        <span>Rodeo Laundry</span>
      </div>
      <p>
        Layanan laundry profesional dengan proses cepat dan hasil bersih.
      </p>
    </div>
    <div>
      <h3>Menu</h3>
      <ul>
        <li><a href="{{ route('index') ?? '/' }}">Beranda</a></li>
        <li><a href="{{ route('services') ?? '/services' }}">Layanan</a></li>
        <li><a href="{{ route('tracking') ?? '/tracking' }}">Cek Status</a></li>
        <li><a href="{{ route('about') ?? '/about' }}">Tentang</a></li>
        <li><a href="{{ route('contact') ?? '/contact' }}">Kontak</a></li>
        <li><a href="{{ route('faq') ?? '/faq' }}">FAQ</a></li>
      </ul>
    </div>
    <div>
      <h3>Kontak</h3>
      <ul>
        <li><a href="tel:+6282143297707">+62 821-4329-7707</a></li>
        <li><a href="https://wa.me/6282143297707">WhatsApp</a></li>
        <li><a href="mailto:info@rodeolaundry.my.id">info@rodeolaundry.my.id</a></li>
        <li>Batu, Sumberejo</li>
      </ul>
    </div>
  </div>
  <div class="container footer-bottom">
    <p>Copyright 2026 Rodeo Laundry. All rights reserved.</p>
  </div>
</footer>

<div class="floating-buttons">
  <a class="fab" href="tel:+6282143297707" aria-label="Telepon Rodeo Laundry">Call</a>
  <a class="fab" href="https://wa.me/6282143297707" aria-label="WhatsApp Rodeo Laundry">WA</a>
</div>
