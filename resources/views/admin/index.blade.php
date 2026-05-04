<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - Rodeo Laundry</title>
    <meta name="description" content="Halaman login admin Rodeo Laundry." />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
      .login-container {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
        background: #ffffff;
      }

      .login-form-wrapper {
        width: 100%;
        max-width: 420px;
      }

      .login-form-header {
        text-align: center;
        margin-bottom: 36px;
      }

      .login-logo-container {
        margin-bottom: 24px;
        display: flex;
        justify-content: center;
      }

      .login-logo-container img {
        width: 80px;
        height: 80px;
      }

      .login-form-header h2 {
        font-size: 1.8rem;
        margin-bottom: 8px;
        color: var(--ink-900);
        font-weight: 700;
      }

      .login-form-header p {
        color: var(--ink-500);
        font-size: 0.95rem;
      }

      .login-form {
        display: grid;
        gap: 18px;
      }

      .login-form-group {
        display: grid;
        gap: 6px;
      }

      .login-form-group label {
        font-weight: 600;
        color: var(--ink-900);
        font-size: 0.95rem;
      }

      .login-form-group input[type="email"],
      .login-form-group input[type="password"] {
        padding: 12px 16px;
        border: 2px solid var(--line);
        border-radius: var(--radius-md);
        font-size: 1rem;
        font-family: inherit;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        background: #ffffff;
      }

      .login-form-group input[type="email"]:focus,
      .login-form-group input[type="password"]:focus {
        outline: none;
        border-color: var(--orange-500);
        box-shadow: 0 0 0 3px rgba(245, 130, 31, 0.1);
      }

      .login-form-remember {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.95rem;
      }

      .login-form-remember input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--orange-500);
      }

      .login-form-remember label {
        cursor: pointer;
        color: var(--ink-700);
      }

      .login-form-submit {
        padding: 12px 24px;
        background: var(--orange-500);
        color: #ffffff;
        border: none;
        border-radius: var(--radius-md);
        font-weight: 700;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
        margin-top: 12px;
      }

      .login-form-submit:hover {
        background: var(--orange-600);
        transform: translateY(-2px);
        box-shadow: var(--shadow-sm);
      }

      .login-form-footer {
        margin-top: 24px;
        text-align: center;
        font-size: 0.9rem;
        color: var(--ink-500);
      }

      .login-form-footer a {
        color: var(--orange-600);
        font-weight: 600;
        text-decoration: none;
      }

      .login-form-footer a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <div class="login-form-wrapper">
        <div class="login-form-header">
          <div class="login-logo-container">
            <img src="{{ asset('Rodeo Laundry logo.png') }}" alt="Rodeo Laundry logo" />
          </div>
          <h2>Masuk Admin</h2>
          <p>Masukkan kredensial Anda untuk lanjut</p>
        </div>

        <form class="login-form" data-api="/admin/login" method="post">
          <div class="login-form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="admin@example.com" required />
          </div>

          <div class="login-form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••" required />
          </div>

          <button class="login-form-submit" type="submit">Masuk Sekarang</button>
        </form>
      </div>
    </div>
    <script src="{{ asset('asset/js/main.js') }}"></script>
  </body>
</html>
