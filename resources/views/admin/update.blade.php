<!-- resources/views/author/update-profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Profile</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Cinzel+Decorative:wght@400;700&display=swap" rel="stylesheet">

<style>
:root {
  --ink:        #0d0d0d;
  --ink-2:      #111111;
  --ink-3:      #181818;
  --ink-4:      #2e2e2e;
  --ink-6:      #3d3d3d;
  --paper:      #e8e4dc;
  --white:      #f5f2ec;
  --ash-2:      #666666;
  --ash-3:      #888;
  --ash-5:      #aaa;
  --error:      #ff6b6b;
  --error-bg:   rgba(255, 107, 107, 0.08);
  --success:    #7fbf9e;
  --success-bg: rgba(127, 191, 158, 0.08);
  --focus:      rgba(201, 195, 184, 0.25);
  --glass:      rgba(255,255,255,0.07);
  --glow:       rgba(245,242,236,0.05);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { -webkit-font-smoothing: antialiased; }

body {
  font-family: 'Inter', Arial, sans-serif;
  background: var(--ink);
  color: var(--white);
  font-size: 14px;
  line-height: 1.6;
  min-height: 100vh;
}

/* ══════════════════════
   TOPBAR
══════════════════════ */
header.topbar {
  height: 58px;
  background: var(--ink-2);
  border-bottom: 1px solid var(--glass);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 28px;
  position: sticky;
  top: 0;
  z-index: 50;
  gap: 12px;
}

.topbar__left {
  display: flex;
  align-items: center;
  gap: 14px;
  min-width: 0;
}

.topbar__back {
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: transparent;
  border: 1px solid var(--glass);
  border-radius: 4px;
  color: var(--ash-3);
  text-decoration: none;
  flex-shrink: 0;
  transition: all 0.15s;
}
.topbar__back:hover {
  color: var(--paper);
  border-color: rgba(255,255,255,0.18);
  background: var(--glow);
}
.topbar__back svg {
  width: 14px; height: 14px;
  stroke: currentColor; fill: none; stroke-width: 2;
}

.topbar__title {
  font-family: 'Cinzel Decorative', serif;
  font-size: 17px;
  font-weight: 400;
  color: var(--white);
  letter-spacing: 0.06em;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.topbar__right {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}

.topbar__preview {
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 500;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  color: var(--ash-2);
  text-decoration: none;
  border: 1px solid var(--glass);
  padding: 6px 14px;
  border-radius: 6px;
  transition: all 0.15s;
  white-space: nowrap;
}
.topbar__preview:hover {
  color: var(--paper);
  border-color: rgba(255,255,255,0.18);
  background: var(--glow);
}

/* ══════════════════════
   PAGE LAYOUT
══════════════════════ */
.page-wrap {
  width: 90%;
  max-width: 680px;
  margin: 40px auto 60px;
}

/* ══════════════════════
   ALERTS
══════════════════════ */
.alert {
  padding: 11px 15px;
  border-radius: 6px;
  font-size: 13px;
  font-weight: 500;
  margin-bottom: 22px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.alert svg { flex-shrink: 0; }
.alert-error {
  background: var(--error-bg);
  border: 1px solid rgba(255, 107, 107, 0.22);
  color: var(--error);
}
.alert-success {
  background: var(--success-bg);
  border: 1px solid rgba(127, 191, 158, 0.22);
  color: var(--success);
}

/* ══════════════════════
   IDENTITY STRIP
══════════════════════ */
.identity {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 22px;
  padding: 14px 16px;
  background: var(--ink-3);
  border: 1px solid var(--glass);
  border-radius: 6px;
}
.identity__avatar {
  width: 42px; height: 42px; flex: none;
  border-radius: 50%;
  background: var(--ink-4);
  border: 1px solid var(--glass);
  display: flex; align-items: center; justify-content: center;
  font-family: 'Cinzel Decorative', serif;
  font-size: 15px;
  color: var(--paper);
}
.identity__text p:first-child {
  font-family: 'Inter', sans-serif;
  font-size: 13.5px;
  font-weight: 600;
  color: var(--white);
}
.identity__text p:last-child {
  font-size: 11px;
  color: var(--ash-3);
  margin-top: 2px;
}

/* ══════════════════════
   FORM CARD
══════════════════════ */
.form-card {
  background: var(--ink-3);
  border: 1px solid var(--glass);
  border-radius: 6px;
  padding: 28px 28px 24px;
}

/* ══════════════════════
   FORM GROUPS
══════════════════════ */
.form-group { margin-bottom: 20px; }
.form-group:last-child { margin-bottom: 0; }

label {
  display: block;
  margin-bottom: 7px;
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 1.8px;
  text-transform: uppercase;
  color: var(--ash-2);
}
label .optional {
  font-weight: 400;
  text-transform: none;
  letter-spacing: 0;
  font-size: 11px;
  color: var(--ink-6);
  margin-left: 4px;
}

/* ══════════════════════
   INPUTS
══════════════════════ */
.input-shell { position: relative; display: flex; align-items: center; }

input[type="text"],
input[type="email"],
input[type="password"],
input[type="url"] {
  width: 100%;
  padding: 9px 12px;
  background: var(--ink-4);
  border: 1px solid var(--glass);
  color: var(--white);
  border-radius: 4px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 13px;
  line-height: 1.5;
  transition: border-color 0.15s, color 0.15s;
  outline: none;
}
input::placeholder { color: var(--ash-3); }

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="url"]:focus {
  border-color: var(--focus);
  color: var(--paper);
}
input.is-invalid { border-color: var(--error) !important; }

input[type="password"] { padding-right: 58px; }

.pw-toggle {
  position: absolute;
  right: 4px;
  background: none;
  border: none;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  color: var(--ash-2);
  padding: 6px 10px;
  transition: color 0.15s;
}
.pw-toggle:hover { color: var(--paper); }

/* ══════════════════════
   PASSWORD STRENGTH
══════════════════════ */
.strength { display: flex; gap: 4px; margin-top: 9px; }
.strength i {
  flex: 1; height: 2px; border-radius: 2px;
  background: var(--ink-4);
  transition: background 0.2s;
}
.strength-label {
  font-size: 11px;
  color: var(--ash-3);
  margin-top: 6px;
}

/* ══════════════════════
   TOGGLE (change password)
══════════════════════ */
.toggle-btn {
  width: 100%;
  background: var(--ink-4);
  border: 1px solid var(--glass);
  color: var(--ash-5);
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1.2px;
  text-transform: uppercase;
  padding: 10px 13px;
  border-radius: 4px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: space-between;
  transition: border-color 0.15s, color 0.15s;
}
.toggle-btn:hover { border-color: rgba(255,255,255,0.18); color: var(--paper); }
.toggle-btn .chev { transition: transform 0.2s; font-size: 12px; }
.toggle-btn.open .chev { transform: rotate(180deg); }
.pw-fields { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
.pw-fields.open { max-height: 600px; margin-top: 18px; }

/* ══════════════════════
   FIELD ERROR / HINT
══════════════════════ */
.field-error {
  display: block;
  margin-top: 5px;
  font-size: 12px;
  color: #cf7a7a;
}
.hint {
  display: block;
  margin-top: 5px;
  font-size: 11px;
  color: var(--ash-3);
}

/* ══════════════════════
   SECTION LABEL
══════════════════════ */
.section-label {
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1.8px;
  text-transform: uppercase;
  color: var(--ash-5);
  margin-bottom: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.section-label .tag {
  font-size: 9.5px;
  font-weight: 500;
  letter-spacing: 1px;
  color: var(--ash-2);
  border: 1px solid var(--glass);
  padding: 2px 8px;
  border-radius: 20px;
}

/* ══════════════════════
   LINK ROW
══════════════════════ */
.link-row {
  display: flex;
  align-items: center;
  gap: 12px;
}
.link-icon {
  flex: none;
  width: 36px; height: 36px;
  display: flex; align-items: center; justify-content: center;
  background: var(--ink-4);
  border: 1px solid var(--glass);
  border-radius: 4px;
  font-size: 10.5px;
  font-weight: 700;
  letter-spacing: 0.3px;
  color: var(--ash-3);
  transition: border-color 0.15s, color 0.15s;
}
.link-row:focus-within .link-icon { border-color: rgba(255,255,255,0.2); color: var(--paper); }
.link-row .form-group { flex: 1; margin: 0; }

/* ══════════════════════
   DIVIDER
══════════════════════ */
.form-divider {
  border: none;
  border-top: 1px solid var(--glass);
  margin: 22px 0;
}

/* ══════════════════════
   BUTTON ROW
══════════════════════ */
.btn-row {
  display: flex;
  gap: 10px;
  justify-content: flex-end;
  margin-top: 22px;
}

.btn-cancel {
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 500;
  background: transparent;
  border: 1px solid var(--glass);
  color: var(--ash-2);
  padding: 8px 18px;
  border-radius: 4px;
  cursor: pointer;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  transition: all 0.15s;
}
.btn-cancel:hover { color: var(--paper); border-color: rgba(255,255,255,0.18); }

.btn-submit {
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  background: var(--paper);
  color: var(--ink);
  border: none;
  padding: 8px 22px;
  border-radius: 4px;
  cursor: pointer;
  transition: background 0.15s;
  display: inline-flex;
  align-items: center;
  gap: 7px;
}
.btn-submit:hover { background: var(--white); }
.btn-submit:active { transform: scale(0.99); }

/* ══════════════════════
   RESPONSIVE
══════════════════════ */
@media (max-width: 640px) {
  header.topbar { height: 52px; padding: 0 16px; }
  .topbar__title { font-size: 13px; }
  .topbar__preview { display: none; }

  .page-wrap {
    width: 100%;
    padding: 0 14px;
    margin-top: 24px;
  }

  .form-card { padding: 20px 16px 18px; }

  .btn-row {
    flex-direction: column-reverse;
    gap: 8px;
  }
  .btn-cancel,
  .btn-submit {
    width: 100%;
    justify-content: center;
    padding: 11px;
    font-size: 12px;
  }
}
</style>
</head>
<body>

<header class="topbar">
  <div class="topbar__left">
    <a href="{{ route('dashboard') }}" class="topbar__back" title="Back to Dashboard">
      <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <h1 class="topbar__title">Update Profile</h1>
  </div>
  <div class="topbar__right">
    <a href="{{ route('dashboard') }}" class="topbar__preview">View Dashboard →</a>
  </div>
</header>

<div class="page-wrap">

  @if (session('success'))
    <div class="alert alert-success">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
      </svg>
      {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-error">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
      </svg>
      {{ $errors->count() }} field(s) need your attention — please check below.
    </div>
  @endif

  <div class="identity">
    <div class="identity__avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</div>
    <div class="identity__text">
      <p>{{ auth()->user()->name ?? 'Your name' }}</p>
      <p>{{ auth()->user()->email ?? '' }}</p>
    </div>
  </div>

  <div class="form-card">
    <form action="{{ route('admin.profile.update') }}" method="POST">
      @csrf

      {{-- Full Name --}}
      <div class="form-group">
        <label for="name">Full Name</label>
        <input
          type="text"
          id="name"
          name="name"
          value="{{ old('name', auth()->user()->name ?? '') }}"
          placeholder="Enter your name..."
          class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        >
        @error('name')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Email --}}
      <div class="form-group">
        <label for="email">Email Address <span class="optional">(optional)</span></label>
        <input
          type="email"
          id="email"
          name="email"
          value="{{ old('email') }}"
          placeholder="Leave blank agar change nahi karna"
          class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
        >
        @error('email')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <hr class="form-divider">

      {{-- Security --}}
      <div class="section-label">
        Security <span class="tag">Private</span>
      </div>

      <div class="form-group">
        <label for="current_password">Current Password</label>
        <div class="input-shell">
          <input
            type="password"
            id="current_password"
            name="current_password"
            placeholder="Apna current password daalo"
            class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}"
          >
          <button type="button" class="pw-toggle" data-target="current_password">Show</button>
        </div>
        <span class="hint">Required to save any change on this page.</span>
        @error('current_password')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <button type="button" class="toggle-btn" id="pwToggleBtn">
        <span>Change Password</span>
        <span class="chev">⌄</span>
      </button>

      <div class="pw-fields" id="pwFields">
        <div class="form-group" style="margin-top:18px;">
          <label for="password">New Password <span class="optional">(optional)</span></label>
          <div class="input-shell">
            <input type="password" id="password" name="password" placeholder="8+ characters">
            <button type="button" class="pw-toggle" data-target="password">Show</button>
          </div>
          <div class="strength">
            <i></i><i></i><i></i><i></i>
          </div>
          <span class="strength-label" id="strengthLabel">Kam se kam 8 characters</span>
          @error('password')
            <span class="field-error">⚠ {{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="password_confirmation">Confirm New Password</label>
          <div class="input-shell">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Naya password dobara likho">
            <button type="button" class="pw-toggle" data-target="password_confirmation">Show</button>
          </div>
        </div>
      </div>

      <hr class="form-divider">

      {{-- External Links --}}
      <div class="section-label">
        External Links <span class="tag">4 platforms</span>
      </div>

      <div class="form-group">
        <div class="link-row">
          <span class="link-icon">FB</span>
          <div class="form-group">
            <label for="link_facebook">Facebook <span class="optional">(optional)</span></label>
            <input
              type="url"
              id="link_facebook"
              name="link_facebook"
              value="{{ old('link_facebook', $links['facebook'] ?? '') }}"
              placeholder="https://facebook.com/yourpage"
              class="{{ $errors->has('link_facebook') ? 'is-invalid' : '' }}"
            >
            @error('link_facebook')
              <span class="field-error">⚠ {{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="link-row">
          <span class="link-icon">IG</span>
          <div class="form-group">
            <label for="link_instagram">Instagram <span class="optional">(optional)</span></label>
            <input
              type="url"
              id="link_instagram"
              name="link_instagram"
              value="{{ old('link_instagram', $links['instagram'] ?? '') }}"
              placeholder="https://instagram.com/yourhandle"
              class="{{ $errors->has('link_instagram') ? 'is-invalid' : '' }}"
            >
            @error('link_instagram')
              <span class="field-error">⚠ {{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="link-row">
          <span class="link-icon">X</span>
          <div class="form-group">
            <label for="link_x">X (Twitter) <span class="optional">(optional)</span></label>
            <input
              type="url"
              id="link_x"
              name="link_x"
              value="{{ old('link_x', $links['x'] ?? '') }}"
              placeholder="https://x.com/yourhandle"
              class="{{ $errors->has('link_x') ? 'is-invalid' : '' }}"
            >
            @error('link_x')
              <span class="field-error">⚠ {{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="link-row">
          <span class="link-icon">GR</span>
          <div class="form-group">
            <label for="link_goodreads">Goodreads <span class="optional">(optional)</span></label>
            <input
              type="url"
              id="link_goodreads"
              name="link_goodreads"
              value="{{ old('link_goodreads', $links['goodreads'] ?? '') }}"
              placeholder="https://goodreads.com/yourprofile"
              class="{{ $errors->has('link_goodreads') ? 'is-invalid' : '' }}"
            >
            @error('link_goodreads')
              <span class="field-error">⚠ {{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>

      <hr class="form-divider">

      <div class="btn-row">
        <a href="{{ route('dashboard') }}" class="btn-cancel">Cancel</a>
        <button type="submit" class="btn-submit">
          <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Update Profile
        </button>
      </div>

    </form>
  </div>

</div>

<script>
  // password show/hide
  document.querySelectorAll('.pw-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const target = document.getElementById(btn.dataset.target);
      const show = target.type === 'password';
      target.type = show ? 'text' : 'password';
      btn.textContent = show ? 'Hide' : 'Show';
    });
  });

  // collapsible password section
  const pwToggleBtn = document.getElementById('pwToggleBtn');
  const pwFields = document.getElementById('pwFields');
  pwToggleBtn.addEventListener('click', () => {
    pwToggleBtn.classList.toggle('open');
    pwFields.classList.toggle('open');
  });

  // password strength meter
  const newPassword = document.getElementById('password');
  const bars = document.querySelectorAll('.strength i');
  const strengthLabel = document.getElementById('strengthLabel');
  const labels = ['Too short', 'Weak', 'Okay', 'Good', 'Strong'];
  const colors = ['#ff6b6b', '#ff6b6b', '#c9a35a', '#7fbf9e', '#e8e4dc'];
  newPassword.addEventListener('input', () => {
    const v = newPassword.value;
    let score = 0;
    if (v.length >= 8) score++;
    if (/[A-Z]/.test(v)) score++;
    if (/[0-9]/.test(v)) score++;
    if (/[^A-Za-z0-9]/.test(v)) score++;
    bars.forEach((b, i) => b.style.background = i < score ? colors[score] : 'var(--ink-4)');
    strengthLabel.textContent = v ? labels[score] : 'Kam se kam 8 characters';
  });
</script>

</body>
</html>