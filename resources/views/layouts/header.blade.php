<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="{{ route('index') }}">
      <img src="{{ asset('asset/Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
      <span>Rodeo Laundry</span>
    </a>

    <nav class="site-nav" id="site-menu" data-menu-panel>
      <a @if(Route::currentRouteName() === 'index') class="is-active" @endif href="{{ route('index') }}">Beranda</a>
      <a @if(Route::currentRouteName() === 'services') class="is-active" @endif href="{{ route('services') }}">Layanan</a>
      <a @if(Route::currentRouteName() === 'tracking') class="is-active" @endif href="{{ route('tracking') }}">Cek Status</a>
      <a @if(Route::currentRouteName() === 'about') class="is-active" @endif href="{{ route('about') }}">Tentang</a>
      <a @if(Route::currentRouteName() === 'contact') class="is-active" @endif href="{{ route('contact') }}">Kontak</a>
      <a @if(Route::currentRouteName() === 'faq') class="is-active" @endif href="{{ route('faq') }}">FAQ</a>
      <div class="nav-mobile-cta">
        <a class="btn btn-primary" href="{{ $globalSetting->whatsapp_link ?? 'https://wa.me/6282143297707' }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
        <a class="btn btn-ghost" href="{{ route('tracking') }}">Cek Status</a>
      </div>
    </nav>

    <div class="header-cta">
      <a class="btn btn-ghost" href="{{ route('tracking') }}">Cek Status</a>
      <a class="btn btn-primary" href="{{ $globalSetting->whatsapp_link ?? 'https://wa.me/6282143297707' }}" target="_blank" rel="noopener noreferrer">WhatsApp</a>
    </div>

    <button
      class="menu-toggle"
      type="button"
      data-menu-toggle
      aria-controls="site-menu"
      aria-expanded="false"
      aria-label="Buka menu navigasi"
    >
      <span class="menu-toggle-lines"></span>
    </button>
  </div>
</header>
