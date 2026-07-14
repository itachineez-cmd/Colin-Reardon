<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Send Newsletter</title>
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
  --success:    #7fbf7f;
  --success-bg: rgba(127, 191, 127, 0.08);
  --error:      #ff6b6b;
  --error-bg:   rgba(255, 107, 107, 0.08);
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
  align-items: flex-start;
  gap: 8px;
}
.alert svg { flex-shrink: 0; margin-top: 1px; }
.alert-error {
  background: var(--error-bg);
  border: 1px solid rgba(255, 107, 107, 0.22);
  color: var(--error);
}
.alert-success {
  background: var(--success-bg);
  border: 1px solid rgba(127, 191, 127, 0.22);
  color: var(--success);
}
.alert ul { margin: 0; padding-left: 18px; }

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

label {
  display: block;
  margin-bottom: 7px;
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 1.8px;
  text-transform: uppercase;
  color: var(--ash-2);
}

/* ══════════════════════
   INPUTS
══════════════════════ */
input[type="text"],
textarea {
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
input[type="text"]::placeholder,
textarea::placeholder { color: var(--ash-3); }

input[type="text"]:focus,
textarea:focus {
  border-color: var(--focus);
  color: var(--paper);
}
input.is-invalid,
textarea.is-invalid { border-color: var(--error) !important; }

textarea { height: 220px; resize: vertical; }

/* ══════════════════════
   FIELD ERROR
══════════════════════ */
.field-error {
  display: block;
  margin-top: 5px;
  font-size: 12px;
  color: #cf7a7a;
}

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

  .page-wrap {
    width: 100%;
    padding: 0 14px;
    margin-top: 24px;
  }

  .form-card { padding: 20px 16px 18px; }

  textarea { height: 160px; }

  .btn-row {
    flex-direction: column-reverse;
    gap: 8px;
  }
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
    <a href="{{ url()->previous() }}" class="topbar__back" title="Back">
      <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <h1 class="topbar__title">Send Newsletter</h1>
  </div>
</header>

<div class="page-wrap">

  @if(session('success'))
    <div class="alert alert-success">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
      </svg>
      {{ session('success') }}
    </div>
  @endif

  @if($errors->any())
    <div class="alert alert-error">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
      </svg>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="form-card">
    <form action="{{ route('newsletter.send') }}" method="POST">
      @csrf

      {{-- Heading --}}
      <div class="form-group">
        <label for="subject">Heading</label>
        <input
          type="text"
          id="subject"
          name="subject"
          value="{{ old('subject') }}"
          placeholder="Enter newsletter heading..."
          class="{{ $errors->has('subject') ? 'is-invalid' : '' }}"
          required
        >
        @error('subject')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Message --}}
      <div class="form-group">
        <label for="message">Message</label>
        <textarea
          id="message"
          name="message"
          placeholder="Write your message here..."
          class="{{ $errors->has('message') ? 'is-invalid' : '' }}"
          required
        >{{ old('message') }}</textarea>
        @error('message')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <hr class="form-divider">

      <div class="btn-row">
        <button type="submit" class="btn-submit">
          <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/></svg>
          Send Newsletter
        </button>
      </div>

    </form>
  </div>

</div>

</body>
</html>