<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login — Colin Reardon</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Barlow+Condensed:wght@300;400;500;600&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --ink:          #0d0d0d;
      --ink-2:        #181818;
      --ink-3:        #222222;
      --ink-4:        #2e2e2e;
      --ash:          #444444;
      --ash-2:        #666666;
      --ash-3:        #888888;
      --fog:          #aaaaaa;
      --mist:         #cccccc;
      --paper:        #e8e4dc;
      --white:        #f5f2ec;
      --pure:         #fafaf9;
      --glow:         rgba(245,242,236,0.06);
      --font-serif:   'IM Fell English', 'Libre Baskerville', Georgia, serif;
      --font-body:    'Libre Baskerville', Georgia, serif;
      --font-ui:      'Barlow Condensed', 'Helvetica Neue', sans-serif;
      --ease:         cubic-bezier(0.25, 0.46, 0.45, 0.94);
      --radius-sm:    4px;
      --radius:       8px;
      --glass-bg:     rgba(255,255,255,0.03);
      --glass-border: rgba(255,255,255,0.08);
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    html, body {
      min-height: 100vh;
      background: var(--ink-2);
      color: var(--white);
      font-family: var(--font-body);
    }

    body::before {
      content: '';
      position: fixed; inset: 0; z-index: 0;
      background:
        radial-gradient(ellipse 70% 50% at 15% 10%, rgba(245,242,236,0.05) 0%, transparent 60%),
        radial-gradient(ellipse 50% 40% at 85% 90%, rgba(245,242,236,0.03) 0%, transparent 55%);
      pointer-events: none;
    }

    .stage {
      position: relative; z-index: 1;
      display: flex; align-items: center; justify-content: center;
      min-height: 100vh; padding: 24px 16px;
    }

    .card {
      width: 100%; max-width: 420px;
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border-radius: var(--radius);
      padding: 48px 40px 40px;
      animation: cardIn 0.65s var(--ease) both;
    }

    @media (max-width: 480px) {
      .card {
        padding: 36px 24px 28px;
        border-radius: 6px;
      }
    }

    @keyframes cardIn {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(8px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* Brand */
    .brand {
      text-align: center;
      margin-bottom: 36px;
      animation: fadeUp 0.5s 0.1s var(--ease) both;
    }
    .brand-eyebrow {
      font-family: var(--font-ui);
      font-size: 10px; font-weight: 400;
      letter-spacing: 4px; text-transform: uppercase;
      color: var(--ash-2); margin-bottom: 10px;
    }
    .brand-title {
      font-family: var(--font-serif);
      font-size: 28px; font-weight: 400;
      font-style: italic;
      color: var(--white);
      letter-spacing: -0.5px; line-height: 1;
    }
    @media (max-width: 480px) {
      .brand-title { font-size: 24px; }
    }
    .brand-line {
      width: 32px; height: 1px;
      background: linear-gradient(to right, transparent, var(--ash-2), transparent);
      margin: 14px auto 0;
    }

    .form-heading {
      font-family: var(--font-ui);
      font-size: 11px; font-weight: 500;
      letter-spacing: 3px; text-transform: uppercase;
      color: var(--ash-3);
      margin-bottom: 24px;
      animation: fadeUp 0.5s 0.18s var(--ease) both;
    }

    /* Error alert */
    .alert-error {
      background: rgba(200, 60, 60, 0.12);
      border: 1px solid rgba(200, 60, 60, 0.3);
      border-radius: var(--radius-sm);
      padding: 10px 14px;
      margin-bottom: 18px;
      font-family: var(--font-ui);
      font-size: 12px; letter-spacing: 0.5px;
      color: #e8a0a0;
      animation: fadeUp 0.3s var(--ease) both;
    }

    /* Fields */
    .field { margin-bottom: 16px; }
    .field:nth-child(1) { animation: fadeUp 0.5s 0.24s var(--ease) both; }
    .field:nth-child(2) { animation: fadeUp 0.5s 0.32s var(--ease) both; }

    label {
      display: block;
      font-family: var(--font-ui);
      font-size: 10px; font-weight: 500;
      letter-spacing: 2px; text-transform: uppercase;
      color: var(--ash-3);
      margin-bottom: 8px;
    }

    .input-wrap { position: relative; }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
      width: 100%;
      background: var(--ink-3);
      border: 1px solid var(--ink-4);
      border-radius: var(--radius-sm);
      color: var(--white);
      font-family: var(--font-body);
      font-size: 14px;
      padding: 12px 14px;
      outline: none;
      transition: border-color 0.25s var(--ease), background 0.25s var(--ease), box-shadow 0.25s var(--ease);
      -webkit-appearance: none;
    }
    input::placeholder { color: var(--ash); }
    input:focus {
      border-color: var(--ash-2);
      background: var(--ink-4);
      box-shadow: 0 0 0 3px var(--glow);
    }
    input.is-invalid { border-color: rgba(200, 60, 60, 0.6); }

    .eye-btn {
      position: absolute; right: 12px; top: 50%;
      transform: translateY(-50%);
      background: none; border: none; cursor: pointer;
      color: var(--ash-2); padding: 2px;
      transition: color 0.2s; line-height: 0;
    }
    .eye-btn:hover { color: var(--fog); }

    /* Extras */
    .extras {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 6px 0 24px;
      animation: fadeUp 0.5s 0.4s var(--ease) both;
    }

    .remember {
      display: flex; align-items: center; gap: 8px;
      cursor: pointer;
    }
    .remember input[type="checkbox"] {
      width: 13px; height: 13px;
      accent-color: var(--white);
      cursor: pointer;
    }
    .remember span {
      font-family: var(--font-ui);
      font-size: 11px; letter-spacing: 1px;
      text-transform: uppercase; color: var(--ash-2);
    }

    .forgot {
      font-family: var(--font-serif);
      font-style: italic; font-size: 12px;
      color: var(--ash-2); text-decoration: none;
      transition: color 0.2s;
    }
    .forgot:hover { color: var(--fog); }

    /* Button */
    .btn-primary {
      width: 100%; padding: 13px;
      background: var(--white);
      color: var(--ink);
      font-family: var(--font-ui);
      font-size: 11px; font-weight: 600;
      letter-spacing: 3px; text-transform: uppercase;
      border: none; border-radius: var(--radius-sm);
      cursor: pointer; position: relative; overflow: hidden;
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
      animation: fadeUp 0.5s 0.46s var(--ease) both;
    }
    .btn-primary:hover {
      background: var(--pure);
      box-shadow: 0 4px 28px rgba(245,242,236,0.16);
      transform: translateY(-1px);
    }
    .btn-primary:active { transform: translateY(0); }

    /* Footer */
    .card-footer {
      text-align: center; margin-top: 24px;
      font-family: var(--font-ui); font-size: 11px;
      letter-spacing: 1px; color: var(--ash-2);
      animation: fadeUp 0.5s 0.52s var(--ease) both;
    }
    .card-footer a {
      color: var(--fog); text-decoration: none;
      border-bottom: 1px solid var(--ash);
      padding-bottom: 1px;
      transition: color 0.2s, border-color 0.2s;
    }
    .card-footer a:hover { color: var(--white); border-color: var(--fog); }
  </style>
</head>
<body>

<div class="stage">
  <div class="card">

    <div class="brand">
      <div class="brand-eyebrow">Welcome back</div>
      <div class="brand-title">Colin Reardon</div>
      <div class="brand-line"></div>
    </div>

    <div class="form-heading">Sign in to your account</div>

    {{-- Laravel Validation Errors --}}
    @if ($errors->any())
      <div class="alert-error">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="field">
        <label for="email">Email Address</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="name@domain.com"
          value="{{ old('email') }}"
          autocomplete="email"
          class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
          required
        />
      </div>

      <div class="field">
        <label for="password">Password</label>
        <div class="input-wrap">
          <input
            type="password"
            id="password"
            name="password"
            placeholder="••••••••"
            autocomplete="current-password"
            class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
            required
          />
          <button class="eye-btn" type="button" id="eye-toggle" aria-label="Toggle password">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>
      </div>

      <div class="extras">
        <label class="remember">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}/>
          <span>Remember me</span>
        </label>
        <a href="#" class="forgot">Forgot password?</a>
      </div>

      <button class="btn-primary" type="submit">Sign In</button>

    </form>

    <div class="card-footer">
      Don't have an account? <a href="#">Register</a>
    </div>

  </div>
</div>

<script>
  const eye  = document.getElementById('eye-toggle');
  const pass = document.getElementById('password');
  eye.addEventListener('click', () => {
    const show = pass.type === 'password';
    pass.type  = show ? 'text' : 'password';
    eye.innerHTML = show
      ? `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/><line x1="1" y1="1" x2="23" y2="23"/></svg>`
      : `<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>`;
  });
</script>

</body>
</html>