<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Books</title>
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
  --success:    #6fcf97;
  --success-bg: rgba(111, 207, 151, 0.1);
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
  min-height: 58px;
  background: var(--ink-2);
  border-bottom: 1px solid var(--glass);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 12px 28px;
  position: sticky;
  top: 0;
  z-index: 50;
  gap: 12px;
  flex-wrap: wrap;
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
  flex-wrap: wrap;
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

.btn-new {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  padding: 7px 16px;
  background: var(--paper);
  color: var(--ink);
  border-radius: 4px;
  font-family: 'Inter', Arial, sans-serif;
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
  transition: background 0.15s;
  white-space: nowrap;
  border: none;
  cursor: pointer;
}
.btn-new:hover { background: var(--white); }

/* ══════════════════════
   PAGE LAYOUT
══════════════════════ */
.page-wrap {
  width: 92%;
  max-width: 1100px;
  margin: 28px auto 60px;
}

/* ══════════════════════
   ALERT
══════════════════════ */
.alert {
  padding: 11px 15px;
  border-radius: 6px;
  font-size: 13px;
  font-weight: 500;
  margin-bottom: 20px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.alert svg { flex-shrink: 0; }
.alert-success {
  background: rgba(90,154,114,0.10);
  border: 1px solid rgba(90,154,114,0.22);
  color: #6abf8a;
}

/* ══════════════════════
   STATS BAR
══════════════════════ */
.stats-bar {
  font-size: 12px;
  color: var(--ash-3);
  margin-bottom: 14px;
}
.stats-bar strong { color: var(--white); font-weight: 500; }

/* ══════════════════════
   TABLE CARD
══════════════════════ */
.table-card {
  background: var(--ink-3);
  border: 1px solid var(--glass);
  border-radius: 6px;
  overflow: hidden;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

table {
  width: 100%;
  border-collapse: collapse;
  min-width: 560px;
}

thead {
  background: var(--ink);
  border-bottom: 1px solid var(--glass);
}

thead th {
  padding: 12px 16px;
  text-align: left;
  font-size: 10px;
  font-weight: 600;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--ash-2);
  white-space: nowrap;
}

tbody tr {
  border-bottom: 1px solid rgba(255,255,255,0.03);
  transition: background 0.15s;
}
tbody tr:last-child { border-bottom: none; }
tbody tr:hover { background: var(--glow); }

tbody td {
  padding: 13px 16px;
  font-size: 13px;
  color: var(--white);
  vertical-align: middle;
}

/* ── Columns ── */
.col-num { color: var(--ash-2); font-size: 12px; width: 40px; }

.book-thumb {
  width: 50px;
  height: 50px;
  object-fit: cover;
  border-radius: 4px;
  border: 1px solid var(--glass);
  display: block;
}
.book-thumb-placeholder {
  width: 50px;
  height: 50px;
  border-radius: 4px;
  background: var(--ink-4);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--ash-5);
}

.book-name {
  font-weight: 500;
  color: var(--white);
  max-width: 200px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  font-size: 13px;
}

.book-detail-cell {
  color: var(--ash-2);
  max-width: 240px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  font-size: 12px;
}

.pages-badge {
  display: inline-block;
  padding: 3px 9px;
  background: rgba(201,195,184,0.06);
  border: 1px solid var(--glass);
  border-radius: 20px;
  font-size: 11px;
  color: var(--ash-3);
  font-weight: 500;
  white-space: nowrap;
}

.col-date { color: var(--ash-2); font-size: 12px; white-space: nowrap; }

/* ── Action buttons ── */
.actions { display: flex; gap: 6px; align-items: center; }

.act-btn {
  font-family: 'Inter', Arial, sans-serif;
  font-size: 11px;
  font-weight: 500;
  letter-spacing: 0.4px;
  padding: 5px 12px;
  border-radius: 4px;
  cursor: pointer;
  border: 1px solid var(--glass);
  background: transparent;
  transition: all 0.15s;
  white-space: nowrap;
  text-decoration: none;
  display: inline-block;
}
.act-btn--edit { color: var(--ash-3); }
.act-btn--edit:hover { color: var(--paper); background: var(--glow); border-color: rgba(255,255,255,0.18); }
.act-btn--del { color: var(--error); border-color: rgba(255,107,107,0.25); }
.act-btn--del:hover { background: rgba(255,107,107,0.08); border-color: var(--error); }

/* ── Empty state ── */
.empty-state {
  text-align: center;
  padding: 70px 20px;
  color: var(--ash-3);
}
.empty-state svg { opacity: 0.12; display: block; margin: 0 auto 14px; }
.empty-state p { font-size: 13px; margin-bottom: 18px; }

/* ══════════════════════
   DELETE MODAL
══════════════════════ */
.modal-backdrop {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.75);
  z-index: 100;
  align-items: center;
  justify-content: center;
  padding: 16px;
  overflow-y: auto;
}
.modal-backdrop.active { display: flex; }

.modal {
  background: var(--ink-3);
  border: 1px solid var(--ink-4);
  border-radius: 16px;
  padding: 32px 28px 26px;
  width: 100%;
  max-width: 370px;
  text-align: center;
  position: relative;
  margin: auto;
}

.modal-close-btn {
  position: absolute;
  top: 14px; right: 14px;
  width: 30px; height: 30px;
  border-radius: 50%;
  border: 1px solid var(--glass);
  background: transparent;
  color: var(--ash-3);
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  font-size: 17px;
  line-height: 1;
  transition: background 0.15s, color 0.15s;
  font-family: 'Inter', Arial, sans-serif;
}
.modal-close-btn:hover { background: var(--ink-4); color: var(--white); }

.modal-icon {
  width: 64px; height: 64px;
  background: rgba(255,107,107,0.10);
  border: 1.5px solid rgba(255,107,107,0.25);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto 18px;
}

.modal-tag {
  display: inline-block;
  font-size: 10px; font-weight: 600;
  letter-spacing: 1.2px; text-transform: uppercase;
  color: var(--error);
  background: rgba(255,107,107,0.10);
  border: 1px solid rgba(255,107,107,0.20);
  padding: 3px 10px; border-radius: 20px;
  margin-bottom: 14px;
}

.modal h2 {
  margin: 0 0 10px;
  font-size: 17px; font-weight: 600;
  color: var(--white);
}

.modal-book-name {
  display: inline-block;
  margin: 0 0 10px;
  font-size: 13px; font-weight: 500;
  color: var(--paper);
  background: rgba(255,255,255,0.05);
  border: 1px solid var(--ink-4);
  border-radius: 6px;
  padding: 5px 14px;
  max-width: 280px;
  overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
}

.modal-desc {
  margin: 0 0 24px;
  font-size: 13px; color: var(--ash-3); line-height: 1.6;
}

.modal-actions { display: flex; gap: 10px; }

.modal-cancel {
  flex: 1; padding: 11px;
  background: transparent; border: 1px solid var(--ink-4);
  color: var(--ash-3); border-radius: 10px; cursor: pointer;
  font-family: 'Inter', Arial, sans-serif; font-size: 14px;
  transition: border-color 0.15s, color 0.15s;
}
.modal-cancel:hover { border-color: var(--ash-3); color: var(--white); }

.modal-confirm {
  flex: 1; padding: 11px;
  background: var(--error); border: none; color: #fff;
  border-radius: 10px; cursor: pointer;
  font-family: 'Inter', Arial, sans-serif; font-size: 14px; font-weight: 600;
  display: flex; align-items: center; justify-content: center; gap: 7px;
  transition: opacity 0.15s, transform 0.1s;
}
.modal-confirm:hover { opacity: 0.88; }
.modal-confirm:active { transform: scale(0.97); }

.modal-warn {
  display: flex; align-items: center; justify-content: center; gap: 5px;
  font-size: 11px; color: var(--ash-2);
  margin-top: 16px;
}

/* ══════════════════════
   MOBILE CARD LIST
══════════════════════ */
@media (max-width: 640px) {
  header.topbar {
    padding: 10px 16px;
    justify-content: flex-start;
  }
  .topbar__title {
    font-size: 13px;
    flex: 1 1 auto;
    min-width: 0;
  }
  .topbar__right {
    flex: 0 0 auto;
    gap: 6px;
  }
  .topbar__preview {
    font-size: 10px;
    padding: 5px 10px;
  }
  .btn-new {
    padding: 6px 10px;
    font-size: 10px;
  }
  .btn-new svg { width: 10px; height: 10px; }

  .page-wrap { width: 100%; padding: 0 14px; margin-top: 20px; }

  .table-card { display: none; }

  .card-list { display: flex; flex-direction: column; gap: 10px; }

  .book-card {
    background: var(--ink-3);
    border: 1px solid var(--glass);
    border-radius: 6px;
    padding: 14px;
    display: flex;
    gap: 12px;
    align-items: flex-start;
  }
  .book-card .card-thumb {
    width: 58px; height: 58px;
    object-fit: cover;
    border-radius: 4px;
    border: 1px solid var(--glass);
    flex-shrink: 0;
  }
  .book-card .card-thumb-placeholder {
    width: 58px; height: 58px;
    border-radius: 4px;
    background: var(--ink-4);
    display: flex; align-items: center; justify-content: center;
    color: var(--ash-5);
    flex-shrink: 0;
  }
  .book-card .card-body { flex: 1; min-width: 0; }
  .book-card .card-num { font-size: 11px; color: var(--ash-3); margin-bottom: 2px; }
  .book-card .card-title {
    font-size: 13px; font-weight: 600; color: var(--white);
    margin-bottom: 3px;
    overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
  }
  .book-card .card-meta { font-size: 11px; color: var(--ash-2); margin-bottom: 10px; }
  .book-card .card-actions { display: flex; gap: 8px; }
  .book-card .act-btn { flex: 1; text-align: center; padding: 8px; font-size: 11px; }

  .empty-card {
    text-align: center; padding: 60px 20px; color: var(--ash-3);
  }
  .empty-card svg { opacity: 0.12; display: block; margin: 0 auto 14px; }
  .empty-card p { font-size: 13px; margin-bottom: 18px; }

  .modal { padding: 28px 18px 22px; }
  .modal-actions { flex-direction: column; }
}

@media (max-width: 400px) {
  header.topbar { flex-wrap: wrap; }
  .topbar__title { flex: 1 1 100%; margin-bottom: 6px; }
  .topbar__right { flex: 1 1 100%; justify-content: flex-start; }
}

@media (min-width: 641px) {
  .card-list { display: none; }
  .empty-card { display: none; }
}

@media (min-width: 641px) and (max-width: 900px) {
  .hide-tablet { display: none; }
  .book-name { max-width: 140px; }
}
</style>
</head>

<body>

<header class="topbar">
  <h1 class="topbar__title">Books Library</h1>
  <div class="topbar__right">
    <a href="{{ route('books.create') }}" class="btn-new">
      <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/></svg>
      Add Book
    </a>
    <a href="{{ route('dashboard') }}" class="topbar__preview">View Dashboard →</a>
  </div>
</header>

<div class="page-wrap">

  @if(session('success'))
    <div class="alert alert-success">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
      {{ session('success') }}
    </div>
  @endif

  <div class="stats-bar">
    <strong>{{ $books->count() }}</strong> book(s) found
  </div>

  {{-- ── Desktop / Tablet Table ── --}}
  <div class="table-card">
    @if($books->isEmpty())
      <div class="empty-state">
        <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        <p>No books yet. Add your first book to get started.</p>
        <a href="{{ route('books.create') }}" class="btn-new">Add Book</a>
      </div>
    @else
      <table>
        <thead>
          <tr>
            <th class="col-num">#</th>
            <th>Cover</th>
            <th>Title</th>
            <th class="hide-tablet">Description</th>
            <th>Pages</th>
            <th class="hide-tablet">Added</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $index => $book)
          <tr>
            <td class="col-num">{{ $index + 1 }}</td>
            <td>
              @if($book->book_image)
                <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->book_name }}" class="book-thumb">
              @else
                <div class="book-thumb-placeholder">
                  <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                  </svg>
                </div>
              @endif
            </td>
            <td>
              <div class="book-name" title="{{ $book->book_name }}">{{ $book->book_name }}</div>
            </td>
            <td class="hide-tablet">
              <div class="book-detail-cell" title="{{ $book->book_detail }}">{{ $book->book_detail }}</div>
            </td>
            <td>
              <span class="pages-badge">{{ number_format($book->book_pages) }} pp.</span>
            </td>
            <td class="col-date hide-tablet">{{ $book->created_at->format('M d, Y') }}</td>
            <td>
              <div class="actions">
                <a href="{{ route('books.edit', $book->id) }}" class="act-btn act-btn--edit">Edit</a>
                <button
                  type="button"
                  class="act-btn act-btn--del"
                  onclick="openDeleteModal({{ $book->id }}, '{{ addslashes($book->book_name) }}')"
                >Delete</button>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  {{-- ── Mobile Card List ── --}}
  <div class="card-list">
    @if($books->isEmpty())
      <div class="empty-card">
        <svg width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        <p>No books yet. Add your first book to get started.</p>
        <a href="{{ route('books.create') }}" class="btn-new">Add Book</a>
      </div>
    @else
      @foreach($books as $index => $book)
        <div class="book-card">
          @if($book->book_image)
            <img src="{{ asset('storage/' . $book->book_image) }}" alt="{{ $book->book_name }}" class="card-thumb">
          @else
            <div class="card-thumb-placeholder">
              <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
              </svg>
            </div>
          @endif
          <div class="card-body">
            <div class="card-num">#{{ $index + 1 }}</div>
            <div class="card-title">{{ $book->book_name }}</div>
            <div class="card-meta">{{ number_format($book->book_pages) }} pages · {{ $book->created_at->format('M d, Y') }}</div>
            <div class="card-actions">
              <a href="{{ route('books.edit', $book->id) }}" class="act-btn act-btn--edit">Edit</a>
              <button
                type="button"
                class="act-btn act-btn--del"
                style="width:100%;"
                onclick="openDeleteModal({{ $book->id }}, '{{ addslashes($book->book_name) }}')"
              >Delete</button>
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>

</div>

{{-- ── Delete Confirmation Modal ── --}}
<div class="modal-backdrop" id="deleteModal">
  <div class="modal">
    <button class="modal-close-btn" onclick="closeDeleteModal()" aria-label="Close">&#x2715;</button>
    <div class="modal-icon">
      <svg width="26" height="26" fill="none" viewBox="0 0 24 24" stroke="#ff6b6b" stroke-width="2">
        <polyline points="3 6 5 6 21 6"/>
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/>
      </svg>
    </div>
    <div class="modal-tag">Destructive Action</div>
    <h2>Delete this Book?</h2>
    <div class="modal-book-name" id="modal-book-name"></div>
    <p class="modal-desc">This book will be permanently deleted along with its cover image. This action cannot be undone.</p>
    <div class="modal-actions">
      <button class="modal-cancel" onclick="closeDeleteModal()">Cancel</button>
      <button class="modal-confirm" id="modal-confirm-btn">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
          <polyline points="3 6 5 6 21 6"/>
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6m5 0V4a1 1 0 011-1h2a1 1 0 011 1v2"/>
        </svg>
        Yes, Delete
      </button>
    </div>
    <div class="modal-warn">
      &#9888; Permanently removes cover image &amp; data
    </div>
  </div>
</div>

{{-- Hidden delete form --}}
<form id="deleteForm" method="POST" style="display:none;">
  @csrf
  @method('DELETE')
</form>

<script>
function openDeleteModal(id, name) {
  document.getElementById('modal-book-name').textContent = '"' + name + '"';
  document.getElementById('modal-confirm-btn').onclick = function() {
    const form = document.getElementById('deleteForm');
    form.action = '/books/' + id;
    form.submit();
  };
  document.getElementById('deleteModal').classList.add('active');
}
function closeDeleteModal() {
  document.getElementById('deleteModal').classList.remove('active');
}
document.getElementById('deleteModal').addEventListener('click', function(e) {
  if (e.target === this) closeDeleteModal();
});
</script>

</body>
</html>