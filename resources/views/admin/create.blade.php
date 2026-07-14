<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Author</title>
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

.topbar__left { display: flex; align-items: center; gap: 14px; min-width: 0; }

.topbar__back {
  width: 30px; height: 30px;
  display: flex; align-items: center; justify-content: center;
  background: transparent;
  border: 1px solid var(--glass);
  border-radius: 4px;
  color: var(--ash-3);
  text-decoration: none;
  flex-shrink: 0;
  transition: all 0.15s;
}
.topbar__back:hover { color: var(--paper); border-color: rgba(255,255,255,0.18); background: var(--glow); }
.topbar__back svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; }

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

.topbar__right { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }

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
.topbar__preview:hover { color: var(--paper); border-color: rgba(255,255,255,0.18); background: var(--glow); }

.page-wrap { width: 90%; max-width: 680px; margin: 40px auto 60px; }

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
  background: rgba(140, 200, 150, 0.08);
  border: 1px solid rgba(140, 200, 150, 0.25);
  color: #8fcf9a;
}

.form-card {
  background: var(--ink-3);
  border: 1px solid var(--glass);
  border-radius: 6px;
  padding: 28px 28px 24px;
}

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
label .optional {
  font-weight: 400;
  text-transform: none;
  letter-spacing: 0;
  font-size: 11px;
  color: var(--ink-6);
  margin-left: 4px;
}

input[type="text"],
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

input:focus { border-color: var(--focus); color: var(--paper); }
input.is-invalid { border-color: var(--error) !important; }

/* Link input with brand icon */
.link-field { position: relative; }
.link-field svg.brand-icon {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  width: 15px;
  height: 15px;
  fill: var(--ash-3);
  pointer-events: none;
}
.link-field input[type="url"] { padding-left: 36px; }

.field-error {
  display: block;
  margin-top: 5px;
  font-size: 12px;
  color: #cf7a7a;
}

.section-label {
  font-family: 'Inter', sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1.8px;
  text-transform: uppercase;
  color: var(--ash-5);
  margin-bottom: 14px;
}

.form-divider { border: none; border-top: 1px solid var(--glass); margin: 22px 0; }

.btn-row { display: flex; gap: 10px; justify-content: flex-end; margin-top: 22px; }

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

@media (max-width: 640px) {
  header.topbar { height: 52px; padding: 0 16px; }
  .topbar__title { font-size: 13px; }
  .topbar__preview { display: none; }
  .page-wrap { width: 100%; padding: 0 14px; margin-top: 24px; }
  .form-card { padding: 20px 16px 18px; }
  .btn-row { flex-direction: column-reverse; gap: 8px; }
  .btn-cancel, .btn-submit { width: 100%; justify-content: center; padding: 11px; font-size: 12px; }
}
</style>
</head>
<body>

<header class="topbar">
  <div class="topbar__left">
    <a href="{{ route('authors.index') }}" class="topbar__back" title="Back to Authors">
      <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <h1 class="topbar__title">Add New Author</h1>
  </div>
  <div class="topbar__right">
    <a href="{{ route('authors.index') }}" class="topbar__preview">View All →</a>
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
      {{ $errors->count() }} field(s) need your attention — please check below.
    </div>
  @endif

  <div class="form-card">
    <form action="{{ route('authors.store') }}" method="POST">
      @csrf

      {{-- Name --}}
      <div class="form-group">
        <label for="name">Name</label>
        <input
          type="text"
          id="name"
          name="name"
          value="{{ old('name') }}"
          placeholder="Enter full name..."
          class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
        >
        @error('name')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <hr class="form-divider">

      {{-- Social Links --}}
      <div class="section-label">Social Links</div>

      {{-- X (Twitter) Link --}}
      <div class="form-group">
        <label for="x_link">X (Twitter) <span class="optional">(optional)</span></label>
        <div class="link-field">
          <svg class="brand-icon" viewBox="0 0 24 24"><path d="M18.9 2H22l-7.6 8.7L23.3 22h-6.9l-5.4-6.6L4.7 22H1.6l8.1-9.3L1 2h7l4.9 6.1L18.9 2Zm-1.2 18h1.9L7.4 4H5.4l12.3 16Z"/></svg>
          <input
            type="url"
            id="x_link"
            name="x_link"
            value="{{ old('x_link') }}"
            placeholder="https://x.com/username"
            class="{{ $errors->has('x_link') ? 'is-invalid' : '' }}"
          >
        </div>
        @error('x_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Instagram Link --}}
      <div class="form-group">
        <label for="instagram_link">Instagram <span class="optional">(optional)</span></label>
        <div class="link-field">
          <svg class="brand-icon" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 1.9.2 2.4.4.6.2 1 .5 1.5.9.4.4.7.9.9 1.5.2.5.4 1.2.4 2.4.1 1.2.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.2 1.9-.4 2.4a4 4 0 0 1-.9 1.5 4 4 0 0 1-1.5.9c-.5.2-1.2.4-2.4.4-1.2.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-1.9-.2-2.4-.4a4 4 0 0 1-1.5-.9 4 4 0 0 1-.9-1.5c-.2-.5-.4-1.2-.4-2.4C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.8c.1-1.2.2-1.9.4-2.4.2-.6.5-1 .9-1.5.4-.4.9-.7 1.5-.9.5-.2 1.2-.4 2.4-.4C8.4 2.2 8.8 2.2 12 2.2Zm0 1.8c-3.1 0-3.5 0-4.7.1-1 0-1.6.2-1.9.3-.5.2-.8.4-1.2.7-.3.4-.5.7-.7 1.2-.1.3-.3.9-.3 1.9-.1 1.2-.1 1.6-.1 4.7s0 3.5.1 4.7c0 1 .2 1.6.3 1.9.2.5.4.8.7 1.2.4.3.7.5 1.2.7.3.1.9.3 1.9.3 1.2.1 1.6.1 4.7.1s3.5 0 4.7-.1c1 0 1.6-.2 1.9-.3.5-.2.8-.4 1.2-.7.3-.4.5-.7.7-1.2.1-.3.3-.9.3-1.9.1-1.2.1-1.6.1-4.7s0-3.5-.1-4.7c0-1-.2-1.6-.3-1.9a3 3 0 0 0-.7-1.2 3 3 0 0 0-1.2-.7c-.3-.1-.9-.3-1.9-.3-1.2-.1-1.6-.1-4.7-.1Zm0 3.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm0 1.8a2.7 2.7 0 1 0 0 5.4 2.7 2.7 0 0 0 0-5.4Zm4.7-2a1.1 1.1 0 1 1 0 2.1 1.1 1.1 0 0 1 0-2.1Z"/></svg>
          <input
            type="url"
            id="instagram_link"
            name="instagram_link"
            value="{{ old('instagram_link') }}"
            placeholder="https://instagram.com/username"
            class="{{ $errors->has('instagram_link') ? 'is-invalid' : '' }}"
          >
        </div>
        @error('instagram_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Facebook Link --}}
      <div class="form-group">
        <label for="facebook_link">Facebook <span class="optional">(optional)</span></label>
        <div class="link-field">
          <svg class="brand-icon" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11.6 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.4h-1.2c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.4v7A10 10 0 0 0 22 12Z"/></svg>
          <input
            type="url"
            id="facebook_link"
            name="facebook_link"
            value="{{ old('facebook_link') }}"
            placeholder="https://facebook.com/username"
            class="{{ $errors->has('facebook_link') ? 'is-invalid' : '' }}"
          >
        </div>
        @error('facebook_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Goodreads Link --}}
      <div class="form-group">
        <label for="goodreads_link">Goodreads <span class="optional">(optional)</span></label>
        <div class="link-field">
          <svg class="brand-icon" viewBox="0 0 24 24"><path d="M12 2 3 6.5v11L12 22l9-4.5v-11L12 2Zm0 2.2 6.9 3.5L12 11.2 5.1 7.7 12 4.2Zm-7 5.4 6 3v6.8l-6-3v-6.8Zm8 9.8v-6.8l6-3v6.8l-6 3Z"/></svg>
          <input
            type="url"
            id="goodreads_link"
            name="goodreads_link"
            value="{{ old('goodreads_link') }}"
            placeholder="https://www.goodreads.com/..."
            class="{{ $errors->has('goodreads_link') ? 'is-invalid' : '' }}"
          >
        </div>
        @error('goodreads_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <hr class="form-divider">

      <div class="btn-row">
        <a href="{{ route('authors.index') }}" class="btn-cancel">Cancel</a>
        <button type="submit" class="btn-submit">
          <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
          Add Author
        </button>
      </div>

    </form>
  </div>

</div>

</body>
</html>