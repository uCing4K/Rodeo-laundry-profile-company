<footer class="footer">
  <div class="container footer-grid">
    <div>
      <div class="logo">
        <img src="{{ asset('asset/Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
        <span style="color: #ffffff;">Rodeo Laundry</span>
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
        <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $globalSetting->phone ?? '+6282143297707') }}">{{ $globalSetting->phone ?? '+62 821-4329-7707' }}</a></li>
        <li><a href="{{ $globalSetting->whatsapp_link ?? 'https://wa.me/6282143297707' }}" target="_blank" rel="noopener noreferrer">WhatsApp</a></li>
        <li><a href="mailto:{{ $globalSetting->email ?? 'info@rodeolaundry.my.id' }}">{{ $globalSetting->email ?? 'info@rodeolaundry.my.id' }}</a></li>
        <li style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px;">{{ $globalSetting->address ?? 'Batu, Sumberejo' }}</li>
      </ul>
    </div>
  </div>
  <div class="container footer-bottom">
    <p>Copyright 2026 Rodeo Laundry. All rights reserved.</p>
  </div>
</footer>

<div class="floating-buttons">
  <a class="fab" href="{{ $globalSetting->whatsapp_link ?? 'https://wa.me/6282143297707' }}" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp Rodeo Laundry">
    <svg class="icon-whatsapp" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
      <path d="M12 0C5.373 0 0 5.373 0 12c0 2.127.558 4.126 1.532 5.859L.057 23.571a.75.75 0 0 0 .92.92l5.71-1.474A11.951 11.951 0 0 0 12 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.75a9.726 9.726 0 0 1-4.953-1.354l-.355-.211-3.683.949.974-3.58-.232-.368A9.712 9.712 0 0 1 2.25 12C2.25 6.615 6.615 2.25 12 2.25S21.75 6.615 21.75 12 17.385 21.75 12 21.75z"/>
    </svg>
  </a>
</div>
