<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Book</title>
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
   ALERT
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
input[type="text"],
input[type="number"],
input[type="url"],
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
input[type="number"]::placeholder,
input[type="url"]::placeholder,
textarea::placeholder { color: var(--ash-3); }

input[type="text"]:focus,
input[type="number"]:focus,
input[type="url"]:focus,
textarea:focus {
  border-color: var(--focus);
  color: var(--paper);
}
input.is-invalid,
textarea.is-invalid,
.file-label.is-invalid { border-color: var(--error) !important; }

textarea { height: 140px; resize: vertical; }

/* ══════════════════════
   CURRENT IMAGE PREVIEW
══════════════════════ */
.current-image-wrap {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 10px;
  padding: 11px 13px;
  background: var(--ink-4);
  border: 1px solid var(--glass);
  border-radius: 4px;
}
.current-image-wrap img {
  width: 56px;
  height: 56px;
  object-fit: cover;
  border-radius: 4px;
  flex-shrink: 0;
  border: 1px solid var(--glass);
}
.current-image-wrap span {
  font-size: 12px;
  color: var(--ash-3);
}

/* ══════════════════════
   FILE INPUT
══════════════════════ */
input[type="file"] { display: none; }

.file-label {
  display: flex;
  align-items: center;
  gap: 10px;
  width: 100%;
  padding: 10px 13px;
  background: var(--ink-4);
  border: 1px dashed rgba(255,255,255,0.12);
  color: var(--ash-3);
  border-radius: 4px;
  cursor: pointer;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 12px;
  transition: border-color 0.15s, color 0.15s;
}
.file-label:hover { border-color: var(--ash-3); color: var(--paper); }
.file-label svg { flex-shrink: 0; opacity: 0.5; }
#file-name { overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

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

  .current-image-wrap { flex-direction: column; align-items: flex-start; gap: 10px; }

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
    <a href="{{ route('books.index') }}" class="topbar__back" title="Back to Books">
      <svg viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
    </a>
    <h1 class="topbar__title">Edit Book</h1>
  </div>
  <div class="topbar__right">
    <a href="{{ route('dashboard') }}" class="topbar__preview">View Dashboard →</a>
  </div>
</header>

<div class="page-wrap">

  @if($errors->any())
    <div class="alert alert-error">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 8v4m0 4h.01"/>
      </svg>
      {{ $errors->count() }} field(s) need your attention — please check below.
    </div>
  @endif

  <div class="form-card">
    <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      {{-- Book Name --}}
      <div class="form-group">
        <label for="book_name">Book Title</label>
        <input
          type="text"
          id="book_name"
          name="book_name"
          value="{{ old('book_name', $book->book_name) }}"
          placeholder="Enter the book title..."
          class="{{ $errors->has('book_name') ? 'is-invalid' : '' }}"
        >
        @error('book_name')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Book Detail --}}
      <div class="form-group">
        <label for="book_detail">Description</label>
        <textarea
          id="book_detail"
          name="book_detail"
          placeholder="Write a description of the book..."
          class="{{ $errors->has('book_detail') ? 'is-invalid' : '' }}"
        >{{ old('book_detail', $book->book_detail) }}</textarea>
        @error('book_detail')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Book Pages --}}
      <div class="form-group">
        <label for="book_pages">Total Pages</label>
        <input
          type="number"
          id="book_pages"
          name="book_pages"
          value="{{ old('book_pages', $book->book_pages) }}"
          placeholder="e.g. 320"
          min="1"
          class="{{ $errors->has('book_pages') ? 'is-invalid' : '' }}"
        >
        @error('book_pages')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Book Image --}}
      <div class="form-group">
        <label for="book_image">
          Cover Image
          <span class="optional">(optional — leave blank to keep the current image)</span>
        </label>

        @if($book->book_image)
          <div class="current-image-wrap">
            <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->book_name }}">
            <span>Current cover — upload below to replace it</span>
          </div>
        @endif

        <label for="book_image" class="file-label {{ $errors->has('book_image') ? 'is-invalid' : '' }}">
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <rect x="3" y="3" width="18" height="18" rx="3"/>
            <circle cx="8.5" cy="8.5" r="1.5"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 15l-5-5L5 21"/>
          </svg>
          <span id="file-name">Choose a new image (jpeg, png, jpg, gif, webp — max 2MB)</span>
        </label>
        <input
          type="file"
          id="book_image"
          name="book_image"
          accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
          onchange="document.getElementById('file-name').textContent = this.files[0] ? this.files[0].name : 'Choose a new image (jpeg, png, jpg, gif, webp — max 2MB)'"
        >
        @error('book_image')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <hr class="form-divider">

      {{-- External Links --}}
      <div class="section-label">External Links</div>

      {{-- Goodreads Link --}}
      <div class="form-group">
        <label for="goodreads_link">Goodreads Link <span class="optional">(optional)</span></label>
        <input
          type="url"
          id="goodreads_link"
          name="goodreads_link"
          value="{{ old('goodreads_link', $book->goodreads_link) }}"
          placeholder="https://www.goodreads.com/book/show/..."
          class="{{ $errors->has('goodreads_link') ? 'is-invalid' : '' }}"
        >
        @error('goodreads_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- Amazon Link --}}
      <div class="form-group">
        <label for="amazon_link">Amazon Link <span class="optional">(optional)</span></label>
        <input
          type="url"
          id="amazon_link"
          name="amazon_link"
          value="{{ old('amazon_link', $book->amazon_link) }}"
          placeholder="https://www.amazon.com/dp/..."
          class="{{ $errors->has('amazon_link') ? 'is-invalid' : '' }}"
        >
        @error('amazon_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      {{-- IngramSpark Link --}}
      <div class="form-group">
        <label for="ingramspark_link">IngramSpark Link <span class="optional">(optional)</span></label>
        <input
          type="url"
          id="ingramspark_link"
          name="ingramspark_link"
          value="{{ old('ingramspark_link', $book->ingramspark_link) }}"
          placeholder="https://www.ingramspark.com/..."
          class="{{ $errors->has('ingramspark_link') ? 'is-invalid' : '' }}"
        >
        @error('ingramspark_link')
          <span class="field-error">⚠ {{ $message }}</span>
        @enderror
      </div>

      <hr class="form-divider">

      <div class="btn-row">
        <a href="{{ route('books.index') }}" class="btn-cancel">Cancel</a>
        <button type="submit" class="btn-submit">
          <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          Save Changes
        </button>
      </div>

    </form>
  </div>

</div>

</body>
</html>