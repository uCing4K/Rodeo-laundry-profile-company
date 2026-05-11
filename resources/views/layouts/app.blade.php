<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Rodeo Laundry - Bersih, Cepat, Terpercaya')</title>
    <meta
      name="description"
      content="@yield('description', 'Rodeo Laundry menghadirkan layanan laundry profesional dengan proses cepat, harga transparan, dan tracking pesanan yang mudah.')"
    />
    <meta property="og:title" content="@yield('og_title', 'Rodeo Laundry')" />
    <meta
      property="og:description"
      content="@yield('og_description', 'Laundry profesional dengan layanan cepat, transparan, dan bisa tracking status pesanan.')"
    />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="id_ID" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
  </head>
  <body>
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    @include('layouts.header')

    <main id="main-content">
      @yield('content')
    </main>

    @include('layouts.footer')

    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>
