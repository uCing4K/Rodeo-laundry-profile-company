<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Login — Rodeo Laundry</title>
    <meta name="description" content="Halaman login admin Rodeo Laundry." />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  </head>
  <body>

    <main class="admin-auth">
      <div class="admin-auth-card">

        <div class="admin-auth-header">
          <img
            src="{{ asset('asset/Rodeo Laundry logo.png') }}"
            alt="Rodeo Laundry"
            style="width: 56px; height: 56px; object-fit: contain;"
          />
          <div>
            <h1 style="font-size: 1.4rem; margin: 0 0 4px;">Masuk Admin</h1>
            <p style="margin: 0; font-size: 0.9rem; color: var(--ink-500);">
              Masukkan email dan password anda
            </p>
          </div>
        </div>

        @if (session('success'))
          <div class="alert" style="display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
          </div>
        @endif

        @if ($errors->has('email'))
          <div class="alert" style="background: #fff0f0; border-color: #f8a4a4; color: #c53030; display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-exclamation-circle"></i>
            {{ $errors->first('email') }}
          </div>
        @endif

        <form action="{{ route('admin.login') }}" method="post" novalidate>
          @csrf

          <div style="display: grid; gap: 16px;">
            <div style="display: grid; gap: 6px;">
              <label for="email" style="font-weight: 600; font-size: 0.9rem; color: var(--ink-900);">
                Email
              </label>
              <div class="field" style="margin: 0;">
                <input
                  type="email"
                  id="email"
                  name="email"
                  placeholder="admin@example.com"
                  autocomplete="email"
                  value="{{ old('email') }}"
                  required
                  style="border-color: {{ $errors->has('email') ? '#fc8181' : 'var(--line)' }};"
                />
              </div>
            </div>

            <div style="display: grid; gap: 6px;">
              <label for="password" style="font-weight: 600; font-size: 0.9rem; color: var(--ink-900);">
                Password
              </label>
              <div class="field" style="margin: 0;">
                <input
                  type="password"
                  id="password"
                  name="password"
                  placeholder="••••••••"
                  autocomplete="current-password"
                  required
                  style="border-color: {{ $errors->has('password') ? '#fc8181' : 'var(--line)' }};"
                />
              </div>
              @error('password')
                <small style="color: #c53030; font-size: 0.85rem;">{{ $message }}</small>
              @enderror
            </div>

            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; font-size: 0.9rem; color: var(--ink-700);">
              <input
                type="checkbox"
                id="remember"
                name="remember"
                style="width: 16px; height: 16px; accent-color: var(--orange-500); cursor: pointer;"
              />
              Ingat saya
            </label>

            <button type="submit" class="btn btn-primary" style="width: 100%; border-radius: var(--radius-md); margin-top: 4px;">
              Masuk Sekarang
            </button>
          </div>
        </form>

      </div>
    </main>

    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>
